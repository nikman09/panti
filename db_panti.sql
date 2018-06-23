-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2018 at 02:06 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_panti`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id_username` int(3) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_lengkap` varchar(150) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id_username`, `username`, `password`, `nama_lengkap`, `foto`) VALUES
(1, 'admin', 'ed447b10b54c1ccbf0adffad50421770', 'Muhammad Ifan Mashudi', '1.jpg'),
(2, 'nikman', '78e96b7de2cfaa6d3743781169c32680', 'Nikman', '1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `asrama`
--

CREATE TABLE `asrama` (
  `kd_asrama` varchar(15) NOT NULL,
  `asrama` varchar(50) NOT NULL,
  `kouta` varchar(10) NOT NULL,
  `id_pegawai` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `asrama`
--

INSERT INTO `asrama` (`kd_asrama`, `asrama`, `kouta`, `id_pegawai`) VALUES
('1', 'Merah Siam', '1', '1'),
('2', 'Kecubung', '20', '1'),
('3', 'Intan', '17', '4'),
('4', 'Berlian', '15', ''),
('5', 'Mutiara', '15', '');

-- --------------------------------------------------------

--
-- Table structure for table `instruktur`
--

CREATE TABLE `instruktur` (
  `id_instruktur` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `pasword` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(10) NOT NULL,
  `id_tahunakademik` int(11) NOT NULL,
  `id_rombel` int(10) NOT NULL,
  `kd_mapel` varchar(10) NOT NULL,
  `id_instruktur` int(11) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `jam` varchar(20) NOT NULL,
  `kd_ruangan` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `klien`
--

CREATE TABLE `klien` (
  `id_klien` int(10) NOT NULL,
  `nir` int(15) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama_klien` varchar(150) NOT NULL,
  `sex` varchar(2) NOT NULL,
  `agama` enum('Islam','Kristen Protestan','Katolik','Hindu','Budha','Kong Hu Cu') NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `umur` int(11) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `hp` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama_ayah` varchar(100) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `alamat_ortu` varchar(150) NOT NULL,
  `hp_ortu` varchar(50) NOT NULL,
  `foto` text NOT NULL,
  `status` enum('calon','aktif','keluar','lulus','meninggal') NOT NULL,
  `status_daftar` varchar(20) NOT NULL,
  `tgl_insert` datetime NOT NULL,
  `tgl_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `klien`
--

INSERT INTO `klien` (`id_klien`, `nir`, `nik`, `nama_klien`, `sex`, `agama`, `tempat_lahir`, `tanggal_lahir`, `umur`, `alamat`, `kota`, `hp`, `email`, `nama_ayah`, `nama_ibu`, `alamat_ortu`, `hp_ortu`, `foto`, `status`, `status_daftar`, `tgl_insert`, `tgl_update`) VALUES
(1, 2, '2', '2', 'L', 'Islam', '2', '2018-06-12', 0, ' 2', 'Hulu Sungai Tengah', ' 2', '2', '2', '2', '2', '2', '', 'aktif', '', '2018-06-17 10:41:57', '0000-00-00 00:00:00'),
(3, 3, '3', '3', 'P', 'Islam', '3', '2018-06-12', 0, ' 3', 'Hulu Sungai Tengah', ' 3', '3', '0', '0', '0', '0', '', 'calon', '', '2018-06-17 10:37:23', '0000-00-00 00:00:00'),
(4, 4, '4', '44', 'L', 'Islam', 'nea', '2018-06-17', 0, ' 4', 'Banjar', ' 4', '4', '4', '4', '4', '4', '', 'aktif', '', '2018-06-17 10:44:00', '0000-00-00 00:00:00'),
(5, 5, '55', '5', 'L', 'Islam', '55', '2018-06-03', 0, ' 5', 'Barito Kuala', ' 5', ' 5', '0', '0', '0', '0', '', 'meninggal', '', '2018-06-17 10:45:19', '0000-00-00 00:00:00'),
(11, 0, '21', '123451', 'L', 'Islam', '1', '2018-06-07', 0, '1', 'Hulu Sungai Tengah', '1', '', '', '', '', '', '', 'calon', 'n', '2018-06-21 21:58:17', '2018-06-21 21:58:17'),
(12, 0, '211', '123451', 'L', 'Islam', '1', '2018-06-07', 0, '1', 'Hulu Sungai Tengah', '1', '', '', '', '', '', '', 'calon', 'n', '2018-06-21 21:58:39', '2018-06-21 21:58:39'),
(13, 0, '123', '12', 'L', 'Islam', '12', '2018-05-30', 0, '12', 'Banjar', '1212', '', '', '', '', '', '', 'calon', 'n', '2018-06-21 22:10:14', '2018-06-21 22:10:14'),
(121, 12, '2', '21', 'P', 'Islam', '2121', '2018-06-22', 0, '1234  ', 'Balangan', '2  ', '1  ', '121', '21', '21  ', '21  ', '0', 'calon', '', '2018-06-22 09:15:05', '2018-06-22 09:32:06'),
(23233, 2312, '312', '3', 'L', 'Islam', '3', '2018-06-22', 0, '23', 'Banjar', '32', '3', '23', '23', '32', '2', '0', 'calon', '', '2018-06-22 09:32:31', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `kd_mp` varchar(10) NOT NULL,
  `mapel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`kd_mp`, `mapel`) VALUES
('BID', 'Bahasa Indonesia'),
('BING', 'Bahasa Inggris');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_rombel` int(11) NOT NULL,
  `kd_mp` int(11) NOT NULL,
  `nir` int(15) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama_pegawai` varchar(150) NOT NULL,
  `sex` varchar(2) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(254) NOT NULL,
  `hp` varchar(20) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `probi` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `file_foto` varchar(100) NOT NULL,
  `tgl_insert` datetime NOT NULL,
  `tgl_update` datetime NOT NULL,
  `status` enum('PNS','Kontrak') NOT NULL,
  `pendidikan` char(30) NOT NULL,
  `jurusan` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nip`, `nama_pegawai`, `sex`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `hp`, `jabatan`, `probi`, `password`, `file_foto`, `tgl_insert`, `tgl_update`, `status`, `pendidikan`, `jurusan`, `email`) VALUES
(1, '1', 'Muhammad Ifan Mashudi', 'L', 'Martapura', '1995-04-09', 'Jln. Rahayu No.43 Sungai Paring Martapura', '+6287816669990', 'Petugas Keamanan', '', 'c4ca4238a0b923820dcc509a6f75849b', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Kontrak', 'SMA / Sederajat', 'IPA', ''),
(4, '3', '3', 'L', '3', '2018-06-12', '3', '3', '3', '', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', '', '2018-05-24 10:12:23', '0000-00-00 00:00:00', 'PNS', 'SD / Sederajat', '3', ''),
(5, '3', '3', 'L', '3', '2018-05-29', '3', '3', '3', '', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'PNS', 'D3', '3', '');

-- --------------------------------------------------------

--
-- Table structure for table `penempatan`
--

CREATE TABLE `penempatan` (
  `id_penempatan` int(11) NOT NULL,
  `id_klien` int(10) NOT NULL,
  `kd_asrama` varchar(15) NOT NULL,
  `tgl_insert` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `penempatan`
--

INSERT INTO `penempatan` (`id_penempatan`, `id_klien`, `kd_asrama`, `tgl_insert`) VALUES
(16, 1, '2', '2018-06-22 15:34:16'),
(17, 4, '1', '2018-06-23 12:20:30');

-- --------------------------------------------------------

--
-- Table structure for table `penentuan_rombel`
--

CREATE TABLE `penentuan_rombel` (
  `id_penentuan` int(11) NOT NULL,
  `id_rombel` int(11) NOT NULL,
  `id_tahunakademik` int(4) NOT NULL,
  `nir` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `penunjukan`
--

CREATE TABLE `penunjukan` (
  `id_penunjukan` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `nama_pegawai` varchar(128) NOT NULL,
  `kd_asrama` int(15) NOT NULL,
  `sk` varchar(30) NOT NULL,
  `tmt` varchar(64) NOT NULL,
  `tgl_sk` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `penunjukan`
--

INSERT INTO `penunjukan` (`id_penunjukan`, `id_pegawai`, `nama_pegawai`, `kd_asrama`, `sk`, `tmt`, `tgl_sk`) VALUES
(8, 1, 'Muhammad Ifan Mashudi', 2, '', '', NULL),
(13, 1, 'Muhammad Ifan Mashudi', 1, '123', '12', '2018-06-13');

-- --------------------------------------------------------

--
-- Table structure for table `penyaluran`
--

CREATE TABLE `penyaluran` (
  `id_penyaluran` int(11) NOT NULL,
  `tgl_disalurkan` date NOT NULL,
  `nir` varchar(15) NOT NULL,
  `nilai` int(11) NOT NULL,
  `acc_pembinaan` enum('Y','T') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `probi`
--

CREATE TABLE `probi` (
  `kd_probi` varchar(10) NOT NULL,
  `probi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `probi`
--

INSERT INTO `probi` (`kd_probi`, `probi`) VALUES
('001', 'Bimbingan Dasar'),
('002', 'Bimbingan Persiapan'),
('1', 'Bimbingan Skripsi'),
('BPS', 'Bimbingan Pijat Shi-atsu'),
('BPSM', 'Bimbingan Pijat Sport Massage');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_penempatan`
--

CREATE TABLE `riwayat_penempatan` (
  `id` int(11) NOT NULL,
  `id_penempatan` int(11) NOT NULL,
  `id_klien` int(11) NOT NULL,
  `nama_klien` varchar(124) NOT NULL,
  `kd_asrama_asal` varchar(11) NOT NULL,
  `asrama_asal` varchar(124) NOT NULL,
  `kd_asrama_akhir` varchar(11) NOT NULL,
  `asrama_akhir` varchar(124) NOT NULL,
  `ket` varchar(123) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `riwayat_penempatan`
--

INSERT INTO `riwayat_penempatan` (`id`, `id_penempatan`, `id_klien`, `nama_klien`, `kd_asrama_asal`, `asrama_asal`, `kd_asrama_akhir`, `asrama_akhir`, `ket`, `tanggal`) VALUES
(6, 16, 1, '2', '1', 'Merah Siam', '2', 'Kecubung', 'pindah', '2018-06-22 07:34:16'),
(7, 17, 4, '44', '', '', '1', 'Merah Siam', 'tambah', '2018-06-23 04:20:30');

-- --------------------------------------------------------

--
-- Table structure for table `rombel`
--

CREATE TABLE `rombel` (
  `id_rombel` int(11) NOT NULL,
  `rombel` varchar(30) NOT NULL,
  `kelas` enum('A','B','C','D','E','F') NOT NULL,
  `kd_probi` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rombel`
--

INSERT INTO `rombel` (`id_rombel`, `rombel`, `kelas`, `kd_probi`) VALUES
(1, '1', 'A', '002'),
(2, '2', 'A', '001');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `kd_ruangan` varchar(10) NOT NULL,
  `nama_ruangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`kd_ruangan`, `nama_ruangan`) VALUES
('1', '1'),
('BT01', 'Ruangan Bimbingan Teori 1');

-- --------------------------------------------------------

--
-- Table structure for table `tahunakademik`
--

CREATE TABLE `tahunakademik` (
  `id_tahunakademik` int(4) NOT NULL,
  `tahunakademik` varchar(10) NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL,
  `semester_aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tahunakademik`
--

INSERT INTO `tahunakademik` (`id_tahunakademik`, `tahunakademik`, `status`, `semester_aktif`) VALUES
(1, '1', '', 0),
(2, '2018', 'Aktif', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id_username`);

--
-- Indexes for table `asrama`
--
ALTER TABLE `asrama`
  ADD PRIMARY KEY (`kd_asrama`);

--
-- Indexes for table `instruktur`
--
ALTER TABLE `instruktur`
  ADD PRIMARY KEY (`id_instruktur`);

--
-- Indexes for table `klien`
--
ALTER TABLE `klien`
  ADD PRIMARY KEY (`id_klien`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`kd_mp`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `penempatan`
--
ALTER TABLE `penempatan`
  ADD PRIMARY KEY (`id_penempatan`);

--
-- Indexes for table `penentuan_rombel`
--
ALTER TABLE `penentuan_rombel`
  ADD PRIMARY KEY (`id_penentuan`);

--
-- Indexes for table `penunjukan`
--
ALTER TABLE `penunjukan`
  ADD PRIMARY KEY (`id_penunjukan`);

--
-- Indexes for table `penyaluran`
--
ALTER TABLE `penyaluran`
  ADD PRIMARY KEY (`id_penyaluran`);

--
-- Indexes for table `probi`
--
ALTER TABLE `probi`
  ADD PRIMARY KEY (`kd_probi`);

--
-- Indexes for table `riwayat_penempatan`
--
ALTER TABLE `riwayat_penempatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rombel`
--
ALTER TABLE `rombel`
  ADD PRIMARY KEY (`id_rombel`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`kd_ruangan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id_username` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `klien`
--
ALTER TABLE `klien`
  MODIFY `id_klien` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23234;
--
-- AUTO_INCREMENT for table `penempatan`
--
ALTER TABLE `penempatan`
  MODIFY `id_penempatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `penunjukan`
--
ALTER TABLE `penunjukan`
  MODIFY `id_penunjukan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `riwayat_penempatan`
--
ALTER TABLE `riwayat_penempatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `rombel`
--
ALTER TABLE `rombel`
  MODIFY `id_rombel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
