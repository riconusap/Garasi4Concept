-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql302.epizy.com
-- Generation Time: Feb 10, 2022 at 06:02 AM
-- Server version: 10.3.27-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_27543323_garasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE `gambar` (
  `id_galeri` varchar(8) NOT NULL,
  `nama_gambar` text NOT NULL,
  `judul` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gambar`
--

INSERT INTO `gambar` (`id_galeri`, `nama_gambar`, `judul`) VALUES
('G001', '60367df1a07919.77520240.jpeg', 'Modif StangVespa'),
('G003', '60367f212b4188.40239977.jpeg', 'Garasi4Concept'),
('G002', '60367e2188e483.22654284.jpeg', 'Modifikasi FinoKarbu'),
('G004', '60367f641c05c8.85195805.jpeg', 'Mio Restorasi'),
('G005', '60367f8ae6dc18.30448774.jpeg', 'Mio ThailandStyle'),
('G006', '60367fbbbb4921.76661683.jpeg', 'Kontes Modifikasi'),
('G007', '60367fdcc6bb12.11057379.jpeg', 'ConceptThailandStyle'),
('G008', '603680009619a4.81574153.jpeg', 'Aerox Modifikasi'),
('G009', '60368058017f51.09804701.jpeg', 'Aerox Modifikasi'),
('G010', '603680785e1088.42128750.jpeg', 'FinoSimpleConcept'),
('G011', '60368090d4ae43.07137677.jpeg', 'Yamaha75'),
('G012', '6036811f7ba853.89555862.jpeg', 'Proses TuneUp'),
('G013', '603681412fab60.28581692.jpeg', 'Proses CustomMotor'),
('G014', '6036816bd356e7.65961804.jpeg', 'Proses Boreup'),
('G015', '60368241419f45.50613097.jpeg', 'Hasil CustomMotor'),
('G016', '603682c2918bd8.33337644.jpeg', 'Modifikasi Nouvo'),
('G017', '603685dad12935.76803727.jpeg', 'ConceptThailandStyle'),
('G018', '603685f7d00298.90593861.jpeg', 'ConceptProper'),
('G019', '60368b4906b936.88023279.jpeg', 'Mio Restorasi');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` varchar(8) NOT NULL,
  `nama_produk` varchar(30) NOT NULL,
  `harga` varchar(9) NOT NULL,
  `gambar_produk` text NOT NULL,
  `keterangan_produk` text NOT NULL,
  `spesifikasi` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga`, `gambar_produk`, `keterangan_produk`, `spesifikasi`) VALUES
('MT000', 'Paket Boreup PCX150/Vario150', '4.599K', '602e56a2937d78.20403315.jpeg', 'Paket Boreup Mesin Vario150/PCX Brand BRT. (sudah termasuk ongkos bongkar pasang+setting)', 'Paket Boreup BRT+Instalasi+Setting'),
('MT001', 'Paket Boreup Mio Sporty/Smile/', '3.999K', '602e589d055d95.73203985.jpg', 'Paket Boreup Mesin Mio Series (karbu) Pakai Brand BRT. (sudah termasuk ongkos bongkar pasang+setting)', 'Paket Boreup BRT+Instalasi+Setting'),
('MT002', 'Paket Boreup Nmax/Aerox', '4.499K', '602e5fb8ea6215.03422654.jpg', 'Paket Boreup Nmax/Aerox Pakai Brand BRT. (sudah termasuk ongkos bongkar pasang+setting)', 'Paket Boreup BRT+Instalasi+Setting'),
('MT003', 'Paket Boreup Vespa Matic 3V', '3.100K', '60362963ea5c48.09949266.jpg', 'Paket Boreup Vespa Matic 3V dengan brand Kawahara , terdiri dari Blok piston 62mm, Piston 62mm, Pen, Paking', 'Paket Boreup Kawahara+Instalasi+Setting'),
('MT004', 'Paket Porpol (Porting Polish) ', '750K', '60363303b8d257.43059640.jpg', 'Porting polish adalah sebuah metode menghaluskan jalur masuk dan keluar bahan bakar ke mesin motor. Sederhananya porting polish bisa dibilang memodifikasi lubang inlet untuk mempercepat laju bahan bakar dan udara menuju ruang bakar.', 'Porting Polish Aerox/NMax'),
('MT005', 'Paket Porpol (Porting Polish) ', '750K', 'product60363a2be1b259.71874616.jpg', 'Porting polish adalah sebuah metode menghaluskan jalur masuk dan keluar bahan bakar ke mesin motor. Sederhananya porting polish bisa dibilang memodifikasi lubang inlet untuk mempercepat laju bahan bakar dan udara menuju ruang bakar.', 'Porting Polish PCX/Vario'),
('MT006', 'Paket Porpol (Porting Polish)', '1.000K', '60363cf8755c97.42722078.jpg', 'Porting polish adalah sebuah metode menghaluskan jalur masuk dan keluar bahan bakar ke mesin motor. Sederhananya porting polish bisa dibilang memodifikasi lubang inlet untuk mempercepat laju bahan bakar dan udara menuju ruang bakar.', 'Porting Polish VespaModern'),
('MT007', 'TuneUp Motor', '400K', 'product6036743a014747.10249626.jpg', 'TuneUp ini adalah sebuah proses yang dilakukan untuk mengembalikan performa motor ke performa standarnya. Meliputi : -Service Ringan, -Service Injeksi, -Ganti Oli, -Ganti Filter Udara, -Service CVT', 'TuneUp Aerox/Nmax'),
('MT008', 'TuneUp Motor', '450K', 'product6036756f510ca1.44365358.jpeg', 'TuneUp ini adalah sebuah proses yang dilakukan untuk mengembalikan performa motor ke performa standarnya. Meliputi : -Service Ringan, -Service Injeksi, -Ganti Oli, -Ganti Filter Udara, -Service CVT', 'TuneUp PCX/Vario/ADV'),
('MT009', 'Service Nmax/Aerox', '150K', '6036776cdcdbe9.08882846.jpg', 'Service Rutin Motor -Ganti Oli, -Service CVT', 'Service Rutin'),
('MT010', 'Service PCX/Vario/ADV', '150K', 'product603678c586f630.74550264.jpg', 'Service Rutin Motor -Ganti Oli, -Service CVT', 'Service Rutin'),
('MT011', 'Service MotorKecil', '100K', 'product603679a9514605.28101924.jpeg', 'Service Rutin Motor -Ganti Oli, -Service CVT (Mio,Beat,Vario110,Dll)', 'Service Rutin');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(2) NOT NULL,
  `link_ig` varchar(16) NOT NULL,
  `link_twitter` varchar(16) NOT NULL,
  `link_fb` varchar(16) NOT NULL,
  `gambar2` text NOT NULL,
  `gambar1` text NOT NULL,
  `perkenalan` text NOT NULL,
  `gambar` text NOT NULL,
  `navbrand` text NOT NULL,
  `maps` text NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `email` varchar(30) NOT NULL,
  `yt` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `link_ig`, `link_twitter`, `link_fb`, `gambar2`, `gambar1`, `perkenalan`, `gambar`, `navbrand`, `maps`, `no_telp`, `email`, `yt`) VALUES
(1, 'garasi4concept', 'Dikadalin8', 'Riandika Dita D.', 'logo.jpg', 'icon.svg', 'Hallo Teman-teman Bikers, Kami Garasi4Concept sebuah bengkel rumahan yang beralamat di Jl.Garuda 4 No.8, RT.002/RW.009, Harapan Jaya, Kec. Bekasi Utara, Kota Bks, Jawa Barat 17124 ,\r\nyaitu adalah bengkel Service,Tuneup,Boreup untuk motor motor Matic maupun Bebek, adapun paket paket yang kami tawarkan berupa paket Boreup BRT ataupun Boreup Handmade juga bisa tinggal hubungi kami saja melalui Whatsapp.\r\nOwh iya kami juga mau memberikan sedikit inspirasi untuk kalian yang ingin memodifikasi motor kalian sesuai dengan konsep konsep yang cukup matang, untuk keterhubungan dengan modifikasi style motor bisa langsung kontak ke nomor 089662362771.\r\ndibawah ini kami akan memberikan foto motor motor yang telah selesai di modifikasi di bengkel kami.', 'bengkel1.jpg', 'navbrand.svg', 'ChIJg8Os1PGLaS4R5We9Qh1um4I', '089662362771', 'markdikadalin01@gmail.com', 'https://www.youtube.com/embed/ba-XAIskH_g');

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` varchar(8) NOT NULL,
  `nama_admin` varchar(25) NOT NULL,
  `foto_admin` text NOT NULL,
  `email_admin` varchar(40) NOT NULL,
  `password_admin` varchar(40) NOT NULL,
  `level_admin` enum('Admin','Super Admin') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_admin`, `foto_admin`, `email_admin`, `password_admin`, `level_admin`) VALUES
('3', 'superadmin', '6038c6066fa609.19958794.jpeg', 'admin', 'f939ee54c4293270480125281bc4aa93', 'Super Admin'),
('admin1', 'admin1', '6038c0a3a94276.41300094.jpeg', 'admin1', 'e00cf25ad42683b3df678c61f42c6bda', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id_team` varchar(8) NOT NULL,
  `nama_team` varchar(20) NOT NULL,
  `keahlian` varchar(30) NOT NULL,
  `gambar_team` text NOT NULL,
  `fb_uname` varchar(16) NOT NULL,
  `instagram_uname` varchar(16) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id_team`, `nama_team`, `keahlian`, `gambar_team`, `fb_uname`, `instagram_uname`) VALUES
('T001', 'UPE WASTA ABI', 'MEKANIK UTAMA', '602e48f9c0e530.84695029.jpeg', 'Upe Wasta', 'upeabi'),
('T002', 'FIRMAN MAULANA S', 'PENANGGUNG JAWAB', '602e4cf7c5ef54.07393007.jpeg', 'Firman Maulana', 'firman.maulana.s'),
('T003', 'RIANDIKA', 'PAINTING', '602e4a8ee2be10.59243217.jpeg', 'Riandika Dita D.', 'dikadalin._'),
('T004', 'FIANIMATUL', 'ADMINISTRATOR', '602e4ba7a5a5f8.09994966.jpeg', 'fianimatul', 'fianimatul'),
('T005', 'WISNU DWI', 'ASISTEN MEKANIK', '60362d8344e297.22862053.jpeg', 'Wisnu Dwi', 'kunull028');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id_team`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
