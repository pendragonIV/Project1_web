-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2023 at 10:39 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `highway_project1`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_description` text NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_description`, `parent_id`) VALUES
(1, 'Trang phục', '', 0),
(2, 'Áo phông', '<p>Phom d&aacute;ng cơ bản tập trung v&agrave;o chất liệu vải cotton định lượng d&agrave;y, đường may được sắc n&eacute;t khiến sản phẩm c&oacute; độ bền cao v&agrave; tạo cảm gi&aacute;c thoải m&aacute;i cho người mặc.</p>\r\n', 1),
(3, 'Áo sơ mi dài tay', '', 1),
(4, 'Phụ kiện', '', 0),
(5, 'Sơ mi ngắn tay', '', 1),
(6, 'Áo polo', '<p>khong</p>\r\n', 1),
(8, 'Áo len', '', 1),
(9, 'Áo khoác', '', 1),
(10, 'Áo Blazer', '', 1),
(11, 'Quần jeans', '', 1),
(14, 'Balo', '', 4),
(18, 'Quần vải', '', 1),
(19, 'Tất', '', 4);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(10) UNSIGNED NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_phone` varchar(20) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_phone`, `customer_address`, `customer_email`) VALUES
(1, 'khogn co gi', '23123123', 'dia chi test', 'dinhanh.2303@gmail.com'),
(2, 'Nguyễn Đình Anha', '23123123', 'asda', 'admin02@gmail.com'),
(17, 'Nguyễn Đình Anh', '0859237866', 'Hà Đông', 'admin02@gmail.com'),
(19, 'Đoàn Trung Kiên', '085944444', 'asda', 'admin02@gmail.com'),
(20, 'Đinh Phương Nam', '0123456789', 'Gia Lâm', 'nam@gmail.com'),
(21, 'Nam', '34353442', 'Chau Quy', 'nam@gmail.com'),
(22, 'Son', '32342', 'dsd', 'son@gmail.com'),
(23, 'Thay huy', '23434232', 'ddda', 'huynv@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `receipt_id` int(10) UNSIGNED NOT NULL,
  `product_detail_id` int(10) UNSIGNED NOT NULL,
  `product_amount` int(11) NOT NULL,
  `recent_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`receipt_id`, `product_detail_id`, `product_amount`, `recent_price`) VALUES
(1, 13, 1, 167200),
(1, 14, 2, 167200),
(2, 9, 1, 510400),
(17, 318, 1, 432000),
(17, 343, 1, 500500),
(17, 344, 1, 500500),
(19, 395, 1, 280000),
(20, 359, 1, 500500),
(20, 360, 1, 500500),
(20, 388, 3, 198900),
(21, 372, 1, 544000),
(21, 391, 1, 198900),
(21, 396, 1, 280000),
(22, 384, 1, 198000),
(22, 385, 1, 198900),
(22, 399, 1, 280000),
(23, 359, 1, 500500),
(23, 362, 1, 301600),
(23, 392, 1, 198900);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` int(10) UNSIGNED NOT NULL,
  `product_featured` int(1) NOT NULL,
  `product_description` text NOT NULL,
  `product_promotion` int(2) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_price`, `product_featured`, `product_description`, `product_promotion`, `category_id`) VALUES
(1, 'SƠ MI NGẮN TAY PREMIUM - DARWIN - RELAXED FIT - ĐEN', 680000, 1, '', 10, 5),
(2, 'SƠ MI CUBAN - DUSTY BROWN - REGULAR FIT - NÂU', 580000, 1, '', 20, 5),
(3, 'SƠ MI CUBAN - HALFTONE FLOWER - REGULAR FIT - ĐEN', 580000, 0, '', 12, 5),
(4, 'ÁO PHÔNG - SIMON - SLIM FIT - RÊU', 380000, 1, '<p>- Sử dụng chất vải 100% Cotton thấm h&uacute;t mồ h&ocirc;i tốt.</p>\r\n\r\n<p>- Form &aacute;o Slimfit vừa vặn, &ocirc;m d&aacute;ng nhẹ nh&agrave;ng.</p>\r\n\r\n<p>- Lưu &yacute;: Giặt m&aacute;y ở chế độ nhẹ để sản phẩm được bền l&acirc;u</p>\r\n\r\n<p>- Sản xuất tại Việt Nam</p>\r\n', 56, 2),
(5, 'ÁO POLO PREMIUM - ASTON - SLIM FIT - TRẮNG', 680000, 1, '<p>NGƯỜI MẪU: 182CM 65KG</p>\r\n\r\n<p>K&Iacute;CH CỠ &Aacute;O: XL</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>- Giặt tay.</p>\r\n\r\n<p>- Lộn tr&aacute;i sản phẩm khi giặt.</p>\r\n\r\n<p>- Kh&ocirc;ng d&ugrave;ng c&aacute;c chất tẩy.</p>\r\n\r\n<p>- Kh&ocirc;ng ng&acirc;m sản phẩm qu&aacute; l&acirc;u.</p>\r\n\r\n<p>- C&oacute; thể bị phai m&agrave;u, kh&ocirc;ng giặt chung với sản phẩm c&oacute; m&agrave;u sắc kh&aacute;c.</p>\r\n\r\n<p>- Kh&ocirc;ng giặt kh&ocirc;.</p>\r\n\r\n<p>- Giặt nhiệt độ thấp dưới 30 độ C.</p>\r\n\r\n<p>- Phơi thường kh&ocirc;ng sấy, tr&aacute;nh &aacute;nh nắng trực tiếp.</p>\r\n\r\n<p>- Giũ phẳng sản phẩm khi phơi.</p>\r\n\r\n<p>- L&agrave; (ủi) sản phẩm ở nhiệt độ thấp.</p>\r\n', 56, 6),
(6, 'SƠ MI CUBAN - PANSY - REGULAR FIT - ĐEN HOA', 590000, 0, '', 0, 5),
(8, 'ÁO TANKTOP - MATTHEW - REGULAR FIT - ĐEN', 250000, 0, '<p>- Chất vải cotton pha PE với khả năng thấm h&uacute;t mồ h&ocirc;i tốt.</p>\r\n\r\n<p>- Thiết kế với phom regular vừa vặn cho mọi d&aacute;ng người, sản phẩm gồm 4 m&agrave;u: đen, ghi, trắng xước v&agrave; trắng để bạn c&oacute; nhiều lựa chọn cho những ng&agrave;y h&egrave;.</p>\r\n\r\n<p>- Sản xuất tại Việt Nam</p>\r\n', 10, 2),
(9, 'ÁO TANKTOP - MATTHEW - REGULAR FIT - TRẮNG', 250000, 0, '<p>- Chất vải cotton pha PE với khả năng thấm h&uacute;t mồ h&ocirc;i tốt.</p>\r\n\r\n<p>- Thiết kế với phom regular vừa vặn cho mọi d&aacute;ng người, bảng m&agrave;u đa dạng cho những ng&agrave;y h&egrave;.</p>\r\n\r\n<p>- Lưu &yacute;:&nbsp;Giặt m&aacute;y ở chế độ nhẹ để sản phẩm được bền l&acirc;u</p>\r\n\r\n<p>- Sản xuất tại Việt Nam</p>\r\n', 10, 2),
(10, 'ÁO IN - FOOL FOR YOU - REGULAR FIT - TRẮNG', 420000, 0, '<p>- Chất liệu 100% Cotton USA mang ưu điểm về độ bền v&agrave; thấm h&uacute;t mồ h&ocirc;i tốt.<br />\r\n- C&ocirc;ng nghệ in lụa sắc n&eacute;t.<br />\r\n- H&igrave;nh in được thiết kế ri&ecirc;ng bởi Artist.&nbsp;<br />\r\n- Lưu &yacute;: Giặt m&aacute;y ở chế độ nhẹ để sản phẩm được bền l&acirc;u.&nbsp;<br />\r\n- Sản xuất tại Việt Nam</p>\r\n', 10, 2),
(11, 'ÁO IN - FOOL FOR YOU - REGULAR FIT - ĐEN', 420000, 0, '<p>- Chất liệu 100% Cotton USA mang ưu điểm về độ bền v&agrave; thấm h&uacute;t mồ h&ocirc;i tốt.<br />\r\n- C&ocirc;ng nghệ in lụa sắc n&eacute;t.<br />\r\n- H&igrave;nh in được thiết kế ri&ecirc;ng bởi Artist.&nbsp;<br />\r\n- Lưu &yacute;: Giặt m&aacute;y ở chế độ nhẹ để sản phẩm được bền l&acirc;u.&nbsp;<br />\r\n- Sản xuất tại Việt Nam</p>\r\n', 10, 2),
(12, 'ÁO IN - CUPID - REGULAR FIT - ĐEN', 420000, 0, '<p>- Chất liệu 100% Cotton USA mang ưu điểm về độ bền v&agrave; thấm h&uacute;t mồ h&ocirc;i tốt.<br />\r\n- C&ocirc;ng nghệ in lụa sắc n&eacute;t.<br />\r\n- H&igrave;nh in được thiết kế ri&ecirc;ng bởi Artist.<br />\r\n- Lưu &yacute;: Giặt m&aacute;y ở chế độ nhẹ để sản phẩm được bền l&acirc;u.<br />\r\n- Sản xuất tại Việt Nam</p>\r\n', 10, 2),
(13, 'ÁO IN - CUPID - REGULAR FIT - TRẮNG', 420000, 0, '<p>- Chất liệu 100% Cotton USA mang ưu điểm về độ bền v&agrave; thấm h&uacute;t mồ h&ocirc;i tốt.<br />\r\n- C&ocirc;ng nghệ in lụa sắc n&eacute;t.<br />\r\n- H&igrave;nh in được thiết kế ri&ecirc;ng bởi Artist.<br />\r\n- Lưu &yacute;: Giặt m&aacute;y ở chế độ nhẹ để sản phẩm được bền l&acirc;u.<br />\r\n- Sản xuất tại Việt Nam.</p>\r\n', 10, 2),
(14, 'ÁO IN - JUST KISS ME - REGULAR FIT - ĐEN', 380000, 0, '<p>- Chất liệu 100% Cotton USA mang ưu điểm về độ bền v&agrave; thấm h&uacute;t mồ h&ocirc;i tốt.<br />\r\n- C&ocirc;ng nghệ in lụa sắc n&eacute;t.<br />\r\n- H&igrave;nh in được thiết kế ri&ecirc;ng bởi Artist.<br />\r\n- Lưu &yacute;: Giặt m&aacute;y ở chế độ nhẹ để sản phẩm được bền l&acirc;u.<br />\r\n- Sản xuất tại Việt Nam</p>\r\n', 10, 2),
(15, 'ÁO IN - JUST KISS ME - REGULAR FIT - TRẮNG', 380000, 0, '<p>- Chất liệu 100% Cotton USA mang ưu điểm về độ bền v&agrave; thấm h&uacute;t mồ h&ocirc;i tốt.<br />\r\n- C&ocirc;ng nghệ in lụa sắc n&eacute;t.<br />\r\n- H&igrave;nh in được thiết kế ri&ecirc;ng bởi Artist.<br />\r\n- Lưu &yacute;: Giặt m&aacute;y ở chế độ nhẹ để sản phẩm được bền l&acirc;u.<br />\r\n- Sản xuất tại Việt Nam</p>\r\n', 10, 2),
(16, 'ÁO PHÔNG - SIMON - SLIM FIT - XANH ĐẬM', 380000, 1, '<p>- Sử dụng chất vải 100% Cotton thấm h&uacute;t mồ h&ocirc;i tốt.</p>\r\n\r\n<p>- Form &aacute;o Slimfit vừa vặn, &ocirc;m d&aacute;ng nhẹ nh&agrave;ng.</p>\r\n\r\n<p>- Lưu &yacute;: Giặt m&aacute;y ở chế độ nhẹ để sản phẩm được bền l&acirc;u</p>\r\n\r\n<p>- Sản xuất tại Việt Nam</p>\r\n', 56, 2),
(17, 'TẤT COTTON CAO CỔ - ĐEN', 80000, 0, '', 10, 19),
(18, 'TẤT COTTON CAO CỔ - TRẮNG', 80000, 0, '', 10, 19),
(19, 'TẤT COTTON NGẮN CỔ 3 ĐÔI - ĐEN/TRẮNG/GHI', 180000, 0, '', 20, 19),
(20, 'TẤT COTTON NGẮN CỔ 3 ĐÔI - GHI/NÂU/XANH', 180000, 0, '', 20, 19),
(21, 'TẤT COTTON CAO CỔ - GHI ĐẬM', 120000, 0, '', 20, 19),
(22, 'TẤT COTTON CAO CỔ - GHI NHẠT', 120000, 0, '', 20, 19),
(23, 'QUẦN KAKI - ETHAN - RELAXED FIT - TRẮNG', 650000, 0, '', 30, 18),
(24, 'QUẦN LINEN - XANDER - RELAXED FIT - GHI', 480000, 0, '', 20, 18),
(25, 'QUẦN LINEN - XANDER - RELAXED FIT - TRẮNG', 480000, 0, '', 20, 18),
(26, 'QUẦN VẢI - BENNET - REGULAR FIT - ĐEN', 650000, 0, '', 40, 18),
(27, 'QUẦN VẢI - LIAM - RELAXED FIT - XANH ĐẬM', 650000, 0, '', 40, 18),
(28, 'QUẦN VẢI - LIAM - RELAXED FIT - ĐEN', 650000, 0, '', 40, 18),
(29, 'QUẦN KAKI - ETHAN - RELAXED FIT - ĐEN', 650000, 0, '', 35, 18),
(30, 'QUẦN KAKI - ETHAN - RELAXED FIT - RÊU', 650000, 0, '', 35, 18),
(31, 'QUẦN VẢI - LUCA - SLIM FIT - GHI', 580000, 0, '', 30, 18),
(32, 'QUẦN VẢI - BENJI - LOOSE FIT - ĐEN', 580000, 0, '', 35, 18),
(33, 'QUẦN VẢI - ASH - CROPPED FIT - ĐEN', 580000, 0, '<p>- Chất liệu vải sợi tổng hợp pha sợi PE gi&uacute;p &aacute;o c&oacute; khả năng chống nhăn tốt, nhanh kh&ocirc;.</p>\r\n\r\n<p>- Quần thiết kế theo form cropped mang sự trẻ trung, năng động.</p>\r\n\r\n<p>- Sản xu&aacute;t tại Việt Nam.</p>\r\n', 35, 18),
(34, 'QUẦN VẢI - RINGO - CROPPED FIT', 450000, 0, '<p>- Chất liệu vải sợi tổng hợp pha sợi PE gi&uacute;p &aacute;o c&oacute; khả năng chống nhăn tốt, nhanh kh&ocirc; gi&uacute;p c&aacute;c thiết kế quần vải lu&ocirc;n giữ đ&uacute;ng phom d&aacute;ng.</p>\r\n\r\n<p>- Quần thiết kế theo form cropped mang sự trẻ trung, năng động.</p>\r\n', 20, 18),
(35, 'QUẦN VẢI - CODY - REGULAR FIT - ĐEN', 580000, 0, '<p>- Chất liệu vải sợi tổng hợp pha sợi PE gi&uacute;p &aacute;o c&oacute; khả năng chống nhăn tốt, nhanh kh&ocirc; gi&uacute;p c&aacute;c thiết kế quần vải lu&ocirc;n giữ đ&uacute;ng phom d&aacute;ng.</p>\r\n\r\n<p>- Sản phẩm được sản xuất theo form regular đảm bảo sự trẻ trung v&agrave; lịch sự để bạn c&oacute; thể mặc đi l&agrave;m.</p>\r\n\r\n<p>- Sản xuất tại Việt Nam.</p>\r\n', 35, 18),
(36, 'QUẦN VẢI - LUCA - SLIM FIT - ĐEN', 580000, 0, '<p>- Chất liệu vải cao cấp được nhập khẩu từ H&agrave;n Quốc.</p>\r\n\r\n<p>- Chất liệu vải sợi tổng hợp pha sợi PE gi&uacute;p quần c&oacute; khả năng chống nhăn tốt, nhanh kh&ocirc;.</p>\r\n\r\n<p>- Sản xuất tại Việt Nam.</p>\r\n', 40, 18),
(37, 'QUẦN BÒ - ROWDY - SLIM FIT - XANH ĐẬM', 750000, 0, '<p>- Chất liệu : 71% cotton Organic + 27% Polyester t&aacute;i chế nhập khẩu từ Bettercotton.</p>\r\n\r\n<p>- Form quần Slimfit vừa vặn, t&ocirc;n d&aacute;ng</p>\r\n\r\n<p>- Lưu &yacute;: Giặt m&aacute;y ở chế độ nhẹ để sản phẩm được bền l&acirc;u</p>\r\n\r\n<p>- Sản xuất tại Việt Nam</p>\r\n', 35, 11),
(38, 'QUẦN BÒ - ROWDY - SLIM FIT - XANH NHẠT', 750000, 0, '<p>- Chất liệu : 71% cotton Organic + 27% Polyester t&aacute;i chế nhập khẩu từ Bettercotton.</p>\r\n\r\n<p>- Form quần Slimfit vừa vặn, t&ocirc;n d&aacute;ng</p>\r\n\r\n<p>- Lưu &yacute;: Giặt m&aacute;y ở chế độ nhẹ để sản phẩm được bền l&acirc;u</p>\r\n\r\n<p>- Sản xuất tại Việt Nam</p>\r\n', 35, 11),
(39, 'QUẦN BÒ - IGGY - LOOSE FIT - XANH RÁCH', 690000, 0, '<p>- Chất liệu 100% Cotton định lượng 12Oz c&ugrave;ng form d&aacute;ng Loose thoải m&aacute;i, trẻ trung.</p>\r\n\r\n<p>- Lưu &yacute;: Giặt m&aacute;y ở chế độ nhẹ để sản phẩm được bền l&acirc;u</p>\r\n\r\n<p>- Sản xuất tại Việt Nam</p>\r\n', 42, 11),
(40, 'QUẦN BÒ - IGGY - LOOSE FIT - XANH TRƠN', 690000, 0, '<p>- Chất liệu 100% Cotton định lượng 12Oz c&ugrave;ng form d&aacute;ng Loose thoải m&aacute;i, trẻ trung.</p>\r\n\r\n<p>- Lưu &yacute;: Giặt m&aacute;y ở chế độ nhẹ để sản phẩm được bền l&acirc;u</p>\r\n\r\n<p>- Sản xuất tại Việt Nam</p>\r\n', 42, 11),
(41, 'QUẦN BÒ - BLAKE - SKINNY FIT - GHI MÀI', 650000, 0, '<p>- Kết hợp giữa chất liệu cotton &amp; elastane- một trong những th&agrave;nh phần tốt nhất trong c&ocirc;ng nghệ sản xuất quần jeans. Với độ đ&agrave;n hồi vừa phải v&agrave; bền m&agrave;u tốt.</p>\r\n\r\n<p>- Phom d&aacute;ng &ocirc;m vừa vặn</p>\r\n\r\n<p>- Quần thiết kế basic ph&ugrave; hợp để vừa mặc đi l&agrave;m hay đi chơi.</p>\r\n\r\n<p>- Lưu &yacute;: Giặt tay nhẹ nh&agrave;ng, giặt ri&ecirc;ng m&agrave;u tối.</p>\r\n\r\n<p>- Sản xuất tại Việt Nam</p>\r\n', 32, 11),
(42, 'QUẦN BÒ - KAI - SLIM FIT - ĐEN TRƠN', 590000, 0, '<p>- Kết hợp giữa chất liệu cotton &amp; elastane - một trong những th&agrave;nh phần tốt nhất trong c&ocirc;ng nghệ sản xuất quần jeans. Với độ đ&agrave;n hồi vừa phải v&agrave; bền m&agrave;u tốt.</p>\r\n\r\n<p>- Phom d&aacute;ng &ocirc;m vừa vặn.</p>\r\n\r\n<p>- Quần thiết kế basic ph&ugrave; hợp để vừa mặc đi l&agrave;m hay đi chơi.</p>\r\n\r\n<p>- Sản xuất tại Việt Nam.</p>\r\n', 40, 11),
(43, 'QUẦN BÒ - WILDER - SLIMFIT - XANH NHẠT', 650000, 0, '<p>- Kết hợp giữa chất liệu cotton &amp; elastane- một trong những th&agrave;nh phần tốt nhất trong c&ocirc;ng nghệ sản xuất quần jeans. Với độ đ&agrave;n hồi vừa phải v&agrave; bền m&agrave;u tốt.</p>\r\n\r\n<p>- Phom&nbsp;d&aacute;ng &ocirc;m vừa vặn.</p>\r\n\r\n<p>- Quần s&aacute;ng m&agrave;u mang sự trẻ trung, c&aacute; t&iacute;nh, kh&aacute;c biệt so với c&aacute;c thiết kế quần jeans th&ocirc;ng thường.</p>\r\n\r\n<p>- Sản xuất tại Việt Nam.</p>\r\n', 30, 11),
(44, 'QUẦN BÒ - LEANDER - SLIMFIT - XANH ĐẬM', 650000, 0, '<p>- Kết hợp giữa chất liệu cotton &amp; elastane- một trong những th&agrave;nh phần tốt nhất trong c&ocirc;ng nghệ sản xuất quần jeans. Với độ đ&agrave;n hồi vừa phải v&agrave; bền m&agrave;u tốt.</p>\r\n\r\n<p>- Phom d&aacute;ng &ocirc;m vừa vặn.</p>\r\n\r\n<p>- Quần s&aacute;ng m&agrave;u mang sự trẻ trung, c&aacute; t&iacute;nh, kh&aacute;c biệt so với c&aacute;c thiết kế quần jeans th&ocirc;ng thường.</p>\r\n', 30, 11),
(45, 'QUẦN BÒ - KAI - SLIM FIT - ĐEN RÁCH', 590000, 0, '<p>- Kết hợp giữa chất liệu cotton &amp; elastane - một trong những th&agrave;nh phần tốt nhất trong c&ocirc;ng nghệ sản xuất quần jeans. Với độ đ&agrave;n hồi vừa phải v&agrave; bền m&agrave;u tốt.</p>\r\n\r\n<p>- Phom d&aacute;ng &ocirc;m vừa vặn.</p>\r\n\r\n<p>- Quần thiết kế basic ph&ugrave; hợp để vừa mặc đi l&agrave;m hay đi chơi.</p>\r\n\r\n<p>- Sản xuất tại Việt Nam.</p>\r\n', 32, 11),
(46, 'ÁO BLAZER - HARRIS - CROPPED FIT - GHI', 1380000, 0, '<p>- Vải wool pha polyester H&agrave;n Quốc với đặc t&iacute;nh mềm mại, &iacute;t nhăn, bền v&agrave; d&agrave;y dặn. Mặc l&ecirc;n tạo cảm gi&aacute;c nhẹ nh&agrave;ng, thoải m&aacute;i. C&oacute; độ co gi&atilde;n v&agrave; độ đ&agrave;n hồi cao. C&oacute; khả năng h&uacute;t ẩm.&nbsp;<br />\r\n- Thiết kế c&uacute;c ch&eacute;o lạ mắt, thời trang.&nbsp;<br />\r\n- Sản xuất 100% tại Việt Nam<br />\r\n- Lưu &yacute;: N&ecirc;n giặt kh&ocirc;, kh&ocirc;ng d&ugrave;ng c&aacute;c chất tẩy mạnh để đảm bảo chất lượng &aacute;o</p>\r\n', 13, 10),
(47, 'ÁO BLAZER - HARRIS - CROPPED FIT - ĐEN', 1380000, 0, '<p>- Vải wool pha polyester H&agrave;n Quốc với đặc t&iacute;nh mềm mại, &iacute;t nhăn, bền v&agrave; d&agrave;y dặn. Mặc l&ecirc;n tạo cảm gi&aacute;c nhẹ nh&agrave;ng, thoải m&aacute;i. C&oacute; độ co gi&atilde;n v&agrave; độ đ&agrave;n hồi cao. C&oacute; khả năng h&uacute;t ẩm.&nbsp;<br />\r\n- Thiết kế c&uacute;c ch&eacute;o lạ mắt, thời trang.&nbsp;<br />\r\n- Sản xuất 100% tại Việt Nam<br />\r\n- Lưu &yacute;: N&ecirc;n giặt kh&ocirc;, kh&ocirc;ng d&ugrave;ng c&aacute;c chất tẩy mạnh để đảm bảo chất lượng &aacute;o</p>\r\n', 13, 10),
(48, 'ÁO BLAZER - LIAM - REGULAR FIT - ĐEN', 1690000, 0, '<p>- Vải wool pha polyester H&agrave;n Quốc với đặc t&iacute;nh mềm mại, &iacute;t nhăn, bền v&agrave; d&agrave;y dặn. Mặc l&ecirc;n tạo cảm gi&aacute;c nhẹ nh&agrave;ng, thoải m&aacute;i. C&oacute; độ co gi&atilde;n v&agrave; độ đ&agrave;n hồi cao. C&oacute; khả năng h&uacute;t ẩm.&nbsp;<br />\r\n- Kh&ocirc;ng chứa Formaldehyde g&acirc;y k&iacute;ch ứng cho da<br />\r\n- Sản xuất 100% tại Việt Nam<br />\r\n- Lưu &yacute;: N&ecirc;n giặt kh&ocirc;, kh&ocirc;ng d&ugrave;ng c&aacute;c chất tẩy mạnh để đảm bảo chất lượng &aacute;o</p>\r\n', 17, 10),
(49, 'ÁO BLAZER - GARRETT - SLIMFIT - GHI SÁNG', 1590000, 1, '', 25, 10),
(50, 'ÁO BLAZER - ARMEL - REGULAR FIT - HOUNDSTOOTH', 1390000, 0, '<p>-&nbsp;Chất liệu Wool tổng hợp với hoạ tiết Houndstooth h&uacute;t mắt, ph&ugrave; hợp cho những buổi họp mặt hay tiệc quan trọng.&nbsp;<br />\r\n- Lưu &yacute;: Giặt kh&ocirc; để sản phẩm được bền l&acirc;u<br />\r\n- Sản xuất tại Việt Nam</p>\r\n', 14, 10),
(51, 'ÁO BLAZER - ARMEL - REGULAR FIT - XANH GHI', 1390000, 0, '<p>- Vải wool pha polyester H&agrave;n Quốc với đặc t&iacute;nh mềm mại, &iacute;t nhăn, bền v&agrave; d&agrave;y dặn. Mặc l&ecirc;n tạo cảm gi&aacute;c nhẹ nh&agrave;ng, thoải m&aacute;i. C&oacute; độ co gi&atilde;n v&agrave; độ đ&agrave;n hồi cao. C&oacute; khả năng h&uacute;t ẩm.&nbsp;<br />\r\n- Kh&ocirc;ng chứa Formaldehyde g&acirc;y k&iacute;ch ứng cho da<br />\r\n- Sản xuất 100% tại Việt Nam<br />\r\n- Lưu &yacute;: N&ecirc;n giặt kh&ocirc;, kh&ocirc;ng d&ugrave;ng c&aacute;c chất tẩy mạnh để đảm bảo chất lượng &aacute;o</p>\r\n', 14, 10),
(52, 'ÁO BLAZER - LIAM - REGULAR FIT - XANH ĐẬM', 1690000, 0, '<p>- Vải wool pha polyester H&agrave;n Quốc với đặc t&iacute;nh mềm mại, &iacute;t nhăn, bền v&agrave; d&agrave;y dặn. Mặc l&ecirc;n tạo cảm gi&aacute;c nhẹ nh&agrave;ng, thoải m&aacute;i. C&oacute; độ co gi&atilde;n v&agrave; độ đ&agrave;n hồi cao. C&oacute; khả năng h&uacute;t ẩm.<br />\r\n- Kh&ocirc;ng chứa Formaldehyde g&acirc;y k&iacute;ch ứng cho da<br />\r\n- Sản xuất 100% tại Việt Nam<br />\r\n- Lưu &yacute;: N&ecirc;n giặt kh&ocirc;, kh&ocirc;ng d&ugrave;ng c&aacute;c chất tẩy mạnh để đảm bảo chất lượng &aacute;o</p>\r\n', 17, 10),
(53, 'ÁO BLAZER - OSBORN - REGULAR FIT', 1680000, 0, '<p>- Blazer Osborn thiết kế lạ mắt với phần c&uacute;c bấm v&agrave; kh&oacute;a zip ở hai t&uacute;i &aacute;o mang đến trải nghiệm mới lạ cho kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p>- Sản xuất tại Việt Nam</p>\r\n', 17, 10),
(54, 'ÁO BLAZER - GRAYSON - VẠT CHÉO - RELAXED FIT - ĐEN', 1590000, 0, '<p>- Chất liệu vải sợi tổng hợp pha len nhập khẩu từ H&agrave;n Quốc c&ugrave;ng kiểu d&aacute;ng vạt ch&eacute;o lạ mắt khiến c&aacute;c set đồ trở n&ecirc;n mới mẻ v&agrave; kh&aacute;c biệt.</p>\r\n\r\n<p>- Phom regular dễ mặc v&agrave; đặc biệt ph&ugrave; hợp với người ch&acirc;u &Aacute;.</p>\r\n\r\n<p>- Sản xuất tại Việt Nam.</p>\r\n', 18, 10),
(55, 'ÁO KHOÁC - WALTER - RELAXED FIT - KẺ GHI', 1450000, 1, '<p>- Với chất liệu Wool blend nhập khẩu chống nhăn v&agrave; giữ ấm tốt trong những ng&agrave;y lạnh s&acirc;u.&nbsp;<br />\r\n- Form d&aacute;ng Relaxed thoải m&aacute;i, c&oacute; thể mặc nhiều &aacute;o ph&iacute;a trong.&nbsp;<br />\r\n- Lưu &yacute;: Giặt kh&ocirc; để sản phẩm được bền l&acirc;u.&nbsp;<br />\r\n- Sản xuất tại Việt Nam</p>\r\n', 10, 9),
(57, 'ÁO KHOÁC - WALLACE - REGULAR FIT - ĐEN', 1280000, 1, '<p>- Vải poly spandex c&oacute; khả năng co gi&atilde;n tốt nhất tr&ecirc;n thị trường, t&iacute;nh thẩm mỹ cao, tho&aacute;ng kh&iacute;<br />\r\n- Chất liệu mềm, nhẹ nhưng bền v&agrave; dẻo dai. Kh&ocirc;ng bị th&ocirc; cứng, x&ugrave; l&ocirc;ng sau nhiều lần giặt<br />\r\n- &Iacute;t g&acirc;y k&iacute;ch ứng da<br />\r\n- Sản xuất 100% tại Việt Nam<br />\r\n- Lưu &yacute;: N&ecirc;n giặt kh&ocirc;, kh&ocirc;ng d&ugrave;ng c&aacute;c chất tẩy mạnh để đảm bảo chất lượng &aacute;o</p>\r\n', 30, 9),
(58, 'ÁO KHOÁC - VINCENT - REGULAR FIT - ĐEN DA LỘN', 1280000, 0, '<p>- L&agrave;m từ chất liệu Faux da lộn với ưu điểm về khả năng đ&agrave;n hồi, độ bền k&eacute;o, chịu m&agrave;i m&ograve;n v&agrave; độ bền m&agrave;u.</p>\r\n\r\n<p>- Được xử l&yacute; kỹ thuật ch&agrave; nh&aacute;m v&agrave; đ&aacute;nh b&oacute;ng n&ecirc;n đạt được độ mềm mịn đặc trưng khi mặc, &iacute;t g&acirc;y k&iacute;ch ứng, th&acirc;n thiện với mọi loại da</p>\r\n\r\n<p>- Nửa dưới th&acirc;n &aacute;o l&agrave;m từ vải Polyester pha spandex, tạo khả năng co gi&atilde;n tốt, t&iacute;nh thẩm mỹ cao, tho&aacute;ng kh&iacute; tuyệt vời</p>\r\n', 14, 9),
(59, 'ÁO KHOÁC - ORLANDO - REGULAR FIT - MOSSY GREEN', 1280000, 1, '<p>Orlando jacket được Highway Menswear sản xuất với chất liệu d&agrave;y dặn, ấm &aacute;p khi mặc. C&ugrave;ng thiết kế mang n&eacute;t ph&oacute;ng kho&aacute;ng, trẻ trung nhưng cũng kh&ocirc;ng k&eacute;m phần lịch sự, chắc chắn đ&acirc;y l&agrave; lựa chọn v&ocirc; c&ugrave;ng tinh tế cho bạn trong m&ugrave;a đ&ocirc;ng n&agrave;y.</p>\r\n', 38, 9),
(60, 'ÁO KHOÁC - ORLANDO - REGULAR FIT - HIDDEN SPARK', 1280000, 0, '<p>Orlando jacket được Highway Menswear sản xuất với chất liệu d&agrave;y dặn, ấm &aacute;p khi mặc. C&ugrave;ng thiết kế mang n&eacute;t ph&oacute;ng kho&aacute;ng, trẻ trung nhưng cũng kh&ocirc;ng k&eacute;m phần lịch sự, chắc chắn đ&acirc;y l&agrave; lựa chọn v&ocirc; c&ugrave;ng tinh tế cho bạn trong m&ugrave;a đ&ocirc;ng n&agrave;y.</p>\r\n', 38, 9),
(61, 'TEDDY JACKET - VINCENT - REGULAR FIT - ĐEN', 1150000, 0, '<p>-&nbsp;Vincent Teddy Jacket với chất liệu ch&iacute;nh l&agrave; vải gto phối da lộn được l&oacute;t bằng một lớp lụa d&agrave;y gi&uacute;p giữ ấm tốt cho m&ugrave;a thu đ&ocirc;ng.</p>\r\n\r\n<p>- Sản xuất tại Việt Nam.</p>\r\n', 31, 9),
(62, 'ÁO LEN - SCOUT - CỔ TRÒN - REGULAR FIT - ĐEN', 420000, 0, '<p>- Scout mang thiết kế đơn giản, m&agrave;u sắc trung t&iacute;nh c&ugrave;ng mẫu m&atilde; đa dạng gi&uacute;p bạn c&oacute; thật nhiều lựa chọn khi phối đồ.</p>\r\n\r\n<p>- Sở hữu chất len mềm mại, khả năng giữ ấm tốt v&agrave; mức gi&aacute; v&ocirc; c&ugrave;ng hợp l&yacute; th&igrave; chắc chắn đ&acirc;y l&agrave; sản phẩm bạn kh&oacute; c&oacute; thể bỏ qua trong m&ugrave;a đ&ocirc;ng n&agrave;y.</p>\r\n\r\n<p>- Sản xuất tại Việt Nam.</p>\r\n', 30, 8),
(63, 'ÁO LEN - SCOUT - CỔ LỌ - REGULAR FIT - ĐEN', 420000, 0, '<p>- Scout mang thiết kế đơn giản, m&agrave;u sắc trung t&iacute;nh c&ugrave;ng mẫu m&atilde; đa dạng gi&uacute;p bạn c&oacute; thật nhiều lựa chọn khi phối đồ.</p>\r\n\r\n<p>- Sở hữu chất len mềm mại, khả năng giữ ấm tốt v&agrave; mức gi&aacute; v&ocirc; c&ugrave;ng hợp l&yacute; th&igrave; chắc chắn đ&acirc;y l&agrave; sản phẩm bạn kh&oacute; c&oacute; thể bỏ qua trong m&ugrave;a đ&ocirc;ng n&agrave;y.</p>\r\n\r\n<p>- Sản xuất tại Việt Nam.</p>\r\n', 30, 8),
(64, 'ÁO LEN - SCOUT - CỔ TRÒN - REGULAR FIT - GHI NHẠT', 420000, 0, '<p>- Scout mang thiết kế đơn giản, m&agrave;u sắc trung t&iacute;nh c&ugrave;ng mẫu m&atilde; đa dạng gi&uacute;p bạn c&oacute; thật nhiều lựa chọn khi phối đồ.</p>\r\n\r\n<p>- Sở hữu chất len mềm mại, khả năng giữ ấm tốt v&agrave; mức gi&aacute; v&ocirc; c&ugrave;ng hợp l&yacute; th&igrave; chắc chắn đ&acirc;y l&agrave; sản phẩm bạn kh&oacute; c&oacute; thể bỏ qua trong m&ugrave;a đ&ocirc;ng n&agrave;y.</p>\r\n\r\n<p>- Sản xuất tại Việt Nam.</p>\r\n', 30, 8),
(65, 'ÁO LEN - SCOUT - CỔ TRÒN - REGULAR FIT - RÊU', 420000, 0, '<p>- Scout mang thiết kế đơn giản, m&agrave;u sắc trung t&iacute;nh c&ugrave;ng mẫu m&atilde; đa dạng gi&uacute;p bạn c&oacute; thật nhiều lựa chọn khi phối đồ.</p>\r\n\r\n<p>- Sở hữu chất len mềm mại, khả năng giữ ấm tốt v&agrave; mức gi&aacute; v&ocirc; c&ugrave;ng hợp l&yacute; th&igrave; chắc chắn đ&acirc;y l&agrave; sản phẩm bạn kh&oacute; c&oacute; thể bỏ qua trong m&ugrave;a đ&ocirc;ng n&agrave;y.</p>\r\n\r\n<p>- Sản xuất tại Việt Nam.</p>\r\n', 30, 8),
(66, 'ÁO LEN - SCOUT - CỔ TRÒN - REGULAR FIT - XANH LÁ', 420000, 0, '<p>- Scout mang thiết kế đơn giản, m&agrave;u sắc trung t&iacute;nh c&ugrave;ng mẫu m&atilde; đa dạng gi&uacute;p bạn c&oacute; thật nhiều lựa chọn khi phối đồ.</p>\r\n\r\n<p>- Sở hữu chất len mềm mại, khả năng giữ ấm tốt v&agrave; mức gi&aacute; v&ocirc; c&ugrave;ng hợp l&yacute; th&igrave; chắc chắn đ&acirc;y l&agrave; sản phẩm bạn kh&oacute; c&oacute; thể bỏ qua trong m&ugrave;a đ&ocirc;ng n&agrave;y.</p>\r\n\r\n<p>- Sản xuất tại Việt Nam.</p>\r\n', 30, 8),
(67, 'ÁO LEN - SCOUT - CỔ TRÒN - REGULAR FIT - XANH CỔ VỊT', 420000, 0, '<p>- Scout mang thiết kế đơn giản, m&agrave;u sắc trung t&iacute;nh c&ugrave;ng mẫu m&atilde; đa dạng gi&uacute;p bạn c&oacute; thật nhiều lựa chọn khi phối đồ.</p>\r\n\r\n<p>- Sở hữu chất len mềm mại, khả năng giữ ấm tốt v&agrave; mức gi&aacute; v&ocirc; c&ugrave;ng hợp l&yacute; th&igrave; chắc chắn đ&acirc;y l&agrave; sản phẩm bạn kh&oacute; c&oacute; thể bỏ qua trong m&ugrave;a đ&ocirc;ng n&agrave;y.</p>\r\n\r\n<p>- Sản xuất tại Việt Nam.</p>\r\n', 30, 8),
(68, 'ÁO CARDIGAN NHUNG - LARRY - REGULAR FIT - ĐEN', 650000, 0, '<p>- Mẫu Cardigan mới nhất được Highway ra mắt trong m&ugrave;a đ&ocirc;ng 2022.<br />\r\n- Với chất liệu Nhung tăm nhập khẩu lạ mắt gi&uacute;p giữ ấm tốt, c&ugrave;ng độ mềm mại khi tiếp x&uacute;c tr&ecirc;n da.<br />\r\n- Lưu &yacute;: giặt ở chế độ nhẹ để sản phẩm được bền l&acirc;u.<br />\r\n- Sản xuất tại Việt Nam</p>\r\n', 23, 8),
(69, 'ÁO CARDIGAN NHUNG - LARRY - REGULAR FIT - XANH', 650000, 0, '<p>- Mẫu Cardigan mới nhất được Highway ra mắt trong m&ugrave;a đ&ocirc;ng 2022.<br />\r\n- Với chất liệu Nhung tăm nhập khẩu lạ mắt gi&uacute;p giữ ấm tốt, c&ugrave;ng độ mềm mại khi tiếp x&uacute;c tr&ecirc;n da.<br />\r\n- Lưu &yacute;: giặt ở chế độ nhẹ để sản phẩm được bền l&acirc;u.<br />\r\n- Sản xuất tại Việt Nam</p>\r\n', 23, 8),
(70, 'ÁO LEN - CARTER - REGULAR FIT - BE', 720000, 0, '<p>- Chất liệu 100% vải sợi tổng hợp gi&uacute;p dễ d&agrave;ng giặt va hẹn chế x&ugrave; so với len th&ocirc;ng thường.&nbsp;<br />\r\n- M&agrave;u sắc nh&atilde; nhặn.<br />\r\n- Phom d&aacute;ng Regular cơ bản, vừa vặn, đa dạng k&iacute;ch cỡ.&nbsp;<br />\r\n- Lưu &yacute;: giặt m&aacute;y ở chế độ nhẹ để sản phẩm được bền l&acirc;u.</p>\r\n', 31, 8),
(71, 'ÁO LEN - LEOPARD - REGULAR FIT - RÊU', 720000, 0, '<p>- Chất liệu 100% vải sợi tổng hợp gi&uacute;p dễ d&agrave;ng giặt va hẹn chế x&ugrave; so với len th&ocirc;ng thường.&nbsp;<br />\r\n- Hoạ tiết dệt kiểu Jacquard lạ mắt.<br />\r\n- Phom d&aacute;ng Regular cơ bản, vừa vặn, đa dạng k&iacute;ch cỡ.&nbsp;<br />\r\n- Lưu &yacute;: giặt m&aacute;y ở chế độ nhẹ để sản phẩm được bền l&acirc;u.</p>\r\n', 31, 8),
(72, 'ÁO LEN - VINNY - REGULAR FIT - NÂU', 680000, 0, '<p>- Chất liệu 100% vải sợi tổng hợp gi&uacute;p dễ d&agrave;ng giặt va hẹn chế x&ugrave; so với len th&ocirc;ng thường.&nbsp;<br />\r\n- M&agrave;u sắc nh&atilde; nhặn.<br />\r\n- Phom d&aacute;ng Regular cơ bản, vừa vặn, đa dạng k&iacute;ch cỡ.&nbsp;<br />\r\n- Lưu &yacute;: giặt m&aacute;y ở chế độ nhẹ để sản phẩm được bền l&acirc;u.</p>\r\n', 27, 8),
(73, 'ÁO POLO PIQUE - RYAN - SLIM FIT - XANH LÁ', 380000, 1, '<p>- Chất liệu 100% Cotton gi&uacute;p thấm h&uacute;t mồ h&ocirc;i tốt.</p>\r\n\r\n<p>- Form Slimfit &ocirc;m d&aacute;ng vừa vặn.</p>\r\n\r\n<p>- Bảng m&agrave;u đa dạng</p>\r\n\r\n<p>- Lưu &yacute;: Giặt m&aacute;y ở chế độ nhẹ để sản phẩm được bền l&acirc;u</p>\r\n\r\n<p>- Sản xuất tại Việt Nam.</p>\r\n', 48, 6),
(74, 'ÁO POLO PIQUE - RYAN - SLIM FIT - TRẮNG CỔ KẺ NHỎ', 380000, 1, '<p>- Chất liệu 100% Cotton gi&uacute;p thấm h&uacute;t mồ h&ocirc;i tốt.</p>\r\n\r\n<p>- Form Slimfit &ocirc;m d&aacute;ng vừa vặn.</p>\r\n\r\n<p>- Bảng m&agrave;u đa dạng</p>\r\n\r\n<p>- Lưu &yacute;: Giặt m&aacute;y ở chế độ nhẹ để sản phẩm được bền l&acirc;u</p>\r\n\r\n<p>- Sản xuất tại Việt Nam.</p>\r\n', 48, 6),
(75, 'ÁO POLO - DANIEL - REGULAR FIT - GHI XANH', 450000, 0, '<p>- Được l&agrave;m từ chất liệu ch&iacute;nh l&agrave; thun cotton, v&agrave; modal, đặc t&iacute;nh mềm mịn, co gi&atilde;n v&agrave; h&uacute;t ẩm tốt, tho&aacute;ng kh&iacute;, chất nhẹ, đặc biệt vải Modal c&oacute; t&iacute;nh kh&aacute;ng khuẩn l&agrave; t&iacute;nh chất ri&ecirc;ng biệt chỉ loại vải n&agrave;y c&oacute; được.</p>\r\n\r\n<p>- Đang dạng về m&agrave;u sắc, c&oacute; thể phối đồ theo nhiều phong c&aacute;ch v&agrave; đặc biệt an to&agrave;n cho người mặc.</p>\r\n\r\n<p>- Sản xuất 100% tại Việt Nam</p>\r\n', 11, 6),
(76, 'ÁO POLO PIQUE - RYAN - SLIM FIT - TRẮNG CỔ KẺ TO', 380000, 1, '<p>- Chất liệu 100% Cotton gi&uacute;p thấm h&uacute;t mồ h&ocirc;i tốt.</p>\r\n\r\n<p>- Form Slimfit &ocirc;m d&aacute;ng vừa vặn.</p>\r\n\r\n<p>- Bảng m&agrave;u đa dạng</p>\r\n\r\n<p>- Lưu &yacute;: Giặt m&aacute;y ở chế độ nhẹ để sản phẩm được bền l&acirc;u</p>\r\n\r\n<p>- Sản xuất tại Việt Nam.</p>\r\n', 48, 6),
(77, 'ÁO POLO PIQUE - RYAN - SLIM FIT - TRẮNG TRƠN', 380000, 0, '<p>- Chất liệu 100% Cotton gi&uacute;p thấm h&uacute;t mồ h&ocirc;i tốt.</p>\r\n\r\n<p>- Form Slimfit &ocirc;m d&aacute;ng vừa vặn.</p>\r\n\r\n<p>- Bảng m&agrave;u đa dạng</p>\r\n\r\n<p>- Lưu &yacute;: Giặt m&aacute;y ở chế độ nhẹ để sản phẩm được bền l&acirc;u</p>\r\n\r\n<p>- Sản xuất tại Việt Nam.</p>\r\n', 48, 6),
(78, 'ÁO POLO PREMIUM - ASTON - SLIM FIT - NÂU', 680000, 1, '<p>- Chất liệu vải dệt kim được đặt ri&ecirc;ng của Highway.</p>\r\n\r\n<p>- Form &aacute;o Slimfit dễ phối đồ, ph&ugrave; hợp với nhiều d&aacute;ng người.</p>\r\n\r\n<p>- Lưu &yacute;: Giặt tay để sản phẩm được bền l&acirc;u</p>\r\n\r\n<p>- Sản xuất tại Việt Nam</p>\r\n', 56, 6),
(79, 'ÁO POLO PREMIUM - ASTON - SLIM FIT - ĐEN', 680000, 0, '<p>- Chất liệu vải dệt kim được đặt ri&ecirc;ng của Highway.</p>\r\n\r\n<p>- Form &aacute;o Slimfit dễ phối đồ, ph&ugrave; hợp với nhiều d&aacute;ng người.</p>\r\n\r\n<p>- Lưu &yacute;: Giặt tay để sản phẩm được bền l&acirc;u.</p>\r\n\r\n<p>- Sản xuất tại Việt Nam.</p>\r\n', 56, 6),
(80, 'ÁO POLO PREMIUM - RUBEN - RELAXED FIT - XANH', 480000, 0, '<p>- 100% cotton pique sợi vải ngắn, độ bền m&agrave;u tốt, co gi&atilde;n 2 chiều.</p>\r\n\r\n<p>- Ưu điểm nổi bật của chất vải l&agrave; độ mềm mại v&agrave; khả năng thấm h&uacute;t mồ h&ocirc;i tốt.</p>\r\n\r\n<p>- Kh&ocirc;ng chứa Forrmaldehyde g&acirc;y kich ứng da.</p>\r\n\r\n<p>- Phần cổ V đan nhau tạo sự trẻ trung v&agrave; mới mẻ kh&aacute;c biệt so với c&aacute;c mẫu Polo th&ocirc;ng thường.</p>\r\n\r\n<p>- Sản xuất tại Việt Nam.</p>\r\n', 10, 6),
(81, 'ÁO POLO PREMIUM - RUBEN - RELAXED FIT - TRẮNG', 480000, 0, '<p>- 100% cotton pique sợi vải ngắn, độ bền m&agrave;u tốt, co gi&atilde;n 2 chiều.<br />\r\n- Ưu điểm nổi bật của chất vải l&agrave; độ mềm mại v&agrave; khả năng thấm h&uacute;t mồ h&ocirc;i tốt.<br />\r\n- Kh&ocirc;ng chứa Forrmaldehyde g&acirc;y kich ứng da.<br />\r\n- Phần cổ V đan nhau tạo sự trẻ trung v&agrave; mới mẻ kh&aacute;c biệt so với c&aacute;c mẫu Polo th&ocirc;ng thường.<br />\r\n- Lưu &yacute;: Giặt chế độ nhẹ để sản phẩm được bền đẹp<br />\r\n- Sản xuất tại Việt Nam</p>\r\n', 10, 6),
(82, 'ÁO POLO - DANIEL - REGULAR FIT - NÂU', 450000, 0, '<p>- Thiết kế polo shirt sản xuất từ hai chất liệu ch&iacute;nh l&agrave; modal v&agrave; cotton, sự kết hợp giữa hai loại sợi tự nhi&ecirc;n mang đến những ưu điểm nổi bật cho sản phẩm như mềm mại v&agrave; khả năng thấm h&uacute;t mồ h&ocirc;i tốt.<br />\r\n- M&agrave;u sắc mới theo gam m&agrave;u trung t&iacute;nh được Highway đặt sản xuất ri&ecirc;ng biệt.<br />\r\n- Khuy cao cấp bằng kim loại<br />\r\n- C&oacute; h&igrave;nh th&ecirc;u tỉ mỉ thương hiệu<br />\r\n- Lưu &yacute;: Giặt chế độ nhẹ để sản phẩm được bền đẹp<br />\r\n- Sản xuất tại Việt Nam</p>\r\n', 10, 6),
(83, 'ÁO POLO - DANIEL - REGULAR FIT - TRẮNG', 450000, 0, '<p>- Thiết kế polo shirt sản xuất từ hai chất liệu ch&iacute;nh l&agrave; modal v&agrave; cotton, sự kết hợp giữa hai loại sợi tự nhi&ecirc;n mang đến những ưu điểm nổi bật cho sản phẩm như mềm mại v&agrave; khả năng thấm h&uacute;t mồ h&ocirc;i tốt.<br />\r\n- M&agrave;u sắc mới theo gam m&agrave;u trung t&iacute;nh được Highway đặt sản xuất ri&ecirc;ng biệt.<br />\r\n- Khuy cao cấp bằng kim loại<br />\r\n- C&oacute; h&igrave;nh th&ecirc;u tỉ mỉ thương hiệu<br />\r\n- Lưu &yacute;: Giặt chế độ nhẹ để sản phẩm được bền đẹp<br />\r\n- Sản xuất tại Việt Nam</p>\r\n', 10, 6),
(84, 'ÁO POLO - DANIEL - REGULAR FIT - XANH', 450000, 1, '<p>- Thiết kế polo shirt sản xuất từ hai chất liệu ch&iacute;nh l&agrave; modal v&agrave; cotton, sự kết hợp giữa hai loại sợi tự nhi&ecirc;n mang đến những ưu điểm nổi bật cho sản phẩm như mềm mại v&agrave; khả năng thấm h&uacute;t mồ h&ocirc;i tốt.<br />\r\n- M&agrave;u sắc mới theo gam m&agrave;u trung t&iacute;nh được Highway đặt sản xuất ri&ecirc;ng biệt.<br />\r\n- Khuy cao cấp bằng kim loại<br />\r\n- C&oacute; h&igrave;nh th&ecirc;u tỉ mỉ thương hiệu<br />\r\n- Lưu &yacute;: Giặt chế độ nhẹ để sản phẩm được bền đẹp<br />\r\n- Sản xuất tại Việt Nam</p>\r\n', 56, 6),
(85, 'ÁO POLO - DANIEL - REGULAR FIT - ĐEN', 450000, 0, '<p>- Thiết kế polo shirt sản xuất từ hai chất liệu ch&iacute;nh l&agrave; modal v&agrave; cotton, sự kết hợp giữa hai loại sợi tự nhi&ecirc;n mang đến những ưu điểm nổi bật cho sản phẩm như mềm mại v&agrave; khả năng thấm h&uacute;t mồ h&ocirc;i tốt.</p>\r\n\r\n<p>- M&agrave;u sắc mới theo gam m&agrave;u trung t&iacute;nh được Highway đặt sản xuất ri&ecirc;ng biệt.</p>\r\n\r\n<p>- Khuy cao cấp bằng kim loại.</p>\r\n\r\n<p>- C&oacute; h&igrave;nh th&ecirc;u tỉ mỉ thương hiệu.</p>\r\n\r\n<p>- Sản xuất tại Việt Nam.</p>\r\n', 10, 6),
(86, 'ÁO SƠ MI - GODRICK - REGULAR FIT - KẺ ĐEN TRẮNG', 650000, 0, '<p>- Được l&agrave;m từ vải dạ mix sợi polyester c&oacute; khả năng chống nước, giữ ấm cực tốt trong thời tiết lạnh gi&aacute;</p>\r\n\r\n<p>- Dễ bảo quản, sử dụng được bền theo thời gian.</p>\r\n\r\n<p>- Tr&ecirc;n bề mặt vải c&ograve;n được phủ một lớp l&ocirc;ng mềm mại, tạo cảm gi&aacute;c dễ chịu khi tiếp x&uacute;c với da.</p>\r\n\r\n<p>- Sản xuất 100% tại Việt Nam</p>\r\n', 23, 3),
(87, 'BALO - 6028#', 890000, 0, '<p>- Chất liệu vải d&ugrave; cao cấp chống nước tối đa. Thiết kế khoẻ khoắn, năng động với ngăn chứa lớn c&ugrave;ng nhiều ngăn chứa nhỏ gi&uacute;p bạn sắp xếp đồ khoa học hơn.</p>\r\n', 20, 14),
(88, 'BALO 972 - TÚI HỘP', 790000, 0, '<p>- Chất liệu Nylon.</p>\r\n\r\n<p>- Sản xuất tại:&nbsp;Trung Quốc.</p>\r\n', 19, 14),
(89, 'BALO CHẤT SẦN - 0770A', 890000, 0, '<p>- Chất liệu da PU.</p>\r\n\r\n<p>- Sản xuất tại:&nbsp;Trung Quốc.</p>\r\n', 20, 14),
(90, 'ÁO SƠ MI - GODRICK - REGULAR FIT - KẺ NÂU', 650000, 0, '<p>- Được l&agrave;m từ vải dạ mix sợi polyester c&oacute; khả năng chống nước, giữ ấm cực tốt trong thời tiết lạnh gi&aacute;</p>\r\n\r\n<p>- Dễ bảo quản, sử dụng được bền theo thời gian.</p>\r\n\r\n<p>- Tr&ecirc;n bề mặt vải c&ograve;n được phủ một lớp l&ocirc;ng mềm mại, tạo cảm gi&aacute;c dễ chịu khi tiếp x&uacute;c với da.</p>\r\n\r\n<p>- Sản xuất 100% tại Việt Nam</p>\r\n', 23, 3),
(91, 'ÁO SƠ MI LINEN - WESLEY - REGULAR FIT - XANH NHẠT', 580000, 1, '<p>- Chất liệu Linen với ưu điểm mềm mại v&agrave; tho&aacute;ng m&aacute;t.</p>\r\n\r\n<p>- M&agrave;u sắc tối giản&nbsp;nh&atilde; nhặn ph&ugrave; hợp với nhiều ho&agrave;n cảnh.</p>\r\n\r\n<p>- Lưu &yacute;: Giặt m&aacute;y ở chế độ nhẹ để sản phẩm được bền l&acirc;u</p>\r\n\r\n<p>- Sản xuất tại Việt Nam.</p>\r\n', 48, 3),
(92, 'ÁO SƠ MI - WESLEY - REGULAR FIT - BE', 650000, 0, '<p>- Chất liệu Synthetic nhập khẩu với ưu điểm tho&aacute;ng m&aacute;t v&agrave; chống nhăn.</p>\r\n\r\n<p>- M&agrave;u sắc nh&atilde; nhặn ph&ugrave; hợp với nhiều ho&agrave;n cảnh.</p>\r\n\r\n<p>- Lưu &yacute;: Giặt m&aacute;y ở chế độ nhẹ để sản phẩm được bền l&acirc;u</p>\r\n\r\n<p>- Sản xuất tại Việt Nam</p>\r\n', 23, 3),
(93, 'ÁO SƠ MI - MARLEY - RELAXED FIT - GHI', 680000, 0, '<p>- Được l&agrave;m từ vải dạ mix sợi polyester nhập từ H&agrave;n Quốc c&oacute; khả năng chống nước, giữ ấm cực tốt trong thời tiết lạnh gi&aacute;</p>\r\n\r\n<p>- Dễ bảo quản, sử dụng được bền theo thời gian.</p>\r\n\r\n<p>- Tr&ecirc;n bề mặt vải c&ograve;n được phủ một lớp l&ocirc;ng mềm mại, tạo cảm gi&aacute;c dễ chịu khi tiếp x&uacute;c với da.</p>\r\n\r\n<p>- Sản xuất tại Việt Nam.</p>\r\n', 20, 3),
(94, 'ÁO IN - DREAM MORE - REGULAR FIT - TRẮNG', 390000, 1, '<p>- Chất liệu 100% Cotton USA mang ưu điểm về độ bền v&agrave; khả năng thấm h&uacute;t mồ h&ocirc;i tốt.</p>\r\n\r\n<p>- H&igrave;nh in sử dụng c&ocirc;ng nghệ in lụa sắc n&eacute;t</p>\r\n\r\n<p>- Thiết kế đơn giản ph&ugrave; hợp với Outfit h&agrave;ng ng&agrave;y.</p>\r\n\r\n<p>- Lưu &yacute;: Giặt m&aacute;y ở chế độ nhẹ để sản phẩm được bền l&acirc;u</p>\r\n\r\n<p>- Sản xuất tại Việt Nam.</p>\r\n', 49, 2),
(95, 'ÁO IN PREMIUM - GROW SLOW - REGULAR FIT - TRẮNG', 550000, 1, '<p>- Chất liệu 100% Cotton USA mang ưu điểm về độ bền v&agrave; khả năng thấm h&uacute;t mồ h&ocirc;i tốt.</p>\r\n\r\n<p>- H&igrave;nh in sử dụng c&ocirc;ng nghệ in lụa sắc n&eacute;t</p>\r\n\r\n<p>- Thiết kế đơn giản ph&ugrave; hợp với Outfit h&agrave;ng ng&agrave;y.</p>\r\n\r\n<p>- Lưu &yacute;: Giặt m&aacute;y ở chế độ nhẹ để sản phẩm được bền l&acirc;u</p>\r\n\r\n<p>- Sản xuất tại Việt Nam.</p>\r\n', 46, 2),
(96, 'ÁO IN - BAND OF THE ROYAL - REGULAR FIT - TRẮNG', 450000, 1, '<p>- Chất liệu Cotton USA với ưu điểm về độ thấm h&uacute;t mồ h&ocirc;i cực tốt, đặc biệt ph&ugrave; hợp với thời tiết nhiệt đới.</p>\r\n\r\n<p>- Thiết kế độc đ&aacute;o, ấn tượng với hoạ tiết sư tử mang lấy cảm hứng từ ho&agrave;ng gia Anh.</p>\r\n\r\n<p>- H&igrave;nh in đặc biệt thiết kế ri&ecirc;ng từ team Highway</p>\r\n\r\n<p>- Sản xuất tại Việt Nam</p>\r\n', 56, 2),
(97, 'ÁO IN - DREAM MORE - REGULAR FIT - ĐEN', 390000, 1, '<p>- Chất liệu 100% Cotton USA mang ưu điểm về độ bền v&agrave; khả năng thấm h&uacute;t mồ h&ocirc;i tốt.</p>\r\n\r\n<p>- H&igrave;nh in sử dụng c&ocirc;ng nghệ in lụa sắc n&eacute;t</p>\r\n\r\n<p>- Thiết kế đơn giản ph&ugrave; hợp với Outfit h&agrave;ng ng&agrave;y.</p>\r\n\r\n<p>- Lưu &yacute;: Giặt m&aacute;y ở chế độ nhẹ để sản phẩm được bền l&acirc;u</p>\r\n\r\n<p>- Sản xuất tại Việt Nam.</p>\r\n', 49, 2),
(98, 'ÁO IN - DREAM MORE - REGULAR FIT - TRẮNG', 390000, 1, '<p>- Chất liệu 100% Cotton USA mang ưu điểm về độ bền v&agrave; khả năng thấm h&uacute;t mồ h&ocirc;i tốt.</p>\r\n\r\n<p>- H&igrave;nh in sử dụng c&ocirc;ng nghệ in lụa sắc n&eacute;t</p>\r\n\r\n<p>- Thiết kế đơn giản ph&ugrave; hợp với Outfit h&agrave;ng ng&agrave;y.</p>\r\n\r\n<p>- Lưu &yacute;: Giặt m&aacute;y ở chế độ nhẹ để sản phẩm được bền l&acirc;u</p>\r\n\r\n<p>- Sản xuất tại Việt Nam.</p>\r\n', 49, 2),
(99, 'ÁO PHÔNG PREMIUM - JAMES - RELAXED FIT - TRẮNG', 350000, 0, '<p>- Cotton Compact c&oacute; sợi b&ocirc;ng d&agrave;i hơn cotton thường 2,3 lần. Mịn m&agrave;ng v&agrave; bền bỉ hơn Cotton thường.</p>\r\n\r\n<p>- Định lượng vải 280gsm d&agrave;y dặn.</p>\r\n\r\n<p>- Kh&ocirc;ng chứa Formaldehyde g&acirc;y k&iacute;ch ứng cho da</p>\r\n\r\n<p>- Sản xuất 100% tại Việt Nam</p>\r\n\r\n<p>- Lưu &yacute;: Giặt m&aacute;y ở chế độ nhẹ để sản phẩm được bền l&acirc;u</p>\r\n', 20, 2),
(100, 'ÁO PHÔNG PREMIUM - JAMES - RELAXED FIT - ĐEN', 350000, 0, '<p>- Cotton Compact c&oacute; sợi b&ocirc;ng d&agrave;i hơn cotton thường 2,3 lần. Mịn m&agrave;ng v&agrave; bền bỉ hơn Cotton thường.</p>\r\n\r\n<p>- Định lượng vải 280gsm d&agrave;y dặn.</p>\r\n\r\n<p>- Kh&ocirc;ng chứa Formaldehyde g&acirc;y k&iacute;ch ứng cho da</p>\r\n\r\n<p>- Sản xuất 100% tại Việt Nam</p>\r\n\r\n<p>- Lưu &yacute;: Giặt m&aacute;y ở chế độ nhẹ để sản phẩm được bền l&acirc;u</p>\r\n', 20, 2);

-- --------------------------------------------------------

--
-- Table structure for table `product_detail`
--

CREATE TABLE `product_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `size_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_detail`
--

INSERT INTO `product_detail` (`id`, `product_id`, `size_id`, `quantity`) VALUES
(1, 1, 1, 0),
(2, 1, 2, 70),
(3, 1, 3, 0),
(4, 1, 4, 120),
(5, 2, 1, 20),
(6, 2, 2, 120),
(7, 2, 3, 90),
(8, 2, 4, 107),
(9, 3, 1, 39),
(10, 3, 2, 233),
(11, 3, 3, 323),
(12, 3, 4, 121),
(13, 4, 1, 33),
(14, 4, 2, 354),
(15, 4, 3, 400),
(16, 4, 4, 231),
(17, 5, 1, 34),
(18, 5, 2, 160),
(19, 5, 3, 321),
(20, 5, 4, 124),
(21, 6, 1, 123),
(22, 6, 2, 321),
(23, 6, 3, 121),
(24, 6, 4, 90),
(29, 8, 1, 100),
(30, 8, 2, 170),
(31, 8, 3, 220),
(32, 8, 4, 130),
(33, 9, 1, 120),
(34, 9, 2, 180),
(35, 9, 3, 212),
(36, 9, 4, 92),
(37, 10, 1, 100),
(38, 10, 2, 120),
(39, 10, 3, 170),
(40, 10, 4, 180),
(41, 11, 1, 100),
(42, 11, 2, 170),
(43, 11, 3, 120),
(44, 11, 4, 0),
(45, 12, 1, 120),
(46, 12, 2, 180),
(47, 12, 3, 0),
(48, 12, 4, 0),
(49, 13, 1, 100),
(50, 13, 2, 70),
(51, 13, 3, 210),
(52, 13, 4, 100),
(53, 14, 1, 101),
(54, 14, 2, 212),
(55, 14, 3, 123),
(56, 14, 4, 111),
(57, 15, 1, 100),
(58, 15, 2, 120),
(59, 15, 3, 0),
(60, 15, 4, 90),
(61, 16, 1, 70),
(62, 16, 2, 198),
(63, 16, 3, 122),
(64, 16, 4, 121),
(65, 17, 1, 120),
(66, 17, 2, 30),
(67, 17, 3, 50),
(68, 17, 4, 0),
(69, 18, 1, 20),
(70, 18, 2, 70),
(71, 18, 3, 100),
(72, 18, 4, 0),
(73, 19, 1, 0),
(74, 19, 2, 40),
(75, 19, 3, 20),
(76, 19, 4, 0),
(77, 20, 1, 0),
(78, 20, 2, 30),
(79, 20, 3, 90),
(80, 20, 4, 0),
(81, 21, 1, 0),
(82, 21, 2, 20),
(83, 21, 3, 70),
(84, 21, 4, 0),
(85, 22, 1, 0),
(86, 22, 2, 40),
(87, 22, 3, 0),
(88, 22, 4, 20),
(89, 23, 1, 120),
(90, 23, 2, 200),
(91, 23, 3, 129),
(92, 23, 4, 180),
(93, 24, 1, 30),
(94, 24, 2, 120),
(95, 24, 3, 320),
(96, 24, 4, 190),
(97, 25, 1, 30),
(98, 25, 2, 78),
(99, 25, 3, 120),
(100, 25, 4, 80),
(101, 26, 1, 0),
(102, 26, 2, 120),
(103, 26, 3, 90),
(104, 26, 4, 129),
(105, 27, 1, 12),
(106, 27, 2, 230),
(107, 27, 3, 80),
(108, 27, 4, 0),
(109, 28, 1, 12),
(110, 28, 2, 80),
(111, 28, 3, 100),
(112, 28, 4, 209),
(113, 29, 1, 0),
(114, 29, 2, 40),
(115, 29, 3, 120),
(116, 29, 4, 302),
(117, 30, 1, 0),
(118, 30, 2, 230),
(119, 30, 3, 0),
(120, 30, 4, 90),
(121, 31, 1, 70),
(122, 31, 2, 230),
(123, 31, 3, 120),
(124, 31, 4, 23),
(125, 32, 1, 23),
(126, 32, 2, 230),
(127, 32, 3, 210),
(128, 32, 4, 192),
(129, 33, 1, 23),
(130, 33, 2, 230),
(131, 33, 3, 221),
(132, 33, 4, 90),
(133, 34, 1, 68),
(134, 34, 2, 198),
(135, 34, 3, 230),
(136, 34, 4, 123),
(137, 35, 1, 46),
(138, 35, 2, 120),
(139, 35, 3, 201),
(140, 35, 4, 123),
(141, 36, 1, 0),
(142, 36, 2, 129),
(143, 36, 3, 0),
(144, 36, 4, 0),
(145, 37, 1, 120),
(146, 37, 2, 290),
(147, 37, 3, 310),
(148, 37, 4, 129),
(149, 38, 1, 12),
(150, 38, 2, 130),
(151, 38, 3, 219),
(152, 38, 4, 0),
(153, 39, 1, 120),
(154, 39, 2, 139),
(155, 39, 3, 231),
(156, 39, 4, 234),
(157, 40, 1, 120),
(158, 40, 2, 210),
(159, 40, 3, 192),
(160, 40, 4, 141),
(161, 41, 1, 129),
(162, 41, 2, 120),
(163, 41, 3, 144),
(164, 41, 4, 123),
(165, 42, 1, 120),
(166, 42, 2, 123),
(167, 42, 3, 141),
(168, 42, 4, 51),
(169, 43, 1, 120),
(170, 43, 2, 0),
(171, 43, 3, 170),
(172, 43, 4, 91),
(173, 44, 1, 0),
(174, 44, 2, 129),
(175, 44, 3, 48),
(176, 44, 4, 78),
(177, 45, 1, 0),
(178, 45, 2, 123),
(179, 45, 3, 210),
(180, 45, 4, 0),
(181, 46, 1, 69),
(182, 46, 2, 72),
(183, 46, 3, 121),
(184, 46, 4, 81),
(185, 47, 1, 82),
(186, 47, 2, 123),
(187, 47, 3, 109),
(188, 47, 4, 83),
(189, 48, 1, 91),
(190, 48, 2, 0),
(191, 48, 3, 72),
(192, 48, 4, 0),
(193, 49, 1, 0),
(194, 49, 2, 220),
(195, 49, 3, 0),
(196, 49, 4, 0),
(197, 50, 1, 0),
(198, 50, 2, 71),
(199, 50, 3, 0),
(200, 50, 4, 0),
(201, 51, 1, 12),
(202, 51, 2, 27),
(203, 51, 3, 31),
(204, 51, 4, 40),
(205, 52, 1, 41),
(206, 52, 2, 121),
(207, 52, 3, 220),
(208, 52, 4, 41),
(209, 53, 1, 31),
(210, 53, 2, 0),
(211, 53, 3, 120),
(212, 53, 4, 71),
(213, 54, 1, 0),
(214, 54, 2, 61),
(215, 54, 3, 54),
(216, 54, 4, 32),
(217, 55, 1, 0),
(218, 55, 2, 70),
(219, 55, 3, 62),
(220, 55, 4, 81),
(225, 57, 1, 30),
(226, 57, 2, 129),
(227, 57, 3, 121),
(228, 57, 4, 0),
(229, 58, 1, 0),
(230, 58, 2, 0),
(231, 58, 3, 38),
(232, 58, 4, 51),
(233, 59, 1, 72),
(234, 59, 2, 90),
(235, 59, 3, 120),
(236, 59, 4, 89),
(237, 60, 1, 34),
(238, 60, 2, 71),
(239, 60, 3, 92),
(240, 60, 4, 120),
(241, 61, 1, 38),
(242, 61, 2, 60),
(243, 61, 3, 71),
(244, 61, 4, 61),
(245, 62, 1, 0),
(246, 62, 2, 120),
(247, 62, 3, 70),
(248, 62, 4, 82),
(249, 63, 1, 4),
(250, 63, 2, 30),
(251, 63, 3, 70),
(252, 63, 4, 31),
(253, 64, 1, 42),
(254, 64, 2, 31),
(255, 64, 3, 0),
(256, 64, 4, 52),
(257, 65, 1, 31),
(258, 65, 2, 0),
(259, 65, 3, 72),
(260, 65, 4, 19),
(261, 66, 1, 40),
(262, 66, 2, 12),
(263, 66, 3, 18),
(264, 66, 4, 29),
(265, 67, 1, 31),
(266, 67, 2, 19),
(267, 67, 3, 0),
(268, 67, 4, 32),
(269, 68, 1, 24),
(270, 68, 2, 0),
(271, 68, 3, 0),
(272, 68, 4, 0),
(273, 69, 1, 34),
(274, 69, 2, 72),
(275, 69, 3, 91),
(276, 69, 4, 31),
(277, 70, 1, 13),
(278, 70, 2, 71),
(279, 70, 3, 31),
(280, 70, 4, 23),
(281, 71, 1, 31),
(282, 71, 2, 42),
(283, 71, 3, 23),
(284, 71, 4, 0),
(285, 72, 1, 0),
(286, 72, 2, 39),
(287, 72, 3, 131),
(288, 72, 4, 12),
(289, 73, 1, 23),
(290, 73, 2, 0),
(291, 73, 3, 0),
(292, 73, 4, 0),
(293, 74, 1, 45),
(294, 74, 2, 0),
(295, 74, 3, 21),
(296, 74, 4, 0),
(297, 75, 1, 12),
(298, 75, 2, 41),
(299, 75, 3, 56),
(300, 75, 4, 0),
(301, 76, 1, 0),
(302, 76, 2, 52),
(303, 76, 3, 0),
(304, 76, 4, 0),
(305, 77, 1, 45),
(306, 77, 2, 0),
(307, 77, 3, 32),
(308, 77, 4, 0),
(309, 78, 1, 0),
(310, 78, 2, 23),
(311, 78, 3, 102),
(312, 78, 4, 31),
(313, 79, 1, 23),
(314, 79, 2, 0),
(315, 79, 3, 68),
(316, 79, 4, 0),
(317, 80, 1, 23),
(318, 80, 2, 32),
(319, 80, 3, 12),
(320, 80, 4, 41),
(321, 81, 1, 13),
(322, 81, 2, 31),
(323, 81, 3, 20),
(324, 81, 4, 0),
(325, 82, 1, 12),
(326, 82, 2, 32),
(327, 82, 3, 42),
(328, 82, 4, 0),
(329, 83, 1, 52),
(330, 83, 2, 31),
(331, 83, 3, 21),
(332, 83, 4, 12),
(333, 84, 1, 31),
(334, 84, 2, 72),
(335, 84, 3, 32),
(336, 84, 4, 19),
(337, 85, 1, 0),
(338, 85, 2, 20),
(339, 85, 3, 81),
(340, 85, 4, 0),
(341, 86, 1, 12),
(342, 86, 2, 23),
(343, 86, 3, 41),
(344, 86, 4, 62),
(345, 87, 1, 0),
(346, 87, 2, 0),
(347, 87, 3, 120),
(348, 87, 4, 0),
(349, 88, 1, 0),
(350, 88, 2, 0),
(351, 88, 3, 30),
(352, 88, 4, 0),
(353, 89, 1, 0),
(354, 89, 2, 0),
(355, 89, 3, 42),
(356, 89, 4, 0),
(357, 90, 1, 0),
(358, 90, 2, 23),
(359, 90, 3, 120),
(360, 90, 4, 42),
(361, 91, 1, 0),
(362, 91, 2, 82),
(363, 91, 3, 91),
(364, 91, 4, 31),
(365, 92, 1, 12),
(366, 92, 2, 0),
(367, 92, 3, 41),
(368, 92, 4, 23),
(369, 93, 1, 32),
(370, 93, 2, 60),
(371, 93, 3, 42),
(372, 93, 4, 30),
(373, 94, 1, 49),
(374, 94, 2, 71),
(375, 94, 3, 130),
(376, 94, 4, 0),
(377, 95, 1, 0),
(378, 95, 2, 230),
(379, 95, 3, 192),
(380, 95, 4, 81),
(381, 96, 1, 42),
(382, 96, 2, 342),
(383, 96, 3, 234),
(384, 96, 4, 122),
(385, 97, 1, 39),
(386, 97, 2, 210),
(387, 97, 3, 0),
(388, 97, 4, 123),
(389, 98, 1, 41),
(390, 98, 2, 123),
(391, 98, 3, 148),
(392, 98, 4, 21),
(393, 99, 1, 0),
(394, 99, 2, 213),
(395, 99, 3, 31),
(396, 99, 4, 40),
(397, 100, 1, 0),
(398, 100, 2, 231),
(399, 100, 3, 122),
(400, 100, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `id` int(10) UNSIGNED NOT NULL,
  `image_link` text NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`id`, `image_link`, `product_id`) VALUES
(1, '20230327_gkfcdN0cXJ.webp', 1),
(2, '20230411_10LI4qOstx.jpeg', 2),
(3, '20230411_g8RwDfsPJY.jpeg', 2),
(4, '20230411_3O47x3wfuU.jpeg', 2),
(5, '20230406_LNAKR2C4Qc.jpeg', 3),
(6, '20221013_LIzXdghdgencFbu779ljMEoo.jpg', 4),
(7, '20221008_0fDvmhmAsQLSKm7htKiJlkXc.jpg', 4),
(8, '20220815_hEbNYSAPQggfMOWgIEenKCAo.jpg', 4),
(9, '20221013_BwZcYVd3WD0a3Xd7KwpytQvG.jpg', 4),
(10, '20221013_LUWhVqb6lQk3xpFf5h3CVOCt.jpg', 4),
(11, '20221013_y01ycYHZQvByMB7IFQcQOpiE.jpg', 4),
(12, '20221013_yejQDddJpFOTugDEFjIyDPg1.jpg', 4),
(13, '20220816_ZdEAE0MDNRGOfh0neAo7I0Fq.jpg', 5),
(14, '20220711_cSHtjqmm57MCsYGYsm2N8fs3.jpg', 5),
(15, '20220725_zNJJUCfOXC709mGN9wmtvegO.jpg', 5),
(16, '20220725_luCv2I7Tw11ZRTSx1LqGZdsT.jpg', 5),
(17, '20220725_vEkxOAB8DfxIjW6sEg3pf0ab.jpg', 5),
(18, '20220725_vRNAiCpJGKEQUGeJHZjlMkYF.jpg', 5),
(19, '20220920_DiBo0uUTcCbU9hO19neXyjNV.jpg', 6),
(20, '20220913_TDr9n4qz077sZH9LbB2xA75O.jpg', 6),
(21, '20220913_VHJSO5CPtsWSK2U4LFK5Fnqi.jpg', 6),
(22, '20220913_Ta60D7MQXd8OKMXjugCIVuyF.jpg', 6),
(23, '20220905_uyAtwzVclJNO7x33zNDzqMc5.jpg', 6),
(24, '20220913_8oCsqqGArnlgAwBdFp221Yuf.jpg', 6),
(25, '20220913_wzqRSFTJrxvfyHYPvJPXj22w.jpg', 6),
(30, '20220527_XmUo6Bj7xygGo0R5ocqmg5lF.jpg', 8),
(31, '20220328_8fOHcjjC1rVUXWAJG1JPwn5D.jpg', 8),
(32, '20220328_grnUptYWod2CyTIZvRyy8qBr.jpg', 8),
(33, '20220328_1T23j9DcEPqpGfUNUTOw1ZWS.jpg', 8),
(34, '20220313_5NchEXV1Ay3mTTChM1APghQX.jpg', 8),
(35, '20210818_8DnSM5ArreUdUlqG6HSZx05X.jpg', 9),
(36, '20211112_bL2aievbDuSazt1qA25OQc5p.jpg', 9),
(37, '20220824_JYNp8NAcn1ZgK4QLEqYJUSnC.jpg', 9),
(38, '20230210_5s7wtEPtoJ8KcQ1S.jpeg', 10),
(39, '20230210_pBnS6OT0Bw2bEa3p.jpeg', 10),
(40, '20230210_ppFZMwQaZWol0A2l.jpeg', 10),
(41, '20230210_P6oOnNh60toZHeuy.jpeg', 11),
(42, '20230210_12WdujvKAXGfy6Vv.jpeg', 11),
(43, '20230210_Y0efxmxlbzDkNAYO.jpeg', 11),
(44, '20221228_hCoHpHMlvkdotNgevX21zkxd.jpg', 12),
(45, '20221228_rPPk9uhplkPveEcWAkwEaWBq.jpg', 12),
(46, '20221220_sfUJrm7EjADqzV7dUMI6fgdR.jpg', 12),
(47, '20230113_aC1jhcNohHInK2o3.webp', 12),
(48, '20230113_0dNn54brtfyFbRq1.webp', 12),
(49, '20230113_hhR89NmhzHvZLDFM.webp', 12),
(50, '20230113_C2f52w55QS515Ug7.webp', 13),
(51, '20230113_cb28DCdu6sFafgXS.webp', 13),
(52, '20230113_eUt9O2fC7gPMKrVn.webp', 13),
(53, '20221228_DDWlA067Q9FhimVGOHAVt4TO.jpg', 13),
(54, '20221228_vp6vzG9CKo1QYDGBrRR2Voph.jpg', 13),
(55, '20221220_tiO6XG5wMjL3MKqheeQTnfGV.jpg', 13),
(56, '20221220_qwvR79SapKWeeGuXpL899Ujt.webp', 14),
(57, '20230105_lyT9T3RJ3TLER3Sgt2xUpcJS.jpg', 14),
(58, '20221226_v9b7cA1nfGK3Za0hsz5nHPvH.webp', 14),
(59, '20230105_KhryUZhoSzGOJOtay0laWE7H.jpg', 14),
(60, '20230105_rS3FJczvyZDNd1r0zTJ8ocGJ.jpg', 14),
(61, '20230105_9YX3BZjyqvUbORfgwpwbkTVT.jpg', 15),
(62, '20230105_HlSzp8hHhQUdHzCFxUlko61U.jpg', 15),
(63, '20221226_sA6JwIvMqJs1jpSQtRN8uv0z.jpg', 15),
(64, '20221226_il5BgmAnTJHa4x20LN74RQPh.webp', 15),
(65, '20221008_97CVkPJbdrYkqeeiJPYqzFuf.jpg', 16),
(66, '20221013_45WrRbVEGW093EwOsXtIgjqg.jpg', 16),
(67, '20221013_QD4wwHlUvsxHngqbuEqwJRAT.jpg', 16),
(68, '20221013_WrNlPhaaj8dR0apKH4pLR0BN.jpg', 16),
(69, '20221013_OCVA2UigtX0JsJJyhZpyS9uD.jpg', 16),
(70, '20221013_D8wTGm28xjWUkkTCR260ABhl.jpg', 16),
(71, '20220815_Jsp6lpEs8gTUq9OQ2a7hreOC.jpg', 16),
(72, '20230331_olDaw9TFG6.jpeg', 17),
(73, '20230331_iQDirfiGgr.jpeg', 17),
(74, '20230331_oa9hl0PNXU.webp', 17),
(75, '20230331_8ifgaOjkfB.webp', 18),
(76, '20230331_rN964C6RdV.webp', 18),
(77, '20230331_5ZwksKCWUt.webp', 18),
(78, '20220912_DSS06eY5WkpUel02UyFELxMx.jpg', 19),
(79, '20220912_PsZhofdKiZo65TMEXb6wxQw1.jpg', 19),
(80, '20220912_gYfLjWE7c1APFrDKGNRJQW95.jpg', 19),
(81, '20220802_tPAC8N1s6SK7IfrOmSgtlcbV.jpg', 19),
(82, '20220912_9otDaFHXpHS6SXAfG42pEC1u.jpg', 19),
(83, '20220928_HrPRwIqtiOUwuwdb8jcYNBqP.jpg', 20),
(84, '20220928_2JRhBEDqdnhLEamY27cecX6n.jpg', 20),
(85, '20220928_8Njpp3WMJNXPZeXcs7ySpXq1.jpg', 20),
(86, '20220928_XeTZ8G5zJprBgDaaE5HzJjUI.jpg', 20),
(87, '20220802_7eOkmPf3XKOOtpMSyyANQhyQ.jpg', 20),
(88, '20220928_WToIqqQdi7clSNfrV23su6Pf.jpg', 20),
(89, '20230331_hgGmE5RQi7.jpeg', 21),
(90, '20230331_71o7Ug2OSZ.jpeg', 21),
(91, '20230331_bK501eLkU1.jpeg', 21),
(92, '20230331_23HzX3x8qe.jpeg', 22),
(93, '20230331_Z4OTwKR7fV.jpeg', 22),
(94, '20230331_N56IgMdaOJ.jpeg', 22),
(97, '20230417_mUTqqZTqQY.webp', 23),
(98, '20230420_1xLts6u9qG.jpeg', 24),
(99, '20230420_mRyyREBCr3.webp', 24),
(100, '20230418_6qPJOvqURC.webp', 24),
(101, '20230420_rU8J8c9OKj.webp', 25),
(102, '20230420_sQcjSfMhgs.jpeg', 25),
(103, '20230420_mhZev614hw.jpeg', 25),
(104, '20230420_RK8WugdX5M.webp', 25),
(105, '20230417_YEaKaQ3uoj.jpeg', 26),
(106, '20230417_vf36Q2fpv3.jpeg', 26),
(107, '20230417_rFqKy6hoY5.webp', 26),
(108, '20230202_pkltEmHb6RbOgeF1.jpeg', 27),
(109, '20230202_WvP5qaSqpXNaKklh.jpeg', 27),
(110, '20230202_7R5vhLboXzlI5tjW.jpeg', 27),
(111, '20230202_0PWFPPrDPL4PEQGi.jpeg', 28),
(112, '20230202_cTmNPAhtgifOFhgZ.jpeg', 28),
(113, '20230202_aaZ5n7AcDDJ10Lb8.jpeg', 28),
(114, '20221213_aNTSPNiZ5cLKW0dEakZVucxL.jpg', 29),
(115, '20221213_25p0S2nBifCNfJRyL2wKDdy3.jpg', 29),
(116, '20221125_D7dYLogjmAQlpFptO4plaXvy.jpg', 29),
(117, '20221215_6SAsJMf3ZcQ8kDXndlqCtuX3.jpg', 29),
(118, '20221213_0SckNWnVkt1M1BevVhe1vx87.jpg', 29),
(119, '20221213_DJ6U5tPc7fntu1ODSdfsdLq8.jpg', 30),
(120, '20221217_5WCxCKv0B32ZPRXKQqll5qbH.jpg', 30),
(121, '20221217_lZ6g5LKphijO73ph58fCGvOM.jpg', 30),
(122, '20221217_znR491Xi3IXeAluQor2Mfpq0.jpg', 30),
(123, '20221125_WXraRv7OwGUF6upQO1ayZdhI.jpg', 30),
(124, '20230114_v3vYPe3Z7EdmkFRJ.webp', 31),
(125, '20230114_rnGlc4QitFqBgG7f.webp', 31),
(126, '20221013_HMSQte17xkvLJ7uRNXqyhYOU.jpg', 32),
(127, '20221013_gUaQM5XYU666Q8bkLA50mR1s.jpg', 32),
(128, '20221013_OqqAxZq7W7Xl0E9puni3yRYi.jpg', 32),
(129, '20211111_hoHZjmEeNHCEizOL3oJgGMno.jpg', 32),
(130, '20210912_klRwQx5TH0mYiBecKC6aRJ5j.jpg', 33),
(131, '20210912_CaLD3xMwzrr2RaDRu68vJK48.jpg', 33),
(132, '20210912_tk0oFdbAYNgw1wZlLcni4i3e.jpg', 33),
(133, '20210909_HyHkmjraEV7KaAWu3Icds3fB.jpg', 33),
(134, '20210912_EJpnqDZCjgtQHOCCD6WQ1YMN.jpg', 34),
(135, '20210912_eyQ58lfXLVPOP4gZH5amR7eB.jpg', 34),
(136, '20210912_dhvEGtxK3FyEkFJq4MsjBV4z.jpg', 34),
(137, '20210819_OukmQELUimgribMlfmiMp83A.jpg', 34),
(138, '20210912_BebNwUFvEcAVyDSd3rn9GlxZ.jpg', 35),
(139, '20210912_bvuRx19QpkfabphaJPcJwzXv.jpg', 35),
(140, '20210819_Zv0yZBIW4AdqbHSicoN4m5nr.jpg', 35),
(141, '20210912_1ePRXkHsewAAeUQhc1BTPAvH.jpg', 35),
(142, '20210912_1bqYJBZGQ0z1bilgvtzsgS9f.jpg', 36),
(143, '20210912_2DjlRzK4cRwnyOVF1JrJ80jN.jpg', 36),
(144, '20210912_RPgurx2TdIwYQCHDg4Sh9TBy.jpg', 36),
(145, '20210819_wcxOMMIcHBV9AaJC9EKDw1Uc.jpg', 36),
(146, '20221013_bRMxlFNfuCeOLHJUW5Thab8f.jpg', 37),
(147, '20221007_w1tbnwBKaVR757pSYlW3IlWO.jpg', 37),
(148, '20221013_DxDXFamXGZKzNpJVEPSZCoIL.jpg', 37),
(149, '20221013_PRDbcvNcEPG06XgsMTbvdNRd.jpg', 37),
(150, '20220909_GaW8d07FtKKc3UbOA6VCuLxK.jpg', 37),
(151, '20221007_0IOpQgE82u8TatdgeO5m31Ea.jpg', 38),
(152, '20221017_YHZ4DG8k3shOTGa6uHmp8jfk.jpg', 38),
(153, '20221017_eWvgZ7JOjdrSlyeIW3fBqi1B.jpg', 38),
(154, '20221017_tFoafwBmblLxVuOEhgp8mEP9.jpg', 38),
(155, '20220909_8dTkI2q99trBmggdUDwplthw.jpg', 38),
(156, '20221013_52LbzyxdN4Yx93L0PMJuNMby.jpg', 39),
(157, '20221013_0yxwfVeRyfWzHBUUdE3syuEY.jpg', 39),
(158, '20221013_wiYK9kwW97UZ9InOjqRRz0ei.jpg', 39),
(159, '20220729_zZYeeusJp2iQM2VKO0ZXIXCD.jpg', 39),
(160, '20220906_oLn9cGcnsMMqx6MrnFzLwwfO.jpg', 40),
(161, '20220906_qPPmQA9HhdgljIrKKR3MQ8a7.jpg', 40),
(162, '20220906_txMFUDteX62Dbx1CeKWbM89c.jpg', 40),
(163, '20220906_cYHDMx2uNACVD1jANOtk7Plk.jpg', 40),
(164, '20220729_x94DpOSECetEzAMd7UCcJNMg.jpg', 40),
(165, '20220829_FHwuh51QPYFQfD1h24mn7ip2.jpg', 41),
(166, '20220829_Ohqhc3IDChC01vR0uvVs2wkv.jpg', 41),
(167, '20220829_cxncVVNry1bKnBNwfpjGThUT.jpg', 41),
(168, '20220606_4FsZT3LLQBFM6lhUFNsIUj0w.jpg', 41),
(169, '20210924_F1bOkKNj8LBsbJx2vzOrPOSf.jpg', 42),
(170, '20210924_D2QFJ8u4OihR6nJIJQ6YTcbT.jpg', 42),
(171, '20210924_Sr9qgCwlMIXtAJsrvWzAjxPS.jpg', 42),
(172, '20210924_NfxMuTT0x3dza2o2JZ92A7cb.jpg', 42),
(173, '20210920_ZpI1jqMc2EpHeHPzsxqnxsv1.jpg', 42),
(174, '20220718_BWOcxXcdArFpB9p3uAFP8w5I.jpg', 43),
(175, '20220718_RlmoZe6dUh3jHMlkM8eEr7E1.jpg', 43),
(176, '20220718_wLLMU6nQj2JwcSgRFfCehkTS.jpg', 43),
(177, '20210819_oKgiqHOHAHzSL0ucNZxzESoY.jpg', 43),
(178, '20220718_fkPpOqAY9nI9blEuDjusXj8d.jpg', 44),
(179, '20220718_NLAnbiQdWadxiOwuUbdOM2aZ.jpg', 44),
(180, '20210819_mfODoZnfsQtjvadnmwuVdRkZ.jpg', 44),
(181, '20220718_ArkJA5EtThFib4Vg39Zwe4bc.jpg', 44),
(182, '20210924_xnPawEUBGQBXCSaCiKcRxEgn.jpg', 45),
(183, '20210924_X7ctAOuw5jFzercDTeKFOiyG.jpg', 45),
(184, '20210819_sHja9Mcede00bQ1rsGJZcVWf.jpg', 45),
(185, '20210924_v8O0aikSW14N5ngveYOulLzK.jpg', 45),
(186, '20230202_w4Nf8qh6hZw4N4ht.jpeg', 46),
(187, '20230202_1yPdUn43A85gK4dn.jpeg', 46),
(188, '20230113_22NBMF8AkfD7mUwd.jpg', 46),
(189, '20230113_6PLZgGuRESDKcgHr.webp', 46),
(190, '20230113_zdfM2dhrQEnmslrq.webp', 46),
(191, '20230113_5Wisv1xTZsLJTs57.webp', 47),
(192, '20230113_vMjNVBNnWU3fcc2o.jpg', 47),
(193, '20230113_V4rOPdx91MIHK6bX.jpg', 47),
(194, '20230113_q1ach4jBytm4ySFu.webp', 47),
(195, '20230113_57uI7yryjxRyoYtV.webp', 47),
(196, '20230105_4r7AQLFz3V1UlJ6UbC6KY3kL.jpg', 48),
(197, '20230105_0PnzGjCBKnMQStXpkyQYrWel.jpg', 48),
(198, '20230105_BFA7ikUYgjTY4U7RnWSYRJfD.jpg', 48),
(199, '20230105_GRgb9jI1hX8vFZWRRKCwGc7k.jpg', 48),
(200, '20230105_HYfamavPDsclDuATajP8zFCi.jpg', 48),
(201, '20221223_2RybPGLI5R16kZsQWA06Ehxj.jpg', 49),
(202, '20221228_RmKXlcWF60VuWDne0veKIpbu.jpg', 49),
(203, '20221220_d1u0N3cqbHRBjZh0HLUTQjy0.jpg', 49),
(204, '20221223_rByjwf6RdfHgKgW769FMxv7h.jpg', 49),
(205, '20230105_9jDHm4wgRZF4kPkCRoUukCBx.jpg', 50),
(206, '20230105_7mDyi9cRFf5vEhgJjMqERd0R.jpg', 50),
(207, '20230105_gWM8miPWpQ7TpI1Ny8jkuqVc.jpg', 50),
(208, '20230105_o8Mu6LFXZPYxiKBDb5YNLb8N.jpg', 50),
(209, '20221216_95yfOO29EzFFMMBPGk48m8uo.jpg', 50),
(210, '20221222_0Vpsn4IZhwRKSoR6OYgs9Kdu.jpg', 51),
(211, '20221222_LatW6g7RbCJOEhfof7dyQoVT.jpg', 51),
(212, '20221222_Pa97VYoAdFnwrIQCnfw7ICm6.jpg', 51),
(213, '20221216_biB3UT6Ni0Ds77fFuWSBEcJs.jpg', 51),
(214, '20221220_tZGsi6rbtanSnrOIuWAeVM6I.jpg', 52),
(215, '20221209_F9soVlxHtc7qwrZbsgprPNRK.jpg', 52),
(216, '20220528_tSTY9lwPV0GiCqovJXjh2BvF.jpg', 53),
(217, '20211208_yQVcfQMXczXKtywiKIRN7Dwl.jpg', 53),
(218, '20211208_veYZmFkvrTwXEDSUST5H9FfC.jpg', 53),
(219, '20211208_CV4xOPkbWBVkqPWh7NG61R1h.jpg', 53),
(220, '20211208_kjIxwsczNXumaNxES3r0ptRq.jpg', 53),
(221, '20211208_cJJeESVDerpz4fUJdHuArCzi.jpg', 53),
(222, '20211119_AED0xOA8eaP2p9nqNGXMfi5o.jpg', 53),
(223, '20220528_eB7ezCCJCzwCKQnMLSex3d0i.jpg', 54),
(224, '20220528_aaFFf2g7ygYhE8PDF59j1h9S.jpg', 54),
(225, '20220528_TLN478tIorUBfNfJixM0Kcl7.jpg', 54),
(226, '20220528_kGdYiypa6ufCqSkQpoacqpUM.jpg', 54),
(227, '20220528_PONl7V2NCP7TiCVC8a2WdYQ8.jpg', 54),
(228, '20210819_l6HqSlfB57Q8DEa32FzFG9uN.jpg', 54),
(229, '20220528_UqkJiMMbLJPANmNwUOEBTQqE.jpg', 54),
(230, '20230103_AOvuiyid2WUbhZjgrriEZPgp.jpg', 55),
(231, '20230113_NTBE7tbXR6Pvmkqc.webp', 55),
(232, '20221228_RPVdgHZbtttCNc9BPAirmne9.jpg', 55),
(233, '20230113_tm1jLNEoEzDxZ3QH.webp', 55),
(234, '20230113_hdrW7YbfnPYOayx3.webp', 55),
(240, '20221220_45NZ5FdPxLmnzn0D8OzKNzb3.jpg', 57),
(241, '20221226_IzsY3TwRASHPxGvWRjQkxcr5.jpg', 57),
(242, '20221224_9yTaH0ZdHhBMm3Exump6cDsZ.jpg', 57),
(243, '20221206_jhfL5odK9MerPg1WOXR8pqh3.jpg', 57),
(244, '20221226_5asftrLHWrKvNXgNCVKjMjpu.jpg', 57),
(245, '20221117_xIum078GEC0gqUCWkKJqT9lf.jpg', 58),
(246, '20221103_nwQ2mBYk9CnXcntsHz5Fii6l.jpg', 58),
(247, '20230113_hIVz0Cm7j7KEJ2bX.webp', 58),
(248, '20230113_YRgN3gncxHnbsxdC.webp', 58),
(249, '20230113_LCfa5AD9aIOOxFfe.webp', 58),
(250, '20221011_Fao2nydpf5RAaOz9wHSAw2Lx.jpg', 59),
(251, '20221102_3px3waVwLHzysvuPb5V4hys5.jpg', 59),
(252, '20221017_ITYeCHn3nY3lEULo4NULn3TT.jpg', 60),
(253, '20221017_lxf35ZnjE5zfn0FuJDt915cS.jpg', 60),
(254, '20221017_wWAqX0q5qFYtFDaDF7hkjnhV.jpg', 60),
(255, '20221017_fpmRWPW0jEt8cpwPNrae0BYn.jpg', 60),
(256, '20221017_EdQ4VLY65KZMbo2Yj5T1d3B7.jpg', 60),
(257, '20221011_J2B7b9prcUFjcfRn8hH7InEg.jpg', 60),
(258, '20211217_E5FLocJQMVxDjuiOnEev1IPQ.jpg', 61),
(259, '20211217_MtlfGKjr2JANqjbhZSzcV21X.jpg', 61),
(260, '20211216_t1ljM3WmwefUJlo19huqBFiB.jpg', 61),
(261, '20211111_CIYSOW3Wr9kDM19edYuzcD0T.jpg', 61),
(262, '20211111_PvdNl0grRTBDwF9PMUpnddMf.jpg', 61),
(263, '20211111_QNO54wqCSaQ0WWwGLoXAxzIW.jpg', 61),
(264, '20211111_Ih92WDGmahygWyEeZWXTxFld.jpg', 61),
(265, '20211111_IvNHxSrOX7xJbjG1fQ7sQkbs.jpg', 61),
(266, '20221025_8X5hE2K2qVsdBqDz1ZIp27lF.jpg', 62),
(267, '20221025_opMk4GiKBffbuwDSOASvdPRL.jpg', 62),
(268, '20221025_z46HLi2GiYKVyB3d2MEBouaP.jpg', 62),
(269, '20221025_nEJNKGenrNrP2tRXUj8oobPB.jpg', 62),
(270, '20221025_ywTidu5RjLotyjLgTcjFYBh1.jpg', 62),
(271, '20210819_XoxJwSYnIZIwZFDH4icNyjzk.jpg', 62),
(272, '20221025_o2I9MHpsOzb0GGGECEaTjRqj.jpg', 62),
(273, '20221025_tXmwdD0cmfHLTDeBJTFFf6MZ.jpg', 63),
(274, '20221025_BUHHJZGXUFLqQFEBVZHUqDYj.jpg', 63),
(275, '20221025_wTfHQDLPxb8L0opuyCeWFqBy.jpg', 63),
(276, '20221025_7rOh3CkvMiCuaKb6SghqNlIj.jpg', 63),
(277, '20221025_zFJJIbHd433wyiNPYZBwPWkH.jpg', 63),
(278, '20210819_0O8T1pxM8dxLwqRikGlKxLeX.jpg', 63),
(279, '20221215_meicHHI001w8iyarxlZteeT7.jpg', 64),
(280, '20221216_odjcTTO6WPS6OLRh73DzRltJ.jpg', 64),
(281, '20221216_lgZ1uwnAeojRbv3JHPpJgIjF.jpg', 64),
(282, '20221011_EK0xxOFnJi3TeQjh2O6u656d.jpg', 64),
(283, '20221117_h13MnZwgmjrHrpekfUFSUIDT.jpg', 65),
(284, '20221117_z4qUTt2u29snQ9PtjxUDyhNv.jpg', 65),
(285, '20221215_j3s6x6JsAYlYtkEyEV6Uph6m.jpg', 65),
(286, '20221117_EDpXSm7VFTIzl2foRaKPkxgH.jpg', 66),
(287, '20221215_adLHe0Lr7O98OjJniI4CqkIR.jpg', 66),
(288, '20221108_iviyqt5o1LJK2DQ23yTzfxhp.jpg', 66),
(289, '20221216_AjeObbpfcDGe8pa4CsaCrKjA.jpg', 66),
(290, '20221216_hidCSejphX8tMrPbTESnf5Eb.jpg', 66),
(291, '20221117_Y9SXu64ImTeEt1x3XvecxH1i.jpg', 66),
(292, '20221108_Zj72ehJ0bHVxdGpAav95poTI.jpg', 67),
(293, '20221222_KMggIdFCwnFu184ntfv1KnIS.jpg', 67),
(294, '20221222_TainxKiNHgqqDueT42GpxtGk.jpg', 67),
(295, '20221222_FsHvyLxLbgQjHjaptDOrZdpQ.jpg', 67),
(296, '20221222_WuDo0udk2nlX6Z6kZKwSRiEC.jpg', 67),
(297, '20221222_sxY0JyhagJ0OgJfB2BTDHUMY.jpg', 67),
(298, '20221221_E0ZHYeFEuAzhUnBbdGqLXhfD.jpg', 68),
(299, '20230113_Qu9cvsef93CO6Iox.webp', 68),
(300, '20221214_YDf5xRKif63piFyzB08xp0Lt.jpg', 68),
(301, '20230113_hRKwOfm6TZC5QBrk.webp', 68),
(302, '20230113_7s1PATWHB1lY5LOi.webp', 68),
(303, '20230105_zGHkuNU1sGCpChriGNNikeYL.jpg', 69),
(304, '20221226_GRt3tHZXnK8RwhwxxJpEiOa2.jpg', 69),
(305, '20221226_f06XXgUklvbfVUyws4s0Aepi.jpg', 69),
(306, '20221226_BtfoFOfV35Kdk7HLurfPEk1w.jpg', 69),
(307, '20221214_dAo91nEiiDIARnCDAEAZcuMj.jpg', 69),
(308, '20221229_pkG5K8fz7zeQBXpHA39F20b3.jpg', 70),
(309, '20221229_U8gR0N3R4XeCiW8ws5IR8uMO.jpg', 70),
(310, '20221223_7vCNvRLyEpkMsrhsCXjYJGLf.jpg', 70),
(311, '20230113_ZZw4sz640DYGWpRi.webp', 70),
(312, '20230113_Jhah6VulIfox9uWu.webp', 70),
(313, '20230113_LtMQT1XR5I3yHMhZ.webp', 70),
(314, '20221229_StWXqtwRE9Har0S8vaHFYSDc.jpg', 71),
(315, '20221229_DlYOUkjL7BshX7vswwCkDU5X.jpg', 71),
(316, '20230113_gljaixtdub7j2TOB.webp', 71),
(317, '20221223_n2T6wX4TfTydYJZph3Q5Msex.jpg', 71),
(318, '20230113_Deoss9c1e9S7Sfm9.webp', 71),
(319, '20230113_wlxnQJs9VelOwsyC.webp', 71),
(320, '20221229_Mzxr7Dk3JAyoVJCmZHyJ517z.jpg', 72),
(321, '20221229_dEw6P1JFFghsLomdrlMqGpsP.jpg', 72),
(322, '20230113_qoDzasjgzeTgLjPr.webp', 72),
(323, '20221223_Xf2BVqFKgPjt94mujgKS2e8x.jpg', 72),
(324, '20230113_2wM0yFyE0QgKU4yZ.webp', 72),
(325, '20230113_VbPLWf0HrSPcpIIl.webp', 72),
(326, '20221003_ORzjLSBndubj3EZU01Y5rE1S.jpg', 73),
(327, '20220930_BCkfPlwRW8GAZcIynW9d6Uub.jpg', 74),
(328, '20221117_hCkcbhRz7InyW0KrO4CBJDfu.jpg', 75),
(329, '20221215_RzaWnNtkKORiCKsqyQ1WlFIx.jpg', 75),
(330, '20221216_7d1Qc43Jpn14fZl4lzYNzYdI.webp', 75),
(331, '20221216_azdkzHx6OrgQPW0XG7LzEajK.webp', 75),
(332, '20221107_4Ug622fZ33gM1acXhU4RQhwm.webp', 75),
(333, '20220930_sTaYrKii0riqokByaZZGwQTW.jpg', 76),
(334, '20220929_mX7UayVTBOUlbcqcV2rU6CIo.jpg', 77),
(335, '20221008_nUrrvY3sqo6Hn6Iq4wPhJrFm.jpg', 78),
(336, '20221013_KMxWST8q8nDiHUVo9xyGoS1N.jpg', 78),
(337, '20221013_S5kjc6vmeDpAvZkuMtxYG9HR.jpg', 78),
(338, '20221013_GZV1cv3Q1EU71MbC4otO86kj.jpg', 78),
(339, '20221013_7tgLSOjbVJivLdbeihctg5ak.jpg', 78),
(340, '20220816_IIE7EJ4t4iswr9aLZhxcoOUI.jpg', 78),
(341, '20220828_SxOoDQFxi107bf6wF1dveX40.jpg', 79),
(342, '20220828_89R8JONymbKPvCWoWUQUrOIV.jpg', 79),
(343, '20220828_YJ2UeTq17qH72nSf7enJ5Zy9.jpg', 79),
(344, '20220828_kpoQSUsIAqao6xNqGdju5jBi.jpg', 79),
(345, '20220808_6lOj48B2HyocY4HfGIdtE3Qp.jpg', 79),
(346, '20220516_i6OnzQVhAKqYNztRgWouu3oF.jpg', 80),
(347, '20220516_EcRcsziT6JaAx2HCoHKeXp75.jpg', 80),
(348, '20220527_lhcrg0Tsr9x32JXIeQCEOgW8.jpg', 80),
(349, '20220527_gJAoRIa8KU8b4dNjT9URp3zt.jpg', 80),
(350, '20220527_HrWw035qkF2210hMqrs8TazR.jpg', 80),
(351, '20220407_5xW79vuc6LyIHXAzcr0jORqT.jpg', 80),
(352, '20220615_Ll7BsHEEeZquMkJ6OTKgwt27.jpg', 81),
(353, '20220615_I9nirFJPv5ip1rkJHdZ40kn7.jpg', 81),
(354, '20220615_sCC6GLIP2qUzHdpPIsvyoBjS.jpg', 81),
(355, '20220615_bzfcGVhlm0etq9ALPSSleh5B.jpg', 81),
(356, '20220615_CmS8tjAJjPAavsCjCR2q62ae.jpg', 81),
(357, '20220313_Li6ApGSnDZlN4SYw2ptrr7T2.jpg', 81),
(358, '20220615_hqLqQe75IijvCwfqDTZ1ndns.jpg', 81),
(359, '20221216_E2XYgyEPyk7AX2w5RiVdBRfb.jpg', 82),
(360, '20221216_vseTN1zwem4AqmS3eflT8YC4.jpg', 82),
(361, '20220313_CmgxapDK9qWoPUKzdgs6nqpS.jpg', 82),
(362, '20221216_ye3l4jT8YkmSEVLGdnaMFjbR.jpg', 82),
(363, '20221217_p9m2C5dKZbgtIcbtb4vySDAP.webp', 83),
(364, '20221217_JpXV2kl2YA2p2houAKJP1lty.webp', 83),
(365, '20220313_zUCrFZmzhwylTnlX4fgQCG2Z.jpg', 83),
(366, '20220527_sgTKGOJeyVxm4oU1hnJyqaad.jpg', 84),
(367, '20220106_YFshz8DEYX1eXwHBFQ1FW8c4.jpg', 84),
(368, '20220106_PDyu8REz660ti6cPZDf9A2aH.jpg', 84),
(369, '20220106_pxFEp9QvUFAjn1TR2kYoiJAb.jpg', 84),
(370, '20220106_kDCRpHaNeQcsL3VTGzL638yj.jpg', 84),
(371, '20211231_Y6B0fqti5E8lfoxDWLYvpRJ8.jpg', 84),
(372, '20220106_ZFioFcWpk4b4bCstPOUnTtE0.jpg', 84),
(373, '20221216_kf78WCzk5IJse3ekNksa1qlR.jpg', 85),
(374, '20220527_kwAbQ1lYY7p7vcu1MC3Obicr.jpg', 85),
(375, '20221216_sjeNNNvXIt11anlFXbKh3dDp.jpg', 85),
(376, '20210818_cpJJ7xJSIOAX7P5INNRtwdms.jpg', 85),
(377, '20221215_GWuQdhskPWHn2NjhRzkESHRf.jpg', 86),
(378, '20221213_x2uQceTxZI6GKs0aosBaBAAm.jpg', 86),
(379, '20221217_qcgYOYt6hh4WdD2lZX5AKxfZ.jpg', 86),
(380, '20221217_gQfqf6Yar7TA1DGsVdnRjmDk.jpg', 86),
(381, '20221127_tjgERtO4BY7GJeFMhhHsykos.jpg', 86),
(382, '20221217_kxE7ociIVL2aTcphTEwSRVmQ.jpg', 86),
(383, '20230113_bNHdHEl3o8EHU70k.webp', 87),
(384, '20230113_as1Ip2hPifmn3SBp.webp', 87),
(385, '20230113_CkNTYIqNmqS0BOqG.webp', 87),
(386, '20210917_yQYU7RV2kJQkrxGFu4pYNotP.jpg', 88),
(387, '20210917_9u2oaYlwiq556PIpJAhaSrgu.jpg', 88),
(388, '20210917_qs9KoZBwGFAu6n9Kx8YjiD7R.jpg', 88),
(389, '20210819_kVNbkLncQeughzj26GZPbt9K.jpg', 88),
(390, '20210914_b1qk2Qw9oCBTNVfRG4yaBH8e.jpg', 89),
(391, '20210914_lQEhBzBXlpPJ2JpLBZvTVilm.jpg', 89),
(392, '20210914_8eN2sCKMKadpIcxWVNQMWeSN.jpg', 89),
(393, '20210819_ZnncAQK3SyRFwMDaGLQoGiPF.jpg', 89),
(394, '20210917_yQYU7RV2kJQkrxGFu4pYNotP.jpg', 89),
(395, '20221220_p70kumG4She7iimQSUJxVqSn.jpg', 90),
(396, '20221217_BZ332M46n39R3xXLpbONyRMv.jpg', 90),
(397, '20221217_8VXKySAjlJHBxhAqMvJg6f1i.jpg', 90),
(398, '20221212_0fFo6fmkKJxuvjRoNBsq13yy.jpg', 90),
(399, '20221008_ljWNeJ5e1KVYoKzHfpxP24Hd.jpg', 91),
(400, '20221013_uTNNFIKdXhfKfSQd3PMJkPc5.jpg', 91),
(401, '20221013_oNCK8Vtl5rJQM3SHfjzhNqXO.jpg', 91),
(402, '20221013_7VWLOZOfI82Ixp3aPv99WaiN.jpg', 91),
(403, '20221013_QEPgHiML8mh9JfUEeK92EWGD.jpg', 91),
(404, '20221013_jsxZTzTbmXJsf6sYB7NV6Bfg.jpg', 91),
(405, '20220901_omg7eoQbCSXYwMOOCj433hxz.jpg', 91),
(406, '20221013_4vBBw033JKQdnoPXdvYTbjsl.jpg', 92),
(407, '20220901_Iby4cKfGWxXxLS8ysQVZ61uc.jpg', 92),
(408, '20221013_cGnP1Jkx33Zx5z1uox0cYnlO.jpg', 92),
(409, '20221013_XwyO93cFrcCKLSTBVzwU5Itj.jpg', 92),
(410, '20221013_qWEys6sES7NavjA5Srnlalaa.jpg', 92),
(411, '20221013_idGoQNdvMpA5kF4bppBMkrG0.jpg', 92),
(412, '20221102_cYwUMj9PczyxAViUUmLD1N4J.jpg', 93),
(413, '20221217_viWDruYMqQh8VkLFQYvyvXEV.jpg', 93),
(414, '20221217_HiMVoKcYkslEzrnT6vVJFrKs.jpg', 93),
(415, '20221215_TkiqSX8O3MNIX3sdRKX9g86y.jpg', 93),
(416, '20220722_6iC1m9cYimOliLvjlb33ncyj.jpg', 94),
(417, '20220722_fjOvQJuAQbRoaOGfKrALWWVI.webp', 94),
(418, '20220722_Zdb4kRLpyyDHKPpYDe3FR5YU.jpg', 94),
(419, '20220722_pr7UnH7VVWcXhoPUwO3RbpjD.jpg', 94),
(420, '20220722_sINDgTDGO7Cjc4NmfW1oGQ6N.jpg', 94),
(421, '20220622_VylLGozs9sUszJkSzxa7qe0u.jpg', 94),
(422, '20220828_QaNcrF8cumXEhVNB85s1hyN1.jpg', 95),
(423, '20220828_ZhcCArBrtRhK4PNIHaAWcjfR.jpg', 95),
(424, '20220828_7GQPM38rjB1OFrrqx4f66ejQ.jpg', 95),
(425, '20220828_TmaDRQPOzxyex4KlmUBIdkZS.jpg', 95),
(426, '20220810_VRS6cRExCT8JOmabbcAfX8Db.jpg', 95),
(427, '20220828_3OVjMnlT5zHlr4seQTObpacc.jpg', 95),
(428, '20220801_M2V29P0zeHZuP6p7lOvuBpil.jpg', 96),
(429, '20220801_JuHvqGq3fGsRB1jubi4YAlit.jpg', 96),
(430, '20220727_UckyfEumTQSQfArKqTdKt71q.jpg', 96),
(431, '20220801_01JWyRg8fOfSWUtp9tTCrkhO.jpg', 96),
(432, '20220801_2CCCfdfnqp5o1tOFYxIqEr3c.jpg', 96),
(433, '20220725_HXF0BPDAGH6XaFUeDGeFt71E.jpg', 97),
(434, '20220725_IypH35eL2IY09vEJQuYblUD1.jpg', 97),
(435, '20220725_PLOm97W4iZsW4ox8npsg2O10.jpg', 97),
(436, '20220723_MXuR6cEZGlHdp3cdHvXFWZTY.jpg', 97),
(437, '20220722_6iC1m9cYimOliLvjlb33ncyj.jpg', 98),
(438, '20220722_fjOvQJuAQbRoaOGfKrALWWVI.webp', 98),
(439, '20220722_Zdb4kRLpyyDHKPpYDe3FR5YU.jpg', 98),
(440, '20220722_pr7UnH7VVWcXhoPUwO3RbpjD.jpg', 98),
(441, '20220722_sINDgTDGO7Cjc4NmfW1oGQ6N.jpg', 98),
(442, '20220622_VylLGozs9sUszJkSzxa7qe0u.jpg', 98),
(450, '20220824_M8PAQvUN0qoxAA4IgdG74anL.jpg', 100),
(451, '20220323_guz6MuMM4mid9G2KZVbc6DGR.jpg', 100),
(452, '20220323_H8jHTe521E5msPL54OpFMAFc.jpg', 100),
(453, '20220313_DaTzbN6IS4qTe4WlBSgYLyR0.jpg', 100),
(454, '20220323_pwuMv6aGGPAlH40EJFaInoai.jpg', 100);

-- --------------------------------------------------------

--
-- Table structure for table `product_size`
--

CREATE TABLE `product_size` (
  `size_id` int(10) UNSIGNED NOT NULL,
  `size_name` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_size`
--

INSERT INTO `product_size` (`size_id`, `size_name`) VALUES
(1, 'S'),
(2, 'M'),
(3, 'L'),
(4, 'XL');

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `receipt_id` int(10) UNSIGNED NOT NULL,
  `receipt_date` date NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `order_note` text NOT NULL,
  `receipt_status` int(11) NOT NULL,
  `accept_by` int(10) NOT NULL,
  `belong_to` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`receipt_id`, `receipt_date`, `customer_id`, `order_note`, `receipt_status`, `accept_by`, `belong_to`) VALUES
(1, '2023-04-20', 1, 'a', 3, 1, 1),
(2, '2023-04-20', 2, 'q', 2, 3, 1),
(17, '2023-04-21', 17, 'không có gì', 0, 0, 1),
(19, '2023-04-21', 19, 'ddd', 1, 1, 1),
(20, '2023-04-21', 20, 'khong', 0, 0, 1),
(21, '2023-04-21', 21, 'dsds', 3, 1, 1),
(22, '2023-04-21', 22, 'eqqwe', 2, 1, 1),
(23, '2023-04-21', 23, 'khong', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_passw` varchar(255) NOT NULL,
  `user_permission` int(1) NOT NULL,
  `full_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_name`, `user_email`, `user_passw`, `user_permission`, `full_name`) VALUES
(0, 'none', 'none', 'none', 3, 'none'),
(1, 'admin', 'admin@gmail.com', 'dinhanha5', 0, 'Nguyễn Đình Anh'),
(2, 'dinhanh', 'dinhanh@gmail.com', 'dinhanha5', 1, 'Đình Anh Nguyễn'),
(3, 'admin2', 'admin2@gmail.com', 'dinhanha5', 0, 'Đình Anh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`receipt_id`,`product_detail_id`),
  ADD KEY `product_detail_id` (`product_detail_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `product_detail`
--
ALTER TABLE `product_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `size_id` (`size_id`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_size`
--
ALTER TABLE `product_size`
  ADD PRIMARY KEY (`size_id`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`receipt_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `accept_by` (`accept_by`),
  ADD KEY `belong_to` (`belong_to`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `product_detail`
--
ALTER TABLE `product_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=401;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=455;

--
-- AUTO_INCREMENT for table `product_size`
--
ALTER TABLE `product_size`
  MODIFY `size_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `receipt_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`product_detail_id`) REFERENCES `product_detail` (`id`),
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`receipt_id`) REFERENCES `receipt` (`receipt_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

--
-- Constraints for table `product_detail`
--
ALTER TABLE `product_detail`
  ADD CONSTRAINT `product_detail_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `product_detail_ibfk_2` FOREIGN KEY (`size_id`) REFERENCES `product_size` (`size_id`);

--
-- Constraints for table `product_image`
--
ALTER TABLE `product_image`
  ADD CONSTRAINT `product_image_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `receipt`
--
ALTER TABLE `receipt`
  ADD CONSTRAINT `receipt_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `receipt_ibfk_2` FOREIGN KEY (`accept_by`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `receipt_ibfk_3` FOREIGN KEY (`belong_to`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
