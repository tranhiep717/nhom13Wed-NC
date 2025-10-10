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
            // Thêm cột sold_count, không âm, mặc định là 0
            $table->integer('sold_count')->default(0)->after('stock'); // Đặt sau cột 'stock' hoặc cột nào bạn thấy hợp lý
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Xóa cột sold_count khi rollback
            $table->dropColumn('sold_count');
        });
    }
};