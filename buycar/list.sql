-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2019 年 06 月 10 日 09:28
-- 伺服器版本： 10.1.38-MariaDB
-- PHP 版本： 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `product`
--

-- --------------------------------------------------------

--
-- 資料表結構 `list`
--

CREATE TABLE `list` (
  `sno` varchar(5) NOT NULL,
  `pname` varchar(50) NOT NULL,
  `pcatalog` varchar(50) NOT NULL,
  `prize` int(50) NOT NULL,
  `quantity` int(100) NOT NULL,
  `description` text NOT NULL,
  `seller` varchar(50) NOT NULL,
  `image1` text NOT NULL,
  `image2` text NOT NULL,
  `image3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `list`
--

INSERT INTO `list` (`sno`, `pname`, `pcatalog`, `prize`, `quantity`, `description`, `seller`, `image1`, `image2`, `image3`) VALUES
('11111', '棒球外套', '服飾', 1000, 1, '修身', 'ACS106104', '97063.jpg', '', ''),
('22222', '床', '家具', 200000, 1, '多功能，有書櫃、杯架、藍牙音響、升降桌、密碼保險櫃、觸控夜燈、插座', 'ACS106104', 'bed.jpg', '', ''),
('33333', '二手絲襪', '其他', 2000, 1, '只穿過一次，九成新，找有緣人', 'ACS106120', 'socks.jpg', 'socks2.jpg', ''),
('44444', '魚缸', '其他', 500, 1, '家裡的魚死了，想尋找新的主人', 'ACS106120', 'fish.jpg', '', ''),
('55555', '跑車', '其他', 10000000, 1, '家裡車太多，割愛給有緣人', 'ACS106132', 'car.jpg', '', ''),
('66666', 'Shoe dog', '書籍', 300, 1, '搬新家，書籍九成新', 'ACS106132', 'shoedog1.jpg', 'shogdog2.jpg', ''),
('77777', '長版外套', '服飾', 2000, 2, '格紋設計感，不買可惜', 'ACS106132', '02-gettyimages-855264070-master-1514428742.jpg', '', '');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `list`
--
ALTER TABLE `list`
  ADD PRIMARY KEY (`sno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
