<?php

// Script để reset và tạo lại reviews
require 'vendor/autoload.php';

$app = require 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

// Xóa tất cả reviews cũ
App\Models\Review::truncate();
echo "Đã xóa tất cả reviews cũ\n";

// Chạy seeder
Artisan::call('db:seed', ['--class' => 'Database\Seeders\ReviewSeeder']);
echo "Đã tạo lại reviews mới\n";

// Kiểm tra kết quả
$totalReviews = App\Models\Review::count();
echo "Tổng số reviews: $totalReviews\n";

// Kiểm tra phân bổ theo sản phẩm
$products = App\Models\Product::withCount('reviews')->get();
foreach ($products as $product) {
    echo "Product ID {$product->id}: {$product->reviews_count} reviews\n";
}
