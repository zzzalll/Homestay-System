-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2020 at 02:25 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbase_zalikha`
--

-- --------------------------------------------------------

--
-- Table structure for table `alamat`
--

CREATE TABLE `alamat` (
  `NamaHomestay` varchar(30) NOT NULL,
  `Alamat` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alamat`
--

INSERT INTO `alamat` (`NamaHomestay`, `Alamat`) VALUES
('Bluebell', '52 Jalan Elektron'),
('Chrysanthemum', '42 Jalan Mangga'),
('Daffodil', '01 Jalan Kiki'),
('Ixora', '02 Jalan Mati'),
('Lotus', '99 Jalan Pisang');

-- --------------------------------------------------------

--
-- Table structure for table `homestay`
--

CREATE TABLE `homestay` (
  `KodHomestay` varchar(8) NOT NULL,
  `NamaHomestay` varchar(30) NOT NULL,
  `Harga` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `homestay`
--

INSERT INTO `homestay` (`KodHomestay`, `NamaHomestay`, `Harga`) VALUES
('BL01', 'Bluebell', 150),
('CH02', 'Chrysanthemum', 150),
('DA03', 'Daffodil', 300),
('IX04', 'Ixora', 450),
('LO05', 'Lotus', 500);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `NoKP` varchar(14) NOT NULL,
  `Nama` varchar(256) NOT NULL,
  `Emel` varchar(100) DEFAULT NULL,
  `NoTelefon` varchar(12) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`NoKP`, `Nama`, `Emel`, `NoTelefon`, `Password`) VALUES
('650615-06-5085', 'Hassan bin Amir', 'hassanamir@gmail.com', '015-6878088', 'hasan'),
('860306-05-5878', 'Danial bin Iqbal', 'danial123@gmail.com', '017-6534389', 'dannyyy'),
('940325-02-5581', 'Wong Keh Wei ', 'kehwei@gmail.com', '017-5743246', 'qwert'),
('960412-02-0058', 'Farisha binti Shafiq', 'farishafiq@gmail.com', '012-3456789', '12345abc'),
('960813-13-5761', 'Aisyah binti Farhan', 'aisyah01@gmail.com', '016-6946896', 'aiaiai');

-- --------------------------------------------------------

--
-- Table structure for table `tempahan`
--

CREATE TABLE `tempahan` (
  `NoKP` varchar(14) NOT NULL,
  `KodHomestay` varchar(8) NOT NULL,
  `TarikhMasuk` date NOT NULL,
  `TarikhKeluar` date NOT NULL,
  `Bayaran` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tempahan`
--

INSERT INTO `tempahan` (`NoKP`, `KodHomestay`, `TarikhMasuk`, `TarikhKeluar`, `Bayaran`) VALUES
('650615-06-5085', 'CH02', '2019-08-10', '2019-08-12', 300),
('860306-05-5878', 'IX04', '2019-03-27', '2019-03-29', 900),
('940325-02-5581', 'CH02', '2019-12-18', '2019-12-20', 300),
('940325-02-5581', 'LO05', '2019-05-01', '2019-05-05', 2000),
('960412-02-0058', 'DA03', '2019-07-02', '2019-07-05', 900),
('960412-02-0058', 'IX04', '2019-03-14', '2019-03-19', 2250),
('960813-13-5761', 'BL01', '2019-12-29', '2019-12-30', 150);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alamat`
--
ALTER TABLE `alamat`
  ADD PRIMARY KEY (`NamaHomestay`);

--
-- Indexes for table `homestay`
--
ALTER TABLE `homestay`
  ADD PRIMARY KEY (`KodHomestay`),
  ADD KEY `NamaHomestay` (`NamaHomestay`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`NoKP`);

--
-- Indexes for table `tempahan`
--
ALTER TABLE `tempahan`
  ADD PRIMARY KEY (`NoKP`,`KodHomestay`,`TarikhMasuk`),
  ADD KEY `KodHomestay` (`KodHomestay`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `homestay`
--
ALTER TABLE `homestay`
  ADD CONSTRAINT `homestay_ibfk_1` FOREIGN KEY (`NamaHomestay`) REFERENCES `alamat` (`NamaHomestay`);

--
-- Constraints for table `tempahan`
--
ALTER TABLE `tempahan`
  ADD CONSTRAINT `tempahan_ibfk_1` FOREIGN KEY (`NoKP`) REFERENCES `pelanggan` (`NoKP`),
  ADD CONSTRAINT `tempahan_ibfk_2` FOREIGN KEY (`KodHomestay`) REFERENCES `homestay` (`KodHomestay`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
