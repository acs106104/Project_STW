-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2019 年 05 月 20 日 16:41
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
-- 資料庫： `userdata`
--

-- --------------------------------------------------------

--
-- 資料表結構 `userdata`
--

CREATE TABLE `userdata` (
  `姓名` text NOT NULL,
  `暱稱` text NOT NULL,
  `手機號碼` int(10) NOT NULL,
  `電子信箱` text NOT NULL,
  `地址` text NOT NULL,
  `帳號` text NOT NULL,
  `密碼` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `userdata`
--

INSERT INTO `userdata` (`姓名`, `暱稱`, `手機號碼`, `電子信箱`, `地址`, `帳號`, `密碼`) VALUES
('林芊彤', '林婷婷', 975014755, 'ACS106132', '台中市西屯區奶奶家', 'ACS106132', '106132'),
('羅虹婷', 'Emily', 966733173, 'acs106104@gm.ntcu.edu.tw', '台中市大甲區虹婷家', 'ACS106104', '106104'),
('李沛蓉', '沛沛', 962002759, 'acs106120@gm.ntcu.edu.tw', '彰化市我家', 'ACS106120', '106120');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
