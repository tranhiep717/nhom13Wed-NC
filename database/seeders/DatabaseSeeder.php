<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // ✅ Quan trọng: Gọi theo thứ tự phù hợp
        // 1. Category và Brand trước (không phụ thuộc vào gì)
        // 2. Product sau (phụ thuộc vào category và brand)
        $this->call(CategorySeeder::class);
        $this->call(BrandSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(ReviewSeeder::class); // Gọi ReviewSeeder sau cùng vì phụ thuộc vào User và Product
        // Các seeder khác nếu có
    }
}
