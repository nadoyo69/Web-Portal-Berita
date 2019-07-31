-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2019 at 07:07 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fck`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `idberita` int(11) NOT NULL,
  `judul` text,
  `jenis` varchar(50) DEFAULT NULL,
  `foto` text,
  `nama` varchar(100) DEFAULT NULL,
  `slug` text,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isi` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`idberita`, `judul`, `jenis`, `foto`, `nama`, `slug`, `tanggal`, `isi`) VALUES
(42, 'Hacker Dan Mata-mata Diam-diam Menguping Percakapan Whatsapp Pribadi Anda', 'Berita', 'http://192.168.1.3/fck/assets/images/nadoyo.jpg', 'System Administrator', 'hacker-dan-mata-mata-diam-diam-menguping-percakapan-whatsapp-pribadi-anda.html', '2019-07-31 04:15:32', '<p>\"Saya akan melakukan perubahan dan <em>roadmap</em>-nya sedang disiapkan. Begitu roadmap-nya selesai, dijalankan,\" ungkapnya. <br>\r\n<br>\r\nDinas Lingkungan Hidup DKI Jakarta memprediksi TPST Bantargebang tidak akan bisa menampung sampah pada 2021.<br>\r\n<br>\r\nBantargebang menerima sekitar 7.500 ton sampah per hari. Pemprov DKI bersama DPRD DKI kini sedang dalam tahap merampungkan perda pengelolaan sampah terkait pembangunan ITF. <br>\r\n<br>\r\nPada Senin (29/7) lalu Pemprov dan Badan Pembentukkan Peraturan Daerah (Bapemperda) melakukan kunjungan kerja (kunker) ke Surabaya untuk mempelajari soal pengelolaan sampah.</p>\r\n'),
(43, 'Apa Itu Linux?', 'Linux', 'http://192.168.1.3/fck/assets/images/bJXtXBE1.png', 'System Administrator', 'apa-itu-linux.html', '2019-07-31 04:16:52', '<p>Linux adalah Unix clone, kernel nya ditulis oleh Linus Torvalds dan dikembangkan dengan bantuan programer dan hackers dari seluruh dunia. Selengkapnya bisa dibaca di situs milik rekan saya ini http://sby.centrin.net.id/~inu/</p>\r\n\r\n<p>Linux memiliki semua feature yang dimiliki oleh Unix, termasuk multitasking, virtual memory, shared libraries, demand loading, shared copy-on-write exexutables, proper memory management dan TCP/IP networking.</p>\r\n\r\n<p>Dengan feature sekelas &#39;real operating system&#39; tersebut tidak membuat Linux menjadi mahal harganya, justru Linux dapat diperoleh secara gratis. Kalaupun ada sedikit charge itu hanya sebagai ongkos distribusi atau pembelian cd belaka.</p>\r\n\r\n<p>Linux di distribusikan dibawah GNU General Public License yaitu suatu lisensi dimana pemilik program tetap memegang hak ciptanya tetapi orang lain dimungkinkan menyebarkan, memodifikasi atau bahkan menjual kembali program tersebut tapi dengan syarat source code asli harus tetap disertakan dalam distribusinya.</p>\r\n'),
(44, 'Apa Itu Windwos?', 'Windows', 'http://192.168.1.3/fck/assets/images/amd-radeon-feature-wccftech-2060x11581.jpg', 'System Administrator', 'apa-itu-windwos.html', '2019-07-31 04:17:23', '<p>Perkembangan windows mulai dari awal muncul memang terus berkembang hingga sekarang. Hal ini tentu karena perusahaan Microsoft yang selalu mengutamakan keefisiensian dan inovasi dari sebuah sistem operasi guna membantu meringankan pekerjaan manusia. Jenis windows pertama yang muncul yakni windows 1.0 merupakan gebrakan hebat dalam dunia sistem operasi komputer. Sehingga tidak salah jika seiring dengan perjalanan waktu, sistem operasi komputer ini semakin berkembang. Meski demikian, masih banyak sekali orang khususnya yang tidak berkecimpung langsung dalam dunia IT yang tidak mengetahui apa itu pengertian windows.</p>\r\n'),
(45, 'Apa Saja Jenis-jenis Pekerjaan Di Dunia It (information Technology) & Telekomunikasi?', 'It', 'http://192.168.1.3/fck/assets/images/nadoyo1.jpg', 'System Administrator', 'apa-saja-jenis-jenis-pekerjaan-di-dunia-it-information-technology--telekomunikasi.html', '2019-07-31 04:18:00', '<p>Pengunjung blog saya ternyata mempunyai latar belakang yang beragam tentang IT dan Telekomunikasi. beberapa dari mereka ada yang sangat awam sehingga mendorong saya untuk menulis pekerjaan di dunia it. Sebelum pertengahan tahun 2000-an, IT dan telekomunikasi adalah domain yang terpisah, dimana teknologi yang digunakan di kedua domain ini berbeda. misal teknologi PCM-30 tidak akan ditemui di perusahaan non-telekomunikasi.</p>\r\n\r\n<p>Kini, karena semakin banyak teknologi IT diadopsi ke industri telekomunikasi, membuat batasan IT dan telekomunikasi semakin kabur. misal: PCM-30 semakin ditinggalkan dan </p>\r\n'),
(46, '10 Hacker Paling Berbahaya Di Dunia, Salah Satunya Dari Indonesia', 'Hacker', 'http://192.168.1.3/fck/assets/images/bJXtXBE2.png', 'System Administrator', '10-hacker-paling-berbahaya-di-dunia-salah-satunya-dari-indonesia.html', '2019-07-31 04:18:44', '<p>Peretas muncul di awal tahun 1960an. Pada masa itu anggota organisasi mahasiswa Tech Model Railroad Club di Laboratorium Kecerdasan Artifisial Massachusetts Institute of Technology (MIT) merupakan salah satu perintis perkembangan teknologi komputer dan mereka berkutat dengan sejumlah komputer mainframe. <br>\r\n<br>\r\nAwalnya, hacker pertama kalinya muncul dengan arti positif untuk menyebut seorang anggota yang memiliki keahlian dalam bidang komputer dan mampu membuat program komputer yang lebih baik daripada yang telah dirancang bersama.<br>\r\n<br>\r\nPada 1983, konotasi hacker berubah menjadi negatif karena pada tahun tersebut FBI menangkap kelompok cyber crime bernama The 414s yang berbasis di AS, untuk pertama kalinya. </p>\r\n'),
(47, 'Makan', 'Linux', 'http://192.168.1.3/fck/assets/images/amd-radeon-feature-wccftech-2060x11583.jpg', 'System Administrator', 'makan.html', '2019-07-31 04:18:59', '<p>sfdfsf dauioj wd wd qwdfe fw fwef</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `idkomen` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `isi` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `idtag` int(11) NOT NULL,
  `tag` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`idtag`, `tag`) VALUES
