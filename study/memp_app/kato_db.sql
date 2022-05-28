-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:8889
-- 生成日時: 2022 年 5 月 26 日 13:47
-- サーバのバージョン： 5.7.34
-- PHP のバージョン: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `kato_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `memo`
--

CREATE TABLE `memo` (
  `no` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `title` varchar(30) NOT NULL DEFAULT 'タイトルなし',
  `content` varchar(1000) NOT NULL,
  `user_id` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `memo`
--

INSERT INTO `memo` (`no`, `date`, `title`, `content`, `user_id`) VALUES
(14, '2022-05-26 13:46:25', '太郎のメモ', '太郎のメモテスト', 'testuser00'),
(15, '2022-05-26 13:46:25', '太郎のメモ２', '太郎のメモテスト', 'testuser00'),
(16, '2022-05-26 13:47:13', '花子のメモ', 'テストメモです。', 'testuser01'),
(17, '2022-05-26 13:47:13', '花子のメモ２', 'テストメモです。', 'testuser01');

-- --------------------------------------------------------

--
-- テーブルの構造 `user`
--

CREATE TABLE `user` (
  `user_id` varchar(16) NOT NULL,
  `password` varchar(16) NOT NULL,
  `name` varchar(30) NOT NULL,
  `sex` varchar(2) NOT NULL,
  `birthday` date NOT NULL,
  `hobby` varchar(20) NOT NULL,
  `introduce` varchar(200) NOT NULL DEFAULT 'なし'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `user`
--

INSERT INTO `user` (`user_id`, `password`, `name`, `sex`, `birthday`, `hobby`, `introduce`) VALUES
('testuser00', '00000000', 'テスト太郎', '男', '2022-05-26', 'テスト', 'テストです。テストです。'),
('testuser01', '00000000', 'テスト花子', '女', '2022-05-26', 'テスト', 'テストです。テストです。テストです。テストです。テストです。テストです。');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `memo`
--
ALTER TABLE `memo`
  ADD PRIMARY KEY (`no`),
  ADD KEY `user_id` (`user_id`);

--
-- テーブルのインデックス `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `memo`
--
ALTER TABLE `memo`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- ダンプしたテーブルの制約
--

--
-- テーブルの制約 `memo`
--
ALTER TABLE `memo`
  ADD CONSTRAINT `memo_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
