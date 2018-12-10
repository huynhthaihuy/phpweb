-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2017 at 08:34 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_banhang`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_customer` int(11) DEFAULT NULL,
  `date_order` date DEFAULT NULL,
  `total` float DEFAULT NULL COMMENT 'tổng tiền',
  `payment` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'hình thức thanh toán',
  `note` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `id_customer`, `date_order`, `total`, `payment`, `note`, `created_at`, `updated_at`) VALUES
(14, 14, '2017-03-23', 160000, 'COD', 'k', '2018-12-10 13:34:05', '2018-12-10 13:34:05'),
(13, 13, '2017-03-21', 400000, 'ATM', 'Vui lòng giao hàng trước 5h', '2018-12-10 13:34:05', '2018-12-10 13:34:05'),
(12, 12, '2017-03-21', 520000, 'COD', 'Vui lòng chuyển đúng hạn', '2018-12-10 13:34:05', '2018-12-10 13:34:05'),
(11, 11, '2017-03-21', 420000, 'COD', 'không chú', '2018-12-10 13:34:05', '2018-12-10 13:34:05'),
(15, 15, '2017-03-24', 220000, 'COD', 'e', '2018-12-10 13:34:05', '2018-12-10 13:34:05');

-- --------------------------------------------------------

--
-- Table structure for table `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_bill` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `quantity` int(11) NOT NULL COMMENT 'số lượng',
  `unit_price` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill_detail`
--

INSERT INTO `bill_detail` (`id`, `id_bill`, `id_product`, `quantity`, `unit_price`, `created_at`, `updated_at`) VALUES
(18, 15, 62, 5, 220000, '2018-12-10 13:34:05', '2018-12-10 13:34:05'),
(17, 14, 2, 1, 160000, '2018-12-10 13:34:05', '2018-12-10 13:34:05'),
(16, 13, 60, 1, 200000, '2018-12-10 13:34:05', '2018-12-10 13:34:05'),
(15, 13, 59, 1, 200000, '2018-12-10 13:34:05', '2018-12-10 13:34:05'),
(14, 12, 60, 2, 200000, '2018-12-10 13:34:05', '2018-12-10 13:34:05'),
(13, 12, 61, 1, 120000, '2018-12-10 13:34:05', '2018-12-10 13:34:05'),
(12, 11, 61, 1, 120000, '2018-12-10 13:34:05', '2018-12-10 13:34:05'),
(11, 11, 57, 2, 150000, '2018-12-10 13:34:05', '2018-12-10 13:34:05');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `gender`, `email`, `address`, `phone_number`, `note`, `created_at`, `updated_at`) VALUES
(15, 'ê', 'Nữ', 'huongnguyen@gmail.com', 'e', 'e', 'e', '2018-12-10 13:34:05', '2018-12-10 13:34:05'),
(14, 'hhh', 'nam', 'huongnguyen@gmail.com', 'Lê thị riêng', '99999999999999999', 'k', '2018-12-10 13:34:05', '2018-12-10 13:34:05'),
(13, 'Hương Hương', 'Nữ', 'huongnguyenak96@gmail.com', 'Lê Thị Riêng, Quận 1', '23456789', 'Vui lòng giao hàng trước 5h', '2018-12-10 13:34:05', '2018-12-10 13:34:05'),
(12, 'Khoa phạm', 'Nam', 'khoapham@gmail.com', 'Lê thị riêng', '1234567890', 'Vui lòng chuyển đúng hạn', '2018-12-10 13:34:05', '2018-12-10 13:34:05'),
(11, 'Hương Hương', 'Nữ', 'huongnguyenak96@gmail.com', 'Lê Thị Riêng, Quận 1', '234567890-', 'không chú', '2018-12-10 13:34:05', '2018-12-10 13:34:05');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'tiêu đề',
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'nội dung',
  `image` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'hình',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `image`, `create_at`, `update_at`) VALUES
(1, 'Mùa trung thu năm nay, Hỷ Lâm Môn muốn gửi đến quý khách hàng sản phẩm mới xuất hiện lần đầu tiên tại Việt nam "Bánh trung thu Bơ Sữa HongKong".', 'Những ý tưởng dưới đây sẽ giúp bạn sắp xếp tủ quần áo trong phòng ngủ chật hẹp của mình một cách dễ dàng và hiệu quả nhất. ', 'sample1.jpg', '2017-03-11 06:20:23', '0000-00-00 00:00:00'),
(2, 'Tư vấn cải tạo phòng ngủ nhỏ sao cho thoải mái và thoáng mát', 'Chúng tôi sẽ tư vấn cải tạo và bố trí nội thất để giúp phòng ngủ của chàng trai độc thân thật thoải mái, thoáng mát và sáng sủa nhất. ', 'sample2.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00'),
(3, 'Đồ gỗ nội thất và nhu cầu, xu hướng sử dụng của người dùng', 'Đồ gỗ nội thất ngày càng được sử dụng phổ biến nhờ vào hiệu quả mà nó mang lại cho không gian kiến trúc. Xu thế của các gia đình hiện nay là muốn đem thiên nhiên vào nhà ', 'sample3.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00'),
(4, 'Hướng dẫn sử dụng bảo quản đồ gỗ, nội thất.', 'Ngày nay, xu hướng chọn vật dụng làm bằng gỗ để trang trí, sử dụng trong văn phòng, gia đình được nhiều người ưa chuộng và quan tâm. Trên thị trường có nhiều sản phẩm mẫu ', 'sample4.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00'),
(5, 'Phong cách mới trong sử dụng đồ gỗ nội thất gia đình', 'Đồ gỗ nội thất gia đình ngày càng được sử dụng phổ biến nhờ vào hiệu quả mà nó mang lại cho không gian kiến trúc. Phong cách sử dụng đồ gỗ hiện nay của các gia đình hầu h ', 'sample5.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_type` int(10) UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `unit_price` float DEFAULT NULL,
  `promotion_price` float DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `new` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `id_type`, `description`, `unit_price`, `promotion_price`, `image`, `unit`, `new`, `created_at`, `updated_at`) VALUES
