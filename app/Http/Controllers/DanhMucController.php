<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DanhMucController extends Controller
{
    public function index()
    {
        return view('danhmuc.index'); // Tạo view tương ứng hoặc sửa theo đúng view bạn muốn
    }
}
