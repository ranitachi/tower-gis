-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2017 at 08:55 PM
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
(4, 'AXIS', '-', '-', '1'),
(5, 'Smartfren', '-', NULL, '1'),
(6, 'H3I', '-', NULL, '1'),
(7, 'No Tenant', '-', NULL, '1'),
(8, 'INUX', '-', NULL, '1'),
(9, 'BTEL', '-', NULL, '1'),
(10, 'SMART', '', NULL, '1'),
(34, 'TSEL', '', NULL, '1'),
(41, 'ISAT', '', NULL, '1'),
(42, 'Flexi', '', NULL, '1'),
(43, 'HCPT', '', NULL, '1'),
(44, 'H3I (TRI)', '', NULL, '1'),
(45, 'm-8', '', NULL, '1'),
(46, 'h3i_(tri)', '', NULL, '1'),
(47, 't-sel', '', NULL, '1'),
(48, 'indosat', '', NULL, '1'),
(49, 'internux', '', NULL, '1'),
(50, 'H3I / TRI', '', NULL, '1'),
(51, 'h3i_/_tri', '', NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `site`
--

CREATE TABLE `site` (
  `id` int(11) NOT NULL,
  `site_id` varchar(50) DEFAULT NULL,
  `site_name` varchar(255) NOT NULL,
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
  `tanggal` varchar(20) DEFAULT NULL,
  `tahun_menara` varchar(100) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site`
--

INSERT INTO `site` (`id`, `site_id`, `site_name`, `operator_id`, `operator_name`, `alamat`, `lat_koord`, `long_koord`, `lokasi_kode`, `pengguna_menara`, `luas_tanah`, `tinggi_menara_1`, `tinggi_menara_2`, `koef`, `njop_m`, `njop_2_persen`, `retribusi`, `retribusi_s_d_mei`, `status_tampil`, `type_power`, `imb_no`, `imb_tahun`, `tanggal`, `tahun_menara`, `keterangan`, `vendor_id`) VALUES
(298, 'BTTG005', 'Pesantren Darul Muttaqin', '7', 'No Tenant', 'Jl.Raya Mauk KM 7, Kp. Cadas Kec.Sepatan', '-6.147044', '106.5895', NULL, NULL, 49, 20, NULL, NULL, 0, NULL, NULL, NULL, '1', 'pole', '-', '2005', '0000-00-00', NULL, '-\r', 1),
(299, 'BTTG0009', 'Ruko Bp.Ang Andi Wijaya', '6', 'H3I', 'Jl. Salembaran No. 10, Desa/Kelurahan Kampung Melayu Timur, Kec. Teluk Naga, Kab. Tangerang, ', '-6.06994', '106.64824', NULL, NULL, 18, 25, NULL, NULL, 0, NULL, NULL, NULL, '1', 'MT', '643.3/9581-BP2T/2009', '2006', '2009-09-17', NULL, 'Ex. BTEL\r', 1),
(300, 'BTTG0013', 'CV. Benteng Jaya', '34,2', 'TSEL, XL', 'Jl. Raya Serang KM 36, Kp. Pajagan RT4/4, Desa Cikande, Kec. Jayanti Kab. Tangerang', '-6.20745', '106.37477', NULL, NULL, 60.28, 25, NULL, NULL, 0, NULL, NULL, NULL, '1', 'MT', '643,3/752-BP2T/2010', '2006', '2010-07-16', NULL, 'Ex. BTEL\r', 1),
(301, 'BTTG0014', 'Lahan Bp. H. Ujen', '9', 'BTEL', 'Kp. Bugel, Ds. Kadu Agung, Rt.01/04, Kecamatan Tiga Raksa, Kab Tangerang', '-6.26192', '106.4846', NULL, NULL, 150, 45, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/9571-BP2T/2009', '2006', '2009-09-17', NULL, 'Ex. BTEL\r', 1),
(302, 'BTTG0015', 'Lahan Bp. Nursin', '7', 'No Tenant', 'Kp. Gelam, Rt. 002/01, Ds. Kutajaya, Kec. Pasar Kemis, Tangerang', '-6.173911', '106.563336', NULL, NULL, 400, 45, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 4 Legs', '643.3/9585-BP2T/2009', '2006', '2009-09-17', NULL, 'Ex. BTEL\r', 1),
(303, 'BTTG0016', 'Pusat Perdagangan Pasar Kemis', '7', 'No Tenant', 'Jl. Raya Pasar Kemis No. 1, Ds. Sukamantri, Kec. Pasar Kemis, Tangerang', '-6.170914', '106.530592', NULL, NULL, 9, 25, NULL, NULL, 0, NULL, NULL, NULL, '1', 'MT', '643.3/9578-BP2T/2009', '2006', '2009-09-17', NULL, 'Ex. BTEL\r', 1),
(304, 'BTTG0017', 'Lahan Bp. Richard Panggabean/Sainan', '10', 'SMART', 'Kp. Bojong Nangka RT. 01 RW. 01 Kel. Medang Kec. Pagedangan Kab. Tangerang', '-6.25988', '106.60619', NULL, NULL, 150, 45, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/9575-BP2T/2009', '2006', '2009-09-17', NULL, 'Ex. BTEL\r', 1),
(305, 'BTTG0023', 'Kelapa Puan', '34,8,6', 'TSEL, INUX, H3I', 'Kampung Kalipaten RT 003 RW 04 Kel. Pakulonan Barat Kec. Kelapa Dua Tangerang', '-6.22972', '106.63271', NULL, NULL, 144, 36, NULL, NULL, 0, NULL, NULL, NULL, '1', 'Monopole', '643.3/6902-BP2T/2009', '2008', '2009-07-21', NULL, 'Ex. Axis\r', 1),
(306, 'BTTG0024', 'Gunung Timur', '7', 'No Tenant', 'Jl. Lingkungan Rt. 03 Rw. 02 Desa Binong Kec. Curug Kab. Tangerang', '-6.23168', '106.5921', NULL, NULL, 120, 42, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/131-DBP/2007', '2007', '2007-12-19', NULL, 'Ex. Axis\r', 1),
(307, 'BTTG0025', 'Siloam', '34,8', 'TSEL, INUX', 'Bencongan Dadap Rt. 01 Rw. 03 Bencongan Indah Curug Tangerang', '-6.22329', '106.59662', NULL, NULL, 120, 42, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/129-DBP/2007', '2007', '2007-12-19', NULL, 'Ex. Axis\r', 1),
(308, 'BTTG0026', 'KM 25', '8', 'INUX', 'Jl. Kadu Manis No. 84 Kp. Kadu RT 04A RW 001 Kel. Kadu Kec. Curug tangerang', '-6.2188', '106.5709', NULL, NULL, 135, 36, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/6865-BP2T/2009', '2008', '2009-07-21', NULL, 'Ex. Axis\r', 1),
(309, 'BTTG0027', 'Rawa Pengas', '2,9,6,34', 'XL, BTEL, H3I, TSEL', 'Jl. Pintu Kapuk Rt.022 Rw.10 Desa Bojong Renged Kec.Teluk Naga, Tangerang, ', '-6.102844', '106.651451', NULL, NULL, 84, 36, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/82-DBP/2007', '2006', '2007-06-18', NULL, 'Ex. Axis\r', 1),
(310, 'BTTG0028', 'Bumi Kelapa Dua', '8,6', 'INUX, H3I', 'Kp Cibogo Wetan Rt. 04 Rw. 03 Kelapa Dua Kec. Kelapa Dua Tangerang ', '-6.23878', '106.6207', NULL, NULL, 56, 36, NULL, NULL, 0, NULL, NULL, NULL, '1', 'Monopole', '643.3/6864-BP2T/2009', '2007', '2009-07-21', NULL, 'Ex. Axis\r', 1),
(311, 'BTTG0029', 'Teluk Naga', '2,41', 'XL, ISAT', 'Jl. Raya Kosambi Timur RT.02/RW.05 Kel.Kosambi Timur Kec.Kosambi, Tangerang ', '-6.083101', '106.69961', NULL, NULL, 64, 36, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/84-DBP/2007', '2006', '2007-06-18', NULL, 'Ex. Axis\r', 1),
(312, 'BTTG0030', 'Villa Taman Bandara', '7', 'No Tenant', 'Jl. Perancis RT.01/RW.06 Ds Jatimulya kec.Kosambi, Tangerang, ', '-6.09193', '106.690402', NULL, NULL, 64, 24, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/6863-BP2T/2009', '2006', '2009-07-21', NULL, 'Ex. Axis\r', 1),
(313, 'BTTG0031', 'Pelita Harapan', '8,41,6,2', 'INUX, ISAT, H3I, XL', 'Jl. Kelapa Dua RT003/RW02, Kel Kelapa Dua, Kec Curug, Kabupaten Tangerang, ', '-6.23905', '106.6115', NULL, NULL, 180, 42, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/130-DBP/2007', '2007', '2007-12-19', NULL, 'Ex. Axis\r', 1),
(314, 'BTTG0032', 'Binong Raya', '7', 'No Tenant', 'Kp. Galuga, Gg. Batako RT 02/05, Kel. Binong, Kec. Curug, Kab. Tanggerang - ', '-6.237665', '106.582862', NULL, NULL, 144, 36, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/6894-BP2T/2009', '2008', '2009-07-21', NULL, 'Ex. Axis\r', 1),
(315, 'BTTG0033', 'Menara Asia (Lippo Bldg)', '7', 'No Tenant', 'Supermall Karawaci, 105 Boulevar Diponegoro # 00-00 Kel. Kelapa Dua Kec. Kelapa Dua Tangerang', '-6.22615', '106.60596', NULL, NULL, 11, 20, NULL, NULL, 0, NULL, NULL, NULL, '1', 'MT', '643.3/6862-BP2T/2009', '2008', '2009-07-21', NULL, 'Ex. Axis\r', 1),
(316, 'BTTG0035', 'Cengklong', '34', 'TSEL', 'Jl. Rawa Belimbing RT.001/ RW.001 No.41 Desa Belimbing Kec.Kosambi, Tangerang', '-6.093091', '106.669308', NULL, NULL, 100, 36, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/85-DBP/2007', '2006', '2007-06-18', NULL, 'Ex. Axis\r', 1),
(317, 'BTTG0036', 'Salembaran Jaya', '2', 'XL', 'Jl.Salembaran Rt.01/Rw.01 Desa Salembaran Jati  Kec.Kosambi, Tangerang', '-6.07495', '106.67909', NULL, NULL, 64, 36, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/86-DBP/2007', '2006', '2007-06-18', NULL, 'Ex. Axis\r', 1),
(318, 'BTTG0037', 'S.Cisadane', '2,9,34', 'XL, BTEL, TSEL', 'Jl. Kp Kelor Pasar Sore RT 05 RW 02 desa kp. Kelor Sepatan timur Tangerang ', '-6.1198', '106.62499', NULL, NULL, 229.95, 21, NULL, NULL, 0, NULL, NULL, NULL, '1', 'Monopole', '643.3/6899-BP2T/2009', '2006', '2009-07-21', NULL, 'Ex. Axis\r', 1),
(319, 'BTTG0038', 'Cogreg', '2,41', 'XL, ISAT', 'Tukang Kajang RT 002 RW 08 Kel. Kp. Melayu Kec. Teluk Naga - ', '-6.078673', '106.653951', NULL, NULL, 110, 52, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/6848-BP2T/2009', '2008', '2009-07-21', NULL, 'Ex. Axis\r', 1),
(320, 'BTTG0039', 'Lemo', '4,9', 'AXIS, BTEL', 'Jl. Desa Muara RT 012 RW 05 Kel. Muara Baru Kec. Teluk Naga - Tangerang', '-6.035078', '106.693923', NULL, NULL, 144, 42, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/6889-BP2T/2009', '2008', '2009-07-21', NULL, 'Ex. Axis\r', 1),
(321, 'BTTG0040', 'Cirunipak', '2,9,34', 'XL, BTEL, TSEL', 'Jl. Desa Cirunipak No. 36 Tanjung Burung RT 013 RW 07 Kec. Teluk Naga Kab. Tangerang  - ', '-6.03325', '106.63706', NULL, NULL, 144, 42, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/6857-BP2T/2009', '2008', '2009-07-21', NULL, 'Ex. Axis\r', 1),
(322, 'BTTG0041', 'Sarhali', '2,34,8', 'XL, TSEL, INUX', 'Pasir jaya RT 07 RW 03 Kel Pasir Jaya Cikupa tangerang', '-6.20644', '106.528', NULL, NULL, 120, 52, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/6881-BP2T/2009', '2006', '2009-07-21', NULL, 'Ex. Axis\r', 1),
(323, 'BTTG0042', 'Gaga', '2', 'XL', 'Jl. Kampung Kajangan RT 002 RW 05 Kel. Gaga Kec. Pakuhaji Kab. Tangerang - ', '-6.077675', '106.634349', NULL, NULL, 144, 42, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/6882-BP2T/2009', '2008', '2009-07-21', NULL, 'Ex. Axis\r', 1),
(324, 'BTTG0043', 'Kp Bojong Renged', '2,6', 'XL, H3I', 'Jl.Yayasan Al Zumuriah No.84 RT.01/RW.01, Kel.Teluk Naga, Kec.Teluk Naga, Tangerang', '-6.100128', '106.636558', NULL, NULL, 100, 42, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/83-DBP/2007', '2006', '2007-06-18', NULL, 'Ex. Axis\r', 1),
(325, 'BTTG0044', 'Medang Lestari', '2,8', 'XL, INUX', 'Kampung Bojong Nangka Rt.02 Rw.01 Kel.Medang Kec.Pagedangan, ', '-6.25464', '106.60881', NULL, NULL, 144, 36, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/6850-BP2T/2009', '2008', '2009-07-21', NULL, 'Ex. Axis\r', 1),
(326, 'BTTG0045', 'Bumi Serpong Damai', '34,10,6,2,41', 'TSEL, SMART, H3I, XL, ISAT', 'Kp. Tegal RT 01 RW 02 Kel. Pagedangan Kec. Pagedangan, Tangerang - ', '-6.29415', '106.6459', NULL, NULL, 144, 36, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/6892-BP2T/2009', '2008', '2009-07-21', NULL, 'Ex. Axis\r', 1),
(327, 'BTTG0046', 'Sepatan', '2,34', 'XL, TSEL', 'Kampung Kayu Besar RT 02 RW 02 Desa Sepatan Kecamatan Sepatan Kabupaten Tangerang ', '-6.1151', '106.57376', NULL, NULL, 144, 52, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/6869-BP2T/2009', '2008', '2009-07-21', NULL, 'Ex. Axis\r', 1),
(328, 'BTTG0047', 'Mauk Timur', '7', 'No Tenant', 'Jl. Ir Sutami No. 08 Rt 14/05 Kel. Mauk Timur Kec. Mauk Kab. Tangerang ', '-6.05894', '106.51354', NULL, NULL, 225, 70, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST', '643.3/6870-BP2T/2009', '2008', '2009-07-21', NULL, 'Ex. Axis\r', 1),
(329, 'BTTG0048', 'Rajeg', '2,34', 'XL, TSEL', 'Jl Raya Rajeg Kampung Seglog RT 04 RW 05 Desa Sukamanah Kecamatan Rajeg Kabupaten Tangerang ', '-6.12197', '106.52131', NULL, NULL, 144, 52, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/6871-BP2T/2009', '2008', '2009-07-21', NULL, 'Ex. Axis\r', 1),
(330, 'BTTG0049', 'Pasar Kemis', '6,34', 'H3I, TSEL', 'Jl. Rayawalet Kampung Putat RT 004 RW 01 Kel. Sindang Sari Kec. Pasar Kemis Tangerang - ', '-6.15066', '106.53291', NULL, NULL, 144, 52, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/6867-BP2T/2009', '2008', '2009-07-21', NULL, 'Ex. Axis\r', 1),
(331, 'BTTG0050', 'Sindang Jaya', '7', 'No Tenant', 'Jl. Sindang Jaya RT 002 RW 03 Kel. Sindang Jaya Kec. Sindang Jaya Tangerang', '-6.149724', '106.504415', NULL, NULL, 144, 52, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/6866-BP2T/2009', '2008', '2009-07-21', NULL, 'Ex. Axis\r', 1),
(332, 'BTTG0051', 'Winakerta', '2', 'XL', 'Kp. Karawon girang Jl. Raya Wanakerta Rt07 Rw04 Kecamatan Sindang Jaya Kabupaten Tangerang ', '-6.18763', '106.50722', NULL, NULL, 270, 52, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/6875-BP2T/2009', '2008', '2009-07-21', NULL, 'Ex. Axis\r', 1),
(333, 'BTTG0052', 'Cikupa', '10', 'SMART', 'Kp. Kadu Sabrang Rt.01 Rw 02 Kel.Cikupa Kec.Cikupa, Tangerang ', '-6.23952', '106.5197', NULL, NULL, 182, 52, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/6896-BP2T/2009', '2008', '2009-07-23', NULL, 'Ex. Axis\r', 1),
(334, 'BTTG0053', 'Kp Ciapus', '34', 'TSEL', 'Kampung Ciapus Desa Panongan RT 012/ RW 05 Kelurahan Panongan Kecamatan Panongan Kabupaten Tangerang ', '-6.27377', '106.52142', NULL, NULL, 169, 52, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/6874-BP2T/2009', '2008', '2009-07-21', NULL, 'Ex. Axis\r', 1),
(335, 'BTTG0054', 'Budi Mulya', '10', 'SMART', 'Kampung Ciapus Indah RT 02 RW 02 Desa Budi Mulya Kecamatan Cikupa Kabupaten Tangerang ', '-6.23673', '106.49004', NULL, NULL, 144, 52, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/6873-BP2T/2009', '2008', '2009-07-21', NULL, 'Ex. Axis\r', 1),
(336, 'BTTG0055', 'Ciserah', '10,2,34', 'SMART, XL, TSEL', 'Desa Ciserah Pasir RT 04 RW 02 Desa Ciserah Kecamatan Tigaraksa Kabupaten Tangerang ', '-6.22811', '106.45694', NULL, NULL, 270, 52, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/6900-BP2T/2009', '2008', '2009-07-21', NULL, 'Ex. Axis\r', 1),
(337, 'BTTG0056', 'Tegalsari', '9,34', 'BTEL, TSEL', 'Kampung Pabuaran RT 002 RW 01 Kel. Tegal Sari Kec. Tigaraksa - Tangerang ', '-6.25355', '106.44599', NULL, NULL, 225, 52, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/6883-BP2T/2009', '2008', '2009-07-21', NULL, 'Ex. Axis\r', 1),
(338, 'BTTG0057', 'Cariutobat', '9,2,8', 'BTEL, XL, INUX', 'Kampung Hauan RT 01 RW 05 Desa Tobat Kecamatan Balaraja Kabupaten Tangerang ', '-6.19775', '106.44169', NULL, NULL, 210, 72, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST', '643.3/6886-BP2T/2009', '2008', '2009-07-21', NULL, 'Ex. Axis\r', 1),
(339, 'BTTG0058', 'Gembong', '6,8', 'H3I, INUX', 'Jl. Raya Serang Gembong Jatake  RT 001 RW 02 Desa Gembong Kec. Balaraja Kab. Tangerang - ', '-6.21961', '106.41597', NULL, NULL, 180, 52, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/6901-BP2T/2009', '2008', '2009-07-21', NULL, 'Ex. Axis\r', 1),
(340, 'BTTG0059', 'BUMI ARGA NUSA', '10', 'SMART', 'Kampung Kongsi Rt.01/03 Desa/Kelurahan Palasari Kec.Legok Kabupaten Tangerang', '-6.296638', '106.556229', NULL, NULL, 150, 52, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST', '643.3/289-BP2T/2013', '2008', '2013-03-21', NULL, 'STP\r', 1),
(341, 'BTTG0060', 'JLRAYARAJEG', '34', 'TSEL', 'Kampung Putat Rt.05/01 Kelurahan Sindang Panen Kec.Sindang Jaya Tangerang ', '-6.15563', '106.53213', NULL, NULL, 225, 52, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST', '643.3/1871-BP2T/2010', '2008', '2010-09-03', NULL, 'STP\r', 1),
(342, 'BTTG0066', 'Flamboyan Bencongan', '2,6', 'XL, H3I', 'Jl. Soka, RT/RW 001/03, Kel. Bencongan, Kec. Kelapa Dua , Kab. Tangerang', '-6.22239', '106.595509', NULL, NULL, 225, 36, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/5319-BP2T/2009', '2008', '2009-06-15', NULL, 'Ex. Vitcom\r', 1),
(343, 'BTTG0067', 'Polsek Cikupa', '34,10', 'TSEL, SMART', 'Kp. Cikupa Rt.03 RW.01 Kel. Sukamulya Kec. Cikupa Kab. Tangerang Bnaten', '-6.229976', '106.508582', NULL, NULL, 108, 42, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST', 'Proses IMB', '2012', '0000-00-00', NULL, 'STP\r', 1),
(344, 'BTTG0068', 'Saga', '34,2', 'TSEL, XL', 'Jl. Kamp. Pekong Rt.01/01 Ds. Saga Kec. Balaraja kab. Tangerang jawa barat', '-6.17589', '106.46117', NULL, NULL, 144, 42, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST', 'Proses IMB', '2012', '0000-00-00', NULL, 'STP\r', 1),
(345, 'BTTG0069', 'Carenang Karangharja', '34', 'TSEL', 'Jl. Cisoka - Megu Rt.001 Rw.007 Desa Cempaka Kec. Cisoka Kab. Tangerang', '-6.261877', '106.409731', NULL, NULL, 144, 42, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST', 'Proses IMB', '2012', '0000-00-00', NULL, 'STP\r', 1),
(346, 'BTTG0070', 'Pakenjahan', '34', 'TSEL', 'Kampung Pinggir Rawa RT.001 RW.001 Desa Kosambi Dalam Kec. Mekar Baru Kabupaten tangerang', '-6.08977', '106.40217', NULL, NULL, 180, 52, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST', 'Proses IMB', '2012', '0000-00-00', NULL, 'STP\r', 1),
(347, 'BTTG0076', 'INDUSTRI PASIR JAYA', '41,34', 'ISAT, TSEL', 'JL. KAWASAN NO. 24 RT 5 RW3 KEL. SUKAMANTRI KEC. PASAR KEMIS , KAB. TANGGERANG', '-6.17948', '106.54453', NULL, NULL, 100, 42, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 4 Legs', '643.3/5521-BP2T/2010', '2010', '2010-06-24', NULL, 'Ex. Nurama\r', 1),
(348, 'BTTG0077', 'TAMAN BANDARA', '42,6,2,10', 'Flexi, H3I, XL, SMART', 'JL DADAP RT.03 RW. 11 KEL DADAP KEC KOSAMBI, KAB TANGERANG', '-6.093949', '106.700562', NULL, NULL, 192, 32, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 4 Legs', '643.3/5527-BP2T/2010', '2007', '2010-07-07', NULL, 'Ex. Nurama\r', 1),
(349, 'BTTG0079', 'CIHUNI LEGOK', '42,6,2,34,10', 'Flexi, H3I, XL, TSEL, SMART', 'Kp. Anggris Desa Curug Sangereng, RT.01/RW.05, Kec. Kelapa Dua, Tangerang', '-6.24813', '106.61359', NULL, NULL, 225, 42, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST', '644.4/188-DBP/2008', '2008', '2008-01-01', NULL, 'Ex. DCI\r', 1),
(350, 'BTTG0080', 'BUMI INDAH PASAR KEMIS', '2', 'XL', 'Jl. H.M. Nur, Kp. Gelam Desa Pabuaran RT.03/RW.01, Kel. Huta Jaya, Kec. Pasar Kemis, Tangerang', '-6.17408', '106.56315', NULL, NULL, 120, 42, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST', '644.4/185-DBP/2008', '2008', '2008-05-25', NULL, 'Ex. DCI\r', 1),
(351, 'BTTG0081', '3G-Parigi Cikande', '2', 'XL', 'Jl. Raya Serang Rt 03 Rw 04 Desa Cikande Kec. Jayanti kab. Tangerang', '-6.209781', '106.378337', NULL, NULL, 180, 52, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST', 'Proses IMB', '2012', '0000-00-00', NULL, 'STP\r', 1),
(352, 'BTTG0083', 'Tiga Raksa', '34', 'TSEL', 'Jl. Keramat Kadu Agung RT.02 RW.03 Desa Margasari Kec. Tigaraksa Kab. Tangerang', '-6.276398', '106.497163', NULL, NULL, 225, 52, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 4 Legs', '643.3/985-BP2T/2011', '2010', '2011-09-02', NULL, 'Ex. Netwave\r', 1),
(353, 'BTTG0084', 'Jambu Karya', '34,2', 'TSEL, XL', 'JL. Raya Kukun Daon RT/RW 02/01 Desa Jambu Karya Kec. Rajeg Kab. Tangerang', '-6.13037', '106.46336', NULL, NULL, 225, 52, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 4 Legs', '643.3/992-BP2T/2011', '2010', '2011-09-28', NULL, 'Ex. Netwave\r', 1),
(354, 'BTTG0085', 'Pangarengan', '34,2,6', 'TSEL, XL, H3I', 'Kp. Baru Cakop RT17/04 Desa Pengarengan Kec. Rajeg Kab. Tangerang', '-6.107954', '106.485346', NULL, NULL, 225, 52, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 4 Legs', '643.3/989-BP2T/2011', '2010', '2011-09-28', NULL, 'Ex. Netwave\r', 1),
(355, 'BTTG0086', 'Kramat Sepatan', '34', 'TSEL', 'Kp. Buaran Bambu RT 004/005 Desa Buaran Jambu Kec. Pakuhaji Kab. Tangerang', '-6.0672', '106.61011', NULL, NULL, 225, 52, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 4 Legs', '643.3/986-BP2T/2011', '2010', '2011-09-28', NULL, 'Ex. Netwave\r', 1),
(356, 'BTTG0087', 'Ketapang Mauk', '34,2,6', 'TSEL, XL, H3I', 'Kp. Ketapang RT/RW 02/03 Desa Ketapang Kec. Mauk Kab. Tangerang', '-6.04044', '106.51468', NULL, NULL, 225, 52, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 4 Legs', '643.3/991-BP2T/2011', '2010', '2011-09-28', NULL, 'Ex. Netwave\r', 1),
(357, 'BTTG0088', 'Kebon Nangka', '34,2', 'TSEL, XL', 'Kp. Kebon Nangka RT 01/ RW01 Desa Karang Serang Kec. Mauk Kab. Tangerang', '-6.03304', '106.55769', NULL, NULL, 225, 52, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 4 Legs', '643.3/993-BP2T/2011', '2010', '2011-09-28', NULL, 'Ex. Netwave\r', 1),
(358, 'BTTG0089', 'Patra Manggala', '34,2,6', 'TSEL, XL, H3I', 'Kp. Kisepat RT 14/03, Kel. Mauk Barat, Kec. Mauk, Kab. Tangerang', '-6.07186', '106.48505', NULL, NULL, 225, 52, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 4 Legs', '643.3/987-BP2T/2011', '2010', '2011-09-28', NULL, 'Ex. Netwave\r', 1),
(359, 'BTTG0090', 'Kp. Pasir Rawi', '34,2,6', 'TSEL, XL, H3I', 'JL. Raya Mekar Wangi RT/RW 05/05 Desa Mekarwangi Kec. Cisauk Kab. Tangerang', '-6.3559', '106.60043', NULL, NULL, 225, 52, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 4 Legs', '643.3/990-BP2T/2011', '2010', '2011-09-28', NULL, 'Ex. Netwave\r', 1),
(360, 'BTTG0091', 'Gunung Kaler', '34', 'TSEL', 'Jl Raya Kresek, RT.03/RW.04 Desa Onyam Kec. Gunung kaler Kab. Tangerang', '-6.09223', '106.36283', NULL, NULL, 180, 72, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 4 Legs', '643.3/307-BP2T/2012', '2011', '2012-08-07', NULL, 'Ex. Netwave\r', 1),
(361, 'BTTG0092', 'Waliwis', '34', 'TSEL', 'Kampung Merapi RT 01/RW 02 Desa Waliwis Kec. Mekar Baru Kab. Tangerang', '-6.06621', '106.39263', NULL, NULL, 180, 72, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 4 Legs', '643.3/246-BP2T/2012', '2011', '2012-07-18', NULL, 'Ex. Netwave\r', 1),
(362, 'BTTG0093', 'Desa Cituis', '34,6', 'TSEL, H3I', 'Kampung Rawakidang RT 05/RW 01 Desa Rawakidang Kec. Sukadiri Kab. Tangerang', '-6.06229', '106.56485', NULL, NULL, 234, 52, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 4 Legs', '643.3/377-BP2T/2012', '2011', '2012-09-03', NULL, 'Ex. Netwave\r', 1),
(363, 'BTTG0094', 'Cibarebeg', '34', 'TSEL', 'Kampung Jeunjing, Desa Jeunjing, Kec Cisoka, Kabupaten Tangerang', '-6.26349', '106.44456', NULL, NULL, 144, 52, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 4 Legs', 'Proses IMB', '2012', '0000-00-00', NULL, 'Ex. Netwave\r', 1),
(364, 'BTTG0095', 'Tegal Kunir Kidul', '34,43', 'TSEL, HCPT', 'Kampung Tegal Kunir Kidul RT 014 RW 04, Desa Tegal Kunir Kidul, Kecamatan Mauk, Kabupaten Tangerang', '-6.07017', '106.53587', NULL, NULL, 200, 52, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 4 Legs', 'Proses IMB', '2012', '0000-00-00', NULL, 'Ex. Netwave\r', 1),
(365, 'BTTG0096', 'Kosambi Sepatan', '34', 'TSEL', 'kampung Kosambi RT 014 RW 04, Desa Kosambi, Kecamatan Sukadiri,Kabupaten Tangerang', '-6.10428', '106.56311', NULL, NULL, 200, 52, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 4 Legs', 'Proses IMB', '2012', '0000-00-00', NULL, 'Ex. Netwave\r', 1),
(366, 'BTTG0097', 'Industri Pasir Jaya', '2,34', 'XL, TSEL', 'Kawasan Industri Blok AG - Kp. Pasir Awi, Desa Bunder Kec. Cikupa Kab. Tangerang', '-6.187978', '106.539628', NULL, NULL, 200, 52, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 4 Legs', 'Proses IMB', '2012', '0000-00-00', NULL, 'Ex. Netwave\r', 1),
(367, 'BTTG0098', 'Cibiuk', '2,34', 'XL, TSEL', 'Kp. Gandasari RT 025 RW 005 Jl. Raya Serang KM. 22.5 Desa Cibadak Kec. Cikupa Kab. Tangerang', '-6.19062', '106.4678', NULL, NULL, 200, 52, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 4 Legs', 'Proses IMB', '2012', '0000-00-00', NULL, 'Ex. Netwave\r', 1),
(368, 'BTTG0099', 'Pabrik Pasir Jaya', '34,2,6', 'TSEL, XL, H3I', 'Kp. Kadu jaya RT 01 RW 01, Desa Kadu Jaya, Kec. Curug, Kabupaten Tangerang', '-6.20891', '106.55847', NULL, NULL, 200, 52, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 4 Legs', 'Proses IMB', '2012', '0000-00-00', NULL, 'Ex. Netwave\r', 1),
(369, 'BTTG0100', 'Kandawati', '2', 'XL', 'Jl.Kp.Belut Tegal RT.08/RW.02 Desa Kandawati, Kec.Gn.kaler,Kab.Tangerang', '-6.11335', '106.35913', NULL, NULL, 200, 52, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 4 Legs', 'Proses IMB', '2012', '0000-00-00', NULL, 'Ex. Netwave\r', 1),
(370, 'BTTG0101', 'Laksana', '34', 'TSEL', 'Kp. Gerong RT 002 RWQ 004, Desa Kiarapayung Kec.Paku Haji ,Kab. Tangerang ', '-6.08608', '106.61485', NULL, NULL, 200, 52, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 4 Legs', 'Proses IMB', '2012', '0000-00-00', NULL, 'Ex. Netwave\r', 1),
(371, 'BTTG0102', 'Jatake', '34,10', 'TSEL, SMART', 'Jl. Lingkar selatan RT 04 RW 02 Kel. Jatake , Kec. Pagedangan Kab. Tangerang', '-6.32247', '106.59332', NULL, NULL, 200, 52, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 4 Legs', 'Proses IMB', '2012', '0000-00-00', NULL, 'Ex. Netwave\r', 1),
(372, 'BTTG0103', 'Pangadegan', '34', 'TSEL', 'Jl.Kp.Bugel RT.01/RW.01 Desa Pangadengan, Kec.Pasar kemis,Kab.Tangerang', '-6.13146', '106.56367', NULL, NULL, 200, 52, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 4 Legs', 'Proses IMB', '2012', '0000-00-00', NULL, 'Ex. Netwave\r', 1),
(373, 'BTTG0104', 'Blossom Village ', '34,8', 'TSEL, INUX', 'Kp. Neglasari RT 04 RW 05 Kel. Mekarbaru Kec. Panongan Kab. Tangerang', '-6.25302', '106.52205', NULL, NULL, 200, 52, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 4 Legs', 'Proses IMB', '2012', '0000-00-00', NULL, 'Ex. Netwave\r', 1),
(374, 'BTTG0105', 'Cikupa', '2,34', 'XL, TSEL', 'Kp. Sabrang Cibadak RT 03 RW 04 Desa Pasirgadung Kec. Cikupa, Kab. Tangerang', '-6.20033', '106.52142', NULL, NULL, 200, 52, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 4 Legs', 'Proses IMB', '2012', '0000-00-00', NULL, 'Ex. Netwave\r', 1),
(375, 'BTTG0106', 'Sukasari (Kongsi Baru)', '34', 'TSEL', 'Kp.Leles, RT.002 RW.007, Desa Sindangsari, Kec. Pasar Kemis, Kab. Tangerang', '-6.13757', '106.54294', NULL, NULL, 200, 52, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 4 Legs', 'Proses IMB', '2012', '0000-00-00', NULL, 'Ex. Netwave\r', 1),
(376, 'BTTG0107', 'Curug Budiarto ', '34', 'TSEL', 'Jl. Raya Serdang PLP Curug TRT 03 RW 01 Ds. Serdang Wetan Kec. Legok', '-6.27239', '106.55576', NULL, NULL, 200, 52, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 4 Legs', 'Proses IMB', '2012', '0000-00-00', NULL, 'Ex. Netwave\r', 1),
(377, 'BTTG0110', 'Cisoka', '6,2', 'H3I, XL', 'Jl.Raya Kramat Solear RT.001, RW.002 Desa Solear Kec. Solear Kab. Tangerang', '-6.29494', '106.41305', NULL, NULL, 200, 52, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 4 Legs', '643.3/988-BP2T/2011', '2009', '2011-09-28', NULL, 'Ex. Netwave\r', 1),
(378, 'BTTG0111', 'Pasar Kemis', '34,6,2', 'TSEL, H3I, XL', 'Jl. Kp. Bunder RT.12 RW.02 Desa Bunder Kec. Cikupa Kab. Tangerang', '-6.18366', '106.55211', NULL, NULL, 200, 52, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 4 Legs', '643.3/984-BP2T/2011', '2010', '2011-09-28', NULL, 'Ex. Netwave\r', 1),
(379, 'BTTG0113', 'Nusa Indah Margasari', '34', 'TSEL', 'Kp Cimanggu RT04RW02 Kel Sodong Kec Tigaraksa Kab Tangerang', '-6.28151', '106.49042', NULL, NULL, 130, 42, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST', 'Proses IMB', '2014', '0000-00-00', NULL, 'STP\r', 1),
(380, 'BTTG0115', 'Kutabumi Utama', '2,6', 'XL, H3I', 'Jl. Korma 9 Rt 03 Rw 01, Desa Kota Baru, Kec. Pasar Kemis, Kab. Tangerang, ', '-6.14834', '106.57444', NULL, NULL, 220, 51, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/266-BP2T/2011', '2005', '2011-03-31', NULL, 'Ex. XL\r', 1),
(381, 'BTTG0123', 'Mekarjaya', '2,6,34', 'XL, H3I, TSEL', 'Desa Ranca Kebo Rt 07 Rw 03, Desa Mekarjaya, Kec. Panongan, Kab. Tangerang, ', '-6.305430556', '106.5494556', NULL, NULL, 300, 46, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/719-BP2T/2011', '2005', '2011-07-22', NULL, 'Ex. XL\r', 1),
(382, 'BTTG0124', 'Babat', '2', 'XL', 'Kampung Babat Rt 04 Rw 01, Desa Babat, Kec. Legok, Kab. Tangerang, ', '-6.32498', '106.54596', NULL, NULL, 225, 51, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/728-BP2T/2011', '2005', '2011-07-22', NULL, 'Ex. XL\r', 1),
(383, 'BTTG0125', 'Palasari', '2,6,34,41', 'XL, H3I, TSEL, ISAT', 'Jl. Raya Palasari Rt 01 Rw 02, Kel. Palasari, Kec. Legok, Kab. Tangerang, ', '-6.30601', '106.56921', NULL, NULL, 225, 41, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/265-BP2T/2011', '2005', '2011-03-31', NULL, 'Ex. XL\r', 1),
(384, 'BTTG0126', 'Kaduagung', '2', 'XL', 'Kampung Bugel Rt 03 Rw 02, Kel. Kaduagung, Kec Tigaraksa, Kab. Tangerang, ', '-6.26358', '106.48542', NULL, NULL, 225, 51, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '644.4/282-DBP/2008', '2005', '2008-04-29', NULL, 'Ex. XL\r', 1),
(385, 'BTTG0127', 'Matagara', '2,6,34', 'XL, H3I, TSEL', 'Jl. Pemda Rt 03, Rw 01, Kel. Matagara, Kec. Tigaraksa, Kab. Tangerang, ', '-6.24949', '106.48969', NULL, NULL, 225, 51, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/389-BP2T/2011', '2005', '2011-05-11', NULL, 'Ex. XL\r', 1),
(386, 'BTTG0128', 'Margasari', '2,6', 'XL, H3I', 'Kampung Keduagung Rt 01 Rw 02, Desa Margasari, Kec. Tigaraksa, Kab. Tangerang, ', '-6.27687', '106.4959', NULL, NULL, 225, 51, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/391-BP2T/2011', '2005', '2011-05-11', NULL, 'Ex. XL\r', 1),
(387, 'BTTG0129', 'Kutruk', '2,6', 'XL, H3I', 'Kp. Pabuaran Rt 03 Rw 02, Desa Pasir Barat, Kec. Jambe, Kab. Tangerang, ', '-6.30078', '106.49999', NULL, NULL, 225, 51, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/387-BP2T/2011', '2005', '2011-05-11', NULL, 'Ex. XL\r', 1),
(388, 'BTTG0130', 'Bantar Panjang', '2,6', 'XL, H3I', 'Jl. Cileles Tenjo, Rt 03 Rw 05, Desa Bantarpanjang, Kec. Tigaraksa, Kab. Tangerang, ', '-6.29347', '106.45412', NULL, NULL, 234, 1.6, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/274-BP2T/2011', '2005', '2011-03-31', NULL, 'Ex. XL\r', 1),
(389, 'BTTG0131', 'Munjul', '2,6', 'XL, H3I', 'Kp., Ranca Gede Rt 04 Rw 02, Desa Munjul, Kec. Cisoka, Kab. Tangerang, ', '-6.27716', '106.45921', NULL, NULL, 192, 0.8, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/385-BP2T/2011', '2005', '2011-05-11', NULL, 'Ex. XL\r', 1),
(390, 'BTTG0132', 'Tegal Sari', '2,6', 'XL, H3I', 'Kampungtegalsari Rt 03 Rw 01, Kel. Tegalsari, Kec. Tigaraksa, Kab. Tangerang, ', '-6.25742', '106.44438', NULL, NULL, 180, 0.8, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '644.4/360-DBP/2008', '2005', '2008-04-23', NULL, 'Ex. XL\r', 1),
(391, 'BTTG0133', 'Pasir Nangka', '2,6', 'XL, H3I', 'Jl. Jaya Sentika, Kampung Pasirnangka, Rt 01 Rw 01, Desa Pasirnangka, Kec. Tigaraksa, Kab. Tangerang, ', '-6.23868', '106.47281', NULL, NULL, 225, 0.8, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/1426-BP2T/2011', '2005', '2011-12-30', NULL, 'Ex. XL\r', 1),
(392, 'BTTG0134', 'Budi Mulya', '2,6', 'XL, H3I', 'Jl. Pemda Rt 03 Rw 02, Desa Ciapus, Kel. Budimulya, Kec. Cikupa, Kab. Tangerang, ', '-6.2387', '106.49456', NULL, NULL, 225, 1.6, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/730-BP2T/2011', '2005', '2011-07-22', NULL, 'Ex. XL\r', 1),
(393, 'BTTG0135', 'Bojong Tangerang', '2,6', 'XL, H3I', 'Kp. Bojong Rt 07 Rw 03, Desa Bojong, Kec. Cikupa, Kab. Tangerang, ', '-6.21917', '106.49656', NULL, NULL, 195, 1.6, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/386-BP2T/2011', '2005', '2011-05-11', NULL, 'Ex. XL\r', 1),
(394, 'BTTG0136', 'Jatiwaringin Mauk', '2,6', 'XL, H3I', 'Jl. Raya Mauk No. 43 Rt 02 Rw 01 Desa Jatiwaringin, Kec. Mauk, Kab. Tangerang, ', '-6.08345', '106.543275', NULL, NULL, 225, 1.6, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/271-BP2T/2011', '2005', '2011-03-31', NULL, 'Ex. XL\r', 1),
(395, 'BTTG0139', 'Sela Panjang', '2,6', 'XL, H3I', 'Kampung Selapanjang Rt 03 Rw 03, Desa Selapanjang, Kec. Cisoka, Kab. Tangerang, ', '-6.244008333', '106.4289', NULL, NULL, 225, 0.4, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/264 - BP2T / 2011', '2005', '2011-03-31', NULL, 'Ex. XL\r', 1),
(396, 'BTTG0140', 'Kopereretan', '2,6', 'XL, H3I', 'Kampung Seupang, Rt 04 Rw 01, Desa Koper, Kec. Kresek, Kab. Tangerang, ', '-6.179383333', '106.3909694', NULL, NULL, 225, 0.8, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '644.4/366-DBP/2008', '2005', '2008-05-30', NULL, 'Ex. XL\r', 1),
(397, 'BTTG0141', 'Pabuaran Balaraja', '2,6', 'XL, H3I', 'Jl. Desa Pabuaran, Kampung Cigeureung Rt 10 Rw 03, Desa Pabuaran, Kec. Jayanti, Kab. Tangerang, ', '-6.19006', '106.41427', NULL, NULL, 225, 0.4, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/1445-BP2T/2011', '2005', '2011-12-30', NULL, 'Ex. XL\r', 1),
(398, 'BTTG0142', 'Kronjo', '2', 'XL', 'Kampung Kronjo Rt 03 Rw 01, Desa Kronjo, Kec. Kronjo, Kab. Tangerang, ', '-6.061177778', '106.4245917', NULL, NULL, 225, 0.4, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/108-DBP/2007', '2005', '2007-07-26', NULL, 'Ex. XL\r', 1),
(399, 'BTTG0143', 'Kresek', '2', 'XL', 'Jl. Raya Kresek, Kp. Pasir, Rt 05 Rw 02, Desa Kresek, Kec. Kresek, Kab. Tangerang, ', '-6.130858333', '106.3791472', NULL, NULL, 225, 0.4, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/439-BP2T/2011', '2005', '2011-05-24', NULL, 'Ex. XL\r', 1),
(400, 'BTTG0144', 'Pakuhaji', '2,6,34', 'XL, H3I, TSEL', 'Jl. Pondok Pasar Kampung Duri, Desa Pakualam, Kec. Pakuhaji, Kab. Tangerang, ', '-6.07575', '106.5884806', NULL, NULL, 225, 0.4, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/1417-BP2T/2011', '2005', '2011-12-30', NULL, 'Ex. XL\r', 1),
(401, 'BTTG0145', 'Tegalangus', '2', 'XL', 'Jl. Tegalangus Rt 01 Rw 03, Kel. Tegalangus, Kec. Teluknaga, Kab. Tangerang, ', '-6.04188', '106.66498', NULL, NULL, 225, 0.4, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '644.4/353-DBP/2008', '2005', '2008-06-30', NULL, 'Ex. XL\r', 1),
(402, 'BTTG0146', 'Sodong', '2,6', 'XL, H3I', 'Jl. Arya Wangsa Kampung Sodong, Rt03 Rw 03, Desa Sodong, Kec. Tigaraksa, Kab. Tangerang, ', '-6.278811111', '106.4759556', NULL, NULL, 225, 0.4, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/761-BP2T/2011', '2005', '2011-08-01', NULL, 'Ex. XL\r', 1),
(403, 'BTTG0147', 'Jambe Tangerang', '2,6', 'XL, H3I', 'Jl. Aryawasangkara Rt 02 Rw 01, Kel. Tapos, Kec. Tigaraksa, Kab. Tangerang, ', '-6.297108333', '106.4749778', NULL, NULL, 225, 1.6, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '644.4/281-DBP/2008', '2005', '2009-04-29', NULL, 'Ex. XL\r', 1),
(404, 'BTTG0148', 'Tanjakan', '2', 'XL', 'Jl. Rajeg Mauk RT.07/RW.04 Desa Lembang Sari, Kec. Rajeg, Kab. Tangerang', '-6.089413889', '106.5181306', NULL, NULL, 225, 1.6, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/713-BP2T/2011', '2005', '2011-07-22', NULL, 'Ex. XL\r', 1),
(405, 'BTTG0149', 'Benda Balaraja', '2,6,34', 'XL, H3I, TSEL', 'Kp Pabuaran Rt 03/02 Desa merak kec.Balaraja,kab.Tangerang, ', '-6.16139', '106.44459', NULL, NULL, 225, 0.8, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/714-BP2T/2011', '2007', '2011-07-22', NULL, 'Ex. XL\r', 1),
(406, 'BTTG0150', 'Badakanom Rajeg', '2,6', 'XL, H3I', 'Kp Onom Rt 03/03,desa Badakom,kec.Rajeg,Kab.Tangerang', '-6.149', '106.48151', NULL, NULL, 225, 1.6, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/711-BP2T/2011', '2007', '2011-07-22', NULL, 'Ex. XL\r', 1),
(407, 'BTTG0151', 'Sindangasih Pasarkemis', '2,6,34', 'XL, H3I, TSEL', 'Kampung Carang Pulang Rt 04/02 Desa Wanakerta, kec.Pasar Kemis,Kab Tangerang', '-6.17346', '106.5035', NULL, NULL, 225, 51, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/712-BP2T/2011', '2007', '2011-07-22', NULL, 'Ex. XL\r', 1),
(408, 'BTTG0152', 'Gintung Mauk', '2,6,34,41', 'XL, H3I, TSEL, ISAT', 'Jl. Raya Bolang RT03 RW01, Desa Sukasari, Kec. Rajeg, Kab. Tangerang, ', '-6.12234', '106.5508', NULL, NULL, 225, 51, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/709-BP2T/2011', '2007', '2011-07-22', NULL, 'Ex. XL\r', 1),
(409, 'BTTG0153', 'Sindangjaya Pasarkemis', '2,6,34', 'XL, H3I, TSEL', 'Kampung Gandu (dampit) Desa Sindangjaya,kec.Pasarkemis,kab.Tangerang,prop.', '-6.14746', '106.50631', NULL, NULL, 225, 51, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '644.4/311-DBP/2008', '2007', '2008-05-28', NULL, 'Ex. XL\r', 1),
(410, 'BTTG0154', 'Jatimulya Kosambi', '2', 'XL', 'Jl. Jatimulya RT08 RW07, Kel. Jatimulya, Kec. Kosambi, Tangerang, ', '-6.090555556', '106.6829444', NULL, NULL, 225, 41, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/1444-BP2T/2011', '2007', '2011-12-30', NULL, 'Ex. XL\r', 1),
(411, 'BTTG0155', 'Keboncau Teluknaga', '2', 'XL', 'Kampung Alang Besar RT17 RW05, Kel. Kebonacau, Kec. Teluknaga, Kab. Tangerang, ', '-6.09378', '106.65641', NULL, NULL, 225, 51, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '644.4/287-DBP/2008', '2007', '2008-03-13', NULL, 'Ex. XL\r', 1),
(412, 'BTTG0156', 'Rancailat Kresek', '2,6', 'XL, H3I', 'DesaLegok Sukamaju RT04 RW01, Kec. Kemiri, Kab. Tangerang', '-6.11289', '106.45061', NULL, NULL, 225, 51, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/1427-BP2T/2011', '2007', '2011-12-30', NULL, 'Ex. XL\r', 1),
(413, 'BTTG0157', 'Gelamjaya Pasarkemis', '2', 'XL', 'Jl. Kayu Putih IIB-11/28 Pondok Rejeki RT. 01/05 Kel. Kuta Baru Kec. Pasar Kemis Kab. Tangerang ', '-6.15736', '106.58', NULL, NULL, 100, 31, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '644.4/293-DBP/2008', '2008', '2008-06-27', NULL, 'Ex. XL\r', 1),
(414, 'BTTG0158', 'Sindangsono Pasarkemis', '2,6,34', 'XL, H3I, TSEL', 'Kp. Cayur Rt. 02 RW 01 Desa sindangsono Kec. Pasar Kemis Kab. Tangerang', '-6.16921', '106.47655', NULL, NULL, 180, 51, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/717-BP2T/2011', '2007', '2011-07-22', NULL, 'Ex. XL\r', 1),
(415, 'BTTG0168', 'Karanganyar Mauk', '2,6,34', 'XL, H3I, TSEL', 'Jl. Raya Kemiri No.1 RT.07/RW.02 Kel. Kemiri, Kec. Mauk, Tangerang', '-6.09484', '106.46695', NULL, NULL, 225, 51, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/1418-BP2T/2011', '2005', '2011-12-30', NULL, 'Ex. XL\r', 1),
(416, 'BTTG0169', 'Sukawali Mauk', '2,6', 'XL, H3I', 'Kp. Cituis Rt 02 / RW 01, Desa Sukawali, Kel. Sukawali, Kec. Paku Haji, Tangerang, ', '-6.03938', '106.58337', NULL, NULL, 225, 51, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/276 - BP2T / 2011', '2005', '2011-03-31', NULL, 'Ex. XL\r', 1),
(417, 'BTTG0170', 'Kosambi Barat', '2,6,34', 'XL, H3I, TSEL', 'Jl. Raya Kosambi Barat No. 31. RT.007/03 Kel. Kosambi Barat, Kec. Kosambi, Kab. Tangerang, ', '-6.07991', '106.69476', NULL, NULL, 144, 51, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/1433-BP2T/2011', '2006', '2011-12-30', NULL, 'Ex. XL\r', 1),
(418, 'BTTG0171', 'Tanjunganom mauk', '2,6', 'XL, H3I', 'Jl. RE Martadinata RT.10/RW.04, Desa Tanjung Anom, Kec. Mauk, Kab. Tangerang', '-6.025722222', '106.5339444', NULL, NULL, 216, 51, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/1416-BP2T/2011', '2005', '2011-12-30', NULL, 'Ex. XL\r', 1),
(419, 'BTTG0172', 'Sasak Mauk', '2,6', 'XL, H3I', 'Kp. Kijereng RT 07 / RW 02, Kel. Sasak, Kec. Mauk, Tangerang, ', '-6.07261', '106.51561', NULL, NULL, 144, 51, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/273 - BP2T / 2011', '2005', '2011-03-31', NULL, 'Ex. XL\r', 1),
(420, 'BTTG0173', 'Lembangsari Rajeg', '2,6', 'XL, H3I', 'Jl. Kp. Rajawali, Jl. Raya Rajeg Kp. Rajeg Rt 02/Rw 01 Kel. Rajeg  Kec. Rajeg Tangerang - ', '-6.1137', '106.51725', NULL, NULL, 144, 51, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/1429-BP2T/2011', '2005', '2011-12-30', NULL, 'Ex. XL\r', 1),
(421, 'BTTG0174', 'Buniayu Balaraja', '2,6', 'XL, H3I', 'Kp. Tonjok Desa Kemuning RT 04 / RW 02, Kel. Kemuning, Kec, Kresek, Tangerang, ', '-6.13223', '106.42583', NULL, NULL, 144, 51, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/722-BP2T/2011', '2005', '2011-07-22', NULL, 'Ex. XL\r', 1),
(422, 'BTTG0175', 'Kedung Kronjo', '2,6,34', 'XL, H3I, TSEL', 'Jl. Raya Kresek, Kp. Kedung I RT 07 RW 02. Kel. Kedung, Kec. Kresek, tangerang, ', '-6.065222222', '106.3567778', NULL, NULL, 144, 51, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/1432-BP2T/2011', '2006', '2011-12-30', NULL, 'Ex. XL\r', 1),
(423, 'BTTG0176', 'Curug Gandasari', '2', 'XL', 'Jl. Cijengir RT16 RW03, Ds. Kadu, Kec. Curug, Tangerang, ', '-6.2475', '106.5722778', NULL, NULL, 100, 31, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/760-BP2T/2011', '2007', '2011-01-08', NULL, 'Ex. XL\r', 1),
(424, 'BTTG0177', 'Perumnas Karawaci', '2', 'XL', 'Jalan Empu Barada Raya No. 65A, Rt.006 Rw.001, Kel Bencongan, Kecamatan Curug, Kab Tangerang, ', '-6.21589', '106.60708', NULL, NULL, 100, 31, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/1437-BP2T/2011', '2007', '2011-12-30', NULL, 'Ex. XL\r', 1),
(425, 'BTTG0178', 'Kelapa Puan Gading Serpong', '2', 'XL', 'Jl. Kampung Kalipaten RT03 RW04 No. 40, Kel. Pakulonan Barat, Kec. Curug, Kab. Tanggerang, ', '-6.23078', '106.6305', NULL, NULL, 100, 31, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/122-DBP/2007', '2006', '2007-12-14', NULL, 'Ex. XL\r', 1),
(426, 'BTTG0179', 'Binong Legok Curug', '2,6', 'XL, H3I', 'Kp. Sempur RT11 RW03, Desa Kadu, Kec. Curug, Tanggerang', '-6.23464', '106.56825', NULL, NULL, 100, 31, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/720-BP2T/2011', '2006', '2011-07-22', NULL, 'Ex. XL\r', 1),
(427, 'BTTG0180', 'Pakulonan Barat Serpong', '2,6,34,8', 'XL, H3I, TSEL, INUX', 'Jl. Rumpak Sinang RT.01 RW.01 Kelurahan Pakulonan Barat Kecamatan Curug', '-6.2416', '106.6335', NULL, NULL, 100, 31, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '644.4/263-DBP-2007', '2006', '2007-12-03', NULL, 'Ex. XL\r', 1),
(428, 'BTTG0181', 'Kademangan Serpong', '2', 'XL', 'Jl Raya Serpong Rt 001/02, Kel.Kademangan, Kec.Cisauk Serpong, Kab.Tangerang', '-6.33682', '106.67265', NULL, NULL, 144, 51, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/02-DBP/2008', '2006', '2008-12-02', NULL, 'Ex. XL\r', 1),
(429, 'BTTG0182', 'Tigaraksa', '2', 'XL', 'JALAN CIATUY RT 01, RW 02, DESA SODONG, KECAMATAN TIGARAKSA, KABUPATEN TANGERANG, PROP. ', '-6.278055556', '106.48375', NULL, NULL, 100, 31, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/132-DBP/2007', '2005', '2007-12-14', NULL, 'Ex. XL\r', 1),
(430, 'BTTG0183', 'Cicalengka Serpong', '2,6', 'XL, H3I', 'Jl. Legok Rt. 01 Rw. 01 Desa Cicalengka, Kp. Pagedangan Kec. Pagedangan, Tangerang - ', '-6.29946', '106.61394', NULL, NULL, 225, 50, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 4 Legs', '643.3/454-BP2T/2011', '2004', '2011-05-24', NULL, 'Ex. XL\r', 1),
(431, 'BTTG0190', 'Serpong Rumpin', '2', 'XL', 'Kampung Cisauk Rt.3/4, Ds. Situgadung, Kec. Pagedagan, Kab. Tangerang', '-6.32048', '106.6417', NULL, NULL, 100, 31, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '644.4/285-DBP/2008', '2008', '2008-06-10', NULL, 'Ex. XL\r', 1),
(432, 'BTTG0194', 'Sangiang Kec.Sepatan', '2,6', 'XL, H3I', 'Jl Hasanudin Kp sangiang RT 01 RW 01 Desa sangiang Kec sepatan Kabupaten Tangerang ', '-6.10336', '106.59971', NULL, NULL, 100, 31, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/1431-BP2T/2011', '2008', '2011-12-30', NULL, 'Ex. XL\r', 1),
(433, 'BTTG0195', 'Blukbuk-Kronjo', '2', 'XL', 'Kampung Klebet rt. 02/01 Desa Gandaria Kec. Mekar Baru Kab. Tangerang, ', '-6.10335', '106.40542', NULL, NULL, 144, 51, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '651.1/113-DTRP/2008', '2008', '2008-06-18', NULL, 'Ex. XL\r', 1),
(434, 'BTTG0196', 'Prima Tangerang', '2', 'XL', '-', '-6.16142', '106.588', NULL, NULL, 30, 9, NULL, NULL, 0, NULL, NULL, NULL, '1', 'Pole', 'Proses IMB', '2009', '0000-00-00', NULL, 'Ex. XL\r', 1),
(435, 'BTTG0198', 'Villa Ilhami Karawaci', '2', 'XL', 'Salon & Beauty Clinic La Diva Jl. Imam Bonjol, Karawaci, Kab Tangerang', '-6.2281', '106.61508', NULL, NULL, 20, 9, NULL, NULL, 0, NULL, NULL, NULL, '1', 'Pole', 'Proses IMB', '2008', '0000-00-00', NULL, 'Ex. XL\r', 1),
(436, 'BTTG0201', 'Binong Permai Kec.Curug', '2,6,8', 'XL, H3I, INUX', 'JL.Babakan Binong Rt.03/Rw.04 Kel.Binong,Kec.Curug,Kab.Tangerang, Prop.', '-6.25029', '106.585', NULL, NULL, 100, 31, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '851.1/104-DTRP/2008', '2008', '2008-06-27', NULL, 'Ex. XL\r', 1),
(437, 'BTTK0053', 'Karet Kuta Bumi ', '34', 'TSEL', 'Jl. Raya Kotabumi Kp. Teriti RT.01 RW.05 Kel. Karet Kec. Sepatan', '-6.153001', '106.59058', NULL, NULL, 104, 32, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST', 'Proses IMB', '2014', '0000-00-00', NULL, 'STP\r', 1),
(438, 'BTTK0056', 'Mekarjaya Sepatan', '2,6', 'XL, H3I', 'Kp Ilal Rt 02 Rw 03 Desa Pengadengan Kec.pasar Kemis,Kota Tangerang', '-6.14467', '106.5527', NULL, NULL, 180, 51, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/710-BP2T/2011', '2007', '2011-07-22', NULL, 'Ex. XL\r', 1),
(439, 'BTTK0103', 'WIJAYAKUSUMATIMUR', '34', 'TSEL', 'Jl. Perum Dasana Indah Blok. RB 1 No.12 RT.01 RW.18 Kel. Bojong Nangka Kec. Kelapa Dua Kab. Tangerang', '-6.25466', '106.60317', NULL, NULL, 150, 20, NULL, NULL, 0, NULL, NULL, NULL, '1', 'MT 20', 'Proses IMB', '2016', '0000-00-00', NULL, 'STP\r', 1),
(440, 'BTTK0104', 'INDUSTRICIKUPATELAGA', '34', 'TSEL', 'Kp. Talaga Desa. Talaga RT 002/02 Kec. Cikupa Kab. Tangerang', '-6.21784', '106.50605', NULL, NULL, 150, 32, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST', 'Proses IMB', '2016', '0000-00-00', NULL, 'STP\r', 1),
(441, 'BTTS0041', 'BPPT (Kawasan Puspitek)', '2,10,6,34', 'XL, SMART, H3I, TSEL', 'JL. BPPT Jl. Amd. Anamui Kampung Bojong RT 001 RW 03 Kel. Suradita Kec. Cisauk Tangerang', '-6.35768', '106.65493', NULL, NULL, 195, 72, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/6868-BP2T/2009', '2008', '2009-07-21', NULL, 'Ex. Axis\r', 1),
(442, 'BTTG0119', 'Ranca Kelapa Cikupa', '2,6', 'XL, H3I', 'Jl. Pasa Korolet No. 53, RT.11/RW.03, Desa Rancaiyuh, Kec. Panongan Kab. Tangerang', '-6.302683333', '106.5242694', NULL, NULL, 144, 51, NULL, NULL, 0, NULL, NULL, NULL, '1', 'SST 3 Legs', '643.3/277-BP2T/2011', '2006', '2011-02-23', NULL, '-\r', 1),
(443, 'SMC.BTTK0108', 'JLGUNUNGKINTAMANI', '34', 'TSEL', 'Jl. Pancoran Mas RT 02 RW 02 Kel. Binong, Kec. Curug Kab. Tangerang, Banten', '-6.23043', '106.59324', NULL, NULL, 0, 25, NULL, NULL, 0, NULL, NULL, NULL, '1', 'Micropole', 'On Process', '2016', '1970-01-01', NULL, '-\r', 1),
(444, 'JKT_ 06N414', '-', '43,5', 'HCPT,Smartfren ', 'Jl. Kp. Sukadiri Rt.02/01 Kec.Sukadiri', '-6.0487', '106.5600', NULL, NULL, 144, 52, NULL, NULL, 100000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 2),
(445, 'JKT_ 06N396', '-', '5', 'Smartfren', 'Gembong Masjid Rt.02/01 Kec.Balaraja', '-6.2164', '106.4190', NULL, NULL, 200, 52, NULL, NULL, 300000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 2),
(446, 'JKT_ 06N412', '-', '5', 'Smartfren', 'Kp. Kelebet Rt.05/04 Klebet Kemiri', '-6.0958', '106.4580', NULL, NULL, 180, 52, NULL, NULL, 100000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 2),
(447, 'JKT_ 06N417', '-', '5', 'Smartfren', 'Kp. Pulo Rt.09/03 Talok Kresek', '-6.1393', '106.3970', NULL, NULL, 196, 52, NULL, NULL, 200000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 2),
(448, 'JKT_ 06N972', '-', '5', 'Smartfren', 'Kp. Ps.Kemis Rt.09/02 Sukaharja Ps.Kemis', '-6.1721', '106.5290', NULL, NULL, 200, 42, NULL, NULL, 200000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 2),
(449, 'JKT_ 06N336', '-', '5', 'Smartfren', 'Jl. Baru No.8 Rt.01/01 Gelamjaya Ps.Kemis', '-6.1745', '106.5670', NULL, NULL, 180, 25, NULL, NULL, 400000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 2),
(450, 'JKT_ 06N290', '-', '5', 'Smartfren', 'Kosambi Timur Kec.Kosambi', '-6.0849', '106.6990', NULL, NULL, 100, 25, NULL, NULL, 500000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 2),
(451, 'JKT_ 06N332', '-', '5', 'Smartfren, Tsel', 'Kp. Pemukiman Rt.03/05 Kosambi', '-6.0784', '106.6630', NULL, NULL, 160, 42, NULL, NULL, 800000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 2),
(452, 'JKT_ 06N111', '-', '5', 'Smartfren', 'Kp.Pengkolan Rt.04/01 Ps.Gadung Cikupa', '-6.2202', '106.5290', NULL, NULL, 200, 52, NULL, NULL, 250000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 2),
(453, 'JKT_ 06N418', '-', '5', 'Smartfren', 'Pulau Pelawat Rt.01/01 Rajeg Mulya', '-6.1105', '106.5370', NULL, NULL, 144, 52, NULL, NULL, 300000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 2),
(454, 'JKT_ 06N313', '-', '5', 'Smartfren', 'Jl.Klp Dua Rt.04/04 Klp Dua Curug', '-6.2364', '106.6130', NULL, NULL, 168, 52, NULL, NULL, 600000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 2),
(455, 'JKT_ 06N397', '-', '5', 'Smartfren', 'Jl.Kodam Perm.Griya parahita Blok A.22', '-6.3287', '106.6110', NULL, NULL, 186, 52, NULL, NULL, 250000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 2),
(456, 'JKT_ 06N413', '-', '5', 'Smartfren, Tsel', 'Kp. Pangaiokan Rt.01/02 Ps.Kemis', '-6.1483', '106.5740', NULL, NULL, 144, 52, NULL, NULL, 300000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 2),
(457, 'JKT_ 06N979', '-', '5', 'Smartfren, Tsel', 'Jl. Sudirman Rt.01/01 Sepatan', '-6.1205', '106.5810', NULL, NULL, 120, 52, NULL, NULL, 200000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 2),
(458, 'S0001', 'Lontar Selatif', '3', 'Gihon', 'Kp. Selatif Ds.Lontar Kec.Kemiri', '-6.03534', '106.271723', NULL, NULL, 125, 52, NULL, NULL, 150000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 3),
(459, 'S0002', 'Sindang Sukamanah', '3', 'Gihon', 'Jl.Rancabango Kec.rajeg', '-6.05264', '106.29449', NULL, NULL, 100, 70, NULL, NULL, 150000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 3),
(460, 'S0003', 'Tanah Merah', '3', 'Gihon', 'Kp. Utan Jati Kedaung Barat Sepatan', '-6.07204', '106.36124', NULL, NULL, 100, 75, NULL, NULL, 250000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 3),
(461, 'S0004', 'Sepatan', '3', 'Gihon', 'Desa Tanah Merah Kec.Sepatan', '-6.07078', '106.35328', NULL, NULL, 100, 80, NULL, NULL, 250000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 3),
(462, 'S0005', 'Legok Permai', '3', 'Gihon', 'Kp.Legok Kec.Legok', '-6.17084', '106.35236', NULL, NULL, 80, 72, NULL, NULL, 300000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 3),
(463, 'S0006', 'Pasir Randu', '3', 'Gihon', 'Kp.Psr.Randu Kec.Curug', '-6.133721', '106.342776', NULL, NULL, 100, 80, NULL, NULL, 400000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 3),
(464, 'S0007', 'Citra Raya Square', '3', 'Gihon', 'Jl.Ry.Serang Kec.Cikupa', '-6.229111', '106.521472', NULL, NULL, 100, 80, NULL, NULL, 300000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 3),
(465, 'JAW-CCJ-0040-F-P', '-', '50', 'H3I / TRI', 'Desa Cisauk Kec. Cisauk Kab. Tangerang', '-6.3273', '106.61646', NULL, NULL, 75, 48, NULL, NULL, 150000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(466, 'JAW-CCJ-0049-F-P', '-', '45,51', 'M-8, H3I / TRI', 'Desa Bunder Kec. Cikupa Kab. Tangerang', '-6.21794', '106.55717', NULL, NULL, 80, 48, NULL, NULL, 300000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(467, 'JAW-CCJ-0050-F-P', '-', '50', 'H3I / TRI', 'Desa Talaga Kec. Balaraja Kab. Tangerang', '-6.19964', '106.46279', NULL, NULL, 100, 42, NULL, NULL, 300000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(468, 'JAW-CCJ-0043-M-B', '-', '45', 'M-8', 'Kp. Pasir Desa Kresek Kec. Kresek Kab. Tangerang', '-6.12798', '106.38056', NULL, NULL, 60, 53, NULL, NULL, 200000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(469, 'JAW-CCJ-0044-M-B', '-', '2,51,47', 'XL, H3I / TRI, T-SEL', 'Kp. Cirarab Desa Cirarab Kec. Legok Kab. Tangerang', '-6.32812', '106.56629', NULL, NULL, 70, 43, NULL, NULL, 200000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(470, 'JAW-CCJ-0087-M-B', '-', '45,2,51', 'M-8, XL, H3I / TRI', 'Kp. Pasir Gadung Desa Pasir Gadung Kec. Cikupa Kab. Tangerang', '-6.19978', '106.52599', NULL, NULL, 100, 60, NULL, NULL, 300000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(471, 'JAW-CCJ-0091-M-B', '-', '50', 'H3I / TRI', 'Kp. Bugel Desa Kadu Agung Kec. Tigaraksa Kab. Tangerang', '-6.26408', '106.48618', NULL, NULL, 120, 60, NULL, NULL, 200000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(472, 'JAW-CCJ-0011-M-B', '-', '45,2,51', 'M-8, XL, H3I / TRI', 'Jl. Raya PLP Curug Desa Curug Kulon Kec. Curug Kab. Tangerang', '-6.25629', '106.5592', NULL, NULL, 60, 53, NULL, NULL, 350000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4);
INSERT INTO `site` (`id`, `site_id`, `site_name`, `operator_id`, `operator_name`, `alamat`, `lat_koord`, `long_koord`, `lokasi_kode`, `pengguna_menara`, `luas_tanah`, `tinggi_menara_1`, `tinggi_menara_2`, `koef`, `njop_m`, `njop_2_persen`, `retribusi`, `retribusi_s_d_mei`, `status_tampil`, `type_power`, `imb_no`, `imb_tahun`, `tanggal`, `tahun_menara`, `keterangan`, `vendor_id`) VALUES
(473, 'JAW-CCJ-0020-M-B', '-', '45,2,47', 'M-8, XL, T-SEL', 'Kp. Sodong Desa Sodong Kec. Tigaraksa Kab. Tangerang', '-6.2868', '106.47229', NULL, NULL, 100, 53, NULL, NULL, 250000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(474, 'JAW-CCJ-0052-M-B', '-', '45,2,51,48', 'M-8, XL, H3I / TRI, INDOSAT', 'Jl. Raya Mauk Desa Gintung Kec. Sukadiri Kab. Tangerang', '-6.0953', '106.55709', NULL, NULL, 100, 60, NULL, NULL, 200000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(475, 'JAW-CCJ-0054-M-B', '-', '45,2,48,47', 'M-8, XL, INDOSAT, T-SEL', 'Kp. Cilame Desa Cileles Kec. Tigaraksa Kab. Tangerang', '-6.31725', '106.44191', NULL, NULL, 80, 70, NULL, NULL, 200000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(476, 'JAW-BTN-0022-H-P', '-', '2,51', 'XL, H3I / TRI', 'Desa Pangkalan Kecamatan Teluk Naga Kabupaten Tangerang', '-6.0579', '106.64601', NULL, NULL, 70, 45, NULL, NULL, 350000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(477, 'JAW-BTN-0024-H-P', '-', '2,51,47', 'XL, H3I / TRI, T-SEL', 'Desa Cengklong Kecamatan Kosambi Kabupaten Tangerang', '-6.08114', '106.68514', NULL, NULL, 80, 38, NULL, NULL, 300000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(478, 'JAW-BTN-0026-H-P', '-', '5,2,51,47', 'SMARTFREN, XL, H3I / TRI, T-SEL', 'Desa Bojong Renged Kecamatan Teluk Naga Kabupaten Tangerang', '-6.10561', '106.6415', NULL, NULL, 100, 45, NULL, NULL, 300000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(479, 'JAW-BTN-0028-H-P', '-', '2,51', 'XL, H3I / TRI', 'Desa Kosambi Timur Kecamatan Kosambi Kabupaten Tangerang', '-6.086', '106.69689', NULL, NULL, 80, 45, NULL, NULL, 300000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(480, 'JAW-BTN-0029-H-P', '-', '5,51', 'SMARTFREN, H3I / TRI', 'Desa Tanjung Pasir Kecamatan Teluknaga Kabupaten Tangerang', '-6.04289', '106.671', NULL, NULL, 80, 45, NULL, NULL, 350000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(481, 'JAW-BTN-0030-H-P', '-', '5,2,51', 'SMARTFREN, XL, H3I / TRI', 'Desa Teluknaga Kecamatan Teluknaga Kabupaten Tangerang', '-6.0885', '106.64206', NULL, NULL, 60, 45, NULL, NULL, 350000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(482, 'JAW-BTN-0031-H-P', '-', '5,2,51', 'SMARTFREN, XL, H3I / TRI', 'Ds. Belimbing Kec. Kosambi Kab. Tangerang', '-6.08908', '106.67161', NULL, NULL, 100, 45, NULL, NULL, 300000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(483, 'JAW-BTN-0033-H-P', '-', '5,2,51', 'SMARTFREN, XL, H3I / TRI', 'Tegal Angus Kecamatan Teluknaga Kabupaten Tangerang', '-6.05039', '106.65822', NULL, NULL, 98, 45, NULL, NULL, 300000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(484, 'JAW-BTN-0037-H-P', '-', '2,51,47', 'XL, H3I / TRI, T-SEL', 'Desa Babakan Asem Kecamatan Teluk Naga Kabupaten Tangerang', '-6.08064', '106.65617', NULL, NULL, 80, 34, NULL, NULL, 350000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(485, 'JAW-BTN-0039-H-P', '-', '5,51,48,47,49', 'SMARTFREN, H3I / TRI, INDOSAT, T-SEL, INTERNUX', 'Desa Bencongan Kecamatan Curug Kabupaten Tangerang', '-6.2158', '106.60689', NULL, NULL, 100, 45, NULL, NULL, 350000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(486, 'JAW-BTN-0040-H-P', '-', '5,2,51', 'SMARTFREN, XL, H3I / TRI', 'Desa Sukabakti Kecamatan Curug Kabupaten Tangerang', '-6.25256', '106.56983', NULL, NULL, 70, 45, NULL, NULL, 350000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(487, 'JAW-BTN-0086-H-P', '-', '51,49', 'H3I / TRI, INTERNUX', 'Desa Binong Kecamatan Curug Kabupaten Tangerang', '-6.23243', '106.58997', NULL, NULL, 75, 45, NULL, NULL, 350000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(488, 'JAW-BTN-0087-H-P', '-', '5,2,51,47', 'SMARTFREN, XL, H3I / TRI, T-SEL', 'Desa Pagedangan Kec. Pagedangan Kab. Tangerang', '-6.29559', '106.62799', NULL, NULL, 80, 55, NULL, NULL, 400000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(489, 'JAW-BTN-0090-H-P', '-', '5,51', 'SMARTFREN, H3I / TRI', 'Desa Curug Sangereng Kec. Pagedangan Kab. Tangerang', '-6.25847', '106.62841', NULL, NULL, 60, 45, NULL, NULL, 400000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(490, 'JAW-BTN-0092-H-P', '-', '5,2,51', 'SMARTFREN, XL, H3I / TRI', 'Desa Tagala Kec. Cikupa Kab. Tangerang', '-6.2145', '106.5102', NULL, NULL, 60, 45, NULL, NULL, 300000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(491, 'JAW-BTN-0093-H-P', '-', '50', 'H3I / TRI', 'Desa Cibadak Kec. Cikupa Kab. Tangerang', '-6.2037', '106.48362', NULL, NULL, 65, 45, NULL, NULL, 300000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(492, 'JAW-BTN-0094-H-P', '-', '45,51', 'M-8, H3I / TRI', 'Desa Balaraja Kec. Balaraja Kab. Tangerang', '-6.18911', '106.46175', NULL, NULL, 70, 72, NULL, NULL, 200000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(493, 'JAW-BTN-0095-H-P', '-', '5,2,51', 'SMARTFREN, XL, H3I / TRI', 'Desa Kadu Kec. Curug Kab. Tangerang', '-6.22786', '106.56941', NULL, NULL, 80, 50, NULL, NULL, 400000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(494, 'JAW-BTN-0096-H-P', '-', '5,2,51,47', 'SMARTFREN, XL, H3I / TRI, T-SEL', 'Desa Kayu Agung Kec. Sepatan Kab. Tangerang', '-6.10244', '106.58484', NULL, NULL, 100, 55, NULL, NULL, 300000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(495, 'JAW-BTN-0097-H-P', '-', '5,2,51', 'SMARTFREN, XL, H3I / TRI', 'Desa Sukatani Kec. Rajeg Kab. Tangerang', '-6.13685', '106.51305', NULL, NULL, 100, 55, NULL, NULL, 200000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(496, 'JAW-BTN-0098-H-P', '-', '2,51', 'XL, H3I / TRI', 'Desa Panongan Kec. Panongan Kab. Tangerang', '-6.27236', '106.52158', NULL, NULL, 70, 55, NULL, NULL, 200000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(497, 'JAW-BTN-0106-H-P', '-', '5,2,51', 'SMARTFREN, XL, H3I / TRI', 'Ds. Kutabumi Kec. Pasir Kemis Kab. Tangerang', '-6.15928', '106.56258', NULL, NULL, 80, 55, NULL, NULL, 300000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(498, 'JAW-BTN-0107-H-P', '-', '2,51,47', 'XL, H3I / TRI, T-SEL', 'Ds. Matagara Kec. Tigaraksa Kab. Tangerang', '-6.25981', '106.478', NULL, NULL, 100, 54, NULL, NULL, 200000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(499, 'JAW-BTN-0108-H-P', '-', '5,2,51,47', 'SMARTFREN, XL, H3I / TRI, T-SEL', 'Kel. Legok Kec. Legok Kab. Tangerang', '-6.28481', '106.59378', NULL, NULL, 60, 54, NULL, NULL, 200000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(500, 'JAW-BTN-0116-H-P', '-', '5,4,51', 'SMARTFREN, AXIS, H3I / TRI', 'Kp. Cisauk Kel. Sampora Kec. Cisauk Kab. Tangerang', '-6.32258', '106.64111', NULL, NULL, 70, 45, NULL, NULL, 200000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(501, 'JAW-BTN-0117-H-P', '-', '51,47', 'H3I / TRI, T-SEL', 'Desa Sindang Panon Kec. Sindang Jaya Kab. Tangerang', '-6.17006', '106.52311', NULL, NULL, 80, 54, NULL, NULL, 200000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(502, 'JAW-BTN-0117-H-P', '-', '50', 'H3I / TRI', 'Kp. Tanah Luhur Desa Jatiwaringin Kec. Mauk Kab. Tangerang', '-6.08843', '106.537', NULL, NULL, 80, 54, NULL, NULL, 200000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(503, 'JAW-BTN-0118-H-P', '-', '2,51,48', 'XL, H3I / TRI,INDOSAT', 'Desa Ranca Buaya  Kec. Jambe Kab. Tangerang', '-6.31703', '106.50386', NULL, NULL, 100, 54, NULL, NULL, 150000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(504, 'JAW-BTN-0147-H-P', '-', '5,51', 'SMARTFREN, H3I / TRI', 'Ds. Cisoka Kec. Cisoka Kab. Tangerang', '-6.26213', '106.42417', NULL, NULL, 100, 45, NULL, NULL, 300000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(505, 'JAW-BTN-0162-H-P', '-', '2,51', 'XL, H3I / TRI', 'Ds. Cirendeu Kec. Cisoka Kab. Tangerang', '-6.31042', '106.41306', NULL, NULL, 80, 50, NULL, NULL, 250000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(506, 'JAW-BTN-0172-H-P', '-', '2,51', 'XL, H3I / TRI', 'Desa Dangdeur Kec. Jayanti Kab. Tangerang', '-6.20689', '106.41853', NULL, NULL, 70, 54, NULL, NULL, 300000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(507, 'JAW-WJV-0254-H-P', '-', '5,51', 'SMARTFREN, H3I / TRI', 'Ds. Setu Kec. Cisauk Kab. Tangerang', '-6.34953', '106.67436', NULL, NULL, 70, 55, NULL, NULL, 200000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(508, 'JAW-WJV-0405-H-P', '-', '5,51', 'SMARTFREN, H3I / TRI', 'Desa Suradita kec.Cisauk Kabupaten Tangerang', '-6.35167', '106.63703', NULL, NULL, 60, 55, NULL, NULL, 200000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(509, 'JAW-BTN-0032-H-P', '-', '51,48,47', 'H3I / TRI, INDOSAT, T-SEL', 'Desa Teluk Naga Kec. Teluk Naga Kab. Tangerang', '-6.09611', '106.65418', NULL, NULL, 80, 45, NULL, NULL, 350000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(510, 'JAW-BTN-0035-H-P', '-', '5,51,47', 'SMARTFREN, H3I / TRI, T-SEL', 'Desa Bunder Kec. Cikupa Kab. Tangerang', '-6.18983', '106.55119', NULL, NULL, 80, 45, NULL, NULL, 300000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(511, 'JAW-BTN-0038-H-P', '-', '51,49', 'H3I / TRI, INTERNUX', 'Desa Kelapa Dua Kec. Curug, Kab. Tangerang', '-6.23403', '106.61486', NULL, NULL, 100, 45, NULL, NULL, 350000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(512, 'JAW-BTN-0091-H-P', '-', '5,51,47', 'SMARTFREN, H3I / TRI, T-SEL', 'Desa Bitung Jaya Kec. Cikupa Kab. Tangerang', '-6.22283', '106.53858', NULL, NULL, 80, 45, NULL, NULL, 250000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(513, 'JAW-BTN-0023-H-P', '-', '5,51,47', 'SMARTFREN, H3I / TRI, T-SEL', 'Desa Kampung Melayu Barat Kec. Teluk Naga Kab. Tangerang', '-6.07308', '106.64422', NULL, NULL, 80, 42, NULL, NULL, 350000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(514, 'JAW-BTN-0119-H-P', '-', '5,51,47', 'SMARTFREN, H3I / TRI, T-SEL', 'Kp. Empetan RT 01 / 02 Kel. Buaran Bambu Kec. Pakuhaji Kab. Tangerang', '-6.06419', '106.59634', NULL, NULL, 90, 54, NULL, NULL, 200000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(515, 'JAW-BTN-0009-K-P', '-', '50', 'H3I / TRI', 'Ds. Jayanti RT 05/02 Desa Jayanti Kec. Jayanti Kab. Tangerang', '-6.21316', '106.39288', NULL, NULL, 100, 52, NULL, NULL, 200000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(516, 'JAW-BTN-0006-T-B', '-', '5,2,51,48,47,49', 'SMARTFREN, XL, H3I / TRI, INDOSAT, T-SEL, INTERNUX', 'Jl. Kp. Sengereng RT 03/02 Kel. Curug Sengereng Kec. Kelapa Dua Kab. Tangerang', '-6.24965', '106.62885', NULL, NULL, 60, 36, NULL, NULL, 500000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(517, 'JAW-BTN-0007-T-B', '-', '34', 'TSEL', 'Jl.Boulevard Rusia Block CB6 No.57 Sector 1C,serpong,serpong', '-6.23096', '106.6267', NULL, NULL, 70, 6, NULL, NULL, 4500000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(518, 'JAW-BTN-0012-H-B', '-', '5,51', 'SMARTFREN, H3I / TRI', 'Kampung Cisauk Erpark RT.005 RW.004,cisauk,cisauk', '-6.33772', '106.63663', NULL, NULL, 70, 43, NULL, NULL, 200000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(519, 'JAW-BTN-0014-T-B', '-', '2,51,47,49', 'XL, H3I / TRI, T-SEL, INTERNUX', 'Jl.Sukaraja Kp.Sumur RT.01 RW.05 Desa wanakerta,wanakerta,sindangjaya', '-6.19799', '106.4962', NULL, NULL, 80, 40, NULL, NULL, 200000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(520, 'JAW-BTN-0019-H-B', '-', '50', 'H3I / TRI', 'Kp.Kongsi RT.01 RW.03 Kel.Palasari Kec.Legok,legok,palasari', '-6.2958', '106.55553', NULL, NULL, 80, 27, NULL, NULL, 250000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(521, 'JAW-BTN-0049-H-B', '-', '50', 'H3I / TRI', 'Kp.Tanjakan RT.003 RW.02 tanjakan,tanjakan,rajeg', '-6.08841', '106.51815', NULL, NULL, 100, 40, NULL, NULL, 150000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(522, 'JAW-BTN-0054-H-B', '-', '51,47', 'H3I / TRI, T-SEL', 'Jl.Kali baru RT.01 RW.05 Dsa Kali baru,kali baru,paku haji', '-6.06024', '106.63202', NULL, NULL, 80, 30, NULL, NULL, 150000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(523, 'JAW-BTN-0020-H-B', '-', '50', 'H3I / TRI', 'Kp.Alar Ds.Kohod RT.001 RW.008 ,paku haji,paku haji', '-6.0346', '106.61805', NULL, NULL, 70, 40, NULL, NULL, 150000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(524, 'JAW-BTN-0035-H-B', '-', '50', 'H3I / TRI', 'Jl.Raya Kohod RT.03 RW.01 Desa Kohod,kohod,paku haji', '-6.04465', '106.62997', NULL, NULL, 60, 40, NULL, NULL, 150000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(525, 'JAW-BTN-0039-H-B', '-', '51,47', 'H3I / TRI, T-SEL', 'Kp.Kedokan RT.05 RW.02 Kel Cibogo,cibogo,cisauk', '-6.32946', '106.65387', NULL, NULL, 80, 40, NULL, NULL, 100000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(526, 'JAW-BTN-0041-H-B', '-', '50', 'H3I / TRI', 'Jl.Raya Paku Haji RT.02 RW.03 Desa Kayu Agung,kayu agung,sepatan', '-6.08992', '106.58544', NULL, NULL, 70, 40, NULL, NULL, 150000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(527, 'JAW-BTN-0025-H-B', '-', '50', 'H3I / TRI', 'Kp. Masjid RT. 014 RW. 003,Tegal Kunir Lor,Mauk', '-6.06018', '106.52797', NULL, NULL, 100, 40, NULL, NULL, 150000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(528, 'JAW-BTN-0038-H-B', '-', '50', 'H3I / TRI', 'Jl. Raya Rancaiyuh RT. 013 RW. 004,Rancaiyuh,Panongan', '-6.31231', '106.53508', NULL, NULL, 100, 40, NULL, NULL, 200000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(529, 'JAW-BTN-0045-H-B', '-', '51,47', 'H3I / TRI, T-SEL', 'Kp. Tegal Lame Desa Balaraja,Balaraja,Balaraja', '-6.19502', '106.45043', NULL, NULL, 100, 36, NULL, NULL, 250000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(530, 'JAW-BTN-0103-X-B', '-', '2,47', 'XL, T-SEL', 'Kp. Cariu RT. 003 RW. 003,Tobat,Balaraja', '-6.19453', '106.43153', NULL, NULL, 100, 40, NULL, NULL, 250000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(531, 'JAW-BTN-0015-H-B', '-', '5,51,47', 'SMARTFREN, H3I / TRI, T-SEL', 'Jl. Raya Perumahan Kota Bumi Kp. Sondol,Kota Bumi,Pasar Kemis', '-6.15035', '106.5641', NULL, NULL, 80, 33, NULL, NULL, 300000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(532, 'JAW-BTN-0023-H-B', '-', '50', 'H3I / TRI', 'Kampung Kongsi Baru - Kebon Karet RT. 01 RW. 08,Sindangsari,Pasar Kemis', '-6.13846', '106.53221', NULL, NULL, 80, 30, NULL, NULL, 300000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(533, 'JAW-BTN-0026-H-B', '-', '51,47', 'H3I / TRI, T-SEL', 'Pergudangan Pantai Indah Dadap Jl. Raya Prancis No. 2 RT. 01 RW. 05,Dadap,Kosambi', '-6.0796', '106.71149', NULL, NULL, 90, 30, NULL, NULL, 300000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(534, 'JAW-BTN-0034-H-B', '-', '50', 'H3I / TRI', 'Jln. Kayu Bongkok RT. 04 RW. 01,Kayu Bongkok,Sepatan', '-6.09735', '106.57027', NULL, NULL, 90, 40, NULL, NULL, 300000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(535, 'JAW-BTN-0036-H-B', '-', '5,51,47', 'SMARTFREN, H3I / TRI, T-SEL', 'Kampung Bayur RT. 001 RW. 001,Lebak Wangi,Sepatan Timur', '-6.14049', '106.60378', NULL, NULL, 100, 40, NULL, NULL, 250000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(536, 'JAW-BTN-0042-H-B', '-', '51,47', 'H3I / TRI, T-SEL', 'Kp. Ciroke RT. 02 RW. 04 ,Cijantra,Pagedangan', '-6.28313', '106.61068', NULL, NULL, 100, 42, NULL, NULL, 400000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(537, 'JAW-BTN-0052-H-B', '-', '51,47', 'H3I / TRI, T-SEL', 'Kp. Gruduk RT. 02 RW. 03 ,Mekar Jaya,Sepatan', '-6.13803', '106.57694', NULL, NULL, 100, 33, NULL, NULL, 300000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(538, 'JAW-BTN-0060-H-B', '-', '51,47', 'H3I / TRI, T-SEL', 'Kp. Periuk RT. 01 RW. 04,Mekarsari,Rajeg', '-6.11802', '106.53593', NULL, NULL, 80, 33, NULL, NULL, 300000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(539, 'JAW-BTN-0095-X-B', '-', '2', 'XL', 'Kp. Rawa Lumpang RT. 019 RW. 010,Salembaran Jati,Kosambi', '-6.06758', '106.68794', NULL, NULL, 80, 30, NULL, NULL, 350000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(540, 'JAW-BTN-0031-H-B', '-', '51,49', 'H3I / TRI, INTERNUX', 'Kp. Cijengir RT. 04 RW. 03 ,Binong,Curug', '-6.24541', '106.5814', NULL, NULL, 70, 30, NULL, NULL, 400000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(541, 'JAW-BTN-0128-X-B', '-', '2', 'XL', 'Kp. Cisereh RT. 07 RW. 03 Desa Kadu jaya,Kadu Jaya,Curug', '-6.24374', '106.5627', NULL, NULL, 70, 36, NULL, NULL, 300000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(542, 'JAW-BTN-0024-H-B', '-', '50', 'H3I / TRI', 'Kp. Bunder Jl. Telesonic RT 08/02 Desa Bunder Kec. Cikupa Kab. Tangerang', '-6.20063', '106.55425', NULL, NULL, 70, 30, NULL, NULL, 300000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(543, 'JAW-BTN-0029-H-B', '-', '51,49', 'H3I / TRI, INTERNUX', 'Jl.Kp. Bambu  RT. 01 RW. 09 ,Bojong Nangka,Kelapa Dua', '-6.25325', '106.60235', NULL, NULL, 80, 30, NULL, NULL, 450000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(544, 'JAW-BTN-0053-H-B', '-', '50', 'H3I / TRI', 'Kp. Pasir Awi RT 005/02 Desa Suka Asih Kec. Pasar Kemis Kab. Tangerang', '-6.18728', '106.53771', NULL, NULL, 80, 30, NULL, NULL, 300000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(545, 'JAW-BTN-0044-H-B', '-', '51,47', 'H3I / TRI, T-SEL', 'Ruko Puri Jaya Blok AA No. 27 RT 02/011 Desa Sukamantri Kec. Pasar Kemis Kab. Tangerang', '-6.15954', '106.55454', NULL, NULL, 90, 20, NULL, NULL, 300000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(546, 'JAW-BTN-0179-X-B', '-', '2,47', 'XL, T-SEL', 'Jl. Velor RT 003/005 Desa Kp. Melayu Timur Kec. Teluk Naga Kab. Tangerang', '-6.07405', '106.65', NULL, NULL, 100, 30, NULL, NULL, 400000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(547, 'JAW-BTN-0186-X-B', '-', '2', 'XL', 'Kamp Sadang RT 04/RW04 ,Cempaka,Cisoka', '-6.26244', '106.412', NULL, NULL, 100, 50, NULL, NULL, 300000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(548, 'JAW-BTN-0187-X-B', '-', '2', 'XL', 'Kampung Paridan  Rt. 015 Rw. 05 Rancagede,Gunung Kaler', '-6.08219', '106.384', NULL, NULL, 100, 50, NULL, NULL, 150000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(549, 'JAW-BTN-0188-X-B', '-', '2', 'XL', 'Kamp. Pekayon Rt. 003 Rw. 06 Tangerang, Banten,Pekayon,Sukadiri', '-6.04946', '106.551', NULL, NULL, 90, 50, NULL, NULL, 150000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(550, 'JAW-BTN-0065-H-B', '-', '2,51', 'XL, H3I / TRI', 'Jl. Engenering Kp. Cilandak RT. 001 RW. 001 Ds. Pagedangan Kec. Pagedangan Kab.Tangerang', '-6.307', '106.64351', NULL, NULL, 80, 30, NULL, NULL, 400000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(551, 'JAW-BTN-0191-X-B', '-', '2,47', 'XL, T-SEL', 'Kp. Kadu No. 4 RT 09 RW 04 Desa Sukamulya, Kecamatan Cikupa  ,Sukamulya,Cikupa  ', '-6.24456', '106.513', NULL, NULL, 70, 30, NULL, NULL, 200000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(552, 'JAW-BTN-0194-X-B', '-', '2', 'XL', 'Perumahan BSD City Kav. Dormitory EduTown BSD City Blok B No. 5 Kel Pagedangan Kec. Pagedangan,Pagedangan,Pagedangan', '-6.30296', '106.638', NULL, NULL, 70, 6, NULL, NULL, 300000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(553, 'JAW-BTN-0213-X-B', '-', '2,51', 'XL, H3I / TRI', 'Kp. CIkupa RT 03 RW 03 Desa Cikupa Kec. Cikupa,Cikupa,Cikupa', '-6.23521', '106.51662', NULL, NULL, 70, 30, NULL, NULL, 250000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(554, 'JAW-BTN-0210-X-B', '-', '2,49', 'XL, INTERNUX', 'Jl.Kampung Sabi RT.002 RW.002 Kelurahan Bencongan Kecamatan Kelapa Dua', '-6.21054', '106.59877', NULL, NULL, 80, 25, NULL, NULL, 450000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(555, 'JAW-BTN-0216-X-B', '-', '2,47', 'XL, T-SEL', 'Kel. Budi Mulya, Kec. Cikupa, Kab. Tangerang', '-6.2311', '106.50215', NULL, NULL, 80, 40, NULL, NULL, 300000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(556, 'JAW-BTN-0226-X-B', '-', '2,49', 'XL, INTERNUX', 'Kp. Peusar No. 67 RT003/RW001 Kel. Binong, Kec. Curug, Kab. Tangerang', '-6.22857', '106.58204', NULL, NULL, 100, 30, NULL, NULL, 300000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(557, 'JAW-BTN-0222-X-B', '-', '2', 'XL', 'Perumahan Paramount Serpong, Kluster Paramount Dotcom Blok O No. 26 Desa Pakulonan Barat Kec. Kelapa Dua', '-6.24442', '106.62606', NULL, NULL, 120, 12, NULL, NULL, 4500000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(558, 'JAW-BTN-0031-T-B', '-', '47,49', 'T-SEL, INTERNUX', 'Ruko Bolsena Blok B No 12 Paramount Gading Serpong, Kel. Curug, Kec. Curug Srengseng, Kab. Tangerang', '-6.25895', '106.62069', NULL, NULL, 80, 12, NULL, NULL, 4500000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(559, 'JAW-BTN-0037-R-B', '-', '49', 'INTERNUX', 'Gang Keongrongok no. 11 RT 001 RW 003 Kelurahan Binong Kecamatan Curug Tangerang,Binong,Curug', '-6.25085', '106.579', NULL, NULL, 80, 30, NULL, NULL, 300000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(560, 'JAW-BTN-0075-H-B', '-', '50', 'H3I / TRI', 'Jl.Talagasari Rt008/Rw002,Desa Talagasari Kec.Cikupa, Kabupaten  Tangerang', '-6.21312', '106.52322', NULL, NULL, 70, 40, NULL, NULL, 250000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(561, 'JAW-BTN-0036-T-B', '-', '34', 'TSEL', 'Kampung Serdang  RT.003 / RW. 003 Desa Mata Gara Kec. Tigaraksa Kab. Tangerang - Banten ,mata gara,tigaraksa', '-6.24848', '106.477', NULL, NULL, 100, 40, NULL, NULL, 250000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(562, 'JAW-BTN-0037-T-B', '-', '34', 'TSEL', 'Kampung Kalijodoh  RT.03 / RW. 02,parahu,suka mulya', '-6.1836', '106.43567', NULL, NULL, 100, 40, NULL, NULL, 200000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(563, 'JAW-BTN-0038-T-B', '-', '34', 'TSEL', 'Kp.Kalanturan Rt. 01 Rw. 02,sentul,balaraja', '-6.21092', '106.45926', NULL, NULL, 100, 40, NULL, NULL, 250000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(564, 'JAW-BTN-0040-T-B', '-', '34', 'TSEL', 'Kampung Sadang  RT.002 / RW. 003,kubang,suka mulya', '-6.17394', '106.41843', NULL, NULL, 90, 40, NULL, NULL, 250000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(565, 'JAW-BTN-0045-T-B', '-', '34', 'TSEL', 'Kampung Dukuh RT.13 / RW.04,Dukuh,Cikupa', '-6.2396', '106.54058', NULL, NULL, 80, 40, NULL, NULL, 300000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(566, 'JAW-BTN-0061-T-B', '-', '34', 'TSEL', 'Kampung Bunar RT.01 / RW.02,Suka Tani ,Cisoka', '-6.27407', '106.419', NULL, NULL, 80, 40, NULL, NULL, 250000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(567, 'JAW-BTN-0014-R-B', '-', '49', 'INTERNUX', 'Jl. Mawar Raya No..48 Blok Rt.004/012 Kel. Bencongan, Kec Kelapa Dua, Tangerang Banten,Bencongan,Kelapa Dua', '-6.21921', '106.59886', NULL, NULL, 100, 12, NULL, NULL, 400000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(568, 'JAW-BTN-0041-T-B', '-', '34', 'TSEL', 'KP. Kuya RT.002/ RW 03 Desa Pangkat Kecamatan Jayanti Kab. Tangerang', '-6.19653', '106.39509', NULL, NULL, 100, 40, NULL, NULL, 200000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(569, 'JAW-BTN-0043-T-B', '-', '34', 'TSEL', 'Kp. Wadinah Rt.04/02 Ds. Jeungjing Kec.Cisoka Kab.Tangerang Banten,Jeungjing ,Cisoka', '-6.27335', '106.449', NULL, NULL, 100, 50, NULL, NULL, 250000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(570, 'JAW-BTN-0046-T-B', '-', '34', 'TSEL', 'Kp. Pabuaran RT.003/001 Desa Kadu Agung Kec.Tigaraksa Kabupaten Tangerang Propinsi Banten,Kadu Agung,Tigaraksa', '-6.25946', '106.49405', NULL, NULL, 80, 50, NULL, NULL, 200000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(571, 'JAW-BTN-0047-T-B', '-', '34', 'TSEL', 'Kampung Cibarengkok RT01 Rw 02 Ds.Peusar Kec.Panongan Kab.Tangerang ', '-6.24388', '106.49993', NULL, NULL, 80, 40, NULL, NULL, 200000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(572, 'JAW-BTN-0052-T-B', '-', '34', 'TSEL', 'Jl. Kasidin Kp.Bojong Indah RT.03/02 Ds. Kemuning  Kec.Legok Kab.Tangerang', '-6.30382', '106.58087', NULL, NULL, 70, 40, NULL, NULL, 200000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(573, 'JAW-BTN-0063-T-B', '-', '34', 'TSEL', 'Kp.Pisangan RT.004/004 Desa Kayu Agung Kec.Sepatan Kab.Tangerang ', '-6.09345', '106.58538', NULL, NULL, 100, 40, NULL, NULL, 200000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(574, 'JAW-BTN-0065-T-B', '-', '34', 'TSEL', 'Kp.Pasir Jaya RT.007/003 Desa Pasir Jaya Kec.Cikupa Kab.Tangerang Banten,Pasir Jaya,Cikupa', '-6.20125', '106.53435', NULL, NULL, 100, 30, NULL, NULL, 250000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(575, 'JAW-BTN-0051-T-B', '-', '34', 'TSEL', 'Kp.Serdang RT.004/003 Ds.Serdang Wetan Kec.Legok Kab.Tangerang ', '-6.28625', '106.55323', NULL, NULL, 100, 40, NULL, NULL, 250000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(576, 'JAW-BTN-0030-R-B', '-', '51,49', 'H3I / TRI, INTERNUX', 'Jl. Empu Panuluh Raya No.4 RT.006/008 Kel. Bencongan Kec. Kelapa Dua Tangerang, Banten,Bencongan,Kelapa Dua', '-6.2151', '106.59981', NULL, NULL, 80, 20, NULL, NULL, 400000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(577, 'JAW-BTN-0053-T-B', '-', '34', 'TSEL', 'Kp.Babakan Timur RT.001/002 Ds. Babakan Kec. Legok Tangerang Banten,Babakan,Legok', '-6.30175', '106.58581', NULL, NULL, 80, 35, NULL, NULL, 200000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(578, 'JAW-BTN-0060-T-B', '-', '34', 'TSEL', 'Kampung Bunut RT.05/02 Ds. Pasir Jaya Kec Cikupa Kab. Tangerang Banten,Pasir Jaya,Cikupa', '-6.21235', '106.52782', NULL, NULL, 70, 40, NULL, NULL, 200000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(579, 'JAW-BTN-0064-T-B', '-', '34', 'TSEL', 'Kampung Bojong RT.11/04 Ds. Bojong Kec. Cikupa Kab. Tangerang Banten,Bojong ,Cikupa', '-6.22942', '106.49772', NULL, NULL, 70, 40, NULL, NULL, 200000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(580, 'JAW-BTN-0086-H-B', '-', '50', 'H3I / TRI', 'Jl. Pasar Kemis Kp. Cilongok RT.005/005 Desa  Sukamantri Kec. Pasar Kemis Kab. Tangerang Banten,Sukamantri,Pasar Kemis', '-6.17222', '106.5391', NULL, NULL, 80, 40, NULL, NULL, 200000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(581, 'JAW-BTN-0032-T-B', '-', '34', 'TSEL', 'Jl. Duyung Raya No.17 RT.006/008 Kel. Kelapa Dua Kec. Dua Kab. Tangerang Banten,Kelapa Dua,Dua', '-6.23221', '106.622', NULL, NULL, 85, 12, NULL, NULL, 400000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(582, 'JAW-BTN-0062-T-B', '-', '34', 'TSEL', 'Jl Raya Seran KM.9 Kp. Kadujaya RT.02/02 Ds. Kadujaya Kec. Curug Kab. Tangerang Banten,Kadujaya,Curug', '-6.21548', '106.56329', NULL, NULL, 95, 40, NULL, NULL, 200000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(583, 'JAW-BTN-0084-H-B', '-', '50', 'H3I / TRI', 'JL.RAYA SERANG KM 17.RT.01/02 DES/KEL.TALAGA .KEC.CIKUPA,Talaga,Cikupa', '-6.22508', '106.50476', NULL, NULL, 100, 40, NULL, NULL, 200000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(584, 'JAW-BTN-0090-H-B', '-', '50', 'H3I / TRI', 'Jl. Raya Otonom Pasar Kemis Desa Telaga Sari RT. 05 RW. 02 No. 89 Kel. Telaga Sari Kec. Cikupa Kab Tangerang', '-6.21945', '106.5184', NULL, NULL, 120, 40, NULL, NULL, 200000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(585, 'JAW-BTN-0039-T-B', '-', '34', 'TSEL', 'Jl.Raya PErancis ruko pergudangan 75 No.6C', '-6.10287', '106.6862', NULL, NULL, 100, 14, NULL, NULL, 2000000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(586, 'JAW-BTN-0056-R-B', '-', '49', 'INTERNUX', 'Kp. Gurubug RT.02/04 kel.Bojong Nangka Kec.Kelapa Dua', '-6.25747', '106.593', NULL, NULL, 70, 20.75, NULL, NULL, 300000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(587, 'JAW-BTN-0058-R-B', '-', '49', 'INTERNUX', 'Ruko Berryl Comercial IV, No.Kel. Pakulonan Barat, Kec. Kelapa Dua', '-6.24581', '106.63153', NULL, NULL, 100, 9, NULL, NULL, 3000000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4),
(588, 'JAW-BTN-0062-R-B', '-', '49', 'INTERNUX', 'Jl. Cicayur Sangereng RT.004, RW. 02, Desa Curug Sangereng, Kec. Kelapa Dua', '-6.24759', '106.61736', NULL, NULL, 120, 12, NULL, NULL, 400000, NULL, NULL, NULL, '1', '-', '-', '-', '1970-01-01', NULL, '-\r', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tarif_retribusi`
--

CREATE TABLE `tarif_retribusi` (
  `id` int(11) NOT NULL,
  `variabel` varchar(100) NOT NULL,
  `zona` varchar(100) NOT NULL,
  `indeks` float NOT NULL,
  `biaya` double NOT NULL,
  `distribusi_biaya` double NOT NULL,
  `status_tampil` char(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tarif_retribusi`
--

INSERT INTO `tarif_retribusi` (`id`, `variabel`, `zona`, `indeks`, `biaya`, `distribusi_biaya`, `status_tampil`) VALUES
(1, 'Zona 1', 'Zona 1', 0.9, 2750000, 2475000, '1'),
(2, 'Menara Pole', 'Zona 1', 0.9, 2750000, 2475000, '1'),
(3, 'Menara 3 Kaki', 'Zona 1', 1, 2750000, 2750000, '1'),
(4, 'Menara 4 Kaki', 'Zona 1', 1.1, 3025000, 3327500.0000000005, '1'),
(5, 'Zona II', 'Zona 2', 1.1, 2750000, 3025000.0000000005, '1'),
(6, 'Menara Pole', 'Zona 2', 0.9, 2475000, 2227500, '1'),
(7, 'Menara 3 Kaki', 'Zona 2', 1, 2750000, 2750000, '1'),
(8, 'Menara 4 Kaki', 'Zona 2', 1.1, 3025000, 3327500.0000000005, '1');

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
  `logo` varchar(255) DEFAULT '',
  `initial` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id`, `nama_vendor`, `nama_pimpinan`, `telp`, `alamat`, `status_tampil`, `logo`, `initial`) VALUES
(1, 'PT. Solusi Tunas Pratama TBK', '-', '-', '-', '1', '/img/e.png', 'STP'),
(2, 'PT. Inti Bangun Sejahtera', '-', '-', '-', '1', '/img/a.png', 'IBS'),
(3, 'GIHON', '-', '-', '-', '1', '/img/c.png', 'GHN'),
(4, 'PROTELINDO', '-', '-', '-', '1', '/img/d.png', 'PRO'),
(5, 'TELKOMSEL', '-', '-', '-', '1', '/img/b.png', 'TSL'),
(6, 'NET WAVE', '-', '-', '-', '1', '/img/g.png', 'NTW'),
(7, 'PT. INDOSAT TBK', '-', '-', 'Wilayah Kabupaten Tangerang', '1', '/img/h.png', 'IND'),
(8, 'MITRATEL', '-', '-', '-', '1', '/img/i.png', 'MIT'),
(9, 'PT. XL', '-', '-', 'Wilayah Kabupaten Tangerang', '1', '/img/f.png', 'XL'),
(10, 'TBG', '-', '-', '-', '1', '/img/j.png', 'TBG'),
(11, 'HUTCHINSON', '-', '-', '-', '1', '/img/k.png', 'HTC');

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
-- Indexes for table `tarif_retribusi`
--
ALTER TABLE `tarif_retribusi`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `site`
--
ALTER TABLE `site`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=589;
--
-- AUTO_INCREMENT for table `tarif_retribusi`
--
ALTER TABLE `tarif_retribusi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
