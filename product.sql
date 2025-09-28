-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 06, 2025 lúc 09:37 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `product`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_items`
--

CREATE TABLE `cart_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Laptop', 'laptop', 'Các loại máy tính xách tay và notebook từ các thương hiệu hàng đầu.', '2025-05-30 23:58:09', '2025-05-30 23:58:09'),
(2, 'Điện thoại', 'dien-thoai', 'Điện thoại thông minh và điện thoại di động với công nghệ tiên tiến nhất.', '2025-05-30 23:58:09', '2025-05-30 23:58:09'),
(3, 'Máy ảnh', 'may-anh', 'Máy ảnh kỹ thuật số, DSLR, Mirrorless và phụ kiện nhiếp ảnh chuyên nghiệp.', '2025-05-30 23:58:09', '2025-05-30 23:58:09'),
(4, 'Phụ kiện', 'phu-kien', 'Tai nghe, loa, smartwatch và các phụ kiện điện tử đa dạng.', '2025-05-30 23:58:09', '2025-05-30 23:58:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_05_28_154046_create_categories_table', 1),
(5, '2025_05_29_033034_create_products_table', 1),
(6, '2025_05_29_075510_create_cart_items_table', 1),
(7, '2025_05_29_075554_create_order_items_table', 1),
(8, '2025_05_29_101150_add_sold_count_to_products_table', 1),
(9, '2025_05_29_101446_add_views_count_to_products_table', 1),
(10, '2025_05_29_143337_add_image_path_to_products_table', 1),
(11, '2025_05_29_143605_add_full_details_to_products_table', 1),
(12, '2025_05_29_150424_create_reviews_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total_price` decimal(12,2) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `old_price` decimal(10,2) DEFAULT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `is_new` tinyint(1) NOT NULL DEFAULT 0,
  `discount_percentage` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `rating` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `long_description` text DEFAULT NULL,
  `details` text DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `sold_count` int(11) NOT NULL DEFAULT 0,
  `views_count` int(11) NOT NULL DEFAULT 0,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `description`, `price`, `old_price`, `stock`, `is_new`, `discount_percentage`, `rating`, `long_description`, `details`, `image_path`, `sold_count`, `views_count`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Laptop Dell XPS 15', 'laptop-dell-xps-15', 'Mô tả chi tiết về Laptop Dell XPS 15.', 25000000.00, 28000000.00, 50, 1, 10, 4, 'Đây là mô tả chi tiết hơn về Laptop Dell XPS 15 với CPU i7 thế hệ 12, RAM 16GB, SSD 512GB NVMe.', 'CPU: Intel Core i7-12700H, RAM: 16GB, SSD: 512GB NVMe, Màn hình: 15.6 inch FHD+', 'img/product01.png', 15, 120, 1, '2025-05-30 23:58:09', '2025-05-30 23:58:09'),
(2, 'Điện thoại iPhone 13 Pro', 'dien-thoai-iphone-13-pro', 'Mô tả chi tiết về iPhone 13 Pro.', 20000000.00, 22000000.00, 100, 0, 5, 5, 'Mẫu iPhone cao cấp với chip A15 Bionic, màn hình Super Retina XDR ProMotion, camera chuyên nghiệp.', 'Chip: A15 Bionic, Màn hình: 6.1 inch Super Retina XDR ProMotion, Camera: Ba camera 12MP', 'img/product02.png', 25, 205, 2, '2025-05-30 23:58:09', '2025-06-06 00:34:14'),
(3, 'Tai nghe Bluetooth Sony WH-1000XM4', 'tai-nghe-bluetooth-sony-wh-1000xm4', 'Tai nghe chống ồn hàng đầu.', 5000000.00, NULL, 75, 1, 0, 4, 'Chất lượng âm thanh tuyệt vời với công nghệ chống ồn hàng đầu thế giới, thời lượng pin dài.', 'Loại: Over-ear, Kết nối: Bluetooth 5.0, Chống ồn: Có, Thời lượng pin: 30 giờ', 'img/product03.png', 30, 151, 4, '2025-05-30 23:58:09', '2025-05-30 23:59:09'),
(4, 'Máy ảnh Canon EOS R5', 'may-anh-canon-eos-r5', 'Máy ảnh Mirrorless full-frame mạnh mẽ.', 70000000.00, 75000000.00, 15, 0, 7, 5, 'Khả năng quay video 8K, chụp liên tục 20fps, cảm biến 45MP, hệ thống AF tiên tiến.', 'Cảm biến: Full-frame CMOS 45MP, Video: 8K, Chụp liên tục: 20fps, AF: Dual Pixel CMOS AF II', 'img/product04.png', 5, 82, 3, '2025-05-30 23:58:09', '2025-06-05 23:59:28'),
(5, 'Laptop HP Spectre x360', 'laptop-hp-spectre-x360', 'Laptop 2-in-1 cao cấp, thiết kế mỏng nhẹ.', 22000000.00, 24000000.00, 40, 1, 8, 4, 'Thiết kế xoay gập 360 độ, màn hình cảm ứng, hiệu năng mạnh mẽ cho công việc và giải trí.', 'CPU: Intel Core i7, RAM: 16GB, SSD: 1TB NVMe, Màn hình: 13.3 inch FHD cảm ứng', 'img/product05.png', 12, 91, 1, '2025-05-30 23:58:09', '2025-06-06 00:09:59'),
(6, 'Loa Bluetooth JBL Flip 5', 'loa-bluetooth-jbl-flip-5', 'Loa di động chống nước, âm thanh sống động.', 2500000.00, NULL, 120, 0, 0, 4, 'Thiết kế nhỏ gọn, âm thanh bass mạnh mẽ, khả năng chống nước IPX7, phù hợp cho mọi cuộc vui.', 'Công suất: 20W RMS, Chống nước: IPX7, Thời lượng pin: 12 giờ, Kết nối: Bluetooth 4.2', 'img/product06.png', 40, 180, 4, '2025-05-30 23:58:09', '2025-05-30 23:58:09'),
(7, 'Điện thoại Samsung Galaxy S22 Ultra', 'dien-thoai-samsung-galaxy-s22-ultra', 'Smartphone cao cấp của Samsung.', 24000000.00, 26000000.00, 90, 1, 8, 5, 'Camera ấn tượng với Space Zoom 100x, bút S Pen tích hợp, hiệu năng mạnh mẽ từ chip Snapdragon.', 'Chip: Snapdragon 8 Gen 1, Màn hình: 6.8 inch Dynamic AMOLED 2X, Camera: 108MP chính', 'img/product07.png', 20, 250, 2, '2025-05-30 23:58:09', '2025-05-30 23:58:09'),
(8, 'Smartwatch Apple Watch Series 7', 'smartwatch-apple-watch-series-7', 'Đồng hồ thông minh với màn hình lớn hơn.', 10000000.00, 11000000.00, 60, 0, 9, 4, 'Màn hình lớn và bền bỉ hơn, sạc nhanh, các tính năng sức khỏe tiên tiến.', 'Màn hình: Always-On Retina, Chống nước: 50m, Cảm biến: ECG, SpO2, Sạc nhanh: Có', 'img/product08.png', 18, 110, 4, '2025-05-30 23:58:09', '2025-05-30 23:58:09'),
(9, 'Laptop Lenovo ThinkPad X1 Carbon', 'laptop-lenovo-thinkpad-x1-carbon', 'Laptop doanh nhân cao cấp.', 30000000.00, 32000000.00, 45, 1, 7, 5, 'Thiết kế siêu nhẹ, bền bỉ, bảo mật cao và hiệu suất vượt trội cho công việc.', 'CPU: Intel Core i7, RAM: 16GB, SSD: 1TB PCIe Gen4, Màn hình: 14 inch QHD+', 'img/product09.png', 10, 85, 1, '2025-05-30 23:58:09', '2025-05-30 23:58:09'),
(10, 'Điện thoại Google Pixel 7', 'dien-thoai-google-pixel-7', 'Smartphone Android thuần túy.', 15000000.00, 16500000.00, 80, 0, 10, 4, 'Trải nghiệm Android mượt mà, camera ấn tượng với Tensor chip.', 'Chip: Google Tensor G2, Màn hình: 6.3 inch OLED, Camera: 50MP chính, Chống nước: IP68', 'img/product10.png', 22, 170, 2, '2025-05-30 23:58:09', '2025-05-30 23:58:09'),
(11, 'Máy ảnh Fujifilm X-T5', 'may-anh-fujifilm-x-t5', 'Máy ảnh Mirrorless phong cách cổ điển.', 40000000.00, NULL, 20, 1, 0, 5, 'Thiết kế hoài cổ, chất lượng hình ảnh xuất sắc với cảm biến X-Trans CMOS 5 HR.', 'Cảm biến: APS-C X-Trans CMOS 5 HR 40.2MP, Video: 6.2K/30p, IBIS: 5 trục', 'img/product11.png', 7, 95, 3, '2025-05-30 23:58:09', '2025-05-30 23:58:09'),
(12, 'Ổ cứng SSD Samsung 970 EVO Plus 1TB', 'o-cung-ssd-samsung-970-evo-plus-1tb', 'Ổ cứng SSD NVMe hiệu suất cao.', 3000000.00, 3500000.00, 150, 0, 15, 5, 'Tăng tốc độ khởi động và tải ứng dụng với hiệu suất đọc/ghi vượt trội.', 'Dung lượng: 1TB, Giao diện: PCIe Gen3.0 x4, Tốc độ đọc: 3500 MB/s, Tốc độ ghi: 3300 MB/s', 'img/product12.png', 50, 301, 4, '2025-05-30 23:58:09', '2025-05-31 00:01:25'),
(13, 'Laptop Asus ROG Zephyrus G14', 'laptop-asus-rog-zephyrus-g14', 'Laptop gaming nhỏ gọn, mạnh mẽ.', 28000000.00, 30000000.00, 30, 1, 7, 4, 'CPU AMD Ryzen và GPU NVIDIA GeForce RTX, màn hình tần số quét cao, thiết kế độc đáo.', 'CPU: AMD Ryzen 9, GPU: NVIDIA GeForce RTX 3060, Màn hình: 14 inch QHD 120Hz', 'img/product13.png', 8, 71, 1, '2025-05-30 23:58:09', '2025-06-06 00:12:44'),
(14, 'Điện thoại OnePlus 10 Pro', 'dien-thoai-oneplus-10-pro', 'Hiệu năng flagship, sạc siêu nhanh.', 18000000.00, 19500000.00, 60, 0, 8, 4, 'Snapdragon 8 Gen 1, sạc SuperVOOC 80W, camera Hasselblad.', 'Chip: Snapdragon 8 Gen 1, Màn hình: 6.7 inch Fluid AMOLED, Sạc: 80W SuperVOOC', 'img/product14.png', 15, 130, 2, '2025-05-30 23:58:09', '2025-05-30 23:58:09'),
(15, 'Máy ảnh Sony Alpha a7 IV', 'may-anh-sony-alpha-a7-iv', 'Máy ảnh Mirrorless full-frame đa năng.', 55000000.00, 58000000.00, 10, 1, 5, 5, 'Cảm biến 33MP, quay video 4K 60p, hệ thống AF tiên tiến.', 'Cảm biến: Full-frame Exmor R CMOS 33MP, Video: 4K 60p, AF: 759 điểm AF', 'img/product15.png', 3, 60, 3, '2025-05-30 23:58:09', '2025-05-30 23:58:09'),
(16, 'Bàn phím cơ Logitech G Pro X', 'ban-phim-co-logitech-g-pro-x', 'Bàn phím chơi game có thể tùy chỉnh.', 3200000.00, NULL, 90, 1, 0, 4, 'Switch GX có thể thay nóng, đèn RGB LIGHTSYNC, thiết kế nhỏ gọn.', 'Switch: GX Clicky/Tactile/Linear, Đèn: RGB, Kết nối: USB', 'img/product16.png', 35, 190, 4, '2025-05-30 23:58:09', '2025-05-30 23:58:09'),
(17, 'Laptop Microsoft Surface Laptop 5', 'laptop-microsoft-surface-laptop-5', 'Laptop thiết kế sang trọng, màn hình cảm ứng.', 20000000.00, 21500000.00, 35, 0, 7, 4, 'Thiết kế cao cấp, hiệu năng ổn định cho công việc văn phòng và giải trí.', 'CPU: Intel Core i5, RAM: 8GB, SSD: 256GB, Màn hình: 13.5 inch PixelSense cảm ứng', 'img/product17.png', 11, 88, 1, '2025-05-30 23:58:09', '2025-05-30 23:58:09'),
(18, 'Điện thoại Xiaomi 12 Pro', 'dien-thoai-xiaomi-12-pro', 'Smartphone Android cao cấp giá phải chăng.', 16000000.00, 17500000.00, 70, 1, 9, 4, 'Snapdragon 8 Gen 1, sạc nhanh 120W, camera 50MP.', 'Chip: Snapdragon 8 Gen 1, Màn hình: 6.73 inch AMOLED, Sạc: 120W HyperCharge', 'img/product18.png', 17, 145, 2, '2025-05-30 23:58:09', '2025-05-30 23:58:09'),
(19, 'Máy ảnh Nikon Z 6II', 'may-anh-nikon-z-6ii', 'Máy ảnh Mirrorless full-frame đáng tin cậy.', 42000000.00, 45000000.00, 12, 0, 7, 4, 'Cảm biến 24.5MP, quay video 4K 60p, hai bộ xử lý EXPEED 6.', 'Cảm biến: Full-frame BSI CMOS 24.5MP, Video: 4K 60p, ISO: 100-51200', 'img/product19.png', 4, 75, 3, '2025-05-30 23:58:09', '2025-05-30 23:58:09'),
(20, 'Chuột gaming Razer DeathAdder V2', 'chuot-gaming-razer-deathadder-v2', 'Chuột gaming phổ biến.', 1500000.00, NULL, 200, 1, 0, 5, 'Cảm biến quang học Focus+ 20K DPI, switch quang học, thiết kế công thái học.', 'DPI: 20000, Switch: Quang học Razer, Nút: 8 nút có thể lập trình', 'img/product20.png', 60, 320, 4, '2025-05-30 23:58:09', '2025-05-30 23:58:09'),
(21, 'Laptop HP Pavilion 15', 'laptop-hp-pavilion-15', 'Laptop phổ thông hiệu suất tốt.', 14000000.00, 15500000.00, 60, 0, 10, 3, 'Phù hợp cho học tập, làm việc văn phòng và giải trí nhẹ.', 'CPU: Intel Core i5, RAM: 8GB, SSD: 512GB, Màn hình: 15.6 inch FHD', 'img/product21.png', 20, 100, 1, '2025-05-30 23:58:09', '2025-05-30 23:58:09'),
(22, 'Điện thoại Vivo X80 Pro', 'dien-thoai-vivo-x80-pro', 'Smartphone với camera Zeiss.', 21000000.00, 23000000.00, 55, 1, 8, 5, 'Hệ thống camera hợp tác với Zeiss, hiệu năng mạnh mẽ, sạc nhanh.', 'Chip: Snapdragon 8 Gen 1, Màn hình: 6.78 inch AMOLED E5, Camera: Zeiss Optics', 'img/product22.png', 14, 160, 2, '2025-05-30 23:58:09', '2025-05-30 23:58:09'),
(23, 'Máy ảnh GoPro HERO11 Black', 'may-anh-gopro-hero11-black', 'Camera hành trình đỉnh cao.', 11000000.00, 12000000.00, 40, 0, 8, 4, 'Quay video 5.3K60, chống rung HyperSmooth 5.0, chống nước 10m.', 'Video: 5.3K60, Ảnh: 27MP, Chống rung: HyperSmooth 5.0, Chống nước: 10m', 'img/product23.png', 9, 105, 3, '2025-05-30 23:58:09', '2025-05-30 23:58:09'),
(24, 'Loa thông minh Amazon Echo Dot (5th Gen)', 'loa-thong-minh-amazon-echo-dot-5th-gen', 'Loa thông minh nhỏ gọn với Alexa.', 1000000.00, NULL, 250, 1, 0, 4, 'Điều khiển nhà thông minh, phát nhạc, tin tức, đặt báo thức.', 'Trợ lý ảo: Alexa, Kết nối: Wi-Fi, Bluetooth, Âm thanh: Loa phía trước', 'img/product24.png', 70, 400, 4, '2025-05-30 23:58:09', '2025-05-30 23:58:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `rating` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('pCpvLiwnxJsBn7bi5IKODMmgtK8EWDVoRkBaXDOt', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36 Edg/137.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoid0haUzhKV1lzMnBxb2tvR2ZVYTNvSDlIV1lWMHpWODQ1NFpWa29jciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9kdWN0cy9kaWVuLXRob2FpLWlwaG9uZS0xMy1wcm8iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1749195254);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mozelle Strosin', 'stracke.cleve@example.net', '2025-05-30 23:58:09', '$2y$12$wnPmK2sZXlTWQ8LlUvSigukgPw0vpWKRmeUdvwffIR9wn95Dw/JW2', '1nsARtZNFO', '2025-05-30 23:58:09', '2025-05-30 23:58:09'),
(2, 'Karli Kunde', 'octavia70@example.org', '2025-05-30 23:58:09', '$2y$12$wnPmK2sZXlTWQ8LlUvSigukgPw0vpWKRmeUdvwffIR9wn95Dw/JW2', 'IQach3Plnx', '2025-05-30 23:58:09', '2025-05-30 23:58:09'),
(3, 'Elvis Schneider', 'ookon@example.org', '2025-05-30 23:58:09', '$2y$12$wnPmK2sZXlTWQ8LlUvSigukgPw0vpWKRmeUdvwffIR9wn95Dw/JW2', 'pIAO3OTM46', '2025-05-30 23:58:09', '2025-05-30 23:58:09'),
(4, 'Miss Myah Schneider', 'cgreenholt@example.net', '2025-05-30 23:58:09', '$2y$12$wnPmK2sZXlTWQ8LlUvSigukgPw0vpWKRmeUdvwffIR9wn95Dw/JW2', 'C4c4TVxK8r', '2025-05-30 23:58:09', '2025-05-30 23:58:09'),
(5, 'Delbert Crooks', 'hgibson@example.com', '2025-05-30 23:58:09', '$2y$12$wnPmK2sZXlTWQ8LlUvSigukgPw0vpWKRmeUdvwffIR9wn95Dw/JW2', '2UzDO2Kd6f', '2025-05-30 23:58:09', '2025-05-30 23:58:09'),
(6, 'Jade Flatley', 'zboncak.ressie@example.net', '2025-05-30 23:58:09', '$2y$12$wnPmK2sZXlTWQ8LlUvSigukgPw0vpWKRmeUdvwffIR9wn95Dw/JW2', 'gzVy3VDumK', '2025-05-30 23:58:09', '2025-05-30 23:58:09'),
(7, 'Wilmer Considine III', 'jeanne.fay@example.net', '2025-05-30 23:58:09', '$2y$12$wnPmK2sZXlTWQ8LlUvSigukgPw0vpWKRmeUdvwffIR9wn95Dw/JW2', 'Rur7Pt6bxd', '2025-05-30 23:58:09', '2025-05-30 23:58:09'),
(8, 'Jabari Wisozk', 'reynolds.kirsten@example.org', '2025-05-30 23:58:09', '$2y$12$wnPmK2sZXlTWQ8LlUvSigukgPw0vpWKRmeUdvwffIR9wn95Dw/JW2', 'XlRVsyHmQ4', '2025-05-30 23:58:09', '2025-05-30 23:58:09'),
(9, 'Mr. Quinn Collier I', 'broderick.lynch@example.net', '2025-05-30 23:58:09', '$2y$12$wnPmK2sZXlTWQ8LlUvSigukgPw0vpWKRmeUdvwffIR9wn95Dw/JW2', 'Jg2k5jjy9W', '2025-05-30 23:58:09', '2025-05-30 23:58:09'),
(10, 'Mr. Erich Torp', 'eleonore52@example.org', '2025-05-30 23:58:09', '$2y$12$wnPmK2sZXlTWQ8LlUvSigukgPw0vpWKRmeUdvwffIR9wn95Dw/JW2', 'U1pkjhFPH9', '2025-05-30 23:58:09', '2025-05-30 23:58:09'),
(11, 'Test User', 'test@example.com', '2025-05-30 23:58:09', '$2y$12$wnPmK2sZXlTWQ8LlUvSigukgPw0vpWKRmeUdvwffIR9wn95Dw/JW2', 'QTkvc27CI1', '2025-05-30 23:58:09', '2025-05-30 23:58:09');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_items_user_id_foreign` (`user_id`),
  ADD KEY `cart_items_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Chỉ mục cho bảng `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_product_id_foreign` (`product_id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_items_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
