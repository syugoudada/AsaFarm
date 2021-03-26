-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2021-03-26 10:48:24
-- サーバのバージョン： 10.4.14-MariaDB
-- PHP のバージョン: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `asa_farm`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `categorys`
--

CREATE TABLE `categorys` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `categorys`
--

INSERT INTO `categorys` (`category_id`, `category_name`) VALUES
(1, 'Spring'),
(2, 'Summer'),
(3, 'Autumn'),
(4, 'Winter');

-- --------------------------------------------------------

--
-- テーブルの構造 `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_price` int(11) NOT NULL,
  `item_stocks` int(11) NOT NULL,
  `description` varchar(200) NOT NULL,
  `item_image` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `items`
--

INSERT INTO `items` (`item_id`, `item_name`, `item_price`, `item_stocks`, `description`, `item_image`, `user_id`, `category_id`, `created_date`, `updated_date`) VALUES
(1, 'トマト', 500, 974, 'AsaFarmで作られたトマトです。', 'item1.png', 1, 2, '2021-03-10 18:32:59', '2021-03-26 18:29:37'),
(2, 'ジャガイモ', 350, 270, '北海道産のじゃがいも。普段はポテトチップスに使われているよ。', 'item2.png', 1, 1, '2021-03-11 15:24:31', '2021-03-18 18:07:03'),
(3, 'キャベツ', 200, 9869, '有機栽培で作りました。体にやさしいキャベツです。', 'item3.png', 1, 1, '2021-03-12 18:49:32', '2021-03-24 18:35:27'),
(5, 'タマネギ', 398, 20000, '淡路島の家族が丹精込めて作ったタマネギです。', 'item5.png', 1, 1, '2021-03-16 16:35:47', '2021-03-24 18:35:41'),
(6, 'ブロッコリー', 200, 90, 'シチューやサラダ、カレーにも合います。', 'Group 11.png', 1, 4, '2021-03-16 16:43:22', '2021-03-19 16:18:56'),
(9, 'ナス', 250, 996, '野菜嫌いな子供たちのために作った最高の逸品です。', 'item4.png', 1, 2, '2021-03-18 18:05:18', '2021-03-18 18:05:53'),
(10, 'アスパラガス', 350, 97, '葉のように見えるものは実際は極端にほそく細かく分枝した茎。\r\n丹精込めて育てました。', 'Group 12.png', 1, 4, '2021-03-19 16:20:51', '2021-03-19 16:20:51'),
(11, 'ニンジン', 358, 490, 'カレー、煮物、にんじんしりしりにおすすめします。とても豊潤で甘くくせになる一品となりました。', 'Group 10.png', 1, 4, '2021-03-19 16:22:53', '2021-03-19 16:22:53'),
(12, 'パプリカ', 400, 194, '日本ではさぞかし有名となった野菜でした。今日の晩御飯はパプリカにきまり!パプリカ花が咲いたらー', 'Group 13.png', 1, 2, '2021-03-19 16:34:56', '2021-03-19 16:34:56'),
(13, 'ダイコン', 100, 200, '形が不揃いのため安く販売しています。在庫が少ないため早い者勝ちになります。', 'Group 14.png', 1, 4, '2021-03-19 16:36:38', '2021-03-19 16:36:38'),
(14, 'サツマイモ', 500, 287, 'とても甘いサツマイモです。ぜひご賞味あれ。', 'Group 15 (1).png', 1, 3, '2021-03-19 18:32:16', '2021-03-19 18:32:16'),
(15, 'レンコン', 350, 197, '煮物、レンコンチップスなどおいしい食べ方がたくさんあります。', 'Group 16.png', 1, 3, '2021-03-19 18:41:27', '2021-03-19 18:41:27');

-- --------------------------------------------------------

--
-- テーブルの構造 `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `buy_quantity` int(11) NOT NULL,
  `ordered_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `item_id`, `buy_quantity`, `ordered_date`) VALUES
(30, 2, 2, 1, '2021-03-26 15:20:03'),
(31, 1, 12, 4, '2021-03-26 15:25:30');

-- --------------------------------------------------------

--
-- テーブルの構造 `receipts`
--

