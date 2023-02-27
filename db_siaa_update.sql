-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2023 at 03:10 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

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
-- Table structure for table `alumni`
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
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`id`, `id_kegiatan`, `id_tp_lulus`, `al_img`, `id_siswa`, `password`, `file`, `telepon`, `alamat`) VALUES
(44, 4, 1, 'avatar.png', 4, '$2y$10$sUjhSKUcmJL5zJ9V17rPhOUekCUt.k/UhWB2Se2m7o/1.y9cr6uGq', 'image/png', '08124232222', 'Tanjungpinang'),
(45, 1, 1, NULL, 5, '$2y$10$FZfnhHVaYmXUEW2b6xoRzuS4RpAnWxTBg5uuSfv01EP/XRhKEKm4u', '', NULL, NULL),
(46, 1, 1, NULL, 6, '$2y$10$QfxR5RpZB9fxSaezZZTxE.tGA8d8512lcXwiWaZMJXfS/P.dxWfRm', '', NULL, NULL),
(47, 1, 1, NULL, 7, '$2y$10$Yj7mwpWwcWmZR9fTuSm6hu4F1xhEW141ub5jTq/8xlO8oo4WqatNq', '', NULL, NULL),
(48, 1, 1, NULL, 8, '$2y$10$kPxUBa7sQWEf/yKpKA23..gpP9hVQHTD8tKaC66tOudFGbjkCKoBW', '', NULL, NULL),
(49, 1, 1, NULL, 9, '$2y$10$7VudDAruDWUBH/RulicG1OE8Q8/0wze2dqbE5x6H4YtoK0JDBNsP2', '', NULL, NULL),
(50, 1, 1, NULL, 10, '$2y$10$t9CwSoBzIAGB6U4vroZ1qeESvU0IXb9d9AlwUVZSXeEUkAuK5Qdu2', '', NULL, NULL),
(51, 1, 1, NULL, 11, '$2y$10$ofz2wzpjTcDxpUGfxX8.Wu2ywVeSux9Ejbp/Vp9jW9N8oDTMvys4a', '', NULL, NULL),
(52, 1, 1, NULL, 12, '$2y$10$e6F8PGVeucPNQPvjOTGd5.yjsBgaCuB3v82UkL0BH3c5TencpvMdO', '', NULL, NULL),
(53, 1, 1, NULL, 13, '$2y$10$KOEIKJY9P6pLYqZs4iZeKO2mRIKOJm7E8r571M0eGlAol26.dsO96', '', NULL, NULL),
(54, 1, 1, NULL, 14, '$2y$10$vjnAN.DbL.9DPr9SwojfkOFGsxgfLKjmsuZPoQbXYhPeZxi95QO0.', '', NULL, NULL),
(55, 1, 1, NULL, 15, '$2y$10$bxC2eHECYyM77EFl9ERomO1qybCNg14A8PAhsLfsrPBU.mvYvPVXa', '', NULL, NULL),
(56, 1, 1, NULL, 16, '$2y$10$7bFI0PJRzJS9SkHHnD29XuTAkEY9eQzIMRKThEKqOwGUpUES09U66', '', NULL, NULL),
(57, 1, 1, NULL, 17, '$2y$10$0t8Vcq7ujGMR/33LJDxh5ObqGvZMtURed8kMmL4ROZNaIDUzSSafC', '', NULL, NULL),
(58, 1, 1, NULL, 18, '$2y$10$b13oMbd/aTczJimCZoxxzexSds4dN1t73lrSjbgqSbN.ZCfqO9Ksm', '', NULL, NULL),
(59, 1, 1, NULL, 19, '$2y$10$FapWWqKNJNfZqUU4dBwBXuS7jZ8icyH0y4simnBB4n.MRqvKGQ1eq', '', NULL, NULL),
(60, 1, 1, NULL, 20, '$2y$10$3vwG47e.b88Cilau/zgiJOgAJp4lgGgDVPMoJDlt.xpcx6FhIh586', '', NULL, NULL),
(61, 1, 1, NULL, 21, '$2y$10$etC1slIyRv0/TUhyF4SJhOTzZX1vjYcwx6gVhlZ8QzqxLx3Z2qpRK', '', NULL, NULL),
(62, 1, 1, NULL, 22, '$2y$10$oH0uxdI3YohV4dtrbWIwGuLVctqJNTLPj6ZA6NrapBg4C./6LWsqG', '', NULL, NULL),
(63, 1, 1, NULL, 23, '$2y$10$SaqaDhBSWwyC.g97NbNoj.ff7KtQhMwqoxatJ.GhNsHlJpEoMG4vi', '', NULL, NULL),
(64, 1, 1, NULL, 24, '$2y$10$fnPmkmHvx.an09dR3Wf1YO4c7l.Cm/YjdmD6Zw9wtxjUM3tHCf/XK', '', NULL, NULL),
(65, 1, 1, NULL, 25, '$2y$10$NyQPkkgiQimw.ddCs6r8eu6arTaLr0fmYnxTM1V4zCXRlNTTzGeBO', '', NULL, NULL),
(66, 1, 1, NULL, 26, '$2y$10$7cAGSbR4o7.vCSUhru1AKu/nQ8AcpKt.uPzb1hmskRETt/zGJFo56', '', NULL, NULL),
(67, 1, 1, NULL, 27, '$2y$10$Uk1SdK9SSJuwCCu0ya45xuyXnF.kpBWzxabkHUsZwDxfI7BKnxZCG', '', NULL, NULL),
(68, 1, 1, NULL, 28, '$2y$10$9/sciIKrGGAIUSz03BxImuH45GRjcCr3GTs9YExgN9e3m2O8hMt2C', '', NULL, NULL),
(69, 1, 1, NULL, 29, '$2y$10$b/Cnfr9A1Uza.0r9Og482ORP.6hzpPHtWzJR1irwbg9nD8q7DJmTu', '', NULL, NULL),
(70, 1, 1, NULL, 30, '$2y$10$eIUw/erO9nT4Jqr.AYOxe.ckuQ665SHBlPOiYud/0k3dTjk5J9uQe', '', NULL, NULL),
(71, 1, 1, NULL, 31, '$2y$10$mH35A5hNe5uP0IdCcOevv.0qRT9XbCECW.ltzZ5hHMYsMObexp.Sa', '', NULL, NULL),
(72, 1, 1, NULL, 32, '$2y$10$XpjSyeVuG9gQgctmndwRkO6DDu51E0koGaEHUenUI4NAwadzVgBGe', '', NULL, NULL),
(73, 1, 1, NULL, 33, '$2y$10$wOlSFS2FV/4aHxxHral3UOaQP5RpADaMr9QjoREDTEjdYtCXFdEUK', '', NULL, NULL),
(74, 1, 1, NULL, 34, '$2y$10$NKpYmx0UDKj5j3wgQVj4wOrtJQwPDobbxkAVXtYyWhAoCeuUDNcta', '', NULL, NULL),
(75, 1, 1, NULL, 35, '$2y$10$ps400ZvF/sZRej5jge7qMez3.Sr/udPoC/N7xdn7mo2t0OFcFN5tq', '', NULL, NULL),
(76, 1, 1, NULL, 36, '$2y$10$z66OWKrA8tHDZD/5Ck.NEe5Ylm1paoI2OgIssXZQfkNcR9WYSqEkO', '', NULL, NULL),
(77, 1, 1, NULL, 37, '$2y$10$f9ngzIQj09WxbSuvNEsE8.DzgStzVNYs1FMsQ1PLDZEcgIGH3p2zq', '', NULL, NULL),
(78, 1, 1, NULL, 38, '$2y$10$YrZCaw51Nv88CuiHMZJNDOcMVU8ELgkOy0b10ipu8MFULXgmE1zH6', '', NULL, NULL),
(79, 1, 1, NULL, 39, '$2y$10$n7k21aKj.ISKvf7zUpJFReZjUau4TPkrhnjFpBM7jgPcDU8xDlGAu', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` int(11) NOT NULL,
  `nama_kegiatan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `nama_kegiatan`) VALUES
