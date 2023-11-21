-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2023 at 03:02 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sisfo_akademik`
--

-- --------------------------------------------------------

--
-- Table structure for table `beasiswa`
--

CREATE TABLE `beasiswa` (
  `id_beasiswa` int(11) NOT NULL,
  `nama_beasiswa` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `persyaratan` text DEFAULT NULL,
  `status` enum('Aktif','Tidak Aktif') DEFAULT 'Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `beasiswa`
--

INSERT INTO `beasiswa` (`id_beasiswa`, `nama_beasiswa`, `deskripsi`, `persyaratan`, `status`) VALUES
(1, 'BEASISWA DJARUM', 'Djarum Foundation turut berperan aktif dalam memajukan pendidikan di Indonesia melalui program beasiswa prestasi (merit based scholarship) yang dikenal sebagai Djarum Beasiswa Plus bagi mahasiswa berprestasi tinggi di Indonesia.Yang membedakan Djarum Beasiswa Plus dengan program beasiswa lain adalah, selain mendapatkan dana beasiswa selama satu tahun, Beswan Djarum (sebutan bagi penerima program Djarum Beasiswa Plus) juga mendapatkan berbagai macam pelatihan ketrampilan lunak atau soft skills guna mempersiapkan mereka menjadi calon pemimpin masa depan bangsa. Pelatihan ini meliputi Nation Building, Character Building, Leadership Development, Competition Challenges, serta International Exposure. Tidak hanya berhenti sampai di sini, melalui program Community Empowerment, Beswan Djarum juga diberikan kesempatan untuk menerapkan berbagai ketrampilan lunak yang telah diperoleh dengan melibatkan diri secara langsung dalam memberikan jalan keluar pada suatu permasalahan sosial di lingkungan tempat mereka berada.', 'Persyaratan pendaftaran adalah:\r\n1. Sedang menempuh pendidikan Strata 1/Diploma 4 di semester IV, dari semua disiplin ilmu.\r\n2. IPK minimum 3.00 pada semester III, serta dapat mempertahankan IPK minimum 3.00 hingga akhir semester IV.\r\n3. Aktif mengikuti kegiatan organisasi baik di dalam maupun luar kampus.\r\n4. Tidak sedang menerima beasiswa dari pihak lain.\r\n5. Kuliah di mitra Perguruan Tinggi Program Djarum Beasiswa Plus.', 'Aktif'),
(3, 'basiswa', 'desk', 'gadak sarat', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `kode_jurusan` varchar(9) NOT NULL,
  `nama_jurusan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `kode_jurusan`, `nama_jurusan`) VALUES
(6, 'MM', 'MATEMATIKA'),
(8, 'BIO', 'BIOLOGI'),
(11, 'TE', 'TEKNIK ELEKTRO'),
(13, '003', 'anak babi');

-- --------------------------------------------------------

--
-- Table structure for table `krs`
--

CREATE TABLE `krs` (
  `id_krs` int(11) NOT NULL,
  `id_thn_akad` int(10) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `kode_matakuliah` varchar(10) NOT NULL,
  `nilai` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(120) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `tempat_lahir` varchar(120) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(120) NOT NULL,
  `nama_prodi` varchar(120) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nim`, `nama_lengkap`, `alamat`, `email`, `telepon`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `nama_prodi`, `photo`) VALUES
(2, '4222550013', 'RONASIP HEPPY RIA SIBARANI', 'JALAN DURUNG', 'ronasibsibarani@gmail.com', '085836733228', 'SILAEN', '2004-02-02', 'Perempuan', 'ILMU KOMPUTER', 'Rona.jpg'),
(5, '4223250009', 'GLENN KELTY DAVID MANURUNG', 'JALAN RELA', 'gkelty.dm@gmail.com', '081210180085', 'BATAM', '2003-10-16', 'Laki-laki', 'ILMU KOMPUTER', '1496997761.jpeg'),
(12, '4223250001', 'M FAUZAN HIDAYAT', 'jln durung', 'fauzanhidayat773@gmail.com', '081367376906', 'tanjung pandan', '2222-04-14', 'Laki-laki', 'TEKNIK ELEKTRO', 'belakang_buku-16.jpg'),
(13, '123456', 'junet', 'jln isekai', 'junet@gmail.com', '081122675389', 'isekai', '1990-02-11', 'Laki-laki', 'ILMU KOMPUTER', 'belakang_buku-17.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE `matakuliah` (
  `id_matakuliah` int(11) NOT NULL,
  `kode_matakuliah` varchar(20) NOT NULL,
  `nama_matakuliah` varchar(100) NOT NULL,
  `sks` int(10) NOT NULL,
  `semester` int(14) NOT NULL,
  `nama_prodi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`id_matakuliah`, `kode_matakuliah`, `nama_matakuliah`, `sks`, `semester`, `nama_prodi`) VALUES
