-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2022 at 05:05 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web22`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitietghengoi`
--

CREATE TABLE `chitietghengoi` (
  `IDsuatchieu` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IDghengoi` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tinhtrangghengoi` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chitietghengoi`
--

INSERT INTO `chitietghengoi` (`IDsuatchieu`, `IDghengoi`, `tinhtrangghengoi`) VALUES
('SC0001', 'G0301', 'trong'),
('SC0001', 'G0302', 'trong'),
('SC0001', 'G0303', 'trong'),
('SC0001', 'G0304', 'trong'),
('SC0001', 'G0305', 'trong'),
('SC0001', 'G0306', 'trong'),
('SC0001', 'G0307', 'trong'),
('SC0001', 'G0308', 'trong'),
('SC0001', 'G0309', 'trong'),
('SC0001', 'G0310', 'trong'),
('SC0001', 'G0311', 'trong'),
('SC0001', 'G0312', 'trong'),
('SC0001', 'G0313', 'trong'),
('SC0001', 'G0314', 'trong'),
('SC0001', 'G0315', 'daban'),
('SC0001', 'G0316', 'trong'),
('SC0001', 'G0317', 'trong'),
('SC0001', 'G0318', 'trong'),
('SC0001', 'G0319', 'trong'),
('SC0001', 'G0320', 'trong'),
('SC0001', 'G0321', 'trong'),
('SC0001', 'G0322', 'trong'),
('SC0001', 'G0323', 'trong'),
('SC0001', 'G0324', 'daban'),
('SC0001', 'G0325', 'trong'),
('SC0001', 'G0326', 'trong'),
('SC0001', 'G0327', 'trong'),
('SC0001', 'G0328', 'trong'),
('SC0001', 'G0329', 'trong'),
('SC0001', 'G0330', 'trong'),
('SC0001', 'G0331', 'trong'),
('SC0001', 'G0332', 'trong'),
('SC0001', 'G0333', 'trong'),
('SC0001', 'G0334', 'trong'),
('SC0001', 'G0335', 'trong'),
('SC0001', 'G0336', 'trong'),
('SC0001', 'G0337', 'trong'),
('SC0001', 'G0338', 'trong'),
('SC0001', 'G0339', 'trong'),
('SC0001', 'G0340', 'trong'),
('SC0001', 'G0341', 'trong'),
('SC0001', 'G0342', 'trong'),
('SC0001', 'G0343', 'trong'),
('SC0001', 'G0344', 'trong'),
('SC0001', 'G0345', 'trong'),
('SC0001', 'G0346', 'trong'),
('SC0001', 'G0347', 'trong'),
('SC0001', 'G0348', 'trong'),
('SC0001', 'G0349', 'trong'),
('SC0001', 'G0350', 'trong'),
('SC0002', 'G0401', 'daban'),
('SC0002', 'G0402', 'trong'),
('SC0002', 'G0403', 'trong'),
('SC0002', 'G0404', 'trong'),
('SC0002', 'G0405', 'trong'),
('SC0002', 'G0406', 'trong'),
('SC0002', 'G0407', 'trong'),
('SC0002', 'G0408', 'trong'),
('SC0002', 'G0409', 'trong'),
('SC0002', 'G0410', 'trong'),
('SC0002', 'G0411', 'trong'),
('SC0002', 'G0412', 'trong'),
('SC0002', 'G0413', 'trong'),
('SC0002', 'G0414', 'daban'),
('SC0002', 'G0415', 'trong'),
('SC0002', 'G0416', 'trong'),
('SC0002', 'G0417', 'trong'),
('SC0002', 'G0418', 'trong'),
('SC0002', 'G0419', 'trong'),
('SC0002', 'G0420', 'trong'),
('SC0002', 'G0421', 'trong'),
('SC0002', 'G0422', 'trong'),
('SC0002', 'G0423', 'trong'),
('SC0002', 'G0424', 'trong'),
('SC0002', 'G0425', 'trong'),
('SC0002', 'G0426', 'trong'),
('SC0002', 'G0427', 'trong'),
('SC0002', 'G0428', 'trong'),
('SC0002', 'G0429', 'trong'),
('SC0002', 'G0430', 'trong'),
('SC0002', 'G0431', 'trong'),
('SC0002', 'G0432', 'trong'),
('SC0002', 'G0433', 'trong'),
('SC0002', 'G0434', 'trong'),
('SC0002', 'G0435', 'trong'),
('SC0002', 'G0436', 'trong'),
('SC0002', 'G0437', 'trong'),
('SC0002', 'G0438', 'trong'),
('SC0002', 'G0439', 'trong'),
('SC0002', 'G0440', 'trong'),
('SC0002', 'G0441', 'trong'),
('SC0002', 'G0442', 'trong'),
('SC0002', 'G0443', 'trong'),
('SC0002', 'G0444', 'trong'),
('SC0002', 'G0445', 'trong'),
('SC0002', 'G0446', 'trong'),
('SC0002', 'G0447', 'trong'),
('SC0002', 'G0448', 'trong'),
('SC0002', 'G0449', 'trong'),
('SC0002', 'G0450', 'trong');

-- --------------------------------------------------------

--
-- Table structure for table `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `IDhoadon` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IDthucpham` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soluongthucpham` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`IDhoadon`, `IDthucpham`, `soluongthucpham`) VALUES
('HD0001', 'TP0001', 1),
('HD0001', 'TP0002', 0),
('HD0002', 'TP0001', 1),
('HD0002', 'TP0002', 0),
('HD0003', 'TP0001', 1),
('HD0003', 'TP0002', 0);

-- --------------------------------------------------------

--
-- Table structure for table `chitietquyen`
--

