-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2018 at 04:32 PM
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
  `kd_asrama` int(15) NOT NULL,
  `asrama` varchar(50) NOT NULL,
  `kouta` varchar(10) NOT NULL,
  `id_pegawai` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `asrama`
--

INSERT INTO `asrama` (`kd_asrama`, `asrama`, `kouta`, `id_pegawai`) VALUES
(1, 'Merah Siam', '15', '1'),
(2, 'Kecubung', '20', '1'),
(3, 'Intan', '17', '4'),
(4, 'Berlian', '15', ''),
(5, 'Mutiara', '15', '');

-- --------------------------------------------------------

--
-- Table structure for table `instruktur`
--

CREATE TABLE `instruktur` (
  `id_instruktur` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(124) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `instruktur`
--

INSERT INTO `instruktur` (`id_instruktur`, `id_pegawai`, `username`, `password`) VALUES
(1, 2, 'ifan', 'ed447b10b54c1ccbf0adffad50421770'),
(2, 3, 'nikman', '2c4f39a75ecdbe71fede540acc38985a'),
(3, 5, 'ayu', '29c65f781a1068a41f735e1b092546de');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(10) NOT NULL,
  `id_tahunakademik` int(11) NOT NULL,
  `id_rombel` varchar(164) NOT NULL,
  `kd_mapel` varchar(10) NOT NULL,
  `id_instruktur` int(11) NOT NULL,
  `hari` varchar(100) NOT NULL,
  `jam` varchar(20) NOT NULL,
  `kd_ruangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_tahunakademik`, `id_rombel`, `kd_mapel`, `id_instruktur`, `hari`, `jam`, `kd_ruangan`) VALUES
(6, 2, 'BD1', 'BING', 1, 'Senin', '08:00', 'BTo1'),
(7, 2, 'BD1', 'BID', 2, 'Selasa', '08:00', 'BTo1'),
(8, 2, 'BD1', 'BING', 1, 'Rabu', '09:00', 'BT01'),
(9, 2, 'BD1', 'BID', 1, 'Minggu', '09:00', 'BT01'),
(10, 2, 'BD2', 'BID', 1, 'Senin', '08:00', 'BT01'),
(11, 2, 'BD2', 'BID', 1, 'Selasa', '08:00', 'BT01'),
(12, 2, 'BD2', 'BJ', 1, 'Rabu', '09:00', 'BT01'),
(13, 2, 'BD1', 'BJ', 2, 'Senin', '10:00', 'BT01');

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

INSERT INTO `klien` (`id_klien`, `nir`, `nik`, `nama_klien`, `sex`, `agama`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `kota`, `hp`, `email`, `nama_ayah`, `nama_ibu`, `alamat_ortu`, `hp_ortu`, `foto`, `status`, `status_daftar`, `tgl_insert`, `tgl_update`) VALUES
(1, 8988, '689876567876', 'Razuburrahman', 'L', 'Islam', 'Martapura', '2018-06-12', ' Jalan Kecubung', 'Banjar', ' 0876567876', 'razib@gmil.com', 'razib', 'zibah', 'kecubung', '087663334343', 'IMG_3519.jpg', 'aktif', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 867876, '6786567876678', 'Dinda', 'P', 'Islam', 'Banjarmasin', '1996-07-11', ' Jalan Sesat   ', 'Barito Kuala', ' 08822828   ', 'dinda@outlook.com   ', 'dondo', 'dindah', 'pasay   ', '0987378933   ', 'mengganti-warna-background-pas-foto.jpg', 'aktif', '0', '0000-00-00 00:00:00', '2018-06-30 03:31:39'),
(3, 897678, '67654567876', 'Rahmah', 'P', 'Islam', 'Banjarbaru', '2018-06-13', ' Jalan Kecubung ', 'Banjar', ' 08789222 ', ' rahmah@gmail.com ', 'Ayah', 'Ibu', 'Alamat ', '09876567890 ', 'Pas_Foto_3_x_4.jpg', 'aktif', '0', '0000-00-00 00:00:00', '2018-06-28 10:33:16');

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
('BING', 'Bahasa Inggris'),
('BJ', 'Bahasa Jepang');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_rombel` varchar(126) NOT NULL,
  `kd_mp` varchar(126) NOT NULL,
  `id_klien` int(15) NOT NULL,
  `nilai` int(11) NOT NULL,
  `id_tahunakademik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `id_rombel`, `kd_mp`, `id_klien`, `nilai`, `id_tahunakademik`) VALUES
