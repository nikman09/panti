-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2018 at 10:38 AM
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
(1, 'admin', 'ed447b10b54c1ccbf0adffad50421770', 'M.Ifan Mashudi', '1.jpg'),
(2, 'admin2', '827ccb0eea8a706c4c34a16891f84e7b', '1234567891', '2.JPG');

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
(1, 'KECUBUNG1', '14', '18'),
(2, 'BERLIAN', '14', '20'),
(3, 'INTAN', '14', '19'),
(4, 'MERAH SIAM', '14', '16'),
(5, 'MUTIARA', '15', '1'),
(6, '23', '2', '');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `judul` varchar(225) NOT NULL,
  `keterangan` varchar(225) NOT NULL,
  `isi` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `judul`, `keterangan`, `isi`, `tanggal`) VALUES
(3, 'SARANA DAN PRASARANA', 'Fasilitas', 'Dalam upaya memberikan pelayanan rehabilitasi sosial yang prima, PSBN Fajar Harapan didukung dengan berbagai sarana dan prasarana seperti :Kantor dan peralatannya, mobil opersional, Asrama, ruang makan /dapur, ruang belajar, ruang praktek keterampilan tangan, ruang praktek pijat, ruang & lapangan olahraga, lab. Komputer Braille, laboratorium komputer bicara, poliklinik, ruang musik/band, perpustakaan braille, mushalla dll.', '2018-07-24'),
(4, 'DUKUNGAN PENDIDIKAN FORMAL', 'Pendidikan', 'Bagi klien yang masih mempunyai kesempatan untuk menempuh pedidikan formal, PSBN Fajar Harapan memberikan dukungan dengan cara bekerja sama dengan Dinas Pendidikan dan SLB-A Fajar Harapan dari tingkat SDLB, SMPLB, dan SMALB Martapura, serta Pendidikan Inklusi di SMA 4 Banjarbaru (Pendidikan Inklusi= penyandang cacat/anak berkebutuhan khusus bersekolah di sekolah umum).', '2018-07-13'),
(5, '22', '2', '2', '2018-07-24');

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
(2, 4, 'ida', '202cb962ac59075b964b07152d234b70'),
(3, 7, 'awi', 'd41d8cd98f00b204e9800998ecf8427e'),
(4, 21, 'jumiati', '9df83fa6b486ad8ea5ac8bdc0420b5aa'),
(5, 8, 'ita', '78b0fb7d034c46f13890008e6f36806b'),
(6, 10, 'misrudin', '3ea0073958c224587a77172943f41631'),
(7, 26, 'ifan', 'ed447b10b54c1ccbf0adffad50421770'),
(8, 5, '123123', '4297f44b13955235245b2497399d7a93'),
(9, 2, '212', 'a01610228fe998f515a72dd730294d87');

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
(1, 1, '1', 'A', 3, 'Senin', '16:45-17:30', '1'),
(2, 1, '1', 'AP', 2, 'Selasa', '08:00-08:45', '2'),
(3, 1, '1', 'BING', 4, 'Selasa', '08:00-08:45', '3'),
(4, 1, '1', 'BIND', 5, 'Kamis', '11:00-11:45', '4'),
(5, 1, '1', 'A', 2, 'Senin', '08:00-08:45', '7');

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
  `kategori` enum('Total','Low Vision') NOT NULL,
  `agama` enum('Islam','Kristen Protestan','Katolik','Hindu','Budha','Kong Hu Cu') NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `hp` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama_ayah` varchar(100) NOT NULL,
  `pekerjaan_ayah` varchar(50) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `pekerjaan_ibu` varchar(50) NOT NULL,
  `alamat_ortu` varchar(150) NOT NULL,
  `hp_ortu` varchar(50) NOT NULL,
  `foto` text NOT NULL,
  `status` enum('calon','aktif','keluar','lulus','meninggal') NOT NULL,
  `status_daftar` varchar(20) NOT NULL,
  `tgl_insert` datetime NOT NULL,
  `tgl_update` datetime NOT NULL,
  `tgl_masuk` datetime NOT NULL,
  `tgl_daftar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `klien`
--

