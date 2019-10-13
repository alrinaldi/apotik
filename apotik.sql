-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jan 2019 pada 10.08
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `avgstay`
--

CREATE TABLE `avgstay` (
  `id` int(11) NOT NULL,
  `cumavgstay` float NOT NULL,
  `clasification` varchar(11) NOT NULL,
  `id_obat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `avgstay`
--

INSERT INTO `avgstay` (`id`, `cumavgstay`, `clasification`, `id_obat`) VALUES
(19, 12.7778, 'S', 1),
(20, 8.44444, 'F', 3),
(21, 10.7716, 'F', 7),
(22, 14, 'N', 9),
(23, 14, 'N', 13),
(24, 14, 'N', 15),
(25, 14, 'N', 16),
(26, 14, 'N', 17),
(27, 14, 'S', 18);

-- --------------------------------------------------------

--
-- Struktur dari tabel `consumsition`
--

CREATE TABLE `consumsition` (
  `id` int(11) NOT NULL,
  `consumtionrt` float NOT NULL,
  `clasification` varchar(50) NOT NULL,
  `id_obat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `consumsition`
--

INSERT INTO `consumsition` (`id`, `consumtionrt`, `clasification`, `id_obat`) VALUES
(1, 0, 'F', 9),
(2, 0, 'S', 13),
(3, 0, 'N', 16),
(4, 0, 'N', 17),
(5, 0, 'N', 18),
(6, 0.785714, 'N', 1),
(7, 0, 'N', 15),
(8, 0.214286, 'N', 7),
(9, 0.571429, 'N', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id` int(12) NOT NULL,
  `nama` text NOT NULL,
  `gol` text NOT NULL,
  `type` text NOT NULL,
  `tgl_kadaluarsa` date NOT NULL,
  `tgl` date NOT NULL,
  `stok` int(12) NOT NULL,
  `harga_jual` int(12) NOT NULL,
  `harga_beli` int(12) NOT NULL,
  `id_supplier` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id`, `nama`, `gol`, `type`, `tgl_kadaluarsa`, `tgl`, `stok`, `harga_jual`, `harga_beli`, `id_supplier`) VALUES
(1, 'omeprazol', 'Sedang', 'Tablet', '2019-03-29', '0000-00-00', 99, 10000, 8000, 1),
(3, 'captopril', 'Semua umur', 'Tablet', '2018-12-31', '0000-00-00', 16, 300, 200, 2),
(7, 'CANDESARTAN DEXA 8MG TAB', 'Keras', 'Tablet', '2018-12-31', '0000-00-00', 97, 6500, 6400, 2),
(9, 'INTUNAL SYR 60ML', 'Semua umur', 'Botol', '2019-04-30', '0000-00-00', 90, 18000, 16000, 2),
(13, 'pimtrakol', 'Semua umur', 'Botol', '2019-01-31', '0000-00-00', 100, 15000, 14000, 2),
(15, 'opistan', 'Keras', 'Tablet', '2019-01-05', '0000-00-00', 593, 5000, 4000, 2),
(16, 'paracetamol', 'Keras', 'Sedang', '2018-12-31', '0000-00-00', 50, 11110, 4000, 1),
(17, 'sanmol', 'Semua umur', 'Botol', '2018-12-18', '2018-12-04', 92, 5000, 4000, 2),
(18, 'komix flu', 'Semua umur', 'Botol', '2018-12-31', '2018-12-01', 3, 0, 5000, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `total` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `qty`, `tgl`, `total`, `id_obat`) VALUES
(2, 10, '2018-12-29', 9000, 3),
(3, 10, '2018-12-29', 9000, 3),
(5, 100, '2018-12-29', 400000, 7),
(6, 500, '2018-12-20', 2000000, 15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `kode` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `total` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`kode`, `tgl`, `total`, `qty`, `id_obat`) VALUES
(1, '2018-11-26', 100000, 2, 0),
(2, '2018-12-26', 50000, 6, 1),
(3, '2018-12-26', 0, 4, 3),
(5, '2018-11-26', 0, 5, 1),
(6, '2018-12-26', 10000, 5, 1),
(7, '2018-12-27', 2000, 1, 8),
(8, '2018-12-28', 0, 4, 3),
(9, '2018-12-20', 16000, 4, 14),
(10, '2018-12-10', 8000, 2, 14),
(11, '2018-12-16', 28000, 7, 15),
(12, '2018-12-19', 32000, 8, 17),
(13, '2018-12-25', 19200, 3, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(12) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telepon` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama`, `alamat`, `telepon`) VALUES
(1, 'admin', 'jakarta', 967778),
(2, 'Alfrinaldi', 'Virtual Office Otak Studio di CV. Dinamika Lintasn', 788232323);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `tlpn` int(12) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `password`, `alamat`, `tlpn`, `nama`, `level`) VALUES
('admin', 'admin12', 'jakarta', 81222334, 'Doker', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `avgstay`
--
ALTER TABLE `avgstay`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `consumsition`
--
ALTER TABLE `consumsition`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_supplier` (`id_supplier`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `id_obat` (`id_obat`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`kode`),
  ADD KEY `id_obat` (`id_obat`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `avgstay`
--
ALTER TABLE `avgstay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `consumsition`
--
ALTER TABLE `consumsition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD CONSTRAINT `obat_ibfk_1` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`);

--
-- Ketidakleluasaan untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
