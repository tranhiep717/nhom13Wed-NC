<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Có thể cần nếu bạn xử lý đăng nhập/đăng ký trong đây

class AuthController extends Controller
{
    // Phương thức hiển thị form đăng nhập
    public function login()
    {
        return view('auth.login'); // Giả sử view đăng nhập nằm trong thư mục 'auth'
    }

    // Phương thức xử lý đăng nhập
    public function postLogin(Request $request)
    {
        // Logic xử lý đăng nhập
        // Ví dụ:
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
            return redirect()->intended('/')->with('success', 'Đăng nhập thành công!');
        }

        return back()->withErrors([
            'email' => 'Email hoặc mật khẩu không đúng.',
        ])->onlyInput('email');

        // return 'Chức năng đăng nhập chưa được triển khai đầy đủ.';
    }
}