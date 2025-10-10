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
        Schema::table('products', function (Blueprint $table) {
            // Thêm cột views_count, không âm, mặc định là 0
            $table->integer('views_count')->default(0)->after('sold_count'); // Đặt sau 'sold_count' hoặc cột nào bạn thấy hợp lý
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Xóa cột views_count khi rollback
            $table->dropColumn('views_count');
        });
    }
};