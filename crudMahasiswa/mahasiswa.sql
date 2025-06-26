-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Jan 2024 pada 07.28
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mahasiswa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(5) NOT NULL,
  `nama_admin` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `password`) VALUES
(4, 'ahmad', '$2y$10$BVK0MbqFWNAGIIZYkNRPPuKT7X6xlkkVAV.0Hq5.UlrveJ2qQFpuG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fakultas`
--

CREATE TABLE `fakultas` (
  `kode_fakultas` int(2) NOT NULL,
  `nama_fakultas` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `fakultas`
--

INSERT INTO `fakultas` (`kode_fakultas`, `nama_fakultas`) VALUES
(1, 'teknik'),
(2, 'kesehatan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `id_admin` int(5) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id_login`, `id_admin`, `tanggal`, `waktu`) VALUES
(1, 4, '2023-12-26', '20:16:51'),
(18, 4, '2024-01-05', '17:09:13'),
(19, 4, '2024-01-05', '17:23:42'),
(20, 4, '2024-01-05', '18:03:44'),
(21, 4, '2024-01-06', '07:58:32'),
(22, 4, '2024-01-07', '07:21:24'),
(23, 4, '2024-01-07', '08:14:58'),
(24, 4, '2024-01-08', '19:19:03'),
(25, 4, '2024-01-09', '06:19:28'),
(26, 4, '2024-01-09', '07:14:44'),
(27, 4, '2024-01-09', '07:25:15'),
(28, 4, '2024-01-09', '07:26:25'),
(29, 4, '2024-01-09', '07:27:01'),
(30, 4, '2024-01-10', '06:53:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` int(5) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `semester` int(2) NOT NULL,
  `kode_fakultas` int(2) NOT NULL,
  `kode_prodi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `semester`, `kode_fakultas`, `kode_prodi`) VALUES
(11111, 'brodi', 3, 1, 'te'),
(11112, 'budiono', 3, 1, 'ti'),
(11113, 'sopo', 5, 1, 'if'),
(11114, 'yanti', 7, 2, 'bdn');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE `prodi` (
  `kode_prodi` varchar(10) NOT NULL,
  `kode_fakultas` int(2) NOT NULL,
  `nama_prodi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `prodi`
--

INSERT INTO `prodi` (`kode_prodi`, `kode_fakultas`, `nama_prodi`) VALUES
('bdn', 2, 'bidan'),
('dr', 2, 'kedokteran'),
('if', 1, 'teknik informatika'),
('kpr', 2, 'keperawatan'),
('rpl', 1, 'rekayasa perangkat lunak'),
('si', 1, 'sistem informasi'),
('te', 1, 'teknik elektro'),
('ti', 1, 'teknologi informasi');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_mahasiswa`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_mahasiswa` (
`nim` int(5)
,`nama` varchar(40)
,`semester` int(2)
,`prodi` varchar(30)
,`fakultas` varchar(30)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `view_mahasiswa`
--
DROP TABLE IF EXISTS `view_mahasiswa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_mahasiswa`  AS SELECT `nim` AS `nim`, `nama` AS `nama`, `semester` AS `semester`, `prodi`.`nama_prodi` AS `prodi`, `fakultas`.`nama_fakultas` AS `fakultas` FROM ((`mahasiswa` join `prodi` on(`kode_prodi` = `prodi`.`kode_prodi`)) join `fakultas` on(`kode_fakultas` = `fakultas`.`kode_fakultas`)) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`kode_fakultas`),
  ADD UNIQUE KEY `kode_fakultas` (`kode_fakultas`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`),
  ADD KEY `fk_id_admin` (`id_admin`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `kode_fakultas` (`kode_fakultas`),
  ADD KEY `kode_prodi` (`kode_prodi`),
  ADD KEY `nim` (`nim`);

--
-- Indeks untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`kode_prodi`),
  ADD UNIQUE KEY `kode_prodi` (`kode_prodi`),
  ADD KEY `kode_fakultas` (`kode_fakultas`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `fk_id_admin` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `fk_kode_fakultas` FOREIGN KEY (`kode_fakultas`) REFERENCES `fakultas` (`kode_fakultas`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kode_prodi` FOREIGN KEY (`kode_prodi`) REFERENCES `prodi` (`kode_prodi`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD CONSTRAINT `fk_fakultas` FOREIGN KEY (`kode_fakultas`) REFERENCES `fakultas` (`kode_fakultas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
