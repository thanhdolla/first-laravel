-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 09, 2018 lúc 05:14 PM
-- Phiên bản máy phục vụ: 10.1.29-MariaDB
-- Phiên bản PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `ten_ad` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mk_ad` varchar(50) CHARACTER SET latin1 NOT NULL,
  `sdt_ad` int(14) NOT NULL,
  `email_ad` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `ten_ad`, `mk_ad`, `sdt_ad`, `email_ad`, `updated_at`, `created_at`) VALUES
(3, 'Trần Văn Thanh', 'admin2', 93483756, 'nv2@gmail.com', '0000-00-00', '0000-00-00'),
(1, 'thanh', '12345', 33333213, 'thanh@gmail.com', '2017-12-06', '0000-00-00'),
(39, 'addsđ', '12345', 332342342, 'as@gmail.com', '2018-01-09', '2017-11-22'),
(42, 'Trần an', '12345', 12435324, 'ads@gmail.com', '2017-12-07', '2017-12-07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_nhanh`
--

CREATE TABLE `chi_nhanh` (
  `id` int(10) NOT NULL,
  `ten_chi_nhanh` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `embed` varchar(500) NOT NULL,
  `sdt` int(11) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `chi_nhanh`
--

INSERT INTO `chi_nhanh` (`id`, `ten_chi_nhanh`, `embed`, `sdt`, `updated_at`, `created_at`) VALUES
(1, '163 Tư Đình, p. Long Biên, Long Biên, Hà Nội, Việt Nam', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.0646164521418!2d105.89365311431355!3d21.030100385997663!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135a96ba52c0297%3A0x46e3062ae55166aa!2zMTYzIFTGsCDEkMOsbmgsIHAuIExvbmcgQmnDqm4sIExvbmcgQmnDqm4sIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1510764750883', 123224323, '0000-00-00', '0000-00-00'),
(2, '873 Nguyễn Trãi', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1708.0108886344506!2d105.79245025261767!3d20.984689159023507!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135acc63990c0f3%3A0xb71a1518c20a14ae!2zODczIE5ndXnhu4VuIFRyw6Np!5e0!3m2!1svi!2s!4v1510764987951', 1698372846, '0000-00-00', '0000-00-00'),
(3, '60 Lê Thanh Nghị', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.774912152789!2d105.84009031448178!3d21.00165799407989!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac70c7f193f7%3A0x9e72841687141a27!2zNjAgTMOqIFRoYW5oIE5naOG7iywgxJDhu5NuZyBUw6JtLCBIYWkgQsOgIFRyxrBuZywgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1512317872711', 392738274, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(10) NOT NULL,
  `khach_hangID` int(10) NOT NULL,
  `ten_kh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `san_phamID` int(10) NOT NULL,
  `noi_dung` text COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id`, `khach_hangID`, `ten_kh`, `san_phamID`, `noi_dung`, `updated_at`, `created_at`) VALUES
(1, 12, 'Nguyễn Duy', 12, 'dsfghjkl', '2017-11-07', '2017-11-07'),
(2, 12, 'Nguyễn Duy', 14, 'sdfdghf', '2017-11-07', '2017-11-07'),
(3, 12, 'Nguyễn Duy', 14, 'dfghj', '2017-11-07', '2017-11-07'),
(4, 19, 'dfds', 13, 'dgff', '2017-11-07', '2017-11-07'),
(5, 19, 'dfds', 12, 'sfdsg', '2017-11-07', '2017-11-07'),
(6, 19, 'dfds', 14, 'zdfadf', '2017-11-07', '2017-11-07'),
(7, 19, 'dfds', 12, 'New York\r\n \r\nNemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem.\r\n\r\nWeb Design\r\nSuite 127 / 267 ? 277 Brussel St,\r\n62 Croydon, NYC\r\nNew York\r\n \r\nNemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem.\r\n\r\nWeb Development\r\nSuite 127 / 267 ? 277 Brussel St,\r\n62 Croydon, NYC\r\nNew York\r\n \r\nNemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem.\r\n\r\nPhotoshop\r\nSuite 127 / 267 ? 277 Brussel St,\r\n62 Croydon, NYC\r\nNew York\r\n \r\nNemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem.\r\n\r\nSkill\r\nSuite 127 / 267 ? 277 Brussel St,\r\n62 Croydon, NYC\r\nNew York\r\n \r\nNemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem.\r\n\r\nProject.\r\nSuite 127 / 267 ? 277 Brussel St,\r\n62 Croydon, NYC\r\nNew York\r\n \r\nNemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem.\r\n\r\nCoffe\r\nSuite 127 / 267 ? 277 Brussel St,\r\n62 Croydon, NYC\r\nNew York\r\n \r\nNemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem.', '2017-11-07', '2017-11-07'),
(8, 19, 'dfds', 13, 'một hai', '2017-11-07', '2017-11-07'),
(9, 19, 'dfds', 29, 'fgf', '2017-12-08', '2017-12-08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_hang`
--

CREATE TABLE `don_hang` (
  `id` int(10) NOT NULL,
  `khach_hangID` int(10) NOT NULL,
  `ten` varchar(50) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `dia_chi` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` int(14) NOT NULL,
  `thanh_toan` float NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `stt_don_hang` bit(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `don_hang`
--

INSERT INTO `don_hang` (`id`, `khach_hangID`, `ten`, `dia_chi`, `email`, `sdt`, `thanh_toan`, `note`, `created_at`, `updated_at`, `stt_don_hang`) VALUES
(56, 19, 'dfds', 'Street Address', 'as@gmail.com', 111111132, 1222000, 'fdgf', '2017-12-07', '2017-12-07', b'0'),
(57, 0, 'dfdf', 'dfdfd', 'asa@gmail.com', 1111111115, 21156000, 'dfdfgg', '2017-12-08', '2017-12-08', b'0'),
(53, 0, 'adsfb', 'adadf', 'a@gmail.com', 1234333333, 1222000, 'dsfds', '2017-11-23', '2017-11-23', b'0'),
(54, 0, 'a@gmail.com', 'adasd', 'a@gmail.com', 24324323, 36724000, 'dsfds', '2017-11-23', '2017-11-23', b'0'),
(55, 0, 'adsfb', 'adadf', 'a@gmail.com', 122, 17490000, 'dfsd', '2017-12-04', '2017-12-04', b'0'),
(58, 9, 'Nguyễn Ngọc Ngạn', 'Số 5 Khu phố 1 Hương Canh Vĩnh Phúc', 'aa@gmail.com', 1234243423, 17490000, 'sagđsf', '2018-01-09', '2018-01-09', b'0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_hang_chi_tiet`
--

CREATE TABLE `don_hang_chi_tiet` (
  `id` int(10) NOT NULL,
  `don_hangID` varchar(10) CHARACTER SET latin1 NOT NULL,
  `san_phamID` varchar(10) CHARACTER SET latin1 NOT NULL,
  `so_luong` int(10) NOT NULL,
  `tinh_tien` float NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL,
  `stt_don_hang_chi_tiet` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `don_hang_chi_tiet`
--

INSERT INTO `don_hang_chi_tiet` (`id`, `don_hangID`, `san_phamID`, `so_luong`, `tinh_tien`, `updated_at`, `created_at`, `stt_don_hang_chi_tiet`) VALUES
(73, '55', '29', 1, 17490000, '2017-12-04', '2017-12-04', 0),
(75, '57', '30', 3, 1222000, '2017-12-08', '2017-12-08', 0),
(76, '57', '29', 1, 17490000, '2017-12-08', '2017-12-08', 0),
(74, '56', '30', 1, 1222000, '2017-12-07', '2017-12-07', 0),
(72, '54', '28', 1, 16790000, '2017-11-23', '2017-11-23', 0),
(71, '54', '29', 1, 17490000, '2017-11-23', '2017-11-23', 0),
(69, '53', '30', 1, 1222000, '2017-11-23', '2017-11-23', 0),
(70, '54', '30', 2, 1222000, '2017-11-23', '2017-11-23', 0),
(77, '58', '29', 1, 17490000, '2018-01-09', '2018-01-09', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
--

CREATE TABLE `khach_hang` (
  `id` int(11) NOT NULL,
  `ten_kh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mk_kh` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `dia_chi_kh` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `email_kh` varchar(50) CHARACTER SET latin1 NOT NULL,
  `sdt_kh` int(20) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khach_hang`
--

INSERT INTO `khach_hang` (`id`, `ten_kh`, `mk_kh`, `dia_chi_kh`, `email_kh`, `sdt_kh`, `updated_at`, `created_at`) VALUES
(12, 'Nguyễn Duy', '12345', 'p11 b5 ktx bách khoa', 'a@gmail.com', 111111153, '0000-00-00', '0000-00-00'),
(18, 'Nguyễn Duy Hen', '12345', 'Số 9 Trần Đại Nghĩa Hà Nội', 'duy@gmial.com', 2147483647, '0000-00-00', '0000-00-00'),
(14, 'Nguyễn Thị Duy', '12345', 'Số 7 Lê Thanh Nghị Hà Nội', '123@gmial.com', 928462847, '0000-00-00', '0000-00-00'),
(20, 'a', '111111', 'Street Adsddress', 'as@gma1il.com', 134322, '2017-12-04', '2017-12-04'),
(9, 'Nguyễn Ngọc Ngạn', '12345', 'Số 5 Khu phố 1 Hương Canh Vĩnh Phúc', 'aa@gmail.com', 1234243423, '0000-00-00', '0000-00-00'),
(10, 'Trần An', '12345', 'Cầu Long Biên Hà Nội', 'an@gmail.com', 273846182, '0000-00-00', '0000-00-00'),
(16, 'Nguyễn Thị Duy', '12345', 'Số 7 Lê Thanh Nghị Hà Nội', '12345@gmial.com', 928462847, '0000-00-00', '0000-00-00'),
(17, 'Nguyễn Thị Duy', '1111', 'Số 7 Lê Thanh Nghị Hà Nội', '123455@gmial.com', 928462847, '0000-00-00', '0000-00-00'),
(19, 'dfds', '12345', 'Street Address', 'as@gmail.com', 111111132, '2017-11-02', '2017-10-04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_san_pham`
--

CREATE TABLE `loai_san_pham` (
  `id` int(10) NOT NULL,
  `ten_loai_sp` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mo_ta` varchar(500) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `anh_loai_sp` varchar(50) CHARACTER SET latin1 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loai_san_pham`
--

INSERT INTO `loai_san_pham` (`id`, `ten_loai_sp`, `mo_ta`, `anh_loai_sp`, `created_at`, `updated_at`) VALUES
(1, 'Laptop', 'Điện thoại di động', '', '2017-12-03 15:37:53', '0000-00-00 00:00:00'),
(6, 'Smartphone', 'Máy tính xách tay', '', '2017-11-15 16:31:39', '0000-00-00 00:00:00'),
(8, 'Phụ kiện, linh kiện', 'phụ kiện linh liện', '', '2017-11-15 16:32:30', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phan_hoi`
--

CREATE TABLE `phan_hoi` (
  `id` int(10) NOT NULL,
  `ten_kh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `khach_hangID` int(10) NOT NULL,
  `tieu_de` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `noi_dung` text COLLATE utf8_unicode_ci NOT NULL,
  `stt_phan_hoi` int(1) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phan_hoi`
--

INSERT INTO `phan_hoi` (`id`, `ten_kh`, `khach_hangID`, `tieu_de`, `noi_dung`, `stt_phan_hoi`, `created_at`, `updated_at`) VALUES
(1, '', 12, '', 'một hai', 0, '2017-11-07', '2017-11-07'),
(2, '', 12, '', 'sfdkjl', 0, '2017-11-07', '2017-11-07'),
(4, '', 10, '', 'dfaa ầ ff', 0, '2017-12-07', '2017-12-07'),
(5, 'dfds', 19, 'ádg', 'étgsdfh', 0, '2018-01-09', '2018-01-09'),
(6, 'Trần An', 10, 'ưer', 'sdf', 0, '2018-01-09', '2018-01-09'),
(7, 'Trần An', 10, 'sdfs', 'fdsfds', 0, '2018-01-09', '2018-01-09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_pham`
--

CREATE TABLE `san_pham` (
  `id` int(10) NOT NULL,
  `ten_sp` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_sx` varchar(50) CHARACTER SET latin1 NOT NULL,
  `hang_sx` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gia_sp` float NOT NULL,
  `khuyen_mai` float DEFAULT NULL,
  `bao_hanh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `anh_sp` varchar(150) CHARACTER SET latin1 NOT NULL,
  `mo_ta_sp` text COLLATE utf8_unicode_ci NOT NULL,
  `luot_view` int(10) NOT NULL,
  `loai_spID` int(10) NOT NULL,
  `chi_nhanh` text COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `san_pham`
--

INSERT INTO `san_pham` (`id`, `ten_sp`, `ngay_sx`, `hang_sx`, `gia_sp`, `khuyen_mai`, `bao_hanh`, `anh_sp`, `mo_ta_sp`, `luot_view`, `loai_spID`, `chi_nhanh`, `updated_at`, `created_at`) VALUES
(12, 'Iphone 5s 16Gb', '14/03/2016', 'Samsung', 6490000, 500000, '12 tháng', '04.jpg', 'Màn hình: LED-backlit IPS LCD, 4\", DVGA<br>\r\nHệ điều hành: iOS 10<br>\r\nCamera sau: 8 MP<br>\r\nCamera trước: 1.2 MP<br>\r\nCPU: Apple A7 2 nhân 64-bit<br>\r\nRAM: 1 GB<br>\r\nBộ nhớ trong: 16 GB<br>\r\nThẻ nhớ:	Không<br>\r\nThẻ SIM:	1 Nano SIM<br>\r\nDung lượng pin: 1560 mAh', 80, 6, '[\"2\",\"3\"]', '2017-12-06', '0000-00-00'),
(13, 'Iphone 7 Plus Red 128Gb', '16/3/2017', '', 25190000, 200000, '12 tháng', '06.jpg', 'Màn hình: LED-backlit IPS LCD, 5.5\", HD<br>\r\nHệ điều hành:	iOS 10<br>\r\nCamera sau: Hai camera 12 MP<br>\r\nCamera trước: 7 MP<br>\r\nCPU: Apple A10 Fusion 4 nhân 64-bit<br>\r\nRAM: 3 GB<br>\r\nBộ nhớ trong: 128 GB<br>\r\nThẻ nhớ:	Không<br>\r\nThẻ SIM:	1 Nano SIM<br>\r\nDung lượng pin: 2900 mAh', 6, 1, '[\"1\",\"2\"]', '2017-12-07', '0000-00-00'),
(14, 'Iphone 5s Plus 64Gb', '16/3/2015', 'Samsung', 19990000, NULL, '12 tháng', '02.jpg', 'Màn hình: LED-backlit IPS LCD, 5.5\", HD.\r\nHệ điều hành:	iOS 9.\r\nCamera sau:	12 MP.\r\nCamera trước:	5 MP.\r\nCPU:	Apple A9 2 nhân 64-bit.\r\nRAM:	2 GB.\r\nBộ nhớ trong:	64 GB.\r\nThẻ nhớ:	Chưa xác định.\r\nThẻ SIM:	1. Nano SIM.\r\nDung lượng pin:	2750 mAh.', 1, 6, '[\"1\",\"2\"]', '2017-12-06', '0000-00-00'),
(15, 'Samsung Galaxy S7 Edge', '16/09/2016', '', 15490000, 200000, '12 tháng', '18.jpg', 'Màn hình: Super AMOLED, 5.5\", Quad HD<br>\r\nHệ điều hành:	Android 6.0 (Marshmallow)<br>\r\nCamera sau:	12 MP<br>\r\nCamera trước:	5 MP<br>\r\nCPU:	Exynos 8890 8 nhân 64-bit<br>\r\nRAM:	4 GB<br>\r\nBộ nhớ trong:	32 GB<br>\r\nThẻ nhớ:	MicroSD, hỗ trợ  256 GB<br>\r\nThẻ SIM:	2 SIM Nano  hỗ trợ 4G<br>\r\nDung lượng pin:	3600 mAh, có sạc nhanh<br>', 1, 6, '[\"1\",\"2\"]', '2017-12-07', '0000-00-00'),
(16, 'Samsung Galaxy A9 Pro', '17/11/2016', 'Apple', 10990000, 250000, '18 tháng', 'samsung-galaxy-a9-pro1.png', '  Màn hình:	Super AMOLED, 6\", Full HD<br/>\r\nHệ điều hành:	Android 6.0 (Marshmallow)<br/>\r\nCamera sau:	16 MP<br/>\r\nCamera trước:	8 MP<br/>\r\nCPU:	Qualcomm Snapdragon 652 8 nhân<br/>\r\nRAM:	4 GB<br/>\r\nBộ nhớ trong:	32 GB<br/>\r\nThẻ nhớ:	MicroSD, hỗ trợ tối đa 256 GB<br/>\r\nThẻ SIM:	2 Nano SIM<br/>\r\nDung lượng pin:	5000 mAh, có sạc nhanh<br/>', 1, 3, '[\"1\",\"2\"]', '0000-00-00', '0000-00-00'),
(17, 'Samsung Galaxy A7', '18/02/2017', 'Apple', 10990000, 200000, '12 tháng', 'samsung-galaxy-a71.png', '  Màn hình:	Super AMOLED, 5.7\", Full HD<br/>\r\nHệ điều hành:	Android 6.0 (Marshmallow)<br/>\r\nCamera sau:	16 MP<br/>\r\nCamera trước:	16 MP<br/>\r\nCPU:	Exynos 7880 8 nhân 64-bit<br/>\r\nRAM:	3 GB<br/>\r\nBộ nhớ trong:	32 GB<br/>\r\nThẻ nhớ:	MicroSD, hỗ trợ tối đa 256 GB<br/>\r\nThẻ SIM:	2 Nano SIM, hỗ trợ 4G<br/>\r\nDung lượng pin:	3600 mAh, có sạc nhanh', 1, 6, '[\"1\",\"2\"]', '0000-00-00', '0000-00-00'),
(18, 'Sony Xperia XZs', '14/03/2016', '', 1499000, 300000, '12 tháng', 'sony-xperia-xzs1.png', '  Màn hình:	IPS LCD, 5.2\", Full HD<br/>\r\nHệ điều hành:	Android 7.0<br/>\r\nCamera sau:	19 MP<br/>\r\nCamera trước:	13 MP<br/>\r\nCPU:	Snapdragon 820 4 nhân 64-bit<br/>\r\nRAM:	4 GB<br/>\r\nBộ nhớ trong:	64 GB<br/>\r\nThẻ nhớ:	MicroSD, hỗ trợ tối đa 256 GB<br/>\r\nThẻ SIM:	2 Nano SIM, hỗ trợ 4G<br/>\r\nDung lượng pin:	2900 mAh, có sạc nhanh', 0, 3, '[\"1\",\"2\"]', '0000-00-00', '0000-00-00'),
(19, 'Sony Xperia X', '16/09/2016', '', 7990000, 0, '1 năm', 'sony-xperia-x1.png', ' Màn hình:	IPS LCD, 5\", Full HD<br/>\r\nHệ điều hành:	Android 6.0 (Marshmallow)<br/>\r\nCamera sau:	23 MP<br/>\r\nCamera trước:	13 MP<br/>\r\nCPU:	Snapdragon 650 6 nhân 64-bit<br/>\r\nRAM:	3 GB<br/>\r\nBộ nhớ trong:	64 GB<br/>\r\nThẻ nhớ:	MicroSD, hỗ trợ tối đa 256 GB<br/>\r\nThẻ SIM:	2 Nano SIM, hỗ trợ 4G<br/>\r\nDung lượng pin:	2620 mAh', 2, 0, '[\"1\",\"2\"]', '0000-00-00', '0000-00-00'),
(20, 'Sony Xperia M5 (Single SIM)', '16/3/2016', '', 6490000, 0, '12 tháng', 'sony-xperia-m51.png', '  Màn hình:	IPS LCD, 5\", Full HD<br/>\r\nHệ điều hành:	Android 5.0 (Lollipop)<br/>\r\nCamera sau:	21.5 MP<br/>\r\nCamera trước:	13 MP<br/>\r\nCPU:	MT6795 (Helio x10) 8 nhân 64-bit<br/>\r\nRAM:	3 GB<br/>\r\nBộ nhớ trong:	16 GB<br/>\r\nThẻ nhớ:	MicroSD, hỗ trợ tối đa 200 GB<br/>\r\nThẻ SIM:	1 Nano SIM<br/>\r\nDung lượng pin:	2600 mAh', 0, 3, '[\"1\",\"2\"]', '0000-00-00', '0000-00-00'),
(21, 'HTC U Play', '17/11/2016', '', 9990000, 0, '12 tháng', 'htc-u-play1.png', '  Màn hình:	Super LCD, 5.2\", Full HD<br/>\r\nHệ điều hành:	Android 6.0 (Marshmallow)<br/>\r\nCamera sau:	16 MP<br/>\r\nCamera trước:	16 MP<br/>\r\nCPU:	MTK Helio P10 8 nhân 64-bit<br/>\r\nRAM:	3 GB<br/>\r\nBộ nhớ trong:	32 GB<br/>\r\nThẻ nhớ:	MicroSD, hỗ trợ tối đa 2 TB<br/>\r\nThẻ SIM:	2 Nano SIM, hỗ trợ 4G<br/>\r\nDung lượng pin:	2500 mAh, có sạc nhanh', 1, 3, '[\"1\",\"2\"]', '0000-00-00', '0000-00-00'),
(22, 'HTC Desire 10 Pro', '16/09/2016', '', 7990000, 300000, '12 tháng', 'htc-desire-10-pro1.png', '  Màn hình:	IPS LCD, 5.5\", Full HD<br/>\r\nHệ điều hành:	Android 6.0 (Marshmallow)<br/>\r\nCamera sau:	20 MP<br/>\r\nCamera trước:	13 MP<br/>\r\nCPU:	MTK Helio P10 8 nhân 64-bit<br/>\r\nRAM:	4 GB<br/>\r\nBộ nhớ trong:	64 GB<br/>\r\nThẻ nhớ:	MicroSD, hỗ trợ tối đa 2 TB<br/>\r\nThẻ SIM:	2 Micro SIM, hỗ trợ 4G<br/>\r\nDung lượng pin:	3000 mAh, có sạc nhanh', 0, 0, '[\"1\",\"2\"]', '0000-00-00', '0000-00-00'),
(23, 'HTC One A9', '14/03/2016', '', 6190000, 0, '1 năm', 'htc-one-a91.png', '    Màn hình:	AMOLED, 5\", Full HD<br/>\r\nHệ điều hành:	Android 6.0 (Marshmallow)<br/>\r\nCamera sau:	13 MP<br/>\r\nCamera trước:	4 Ultra pixel<br/>\r\nCPU: Qualcomm Snapdragon 617 64-bit<br/>\r\nRAM:	2 GB<br/>\r\nBộ nhớ trong:	16 GB<br/>\r\nThẻ nhớ:	MicroSD, hỗ trợ tối đa 2 TB<br/>\r\nThẻ SIM:	1 Nano SIM<br/>\r\nDung lượng pin:	2150 mAh<br/>', 1, 6, '[\"1\",\"2\"]', '0000-00-00', '0000-00-00'),
(24, 'Asus Zenfone 3 ZE520KL', '16/09/2016', '', 7990000, 350000, '12 tháng', 'asus-zenfone-3-ze520kl1.png', '   Màn hình:	Super IPS LCD, 5.2\", Full HD<br/>\r\nHệ điều hành:	Android 6.0 (Marshmallow)<br/>\r\nCamera sau:	16 MP<br/>\r\nCamera trước:	8 MP<br/>\r\nCPU:	Snapdragon 625 8 nhân 64-bit<br/>\r\nRAM:	4 GB<br/>\r\nBộ nhớ trong:	64 GB<br/>\r\nThẻ nhớ:	MicroSD, hỗ trợ tối đa 128 GB<br/>\r\nThẻ SIM:	Nano SIM & Micro SIM hỗ trợ 4G<br/>\r\nDung lượng pin:	2650 mAh', 1, 0, '[\"1\",\"2\"]', '0000-00-00', '0000-00-00'),
(25, 'ASUS ZENFONE 3 MAX', '14/03/2016', '', 4490000, 0, '12 tháng', 'asus-zenfone-3-max2.png', '    Màn hình:	IPS LCD, 5.2\", HD<br/>\r\nHệ điều hành:	Android 6.0 (Marshmallow)<br/>\r\nCamera sau:	13 MP<br/>\r\nCamera trước:	5 MP<br/>\r\nCPU:	MT6735 4 nhân 64-bit<br/>\r\nRAM:	3 GB<br/>\r\nBộ nhớ trong:	32 GB<br/>\r\nThẻ nhớ:	MicroSD, hỗ trợ tối đa 32 GB<br/>\r\nThẻ SIM:	Nano SIM & Micro SIM,  4G<br/>\r\nDung lượng pin:	4100 mAh', 1, 0, '[\"1\",\"2\"]', '0000-00-00', '0000-00-00'),
(26, 'Xiaomi mi 6', '12/2/2010', '', 10500000, 250000, '12 tháng', 'xiaomi-mi-6-1-400x4601.png', 'Màn hình:	IPS LCD, 5.15\", Full HD</br>\r\nHệ điều hành:	Android 7.1</br>\r\nCamera sau:	Hai camera 12 MP</br>\r\nCamera trước:	8 MP</br>\r\nCPU:	Qualcomm Snapdragon 835 8 nhân </br>\r\nRAM:	6 GB</br>\r\nBộ nhớ trong:	128 GB</br>\r\nThẻ nhớ:	Không</br>\r\nThẻ SIM:	2 Nano SIM, hỗ trợ 4G</br>\r\nDung lượng pin:	3350 mAh, có sạc nhanh</br>', 0, 0, '[\"1\",\"2\"]', '0000-00-00', '0000-00-00'),
(27, 'OPPO F3 Plus', '12/2/2016', '', 11500000, 500000, '12 tháng', 'oppo-f3-plus-1-1-400x4601.png', '  Màn hình:	IPS LCD, 6\", Full HD</br>\r\nHệ điều hành:	Android 6.0 (Marshmallow)</br>\r\nCamera sau:	16 MP</br>\r\nCamera trước:	16 MP và 8 MP</br>\r\nCPU:	Snapdragon 653 8 nhân 64-bit</br>\r\nRAM:	4 GB</br>\r\nBộ nhớ trong:	64 GB</br>\r\nThẻ nhớ:	MicroSD, hỗ trợ tối đa 256 GB</br>\r\nThẻ SIM:	2 Nano SIM, hỗ trợ 4G</br>\r\nDung lượng pin:	4000 mAh, có sạc nhanh</br>', 2, 6, '[\"1\",\"2\"]', '0000-00-00', '0000-00-00'),
(28, 'Iphone 6s Plus 64Gb', '16/3/2016', '', 16990000, 200000, '12 tháng', 'iphone-6s-plus-64gb2.png', '       Màn hình: LED-backlit IPS LCD, 5.5\", HD<br/>\r\nHệ điều hành:	iOS 9<br/>\r\nCamera sau:	12 MP<br/>\r\nCamera trước:	5 MP<br/>\r\nCPU:	Apple A9 2 nhân 64-bit<br/>\r\nRAM:	2 GB<br/>\r\nBộ nhớ trong:	64 GB<br/>\r\nThẻ nhớ:	Chưa xác định<br/>\r\nThẻ SIM:	1 Nano SIM<br/>\r\nDung lượng pin:	2750 mAh', 14, 0, '[\"1\",\"2\"]', '2017-12-01', '0000-00-00'),
(29, 'IPhone 7 32GB', '12/8/2017', '', 17990000, 500000, '12 tháng', 'iphone-7-8-400x4601.png', '  Màn hình:	LED-backlit IPS LCD, 4.7\", HD</br>\r\nHệ điều hành:	iOS 10</br>\r\nCamera sau:	12 MP</br>\r\nCamera trước:	7 MP</br>\r\nCPU:	Apple A10 Fusion 4 nhân 64-bit</br>\r\nRAM:	2 GB</br>\r\nBộ nhớ trong:	32 GB</br>\r\nThẻ nhớ:	Không</br>\r\nThẻ SIM:	1 Nano SIM</br>\r\nDung lượng pin:	1960 mAh', 30, 0, '[\"1\",\"2\"]', '2017-12-06', '0000-00-00'),
(30, 'Iphone 6s 64GB', '12/2/2017', 'Apple', 1222000, 0, '12 tháng', '071.jpg', '<ul class=\"parameter\" style=\"padding-top: 10px; position: relative; overflow: hidden; background: rgb(255, 255, 255); color: rgb(51, 51, 51); font-family: Helvetica, Arial, \" dejavu=\"\" sans\",=\"\" \"liberation=\"\" freesans,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\"><li class=\"g6459_79_77\" style=\"padding-top: 5px; padding-bottom: 5px; display: table; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; width: 360px; border-top: 1px solid rgb(238, 238, 238);\"><span style=\"padding-top: 5px; padding-bottom: 5px; display: table-cell; width: 144px; vertical-align: top; font-size: 14px; color: rgb(102, 102, 102);\">Màn hình:</span><div style=\"padding: 6px 5px; display: table-cell; width: auto; vertical-align: top; font-size: 14px;\"><a href=\"https://www.thegioididong.com/hoi-dap/man-hinh-led-backlit-ips-lcd-la-gi-905757\" target=\"_blank\" style=\"color: rgb(40, 138, 214);\">LED-backlit IPS LCD</a>, 5.5\",&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/man-hinh-retina-la-gi-905780\" target=\"_blank\" style=\"color: rgb(40, 138, 214);\">Retina HD</a></div></li><li class=\"g72\" style=\"padding-top: 5px; padding-bottom: 5px; display: table; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; width: 360px; border-top: 1px solid rgb(238, 238, 238);\"><span style=\"padding-top: 5px; padding-bottom: 5px; display: table-cell; width: 144px; vertical-align: top; font-size: 14px; color: rgb(102, 102, 102);\">Hệ điều hành:</span><div style=\"padding: 6px 5px; display: table-cell; width: auto; vertical-align: top; font-size: 14px;\"><a href=\"https://www.thegioididong.com/tin-tuc/ngay-mai-ios-9-ra-mat-co-gi-moi-dang-de-ban-cho-doi-702229\" target=\"_blank\" style=\"color: rgb(40, 138, 214);\">iOS 9</a></div></li><li class=\"g27\" style=\"padding-top: 5px; padding-bottom: 5px; display: table; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; width: 360px; border-top: 1px solid rgb(238, 238, 238);\"><span style=\"padding-top: 5px; padding-bottom: 5px; display: table-cell; width: 144px; vertical-align: top; font-size: 14px; color: rgb(102, 102, 102);\">Camera sau:</span><div style=\"padding: 6px 5px; display: table-cell; width: auto; vertical-align: top; font-size: 14px;\">12 MP</div></li><li class=\"g29\" style=\"padding-top: 5px; padding-bottom: 5px; display: table; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; width: 360px; border-top: 1px solid rgb(238, 238, 238);\"><span style=\"padding-top: 5px; padding-bottom: 5px; display: table-cell; width: 144px; vertical-align: top; font-size: 14px; color: rgb(102, 102, 102);\">Camera trước:</span><div style=\"padding: 6px 5px; display: table-cell; width: auto; vertical-align: top; font-size: 14px;\">5 MP</div></li><li class=\"g6059\" style=\"padding-top: 5px; padding-bottom: 5px; display: table; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; width: 360px; border-top: 1px solid rgb(238, 238, 238);\"><span style=\"padding-top: 5px; padding-bottom: 5px; display: table-cell; width: 144px; vertical-align: top; font-size: 14px; color: rgb(102, 102, 102);\">CPU:</span><div style=\"padding: 6px 5px; display: table-cell; width: auto; vertical-align: top; font-size: 14px;\"><a href=\"https://www.thegioididong.com/hoi-dap/chip-xu-ly-apple-a9-tren-iphone-6s-va-6s-plus-733695\" target=\"_blank\" style=\"color: rgb(40, 138, 214);\">Apple A9 2 nhân 64-bit</a></div></li><li class=\"g50\" style=\"padding-top: 5px; padding-bottom: 5px; display: table; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; width: 360px; border-top: 1px solid rgb(238, 238, 238);\"><span style=\"padding-top: 5px; padding-bottom: 5px; display: table-cell; width: 144px; vertical-align: top; font-size: 14px; color: rgb(102, 102, 102);\">RAM:</span><div style=\"padding: 6px 5px; display: table-cell; width: auto; vertical-align: top; font-size: 14px;\">2 GB</div></li><li class=\"g49\" style=\"padding-top: 5px; padding-bottom: 5px; display: table; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; width: 360px; border-top: 1px solid rgb(238, 238, 238);\"><span style=\"padding-top: 5px; padding-bottom: 5px; display: table-cell; width: 144px; vertical-align: top; font-size: 14px; color: rgb(102, 102, 102);\">Bộ nhớ trong:</span><div style=\"padding: 6px 5px; display: table-cell; width: auto; vertical-align: top; font-size: 14px;\">16 GB</div></li><li class=\"g6339_6463\" style=\"padding-top: 5px; padding-bottom: 5px; display: table; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; width: 360px; border-top: 1px solid rgb(238, 238, 238);\"><span style=\"padding-top: 5px; padding-bottom: 5px; display: table-cell; width: 144px; vertical-align: top; font-size: 14px; color: rgb(102, 102, 102);\">Thẻ SIM:</span><div class=\"isim\" style=\"padding: 6px 5px; width: auto; vertical-align: top; font-size: 14px; border-bottom: 1px solid rgb(238, 238, 238);\"><a href=\"https://www.thegioididong.com/tin-tuc/tim-hieu-cac-loai-sim-thong-dung-sim-thuong-micro--590216#nanosim\" target=\"_blank\" style=\"color: rgb(40, 138, 214);\">1 Nano SIM</a>,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/4g-la-gi-731757\" target=\"_blank\" style=\"color: rgb(40, 138, 214);\">Hỗ trợ 4G</a></div></li><li class=\"g84_10882\" style=\"padding-top: 5px; padding-bottom: 5px; display: table; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; width: 360px; border-top: 1px solid rgb(238, 238, 238);\"><span style=\"padding-top: 5px; padding-bottom: 5px; display: table-cell; width: 144px; vertical-align: top; font-size: 14px; color: rgb(102, 102, 102);\">Dung lượng pin:</span><div style=\"padding: 6px 5px; display: table-cell; width: auto; vertical-align: top; font-size: 14px;\">2750 mAh</div></li></ul>', 20, 8, '[\"1\",\"2\"]', '2017-12-01', '0000-00-00'),
(31, 'ưerewr', '3/2/3232', '', 32433400, 3222, '13', 'iphone-5s-16gb1.png', 'ewre<div>ewr</div>', 0, 1, '[\"1\",\"2\",\"3\"]', '2018-01-09', '2018-01-09'),
(32, 'dsfds', '23/23/2323', '', 3243, 32, '32', 'iphone-7-8-400x4601.png', 'dsfds', 0, 1, '[\"1\"]', '2018-01-09', '2018-01-09'),
(33, 'df', '3/2/3232', '', 32324, 324, '3', 'iphone-6s-plus-64gb2.png', 'dfs', 0, 1, '[\"1\",\"2\",\"3\"]', '2018-01-09', '2018-01-09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `id` int(10) NOT NULL,
  `ten_slide` varchar(50) CHARACTER SET latin1 NOT NULL,
  `anh_slide` varchar(50) CHARACTER SET latin1 NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slide`
--

INSERT INTO `slide` (`id`, `ten_slide`, `anh_slide`, `updated_at`, `created_at`) VALUES
(7, 'sdfsf', 'bn6.jpg', '0000-00-00', '0000-00-00'),
(8, 'ághj', 'bn3.png', '2017-11-02', '2017-11-02'),
(9, 'sd', 'bn3.jpg', '2017-11-02', '2017-11-02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thong_bao`
--

CREATE TABLE `thong_bao` (
  `id` int(10) NOT NULL,
  `tieu_de_tb` text COLLATE utf8_unicode_ci NOT NULL,
  `noi_dung_tb` text COLLATE utf8_unicode_ci NOT NULL,
  `anh_tb` varchar(100) CHARACTER SET latin1 NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thong_bao`
--

INSERT INTO `thong_bao` (`id`, `tieu_de_tb`, `noi_dung_tb`, `anh_tb`, `created_at`, `updated_at`) VALUES
(1, 'Smartphone sẽ chết? Cũng có thể, nhưng là chuyện của 10 năm sau', 'Những ngày vừa qua, giới công nghệ thế giới đang hoang mang với phát biểu của ông chủ Facebook - Mark Zuckerberg rằng smartphone sẽ chết và sẽ được thay thế bằng công nghệ VR và AR tiên tiến, hiện đại hơn.<br>\r\n\r\n1. Giả thuyết về cái chết của smartphone\r\n<br>\r\nMark Zuckerberg cho rằng smartphone sẽ sớm bị thay thế bằng công nghệ thực tế ảo (VR) và thực tế ảo tăng cường (AR), đưa cuộc sống lên một tầm cao mới, giống với những bộ phim khoa học viễn tưởng bạn thường xem.<br>\r\n\r\nVới kính thực tế tăng cường người dùng chẳng cần đến smartphone, máy tính bảng, TV hay bất kỳ thứ gì khác có màn hình hiển thị.\r\n<br>\r\n\"Chúng ta sẽ không cần tới một chiếc TV truyền thống bởi vì với ứng dụng TV giá 1 USD, chúng ta có thể xem ở bất kỳ đâu. Thật tuyệt vời khi chúng ta có thể thay đổi cách sử dụng các thiết bị,\" Zuckerberg chia sẻ.<br>\r\n\r\nWow, nghe thì rất hay đấy, nhưng để hiện thực hóa cũng là cả một quá trình.<br>\r\n\r\n2. Góc nhìn thị trường\r\n<br>\r\nKhó ở đây là cái chết của smartphone, hay nói đúng hơn là chiếc điện thoại di động - công cụ giúp ta giữ liên lạc là tối thiểu cần thiết, vì bạn không thể đi đâu cũng mang theo một chiếc kính VR.\r\n<br>\r\nHiện tại, thị trường smartphone vẫn còn diễn ra rất sôi động bằng chứng là Apple vẫn còn sống, sống khỏe nhờ vào doanh số bán hàng khổng lồ từ mảng điện thoại iPhone. CEO Tim Cook cho biết, công ty đã bán ra hơn 78,29 triệu chiếc iPhone chỉ trong 3 tháng cuối năm 2016.\r\n<br>\r\nVới các hãng công nghệ hàng đầu khác ví dụ như Samsung cũng không hề tập trung vào công nghệ VR, họ chỉ xem đó là một ngách kiếm thêm, còn tất cả nguồn lực vẫn dồn vào mảng smartphone, mà cụ thể hơn là bộ đôi Samsung Galaxy S8 và S8 Plus vừa ra mắt vào cuối tháng 3.<br>\r\n\r\nSamsung Galaxy S8 mang đến một chuẩn mực thiết kế mới cho làng smartphone 2017<br>\r\nSamsung Galaxy S8 mang đến một chuẩn mực thiết kế mới cho làng smartphone 2017 (Ảnh: Unbox)\r\nHai ông lớn trong làng công nghệ hiện vốn không mảy may đến tiềm năng của công nghệ VR này thì các hãng khác liệu có đủ tiềm lực thực sự để tạo nên một thiết bị thay thế được smartphone không?<br>\r\n\r\nChưa kể thời gian nghiên cứu là khá dài và tỷ lệ thành công cũng không hề cao. Trong một thế giới có nhịp độ phát triển nhanh như hiện nay, dồn tất cả nguồn lực vào một công nghệ không chắc chắn nếu thất bại thì phá sản là chuyện dĩ nhiên.\r\n<br>\r\nNgay cả Google còn thất bại với Google Glass, rút kinh nghiệm từ thất bại này, Google vẫn đang tiến vào cuộc chiến smartphone cao cấp với Apple và Samsung.\r\n<br>\r\nNhư vậy, ông trùm tìm kiếm Google còn không còn niềm tin với mảng VR và tập trung cho smartphone thì liệu smartphone có chết?\r\n<br>\r\n3. Liệu các thiết bị khác có đủ sức thay thế smartphone?<br>\r\n\r\nLật lại lịch sử phát triển công nghệ, ngày trước chúng ta có một máy tính to đùng như một ngôi nhà, sau đó theo quy trình chúng giảm kích thước và tăng sức mạnh. Việc này được lặp lại liên tục cho đến ngày hôm nay, chúng ta đã có laptop, máy tính để bàn nhỏ gọn và chiếc smartphone.\r\n<br>\r\nCó thể nói smartphone ngày nay là tinh hoa thành công của công nghệ trong quá khứ, chúng nhỏ gọn và thực hiện hầu như mọi chức năng mà một chiếc máy tính có thể làm.\r\n<br>\r\nTừ đây có thể giả định rằng công nghệ sẽ tiếp tục làm những thứ nhỏ hơn nhưng sức mạnh sẽ vượt trội hơn, tiếp nối smartphone có lẽ là đồng hồ và kính mắt thông minh.\r\n<br>\r\nSự tiến hóa của điện thoại Nokia trước đây\r\nSự tiến hóa của điện thoại Nokia trước đây (Ảnh: Firefly Daily)<br>\r\nTuy nhiên, không có bằng chứng cho thấy chuyện này sẽ xảy ra, ít nhất là trong tương lai gần. Trên thực tế, thiết bị một ngày một nhỏ hơn đã bị bác bỏ hoàn toàn.<br>\r\n\r\nBạn có còn nhớ đến những cục gạch Nokia huyền thoại chứ? Ngay thời điểm chúng phổ biến, nhiều người tuyên bố sẽ có nhiều chiếc điện thoại di động nhỏ như vậy.\r\n<br>\r\nNhưng trong 10 năm qua kể từ ngày iPhone ra mắt, điện thoại ngày càng lớn hơn từ 3,5 inch cho đến ngoại cỡ 6 inch cũng là chuyện bình thường.\r\n<br>\r\nPhải công nhận màn hình lớn hơn là một lựa chọn tuyệt vời phục vụ cho nhu cầu giải trí cũng như trải nghiệm. Và vấn đề cạnh tranh hiện nay của smartphone là mỏng, gọn hơn chứ không phải nhỏ hơn.<br>\r\n\r\nLiệu bạn sẽ làm việc tốt hơn khi có nhiều công cụ trên màn hình điện thoại với hình ảnh lớn và rõ hơn hay bạn sẽ chọn giao diện màn hình nhỏ xíu của smartwatch? Không quá khó để có câu trả lời chứ nhỉ.\r\n<br>\r\nVới lại việc đem vi xử lý và bộ nhớ vào smartwatch để thực hiện mọi chức năng của smartphone là một việc quá khó khăn đối với công nghệ hiện nay. Hiện không có nhiều smartwatch hoạt động độc lập.\r\n<br>\r\nDo vậy, chuyện smartwatch thay thế smartphone là không thể xảy ra. Nó chỉ là cánh tay phải hỗ trợ cho smartphone mà thôi.', 'ip1.jpg', '0000-00-00', '2017-11-23'),
(2, 'Dung lượng RAM của iPhone 2017: Vẫn còn là dấu hỏi', 'Hôm qua, hãng nghiên cứu thị trường TrendForce dự đoán rằng Smartphone sẽ có bộ nhớ RAM trung bình ở mức 3.2 GB vào cuối năm 2017. <br>Tăng 33.4% so với dung lượng bộ nhớ trung bình của năm 2016 là 2.4 GB.<br>\r\n\r\nCác nhà phân tích cũng dự đoán rằng iPhone 8 sẽ không trang bị RAM quá 3 GB vì thế người hâm mộ sản phẩm của hãng này không nên mong đợi một thiết bị RAM 4 GB trước năm 2018. Hãng TrendForce cũng dự đoán thêm iPhone phiên bản màn hình AMOLED 5.8 inch và màn LCD 5.5 inch sẽ được trang bị RAM 3 GB, riêng phiên bản iPhone màn hình LCD 4.7 inch sẽ chỉ có 2 GB RAM.<br>\r\n\r\nMặt khác, theo nhà phân tích Avril Wu, các nhà sản xuất điện thoại Adroid tăng dung lượng RAM chủ yếu do nhu cầu người tiêu dùng. Vì hệ điều hành trên các thiết bị này sẽ chậm chạp sau một thời gian sử dụng nên sự tăng trưởng dung lượng bộ nhớ trung bình của nó cao hơn iPad và PC.<br>', 'sss.jpg', '0000-00-00', '2017-11-23'),
(3, 'Ra mắt Galaxy S8: Khi công nghệ chạm đến ngưỡng vô cực', '“Vô cực” gần như là từ khoá miêu tả rõ nhất cho những gì đã diễn ra tại sự kiện ra mắt bộ đôi Galaxy S8/S8+, khi công nghệ, các giác quan và khả năng khám phá các giới hạn của cuộc sống đều được mở ra đến… vô cực.<br>\r\nThị giác của các tín đồ công nghệ được \'thết đãi” ra trò với đoạn phim mãn nhãn về thế hệ điện thoại mới nhất của Samsung và những giới hạn bất khả trong quá khứ được công nghệ bình thường hóa trong hiện tại và tương lai<br>\r\nNhư mọi lần, CEO DJ Koh là người chào đón khách tham dự tiến vào “thời đại” mới của Samsung Mobile. Rất ngắn gọn, ông giới thiệu về khái niệm “di sản của sự cải tiến” và lí giải vì sao Samsung sẽ là nơi mà không còn giới hạn nào là không thể vượt qua<br>\r\nBên cạnh đó, Samsung cũng giới thiệu tính năng Samsung DeX, mang lại người dùng trải nghiệm thật như đang sử dụng máy tính để bàn dùng nền tảng hệ điều hành Android<br>\r\nTrợ lý ảo Bixby cũng là một tính năng đột phá hứa hẹn tạo nên sự khác biệt về trải nghiệm người dùng trên Galaxy S8/S8+<br>\r\n\r\nBên cạnh đó, Samsung cũng giới thiệu tính năng Samsung DeX, mang lại người dùng trải nghiệm thật như đang sử dụng máy tính để bàn dùng nền tảng hệ điều hành Android<br>\r\n\r\nSự kiện ra mắt đầy ấn tượng tại New York khép lại cùng lời kêu gọi “làm những điều không thể” từ ông DJ Koh, Galaxy S8/S8+ hứa hẹn đem đến một năm thành công cho Samsung không thua kém gì thế hệ tiền nhiệm<br>\r\nVới buổi ra mắt chạm đến từng centimet giác quan, Samsung đã kể một câu chuyện tuyệt vời về tương lai của công nghệ nằm gọn trong tay người dùng dưới hình dạng của một chiếc điện thoại thông minh mang tên Galaxy S8/S8+, khiến việc mở ra những chân trời vô cực không chỉ còn là khao khát. Không chỉ toàn thế giới, ngay cả các tín đồ công nghệ tại Việt Nam cũng không khỏi nức lòng chờ đón siêu phẩm này “cập bến” trong tương lai gần.', 'iptb.jpg', '0000-00-00', '2017-11-23'),
(13, '5 cách tăng thời gian sử dụng pin trên iPhone vô cùng cần thiết', '1. Tắt tự động cập nhật<br>\r\n\r\nBật Cập nhật sẽ giúp iPhone kiểm tra liên tục phiên bản, nhờ đó bạn sẽ nhận được các tính năng mới, độ ổn định từ ứng dụng đang sử dụng. Tuy nhiên vì phải liên tục chạy ngầm cũng như sử dụng mạng dữ liệu để kiểm tra nên tính năng này vô tình lấy đi kha khá thời gian sử dụng Pin của iPhone.<br>\r\n\r\nNếu cảm thấy có thể tự kiểm tra và cập nhật thủ công để tiết kiệm pin, bạn hãy truy cập vào Cài đặt &gt; iTunes &amp; App Store. Sau đó gạt tắt các tính năng ở mục Tải về Tự động.<br>\r\n2. Tắt chạy nền trên iPhone<br>\r\n\r\nCập nhật dữ liệu nền giúp bạn nhận đầy đủ và nhanh nhất các thông báo từ ứng dụng, khi thiết bị được kết nối với dữ liệu mạng. Tuy nhiên điều này lại là nguyên nhân gây ảnh hưởng khá nhiều tới thời gian sử dụng pin trên thiết bị. Để tắt tính năng này đi, truy cập vào Cài đặt &gt; Cài đặt chung &gt; Làm mới ứng dụng trong nền và lựa chọn tắt với một vài ứng dụng hoặc toàn bộ ứng dụng.<br>\r\n3. Tắt các kết nối Wi-Fi, Bluetooth, AirDrop khi không sử dụng<br>\r\n\r\nNếu những tính năng này được bật khi không sử dụng nó sẽ làm hao tốn năng lượng không cần thiết. Bạn có thể truy cập vào Trung tâm kiểm soát, sau đó chạm vào biểu tượng Bluetooth và Wi-Fi để tắt/mở chúng. Đối với AirDrop, để tắt tính năng này đi, chạm vào và chọn Không nhận.<br>\r\n4. Sạc pin iPhone đúng cách <br>\r\nĐối với các thiết bị sử dụng Pin Lithium-ion thì việc sạc Overcharging (vẫn ghim sạc khi đã đủ 100%) sẽ hoàn toàn không gây hại cho Pin của thiết bị. Tuy nhiên bạn nên nhớ, pin trên smartphone đều có vòng đời và mỗi viên pin chỉ có số lần sạc nhất định trước khi hiệu suất của nó không còn được như trước. Đó là câu trả lời cho thắc mắc tại sao những smartphone cũ lại dễ hỏng hơn, đơn giản vì pin của chúng đã trải qua quá nhiều lần sạc.<br>\r\n\r\n5. Ưu tiên sử dụng ứng dụng khuyên dùng từ Apple<br>\r\n\r\nCác ứng dụng khuyên dùng từ Apple được tối ưu để có thể giúp iPhone hoạt động mượt mà cũng như tiết kiệm năng lượng. Nếu giữa 2 ứng dụng có chức năng giống nhau thì tốt nhất người dùng nên chọn ứng dụng từ Apple. Điều này không có nghĩa các ứng dụng bên thứ 3 không hoạt động tốt, nhưng hãy giảm mức độ sử dụng chúng khi lượng pin trên iPhone không có nhiều.', 'note_7_unbox_ndtv_800x450.jpg', '0000-00-00', '2017-11-23'),
(14, 'Note 7 tân trang bán ra thị trường Việt sẽ thành công', 'Note 7 tân trang không chỉ được quan tâm ở thị trường nước ngoài, mà cả ở thị trường Việt. Câu chuyện về giá bán, hay chiến lược của chiếc phablet này ở Việt Nam, sẽ được chuyên gia chia sẻ để các bạn có cái nhìn toàn cảnh hơn.<br>.\r\n\r\nTóm lược câu chuyện trong bài viết trước<br>\r\n\r\nTrong bài viết về một số nhận định dành cho Note 7 tân trang. Mình đã chia sẻ rằng chiếc phablet này vẫn nhận được sự yêu thích và ủng hộ từ người dùng. Và hầu hết các bạn đều muốn Note 7 tân trang có giá bằng với giá bán dự kiến bên Hàn Quốc, tức khoảng 14 triệu đồng.<br>\r\n\r\nKhi xét đến thời điểm bán ra vào cuối tháng 6 của Note 7 tân trang, mình đã cho rằng đây là khoảng thời gian ra mắt khá khó hiểu. Lúc này Galaxy S8 lẫn S8 Plus vẫn mang lại doanh số tốt cho Samsung, đồng thời Note 8 cũng đã chuẩn bị ra mắt để đối đầu với mẫu iPhone mới của Apple. Vì vậy vai trò của Note 7 khi ra mắt vào thời điểm nói trên có lẽ sẽ không mang nặng tính chiến lược.\r\n<br>\r\nCác bạn có thể xem lại chi tiết bài viết tại đây: Note 7 tân trang có được bán ở Việt Nam không? Giá bao nhiêu?\r\n<br>\r\n\r\n\r\n\r\nKhi được hỏi về việc giả sử Note 7 tân trang được bán chính hãng tại Việt Nam. Liệu chiếc smartphone này có bị thiếu hụt nguồn cung cho các hệ thống lớn hay không. Anh Nguyên Trực đã chia sẻ rằng: Để trả lời câu hỏi này cần một yếu tố rất quan trọng là giá, phải có giá bán lẻ mới có thể trả lời sản phẩm hút hàng hay không.<br>\r\n\r\nVới mức giá dự đoán hơn 600 USD, giả sử nếu bán ở Việt Nam thì rất tuyệt vời. Vì hiện tại thế hệ trước là Note 5 cũng đang bán ở tầm giá này và có doanh số rất tốt. Còn về vấn đề thiếu hụt nguồn cung, anh Nguyên Trực cho biết hiện rất khó để dự đoán điều này.<br>\r\n\r\nXét về độ “hot\" của Note 7 tân trang so với Galaxy S8, do hãng chỉ tập trung duy nhất cho 1 sản phẩm chiến lược vào 1 thời điểm. Và dĩ nhiên Samsung sẽ ưu tiên Galaxy S8 và S8 Plus hơn.<br>\r\n\r\nChuyển sang khả năng thành công của Note 7 tân trang tại thị trường Việt? Anh Trực tin tưởng chiếc smartphone này sẽ thành công vì dòng Note luôn có một tập khách hàng cố định. Họ không thể hay dường như rất khó đổi qua dòng máy khác do đã thao tác quen với dòng Note, cũng như khả năng hỗ trợ công việc, giải trí tuyệt vời của dòng Note đã tạo nên một tập khách hàng rất trung thành.\r\n<br>\r\nVề vấn đề giá bán, đây là vấn đề rất khó để giải đáp đâu là mức giá hợp lí dành cho Galaxy Note 7, khi hiện tại Samsung đã mang Galaxy C9 Pro cũng như Galaxy A7 2017 lẫn Note 5 cùng với Galaxy S7, đang nằm quanh quẩn trong tầm giá từ 10 đến 15 triệu.<br>', 's82.jpg', '0000-00-00', '2017-11-23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'thanh', 'thanh@gmail.com', '123456', NULL, NULL, NULL),
(2, 'thanh', 'thanh@gmail.com', '123456', NULL, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chi_nhanh`
--
ALTER TABLE `chi_nhanh`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `khach_hangID` (`khach_hangID`);

--
-- Chỉ mục cho bảng `don_hang_chi_tiet`
--
ALTER TABLE `don_hang_chi_tiet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `don_hangID` (`don_hangID`),
  ADD KEY `san_phamID` (`san_phamID`),
  ADD KEY `don_hangID_2` (`don_hangID`),
  ADD KEY `san_phamID_2` (`san_phamID`);

--
-- Chỉ mục cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email_kh` (`email_kh`);

--
-- Chỉ mục cho bảng `loai_san_pham`
--
ALTER TABLE `loai_san_pham`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `phan_hoi`
--
ALTER TABLE `phan_hoi`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loai_spID` (`loai_spID`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thong_bao`
--
ALTER TABLE `thong_bao`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `chi_nhanh`
--
ALTER TABLE `chi_nhanh`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT cho bảng `don_hang_chi_tiet`
--
ALTER TABLE `don_hang_chi_tiet`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `loai_san_pham`
--
ALTER TABLE `loai_san_pham`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `phan_hoi`
--
ALTER TABLE `phan_hoi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `thong_bao`
--
ALTER TABLE `thong_bao`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
