<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController as ProductController;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminAuth;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request; // Đảm bảo dòng này tồn tại hoặc thêm vào

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
// Danh mục sản phẩm
Route::get('/danh-muc', [DanhMucController::class, 'index'])->name('danhmuc');
// Cửa hàng chung
Route::get('/store', [StoreController::class, 'index'])->name('store.index');
// Trang danh mục cụ thể
Route::redirect('/laptop', '/store?category=laptop')->name('laptop');
Route::redirect('/telephone', '/store?category=dien-thoai')->name('telephone');
Route::redirect('/camera', '/store?category=may-anh')->name('camera');
Route::redirect('/phu-kien', '/store?category=phu-kien')->name('accessories');
// Route tìm kiếm sản phẩm (ĐẶT TRÊN route động)
Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');
// Chi tiết sản phẩm (route động, đặt SAU search)
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');
// Giỏ hàng
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/cart/minicart', [CartController::class, 'getMiniCart'])->name('cart.minicart');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::put('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
// Đặt hàng
Route::get('/checkout', [PageController::class, 'checkout'])->name('checkout');
Route::post('/checkout', [OrderController::class, 'placeOrder'])->name('checkout.placeOrder');
Route::get('/order-success', function() {
    return view('clients.order-success');
})->name('order.success');

Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
// Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');


Route::get('/chinh-sach-bao-mat', [PageController::class, 'policy'])->name('policy');
Route::get('/dieu-khoan-su-dung', [PageController::class, 'terms'])->name('terms');
Route::get('/ve-chung-toi', [PageController::class, 'aboutUs'])->name('aboutUs');
Route::get('/chinh-sach-bao-hanh-doi-tra-hang', [PageController::class, 'orderAndReturn'])->name('orderAndReturn');

// Đánh giá sản phẩm
Route::post('/products/{id}/rating', [ProductController::class, 'postRating'])->name('products.rating')->middleware('auth');
// Auth routes
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'postLogin']);
Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register', [RegisterController::class, 'postRegister']);
// Dashboard
Route::get('/dashboard', function (Request $request) { // Thêm Request $request
    return view('user.main', [
        'user' => $request->user(), // Truyền dữ liệu người dùng
        'orders' => $request->user()->orders()->latest()->get(), // Thêm orders
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');
// Profile (middleware auth)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


});


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

// Thêm route hiển thị giao diện danh sách yêu thích
Route::get('/wishlist', [App\Http\Controllers\WishlistController::class, 'index'])->name('wishlist.index')->middleware('auth');
// Thêm sản phẩm vào wishlist (AJAX)
Route::post('/wishlist/add', [App\Http\Controllers\WishlistController::class, 'add'])->name('wishlist.add')->middleware('auth');
// Xoá sản phẩm khỏi wishlist (AJAX)
Route::post('/wishlist/remove', [App\Http\Controllers\WishlistController::class, 'remove'])->name('wishlist.remove')->middleware('auth');
Route::post('/wishlist/remove-multi', [App\Http\Controllers\WishlistController::class, 'removeMulti'])->name('wishlist.remove-multi')->middleware('auth');

require __DIR__ . '/auth.php';

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;


// Admin login routes
Route::prefix('admin')->name('admin.')->middleware('web')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', function () {
            $productCount = Product::count();
            $userCount = User::count();
            $orderCount = 53; // Tạm thời giữ tĩnh
            $contactCount = 65; // Tạm thời giữ tĩnh
            return view('admin.dashboard', compact('productCount', 'userCount', 'orderCount', 'contactCount'));
        })->name('dashboard');

        // User CRUD
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/users', [UserController::class, 'store'])->name('users.store');
        Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
        Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
        Route::get('/users/{id}/remove', [UserController::class, 'remove'])->name('users.remove');
        Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

        // Product CRUD
        Route::get('/products', [AdminProductController::class, 'index'])->name('products.index');
        Route::get('/products/create', [AdminProductController::class, 'create'])->name('products.create');
        Route::post('/products', [AdminProductController::class, 'store'])->name('products.store');
        Route::get('/products/{id}', [AdminProductController::class, 'show'])->name('products.show');
        Route::get('/products/{id}/edit', [AdminProductController::class, 'edit'])->name('products.edit');
        Route::put('/products/{id}', [AdminProductController::class, 'update'])->name('products.update');
        Route::get('/products/{id}/remove', [AdminProductController::class, 'remove'])->name('products.remove');
        Route::delete('/products/{id}', [AdminProductController::class, 'destroy'])->name('products.destroy');

        // Category CRUD
        Route::get('/categories', [AdminCategoryController::class, 'index'])->name('categories.index');
        Route::get('/categories/create', [AdminCategoryController::class, 'create'])->name('categories.create');
        Route::post('/categories', [AdminCategoryController::class, 'store'])->name('categories.store');
        Route::get('/categories/{id}', [AdminCategoryController::class, 'show'])->name('categories.show');
        Route::get('/categories/{id}/edit', [AdminCategoryController::class, 'edit'])->name('categories.edit');
        Route::put('/categories/{id}', [AdminCategoryController::class, 'update'])->name('categories.update');
        Route::get('/categories/{id}/remove', [AdminCategoryController::class, 'remove'])->name('categories.remove');
        Route::delete('/categories/{id}', [AdminCategoryController::class, 'destroy'])->name('categories.destroy');

        // Orders (bạn có thể bổ sung CRUD tương tự nếu cần)
         Route::get('/orders', [AdminOrderController::class, 'index'])->name('orders.index');
        Route::post('/orders/{id}/confirm', [AdminOrderController::class, 'confirm'])->name('orders.confirm');

        Route::get('/orders/{id}', [AdminOrderController::class, 'show'])->name('orders.show');
    });
}); // <-- Kết thúc group route prefix('admin')

// Trang welcome admin (không cần đăng nhập, nằm ngoài group admin)
Route::get('/admin', function () {
    return view('admin.welcome');
})->name('admin.welcome');