(1, 'NVX 155 ABS', 3, 'Phiên bản kỷ niệm 20 năm', 52740000, 52540000, '500x400-NVX-Anni-20-years-004.png', 'hộp', 1, '2018-12-10 13:34:05', '22018-12-10 13:34:05'),
(2, 'NVX 155 ABS', 3, '',  52240000,  52040000, '9ae066ee07f9772c5988c40e72de172b.jpg', 'hộp', 1, '2018-12-10 13:34:05', '2018-12-10 13:34:05'),
(3, 'NVX 155 Standard', 3, 'phiên bản tiêu chuẩn', 46240000, 46040000, '1.png', 'hộp', 0, '2018-12-10 13:34:05', '2018-12-10 13:34:05'),
(4, 'NVX 125 Deluxe', 3, 'Phiên bản cao cấp', 40990000, 0, '500x400-8-1.jpg', 'hộp', 0, '2018-12-10 13:34:05', '2018-12-10 13:34:05'),
(5, 'Janus Standard', 5, 'Phiên bản tiêu chuẩn', 27990000, 0, 'black-meta-4.png', 'hộp', 0, '2018-12-10 13:34:05', '2018-12-10 13:34:05'),
(6, 'Janus Premium', 5, 'Phiên bản đặc biệt',  31490000,  31190000, 'matgray4.png', 'hộp', 0, '2018-12-10 13:34:05', '2018-12-10 13:34:05'),
(7, 'Janus Limited', 5, 'Phiên bản giới hạn', 31990000, 0, '500x400-Mat-blue-04.png', 'hộp', 1, '2018-12-10 13:34:05', '2018-12-10 13:34:05'),
(8, 'Exciter 150', 2, 'Phiên bản kỉ niệm 20 năm', 47990000, 47590000, '500x400-4-1.png', 'hộp', 0, '2018-12-10 13:34:05', '2018-12-10 13:34:05'),
(9, 'Exciter 150 Movistar', 2, '', 47990000, 47590000, '500x400-4.png', 'hộp', 0, '2018-12-10 13:34:05', '2018-12-10 13:34:05'),
(11, 'Exciter 150 GP', 2, 'Phiên bản mới', 47490000, 0, '500x400-8.png', 'cái', 0, '2018-12-10 13:34:05', '2018-12-10 13:34:05'),
(12, 'Exciter 150 RC', 2, 'Phiên bản mới', 46990000, 46290000, '500x400-8-1', 'cái', 0, '2018-12-10 13:34:05', '2018-12-10 13:34:05'),
(13, 'Jupiter FI GP', 1, '', 30000000, 0, 'JuGP004.png', 'cái', 1, '2018-12-10 13:34:05', '2018-12-10 13:34:05'),
(14, 'Jupiter FI RC', 1, '', 29400000, 28400000, 'Ju-do-den-004.png', 'cái', 0, '2018-12-10 13:34:05', '2018-12-10 13:34:05'),
(15, 'Jupiter FI RC', 1, '', 29400000, 28400000, 'Ju-trang-do-004.png', 'cái', 1, '2018-12-10 13:34:05', '2018-12-10 13:34:05'),
(16, 'Jupiter FI RC', 1, '', 29400000, 28400000, 'Ju-004.png', 'hộp', 0, '2018-12-10 13:34:05', '2018-12-10 13:34:05'),
(17, 'Sirius FI phanh cơ', 3, '', 20340000, 20240000, '4-20.png', 'cai', 0, '2018-12-10 13:34:05', '2018-12-10 13:34:05'),
(18, 'Sirius FI phanh đĩa', 3, '', 21340000, 0, '4-16.png', 'hộp', 0, '2018-12-10 13:34:05', '2018-12-10 13:34:05'),
(19, 'Sirius FI RC Vành Đúc', 3, '',  23190000, 0, '500x400-Si-RC-den-xam-04.png', 'hộp', 1, '2018-12-10 13:34:05', '2018-12-10 13:34:05'),
(20, 'Sirius FI RC Vành Đúc', 3, 'Phiên bản kỷ niệm 20 năm',  23690000, 0, '500x400-Si-FI-Anni-20-years-004.png', 'hộp', 0, '2018-12-10 13:34:05', '2018-12-10 13:34:05'),
(21, 'Sirius phanh cơ', 3, '', 18800000, 18600000, 'den-do-4.png', 'cái', 0, '2018-12-10 13:34:05', '2018-12-10 13:34:05'),
(22, 'Sirius phanh đĩa', 3, '', 19800000, 19500000, 'Den-4.png', 'hộp', 1, '2018-12-10 13:34:05', '2018-12-10 13:34:05'),
(23, 'Sirius RC vành đúc', 3, '',  21300000, 0, 'cam-den-4.png', 'hộp', 0, '2018-12-10 13:34:05', '2018-12-10 13:34:05'),
(24, 'Sirius RC vành đúc', 3, 'Phiên bản kỷ niệm 20 năm', 21800000, 0, '500x400-Si-Anni-20-years-004.png', 'hộp', 0, '2018-12-10 13:34:05', '2018-12-10 13:34:05'),
(25, 'YZF-R15', 7, '', 92900000, 92300000, '500x400-R15_02.jpg', 'hộp', 0, '2018-12-10 13:34:05', '2018-12-10 13:34:05'),
(26, 'MT-03', 7, '', 139000000, 0, '500x400-4-3.png', 'hộp', 0, '2018-12-10 13:34:05', '2018-12-10 13:34:05'),
(27, 'TFX 150', 7, '', 82900000, 82200000, 'b01.jpg', 'hộp', 0, '2018-12-10 13:34:05', '2018-12-10 13:34:05'),
(28, 'NM-X', 7, '',  82000000, 0, '500x400-2-4.png', 'hộp', 1, '2018-12-10 13:34:05', '2018-12-10 13:34:05'),
(29, 'YZF-R3', 7, '', 139000000, 0, 'web4-1.png', 'hộp', 0, '2018-12-10 13:34:05', '2018-12-10 13:34:05'),
(30, 'SH 300cc', 6, '',269000000 , 267000000 , 'BLACK_165x205_165x205_acf_cropped_165x205_acf_cropped.png', 'cái', 1, '2018-12-10 13:34:05', '2018-12-10 13:34:05'),
(31, 'SH 125cc/150cc', 6, '', 67990000, 67590000, '165x205-1.png', 'cái', 0, '2018-12-10 13:34:05', '2018-12-10 13:34:05'),
(32, 'SH mode 125cc', 6, '',  51490000,  51090000, '165x205_SHM_RED_2-1_165x205_acf_cropped.jpg', 'cái', 0, '2018-12-10 13:34:05', '2018-12-10 13:34:05'),
(33, 'PCX 125cc/150cc', 6, '', 56490000, 56490000, '165x205-01-01_165x205_acf_cropped.png', 'cái', 1, '2018-12-10 13:34:05', '2018-12-10 13:34:05'),
(34, 'PCX HYBRID', 6, '', 89990000, 0, '165x205-2-01_165x205_acf_cropped.png', 'cái', 1, '2018-12-10 13:34:05', '2018-12-10 13:34:05'),
(35, 'Air Blade 125cc', 6, '', 37990000, 0, '165x205_xe_165x205_acf_cropped.png', 'cái', 1, '2018-12-10 13:34:05', '2018-12-10 13:34:05');

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `link` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id`, `link`, `image`) VALUES
(1, '', 'banner1.jpg'),
(2, '', 'banner2.jpg'),
(3, '', 'banner3.jpg'),
(4, '', 'banner4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `type_products`
--

CREATE TABLE `type_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `type_products`
--

