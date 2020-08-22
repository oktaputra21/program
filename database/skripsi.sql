-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2020 at 02:00 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `ukuran` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `kategori_id`, `stock`, `harga`, `id_satuan`, `ukuran`) VALUES
(6, 'Cat Avitex Exterior', 1, 55, 32000, 1, '1KG'),
(7, 'Cat Avitex Exterior', 1, 40, 157000, 1, '5KG'),
(8, 'Cat Avitex Exterior', 1, 105, 720000, 1, '25KG'),
(9, 'Cat Avitex Interior', 1, 75, 30000, 1, '1KG'),
(10, 'Cat Avitex Interior', 1, 130, 110000, 1, '5KG'),
(11, 'Cat Avitex Interior', 1, 100, 515000, 1, '25KG'),
(12, 'Cat Alvitex Dasar', 1, 50, 110000, 1, '4KG'),
(13, 'Cat Avitex Plamir Tembok', 1, 75, 65000, 1, '5KG'),
(14, 'Cat Avitex Plamir Tembok', 1, 50, 320000, 1, '25KG'),
(15, 'Cat Avitex Genteng & Seng', 1, 120, 145000, 1, '4KG'),
(16, 'Cat Avitex Genteng & Seng', 1, 30, 835000, 1, '20KG'),
(17, 'Cat Avitex Tembok & Plafon', 1, 160, 125000, 1, '4KG'),
(18, 'Cat Avitex Tembok & Plafon', 1, 80, 550000, 1, '20KG'),
(19, 'Semen Gresik', 2, 70, 57000, 1, '40KG'),
(20, 'Semen Gresik', 2, 75, 70000, 1, '50KG'),
(21, 'Semen Holcim', 2, 20, 56000, 1, '40KG'),
(22, 'Semen Holcim', 2, 30, 68000, 1, '50KG'),
(23, 'Semen Tiga Roda', 2, 50, 58000, 1, '40KG'),
(24, 'Semen Tiga Roda', 2, 40, 70000, 1, '50KG'),
(25, 'Semen Merah Putih', 2, 45, 50000, 1, '40KG'),
(26, 'Semen Merah Putih', 2, 15, 60000, 1, '50KG'),
(27, 'Paku Beton Camel 2,5 cm', 4, 300, 30000, 1, '1KG'),
(28, 'Paku Beton Camel 3 cm', 4, 350, 32000, 1, '1KG'),
(29, 'Paku Beton Camel 4 cm', 4, 200, 35000, 1, '1KG'),
(30, 'Paku Beton Camel 5 cm', 4, 300, 36000, 1, '1KG'),
(31, 'Paku Beton Camel 7,5 cm', 4, 250, 38000, 1, '1KG'),
(32, 'Paku Beton Camel 10 cm', 4, 200, 40000, 1, '1KG'),
(33, 'Paku Kayu 5 cm', 4, 400, 6000, 3, '200 Gram'),
(34, 'Paku Kayu 7 cm', 4, 300, 7000, 3, '200 Gram'),
(35, 'Paku Kayu 10 cm', 4, 250, 9000, 3, '200 Gram');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail` int(11) NOT NULL,
  `no_transaksi` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail`, `no_transaksi`, `harga`, `id_barang`, `qty`, `total`) VALUES
(6, 6, 32000, 6, 10, 320000),
(7, 6, 157000, 7, 5, 785000),
(8, 7, 32000, 6, 5, 160000),
(9, 7, 157000, 7, 10, 1570000),
(10, 8, 32000, 6, 5, 160000),
(11, 8, 157000, 7, 5, 785000),
(12, 9, 32000, 6, 10, 320000),
(13, 9, 157000, 7, 10, 1570000),
(14, 10, 32000, 6, 5, 160000),
(15, 10, 157000, 7, 10, 1570000),
(16, 11, 32000, 6, 10, 320000),
(17, 11, 157000, 7, 5, 785000),
(18, 12, 720000, 8, 3, 2160000),
(19, 12, 30000, 9, 6, 180000),
(20, 13, 720000, 8, 2, 1440000),
(21, 13, 30000, 9, 4, 120000),
(22, 14, 720000, 8, 4, 2880000),
(23, 14, 30000, 9, 5, 150000),
(24, 15, 720000, 8, 3, 2160000),
(25, 15, 30000, 9, 3, 90000),
(26, 16, 720000, 8, 3, 2160000),
(27, 16, 30000, 9, 2, 60000),
(28, 17, 720000, 8, 5, 3600000),
(29, 17, 30000, 9, 5, 150000);

--
-- Triggers `detail_transaksi`
--
DELIMITER $$
CREATE TRIGGER `stock_min` AFTER INSERT ON `detail_transaksi` FOR EACH ROW BEGIN
UPDATE barang SET stock = stock - NEW.qty
WHERE id_barang = NEW.id_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `nama_kategori`, `deleted_at`) VALUES
(1, 'Cat', NULL),
(2, 'Semen', NULL),
(3, 'Paku', '2020-08-05 16:25:42'),
(4, 'Paku', NULL),
(5, 'aa', '2020-07-27 18:07:51');

-- --------------------------------------------------------

--
-- Table structure for table `peramalan`
--

