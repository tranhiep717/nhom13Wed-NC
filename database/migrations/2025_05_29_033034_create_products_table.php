<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->decimal('old_price', 10, 2)->nullable();
            $table->integer('stock')->default(0);

            // Quan trọng: Sử dụng foreignId và constrained
            // Đảm bảo migration tạo bảng 'categories' chạy TRƯỚC migration này.
            $table->foreignId('category_id')->nullable()->constrained('categories')->onDelete('set null');

            // Các cột sau sẽ được thêm bởi các migration riêng biệt (add_columns_to_products_table)
            // $table->string('slug')->unique();
            // $table->string('image')->nullable();
            // $table->boolean('is_new')->default(false);
            // $table->integer('discount_percentage')->nullable();
            // $table->float('rating')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};