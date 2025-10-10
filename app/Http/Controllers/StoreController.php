<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index(Request $request)
    {
        $productsQuery = Product::query();
        $currentCategory = null; // Khởi tạo biến $currentCategory

        // Lấy category từ request nếu có
        if ($request->has('category') && $request->category != '') {
            $categorySlug = $request->input('category');
            $currentCategory = Category::where('slug', $categorySlug)->first(); // Gán vào $currentCategory
            if ($currentCategory) {
                $productsQuery->where('category_id', $currentCategory->id);
            }
        }

        // Xử lý bộ lọc giá
        if ($request->has('price_min') && is_numeric($request->price_min)) {
            $productsQuery->where('price', '>=', $request->price_min);
        }
        if ($request->has('price_max') && is_numeric($request->price_max)) {
            $productsQuery->where('price', '<=', $request->price_max);
        }

        // Xử lý tìm kiếm
        if ($request->has('search') && $request->search != '') {
            $searchTerm = $request->input('search');
            $productsQuery->where(function ($query) use ($searchTerm) {
                $query->where('name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('description', 'like', '%' . $searchTerm . '%');
            });
        }

        // Xử lý sắp xếp
        $sort = $request->get('sort', 'new');
        switch ($sort) {
            case 'new':
                $productsQuery->orderBy('created_at', 'desc');
                break;
            case 'price_asc':
                $productsQuery->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $productsQuery->orderBy('price', 'desc');
                break;
            case 'name_asc':
                $productsQuery->orderBy('name', 'asc');
                break;
            case 'name_desc':
                $productsQuery->orderBy('name', 'desc');
                break;
            case 'popularity':
                $productsQuery->orderBy('sold_count', 'desc');
                break;
            default:
                $productsQuery->orderBy('created_at', 'desc');
        }

        // Lấy các sản phẩm bán chạy nhất
        $bestSellingProducts = Product::orderByDesc('sold_count')->take(3)->get();

        // Lấy các sản phẩm chính để hiển thị trên trang (có phân trang)
        $perPage = $request->get('per_page', 9);
        $products = $productsQuery->paginate($perPage)->appends($request->except('page')); // Giữ lại các tham số lọc/sắp xếp khi phân trang

        // Lấy danh mục để hiển thị sidebar
        $categories = Category::withCount('products')->get();

        // Lọc theo brand
        $brands = Brand::all();
        if ($request->has('brand') && $request->brand != '') {
            $brandSlug = $request->input('brand');
            $currentBrand = Brand::where('slug', $brandSlug)->first();
            if ($currentBrand) {
                $productsQuery->where('brand_id', $currentBrand->id);
            }
        } else {
            $currentBrand = null;
        }

        // Nếu là AJAX request, chỉ trả về partial HTML danh sách sản phẩm
        if ($request->ajax()) {
            return response()->view('clients.store', [
                'products' => $products,
                'bestSellingProducts' => $bestSellingProducts,
                'categories' => $categories,
                'brands' => $brands,
                'currentCategory' => $currentCategory,
                'currentBrand' => $currentBrand,
            ]);
        }

        // Trả về view đầy đủ nếu không phải AJAX
        return view('clients.store', [
            'products' => $products,
            'bestSellingProducts' => $bestSellingProducts,
            'categories' => $categories,
            'brands' => $brands,
            'currentCategory' => $currentCategory,
            'currentBrand' => $currentBrand,
        ]);
    }
}
