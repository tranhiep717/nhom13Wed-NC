<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $orders = $user ? $user->orders()->latest()->get() : collect();
        return view('user.main', compact('user', 'orders'));
    }
}
