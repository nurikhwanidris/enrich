-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2020 at 10:55 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `enrich`
--

-- --------------------------------------------------------

--
-- Table structure for table `pv`
--

CREATE TABLE `pv` (
  `id` int(11) NOT NULL,
  `SerialNum` varchar(100) NOT NULL,
  `ReferenceNum` varchar(100) NOT NULL,
  `PaymentOption` varchar(100) NOT NULL,
  `OnlinePayTo` varchar(100) NOT NULL,
  `PayTo` varchar(100) NOT NULL,
  `BankName` varchar(100) DEFAULT NULL,
  `ChequePayTo` varchar(100) NOT NULL,
  `ChequeBank` varchar(100) NOT NULL,
  `ChequeAccount` varchar(100) NOT NULL,
  `CashPayTo` varchar(100) DEFAULT NULL,
  `CashIC` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pv`
--

INSERT INTO `pv` (`id`, `SerialNum`, `ReferenceNum`, `PaymentOption`, `OnlinePayTo`, `PayTo`, `BankName`, `ChequePayTo`, `ChequeBank`, `ChequeAccount`, `CashPayTo`, `CashIC`) VALUES
(1, 'PV20201008-0000', 'Ubah Ni/Oct', 'Cash', '', '', '', '', '', '', '', '123123123'),
(2, 'PV20201008-0000', 'Ubah Ni/Oct', 'Cash', '', '', '', '', '', '', '', '123123123'),
(3, 'PV20201008-0002', 'Ubah Ni/Oct', 'Cash', '', '', '', '', '', '', '', '123123123'),
(4, 'PV20201008-0003', 'Ubah Ni/Oct', 'Cash', '', '', '', '', '', '', '', '123123'),
(5, 'PV20201008-0003', 'Ubah Ni/Oct', 'Cash', '', '', '', '', '', '', '', '123123'),
(6, 'PV20201008-0003', 'Ubah Ni/Oct', 'Cash', '', '', '', '', '', '', '', '123123'),
(7, 'PV20201008-0007', 'Ubah Ni/Oct', 'Cheque', '', '', '', '', '', '', '1234567890', ''),
(8, 'PV20201008-0007', 'Ubah Ni/Oct', 'Cheque', '', '', '', '', '', '', '1234567890', ''),
(9, 'PV20201008-0007', 'Ubah Ni/Oct', 'Cheque', '', '', '', '', '', '', '1234567890', ''),
(10, 'PV20201008-0010', 'Ubah Ni/Oct', 'Cash', '', '', '', '', '', '', '', '123123123'),
(11, 'PV20201008-0011', 'Ubah Ni/Oct', 'Cash', '', '', '', '', '', '', '', '123123123'),
(12, 'PV20201008-0012', 'Ubah Ni/Oct', 'Cash', '', '', '', '', '', '', '', '123123123'),
(13, 'PV20201008-0013', 'Ubah Ni/Oct', 'Cash', '', '', '', '', '', '', '', '123123123'),
(14, 'PV20201008-0014', 'Ubah Ni/Oct', 'Cheque', '', '', '', '', '', '', '1234567890', ''),
(15, 'PV20201008-0015', 'Ubah Ni/Oct', 'Cash', '', '', '', '', '', '', '', '123123123'),
(16, 'PV20201008-0016', 'Ubah Ni/Oct', 'Cash', '', '', '', '', '', '', '', '123123123'),
(17, 'PV20201008-0017', 'Ubah Ni/Oct', 'Cash', '', '', '', '', '', '', '', '123123'),
(18, 'PV20201008-0018', 'Ubah Ni/Oct', 'Cash', '', '', '', '', '', '', '', '123123123'),
(19, 'PV20201008-0019', 'Ubah Ni/Oct', 'Cheque', '', '', '', '', '', '', '123123', ''),
(20, 'PV20201008-0020', 'Ubah Ni/Oct', 'Cash', '', '', '', '', '', '', '', '123123123'),
(21, 'PV20201008-0021', 'Ubah Ni/Oct', 'Cheque', '', '', 'CIMB BANK', '', '', '', '', ''),
(22, 'PV20201008-0022', 'Ubah Ni/Oct', 'Cheque', '', '', '', 'Haru', 'HSBC', '123123123', '', ''),
(23, 'PV20201008-0023', 'Ubah Ni/Oct', 'Cheque', '', '', '', 'Hari', 'HSBC BANK', '123123', '', ''),
(24, 'PV20201008-0024', 'Ubah Ni/Oct', 'Online Transfer', 'Online Transfer', '', 'HSBC Online', '', '', '', '', ''),
(25, 'PV20201008-0025', 'Ubah Ni/Oct', 'Cash', '', '', '', '', '', '', 'Cash Something', '9201516025367');

-- --------------------------------------------------------

--
-- Table structure for table `pv_items`
--

CREATE TABLE `pv_items` (
  `id` int(11) NOT NULL,
  `pv_id` varchar(100) NOT NULL,
  `Item1Desc` text DEFAULT NULL,
  `Item1Total` int(10) DEFAULT NULL,
  `Item2Desc` text DEFAULT NULL,
  `Item2Total` int(10) DEFAULT NULL,
  `Item3Desc` text DEFAULT NULL,
  `Item3Total` int(11) DEFAULT NULL,
  `Item4Desc` text DEFAULT NULL,
  `Item4Total` int(10) DEFAULT NULL,
  `GrandTotal` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pv_items`
--

INSERT INTO `pv_items` (`id`, `pv_id`, `Item1Desc`, `Item1Total`, `Item2Desc`, `Item2Total`, `Item3Desc`, `Item3Total`, `Item4Desc`, `Item4Total`, `GrandTotal`) VALUES
(1, 'PV20201008-0000', 'Satay Ayam', 200, 'Satay Daging', 400, '', 0, '', 0, 600),
(2, 'PV20201008-0000', 'Satay Ayam', 200, 'Satay Daging', 400, '', 0, '', 0, 600),
(3, 'PV20201008-0002', 'Satay Ayam', 200, 'Satay Daging', 400, '', 0, '', 0, 600),
(4, 'PV20201008-0003', 'Satay Ayam', 200, 'Satay Daging', 300, '', 0, '', 0, 500),
(5, 'PV20201008-0003', 'Satay Ayam', 200, 'Satay Daging', 300, '', 0, '', 0, 500),
(6, 'PV20201008-0003', 'Satay Ayam', 200, 'Satay Daging', 300, '', 0, '', 0, 500),
(7, 'PV20201008-0007', 'Power Up', 3000, 'Boost Power', 1000, '', 0, '', 0, 4000),
(8, 'PV20201008-0007', 'Power Up', 3000, 'Boost Power', 1000, '', 0, '', 0, 4000),
(9, 'PV20201008-0007', 'Power Up', 3000, 'Boost Power', 1000, '', 0, '', 0, 4000),
(10, 'PV20201008-0010', 'Ayam Masak Kicap', 300, 'Ayam Goreng Kunyit', 400, '', 0, '', 0, 700),
(11, 'PV20201008-0011', 'Something here', 2000, 'Something here too', 1000, '', 0, '', 0, 3000),
(12, 'PV20201008-0012', 'Ayam Masak Kicap', 2000, 'Ayam Goreng Kunyit', 4000, '', 0, '', 0, 6000),
(13, 'PV20201008-0013', 'Satay Ayam', 1230, 'Something here too', 1230, '', 0, '', 0, 2460),
(14, 'PV20201008-0014', 'Daging Paprik', 120, 'Daging Goreng Kunyit', 123, '', 0, '', 0, 243),
(15, 'PV20201008-0015', 'Power Up', 2000, '', 0, '', 0, '', 0, 2000),
(16, 'PV20201008-0016', 'Satay Ayam', 2000, '', 0, '', 0, '', 0, 2000),
(17, 'PV20201008-0017', 'Satay Ayam', 444, '', 0, '', 0, '', 0, 444),
(18, 'PV20201008-0018', 'Something ehere', 123, '', 0, '', 0, '', 0, 123),
(19, 'PV20201008-0019', 'asd', 123, '', 0, '', 0, '', 0, 123),
(20, 'PV20201008-0020', 'Something here', 123, 'Something here', 1230, '', 0, '', 0, 1353),
(21, 'PV20201008-0021', 'Insert Something Here', 1111, 'Something here too', 1111, '', 0, '', 0, 2222),
(22, 'PV20201008-0022', 'Something ehre', 12111, '', 0, '', 0, '', 0, 12111),
(23, 'PV20201008-0023', 'Something here', 123123, '', 0, '', 0, '', 0, 123123),
(24, 'PV20201008-0024', 'Something here', 123, '', 0, '', 0, '', 0, 123),
(25, 'PV20201008-0025', 'Something Yeyey', 123, '', 0, '', 0, '', 0, 123);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pv`
--
ALTER TABLE `pv`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pv_items`
--
ALTER TABLE `pv_items`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pv`
--
ALTER TABLE `pv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `pv_items`
--
ALTER TABLE `pv_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
