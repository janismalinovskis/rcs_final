-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2021 at 05:57 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rcs_final`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `discription` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `discription`, `created_at`) VALUES
(187, 'janis_malinovskis@inbox.lv', 'klops', 'negribu rakstit', '2021-06-30 14:11:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `created_at`) VALUES
(14, 'janis_malinovskis@inbox.lv', '$2y$10$6oj8DAG6RC1ZGzg7jc1q5O8oo0Rk4VwktBjRS6ajiV6klyoM7d4By', '2021-06-20 11:25:16'),
(15, 'guiahsui@inbox.lv', '$2y$10$zY5LTX/WauxN9UqtxoKcqODdyWgCKFYd8RJQANd8VsJH0GRrPdJ.G', '2021-06-27 15:12:46'),
(16, 'set@gmail.com', '$2y$10$hn06sCOY00FY7694vDGoX.9sPz0uSkyHzYIyCrANZoMYxpzvEag8W', '2021-06-27 16:42:52'),
(17, 'janis@gmail.com', '$2y$10$3PVX.T.Z2xuOm7ZN3KxIP.VA4EZkZ/XXB5h2oMQCtpXdsZCu0snTa', '2021-06-27 16:44:37'),
(18, 'ppp@kk.lv', '$2y$10$DiYD6NKD5R9gTS2.VHyqUOdVbEwmaG8NoHQZlNru0OLfSPVAr8RgK', '2021-06-27 16:48:57'),
(19, 'hey@hey.lv', '$2y$10$C4UaAyegEUHLS8LKil9y.OnzQG6lkvQX6wr/760vqmvNxKx85OBGy', '2021-06-27 16:53:36'),
(20, 'klops@klops.lv', '$2y$10$ChydSs5uNnMuwFnhHRzIX.OX.GSx24zRwPZltv3Lcet4OYRTaPv.C', '2021-06-27 16:58:18'),
(22, 'enija@jkj.lv', '$2y$10$J28TLq7BWHNcKFanp6JD9OBZzNflf.7zLcH9VR8uGMM07sNZdboui', '2021-06-29 22:27:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
