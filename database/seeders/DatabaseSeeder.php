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

        // ✅ Quan trọng: Gọi CategorySeeder trước ProductSeeder.
        // CategorySeeder sẽ tự động truncate cả products và categories,
        // sau đó seed categories, và sau đó ProductSeeder sẽ seed products.
        $this->call(CategorySeeder::class);
        $this->call(ProductSeeder::class);

        // Các seeder khác nếu có
    }
}
