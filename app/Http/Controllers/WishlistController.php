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
    public function index()
    {
        $user = Auth::user();
        $products = $user->wishlist()->with('category')->get();
        return view('clients.wishlist', compact('products'));
    }
}
