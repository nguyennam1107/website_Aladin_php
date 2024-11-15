-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th10 15, 2024 lúc 03:51 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `aladin`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_gia`
--

CREATE TABLE `danh_gia` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL CHECK (`rating` >= 1 and `rating` <= 5),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_muc`
--

CREATE TABLE `danh_muc` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_url` varchar(255) DEFAULT '#',
  `gender` varchar(50) DEFAULT 'Unisex'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danh_muc`
--

INSERT INTO `danh_muc` (`id`, `category`, `item_name`, `item_url`, `gender`) VALUES
(1, 'NỔI BẬT', 'Hàng mới về', '#', 'Nam'),
(2, 'NỔI BẬT', 'Member exclusives', '#', 'Nam'),
(3, 'NỔI BẬT', 'Những mặt hàng bán chạy nhất tuần', '#', 'Nam'),
(4, 'NỔI BẬT', 'Adizero', '#', 'Nam'),
(5, 'NỔI BẬT', 'Samba', '#', 'Nam'),
(6, 'NỔI BẬT', 'Gazelle', '#', 'Nam'),
(7, 'GIÀY', 'Dòng sản phẩm Originals', 'Male/Shoemale.php', 'Nam'),
(8, 'GIÀY', 'Bóng đá', '#', 'Nam'),
(9, 'GIÀY', 'Chạy', '#', 'Nam'),
(10, 'GIÀY', 'Tập luyện', '#', 'Nam'),
(11, 'GIÀY', 'Ngoài trời', '#', 'Nam'),
(12, 'QUẦN ÁO', 'Áo phông & Áo polo', '#', 'Nam'),
(13, 'QUẦN ÁO', 'Áo hoodie & Áo khoác', '#', 'Nam'),
(14, 'QUẦN ÁO', 'Áo nỉ và Bộ đồ thể thao', '#', 'Nam'),
(15, 'QUẦN ÁO', 'Quần', '#', 'Nam'),
(16, 'QUẦN ÁO', 'Quần bò', '#', 'Nam'),
(17, 'PHỤ KIỆN', 'Tất Cả Túi', '#', 'Nam'),
(18, 'PHỤ KIỆN', 'Ba lô', '#', 'Nam'),
(19, 'PHỤ KIỆN', 'Túi Tập Luyện', '#', 'Nam'),
(20, 'PHỤ KIỆN', 'Mũ Lưỡi Trai & Đội Đầu', '#', 'Nam'),
(21, 'PHỤ KIỆN', 'Găng Tay', '#', 'Nam'),
(22, 'NỔI BẬT', 'Hàng mới về', '#', 'Nữ'),
(23, 'NỔI BẬT', 'Member exclusives', '#', 'Nữ'),
(24, 'NỔI BẬT', 'Những mặt hàng bán chạy nhất tuần', '#', 'Nữ'),
(25, 'NỔI BẬT', 'Adizero', '#', 'Nữ'),
(26, 'GIÀY', 'Dòng sản phẩm Originals', 'Female/ShoeFemale.php', 'Nữ'),
(27, 'GIÀY', 'Running', '#', 'Nữ'),
(28, 'QUẦN ÁO', 'Áo phông & Áo không tay', '#', 'Nữ'),
(29, 'QUẦN ÁO', 'Áo Nỉ', '#', 'Nữ'),
(30, 'PHỤ KIỆN', 'Tất cả phụ kiện', '#', 'Nữ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `id_danhmuc` int(11) DEFAULT NULL,
  `is_new` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `image_url`, `description`, `category_id`, `id_danhmuc`, `is_new`) VALUES
(1, 'Giày Adidas XYZ', 1500000.00, 'https://example.com/image1.jpg', 'Mô tả giày Adidas XYZ', 1, 7, 1),
(2, 'Giày Adidas ABC', 2000000.00, 'https://example.com/image2.jpg', 'Mô tả giày Adidas ABC', 1, 9, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `zone` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `zone`) VALUES
(16, 'Admin', '$2y$10$T1rcZwvZgzhJE6Tc1hYlDeZhWYEPFXC4XaoUoLP3c1KmVKDk5u5AS', '2024-11-04 11:48:16', 1),
(17, 'Nam', '$2y$10$k46gcfPpW.Cccex2/bYR7.HxnA4djUFJmg1tV0j/ObsKCajai2j.q', '2024-11-04 11:56:50', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `danh_gia`
--
ALTER TABLE `danh_gia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `danh_muc`
--
ALTER TABLE `danh_muc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `fk_category` (`id_danhmuc`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `danh_gia`
--
ALTER TABLE `danh_gia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `danh_muc`
--
ALTER TABLE `danh_muc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `danh_gia`
--
ALTER TABLE `danh_gia`
  ADD CONSTRAINT `danh_gia_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`id_danhmuc`) REFERENCES `danh_muc` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `danh_muc` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
