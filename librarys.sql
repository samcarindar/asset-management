-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2022 at 03:49 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `librarys`
--

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `m_id` int(11) NOT NULL,
  `m_card_id` int(13) NOT NULL,
  `m_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`m_id`, `m_card_id`, `m_name`, `username`, `password`, `address`, `phone`) VALUES
(1, 2147483647, 'test', 'test', 'test', '555/555', '0918041511'),
(2, 4564156, 'sad', 'sss', 'sss', '156', '094561651'),
(3, 2147483647, 'ghsaf', 'ddd', 'ddd', '155416', '0984156415'),
(4, 632154, 'dsadsad', 'ppp', 'ppp', '1564415', '0890456165'),
(5, 2147483647, 'dsadsa', 'dsa', 'dsaa', '48596', '0984798456'),
(6, 2147483647, 'dsadsa', 'dsa', '', '48596', '0984798456'),
(7, 1546456, 'dsadsa', 'dsas', 'dsasd', '156', '0984156456'),
(8, 156156, 'dsadsa', 'dsadg', 'dsagf', '1566', '0984156156'),
(9, 152634, 'กหฟกหฟ', 'dsadsa', 'dsadsa', '156', '0915641564'),
(10, 152634, 'กหฟกหฟ', 'dsadsa', '', '156', '0915641564'),
(11, 1561685, 'dsadsad', 'dsg', 'fsa', '156', '0915644'),
(12, 545644156, 'fsdagds', 'dsadfsafg', 'dfcsagfas', 'd56156', '0941987514'),
(13, 2362310, 'fdsfgdshg', 'dsagsa', 'fsdaagds', 'fsadf41856', '09408954'),
(14, 2362310, 'fdsfgdshg', 'dsagsa', '', 'fsadf41856', '09408954'),
(15, 984688089, 'dsadsgsa', 'dsagsa', 'qqgdsg', '4156', '0984564165'),
(16, 48948596, 'jgfjihgi', 'dsafgasdg', 'fdgsgsd', 'asdsa', '098496854'),
(17, 2147483647, 'dsafgsadghds', 'dfsagf', 'gvdsgdsg', '4156', '09156465'),
(18, 2147483647, 'gfdhfdh', 'fdsagdf', 'gdfshrdfh', 'dsagdsds', '0984651165'),
(19, 454156465, 'gdshfdg', 'fsagds', 'hfdhjfdhr', '15263', '094156165'),
(20, 454156465, 'gdshfdg', 'fsagds', '', '15263', '094156165'),
(21, 454156465, 'gdshfdg', 'fsagds', '', '15263', '094156165');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`m_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
