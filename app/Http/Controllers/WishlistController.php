<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class WishlistController extends Controller
{
    public function add(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['success' => false, 'message' => 'Bạn cần đăng nhập để sử dụng wishlist!'], 401);
        }
        $user = Auth::user();
        $productId = $request->input('product_id');
        if (!$productId || !Product::find($productId)) {
            return response()->json(['success' => false, 'message' => 'Sản phẩm không tồn tại!'], 404);
        }
        // Giả sử user có quan hệ wishlistManyToMany
        if ($user->wishlist()->where('product_id', $productId)->exists()) {
            return response()->json(['success' => true, 'added' => false]); // Đã có trong wishlist
        }
        $user->wishlist()->attach($productId);
        return response()->json(['success' => true, 'added' => true]);
    }
    public function remove(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['success' => false, 'message' => 'Bạn cần đăng nhập để sử dụng wishlist!'], 401);
        }
        $user = Auth::user();
        $productId = $request->input('product_id');
        $user->wishlist()->detach($productId);
        return response()->json(['success' => true, 'removed' => true]);
    }
    public function removeMulti(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['success' => false, 'message' => 'Bạn cần đăng nhập để sử dụng wishlist!'], 401);
        }
        $user = Auth::user();
        $ids = $request->input('ids', []);
        if (empty($ids)) {
            return response()->json(['success' => false, 'message' => 'Không có sản phẩm nào được chọn!'], 400);
        }
        $user->wishlist()->detach($ids);
        // Nếu là request AJAX thì trả về JSON, nếu không thì redirect lại
        if ($request->ajax()) {
            return response()->json(['success' => true, 'removed' => true]);
        }
        return redirect()->route('wishlist.index')->with('success', 'Đã xoá các sản phẩm đã chọn khỏi danh sách yêu thích!');
    }
    public function index(Request $request)
    {
        $user = Auth::user();
        $sort = $request->input('sort', 'price_asc');
        $perPage = (int) $request->input('perPage', 9);
        $query = $user->wishlist()->with('category');
        switch ($sort) {
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            case 'name_asc':
                $query->orderBy('name', 'asc');
                break;
            case 'name_desc':
                $query->orderBy('name', 'desc');
                break;
            case 'price_asc':
            default:
                $query->orderBy('price', 'asc');
                break;
        }
        $products = $query->paginate($perPage)->appends($request->all());
        return view('clients.wishlist', compact('products'));
    }
}