(1, 'Kuliah'),
(2, 'Bekerja'),
(3, 'Belum Bekerja'),
(4, 'Mencari Pekerjaan');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan_alumni`
--

CREATE TABLE `kegiatan_alumni` (
  `id` int(11) NOT NULL,
  `id_alumni` int(11) NOT NULL,
  `id_kegiatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `nama_kelas` varchar(200) NOT NULL,
  `fase` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`, `fase`) VALUES
(1, 'X1', 'E'),
(2, 'X2', 'E'),
(3, 'X3', 'E'),
(4, 'X4', 'E'),
(5, 'XII IPA 1', '-'),
(6, 'XII IPA 2', '-'),
(7, 'XII IPS 1', '-'),
(8, 'XII IPS 2', '-');

-- --------------------------------------------------------

--
-- Table structure for table `kelas_siswa`
--

CREATE TABLE `kelas_siswa` (
  `id` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas_siswa`
--

INSERT INTO `kelas_siswa` (`id`, `id_siswa`, `id_kelas`) VALUES
(24, 4, 5),
(25, 5, 5),
(26, 6, 5),
(27, 7, 5),
(28, 8, 5),
(29, 9, 5),
(30, 10, 5),
(31, 11, 5),
(32, 12, 5),
(33, 13, 5),
(34, 14, 5),
(35, 15, 5),
(36, 16, 5),
(37, 17, 5),
(38, 18, 5),
(39, 19, 5),
(40, 20, 5),
(41, 21, 5),
(42, 22, 5),
(43, 23, 5),
(44, 24, 5),
(45, 25, 5),
(46, 26, 5),
(47, 27, 5),
(48, 28, 5),
(49, 29, 5),
(50, 30, 5),
(51, 31, 5),
(52, 32, 5),
(53, 33, 5),
(54, 34, 5),
(55, 35, 5),
(56, 36, 5),
(57, 37, 5),
(58, 38, 5),
(59, 39, 5);

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan`
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
-- Dumping data for table `pekerjaan`
--

INSERT INTO `pekerjaan` (`id`, `nama_instansi`, `jabatan`, `nama_atasan`, `alamat_instansi`, `no_telepon`, `id_siswa`, `tahun_masuk`, `keterangan`) VALUES
(4, '4', '4', 'f', 'f', '42', 4, 432, '');

-- --------------------------------------------------------

--
-- Table structure for table `peminatan`
--

CREATE TABLE `peminatan` (
  `id` int(11) NOT NULL,
  `nama_peminatan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminatan`
--

INSERT INTO `peminatan` (`id`, `nama_peminatan`) VALUES
(1, 'IPA'),
(2, 'IPS'),
(3, 'Bahasa');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
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
  `tahun_masuk` int(11) DEFAULT NULL,
  `tahun_lulus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
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
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nis`, `nisn`, `id_tp_masuk`, `nama_lengkap`, `asal_sekolah`, `img`, `nama_ayah`, `nama_ibu`, `nama_wali`, `alamat`, `telepon`, `id_status`, `id_peminatan`) VALUES
(4, '5519', '5519', 2, 'ADRIAN DESTRATAMA MAULANA AKBAR', '', '', NULL, NULL, NULL, NULL, NULL, 2, 1),
(5, '5656', '5656', 2, 'AKBAR ZIDAN SYAHPUTRA', '', '', NULL, NULL, NULL, NULL, NULL, 2, 1),
(6, '5526', '5526', 2, 'AMELIA HANI AZANI', '', '', NULL, NULL, NULL, NULL, NULL, 2, 1),
(7, '5528', '5528', 2, 'ANDI FERDI SUGARA', '', '', NULL, NULL, NULL, NULL, NULL, 2, 1),
(8, '5534', '5534', 2, 'ARY SUBAKTI', '', '', NULL, NULL, NULL, NULL, NULL, 2, 1),
(9, '5536', '5536', 2, 'ATIKA ATSARI', '', '', NULL, NULL, NULL, NULL, NULL, 2, 1),
(10, '5537', '5537', 2, 'ATIKA MEILATINA HUSNA', '', '', NULL, NULL, NULL, NULL, NULL, 2, 1),
(11, '5539', '5539', 2, 'AULIA RAMADHANI', '', '', NULL, NULL, NULL, NULL, NULL, 2, 1),
(12, '5541', '5541', 2, 'AURA PUTRI JANUAR', '', '', NULL, NULL, NULL, NULL, NULL, 2, 1),
(13, '5547', '5547', 2, 'DAMIEN DELANO SIHOMBING', '', '', NULL, NULL, NULL, NULL, NULL, 2, 1),
(14, '5550', '5550', 2, 'DIAN RAHMAYUNI', '', '', NULL, NULL, NULL, NULL, NULL, 2, 1),
(15, '5554', '5554', 2, 'DWI SETIYANI', '', '', NULL, NULL, NULL, NULL, NULL, 2, 1),
(16, '5558', '5558', 2, 'ENCIK FEBRI ANNASRIL', '', '', NULL, NULL, NULL, NULL, NULL, 2, 1),
(17, '5561', '5561', 2, 'FAHDA AULIA ZULKARNAEN', '', '', NULL, NULL, NULL, NULL, NULL, 2, 1),
(18, '5563', '5563', 2, 'FERNANDA PRATAMA PUTRA', '', '', NULL, NULL, NULL, NULL, NULL, 2, 1),
(19, '5567', '5567', 2, 'HARIDATUL BAHIYA', '', '', NULL, NULL, NULL, NULL, NULL, 2, 1),
(20, '5821', '5821', 2, 'JHON PAUL GILBERT MARBUN', '', '', NULL, NULL, NULL, NULL, NULL, 2, 1),
(21, '5577', '5577', 2, 'LEONARDO', '', '', NULL, NULL, NULL, NULL, NULL, 2, 1),
(22, '5580', '5580', 2, 'M. SIGIT ADYTIA PRATAMA', '', '', NULL, NULL, NULL, NULL, NULL, 2, 1),
(23, '6590', '6590', 2, 'MUHAMMAD AKBAR ILLYAS', '', '', NULL, NULL, NULL, NULL, NULL, 2, 1),
(24, '5598', '5598', 2, 'MUHAMMAD NUR HAKIM', '', '', NULL, NULL, NULL, NULL, NULL, 2, 1),
(25, '5601', '5601', 2, 'NADIEF NARAYAN TANJUNG', '', '', NULL, NULL, NULL, NULL, NULL, 2, 1),
(26, '5602', '5602', 2, 'NAJWA AMELIA ARBEN', '', '', NULL, NULL, NULL, NULL, NULL, 2, 1),
(27, '5604', '5604', 2, 'NAUFAL RIZQULLAH', '', '', NULL, NULL, NULL, NULL, NULL, 2, 1),
(28, '5609', '5609', 2, 'OKTA RAMADHAN', '', '', NULL, NULL, NULL, NULL, NULL, 2, 1),
(29, '5611', '5611', 2, 'PRADYA ALYA WARDANA', '', '', NULL, NULL, NULL, NULL, NULL, 2, 1),
(30, '5613', '5613', 2, 'PUTERI NUR FHIRYYAL', '', '', NULL, NULL, NULL, NULL, NULL, 2, 1),
(31, '5617', '5617', 2, 'RAISSA SYAHRINA DESMARIANTI', '', '', NULL, NULL, NULL, NULL, NULL, 2, 1),
(32, '5621', '5621', 2, 'REISKY RIAN YUNANDA', '', '', NULL, NULL, NULL, NULL, NULL, 2, 1),
(33, '5626', '5626', 2, 'RIDHO PRATAMA', '', '', NULL, NULL, NULL, NULL, NULL, 2, 1),
(34, '5657', '5657', 2, 'RIZKIA SYAH PUTRI', '', '', NULL, NULL, NULL, NULL, NULL, 2, 1),
(35, '5638', '5638', 2, 'SITI KHOIRIYYAH', '', '', NULL, NULL, NULL, NULL, NULL, 2, 1),
(36, '5644', '5644', 2, 'SYAZALIA RIFA NUR AE\'N', '', '', NULL, NULL, NULL, NULL, NULL, 2, 1),
(37, '5645', '5645', 2, 'TESSYA ADWINA IPRIANI', '', '', NULL, NULL, NULL, NULL, NULL, 2, 1),
(38, '5652', '5652', 2, 'ZAHWA IRSANDA', '', '', NULL, NULL, NULL, NULL, NULL, 2, 1),
(39, '5653', '5653', 2, 'ZHAKKY ARDIANSYAH AHMAD', '', '', NULL, NULL, NULL, NULL, NULL, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `nama_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `nama_status`) VALUES
(1, 'Aktif'),
(2, 'Lulus'),
(3, 'Pindah'),
(4, 'Berhenti'),
(5, 'Meninggal Dunia');

