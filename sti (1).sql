-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Feb 2023 pada 02.04
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sti`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('superadmin','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username`, `password`, `level`) VALUES
('123', '202cb962ac59075b964b07152d234b70', 'superadmin'),
('admin', '21232f297a57a5a743894a0e4a801fc3', 'superadmin'),
('adminImam', 'eaccb8ea6090a40a98aa28c071810371', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategorialat`
--

CREATE TABLE `kategorialat` (
  `idKategori` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategorialat`
--

INSERT INTO `kategorialat` (`idKategori`, `kategori`) VALUES
(5, 'Firewall'),
(6, 'SWITCH'),
(7, 'SERVER');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan`
--

CREATE TABLE `kegiatan` (
  `idKegiatan` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `gambarKegiatan` varchar(255) DEFAULT NULL,
  `judulKegiatan` varchar(255) DEFAULT NULL,
  `deskripsiKegiatan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kegiatan`
--

INSERT INTO `kegiatan` (`idKegiatan`, `username`, `gambarKegiatan`, `judulKegiatan`, `deskripsiKegiatan`) VALUES
(1, 'admin', 'kegiatan_1676339279.jpg', '1234', '<p class=\"MsoNormal\" xss=\"removed\" xss=removed><strike><br></strike></p><p class=\"MsoNormal\" xss=\"removed\" xss=removed><strike>Lorem ipsum dolor sit amet, consectetur adipiscing elit.\r\nDonec tempus massa non libero lacinia tempus. Quisque dignissim, nunc a <font color=\"#73a5ad\" xss=\"removed\">laoreet\r\nposuere, odio odio cursus dolor, ac tincidunt eros dolor eget tellus. Mauris\r\nnon libero in tellus congue porttitor a at justo. Vestibulum ante ipsum primis\r\nin faucibus orci luctus et ultrices posuere cubilia curae; In hac habitasse\r\nplate</font>a dictumst. Cras convallis maximus sollicitudin. Morbi non justo libero.\r\nDonec imperdiet leo lacus, eu aliquet justo scelerisque vitae. </strike>Curabitur mi\r\nquam, ornare non urna non, ullamcorper mattis lectus. Fusce id est nec eros\r\nporttitor rutrum. Sed venenatis, quam vel ullamcorper imperdiet, urna nibh\r\niaculis turpis, ut faucibus arcu augue vel neque. Pellentesque habitant<sub> morbi\r\ntristique senectus et netus et malesuada </sub>fames ac turpis egestas. <sup>Duis eget\r\nelit quis erat convallis mol</sup>estie eu v<span xss=\"removed\">itae tortor. Suspendisse non nisi\r\nultrices</span>, porta nisl id, molestie sapien. Morbi ut nibh nunc.<o></o></p><p class=\"MsoNormal\" xss=\"removed\" xss=removed><o> </o></p><ul><li xss=\"removed\" xss=removed>Aenean nisl ex, cursus in viverra in, posuere sed turpis.\r\nFusce massa lectus, consectetur id tortor vitae, mattis vehicula erat.\r\nVestibulum vehicula est magna, ut scelerisque sapien scelerisque et. Curabitur\r\nin lorem venenatis, tristique nibh malesuada, tempor mi. Nam purus sem,\r\nfacilisis nec feugiat nec, luctus vel mi. Etiam varius nisi eu bibendum\r\nblandit. Cras velit enim, egestas nec dui vel, ullamcorper semper lorem. Sed\r\neuismod accumsan ligula non aliquet. Integer accumsan nibh erat, ac egestas\r\nmauris interdum commodo. In luctus felis neque, sed congue elit elementum\r\naliquam. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices\r\nposuere cubilia curae; Fusce porta in risus vitae efficitur. Nunc sed pulvinar\r\nmi. Proin posuere ultrices tristique.<o></o></li></ul><p class=\"MsoNormal\" xss=\"removed\" xss=removed><o> </o></p><p class=\"MsoNormal\" xss=\"removed\" xss=removed>Cras nec nisl a est fringilla dignissim. Etiam volutpat tempor\r\ntincidunt. Vivamus ultrices tincidunt viverra. Pellentesque quis nunc posuere,\r\nelementum massa ac, porta metus. Integer ac mollis erat, at ullamcorper sapien.\r\nCras tortor enim, dignissim vel cursus sed, faucibus non lacus. Pellentesque\r\ngravida quam eu scelerisque fringilla. Quisque vel felis nec lorem iaculis\r\nvarius. Phasellus suscipit quam commodo justo scelerisque, et consectetur nisl\r\nbibendum. Nam rhoncus eros quis arcu ornare molestie.<o></o></p><p class=\"MsoNormal\" xss=\"removed\" xss=removed><o> </o></p><p class=\"MsoNormal\" xss=\"removed\" xss=removed>Vivamus laoreet lorem id tortor porttitor sollicitudin.\r\nPraesent et ex lectus. Cras at magna sem. Sed id lectus vitae ligula\r\npellentesque tincidunt. Suspendisse pretium condimentum lacus, id tincidunt ex\r\nblandit ut. Praesent eu pulvinar purus. Maecenas mollis sodales eros. Ut\r\nhendrerit mattis malesuada. Curabitur ac gravida arcu. Sed hendrerit lobortis\r\narcu, in eleifend nibh porta vitae. Suspendisse ut tellus semper, finibus nulla\r\neu, faucibus massa. Nam imperdiet porttitor sapien, eget pretium elit maximus\r\nnon. Nunc rhoncus auctor quam quis fringilla. Donec ullamcorper dolor eu\r\nlacinia dignissim.<o></o></p><p class=\"MsoNormal\" xss=\"removed\" xss=removed><o> </o></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\" xss=\"removed\" xss=removed>Class aptent taciti sociosqu ad litora torquent per conubia\r\nnostra, per inceptos himenaeos. Donec ut bibendum dui. Curabitur rhoncus mi\r\nfaucibus arcu hendrerit egestas. Aenean laoreet mauris semper nisl interdum\r\nefficitur. Vestibulum ultrices feugiat varius. Morbi iaculis interdum\r\nconsectetur. Nunc sit amet feugiat arcu, nec tincidunt turpis. Donec tempus\r\ntincidunt ipsum tincidunt blandit. Proin interdum felis nec nisl vulputate\r\ndapibus. Phasellus non arcu id massa auctor commodo. Pellentesque convallis\r\neros sit amet augue convallis posuere sit amet ultrices magna. Nunc lobortis\r\nnibh sit amet iaculis egestas. Quisque commodo viverra leo, sed ornare risus\r\nvenenatis eget. Curabitur hendrerit sapien id sodales hendrerit. Integer id\r\nimperdiet mauris.<o></o></p>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `link`
--

CREATE TABLE `link` (
  `SID` int(11) NOT NULL,
  `namaLink` varchar(255) DEFAULT NULL,
  `kapasitasLink` int(11) DEFAULT NULL,
  `serviceLink` varchar(255) DEFAULT NULL,
  `statusLink` enum('Aktif','Tidak Aktif') DEFAULT NULL,
  `keteranganLink` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `link`
--

INSERT INTO `link` (`SID`, `namaLink`, `kapasitasLink`, `serviceLink`, `statusLink`, `keteranganLink`) VALUES
(2, 'qq', 2, 'qq', 'Tidak Aktif', 'qq'),
(3, 'ww', 5, 'ww', 'Aktif', 'ww');

-- --------------------------------------------------------

--
-- Struktur dari tabel `merkalat`
--

CREATE TABLE `merkalat` (
  `idMerk` int(11) NOT NULL,
  `merk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `merkalat`
--

INSERT INTO `merkalat` (`idMerk`, `merk`) VALUES
(9, 'RUCKUS'),
(10, 'FORTIGATE'),
(11, 'CISCO'),
(13, 'MIKROTIK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `monitoringip`
--

CREATE TABLE `monitoringip` (
  `ipAddress` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `monitoringip`
--

INSERT INTO `monitoringip` (`ipAddress`) VALUES
('10.22.30.1'),
('10.91.1.44'),
('10.91.9.44'),
('10.91.9.51'),
('10.91.9.57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `topologi`
--

CREATE TABLE `topologi` (
  `idTopologi` int(11) NOT NULL,
  `judulTopologi` varchar(255) DEFAULT NULL,
  `fileTopologi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `topologi`
--

INSERT INTO `topologi` (`idTopologi`, `judulTopologi`, `fileTopologi`) VALUES
(4, 'Topologi 1', 'topologi_1677126254.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_aset`
--

CREATE TABLE `transaksi_aset` (
  `idTransaksi` int(11) NOT NULL,
  `idL1` int(11) NOT NULL,
  `idL2` int(11) NOT NULL,
  `idL3` int(11) NOT NULL,
  `idL4` int(11) NOT NULL,
  `idKategori` int(11) NOT NULL,
  `idMerk` int(11) NOT NULL,
  `idType` int(11) NOT NULL,
  `spesifikasiAset` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi_aset`
--

INSERT INTO `transaksi_aset` (`idTransaksi`, `idL1`, `idL2`, `idL3`, `idL4`, `idKategori`, `idMerk`, `idType`, `spesifikasiAset`) VALUES
(5, 5, 7, 6, 1, 5, 9, 7, '<p>Barang Aktif</p>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_link`
--

CREATE TABLE `transaksi_link` (
  `idTL` int(11) NOT NULL,
  `idL1` int(11) NOT NULL,
  `idL2` int(11) NOT NULL,
  `idL3` int(11) NOT NULL,
  `idL4` int(11) NOT NULL,
  `SID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi_link`
--

INSERT INTO `transaksi_link` (`idTL`, `idL1`, `idL2`, `idL3`, `idL4`, `SID`) VALUES
(2, 3, 4, 4, 4, 3),
(3, 2, 3, 3, 3, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `typealat`
--

CREATE TABLE `typealat` (
  `idType` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `typealat`
--

INSERT INTO `typealat` (`idType`, `type`) VALUES
(7, 'BROCADE ICX-7450'),
(8, 'BROCADE ICX-7250'),
(9, 'BROCADE ICX-7150'),
(10, '600D'),
(11, '301E'),
(12, 'RB1200'),
(13, 'RB1100'),
(14, 'RB1100');

-- --------------------------------------------------------

--
-- Struktur dari tabel `unitlv1`
--

CREATE TABLE `unitlv1` (
  `idL1` int(11) NOT NULL,
  `namaUnitL1` varchar(255) NOT NULL,
  `singkatanL1` varchar(255) NOT NULL,
  `koordinatL1` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `unitlv1`
--

INSERT INTO `unitlv1` (`idL1`, `namaUnitL1`, `singkatanL1`, `koordinatL1`) VALUES
(5, 'UIT JBM', 'UIT JBM', 'Mahendra');

-- --------------------------------------------------------

--
-- Struktur dari tabel `unitlv2`
--

CREATE TABLE `unitlv2` (
  `idL2` int(11) NOT NULL,
  `namaUnitL2` varchar(255) NOT NULL,
  `singkatanL2` varchar(255) NOT NULL,
  `koordinatL2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `unitlv2`
--

INSERT INTO `unitlv2` (`idL2`, `namaUnitL2`, `singkatanL2`, `koordinatL2`) VALUES
(6, 'UPT SURABAYA', 'UPTSBY', 'Mahendra'),
(7, 'UPT MALANG', 'UPTMLG', 'Mahendra'),
(8, 'UPT MADIUN', 'UPTMDN', 'Mahendra'),
(9, 'UPT PROBOLINGO', 'UPTPBL', 'Mahendra'),
(10, 'UPT GRESIK', 'UPTGRK', 'Mahendra'),
(11, 'UPT BALI', 'UPTBLI', 'Mahendra'),
(12, 'UIT JBM', 'UITJBM', 'Mahendra');

-- --------------------------------------------------------

--
-- Struktur dari tabel `unitlv3`
--

CREATE TABLE `unitlv3` (
  `idL3` int(11) NOT NULL,
  `namaUnitL3` varchar(255) NOT NULL,
  `singkatanL3` varchar(255) NOT NULL,
  `koordinatL3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `unitlv3`
--

INSERT INTO `unitlv3` (`idL3`, `namaUnitL3`, `singkatanL3`, `koordinatL3`) VALUES
(6, 'ULTG MALANG', 'MLANG', 'Mahendra'),
(7, 'ULTG MOJOKERTO', 'MJKTO', 'Mahendra'),
(8, 'ULTG KRIAN', 'KRIAN', 'Mahendra'),
(9, 'ULTG PROBOLINGGO', 'PBLGO', 'Mahendra'),
(10, 'ULTG BANGIL', 'BNGIL', 'Mahendra'),
(11, 'ULTG JEMBER', 'JMBER', 'Mahendra'),
(12, 'ULTG SURABAYA UTARA', 'SBYUT', 'Mahendra'),
(13, 'ULTG SURABAYA SELATAN', 'SBYSE', 'Mahendra'),
(14, 'ULTG GRESIK', 'GRSIK', 'Mahendra'),
(15, 'ULTG SAMPANG', 'SPANG', 'Mahendra'),
(16, 'ULTG BABAT', 'BABAT', 'Mahendra'),
(17, 'ULTG KEDIRI', 'KDIRI', 'Mahendra'),
(18, 'ULTG MADIUN', 'MDIUN', 'Mahendra'),
(19, 'ULTG BALI UTARA', 'BLIUT', 'Mahendra'),
(20, 'ULTG BALI SELATAN', 'BLISL', 'Mahendra'),
(21, 'UIT JBM', 'UITJBM', 'Mahendra'),
(22, 'UPT SURABAYA', 'UPTSBY', 'Mahendra'),
(23, 'UPT MALANG', 'UPTMLG', 'Mahendra'),
(24, 'UPT MADIUN', 'UPTMDN', 'Mahendra'),
(25, 'UPT PROBOLINGO', 'UPTPBL', 'Mahendra'),
(26, 'UPT GRESIK', 'UPTGRK', 'Mahendra'),
(27, 'UPT BALI', 'UPTBLI', 'Mahendra'),
(28, 'UIT JBM', 'UITJBM', 'Mahendra');

-- --------------------------------------------------------

--
-- Struktur dari tabel `unitlv4`
--

CREATE TABLE `unitlv4` (
  `idL4` int(11) NOT NULL,
  `namaUnitL4` varchar(255) NOT NULL,
  `singkatanL4` varchar(255) NOT NULL,
  `koordinatL4` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `unitlv4`
--

INSERT INTO `unitlv4` (`idL4`, `namaUnitL4`, `singkatanL4`, `koordinatL4`) VALUES
(1, 'GI KEBONAGUNG', 'KBAGN', 'Mahendra'),
(2, 'GI SENGKALING', 'SKLNG', 'Mahendra'),
(3, 'GI PAKIS', 'PAKIS', 'Mahendra'),
(4, 'GI LAWANG', 'LWANG', 'Mahendra'),
(5, 'GI WLINGI', 'WLNG', 'Mahendra'),
(6, 'GI SUTAMI', 'STAMI', 'Mahendra'),
(7, 'GI SELOREJO', 'SLRJO', 'Mahendra'),
(8, 'GI BLIMBING', 'BLBNG', 'Mahendra'),
(9, 'GI SENGGURUH', 'SGRUH', 'Mahendra'),
(10, 'GI TUREN', 'TUREN', 'Mahendra'),
(11, 'GI GAMPINGAN', 'GPGAN', 'Mahendra'),
(12, 'GI POLEHAN', 'PLHON', 'Mahendra'),
(13, 'GI KARANGKATES', 'KKTES', 'Mahendra'),
(14, 'GI NEW WLINGI', 'NWLG', 'Mahendra'),
(15, 'UIT JBM', 'UITJBM', 'Mahendra'),
(16, 'UPT SURABAYA', 'UPTSBY', 'Mahendra'),
(17, 'UPT MALANG', 'UPTMLG', 'Mahendra'),
(18, 'UPT MADIUN', 'UPTMDN', 'Mahendra'),
(19, 'UPT PROBOLINGO', 'UPTPBL', 'Mahendra'),
(20, 'UPT GRESIK', 'UPTGRK', 'Mahendra'),
(21, 'UPT BALI', 'UPTBLI', 'Mahendra'),
(23, 'ULTG MALANG', 'MLANG', 'Mahendra'),
(24, 'ULTG MOJOKERTO', 'MJKTO', 'Mahendra'),
(25, 'ULTG KRIAN', 'KRIAN', 'Mahendra'),
(26, 'ULTG PROBOLINGGO', 'PBLGO', 'Mahendra'),
(27, 'ULTG BANGIL', 'BNGIL', 'Mahendra'),
(28, 'ULTG JEMBER', 'JMBER', 'Mahendra'),
(29, 'ULTG SURABAYA UTARA', 'SBYUT', 'Mahendra'),
(30, 'ULTG SURABAYA SELATAN', 'SBYSE', 'Mahendra'),
(31, 'ULTG GRESIK', 'GRSIK', 'Mahendra'),
(32, 'ULTG SAMPANG', 'SPANG', 'Mahendra'),
(33, 'ULTG BABAT', 'BABAT', 'Mahendra'),
(34, 'ULTG KEDIRI', 'KDIRI', 'Mahendra'),
(35, 'ULTG MADIUN', 'MDIUN', 'Mahendra'),
(36, 'ULTG BALI UTARA', 'BLIUT', 'Mahendra'),
(37, 'ULTG BALI SELATAN', 'BLISL', 'Mahendra'),
(38, 'UIT JBM', 'UITJBM', 'Mahendra'),
(39, 'ULTG MALANG', 'MLANG', 'Mahendra'),
(40, 'ULTG MOJOKERTO', 'MJKTO', 'Mahendra'),
(41, 'ULTG KRIAN', 'KRIAN', 'Mahendra'),
(42, 'ULTG PROBOLINGGO', 'PBLGO', 'Mahendra'),
(43, 'ULTG BANGIL', 'BNGIL', 'Mahendra'),
(44, 'ULTG JEMBER', 'JMBER', 'Mahendra'),
(45, 'ULTG SURABAYA UTARA', 'SBYUT', 'Mahendra'),
(46, 'ULTG SURABAYA SELATAN', 'SBYSE', 'Mahendra'),
(47, 'ULTG GRESIK', 'GRSIK', 'Mahendra'),
(48, 'ULTG SAMPANG', 'SPANG', 'Mahendra'),
(49, 'ULTG BABAT', 'BABAT', 'Mahendra'),
(50, 'ULTG KEDIRI', 'KDIRI', 'Mahendra'),
(51, 'ULTG MADIUN', 'MDIUN', 'Mahendra'),
(52, 'ULTG BALI UTARA', 'BLIUT', 'Mahendra'),
(53, 'ULTG BALI SELATAN', 'BLISL', 'Mahendra');

-- --------------------------------------------------------

--
-- Struktur dari tabel `unitpelaksana`
--

CREATE TABLE `unitpelaksana` (
  `idUP` int(11) NOT NULL,
  `idUPT` int(11) NOT NULL,
  `namaUP` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `unitpelaksana`
--

INSERT INTO `unitpelaksana` (`idUP`, `idUPT`, `namaUP`) VALUES
(1, 1, 'UP2B'),
(2, 1, 'UP3B'),
(3, 3, 'UP4B');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `kategorialat`
--
ALTER TABLE `kategorialat`
  ADD PRIMARY KEY (`idKategori`);

--
-- Indeks untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`idKegiatan`);

--
-- Indeks untuk tabel `link`
--
ALTER TABLE `link`
  ADD PRIMARY KEY (`SID`);

--
-- Indeks untuk tabel `merkalat`
--
ALTER TABLE `merkalat`
  ADD PRIMARY KEY (`idMerk`);

--
-- Indeks untuk tabel `monitoringip`
--
ALTER TABLE `monitoringip`
  ADD PRIMARY KEY (`ipAddress`);

--
-- Indeks untuk tabel `topologi`
--
ALTER TABLE `topologi`
  ADD PRIMARY KEY (`idTopologi`);

--
-- Indeks untuk tabel `transaksi_aset`
--
ALTER TABLE `transaksi_aset`
  ADD PRIMARY KEY (`idTransaksi`);

--
-- Indeks untuk tabel `transaksi_link`
--
ALTER TABLE `transaksi_link`
  ADD PRIMARY KEY (`idTL`);

--
-- Indeks untuk tabel `typealat`
--
ALTER TABLE `typealat`
  ADD PRIMARY KEY (`idType`);

--
-- Indeks untuk tabel `unitlv1`
--
ALTER TABLE `unitlv1`
  ADD PRIMARY KEY (`idL1`);

--
-- Indeks untuk tabel `unitlv2`
--
ALTER TABLE `unitlv2`
  ADD PRIMARY KEY (`idL2`);

--
-- Indeks untuk tabel `unitlv3`
--
ALTER TABLE `unitlv3`
  ADD PRIMARY KEY (`idL3`);

--
-- Indeks untuk tabel `unitlv4`
--
ALTER TABLE `unitlv4`
  ADD PRIMARY KEY (`idL4`);

--
-- Indeks untuk tabel `unitpelaksana`
--
ALTER TABLE `unitpelaksana`
  ADD PRIMARY KEY (`idUP`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kategorialat`
--
ALTER TABLE `kategorialat`
  MODIFY `idKategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `idKegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `link`
--
ALTER TABLE `link`
  MODIFY `SID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `merkalat`
--
ALTER TABLE `merkalat`
  MODIFY `idMerk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `topologi`
--
ALTER TABLE `topologi`
  MODIFY `idTopologi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `transaksi_aset`
--
ALTER TABLE `transaksi_aset`
  MODIFY `idTransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `transaksi_link`
--
ALTER TABLE `transaksi_link`
  MODIFY `idTL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `typealat`
--
ALTER TABLE `typealat`
  MODIFY `idType` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `unitlv1`
--
ALTER TABLE `unitlv1`
  MODIFY `idL1` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `unitlv2`
--
ALTER TABLE `unitlv2`
  MODIFY `idL2` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `unitlv3`
--
ALTER TABLE `unitlv3`
  MODIFY `idL3` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `unitlv4`
--
ALTER TABLE `unitlv4`
  MODIFY `idL4` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `unitpelaksana`
--
ALTER TABLE `unitpelaksana`
  MODIFY `idUP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
