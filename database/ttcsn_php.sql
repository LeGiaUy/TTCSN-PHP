-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 25, 2024 lúc 04:45 PM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ttcsn_php`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_email` text NOT NULL,
  `admin_password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Uy', 'uyadmin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_cost` decimal(6,2) NOT NULL,
  `order_status` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'on_hold',
  `user_id` int(11) NOT NULL,
  `user_phone` int(11) NOT NULL,
  `user_city` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`order_id`, `order_cost`, `order_status`, `user_id`, `user_phone`, `user_city`, `user_address`, `order_date`) VALUES
(15, '1200.00', 'Đã giao', 1, 961750846, 'Hải Dương', 'Hải Dương', '2024-12-23 11:08:53'),
(16, '1200.00', 'Đã thanh toán', 1, 961750846, 'Hải Dương', 'Hải Dương', '2024-12-23 12:38:58'),
(17, '1200.00', 'Đã thanh toán', 1, 961750846, 'Hải Dương', 'Hải Dương', '2024-12-23 12:45:22'),
(18, '155.00', 'Đã thanh toán', 1, 961750846, 'Hải Dương', 'Hải Dương', '2024-12-23 13:27:53'),
(19, '1355.00', 'Đang giao', 1, 961750846, 'Hải Dương', 'Hải Dương', '2024-12-23 18:50:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` decimal(6,2) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `order_items`
--

INSERT INTO `order_items` (`item_id`, `order_id`, `product_id`, `product_name`, `product_image`, `product_price`, `product_quantity`, `user_id`, `order_date`) VALUES
(18, 12, '1', 'Iphone 16 Pro Max', 'featured1.webp', '999.00', 1, 1, '2024-12-23 08:47:18'),
(19, 12, '5', 'Samsung Galaxy S24 Ultra', 'phone3.webp', '1200.00', 2, 1, '2024-12-23 08:47:18'),
(20, 12, '7', 'Laptop Lenovo LOQ', 'laptop2.webp', '1000.00', 1, 1, '2024-12-23 08:47:18'),
(21, 12, '10', 'Sony WH-1000XM5', 'headphone2.webp', '333.00', 2, 1, '2024-12-23 08:47:18'),
(22, 13, '9', 'Laptop ASUS Gaming VivoBook', 'laptop4.webp', '777.00', 1, 1, '2024-12-23 08:49:07'),
(23, 14, '9', 'Laptop ASUS Gaming VivoBook', 'laptop4.webp', '777.00', 1, 1, '2024-12-23 10:20:37'),
(24, 15, '2', 'Samsung Galaxy Z Fold6', 'featured2.webp', '1200.00', 1, 1, '2024-12-23 11:08:53'),
(25, 16, '2', 'Samsung Galaxy Z Fold6', 'featured2.webp', '1200.00', 1, 1, '2024-12-23 12:38:58'),
(26, 17, '2', 'Samsung Galaxy Z Fold6', 'featured2.webp', '1200.00', 1, 1, '2024-12-23 12:45:22'),
(27, 18, '4', 'Tai nghe Bluetooth Apple AirPods 4', 'featured4.webp', '155.00', 1, 1, '2024-12-23 13:27:53'),
(28, 19, '5', 'Samsung Galaxy S24 Ultra', 'phone3.webp', '1200.00', 1, 1, '2024-12-23 18:50:32'),
(29, 19, '4', 'Apple AirPods 4', 'featured4.webp', '155.00', 1, 1, '2024-12-23 18:50:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `transaction_id` varchar(250) NOT NULL,
  `payment_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `payments`
--

INSERT INTO `payments` (`payment_id`, `order_id`, `user_id`, `transaction_id`, `payment_date`) VALUES
(1, 18, 1, '9B962420T83323447', '0000-00-00 00:00:00'),
(2, 18, 1, '22K008134W850603L', '0000-00-00 00:00:00'),
(3, 17, 1, '9CN26163KS060084U', '0000-00-00 00:00:00'),
(4, 16, 1, '1B76210540155522D', '0000-00-00 00:00:00'),
(5, 15, 1, '6Y0762917C147580R', '2024-12-23 13:48:04'),
(6, 19, 1, '7N931072ET4813019', '2024-12-23 18:50:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_category` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_image4` varchar(255) NOT NULL,
  `product_price` decimal(6,2) NOT NULL,
  `product_special_offer` int(2) NOT NULL,
  `product_color` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_category`, `product_description`, `product_image`, `product_image2`, `product_image3`, `product_image4`, `product_price`, `product_special_offer`, `product_color`) VALUES
(1, 'Iphone 16 Pro Max', 'phones', 'Apple Iphone 16 Pro Max', '67694f0c4e250.webp', 'featured1.webp', 'featured1.webp', 'featured1.webp', '999.00', 0, 'white'),
(2, 'Samsung Galaxy Z Fold6', 'phones', 'Samsung Galaxy Z Fold6', 'featured2.webp', 'featured2.webp', 'featured2.webp', 'featured2.webp', '1200.00', 0, 'black'),
(3, 'Laptop ASUS Vivobook 15', 'laptops', 'Laptop ASUS Vivobook 15', 'featured3.webp', 'featured3.webp', 'featured3.webp', 'featured3.webp', '500.00', 0, 'white'),
(4, 'Apple AirPods 4', 'headphones', 'Tai nghe Bluetooth Apple AirPods 4', 'featured4.webp', 'featured4.webp', 'featured4.webp', 'featured4.webp', '155.00', 0, 'white'),
(5, 'Samsung Galaxy S24 Ultra', 'phones', 'Samsung Galaxy S24 Ultra', 'phone3.webp', 'phone3.webp', 'phone3.webp', 'phone3.webp', '1200.00', 0, 'gray'),
(6, 'Samsung Galaxy A55', 'phones', 'Samsung Galaxy A55', 'phone4.webp', 'phone4.webp', 'phone4.webp', 'phone4.webp', '444.00', 0, 'purple'),
(7, 'Laptop Lenovo LOQ', 'laptops', 'Laptop Lenovo LOQ', 'laptop2.webp', 'laptop2.webp', 'laptop2.webp', 'laptop2.webp', '1000.00', 0, 'black'),
(8, 'Laptop Acer Aspire 3 Spin', 'laptops', 'Laptop Acer Aspire 3 Spin', 'laptop3.webp', 'laptop3.webp', 'laptop3.webp', 'laptop3.webp', '555.00', 0, 'black'),
(9, 'Laptop ASUS Gaming VivoBook', 'laptops', 'Laptop ASUS Gaming VivoBook', 'laptop4.webp', 'laptop4.webp', 'laptop4.webp', 'laptop4.webp', '777.00', 0, 'black'),
(10, 'Sony WH-1000XM5', 'headphones', 'Sony WH-1000XM5', 'headphone2.webp', 'headphone2.webp', 'headphone2.webp', 'headphone2.webp', '333.00', 0, 'white'),
(11, 'Baseus Bowie E11', 'headphones', 'Baseus Bowie E11', 'headphone3.webp', 'headphone3.webp', 'headphone3.webp', 'headphone3.webp', '11.00', 0, 'white'),
(12, 'Apple AirPods 4 noise cancellation', 'headphones', 'Apple AirPods 4 noise cancellation', 'headphone4.webp', 'headphone4.webp', 'headphone4.webp', 'headphone4.webp', '180.00', 0, 'white');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`) VALUES
(1, 'Uy', 'leuy091104@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759'),
(2, 'Uy', 'leuy@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Chỉ mục cho bảng `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `UX_Constraint` (`user_email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `order_items`
--
ALTER TABLE `order_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