INSERT INTO `klien` (`id_klien`, `nir`, `nik`, `nama_klien`, `sex`, `kategori`, `agama`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `kota`, `hp`, `email`, `nama_ayah`, `pekerjaan_ayah`, `nama_ibu`, `pekerjaan_ibu`, `alamat_ortu`, `hp_ortu`, `foto`, `status`, `status_daftar`, `tgl_insert`, `tgl_update`, `tgl_masuk`, `tgl_daftar`) VALUES
(1, 521, ' ', 'NURDIN', 'L', 'Total', 'Islam', 'RANTAU', '1972-02-02', ' Desa Andika Kec. Tapin Tengah', 'TAPIN', '22', '22', 'AGAH', '', '0', '', 'Desa Andika Kabupaten Tapin', ' 0', 'IMG_0140_copy.jpg', 'aktif', '0', '0000-00-00 00:00:00', '2018-07-24 09:25:43', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 307, '0', 'ARNAIN', 'L', 'Total', 'Islam', 'RANTAU', '1982-07-06', ' Desa Ilir Kecamatan Tapin Tengah', 'TAPIN', ' 0', ' 0', 'AMAS', '', '0', '', '  Desa Ilir Kecamatan Tapin Tengah', ' 0', '', 'aktif', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 424, '0', 'RUSMIATI', 'P', 'Total', 'Islam', 'GAMBUT', '1988-02-20', ' Handil II Rt.05 Rw.02 Banyu Hirang Kecamatan Gambut', 'BANJAR', ' 0', '0', 'M. HASAN B.', '', '0', '', '  Handil II Rt.05 Rw.02 Banyu Hirang Kecamatan Gambut', ' 0', 'IMG_0114_copy.jpg', 'aktif', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 436, ' ', 'M. RIZAL', 'L', 'Total', 'Islam', 'Banjarmasin', '1983-07-29', 'Jln. Pangeran Gang Rahman ', 'BANJARMASIN', ' ', ' ', 'H. SYAHRANI', '', ' ', '', 'Jln. Pangeran Gang Rahman', ' ', 'IMG_0151_copy.jpg', 'lulus', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 447, ' ', 'PARIDI', 'L', 'Total', 'Islam', 'Limpasu', '1989-09-05', ' Desa Pihandam No.2 Rt.07 Umpasu Kec. Batai Alai Utara', 'HULU SUNGAI TENGAH', '  ', '  ', 'JAILANI', '', ' ', '', ' Desa Pihandam No.2 Rt.07 Umpasu Kec. Batai Alai Utara', '  ', 'IMG_0134_copy.jpg', 'aktif', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 455, ' ', 'RUMAIYANTI', 'P', 'Total', 'Islam', 'Barabai', '1989-07-03', ' Desa Sulangai Kec. Birayang', 'HULU SUNGAI TENGAH', ' ', ' ', 'M. SAKARIN', '', ' ', '', '  Desa Sulangai Kec. Birayang', ' ', 'IMG_0099_copy.jpg', 'aktif', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 475, ' ', 'DEWI KANASTRI', 'P', 'Total', 'Islam', 'Madiun', '1977-04-12', 'Jln. Kelayan B Timur No.32 Rt.07 ', 'BANJARMASIN', ' ', ' ', 'SUKENDAR', '', ' ', '', ' ', ' ', 'Dewi_Kanastri.jpg', 'aktif', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 480, ' ', 'ASNA', 'P', 'Total', 'Islam', 'Tanjung', '1990-02-10', 'Desa Banyu Tajun Kec. Tanjung', 'TABALONG', ' ', ' ', 'MISTAR', '', '', '', ' Desa Banyu Tajun Kec. Tanjung', ' ', 'IMG_0110_copy.jpg', 'aktif', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 481, ' ', 'RAHMAT', 'L', 'Total', 'Islam', 'Tanjung', '1988-09-02', 'Desa Kertak Panjang Kambitin Rt.05 ', 'TABALONG', ' ', ' ', 'ABIDIN', '', ' ', '', 'Desa Kertak Panjang Kambitin Rt.05 ', ' ', 'IMG_0141_copy.jpg', 'aktif', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 482, ' ', 'RUSDI', 'L', 'Total', 'Islam', 'Tanjung', '1990-10-05', 'Desa Kertak Panjang Kambitin Rt.05 ', 'TABALONG', ' ', ' ', 'ABIDIN', '', '', '', 'Desa Kertak Panjang Kambitin Rt.05 ', ' ', 'IMG_0097_copy.jpg', 'aktif', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 501, ' ', 'LAMIAH', 'P', 'Total', 'Islam', 'Balangan', '1982-06-30', 'Desa Buntu Kabau Rt.03 Kec. Juai', 'BALANGAN', ' ', ' ', 'RUSLI', '', '', '', '', '', 'IMG_0106_copy.jpg', 'aktif', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 611, ' ', 'SARIPUDIN', 'L', 'Total', 'Islam', 'Panaan', '1984-10-17', 'Desa Panaan Rt.05 Kec.Bintang Aka', 'TABALONG', '', ' ', ' ', '', ' ', '', '', '', '', 'aktif', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 516, ' ', 'WAHYU', 'L', 'Total', 'Islam', 'Sungai Danau', '1995-08-09', 'Desa Angsana Kec. Sungai Danau', 'TANAH BUMBU', ' ', '', 'H. ABDUL MALIK', '', '', '', 'Desa Angsana Kec. Sungai Danau', '', 'wahyu.jpg', 'aktif', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 526, ' ', 'LEMAN ABIDIN', 'L', 'Total', 'Islam', 'Kotabaru', '1998-06-16', 'Sebamban 3 Desa Indra Cuka Jaya Rt.06 Dusun II Kec. Kurau', 'TANAH BUMBU', '', '', '', '', 'MELLY HAYATIN', '', 'Sebamban 3 Desa Indra Cuka Jaya Rt.06 Dusun II Kec. Kurau Kab. Tanah Bumbu', '', 'Leman_Abidin.jpg', 'aktif', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 527, ' ', 'IKHSANUL SADIKIN', 'L', 'Total', 'Islam', 'Martapura', '2001-03-12', 'Desa Tungkaran Rt.06 Rw.03 Kab. Banjar', 'BANJAR', '', '', 'SLAMET', '', '', '', 'Desa Tungkaran Rt.06 Rw.03 Kab. Banjar', '', 'Ikhsanul.jpg', 'aktif', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 528, ' ', 'TARMIJI', 'L', 'Total', 'Islam', 'Banjarbaru', '1995-06-08', 'Jln. Kastela Banjarbaru', 'BANJARBARU', '', '', 'M. YUSUF', '', '', '', 'Jln. Kastela Banjarbaru', '', '', 'aktif', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 534, ' ', 'DIAN SUKMA', 'L', 'Total', 'Islam', 'Halong', '1993-05-12', 'Halong Kab. Balangan', 'BALANGAN', ' ', ' ', 'BUDIANO', '', '', '', 'Halong Kab. Balangan', '', 'IMG_0130_copy.jpg', 'aktif', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 535, ' ', 'ZAKIYAH FITRIYANA', 'P', 'Total', 'Islam', 'Samarinda', '1995-02-27', 'Jln. Martadinata Gg. Abadi Kec. Samarinda Hulu', 'BANJAR', '', '', 'ABDUL SANI', '', '', '', 'Jln. Martadinata Gg. Abadi Kec. Samarinda Hulu', '', 'IMG_0120_copy.jpg', 'aktif', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 545, ' ', 'TERIMENI', 'P', 'Total', 'Islam', 'Panarukan', '1986-11-18', 'Komp. DPR Gg.04 No.28 Rt. 25 Banjarmasin', 'BANJARMASIN', ' ', '', 'SUTAL', '', '', '', 'Komp. DPR Gg.04 No.28 Rt. 25 Banjarmasin', '', 'IMG_0109_copy.jpg', 'aktif', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 547, ' ', 'AHMAD NAZIMULLAH', 'L', 'Total', 'Islam', 'Bangkal', '2002-02-08', 'Jln. Mistar Cokro Kusumo Bangkal Rt.11 Rw.03 Kel. Bangkal Kec. Cempaka', 'BANJARBARU', '', '', 'HAMID', '', '', '', 'Jln. Mistar Cokro Kusumo Bangkal Rt.11 Rw.03 Kel. Bangkal Kec. Cempaka', '', 'Adzim.jpg', 'aktif', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 554, ' ', 'INDRA JAYA', 'L', 'Total', 'Islam', 'Samarinda', '1992-11-13', 'Jln. Kamboja Rt.07 Kandangan', 'HULU SUNGAI SELATAN', '', '', 'MISRAN', '', '', '', 'Jln. Kamboja Rt.07 Kandangan', '', '', 'aktif', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 555, ' ', 'FATMAWATI', 'P', 'Total', 'Islam', 'Tabalong', '2003-02-10', 'Kubah Panjang Rt.05 Kec. Tanjung Kab. Tabalong', 'TABALONG', '', '', 'RIYUN', '', '', '', 'Kubah Panjang Rt.05 Kec. Tanjung Kab. Tabalong', '', 'IMG_0100_copy.jpg', 'aktif', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 557, ' ', 'TIA SRI HENDRIANTY', 'P', 'Total', 'Islam', 'Agung', '1999-08-22', 'Kambitin Rt.01 Kec. Tanjung Kab. Tabalong', 'TABALONG', '', '', 'HENDRIK', '', '', '', 'Kambitin Rt.01 Kec. Tanjung Kab, Tabalong', '', 'IMG_0103_copy.jpg', 'aktif', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 558, ' ', 'AKHMAD KHAIRUDDIN', 'L', 'Total', 'Islam', 'Samarinda', '2000-09-14', 'Jln. Kuranji Guntung Manggis Landasan Ulin', 'BANJARBARU', '', '', 'TARSO', '', '', '', 'Jln. Kuranji Guntung Manggis Landasan Ulin', '', 'udin.jpg', 'aktif', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 566, ' ', 'AMELIA NILAM C', 'P', 'Total', 'Islam', 'Batulicin', '2001-03-07', 'Batulicin Kab. Tanah Bumbu', 'TANAH BUMBU', '', '', 'SUPIRANTO', '', '', '', 'Batulicin Kab. Tanah Bumbu', '', 'IMG_0104_copy.jpg', 'aktif', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 568, ' ', 'DARIANTO', 'L', 'Total', 'Islam', 'Landasan Ulin', '1999-12-02', 'Jln. Garuda Tambak Buluh Landasan Ulin', 'BANJARBARU', '', '', 'SOLIHIN', '', '', '', 'Jln. Garuda Tambak Buluh Landasan Ulin', '', 'Daryanto.jpg', 'aktif', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 569, ' ', 'FARID', 'L', 'Total', 'Islam', 'Gresik', '1986-07-18', 'Jln. Sapta Marga Blok. E Rt.10 Rw.05 Guntung Payung Banjarbaru', 'BANJARBARU', '', '', 'SUDIRMAN', '', '', '', '', '', 'IMG_0148_copy.jpg', 'aktif', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 574, ' 63078928381231', 'ANWARUDDIN', 'L', 'Total', 'Islam', 'Jatibaru', '1992-11-03', 'Jln. Sungai Maun Baru Rt.04 Jati Kec. Astambul', 'BANJAR', '085345954379', 'anwar.psbn@gmail.com', 'HASBULLAH', '', 'HASMIAH', '', 'Jln. Sungai Maun Baru Rt.04 Jati Kec. Astambul', '08538278278', 'IMG_0145_copy.jpg', 'aktif', '0', '0000-00-00 00:00:00', '2018-07-15 01:19:25', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 575, ' ', 'ALIA', 'P', 'Total', 'Islam', 'Amuntai', '1991-05-25', 'Desa Anjir Muara Lama Rt.01 Kec. Anjir Muara Kab. Batola', 'BARITO KUALA', '', '', 'DARKUNI', '', '', '', 'Desa Anjir Muara Lama Rt.01 Kec. Anjir Muara Kab. Batola', '', 'IMG_0122_copy.jpg', 'aktif', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 576, ' ', 'NURFATIMAH ASMIDA YANTI', 'P', 'Total', 'Islam', 'Batola', '2003-08-08', 'Pasar Senin Rt.01 Desa Tampah Kec. Mandastana', 'BARITO KUALA', '', '', 'DARIANTO', '', '', '', 'Pasar Senin Rt.01 Desa Tampah Kec. Mandastana', '', 'Ambar.jpg', 'aktif', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 579, ' ', 'NORKHOLIK', 'L', 'Total', 'Islam', 'Gunung Makmur', '1981-01-17', 'Desa Gunung Makmur Rt.14 Kec.Tangkisung Kab.Tanah Laut', 'TANAH LLAUT', ' ', ' ', 'IMAM GAZALI', '', '', '', 'Desa Gunung Makmur Rt.14 Kec.Tangkisung Kab.Tanah Laut', '', 'IMG_0144_copy.jpg', 'lulus', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 580, ' ', 'MAHDIANSYAH', 'L', 'Total', 'Islam', 'Hulu Sungai Tengah', '1990-03-01', 'Desa Sungai Anting Rt.03 Rw.02 Kec.Candi Laras Kab.Tapin', 'TAPIN', '', '', '', '', 'RUSIAH', '', 'Desa Sungai Anting Rt.03 Rw.02 Kec.Candi Laras Kab.Tapin', '', 'IMG_0157_copy.jpg', 'aktif', 'y', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 0, ' 1', 'JANAWI', 'L', 'Total', 'Islam', 'Tigarun', '1990-06-01', 'Desa Tigarun Kec.Amuntai Kab.HSU', 'HULU SUNGAI UTARA', ' ', '', 'KURSANI', '', ' ', '', 'Desa Tigarun Kec.Amuntai Kab.HSU', ' ', '', 'aktif', 'y', '2018-07-14 00:21:28', '2018-07-14 00:21:28', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 582, ' ', 'ANITA', 'L', 'Total', 'Islam', 'Tigarun', '1991-01-01', 'Desa Tigarun Rt.01 Kec.Amuntai Tengah Kab.HSU', 'HULU SUNGAI UTARA', ' ', ' ', 'BAHRIN', '', '', '', 'Desa Tigarun Rt.01 Kec.Amuntai Tengah Kab.HSU', '', 'IMG_0124_copy.jpg', 'aktif', 'y', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 584, ' ', 'LAIDINTA SYAKURA HEROICIDA MELODY ANCE MOKHTAR', 'P', 'Total', 'Islam', 'Banjarmasin', '2007-09-18', 'Jln. Rajawali Komp. TNI AU RT.39 RW.08 Kec.Landasan Ulin Banjarbaru', 'BANJARBARU', '', '', 'M. MOHTAR', '', '', '', 'Jln. Rajawali Komp. TNI AU RT.39 RW.08 Kec.Landasan Ulin Banjarbaru', '', '', 'aktif', 'y', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 585, ' ', 'LUTHFI GAZALI R', 'L', 'Total', 'Islam', 'Marabahan', '1990-07-07', 'Desa Sungai Cuka RT.09 RW.03 Kec.Satui Kab.Tanah Bumbu', 'TANAH BUMBU', '', '', 'AHMAD SYAHRANI', '', '', '', 'Desa Sungai Cuka RT.09 RW.03 Kec.Satui Kab.Tanah Bumbu', '', 'IMG_0155_copy.jpg', 'aktif', 'y', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 586, ' ', 'ISMARTONO', 'L', 'Total', 'Islam', 'Nibung Terjun', '1982-12-02', 'Pondok Darmindo No.60 Banjarbaru', 'BANJARBARU', '', '', '', '', '', '', '', '', 'IMG_0127_copy.jpg', 'aktif', 'y', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 587, ' ', 'DONI DAMARA', 'L', 'Total', 'Islam', 'Sukamara', '1998-07-20', 'Pondok Darmindo No.60 Banjarbaru', 'BANJARBARU', '', '', 'AHMAD SIRAJUDIN', '', '', '', 'Desa Sungai Cuka RT.09 RW.03 Kec.Satui Kab.Tanah Bumbu', '', '', 'aktif', 'y', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 588, ' ', 'M. ERFANSYAH', 'L', 'Total', 'Islam', 'Pagatan', '1996-09-29', 'Jln. Tepian Sungai Rukam RT.01 Desa Serdangan Kec.Kusan Hilir Kab. Tanah Bumbu', 'TANAH BUMBU', '', '', 'MAKMUN', '', '', '', 'Jln. Tepian Sungai Rukam RT.01 Desa Serdangan Kec.Kusan Hilir Kab. Tanah Bumbu', '', 'IMG_0129_copy.jpg', 'aktif', 'y', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 589, ' ', 'FATHUR', 'L', 'Total', 'Islam', 'Sampit', '1976-07-29', 'Komp. Persada Raya II Jalur I RT.11 Kel.Sungai Lulut Kec.Sungai Tabuk Kab.Banjar', 'BANJAR', '', '', 'MUHLIANSYAH', '', '', '', 'Komp. Persada Raya II Jalur I RT.11 Kel.Sungai Lulut Kec.Sungai Tabuk Kab.Banjar', '', 'IMG_0149_copy.jpg', 'aktif', 'y', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 590, ' ', 'RAHMAT LIAN', 'L', 'Total', 'Islam', 'Sei Kambat', '1992-04-11', 'Desa Sei Kambat RT.02 Kel.Sungai Kambat Kec.Cerbon Kab.Barito Kuala', 'BARITO KUALA', '', '', 'UDIN', '', '', '', 'Desa Sei Kambat RT.02 Kel.Sungai Kambat Kec.Cerbon Kab.Barito Kuala', '', 'IMG_0125_copy.jpg', 'aktif', 'y', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 597, ' ', 'YANDI RIZKY PRAWIRA', 'L', 'Total', 'Islam', 'Banjarmasin', '1994-12-31', 'Jln. Veteran Komp.A.Yani II No.36 RT.26 RW.03 Kec.Banjarmasin Timur', 'BANJARMASIN', '', '', 'EDIYANTO', '', '', '', 'Jln. Veteran Komp.A.Yani II No.36 RT.26 RW.03 Kec.Banjarmasin Timur', '', 'IMG_0150_copy.jpg', 'aktif', 'y', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 591, ' ', 'ABDIYAN NOOR', 'L', 'Total', 'Islam', 'Kotabaru', '1984-04-24', 'Jln. Peromnas No.38 RT.05 RW.02 Desa Hilir Muara Kec.Pulau Laut Kab.Kotabaru', 'KOTABARU', ' ', ' ', 'ABD. MARKASIH', '', '', '', 'Jln. Peromnas No.38 RT.05 RW.02 Desa Hilir Muara Kec.Pulau Laut Kab.Kotabaru', '', 'IMG_0147_copy.jpg', 'aktif', 'y', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 592, ' ', 'AMBAR', 'L', 'Total', 'Islam', 'Banjarmasin', '1983-09-10', 'Jln. Perintis Raya RT.02 RW.01 Kec.Tapin Utara', 'TAPIN', '', '', 'JAILANI', '', '', '', 'Jln. Perintis Raya RT.02 RW.01 Kec.Tapin Utara', '', 'IMG_0146_copy.jpg', 'aktif', 'y', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 593, ' ', 'RAGIL KHAIRIYA', 'P', 'Total', 'Islam', 'Banjarbaru', '2007-10-14', 'Jln. Rambai Tengah Sumber Adi RT.02 RW.03 Kel. Guntung Paikat Kec.Banjarbaru Selatan', 'BANJARBARU', '', '', 'DONNY SUPRIYANO', '', '', '', 'Jln. Rambai Tengah Sumber Adi RT.02 RW.03 Kel. Guntung Paikat Kec.Banjarbaru Selatan', '', '', 'aktif', 'y', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, 594, ' ', 'RADEN RAFI PRABANDARU', 'L', 'Total', 'Islam', 'Banjarmasin', '2006-09-24', 'Komp.Borneo Indah Jln. Cemara Blok.B2 No.02 Banjarbaru', 'BANJARBARU', '', '', 'R. SUNARJO PRABANDARU', '', '', '', 'Komp.Borneo Indah Jln. Cemara Blok.B2 No.02 Banjarbaru', '', 'Rafi.jpg', 'aktif', 'y', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 595, ' ', 'ANTO', 'L', 'Total', 'Islam', 'Kapuas', '1988-06-17', 'Desa Hambulau Kec.Kapuas Hilir', 'BANJARBARU', '', '', '', '', 'WAHIDAH', '', 'Desa Hambulau Kec.Kapuas Hilir', '', '', 'aktif', 'y', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, 596, ' ', 'M. ARDIANSYAH', 'L', 'Total', 'Islam', 'Binuang', '1990-06-29', 'Jln. Pantai Atas Desa Raya Belanti RT.04 RW.02 Kec.Binuang Tapin', 'TAPIN', '', '', 'MULYADI', '', '', '', 'Jln. Pantai Atas Desa Raya Belanti RT.04 RW.02 Kec.Binuang Tapin', '', '', 'aktif', 'y', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, 598, ' ', 'ARMAN', 'L', 'Total', 'Islam', 'Pabaugan Pantai', '1994-02-11', 'Desa Pabaugan Pantai RT.02 RW.01 Kec.Candi Laras Selatan Kab. Tapin', 'TAPIN', '', '', 'HAMPI', '', '', '', 'Desa Pabaugan Pantai RT.02 RW.01 Kec.Candi Laras Selatan Kab. Tapin', '', '', 'aktif', 'y', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, 599, ' ', 'M. GAPURI', 'L', 'Total', 'Islam', 'Binjai Pamangkih', '1992-07-01', 'Desa Binjai Pemangkih RT.03 RW.02 Kec. Labuan Amas utara Kab.HST', 'HULU SUNGAI TENGAH', '', '', 'BASDAH', '', '', '', 'Desa Binjai Pemangkih RT.03 RW.02 Kec. Labuan Amas utara Kab.HST', '', 'IMG_0135_copy.jpg', 'aktif', 'y', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, 600, ' ', 'KHIELDY HIDAYATNOR', 'L', 'Total', 'Islam', 'HST', '2000-10-21', 'Desa Angkinang RT.03 RW.02 Kec.Angkinang Kab.HSS', 'HULU SUNGAI SELATAN', '', '', 'ISA ANSHARI', '', '', '', 'Desa Angkinang RT.03 RW.02 Kec.Angkinang Kab.HSS', '', 'kheldi.jpg', 'calon', 'y', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, 601, ' 63498492830290', 'NOR HASAN', 'L', 'Total', 'Islam', 'Marindi', '1991-02-05', 'Desa Marindi RT.06 Kec.Haruai Kab.Tabalong', 'TABALONG', '08124345820', 'hasan.psbn@gmail.com', 'IMANI', '', 'IMAMAH', '', 'Desa Marindi RT.06 Kec.Haruai Kab.Tabalong', '085323728367', 'IMG_0126_copy.jpg', 'calon', 'y', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, 602, ' ', 'FATIMAH', 'P', 'Total', 'Islam', 'Surian Hanyar', '2008-04-18', 'Desa Puntik Luar Jln. Kampung Baru Kec.Mandastana Kab.Batola', 'BARITO KUALA', '', '', 'SUGIANOR', '', '', '', 'Desa Marindi RT.06 Kec.Haruai Kab.Tabalong', '', 'IMG_0118_copy.jpg', 'aktif', 'y', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, 603, ' ', 'ZAINAL ABIDIN', 'L', 'Total', 'Islam', 'Tabalong', '2004-05-11', 'Desa Marindi RT.06 Kec.Haruai Kab.Tabalong', 'TABALONG', '', '', 'IMANI', '', '', '', 'Desa Marindi RT.06 Kec.Haruai Kab.Tabalong', '', '', 'calon', 'y', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, 604, ' ', 'M. RAMADHONY', 'L', 'Total', 'Islam', 'Landasan Ulin', '1994-02-24', 'Jln.Tonhar RT.04 RW.01 Syamsudin Noor Kec.Landasan Ulin Banjarbaru', 'BANJARBARU', '', '', 'NUR ACHMAD', '', '', '', 'Jln.Tonhar RT.04 RW.01 Syamsudin Noor Kec.Landasan Ulin Banjarbaru', '', '', 'calon', 'n', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, 605, ' ', 'GALIH PUTRA ABIMANYU', 'L', 'Total', 'Islam', 'Wayun', '2010-04-13', 'Jln. Swargaloka Wengga RT.02 RW.05 Landasan Ulin Kec.Liang Anggang Banjarbaru', 'BANJARBARU', '', '', 'AGUS MARDIONO', '', '', '', 'Jln. Swargaloka Wengga RT.02 RW.05 Landasan Ulin Kec.Liang Anggang Banjarbaru', '', '', 'calon', 't', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, 606, ' ', 'JARKASI', 'L', 'Total', 'Islam', 'Alabio', '1989-10-08', 'Jln.Padat Karya Komp.Mutiara I Sungai Andai Banjarmasin Utara', 'BANJARMASIN', '', '', 'GULAMSYAH', '', '', '', 'Jln.Padat Karya Komp.Mutiara I Sungai Andai Banjarmasin Utara', '', '', 'calon', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, 607, ' ', 'DWI RAHMAD JUNIANTO', 'L', 'Total', 'Islam', 'Banjarmasin', '1980-06-24', 'Jln. Padat Karya Blok Batu RT.09 RW.05 Kec. Banjarmasin Utara', 'BANJARMASIN', '', '', 'SURADI ROSO', '', '', '', 'Jln. Padat Karya Blok Batu RT.09 RW.05 Kec. Banjarmasin Utara', '', '', 'calon', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, 608, ' ', 'GUSTI YUDI ANSYARI', 'L', 'Total', 'Islam', 'Negara', '1979-06-03', 'Desa Tambak Bitin RT.01 RW.01 Daha Utara Kab. HSS', 'HULU SUNGAI SELATAN', '', '', '', '', 'NOORMDIAH', '', 'Desa Tambak Bitin RT.01 RW.01 Daha Utara Kab. HSS', '', '', 'calon', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, 609, ' ', 'M. ZAKIR', 'L', 'Total', 'Islam', 'Tanah Habang Kiri', '1985-06-30', 'Desa Tanah Habang Kiri No.8 RT.03 Kec.Lampihan Kab.Balangan', 'BALANGAN', '', '', '', '', 'SITI BADRIAH', '', 'Desa Tanah Habang Kiri No.8 RT.03 Kec.Lampihan Kab.Balangan', '', '', 'calon', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(67, 610, ' ', 'MUHAMMAD', 'L', 'Total', 'Islam', 'Banjarmasin', '1982-03-21', 'Jln.Kuin Selatan No.18 RT.07 RW.14 Banjarmasin Barat', 'BANJARMASIN', '', '', 'TAJUDIN NOR', '', '', '', 'Jln.Kuin Selatan No.18 RT.07 RW.14 Banjarmasin Barat', '', '', 'aktif', 'y', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, 0, '1231123', '1231', 'P', 'Total', 'Islam', '13', '0000-00-00', '13', 'TANAH LAUT', '13', '', '1312', '', '123', '', '123', '123', '', 'calon', 'n', '2018-07-23 10:10:59', '2018-07-23 10:10:59', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, 22, '2', '2', 'L', 'Total', 'Islam', '2', '2018-07-24', '22', 'TANAH BUMBU', '22', '2@12.com', '22', '', '2', '', '2', '2', '', 'calon', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, 2222, '22', '22', 'L', 'Total', 'Islam', '22', '2018-07-04', '22', 'BANJAR', '22', '22', '22', '', '22', '', '22', '22', '', 'calon', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, 1111, '11', '11', 'P', 'Total', 'Islam', 'KAB. TAPIN', '2018-07-06', '11', 'BANJAR', '11', '12345@1234.com', '11', '', '11', '', '1', '1', '', 'aktif', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
('22', '22'),
('A', 'AKHLAK'),
('AB', 'AL QUR\'AN BRAILLE'),
('AK', 'ADL KEPERAWATAN'),
('AP', 'ADL PKK'),
('B', 'BURDAH'),
('BA', 'BIMBINGAN AGAMA'),
('BIND', 'BAHASA INDONESIA'),
('BING', 'BAHASA INGGRIS'),
('BM', 'BIMBINGAN MOTIVASI'),
('BS', 'BIMBINGAN SOSIAL'),
('BTB', 'BACA TULIS BRAILLE'),
('KB', 'KOMPUTER BICARA'),
('KT', 'KETERAMPILAN TANGAN'),
('M', 'MASSAGE'),
('MH', 'MAULID HABSYI'),
('MP', 'MUSIK PANTING'),
('MU', 'MUSIK'),
('OM', 'ORIENTASI MOBILITAS'),
('OR', 'OLAHRAGA'),
('PG', 'PENGETAHUAN GIZI'),
('PM', 'PRAKTEK MASSAGE'),
('QA', 'QIRO\'AH AL QUR\'AN'),
('S', 'SHI-ATSU'),
('TK', 'TERAPI KELOMPOK'),
('TM', 'TEORI MASSAGE'),
('V', 'VOKAL'),
('Y', 'YASINAN');

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
(2, '1', 'A', 47, 75, 1),
(3, '1', 'A', 52, 85, 1),
(4, '1', 'A', 43, 70, 1),
(5, '1', 'A', 46, 80, 1),
(6, '1', 'AP', 67, 76, 1),
(7, '1', 'BIND', 67, 67, 1),
(8, '1', 'BING', 67, 87, 1),
(9, '1', 'AP', 47, 2, 1),
(10, '1', 'AP', 46, 123, 1),
(11, '1', 'AP', 52, 11, 1),
(12, '1', 'A', 38, 22, 1),
(14, '1', 'A', 67, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nip` varchar(30) NOT NULL,
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
(1, '1', 'Kepala Panti22', 'P', 'a', '2018-07-11', 'a22', '222', 'Kepala Panti Sosial2', '', 'c4ca4238a0b923820dcc509a6f75849b', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'PNS', 'S1', '', ''),
(2, '2', 'Kepala TU', 'L', '0', '2018-07-13', '0', '0', 'Kepala Sub Bagian Tata Usaha', '', 'c81e728d9d4c2f636f067f89cc14862c', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'PNS', 'S1', '', ''),
(3, '3', 'kasi pembinaan', 'L', '0', '2018-07-13', '0', '0', 'Kepala Seksi Pembinaan dan Resosialisasi', '', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'PNS', 'S1', '', ''),
(4, '196612101989102003', 'Gt. IDA KARYANI,SE,MM', 'P', 'Banjar', '1967-10-12', ' ', ' ', 'Kepala Seksi Pelayanan', '', '314f8db14af312f39340dd5a446ed356', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'PNS', 'S2', 'Ekonomi', ''),
(5, '196406061989101002', 'WAHYUDIN  KUSWORO, S.Sos', 'L', 'Banyumas', '1964-06-06', '', '', 'Pekerja Sosial Madya', '', 'e9148476d9d3d2de3912b7fa774b935b', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'PNS', 'S1', '', ''),
(6, '196706051993032009', 'Dra. R.A SUTJI PUDJI ASTUTI', 'P', 'Malang', '1967-06-05', ' ', ' ', 'Pengadministrasi Kepegawaian', '', '1679091c5a880faf6fb5e6087eb1b2dc', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'PNS', 'S1', 'Kesejahteraan Sosial', ''),
(7, '196612281999031005', 'SYARKAWI, S.Ag', 'L', 'Martapura', '1965-12-28', '', '', 'Pengelola Urusan Agama', '', '9d5178630375094f6a0c49c7a88088c4', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'PNS', 'S1', 'Agama Islam', ''),
(8, '196510281990022001', 'ITA FATIMAH, SE', 'P', 'Purwakarta', '1965-10-28', '', '', 'Penyusun Bahan Pembinaan', '', 'f3deb8ae7a3f7c90772a30482c4348ac', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'PNS', 'S1', 'Ekonomi', ''),
(9, '196508151989102003', 'SRI LESTARI, SST', 'P', 'Solo', '0965-08-15', 'Jln. Sa\'adah Martapura', '', 'Pengelola Rehabilitasi dan Pelayanan Sosial', '', 'bf69d678f65b628dad45103c0fb07a42', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', ''),
(10, '196112301999031001', 'MISRUDIN, SST', 'L', 'Banjarmasin', '1961-12-30', '', '', 'Analis Bimbingan Usaha', '', '03c22f4a7c7f06ae627c51d798fa2920', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'PNS', 'S1', 'Kesejahteraan Sosial', ''),
(11, '197907232010011010', 'KURNIAWAN TRI CAHYONO,SE', 'L', 'Boyolali', '1979-07-23', 'Sungai Sipai', '', 'Pengelola Keuangan', '', '012027e8b6fd214527bb613f3ed8e07e', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'PNS', 'S1', 'Ekonomi', ''),
(12, '198201132000122003', 'ISWANTI,S.Kep,Ners', 'P', 'Banjarmasin', '1982-01-13', '', '', 'Perawat Muda', '', '87acd37780c0540d66892847071a133b', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'PNS', 'S1', 'Keperawatan', ''),
(13, '198106042005011011', 'AKHMAD SETIADI, AMG', 'L', 'Barabai', '1981-06-04', '', '', 'Pengadministrasi Anggaran', '', 'aea4516befa1e6168286c6ee3dc21d03', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'PNS', 'D3', 'Gizi', ''),
(14, '198101032010012002', 'DIAN SORAYA,A.Md', 'P', 'Banjarbaru', '1981-01-03', '', '', 'Bendahara', '', 'b28b18234a8521db305dd7abb6d1426d', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'PNS', 'D3', 'Teknik', ''),
(15, '196710192007011008', 'KHAIRIL ANWAR', 'L', 'Hulu Sungai Selatan', '1967-10-19', 'Jln. Veteran Sungai Sipai Martapura', '', 'Petugas Keamanan', '', 'a9e9da287914a06a182387f540beeb0c', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'PNS', 'SMA / Sederajat', '', ''),
(16, '197602202007011008', 'HENNY WINARNO', 'L', 'Banjar', '1976-02-20', 'Jln. Rahayu Sungai Paring Martapura', '', 'Pengelola Asrama', '', '84b9b1857ded9a55943ec839f865aa20', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'PNS', 'SMA / Sederajat', '', ''),
(17, '197611032007012011', 'RAUDAH', 'P', 'Banjarmasin', '1976-11-03', 'Komp. PSBN Fajar Harapan Martapura', '', 'Pengelola Asrama', '', 'f40d3c38504cdbffbe7ff301f47e2b73', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'PNS', 'SMA / Sederajat', '', ''),
(18, '197308252007011021', 'ARSYADI', 'L', 'Banjarmasin', '1973-08-25', 'Komp. PSBN Fajar Harapan Martapura', '', 'Pengelola Asrama', '', '8c50172bc1bd2ba3d1982a185d24837f', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'PNS', 'SMA / Sederajat', '', ''),
(19, '197403052008012017', 'SITI BARLIAN', 'P', 'Banjar', '1974-03-05', '', '', 'Pengelola Asrama', '', '92f281d3157a8c6325103e49b0cca857', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'PNS', 'SMA / Sederajat', '', ''),
(20, '198312282008011007 ', 'ABDI  DEDDI  MISWAR', 'L', 'Sungai Ulin', '1983-12-28', '', '', 'Pengelola Asrama', '', '5c39df0e69dffd79c65bba805eda72aa', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'PNS', 'SMA / Sederajat', '', ''),
(21, '198009052005012016', 'JUMIATI NINGSIH', 'P', 'Banjarbaru', '1980-09-05', '', '', 'Pranata Barang dan Jasa', '', 'd6d404d0cececa3e73c659ab67568d8a', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'PNS', 'SMA / Sederajat', '', ''),
(22, '198809242014021002', 'M. RIZKY AL AMIN', 'L', 'Hulu Sungai Selatan', '1988-09-24', '', '', 'Pelatih Atlit Disabel', '', '0e6575c8448ad7d302c6c6a156132764', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'PNS', 'SMA / Sederajat', '', ''),
(23, '19611231 200604 1 072', 'AKING', 'L', 'SERAU', '1961-12-31', 'Jln. Rahayu Sungai Paring Martapura', '', 'Analis Bimbingan Usaha', '', '76013debc6e643cfa08b9a33061e88d6', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'PNS', 'SD / Sederajat', '', ''),
(25, '24', 'IR. BOYKE DANNY JUSUF', 'L', 'Kandangan', '0000-00-00', '', '', 'Instruktur', '', '1ff1de774005f8da13f42943881c655f', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Kontrak', 'S1', 'Teknik Elektro', ''),
(26, '25', 'MUHAMMAD IFAN MASHUDI', 'L', 'Martapura', '1995-04-09', 'Jln. Rahayu No.43 Sungai Paring Martapura', '087816669990', 'Pranata Komputer', '', '8e296a067a37563370ded05f5a3bf3ec', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Kontrak', 'S1', 'Teknik Informatika', ''),
(27, '1', 'Kepala Panti22', 'P', 'a', '2018-07-11', 'a22', '222', 'Kepala Panti Sosial2', '', 'c4ca4238a0b923820dcc509a6f75849b', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'PNS', 'S1', '', ''),
(28, '1', 'Kepala Panti22', 'P', 'a', '2018-07-11', 'a22', '222', 'Kepala Panti Sosial2', '', 'c4ca4238a0b923820dcc509a6f75849b', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'PNS', 'S1', '', ''),
(29, '1', 'Kepala Panti22', 'P', 'a', '2018-07-11', 'a22', '222', 'Kepala Panti Sosial2', '', 'c4ca4238a0b923820dcc509a6f75849b', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'PNS', 'S1', '', ''),
(30, '1', 'Kepala Panti22', 'P', 'a', '2018-07-11', 'a22', '222', 'Kepala Panti Sosial2', '', 'c4ca4238a0b923820dcc509a6f75849b', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'PNS', 'S1', '', ''),
(31, '111', '11', 'L', '11', '2018-06-29', '11111111', '1', '1', '', '698d51a19d8a121ce581499d7b701668', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'PNS', 'SD / Sederajat', '1', ''),
(32, '', '', '', '', '0000-00-00', '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', ''),
(33, '12', '12345643', 'P', '12', '2018-06-29', '1', '121', '12', '', 'c20ad4d76fe97759aa27a0c99bff6710', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'PNS', 'SMP / Sederajat', '1', '');

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
(27, 4, '2', '2018-07-24 10:27:43'),
(28, 5, '2', '2018-07-13 16:31:50'),
(29, 14, '2', '2018-07-13 16:31:56'),
(30, 15, '2', '2018-07-13 16:32:03'),
(31, 13, '3', '2018-07-13 16:34:57'),
(32, 3, '3', '2018-07-13 16:35:10'),
(33, 1, '4', '2018-07-13 16:36:01'),
(34, 6, '5', '2018-07-15 07:50:06'),
(35, 12, '5', '2018-07-13 16:36:15'),
(37, 33, '1', '2018-07-13 18:27:28'),
(38, 19, '2', '2018-07-13 18:27:48'),
(39, 20, '2', '2018-07-13 18:27:52'),
(40, 25, '2', '2018-07-13 18:28:00'),
(41, 29, '2', '2018-07-13 18:28:08'),
(42, 31, '2', '2018-07-13 18:28:16'),
(43, 28, '3', '2018-07-13 18:28:47'),
(44, 18, '4', '2018-07-13 18:29:01'),
(45, 21, '4', '2018-07-13 18:29:07'),
(46, 22, '4', '2018-07-13 18:29:12'),
(47, 26, '4', '2018-07-13 18:29:20'),
(48, 32, '4', '2018-07-13 18:29:26'),
(49, 16, '5', '2018-07-13 18:29:38'),
(50, 23, '5', '2018-07-13 18:29:43'),
(51, 24, '5', '2018-07-13 18:29:48'),
(52, 27, '5', '2018-07-13 18:29:52'),
(53, 30, '5', '2018-07-13 18:29:57'),
(54, 35, '5', '2018-07-13 18:30:02'),
(55, 36, '5', '2018-07-13 18:30:06'),
(57, 42, '1', '2018-07-15 04:46:12'),
(58, 2, '1', '2018-07-24 10:27:35'),
(59, 38, '1', '2018-07-24 10:28:09');

-- --------------------------------------------------------

--
-- Table structure for table `penentuan_rombel`
--

CREATE TABLE `penentuan_rombel` (
  `id_penentuan` int(11) NOT NULL,
  `id_rombel` varchar(11) NOT NULL,
  `id_tahunakademik` int(4) NOT NULL,
  `id_klien` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `penentuan_rombel`
--

INSERT INTO `penentuan_rombel` (`id_penentuan`, `id_rombel`, `id_tahunakademik`, `id_klien`) VALUES
(15, '6', 1, 1),
(16, '6', 1, 4),
(17, '6', 1, 2),
(18, '5', 1, 33),
(19, '1', 1, 67),
(20, '1', 1, 52),
(21, '1', 1, 47),
(22, '1', 1, 46),
(23, '1', 1, 43),
(24, '2', 1, 12),
(25, '2', 1, 27),
(26, '2', 1, 50),
(27, '2', 1, 44),
(28, '2', 1, 53),
(29, '2', 1, 54),
(30, '3', 1, 42),
(31, '3', 1, 6),
(32, '3', 1, 15),
(33, '3', 1, 17),
(34, '3', 1, 14),
(35, '4', 1, 20),
(36, '4', 1, 19),
(37, '4', 1, 29),
(38, '4', 1, 26),
(39, '4', 1, 31),
(40, '4', 1, 28),
(41, '7', 1, 18),
(42, '7', 1, 32),
(43, '7', 1, 30),
(44, '7', 1, 35),
(45, '7', 1, 24),
(46, '7', 1, 16),
(47, '7', 1, 49),
(48, '5', 1, 21),
(49, '5', 1, 13),
(50, '5', 1, 25),
(51, '5', 1, 22),
(52, '6', 1, 5),
(53, '6', 1, 23),
(54, '6', 1, 3),
(55, '1', 1, 38);

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
(1, 18, 'ARSYADI', 1, '022/PSBN/DINSOS', '01-01-2018', '2017-12-30'),
(2, 20, 'ABDI  DEDDI  MISWAR', 2, '023/PSBN/DINSOS', '01-01-2018', '2017-12-30'),
(3, 19, 'SITI BARLIAN', 3, '024/PSBN/DINSOS', '01-01-2018', '2017-12-30'),
(4, 16, 'HENNY WINARNO', 4, '022/PSBN/DINSOS', '01-01-2018', '2017-12-30'),
(5, 1, 'Kepala Panti22', 5, '123', '04-07-2018', '2018-06-28');

-- --------------------------------------------------------

--
-- Table structure for table `penyaluran`
--

CREATE TABLE `penyaluran` (
  `id_penyaluran` int(11) NOT NULL,
  `tgl_disalurkan` date NOT NULL,
  `id_klien` int(15) NOT NULL,
  `nilai` varchar(30) NOT NULL,
  `acc_pembinaan` enum('Y','T') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `penyaluran`
--

INSERT INTO `penyaluran` (`id_penyaluran`, `tgl_disalurkan`, `id_klien`, `nilai`, `acc_pembinaan`) VALUES
(1, '2018-04-10', 12, 'Baik', 'T'),
(2, '2018-07-09', 3, 'Baik', 'T'),
(3, '2018-07-26', 1, 'Kurang Baik', 'T'),
(5, '2018-07-11', 4, 'Sangat Baik', 'Y');

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
('2', '21'),
('D', 'DASAR'),
('K', 'KHUSUS'),
('M', 'MUSIK'),
('P', 'PERSIAPAN'),
('SA', 'SHI-ATSU'),
('SM', 'SPORT MASSAGE');

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
(21, 26, 2, 'ARNAIN', '', '', '1', 'KECUBUNG', 'tambah', '2018-07-13 08:31:20'),
(22, 27, 4, 'M. RIZAL', '', '', '1', 'KECUBUNG', 'tambah', '2018-07-13 08:31:26'),
(23, 28, 5, 'PARIDI', '', '', '2', 'BERLIAN', 'tambah', '2018-07-13 08:31:50'),
(24, 29, 14, 'RAHMAT', '', '', '2', 'BERLIAN', 'tambah', '2018-07-13 08:31:56'),
(25, 30, 15, 'RUSDI', '', '', '2', 'BERLIAN', 'tambah', '2018-07-13 08:32:03'),
(26, 31, 13, 'ASNA', '', '', '3', 'INTAN', 'tambah', '2018-07-13 08:34:57'),
(27, 32, 3, 'RUSMIATI', '', '', '3', 'INTAN', 'tambah', '2018-07-13 08:35:10'),
(28, 33, 1, 'NURDIN', '', '', '4', 'MERAH SIAM', 'tambah', '2018-07-13 08:36:01'),
(29, 34, 6, 'RUMAIYANTI', '', '', '5', 'MUTIARA', 'tambah', '2018-07-13 08:36:11'),
(30, 35, 12, 'DEWI KANASTRI', '', '', '5', 'MUTIARA', 'tambah', '2018-07-13 08:36:15'),
(31, 36, 17, 'SARIPUDIN', '', '', '1', 'KECUBUNG', 'tambah', '2018-07-13 10:26:36'),
(32, 37, 33, 'ANWARUDDIN', '', '', '1', 'KECUBUNG', 'tambah', '2018-07-13 10:27:28'),
(33, 38, 19, 'LEMAN ABIDIN', '', '', '2', 'BERLIAN', 'tambah', '2018-07-13 10:27:48'),
(34, 39, 20, 'IKHSANUL SADIKIN', '', '', '2', 'BERLIAN', 'tambah', '2018-07-13 10:27:53'),
(35, 40, 25, 'AHMAD NAZIMULLAH', '', '', '2', 'BERLIAN', 'tambah', '2018-07-13 10:28:00'),
(36, 41, 29, 'AKHMAD KHAIRUDDIN', '', '', '2', 'BERLIAN', 'tambah', '2018-07-13 10:28:08'),
(37, 42, 31, 'DARIANTO', '', '', '2', 'BERLIAN', 'tambah', '2018-07-13 10:28:16'),
(38, 43, 28, 'TIA SRI HENDRIANTY', '', '', '3', 'INTAN', 'tambah', '2018-07-13 10:28:47'),
(39, 44, 18, 'WAHYU', '', '', '4', 'MERAH SIAM', 'tambah', '2018-07-13 10:29:01'),
(40, 45, 21, 'TARMIJI', '', '', '4', 'MERAH SIAM', 'tambah', '2018-07-13 10:29:07'),
(41, 46, 22, 'DIAN SUKMA', '', '', '4', 'MERAH SIAM', 'tambah', '2018-07-13 10:29:12'),
(42, 47, 26, 'INDRA JAYA', '', '', '4', 'MERAH SIAM', 'tambah', '2018-07-13 10:29:20'),
(43, 48, 32, 'FARID', '', '', '4', 'MERAH SIAM', 'tambah', '2018-07-13 10:29:27'),
(44, 49, 16, 'LAMIAH', '', '', '5', 'MUTIARA', 'tambah', '2018-07-13 10:29:38'),
(45, 50, 23, 'ZAKIYAH FITRIYANA', '', '', '5', 'MUTIARA', 'tambah', '2018-07-13 10:29:43'),
(46, 51, 24, 'TERIMENI', '', '', '5', 'MUTIARA', 'tambah', '2018-07-13 10:29:48'),
(47, 52, 27, 'FATMAWATI', '', '', '5', 'MUTIARA', 'tambah', '2018-07-13 10:29:52'),
(48, 53, 30, 'AMELIA NILAM C', '', '', '5', 'MUTIARA', 'tambah', '2018-07-13 10:29:57'),
(49, 54, 35, 'ALIA', '', '', '5', 'MUTIARA', 'tambah', '2018-07-13 10:30:02'),
(50, 55, 36, 'NURFATIMAH ASMIDA YANTI', '', '', '5', 'MUTIARA', 'tambah', '2018-07-13 10:30:06'),
(51, 56, 53, 'ANTO', '', '', '1', 'KECUBUNG', 'tambah', '2018-07-14 20:46:05'),
(52, 57, 42, 'LUTHFI GAZALI R', '', '', '1', 'KECUBUNG', 'tambah', '2018-07-14 20:46:13'),
(53, 58, 67, 'MUHAMMAD', '', '', '1', 'KECUBUNG', 'tambah', '2018-07-14 20:46:23'),
(54, 59, 54, 'M. ARDIANSYAH', '', '', '1', 'KECUBUNG', 'tambah', '2018-07-14 20:46:28'),
(55, 34, 6, 'RUMAIYANTI', '5', 'MUTIARA', '1', 'KECUBUNG', 'pindah', '2018-07-14 23:48:53'),
(56, 34, 6, 'RUMAIYANTI', '1', 'KECUBUNG', '5', 'MUTIARA', 'pindah', '2018-07-14 23:50:06'),
(57, 58, 67, 'MUHAMMAD', '1', 'KECUBUNG', '4', 'MERAH SIAM', 'pindah', '2018-07-15 00:05:22'),
(58, 58, 67, 'MUHAMMAD', '4', 'MERAH SIAM', '1', 'KECUBUNG', 'pindah', '2018-07-15 00:05:35'),
(59, 56, 53, 'ANTO', '1', 'KECUBUNG', '4', 'MERAH SIAM', 'pindah', '2018-07-15 01:15:38'),
(60, 56, 53, 'ANTO', '4', 'MERAH SIAM', '', '', 'hapus', '2018-07-15 01:16:36'),
(61, 26, 2, 'ARNAIN', '1', 'KECUBUNG', '', '', 'hapus', '2018-07-15 01:22:50'),
(62, 59, 54, 'M. ARDIANSYAH', '1', 'KECUBUNG', '2', 'BERLIAN', 'pindah', '2018-07-15 01:23:47'),
(63, 59, 54, 'M. ARDIANSYAH', '2', 'BERLIAN', '', '', 'hapus', '2018-07-15 01:29:58'),
(64, 36, 17, 'SARIPUDIN', '1', 'KECUBUNG', '', '', 'hapus', '2018-07-15 01:30:50'),
(65, 58, 67, 'MUHAMMAD', '1', 'KECUBUNG', '', '', 'hapus', '2018-07-15 01:31:16'),
(66, 58, 2, 'ARNAIN', '', '', '1', 'KECUBUNG1', 'tambah', '2018-07-24 02:27:35'),
(67, 27, 4, 'M. RIZAL', '1', 'KECUBUNG1', '2', 'BERLIAN', 'pindah', '2018-07-24 02:27:43'),
(68, 59, 38, 'MAHDIANSYAH', '', '', '1', 'KECUBUNG1', 'tambah', '2018-07-24 02:28:09');

-- --------------------------------------------------------

--
-- Table structure for table `rombel`
--

CREATE TABLE `rombel` (
  `id_rombel` int(11) NOT NULL,
  `rombel` varchar(30) NOT NULL,
  `kelas` varchar(15) NOT NULL,
  `kd_probi` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rombel`
--

INSERT INTO `rombel` (`id_rombel`, `rombel`, `kelas`, `kd_probi`) VALUES
(1, 'PERSIAPAN', 'A', 'P'),
(2, 'DASAR', 'A', 'D'),
(3, 'SPORT MASSAGE A', 'A', 'SM'),
(4, 'SPORT MASSAGE B', 'B', 'SM'),
(5, 'SHI-ATSU', 'A', 'SA'),
(6, 'KHUSUS', 'A', 'K'),
(7, 'MUSIK', 'A', 'M'),
(9, '22', '2', 'D');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `kd_ruangan` int(10) NOT NULL,
  `nama_ruangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`kd_ruangan`, `nama_ruangan`) VALUES
(1, 'Aula'),
(2, 'Activity Dailing Living'),
(3, 'Bimbingan Teori 1'),
(4, 'Bimbingan Teori 2'),
(5, 'Bimbingan Teori 3'),
(6, 'Bimbingan Teori 4'),
(7, 'Fitnes'),
(8, 'Keterampilan'),
(9, 'Lapangan'),
(10, 'Mushola'),
(11, 'Musik'),
(12, 'Shi-atsu'),
(13, 'Praktek Sport Massage 1'),
(14, 'Praktek Sport Massage 2'),
(15, '321'),
(16, '123123'),
(17, '221');

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
(1, '2018', 'Aktif'),
(2, '2019', 'Tidak Aktif'),
(3, '1', 'Tidak Aktif');

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
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

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
  MODIFY `kd_asrama` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `instruktur`
--
ALTER TABLE `instruktur`
  MODIFY `id_instruktur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `klien`
--
ALTER TABLE `klien`
  MODIFY `id_klien` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `penempatan`
--
ALTER TABLE `penempatan`
  MODIFY `id_penempatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `penentuan_rombel`
--
ALTER TABLE `penentuan_rombel`
  MODIFY `id_penentuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `penunjukan`
--
ALTER TABLE `penunjukan`
  MODIFY `id_penunjukan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `penyaluran`
--
ALTER TABLE `penyaluran`
  MODIFY `id_penyaluran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `riwayat_penempatan`
--
ALTER TABLE `riwayat_penempatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `rombel`
--
ALTER TABLE `rombel`
  MODIFY `id_rombel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `kd_ruangan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tahunakademik`
--
ALTER TABLE `tahunakademik`
  MODIFY `id_tahunakademik` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
