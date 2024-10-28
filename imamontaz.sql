-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2024 at 02:23 AM
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
-- Database: `imamontaz`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id_absensi` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `Keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `nama_client` varchar(128) NOT NULL,
  `img_client` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id_client`, `nama_client`, `img_client`) VALUES
(1, 'PERTAMINA HULU NEGRI', 'pertaminahulunegri.jpg'),
(2, 'WIJAYA KARYA', 'wijayakarya.jpg'),
(3, 'FABER CASTLE', 'fabercastle.jpg'),
(4, 'PERTAMINA DUMAI', 'pertaminadumai.jpg'),
(5, 'DINAS PRAKERJA UMUM', 'dinasprakerjaumum.jpg'),
(6, 'BRAJA MUKTI CAKRA', 'brajamukticakra.jpg'),
(7, 'IMFRATEK MAKMUR BERSAMA', 'imfratekmakmurbersama.jpg'),
(8, 'KOKOH SEMESTA', 'kokohsemesta.jpg'),
(9, 'WASKITA KARYA', 'waskitakarya.jpg'),
(10, 'BUKAKA TEKNIK UTAMA', 'bukakateknikutama.jpg'),
(11, 'FLUIDIC ENERGY', 'fluidicenergy.jpg'),
(12, 'ELANG PERDANA', 'elangperdana.jpg'),
(13, 'SAMUDRA MARINE', 'samudramarine.jpg'),
(14, 'BINA SARANA MEKAR', 'binasaranamekar.jpg'),
(15, 'PLN NUSANTARA POWER', 'plnnusantarapower.jpg'),
(16, 'SEMEN INDONESIA', 'semenindonesia.jpg'),
(17, 'RIAU ANDALAN PULP AND PAPER', 'riauandalanpulpandpaper.jpg'),
(18, 'INDAH KIAT PUMP AND PAPER', 'indahkiatpumpandpaper.jpg'),
(19, 'POLYTAMA PROPINDO', 'polytamapropindo.jpg'),
(20, 'GREAT GIANT PINEAPPLE', 'greatgiantpineapple.jpg'),
(21, 'ASPEX KUMBONG', 'aspexkumbong.jpg'),
(22, 'MKAPR', 'mkapr.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL,
  `no_hp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_product`
--

CREATE TABLE `kategori_product` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(128) NOT NULL,
  `img_kategori` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori_product`
--

