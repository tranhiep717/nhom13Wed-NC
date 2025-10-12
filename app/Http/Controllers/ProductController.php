<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Đảm bảo dòng này đã được import
use App\Models\Category; // Cần import Category model để lấy sản phẩm liên quan theo category
use Illuminate\Support\Str;

class ProductController extends Controller
{
    // Hiển thị danh sách sản phẩm (có thể là trang danh sách sản phẩm quản trị hoặc toàn bộ sản phẩm)
    // Lưu ý: Route '/store' đang trỏ đến PageController::store.
    // Nếu bạn muốn ProductController::index() xử lý trang cửa hàng chính, hãy chỉnh sửa routes/web.php.
    public function index()
    {
        $products = Product::all();
        // Giả sử bạn có view products.index để hiển thị tất cả sản phẩm (thường dùng cho trang admin)
        return view('products.index', compact('products'));
    }

    // Hiển thị form tạo sản phẩm mới (nếu có)
    public function create()
    {
        // Có thể cần truyền danh mục vào đây để chọn khi tạo sản phẩm
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    // Lưu sản phẩm mới vào database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'long_description' => 'nullable|string', // Thêm validation cho long_description
            'details' => 'nullable|string',          // Thêm validation cho details
            'price' => 'required|numeric|min:0',
            // ... và các validation khác
        ]);

        // Xử lý upload ảnh nếu có
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public'); // Lưu vào storage/app/public/products
        }

        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'long_description' => $request->long_description,
            'details' => $request->details,
            'price' => $request->price,
            'old_price' => $request->old_price,
            'image_path' => $imagePath, // Lưu đường dẫn ảnh
            'category_id' => $request->category_id,
            'stock' => $request->stock,
            'is_new' => $request->has('is_new'),
            'discount_percentage' => $request->discount_percentage,
            'rating' => $request->rating,
            'sold_count' => $request->sold_count ?? 0,
            'views_count' => $request->views_count ?? 0,
        ]);

        return redirect()->route('products.index')->with('success', 'Sản phẩm đã tạo thành công!');
    }

    // PHƯƠNG THỨC HIỂN THỊ CHI TIẾT SẢN PHẨM: Đã sửa để dùng slug
    public function show($slug)
    {
        // Tìm sản phẩm theo slug
        // $product = Product::where('slug', $slug)->firstOrFail();
        $product = Product::with(['ratings.user'])->where('slug', $slug)->firstOrFail();


        // Tăng lượt xem sản phẩm
        $product->increment('views_count');

        // Lấy sản phẩm liên quan (cùng danh mục, không phải sản phẩm hiện tại)
        $relatedProducts = Product::where('category_id', $product->category_id)
                                ->where('id', '!=', $product->id)
                                ->inRandomOrder() // Hiển thị ngẫu nhiên
                                ->take(4) // Lấy 4 sản phẩm liên quan
                                ->get();

        // Trả về view 'clients.product' (hoặc 'product' nếu bạn giữ thư mục gốc cho views)
        // và truyền dữ liệu sản phẩm, sản phẩm liên quan vào.
        return view('clients.product', compact('product', 'relatedProducts'));
    }
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $products = Product::where('name', 'like', "%{$keyword}%")->get();

        // Đã sửa: Trả về view 'clients.search-results'
        return view('clients.search-results', [
            'products' => $products,
            'keyword' => $keyword
        ]);
    }
    // Các phương thức khác cho quản lý sản phẩm (edit, update, destroy)
    // public function edit(Product $product)
    // {
    //     $categories = Category::all();
    //     return view('products.edit', compact('product', 'categories'));
    // }

    // public function update(Request $request, Product $product)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'description' => 'nullable|string',
    //         'price' => 'required|numeric|min:0',
    //         // ... và các validation khác
    //     ]);

    //     if ($request->name != $product->name) {
    //         $product->slug = Str::slug($request->name);
    //     }
    //     $product->update($request->all());
    //     return redirect()->route('products.index')->with('success', 'Sản phẩm đã cập nhật thành công!');
    // }

    // public function destroy(Product $product)
    // {
    //     $product->delete();
    //     return redirect()->route('products.index')->with('success', 'Sản phẩm đã xóa thành công!');
    // }
public function postRating(Request $request, $productId)
{
    $request->validate([
        'rating' => 'required|integer|between:1,5',
        'review' => 'nullable|string|max:1000'
    ]);

    $product = Product::findOrFail($productId);

    // Check if user already rated
    $product->ratings()->create([
        'user_id' => auth()->id(),
        'rating' => $request->rating,
        'review' => $request->review
    ]);

    return redirect()->back()
                    ->with('success', 'Đánh giá của bạn đã được ghi nhận!');
}
}
