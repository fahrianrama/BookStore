-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2022 at 04:20 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `picture` text NOT NULL,
  `judul` text NOT NULL,
  `pengarang` text NOT NULL,
  `penerbit` varchar(30) NOT NULL,
  `tahun_terbit` int(11) NOT NULL,
  `tebal` int(11) NOT NULL,
  `kategori` text NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `id_toko`, `picture`, `judul`, `pengarang`, `penerbit`, `tahun_terbit`, `tebal`, `kategori`, `deskripsi`, `harga`, `stok`) VALUES
(1, 1, 'https://asset.kompas.com/crops/mTnVdoYXCoN9ElxrsEDbdoY7y0s=/65x65:865x599/750x500/data/photo/2017/06/28/1265845835.jpg', 'Coba Bukuku', 'CodeIgniters', 'CI', 2020, 210, 'komputer', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 69000, 11),
(2, 1, 'https://img.lovepik.com/photo/40005/6991.jpg_wh860.jpg', 'Bukubuku berbuku ini merupakan buku test', 'CodeIgniter', 'CI', 2019, 150, 'internet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 78000, 15),
(4, 1, 'https://penerbitbukudeepublish.com/wp-content/uploads/2022/01/Buku-Pengantar-Ilmu-Kelautan-Dan-Perikanan.jpg', 'Buku Pengantar Ilmu Kelautan dan Perikanan', 'A.B Fishman', 'Badan Perikanan', 2020, 102, 'pendidikan', 'Buku ini merupakan buku untuk mempelajari kelautan yang mana laut merupakan daerah yang sangat luas dan dapat diarungi\r\n', 208000, 25),
(5, 1, 'https://img.lovepik.com/photo/40005/6991.jpg_wh860.jpg', 'Bukubuku berbuku ini merupakan buku test', 'CodeIgniter', 'CI', 2019, 150, 'internet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 78000, 15),
(6, 1, 'https://asset.kompas.com/crops/mTnVdoYXCoN9ElxrsEDbdoY7y0s=/65x65:865x599/750x500/data/photo/2017/06/28/1265845835.jpg', 'Coba Bukuku', 'CodeIgniters', 'CI', 2020, 210, 'komputer', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 69000, 11),
(7, 1, 'https://penerbitbukudeepublish.com/wp-content/uploads/2022/01/Buku-Pengantar-Ilmu-Kelautan-Dan-Perikanan.jpg', 'Buku Pengantar Ilmu Kelautan dan Perikanan', 'A.B Fishman', 'Badan Perikanan', 2020, 102, 'pendidikan', 'Buku ini merupakan buku untuk mempelajari kelautan yang mana laut merupakan daerah yang sangat luas dan dapat diarungi\r\n', 208000, 23);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `no_hp` varchar(30) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `bank` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `username`, `nama`, `email`, `no_hp`, `alamat`, `bank`) VALUES
(1, 'sutarmin', 'Sutarmin', 'sutarminoye@gmail.com', '08724127125', 'Jalan surakarta, nomor 15, Desa Sidodadi, Surabaya, Jawa timur', '12047123124'),
(3, 'a', 'kosong', 'kosong', 'kosong', 'kosong', 'kosong'),
(4, 'customer', 'Customer test', 'customer@gmail.com', '08724127124', 'Jalan kenanga nomor 17 Surabaya', '02974214');

-- --------------------------------------------------------

--
-- Table structure for table `kurir`
--

CREATE TABLE `kurir` (
  `id_kurir` int(11) NOT NULL,
  `nama_kurir` text NOT NULL,
  `email` text NOT NULL,
  `no_hp` int(12) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE `toko` (
  `id_toko` int(11) NOT NULL,
  `nama_toko` text NOT NULL,
  `alamat` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`id_toko`, `nama_toko`, `alamat`, `email`) VALUES
(1, 'Toko Buku Cahaya', 'Jalan kusmaradana nomor 17 Kecamatan Pariagung, Kota Bandung, Jawa Barat', 'cahayabookstore@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `jenis_pembayaran` varchar(20) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `kurir` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_customer`, `id_buku`, `jumlah`, `jenis_pembayaran`, `tanggal_transaksi`, `kurir`, `status`) VALUES
(3, 1, 2, 2, 'transfer', '2022-04-13', 'jne', 'Diantar'),
(4, 1, 1, 1, 'transfer', '2022-04-13', 'jne', 'Dibatalkan'),
(5, 1, 1, 2, 'transfer', '2022-04-13', 'sicepat', 'Dikonfirmasi'),
(6, 1, 7, 1, 'transfer', '2022-04-16', 'jne', 'Dibayar'),
(12, 4, 4, 1, 'transfer', '2022-04-16', 'sicepat', 'Dikonfirmasi'),
(13, 4, 1, 2, 'transfer', '2022-04-16', 'jne', 'Dibatalkan'),
(14, 4, 2, 2, 'transfer', '2022-04-16', 'jne', 'Dibatalkan');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `role`) VALUES
(1, 'sutarmin', 'sutarmin', 'customer'),
(2, 'admin', 'admin', 'admin'),
(3, 'JNE', 'jne', 'kurir'),
(22, 'customer', 'customer', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `toko`
--
ALTER TABLE `toko`
  MODIFY `id_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