INSERT INTO `type_products` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Jupiter', 'Triết lý phát triển dòng xe Jupiter là sự kết hợp giữa sự tiện dụng, kiểu dáng thể thao và có hiệu suất cao. Vì lẽ đó, Jupiter nhanh chóng trở thành một chiếc xe được ưu chuộng với số lượng tiêu thụ mạnh tại thị trường Đông Nam Á.', 'banh-man-thu-vi-nhat-1.jpg', '2018-12-10 13:34:05', '2018-12-10 13:34:05'),
(2, 'Exciter', 'Exciter được Yamaha bán ra trên thị trường Việt Nam từ năm 2005. Hai phiên bản đời đầu là Standard và RC 125cc đã trở thành biểu tượng của xe số trong giai đoạn này.', '20131108144733.jpg', '2018-12-10 13:34:05', '2018-12-10 13:34:05'),
(3, 'Sirious', 'Có thể nói dòng xe Sirius là đại diện tiên phong làm nên danh tiếng của Yamaha, một hãng xe luôn đi đầu trong thiết kế và thường xuyên gợi mở các xu hướng mới.', 'banhtraicay.jpg', '2018-12-10 13:34:05', '2018-12-10 13:34:05'),
(4, 'NVS', '  Hệ thống treo ống lồng được sử dụng, màn hình hiển thị thông tin loại kỹ thuật số và đèn pha cùng đèn hậu sử dụng bóng đèn LED giúp tăng khả năng chiếu sáng và tiết kiệm năng lượng.', 'banhkem.jpg', '2018-12-10 13:34:05', '2018-12-10 13:34:05'),
(5, 'Janus', 'Janus là cái tên mới trong dòng sản phẩm xe ga của Yamaha, hãng xe Nhật định vị cạnh tranh với đối thủ Honda Vision, trong tầm giá dưới 30 triệu đồng, đàn em của Acruzo. Trước khi Janus ra đời, Yamaha còn có Nozza, nhưng mẫu xe này chưa đủ "sức" cạnh tranh với Vision.', 'crepe.jpg', '2018-12-10 13:34:05', '2018-12-10 13:34:05'),
(6, 'SH', 'Hình ảnh những chàng trai cưỡi SH trên phố từng được ví như hoàng tử cưỡi bạch mã. Chiếc xe này một thời được xem là thước đo thể hiện đẳng cấp, địa vị, công việc của nhiều người.', 'pizza.jpg', '2018-12-10 13:34:05', '2018-12-10 13:34:05'),
(7, 'Special', 'Dòng xe đặc biệt có giá thành cao và bắt mắt', 'sukemdau.jpg', '2018-12-10 13:34:05', '2018-12-10 13:34:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `phone`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Huy Huynh', 'ch4ut1nhtr1@gmail.com', '$2y$10$rGY4KT6ZSMmLnxIbmTXrsu2xdgRxm8x0UTwCyYCAzrJ320kYheSRq', '23456789', 'Hoàng Diệu 2', NULL, '2018-12-10 13:34:05', '2018-12-10 13:34:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bills_ibfk_1` (`id_customer`);

--
-- Indexes for table `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_detail_ibfk_2` (`id_product`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id_type_foreign` (`id_type`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_products`
--
ALTER TABLE `type_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `type_products`
--
ALTER TABLE `type_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_id_type_foreign` FOREIGN KEY (`id_type`) REFERENCES `type_products` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
