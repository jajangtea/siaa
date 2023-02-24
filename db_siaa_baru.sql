-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Feb 2023 pada 04.46
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_siaa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alumni`
--

CREATE TABLE `alumni` (
  `id` int(11) NOT NULL,
  `id_kegiatan` int(11) DEFAULT NULL,
  `id_tp_lulus` int(11) DEFAULT NULL,
  `al_img` varchar(150) DEFAULT NULL,
  `id_siswa` int(11) NOT NULL,
  `password` varchar(200) DEFAULT NULL,
  `file` varchar(200) NOT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `alamat` tinytext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `alumni`
--

INSERT INTO `alumni` (`id`, `id_kegiatan`, `id_tp_lulus`, `al_img`, `id_siswa`, `password`, `file`, `telepon`, `alamat`) VALUES
(27, 1, 1, NULL, 3, NULL, '', NULL, NULL),
(28, 1, 1, 'coba.png', 1, '$2y$10$GJEHrT7QD5fIM/UJ39yyAeVpXDVEZTGIa9kwoEC/cGZapkAeSexjK', '', '63454543', 'jl.Jalan'),
(29, 1, 1, 'coba.png', 3, NULL, 'image/png', NULL, NULL),
(30, NULL, NULL, NULL, 3, '$2y$10$GJEHrT7QD5fIM/UJ39yyAeVpXDVEZTGIa9kwoEC/cGZapkAeSexjK', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` int(11) NOT NULL,
  `nama_kegiatan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `nama_kegiatan`) VALUES
(1, 'Kuliah'),
(2, 'Bekerja'),
(3, 'Belum Bekerja'),
(4, 'Mencari Pekerjaan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan_alumni`
--

CREATE TABLE `kegiatan_alumni` (
  `id` int(11) NOT NULL,
  `id_alumni` int(11) NOT NULL,
  `id_kegiatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `nama_kelas` varchar(200) NOT NULL,
  `fase` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`, `fase`) VALUES
(1, 'X1', 'E'),
(2, 'X2', 'E'),
(3, 'X3', 'E'),
(4, 'X4', 'E');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas_siswa`
--

CREATE TABLE `kelas_siswa` (
  `id` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kelas_siswa`
--

