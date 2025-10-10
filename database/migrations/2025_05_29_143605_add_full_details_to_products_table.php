<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Thêm slug nếu chưa có (đã bỏ khỏi migration create_products_table)
            // Bạn có thể bỏ if (!Schema::hasColumn()) nếu bạn chắc chắn
            // rằng nó chỉ được thêm ở đây.
            if (!Schema::hasColumn('products', 'slug')) {
                $table->string('slug')->unique()->after('name');
            }

            // Các cột chi tiết khác
            if (!Schema::hasColumn('products', 'is_new')) {
                $table->boolean('is_new')->default(false)->after('stock'); // Đặt sau stock hoặc image_path tùy ý
            }
            if (!Schema::hasColumn('products', 'discount_percentage')) {
                $table->unsignedTinyInteger('discount_percentage')->default(0)->after('is_new');
            }
            if (!Schema::hasColumn('products', 'rating')) {
                $table->unsignedTinyInteger('rating')->default(0)->after('discount_percentage');
            }
            if (!Schema::hasColumn('products', 'long_description')) {
                $table->text('long_description')->nullable()->after('rating');
            }
            if (!Schema::hasColumn('products', 'details')) {
                $table->text('details')->nullable()->after('long_description');
            }

            // Bỏ cột 'category' string vì bạn đã dùng foreignId category_id
            // if (!Schema::hasColumn('products', 'category')) {
            //     $table->string('category')->nullable()->after('details');
            // }
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $columnsToDrop = [];

            if (Schema::hasColumn('products', 'slug')) { $columnsToDrop[] = 'slug'; }
            if (Schema::hasColumn('products', 'is_new')) { $columnsToDrop[] = 'is_new'; }
            if (Schema::hasColumn('products', 'discount_percentage')) { $columnsToDrop[] = 'discount_percentage'; }
            if (Schema::hasColumn('products', 'rating')) { $columnsToDrop[] = 'rating'; }
            if (Schema::hasColumn('products', 'long_description')) { $columnsToDrop[] = 'long_description'; }
            if (Schema::hasColumn('products', 'details')) { $columnsToDrop[] = 'details'; }
            // if (Schema::hasColumn('products', 'category')) { $columnsToDrop[] = 'category'; } // Bỏ comment nếu bạn đã thêm nó

            if (!empty($columnsToDrop)) {
                $table->dropColumn($columnsToDrop);
            }
        });
    }
};