-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Feb 2021 pada 03.48
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ap2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bayar`
--

CREATE TABLE `bayar` (
  `id_bayar` int(255) NOT NULL,
  `id_kontrak` int(255) NOT NULL,
  `jumlah` decimal(65,0) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `melalui` varchar(255) NOT NULL,
  `ket` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bayar`
--

INSERT INTO `bayar` (`id_bayar`, `id_kontrak`, `jumlah`, `tgl_bayar`, `melalui`, `ket`) VALUES
(1, 2, '4000000', '2019-12-11', 'Bank BRI', 'Lunas'),
(8, 11, '2000000', '2019-12-04', 'Bank BRI', 'Lunas'),
(9, 18, '2000000', '2020-01-14', 'Bank BRI', 'Lunas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontrak`
--

CREATE TABLE `kontrak` (
  `id_kontrak` int(255) NOT NULL,
  `id_mitra` int(255) NOT NULL,
  `tgl_awal` date NOT NULL,
  `tgl_akhir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kontrak`
--

INSERT INTO `kontrak` (`id_kontrak`, `id_mitra`, `tgl_awal`, `tgl_akhir`) VALUES
(2, 1, '2019-12-07', '2019-12-21'),
(11, 17, '2019-12-09', '2019-12-13'),
(14, 18, '2019-12-03', '2019-12-03'),
(16, 1, '2019-12-04', '2019-12-27'),
(17, 20, '2019-12-10', '2021-12-10'),
(18, 21, '2020-01-01', '2020-01-13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mitra`
--

CREATE TABLE `mitra` (
  `id_mitra` int(11) NOT NULL,
  `nm_mitra` varchar(500) NOT NULL,
  `jns_instansi` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mitra`
--

INSERT INTO `mitra` (`id_mitra`, `nm_mitra`, `jns_instansi`) VALUES
(1, 'PT. Garuda Indonesia', 'Penerbangan'),
(17, 'KFC', 'Makanan'),
(18, 'Indomaret', 'Makanan'),
(20, 'Starbucks', 'Minuman'),
(21, 'Traveloka', 'Iklan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_level` int(11) NOT NULL,
  `image` varchar(255) DEFAULT 'no_image.jpg',
  `status` int(1) NOT NULL,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `user_level`, `image`, `status`, `last_login`) VALUES
(1, ' Admin User', 'Admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 'ux9s5qod1.jpg', 1, '2021-02-21 12:41:44'),
(2, 'User Administrasi', 'Administrasi', 'e5c6ba3abff1db4479bb60c5d79cc1c2a0689dcb', 2, 'ux9s5qod1.jpg', 1, '2019-12-10 02:13:11'),
(3, 'User Pembayaran', 'Pembayaran', '9c3c0cdfdf82cd4fad5c5d5c177d171e726b3fb5', 3, 'ux9s5qod1.jpg', 1, '2019-12-10 02:29:57'),
(4, 'Hisnu Al-Mujahidin', 'Hisnu', 'b3df171f067b241c4d172315341d305f4d44e948', 1, 'n1e05k1k4.JPG', 1, '2020-01-14 07:33:51'),
(5, 'Salamat', 'salamat', '92ae82b9e238bfb2b2a713c9939692c1afc7c2aa', 1, 'ux9s5qod1.jpg', 1, '2019-12-10 13:40:34'),
(7, 'konu', 'konu', '55bb119aaf58dc4ac4ec7c34ed2febecc2d316ff', 1, 'ux9s5qod1.jpg', 1, '2019-12-10 14:13:07'),
(8, 'agus ', 'agus ', '0525885565bb6a150db63f19bf42f11bd2db4702', 1, 'no_imageap.jpg', 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_groups`
--

CREATE TABLE `user_groups` (
  `id` int(11) NOT NULL,
  `group_name` varchar(150) NOT NULL,
  `group_level` int(11) NOT NULL,
  `group_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_groups`
--

INSERT INTO `user_groups` (`id`, `group_name`, `group_level`, `group_status`) VALUES
(1, 'Admin', 1, 1),
(2, 'User Administrasi', 2, 1),
(3, 'User Pembayaran', 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bayar`
--
ALTER TABLE `bayar`
  ADD PRIMARY KEY (`id_bayar`),
  ADD KEY `id_kontrak` (`id_kontrak`);

--
-- Indeks untuk tabel `kontrak`
--
ALTER TABLE `kontrak`
  ADD PRIMARY KEY (`id_kontrak`),
  ADD KEY `kontrak_ibfk_1` (`id_mitra`);

--
-- Indeks untuk tabel `mitra`
--
ALTER TABLE `mitra`
  ADD PRIMARY KEY (`id_mitra`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_level` (`user_level`);

--
-- Indeks untuk tabel `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `group_level` (`group_level`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bayar`
--
ALTER TABLE `bayar`
  MODIFY `id_bayar` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `kontrak`
--
ALTER TABLE `kontrak`
  MODIFY `id_kontrak` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `mitra`
--
ALTER TABLE `mitra`
  MODIFY `id_mitra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bayar`
--
ALTER TABLE `bayar`
  ADD CONSTRAINT `bayar_ibfk_1` FOREIGN KEY (`id_kontrak`) REFERENCES `kontrak` (`id_kontrak`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kontrak`
--
ALTER TABLE `kontrak`
  ADD CONSTRAINT `kontrak_ibfk_1` FOREIGN KEY (`id_mitra`) REFERENCES `mitra` (`id_mitra`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_user` FOREIGN KEY (`user_level`) REFERENCES `user_groups` (`group_level`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