CREATE TABLE `peramalan` (
  `id_peramalan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `bulan` varchar(30) NOT NULL,
  `tahun` int(11) NOT NULL,
  `hasil` int(11) NOT NULL,
  `mad` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peramalan`
--

INSERT INTO `peramalan` (`id_peramalan`, `id_barang`, `bulan`, `tahun`, `hasil`, `mad`) VALUES
(15, 7, 'Agustus', 2020, 8, 2.5),
(17, 6, 'Agustus', 2020, 8, 2.5);

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id_satuan` int(11) NOT NULL,
  `nama_satuan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id_satuan`, `nama_satuan`) VALUES
(1, 'Kilogram'),
(2, 'Batang'),
(3, 'Gram');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id_stock` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `type` enum('in','out') NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id_stock`, `id_barang`, `qty`, `type`, `tanggal`, `keterangan`, `user_id`) VALUES
(1, 6, 50, 'in', '2020-07-31', 'Pembelian', 1),
(2, 7, 100, 'in', '2020-08-01', 'Pembelian', 1),
(3, 6, 10, 'out', '2020-08-03', 'Rusak', 1),
(4, 7, 15, 'out', '2020-08-03', 'Rusak', 1),
(5, 8, 125, 'in', '2020-08-05', 'Pembelian', 1),
(6, 9, 100, 'in', '2020-08-05', 'Pembelian', 1),
(7, 10, 130, 'in', '2020-08-05', 'Pembelian', 1),
(8, 11, 100, 'in', '2020-08-05', 'Pembelian', 1),
(9, 12, 50, 'in', '2020-08-05', 'Pembelian', 1),
(10, 13, 75, 'in', '2020-08-05', 'Pembelian', 1),
(11, 14, 50, 'in', '2020-08-05', 'Pembelian', 1),
(12, 15, 120, 'in', '2020-08-05', 'Pembelian', 1),
(13, 16, 30, 'in', '2020-08-05', 'Pembelian', 1),
(14, 17, 80, 'in', '2020-08-05', 'Pembelian', 1),
(15, 17, 80, 'in', '2020-08-05', 'Pembelian', 1),
(16, 18, 80, 'in', '2020-08-05', 'Pembelian', 1),
(17, 19, 70, 'in', '2020-08-05', 'Pembelian', 1),
(18, 20, 75, 'in', '2020-08-05', 'Pembelian', 1),
(19, 21, 20, 'in', '2020-08-05', 'Pembelian', 1),
(20, 22, 30, 'in', '2020-08-05', 'Pembelian', 1),
(21, 23, 50, 'in', '2020-08-05', 'Pembelian', 1),
(22, 24, 40, 'in', '2020-08-05', 'Pembelian', 1),
(23, 25, 45, 'in', '2020-08-05', 'Pembelian', 1),
(24, 26, 15, 'in', '2020-08-05', 'Pembelian', 1),
(25, 6, 83, 'in', '2020-08-05', 'Pembelian', 1),
(26, 27, 300, 'in', '2020-08-09', 'Pembelian', 1),
(27, 28, 350, 'in', '2020-08-09', 'Pembelian', 1),
(28, 29, 200, 'in', '2020-08-09', 'Pembelian', 1),
(29, 30, 300, 'in', '2020-08-09', 'Pembelian', 1),
(30, 31, 250, 'in', '2020-08-09', 'Pembelian', 1),
(31, 32, 200, 'in', '2020-08-09', 'Pembelian', 1),
(32, 33, 400, 'in', '2020-08-09', 'Pembelian', 1),
(33, 34, 300, 'in', '2020-08-09', 'Pembelian', 1),
(34, 35, 250, 'in', '2020-08-09', 'Pembelian', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `no_transaksi` int(11) NOT NULL,
  `date` date NOT NULL,
  `total` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`no_transaksi`, `date`, `total`, `id_user`) VALUES
(6, '2020-02-10', 1105000, 1),
(7, '2020-03-11', 1730000, 1),
(8, '2020-04-22', 945000, 1),
(9, '2020-05-27', 1890000, 1),
(10, '2020-06-26', 1730000, 1),
(11, '2020-07-10', 1105000, 1),
(12, '2020-02-14', 2340000, 1),
(13, '2020-03-24', 1560000, 1),
(14, '2020-04-24', 3030000, 1),
(15, '2020-05-15', 2250000, 1),
(16, '2020-06-10', 2220000, 1),
(17, '2020-07-14', 3750000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `image` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `image`, `email`, `no_hp`, `role_id`) VALUES
(1, 'I Kadek Okta Putra', 'admin', 'admin', 'profile-20200812-9515ddbfa0.jpg', 'kadekoktaputra21@gmail.com', '0895321927826', 1),
(3, 'I Made Novan', 'user1', '123', 'profile-20200812-7094d0887e.jpg', 'made_novan17@gmail.com', '0895321927865', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `role_id` int(11) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`role_id`, `role`) VALUES
(1, 'admin'),
(2, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `kategori_id` (`kategori_id`),
  ADD KEY `id_satuan` (`id_satuan`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `no_transaksi` (`no_transaksi`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `peramalan`
--
ALTER TABLE `peramalan`
  ADD PRIMARY KEY (`id_peramalan`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id_stock`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`no_transaksi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `peramalan`
--
ALTER TABLE `peramalan`
  MODIFY `id_peramalan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id_stock` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `no_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`kategori_id`),
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`id_satuan`) REFERENCES `satuan` (`id_satuan`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`no_transaksi`) REFERENCES `transaksi` (`no_transaksi`);

--
-- Constraints for table `peramalan`
--
ALTER TABLE `peramalan`
  ADD CONSTRAINT `peramalan_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `stock_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
