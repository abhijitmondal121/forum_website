-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2021 at 06:29 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `idiscuss`
--

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `slno` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`slno`, `email`, `name`, `address`, `number`, `date`) VALUES
(1, 'dark@gmail.com', 'dark', 'darkabc', '456372828726', '2021-05-07 22:37:28'),
(3, 'mondalavi9836@gmail.com', 'ABHIJIT MONDAL', 'Garia station kolkata', '9836404710', '2021-05-09 18:11:43'),
(4, 'mpiku733@gmail.com', 'ABHIJIT MONDAL', 'Garia station kolkata', '9836404710', '2021-05-09 18:14:41'),
(5, 'mpiku733@gmail.com', 'ABHIJIT MONDAL', 'Garia station kolkata', '9836404710', '2021-05-09 18:16:05'),
(6, 'mpiku733@gmail.com', 'ABHIJIT MONDAL', 'Garia station kolkata', '9836404710', '2021-05-09 18:16:47'),
(7, 'sahelimitra56@gmail.com', 'ABHIJIT MONDAL', 'Garia station kolkata', '45366743743', '2021-05-09 18:16:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`slno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
