<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ------------------------------
// Public Routes (không cần đăng nhập)
// ------------------------------
// Trang chủ
Route::get('/', [PageController::class, 'index'])->name('home');
// Danh mục sản phẩm (nếu bạn có một trang tổng hợp danh mục riêng, nếu không có thể xóa)
Route::get('/danh-muc', [DanhMucController::class, 'index'])->name('danhmuc');

// Cửa hàng chung (liệt kê tất cả sản phẩm hoặc sản phẩm theo bộ lọc)
Route::get('/store', [StoreController::class, 'index'])->name('store.index');

// Trang danh mục cụ thể (chuyển hướng về trang /store với tham số category)
Route::redirect('/laptop', '/store?category=laptop')->name('laptop');
Route::redirect('/telephone', '/store?category=dien-thoai')->name('telephone');
Route::redirect('/camera', '/store?category=may-anh')->name('camera');
Route::redirect('/phu-kien', '/store?category=phu-kien')->name('accessories');

// **CHI TIẾT SẢN PHẨM: Đảm bảo route này nằm Ở TRÊN CÙNG để tránh xung đột với các route khác nếu có tiền tố giống nhau.**
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');

// **XÓA HOẶC COMMENT DÒNG NÀY ĐI:**
// Route::get('/product', [PageController::class, 'product'])->name('product');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');


// Các trang tĩnh khác
Route::get('/checkout', [PageController::class, 'checkout'])->name('checkout');
Route::get('/blank', [PageController::class, 'blank'])->name('blank');


// Auth routes
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'postLogin']);

Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register', [RegisterController::class, 'postRegister']);

// Trang dashboard (có middleware auth)
Route::get('/dashboard', function () {
    return view('user.main');
})->middleware(['auth', 'verified'])->name('dashboard');

// Nhóm route profile cần đăng nhập
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route cho admin
Route::get('/admin', [AdminController::class, 'login'])->name('admin.login');

// Route cho giỏ hàng
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::put('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

// AJAX Mini Cart (trả về partial HTML và badge số lượng)
Route::get('/cart/minicart', [CartController::class, 'getMiniCart'])->name('cart.minicart');

//Route commen
Route::post('/products/{id}/rating', [ProductController::class, 'postRating'])
     ->name('products.rating')
     ->middleware('auth');
Route::get('/products/{slug}', [ProductController::class, 'show'])
->name('products.show');

require __DIR__ . '/auth.php';
