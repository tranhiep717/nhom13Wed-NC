<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order; // Assuming you have an Order model

class OrderController extends Controller
{
    public function index()
    {
        return view('admin.orders.index'); // file này đã có theo ảnh bạn gửi
    }
}
