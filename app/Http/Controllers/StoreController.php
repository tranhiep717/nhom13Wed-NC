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
        $currentCategory = null; // danh mục hiện tại
        $currentBrand = null;    // thương hiệu hiện tại

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

        // Lọc theo brand (đặt trước paginate để có hiệu lực)
        $brands = Brand::all();
        if ($request->filled('brand')) {
            $brandSlug = $request->input('brand');
            $candidateBrand = Brand::where('slug', $brandSlug)->first();
            if ($candidateBrand) {
                $currentBrand = $candidateBrand;
                $productsQuery->where('brand_id', $currentBrand->id);
            }
        }

        // Lấy các sản phẩm bán chạy nhất dựa trên cùng bộ lọc hiện tại (clone tránh ảnh hưởng thứ tự chính)
        $bestSellingProducts = (clone $productsQuery)
            ->orderByDesc('sold_count')
            ->take(3)
            ->get();

        // Lấy danh mục (kèm đếm theo trạng thái hiện tại của DB)
        $categories = Category::withCount('products')->get();

        // Phân trang cuối cùng sau khi áp dụng toàn bộ filter
        $perPage = $request->get('per_page', 9);
        $products = $productsQuery
            ->paginate($perPage)
            ->appends($request->except('page'));

        // Nếu là AJAX request, chỉ trả về partial HTML danh sách sản phẩm
        $viewData = [
            'products' => $products,
            'bestSellingProducts' => $bestSellingProducts,
            'categories' => $categories,
            'brands' => $brands,
            'currentCategory' => $currentCategory,
            'currentBrand' => $currentBrand,
        ];

        return $request->ajax()
            ? response()->view('clients.store', $viewData)
            : view('clients.store', $viewData);
    }
}
