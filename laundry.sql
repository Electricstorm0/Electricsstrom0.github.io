-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2024 at 12:20 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Id_admin` int(5) NOT NULL,
  `Id_daisy` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Id_daisy` int(5) NOT NULL,
  `Id_cust` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_hp` bigint(20) NOT NULL,
  `jenis_layanan` varchar(25) NOT NULL,
  `message` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `daisy_laundry`
--

CREATE TABLE `daisy_laundry` (
  `Id_daisy` int(5) NOT NULL,
  `nama_toko` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(75) NOT NULL,
  `no_hp` int(20) NOT NULL,
  `link_fb` varchar(50) NOT NULL,
  `link_ig` varchar(50) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
INSERT INTO `daisy_laundry` (`Id_daisy`, `nama_toko`, `email`, `alamat`, `no_hp`, `link_fb`, `link_ig`, `create_at`, `update_at`) VALUES
(1, 'Daisy Laundry', 'daisy_laundry@email.com', 'jl. menteng atas', 812356789, 'http://facebook.com', 'http://Instagram.com', '2024-01-07 11:53:24', '2024-01-07 11:53:24');
--
-- Table structure for table `laundry`
--

CREATE TABLE `laundry` (
  `Id_laundry` int(5) NOT NULL,
  `Id_cust` int(5) NOT NULL,
  `Id_admin` int(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jenis_layanan` varchar(50) NOT NULL,
  `jumlah_item` int(5) NOT NULL,
  `berat` float NOT NULL,
  `harga` float NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id_admin`),
  ADD KEY `admin_fk0` (`Id_daisy`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Id_cust`),
  ADD KEY `customer_fk0` (`Id_daisy`);

--
-- Constraints for table `daisy_laundry`
--
ALTER TABLE `daisy_laundry`
  ADD PRIMARY KEY (`Id_daisy`);

--
-- Constraints for table `laundry`
--
ALTER TABLE `laundry`
  ADD PRIMARY KEY (`Id_laundry`),
  ADD KEY `Laundry_fk0` (`Id_cust`),
  ADD KEY `Laundry_fk1` (`Id_admin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Id_admin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Id_cust` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `daisy_laundry`
--
ALTER TABLE `daisy_laundry`
  MODIFY `Id_daisy` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `laundry`
--
ALTER TABLE `laundry`
  MODIFY `Id_laundry` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_fk0` FOREIGN KEY (`Id_daisy`) REFERENCES `daisy_laundry` (`Id_daisy`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_fk0` FOREIGN KEY (`Id_daisy`) REFERENCES `daisy_laundry` (`Id_daisy`);

--
-- Constraints for table `laundry`
--
ALTER TABLE `laundry`
  ADD CONSTRAINT `Laundry_fk0` FOREIGN KEY (`Id_cust`) REFERENCES `customer` (`Id_cust`),
  ADD CONSTRAINT `Laundry_fk1` FOREIGN KEY (`Id_admin`) REFERENCES `admin` (`Id_admin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