(10, 'BD1', 'BID', 3, 1, 2),
(11, 'BD1', 'BID', 2, 12, 2);

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
(2, '613454321342345', 'Muhammad Ifan Mashudi', 'L', 'Martapura', '1995-04-09', 'Jln. Rahayu No.43 Sungai Paring Martapura', '+6287816669990', 'Petugas Keamanan', '', '7128dad275c11cc3c85b53a832dbc618', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Kontrak', 'SMA / Sederajat', 'IPA', ''),
(3, '45678675643454', 'Muhammad Ni\'man Nasir', 'L', 'Martapura', '1995-01-31', 'Pasayangan', '088383888', 'Eselon 1', '', 'f184bf0e71216be5021aeae10055b62f', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'PNS', 'S1', 'Ilmu Komputer', ''),
(4, '6544546575634', 'Harunu Rasyid', 'L', 'Banjarmasin', '1995-01-12', 'Jalan Pasayangan', '08867878', 'Eselon 1', '', 'ce8baf0cc8c5733941f4db6d25dcc873', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Kontrak', 'S1', 'Akutansi', ''),
(5, '65434567656765', 'Ayu Riani', 'P', 'Martapura', '1995-01-26', 'Jalan Mesjid No. 29', '08945754234', 'Petugas Entry Data', '', '4472ada7289a63b4ca9d8d38ccd32285', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Kontrak', 'S1', 'Akutansi', '');

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
(17, 4, '1', '2018-06-23 12:20:30'),
(20, 2, '2', '2018-06-29 11:54:00'),
(21, 3, '1', '2018-06-29 11:54:28');

-- --------------------------------------------------------

--
-- Table structure for table `penentuan_rombel`
--

CREATE TABLE `penentuan_rombel` (
  `id_penentuan` int(11) NOT NULL,
  `id_rombel` varchar(255) NOT NULL,
  `id_tahunakademik` int(4) NOT NULL,
  `id_klien` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `penentuan_rombel`
--

INSERT INTO `penentuan_rombel` (`id_penentuan`, `id_rombel`, `id_tahunakademik`, `id_klien`) VALUES
(11, 'BD1', 2, 3),
(12, 'BD2', 2, 1),
(13, 'BD2', 2, 2),
(14, 'BD1', 2, 2);

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
  `id_klien` int(15) NOT NULL,
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
('BD', 'Bimbingan Dasar'),
('BP', 'Bimbingan Persiapan'),
('BPS', 'Bimbingan Pijat Shi-atsu'),
('BPSM', 'Bimbingan Pijat Sport Massage'),
('BS1', 'Bimbingan Skripsi');

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
(7, 17, 4, '44', '', '', '1', 'Merah Siam', 'tambah', '2018-06-23 04:20:30'),
(8, 18, 2, 'Dinda', '', '', '2', 'Kecubung', 'tambah', '2018-06-29 03:43:04'),
(9, 19, 3, 'Rahmah', '', '', '2', 'Kecubung', 'tambah', '2018-06-29 03:43:10'),
(10, 19, 3, 'Rahmah', '2', 'Kecubung', '', '', 'hapus', '2018-06-29 03:53:52'),
(11, 18, 2, 'Dinda', '2', 'Kecubung', '', '', 'hapus', '2018-06-29 03:53:55'),
(12, 20, 2, 'Dinda', '', '', '2', 'Kecubung', 'tambah', '2018-06-29 03:54:00'),
(13, 21, 3, 'Rahmah', '', '', '1', 'Merah Siam', 'tambah', '2018-06-29 03:54:28');

-- --------------------------------------------------------

--
-- Table structure for table `rombel`
--

CREATE TABLE `rombel` (
  `id_rombel` varchar(11) NOT NULL,
  `rombel` varchar(30) NOT NULL,
  `kelas` varchar(15) NOT NULL,
  `kd_probi` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rombel`
--

INSERT INTO `rombel` (`id_rombel`, `rombel`, `kelas`, `kd_probi`) VALUES
('BD1', 'Bimbingan Dasar A', 'A', 'BD'),
('BD2', 'Bimbingan Dasar B', 'B', 'BD'),
('BD3', 'Bimbingan Dasar C', 'C', 'BD'),
('BP1', 'Bimbingan Persiapan A', 'A', 'BP'),
('BP2', 'Bimbingan Persiapan B', 'B', 'BP'),
('BP3', 'Bimbingan Persiapan C', 'C', 'BP');

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
('BT01', 'Ruangan Bimbingan Teori 2'),
('BTo1', 'Ruangan Bimbingan Teori 2');

-- --------------------------------------------------------

--
-- Table structure for table `tahunakademik`
--

CREATE TABLE `tahunakademik` (
  `id_tahunakademik` int(4) NOT NULL,
  `tahunakademik` varchar(10) NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tahunakademik`
--

INSERT INTO `tahunakademik` (`id_tahunakademik`, `tahunakademik`, `status`) VALUES
(2, '2018', 'Aktif'),
(11, '2010', 'Tidak Aktif');

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
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

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
-- Indexes for table `tahunakademik`
--
ALTER TABLE `tahunakademik`
  ADD PRIMARY KEY (`id_tahunakademik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id_username` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `asrama`
--
ALTER TABLE `asrama`
  MODIFY `kd_asrama` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `instruktur`
--
ALTER TABLE `instruktur`
  MODIFY `id_instruktur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `klien`
--
ALTER TABLE `klien`
  MODIFY `id_klien` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `penempatan`
--
ALTER TABLE `penempatan`
  MODIFY `id_penempatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `penentuan_rombel`
--
ALTER TABLE `penentuan_rombel`
  MODIFY `id_penentuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `penunjukan`
--
ALTER TABLE `penunjukan`
  MODIFY `id_penunjukan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `penyaluran`
--
ALTER TABLE `penyaluran`
  MODIFY `id_penyaluran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `riwayat_penempatan`
--
ALTER TABLE `riwayat_penempatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tahunakademik`
--
ALTER TABLE `tahunakademik`
  MODIFY `id_tahunakademik` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
