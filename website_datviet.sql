-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 11, 2022 lúc 06:49 PM
-- Phiên bản máy phục vụ: 10.4.20-MariaDB
-- Phiên bản PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `website_datviet`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminid` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminPass` varchar(255) NOT NULL,
  `level` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminid`, `adminName`, `adminEmail`, `adminUser`, `adminPass`, `level`) VALUES
(1, 'Dinh Duc', 'dinhduc2406@gmail.com', 'duc_admin', '827ccb0eea8a706c4c34a16891f84e7b', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandId`, `brandName`) VALUES
(1, 'Công ty Đất Việt'),
(2, 'VKU'),
(3, 'Cty Slomotion');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`catId`, `catName`) VALUES
(1, 'Giám sát'),
(2, 'Thi công'),
(3, 'Quản lý dự án'),
(4, 'Tư vấn thiết kế'),
(9, 'Hoàng Ngọc Tiến');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_personnel`
--

CREATE TABLE `tbl_personnel` (
  `id` int(11) NOT NULL,
  `danhsach` varchar(255) NOT NULL,
  `kinhnghiem` varchar(255) NOT NULL,
  `bangcap` varchar(255) NOT NULL,
  `chucvu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_personnel`
--

INSERT INTO `tbl_personnel` (`id`, `danhsach`, `kinhnghiem`, `bangcap`, `chucvu`) VALUES
(1, 'Hoàng Ngọc Tiến	', '10 năm	', 'Kiến trúc sư, CCHN thiết kế kiến trúc	', 'Tổng giám đốc, CTTK Kiến trúc'),
(2, 'Hoàng Đình Đức ', '10 năm	', 'Kiến trúc sư, CCHN thiết kế kiến trúc	', 'Tổng giám đốc, CTTK Kiến trúc');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_project`
--

CREATE TABLE `tbl_project` (
  `projectId` int(11) NOT NULL,
  `projectName` tinytext NOT NULL,
  `catId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `address` tinytext NOT NULL,
  `project_desc` text NOT NULL,
  `type` int(11) NOT NULL,
  `height` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_project`
--

INSERT INTO `tbl_project` (`projectId`, `projectName`, `catId`, `brandId`, `address`, `project_desc`, `type`, `height`, `image`) VALUES
(14, 'động thiên đường', 1, 2, 'Liên Chiểu - Đà Nẵng', '<p>aczxcxzczxc</p>', 0, '1550m', 'd30d49f3cb.jpg'),
(18, 'Nhà ở kết hợp phòng trọ', 2, 1, 'Cẩm Lệ - Đà Nẵng', '<p>&nbsp;nh&agrave; ở kết hợp cho thu&ecirc; ph&ograve;ng trọ</p>', 0, '20m', '43e8e72dee.jpg'),
(19, 'Nhà ở kết hợp phòng trọ 2', 3, 2, 'Cẩm Lệ - Đà Nẵng', '<p>SADASDASDA</p>', 1, '24m', 'df896604ae.jpg'),
(20, 'xây dựng công ty', 3, 2, 'Liên Chiểu - Đà Nẵng', '<p>c&ocirc;ng tr&igrave;nh</p>', 1, '200m', '4d84e459c5.jpg'),
(21, 'Khách sạn Mường Thanh', 2, 3, 'Sơn Trà - Đà Nẵng', '<p>kh&aacute;ch sạn quy m&ocirc; lớn nhất</p>', 1, '800m', 'b211f561c8.jpg'),
(25, 'công trình  MEDLATEC Đà Nẵng', 4, 3, 'Ngũ Hành Sơn - Đà Nẵng', '<p>sdfsdfsdf</p>', 1, '200m', '53cde3580b.jpg'),
(27, 'Nhà ở kết hợp quán cf', 4, 2, 'Ngũ Hành Sơn - Đà Nẵng', '<p>sd&aacute;dasdasdas</p>', 0, '200m', '7dad5fed9c.jpg'),
(28, 'Nhà ở kết hợp quán cf', 4, 2, 'Hải Châu', '<p>cccccccc</p>', 1, '1550m', '29f85378be.jpg'),
(29, 'Căn hộ du lịch Hải Hiếu Yến', 2, 2, 'Ngũ Hành Sơn - Đà Nẵng', '<p>với tổng diện t&iacute;ch x&acirc;y dựng l&agrave; 21.28111</p>', 1, '2500m', 'e08c57f7b4.jpg'),
(33, 'công ty may mặc', 1, 1, 'Sơn Trà - Đà Nẵng', '<p>dsssds</p>', 0, '15220m2', '7ac8d52b05.jpg'),
(34, 'Khách sạn novotel2 2', 3, 1, 'Ngũ Hành Sơn - Đà Nẵng', '<p>sdsfsds</p>', 0, '1550m2', '39d0f55323.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `sliderid` int(11) NOT NULL,
  `sliderName` varchar(255) NOT NULL,
  `slider_image` varchar(255) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_slider`
--

INSERT INTO `tbl_slider` (`sliderid`, `sliderName`, `slider_image`, `type`) VALUES
(1, 'slide', '9d7b341c1f.png', 0),
(2, 'slide1', 'fdd64f6511.png', 0),
(3, 'slide3', '26f7af8e5e.png', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Chỉ mục cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catId`);

--
-- Chỉ mục cho bảng `tbl_personnel`
--
ALTER TABLE `tbl_personnel`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_project`
--
ALTER TABLE `tbl_project`
  ADD PRIMARY KEY (`projectId`);

--
-- Chỉ mục cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`sliderid`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `tbl_personnel`
--
ALTER TABLE `tbl_personnel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbl_project`
--
ALTER TABLE `tbl_project`
  MODIFY `projectId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `sliderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
