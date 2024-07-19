-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 16, 2023 at 05:41 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `donation_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` int(10) NOT NULL,
  `blood_or_organ` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `blood_type` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `organ_type` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `donator_or_requester` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `con_privacy` int(11) NOT NULL DEFAULT '2',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `birthdate`, `email`, `mobile`, `blood_or_organ`, `blood_type`, `organ_type`, `city`, `donator_or_requester`, `con_privacy`) VALUES
(38, 'asd1', '2023-04-04', 'asd@ga.com', 444, 'organs', 'Organs', 'Heart', 'Riyadh', 'donator', 1),
(39, 'asd2', '2023-04-04', 'asd@ga.com', 444, 'organs', 'Organs', 'Liver', 'Riyadh', 'donator', 1),
(40, 'asdd', '2023-04-04', 'asd@ga.com', 444, 'organs', 'Organs', 'Heart', 'Bisha', 'donator', 1),
(41, 'dsa', '2023-05-23', 'user@gmail.com', 222, 'organs', 'Organs', 'Cornea', 'Abha', 'recipient', 1),
(42, 'we', '2023-05-02', 'user@gmail.com', 313, 'organs', 'Organs', 'Lung', 'Mecca', 'recipient', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
