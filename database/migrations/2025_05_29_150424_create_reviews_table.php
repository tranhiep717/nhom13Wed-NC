<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade'); // Khóa ngoại tới bảng products
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null'); // Khóa ngoại tới bảng users (nếu có)
            $table->unsignedTinyInteger('rating')->default(0); // Điểm đánh giá (ví dụ: từ 0-5)
            $table->text('comment')->nullable(); // Nội dung đánh giá
            $table->timestamps(); // created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};