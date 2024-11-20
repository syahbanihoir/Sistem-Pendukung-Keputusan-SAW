-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jun 2023 pada 15.43
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_bersih_kasus_dbd`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `kdkecamatan` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`kdkecamatan`, `kecamatan`) VALUES
('317401', 'Tebet'),
('317402', 'Setia Budi'),
('317403', 'Mampang Prapatan'),
('317404', 'Pasar Minggu'),
('317405', 'Kebayoran Lama'),
('317406', 'Cilandak '),
('317407', 'Kebayoran Baru'),
('317408', 'Pancoran'),
('317409', 'Jagakarsa'),
('317410', 'Pesanggrahan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelurahan`
--

CREATE TABLE `kelurahan` (
  `kdkelurahan` varchar(255) NOT NULL,
  `kdkecamatan` varchar(255) NOT NULL,
  `kelurahan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kelurahan`
--

INSERT INTO `kelurahan` (`kdkelurahan`, `kdkecamatan`, `kelurahan`) VALUES
('1001', '317410', 'Pesanggrahan'),
('1002', '317410', 'Bintaro'),
('1003', '317410', 'Petukangan Utara'),
('1004', '317410', 'Petukangan Selatan'),
('1005', '317410', 'Ulujami'),
('1006', '317409', 'Ciganjur'),
('1007', '317409', 'Cipedak'),
('1008', '317409', 'Jagakarsa'),
('1009', '317409', 'Lenteng Agung'),
('1010', '317409', 'Srengseng Sawah'),
('1011', '317409', 'Tanjung Barat'),
('1012', '317407', 'Cipete Utara'),
('1013', '317407', 'Gandaria Utara'),
('1014', '317407', 'Gunung'),
('1015', '317407', 'Kramat Pela'),
('1016', '317407', 'Melawai'),
('1017', '317407', 'Petogogan'),
('1018', '317407', 'Pulo'),
('1019', '317407', 'Rawa Barat'),
('1020', '317407', 'Selong'),
('1021', '317407', 'Senayan'),
('1022	\r\n', '317404', 'Cilandak Timur'),
('1023', '317404', 'Jatipadang'),
('1024', '317404', 'Kebagusan'),
('1025', '317404', 'Pasar Minggu'),
('1026', '317404', 'Pejaten Barat'),
('1027', '317404', 'Pejaten Timur'),
('1028', '317404', 'Ragunan'),
('1029', '317405', 'Cipulir'),
('1030', '317405', 'Grogol Selatan'),
('1031', '317405', 'Grogol Utara'),
('1032', '317405', 'Kebayoran Lama Selatan'),
('1033', '317405', 'Kebayoran Lama Utara'),
('1034', '317405', 'Pondok Pinang'),
('1035', '317408', 'Cikoko'),
('1036', '317408', 'Duren Tiga'),
('1037', '317408', 'Kalibata'),
('1038', '317408', 'Pancoran'),
('1039', '317408', 'Pengadegan'),
('1040', '317408', 'Rawajati'),
('1041', '317403', 'Bangka'),
('1042', '317403', 'Kuningan Barat'),
('1043', '317403', 'Mampang Prapatan'),
('1044', '317403', 'Pela Mampang'),
('1045', '317403', 'Tegal Parang'),
('1046', '317401', 'Bukit Duri'),
('1047', '317401', 'Kebon Baru'),
('1048', '317401', 'Manggarai'),
('1049', '317401', 'Manggarai Selatan'),
('1050', '317401', 'Menteng Dalam'),
('1051', '317401', 'Tebet Barat'),
('1052', '317401', 'Tebet Timur'),
('1053', '317406', 'Cilandak Barat'),
('1054', '317406', 'Cipete Selatan'),
('1055', '317406', 'Gandaria Selatan'),
('1056', '317406', 'Lebak Bulus'),
('1057', '317406', 'Pondok Labu'),
('1058', '317402', 'Guntur'),
('1059', '317402', 'Karet'),
('1060', '317402', 'Karet Kuningan'),
('1061', '317402', 'Karet Semanggi'),
('1062', '317402', 'Kuningan Timur'),
('1063', '317402', 'Menteng Atas'),
('1064', '317402', 'Pasar Manggis'),
('1065', '317402', 'Setia Budi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` varchar(50) NOT NULL,
  `namakriteria` varchar(255) NOT NULL,
  `bobot` int(50) NOT NULL,
  `sifat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `namakriteria`, `bobot`, `sifat`) VALUES
('C1', 'jumlah anggota keluarga dalam 1 (satu) rumah', 5, 'benefit'),
('C2', 'pendidikan kepala keluarga', 10, 'cost'),
('C3', 'jumlah anggota keluarga masih sekolah', 15, 'benefit'),
('C4', 'pengeluaran satu jiwa dalam keluarga', 15, 'benefit'),
('C5', 'penghasilan satu jiwa dalam keluarga per bulan', 20, 'cost'),
('C6', 'status kepemilikan rumah', 10, 'cost'),
('C7', 'Sumber air bersih', 15, 'cost'),
('C8', 'transportasi', 10, 'cost');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_kriteria`
--

CREATE TABLE `nilai_kriteria` (
  `idnilai_kriteria` int(50) NOT NULL,
  `id_kriteria` varchar(50) NOT NULL,
  `subkriteria` varchar(255) NOT NULL,
  `nilai` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `nilai_kriteria`
--

INSERT INTO `nilai_kriteria` (`idnilai_kriteria`, `id_kriteria`, `subkriteria`, `nilai`) VALUES
(1, 'C1', '>5 orang', 4),
(2, 'C1', '4 orang', 3),
(3, 'C1', '3 orang', 2),
(4, 'C1', '1-2 orang', 1),
(5, 'C2', 'Tidak sekolah/tidak tamat sd', 1),
(6, 'C2', 'SD', 2),
(7, 'C2', 'SMP', 3),
(8, 'C2', 'Sma/SMK/PT', 4),
(9, 'C3', '>3 orang', 4),
(10, 'C3', '2 orang', 3),
(11, 'C3', '1 orang', 2),
(12, 'C3', 'Tidak ada', 1),
(13, 'C4', '<1Juta', 1),
(14, 'C4', '1 juta - 2.5 juta', 2),
(15, 'C4', '2.5 juta  - 4 juta', 3),
(16, 'C4', '> 4 juta', 4),
(17, 'C5', '< 1 juta', 1),
(18, 'C5', '1 juta - 2.5 juta', 2),
(19, 'C5', '2.5 juta - 4 juta', 3),
(20, 'C5', '> 4 juta', 4),
(21, 'C6', 'margesari/pakai gratis', 1),
(22, 'C6', 'Sewa ', 2),
(23, 'C6', 'Milik orang tua / warisan', 3),
(24, 'C6', 'Milik sendiri', 4),
(25, 'C7', 'Sumur milik tetangga', 1),
(26, 'C7', 'Sumur Milik Sendiri', 2),
(27, 'C7', 'PDAM Terbatas', 3),
(28, 'C7', 'PDAM Bebas / Air Kemasan', 4),
(29, 'C8', 'Jalan Kaki / Sepeda', 1),
(30, 'C8', 'Tranportasi Umum', 2),
(31, 'C8', 'Motor', 3),
(32, 'C8', 'Mobil', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_matrik`
--

CREATE TABLE `tbl_matrik` (
  `id_matrik` int(16) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `kriteria1_jml_anggota_keluarga` int(11) NOT NULL,
  `kriteria2_pendidikan_kepala_keluarga` int(11) NOT NULL,
  `kriteria3_jml_anggotakeluarga_sekolah` int(11) NOT NULL,
  `kriteria4_pengeluaran_satu_jiwa` int(11) NOT NULL,
  `kriteria5_penghasilan_satu_jiwa` int(11) NOT NULL,
  `kriteria6_status_rumah` int(11) NOT NULL,
  `kriteria7_sumber_airbersih` int(11) NOT NULL,
  `kriteria8_transportasi` int(11) NOT NULL,
  `total_nilai` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tbl_matrik`
--

INSERT INTO `tbl_matrik` (`id_matrik`, `nik`, `kriteria1_jml_anggota_keluarga`, `kriteria2_pendidikan_kepala_keluarga`, `kriteria3_jml_anggotakeluarga_sekolah`, `kriteria4_pengeluaran_satu_jiwa`, `kriteria5_penghasilan_satu_jiwa`, `kriteria6_status_rumah`, `kriteria7_sumber_airbersih`, `kriteria8_transportasi`, `total_nilai`) VALUES
(1, '3174050709030005', 3, 4, 3, 3, 4, 2, 1, 3, 0.88),
(2, '3174050711030003', 1, 4, 2, 3, 4, 4, 2, 3, 0.69),
(3, '3174052207010003 ', 3, 4, 2, 3, 4, 4, 3, 4, 0.66),
(4, '3174055507100001 ', 4, 4, 3, 3, 4, 4, 2, 3, 0.76),
(5, '3174056206020006 ', 3, 4, 3, 3, 4, 2, 2, 3, 0.8),
(6, '3174055606031001', 2, 3, 2, 3, 3, 2, 1, 3, 0.9),
(7, '3174054810190002 ', 2, 4, 2, 3, 3, 4, 2, 3, 0.75),
(8, '3174051502030008', 4, 4, 4, 3, 4, 2, 1, 3, 0.93),
(9, '3174051103101005', 3, 4, 3, 3, 4, 2, 1, 3, 0.88),
(10, '3174052701101002 ', 4, 4, 4, 3, 4, 3, 2, 3, 0.82),
(11, '3174056112000008', 3, 4, 3, 3, 4, 4, 2, 4, 0.73);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_warga`
--

CREATE TABLE `tbl_warga` (
  `nik` varchar(255) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kelurahan` varchar(50) NOT NULL,
  `tahun` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tbl_warga`
--

INSERT INTO `tbl_warga` (`nik`, `nama`, `kecamatan`, `kelurahan`, `tahun`) VALUES
('3174050709030005', 'Septian Ardiyansyah ', 'Kebayoran Lama', 'Kebayoran Lama Selatan', '2023'),
('3174050711030003', 'Rafi Syahrialdi Ramadhani', 'Kebayoran Lama', 'Kebayoran Lama Selatan', '2023'),
('3174052207010003 ', 'Faqih Alfarizi Azra ', 'Kebayoran Lama', 'Kebayoran Lama Selatan', '2023'),
('3174055507100001 ', 'Zulfarafida Syakira Nur', 'Kebayoran Lama', 'Kebayoran Lama Selatan', '2023'),
('3174056206020006 ', 'Fania Ambar Wanti ', 'Kebayoran Lama', 'Kebayoran Lama Selatan', '2023'),
('3174055606031001', 'Irma Widya', 'Kebayoran Lama', 'Kebayoran Lama Selatan', '2023'),
('3174054810190002 ', 'Shazia Nafeeza Al Mahyra', 'Kebayoran Lama', 'Cipulir', '2023'),
('3174051502030008', 'Ghazirah Answan', 'Kebayoran Lama', 'Cipulir', '2023'),
('3174051103101005', 'Farhan Sabarizi', 'Kebayoran Lama', 'Cipulir', '2023'),
('3174052701101002 ', 'Atthariq Jovian Salim', 'Kebayoran Lama', 'Cipulir', '2023'),
('3174056112000008', 'Delillah ', 'Kebayoran Lama', 'Cipulir', '2023');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `username` varchar(10) NOT NULL,
  `katasandi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `katasandi`) VALUES
('admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`kdkecamatan`);

--
-- Indeks untuk tabel `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`kdkelurahan`),
  ADD KEY `kdkecamatan` (`kdkecamatan`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indeks untuk tabel `nilai_kriteria`
--
ALTER TABLE `nilai_kriteria`
  ADD PRIMARY KEY (`idnilai_kriteria`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indeks untuk tabel `tbl_matrik`
--
ALTER TABLE `tbl_matrik`
  ADD PRIMARY KEY (`id_matrik`);

--
-- Indeks untuk tabel `tbl_warga`
--
ALTER TABLE `tbl_warga`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `nilai_kriteria`
--
ALTER TABLE `nilai_kriteria`
  MODIFY `idnilai_kriteria` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `tbl_matrik`
--
ALTER TABLE `tbl_matrik`
  MODIFY `id_matrik` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD CONSTRAINT `kelurahan_ibfk_1` FOREIGN KEY (`kdkecamatan`) REFERENCES `kecamatan` (`kdkecamatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nilai_kriteria`
--
ALTER TABLE `nilai_kriteria`
  ADD CONSTRAINT `nilai_kriteria_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
