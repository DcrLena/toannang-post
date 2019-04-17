-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 17, 2019 at 03:21 AM
-- Server version: 5.6.37
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
SET NAMES utf8mb4 ;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdshuuduc_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `yssik_city`
--

CREATE TABLE IF NOT EXISTS `yssik_city` (
  `ID` int(11) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Name` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Perfix` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Parent` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Link` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `yssik_city`
--

INSERT INTO `yssik_city` (`ID`, `Date`, `Name`, `Perfix`, `Parent`, `Link`, `Note`, `Type`) VALUES
(1, '2016-01-07 18:42:49', 'Hồ Chí Minh', '', '', 'ho-chi-minh', 'SG', 'city'),
(2, '2016-01-07 18:42:49', 'Hà Nội', '', '', 'ha-noi', 'HN', 'city'),
(3, '2016-01-07 18:42:49', 'Bình Dương', '', '', 'binh-duong', 'BD', 'city'),
(4, '2016-01-07 18:42:49', 'Đà Nẵng', '', '', 'da-nang', 'DDN', 'city'),
(5, '2016-01-07 18:42:49', 'Hải Phòng', '', '', 'hai-phong', 'HP', 'city'),
(6, '2016-01-07 18:42:49', 'Long An', '', '', 'long-an', 'LA', 'city'),
(7, '2016-01-07 18:42:49', 'Bà Rịa Vũng Tàu', '', '', 'ba-ria-vung-tau', 'VT', 'city'),
(8, '2016-01-07 18:42:49', 'An Giang', '', '', 'an-giang', 'AG', 'city'),
(9, '2016-01-07 18:42:49', 'Bắc Giang', '', '', 'bac-giang', 'BG', 'city'),
(10, '2016-01-07 18:42:49', 'Bắc Kạn', '', '', 'bac-kan', 'BK', 'city'),
(11, '2016-01-07 18:42:49', 'Bạc Liêu', '', '', 'bac-lieu', 'BL', 'city'),
(12, '2016-01-07 18:42:49', 'Bắc Ninh', '', '', 'bac-ninh', 'BN', 'city'),
(13, '2016-01-07 18:42:49', 'Bến Tre', '', '', 'ben-tre', 'BTR', 'city'),
(14, '2016-01-07 18:42:49', 'Bình Định', '', '', 'binh-dinh', 'BDD', 'city'),
(15, '2016-01-07 18:42:49', 'Bình Phước', '', '', 'binh-phuoc', 'BP', 'city'),
(16, '2016-01-07 18:42:49', 'Bình Thuận  ', '', '', 'binh-thuan', 'BTH', 'city'),
(17, '2016-01-07 18:42:49', 'Cà Mau', '', '', 'ca-mau', 'CM', 'city'),
(18, '2016-01-07 18:42:49', 'Cần Thơ', '', '', 'can-tho', 'CT', 'city'),
(19, '2016-01-07 18:42:49', 'Cao Bằng', '', '', 'cao-bang', 'CB', 'city'),
(20, '2016-01-07 18:42:49', 'Đắk Lắk', '', '', 'dak-lak', 'DDL', 'city'),
(21, '2016-01-07 18:42:49', 'Đắk Nông', '', '', 'dak-nong', 'DNO', 'city'),
(22, '2016-01-07 18:42:49', 'Điện Biên', '', '', 'dien-bien', 'DDB', 'city'),
(23, '2016-01-07 18:42:49', 'Đồng Nai', '', '', 'dong-nai', 'DNA', 'city'),
(24, '2016-01-07 18:42:49', 'Đồng Tháp', '', '', 'dong-thap', 'DDT', 'city'),
(25, '2016-01-07 18:42:49', 'Gia Lai', '', '', 'gia-lai', 'GL', 'city'),
(26, '2016-01-07 18:42:49', 'Hà Giang', '', '', 'ha-giang', 'HG', 'city'),
(27, '2016-01-07 18:42:49', 'Hà Nam', '', '', 'ha-nam', 'HNA', 'city'),
(28, '2016-01-07 18:42:49', 'Hà Tĩnh', '', '', 'ha-tinh', 'HT', 'city'),
(29, '2016-01-07 18:42:49', 'Hải Dương', '', '', 'hai-duong', 'HD', 'city'),
(30, '2016-01-07 18:42:49', 'Hậu Giang', '', '', 'hau-giang', 'HGI', 'city'),
(31, '2016-01-07 18:42:49', 'Hòa Bình', '', '', 'hoa-binh', 'HB', 'city'),
(32, '2016-01-07 18:42:49', 'Hưng Yên', '', '', 'hung-yen', 'HY', 'city'),
(33, '2016-01-07 18:42:49', 'Khánh Hòa', '', '', 'khanh-hoa', 'KH', 'city'),
(34, '2016-01-07 18:42:49', 'Kiên Giang', '', '', 'kien-giang', 'KG', 'city'),
(35, '2016-01-07 18:42:49', 'Kon Tum', '', '', 'kon-tum', 'KT', 'city'),
(36, '2016-01-07 18:42:49', 'Lai Châu', '', '', 'lai-chau', 'LCH', 'city'),
(37, '2016-01-07 18:42:49', 'Lâm Đồng', '', '', 'lam-dong', 'LDD', 'city'),
(38, '2016-01-07 18:42:49', 'Lạng Sơn', '', '', 'lang-son', 'LS', 'city'),
(39, '2016-01-07 18:42:49', 'Lào Cai', '', '', 'lao-cai', 'LCA', 'city'),
(40, '2016-01-07 18:42:49', 'Nam Định', '', '', 'nam-dinh', 'NDD', 'city'),
(41, '2016-01-07 18:42:49', 'Nghệ An', '', '', 'nghe-an', 'NA', 'city'),
(42, '2016-01-07 18:42:49', 'Ninh Bình', '', '', 'ninh-binh', 'NB', 'city'),
(43, '2016-01-07 18:42:49', 'Ninh Thuận', '', '', 'ninh-thuan', 'NT', 'city'),
(44, '2016-01-07 18:42:49', 'Phú Thọ', '', '', 'phu-tho', 'PT', 'city'),
(45, '2016-01-07 18:42:49', 'Phú Yên', '', '', 'phu-yen', 'PY', 'city'),
(46, '2016-01-07 18:42:49', 'Quảng Bình', '', '', 'quang-binh', 'QB', 'city'),
(47, '2016-01-07 18:42:49', 'Quảng Nam', '', '', 'quang-nam', 'QNA', 'city'),
(48, '2016-01-07 18:42:49', 'Quảng Ngãi', '', '', 'quang-ngai', 'QNG', 'city'),
(49, '2016-01-07 18:42:49', 'Quảng Ninh', '', '', 'quang-ninh', 'QNI', 'city'),
(50, '2016-01-07 18:42:49', 'Quảng Trị', '', '', 'quang-tri', 'QT', 'city'),
(51, '2016-01-07 18:42:49', 'Sóc Trăng', '', '', 'soc-trang', 'ST', 'city'),
(52, '2016-01-07 18:42:49', 'Sơn La', '', '', 'son-la', 'SL', 'city'),
(53, '2016-01-07 18:42:49', 'Tây Ninh', '', '', 'tay-ninh', 'TNI', 'city'),
(54, '2016-01-07 18:42:49', 'Thái Bình', '', '', 'thai-binh', 'TB', 'city'),
(55, '2016-01-07 18:42:49', 'Thái Nguyên', '', '', 'thai-nguyen', 'TN', 'city'),
(56, '2016-01-07 18:42:49', 'Thanh Hóa', '', '', 'thanh-hoa', 'TH', 'city'),
(57, '2016-01-07 18:42:49', 'Thừa Thiên Huế', '', '', 'thua-thien-hue', 'TTH', 'city'),
(58, '2016-01-07 18:42:49', 'Tiền Giang', '', '', 'tien-giang', 'TG', 'city'),
(59, '2016-01-07 18:42:49', 'Trà Vinh', '', '', 'tra-vinh', 'TV', 'city'),
(60, '2016-01-07 18:42:49', 'Tuyên Quang', '', '', 'tuyen-quang', 'TQ', 'city'),
(61, '2016-01-07 18:42:49', 'Vĩnh Long', '', '', 'vinh-long', 'VL', 'city'),
(62, '2016-01-07 18:42:49', 'Vĩnh Phúc', '', '', 'vinh-phuc', 'VP', 'city'),
(63, '2016-01-07 18:42:49', 'Yên Bái', '', '', 'yen-bai', 'YB', 'city'),
(1, '2016-01-07 18:42:49', 'Hồ Chí Minh', '', '', 'ho-chi-minh', 'SG', 'city'),
(2, '2016-01-07 18:42:49', 'Hà Nội', '', '', 'ha-noi', 'HN', 'city'),
(3, '2016-01-07 18:42:49', 'Bình Dương', '', '', 'binh-duong', 'BD', 'city'),
(4, '2016-01-07 18:42:49', 'Đà Nẵng', '', '', 'da-nang', 'DDN', 'city'),
(5, '2016-01-07 18:42:49', 'Hải Phòng', '', '', 'hai-phong', 'HP', 'city'),
(6, '2016-01-07 18:42:49', 'Long An', '', '', 'long-an', 'LA', 'city'),
(7, '2016-01-07 18:42:49', 'Bà Rịa Vũng Tàu', '', '', 'ba-ria-vung-tau', 'VT', 'city'),
(8, '2016-01-07 18:42:49', 'An Giang', '', '', 'an-giang', 'AG', 'city'),
(9, '2016-01-07 18:42:49', 'Bắc Giang', '', '', 'bac-giang', 'BG', 'city'),
(10, '2016-01-07 18:42:49', 'Bắc Kạn', '', '', 'bac-kan', 'BK', 'city'),
(11, '2016-01-07 18:42:49', 'Bạc Liêu', '', '', 'bac-lieu', 'BL', 'city'),
(12, '2016-01-07 18:42:49', 'Bắc Ninh', '', '', 'bac-ninh', 'BN', 'city'),
(13, '2016-01-07 18:42:49', 'Bến Tre', '', '', 'ben-tre', 'BTR', 'city'),
(14, '2016-01-07 18:42:49', 'Bình Định', '', '', 'binh-dinh', 'BDD', 'city'),
(15, '2016-01-07 18:42:49', 'Bình Phước', '', '', 'binh-phuoc', 'BP', 'city'),
(16, '2016-01-07 18:42:49', 'Bình Thuận  ', '', '', 'binh-thuan', 'BTH', 'city'),
(17, '2016-01-07 18:42:49', 'Cà Mau', '', '', 'ca-mau', 'CM', 'city'),
(18, '2016-01-07 18:42:49', 'Cần Thơ', '', '', 'can-tho', 'CT', 'city'),
(19, '2016-01-07 18:42:49', 'Cao Bằng', '', '', 'cao-bang', 'CB', 'city'),
(20, '2016-01-07 18:42:49', 'Đắk Lắk', '', '', 'dak-lak', 'DDL', 'city'),
(21, '2016-01-07 18:42:49', 'Đắk Nông', '', '', 'dak-nong', 'DNO', 'city'),
(22, '2016-01-07 18:42:49', 'Điện Biên', '', '', 'dien-bien', 'DDB', 'city'),
(23, '2016-01-07 18:42:49', 'Đồng Nai', '', '', 'dong-nai', 'DNA', 'city'),
(24, '2016-01-07 18:42:49', 'Đồng Tháp', '', '', 'dong-thap', 'DDT', 'city'),
(25, '2016-01-07 18:42:49', 'Gia Lai', '', '', 'gia-lai', 'GL', 'city'),
(26, '2016-01-07 18:42:49', 'Hà Giang', '', '', 'ha-giang', 'HG', 'city'),
(27, '2016-01-07 18:42:49', 'Hà Nam', '', '', 'ha-nam', 'HNA', 'city'),
(28, '2016-01-07 18:42:49', 'Hà Tĩnh', '', '', 'ha-tinh', 'HT', 'city'),
(29, '2016-01-07 18:42:49', 'Hải Dương', '', '', 'hai-duong', 'HD', 'city'),
(30, '2016-01-07 18:42:49', 'Hậu Giang', '', '', 'hau-giang', 'HGI', 'city'),
(31, '2016-01-07 18:42:49', 'Hòa Bình', '', '', 'hoa-binh', 'HB', 'city'),
(32, '2016-01-07 18:42:49', 'Hưng Yên', '', '', 'hung-yen', 'HY', 'city'),
(33, '2016-01-07 18:42:49', 'Khánh Hòa', '', '', 'khanh-hoa', 'KH', 'city'),
(34, '2016-01-07 18:42:49', 'Kiên Giang', '', '', 'kien-giang', 'KG', 'city'),
(35, '2016-01-07 18:42:49', 'Kon Tum', '', '', 'kon-tum', 'KT', 'city'),
(36, '2016-01-07 18:42:49', 'Lai Châu', '', '', 'lai-chau', 'LCH', 'city'),
(37, '2016-01-07 18:42:49', 'Lâm Đồng', '', '', 'lam-dong', 'LDD', 'city'),
(38, '2016-01-07 18:42:49', 'Lạng Sơn', '', '', 'lang-son', 'LS', 'city'),
(39, '2016-01-07 18:42:49', 'Lào Cai', '', '', 'lao-cai', 'LCA', 'city'),
(40, '2016-01-07 18:42:49', 'Nam Định', '', '', 'nam-dinh', 'NDD', 'city'),
(41, '2016-01-07 18:42:49', 'Nghệ An', '', '', 'nghe-an', 'NA', 'city'),
(42, '2016-01-07 18:42:49', 'Ninh Bình', '', '', 'ninh-binh', 'NB', 'city'),
(43, '2016-01-07 18:42:49', 'Ninh Thuận', '', '', 'ninh-thuan', 'NT', 'city'),
(44, '2016-01-07 18:42:49', 'Phú Thọ', '', '', 'phu-tho', 'PT', 'city'),
(45, '2016-01-07 18:42:49', 'Phú Yên', '', '', 'phu-yen', 'PY', 'city'),
(46, '2016-01-07 18:42:49', 'Quảng Bình', '', '', 'quang-binh', 'QB', 'city'),
(47, '2016-01-07 18:42:49', 'Quảng Nam', '', '', 'quang-nam', 'QNA', 'city'),
(48, '2016-01-07 18:42:49', 'Quảng Ngãi', '', '', 'quang-ngai', 'QNG', 'city'),
(49, '2016-01-07 18:42:49', 'Quảng Ninh', '', '', 'quang-ninh', 'QNI', 'city'),
(50, '2016-01-07 18:42:49', 'Quảng Trị', '', '', 'quang-tri', 'QT', 'city'),
(51, '2016-01-07 18:42:49', 'Sóc Trăng', '', '', 'soc-trang', 'ST', 'city'),
(52, '2016-01-07 18:42:49', 'Sơn La', '', '', 'son-la', 'SL', 'city'),
(53, '2016-01-07 18:42:49', 'Tây Ninh', '', '', 'tay-ninh', 'TNI', 'city'),
(54, '2016-01-07 18:42:49', 'Thái Bình', '', '', 'thai-binh', 'TB', 'city'),
(55, '2016-01-07 18:42:49', 'Thái Nguyên', '', '', 'thai-nguyen', 'TN', 'city'),
(56, '2016-01-07 18:42:49', 'Thanh Hóa', '', '', 'thanh-hoa', 'TH', 'city'),
(57, '2016-01-07 18:42:49', 'Thừa Thiên Huế', '', '', 'thua-thien-hue', 'TTH', 'city'),
(58, '2016-01-07 18:42:49', 'Tiền Giang', '', '', 'tien-giang', 'TG', 'city'),
(59, '2016-01-07 18:42:49', 'Trà Vinh', '', '', 'tra-vinh', 'TV', 'city'),
(60, '2016-01-07 18:42:49', 'Tuyên Quang', '', '', 'tuyen-quang', 'TQ', 'city'),
(61, '2016-01-07 18:42:49', 'Vĩnh Long', '', '', 'vinh-long', 'VL', 'city'),
(62, '2016-01-07 18:42:49', 'Vĩnh Phúc', '', '', 'vinh-phuc', 'VP', 'city'),
(63, '2016-01-07 18:42:49', 'Yên Bái', '', '', 'yen-bai', 'YB', 'city');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
