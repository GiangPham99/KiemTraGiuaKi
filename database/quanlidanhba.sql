-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2021 at 10:54 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlidanhba`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id_admin` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `sdt` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id_admin`, `user_name`, `password`, `ten`, `sdt`) VALUES
(1, 'giang', '123', 'Phạm Trường Giang', '0321654654');

-- --------------------------------------------------------

--
-- Table structure for table `can_bo`
--

CREATE TABLE `can_bo` (
  `id_can_bo` int(11) NOT NULL,
  `id_phong_ban` int(11) DEFAULT NULL,
  `ten` varchar(50) DEFAULT NULL,
  `chuc_vu` varchar(50) DEFAULT NULL,
  `sdt_co_quan` varchar(10) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `sdt_di_dong` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `can_bo`
--

INSERT INTO `can_bo` (`id_can_bo`, `id_phong_ban`, `ten`, `chuc_vu`, `sdt_co_quan`, `email`, `sdt_di_dong`) VALUES
(12, 1, 'Đỗ Oanh Cường', 'Giáo Viên', '132154654', 'Quynh@tlu.vn', '03203265'),
(400000002, 1, 'a', 'đâsdas', '123123123', 'aa@tlu.com', '123123123');

-- --------------------------------------------------------

--
-- Table structure for table `don_vi`
--

CREATE TABLE `don_vi` (
  `id_don_vi` int(11) NOT NULL,
  `ten` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `don_vi`
--

INSERT INTO `don_vi` (`id_don_vi`, `ten`) VALUES
(1, 'khoa cntt');

-- --------------------------------------------------------

--
-- Table structure for table `phong_ban`
--

CREATE TABLE `phong_ban` (
  `id_phong_ban` int(11) NOT NULL,
  `id_don_vi` int(11) DEFAULT NULL,
  `ten_phong_ban` varchar(50) DEFAULT NULL,
  `dia_chi` varchar(50) DEFAULT NULL,
  `sdt` varchar(10) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `website` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `phong_ban`
--

INSERT INTO `phong_ban` (`id_phong_ban`, `id_don_vi`, `ten_phong_ban`, `dia_chi`, `sdt`, `email`, `website`) VALUES
(1, 1, 'ban quan tri', '175 tay son', '05277777', 'cntt@wru.vn', 'tlu.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `can_bo`
--
ALTER TABLE `can_bo`
  ADD PRIMARY KEY (`id_can_bo`),
  ADD KEY `id_phong_ban` (`id_phong_ban`);

--
-- Indexes for table `don_vi`
--
ALTER TABLE `don_vi`
  ADD PRIMARY KEY (`id_don_vi`);

--
-- Indexes for table `phong_ban`
--
ALTER TABLE `phong_ban`
  ADD PRIMARY KEY (`id_phong_ban`),
  ADD KEY `id_don_vi` (`id_don_vi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `can_bo`
--
ALTER TABLE `can_bo`
  MODIFY `id_can_bo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=400000003;

--
-- AUTO_INCREMENT for table `don_vi`
--
ALTER TABLE `don_vi`
  MODIFY `id_don_vi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `phong_ban`
--
ALTER TABLE `phong_ban`
  MODIFY `id_phong_ban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `can_bo`
--
ALTER TABLE `can_bo`
  ADD CONSTRAINT `can_bo_ibfk_1` FOREIGN KEY (`id_phong_ban`) REFERENCES `phong_ban` (`id_phong_ban`);

--
-- Constraints for table `phong_ban`
--
ALTER TABLE `phong_ban`
  ADD CONSTRAINT `phong_ban_ibfk_1` FOREIGN KEY (`id_don_vi`) REFERENCES `don_vi` (`id_don_vi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
