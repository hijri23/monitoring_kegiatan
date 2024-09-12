-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 12 Sep 2024 pada 03.23
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arsip_kita`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_nama` varchar(50) NOT NULL,
  `admin_username` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  `admin_foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_nama`, `admin_username`, `admin_password`, `admin_foto`) VALUES
(1, 'Administrator', 'admin', '0192023a7bbd73250516f069df18b500', '1471275613_Screen Shot 2019-10-11 at 16.26.42.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `arsip`
--

CREATE TABLE `arsip` (
  `arsip_id` int(11) NOT NULL,
  `arsip_waktu_upload` datetime NOT NULL,
  `arsip_petugas` int(11) NOT NULL,
  `arsip_kode` varchar(50) NOT NULL,
  `arsip_nama` varchar(100) NOT NULL,
  `arsip_jenis` varchar(50) NOT NULL,
  `arsip_kategori` int(11) NOT NULL,
  `arsip_keterangan` text NOT NULL,
  `arsip_file` varchar(255) NOT NULL,
  `tanggal_arsip` date DEFAULT NULL,
  `arsip_status` varchar(50) NOT NULL,
  `arsip_pesan` varchar(255) NOT NULL,
  `arsip_cek` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `arsip`
--

INSERT INTO `arsip` (`arsip_id`, `arsip_waktu_upload`, `arsip_petugas`, `arsip_kode`, `arsip_nama`, `arsip_jenis`, `arsip_kategori`, `arsip_keterangan`, `arsip_file`, `tanggal_arsip`, `arsip_status`, `arsip_pesan`, `arsip_cek`) VALUES
(4, '2023-07-02 17:02:16', 5, 'NK-A-02', 'Surat Izin Pelaksanaan Kegiatan', 'pdf', 4, 'Surat Izin Pelaksanaan kegiatan workshop bulan Mei 2023', '1352467019_c4611_sample_explain.pdf', '2023-06-20', 'sudah disetujui', 'Sudah sesuai', 'sudah dicek'),
(6, '2023-07-04 17:03:37', 5, 'NK-A-04', 'Surat Kesehatan Pegawai', 'pdf', 7, 'Surat Kesehatan Pegawai untuk pelaksana kerja', '1651167980_instructions-for-adding-your-logo.pdf', '2023-05-31', 'perlu perbaikan', 'perbaiki pada informasi metadata', 'sudah dicek'),
(7, '2023-07-01 17:04:30', 5, 'K-A-05', 'SPK Proyek Kontrak', 'pdf', 5, 'SPK Proyek Kontrak pada bulan Mei 2023', '142845393_OoPdfFormExample.pdf', '2023-05-16', 'perlu perbaikan', 'Tambahkan informasi tahun pada keterangan', 'sudah dicek'),
(8, '2023-07-01 17:05:22', 5, 'K-A-06', 'Laporan Barang', 'pdf', 6, 'Laporan terkait kondisi barang yang masih terpakai pada bulan April 2023 ', '106615077_sample-link_1.pdf', '2023-06-12', 'sudah disetujui', 'Sudah sesuai', 'sudah dicek'),
(9, '2023-07-01 17:06:55', 6, 'NK-B-008', 'Curiculum Vitae', 'pdf', 10, 'Contoh Curiculum Vitae Untuk Lamaran Kerja untuk kenaikan jabatan', '927990343_pdf-sample(1).pdf', '2023-06-25', 'perlu perbaikan', 'tanggal tidak sesuai', 'sudah dicek'),
(10, '2023-07-02 17:07:30', 6, 'K-A-09', 'Surat Cuti Sakit Pegawai', 'pdf', 7, 'Surat Cuti Sakit Pegawai atas nama Riyand Hamzah', '2071946811_PEMBUATAN FILE PDF_FNH_tamim (1).pdf', '2023-05-17', 'perlu perbaikan', 'Informasi kurang tepat', 'sudah dicek'),
(12, '2023-07-03 22:17:08', 4, 'K-B-11', 'SPJ pembayaran mitra kerja survei', 'pdf', 8, 'Berisi nota terkait pembayaran mitra kerja survei biaya hidup bulan Maret', '1377278287_Surat Persetujuan Proposal Skripsi-221911129-4SI2.pdf', '2023-05-08', 'perlu perbaikan', 'perbaiki hasil scan dokumen', 'sudah dicek'),
(14, '2023-06-06 22:23:17', 10, 'NK-A-12', 'Surat Keputusan Pegawai', 'pdf', 12, 'Berisi surat keputusan pegawai', '871052047_PEDOMANSKRIPSIKS2021 - signed.pdf', '2023-01-02', 'sudah disetujui', 'sudah sesuai', 'perlu pengecekan'),
(15, '2023-06-04 22:23:50', 10, 'NK-A-13', 'perjalanan dinas', 'pdf', 8, 'Surat Perjalanan Dinas ke Bandung pada bulan April 2023 ', '1404875064_2580-Article Text-8472-2-10-20201005.pdf', '2023-05-01', 'perlu perbaikan', 'perbaiki pada tanggal arsip', 'sudah dicek'),
(16, '2023-06-24 22:39:27', 11, 'K-A-10', 'Laporan Barang Masih Terpakai', 'pdf', 6, 'Laporan Barang Masih Terpakai pada bulan Mei 2023', '102767347_Proposal Paper OSL.pdf', '2023-06-23', 'sudah disetujui', 'sudah sesuai', 'sudah dicek'),
(17, '2023-06-24 22:51:16', 11, 'NK-A-05', 'Perjalanan DInas', 'pdf', 13, 'Surat perjalanan dinas atas nama Bagas Maulana ke Bali pada bulan Mei 2023', '578041127_[2] 851-Article Text-4460-1-10-20211101.pdf', '2023-06-24', 'sudah disetujui', 'Sudah sesuai', 'sudah dicek'),
(18, '2023-06-24 22:52:17', 10, 'NK-B-19', 'Surat Perjalanan Dinas', 'pdf', 13, 'Surat Perjalanan Dinas ke Jakarta pada bulan Mei 2023', '986702352_1382064815_1857382819_2580-Article Text-8472-2-10-20201005.pdf', '2023-06-19', 'sudah disetujui', 'sudah sesuai', 'sudah dicek'),
(19, '2023-06-24 23:24:43', 10, 'K-A-23', 'Pengeluaran Bulanan', 'pdf', 5, 'Berisi Pengeluaran bulanan di BPS Mataram', '872935027_EValuasiPendidikanDasar.pdf', '2023-06-10', 'perlu perbaikan', 'perbaiki pada hasil scan dokumen', 'sudah dicek'),
(28, '2023-07-16 14:45:28', 10, 'K-A-24', 'Laporan Keuangan Bulan Juni 2024', 'pdf', 15, 'Laporan keuangan bulan Juni 2024', '999380167_1382064815_1857382819_2580-Article Text-8472-2-10-20201005.pdf', '2023-07-16', 'perlu perbaikan', 'perbaiki pada hasil scan dokumen belum terbaca', 'perlu pengecekan'),
(38, '2023-07-16 22:07:50', 10, 'K-A-31', 'Curiculum Vitae', 'pdf', 10, 'Berisi curiculum vitae', '900664565_1857382819_2580-Article Text-8472-2-10-20201005.pdf', '2023-07-16', 'perlu perbaikan', 'belum mengupload file arsip', 'sudah dicek'),
(39, '2023-07-16 22:30:03', 10, 'K-A-32', 'Laporan Keuangan Baru', 'pdf', 16, 'Laporan', '1287355979_1382064815_1857382819_2580-Article Text-8472-2-10-20201005.pdf', '2023-07-05', 'sudah disetujui', 'Sudah sesuai', 'sudah dicek'),
(41, '2023-07-16 23:11:26', 10, 'K-A-35', 'Curiculum Vitae', 'pdf', 12, 'Berisi Surat keputusan', '181771411_1382064815_1857382819_2580-Article Text-8472-2-10-20201005.pdf', '2023-07-16', 'sudah disetujui', 'Sudah sesuai', 'sudah dicek'),
(43, '2023-07-19 14:52:43', 10, 'K-A-15', 'Arsip Keuangan', 'pdf', 8, 'SPJ mengenai pembayaran konsumsi pada bulan Juli 2023', '1731151860_Jadwal Ujian Skripsi Prodi DIV KS 2022-2023.pdf', '2023-07-19', 'belum diverifikasi', '', 'perlu pengecekan'),
(45, '2023-07-23 09:59:52', 10, 'K-A-40', 'Arsip Keuangan', '', 14, 'Surat perintah membayar', '447004801_', '2023-07-23', 'belum diverifikasi', '', 'perlu pengecekan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(100) NOT NULL,
  `kategori_keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_nama`, `kategori_keterangan`) VALUES
(1, 'Tidak berkategori', 'Semua yang tidak memiliki kategori'),
(4, 'Surat Izin Pelaksanaan', 'Contoh format surat izin pelaksaan pekerjaan'),
(5, 'Surat Perintah Kerja Proyek', 'Contoh format surat perintah untuk pekerjaan proyek jalan'),
(6, 'Laporan Barang Milik Negara', 'Berisi laporan-laporan terkait barang milik negara yang masih dipergunakan'),
(7, 'Surat Kesehatan Pegawai', 'Surat kesehatan untuk pegawai'),
(8, 'Surat Pertanggungjawaban (SPJ)', 'Berisi Surat Pertanggungjawaban yang telah ditandatangani oleh bendahara'),
(10, 'Curiculum Vitae', 'Contoh format surat curiculum vitae untuk kenaikan jabatan'),
(12, 'Surat Keputusan', 'Format arsip untuk surat keputusan'),
(13, 'Surat Perjalanan Dinas', 'Surat yang digunakan untuk melakukan perjalanan dinas'),
(14, 'Surat Perintah Membayar', 'Berisi mengenai laporan beserta rincian perintah membayar'),
(15, 'Surat Keterangan', 'Berisi berbagai macam keterangan pegawai'),
(16, 'Laporan Keuangan', 'Berisi laporan keuangan tiap bulan yang telah dilaporkan kepada bendahara'),
(17, 'Laporan Pertanggungjawaban (LPJ)', 'Berisi LPJ terkait dengan Keuangan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perjadin`
--

CREATE TABLE `perjadin` (
  `sppd_id` int(11) NOT NULL,
  `sppd_upload` datetime NOT NULL,
  `sppd_nomor` varchar(50) NOT NULL,
  `sppd_kegiatan` varchar(100) NOT NULL,
  `sppd_tanggal` datetime NOT NULL,
  `sppd_pegawai` varchar(100) NOT NULL,
  `sppd_keterangan` varchar(100) NOT NULL,
  `sppd_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `petugas_id` int(11) NOT NULL,
  `petugas_nama` varchar(50) NOT NULL,
  `petugas_username` varchar(50) NOT NULL,
  `petugas_password` varchar(50) NOT NULL,
  `petugas_foto` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`petugas_id`, `petugas_nama`, `petugas_username`, `petugas_password`, `petugas_foto`, `is_active`) VALUES
(4, 'Ighfar Saputra', 'ighfar', 'd8578edf8458ce06fbc5bb76a58c5ca4', '', 1),
(5, 'Moh. Khonata Efendi', 'nata', '093d8a0793df4654fee95cc1215555b3', '', 1),
(6, 'L. Muhammad Winadi', 'winadi', 'ff648054d1c615fa304245d0f6567fc4', '1827926278_winadi fokus1.jpg', 1),
(10, 'Hijri Rifani Rafiq', 'hijri', '179456205f7ccc71e7f57cb25e25cfa2', '1488916025_Taman Langit.jpeg', 1),
(11, 'M. Sukra Azamy', 'azam', '634627d4d75ef24f0960ad16dcaa0b47', '329148989_Trio.jpg', 1),
(12, 'Yoka Prasetia', 'yoka', 'bc805e04ccf4d7b301f422a039e20202', '', 1),
(13, 'Faris Farizi', 'faris', '7d77e825b80cff62a72e680c1c81424f', '', 0),
(14, 'Rahman', 'rahman', 'e9b74cd3c4c1600ee591fd56360b89db', '', 1),
(15, 'Prasetia', 'pras', '164361f78dbf22b529438ea4cc7f6496', '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat`
--

CREATE TABLE `riwayat` (
  `riwayat_id` int(11) NOT NULL,
  `riwayat_waktu` datetime NOT NULL,
  `riwayat_user` int(11) NOT NULL,
  `riwayat_arsip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `riwayat`
--

INSERT INTO `riwayat` (`riwayat_id`, `riwayat_waktu`, `riwayat_user`, `riwayat_arsip`) VALUES
(1, '2019-10-11 15:32:29', 8, 3),
(2, '2019-10-12 17:09:31', 8, 10),
(3, '2019-10-12 17:09:45', 8, 9),
(4, '2019-10-12 17:09:50', 8, 8),
(5, '2019-10-12 17:09:53', 8, 3),
(6, '2019-10-12 17:10:07', 9, 10),
(7, '2019-10-12 17:10:16', 9, 9),
(8, '2019-10-12 17:10:19', 9, 8),
(9, '2019-10-12 17:10:22', 9, 6),
(10, '2019-10-12 17:10:26', 9, 2),
(11, '2023-05-28 22:27:21', 8, 15),
(12, '2023-05-28 23:06:45', 8, 10),
(13, '2023-05-29 00:05:30', 8, 15),
(14, '2023-05-29 00:05:34', 8, 14),
(15, '2023-05-29 00:05:37', 8, 13),
(16, '2023-05-29 00:05:40', 8, 12),
(17, '2023-05-29 00:21:28', 8, 9),
(18, '2023-05-29 00:21:35', 8, 7),
(19, '2023-05-29 00:21:42', 8, 4),
(20, '2023-05-29 21:49:58', 8, 15),
(21, '2023-06-24 22:04:54', 8, 15),
(22, '2023-06-24 22:05:11', 8, 8),
(23, '2023-07-06 14:27:53', 8, 19),
(24, '2023-07-06 14:27:57', 8, 18),
(25, '2023-07-06 14:28:00', 8, 17),
(26, '2023-07-06 14:30:33', 8, 19),
(27, '2023-07-06 15:47:56', 8, 19),
(28, '2023-07-06 15:48:17', 8, 19),
(29, '2023-07-06 15:49:45', 8, 17),
(30, '2023-07-06 15:50:27', 8, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_nama` varchar(100) NOT NULL,
  `user_username` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `user_nama`, `user_username`, `user_password`, `user_foto`) VALUES
(8, 'Samsul Bahri', 'master1', 'd5802d05bbf0881de2fd823c9560619e', ''),
(9, 'Reza Yuzanni', 'master2', '5b9de42bf3fa2534e0d7ae695b12aeab', ''),
(10, 'Ajir Muhajier', 'master3', '2925bf35562c4def8fc90dc08a74c6a3', ''),
(13, 'Aditiya Esa', 'adit', '486b6c6b267bc61677367eb6b6458764', ''),
(16, 'yoka', 'yok', 'bc805e04ccf4d7b301f422a039e20202', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indeks untuk tabel `arsip`
--
ALTER TABLE `arsip`
  ADD PRIMARY KEY (`arsip_id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indeks untuk tabel `perjadin`
--
ALTER TABLE `perjadin`
  ADD PRIMARY KEY (`sppd_id`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`petugas_id`);

--
-- Indeks untuk tabel `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`riwayat_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `arsip`
--
ALTER TABLE `arsip`
  MODIFY `arsip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `perjadin`
--
ALTER TABLE `perjadin`
  MODIFY `sppd_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `petugas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `riwayat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