-- --------------------------------------------------------

--
-- Table structure for table `tp`
--

CREATE TABLE `tp` (
  `id` int(11) NOT NULL,
  `tahun_pelajaran` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tp`
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
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alumni_ibfk_1` (`id_kegiatan`),
  ADD KEY `alumni_ibfk_2` (`id_tp_lulus`),
  ADD KEY `alumni_ibfk_3` (`id_siswa`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan_alumni`
--
ALTER TABLE `kegiatan_alumni`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_alumni` (`id_alumni`),
  ADD KEY `id_kegiatan` (`id_kegiatan`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pekerjaan_ibfk_1` (`id_siswa`);

--
-- Indexes for table `peminatan`
--
ALTER TABLE `peminatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pendidikan_ibfk_1` (`id_siswa`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nis` (`nis`),
  ADD UNIQUE KEY `nisn` (`nisn`),
  ADD KEY `siswa_ibfk_1` (`id_status`),
  ADD KEY `id_peminatan` (`id_peminatan`),
  ADD KEY `id_tp_masuk` (`id_tp_masuk`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tp`
--
ALTER TABLE `tp`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alumni`
--
ALTER TABLE `alumni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kegiatan_alumni`
--
ALTER TABLE `kegiatan_alumni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `peminatan`
--
ALTER TABLE `peminatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tp`
--
ALTER TABLE `tp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alumni`
--
ALTER TABLE `alumni`
  ADD CONSTRAINT `alumni_ibfk_1` FOREIGN KEY (`id_kegiatan`) REFERENCES `kegiatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alumni_ibfk_2` FOREIGN KEY (`id_tp_lulus`) REFERENCES `tp` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alumni_ibfk_3` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kegiatan_alumni`
--
ALTER TABLE `kegiatan_alumni`
  ADD CONSTRAINT `kegiatan_alumni_ibfk_1` FOREIGN KEY (`id_alumni`) REFERENCES `alumni` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kegiatan_alumni_ibfk_2` FOREIGN KEY (`id_kegiatan`) REFERENCES `kegiatan` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  ADD CONSTRAINT `kelas_siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kelas_siswa_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD CONSTRAINT `pekerjaan_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD CONSTRAINT `pendidikan_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_status`) REFERENCES `status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`id_peminatan`) REFERENCES `peminatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa_ibfk_3` FOREIGN KEY (`id_tp_masuk`) REFERENCES `tp` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
