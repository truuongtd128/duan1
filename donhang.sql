-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 11, 2023 lúc 04:57 PM
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
-- Cơ sở dữ liệu: `duan12023`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `soluong` int(11) NOT NULL,
  `ngaydathang` date NOT NULL,
  `pttt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`id`, `name`, `address`, `email`, `phone`, `soluong`, `ngaydathang`, `pttt`) VALUES
(1, 'haha', 'hoabinh', 'tran@gmail.com', '0398795093', 0, '0000-00-00', ''),
(2, 'qeqwe', 'q', 'ưeqweqweqwe', '23213214', 2, '2023-11-22', ''),
(11, 'ADIDAS', 'Hòa Bình Lạc Sơn', 'tranductruong2k4hb@gmail.com', '398795093', 2, '0000-00-00', ''),
(12, 'ADIDAS', 'Hòa Bình Lạc Sơn', 'tranductruong2k4hb@gmail.com', '398795093', 2, '0000-00-00', ''),
(13, 'ADIDAS', 'Hòa Bình Lạc Sơn', 'tranductruong2k4hb@gmail.com', '398795093', 0, '0000-00-00', ''),
(14, 'ADIDAS', 'Hòa Bình Lạc Sơn', 'tranductruong2k4hb@gmail.com', '398795093', 1, '0000-00-00', ''),
(15, 'ADIDAS', 'Hòa Bình Lạc Sơn', 'tranductruong2k4hb@gmail.com', '398795093', 0, '0000-00-00', ''),
(16, 'admin', 'Hòa Bình Lạc Sơn', 'tranductruong2k4hb@gmail.com', '398795093', 2, '0000-00-00', ''),
(17, 'trường', 'Hòa Bình Lạc Sơn', 'tranductruong2k4hb@gmail.com', '398795093', 1, '0000-00-00', ''),
(18, 'admin', 'Hòa Bình Lạc Sơn', 'tranductruong2k4hb@gmail.com', '398795093', 3, '0000-00-00', ''),
(19, 'admin', 'Hòa Bình Lạc Sơn', 'tranductruong2k4hb@gmail.com', '398795093', 1, '0000-00-00', ''),
(43, 'admin', 'Hòa Bình Lạc Sơn', 'tranductruong2k4hb@gmail.com', '398795093', 1, '2023-12-07', '0'),
(49, 'admin', 'Hòa Bình Lạc Sơn', 'tranductruong2k4hb@gmail.com', '398795093', 1, '2023-12-11', '0'),
(50, 'admin', 'Hòa Bình Lạc Sơn', 'tranductruong2k4hb@gmail.com', '398795093', 1, '2023-12-11', '1'),
(51, 'admin', 'Hòa Bình Lạc Sơn', 'tranductruong2k4hb@gmail.com', '398795093', 1, '2023-12-11', '0'),
(52, 'admin', 'Hòa Bình Lạc Sơn', 'tranductruong2k4hb@gmail.com', '398795093', 2, '2023-12-11', '1'),
(53, 'admin', 'Hòa Bình Lạc Sơn', 'tranductruong2k4hb@gmail.com', '398795093', 1, '2023-12-11', '1'),
(54, 'admin', 'Hòa Bình Lạc Sơn', 'tranductruong2k4hb@gmail.com', '398795093', 1, '2023-12-11', '1'),
(55, 'admin', 'Hòa Bình Lạc Sơn', 'tranductruong2k4hb@gmail.com', '398795093', 1, '2023-12-11', '1');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