CREATE TABLE `chitietquyen` (
  `IDquyen` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IDchucnang` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chitietquyen`
--

INSERT INTO `chitietquyen` (`IDquyen`, `IDchucnang`) VALUES
('Q0001', 'CN0001'),
('Q0001', 'CN0002'),
('Q0001', 'CN0003'),
('Q0001', 'CN0004'),
('Q0001', 'CN0005'),
('Q0005', 'CN0001'),
('Q0005', 'CN0005'),
('Q0003', 'CN0003'),
('Q0006', 'CN0001'),
('Q0007', 'CN0001'),
('Q0007', 'CN0002'),
('Q0002', 'CN0001'),
('Q0002', 'CN0002'),
('Q0002', 'CN0003'),
('Q0002', 'CN0004'),
('Q0002', 'CN0005'),
('Q0008', 'CN0001'),
('Q0008', 'CN0002'),
('Q0008', 'CN0003');

-- --------------------------------------------------------

--
-- Table structure for table `chitiettheloai`
--

CREATE TABLE `chitiettheloai` (
  `IDphim` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IDtheloai` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chitiettheloai`
--

INSERT INTO `chitiettheloai` (`IDphim`, `IDtheloai`) VALUES
('P0001', 'TL0002'),
('P0001', 'TL0005'),
('P0002', 'TL0006'),
('P0002', 'TL0010'),
('P0003', 'TL0001'),
('P0003', 'TL0002'),
('P0003', 'TL0009'),
('P0003', 'TL0010'),
('P0004', 'TL0001'),
('P0004', 'TL0002'),
('P0004', 'TL0005'),
('P0004', 'TL0010'),
('P0005', 'TL0001'),
('P0005', 'TL0003'),
('P0005', 'TL0007'),
('P0005', 'TL0011'),
('P0006', 'TL0001'),
('P0006', 'TL0005'),
('P0006', 'TL0007'),
('P0006', 'TL0009'),
('P0007', 'TL0001'),
('P0007', 'TL0002'),
('P0007', 'TL0005'),
('P0008', 'TL0001'),
('P0008', 'TL0005'),
('P0008', 'TL0010'),
('P0009', 'TL0002'),
('P0009', 'TL0005'),
('P0010', 'TL0001'),
('P0010', 'TL0003'),
('P0010', 'TL0006'),
('P0010', 'TL0008'),
('P0010', 'TL0010'),
('P0010', 'TL0011');

-- --------------------------------------------------------

--
-- Table structure for table `chucnang`
--

CREATE TABLE `chucnang` (
  `IDchucnang` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenchucnang` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chucnang`
--

INSERT INTO `chucnang` (`IDchucnang`, `tenchucnang`) VALUES
('CN0001', 'Tài khoản'),
('CN0002', 'Phim'),
('CN0003', 'Suất chiếu'),
('CN0004', 'Hóa đơn'),
('CN0005', 'Thống kê');

-- --------------------------------------------------------

--
-- Table structure for table `ghengoi`
--

CREATE TABLE `ghengoi` (
  `IDghengoi` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IDphongchieu` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IDrapchieu` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soghe` int(8) NOT NULL,
  `dayghe` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ghengoi`
--

INSERT INTO `ghengoi` (`IDghengoi`, `IDphongchieu`, `IDrapchieu`, `soghe`, `dayghe`) VALUES
('G0001', 'PC0001', 'R0001', 1, 'A'),
('G0002', 'PC0001', 'R0001', 2, 'A'),
('G0003', 'PC0001', 'R0001', 3, 'A'),
('G0004', 'PC0001', 'R0001', 4, 'A'),
('G0005', 'PC0001', 'R0001', 5, 'A'),
('G0006', 'PC0001', 'R0001', 6, 'A'),
('G0007', 'PC0001', 'R0001', 7, 'A'),
('G0008', 'PC0001', 'R0001', 8, 'A'),
('G0009', 'PC0001', 'R0001', 9, 'A'),
('G0010', 'PC0001', 'R0001', 10, 'A'),
('G0011', 'PC0001', 'R0001', 11, 'B'),
('G0012', 'PC0001', 'R0001', 12, 'B'),
('G0013', 'PC0001', 'R0001', 13, 'B'),
('G0014', 'PC0001', 'R0001', 14, 'B'),
('G0015', 'PC0001', 'R0001', 15, 'B'),
('G0016', 'PC0001', 'R0001', 16, 'B'),
('G0017', 'PC0001', 'R0001', 17, 'B'),
('G0018', 'PC0001', 'R0001', 18, 'B'),
('G0019', 'PC0001', 'R0001', 19, 'B'),
('G0020', 'PC0001', 'R0001', 20, 'B'),
('G0021', 'PC0001', 'R0001', 21, 'C'),
('G0022', 'PC0001', 'R0001', 22, 'C'),
('G0023', 'PC0001', 'R0001', 23, 'C'),
('G0024', 'PC0001', 'R0001', 24, 'C'),
('G0025', 'PC0001', 'R0001', 25, 'C'),
('G0026', 'PC0001', 'R0001', 26, 'C'),
('G0027', 'PC0001', 'R0001', 27, 'C'),
('G0028', 'PC0001', 'R0001', 28, 'C'),
('G0029', 'PC0001', 'R0001', 29, 'C'),
('G0030', 'PC0001', 'R0001', 30, 'C'),
('G0031', 'PC0001', 'R0001', 31, 'D'),
('G0032', 'PC0001', 'R0001', 32, 'D'),
('G0033', 'PC0001', 'R0001', 33, 'D'),
('G0034', 'PC0001', 'R0001', 34, 'D'),
('G0035', 'PC0001', 'R0001', 35, 'D'),
('G0036', 'PC0001', 'R0001', 36, 'D'),
('G0037', 'PC0001', 'R0001', 37, 'D'),
('G0038', 'PC0001', 'R0001', 38, 'D'),
('G0039', 'PC0001', 'R0001', 39, 'D'),
('G0040', 'PC0001', 'R0001', 40, 'D'),
('G0041', 'PC0001', 'R0001', 41, 'E'),
('G0042', 'PC0001', 'R0001', 42, 'E'),
('G0043', 'PC0001', 'R0001', 43, 'E'),
('G0044', 'PC0001', 'R0001', 44, 'E'),
('G0045', 'PC0001', 'R0001', 45, 'E'),
('G0046', 'PC0001', 'R0001', 46, 'E'),
('G0047', 'PC0001', 'R0001', 47, 'E'),
('G0048', 'PC0001', 'R0001', 48, 'E'),
('G0049', 'PC0001', 'R0001', 49, 'E'),
('G0050', 'PC0001', 'R0001', 50, 'E'),
('G0051', 'PC0002', 'R0001', 1, 'A'),
('G0052', 'PC0002', 'R0001', 2, 'A'),
('G0053', 'PC0002', 'R0001', 3, 'A'),
('G0054', 'PC0002', 'R0001', 4, 'A'),
('G0055', 'PC0002', 'R0001', 5, 'A'),
('G0056', 'PC0002', 'R0001', 6, 'A'),
('G0057', 'PC0002', 'R0001', 7, 'A'),
('G0058', 'PC0002', 'R0001', 8, 'A'),
('G0059', 'PC0002', 'R0001', 9, 'A'),
('G0060', 'PC0002', 'R0001', 10, 'A'),
('G0061', 'PC0002', 'R0001', 11, 'B'),
('G0062', 'PC0002', 'R0001', 12, 'B'),
('G0063', 'PC0002', 'R0001', 13, 'B'),
('G0064', 'PC0002', 'R0001', 14, 'B'),
('G0065', 'PC0002', 'R0001', 15, 'B'),
('G0066', 'PC0002', 'R0001', 16, 'B'),
('G0067', 'PC0002', 'R0001', 17, 'B'),
('G0068', 'PC0002', 'R0001', 18, 'B'),
('G0069', 'PC0002', 'R0001', 19, 'B'),
('G0070', 'PC0002', 'R0001', 20, 'B'),
('G0071', 'PC0002', 'R0001', 21, 'C'),
('G0072', 'PC0002', 'R0001', 22, 'C'),
('G0073', 'PC0002', 'R0001', 23, 'C'),
('G0074', 'PC0002', 'R0001', 24, 'C'),
('G0075', 'PC0002', 'R0001', 25, 'C'),
('G0076', 'PC0002', 'R0001', 26, 'C'),
('G0077', 'PC0002', 'R0001', 27, 'C'),
('G0078', 'PC0002', 'R0001', 28, 'C'),
('G0079', 'PC0002', 'R0001', 29, 'C'),
('G0080', 'PC0002', 'R0001', 30, 'C'),
('G0081', 'PC0002', 'R0001', 31, 'D'),
('G0082', 'PC0002', 'R0001', 32, 'D'),
('G0083', 'PC0002', 'R0001', 33, 'D'),
('G0084', 'PC0002', 'R0001', 34, 'D'),
('G0085', 'PC0002', 'R0001', 35, 'D'),
('G0086', 'PC0002', 'R0001', 36, 'D'),
('G0087', 'PC0002', 'R0001', 37, 'D'),
('G0088', 'PC0002', 'R0001', 38, 'D'),
('G0089', 'PC0002', 'R0001', 39, 'D'),
('G0090', 'PC0002', 'R0001', 40, 'D'),
('G0091', 'PC0002', 'R0001', 41, 'E'),
('G0092', 'PC0002', 'R0001', 42, 'E'),
('G0093', 'PC0002', 'R0001', 43, 'E'),
('G0094', 'PC0002', 'R0001', 44, 'E'),
('G0095', 'PC0002', 'R0001', 45, 'E'),
('G0096', 'PC0002', 'R0001', 46, 'E'),
('G0097', 'PC0002', 'R0001', 47, 'E'),
('G0098', 'PC0002', 'R0001', 48, 'E'),
('G0099', 'PC0002', 'R0001', 49, 'E'),
('G0100', 'PC0002', 'R0001', 50, 'E'),
('G0101', 'PC0003', 'R0001', 1, 'A'),
('G0102', 'PC0003', 'R0001', 2, 'A'),
('G0103', 'PC0003', 'R0001', 3, 'A'),
('G0104', 'PC0003', 'R0001', 4, 'A'),
('G0105', 'PC0003', 'R0001', 5, 'A'),
('G0106', 'PC0003', 'R0001', 6, 'A'),
('G0107', 'PC0003', 'R0001', 7, 'A'),
('G0108', 'PC0003', 'R0001', 8, 'A'),
('G0109', 'PC0003', 'R0001', 9, 'A'),
('G0110', 'PC0003', 'R0001', 10, 'A'),
('G0111', 'PC0003', 'R0001', 11, 'B'),
('G0112', 'PC0003', 'R0001', 12, 'B'),
('G0113', 'PC0003', 'R0001', 13, 'B'),
('G0114', 'PC0003', 'R0001', 14, 'B'),
('G0115', 'PC0003', 'R0001', 15, 'B'),
('G0116', 'PC0003', 'R0001', 16, 'B'),
('G0117', 'PC0003', 'R0001', 17, 'B'),
('G0118', 'PC0003', 'R0001', 18, 'B'),
('G0119', 'PC0003', 'R0001', 19, 'B'),
('G0120', 'PC0003', 'R0001', 20, 'B'),
('G0121', 'PC0003', 'R0001', 21, 'C'),
('G0122', 'PC0003', 'R0001', 22, 'C'),
('G0123', 'PC0003', 'R0001', 23, 'C'),
('G0124', 'PC0003', 'R0001', 24, 'C'),
('G0125', 'PC0003', 'R0001', 25, 'C'),
('G0126', 'PC0003', 'R0001', 26, 'C'),
('G0127', 'PC0003', 'R0001', 27, 'C'),
('G0128', 'PC0003', 'R0001', 28, 'C'),
('G0129', 'PC0003', 'R0001', 29, 'C'),
('G0130', 'PC0003', 'R0001', 30, 'C'),
('G0131', 'PC0003', 'R0001', 31, 'D'),
('G0132', 'PC0003', 'R0001', 32, 'D'),
('G0133', 'PC0003', 'R0001', 33, 'D'),
('G0134', 'PC0003', 'R0001', 34, 'D'),
('G0135', 'PC0003', 'R0001', 35, 'D'),
('G0136', 'PC0003', 'R0001', 36, 'D'),
('G0137', 'PC0003', 'R0001', 37, 'D'),
('G0138', 'PC0003', 'R0001', 38, 'D'),
('G0139', 'PC0003', 'R0001', 39, 'D'),
('G0140', 'PC0003', 'R0001', 40, 'D'),
('G0141', 'PC0003', 'R0001', 41, 'E'),
('G0142', 'PC0003', 'R0001', 42, 'E'),
('G0143', 'PC0003', 'R0001', 43, 'E'),
('G0144', 'PC0003', 'R0001', 44, 'E'),
('G0145', 'PC0003', 'R0001', 45, 'E'),
('G0146', 'PC0003', 'R0001', 46, 'E'),
('G0147', 'PC0003', 'R0001', 47, 'E'),
('G0148', 'PC0003', 'R0001', 48, 'E'),
('G0149', 'PC0003', 'R0001', 49, 'E'),
('G0150', 'PC0003', 'R0001', 50, 'E'),
('G0151', 'PC0004', 'R0002', 1, 'A'),
('G0152', 'PC0004', 'R0002', 2, 'A'),
('G0153', 'PC0004', 'R0002', 3, 'A'),
('G0154', 'PC0004', 'R0002', 4, 'A'),
('G0155', 'PC0004', 'R0002', 5, 'A'),
('G0156', 'PC0004', 'R0002', 6, 'A'),
('G0157', 'PC0004', 'R0002', 7, 'A'),
('G0158', 'PC0004', 'R0002', 8, 'A'),
('G0159', 'PC0004', 'R0002', 9, 'A'),
('G0160', 'PC0004', 'R0002', 10, 'A'),
('G0161', 'PC0004', 'R0002', 11, 'B'),
('G0162', 'PC0004', 'R0002', 12, 'B'),
('G0163', 'PC0004', 'R0002', 13, 'B'),
('G0164', 'PC0004', 'R0002', 14, 'B'),
('G0165', 'PC0004', 'R0002', 15, 'B'),
('G0166', 'PC0004', 'R0002', 16, 'B'),
('G0167', 'PC0004', 'R0002', 17, 'B'),
('G0168', 'PC0004', 'R0002', 18, 'B'),
('G0169', 'PC0004', 'R0002', 19, 'B'),
('G0170', 'PC0004', 'R0002', 20, 'B'),
('G0171', 'PC0004', 'R0002', 21, 'C'),
('G0172', 'PC0004', 'R0002', 22, 'C'),
('G0173', 'PC0004', 'R0002', 23, 'C'),
('G0174', 'PC0004', 'R0002', 24, 'C'),
('G0175', 'PC0004', 'R0002', 25, 'C'),
('G0176', 'PC0004', 'R0002', 26, 'C'),
('G0177', 'PC0004', 'R0002', 27, 'C'),
('G0178', 'PC0004', 'R0002', 28, 'C'),
('G0179', 'PC0004', 'R0002', 29, 'C'),
('G0180', 'PC0004', 'R0002', 30, 'C'),
('G0181', 'PC0004', 'R0002', 31, 'D'),
('G0182', 'PC0004', 'R0002', 32, 'D'),
('G0183', 'PC0004', 'R0002', 33, 'D'),
('G0184', 'PC0004', 'R0002', 34, 'D'),
('G0185', 'PC0004', 'R0002', 35, 'D'),
('G0186', 'PC0004', 'R0002', 36, 'D'),
('G0187', 'PC0004', 'R0002', 37, 'D'),
('G0188', 'PC0004', 'R0002', 38, 'D'),
('G0189', 'PC0004', 'R0002', 39, 'D'),
('G0190', 'PC0004', 'R0002', 40, 'D'),
('G0191', 'PC0004', 'R0002', 41, 'E'),
('G0192', 'PC0004', 'R0002', 42, 'E'),
('G0193', 'PC0004', 'R0002', 43, 'E'),
('G0194', 'PC0004', 'R0002', 44, 'E'),
('G0195', 'PC0004', 'R0002', 45, 'E'),
('G0196', 'PC0004', 'R0002', 46, 'E'),
('G0197', 'PC0004', 'R0002', 47, 'E'),
('G0198', 'PC0004', 'R0002', 48, 'E'),
('G0199', 'PC0004', 'R0002', 49, 'E'),
('G0200', 'PC0004', 'R0002', 50, 'E'),
('G0201', 'PC0005', 'R0002', 1, 'A'),
('G0202', 'PC0005', 'R0002', 2, 'A'),
('G0203', 'PC0005', 'R0002', 3, 'A'),
('G0204', 'PC0005', 'R0002', 4, 'A'),
('G0205', 'PC0005', 'R0002', 5, 'A'),
('G0206', 'PC0005', 'R0002', 6, 'A'),
('G0207', 'PC0005', 'R0002', 7, 'A'),
('G0208', 'PC0005', 'R0002', 8, 'A'),
('G0209', 'PC0005', 'R0002', 9, 'A'),
('G0210', 'PC0005', 'R0002', 10, 'A'),
('G0211', 'PC0005', 'R0002', 11, 'B'),
('G0212', 'PC0005', 'R0002', 12, 'B'),
('G0213', 'PC0005', 'R0002', 13, 'B'),
('G0214', 'PC0005', 'R0002', 14, 'B'),
('G0215', 'PC0005', 'R0002', 15, 'B'),
('G0216', 'PC0005', 'R0002', 16, 'B'),
('G0217', 'PC0005', 'R0002', 17, 'B'),
('G0218', 'PC0005', 'R0002', 18, 'B'),
('G0219', 'PC0005', 'R0002', 19, 'B'),
('G0220', 'PC0005', 'R0002', 20, 'B'),
('G0221', 'PC0005', 'R0002', 21, 'C'),
('G0222', 'PC0005', 'R0002', 22, 'C'),
('G0223', 'PC0005', 'R0002', 23, 'C'),
('G0224', 'PC0005', 'R0002', 24, 'C'),
('G0225', 'PC0005', 'R0002', 25, 'C'),
('G0226', 'PC0005', 'R0002', 26, 'C'),
('G0227', 'PC0005', 'R0002', 27, 'C'),
('G0228', 'PC0005', 'R0002', 28, 'C'),
('G0229', 'PC0005', 'R0002', 29, 'C'),
('G0230', 'PC0005', 'R0002', 30, 'C'),
('G0231', 'PC0005', 'R0002', 31, 'D'),
('G0232', 'PC0005', 'R0002', 32, 'D'),
('G0233', 'PC0005', 'R0002', 33, 'D'),
('G0234', 'PC0005', 'R0002', 34, 'D'),
('G0235', 'PC0005', 'R0002', 35, 'D'),
('G0236', 'PC0005', 'R0002', 36, 'D'),
('G0237', 'PC0005', 'R0002', 37, 'D'),
('G0238', 'PC0005', 'R0002', 38, 'D'),
('G0239', 'PC0005', 'R0002', 39, 'D'),
('G0240', 'PC0005', 'R0002', 40, 'D'),
('G0241', 'PC0005', 'R0002', 41, 'E'),
('G0242', 'PC0005', 'R0002', 42, 'E'),
('G0243', 'PC0005', 'R0002', 43, 'E'),
('G0244', 'PC0005', 'R0002', 44, 'E'),
('G0245', 'PC0005', 'R0002', 45, 'E'),
('G0246', 'PC0005', 'R0002', 46, 'E'),
('G0247', 'PC0005', 'R0002', 47, 'E'),
('G0248', 'PC0005', 'R0002', 48, 'E'),
('G0249', 'PC0005', 'R0002', 49, 'E'),
('G0250', 'PC0005', 'R0002', 50, 'E'),
('G0251', 'PC0006', 'R0002', 1, 'A'),
('G0252', 'PC0006', 'R0002', 2, 'A'),
('G0253', 'PC0006', 'R0002', 3, 'A'),
('G0254', 'PC0006', 'R0002', 4, 'A'),
('G0255', 'PC0006', 'R0002', 5, 'A'),
('G0256', 'PC0006', 'R0002', 6, 'A'),
('G0257', 'PC0006', 'R0002', 7, 'A'),
('G0258', 'PC0006', 'R0002', 8, 'A'),
('G0259', 'PC0006', 'R0002', 9, 'A'),
('G0260', 'PC0006', 'R0002', 10, 'A'),
('G0261', 'PC0006', 'R0002', 11, 'B'),
('G0262', 'PC0006', 'R0002', 12, 'B'),
('G0263', 'PC0006', 'R0002', 13, 'B'),
('G0264', 'PC0006', 'R0002', 14, 'B'),
('G0265', 'PC0006', 'R0002', 15, 'B'),
('G0266', 'PC0006', 'R0002', 16, 'B'),
('G0267', 'PC0006', 'R0002', 17, 'B'),
('G0268', 'PC0006', 'R0002', 18, 'B'),
('G0269', 'PC0006', 'R0002', 19, 'B'),
('G0270', 'PC0006', 'R0002', 20, 'B'),
('G0271', 'PC0006', 'R0002', 21, 'C'),
('G0272', 'PC0006', 'R0002', 22, 'C'),
('G0273', 'PC0006', 'R0002', 23, 'C'),
('G0274', 'PC0006', 'R0002', 24, 'C'),
('G0275', 'PC0006', 'R0002', 25, 'C'),
('G0276', 'PC0006', 'R0002', 26, 'C'),
('G0277', 'PC0006', 'R0002', 27, 'C'),
('G0278', 'PC0006', 'R0002', 28, 'C'),
('G0279', 'PC0006', 'R0002', 29, 'C'),
('G0280', 'PC0006', 'R0002', 30, 'C'),
('G0281', 'PC0006', 'R0002', 31, 'D'),
('G0282', 'PC0006', 'R0002', 32, 'D'),
('G0283', 'PC0006', 'R0002', 33, 'D'),
('G0284', 'PC0006', 'R0002', 34, 'D'),
('G0285', 'PC0006', 'R0002', 35, 'D'),
('G0286', 'PC0006', 'R0002', 36, 'D'),
('G0287', 'PC0006', 'R0002', 37, 'D'),
('G0288', 'PC0006', 'R0002', 38, 'D'),
('G0289', 'PC0006', 'R0002', 39, 'D'),
('G0290', 'PC0006', 'R0002', 40, 'D'),
('G0291', 'PC0006', 'R0002', 41, 'E'),
('G0292', 'PC0006', 'R0002', 42, 'E'),
('G0293', 'PC0006', 'R0002', 43, 'E'),
('G0294', 'PC0006', 'R0002', 44, 'E'),
('G0295', 'PC0006', 'R0002', 45, 'E'),
('G0296', 'PC0006', 'R0002', 46, 'E'),
('G0297', 'PC0006', 'R0002', 47, 'E'),
('G0298', 'PC0006', 'R0002', 48, 'E'),
('G0299', 'PC0006', 'R0002', 49, 'E'),
('G0300', 'PC0006', 'R0002', 50, 'E'),
('G0301', 'PC0007', 'R0003', 1, 'A'),
('G0302', 'PC0007', 'R0003', 2, 'A'),
('G0303', 'PC0007', 'R0003', 3, 'A'),
('G0304', 'PC0007', 'R0003', 4, 'A'),
('G0305', 'PC0007', 'R0003', 5, 'A'),
('G0306', 'PC0007', 'R0003', 6, 'A'),
('G0307', 'PC0007', 'R0003', 7, 'A'),
('G0308', 'PC0007', 'R0003', 8, 'A'),
('G0309', 'PC0007', 'R0003', 9, 'A'),
('G0310', 'PC0007', 'R0003', 10, 'A'),
('G0311', 'PC0007', 'R0003', 11, 'B'),
('G0312', 'PC0007', 'R0003', 12, 'B'),
('G0313', 'PC0007', 'R0003', 13, 'B'),
('G0314', 'PC0007', 'R0003', 14, 'B'),
('G0315', 'PC0007', 'R0003', 15, 'B'),
('G0316', 'PC0007', 'R0003', 16, 'B'),
('G0317', 'PC0007', 'R0003', 17, 'B'),
('G0318', 'PC0007', 'R0003', 18, 'B'),
('G0319', 'PC0007', 'R0003', 19, 'B'),
('G0320', 'PC0007', 'R0003', 20, 'B'),
('G0321', 'PC0007', 'R0003', 21, 'C'),
('G0322', 'PC0007', 'R0003', 22, 'C'),
('G0323', 'PC0007', 'R0003', 23, 'C'),
('G0324', 'PC0007', 'R0003', 24, 'C'),
('G0325', 'PC0007', 'R0003', 25, 'C'),
('G0326', 'PC0007', 'R0003', 26, 'C'),
('G0327', 'PC0007', 'R0003', 27, 'C'),
('G0328', 'PC0007', 'R0003', 28, 'C'),
('G0329', 'PC0007', 'R0003', 29, 'C'),
('G0330', 'PC0007', 'R0003', 30, 'C'),
('G0331', 'PC0007', 'R0003', 31, 'D'),
('G0332', 'PC0007', 'R0003', 32, 'D'),
('G0333', 'PC0007', 'R0003', 33, 'D'),
('G0334', 'PC0007', 'R0003', 34, 'D'),
('G0335', 'PC0007', 'R0003', 35, 'D'),
('G0336', 'PC0007', 'R0003', 36, 'D'),
('G0337', 'PC0007', 'R0003', 37, 'D'),
('G0338', 'PC0007', 'R0003', 38, 'D'),
('G0339', 'PC0007', 'R0003', 39, 'D'),
('G0340', 'PC0007', 'R0003', 40, 'D'),
('G0341', 'PC0007', 'R0003', 41, 'E'),
('G0342', 'PC0007', 'R0003', 42, 'E'),
('G0343', 'PC0007', 'R0003', 43, 'E'),
('G0344', 'PC0007', 'R0003', 44, 'E'),
('G0345', 'PC0007', 'R0003', 45, 'E'),
('G0346', 'PC0007', 'R0003', 46, 'E'),
('G0347', 'PC0007', 'R0003', 47, 'E'),
('G0348', 'PC0007', 'R0003', 48, 'E'),
('G0349', 'PC0007', 'R0003', 49, 'E'),
('G0350', 'PC0007', 'R0003', 50, 'E'),
('G0351', 'PC0008', 'R0003', 1, 'A'),
('G0352', 'PC0008', 'R0003', 2, 'A'),
('G0353', 'PC0008', 'R0003', 3, 'A'),
('G0354', 'PC0008', 'R0003', 4, 'A'),
('G0355', 'PC0008', 'R0003', 5, 'A'),
('G0356', 'PC0008', 'R0003', 6, 'A'),
('G0357', 'PC0008', 'R0003', 7, 'A'),
('G0358', 'PC0008', 'R0003', 8, 'A'),
('G0359', 'PC0008', 'R0003', 9, 'A'),
('G0360', 'PC0008', 'R0003', 10, 'A'),
('G0361', 'PC0008', 'R0003', 11, 'B'),
('G0362', 'PC0008', 'R0003', 12, 'B'),
('G0363', 'PC0008', 'R0003', 13, 'B'),
('G0364', 'PC0008', 'R0003', 14, 'B'),
('G0365', 'PC0008', 'R0003', 15, 'B'),
('G0366', 'PC0008', 'R0003', 16, 'B'),
('G0367', 'PC0008', 'R0003', 17, 'B'),
('G0368', 'PC0008', 'R0003', 18, 'B'),
('G0369', 'PC0008', 'R0003', 19, 'B'),
('G0370', 'PC0008', 'R0003', 20, 'B'),
('G0371', 'PC0008', 'R0003', 21, 'C'),
('G0372', 'PC0008', 'R0003', 22, 'C'),
('G0373', 'PC0008', 'R0003', 23, 'C'),
('G0374', 'PC0008', 'R0003', 24, 'C'),
('G0375', 'PC0008', 'R0003', 25, 'C'),
('G0376', 'PC0008', 'R0003', 26, 'C'),
('G0377', 'PC0008', 'R0003', 27, 'C'),
('G0378', 'PC0008', 'R0003', 28, 'C'),
('G0379', 'PC0008', 'R0003', 29, 'C'),
('G0380', 'PC0008', 'R0003', 30, 'C'),
('G0381', 'PC0008', 'R0003', 31, 'D'),
('G0382', 'PC0008', 'R0003', 32, 'D'),
('G0383', 'PC0008', 'R0003', 33, 'D'),
('G0384', 'PC0008', 'R0003', 34, 'D'),
('G0385', 'PC0008', 'R0003', 35, 'D'),
('G0386', 'PC0008', 'R0003', 36, 'D'),
('G0387', 'PC0008', 'R0003', 37, 'D'),
('G0388', 'PC0008', 'R0003', 38, 'D'),
('G0389', 'PC0008', 'R0003', 39, 'D'),
('G0390', 'PC0008', 'R0003', 40, 'D'),
('G0391', 'PC0008', 'R0003', 41, 'E'),
('G0392', 'PC0008', 'R0003', 42, 'E'),
('G0393', 'PC0008', 'R0003', 43, 'E'),
('G0394', 'PC0008', 'R0003', 44, 'E'),
('G0395', 'PC0008', 'R0003', 45, 'E'),
('G0396', 'PC0008', 'R0003', 46, 'E'),
('G0397', 'PC0008', 'R0003', 47, 'E'),
('G0398', 'PC0008', 'R0003', 48, 'E'),
('G0399', 'PC0008', 'R0003', 49, 'E'),
('G0400', 'PC0008', 'R0003', 50, 'E'),
('G0401', 'PC0009', 'R0003', 1, 'A'),
('G0402', 'PC0009', 'R0003', 2, 'A'),
('G0403', 'PC0009', 'R0003', 3, 'A'),
('G0404', 'PC0009', 'R0003', 4, 'A'),
('G0405', 'PC0009', 'R0003', 5, 'A'),
('G0406', 'PC0009', 'R0003', 6, 'A'),
('G0407', 'PC0009', 'R0003', 7, 'A'),
('G0408', 'PC0009', 'R0003', 8, 'A'),
('G0409', 'PC0009', 'R0003', 9, 'A'),
('G0410', 'PC0009', 'R0003', 10, 'A'),
('G0411', 'PC0009', 'R0003', 11, 'B'),
('G0412', 'PC0009', 'R0003', 12, 'B'),
('G0413', 'PC0009', 'R0003', 13, 'B'),
('G0414', 'PC0009', 'R0003', 14, 'B'),
('G0415', 'PC0009', 'R0003', 15, 'B'),
('G0416', 'PC0009', 'R0003', 16, 'B'),
('G0417', 'PC0009', 'R0003', 17, 'B'),
('G0418', 'PC0009', 'R0003', 18, 'B'),
('G0419', 'PC0009', 'R0003', 19, 'B'),
('G0420', 'PC0009', 'R0003', 20, 'B'),
('G0421', 'PC0009', 'R0003', 21, 'C'),
('G0422', 'PC0009', 'R0003', 22, 'C'),
('G0423', 'PC0009', 'R0003', 23, 'C'),
('G0424', 'PC0009', 'R0003', 24, 'C'),
('G0425', 'PC0009', 'R0003', 25, 'C'),
('G0426', 'PC0009', 'R0003', 26, 'C'),
('G0427', 'PC0009', 'R0003', 27, 'C'),
('G0428', 'PC0009', 'R0003', 28, 'C'),
('G0429', 'PC0009', 'R0003', 29, 'C'),
('G0430', 'PC0009', 'R0003', 30, 'C'),
('G0431', 'PC0009', 'R0003', 31, 'D'),
('G0432', 'PC0009', 'R0003', 32, 'D'),
('G0433', 'PC0009', 'R0003', 33, 'D'),
('G0434', 'PC0009', 'R0003', 34, 'D'),
('G0435', 'PC0009', 'R0003', 35, 'D'),
('G0436', 'PC0009', 'R0003', 36, 'D'),
('G0437', 'PC0009', 'R0003', 37, 'D'),
('G0438', 'PC0009', 'R0003', 38, 'D'),
('G0439', 'PC0009', 'R0003', 39, 'D'),
('G0440', 'PC0009', 'R0003', 40, 'D'),
('G0441', 'PC0009', 'R0003', 41, 'E'),
('G0442', 'PC0009', 'R0003', 42, 'E'),
('G0443', 'PC0009', 'R0003', 43, 'E'),
('G0444', 'PC0009', 'R0003', 44, 'E'),
('G0445', 'PC0009', 'R0003', 45, 'E'),
('G0446', 'PC0009', 'R0003', 46, 'E'),
('G0447', 'PC0009', 'R0003', 47, 'E'),
('G0448', 'PC0009', 'R0003', 48, 'E'),
('G0449', 'PC0009', 'R0003', 49, 'E'),
('G0450', 'PC0009', 'R0003', 50, 'E');

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `IDhoadon` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IDkhachhang` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IDsuatchieu` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaylaphoadon` date NOT NULL,
  `tongtien` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`IDhoadon`, `IDkhachhang`, `IDsuatchieu`, `ngaylaphoadon`, `tongtien`) VALUES
('HD0001', 'KH0003', 'SC0001', '2022-04-21', 137000),
('HD0002', 'KH0006', 'SC0002', '2022-04-21', 112000),
('HD0003', 'KH0003', 'SC0002', '2022-04-21', 112000);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `IDkhachhang` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IDtaikhoan` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hoten` varchar(64) CHARACTER SET utf8 NOT NULL,
  `diachi` varchar(128) CHARACTER SET utf8 NOT NULL,
  `sodienthoai` int(10) NOT NULL,
  `ngaysinh` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`IDkhachhang`, `IDtaikhoan`, `hoten`, `diachi`, `sodienthoai`, `ngaysinh`) VALUES
('KH0001', 'TK0003', 'alo', 'àdfdfdsfd', 989878765, '1999-04-15'),
('KH0002', 'TK0009', 'ok', '208214/18 Tân Hòa Đông phường 13 quận 6', 933153743, '1985-06-23'),
('KH0003', 'TK0004', 'Thanh Truc', '208/18 Tân Hòa Đông phường 13 quận 6', 574242727, '2001-07-05'),
('KH0004', 'TK0008', 'MinhNhut', 'sdada/đasad', 933153743, '2001-10-10'),
('KH0005', 'TK0010', 'luanym123vip', 'sdada/đasad', 933153743, '2001-07-20'),
('KH0006', 'TK0005', 'koylazy1412', 'sdada/đasad', 933153743, '2000-03-12');

-- --------------------------------------------------------

--
-- Table structure for table `loaive`
--

CREATE TABLE `loaive` (
  `IDloaive` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenloaive` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loai` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `giave` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loaive`
--

INSERT INTO `loaive` (`IDloaive`, `tenloaive`, `loai`, `giave`) VALUES
('LV0001', '2D', '2D', 75000),
('LV0002', '3D', '3D', 110000),
('LV0003', 'sau 22h', '22:00:00', 50000),
('LV0004', 'ngày thứ 3', 'Tuesday', 50000);

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `IDnhanvien` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IDtaikhoan` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hoten` varchar(64) CHARACTER SET utf8 NOT NULL,
  `diachi` varchar(128) CHARACTER SET utf8 NOT NULL,
  `sodienthoai` int(10) NOT NULL,
  `ngaysinh` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`IDnhanvien`, `IDtaikhoan`, `hoten`, `diachi`, `sodienthoai`, `ngaysinh`) VALUES
('NV0001', 'TK0002', 'Toan', 'sdada/đasad', 933153743, '2001-06-16'),
('NV0002', 'TK0006', 'Nguyễn Hồng Tú', 'sdada/đasad', 933153743, '1999-12-16'),
('NV0003', 'TK0007', 'Hoàng Hà Vy', 'sdada/đasad', 933153743, '1998-08-15'),
('NV0004', 'TK0001', 'Trần Quang Minh', 'sdada/đasad', 933153743, '2001-09-05');

-- --------------------------------------------------------

--
-- Table structure for table `phim`
--

CREATE TABLE `phim` (
  `IDphim` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenphim` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `noidung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `thoiluong` int(10) NOT NULL,
  `ngaycongchieu` date NOT NULL,
  `daodien` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `dienvien` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `dinhdangphim` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `gioihantuoi` int(10) NOT NULL,
  `tinhtrang` varchar(32) CHARACTER SET utf8 NOT NULL,
  `hinhphim` varchar(129) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phim`
--

INSERT INTO `phim` (`IDphim`, `tenphim`, `noidung`, `thoiluong`, `ngaycongchieu`, `daodien`, `dienvien`, `dinhdangphim`, `gioihantuoi`, `tinhtrang`, `hinhphim`) VALUES
('P0001', 'THE FREE FALL: ÁC MỘNG', 'Sau khi cố gắng tự lấy mạng sống của mình, một phụ nữ trẻ phải vật lộn với một người chồng “kỳ lạ”. Phim mới Ác Mộng dự kiến khởi chiếu tại các rạp chiếu phim từ 08.04.2022.', 120, '2022-04-21', 'Adam Stilwell', 'Sam Rockwell, Awkwafina, Anthony Ramos, Marc Maron, etc', '2D', 18, 'dang', './public/images/P0001.jpg'),
('P0002', 'ĐÊM TỐI RỰC RỠ!', 'Trong đám tang của một gia đình, khi tất cả các thành viên có mặt đầy đủ thì cũng là lúc những bí mật của từng người được hé lộ. Mâu thuẫn xoay quanh chuyện vợ chồng, tranh chấp gia tài, nợ nần rồi sẽ được giải quyết ra sao? Phim mới Đêm Tối Rực Rỡ!, ra mắt tại rạp chiếu phim từ 08.04.2022.', 120, '2022-04-21', 'Duyên cute', 'Nhã Uyên, Kiến An, Phương Dung', '2D', 16, 'dang', './public/images/P0002.jpg'),
('P0003', 'MIDNIGHT: TIẾNG &#34;KÊU&#34; CỨU LÚC NỬA ĐÊM', 'Kyeong Mi là cô gái khiếm thính làm việc tại tổng đài hỗ trợ người khiếm thính. Một đêm đi làm về muộn, cô tình cờ chứng kiến So Jung Eun bị đâm dã man trên con đường vắng. Từ giây phút đó, Kyeong Mi trở thành mục tiêu mới của kẻ sát nhân hai mặt. Bị săn đuổi để bịt đầu mối. Kyeong Mi trở thành con mồi đáng thương. Giữa cô gái khiếm thính và tên sát nhân điên loạn, chuyến săn người sẽ kết thúc như thế nào? Sau thành công của Gojiam: Bệnh Viện Ma (2018), Wi Ha Joon tiếp tục khẳng định khả năng diễn xuất khi hóa thân thành &#34;kẻ săn người&#34; hai mặt săn đuổi con mồi. Phim mới Tiếng &#34;Kêu&#34; Cứu Lúc Nửa Đêm dự kiến ra mắt tại các rạp chiếu phim từ 15.04.2022.', 120, '2022-04-21', 'lsdkmfmg', 'Laura Dern, Sam Neill, Jeff Goldblum, Chris Pratt, Bryce Dallas Howard', '2D', 18, 'dang', './public/images/P0003.jpg'),
('P0004', 'PEE NAK 3: NGÔI ĐỀN KÌ QUÁI 3', 'Hội tạo nghiệp tụ tập nhau đến dự lễ xuất gia của Aod nhưng phải hoãn lại do lời nguyền từ chiếc lắc chân xuất hiện. Min Jun, Balloon, First phải chay đua với thời gian để tìm ra cách giải lời nguyền trước khi quỷ dữ đến lấy mạng Aod.', 120, '2022-04-21', 'Colin Trevorrow', 'Sandra Bullock, Channing Tatum, Daniel Radcliffe, Brad Pitt, etc.', '2D', 18, 'dang', './public/images/P0004.jpg'),
('P0005', 'JUJUTSU KAISEN 0: THE MOVIE CHÚ THUẬT HỒI CHIẾN', 'Nhân vật chính của Chú Thuật Hồi Chiến là Okkotsu Yuta - nam sinh trung học giành được quyền kiểm soát một Linh hồn bị nguyền rủa cực kỳ mạnh mẽ. Cậu được Jujutsu Sorcerers đăng ký vào trường trung học Jujutsu tỉnh Tokyo để kiểm soát sức mạnh của mình. Phim mới Jujutsu Kaisen 0 - Chú Thuật Hồi Chiến ra mắt tại các rạp chiếu phim từ 15.04.2022.', 140, '2022-04-15', 'Park Seong Ho', 'Uchiyama Koki, Nakamura Yuichi, Hanazawa Kana', '2D', 16, 'dang', './public/images/P0005.jpg'),
('P0006', 'Fantastic Beasts - The Secrets Of Dumbledore', 'Phần 2 Fantastic Beasts: The Crimes Of Grindelwald vẫn ăn khách nhưng doanh thu sút giảm hẳn so với phần 1 Fantastic Beasts And Where To Find Them. Fantastic Beasts 3 sẽ là phép thử quan trọng để nhà sản xuất quyết định tương lai loạt phim 5 phần này. Khi bạn thân cũ kiêm kẻ thù Grindelwald tuyên bố khai chiến với Muggle, phù thủy vĩ đại Albus Dumbledore phải nhờ Newt và bạn bè hỗ trợ chống lại.  Phim mới Fantastic Beasts: The Secrets Of Dumbledore dự kiến ra rạp chiếu phim từ 08.04.2022.', 140, '2022-04-08', 'Pierre Perifel', 'Laura Dern, Sam Neill, Jeff Goldblum, Chris Pratt, Bryce Dallas Howard', '2D', 16, 'dang', './public/images/P0006.jpg'),
('P0007', 'JURASSIC WORLD DOMINION: THẾ GIỚI KHỦNG LONG: LÃNH ĐỊA', 'Bốn năm sau kết thúc Jurassic World: Fallen Kingdom, những con khủng long đã thoát khỏi nơi giam cầm và tiến vào thế giới loài người. Giờ đây, chúng xuất hiện ở khắp mọi nơi. Sinh vật to lớn ấy không còn chỉ ở trên đảo như trước nữa mà gần ngay trước mắt, thậm chí còn có thể chạm tới. Owen Grady may mắn gặp lại cô khủng long mà anh và khán giả vô cùng yêu mến - Blue. Tuy nhiên, Blue không đi một mình mà còn đem theo một chú khủng long con khác. Điều này khiến Owen càng quyết tâm bảo vệ mẹ con cô được sinh sống an toàn. Thế nhưng, hai giống loài quá khác biệt. Liệu có thể tồn tại một kỷ nguyên mà khủng long và con người sống chung một cách hòa bình?', 160, '2022-06-10', 'Pierre Perifel', 'Sandra Bullock, Channing Tatum, Daniel Radcliffe, Brad Pitt, etc.', '2D', 16, 'sap', './public/images/P0007.jpg'),
('P0008', 'Doctor Strange In The Multiverse Of Madness?', 'Lỡ tay làm phép khiến đa vũ trụ nảy sinh vấn đề ở Spider-Man: No Way Home, Doctor Strange “trả nghiệp” thế nào trong Doctor Strange In The Multiverse Of Madness? Có thể nói, chưa bao giờ Stephen Strange phải đối mặt với nhiều mối nguy như hiện tại. “Scarlet Witch” Wanda Maximoff tẩy não cả thị trấn (WandaVision), Loki và Sylvie quậy tung Cơ quan quản lí phương sai thời gian (Loki) và đỉnh điểm là điều ước thay đổi quá nhiều lần của Spider-Man Peter Parker khiến mọi thứ vô cùng hỗn loạn. Cố gắng giải quyết vấn đề, Stephen Strange tìm đến Wanda, nhờ cô giúp đỡ. Tuy nhiên, nữ phù thủy vừa trải qua nỗi đau mất đi những người thân yêu cộng thêm tâm tính bất ổn có phải là cộng sự thích hợp? Wanda đáng thương sẽ thành phản diện ở phần này?', 160, '2022-05-06', 'Colin Trevorrow', 'Sam Rockwell, Awkwafina, Anthony Ramos, Marc Maron, etc', '2D', 16, 'sap', './public/images/P0008.jpg'),
('P0009', 'ĐẢO ĐỘC ĐẮC - TỬ MẪU THIÊN LINH CÁI', 'Phiên bản Next Level của thứ b.ùa ng.ãi tâm linh từng rúng động một thời tung teaser poster đầy mùi liêu trai, ma mị với hình ảnh nhân ngư đầy bí ẩn. Bên cạnh đó, dự án quy tụ nhiều gương mặt vừa lạ vừa quen: Trần Nghĩa, Trần Phong, Minh Dự, Phương Lan và đặc biệt là 2 bóng hồng visual Sam, Hoa hậu Tiểu Vy hứa hẹn thổi vào luồng gió mới cho món ăn hấp dẫn lần này. Đảo Độc Đắc - Tử Mẫu Thiên Linh Cái là phim kinh dị tâm linh bí ẩn và đen tối, diễn xuất của Sam trở thành yếu tố khiến người hâm mộ vô cùng trông đợi. Liệu trong vai diễn mới lần này, Sam có phá vỡ được hình tượng trong sáng, thánh thiện đã gắn liền với mình trong nhiều năm? Hay cô nàng sẽ mang đến những màn thể hiện quỷ dị và hắc ám khiến người hâm mộ phải “mắt chữ A, mồm chữ O” như thế nào, tất cả đều sẽ được giải đáp trong Đảo Độc Đắc - Tử Mẫu Thiên Linh Cái.', 140, '2022-06-16', 'Colin Trevorrow', 'Sandra Bullock, Channing Tatum, Daniel Radcliffe, Brad Pitt, etc.', '2D', 18, 'sap', './public/images/P0009.jpg'),
('P0010', 'THOR: LOVE AND THUNDER THOR: TÌNH YÊU VÀ SẤM SÉT', 'Sau khi kết thúc Avengers: Endgame, chàng Thần Sấm tạm biệt bạn bè và vùng New Asgard để theo chân đội Vệ binh dải Ngân Hà phiêu lưu khắp vũ trụ. Phim mới Thor: Tình Yêu Và Sấm Sét ra mắt tại các rạp chiếu phim từ 08.07.2022.', 120, '2022-07-08', 'Adam Stilwell', 'Laura Dern, Sam Neill, Jeff Goldblum, Chris Pratt, Bryce Dallas Howard', '2D', 16, 'sap', './public/images/P0010.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `phongchieu`
--

CREATE TABLE `phongchieu` (
  `IDphongchieu` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IDrapchieu` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenphongchieu` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soluongghengoi` int(10) NOT NULL,
  `tinhtrangphongchieu` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phongchieu`
--

INSERT INTO `phongchieu` (`IDphongchieu`, `IDrapchieu`, `tenphongchieu`, `soluongghengoi`, `tinhtrangphongchieu`) VALUES
('PC0001', 'R0001', 'Phòng chiếu 1', 50, 'trong'),
('PC0002', 'R0001', 'Phòng chiếu 2', 50, 'trong'),
('PC0003', 'R0001', 'Phòng chiếu 3', 50, 'trong'),
('PC0004', 'R0002', 'Phòng chiếu 1', 50, 'trong'),
('PC0005', 'R0002', 'Phòng chiếu 2', 50, 'trong'),
('PC0006', 'R0002', 'Phòng chiếu 3', 50, 'trong'),
('PC0007', 'R0003', 'Phòng chiếu 1', 50, 'trong'),
('PC0008', 'R0003', 'Phòng chiếu 2', 50, 'trong'),
('PC0009', 'R0003', 'Phòng chiếu 3', 50, 'trong');

-- --------------------------------------------------------

--
-- Table structure for table `quyen`
--

CREATE TABLE `quyen` (
  `IDquyen` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenquyen` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quyen`
--

INSERT INTO `quyen` (`IDquyen`, `tenquyen`) VALUES
('Q0001', 'admin'),
('Q0002', 'quanly'),
('Q0003', 'nhanvien'),
('Q0004', 'khachhang'),
('Q0005', 'abce'),
('Q0006', 'abccc'),
('Q0007', 'abcdef'),
('Q0008', 'avc');

-- --------------------------------------------------------

--
-- Table structure for table `rapchieu`
--

CREATE TABLE `rapchieu` (
  `IDrapchieu` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenrapchieu` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rapchieu`
--

INSERT INTO `rapchieu` (`IDrapchieu`, `tenrapchieu`) VALUES
('R0001', 'Galaxy Kinh Dương Vương'),
('R0002', 'Galaxy Nguyễn Du'),
('R0003', 'Galaxy Trung Chánh');

-- --------------------------------------------------------

--
-- Table structure for table `suatchieu`
--

CREATE TABLE `suatchieu` (
  `IDsuatchieu` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IDphim` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IDrapchieu` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IDphongchieu` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaychieu` date NOT NULL,
  `giobatdau` time NOT NULL,
  `gioketthuc` time NOT NULL,
  `tinhtrang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suatchieu`
--

INSERT INTO `suatchieu` (`IDsuatchieu`, `IDphim`, `IDrapchieu`, `IDphongchieu`, `ngaychieu`, `giobatdau`, `gioketthuc`, `tinhtrang`) VALUES
('SC0001', 'P0001', 'R0003', 'PC0007', '2022-04-21', '21:15:00', '23:45:00', 0),
('SC0002', 'P0001', 'R0003', 'PC0009', '2022-04-21', '22:00:00', '00:30:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `theloaiphim`
--

CREATE TABLE `theloaiphim` (
  `IDtheloai` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tentheloai` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `theloaiphim`
--

INSERT INTO `theloaiphim` (`IDtheloai`, `tentheloai`) VALUES
('TL0001', 'Hành động'),
('TL0002', 'Kinh dị'),
('TL0003', 'Hoạt Hình'),
('TL0004', 'Trinh thám'),
('TL0005', 'Khoa học viễn tưởng'),
('TL0006', 'Gia đình'),
('TL0007', 'Phiêu lưu'),
('TL0008', 'Hài'),
('TL0009', 'Tội phạm '),
('TL0010', 'Tâm lý'),
('TL0011', 'Tình cảm'),
('TL0012', 'Lãng mạn');

-- --------------------------------------------------------

--
-- Table structure for table `thucpham`
--

CREATE TABLE `thucpham` (
  `IDthucpham` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenthucpham` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `giathucpham` int(16) NOT NULL,
  `noidung` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinhanh` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `thucpham`
--

INSERT INTO `thucpham` (`IDthucpham`, `tenthucpham`, `giathucpham`, `noidung`, `hinhanh`) VALUES
('TP0001', 'iCombo 1 Big', 62000, '', './public/images/hinh1.jpg'),
('TP0002', 'iCombo 2 Big', 162000, '', './public/images/hinh2.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `IDtaikhoan` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IDquyen` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tinhtrangtaikhoan` int(8) NOT NULL,
  `ngaytaotaikhoan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`IDtaikhoan`, `IDquyen`, `email`, `password`, `tinhtrangtaikhoan`, `ngaytaotaikhoan`) VALUES
('TK0001', 'Q0003', 'nhanvien@gmail.com', '$2y$10$.EIIAvk9iN7Per8V5OzVN.Vumn5D9PWC748Fj.M8CWBoctel1i6Nq', 0, '2021-05-15'),
('TK0002', 'Q0001', 'koylazy@gmail.com', '$2y$10$pMv/WaUUd8t2ui.ASja7qOxFPiX.WsjRcOfy3CncTKCtLF9HXDMjy', 0, '2022-04-21'),
('TK0003', 'Q0004', 'alo@gmail.com', 'matkhau123', 2, '2022-04-21'),
('TK0004', 'Q0004', 'hoangnhan1996vn@gmail.com', '$2y$10$VGYmkoSXdlF2UVpZugtve.DqwiBNVroEY4hvVwPLg2B8AbrvIWWfe', 0, '2021-05-15'),
('TK0005', 'Q0004', 'Minh@gmail.com', '$2y$10$qjOJe0oMNHiOt7iAckL86ODDkcVNP2RwONP1qKoByQbjZ3J2u.Npa', 0, '2021-05-15'),
('TK0006', 'Q0003', 'Tu@gmail.com', '$2y$10$.EIIAvk9iN7Per8V5OzVN.Vumn5D9PWC748Fj.M8CWBoctel1i6Nq', 0, '2021-05-15'),
('TK0007', 'Q0003', 'Vy@gmail.com', '$2y$10$.EIIAvk9iN7Per8V5OzVN.Vumn5D9PWC748Fj.M8CWBoctel1i6Nq', 0, '2021-05-15'),
('TK0008', 'Q0004', 'MinhNhut@gmail.com', '$2y$10$qjOJe0oMNHiOt7iAckL86ODDkcVNP2RwONP1qKoByQbjZ3J2u.Npa', 0, '2021-05-15'),
('TK0009', 'Q0004', 'okt@gmail.com', '$2y$10$qjOJe0oMNHiOt7iAckL86ODDkcVNP2RwONP1qKoByQbjZ3J2u.Npa', 0, '2021-05-15'),
('TK0010', 'Q0004', 'luanym123vip@gmail.com', '$2y$10$qjOJe0oMNHiOt7iAckL86ODDkcVNP2RwONP1qKoByQbjZ3J2u.Npa', 0, '2021-05-15');

-- --------------------------------------------------------

--
-- Table structure for table `ve`
--

CREATE TABLE `ve` (
  `IDve` int(16) NOT NULL,
  `IDloaive` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IDhoadon` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IDsuatchieu` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IDkhachhang` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IDghengoi` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `giave` int(10) NOT NULL,
  `ngaybanve` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ve`
--

INSERT INTO `ve` (`IDve`, `IDloaive`, `IDhoadon`, `IDsuatchieu`, `IDkhachhang`, `IDghengoi`, `giave`, `ngaybanve`) VALUES
(224, 'LV0001', 'HD0001', 'SC0001', 'KH0003', 'G0315', 75000, '2022-04-21'),
(225, 'LV0003', 'HD0002', 'SC0002', 'KH0006', 'G0401', 50000, '2022-04-21'),
(226, 'LV0003', 'HD0003', 'SC0002', 'KH0003', 'G0414', 50000, '2022-04-21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitietghengoi`
--
ALTER TABLE `chitietghengoi`
  ADD KEY `IDghengoi` (`IDghengoi`),
  ADD KEY `IDsuatchieu` (`IDsuatchieu`);

--
-- Indexes for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD KEY `IDhoadon` (`IDhoadon`),
  ADD KEY `IDthucpham` (`IDthucpham`);

--
-- Indexes for table `chitietquyen`
--
ALTER TABLE `chitietquyen`
  ADD KEY `IDchucnang` (`IDchucnang`),
  ADD KEY `IDquyen` (`IDquyen`);

--
-- Indexes for table `chitiettheloai`
--
ALTER TABLE `chitiettheloai`
  ADD KEY `IDphim` (`IDphim`),
  ADD KEY `IDtheloai` (`IDtheloai`);

--
-- Indexes for table `chucnang`
--
ALTER TABLE `chucnang`
  ADD PRIMARY KEY (`IDchucnang`);

--
-- Indexes for table `ghengoi`
--
ALTER TABLE `ghengoi`
  ADD PRIMARY KEY (`IDghengoi`),
  ADD KEY `IDphongchieu` (`IDphongchieu`),
  ADD KEY `IDrapchieu` (`IDrapchieu`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`IDhoadon`),
  ADD KEY `IDkhachhang` (`IDkhachhang`),
  ADD KEY `IDsuatchieu` (`IDsuatchieu`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`IDkhachhang`),
  ADD KEY `IDtaikhoan` (`IDtaikhoan`);

--
-- Indexes for table `loaive`
--
ALTER TABLE `loaive`
  ADD PRIMARY KEY (`IDloaive`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`IDnhanvien`),
  ADD KEY `IDtaikhoan` (`IDtaikhoan`);

--
-- Indexes for table `phim`
--
ALTER TABLE `phim`
  ADD PRIMARY KEY (`IDphim`);

--
-- Indexes for table `phongchieu`
--
ALTER TABLE `phongchieu`
  ADD PRIMARY KEY (`IDphongchieu`),
  ADD KEY `IDrapchieu` (`IDrapchieu`);

--
-- Indexes for table `quyen`
--
ALTER TABLE `quyen`
  ADD PRIMARY KEY (`IDquyen`);

--
-- Indexes for table `rapchieu`
--
ALTER TABLE `rapchieu`
  ADD PRIMARY KEY (`IDrapchieu`);

--
-- Indexes for table `suatchieu`
--
ALTER TABLE `suatchieu`
  ADD PRIMARY KEY (`IDsuatchieu`),
  ADD KEY `IDphim` (`IDphim`),
  ADD KEY `IDrapchieu` (`IDrapchieu`),
  ADD KEY `IDphongchieu` (`IDphongchieu`);

--
-- Indexes for table `theloaiphim`
--
ALTER TABLE `theloaiphim`
  ADD PRIMARY KEY (`IDtheloai`);

--
-- Indexes for table `thucpham`
--
ALTER TABLE `thucpham`
  ADD PRIMARY KEY (`IDthucpham`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`IDtaikhoan`),
  ADD KEY `IDquyen` (`IDquyen`);

--
-- Indexes for table `ve`
--
ALTER TABLE `ve`
  ADD PRIMARY KEY (`IDve`),
  ADD KEY `IDloaive` (`IDloaive`),
  ADD KEY `IDsuatchieu` (`IDsuatchieu`),
  ADD KEY `IDkhachhang` (`IDkhachhang`),
  ADD KEY `IDghengoi` (`IDghengoi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ve`
--
ALTER TABLE `ve`
  MODIFY `IDve` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=227;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietghengoi`
--
ALTER TABLE `chitietghengoi`
  ADD CONSTRAINT `chitietghengoi_ibfk_1` FOREIGN KEY (`IDghengoi`) REFERENCES `ghengoi` (`IDghengoi`),
  ADD CONSTRAINT `chitietghengoi_ibfk_2` FOREIGN KEY (`IDsuatchieu`) REFERENCES `suatchieu` (`IDsuatchieu`);

--
-- Constraints for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `chitiethoadon_ibfk_1` FOREIGN KEY (`IDhoadon`) REFERENCES `hoadon` (`IDhoadon`),
  ADD CONSTRAINT `chitiethoadon_ibfk_2` FOREIGN KEY (`IDthucpham`) REFERENCES `thucpham` (`IDthucpham`);

--
-- Constraints for table `chitietquyen`
--
ALTER TABLE `chitietquyen`
  ADD CONSTRAINT `chitietquyen_ibfk_1` FOREIGN KEY (`IDchucnang`) REFERENCES `chucnang` (`IDchucnang`),
  ADD CONSTRAINT `chitietquyen_ibfk_2` FOREIGN KEY (`IDquyen`) REFERENCES `quyen` (`IDquyen`);

--
-- Constraints for table `chitiettheloai`
--
ALTER TABLE `chitiettheloai`
  ADD CONSTRAINT `chitiettheloai_ibfk_1` FOREIGN KEY (`IDphim`) REFERENCES `phim` (`IDphim`),
  ADD CONSTRAINT `chitiettheloai_ibfk_2` FOREIGN KEY (`IDtheloai`) REFERENCES `theloaiphim` (`IDtheloai`);

--
-- Constraints for table `ghengoi`
--
ALTER TABLE `ghengoi`
  ADD CONSTRAINT `ghengoi_ibfk_1` FOREIGN KEY (`IDphongchieu`) REFERENCES `phongchieu` (`IDphongchieu`),
  ADD CONSTRAINT `ghengoi_ibfk_2` FOREIGN KEY (`IDrapchieu`) REFERENCES `rapchieu` (`IDrapchieu`);

--
-- Constraints for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`IDkhachhang`) REFERENCES `khachhang` (`IDkhachhang`),
  ADD CONSTRAINT `hoadon_ibfk_2` FOREIGN KEY (`IDsuatchieu`) REFERENCES `suatchieu` (`IDsuatchieu`);

--
-- Constraints for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD CONSTRAINT `khachhang_ibfk_1` FOREIGN KEY (`IDtaikhoan`) REFERENCES `users` (`IDtaikhoan`);

--
-- Constraints for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `nhanvien_ibfk_1` FOREIGN KEY (`IDtaikhoan`) REFERENCES `users` (`IDtaikhoan`);

--
-- Constraints for table `phongchieu`
--
ALTER TABLE `phongchieu`
  ADD CONSTRAINT `phongchieu_ibfk_1` FOREIGN KEY (`IDrapchieu`) REFERENCES `rapchieu` (`IDrapchieu`);

--
-- Constraints for table `suatchieu`
--
ALTER TABLE `suatchieu`
  ADD CONSTRAINT `suatchieu_ibfk_1` FOREIGN KEY (`IDphim`) REFERENCES `phim` (`IDphim`),
  ADD CONSTRAINT `suatchieu_ibfk_2` FOREIGN KEY (`IDrapchieu`) REFERENCES `rapchieu` (`IDrapchieu`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`IDquyen`) REFERENCES `quyen` (`IDquyen`);

--
-- Constraints for table `ve`
--
ALTER TABLE `ve`
  ADD CONSTRAINT `ve_ibfk_1` FOREIGN KEY (`IDloaive`) REFERENCES `loaive` (`IDloaive`),
  ADD CONSTRAINT `ve_ibfk_2` FOREIGN KEY (`IDsuatchieu`) REFERENCES `suatchieu` (`IDsuatchieu`),
  ADD CONSTRAINT `ve_ibfk_3` FOREIGN KEY (`IDkhachhang`) REFERENCES `khachhang` (`IDkhachhang`),
  ADD CONSTRAINT `ve_ibfk_4` FOREIGN KEY (`IDghengoi`) REFERENCES `ghengoi` (`IDghengoi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
