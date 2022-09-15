-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Sep 2022 pada 13.54
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `posyandu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_anak`
--

CREATE TABLE `data_anak` (
  `id_anak` char(6) NOT NULL,
  `nik` char(17) NOT NULL,
  `nama_anak` varchar(50) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `bbl` double NOT NULL,
  `pbl` double NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_anak`
--

INSERT INTO `data_anak` (`id_anak`, `nik`, `nama_anak`, `nama_ibu`, `nama_ayah`, `tanggal_lahir`, `jenis_kelamin`, `bbl`, `pbl`, `alamat`) VALUES
('AN0001', '3327111704020001', 'Fajar', 'Sriwitati', 'Kholili', '2006-09-10', 'L', 5.3, 90, 'Pemalang'),
('AN0002', '3327115210070002', 'Puspa', 'Sriwitati', 'Kholili', '2022-09-10', 'P', 50, 40, 'Pemalang'),
('AN0003', '', 'Puspa', 'Ayu', 'Kholili', '2022-09-13', 'L', 4.5, 330, 'Pemalang'),
('AN0004', '', 'Fajar', 'Ayu', 'Kholili', '2022-09-13', 'L', 9000, 9000, 'asa'),
('AN0005', '', 'Fajar', 'Ayu', 'Kholili', '2022-09-13', 'L', 45, 111111, 'Aassssss'),
('AN0006', '', 'Dimas', 'Siti', 'Faykar', '2020-09-07', 'L', 3.5, 150, 'Samborejo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_penimbangan`
--

CREATE TABLE `data_penimbangan` (
  `id_penimbangan` char(6) NOT NULL,
  `id_anak` char(6) NOT NULL,
  `umur` int(11) NOT NULL,
  `berat_badan` double NOT NULL,
  `tinggi_badan` double NOT NULL,
  `keterangan` text NOT NULL,
  `posisi` varchar(20) NOT NULL,
  `tanggal_input` date NOT NULL,
  `petugas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_penimbangan`
--

INSERT INTO `data_penimbangan` (`id_penimbangan`, `id_anak`, `umur`, `berat_badan`, `tinggi_badan`, `keterangan`, `posisi`, `tanggal_input`, `petugas`) VALUES
('PN0001', 'AN0001', 192, 90, 90, 'Naik', 'BGT', '2022-09-13', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'fajar', 'e62c3787c79d02fa7b8a7f5cfbe25a7b'),
(2, 'admin', 'c4ca4238a0b923820dcc509a6f75849b'),
(3, 'ana', '202cb962ac59075b964b07152d234b70'),
(6, 'aji', '24bc50d85ad8fa9cda686145cf1f8aca'),
(7, 'miffa', 'c81e728d9d4c2f636f067f89cc14862c'),
(8, 'mbsTiawan', 'e807f1fcf82d132f9bb018ca6738a19f'),
(9, 'ko', 'c4ca4238a0b923820dcc509a6f75849b'),
(10, 'tati', 'c4ca4238a0b923820dcc509a6f75849b'),
(12, '15432', 'f970e2767d0cfe75876ea857f92e319b'),
(13, 'kus', 'c20ad4d76fe97759aa27a0c99bff6710'),
(14, 'kholili', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_anak`
--
ALTER TABLE `data_anak`
  ADD PRIMARY KEY (`id_anak`);

--
-- Indeks untuk tabel `data_penimbangan`
--
ALTER TABLE `data_penimbangan`
  ADD PRIMARY KEY (`id_penimbangan`),
  ADD KEY `id_anak` (`id_anak`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_penimbangan`
--
ALTER TABLE `data_penimbangan`
  ADD CONSTRAINT `data_penimbangan_ibfk_1` FOREIGN KEY (`id_anak`) REFERENCES `data_anak` (`id_anak`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
