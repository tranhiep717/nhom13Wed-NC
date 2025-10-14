<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Review;
use App\Models\Product;
use App\Models\User;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Lấy danh sách sản phẩm có sẵn
        $products = Product::all();
        $users = User::all();

        if ($products->isEmpty()) {
            $this->command->warn('Cần có dữ liệu Product trước khi tạo Review');
            return;
        }
        if ($users->isEmpty()) {
            $this->command->warn('Cần có dữ liệu User trước khi tạo Review');
            return;
        }

        // Danh sách comment mẫu
        $comments = [
            'Sản phẩm tuyệt vời! Chất lượng vượt trội, thiết kế đẹp mắt. Rất đáng đồng tiền!',
            'Rất hài lòng với sản phẩm này. Giao hàng nhanh, đóng gói cẩn thận.',
            'Chất lượng cao, thiết kế hiện đại. Sẽ giới thiệu cho bạn bè.',
            'Sản phẩm xuất sắc! Chính xác những gì tôi cần.',
            'Hoàn hảo từ thiết kế đến chức năng. Rất khuyến khích mua!',
            'Sản phẩm tốt, đúng như mô tả. Thiết kế thông minh và tiện dụng.',
            'Khá hài lòng với chất lượng. Tính năng đầy đủ, dễ sử dụng.',
            'Sản phẩm đáng mua. Chất lượng tốt trong tầm giá này.',
            'Thiết kế đẹp, chất lượng ổn. Giao hàng đúng hẹn.',
            'Rất ưng ý với sản phẩm. Đóng gói chuyên nghiệp.',
            'Sản phẩm tốt, đáng tin cậy. Sẽ mua lại lần sau.',
            'Chất lượng cao cấp, thiết kế sang trọng. Đáng đầu tư!',
            'Sản phẩm ổn, phù hợp với tầm giá. Chất lượng ổn định.',
            'Bình thường, không có gì đặc biệt. Phù hợp nhu cầu cơ bản.',
            'Thiết kế hiện đại, tính năng đầy đủ. Lựa chọn tốt.',
            'Sản phẩm ổn cho nhu cầu sử dụng. Giá cả hợp lý.',
            'Chất lượng trung bình. Có thể cải thiện thêm.',
            'Tạm được, không quá xuất sắc nhưng cũng không tệ.',
            'Chất lượng chưa như mong đợi. Cần cải thiện sản phẩm.',
            'Không đáng giá tiền. Có nhiều lựa chọn tốt hơn.',
            'Chất lượng chưa tương xứng với giá tiền. Cần cải thiện.',
            'Sản phẩm chưa đạt kỳ vọng. Mong shop nâng cao chất lượng.',
            'Rất thất vọng với chất lượng. Không như hình ảnh quảng cáo.',
            'Không hài lòng với sản phẩm. Cần cải thiện nhiều hơn.'
        ];

        $total = 0;
        foreach ($products as $product) {
            // Mỗi sản phẩm sẽ có từ 8-15 review, mỗi review là của một user khác nhau (nếu đủ user)
            $reviewCount = rand(8, min(15, $users->count()));
            $userIds = $users->pluck('id')->shuffle()->take($reviewCount);
            foreach ($userIds as $userId) {
                $user = $users->find($userId);
                Review::create([
                    'product_id' => $product->id,
                    'user_id' => $user->id,
                    'rating' => rand(3, 5),
                    'comment' => $comments[array_rand($comments)],
                    'user_name' => $user->name,
                    'created_at' => now()->subDays(rand(1, 90)),
                ]);
                $total++;
            }
        }
        $this->command->info("Đã tạo $total review cho các sản phẩm!");
    }
}