(13, 'Berita'),
(14, 'Windows'),
(15, 'It'),
(16, 'Hacker'),
(17, 'Linux');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_last_login`
--

CREATE TABLE `tbl_last_login` (
  `id` bigint(20) NOT NULL,
  `userId` bigint(20) NOT NULL,
  `sessionData` varchar(2048) NOT NULL,
  `machineIp` varchar(1024) NOT NULL,
  `userAgent` varchar(128) NOT NULL,
  `agentString` varchar(1024) NOT NULL,
  `platform` varchar(128) NOT NULL,
  `createdDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reset_password`
--

CREATE TABLE `tbl_reset_password` (
  `id` bigint(20) NOT NULL,
  `email` varchar(128) NOT NULL,
  `activation_id` varchar(32) NOT NULL,
  `agent` varchar(512) NOT NULL,
  `client_ip` varchar(32) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  `createdBy` bigint(20) NOT NULL DEFAULT '1',
  `createdDtm` datetime NOT NULL,
  `updatedBy` bigint(20) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `roleId` tinyint(4) NOT NULL COMMENT 'role id',
  `role` varchar(50) NOT NULL COMMENT 'role text'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`roleId`, `role`) VALUES
(1, 'System Administrator'),
(2, 'Manager'),
(3, 'Employee');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `userId` int(11) NOT NULL,
  `email` varchar(128) NOT NULL COMMENT 'login email',
  `password` varchar(128) NOT NULL COMMENT 'hashed login password',
  `name` varchar(128) DEFAULT NULL COMMENT 'full name of user',
  `mobile` varchar(20) DEFAULT NULL,
  `roleId` tinyint(4) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  `createdBy` int(11) NOT NULL,
  `createdDtm` datetime NOT NULL,
  `updatedBy` int(11) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL,
  `otp` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`userId`, `email`, `password`, `name`, `mobile`, `roleId`, `isDeleted`, `createdBy`, `createdDtm`, `updatedBy`, `updatedDtm`, `otp`) VALUES
(1, 'admin@gmail.com', '$2y$10$ldaWPWhB0udKT/JUcZ/.G.pI.3cxtC36QKUwcSJTSxdRso9G8LSzC', 'System Administrator', '9890098900', 1, 0, 0, '2015-07-01 18:56:49', 1, '2019-03-13 13:40:14', 'fI54btYMTB');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`idberita`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`idkomen`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`idtag`);

--
-- Indexes for table `tbl_last_login`
--
ALTER TABLE `tbl_last_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_reset_password`
--
ALTER TABLE `tbl_reset_password`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`roleId`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `idberita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `idkomen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `idtag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_last_login`
--
ALTER TABLE `tbl_last_login`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT for table `tbl_reset_password`
--
ALTER TABLE `tbl_reset_password`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `roleId` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT 'role id', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
