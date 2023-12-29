-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2023 at 11:14 AM
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
-- Database: `db_elearning`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `nip` varchar(100) NOT NULL,
  `nama_admin` varchar(30) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(13) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`nip`, `nama_admin`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_telp`) VALUES
('123', 'Rizky', 'L', 'Bandung', '1996-01-08', 'Komplek Pakusarakan D3 No 15 RT 01 RW 19 Desa Tanimulya Kec. Ngamprah', '089697744372');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_akun`
--

CREATE TABLE `tbl_akun` (
  `email` varchar(999) NOT NULL,
  `password` text NOT NULL,
  `hak_akses` enum('Admin','Guru','Siswa','Dosen','Mahasiswa') NOT NULL,
  `nip` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_akun`
--

INSERT INTO `tbl_akun` (`email`, `password`, `hak_akses`, `nip`) VALUES
('rpl.smkangkasalhs@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Admin', '123'),
('dosen@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Guru', '01040172'),
('admin@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Admin', '1234'),
('mhs@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Siswa', '2101020034');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_guru`
--

CREATE TABLE `tbl_guru` (
  `nip` varchar(100) NOT NULL,
  `nama_guru` varchar(30) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(13) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_guru`
--

INSERT INTO `tbl_guru` (`nip`, `nama_guru`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_telp`) VALUES
('01040172', 'Dosen', 'L', 'Unknow', '1990-08-15', 'Unknow', '085157237227'),
('01042180', 'Tekad Matulatan', 'L', 'Bandung', '1999-11-30', 'Jl. Cetarip Kulon II No. Kav 168 RT. 04 RW. 09 Kel. Kopo Kec. Bojongloa Kaler', '089621746222'),
('01041100', 'Hollanda Arief Kusuma', 'L', 'Payakumbuh', '1999-11-30', 'Jl. Cihanjuang Kp. Cibaligo No. 20 RT. 05 RW. 01 Kec. Parongpong', '089683014606');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_guru_mapel`
--

CREATE TABLE `tbl_guru_mapel` (
  `id_guru_mapel` int(11) NOT NULL,
  `id_mata_pelajaran` varchar(10) NOT NULL,
  `nip` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_guru_mapel`
--

INSERT INTO `tbl_guru_mapel` (`id_guru_mapel`, `id_mata_pelajaran`, `nip`) VALUES
(9, 'MP-00002', '01040172'),
(10, 'MP-00003', '01041100'),
(12, 'MP-00005', '01042180'),
(24, 'MP-00009', '01040172'),
(18, 'MP-00008', '01040172');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_id_mk`
--

CREATE TABLE `tbl_id_mk` (
  `id_guru_mapel` int(11) NOT NULL,
  `id_mata_pelajaran` varchar(10) NOT NULL,
  `nip` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_id_mk`
--

INSERT INTO `tbl_id_mk` (`id_guru_mapel`, `id_mata_pelajaran`, `nip`) VALUES
(8, 'MP-00001', '0104200507120200'),
(9, 'MP-00002', '01041100'),
(10, 'MP-00003', '01041100'),
(11, 'MP-00004', '01040172'),
(12, 'MP-00005', '01040172'),
(13, 'MP-00006', '01040172'),
(17, 'MP-00007', '01040172'),
(18, 'MP-00008', '01040172'),
(19, 'MP-00009', '01040172'),
(20, 'MP-00006', '01041100'),
(21, 'MP-00008', '0104200507120200'),
(22, 'MP-00009', '010420180067'),
(23, 'MP-00010', '01040172');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `id_kelas` varchar(10) NOT NULL,
  `nama_mata_kuliah` text NOT NULL,
  `nama_dosen` varchar(30) NOT NULL,
  `sks` int(11) NOT NULL,
  `ruangan` varchar(30) NOT NULL,
  `hari` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`id_kelas`, `nama_mata_kuliah`, `nama_dosen`, `sks`, `ruangan`, `hari`) VALUES
