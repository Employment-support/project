-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2022-10-11 04:21:20
-- サーバのバージョン： 10.4.22-MariaDB
-- PHP のバージョン: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `support`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `abilities`
--

CREATE TABLE `abilities` (
  `id` int(11) NOT NULL,
  `ability` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `belongs`
--

CREATE TABLE `belongs` (
  `id` int(11) NOT NULL,
  `type` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `briefings`
--

CREATE TABLE `briefings` (
  `id` int(11) NOT NULL,
  `corporate` varchar(256) NOT NULL,
  `contents` longtext NOT NULL,
  `corporate_url` text NOT NULL,
  `info` longtext NOT NULL,
  `img_path` text NOT NULL,
  `corporation_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `delete_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `corporations`
--

CREATE TABLE `corporations` (
  `id` int(11) NOT NULL,
  `genre` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `department` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `file_path` text NOT NULL,
  `share_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `histories`
--

CREATE TABLE `histories` (
  `id` int(11) NOT NULL,
  `year` varchar(4) NOT NULL,
  `month` varchar(2) NOT NULL,
  `history` varchar(256) NOT NULL,
  `resume_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `majors`
--

CREATE TABLE `majors` (
  `id` int(11) NOT NULL,
  `major` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `contents` longtext NOT NULL,
  `item_url` text NOT NULL,
  `img_path` longtext NOT NULL,
  `top` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `update_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `delete_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `resumes`
--

CREATE TABLE `resumes` (
  `id` int(11) NOT NULL,
  `year` varchar(4) DEFAULT NULL,
  `month` varchar(2) DEFAULT NULL,
  `day` varchar(2) DEFAULT NULL,
  `postal_code` varchar(7) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `address_furigana` text DEFAULT NULL,
  `home_tel` varchar(11) DEFAULT NULL,
  `mobile_tel` varchar(11) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL,
  `address2` text DEFAULT NULL,
  `address2_furigana` text DEFAULT NULL,
  `tel` varchar(11) DEFAULT NULL,
  `station_line` varchar(256) DEFAULT NULL,
  `station` varchar(256) DEFAULT NULL,
  `img_path` text DEFAULT NULL,
  `hope` text DEFAULT NULL,
  `desire` longtext DEFAULT NULL,
  `pr` longtext DEFAULT NULL,
  `personality` longtext DEFAULT NULL,
  `hobby` longtext DEFAULT NULL,
  `other` mediumtext DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `update_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `delete_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- カラム追加 `resumes`
--

ALTER TABLE `resumes`
  ADD `os` text DEFAULT NULL,
  ADD `lang` text DEFAULT NULL,
  ADD `db` text DEFAULT NULL,
  ADD `office` text DEFAULT NULL,
  ADD `net` text DEFAULT NULL;

-- --------------------------------------------------------

--
-- テーブルの構造 `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `contents` mediumtext NOT NULL,
  `corporation_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `update_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `delete_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `shares`
--

CREATE TABLE `shares` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `contents` longtext NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `update_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `delete_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `skill_items`
--

CREATE TABLE `skill_items` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `skill_sortings_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `skill_items_resumes`
--

CREATE TABLE `skill_items_resumes` (
  `id` int(11) NOT NULL,
  `ability_id` int(11) NOT NULL,
  `resume_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `skill_sortings`
--

CREATE TABLE `skill_sortings` (
  `id` int(11) NOT NULL,
  `sorting_name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `update_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `delete_at` datetime DEFAULT NULL,
  `name` varchar(256) NOT NULL,
  `name_hiragana` varchar(256) NOT NULL,
  `gender` char(1) NOT NULL,
  `student_number` varchar(64) NOT NULL,
  `type_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `major_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `user_abilities`
--

CREATE TABLE `user_abilities` (
  `id` int(11) NOT NULL,
  `year` varchar(4) NOT NULL,
  `month` varchar(2) NOT NULL,
  `ability` varchar(256) NOT NULL,
  `item` varchar(256) NOT NULL,
  `resume_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `abilities`
--
ALTER TABLE `abilities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ability` (`ability`);

--
-- テーブルのインデックス `belongs`
--
ALTER TABLE `belongs`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `briefings`
--
ALTER TABLE `briefings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `corporation_id` (`corporation_id`),
  ADD KEY `user_id` (`user_id`);

--
-- テーブルのインデックス `corporations`
--
ALTER TABLE `corporations`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `department` (`department`);

--
-- テーブルのインデックス `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `share_id` (`share_id`);

--
-- テーブルのインデックス `histories`
--
ALTER TABLE `histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resume_id` (`resume_id`);

--
-- テーブルのインデックス `majors`
--
ALTER TABLE `majors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `major` (`major`);

--
-- テーブルのインデックス `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- テーブルのインデックス `resumes`
--
ALTER TABLE `resumes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- テーブルのインデックス `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `corporation_id` (`corporation_id`),
  ADD KEY `user_id` (`user_id`);

--
-- テーブルのインデックス `shares`
--
ALTER TABLE `shares`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- テーブルのインデックス `skill_items`
--
ALTER TABLE `skill_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `skill_sortings_id` (`skill_sortings_id`);

--
-- テーブルのインデックス `skill_items_resumes`
--
ALTER TABLE `skill_items_resumes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ability_id` (`ability_id`),
  ADD KEY `resume_id` (`resume_id`);

--
-- テーブルのインデックス `skill_sortings`
--
ALTER TABLE `skill_sortings`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `student_number` (`student_number`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `major_id` (`major_id`);

--
-- テーブルのインデックス `user_abilities`
--
ALTER TABLE `user_abilities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ability` (`ability`),
  ADD KEY `resume_id` (`resume_id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `abilities`
--
ALTER TABLE `abilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `belongs`
--
ALTER TABLE `belongs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `briefings`
--
ALTER TABLE `briefings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `corporations`
--
ALTER TABLE `corporations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `histories`
--
ALTER TABLE `histories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `resumes`
--
ALTER TABLE `resumes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `skill_items_resumes`
--
ALTER TABLE `skill_items_resumes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `user_abilities`
--
ALTER TABLE `user_abilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `user_abilities` DROP INDEX `ability`;

--
-- ダンプしたテーブルの制約
--

--
-- テーブルの制約 `briefings`
--
ALTER TABLE `briefings`
  ADD CONSTRAINT `briefings_ibfk_1` FOREIGN KEY (`corporation_id`) REFERENCES `corporations` (`id`),
  ADD CONSTRAINT `briefings_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- テーブルの制約 `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_ibfk_1` FOREIGN KEY (`share_id`) REFERENCES `shares` (`id`);

--
-- テーブルの制約 `histories`
--
ALTER TABLE `histories`
  ADD CONSTRAINT `histories_ibfk_1` FOREIGN KEY (`resume_id`) REFERENCES `resumes` (`id`);

--
-- テーブルの制約 `portfolio`
--
ALTER TABLE `portfolio`
  ADD CONSTRAINT `portfolio_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- テーブルの制約 `resumes`
--
ALTER TABLE `resumes`
  ADD CONSTRAINT `resumes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- テーブルの制約 `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`corporation_id`) REFERENCES `corporations` (`id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- テーブルの制約 `shares`
--
ALTER TABLE `shares`
  ADD CONSTRAINT `shares_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- テーブルの制約 `skill_items`
--
ALTER TABLE `skill_items`
  ADD CONSTRAINT `skill_items_ibfk_1` FOREIGN KEY (`skill_sortings_id`) REFERENCES `skill_sortings` (`id`);

--
-- テーブルの制約 `skill_items_resumes`
--
ALTER TABLE `skill_items_resumes`
  ADD CONSTRAINT `skill_items_resumes_ibfk_1` FOREIGN KEY (`ability_id`) REFERENCES `skill_items` (`id`),
  ADD CONSTRAINT `skill_items_resumes_ibfk_2` FOREIGN KEY (`resume_id`) REFERENCES `resumes` (`id`);

--
-- テーブルの制約 `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`type_id`) REFERENCES `belongs` (`id`),
  ADD CONSTRAINT `users_ibfk_4` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`),
  ADD CONSTRAINT `users_ibfk_5` FOREIGN KEY (`major_id`) REFERENCES `majors` (`id`);

--
-- テーブルの制約 `user_abilities`
--
ALTER TABLE `user_abilities`
  ADD CONSTRAINT `user_abilities_ibfk_1` FOREIGN KEY (`resume_id`) REFERENCES `resumes` (`id`);
COMMIT;

ALTER TABLE `shares` 
ADD `department_id` INT NOT NULL 
AFTER `user_id`, 
ADD `major_id` INT NOT NULL 
AFTER `department_id`;

ALTER TABLE `shares` 
ADD FOREIGN KEY (`department_id`) REFERENCES `departments`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT; 

ALTER TABLE `shares` 
ADD FOREIGN KEY (`major_id`) REFERENCES `majors`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

CREATE TABLE `careers` (
  `id` int(11) NOT NULL,
  `year` varchar(4) NOT NULL,
  `month` varchar(2) NOT NULL,
  `job` varchar(256) NOT NULL,
  `resume_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのインデックス `careers`
--
ALTER TABLE `careers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resume_id` (`resume_id`);

--
-- テーブルの AUTO_INCREMENT `careers`
--
ALTER TABLE `careers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- テーブルの制約 `careers`
--
ALTER TABLE `careers`
  ADD CONSTRAINT `careers_ibfk_1` FOREIGN KEY (`resume_id`) REFERENCES `resumes` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