INSERT INTO `kategori_product` (`id_kategori`, `nama_kategori`, `img_kategori`) VALUES
(1, 'PRECISSION PART', 'img1.jpg'),
(2, 'HYDROULIC  CYLINDER & HPU', 'img2.jpeg'),
(3, 'GEAR & GEAR BOX', 'img3.jpg'),
(4, 'TORQUE CONVERTER', 'torqueconverter.jpg'),
(5, 'MULTI STAGE PUMP & VALVE', 'multistagepump&valve.jpg'),
(6, 'HEAT EXCHANGER & EVAPORATOR', 'heatexchanger&evaporator.jpg'),
(7, 'REWINDING', 'rewinding.jpg'),
(8, 'CONVEYOR', 'conveyor.jpg'),
(9, 'PEBUATAN PINTU AIR', 'pebuatanpintuair.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `lemburan`
--

CREATE TABLE `lemburan` (
  `id_lembur` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `id_absensi` int(11) NOT NULL,
  `jumlah_lemburan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_product` varchar(128) NOT NULL,
  `img_product` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `id_kategori`, `nama_product`, `img_product`) VALUES
(1, 1, 'BUSHING', 'bushing.jpg'),
(2, 1, 'HOUSING BEARING', 'housingbearing.jpg'),
(3, 1, 'ADAPTER', 'adapter.jpg'),
(4, 1, 'CASING', 'casing.jpg'),
(5, 1, 'IMPELLER', 'impeller.jpg'),
(6, 1, 'PUMP SLEEVE', 'pumpsleeve.jpg'),
(7, 1, 'ROTOR SHAFT', 'rotorshaft.jpg'),
(8, 2, 'CYLINDER RECLAIMER', 'cylinderreclaimer.jpg'),
(9, 2, 'PISTON PUMP', 'pistonpump.jpg'),
(10, 2, 'PISTON PUMP_1', 'pistonpump_1.jpg'),
(11, 2, 'PISTON PUMP_2', 'pistonpump_2.jpg'),
(12, 2, 'PISTON PUMP_3', 'pistonpump_3.jpg'),
(13, 2, 'HPU', 'hpu.jpg'),
(14, 2, 'CYLINDER TELESCOPIC', 'cylindertelescopic.jpg'),
(15, 3, 'GEAR BOX', 'gearbox.jpg'),
(16, 3, 'GEAR BOX_1', 'gearbox_1.jpg'),
(17, 3, 'WORM GEAR', 'wormgear.jpg'),
(18, 3, 'CROW WHEEL', 'crowwheel.jpg'),
(19, 4, 'C300-100', 'c300-100.jpg'),
(20, 4, 'C300-125', 'c300-125.jpg'),
(21, 5, 'MULTI STAGE PUMP', 'multistagepump.jpg'),
(22, 5, 'VALVE', 'valve.jpg'),
(23, 5, 'VALVE2', 'valve2.jpg'),
(24, 5, 'VALVE3', 'valve3.jpg'),
(25, 6, 'EVAPORATOR', 'evaporator.jpg'),
(26, 6, 'EVAPORATOR2', 'evaporator2.jpg'),
(27, 6, 'EVAPORATOR3', 'evaporator3.jpg'),
(28, 6, 'HEAT EXCHANGER', 'heatexchanger.jpg'),
(29, 6, 'HEAT EXCHANGER2', 'heatexchanger2.jpg'),
(30, 6, 'HEAT EXCHANGER3', 'heatexchanger3.jpg'),
(31, 6, 'HEAT EXCHANGER EVAPORATOR', 'heatexchangerevaporator.jpg'),
(32, 6, 'AMONIA COIL EVAPORATOR', 'amoniacoilevaporator.jpg'),
(33, 6, 'AIR COOLER CONDESUR', 'aircoolercondesur.jpg'),
(34, 6, 'PASTEURIZER', 'pasteurizer.jpg'),
(35, 6, 'FLOW PANEL', 'flowpanel.jpg'),
(36, 7, 'REWINDING1', 'rewinding1.jpg'),
(37, 7, 'REWINDING2', 'rewinding2.jpg'),
(38, 7, 'REWINDING3', 'rewinding3.jpg'),
(39, 7, 'REWINDING4', 'rewinding4.jpg'),
(40, 8, 'SCREW CONVEYOR', 'screwconveyor.jpg'),
(41, 8, 'SCREW CONVEYOR2', 'screwconveyor2.jpg'),
(42, 8, 'SCREW CONVEYOR3', 'screwconveyor3.jpg'),
(43, 8, 'SCREW CONVEYOR4', 'screwconveyor4.jpg'),
(44, 8, 'BELT CONVEYOR', 'beltconveyor.jpg'),
(45, 9, 'PINTU AIR ELEKTRIKAL', 'pintuairelektrikal.jpg'),
(46, 9, 'PINTU AIR', 'pintuair.jpg'),
(47, 9, 'PINTU AIR2', 'pintuair2.jpg'),
(48, 9, 'PINTU AIR3', 'pintuair3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email`, `password`) VALUES
(1, 'admin@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absensi`),
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `kategori_product`
--
ALTER TABLE `kategori_product`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `lemburan`
--
ALTER TABLE `lemburan`
  ADD PRIMARY KEY (`id_lembur`),
  ADD KEY `id_karyawan` (`id_karyawan`,`id_absensi`),
  ADD KEY `id_absensi` (`id_absensi`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kategori_product`
--
ALTER TABLE `kategori_product`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `lemburan`
--
ALTER TABLE `lemburan`
  MODIFY `id_lembur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`);

--
-- Constraints for table `lemburan`
--
ALTER TABLE `lemburan`
  ADD CONSTRAINT `lemburan_ibfk_1` FOREIGN KEY (`id_absensi`) REFERENCES `absensi` (`id_absensi`),
  ADD CONSTRAINT `lemburan_ibfk_2` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_product` (`id_kategori`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
