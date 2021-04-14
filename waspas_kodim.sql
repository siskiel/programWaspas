-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Apr 2021 pada 10.52
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `waspas_kodim`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `nama_lengkap`, `password`) VALUES
(1, 'arif', 'Arif Setiawan', 'arif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `calon_komandan`
--

CREATE TABLE `calon_komandan` (
  `id_calon_komandan` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(35) NOT NULL,
  `pangkat` varchar(35) NOT NULL,
  `jabatan` varchar(35) NOT NULL,
  `kesatuan` varchar(35) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `alamat` text NOT NULL,
  `blangko` varchar(255) NOT NULL,
  `keterangan` varchar(30) NOT NULL,
  `hasil` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `calon_komandan`
--

INSERT INTO `calon_komandan` (`id_calon_komandan`, `nama`, `email`, `password`, `pangkat`, `jabatan`, `kesatuan`, `no_hp`, `alamat`, `blangko`, `keterangan`, `hasil`) VALUES
(1, 'Mustakitm', 'mustakim01@gmail.com', '12345678', 'Mayor/Inf/ 21930013080472', 'Danramil 06/MS', 'KODIM 0201/BS', '0812345678', '      Jln.Bukit karya Dusun 12', '2021041207585416-32-1-SM.pdf', 'Sesuai', 0.767),
(2, 'Nirmawan', 'nirmawan02@gmail.com', '12345678', 'Mayor/Arh/ 592222', 'Danramil 13/PST', 'KODIM 0201/BS', '0812345678', 'Jln. Indah sari langkat', '', 'Sesuai', 0.77),
(3, 'Soni Putrawan Ginting', 'soniputrwanginting@gmail.com', '12345678', 'Mayor/Czi/ 21950151080773', 'Danramil 08/MJ', 'KODIM 0201/BS', '0812345678', 'Jln. Indah sari langkat', '', 'Sesuai', 0.794),
(4, 'Agus Miadi', 'agusmiadi@gmail.com', '12345678', 'Mayor/Inf/ 628130', 'Danramil 11/MD', 'KODIM 0201/BS', '0812345678', 'Jln.Pondok indah ', '', 'Tidak Sesuai', 0.787),
(5, 'Sabur utomo', 'saburutomo@gmail.com', '12345678', 'Mayor/Arh/ 592222', 'Danramil 13/PST', 'KODIM 0201/BS', '0812345678', ' Jln. Indah sari langkat', '202104111856582021040518294438-Jurnal Artikel Ilmiah-96-2-10-20190222.pdf', 'Sesuai', 0.691),
(6, 'Andri Prasetyo Wibowo', 'andripras@gmail.com', '12345678', 'Mayor/Czi/ 21950151080773', 'Danramil 08/MJ', 'KODIM 0201/BS', '0812345678', ' Jln. Indah sari langkat', '2021041118575637-Article Text-73-1-10-20161115.pdf', '', 0.745),
(7, 'Bina Satria', 'binasatria@gmail.com', '12345678', 'Mayor/Inf/ 628130', 'Danramil 11/MD', 'KODIM 0201/BS', '0812345678', 'Jln.Pondok indah ', '', '', 0.818),
(8, 'Fitriadi', 'fitriadifitri@gmail.com', '12345678', 'Mayor/Inf/ 2920001060570', 'Danramil 07/MT', 'KODIM 0201/BS', '0812345678', 'Jln. Pondok tengah', '', '', 0.728),
(9, 'Eddy H Hutabarat', 'eddyhutabarat', '12345678', 'Mayor/Arm/ 21960123691176', 'Danramil 03/MD', 'KODIM 0201/BS', '0812345678', 'Jln.Ujung baka langkat', '', '', 0.765),
(10, 'Azwar', 'azwarazwar@gmail.com', '12345678', 'Mayor/Kav/ 605554', 'Danramil 01/MB', 'KODIM 0201/BS', '0812345678', 'Jln. Paya rengas stabat', '', '', 0.803);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `kode_kriteria` varchar(12) NOT NULL,
  `nama_kriteria` varchar(100) NOT NULL,
  `bobot` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `kode_kriteria`, `nama_kriteria`, `bobot`) VALUES
(1, 'C1', 'Moral', 0.028),
(2, 'C2', 'Disiplin', 0.028),
(3, 'C3', 'Dedikasi', 0.028),
(4, 'C4', 'Kejujuran', 0.028),
(5, 'C5', 'Tanggung jawab', 0.028),
(6, 'C6', 'Keuletan', 0.028),
(7, 'C7', 'Kestabilan jiwa', 0.028),
(8, 'C8', 'Loyalitas', 0.028),
(9, 'C9', 'Penyesuaian Diri', 0.028),
(10, 'C10', 'Kemauan Untuk Maju', 0.028),
(11, 'C11', 'Kepemimpinan', 0.03),
(12, 'C12', 'Kerjasama', 0.03),
(13, 'C13', 'Kreativitas', 0.03),
(14, 'C14', 'Daya Tanggap', 0.03),
(15, 'C15', 'Kemampuan merencanakan', 0.03),
(16, 'C16', 'Kemampuan mengarahkan', 0.03),
(17, 'C17', 'Kemampuan menyatakan pendapat', 0.03),
(18, 'C18', 'Kemampuan memutuskan', 0.03),
(19, 'C19', 'Kemampuan mengawasi/ mengendalikan', 0.03),
(20, 'C20', 'Kemampuan melaksanakan tugas', 0.03),
(21, 'C21', 'Kesehatan', 0.17),
(22, 'C22', 'Kesegaran jasmani', 0.25);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(11) NOT NULL,
  `id_calon_komandan` int(11) NOT NULL,
  `nama_calon_komandan` int(11) NOT NULL,
  `pesan_peng` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int(11) NOT NULL,
  `id_calon_komandan` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai_bobot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `id_calon_komandan`, `id_kriteria`, `nilai_bobot`) VALUES
