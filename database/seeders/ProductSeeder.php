<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // KHÔNG CẦN VÔ HIỆU HÓA HOẶC TRUNCATE TẠI ĐÂY NỮA
        // Vì CategorySeeder đã xử lý truncate cho cả hai bảng và vô hiệu hóa/kích hoạt FK checks.
        // DB::statement('SET FOREIGN_KEY_CHECKS=0;'); // Bỏ dòng này
        // Product::truncate(); // Bỏ dòng này

        $laptopCategory = Category::where('slug', 'laptop')->first()->id ?? null;
        $telephoneCategory = Category::where('slug', 'dien-thoai')->first()->id ?? null; // Sửa slug
        $cameraCategory = Category::where('slug', 'may-anh')->first()->id ?? null; // Sửa slug
        $accessoriesCategory = Category::where('slug', 'phu-kien')->first()->id ?? null;

        $dellBrand = Brand::where('slug', 'dell')->first()->id ?? null;
        $samsungBrand = Brand::where('slug', 'samsung')->first()->id ?? null;
        $lgBrand = Brand::where('slug', 'lg')->first()->id ?? null;
        $sonyBrand = Brand::where('slug', 'sony')->first()->id ?? null;
        $appleBrand = Brand::where('slug', 'apple')->first()->id ?? null;
        $htcBrand = Brand::where('slug', 'htc')->first()->id ?? null;
        $xiaomiBrand = Brand::where('slug', 'xiaomi')->first()->id ?? null;

        // Lưu ý: Đảm bảo các slug bạn tìm kiếm (laptop, dien-thoai, may-anh, phu-kien)
        // khớp với slugs được tạo trong CategorySeeder.

        $productsData = [
            [
                'name' => 'Laptop Dell XPS 15',
                'description' => 'Mô tả chi tiết về Laptop Dell XPS 15.',
                'price' => 25000000.00,
                'old_price' => 28000000.00,
                'stock' => 50,
                'image_path' => 'img/product01.png',
                'is_new' => true,
                'discount_percentage' => 10,
                'rating' => 4,
                'long_description' => 'Đây là mô tả chi tiết hơn về Laptop Dell XPS 15 với CPU i7 thế hệ 12, RAM 16GB, SSD 512GB NVMe.',
                'details' => 'CPU: Intel Core i7-12700H, RAM: 16GB, SSD: 512GB NVMe, Màn hình: 15.6 inch FHD+',
                'category_id' => $laptopCategory,
                'brand_id' => $dellBrand ?? $samsungBrand, // ví dụ, bạn có thể thêm Dell vào BrandSeeder nếu muốn
                'slug' => 'laptop-dell-xps-15',
                'sold_count' => 15,
                'views_count' => 120,
            ],
            [
                'name' => 'Điện thoại iPhone 13 Pro',
                'description' => 'Mô tả chi tiết về iPhone 13 Pro.',
                'price' => 20000000.00,
                'old_price' => 22000000.00,
                'stock' => 100,
                'image_path' => 'img/product07.png',
                'is_new' => false,
                'discount_percentage' => 5,
                'rating' => 5,
                'long_description' => 'Mẫu iPhone cao cấp với chip A15 Bionic, màn hình Super Retina XDR ProMotion, camera chuyên nghiệp.',
                'details' => 'Chip: A15 Bionic, Màn hình: 6.1 inch Super Retina XDR ProMotion, Camera: Ba camera 12MP',
                'category_id' => $telephoneCategory,
                'brand_id' => $appleBrand,
                'slug' => 'dien-thoai-iphone-13-pro', // Sửa slug
                'sold_count' => 25,
                'views_count' => 200,
            ],
            [
                'name' => 'Tai nghe Bluetooth Sony WH-1000XM4',
                'description' => 'Tai nghe chống ồn hàng đầu.',
                'price' => 5000000.00,
                'old_price' => null,
                'stock' => 75,
                'image_path' => 'img/product02.png',
                'is_new' => true,
                'discount_percentage' => 0,
                'rating' => 4,
                'long_description' => 'Chất lượng âm thanh tuyệt vời với công nghệ chống ồn hàng đầu thế giới, thời lượng pin dài.',
                'details' => 'Loại: Over-ear, Kết nối: Bluetooth 5.0, Chống ồn: Có, Thời lượng pin: 30 giờ',
                'category_id' => $accessoriesCategory,
                'brand_id' => $sonyBrand,
                'slug' => 'tai-nghe-sony-wh-1000xm4',
                'sold_count' => 30,
                'views_count' => 150,
            ],
            [
                'name' => 'Máy ảnh Canon EOS R5',
                'description' => 'Máy ảnh Mirrorless full-frame mạnh mẽ.',
                'price' => 70000000.00,
                'old_price' => 75000000.00,
                'stock' => 15,
                'image_path' => 'img/product09.png',
                'is_new' => false,
                'discount_percentage' => 7,
                'rating' => 5,
                'long_description' => 'Khả năng quay video 8K, chụp liên tục 20fps, cảm biến 45MP, hệ thống AF tiên tiến.',
                'details' => 'Cảm biến: Full-frame CMOS 45MP, Video: 8K, Chụp liên tục: 20fps, AF: Dual Pixel CMOS AF II',
                'category_id' => $cameraCategory,
                'brand_id' => null, // Chưa xác định thương hiệu
                'slug' => 'may-anh-canon-eos-r5', // Sửa slug
                'sold_count' => 5,
                'views_count' => 80,
            ],
            [
                'name' => 'Laptop HP Spectre x360',
                'description' => 'Laptop 2-in-1 cao cấp, thiết kế mỏng nhẹ.',
                'price' => 22000000.00,
                'old_price' => 24000000.00,
                'stock' => 40,
                'image_path' => 'img/product06.png',
                'is_new' => true,
                'discount_percentage' => 8,
                'rating' => 4,
                'long_description' => 'Thiết kế xoay gập 360 độ, màn hình cảm ứng, hiệu năng mạnh mẽ cho công việc và giải trí.',
                'details' => 'CPU: Intel Core i7, RAM: 16GB, SSD: 1TB NVMe, Màn hình: 13.3 inch FHD cảm ứng',
                'category_id' => $laptopCategory,
                'brand_id' => null, // Chưa xác định thương hiệu
                'slug' => 'laptop-hp-spectre-x360',
                'sold_count' => 12,
                'views_count' => 90,
            ],
            [
                'name' => 'Loa Bluetooth JBL Flip 5',
                'description' => 'Loa di động chống nước, âm thanh sống động.',
                'price' => 2500000.00,
                'old_price' => null,
                'stock' => 120,
                'image_path' => 'img/product09.png',
                'is_new' => false,
                'discount_percentage' => 0,
                'rating' => 4,
                'long_description' => 'Thiết kế nhỏ gọn, âm thanh bass mạnh mẽ, khả năng chống nước IPX7, phù hợp cho mọi cuộc vui.',
                'details' => 'Công suất: 20W RMS, Chống nước: IPX7, Thời lượng pin: 12 giờ, Kết nối: Bluetooth 4.2',
                'category_id' => $accessoriesCategory,
                'brand_id' => null, // Chưa xác định thương hiệu
                'slug' => 'loa-jbl-flip-5',
                'sold_count' => 40,
                'views_count' => 180,
            ],
            [
                'name' => 'Điện thoại Samsung Galaxy S22 Ultra',
                'description' => 'Smartphone cao cấp của Samsung.',
                'price' => 24000000.00,
                'old_price' => 26000000.00,
                'stock' => 90,
                'image_path' => 'img/product07.png',
                'is_new' => true,
                'discount_percentage' => 8,
                'rating' => 5,
                'long_description' => 'Camera ấn tượng với Space Zoom 100x, bút S Pen tích hợp, hiệu năng mạnh mẽ từ chip Snapdragon.',
                'details' => 'Chip: Snapdragon 8 Gen 1, Màn hình: 6.8 inch Dynamic AMOLED 2X, Camera: 108MP chính',
                'category_id' => $telephoneCategory,
                'brand_id' => $samsungBrand,
                'slug' => 'dien-thoai-samsung-galaxy-s22-ultra', // Sửa slug
                'sold_count' => 20,
                'views_count' => 250,
            ],
            [
                'name' => 'Smartwatch Apple Watch Series 7',
                'description' => 'Đồng hồ thông minh với màn hình lớn hơn.',
                'price' => 10000000.00,
                'old_price' => 11000000.00,
                'stock' => 60,
                'image_path' => 'img/product08.png',
                'is_new' => false,
                'discount_percentage' => 9,
                'rating' => 4,
                'long_description' => 'Màn hình lớn và bền bỉ hơn, sạc nhanh, các tính năng sức khỏe tiên tiến.',
                'details' => 'Màn hình: Always-On Retina, Chống nước: 50m, Cảm biến: ECG, SpO2, Sạc nhanh: Có',
                'category_id' => $accessoriesCategory,
                'brand_id' => $appleBrand,
                'slug' => 'apple-watch-series-7',
                'sold_count' => 18,
                'views_count' => 110,
            ],
            [
                'name' => 'Laptop Lenovo ThinkPad X1 Carbon',
                'description' => 'Laptop doanh nhân cao cấp.',
                'price' => 30000000.00,
                'old_price' => 32000000.00,
                'stock' => 45,
                'image_path' => 'img/product03.png',
                'is_new' => true,
                'discount_percentage' => 7,
                'rating' => 5,
                'long_description' => 'Thiết kế siêu nhẹ, bền bỉ, bảo mật cao và hiệu suất vượt trội cho công việc.',
                'details' => 'CPU: Intel Core i7, RAM: 16GB, SSD: 1TB PCIe Gen4, Màn hình: 14 inch QHD+',
                'category_id' => $laptopCategory,
                'brand_id' => null, // Chưa xác định thương hiệu
                'slug' => 'laptop-lenovo-thinkpad-x1-carbon',
                'sold_count' => 10,
                'views_count' => 85,
            ],
            [
                'name' => 'Điện thoại Google Pixel 7',
                'description' => 'Smartphone Android thuần túy.',
                'price' => 15000000.00,
                'old_price' => 16500000.00,
                'stock' => 80,
                'image_path' => 'img/shop02.png',
                'is_new' => false,
                'discount_percentage' => 10,
                'rating' => 4,
                'long_description' => 'Trải nghiệm Android mượt mà, camera ấn tượng với Tensor chip.',
                'details' => 'Chip: Google Tensor G2, Màn hình: 6.3 inch OLED, Camera: 50MP chính, Chống nước: IP68',
                'category_id' => $telephoneCategory,
                'brand_id' => null, // Chưa xác định thương hiệu
                'slug' => 'dien-thoai-google-pixel-7', // Sửa slug
                'sold_count' => 22,
                'views_count' => 170,
            ],
            [
                'name' => 'Máy ảnh Fujifilm X-T5',
                'description' => 'Máy ảnh Mirrorless phong cách cổ điển.',
                'price' => 40000000.00,
                'old_price' => null,
                'stock' => 20,
                'image_path' => 'img/shop03.png',
                'is_new' => true,
                'discount_percentage' => 0,
                'rating' => 5,
                'long_description' => 'Thiết kế hoài cổ, chất lượng hình ảnh xuất sắc với cảm biến X-Trans CMOS 5 HR.',
                'details' => 'Cảm biến: APS-C X-Trans CMOS 5 HR 40.2MP, Video: 6.2K/30p, IBIS: 5 trục',
                'category_id' => $cameraCategory,
                'brand_id' => null, // Chưa xác định thương hiệu
                'slug' => 'may-anh-fujifilm-x-t5', // Sửa slug
                'sold_count' => 7,
                'views_count' => 95,
            ],
            [
                'name' => 'Ổ cứng SSD Samsung 970 EVO Plus 1TB',
                'description' => 'Ổ cứng SSD NVMe hiệu suất cao.',
                'price' => 3000000.00,
                'old_price' => 3500000.00,
                'stock' => 150,
                'image_path' => 'img/product9.png',
                'is_new' => false,
                'discount_percentage' => 15,
                'rating' => 5,
                'long_description' => 'Tăng tốc độ khởi động và tải ứng dụng với hiệu suất đọc/ghi vượt trội.',
                'details' => 'Dung lượng: 1TB, Giao diện: PCIe Gen3.0 x4, Tốc độ đọc: 3500 MB/s, Tốc độ ghi: 3300 MB/s',
                'category_id' => $accessoriesCategory,
                'brand_id' => null, // Chưa xác định thương hiệu
                'slug' => 'ssd-samsung-970-evo-plus-1tb',
                'sold_count' => 50,
                'views_count' => 300,
            ],
            [
                'name' => 'Laptop Asus ROG Zephyrus G14',
                'description' => 'Laptop gaming nhỏ gọn, mạnh mẽ.',
                'price' => 28000000.00,
                'old_price' => 30000000.00,
                'stock' => 30,
                'image_path' => 'img/shop01.png',
                'is_new' => true,
                'discount_percentage' => 7,
                'rating' => 4,
                'long_description' => 'CPU AMD Ryzen và GPU NVIDIA GeForce RTX, màn hình tần số quét cao, thiết kế độc đáo.',
                'details' => 'CPU: AMD Ryzen 9, GPU: NVIDIA GeForce RTX 3060, Màn hình: 14 inch QHD 120Hz',
                'category_id' => $laptopCategory,
                'brand_id' => null, // Chưa xác định thương hiệu
                'slug' => 'laptop-asus-rog-zephyrus-g14',
                'sold_count' => 8,
                'views_count' => 70,
            ],
            [
                'name' => 'Điện thoại OnePlus 10 Pro',
                'description' => 'Hiệu năng flagship, sạc siêu nhanh.',
                'price' => 18000000.00,
                'old_price' => 19500000.00,
                'stock' => 60,
                'image_path' => 'img/product06.png',
                'is_new' => false,
                'discount_percentage' => 8,
                'rating' => 4,
                'long_description' => 'Snapdragon 8 Gen 1, sạc SuperVOOC 80W, camera Hasselblad.',
                'details' => 'Chip: Snapdragon 8 Gen 1, Màn hình: 6.7 inch Fluid AMOLED, Sạc: 80W SuperVOOC',
                'category_id' => $telephoneCategory,
                'brand_id' => null, // Chưa xác định thương hiệu
                'slug' => 'dien-thoai-oneplus-10-pro', // Sửa slug
                'sold_count' => 15,
                'views_count' => 130,
            ],
            [
                'name' => 'Máy ảnh Sony Alpha a7 IV',
                'description' => 'Máy ảnh Mirrorless full-frame đa năng.',
                'price' => 55000000.00,
                'old_price' => 58000000.00,
                'stock' => 10,
                'image_path' => 'img/product07.png',
                'is_new' => true,
                'discount_percentage' => 5,
                'rating' => 5,
                'long_description' => 'Cảm biến 33MP, quay video 4K 60p, hệ thống AF tiên tiến.',
                'details' => 'Cảm biến: Full-frame Exmor R CMOS 33MP, Video: 4K 60p, AF: 759 điểm AF',
                'category_id' => $cameraCategory,
                'brand_id' => null, // Chưa xác định thương hiệu
                'slug' => 'may-anh-sony-alpha-a7-iv', // Sửa slug
                'sold_count' => 3,
                'views_count' => 60,
            ],
            [
                'name' => 'Bàn phím cơ Logitech G Pro X',
                'description' => 'Bàn phím chơi game có thể tùy chỉnh.',
                'price' => 3200000.00,
                'old_price' => null,
                'stock' => 90,
                'image_path' => 'img/product02.png',
                'is_new' => true,
                'discount_percentage' => 0,
                'rating' => 4,
                'long_description' => 'Switch GX có thể thay nóng, đèn RGB LIGHTSYNC, thiết kế nhỏ gọn.',
                'details' => 'Switch: GX Clicky/Tactile/Linear, Đèn: RGB, Kết nối: USB',
                'category_id' => $accessoriesCategory,
                'brand_id' => null, // Chưa xác định thương hiệu
                'slug' => 'ban-phim-logitech-g-pro-x',
                'sold_count' => 35,
                'views_count' => 190,
            ],
            [
                'name' => 'Laptop Microsoft Surface Laptop 5',
                'description' => 'Laptop thiết kế sang trọng, màn hình cảm ứng.',
                'price' => 20000000.00,
                'old_price' => 21500000.00,
                'stock' => 35,
                'image_path' => 'img/product09.png',
                'is_new' => false,
                'discount_percentage' => 7,
                'rating' => 4,
                'long_description' => 'Thiết kế cao cấp, hiệu năng ổn định cho công việc văn phòng và giải trí.',
                'details' => 'CPU: Intel Core i5, RAM: 8GB, SSD: 256GB, Màn hình: 13.5 inch PixelSense cảm ứng',
                'category_id' => $laptopCategory,
                'brand_id' => null, // Chưa xác định thương hiệu
                'slug' => 'laptop-microsoft-surface-laptop-5',
                'sold_count' => 11,
                'views_count' => 88,
            ],
            [
                'name' => 'Điện thoại Xiaomi 12 Pro',
                'description' => 'Smartphone Android cao cấp giá phải chăng.',
                'price' => 16000000.00,
                'old_price' => 17500000.00,
                'stock' => 70,
                'image_path' => 'img/product02.png',
                'is_new' => true,
                'discount_percentage' => 9,
                'rating' => 4,
                'long_description' => 'Snapdragon 8 Gen 1, sạc nhanh 120W, camera 50MP.',
                'details' => 'Chip: Snapdragon 8 Gen 1, Màn hình: 6.73 inch AMOLED, Sạc: 120W HyperCharge',
                'category_id' => $telephoneCategory,
                'brand_id' => $xiaomiBrand,
                'slug' => 'dien-thoai-xiaomi-12-pro', // Sửa slug
                'sold_count' => 17,
                'views_count' => 145,
            ],
            [
                'name' => 'Máy ảnh Nikon Z 6II',
                'description' => 'Máy ảnh Mirrorless full-frame đáng tin cậy.',
                'price' => 42000000.00,
                'old_price' => 45000000.00,
                'stock' => 12,
                'image_path' => 'img/product03.png',
                'is_new' => false,
                'discount_percentage' => 7,
                'rating' => 4,
                'long_description' => 'Cảm biến 24.5MP, quay video 4K 60p, hai bộ xử lý EXPEED 6.',
                'details' => 'Cảm biến: Full-frame BSI CMOS 24.5MP, Video: 4K 60p, ISO: 100-51200',
                'category_id' => $cameraCategory,
                'brand_id' => null, // Chưa xác định thương hiệu
                'slug' => 'may-anh-nikon-z6-ii', // Sửa slug
                'sold_count' => 4,
                'views_count' => 75,
            ],
            [
                'name' => 'Chuột gaming Razer DeathAdder V2',
                'description' => 'Chuột gaming phổ biến.',
                'price' => 1500000.00,
                'old_price' => null,
                'stock' => 200,
                'image_path' => 'img/product08.png',
                'is_new' => true,
                'discount_percentage' => 0,
                'rating' => 5,
                'long_description' => 'Cảm biến quang học Focus+ 20K DPI, switch quang học, thiết kế công thái học.',
                'details' => 'DPI: 20000, Switch: Quang học Razer, Nút: 8 nút có thể lập trình',
                'category_id' => $accessoriesCategory,
                'brand_id' => null, // Chưa xác định thương hiệu
                'slug' => 'chuot-gaming-razer-deathadder-v2', // Sửa slug
                'sold_count' => 60,
                'views_count' => 320,
            ],
            [
                'name' => 'Laptop HP Pavilion 15',
                'description' => 'Laptop phổ thông hiệu suất tốt.',
                'price' => 14000000.00,
                'old_price' => 15500000.00,
                'stock' => 60,
                'image_path' => 'img/product04.png',
                'is_new' => false,
                'discount_percentage' => 10,
                'rating' => 3,
                'long_description' => 'Phù hợp cho học tập, làm việc văn phòng và giải trí nhẹ.',
                'details' => 'CPU: Intel Core i5, RAM: 8GB, SSD: 512GB, Màn hình: 15.6 inch FHD',
                'category_id' => $laptopCategory,
                'brand_id' => null, // Chưa xác định thương hiệu
                'slug' => 'laptop-hp-pavilion-15',
                'sold_count' => 20,
                'views_count' => 100,
            ],
            [
                'name' => 'Điện thoại Vivo X80 Pro',
                'description' => 'Smartphone với camera Zeiss.',
                'price' => 21000000.00,
                'old_price' => 23000000.00,
                'stock' => 55,
                'image_path' => 'img/product05.png',
                'is_new' => true,
                'discount_percentage' => 8,
                'rating' => 5,
                'long_description' => 'Hệ thống camera hợp tác với Zeiss, hiệu năng mạnh mẽ, sạc nhanh.',
                'details' => 'Chip: Snapdragon 8 Gen 1, Màn hình: 6.78 inch AMOLED E5, Camera: Zeiss Optics',
                'category_id' => $telephoneCategory,
                'brand_id' => null, // Chưa xác định thương hiệu
                'slug' => 'dien-thoai-vivo-x80-pro', // Sửa slug
                'sold_count' => 14,
                'views_count' => 160,
            ],
            [
                'name' => 'Máy ảnh GoPro HERO11 Black',
                'description' => 'Camera hành trình đỉnh cao.',
                'price' => 11000000.00,
                'old_price' => 12000000.00,
                'stock' => 40,
                'image_path' => 'img/product06.png',
                'is_new' => false,
                'discount_percentage' => 8,
                'rating' => 4,
                'long_description' => 'Quay video 5.3K60, chống rung HyperSmooth 5.0, chống nước 10m.',
                'details' => 'Video: 5.3K60, Ảnh: 27MP, Chống rung: HyperSmooth 5.0, Chống nước: 10m',
                'category_id' => $cameraCategory,
                'brand_id' => null, // Chưa xác định thương hiệu
                'slug' => 'may-anh-gopro-hero11-black', // Sửa slug
                'sold_count' => 9,
                'views_count' => 105,
            ],
            [
                'name' => 'Loa thông minh Amazon Echo Dot (5th Gen)',
                'description' => 'Loa thông minh nhỏ gọn với Alexa.',
                'price' => 1000000.00,
                'old_price' => null,
                'stock' => 250,
                'image_path' => 'img/product08.png',
                'is_new' => true,
                'discount_percentage' => 0,
                'rating' => 4,
                'long_description' => 'Điều khiển nhà thông minh, phát nhạc, tin tức, đặt báo thức.',
                'details' => 'Trợ lý ảo: Alexa, Kết nối: Wi-Fi, Bluetooth, Âm thanh: Loa phía trước',
                'category_id' => $accessoriesCategory,
                'brand_id' => null, // Chưa xác định thương hiệu
                'slug' => 'loa-thong-minh-amazon-echo-dot-5th-gen', // Sửa slug
                'sold_count' => 70,
                'views_count' => 400,
            ],
        ];

        foreach ($productsData as $productData) {
            Product::create($productData);
        }

        // DB::statement('SET FOREIGN_KEY_CHECKS=1;'); // Bỏ dòng này
    }
}
