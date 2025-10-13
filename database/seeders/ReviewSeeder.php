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

        if ($products->isEmpty()) {
            $this->command->warn('Cần có dữ liệu Product trước khi tạo Review');
            return;
        }

        // 24 tên user mẫu
        $userNames = [
            'Nguyễn Văn An', 'Trần Thị Bình', 'Lê Hoàng Cường', 'Phạm Thị Dung',
            'Hoàng Văn Em', 'Vũ Thị Phương', 'Đặng Minh Giang', 'Bùi Thị Hoa',
            'Ngô Văn Inh', 'Dương Thị Kim', 'Lý Văn Long', 'Tạ Thị Mai',
            'Võ Minh Nam', 'Chu Thị Oanh', 'Đinh Văn Phúc', 'Lưu Thị Quỳnh',
            'Phan Văn Rồng', 'Đỗ Thị Sương', 'Trịnh Văn Tùng', 'Hồ Thị Uyên',
            'Lê Văn Vũ', 'Nguyễn Thị Xuân', 'Trần Văn Yên', 'Phạm Thị Zara'
        ];

        // 24 rating (5-4-3-2-1)
        $ratings = [5, 5, 5, 5, 5, 4, 4, 4, 4, 4, 4, 4, 3, 3, 3, 3, 3, 3, 2, 2, 2, 2, 1, 1];

        // 24 thời gian khác nhau (trong 3 tháng gần đây)
        $times = [
            '2025-06-13 08:30:00', '2025-06-12 14:45:00', '2025-06-11 10:20:00', '2025-06-10 16:15:00',
            '2025-06-09 09:40:00', '2025-06-08 13:25:00', '2025-06-07 11:10:00', '2025-06-06 15:35:00',
            '2025-06-05 07:50:00', '2025-06-04 12:05:00', '2025-06-03 17:20:00', '2025-06-02 09:15:00',
            '2025-06-01 14:30:00', '2025-05-31 10:45:00', '2025-05-30 16:00:00', '2025-05-29 08:25:00',
            '2025-05-28 13:40:00', '2025-05-27 11:55:00', '2025-05-26 15:10:00', '2025-05-25 07:35:00',
            '2025-05-24 12:50:00', '2025-05-23 17:05:00', '2025-05-22 09:20:00', '2025-05-21 14:15:00'
        ];

        // 24 comment khác nhau
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

        foreach ($products as $product) {
        for ($i = 0; $i < rand(10, 15); $i++) {
            Review::create([
                'product_id' => $product->id,
                'user_id' => null,
                'rating' => rand(3, 5),
                'comment' => $comments[array_rand($comments)],
                'user_name' => $userNames[array_rand($userNames)],
                'created_at' => now()->subDays(rand(1, 30)),
            ]);
        }
    }

        $this->command->info('Đã tạo 24 review mẫu thành công!');
    }
}