(1, 1, 1, 3),
(2, 1, 2, 4),
(3, 1, 3, 2),
(4, 1, 4, 3),
(5, 1, 5, 4),
(6, 1, 6, 4),
(7, 1, 7, 2),
(8, 1, 8, 2),
(9, 1, 9, 3),
(10, 1, 10, 2),
(11, 1, 11, 4),
(12, 1, 12, 3),
(13, 1, 13, 3),
(14, 1, 14, 4),
(15, 1, 15, 3),
(16, 1, 16, 2),
(17, 1, 17, 2),
(18, 1, 18, 3),
(19, 1, 19, 2),
(20, 1, 20, 3),
(21, 1, 21, 4),
(22, 1, 22, 3),
(24, 2, 1, 4),
(25, 2, 2, 4),
(26, 2, 3, 2),
(27, 2, 4, 4),
(28, 2, 5, 3),
(29, 2, 6, 2),
(30, 2, 7, 4),
(31, 2, 8, 3),
(32, 2, 9, 2),
(33, 2, 10, 2),
(34, 2, 11, 2),
(35, 2, 12, 4),
(36, 2, 13, 3),
(37, 2, 14, 4),
(38, 2, 15, 4),
(39, 2, 16, 3),
(40, 2, 17, 4),
(41, 2, 18, 2),
(42, 2, 19, 4),
(43, 2, 20, 4),
(44, 2, 21, 3),
(45, 2, 22, 3),
(68, 3, 1, 4),
(69, 3, 2, 3),
(70, 3, 3, 3),
(71, 3, 4, 4),
(72, 3, 5, 3),
(73, 3, 6, 3),
(74, 3, 7, 3),
(75, 3, 8, 4),
(76, 3, 9, 3),
(77, 3, 10, 3),
(78, 3, 11, 4),
(79, 3, 12, 3),
(80, 3, 13, 2),
(81, 3, 14, 4),
(82, 3, 15, 3),
(83, 3, 16, 4),
(84, 3, 17, 3),
(85, 3, 18, 3),
(86, 3, 19, 3),
(87, 3, 20, 3),
(88, 3, 21, 2),
(89, 3, 22, 4),
(90, 4, 1, 3),
(91, 4, 2, 4),
(92, 4, 3, 4),
(93, 4, 4, 2),
(94, 4, 5, 4),
(95, 4, 6, 4),
(96, 4, 7, 2),
(97, 4, 8, 3),
(98, 4, 9, 2),
(99, 4, 10, 4),
(100, 4, 11, 3),
(101, 4, 12, 2),
(102, 4, 13, 4),
(103, 4, 14, 3),
(104, 4, 15, 2),
(105, 4, 16, 4),
(106, 4, 17, 4),
(107, 4, 18, 3),
(108, 4, 19, 2),
(109, 4, 20, 2),
(110, 4, 21, 4),
(111, 4, 22, 3),
(112, 5, 1, 2),
(113, 5, 2, 4),
(114, 5, 3, 3),
(115, 5, 4, 4),
(116, 5, 5, 3),
(117, 5, 6, 3),
(118, 5, 7, 3),
(119, 5, 8, 2),
(120, 5, 9, 4),
(121, 5, 10, 3),
(122, 5, 11, 2),
(123, 5, 12, 4),
(124, 5, 13, 3),
(125, 5, 14, 4),
(126, 5, 15, 3),
(127, 5, 16, 4),
(128, 5, 17, 3),
(129, 5, 18, 2),
(130, 5, 19, 3),
(131, 5, 20, 3),
(132, 5, 21, 3),
(133, 5, 22, 2),
(134, 6, 1, 3),
(135, 6, 2, 4),
(136, 6, 3, 4),
(137, 6, 4, 3),
(138, 6, 5, 4),
(139, 6, 6, 2),
(140, 6, 7, 2),
(141, 6, 8, 2),
(142, 6, 9, 4),
(143, 6, 10, 4),
(144, 6, 11, 4),
(145, 6, 12, 3),
(146, 6, 13, 2),
(147, 6, 14, 2),
(148, 6, 15, 4),
(149, 6, 16, 4),
(150, 6, 17, 4),
(151, 6, 18, 4),
(152, 6, 19, 4),
(153, 6, 20, 4),
(154, 6, 21, 2),
(155, 6, 22, 3),
(156, 7, 1, 4),
(157, 7, 2, 3),
(158, 7, 3, 2),
(159, 7, 4, 4),
(160, 7, 5, 3),
(161, 7, 6, 3),
(162, 7, 7, 4),
(163, 7, 8, 2),
(164, 7, 9, 3),
(165, 7, 10, 2),
(166, 7, 11, 3),
(167, 7, 12, 2),
(168, 7, 13, 3),
(169, 7, 14, 4),
(170, 7, 15, 3),
(171, 7, 16, 3),
(172, 7, 17, 4),
(173, 7, 18, 4),
(174, 7, 19, 3),
(175, 7, 20, 3),
(176, 7, 21, 3),
(177, 7, 22, 4),
(178, 8, 1, 3),
(179, 8, 2, 4),
(180, 8, 3, 3),
(181, 8, 4, 3),
(182, 8, 5, 4),
(183, 8, 6, 4),
(184, 8, 7, 3),
(185, 8, 8, 3),
(186, 8, 9, 2),
(187, 8, 10, 3),
(188, 8, 11, 2),
(189, 8, 12, 3),
(190, 8, 13, 4),
(191, 8, 14, 3),
(192, 8, 15, 2),
(193, 8, 16, 2),
(194, 8, 17, 3),
(195, 8, 18, 3),
(196, 8, 19, 2),
(197, 8, 20, 2),
(198, 8, 21, 3),
(199, 8, 22, 3),
(200, 9, 1, 4),
(201, 9, 2, 2),
(202, 9, 3, 3),
(203, 9, 4, 4),
(204, 9, 5, 3),
(205, 9, 6, 2),
(206, 9, 7, 2),
(207, 9, 8, 4),
(208, 9, 9, 3),
(209, 9, 10, 4),
(210, 9, 11, 3),
(211, 9, 12, 3),
(212, 9, 13, 3),
(213, 9, 14, 4),
(214, 9, 15, 3),
(215, 9, 16, 3),
(216, 9, 17, 4),
(217, 9, 18, 2),
(218, 9, 19, 4),
(219, 9, 20, 3),
(220, 9, 21, 3),
(221, 9, 22, 3),
(222, 10, 1, 4),
(223, 10, 2, 3),
(224, 10, 3, 4),
(225, 10, 4, 4),
(226, 10, 5, 4),
(227, 10, 6, 3),
(228, 10, 7, 3),
(229, 10, 8, 2),
(230, 10, 9, 2),
(231, 10, 10, 4),
(232, 10, 11, 3),
(233, 10, 12, 4),
(234, 10, 13, 3),
(235, 10, 14, 3),
(236, 10, 15, 4),
(237, 10, 16, 4),
(238, 10, 17, 3),
(239, 10, 18, 4),
(240, 10, 19, 3),
(241, 10, 20, 4),
(242, 10, 21, 3),
(243, 10, 22, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_kriteria`
--

CREATE TABLE `sub_kriteria` (
  `id_subKriteria` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nama_sub` varchar(255) NOT NULL,
  `bobot_sub` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sub_kriteria`
--

INSERT INTO `sub_kriteria` (`id_subKriteria`, `id_kriteria`, `nama_sub`, `bobot_sub`) VALUES
(1, 1, 'Baik Sekali', 4),
(2, 1, 'Baik', 3),
(3, 1, 'Cukup Baik', 2),
(4, 1, 'Kurang', 1),
(5, 2, 'Baik Sekali', 4),
(6, 2, 'Baik', 3),
(7, 2, 'Cukup Baik', 2),
(8, 2, 'Kurang', 1),
(9, 3, 'Baik Sekali', 4),
(10, 3, 'Baik', 3),
(11, 3, 'Cukup Baik', 2),
(12, 3, 'Kurang', 1),
(13, 4, 'Baik Sekali', 4),
(14, 4, 'Baik', 3),
(15, 4, 'Cukup Baik', 2),
(16, 4, 'Kurang', 1),
(17, 5, 'Baik Sekali', 4),
(18, 5, 'Baik', 3),
(19, 5, 'Cukup Baik', 2),
(20, 5, 'Kurang', 1),
(21, 6, 'Baik Sekali', 4),
(22, 6, 'Baik', 3),
(23, 6, 'Cukup Baik', 2),
(24, 6, 'Kurang', 1),
(25, 7, 'Baik Sekali', 4),
(26, 7, 'Baik', 3),
(27, 7, 'Cukup Baik', 2),
(28, 7, 'Kurang', 1),
(29, 8, 'Baik Sekali', 4),
(30, 8, 'Baik', 3),
(31, 8, 'Cukup Baik', 2),
(32, 8, 'Kurang', 8),
(33, 9, 'Baik Sekali', 4),
(34, 9, 'Baik', 3),
(35, 9, 'Cukup Baik', 2),
(36, 9, 'Kurang', 1),
(37, 10, 'Baik Sekali', 4),
(38, 11, 'Baik', 3),
(39, 11, 'Cukup Baik', 2),
(40, 11, 'Kurang', 1),
(41, 12, 'Baik Sekali', 4),
(42, 12, 'Baik', 3),
(43, 12, 'Cukup Baik', 2),
(44, 12, 'Kurang', 1),
(45, 13, 'Baik Sekali', 4),
(46, 13, 'Baik', 3),
(47, 13, 'Cukup Baik', 2),
(48, 13, 'Kurang', 1),
(49, 14, 'Baik Sekali', 4),
(50, 14, 'Baik', 3),
(51, 14, 'Cukup Baik', 2),
(52, 14, 'Kurang', 1),
(53, 15, 'Baik Sekali', 4),
(54, 15, 'Baik', 3),
(55, 15, 'Cukup Baik', 2),
(56, 15, 'Kurang', 1),
(57, 16, 'Baik Sekali', 4),
(58, 16, 'Baik', 3),
(59, 16, 'Cukup Baik', 2),
(60, 16, 'Kurang', 1),
(61, 17, 'Baik Sekali', 4),
(62, 17, 'Baik', 3),
(63, 17, 'Cukup Baik', 2),
(64, 17, 'Kurang', 1),
(65, 18, 'Baik Sekali', 4),
(66, 18, 'Baik', 3),
(67, 18, 'Cukup Baik', 2),
(68, 18, 'Kurang', 1),
(69, 19, 'Baik Sekali', 4),
(70, 19, 'Baik', 3),
(71, 19, 'Cukup Baik', 2),
(72, 19, 'Kurang', 1),
(73, 20, 'Baik Sekali', 4),
(74, 20, 'Baik', 3),
(75, 20, 'Cukup Baik', 2),
(76, 20, 'Kurang', 1),
(77, 21, 'Baik Sekali', 4),
(78, 21, 'Baik', 3),
(79, 21, 'Cukup Baik', 2),
(80, 21, 'Kurang', 1),
(81, 22, 'Baik Sekali', 4),
(82, 22, 'Baik', 3),
(83, 22, 'Cukup Baik', 2),
(84, 22, 'Kurang', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `calon_komandan`
--
ALTER TABLE `calon_komandan`
  ADD PRIMARY KEY (`id_calon_komandan`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indeks untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`),
  ADD KEY `id_calon_komandan` (`id_calon_komandan`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indeks untuk tabel `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD PRIMARY KEY (`id_subKriteria`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `calon_komandan`
--
ALTER TABLE `calon_komandan`
  MODIFY `id_calon_komandan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=244;

--
-- AUTO_INCREMENT untuk tabel `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `id_subKriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `penilaian_ibfk_1` FOREIGN KEY (`id_calon_komandan`) REFERENCES `calon_komandan` (`id_calon_komandan`),
  ADD CONSTRAINT `penilaian_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
