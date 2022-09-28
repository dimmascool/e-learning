-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 28 Jul 2021 pada 12.43
-- Versi server: 10.3.29-MariaDB-cll-lve
-- Versi PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u3243493_tugas_dimas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jawaban_quiz_learn_daring`
--

CREATE TABLE `jawaban_quiz_learn_daring` (
  `id` int(11) NOT NULL,
  `id_quiz` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `jawaban` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jawaban_quiz_learn_daring`
--

INSERT INTO `jawaban_quiz_learn_daring` (`id`, `id_quiz`, `username`, `jawaban`) VALUES
(1, 1, 'Cilto', 'Sangat Baik'),
(2, 2, 'Cilto', 'Sangat Baik'),
(3, 4, 'Cilto', 'Sangat Baik'),
(4, 1, 'yanto', 'Sangat Kurang'),
(5, 2, 'yanto', 'Sangat Kurang'),
(6, 4, 'yanto', 'Kurang'),
(7, 1, 'udin', 'Sangat Baik'),
(8, 2, 'udin', 'Sangat Baik'),
(9, 4, 'udin', 'Sangat Baik'),
(10, 1, 'raka', 'Cukup'),
(11, 2, 'raka', 'Cukup'),
(12, 4, 'raka', 'Cukup'),
(13, 1, 'dara', 'Baik'),
(14, 2, 'dara', 'Kurang'),
(15, 4, 'dara', 'Baik'),
(16, 1, 'wanda', 'Cukup'),
(17, 2, 'wanda', 'Kurang'),
(18, 4, 'wanda', 'Sangat Kurang'),
(19, 1, 'Edo', 'Kurang'),
(20, 2, 'Edo', 'Cukup'),
(21, 4, 'Edo', 'Cukup'),
(22, 1, 'bambang', 'Kurang'),
(23, 2, 'bambang', 'Cukup'),
(24, 4, 'bambang', 'Kurang'),
(25, 1, 'Faiz Fachrudin', 'Sangat Baik'),
(26, 2, 'Faiz Fachrudin', 'Baik'),
(27, 4, 'Faiz Fachrudin', 'Cukup'),
(28, 1, 'renaldi', 'Kurang'),
(29, 2, 'renaldi', 'Kurang'),
(30, 4, 'renaldi', 'Cukup'),
(31, 5, 'renaldi', 'Cukup'),
(32, 1, 'superadmin', 'Sangat Baik'),
(33, 2, 'superadmin', 'Sangat Baik'),
(34, 4, 'superadmin', 'Sangat Baik'),
(35, 5, 'superadmin', 'Sangat Baik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jawaban_quiz_pandemi`
--

CREATE TABLE `jawaban_quiz_pandemi` (
  `id` int(11) NOT NULL,
  `id_quiz` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `jawaban` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jawaban_quiz_pandemi`
--

INSERT INTO `jawaban_quiz_pandemi` (`id`, `id_quiz`, `username`, `jawaban`) VALUES
(1, 3, 'Cilto', 'Sangat Baik'),
(2, 4, 'Cilto', 'Sangat Baik'),
(3, 3, 'superadmin', 'Cukup'),
(4, 4, 'superadmin', 'Kurang'),
(5, 6, 'superadmin', 'Sangat Kurang'),
(6, 3, 'yanto', 'Kurang'),
(7, 4, 'yanto', 'Cukup'),
(8, 6, 'yanto', 'Kurang'),
(9, 3, 'udin', 'Sangat Baik'),
(10, 4, 'udin', 'Cukup'),
(11, 6, 'udin', 'Kurang'),
(12, 3, 'raka', 'Cukup'),
(13, 4, 'raka', 'Cukup'),
(14, 6, 'raka', 'Cukup'),
(15, 3, 'dara', 'Cukup'),
(16, 4, 'dara', 'Baik'),
(17, 6, 'dara', 'Sangat Baik'),
(18, 3, 'wanda', 'Cukup'),
(19, 4, 'wanda', 'Kurang'),
(20, 6, 'wanda', 'Sangat Baik'),
(21, 3, 'Edo', 'Kurang'),
(22, 4, 'Edo', 'Sangat Kurang'),
(23, 6, 'Edo', 'Cukup'),
(24, 3, 'Faiz Fachrudin', 'Kurang'),
(25, 4, 'Faiz Fachrudin', 'Sangat Kurang'),
(26, 6, 'Faiz Fachrudin', 'Baik'),
(27, 3, 'renaldi', 'Baik'),
(28, 4, 'renaldi', 'Cukup'),
(29, 6, 'renaldi', 'Baik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jawaban_quiz_pelayanan`
--

CREATE TABLE `jawaban_quiz_pelayanan` (
  `id` int(11) NOT NULL,
  `id_quiz` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `jawaban` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jawaban_quiz_pelayanan`
--

INSERT INTO `jawaban_quiz_pelayanan` (`id`, `id_quiz`, `username`, `jawaban`) VALUES
(1, 1, 'Cilto', 'Sangat Baik'),
(2, 3, 'Cilto', 'Sangat Baik'),
(3, 4, 'Cilto', 'Sangat Baik'),
(4, 1, 'yanto', 'Cukup'),
(5, 3, 'yanto', 'Cukup'),
(6, 4, 'yanto', 'Cukup'),
(7, 1, 'udin', 'Sangat Baik'),
(8, 3, 'udin', 'Baik'),
(9, 4, 'udin', 'Cukup'),
(10, 1, 'raka', 'Cukup'),
(11, 3, 'raka', 'Cukup'),
(12, 4, 'raka', 'Cukup'),
(13, 1, 'dara', 'Sangat Baik'),
(14, 3, 'dara', 'Baik'),
(15, 4, 'dara', 'Cukup'),
(16, 1, 'wanda', 'Baik'),
(17, 3, 'wanda', 'Cukup'),
(18, 4, 'wanda', 'Kurang'),
(19, 1, 'Edo', 'Cukup'),
(20, 3, 'Edo', 'Cukup'),
(21, 4, 'Edo', 'Cukup'),
(22, 1, 'bambang', 'Kurang'),
(23, 3, 'bambang', 'Cukup'),
(24, 4, 'bambang', 'Sangat Kurang'),
(25, 1, 'Faiz Fachrudin', 'Kurang'),
(26, 3, 'Faiz Fachrudin', 'Cukup'),
(27, 4, 'Faiz Fachrudin', 'Baik'),
(28, 1, 'renaldi', 'Baik'),
(29, 3, 'renaldi', 'Baik'),
(30, 4, 'renaldi', 'Cukup'),
(31, 5, 'renaldi', 'Baik'),
(32, 1, 'superadmin', 'Kurang'),
(33, 3, 'superadmin', 'Cukup'),
(34, 4, 'superadmin', 'Baik'),
(35, 5, 'superadmin', 'Sangat Baik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `quiz_learn_daring`
--

CREATE TABLE `quiz_learn_daring` (
  `id_quiz` int(100) NOT NULL,
  `question` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `quiz_learn_daring`
--

INSERT INTO `quiz_learn_daring` (`id_quiz`, `question`) VALUES
(1, 'Menurut anda apakah pembelajaran daring itu efektif ?'),
(2, 'Menurut anda apakah bantuan kuota gratis dari pemerintah itu bermanfaat bagi Learn Via Daring ?'),
(4, 'Menurut anda apakah menggunakan aplikasi Google Meet sebagai media pembelajaran daring ini efektif ?'),
(5, 'Learning via darig membuat belajar jadi tidak maksimal ?');

-- --------------------------------------------------------

--
-- Struktur dari tabel `quiz_pandemi`
--

CREATE TABLE `quiz_pandemi` (
  `id_quiz` int(11) NOT NULL,
  `question` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `quiz_pandemi`
--

INSERT INTO `quiz_pandemi` (`id_quiz`, `question`) VALUES
(3, 'Bagaimana keaadan lingkungan kalian saat masa pandemi ini ?'),
(4, 'Bagaimana keaadan kampus saat masa pandemi ini menurut kalian ?'),
(6, 'apakah pandemi membuat perkembangan teknologi membaik ?');

-- --------------------------------------------------------

--
-- Struktur dari tabel `quiz_pelayanan`
--

CREATE TABLE `quiz_pelayanan` (
  `id_quiz` int(11) NOT NULL,
  `question` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `quiz_pelayanan`
--

INSERT INTO `quiz_pelayanan` (`id_quiz`, `question`) VALUES
(1, 'Menurut kalian bagian keuangan di kampus saat ini bagaimana ?'),
(3, 'Apakah keadaan pelayanan dikampus saat ini menurut kamu ?'),
(4, 'Apakah WiFi kampus mencukupi kebutuhan belajar mengajar anda ?'),
(5, 'Apakah fasilitas web spada cukup baik ?');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(100) NOT NULL,
  `NIM` varchar(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `fakultas` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `NIM`, `nama_lengkap`, `username`, `password`, `email`, `no_hp`, `jurusan`, `fakultas`, `role`) VALUES
(1, '', '', 'superadmin', '1234', '', '', '', '', 'Admin'),
(2, '', '', 'Cilto', 'Cilto', '', '', '', '', 'Mahasiswa'),
(3, '', '', 'yanto', 'yanto', '', '', '', '', 'Mahasiswa'),
(4, '', '', 'udin', 'udin', '', '', '', '', 'Mahasiswa'),
(5, '', '', 'raka', 'raka', '', '', '', '', 'Mahasiswa'),
(6, '', '', 'dara', 'dara', '', '', '', '', 'Mahasiswa'),
(7, '', '', 'wanda', 'wanda', '', '', '', '', 'Mahasiswa'),
(8, '', '', 'Edo', '123', '', '', '', '', 'Mahasiswa'),
(9, '', '', 'Bambang', 'bambang', '', '', '', '', 'Mahasiswa'),
(10, '11219058', '', 'Faiz Fachrudin', 'rudi', '', '', '', '', 'Mahasiswa'),
(11, '11222', '', 'renaldi', '1234567', '', '', '', '', 'Mahasiswa');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jawaban_quiz_learn_daring`
--
ALTER TABLE `jawaban_quiz_learn_daring`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jawaban_quiz_pandemi`
--
ALTER TABLE `jawaban_quiz_pandemi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jawaban_quiz_pelayanan`
--
ALTER TABLE `jawaban_quiz_pelayanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `quiz_learn_daring`
--
ALTER TABLE `quiz_learn_daring`
  ADD PRIMARY KEY (`id_quiz`);

--
-- Indeks untuk tabel `quiz_pandemi`
--
ALTER TABLE `quiz_pandemi`
  ADD PRIMARY KEY (`id_quiz`);

--
-- Indeks untuk tabel `quiz_pelayanan`
--
ALTER TABLE `quiz_pelayanan`
  ADD PRIMARY KEY (`id_quiz`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jawaban_quiz_learn_daring`
--
ALTER TABLE `jawaban_quiz_learn_daring`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `jawaban_quiz_pandemi`
--
ALTER TABLE `jawaban_quiz_pandemi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `jawaban_quiz_pelayanan`
--
ALTER TABLE `jawaban_quiz_pelayanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `quiz_learn_daring`
--
ALTER TABLE `quiz_learn_daring`
  MODIFY `id_quiz` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `quiz_pandemi`
--
ALTER TABLE `quiz_pandemi`
  MODIFY `id_quiz` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `quiz_pelayanan`
--
ALTER TABLE `quiz_pelayanan`
  MODIFY `id_quiz` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
