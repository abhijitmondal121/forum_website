-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2023 at 10:16 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sno` int(8) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `tstamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sno`, `user_email`, `user_pass`, `tstamp`) VALUES
(1, 'a@gmc', '123', '2021-05-09 00:44:33'),
(2, 'abhijit@gmail.com', '$2y$10$j8qFN4of4MTfaTGozVGyj.J0e97oTIaF3OsdNiIAQ1QuFbk6MdKYa', '2021-05-09 01:38:47'),
(3, 'good@gmail.com', '$2y$10$qLD7MV0SyOOdh5bGcWDPWOtkBDZICb.xcoklRNIvgukGqdcNAisSi', '2021-05-09 01:39:39'),
(4, 'ab@d', '$2y$10$9/xS7xeMRgvs4Yu5fgZ7mOLbZz2p8WNr9omdM0cn4koBrB2u.OBJG', '2021-05-09 01:43:33'),
(5, 'abc@gmail.com', '$2y$10$U1R.NvaM0aA6anxr9sIyzuR2zw2iKuW8Ip7gznqAehQwGmA3s2yXy', '2023-06-24 09:33:01'),
(6, 'abhijit121', '$2y$10$wAZmjSk/GqY1n3aCSJWRfOWlMKk2u1lOf7t/DGZtddZnvmHzh8gc6', '2023-06-24 19:36:25'),
(7, 'abc121', '$2y$10$vcvIxpamUTpMlCj/ed04U.z/BKgRmfvsfCy4yyh19LJwooeMkx/lG', '2023-07-02 09:50:55'),
(8, 'abc1', '$2y$10$Gb8sO8e4fgGD7TdKFkzlVO7KJAlD0RrtkMlwLd91CFFmt/CmDVeO2', '2023-07-03 10:33:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sno` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