CREATE TABLE `receipts` (
  `receipt_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `purchase_items` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`purchase_items`)),
  `receipts_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `receipts`
--

INSERT INTO `receipts` (`receipt_id`, `user_id`, `purchase_items`, `receipts_date`) VALUES
(2, 4, '[{\"item_id\":\"2\",\"buy_quantity\":\"10\"},{\"item_id\":\"3\",\"buy_quantity\":\"10\"}]', '2021-03-23 17:22:05'),
(3, 4, '[{\"item_id\":\"3\",\"buy_quantity\":\"10\"}]', '2021-03-23 18:20:14'),
(4, 4, '[{\"item_id\":\"3\",\"buy_quantity\":\"10\"}]', '2021-03-23 18:21:30'),
(5, 4, '[{\"item_id\":\"6\",\"buy_quantity\":\"4\"},{\"item_id\":\"5\",\"buy_quantity\":\"1\"}]', '2021-03-23 18:22:10'),
(6, 2, '[{\"item_id\":\"11\",\"buy_quantity\":\"10\"}]', '2021-03-23 18:40:50'),
(7, 4, '[{\"item_id\":\"12\",\"buy_quantity\":\"2\"}]', '2021-03-24 17:20:39'),
(8, 2, '[{\"item_id\":\"15\",\"buy_quantity\":\"3\"}]', '2021-03-24 18:04:33'),
(9, 4, '[{\"item_id\":\"6\",\"buy_quantity\":\"6\"},{\"item_id\":\"10\",\"buy_quantity\":\"3\"},{\"item_id\":\"9\",\"buy_quantity\":\"4\"}]', '2021-03-24 18:08:44'),
(10, 1, '[{\"item_id\":\"2\",\"buy_quantity\":\"9\"}]', '2021-03-24 18:10:17'),
(11, 4, '[{\"item_id\":\"3\",\"buy_quantity\":\"1\"}]', '2021-03-26 16:05:37'),
(12, 7, '[{\"item_id\":\"1\",\"buy_quantity\":\"4\"}]', '2021-03-26 18:28:20');

-- --------------------------------------------------------

--
-- テーブルの構造 `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `review_text` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `reviews`
--

INSERT INTO `reviews` (`review_id`, `review_text`, `user_id`, `item_id`, `created_date`, `updated_date`) VALUES
(1, 'おたけサイコチョー', 2, 1, '2021-03-17 18:27:02', '2021-03-17 18:27:02'),
(2, 'ジャガビー、ポテチ、あとじゃがりこ', 2, 2, '2021-03-17 18:29:08', '2021-03-17 18:29:08'),
(3, 'ジャガビー、ポテ', 2, 2, '2021-03-17 18:31:14', '2021-03-17 18:31:14'),
(4, '別に君を求めてないけど、君といられると思い出す、君のソラニン&チャコニン,もう毒素の一種なんだー！！', 2, 2, '2021-03-17 18:33:57', '2021-03-17 18:33:57'),
(5, 'こんなにおいしいトマトは食べたことがありません。', 4, 1, '2021-03-22 17:33:19', '2021-03-22 17:33:19'),
(6, '今日はフライドポテトとしていただきました。本当においしかったです', 4, 2, '2021-03-26 16:22:44', '2021-03-26 16:22:44'),
(7, 'This tomato is very tasty.', 1, 1, '2021-03-26 18:30:53', '2021-03-26 18:30:53');

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'U',
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `first_name`, `last_name`, `status`, `created_date`, `updated_date`) VALUES
(1, 'admin', '$2y$10$KR6SZqO7R5F1qe.Exu4fI.E5Df87uUEdHS6EDDkOYBJRny/cWDNvq', 'admin', 'admin', 'A', '2021-03-10 17:21:33', '2021-03-10 17:21:33'),
(2, 'test', '$2y$10$0vPGwiYY/WaGNxB4HAh.DuFb0QHLECgn1oDO.KqY5HyQs/iimibgW', 'test', 'test', 'U', '2021-03-10 18:22:02', '2021-03-10 18:22:02'),
(3, '', '$2y$10$DX0mShOxJayGy1Js8bN0DOsvpfblqfTHhGb7ajGFj0gzMY1bOOKve', '', '', 'U', '2021-03-15 16:24:58', '2021-03-15 16:24:58'),
(4, 'natu', '$2y$10$Bxf2hEcWiJBWbpj6FkVGL.QpHoZivqS.LxAmR6oqw3r/s47IEZ/86', 'Natu', 'Doragonil', 'U', '2021-03-17 16:15:23', '2021-03-17 16:15:23'),
(5, '', '$2y$10$hWJRNem1FDO.gW3kh3eD4OpIIkBdtar0wULpDNAca3AtgqZv2Tj1K', '', '', 'U', '2021-03-18 18:36:48', '2021-03-18 18:36:48'),
(6, 'asa', '$2y$10$.MzDsa3X.rYyIOLC/Hgl..gSiONgQ/SRFnx8fpnWWyeOyLoPAoG36', 'to', 'as', 'U', '2021-03-26 18:06:45', '2021-03-26 18:06:45'),
(7, 'mac', '$2y$10$vH9bdKjYPX/5WyInJrLko.sGIVJ39s9RRIBNhcFRFdW0pHC78t6xm', 'mac', 'get', 'U', '2021-03-26 18:27:37', '2021-03-26 18:27:37');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`category_id`);

--
-- テーブルのインデックス `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- テーブルのインデックス `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- テーブルのインデックス `receipts`
--
ALTER TABLE `receipts`
  ADD PRIMARY KEY (`receipt_id`);

--
-- テーブルのインデックス `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`);

--
-- テーブルのインデックス `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `categorys`
--
ALTER TABLE `categorys`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- テーブルのAUTO_INCREMENT `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- テーブルのAUTO_INCREMENT `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- テーブルのAUTO_INCREMENT `receipts`
--
ALTER TABLE `receipts`
  MODIFY `receipt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- テーブルのAUTO_INCREMENT `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- テーブルのAUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
