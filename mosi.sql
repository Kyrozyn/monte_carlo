-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2019 at 07:27 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mosi`
--
CREATE DATABASE IF NOT EXISTS `mosi` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mosi`;

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

DROP TABLE IF EXISTS `data`;
CREATE TABLE `data` (
  `no` int(11) NOT NULL,
  `data` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`no`, `data`) VALUES
(1, 0),
(2, 0),
(3, 0),
(4, 5),
(5, 1),
(6, 2),
(7, 1),
(8, 4),
(9, 4),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 3),
(17, 2),
(18, 5),
(19, 1),
(20, 1),
(21, 1),
(22, 6),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 7),
(29, 4),
(30, 2),
(31, 2),
(32, 1),
(33, 2),
(34, 1),
(35, 1),
(36, 5),
(37, 3),
(38, 2),
(39, 1),
(40, 1),
(41, 3),
(42, 4),
(43, 1),
(44, 2),
(45, 1),
(46, 7),
(47, 1),
(48, 1),
(49, 2),
(50, 4),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 5),
(57, 1),
(58, 1),
(59, 1),
(60, 3),
(61, 5),
(62, 0),
(63, 5),
(64, 7),
(65, 2),
(66, 3),
(67, 2),
(68, 1),
(69, 1),
(70, 2),
(71, 3),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 7),
(77, 1),
(78, 1),
(79, 2),
(80, 3),
(81, 2),
(82, 2),
(83, 2),
(84, 1),
(85, 2),
(86, 2),
(87, 1),
(88, 3),
(89, 2),
(90, 4),
(91, 5),
(92, 3),
(93, 3),
(94, 1),
(95, 1),
(96, 3),
(97, 1),
(98, 1),
(99, 2),
(100, 1),
(101, 2),
(102, 3),
(103, 8),
(104, 1),
(105, 1),
(106, 2),
(107, 1),
(108, 5),
(109, 1),
(110, 3),
(111, 1),
(112, 1),
(113, 8),
(114, 1),
(115, 1),
(116, 2),
(117, 1),
(118, 3),
(119, 1),
(120, 2),
(121, 1),
(122, 1),
(123, 1),
(124, 3),
(125, 9),
(126, 2),
(127, 1),
(128, 2),
(129, 1),
(130, 1),
(131, 1),
(132, 1),
(133, 1),
(134, 4),
(135, 2),
(136, 2),
(137, 1),
(138, 2),
(139, 2),
(140, 2),
(141, 1),
(142, 1),
(143, 2),
(144, 3),
(145, 2),
(146, 1),
(147, 1),
(148, 1),
(149, 1),
(150, 3),
(151, 5),
(152, 1),
(153, 0),
(154, 0),
(155, 0),
(156, 2),
(157, 1),
(158, 1),
(159, 3),
(160, 0),
(161, 0),
(162, 0),
(163, 0),
(164, 0),
(165, 2),
(166, 1),
(167, 1),
(168, 5),
(169, 3),
(170, 1),
(171, 1),
(172, 0),
(173, 1),
(174, 0),
(175, 1),
(176, 3),
(177, 0),
(178, 0),
(179, 4),
(180, 1),
(181, 0),
(182, 0),
(183, 2),
(184, 1),
(185, 0),
(186, 1),
(187, 2),
(188, 4),
(189, 1),
(190, 1),
(191, 1),
(192, 1),
(193, 2),
(194, 2),
(195, 4),
(196, 1),
(197, 3),
(198, 0),
(199, 0),
(200, 0),
(201, 2),
(202, 0),
(203, 1),
(204, 1),
(205, 1),
(206, 0),
(207, 0),
(208, 2),
(209, 3),
(210, 0),
(211, 0),
(212, 0),
(213, 0),
(214, 1),
(215, 1),
(216, 1),
(217, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