(13, '3KOM49114', 'ORGANISASI DAN ARSITEKTUR KOMPUTER', 2, 2, 'TEKNIK ELEKTRO');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_tagihan` int(11) DEFAULT NULL,
  `no_transaksi` varchar(255) DEFAULT NULL,
  `nominal_pembayaran` int(11) DEFAULT NULL,
  `status_pembayaran` enum('LUNAS','BELUM LUNAS') DEFAULT NULL,
  `tanggal_pembayaran` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_tagihan`, `no_transaksi`, `nominal_pembayaran`, `status_pembayaran`, `tanggal_pembayaran`) VALUES
(23, 29, '1700544598-29', 20000, 'LUNAS', '2023-11-21 05:29:58');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_beasiswa`
--

CREATE TABLE `pengajuan_beasiswa` (
  `id_pengajuan` int(11) NOT NULL,
  `id_mahasiswa` int(11) DEFAULT NULL,
  `id_beasiswa` int(11) DEFAULT NULL,
  `tanggal_pengajuan` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('Menunggu','Disetujui','Ditolak') DEFAULT 'Menunggu',
  `alasan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int(11) NOT NULL,
  `kode_prodi` varchar(20) NOT NULL,
  `nama_prodi` varchar(25) NOT NULL,
  `nama_jurusan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `kode_prodi`, `nama_prodi`, `nama_jurusan`) VALUES
(10, 'PSTE', 'TEKNIK ELEKTRO', 'TEKNIK ELEKTRO'),
(12, 'PSIK', 'ILMU KOMPUTER', 'MATEMATIKA');

-- --------------------------------------------------------

--
-- Table structure for table `tagihan`
--

CREATE TABLE `tagihan` (
  `id_tagihan` int(11) NOT NULL,
  `nama_tagihan` varchar(250) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tgl_pembuatan` datetime(6) NOT NULL,
  `id_mahasiswa` int(11) DEFAULT NULL,
  `status_tagihan` enum('BELUM LUNAS','LUNAS') DEFAULT 'BELUM LUNAS',
  `tenggat_tagihan` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tagihan`
--

INSERT INTO `tagihan` (`id_tagihan`, `nama_tagihan`, `jumlah`, `tgl_pembuatan`, `id_mahasiswa`, `status_tagihan`, `tenggat_tagihan`) VALUES
(1, 'DENDA TELAT', 100000, '2023-11-16 08:17:48.000000', 2, '', '2023-11-19'),
(3, 'DENDA TIDURR', 20000, '2023-11-16 08:25:24.000000', 5, '', '2023-11-18'),
(5, 'DENDA TELAT', 100000, '2023-11-18 03:53:25.000000', 13, '', '2023-11-21'),
(29, 'denda', 0, '2023-11-21 06:25:35.000000', 12, 'LUNAS', '2023-11-24');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_aka`
--

