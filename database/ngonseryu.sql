-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2025 at 06:34 PM
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
-- Database: `ngonseryu`
--

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_konser` int(11) DEFAULT NULL,
  `id_lokasi` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `waktu` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_konser`, `id_lokasi`, `tanggal`, `waktu`) VALUES
(29, 11, 9, '2025-07-10', '20:00:00'),
(30, 17, 12, '2025-07-05', '20:20:00'),
(31, 13, 10, '2025-07-20', '21:00:00'),
(32, 14, 9, '2025-08-05', '20:00:00'),
(33, 18, 10, '2025-08-10', '21:00:00'),
(34, 19, 11, '2025-06-30', '20:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_tiket`
--

CREATE TABLE `kategori_tiket` (
  `id_kategori` int(11) NOT NULL,
  `id_konser` int(11) DEFAULT NULL,
  `nama_kategori` varchar(50) DEFAULT NULL,
  `harga` decimal(12,2) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori_tiket`
--

INSERT INTO `kategori_tiket` (`id_kategori`, `id_konser`, `nama_kategori`, `harga`, `stok`) VALUES
(38, 11, 'Festival', 3000000.00, 500),
(39, 11, 'Reguler', 5000000.00, 500),
(40, 13, 'Reguler', 3000000.00, 500),
(41, 13, 'Presale', 2700000.00, 100),
(42, 13, 'On The Spot (OTS)', 6500000.00, 500),
(43, 14, 'Reguler', 3200000.00, 498),
(44, 14, 'Early Bird', 3100000.00, 100),
(45, 14, 'On The Spot (OTS)', 7000000.00, 500),
(46, 17, 'Reguler', 200000.00, 500),
(47, 17, 'Festival', 160000.00, 500),
(48, 19, 'Reguler', 150000.00, 500),
(49, 19, 'On The Spot (OTS)', 210000.00, 499);

-- --------------------------------------------------------

--
-- Table structure for table `konser`
--

CREATE TABLE `konser` (
  `id_konser` int(11) NOT NULL,
  `nama_konser` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `status` enum('Aktif','Nonaktif') DEFAULT 'Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `konser`
--

INSERT INTO `konser` (`id_konser`, `nama_konser`, `deskripsi`, `gambar`, `status`) VALUES
(11, 'Happier Then Ever', 'Feel the rhythm, embrace the night! Billie Eilish akan mengguncang GBK. Get your tickets now and be part of the magic!', '7544288f469180ddeb818ae68520a12c.jpg', 'Aktif'),
(13, 'Be The Sun', 'Seventeen akan membawakan lagu-lagu inspiratif yang merefleksikan pertumbuhan dan sukacita. Siap-siap bernyanyi, menari, dan merasakan getaran positif yang akan membuat Anda merasa lebih bahagia dari sebelumnya. Mari ciptakan kenangan indah bersama!', '22244a1a9683b9c47c940d7039fcf1b2.jpg', 'Aktif'),
(14, 'Born Pink', 'BLACKPINK akan membawakan lagu-lagu inspiratif yang merefleksikan pertumbuhan para fans. Siap-siap bernyanyi, menari, dan merasakan getaran positif yang akan membuat Anda merasa lebih bahagia dari sebelumnya.', '550fce4de4a0c5c7beca7a2d2a9d6a69.jpeg', 'Aktif'),
(17, 'Lagipula Hidup akan Berakhir', 'Sebuah malam istimewa bersama Hindia di Universitas Bina Insani. Nikmati lantunan musik yang akan menyentuh jiwamu.', '7ea14e78ba22cc7b875b7fba320e090c.jpg', 'Aktif'),
(18, 'The Unity', ' dan rasakan langsung NCT di Bekasi! Malam yang tak terlupakan menantimu.', 'bfe584422505a1ee26ab5e5ac6732b84.jpeg', 'Nonaktif'),
(19, 'StoryTelling', 'Feel the rhythm, embrace the night! Vierra. Get your tickets now and be part of the magic!', '5cdb48540a0b7b86a2762f80712d13d8.jpeg', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_penjualan`
--

CREATE TABLE `laporan_penjualan` (
  `id_laporan` int(11) NOT NULL,
  `id_konser` int(11) DEFAULT NULL,
  `total_terjual` int(11) DEFAULT NULL,
  `total_pendapatan` decimal(15,2) DEFAULT NULL,
  `tanggal_laporan` date DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laporan_penjualan`
--

INSERT INTO `laporan_penjualan` (`id_laporan`, `id_konser`, `total_terjual`, `total_pendapatan`, `tanggal_laporan`, `id_user`) VALUES
(8, NULL, NULL, NULL, NULL, 1),
(9, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `nama_tempat` varchar(100) NOT NULL,
  `alamat` text DEFAULT NULL,
  `kota` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id_lokasi`, `nama_tempat`, `alamat`, `kota`) VALUES
(9, 'Stadion Utama Gelora Bung Karno', 'Jl. Pintu Satu Senayan, Gelora, Kecamatan Tanah Abang, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10270', 'Jakarta'),
(10, 'Jakarta International Stadium (JIS)', 'Papanggo, Kec. Tj. Priok, Jkt Utara, Daerah Khusus Ibukota Jakarta', 'Jakarta'),
(11, 'Summarecon Mall Bekasi', 'Sentra Summarecon Bekasi, Jl. Boulevard Ahmad Yani, Marga Mulya, Kec. Bekasi Utara, Kota Bks, Jawa Barat 17142', 'Bekasi'),
(12, 'Bina Insani University', 'Jl. Raya Siliwangi No.6, RT.001/RW.004, Sepanjang Jaya, Kec. Rawalumbu, Kota Bks, Jawa Barat 17114', 'Bekasi');

-- --------------------------------------------------------

--
-- Table structure for table `nota`
--

CREATE TABLE `nota` (
  `id_nota` int(11) NOT NULL,
  `id_tiket` int(11) DEFAULT NULL,
  `kode_nota` varchar(100) DEFAULT NULL,
  `tanggal_terbit` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nota`
--

INSERT INTO `nota` (`id_nota`, `id_tiket`, `kode_nota`, `tanggal_terbit`) VALUES
(150, 168, 'NT684C43F0072B9', '2025-06-13 22:29:52');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_tiket` int(11) DEFAULT NULL,
  `nama_pengirim` varchar(100) DEFAULT NULL,
  `bank` varchar(50) DEFAULT NULL,
  `bukti_transfer` varchar(255) DEFAULT NULL,
  `status` enum('pending','valid','ditolak') DEFAULT 'pending',
  `tanggal_bayar` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_tiket`, `nama_pengirim`, `bank`, `bukti_transfer`, `status`, `tanggal_bayar`) VALUES
(81, 168, 'Difani', 'Cimb Niaga', 'bukti-168.PNG', 'valid', '2025-06-13 22:28:59');

-- --------------------------------------------------------

--
-- Table structure for table `report_user`
--

CREATE TABLE `report_user` (
  `id_report` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `judul_report` varchar(100) DEFAULT NULL,
  `isi_report` text DEFAULT NULL,
  `tanggal_report` datetime DEFAULT current_timestamp(),
  `status` enum('pending','ditangani','selesai') DEFAULT 'pending',
  `balasan_admin` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `report_user`
--

INSERT INTO `report_user` (`id_report`, `id_user`, `judul_report`, `isi_report`, `tanggal_report`, `status`, `balasan_admin`) VALUES
(8, 24, 'Pembayaran', 'Kenapa pembayaran saya selalu di proses?', '2025-06-11 20:10:19', 'ditangani', 'Mohon tunggu, kami sedang proses  semua pembayaran. Besok bisa dilihat lagi status pembarannya. ');

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `id_tiket` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_jadwal` int(11) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `status` enum('dipesan','dibayar','selesai','kadaluwarsa') DEFAULT 'dipesan',
  `tanggal_pesan` datetime DEFAULT current_timestamp(),
  `waktu_kedaluwarsa` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`id_tiket`, `id_user`, `id_jadwal`, `id_kategori`, `jumlah`, `status`, `tanggal_pesan`, `waktu_kedaluwarsa`) VALUES
(168, 24, 32, 43, 2, 'selesai', '2025-06-13 22:27:55', '2025-06-14 10:27:55'),
(169, 24, 34, 49, 1, 'dipesan', '2025-06-13 22:30:37', '2025-06-14 10:30:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','pembeli') NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'Admin_1', 'admin@ngonser.com', '202cb962ac59075b964b07152d234b70', 'admin', '2025-06-02 10:31:38'),
(24, 'Difanni', 'difani@gmail.com', '96f372054edee4b1aea77e6623f5baf5', 'pembeli', '2025-06-10 21:55:50'),
(29, 'Siti Nura\'inni ', 'nurainni@gmail.com', 'a6ef7b9bcbaf9a55fc0222b66a71df88', 'admin', '2025-06-13 22:33:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_konser` (`id_konser`),
  ADD KEY `id_lokasi` (`id_lokasi`);

--
-- Indexes for table `kategori_tiket`
--
ALTER TABLE `kategori_tiket`
  ADD PRIMARY KEY (`id_kategori`),
  ADD KEY `id_konser` (`id_konser`);

--
-- Indexes for table `konser`
--
ALTER TABLE `konser`
  ADD PRIMARY KEY (`id_konser`);

--
-- Indexes for table `laporan_penjualan`
--
ALTER TABLE `laporan_penjualan`
  ADD PRIMARY KEY (`id_laporan`),
  ADD KEY `id_konser` (`id_konser`),
  ADD KEY `fk_user_laporan` (`id_user`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id_nota`),
  ADD UNIQUE KEY `kode_nota` (`kode_nota`),
  ADD KEY `id_tiket` (`id_tiket`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_tiket` (`id_tiket`);

--
-- Indexes for table `report_user`
--
ALTER TABLE `report_user`
  ADD PRIMARY KEY (`id_report`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id_tiket`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_jadwal` (`id_jadwal`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `kategori_tiket`
--
ALTER TABLE `kategori_tiket`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `konser`
--
ALTER TABLE `konser`
  MODIFY `id_konser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `laporan_penjualan`
--
ALTER TABLE `laporan_penjualan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `nota`
--
ALTER TABLE `nota`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `report_user`
--
ALTER TABLE `report_user`
  MODIFY `id_report` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id_tiket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`id_konser`) REFERENCES `konser` (`id_konser`),
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`id_lokasi`) REFERENCES `lokasi` (`id_lokasi`);

--
-- Constraints for table `kategori_tiket`
--
ALTER TABLE `kategori_tiket`
  ADD CONSTRAINT `kategori_tiket_ibfk_1` FOREIGN KEY (`id_konser`) REFERENCES `konser` (`id_konser`);

--
-- Constraints for table `laporan_penjualan`
--
ALTER TABLE `laporan_penjualan`
  ADD CONSTRAINT `fk_user_laporan` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `laporan_penjualan_ibfk_1` FOREIGN KEY (`id_konser`) REFERENCES `konser` (`id_konser`);

--
-- Constraints for table `nota`
--
ALTER TABLE `nota`
  ADD CONSTRAINT `nota_ibfk_1` FOREIGN KEY (`id_tiket`) REFERENCES `tiket` (`id_tiket`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_tiket`) REFERENCES `tiket` (`id_tiket`);

--
-- Constraints for table `report_user`
--
ALTER TABLE `report_user`
  ADD CONSTRAINT `report_user_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `tiket`
--
ALTER TABLE `tiket`
  ADD CONSTRAINT `tiket_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `tiket_ibfk_2` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id_jadwal`),
  ADD CONSTRAINT `tiket_ibfk_3` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_tiket` (`id_kategori`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
