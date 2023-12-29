-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Des 2023 pada 13.11
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akademik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
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
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`nip`, `nama_admin`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_telp`) VALUES
('2101020034', 'Azel Fahrezi', 'L', 'Tanjungpinang', '2003-08-16', 'Jl. Gudang Hijau', '089512637115');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_akun`
--

CREATE TABLE `tbl_akun` (
  `email` varchar(999) NOT NULL,
  `password` text NOT NULL,
  `hak_akses` enum('Admin','Dosen','Mahasiswa') NOT NULL,
  `nip` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tbl_akun`
--

INSERT INTO `tbl_akun` (`email`, `password`, `hak_akses`, `nip`) VALUES
('azel@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Admin', '2101020034'),
('zacky@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Dosen', '2101020123'),
('daniel@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Mahasiswa', '2101020089'),
('bomo@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Dosen', '2101020055'),
('rizky@gmail.com', '4603ac2083b5506f6c37ed73ef8f1eeec87bdd33', 'Mahasiswa', '2101020121'),
('syafiq@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Mahasiswa', ''),
('tiara@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Mahasiswa', '2101020088');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_prodi`
--

CREATE TABLE `tbl_prodi` (
  `id_prodi` varchar(10) NOT NULL,
  `prodi` enum('Teknik Informatika') NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `semester` enum('Ganjil','Genap') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tbl_prodi`
--

INSERT INTO `tbl_prodi` (`id_prodi`, `prodi`, `tahun`, `semester`) VALUES
('TI21GA', 'Teknik Informatika', '2021/2022', 'Ganjil'),
('TI21GE', 'Teknik Informatika', '2021/2022', 'Genap');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `tbl_akun`
--
ALTER TABLE `tbl_akun`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `tbl_prodi`
--
ALTER TABLE `tbl_prodi`
  ADD PRIMARY KEY (`id_prodi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