INSERT INTO `kelas_siswa` (`id`, `id_siswa`, `id_kelas`) VALUES
(20, 1, 1),
(21, 3, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `id` int(11) NOT NULL,
  `nama_instansi` varchar(250) NOT NULL,
  `jabatan` varchar(200) NOT NULL,
  `nama_atasan` varchar(200) NOT NULL,
  `alamat_instansi` tinytext NOT NULL,
  `no_telepon` varchar(100) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `tahun_masuk` int(11) DEFAULT NULL,
  `keterangan` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pekerjaan`
--

INSERT INTO `pekerjaan` (`id`, `nama_instansi`, `jabatan`, `nama_atasan`, `alamat_instansi`, `no_telepon`, `id_siswa`, `tahun_masuk`, `keterangan`) VALUES
(1, 'SMAN 5 TANJUNGPINANG', 'GURU', 'SAYA', 'JL. AGUSSALIM TEPI LAUT', '0771-54344445', 1, NULL, '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminatan`
--

CREATE TABLE `peminatan` (
  `id` int(11) NOT NULL,
  `nama_peminatan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `peminatan`
--

INSERT INTO `peminatan` (`id`, `nama_peminatan`) VALUES
(1, 'IPA'),
(2, 'IPS'),
(3, 'Bahasa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id` int(11) NOT NULL,
  `nama_kampus` varchar(200) NOT NULL,
  `fakultas` varchar(200) NOT NULL,
  `program_studi` varchar(100) NOT NULL,
  `jenjang` varchar(20) NOT NULL,
  `alamat_kampus` tinytext NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `tahun_masuk` int(11) NOT NULL,
  `tahun_lulus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pendidikan`
--

INSERT INTO `pendidikan` (`id`, `nama_kampus`, `fakultas`, `program_studi`, `jenjang`, `alamat_kampus`, `no_telepon`, `id_siswa`, `keterangan`, `tahun_masuk`, `tahun_lulus`) VALUES
(1, 'SEKOLAH TINGGI TEKNOLOGI INDONESIA TANJUNGPINANG', '-', 'TEKNIK INFORMATIKA', 'Sarjana', 'Jalan Brigjend Katamso Km. 2,5 Tanjungpinang', '07714243233', 1, NULL, 1, 4),
(2, 'SEKOLAH TINGGI ILMU EKONOMI', '-', 'AKUNTANSI', 'Sarjana', 'Jalan D.I Panjaitan Km. 5 Tanjungpinang', '07714243233', 1, NULL, 1, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nis` varchar(50) NOT NULL,
  `nisn` varchar(50) NOT NULL,
  `id_tp_masuk` int(11) DEFAULT NULL,
  `nama_lengkap` varchar(250) NOT NULL,
  `asal_sekolah` varchar(200) NOT NULL,
  `img` varchar(150) NOT NULL,
  `nama_ayah` varchar(250) DEFAULT NULL,
  `nama_ibu` varchar(250) DEFAULT NULL,
  `nama_wali` varchar(250) DEFAULT NULL,
  `alamat` tinytext DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `id_status` int(11) NOT NULL,
  `id_peminatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `nis`, `nisn`, `id_tp_masuk`, `nama_lengkap`, `asal_sekolah`, `img`, `nama_ayah`, `nama_ibu`, `nama_wali`, `alamat`, `telepon`, `id_status`, `id_peminatan`) VALUES
(1, '6876687', '7878', 4, 'Joko', 'SMP 5 Tanjungpinang', '', 'Ayah Joko', 'Ibu Joko', 'Wali Joko', 'PERM.LEMBAH ASRI BLOK A6 NO.10 RT.003 RW.008\nKEL.BATU IX KECAMATAN.TANJUNGPINANG TIMUR', '081391927475', 2, 1),
(3, '76557', '6546456', 4, 'Jono', 'SMP 5 Tanjungpinang', '', 'Ayah Jono', 'Ibu Jono', 'Wali Jono', 'PERM.LEMBAH ASRI BLOK A6 NO.10 RT.003 RW.008\nKEL.BATU IX KECAMATAN.TANJUNGPINANG TIMUR', '0812323233333', 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `nama_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`id`, `nama_status`) VALUES
(1, 'Aktif'),
(2, 'Lulus'),
(3, 'Pindah'),
(4, 'Berhenti'),
(5, 'Meninggal Dunia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tp`
--

CREATE TABLE `tp` (
  `id` int(11) NOT NULL,
  `tahun_pelajaran` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tp`
--

INSERT INTO `tp` (`id`, `tahun_pelajaran`) VALUES
(1, '2019/2020'),
(2, '2020/2021'),
(3, '2021/2022'),
(4, '2022/2023'),
(5, '2023/2024');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alumni_ibfk_1` (`id_kegiatan`),
  ADD KEY `alumni_ibfk_2` (`id_tp_lulus`),
  ADD KEY `alumni_ibfk_3` (`id_siswa`);

--
-- Indeks untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kegiatan_alumni`
--
ALTER TABLE `kegiatan_alumni`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_alumni` (`id_alumni`),
  ADD KEY `id_kegiatan` (`id_kegiatan`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indeks untuk tabel `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pekerjaan_ibfk_1` (`id_siswa`);

--
-- Indeks untuk tabel `peminatan`
--
ALTER TABLE `peminatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tahun_masuk` (`tahun_masuk`),
  ADD KEY `tahun_lulus` (`tahun_lulus`),
  ADD KEY `pendidikan_ibfk_1` (`id_siswa`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nis` (`nis`),
  ADD UNIQUE KEY `nisn` (`nisn`),
  ADD KEY `siswa_ibfk_1` (`id_status`),
  ADD KEY `id_peminatan` (`id_peminatan`),
  ADD KEY `id_tp_masuk` (`id_tp_masuk`);

--
-- Indeks untuk tabel `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tp`
--
ALTER TABLE `tp`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alumni`
--
ALTER TABLE `alumni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kegiatan_alumni`
--
ALTER TABLE `kegiatan_alumni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `peminatan`
--
ALTER TABLE `peminatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tp`
--
ALTER TABLE `tp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `alumni`
--
ALTER TABLE `alumni`
  ADD CONSTRAINT `alumni_ibfk_1` FOREIGN KEY (`id_kegiatan`) REFERENCES `kegiatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alumni_ibfk_2` FOREIGN KEY (`id_tp_lulus`) REFERENCES `tp` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alumni_ibfk_3` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kegiatan_alumni`
--
ALTER TABLE `kegiatan_alumni`
  ADD CONSTRAINT `kegiatan_alumni_ibfk_1` FOREIGN KEY (`id_alumni`) REFERENCES `alumni` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kegiatan_alumni_ibfk_2` FOREIGN KEY (`id_kegiatan`) REFERENCES `kegiatan` (`id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  ADD CONSTRAINT `kelas_siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kelas_siswa_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD CONSTRAINT `pekerjaan_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD CONSTRAINT `pendidikan_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id`),
  ADD CONSTRAINT `pendidikan_ibfk_2` FOREIGN KEY (`tahun_masuk`) REFERENCES `tp` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pendidikan_ibfk_3` FOREIGN KEY (`tahun_lulus`) REFERENCES `tp` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_status`) REFERENCES `status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`id_peminatan`) REFERENCES `peminatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa_ibfk_3` FOREIGN KEY (`id_tp_masuk`) REFERENCES `tp` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
