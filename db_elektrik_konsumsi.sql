-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2022 at 03:16 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_elektrik_konsumsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `m_user`
--

CREATE TABLE `m_user` (
  `ID_user` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `status_user` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_user`
--

INSERT INTO `m_user` (`ID_user`, `nama`, `username`, `password`, `status_user`) VALUES
(4, 'supri', 'user', 'dXNlcg==', 1),
(6, 'hafid', 'admin', 'YWRtaW4=', 0),
(7, 'Muhammad Torik', 'torik', 'dG9yaWs=', 1),
(8, 'nikmah', 'nikmah', 'bmlrbWFo', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stand_meter`
--

CREATE TABLE `tbl_stand_meter` (
  `ID_stand_meter` int(11) NOT NULL,
  `ID_user` int(11) NOT NULL,
  `date_stan_meter` date NOT NULL,
  `bp` decimal(20,2) NOT NULL,
  `lbp` decimal(20,2) NOT NULL,
  `kvarh` decimal(20,2) NOT NULL,
  `outgoing_i` decimal(20,2) NOT NULL,
  `outgoing_ii` decimal(20,2) NOT NULL,
  `outgoing_iii` decimal(20,2) NOT NULL,
  `outgoing_iv` decimal(20,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_stand_meter`
--

INSERT INTO `tbl_stand_meter` (`ID_stand_meter`, `ID_user`, `date_stan_meter`, `bp`, `lbp`, `kvarh`, `outgoing_i`, `outgoing_ii`, `outgoing_iii`, `outgoing_iv`) VALUES
(15, 6, '2022-05-01', '7132799.00', '1454980.00', '6725642.00', '0.00', '0.00', '0.00', '0.00'),
(16, 6, '2022-05-02', '6978290.00', '1425781.00', '6574130.00', '0.00', '0.00', '0.00', '0.00'),
(17, 6, '2022-05-03', '6978286.00', '1425781.00', '6574129.00', '0.00', '0.00', '0.00', '0.00'),
(18, 6, '2022-05-04', '7453614.00', '1517222.00', '7054779.00', '0.00', '0.00', '0.00', '0.00'),
(19, 6, '2022-05-05', '7289586.00', '1484289.00', '6889603.00', '0.00', '0.00', '0.00', '0.00'),
(20, 6, '2022-05-06', '7792804.00', '1579237.00', '7365484.00', '0.00', '0.00', '0.00', '0.00'),
(21, 6, '2022-05-07', '7620915.00', '1548606.00', '7209589.00', '0.00', '0.00', '0.00', '0.00'),
(22, 6, '2022-05-08', '8437587.00', '1694749.00', '7732792.00', '0.00', '0.00', '0.00', '0.00'),
(23, 6, '2022-05-09', '8292112.00', '1667805.00', '7681607.00', '0.00', '0.00', '0.00', '0.00'),
(24, 6, '2022-05-10', '15910000.00', '28840000.00', '12699000.00', '0.00', '0.00', '0.00', '0.00'),
(25, 6, '2022-05-11', '15793000.00', '2861000.00', '12577000.00', '0.00', '0.00', '0.00', '0.00'),
(26, 6, '2022-05-12', '15782000.00', '259000.00', '12588000.00', '0.00', '0.00', '0.00', '0.00'),
(27, 6, '2022-05-13', '62326000.00', '12837000.00', '56604000.00', '0.00', '0.00', '0.00', '0.00'),
(28, 6, '2022-05-14', '62326000.00', '12837000.00', '54604000.00', '0.00', '0.00', '0.00', '0.00'),
(29, 6, '2022-05-15', '62070000.00', '12785000.00', '54385000.00', '0.00', '0.00', '0.00', '0.00'),
(30, 6, '2022-05-16', '62052000.00', '12781000.00', '54369000.00', '0.00', '0.00', '0.00', '0.00'),
(31, 6, '2022-05-17', '32379000.00', '4747000.00', '24741000.00', '0.00', '0.00', '0.00', '0.00'),
(32, 6, '2022-05-18', '31724000.00', '4601000.00', '24132000.00', '0.00', '0.00', '0.00', '0.00'),
(33, 6, '2022-05-19', '36250000.00', '8412000.00', '42366000.00', '0.00', '0.00', '0.00', '0.00'),
(34, 6, '2022-05-20', '35958000.00', '8412000.00', '41937000.00', '0.00', '0.00', '0.00', '0.00'),
(35, 6, '2022-05-21', '263335008.00', '52502000.00', '230408000.00', '0.00', '0.00', '0.00', '0.00'),
(36, 6, '2022-05-22', '253310000.00', '50501000.00', '220844000.00', '0.00', '0.00', '0.00', '0.00'),
(37, 6, '2022-05-23', '320480000.00', '71913000.00', '242278000.00', '0.00', '0.00', '0.00', '0.00'),
(38, 6, '2022-05-24', '308036000.00', '69439000.00', '231350000.00', '0.00', '0.00', '0.00', '0.00'),
(39, 6, '2022-05-25', '7453814.00', '1517222.00', '7054779.00', '0.00', '0.00', '0.00', '0.00'),
(40, 6, '2022-05-26', '7289586.00', '1484289.00', '6889603.00', '0.00', '0.00', '0.00', '0.00'),
(41, 6, '2022-05-27', '33743000.00', '8324000.00', '41593000.00', '0.00', '0.00', '0.00', '0.00'),
(42, 6, '2022-05-28', '39686000.00', '7392000.00', '41956000.00', '0.00', '0.00', '0.00', '0.00'),
(43, 6, '2022-05-29', '30764000.00', '4892000.00', '25327000.00', '0.00', '0.00', '0.00', '0.00'),
(44, 6, '2022-05-30', '67326000.18', '11837000.23', '54604000.42', '0.00', '0.00', '0.00', '0.00'),
(45, 6, '2022-05-31', '63868000.32', '12574000.11', '56364000.23', '0.00', '0.00', '0.00', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stand_pdam`
--

CREATE TABLE `tbl_stand_pdam` (
  `ID_pdam` int(11) NOT NULL,
  `ID_user` int(11) NOT NULL,
  `tgl_pdam` date NOT NULL,
  `penggunaan` decimal(20,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_stand_pdam`
--

INSERT INTO `tbl_stand_pdam` (`ID_pdam`, `ID_user`, `tgl_pdam`, `penggunaan`) VALUES
(18, 6, '2022-05-01', '94285.00'),
(19, 6, '2022-05-02', '63381.00'),
(20, 6, '2022-05-03', '61956.00'),
(21, 6, '2022-05-04', '43337.00'),
(22, 6, '2022-05-05', '4362.00'),
(23, 6, '2022-05-06', '32733.00'),
(24, 6, '2022-05-07', '20224.00'),
(25, 6, '2022-05-08', '372.00'),
(26, 6, '2022-05-09', '13158.00'),
(27, 6, '2022-05-10', '92158.00'),
(28, 6, '2022-05-12', '20921.00'),
(29, 6, '2022-05-13', '13102.00'),
(30, 6, '2022-05-14', '17346.00'),
(31, 6, '2022-05-15', '8718.00'),
(32, 6, '2022-05-16', '2897.00'),
(33, 6, '2022-05-17', '14910.00'),
(34, 6, '2022-05-11', '23777.00'),
(35, 6, '2022-05-18', '18199.00'),
(36, 6, '2022-05-20', '13673.00'),
(37, 6, '2022-05-19', '12894.00'),
(38, 6, '2022-05-21', '3350.00'),
(39, 6, '2022-05-22', '2970.00'),
(40, 6, '2022-05-23', '17139.00'),
(41, 6, '2022-05-24', '9483.00'),
(42, 6, '2022-05-25', '24875.00'),
(43, 6, '2022-05-26', '38471.00'),
(44, 6, '2022-05-27', '49642.00'),
(45, 6, '2022-05-28', '8381.00'),
(46, 6, '2022-05-29', '4032.00'),
(47, 6, '2022-05-30', '33629.00'),
(48, 6, '2022-05-31', '68628.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_user`
--
ALTER TABLE `m_user`
  ADD PRIMARY KEY (`ID_user`);

--
-- Indexes for table `tbl_stand_meter`
--
ALTER TABLE `tbl_stand_meter`
  ADD PRIMARY KEY (`ID_stand_meter`);

--
-- Indexes for table `tbl_stand_pdam`
--
ALTER TABLE `tbl_stand_pdam`
  ADD PRIMARY KEY (`ID_pdam`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_user`
--
ALTER TABLE `m_user`
  MODIFY `ID_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_stand_meter`
--
ALTER TABLE `tbl_stand_meter`
  MODIFY `ID_stand_meter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `tbl_stand_pdam`
--
ALTER TABLE `tbl_stand_pdam`
  MODIFY `ID_pdam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
