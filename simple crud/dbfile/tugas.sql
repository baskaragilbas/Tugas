-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2018 at 08:49 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugas`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_review`
--

CREATE TABLE `user_review` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `rating` float NOT NULL,
  `review` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_review`
--

INSERT INTO `user_review` (`id`, `order_id`, `product_id`, `rating`, `review`, `created_at`, `updated_at`, `user_id`) VALUES
(3, 3, 3, 1.58, 'hbhh', '2018-03-22 14:55:27', '2018-03-22 16:49:39', 1),
(5, 1, 1, 4.15, 'assadadasd', '2018-03-22 14:56:15', '2018-03-23 03:50:46', 1),
(7, 1, 1, 4.9, 'asadsadsadsad', '2018-03-23 06:21:55', '2018-03-23 06:21:55', 1),
(8, 1, 1, 2.81, 'zzsasadasddasd', '2018-03-23 06:30:41', '2018-03-23 06:30:41', 1),
(9, 1, 1, 2.36, 'asdasdasdsad', '2018-03-23 06:38:16', '2018-03-23 06:38:16', 1),
(10, 1, 1, 1.15, 'ngantuk', '2018-03-23 06:44:15', '2018-03-23 06:44:15', 1);

--
-- Triggers `user_review`
--
DELIMITER $$
CREATE TRIGGER `constraint` BEFORE INSERT ON `user_review` FOR EACH ROW BEGIN
IF NEW.created_at= '0000-00-00 00:00:00' THEN
SET NEW.created_at = NOW();
END IF;
IF NEW.rating<=1.0 || NEW.rating>=5.0 THEN
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = "Rating Overflow";
END IF;

END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_review`
--
ALTER TABLE `user_review`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_review`
--
ALTER TABLE `user_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
