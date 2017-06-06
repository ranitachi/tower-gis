-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2017 at 04:10 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_location_map`
--

-- --------------------------------------------------------

--
-- Table structure for table `markers`
--

CREATE TABLE `markers` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `address` varchar(80) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `markers`
--

INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`, `type`) VALUES
(1, 'Love.Fish', '580 Darling Street, Rozelle, NSW', -33.861034, 151.171936, 'restaurant'),
(2, 'Young Henrys', '76 Wilford Street, Newtown, NSW', -33.898113, 151.174469, 'bar'),
(3, 'Hunter Gatherer', 'Greenwood Plaza, 36 Blue St, North Sydney NSW', -33.840282, 151.207474, 'bar'),
(4, 'The Potting Shed', '7A, 2 Huntley Street, Alexandria, NSW', -33.910751, 151.194168, 'bar'),
(5, 'Nomad', '16 Foster Street, Surry Hills, NSW', -33.879917, 151.210449, 'bar'),
(6, 'Three Blue Ducks', '43 Macpherson Street, Bronte, NSW', -33.906357, 151.263763, 'restaurant'),
(7, 'Single Origin Roasters', '60-64 Reservoir Street, Surry Hills, NSW', -33.881123, 151.209656, 'restaurant'),
(8, 'Red Lantern', '60 Riley Street, Darlinghurst, NSW', -33.874737, 151.215530, 'restaurant');

-- --------------------------------------------------------

--
-- Table structure for table `operator`
--

CREATE TABLE `operator` (
  `id` int(11) NOT NULL,
  `nama_operator` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `status_tampil` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operator`
--

INSERT INTO `operator` (`id`, `nama_operator`, `alamat`, `logo`, `status_tampil`) VALUES
(1, 'Telkomsel', '-', '-', '1'),
(2, 'XL', '-', '', '1'),
(3, 'Gihon', '-', '-', '1'),
(4, 'Axis', '-', '-', '1'),
(5, 'Smartfren', '-', NULL, '1'),
(6, 'H3I', '-', NULL, '1'),
(7, 'No Tenant', '-', NULL, '1'),
(8, 'INUX', '-', NULL, '1'),
(9, 'BTEL', '-', NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `site`
--

CREATE TABLE `site` (
  `id` int(11) NOT NULL,
  `site_id` varchar(50) DEFAULT NULL,
  `operator_id` varchar(255) DEFAULT NULL,
  `operator_name` varchar(255) DEFAULT NULL,
  `alamat` text,
  `lat_koord` varchar(100) DEFAULT NULL,
  `long_koord` varchar(100) DEFAULT NULL,
  `lokasi_kode` varchar(100) DEFAULT NULL,
  `pengguna_menara` varchar(100) DEFAULT NULL,
  `luas_tanah` double DEFAULT NULL,
  `tinggi_menara_1` double DEFAULT NULL,
  `tinggi_menara_2` double DEFAULT NULL,
  `koef` double DEFAULT NULL,
  `njop_m` double DEFAULT NULL,
  `njop_2_persen` double DEFAULT NULL,
  `retribusi` double DEFAULT NULL,
  `retribusi_s_d_mei` double DEFAULT NULL,
  `status_tampil` enum('0','1') DEFAULT '1',
  `type_power` varchar(255) DEFAULT NULL,
  `imb_no` varchar(100) DEFAULT NULL,
  `imb_tahun` varchar(100) DEFAULT NULL,
  `tahun_menara` varchar(100) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site`
--

INSERT INTO `site` (`id`, `site_id`, `operator_id`, `operator_name`, `alamat`, `lat_koord`, `long_koord`, `lokasi_kode`, `pengguna_menara`, `luas_tanah`, `tinggi_menara_1`, `tinggi_menara_2`, `koef`, `njop_m`, `njop_2_persen`, `retribusi`, `retribusi_s_d_mei`, `status_tampil`, `type_power`, `imb_no`, `imb_tahun`, `tahun_menara`, `keterangan`, `vendor_id`) VALUES
(1, 'JKT_ 06N414', '1,2', 'Telkomsel,XL', 'Jl. Kp. Sukadiri Rt.02/01 Kec.Sukadiri\r\n', '-6.0487', '106.5600', '0.8\r\n', '1.5\r\n', 144, 52, 1, 1.1, 100000, 288000, 316800, 132000, '1', '', '', '', '', '', 1),
(2, 'JKT_ 06N396', '4', 'Axis', 'Gembong Masjid Rt.02/01 Kec.Balaraja\r\n', '-6.2164', '106.4190', '0.8\r\n', '2\r\n', 200, 52, 1, 1.266666667, 300000, 1200000, 1520000, 633333, '1', '', '', '', '', '', 1),
(3, 'JKT_ 06N412', '5', 'Smartfren', 'Kp. Kelebet Rt.05/04 Klebet Kemiri', '-6.0958', '106.4580', '0.4', '2', 180, NULL, NULL, NULL, 100000, NULL, NULL, NULL, '1', NULL, NULL, '2017', NULL, NULL, 2),
(4, 'JKT_ 06N417', '5', 'Smartfren', 'Kp. Pulo Rt.09/03 Talok Kresek', '-6.1393', '106.3970', '0.4', '2', 196, NULL, NULL, NULL, 200000, NULL, NULL, NULL, '1', NULL, NULL, '2017', NULL, NULL, 2),
(5, 'JKT_ 06N972', '5', 'Smartfren', 'Kp. Ps.Kemis Rt.09/02 Sukaharja Ps.Kemis', '-6.1721', '106.5290', '0.8', '2', 200, NULL, NULL, NULL, 200000, NULL, NULL, NULL, '1', NULL, NULL, '2017', NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `id` int(11) NOT NULL,
  `nama_vendor` varchar(255) NOT NULL,
  `nama_pimpinan` varchar(255) NOT NULL,
  `telp` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `status_tampil` enum('0','1') NOT NULL DEFAULT '1',
  `logo` varchar(255) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id`, `nama_vendor`, `nama_pimpinan`, `telp`, `alamat`, `status_tampil`, `logo`) VALUES
(1, 'PT. Solusi Tunas Pratama TBK', '-', '-', '-', '1', ''),
(2, 'PT. Inti Bangun Sejahtera', '-', '-', '-', '1', ''),
(3, 'GIHON', '-', '-', '-', '1', ''),
(4, 'PROTELINDO', '-', '-', '-', '1', ''),
(5, 'TELKOMSEL', '-', '-', '-', '1', ''),
(6, 'NET WAVE', '-', '-', '-', '1', ''),
(7, 'PT. INDOSAT TBK', '-', '-', 'Wilayah Kabupaten Tangerang', '1', ''),
(8, 'MITRATEL', '-', '-', '-', '1', ''),
(9, 'PT. XL', '-', '-', 'Wilayah Kabupaten Tangerang', '1', ''),
(10, 'TBG', '-', '-', '-', '1', ''),
(11, 'HUTCHINSON', '-', '-', '-', '1', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `markers`
--
ALTER TABLE `markers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site`
--
ALTER TABLE `site`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `markers`
--
ALTER TABLE `markers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `operator`
--
ALTER TABLE `operator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `site`
--
ALTER TABLE `site`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
