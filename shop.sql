-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2017 at 03:08 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `ten_ad` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mk_ad` varchar(50) CHARACTER SET latin1 NOT NULL,
  `sdt_ad` int(14) NOT NULL,
  `email_ad` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `stt_ad` bit(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `ten_ad`, `mk_ad`, `sdt_ad`, `email_ad`, `stt_ad`) VALUES
(2, 'Nguyễn Đức Duy', 'admin1', 939483756, 'duy1@gmail.com', b'0'),
(3, 'Trần Văn Thanh', 'admin2', 93483756, 'nv2@gmail.com', b'0'),
(1, 'thanh ', '123', 947349327, 'thanh@gmail.c0m', b'0'),
(38, 'Trần Văn Thanh', 'dsdsf', 956324324, 'than@gmail.com', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `don_hang`
--

CREATE TABLE `don_hang` (
  `id` int(10) NOT NULL,
  `khach_hangID` int(10) NOT NULL,
  `ten` varchar(50) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `dia_chi` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` int(14) NOT NULL,
  `thoi_gian` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `thanh_toan` float NOT NULL,
  `stt_don_hang` bit(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `don_hang`
--

INSERT INTO `don_hang` (`id`, `khach_hangID`, `ten`, `dia_chi`, `email`, `sdt`, `thoi_gian`, `thanh_toan`, `stt_don_hang`) VALUES
(20, 18, 'Nguyễn Duy Hen', 'Số 9 Trần Đại Nghĩa Hà Nội', 'duy@gmial.com', 2147483647, '23/4/2017', 17490000, b'0'),
(18, 0, 'Trần Thanh', 'ktx B10 bách khoa', 'as@gmail.com', 966195506, '1/4/2017', 6190000, b'1'),
(19, 9, 'Nguyễn Ngọc Ngạn', 'Số 5 Khu phố 1 Hương Canh Vĩnh Phúc', 'aa@gmail.com', 1234243423, '12/3/2017', 27040000, b'1'),
(21, 10, 'Trần An', 'Cầu Long Biên Hà Nội', 'an@gmail.com', 273846182, '5/5/2017', 19780000, b'0');

-- --------------------------------------------------------

--
-- Table structure for table `don_hang_chi_tiet`
--

CREATE TABLE `don_hang_chi_tiet` (
  `id` int(10) NOT NULL,
  `don_hangID` varchar(10) CHARACTER SET latin1 NOT NULL,
  `san_phamID` varchar(10) CHARACTER SET latin1 NOT NULL,
  `so_luong` int(10) NOT NULL,
  `tinh_tien` float NOT NULL,
  `nhan_vienID` int(11) NOT NULL,
  `stt_don_hang_chi_tiet` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `don_hang_chi_tiet`
--

INSERT INTO `don_hang_chi_tiet` (`id`, `don_hangID`, `san_phamID`, `so_luong`, `tinh_tien`, `nhan_vienID`, `stt_don_hang_chi_tiet`) VALUES
(37, '20', '29', 1, 17490000, 0, 0),
(36, '19', '26', 1, 10250000, 0, 1),
(35, '19', '28', 1, 16790000, 0, 1),
(34, '18', '23', 1, 6190000, 0, 1),
(38, '21', '25', 1, 4490000, 0, 0),
(39, '21', '15', 1, 15290000, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `hang_san_pham`
--

CREATE TABLE `hang_san_pham` (
  `hang_spID` int(10) NOT NULL,
  `parent_id` int(10) NOT NULL,
  `ten_hang_sp` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `stt_hang_sp` int(11) NOT NULL,
  `anh_hang_sp` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hang_san_pham`
--

INSERT INTO `hang_san_pham` (`hang_spID`, `parent_id`, `ten_hang_sp`, `stt_hang_sp`, `anh_hang_sp`) VALUES
(1, 0, 'Các hãng sản phẩm', 1, NULL),
(16, 1, 'Apple  ', 0, 'aple3.png'),
(17, 1, 'ASUS ', 0, 'asus3.jpg'),
(4, 1, 'Samsung  ', 0, 'ss1.jpg'),
(6, 1, 'Sony   ', 0, 'sony2.png'),
(7, 1, 'Xiaomi  ', 0, 'mi1.png'),
(15, 1, 'HTC  ', 0, 'htc3.jpg'),
(12, 1, 'Oppo', 0, 'oppo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `khach_hang`
--

CREATE TABLE `khach_hang` (
  `id` int(11) NOT NULL,
  `ten_kh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mk_kh` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `dia_chi_kh` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `email_kh` varchar(50) CHARACTER SET latin1 NOT NULL,
  `sdt_kh` int(20) NOT NULL,
  `stt_kh` bit(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khach_hang`
--

INSERT INTO `khach_hang` (`id`, `ten_kh`, `mk_kh`, `dia_chi_kh`, `email_kh`, `sdt_kh`, `stt_kh`) VALUES
(12, 'Nguyễn Duy', '12345', 'p11 b5 ktx bách khoa', 'a@gmail.com', 111111153, b'0'),
(18, 'Nguyễn Duy Hen', '12345', 'Số 9 Trần Đại Nghĩa Hà Nội', 'duy@gmial.com', 2147483647, b'0'),
(14, 'Nguyễn Thị Duy', '12345', 'Số 7 Lê Thanh Nghị Hà Nội', '123@gmial.com', 928462847, b'0'),
(8, 'Trần Văn Thanh', '12345', 'bình xuyên vĩnh phúc', 'thanhdolla1@gmail.com', 1738263839, b'0'),
(9, 'Nguyễn Ngọc Ngạn', '12345', 'Số 5 Khu phố 1 Hương Canh Vĩnh Phúc', 'aa@gmail.com', 1234243423, b'0'),
(10, 'Trần An', '12345', 'Cầu Long Biên Hà Nội', 'an@gmail.com', 273846182, b'0'),
(16, 'Nguyễn Thị Duy', '12345', 'Số 7 Lê Thanh Nghị Hà Nội', '12345@gmial.com', 928462847, b'0'),
(17, 'Nguyễn Thị Duy', '1111', 'Số 7 Lê Thanh Nghị Hà Nội', '123455@gmial.com', 928462847, b'0');

-- --------------------------------------------------------

--
-- Table structure for table `loai_san_pham`
--

CREATE TABLE `loai_san_pham` (
  `id` int(10) NOT NULL,
  `ten_loai_sp` varchar(50) CHARACTER SET latin1 NOT NULL,
  `mo_ta` varchar(500) CHARACTER SET latin1 NOT NULL,
  `anh_loai_sp` varchar(50) CHARACTER SET latin1 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `loai_san_pham`
--

INSERT INTO `loai_san_pham` (`id`, `ten_loai_sp`, `mo_ta`, `anh_loai_sp`, `created_at`, `updated_at`) VALUES
(3, 'Laptop', 'Máy tính xách tay', '', '2017-09-21 07:27:22', '0000-00-00 00:00:00'),
(6, 'Smartphone', '?i?n tho?i di ??ng thông minh', '', '2017-09-21 07:29:43', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `nhap_hang`
--

CREATE TABLE `nhap_hang` (
  `nhap_hangID` int(10) NOT NULL,
  `ten_sp` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `so_luong` int(5) NOT NULL,
  `gia` float NOT NULL,
  `nha_cung_cap` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `sdt_ncc` int(14) NOT NULL,
  `bao_hanh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `thoi_gian` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhap_hang`
--

INSERT INTO `nhap_hang` (`nhap_hangID`, `ten_sp`, `so_luong`, `gia`, `nha_cung_cap`, `sdt_ncc`, `bao_hanh`, `thoi_gian`) VALUES
(2, 'IPhone 5', 26, 32432, 'Công Ty ABC', 938492749, '1 năm', '12/2/2017'),
(3, 'HTC One m9', 15, 32432, 'Công Ty MS-Project', 938472847, '2 năm', '1/2/2017'),
(5, 'IPhone 6 plus', 23, 32323, 'Cửa hàng Thanh$', 127417347, '2 năn', '3/2/2017');

-- --------------------------------------------------------

--
-- Table structure for table `san_pham`
--

CREATE TABLE `san_pham` (
  `id` int(10) NOT NULL,
  `hang_spID` int(10) NOT NULL,
  `ten_sp` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_sx` varchar(50) CHARACTER SET latin1 NOT NULL,
  `gia_sp` float NOT NULL,
  `khuyen_mai` float NOT NULL,
  `bao_hanh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `anh_sp` varchar(150) CHARACTER SET latin1 NOT NULL,
  `mo_ta_sp` text COLLATE utf8_unicode_ci NOT NULL,
  `discription` text COLLATE utf8_unicode_ci NOT NULL,
  `luot_view` int(10) NOT NULL,
  `stt_sp` bit(1) NOT NULL,
  `loai_spID` int(10) NOT NULL,
  `san_pham_moi` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `san_pham`
--

INSERT INTO `san_pham` (`id`, `hang_spID`, `ten_sp`, `ngay_sx`, `gia_sp`, `khuyen_mai`, `bao_hanh`, `anh_sp`, `mo_ta_sp`, `discription`, `luot_view`, `stt_sp`, `loai_spID`, `san_pham_moi`) VALUES
(12, 16, 'Iphone 5s 16Gb', '14/03/2016', 6490000, 500000, '12 tháng', 'iphone-5s-16gb.png', '  Màn hình: LED-backlit IPS LCD, 4", DVGA<br/>\r\nHệ điều hành: iOS 10<br/>\r\nCamera sau: 8 MP<br/>\r\nCamera trước: 1.2 MP<br/>\r\nCPU: Apple A7 2 nhân 64-bit<br/>\r\nRAM: 1 GB<br/>\r\nBộ nhớ trong: 16 GB<br/>\r\nThẻ nhớ:	Không<br/>\r\nThẻ SIM:	1 Nano SIM<br/>\r\nDung lượng pin: 1560 mAh', 'màn hình led', 8, b'0', 6, 1),
(13, 16, 'Iphone 7 Plus Red 128Gb', '16/3/2017', 25190000, 200000, '12 tháng', 'iphone-7-plus-red-128gb.png', '     Màn hình: LED-backlit IPS LCD, 5.5", HD</br>\r\nHệ điều hành:	iOS 10</br>\r\nCamera sau: Hai camera 12 MP</br>\r\nCamera trước: 7 MP</br>\r\nCPU: Apple A10 Fusion 4 nhân 64-bit</br>\r\nRAM: 3 GB</br>\r\nBộ nhớ trong: 128 GB</br>\r\nThẻ nhớ:	Không</br>\r\nThẻ SIM:	1 Nano SIM</br>\r\nDung lượng pin: 2900 mAh', 'mà hì ', 3, b'0', 3, 1),
(14, 16, 'Iphone 5s Plus 64Gb', '16/3/2015', 19990000, 0, '12 tháng', 'iphone-5s-16gb.png', '    Màn hình: LED-backlit IPS LCD, 5.5", HD<br/>\r\nHệ điều hành:	iOS 9<br/>\r\nCamera sau:	12 MP<br/>\r\nCamera trước:	5 MP<br/>\r\nCPU:	Apple A9 2 nhân 64-bit<br/>\r\nRAM:	2 GB<br/>\r\nBộ nhớ trong:	64 GB<br/>\r\nThẻ nhớ:	Chưa xác định<br/>\r\nThẻ SIM:	1 Nano SIM<br/>\r\nDung lượng pin:	2750 mAh', '', 1, b'1', 6, 1),
(15, 4, 'Samsung Galaxy S7 Edge', '16/09/2016', 15490000, 200000, '12 tháng', 'samsung-galaxy-s7-edge1.png', '   Màn hình: Super AMOLED, 5.5", Quad HD<br/>\r\nHệ điều hành:	Android 6.0 (Marshmallow)<br/>\r\nCamera sau:	12 MP<br/>\r\nCamera trước:	5 MP<br/>\r\nCPU:	Exynos 8890 8 nhân 64-bit<br/>\r\nRAM:	4 GB<br/>\r\nBộ nhớ trong:	32 GB<br/>\r\nThẻ nhớ:	MicroSD, hỗ trợ  256 GB<br/>\r\nThẻ SIM:	2 SIM Nano  hỗ trợ 4G<br/>\r\nDung lượng pin:	3600 mAh, có sạc nhanh<br/>', '', 1, b'0', 3, 1),
(16, 4, 'Samsung Galaxy A9 Pro', '17/11/2016', 10990000, 250000, '18 tháng', 'samsung-galaxy-a9-pro1.png', '  Màn hình:	Super AMOLED, 6", Full HD<br/>\r\nHệ điều hành:	Android 6.0 (Marshmallow)<br/>\r\nCamera sau:	16 MP<br/>\r\nCamera trước:	8 MP<br/>\r\nCPU:	Qualcomm Snapdragon 652 8 nhân<br/>\r\nRAM:	4 GB<br/>\r\nBộ nhớ trong:	32 GB<br/>\r\nThẻ nhớ:	MicroSD, hỗ trợ tối đa 256 GB<br/>\r\nThẻ SIM:	2 Nano SIM<br/>\r\nDung lượng pin:	5000 mAh, có sạc nhanh<br/>', '', 1, b'0', 3, 1),
(17, 4, 'Samsung Galaxy A7', '18/02/2017', 10990000, 200000, '12 tháng', 'samsung-galaxy-a71.png', '  Màn hình:	Super AMOLED, 5.7", Full HD<br/>\r\nHệ điều hành:	Android 6.0 (Marshmallow)<br/>\r\nCamera sau:	16 MP<br/>\r\nCamera trước:	16 MP<br/>\r\nCPU:	Exynos 7880 8 nhân 64-bit<br/>\r\nRAM:	3 GB<br/>\r\nBộ nhớ trong:	32 GB<br/>\r\nThẻ nhớ:	MicroSD, hỗ trợ tối đa 256 GB<br/>\r\nThẻ SIM:	2 Nano SIM, hỗ trợ 4G<br/>\r\nDung lượng pin:	3600 mAh, có sạc nhanh', '', 1, b'0', 6, 1),
(18, 6, 'Sony Xperia XZs', '14/03/2016', 1499000, 300000, '12 tháng', 'sony-xperia-xzs1.png', '  Màn hình:	IPS LCD, 5.2", Full HD<br/>\r\nHệ điều hành:	Android 7.0<br/>\r\nCamera sau:	19 MP<br/>\r\nCamera trước:	13 MP<br/>\r\nCPU:	Snapdragon 820 4 nhân 64-bit<br/>\r\nRAM:	4 GB<br/>\r\nBộ nhớ trong:	64 GB<br/>\r\nThẻ nhớ:	MicroSD, hỗ trợ tối đa 256 GB<br/>\r\nThẻ SIM:	2 Nano SIM, hỗ trợ 4G<br/>\r\nDung lượng pin:	2900 mAh, có sạc nhanh', '', 0, b'0', 3, 1),
(19, 6, 'Sony Xperia X', '16/09/2016', 7990000, 0, '1 năm', 'sony-xperia-x1.png', ' Màn hình:	IPS LCD, 5", Full HD<br/>\r\nHệ điều hành:	Android 6.0 (Marshmallow)<br/>\r\nCamera sau:	23 MP<br/>\r\nCamera trước:	13 MP<br/>\r\nCPU:	Snapdragon 650 6 nhân 64-bit<br/>\r\nRAM:	3 GB<br/>\r\nBộ nhớ trong:	64 GB<br/>\r\nThẻ nhớ:	MicroSD, hỗ trợ tối đa 256 GB<br/>\r\nThẻ SIM:	2 Nano SIM, hỗ trợ 4G<br/>\r\nDung lượng pin:	2620 mAh', '', 2, b'0', 0, 1),
(20, 6, 'Sony Xperia M5 (Single SIM)', '16/3/2016', 6490000, 0, '12 tháng', 'sony-xperia-m51.png', '  Màn hình:	IPS LCD, 5", Full HD<br/>\r\nHệ điều hành:	Android 5.0 (Lollipop)<br/>\r\nCamera sau:	21.5 MP<br/>\r\nCamera trước:	13 MP<br/>\r\nCPU:	MT6795 (Helio x10) 8 nhân 64-bit<br/>\r\nRAM:	3 GB<br/>\r\nBộ nhớ trong:	16 GB<br/>\r\nThẻ nhớ:	MicroSD, hỗ trợ tối đa 200 GB<br/>\r\nThẻ SIM:	1 Nano SIM<br/>\r\nDung lượng pin:	2600 mAh', '', 0, b'0', 3, 0),
(21, 15, 'HTC U Play', '17/11/2016', 9990000, 0, '12 tháng', 'htc-u-play1.png', '  Màn hình:	Super LCD, 5.2", Full HD<br/>\r\nHệ điều hành:	Android 6.0 (Marshmallow)<br/>\r\nCamera sau:	16 MP<br/>\r\nCamera trước:	16 MP<br/>\r\nCPU:	MTK Helio P10 8 nhân 64-bit<br/>\r\nRAM:	3 GB<br/>\r\nBộ nhớ trong:	32 GB<br/>\r\nThẻ nhớ:	MicroSD, hỗ trợ tối đa 2 TB<br/>\r\nThẻ SIM:	2 Nano SIM, hỗ trợ 4G<br/>\r\nDung lượng pin:	2500 mAh, có sạc nhanh', '', 1, b'0', 3, 1),
(22, 15, 'HTC Desire 10 Pro', '16/09/2016', 7990000, 300000, '12 tháng', 'htc-desire-10-pro1.png', '  Màn hình:	IPS LCD, 5.5", Full HD<br/>\r\nHệ điều hành:	Android 6.0 (Marshmallow)<br/>\r\nCamera sau:	20 MP<br/>\r\nCamera trước:	13 MP<br/>\r\nCPU:	MTK Helio P10 8 nhân 64-bit<br/>\r\nRAM:	4 GB<br/>\r\nBộ nhớ trong:	64 GB<br/>\r\nThẻ nhớ:	MicroSD, hỗ trợ tối đa 2 TB<br/>\r\nThẻ SIM:	2 Micro SIM, hỗ trợ 4G<br/>\r\nDung lượng pin:	3000 mAh, có sạc nhanh', '', 0, b'0', 0, 1),
(23, 15, 'HTC One A9', '14/03/2016', 6190000, 0, '1 năm', 'htc-one-a91.png', '    Màn hình:	AMOLED, 5", Full HD<br/>\r\nHệ điều hành:	Android 6.0 (Marshmallow)<br/>\r\nCamera sau:	13 MP<br/>\r\nCamera trước:	4 Ultra pixel<br/>\r\nCPU: Qualcomm Snapdragon 617 64-bit<br/>\r\nRAM:	2 GB<br/>\r\nBộ nhớ trong:	16 GB<br/>\r\nThẻ nhớ:	MicroSD, hỗ trợ tối đa 2 TB<br/>\r\nThẻ SIM:	1 Nano SIM<br/>\r\nDung lượng pin:	2150 mAh<br/>', '', 1, b'0', 6, 1),
(24, 17, 'Asus Zenfone 3 ZE520KL', '16/09/2016', 7990000, 350000, '12 tháng', 'asus-zenfone-3-ze520kl1.png', '   Màn hình:	Super IPS LCD, 5.2", Full HD<br/>\r\nHệ điều hành:	Android 6.0 (Marshmallow)<br/>\r\nCamera sau:	16 MP<br/>\r\nCamera trước:	8 MP<br/>\r\nCPU:	Snapdragon 625 8 nhân 64-bit<br/>\r\nRAM:	4 GB<br/>\r\nBộ nhớ trong:	64 GB<br/>\r\nThẻ nhớ:	MicroSD, hỗ trợ tối đa 128 GB<br/>\r\nThẻ SIM:	Nano SIM & Micro SIM hỗ trợ 4G<br/>\r\nDung lượng pin:	2650 mAh', '', 1, b'0', 0, 0),
(25, 17, 'ASUS ZENFONE 3 MAX', '14/03/2016', 4490000, 0, '12 tháng', 'asus-zenfone-3-max2.png', '    Màn hình:	IPS LCD, 5.2", HD<br/>\r\nHệ điều hành:	Android 6.0 (Marshmallow)<br/>\r\nCamera sau:	13 MP<br/>\r\nCamera trước:	5 MP<br/>\r\nCPU:	MT6735 4 nhân 64-bit<br/>\r\nRAM:	3 GB<br/>\r\nBộ nhớ trong:	32 GB<br/>\r\nThẻ nhớ:	MicroSD, hỗ trợ tối đa 32 GB<br/>\r\nThẻ SIM:	Nano SIM & Micro SIM,  4G<br/>\r\nDung lượng pin:	4100 mAh', '', 1, b'0', 0, 0),
(26, 7, 'Xiaomi mi 6', '12/2/2010', 10500000, 250000, '12 tháng', 'xiaomi-mi-6-1-400x4601.png', 'Màn hình:	IPS LCD, 5.15", Full HD</br>\r\nHệ điều hành:	Android 7.1</br>\r\nCamera sau:	Hai camera 12 MP</br>\r\nCamera trước:	8 MP</br>\r\nCPU:	Qualcomm Snapdragon 835 8 nhân </br>\r\nRAM:	6 GB</br>\r\nBộ nhớ trong:	128 GB</br>\r\nThẻ nhớ:	Không</br>\r\nThẻ SIM:	2 Nano SIM, hỗ trợ 4G</br>\r\nDung lượng pin:	3350 mAh, có sạc nhanh</br>', '', 0, b'0', 0, 0),
(27, 12, 'OPPO F3 Plus', '12/2/2016', 11500000, 500000, '12 tháng', 'oppo-f3-plus-1-1-400x4601.png', '  Màn hình:	IPS LCD, 6", Full HD</br>\r\nHệ điều hành:	Android 6.0 (Marshmallow)</br>\r\nCamera sau:	16 MP</br>\r\nCamera trước:	16 MP và 8 MP</br>\r\nCPU:	Snapdragon 653 8 nhân 64-bit</br>\r\nRAM:	4 GB</br>\r\nBộ nhớ trong:	64 GB</br>\r\nThẻ nhớ:	MicroSD, hỗ trợ tối đa 256 GB</br>\r\nThẻ SIM:	2 Nano SIM, hỗ trợ 4G</br>\r\nDung lượng pin:	4000 mAh, có sạc nhanh</br>', '', 2, b'0', 6, 1),
(28, 16, 'Iphone 6s Plus 64Gb', '16/3/2016', 16990000, 200000, '12 tháng', 'iphone-6s-plus-64gb2.png', '       Màn hình: LED-backlit IPS LCD, 5.5", HD<br/>\r\nHệ điều hành:	iOS 9<br/>\r\nCamera sau:	12 MP<br/>\r\nCamera trước:	5 MP<br/>\r\nCPU:	Apple A9 2 nhân 64-bit<br/>\r\nRAM:	2 GB<br/>\r\nBộ nhớ trong:	64 GB<br/>\r\nThẻ nhớ:	Chưa xác định<br/>\r\nThẻ SIM:	1 Nano SIM<br/>\r\nDung lượng pin:	2750 mAh', '', 5, b'0', 0, 0),
(29, 16, 'IPhone 7 32GB', '12/8/2017', 17990000, 500000, '12 tháng', 'iphone-7-8-400x4601.png', '  Màn hình:	LED-backlit IPS LCD, 4.7", HD</br>\r\nHệ điều hành:	iOS 10</br>\r\nCamera sau:	12 MP</br>\r\nCamera trước:	7 MP</br>\r\nCPU:	Apple A10 Fusion 4 nhân 64-bit</br>\r\nRAM:	2 GB</br>\r\nBộ nhớ trong:	32 GB</br>\r\nThẻ nhớ:	Không</br>\r\nThẻ SIM:	1 Nano SIM</br>\r\nDung lượng pin:	1960 mAh', '', 2, b'0', 0, 0),
(30, 0, 'Iphone 6s 64GB', '', 1222000, 0, '', 'iphone-6s-plus-64gb2.png', '54eaf93713081_-_07-germany-tuna.jpg', '', 0, b'0', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `id` int(10) NOT NULL,
  `ten_slide` varchar(50) NOT NULL,
  `anh_slide` varchar(50) NOT NULL,
  `link_slide` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id`, `ten_slide`, `anh_slide`, `link_slide`) VALUES
(1, 'ret', 'bn2.png', 'twetw'),
(2, 'dsda', 'bn3.jpg.jpg', ''),
(3, 'dfg', 'bn3.png', ''),
(4, 'ees', 'bn5.jpg', ''),
(5, 'ees', 'bn5.jpg', ''),
(6, 'sdfsf', 'bn6.jpg', ''),
(7, 'sdfsf', 'bn6.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `thong_bao`
--

CREATE TABLE `thong_bao` (
  `id` int(10) NOT NULL,
  `tieu_de_tb` text COLLATE utf8_unicode_ci NOT NULL,
  `noi_dung_tb` text COLLATE utf8_unicode_ci NOT NULL,
  `anh_tb` varchar(10) CHARACTER SET latin1 NOT NULL,
  `stt_tb` bit(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `thong_bao`
--

INSERT INTO `thong_bao` (`id`, `tieu_de_tb`, `noi_dung_tb`, `anh_tb`, `stt_tb`) VALUES
(1, 'Smartphone sẽ chết? Cũng có thể, nhưng là chuyện của 10 năm sau', 'Những ngày vừa qua, giới công nghệ thế giới đang hoang mang với phát biểu của ông chủ Facebook - Mark Zuckerberg rằng smartphone sẽ chết và sẽ được thay thế bằng công nghệ VR và AR tiên tiến, hiện đại hơn.</br>\r\n\r\n1. Giả thuyết về cái chết của smartphone\r\n</br>\r\nMark Zuckerberg cho rằng smartphone sẽ sớm bị thay thế bằng công nghệ thực tế ảo (VR) và thực tế ảo tăng cường (AR), đưa cuộc sống lên một tầm cao mới, giống với những bộ phim khoa học viễn tưởng bạn thường xem.</br>\r\n\r\nVới kính thực tế tăng cường người dùng chẳng cần đến smartphone, máy tính bảng, TV hay bất kỳ thứ gì khác có màn hình hiển thị.\r\n</br>\r\n"Chúng ta sẽ không cần tới một chiếc TV truyền thống bởi vì với ứng dụng TV giá 1 USD, chúng ta có thể xem ở bất kỳ đâu. Thật tuyệt vời khi chúng ta có thể thay đổi cách sử dụng các thiết bị," Zuckerberg chia sẻ.</br>\r\n\r\nWow, nghe thì rất hay đấy, nhưng để hiện thực hóa cũng là cả một quá trình.</br>\r\n\r\n2. Góc nhìn thị trường\r\n</br>\r\nKhó ở đây là cái chết của smartphone, hay nói đúng hơn là chiếc điện thoại di động - công cụ giúp ta giữ liên lạc là tối thiểu cần thiết, vì bạn không thể đi đâu cũng mang theo một chiếc kính VR.\r\n</br>\r\nHiện tại, thị trường smartphone vẫn còn diễn ra rất sôi động bằng chứng là Apple vẫn còn sống, sống khỏe nhờ vào doanh số bán hàng khổng lồ từ mảng điện thoại iPhone. CEO Tim Cook cho biết, công ty đã bán ra hơn 78,29 triệu chiếc iPhone chỉ trong 3 tháng cuối năm 2016.\r\n</br>\r\nVới các hãng công nghệ hàng đầu khác ví dụ như Samsung cũng không hề tập trung vào công nghệ VR, họ chỉ xem đó là một ngách kiếm thêm, còn tất cả nguồn lực vẫn dồn vào mảng smartphone, mà cụ thể hơn là bộ đôi Samsung Galaxy S8 và S8 Plus vừa ra mắt vào cuối tháng 3.</br>\r\n\r\nSamsung Galaxy S8 mang đến một chuẩn mực thiết kế mới cho làng smartphone 2017</br>\r\nSamsung Galaxy S8 mang đến một chuẩn mực thiết kế mới cho làng smartphone 2017 (Ảnh: Unbox)\r\nHai ông lớn trong làng công nghệ hiện vốn không mảy may đến tiềm năng của công nghệ VR này thì các hãng khác liệu có đủ tiềm lực thực sự để tạo nên một thiết bị thay thế được smartphone không?</br>\r\n\r\nChưa kể thời gian nghiên cứu là khá dài và tỷ lệ thành công cũng không hề cao. Trong một thế giới có nhịp độ phát triển nhanh như hiện nay, dồn tất cả nguồn lực vào một công nghệ không chắc chắn nếu thất bại thì phá sản là chuyện dĩ nhiên.\r\n</br>\r\nNgay cả Google còn thất bại với Google Glass, rút kinh nghiệm từ thất bại này, Google vẫn đang tiến vào cuộc chiến smartphone cao cấp với Apple và Samsung.\r\n</br>\r\nNhư vậy, ông trùm tìm kiếm Google còn không còn niềm tin với mảng VR và tập trung cho smartphone thì liệu smartphone có chết?\r\n</br>\r\n3. Liệu các thiết bị khác có đủ sức thay thế smartphone?</br>\r\n\r\nLật lại lịch sử phát triển công nghệ, ngày trước chúng ta có một máy tính to đùng như một ngôi nhà, sau đó theo quy trình chúng giảm kích thước và tăng sức mạnh. Việc này được lặp lại liên tục cho đến ngày hôm nay, chúng ta đã có laptop, máy tính để bàn nhỏ gọn và chiếc smartphone.\r\n</br>\r\nCó thể nói smartphone ngày nay là tinh hoa thành công của công nghệ trong quá khứ, chúng nhỏ gọn và thực hiện hầu như mọi chức năng mà một chiếc máy tính có thể làm.\r\n</br>\r\nTừ đây có thể giả định rằng công nghệ sẽ tiếp tục làm những thứ nhỏ hơn nhưng sức mạnh sẽ vượt trội hơn, tiếp nối smartphone có lẽ là đồng hồ và kính mắt thông minh.\r\n</br>\r\nSự tiến hóa của điện thoại Nokia trước đây\r\nSự tiến hóa của điện thoại Nokia trước đây (Ảnh: Firefly Daily)</br>\r\nTuy nhiên, không có bằng chứng cho thấy chuyện này sẽ xảy ra, ít nhất là trong tương lai gần. Trên thực tế, thiết bị một ngày một nhỏ hơn đã bị bác bỏ hoàn toàn.</br>\r\n\r\nBạn có còn nhớ đến những cục gạch Nokia huyền thoại chứ? Ngay thời điểm chúng phổ biến, nhiều người tuyên bố sẽ có nhiều chiếc điện thoại di động nhỏ như vậy.\r\n</br>\r\nNhưng trong 10 năm qua kể từ ngày iPhone ra mắt, điện thoại ngày càng lớn hơn từ 3,5 inch cho đến ngoại cỡ 6 inch cũng là chuyện bình thường.\r\n</br>\r\nPhải công nhận màn hình lớn hơn là một lựa chọn tuyệt vời phục vụ cho nhu cầu giải trí cũng như trải nghiệm. Và vấn đề cạnh tranh hiện nay của smartphone là mỏng, gọn hơn chứ không phải nhỏ hơn.</br>\r\n\r\nLiệu bạn sẽ làm việc tốt hơn khi có nhiều công cụ trên màn hình điện thoại với hình ảnh lớn và rõ hơn hay bạn sẽ chọn giao diện màn hình nhỏ xíu của smartwatch? Không quá khó để có câu trả lời chứ nhỉ.\r\n</br>\r\nVới lại việc đem vi xử lý và bộ nhớ vào smartwatch để thực hiện mọi chức năng của smartphone là một việc quá khó khăn đối với công nghệ hiện nay. Hiện không có nhiều smartwatch hoạt động độc lập.\r\n</br>\r\nDo vậy, chuyện smartwatch thay thế smartphone là không thể xảy ra. Nó chỉ là cánh tay phải hỗ trợ cho smartphone mà thôi.    ', 'aa.jpg', b'0'),
(2, 'Dung lượng RAM của iPhone 2017: Vẫn còn là dấu hỏi', 'Ngày hôm qua, hãng nghiên cứu thị trường TrendForce dự đoán rằng Smartphone sẽ có bộ nhớ RAM trung bình ở mức 3.2 GB vào cuối năm 2017. </br>Tăng 33.4% so với dung lượng bộ nhớ trung bình của năm 2016 là 2.4 GB.</br>\r\n\r\nCác nhà phân tích cũng dự đoán rằng iPhone 8 sẽ không trang bị RAM quá 3 GB vì thế người hâm mộ sản phẩm của hãng này không nên mong đợi một thiết bị RAM 4 GB trước năm 2018. Hãng TrendForce cũng dự đoán thêm iPhone phiên bản màn hình AMOLED 5.8 inch và màn LCD 5.5 inch sẽ được trang bị RAM 3 GB, riêng phiên bản iPhone màn hình LCD 4.7 inch sẽ chỉ có 2 GB RAM.</br>\r\n\r\nMặt khác, theo nhà phân tích Avril Wu, các nhà sản xuất điện thoại Adroid tăng dung lượng RAM chủ yếu do nhu cầu người tiêu dùng. Vì hệ điều hành trên các thiết bị này sẽ chậm chạp sau một thời gian sử dụng nên sự tăng trưởng dung lượng bộ nhớ trung bình của nó cao hơn iPad và PC.</br>  ', 'sss1.jpg', b'0'),
(3, 'Ra mắt Galaxy S8: Khi công nghệ chạm đến ngưỡng vô cực', '“Vô cực” gần như là từ khoá miêu tả rõ nhất cho những gì đã diễn ra tại sự kiện ra mắt bộ đôi Galaxy S8/S8+, khi công nghệ, các giác quan và khả năng khám phá các giới hạn của cuộc sống đều được mở ra đến… vô cực.</br>\r\nThị giác của các tín đồ công nghệ được ''thết đãi” ra trò với đoạn phim mãn nhãn về thế hệ điện thoại mới nhất của Samsung và những giới hạn bất khả trong quá khứ được công nghệ bình thường hóa trong hiện tại và tương lai</br>\r\nNhư mọi lần, CEO DJ Koh là người chào đón khách tham dự tiến vào “thời đại” mới của Samsung Mobile. Rất ngắn gọn, ông giới thiệu về khái niệm “di sản của sự cải tiến” và lí giải vì sao Samsung sẽ là nơi mà không còn giới hạn nào là không thể vượt qua</br>\r\nBên cạnh đó, Samsung cũng giới thiệu tính năng Samsung DeX, mang lại người dùng trải nghiệm thật như đang sử dụng máy tính để bàn dùng nền tảng hệ điều hành Android</br>\r\nTrợ lý ảo Bixby cũng là một tính năng đột phá hứa hẹn tạo nên sự khác biệt về trải nghiệm người dùng trên Galaxy S8/S8+</br>\r\n\r\nBên cạnh đó, Samsung cũng giới thiệu tính năng Samsung DeX, mang lại người dùng trải nghiệm thật như đang sử dụng máy tính để bàn dùng nền tảng hệ điều hành Android</br>\r\n\r\nSự kiện ra mắt đầy ấn tượng tại New York khép lại cùng lời kêu gọi “làm những điều không thể” từ ông DJ Koh, Galaxy S8/S8+ hứa hẹn đem đến một năm thành công cho Samsung không thua kém gì thế hệ tiền nhiệm</br>\r\nVới buổi ra mắt chạm đến từng centimet giác quan, Samsung đã kể một câu chuyện tuyệt vời về tương lai của công nghệ nằm gọn trong tay người dùng dưới hình dạng của một chiếc điện thoại thông minh mang tên Galaxy S8/S8+, khiến việc mở ra những chân trời vô cực không chỉ còn là khao khát. Không chỉ toàn thế giới, ngay cả các tín đồ công nghệ tại Việt Nam cũng không khỏi nức lòng chờ đón siêu phẩm này “cập bến” trong tương lai gần.     ', 's83.jpg', b'0'),
(13, '5 cách tăng thời gian sử dụng pin trên iPhone vô cùng cần thiết', '1. Tắt tự động cập nhật</br>\r\n\r\nBật Cập nhật sẽ giúp iPhone kiểm tra liên tục phiên bản, nhờ đó bạn sẽ nhận được các tính năng mới, độ ổn định từ ứng dụng đang sử dụng. Tuy nhiên vì phải liên tục chạy ngầm cũng như sử dụng mạng dữ liệu để kiểm tra nên tính năng này vô tình lấy đi kha khá thời gian sử dụng Pin của iPhone.</br>\r\n\r\nNếu cảm thấy có thể tự kiểm tra và cập nhật thủ công để tiết kiệm pin, bạn hãy truy cập vào Cài đặt > iTunes & App Store. Sau đó gạt tắt các tính năng ở mục Tải về Tự động.</br>\r\n2. Tắt chạy nền trên iPhone</br>\r\n\r\nCập nhật dữ liệu nền giúp bạn nhận đầy đủ và nhanh nhất các thông báo từ ứng dụng, khi thiết bị được kết nối với dữ liệu mạng. Tuy nhiên điều này lại là nguyên nhân gây ảnh hưởng khá nhiều tới thời gian sử dụng pin trên thiết bị. Để tắt tính năng này đi, truy cập vào Cài đặt > Cài đặt chung > Làm mới ứng dụng trong nền và lựa chọn tắt với một vài ứng dụng hoặc toàn bộ ứng dụng.</br>\r\n3. Tắt các kết nối Wi-Fi, Bluetooth, AirDrop khi không sử dụng</br>\r\n\r\nNếu những tính năng này được bật khi không sử dụng nó sẽ làm hao tốn năng lượng không cần thiết. Bạn có thể truy cập vào Trung tâm kiểm soát, sau đó chạm vào biểu tượng Bluetooth và Wi-Fi để tắt/mở chúng. Đối với AirDrop, để tắt tính năng này đi, chạm vào và chọn Không nhận.</br>\r\n4. Sạc pin iPhone đúng cách </br>\r\nĐối với các thiết bị sử dụng Pin Lithium-ion thì việc sạc Overcharging (vẫn ghim sạc khi đã đủ 100%) sẽ hoàn toàn không gây hại cho Pin của thiết bị. Tuy nhiên bạn nên nhớ, pin trên smartphone đều có vòng đời và mỗi viên pin chỉ có số lần sạc nhất định trước khi hiệu suất của nó không còn được như trước. Đó là câu trả lời cho thắc mắc tại sao những smartphone cũ lại dễ hỏng hơn, đơn giản vì pin của chúng đã trải qua quá nhiều lần sạc.</br>\r\n\r\n5. Ưu tiên sử dụng ứng dụng khuyên dùng từ Apple</br>\r\n\r\nCác ứng dụng khuyên dùng từ Apple được tối ưu để có thể giúp iPhone hoạt động mượt mà cũng như tiết kiệm năng lượng. Nếu giữa 2 ứng dụng có chức năng giống nhau thì tốt nhất người dùng nên chọn ứng dụng từ Apple. Điều này không có nghĩa các ứng dụng bên thứ 3 không hoạt động tốt, nhưng hãy giảm mức độ sử dụng chúng khi lượng pin trên iPhone không có nhiều.  ', 'ddd.jpg', b'0'),
(14, ' Note 7 tân trang bán ra thị trường Việt sẽ thành công ', 'Note 7 tân trang không chỉ được quan tâm ở thị trường nước ngoài, mà cả ở thị trường Việt. Câu chuyện về giá bán, hay chiến lược của chiếc phablet này ở Việt Nam, sẽ được chuyên gia chia sẻ để các bạn có cái nhìn toàn cảnh hơn.</br>.\r\n\r\nTóm lược câu chuyện trong bài viết trước</br>\r\n\r\nTrong bài viết về một số nhận định dành cho Note 7 tân trang. Mình đã chia sẻ rằng chiếc phablet này vẫn nhận được sự yêu thích và ủng hộ từ người dùng. Và hầu hết các bạn đều muốn Note 7 tân trang có giá bằng với giá bán dự kiến bên Hàn Quốc, tức khoảng 14 triệu đồng.</br>\r\n\r\nKhi xét đến thời điểm bán ra vào cuối tháng 6 của Note 7 tân trang, mình đã cho rằng đây là khoảng thời gian ra mắt khá khó hiểu. Lúc này Galaxy S8 lẫn S8 Plus vẫn mang lại doanh số tốt cho Samsung, đồng thời Note 8 cũng đã chuẩn bị ra mắt để đối đầu với mẫu iPhone mới của Apple. Vì vậy vai trò của Note 7 khi ra mắt vào thời điểm nói trên có lẽ sẽ không mang nặng tính chiến lược.\r\n</br>\r\nCác bạn có thể xem lại chi tiết bài viết tại đây: Note 7 tân trang có được bán ở Việt Nam không? Giá bao nhiêu?\r\n</br>\r\n\r\n\r\n\r\nKhi được hỏi về việc giả sử Note 7 tân trang được bán chính hãng tại Việt Nam. Liệu chiếc smartphone này có bị thiếu hụt nguồn cung cho các hệ thống lớn hay không. Anh Nguyên Trực đã chia sẻ rằng: Để trả lời câu hỏi này cần một yếu tố rất quan trọng là giá, phải có giá bán lẻ mới có thể trả lời sản phẩm hút hàng hay không.</br>\r\n\r\nVới mức giá dự đoán hơn 600 USD, giả sử nếu bán ở Việt Nam thì rất tuyệt vời. Vì hiện tại thế hệ trước là Note 5 cũng đang bán ở tầm giá này và có doanh số rất tốt. Còn về vấn đề thiếu hụt nguồn cung, anh Nguyên Trực cho biết hiện rất khó để dự đoán điều này.</br>\r\n\r\nXét về độ “hot" của Note 7 tân trang so với Galaxy S8, do hãng chỉ tập trung duy nhất cho 1 sản phẩm chiến lược vào 1 thời điểm. Và dĩ nhiên Samsung sẽ ưu tiên Galaxy S8 và S8 Plus hơn.</br>\r\n\r\nChuyển sang khả năng thành công của Note 7 tân trang tại thị trường Việt? Anh Trực tin tưởng chiếc smartphone này sẽ thành công vì dòng Note luôn có một tập khách hàng cố định. Họ không thể hay dường như rất khó đổi qua dòng máy khác do đã thao tác quen với dòng Note, cũng như khả năng hỗ trợ công việc, giải trí tuyệt vời của dòng Note đã tạo nên một tập khách hàng rất trung thành.\r\n</br>\r\nVề vấn đề giá bán, đây là vấn đề rất khó để giải đáp đâu là mức giá hợp lí dành cho Galaxy Note 7, khi hiện tại Samsung đã mang Galaxy C9 Pro cũng như Galaxy A7 2017 lẫn Note 5 cùng với Galaxy S7, đang nằm quanh quẩn trong tầm giá từ 10 đến 15 triệu.</br>\r\n\r\n     ', 'note72.jpg', b'0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `don_hang`
--
ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `khach_hangID` (`khach_hangID`);

--
-- Indexes for table `don_hang_chi_tiet`
--
ALTER TABLE `don_hang_chi_tiet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `don_hangID` (`don_hangID`),
  ADD KEY `san_phamID` (`san_phamID`),
  ADD KEY `don_hangID_2` (`don_hangID`),
  ADD KEY `san_phamID_2` (`san_phamID`);

--
-- Indexes for table `hang_san_pham`
--
ALTER TABLE `hang_san_pham`
  ADD PRIMARY KEY (`hang_spID`);

--
-- Indexes for table `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loai_san_pham`
--
ALTER TABLE `loai_san_pham`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nhap_hang`
--
ALTER TABLE `nhap_hang`
  ADD PRIMARY KEY (`nhap_hangID`);

--
-- Indexes for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hang_spID` (`hang_spID`),
  ADD KEY `loai_spID` (`loai_spID`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thong_bao`
--
ALTER TABLE `thong_bao`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `don_hang_chi_tiet`
--
ALTER TABLE `don_hang_chi_tiet`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `hang_san_pham`
--
ALTER TABLE `hang_san_pham`
  MODIFY `hang_spID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `loai_san_pham`
--
ALTER TABLE `loai_san_pham`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `nhap_hang`
--
ALTER TABLE `nhap_hang`
  MODIFY `nhap_hangID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `thong_bao`
--
ALTER TABLE `thong_bao`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
