-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2021 at 08:18 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id` int(50) NOT NULL,
  `nama` varchar(123) NOT NULL,
  `email` varchar(123) NOT NULL,
  `password` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id`, `nama`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Ahmad', 'ahmad@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2021-10-21 02:07:20', '2021-10-21 02:08:55'),
(2, 'Zhein', 'zhein@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2021-10-21 08:38:24', '2021-10-21 08:38:24');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `kd_buku` varchar(123) NOT NULL,
  `judul_buku` varchar(123) NOT NULL,
  `tahun_terbit` date NOT NULL,
  `penulis` varchar(123) NOT NULL,
  `stok` bigint(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`kd_buku`, `judul_buku`, `tahun_terbit`, `penulis`, `stok`, `created_at`, `updated_at`) VALUES
('BK001', 'Harry Potter and the Philosopher\'s Stone', '1997-06-26', 'J.K. Rowling', 10, '2021-10-20 05:57:37', '2021-10-21 09:22:53'),
('BK002', 'Harry Potter And The Chamber Of Secrets', '1998-07-02', 'J.K. Rowling', 10, '2021-10-20 23:37:18', '2021-10-21 10:48:31'),
('BK003', 'Harry Potter And The Prisoner Of Azkaban', '1999-07-08', 'J.K. Rowling', 10, '2021-10-21 00:43:26', '2021-10-21 01:03:17');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(50) NOT NULL,
  `id_anggota` int(50) NOT NULL,
  `kd_buku` varchar(123) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_pengembalian` date NOT NULL,
  `status` varchar(123) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `id_anggota`, `kd_buku`, `tgl_pinjam`, `tgl_pengembalian`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'BK001', '2021-10-21', '2021-10-22', 'Dikembalikan', '2021-10-21 10:04:03', '2021-10-21 09:22:53'),
(2, 2, 'BK002', '2021-10-21', '2021-10-22', 'Dikembalikan', '2021-10-21 04:37:45', '2021-10-21 09:03:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `nama` varchar(123) NOT NULL,
  `email` varchar(123) NOT NULL,
  `password` text NOT NULL,
  `level` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `level`) VALUES
(1, 'admin', 'admin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`kd_buku`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kd_buku` (`kd_buku`),
  ADD KEY `id_anggota` (`id_anggota`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`kd_buku`) REFERENCES `buku` (`kd_buku`),
  ADD CONSTRAINT `peminjaman_ibfk_3` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
