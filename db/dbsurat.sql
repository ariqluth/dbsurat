-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2024 at 03:32 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbsurat`
--

-- --------------------------------------------------------

--
-- Table structure for table `arsip_suratkeluar`
--

CREATE TABLE `arsip_suratkeluar` (
  `no_surat` varchar(50) NOT NULL,
  `nama_pengirim` varchar(50) NOT NULL,
  `tgl_keluar` varchar(50) NOT NULL,
  `instansi` varchar(50) NOT NULL,
  `perihal` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `arsip_suratmasuk`
--

CREATE TABLE `arsip_suratmasuk` (
  `no_surat` varchar(20) NOT NULL DEFAULT '',
  `nama_penerima` varchar(50) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `nama_pengirim` varchar(50) NOT NULL,
  `instansi` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `perihal` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `no_surat` varchar(20) NOT NULL,
  `nama_pengirim` text NOT NULL,
  `tgl_keluar` date NOT NULL,
  `nama_penerima` varchar(100) NOT NULL,
  `instansi` varchar(30) NOT NULL,
  `perihal` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_keluar`
--

INSERT INTO `surat_keluar` (`no_surat`, `nama_pengirim`, `tgl_keluar`, `nama_penerima`, `instansi`, `perihal`) VALUES
('001', 'Kepala Desa Candirejo', '2024-01-04', 'Lembaga Romas', 'Kantor Desa Candirejo', 'Musyawarah Khusus'),
('002', 'Kepala Desa Candirejo', '2024-01-04', 'RT, RW Lembaga BPD Titomas', 'Kantor Desa Candirejo', 'Musyawarah Persiapan Bersih Desa/Nyadran'),
('006', 'Kepala Desa Candirejo', '2024-01-19', 'Bp Pudjo Prastowo RW. 07', 'Kantor Desa Candirejo', 'Persiapan Pemilihan RT 005/007'),
('007', 'Kepala Desa Candirejo', '2024-01-19', 'Bp Sutanto RW. 02', 'Kantor Desa Candirejo', 'Persiapan Pemilihan RT 01/02'),
('008', 'Kepala Desa Candirejo', '2024-01-19', 'Posyandu Remaja', 'Kantor Desa Candirejo', 'Posyandu Remaja'),
('009', 'Kepala Desa Candirejo', '2024-01-22', 'BUMIL', 'Kantor Desa Candirejo', 'Kelas BUMIL'),
('010', 'Kepala Desa Candirejo', '2024-01-31', 'Anggota BUMDES', 'Kantor Desa Candirejo', 'Koordinasi BUMDES'),
('011', 'Kepala Desa Candirejo', '2024-01-31', 'KPM BLT DD', 'Kantor Desa Candirejo', 'Penyaluran BLT'),
('013', 'Kepala Desa Candirejo', '2024-02-06', 'Takmir Masjid', 'Kantor Desa Candirejo', 'Koordinasi'),
('014', 'Kepala Desa Candirejo', '2024-02-06', 'LINMAS', 'Kantor Desa Candirejo', 'Pembinaan LINMAS');

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `no_surat` varchar(50) NOT NULL DEFAULT '',
  `nama_penerima` varchar(50) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `nama_pengirim` varchar(50) NOT NULL,
  `instansi` varchar(50) NOT NULL,
  `perihal` text NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_masuk`
--

INSERT INTO `surat_masuk` (`no_surat`, `nama_penerima`, `tgl_masuk`, `nama_pengirim`, `instansi`, `perihal`, `status`) VALUES
('001/I/BUMDESMA/2024', 'Kepala Desa Se Kecamatan Loceret', '2024-01-11', 'Camat Loceret', 'Kecamatan Loceret', 'UNDANGAN', 'Ada'),
('005/216/411.000/2024', 'Sdr. Camat se Kab Nganjuk', '2024-02-02', 'Sekretariat Daerah Kabupaten Nganjuk', 'Sekretariat Daerah', 'Pelatihan Sistem Informasi Data Pemberdayaan Masyarakat (SIDA) Berbakat', 'Ada'),
('01020304', 'Kantor Desa Candirejo', '2024-01-18', 'Kepala Puskesmas Loceret', 'Dinas Kesehatan Puskesmas Loceret', 'Jadwal Posyandu Balita Puskesmas Loceret 2024', 'Ada'),
('050/30/411.508/2024', 'Kepala Desa Se Kecamatan Loceret', '2024-01-16', 'Camat Loceret', 'Kecamatan Loceret', 'Musyawarah Perencanaan  Pembangunan(Musrenbang) RKPD Kecamatan  Loceret 2025', 'Ada'),
('050607', 'Kantor Desa Candirejo', '2024-01-21', 'Kepala Puskesmas Loceret', 'Dinas Kesehatan Puskesmas Loceret', 'Jadwal Posyandu Lansia Puskesmas Kecamatan Loceret', 'Ada'),
('140/79/411.307/2024', 'Sdr. Camat Loceret dan Camat Rejoso', '2024-01-17', 'Kepala Dinas PMD Kabupaten Nganjuk', 'Dinas Pemberdayaan Masyarakat Dan Desa', 'Pemberitahuan Kegiatan Monitoring dan Evaluasi P3PD', 'Ada'),
('445/65/411.303.06/2024', 'Kepala Desa Se Kecamatan Loceret', '2024-01-16', 'Kepala Puskesmas Loceret', 'Dinas Kesehatan Puskesmas Loceret', 'Pemberitahuan', 'Ada'),
('470/264/411.306/2024', 'Sdr. Camat se Kab Nganjuk', '2024-02-01', 'Kepala Dinas Kependudukan dan Pencacatan Sipil Kab', 'Dinas Kependudukan dan Pencacatan Sipil ', 'Data Wajib KTP belum perekaman (By name by adress)', 'Ada'),
('501/202/411.000/2024', 'Camat se-Kabupaten Nganjuk', '2024-01-31', 'Sekretaris Daerah Kabupaten Nganjuk', 'Sekretariat Daerah', 'Pemberitahuan pelaksanaan penyaluran bantuan pangan cadangan Beras Pemerintah tahap 1 Bulan Januari 2024', 'Ada');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(25) NOT NULL,
  `paswd` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `level` int(1) NOT NULL,
  `ket` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `paswd`, `email`, `nama`, `level`, `ket`) VALUES
('admin', 'admin', 'ukk@gmail.com', 'Developer Kampoeng Candirejo', 1, 'Staff Desa11'),
('aku', 'aku', 'ukk@gmail.com', 'agus', 2, 'staff'),
('dayat', 'dayat', 'ahmadhidayat3333@gmail.com', 'mada lokes', 1, 'Staff Desa22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arsip_suratkeluar`
--
ALTER TABLE `arsip_suratkeluar`
  ADD PRIMARY KEY (`no_surat`);

--
-- Indexes for table `arsip_suratmasuk`
--
ALTER TABLE `arsip_suratmasuk`
  ADD PRIMARY KEY (`no_surat`);

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`no_surat`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`no_surat`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
