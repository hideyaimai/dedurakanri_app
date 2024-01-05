-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2024 年 1 月 05 日 03:51
-- サーバのバージョン： 10.4.28-MariaDB
-- PHP のバージョン: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `dedura`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `site`
--

CREATE TABLE `site` (
  `id` int(11) NOT NULL,
  `siteName` text NOT NULL,
  `client` text NOT NULL,
  `startDate` date NOT NULL,
  `completionDate` date NOT NULL,
  `creationDate` datetime NOT NULL,
  `modificationDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `site`
--

INSERT INTO `site` (`id`, `siteName`, `client`, `startDate`, `completionDate`, `creationDate`, `modificationDate`) VALUES
(5, 'テスト', 'テスト', '2024-01-04', '2024-01-04', '2024-01-04 16:35:04', '2024-01-04 16:35:04'),
(6, 'test01', 'test02', '2024-01-01', '2024-01-09', '2024-01-04 16:46:34', '2024-01-04 16:46:34');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `site`
--
ALTER TABLE `site`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `site`
--
ALTER TABLE `site`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
