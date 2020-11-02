-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2020 at 08:24 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lpeg`
--

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `lap_id` int(11) NOT NULL,
  `lap_nip` int(11) NOT NULL,
  `lap_kegiatan` varchar(255) NOT NULL,
  `lap_tanggal` date NOT NULL,
  `lap_jam_mulai` int(11) NOT NULL,
  `lap_jam_selesai` int(11) NOT NULL,
  `lap_satuan_kegiatan` varchar(100) NOT NULL,
  `lap_jumlah_satuan` int(3) NOT NULL,
  `lap_tempat_kegiatan` varchar(200) NOT NULL,
  `lap_penyelenggara` varchar(200) NOT NULL,
  `lap_keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`lap_id`, `lap_nip`, `lap_kegiatan`, `lap_tanggal`, `lap_jam_mulai`, `lap_jam_selesai`, `lap_satuan_kegiatan`, `lap_jumlah_satuan`, `lap_tempat_kegiatan`, `lap_penyelenggara`, `lap_keterangan`) VALUES
(1, 12345, 'berhasil diedit', '2020-03-11', 10, 11, 'sdnjnajk', 1, 'ksakmk', 'dkamkamk', 'kszmdksmk'),
(2, 12345, 'diedit', '2020-03-11', 23, 23, 'ksmdks', 1, 'kskdokso', 'dklskko', 'dksdksk'),
(4, 12345, 'seminar kerja praktek', '2020-03-10', 1, 3, 'ksmkdms', 1, 'SKDSK', 'KSMKMDSKLML', 'KDKSLLKSL');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `peg_id` int(11) NOT NULL,
  `peg_nip` int(11) NOT NULL,
  `peg_nama` varchar(100) NOT NULL,
  `peg_pangkat` varchar(100) NOT NULL,
  `peg_unit_kerja` varchar(150) NOT NULL,
  `peg_jabatan` varchar(100) NOT NULL,
  `peg_atasan` varchar(100) NOT NULL,
  `peg_atasan2` varchar(100) NOT NULL,
  `peg_tugas_pokok` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`peg_id`, `peg_nip`, `peg_nama`, `peg_pangkat`, `peg_unit_kerja`, `peg_jabatan`, `peg_atasan`, `peg_atasan2`, `peg_tugas_pokok`) VALUES
(1, 12345, 'Admin LPeg', 'Admin', 'DP KOMINFO', 'A3', 'Imanuel Nauw', 'Muhamad Amri', 'Administrator'),
(4, 201665098, 'carles weror', 'kasoaks', 'akskaso', 'kasaoksoak', 'aksoaksoako', 'kjsoajsoaik', 'ksaojsoajsoia');

-- --------------------------------------------------------

--
-- Table structure for table `rekap`
--

CREATE TABLE `rekap` (
  `rekap_id` int(11) NOT NULL,
  `rekap_nip` int(11) NOT NULL,
  `rekap_tanggal` date NOT NULL,
  `rekap_jamkerja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekap`
--

INSERT INTO `rekap` (`rekap_id`, `rekap_nip`, `rekap_tanggal`, `rekap_jamkerja`) VALUES
(1, 12345, '2020-03-11', 1),
(2, 12345, '2020-03-10', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_status` int(1) NOT NULL,
  `user_nip` int(11) NOT NULL,
  `user_kata_sandi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_status`, `user_nip`, `user_kata_sandi`) VALUES
(1, 1, 12345, '$2y$10$Bn2f8AXWAvRn1PQ2gQVvfu6GCdC/QgsUZ2f3XD/Yyf86zP4cnoj/K'),
(4, 0, 201665098, '$2y$10$/Qo5.LfDsi4o4eO7mEqgmOqhNEuFLviIkGttPr6LJtEmCWb3YNitm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`lap_id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`peg_id`);

--
-- Indexes for table `rekap`
--
ALTER TABLE `rekap`
  ADD PRIMARY KEY (`rekap_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `lap_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `peg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rekap`
--
ALTER TABLE `rekap`
  MODIFY `rekap_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
