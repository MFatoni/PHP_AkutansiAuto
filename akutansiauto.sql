-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2019 at 12:06 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akutansiauto`
--

-- --------------------------------------------------------

--
-- Table structure for table `ketref`
--

CREATE TABLE `ketref` (
  `golAkun` varchar(50) DEFAULT NULL,
  `noRef` varchar(10) NOT NULL,
  `ketref` varchar(50) DEFAULT NULL,
  `kdUnik` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ketref`
--

INSERT INTO `ketref` (`golAkun`, `noRef`, `ketref`, `kdUnik`) VALUES
('Aktiva_Lancar', '11', 'Kas', NULL),
('Aktiva_Lancar', '12', 'Piutang', NULL),
('Aktiva_Lancar', '13', 'Perlengkapan', '2'),
('Aktiva_Lancar', '14', 'Sewa Dibayar Dimuka', '1'),
('Aktiva_Tetap', '15', 'Peralatan', '2'),
('Aktiva_Tetap', '19', 'Akumulasi Penyusutan', NULL),
('Kewajiban', '21', 'Hutang', NULL),
('Modal', '31', 'Modal', NULL),
('Modal', '32', 'Prive', NULL),
('Pendapatan', '41', 'Pendapatan', NULL),
('Beban', '51', 'Beban Perlengkapan', NULL),
('Beban', '52', 'Beban Gaji', NULL),
('Beban', '53', 'Beban Sewa', '1'),
('Beban', '54', 'Beban Listrik', NULL),
('Beban', '55', 'Beban Telepon', NULL),
('Beban', '56', 'Beban Air', NULL),
('Beban', '57', 'Beban Penyusutan', '2'),
('Beban', '58', 'Beban Rupa - Rupa', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `neracalajur`
--

CREATE TABLE `neracalajur` (
  `idnl` varchar(100) DEFAULT NULL,
  `noRef` varchar(10) DEFAULT NULL,
  `neracaSaldoD` int(100) DEFAULT NULL,
  `neracaSaldoK` int(100) DEFAULT NULL,
  `penyesuaianD` int(100) DEFAULT NULL,
  `penyesuaianK` int(100) DEFAULT NULL,
  `neracaSaldoSetelahD` int(100) DEFAULT NULL,
  `neracaSaldoSetelahK` int(100) DEFAULT NULL,
  `rugiLabaD` int(100) DEFAULT NULL,
  `rugiLabaK` int(100) DEFAULT NULL,
  `neracaD` int(100) DEFAULT NULL,
  `neracaK` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `neracalajur`
--

INSERT INTO `neracalajur` (`idnl`, `noRef`, `neracaSaldoD`, `neracaSaldoK`, `penyesuaianD`, `penyesuaianK`, `neracaSaldoSetelahD`, `neracaSaldoSetelahK`, `rugiLabaD`, `rugiLabaK`, `neracaD`, `neracaK`) VALUES
('2019-01', '11', 17100000, 0, 0, 0, 17100000, 0, 0, 0, 17100000, 0),
('2019-01', '12', 12000000, 0, 0, 0, 12000000, 0, 0, 0, 12000000, 0),
('2019-01', '13', 2000000, 0, 0, 0, 2000000, 0, 0, 0, 2000000, 0),
('2019-01', '14', 10000000, 0, 0, 5000000, 5000000, 0, 0, 0, 5000000, 0),
('2019-01', '15', 218000000, 0, 0, 5000000, 213000000, 0, 0, 0, 213000000, 0),
('2019-01', '19', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('2019-01', '21', 0, 185500000, 0, 0, 0, 185500000, 0, 0, 0, 185500000),
('2019-01', '31', 0, 50000000, 0, 0, 0, 50000000, 0, 0, 0, 50000000),
('2019-01', '41', 0, 27000000, 0, 0, 0, 27000000, 0, 27000000, 0, 0),
('2019-01', '52', 3000000, 0, 0, 0, 3000000, 0, 3000000, 0, 0, 0),
('2019-01', '55', 400000, 0, 0, 0, 400000, 0, 400000, 0, 0, 0),
('2019-01', '57', 0, 0, 5000000, 0, 5000000, 0, 5000000, 0, 0, 0),
('2019-01', '53', 0, 0, 5000000, 0, 5000000, 0, 5000000, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `no` int(10) NOT NULL,
  `kdTransaksi` int(50) DEFAULT NULL,
  `kdKhusus` varchar(100) DEFAULT NULL,
  `Tanggal` date DEFAULT NULL,
  `noRef` varchar(10) DEFAULT NULL,
  `debet` int(100) DEFAULT NULL,
  `kredit` int(100) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`no`, `kdTransaksi`, `kdKhusus`, `Tanggal`, `noRef`, `debet`, `kredit`, `keterangan`) VALUES
(42, 1, '', '2019-01-05', '11', 50000000, 0, ''),
(43, 1, '', '2019-01-05', '31', 0, 50000000, ''),
(44, 2, '02-bln-pK-5000000', '2019-01-05', '14', 10000000, 0, ''),
(45, 2, '', '2019-01-05', '11', 0, 10000000, ''),
(46, 3, '', '2019-01-07', '13', 2000000, 0, ''),
(47, 3, '', '2019-01-07', '11', 0, 2000000, ''),
(48, 4, '00-bln-pK-5000000', '2019-01-15', '15', 200000000, 0, ''),
(49, 4, '', '2019-01-15', '11', 0, 10000000, ''),
(50, 4, '', '2019-01-15', '21', 0, 190000000, ''),
(51, 5, '00-bln-pK-5000000', '2019-01-17', '15', 30000000, 0, ''),
(52, 5, '', '2019-01-17', '11', 0, 30000000, ''),
(53, 6, '', '2019-01-20', '11', 15000000, 0, ''),
(54, 6, '', '2019-01-20', '41', 0, 15000000, ''),
(55, 7, '01-bln', '2019-01-22', '55', 400000, 0, ''),
(56, 7, '01-bln', '2019-01-22', '11', 0, 400000, ''),
(57, 8, '01-bln', '2019-01-25', '21', 4500000, 0, ''),
(58, 8, '', '2019-01-25', '11', 0, 4500000, ''),
(59, 9, '', '2019-01-26', '11', 12000000, 0, ''),
(60, 9, '', '2019-01-26', '41', 0, 12000000, ''),
(64, 10, '', '2019-01-27', '12', 12000000, 0, ''),
(65, 10, '00-bln-pK-5000000', '2019-01-27', '15', 0, 12000000, ''),
(66, 11, '01-bln', '2019-01-30', '52', 3000000, 0, ''),
(67, 11, '', '2019-01-30', '11', 0, 3000000, ''),
(68, 12, '00-bln-pD-5000000', '2019-01-30', '57', 5000000, 0, ''),
(69, 12, '', '2019-01-30', '19', 0, 5000000, ''),
(70, 13, '5', '2019-02-14', '54', 99999, 0, ''),
(71, 13, '5', '2019-02-14', '11', 0, 99999, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ketref`
--
ALTER TABLE `ketref`
  ADD PRIMARY KEY (`noRef`);

--
-- Indexes for table `neracalajur`
--
ALTER TABLE `neracalajur`
  ADD KEY `noref` (`noRef`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`no`),
  ADD KEY `noRef` (`noRef`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `neracalajur`
--
ALTER TABLE `neracalajur`
  ADD CONSTRAINT `neracalajur_ibfk_1` FOREIGN KEY (`noref`) REFERENCES `ketref` (`noRef`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`noRef`) REFERENCES `ketref` (`noRef`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
