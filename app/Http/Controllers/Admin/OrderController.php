<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order; // Assuming you have an Order model

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')->latest()->get(); // Lấy danh sách đơn hàng

        return view('admin.orders.index', compact('orders')); // Truyền $orders xuống view
    }
    public function confirm($id)
    {
        $order = Order::findOrFail($id);

        if ($order->status === 'confirmed') {
            return redirect()->back()->with('info', 'Đơn hàng đã được xác nhận trước đó.');
        }

        $order->status = 'confirmed';
        $order->save();

        return redirect()->back()->with('success', 'Xác nhận đơn hàng thành công.');
    }
    public function show($id)
    {
        $order = Order::with(['user', 'items'])->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

}