('K-00001', 'Perancangan dan Implementasi Perangkat Lunak', 'Hendra Kurniawan', 3, 'Ruang 10', 'Kamis'),
('K-00002', 'Sistem Terdistribusi', 'Hendra Kurniawan', 3, 'Ruang 09', 'Jumat'),
('K-00003', 'Sistem Digital', 'Hendra Kurniawan', 3, 'Ruang 03', 'Rabu');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelompok`
--

CREATE TABLE `tbl_kelompok` (
  `id_mata_pelajaran` varchar(10) NOT NULL,
  `nama_mata_pelajaran` text NOT NULL,
  `jml_jam_mata_pelajaran` int(11) NOT NULL,
  `kelompok_mata_pelajaran` enum('Nasional','Kewilayahan','Produktif (C1)','Produktif (C2)','Produktif (C3)','Muatan Lokal') NOT NULL,
  `semester` int(11) NOT NULL,
  `kelas` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_kelompok`
--

INSERT INTO `tbl_kelompok` (`id_mata_pelajaran`, `nama_mata_pelajaran`, `jml_jam_mata_pelajaran`, `kelompok_mata_pelajaran`, `semester`, `kelas`) VALUES
('MP-00002', 'PIPL', 4, 'Produktif (C1)', 5, 'Kelompok 1'),
('MP-00008', 'PIPL', 3, 'Produktif (C3)', 5, 'Kelompok 3'),
('MP-00009', 'PIPL', 3, 'Produktif (C3)', 5, 'Kelompok 2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kinerja_kelompok`
--

CREATE TABLE `tbl_kinerja_kelompok` (
  `nim` int(10) NOT NULL,
  `nama_mahasiswa` text NOT NULL,
  `nilai` enum('A','B','C','D','E') NOT NULL,
  `aktif` enum('1','2','3','4') NOT NULL,
  `kontribusi` enum('1','2','3','4') NOT NULL,
  `kolaborasi` enum('1','2','3','4') NOT NULL,
  `sikap` enum('1','2','3','4') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_kinerja_kelompok`
--

INSERT INTO `tbl_kinerja_kelompok` (`nim`, `nama_mahasiswa`, `nilai`, `aktif`, `kontribusi`, `kolaborasi`, `sikap`) VALUES
(2101020123, 'Zacky Santoso', 'A', '4', '4', '4', '4'),
(2101020034, 'Azel Fahrezi', 'A', '1', '1', '1', '1'),
(2101020089, 'Daniel Edwardo Manurung', 'A', '1', '1', '1', '1'),
(2101020083, 'Sevia Anggereini Simanjuntak', 'A', '1', '1', '1', '1'),
(2101020013, 'Anadiansyah', 'A', '1', '1', '1', '1'),
(2101020090, 'Tiara Desvira Nurfitri', 'A', '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mahasiswa`
--

CREATE TABLE `tbl_mahasiswa` (
  `nip` varchar(100) NOT NULL,
  `nama_guru` varchar(30) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(13) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_mahasiswa`
--

INSERT INTO `tbl_mahasiswa` (`nip`, `nama_guru`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_telp`) VALUES
('01040172', 'Zacky Santoso', 'L', 'Bandung', '1996-01-08', 'Komplek Pakusarakan D3 No 15 RT 01 RW 19 Desa Tanimulya Kec. Ngamprah', '080000000000'),
('0104200507120200', 'Sevia Anggereini Simanjuntak', 'P', 'Bandung', '1999-11-30', 'Jl. Trs. Mukodar No. 299', '08986114894'),
('010420180067', 'Daniel Edwardo Manurung\n', 'L', 'Bandung', '1999-11-30', 'Jl. Cetarip Kulon II No. Kav 168 RT. 04 RW. 09 Kel. Kopo Kec. Bojongloa Kaler', '089621746222'),
('01041100', 'Azel Fahrezi', 'L', 'Payakumbuh', '1999-11-30', 'Jl. Cihanjuang Kp. Cibaligo No. 20 RT. 05 RW. 01 Kec. Parongpong', '089683014606');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mata_pelajaran`
--

CREATE TABLE `tbl_mata_pelajaran` (
  `id_mata_pelajaran` varchar(10) NOT NULL,
  `nama_mata_pelajaran` text NOT NULL,
  `jml_jam_mata_pelajaran` int(11) NOT NULL,
  `kelompok_mata_pelajaran` enum('Nasional','Kewilayahan','Produktif (C1)','Produktif (C2)','Produktif (C3)','Muatan Lokal') NOT NULL,
  `semester` int(11) NOT NULL,
  `kelas` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_mata_pelajaran`
--

INSERT INTO `tbl_mata_pelajaran` (`id_mata_pelajaran`, `nama_mata_pelajaran`, `jml_jam_mata_pelajaran`, `kelompok_mata_pelajaran`, `semester`, `kelas`) VALUES
('MP-00002', 'Perancangan dan Implementasi Perangkat Lunak', 3, 'Produktif (C1)', 5, '1'),
('MP-00003', 'Penambangan Data', 4, 'Nasional', 5, 'X KB'),
('MP-00005', 'Teknologi IoT', 3, 'Produktif (C2)', 5, 'X KB'),
('MP-00008', 'Sistem Digital', 3, 'Produktif (C3)', 5, 'XII KA'),
('MP-00009', 'Sistem Terdistribusi', 3, 'Nasional', 5, 'X KA');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nilai_akhir`
--

CREATE TABLE `tbl_nilai_akhir` (
  `id_mata_pelajaran` varchar(10) NOT NULL,
  `nama_mata_pelajaran` text NOT NULL,
  `nim` int(10) NOT NULL,
  `nilai` enum('A','B','C','D','E') NOT NULL,
  `nama_mahasiswa` text NOT NULL,
  `jml_jam_mata_pelajaran` int(11) NOT NULL,
  `kelompok_mata_pelajaran` enum('Nasional','Kewilayahan','Produktif (C1)','Produktif (C2)','Produktif (C3)','Muatan Lokal') NOT NULL,
  `semester` int(11) NOT NULL,
  `kelas` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_nilai_akhir`
--

INSERT INTO `tbl_nilai_akhir` (`id_mata_pelajaran`, `nama_mata_pelajaran`, `nim`, `nilai`, `nama_mahasiswa`, `jml_jam_mata_pelajaran`, `kelompok_mata_pelajaran`, `semester`, `kelas`) VALUES
('MP-00001', 'Perancangan dan Implementasi Perangkat Lunak', 2101020034, 'A', 'Azel Fahrezi', 3, 'Nasional', 1, 'X KA'),
('MP-00002', 'Perancangan dan Implementasi Perangkat Lunak', 2101020089, 'A', 'Daniel Edwardo Manurung', 3, 'Produktif (C1)', 1, '1'),
('MP-00003', 'Perancangan dan Implementasi Perangkat Lunak', 2101020123, 'A', 'Zacky Santoso', 3, 'Nasional', 1, 'X KB'),
('MP-00005', 'Perancangan dan Implementasi Perangkat Lunak', 2101020083, 'A', 'Sevia Anggereini Simanjuntak', 3, 'Produktif (C2)', 1, 'X KB'),
('MP-00008', 'Perancangan dan Implementasi Perangkat Lunak', 2101020013, 'A', 'Fito Anadiansyah', 3, 'Produktif (C3)', 5, 'XII KA'),
('', 'Perancangan dan Implementasi Perangkat Lunak', 2101020090, 'A', 'Tiara Desvira Nurfitri', 3, 'Nasional', 5, 'II');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nilai_kel`
--

CREATE TABLE `tbl_nilai_kel` (
  `nim` int(10) NOT NULL,
  `nama_mahasiswa` text NOT NULL,
  `no_kelompok` enum('1','2','3') NOT NULL,
  `nilai` enum('A','B','C','D','E') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_nilai_kel`
--

INSERT INTO `tbl_nilai_kel` (`nim`, `nama_mahasiswa`, `no_kelompok`, `nilai`) VALUES
(2101020123, 'Zacky Santoso', '2', 'A'),
(2101020034, 'Azel Fahrezi', '2', 'A'),
(2101020089, 'Daniel Edwardo Manurung', '2', 'A'),
(2101020083, 'Sevia Anggereini Simanjuntak', '2', 'A'),
(2101020013, 'Anadiansyah', '2', 'A'),
(2101020090, 'Tiara Desvira Nurfitri', '2', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nilai_kelompok`
--

CREATE TABLE `tbl_nilai_kelompok` (
  `id_mata_pelajaran` varchar(10) NOT NULL,
  `nama_mata_pelajaran` text NOT NULL,
  `jml_jam_mata_pelajaran` int(11) NOT NULL,
  `kelompok_mata_pelajaran` enum('1','2','3') NOT NULL,
  `semester` enum('Ganjil','Genap') NOT NULL,
  `kelas` enum('A','B','C','D','E') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_nilai_kelompok`
--

INSERT INTO `tbl_nilai_kelompok` (`id_mata_pelajaran`, `nama_mata_pelajaran`, `jml_jam_mata_pelajaran`, `kelompok_mata_pelajaran`, `semester`, `kelas`) VALUES
('MP-00001', 'Perancangan dan Implementasi Perangkat Lunak', 3, '2', 'Ganjil', 'A'),
('MP-00002', 'Perancangan dan Implementasi Perangkat Lunak', 3, '1', 'Ganjil', ''),
('MP-00003', 'Perancangan dan Implementasi Perangkat Lunak', 3, '3', 'Ganjil', ''),
('MP-00004', 'Perancangan dan Implementasi Perangkat Lunak', 3, '1', 'Ganjil', ''),
('MP-00005', 'Perancangan dan Implementasi Perangkat Lunak', 3, '2', 'Ganjil', ''),
('MP-00006', 'PBO 1', 3, '3', 'Ganjil', ''),
('MP-00007', 'PPL', 3, '3', 'Ganjil', ''),
('MP-00008', 'PBO 2', 3, '1', 'Ganjil', ''),
('MP-00009', 'PWP 2', 2, '2', 'Ganjil', ''),
('MP-00010', 'PIPL', 3, '2', 'Ganjil', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nilai_mata_pelajaran`
--

CREATE TABLE `tbl_nilai_mata_pelajaran` (
  `id_nilai_mata_pelajaran` varchar(10) NOT NULL,
  `id_mata_pelajaran` varchar(10) NOT NULL,
  `id_tugas_mata_pelajaran` varchar(10) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `nis` varchar(100) NOT NULL,
  `nilai` int(11) NOT NULL,
  `grade` enum('A','A-','B','B-','C','D','E') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_nilai_mata_pelajaran`
--

INSERT INTO `tbl_nilai_mata_pelajaran` (`id_nilai_mata_pelajaran`, `id_mata_pelajaran`, `id_tugas_mata_pelajaran`, `nip`, `nis`, `nilai`, `grade`) VALUES
('NI-00001', 'MP-00001', 'TG-00001', '401172', '124', 76, 'B');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `nis` varchar(100) NOT NULL,
  `nama_siswa` text NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tempat_lahir` text NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `kelas` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`nis`, `nama_siswa`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_telp`, `kelas`) VALUES
('2101020034', 'Azel Fahrezi', 'L', 'Tanjungpinang', '1999-11-30', 'jl.', '085703067792', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `tbl_akun`
--
ALTER TABLE `tbl_akun`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `tbl_guru`
--
ALTER TABLE `tbl_guru`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `tbl_guru_mapel`
--
ALTER TABLE `tbl_guru_mapel`
  ADD PRIMARY KEY (`id_guru_mapel`);

--
-- Indexes for table `tbl_id_mk`
--
ALTER TABLE `tbl_id_mk`
  ADD PRIMARY KEY (`id_guru_mapel`);

--
-- Indexes for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tbl_kelompok`
--
ALTER TABLE `tbl_kelompok`
  ADD PRIMARY KEY (`id_mata_pelajaran`);

--
-- Indexes for table `tbl_kinerja_kelompok`
--
ALTER TABLE `tbl_kinerja_kelompok`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `tbl_mata_pelajaran`
--
ALTER TABLE `tbl_mata_pelajaran`
  ADD PRIMARY KEY (`id_mata_pelajaran`);

--
-- Indexes for table `tbl_nilai_akhir`
--
ALTER TABLE `tbl_nilai_akhir`
  ADD PRIMARY KEY (`id_mata_pelajaran`);

--
-- Indexes for table `tbl_nilai_kel`
--
ALTER TABLE `tbl_nilai_kel`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `tbl_nilai_kelompok`
--
ALTER TABLE `tbl_nilai_kelompok`
  ADD PRIMARY KEY (`id_mata_pelajaran`);

--
-- Indexes for table `tbl_nilai_mata_pelajaran`
--
ALTER TABLE `tbl_nilai_mata_pelajaran`
  ADD PRIMARY KEY (`id_nilai_mata_pelajaran`);

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`nis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_guru_mapel`
--
ALTER TABLE `tbl_guru_mapel`
  MODIFY `id_guru_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_id_mk`
--
ALTER TABLE `tbl_id_mk`
  MODIFY `id_guru_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
