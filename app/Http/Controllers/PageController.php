<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index() {
        return view('index'); // resources/views/index.blade.php
    }

    public function store() {
        return view('store'); // resources/views/store.blade.php
    }

    public function product() {
        return view('product'); // resources/views/product.blade.php
    }

    public function checkout() {
        return view('checkout'); // resources/views/checkout.blade.php
    }
}
