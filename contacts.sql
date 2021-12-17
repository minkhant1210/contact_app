-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2021 at 04:40 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `contacts`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(20) NOT NULL,
  `photo_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `photo_link`, `created_at`) VALUES
(1, 'Minkhant Zaw', 9954635000, 'store/61baa0c0cf30f_avatar4.jpg', '2021-12-16 01:31:19'),
(2, 'Lin Lin', 9979360443, 'store/61baa05b2a92d_avatar3.jpg', '2021-12-16 01:31:36'),
(4, 'Mei Lay', 9789532415, 'store/61baa06d3dcb9_avatar10.jpg', '2021-12-16 02:11:57'),
(5, 'Admin', 232323745, 'store/61baa07e46e08_avatar5.jpg', '2021-12-16 02:12:14'),
(6, 'Sayar Ko Htet', 925442014, 'store/61baa0a741ad1_avatar9.jpg', '2021-12-16 02:12:55'),
(7, 'Su Su', 9469824, 'store/61baa0f4bc6cf_avatar1.jpg', '2021-12-16 02:14:12'),
(8, 'Htet Thu', 94567758, 'store/61baa107b1159_avatar6.jpg', '2021-12-16 02:14:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
