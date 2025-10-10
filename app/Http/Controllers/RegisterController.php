<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Có thể cần nếu bạn tạo người dùng mới
use Illuminate\Support\Facades\Hash; // Có thể cần để hash mật khẩu

class RegisterController extends Controller
{
    // Phương thức hiển thị form đăng ký
    public function register()
    {
        return view('auth.register'); // Giả sử view đăng ký nằm trong thư mục 'auth'
    }

    // Phương thức xử lý đăng ký
    public function postRegister(Request $request)
    {
        // Logic xử lý đăng ký người dùng mới
        // Ví dụ:
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Đăng ký thành công! Vui lòng đăng nhập.');

        // return 'Chức năng đăng ký chưa được triển khai đầy đủ.';
    }
}