CREATE TABLE `tahun_aka` (
  `id_tahun_aka` int(11) NOT NULL,
  `tahun_aka` varchar(20) NOT NULL,
  `semester` enum('Ganjil','Genap') NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tahun_akademik`
--

CREATE TABLE `tahun_akademik` (
  `id_thn_akad` int(11) NOT NULL,
  `tahun_akademik` varchar(20) NOT NULL,
  `semester` enum('1','2') NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tahun_akademik`
--

INSERT INTO `tahun_akademik` (`id_thn_akad`, `tahun_akademik`, `semester`, `status`) VALUES
(12, '2022/2023', '2', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `level` enum('admin','user') NOT NULL,
  `blokir` enum('N','Y') NOT NULL,
  `id_mahasiswa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `level`, `blokir`, `id_mahasiswa`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'abangadik974@gmail.com', 'admin', 'N', NULL),
(2, 'gkelty', '92ce1ed82d7960fad3763db4adb657c0', 'gkelty.dm@gmail.com', 'admin', 'N', NULL),
(7, '4223250001', '$2y$10$Dx1.Ya5eAcZ3NEf8Rzq/mOfdVF7j4XA7Zv8S71MZVLWJOC1kAkiQu', 'fauzanhidayat773@gmail.com', 'user', 'N', 12),
(8, '123456', '$2y$10$HI8iwpPEUNZrauPT85xt7.HCK/gJiHWDzmTojYjKOwSaNB2EuuKC6', 'junet@gmail.com', 'user', 'N', 13);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beasiswa`
--
ALTER TABLE `beasiswa`
  ADD PRIMARY KEY (`id_beasiswa`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `krs`
--
ALTER TABLE `krs`
  ADD PRIMARY KEY (`id_krs`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`id_matakuliah`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD UNIQUE KEY `no_transaksi` (`no_transaksi`),
  ADD KEY `pembayaran_ibfk_1` (`id_tagihan`);

--
-- Indexes for table `pengajuan_beasiswa`
--
ALTER TABLE `pengajuan_beasiswa`
  ADD PRIMARY KEY (`id_pengajuan`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`),
  ADD KEY `id_beasiswa` (`id_beasiswa`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indexes for table `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`id_tagihan`),
  ADD KEY `your_foreign_key_name` (`id_mahasiswa`);

--
-- Indexes for table `tahun_aka`
--
ALTER TABLE `tahun_aka`
  ADD PRIMARY KEY (`id_tahun_aka`);

--
-- Indexes for table `tahun_akademik`
--
ALTER TABLE `tahun_akademik`
  ADD PRIMARY KEY (`id_thn_akad`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beasiswa`
--
ALTER TABLE `beasiswa`
  MODIFY `id_beasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `krs`
--
ALTER TABLE `krs`
  MODIFY `id_krs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `matakuliah`
--
ALTER TABLE `matakuliah`
  MODIFY `id_matakuliah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `pengajuan_beasiswa`
--
ALTER TABLE `pengajuan_beasiswa`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tagihan`
--
ALTER TABLE `tagihan`
  MODIFY `id_tagihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tahun_aka`
--
ALTER TABLE `tahun_aka`
  MODIFY `id_tahun_aka` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tahun_akademik`
--
ALTER TABLE `tahun_akademik`
  MODIFY `id_thn_akad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_tagihan`) REFERENCES `tagihan` (`id_tagihan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengajuan_beasiswa`
--
ALTER TABLE `pengajuan_beasiswa`
  ADD CONSTRAINT `pengajuan_beasiswa_ibfk_1` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id`),
  ADD CONSTRAINT `pengajuan_beasiswa_ibfk_2` FOREIGN KEY (`id_beasiswa`) REFERENCES `beasiswa` (`id_beasiswa`);

--
-- Constraints for table `tagihan`
--
ALTER TABLE `tagihan`
  ADD CONSTRAINT `your_foreign_key_name` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
