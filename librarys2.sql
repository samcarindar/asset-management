-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2022 at 05:56 PM
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
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `b_id` int(11) NOT NULL,
  `b_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `c_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `price` int(11) NOT NULL,
  `book_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `book_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `c_id` int(11) NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `end_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `price` int(11) NOT NULL,
  `m_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`m_id`, `m_card_id`, `m_name`, `username`, `password`, `address`, `phone`, `status`) VALUES
(1, 2147483647, 'test', 'test', 'test', '555/555', '0918041511', 1),
(2, 4564156, 'sad', 'sss', 'sss', '156', '094561651', 0),
(3, 2147483647, 'ghsaf', 'ddd', 'ddd', '155416', '0984156415', 0),
(4, 632154, 'dsadsad', 'ppp', 'ppp', '1564415', '0890456165', 0),
(5, 2147483647, 'dsadsa', 'dsa', 'dsaa', '48596', '0984798456', 0),
(6, 2147483647, 'dsadsa', 'dsa', '', '48596', '0984798456', 0),
(7, 1546456, 'dsadsa', 'dsas', 'dsasd', '156', '0984156456', 0),
(8, 156156, 'dsadsa', 'dsadg', 'dsagf', '1566', '0984156156', 0),
(9, 152634, 'กหฟกหฟ', 'dsadsa', 'dsadsa', '156', '0915641564', 0),
(10, 152634, 'กหฟกหฟ', 'dsadsa', '', '156', '0915641564', 0),
(11, 1561685, 'dsadsad', 'dsg', 'fsa', '156', '0915644', 0),
(12, 545644156, 'fsdagds', 'dsadfsafg', 'dfcsagfas', 'd56156', '0941987514', 0),
(13, 2362310, 'fdsfgdshg', 'dsagsa', 'fsdaagds', 'fsadf41856', '09408954', 0),
(14, 2362310, 'fdsfgdshg', 'dsagsa', '', 'fsadf41856', '09408954', 0),
(15, 984688089, 'dsadsgsa', 'dsagsa', 'qqgdsg', '4156', '0984564165', 0),
(16, 48948596, 'jgfjihgi', 'dsafgasdg', 'fdgsgsd', 'asdsa', '098496854', 0),
(17, 2147483647, 'dsafgsadghds', 'dfsagf', 'gvdsgdsg', '4156', '09156465', 0),
(18, 2147483647, 'gfdhfdh', 'fdsagdf', 'gdfshrdfh', 'dsagdsds', '0984651165', 0),
(19, 454156465, 'gdshfdg', 'fsagds', 'hfdhjfdhr', '15263', '094156165', 0),
(20, 454156465, 'gdshfdg', 'fsagds', '', '15263', '094156165', 0),
(21, 454156465, 'gdshfdg', 'fsagds', '', '15263', '094156165', 0),
(22, 2147483647, 'dsadfsagfsa', 'fdsgdbs', 'fdsgsd', 'f1653', '0941564165', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`m_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
