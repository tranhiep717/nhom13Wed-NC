<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {
        // Đã chuyển logic share $cartCount sang AppServiceProvider, không cần ở đây nữa
    }

    public function add(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để thêm vào giỏ hàng');
        }
        $cart = CartItem::where('user_id', Auth::id())
            ->where('product_id', $request->product_id)
            ->first();

        if ($cart) {
            $cart->quantity += $request->quantity;
            $cart->save();
        } else {
            CartItem::create([
                'user_id' => Auth::id(),
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
            ]);
        }

        return back()->with('success', 'Đã thêm vào giỏ hàng');
    }

    public function index()
    {
        $cartItems = CartItem::with('product')->where('user_id', Auth::id())->get();
        $cartCount = $cartItems->sum('quantity');
        return view('cart.index', compact('cartItems', 'cartCount'));
    }

    public function remove($id)
    {
        CartItem::where('id', $id)->where('user_id', Auth::id())->delete();
        return back();
    }

    public function update(Request $request, $id)
    {
        $cartItem = CartItem::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $cartItem->quantity = $request->quantity;
        $cartItem->save();
        return back()->with('success', 'Cập nhật số lượng thành công');
    }

    public function getMiniCart()
    {
        if (!Auth::check()) {
            return response()->json([
                'html' => view('partials.minicart', [
                    'cart' => [],
                    'cartTotal' => 0
                ])->render(),
                'cartCount' => 0
            ]);
        }
        $cartItems = \App\Models\CartItem::with('product')->where('user_id', Auth::id())->get();
        $cart = [];
        $cartTotal = 0;
        $cartCount = 0;
        foreach ($cartItems as $item) {
            $cart[] = [
                'id' => $item->product->id,
                'name' => $item->product->name,
                'image' => $item->product->image,
                'qty' => $item->quantity,
                'price' => $item->product->price,
            ];
            $cartTotal += $item->product->price * $item->quantity;
            $cartCount += $item->quantity;
        }
        $html = view('partials.minicart', compact('cart', 'cartTotal'))->render();
        return response()->json([
            'html' => $html,
            'cartCount' => $cartCount
        ]);
    }
}
