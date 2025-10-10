<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product; // Cần import Product để truncate nó trước
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB; // Cần thiết để vô hiệu hóa/kích hoạt FK checks

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Vô hiệu hóa kiểm tra khóa ngoại
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // 2. Truncate bảng products trước vì nó tham chiếu đến categories
        Product::truncate();

        // 3. Truncate bảng categories
        Category::truncate();

        $categories = [
            [
                'name' => 'Laptop',
                'description' => 'Các loại máy tính xách tay và notebook từ các thương hiệu hàng đầu.',
            ],
            [
                'name' => 'Điện thoại',
                'description' => 'Điện thoại thông minh và điện thoại di động với công nghệ tiên tiến nhất.',
            ],
            [
                'name' => 'Máy ảnh',
                'description' => 'Máy ảnh kỹ thuật số, DSLR, Mirrorless và phụ kiện nhiếp ảnh chuyên nghiệp.',
            ],
            [
                'name' => 'Phụ kiện',
                'description' => 'Tai nghe, loa, smartwatch và các phụ kiện điện tử đa dạng.',
            ],
        ];

        foreach ($categories as $categoryData) {
            Category::create([
                'name' => $categoryData['name'],
                'slug' => Str::slug($categoryData['name']),
                'description' => $categoryData['description'],
            ]);
        }

        // 4. Kích hoạt lại kiểm tra khóa ngoại
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}