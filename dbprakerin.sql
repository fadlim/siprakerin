-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2017 at 08:20 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbprakerin`
--

-- --------------------------------------------------------

--
-- Table structure for table `mst_jurusan`
--

CREATE TABLE `mst_jurusan` (
  `id_jur` varchar(11) NOT NULL,
  `nama_jur` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_jurusan`
--

INSERT INTO `mst_jurusan` (`id_jur`, `nama_jur`) VALUES
('6018', 'Akuntansi'),
('6017', 'TKJ');

-- --------------------------------------------------------

--
-- Table structure for table `mst_kelas`
--

CREATE TABLE `mst_kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(25) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_kelas`
--

INSERT INTO `mst_kelas` (`id_kelas`, `nama_kelas`) VALUES
(1, '10'),
(2, '11'),
(3, '12');

-- --------------------------------------------------------

--
-- Table structure for table `mst_pembsek`
--

CREATE TABLE `mst_pembsek` (
  `id_pembsek` varchar(11) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nama_pembsek` varchar(25) NOT NULL,
  `pengajar` varchar(200) NOT NULL,
  `jabatan` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_pembsek`
--

INSERT INTO `mst_pembsek` (`id_pembsek`, `nip`, `nama_pembsek`, `pengajar`, `jabatan`) VALUES
('p001', '196010241987031008', 'HADI SUMANTORO,Drs.H.M.Pd', ' Adper', 'KEPALA SEKOLAH'),
('PS004', '198600894572057536', 'JAJAT SUDRAJAT,S.ST', 'GURU TKJ', 'GURU'),
('PS005', '197710034567087520', 'RONI SUNANDAR,M.Kom', 'PRODUKTIF TKJ', 'KAPROG TKJ'),
('PS006', '196201121996011 001', 'MARWODJO,S.ST', 'PROD.AKUNTASI', 'KAPROG AKUNTASI'),
('PS008', '196710211994031008', 'YAYAT SUDRAJAT, Drs. ', ' FISIKA', 'WALASEK KESISWAAN');

-- --------------------------------------------------------

--
-- Table structure for table `mst_siswa`
--

CREATE TABLE `mst_siswa` (
  `nis` varchar(11) NOT NULL,
  `nama_siswa` varchar(25) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tempat_lahir` varchar(25) NOT NULL,
  `alamat_siswa` text NOT NULL,
  `jeniskelamin` varchar(20) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `id_kelas` varchar(10) NOT NULL,
  `id_jur` varchar(11) NOT NULL,
  `id_tahunajaran` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_siswa`
--

INSERT INTO `mst_siswa` (`nis`, `nama_siswa`, `tgl_lahir`, `tempat_lahir`, `alamat_siswa`, `jeniskelamin`, `no_telp`, `id_kelas`, `id_jur`, `id_tahunajaran`) VALUES
('1465', 'Annisa', '1997-01-02', 'Tegal', 'Kramat RT02/RW03', 'Perempuan', '087800003232', '2', '6017', '4'),
('1704', 'Nanni', '1997-01-23', 'Pemalang', 'Pemalang RT02/RT03', 'Laki-laki', '087878787888', '2', '6018', '4');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dataprakerin`
--

CREATE TABLE `tbl_dataprakerin` (
  `id_dtprakerin` int(11) NOT NULL,
  `nis` varchar(11) NOT NULL,
  `id_pembsek` varchar(11) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `nama_dudi` varchar(25) NOT NULL,
  `alamat_dudi` text NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `nama_pemimpin` varchar(25) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dataprakerin`
--

INSERT INTO `tbl_dataprakerin` (`id_dtprakerin`, `nis`, `id_pembsek`, `tgl_daftar`, `nama_dudi`, `alamat_dudi`, `no_telp`, `nama_pemimpin`, `status`) VALUES
(2, '020411016', 'PS002', '2014-09-17', 'GTJ Jakarta', 'Permata Hijau', '085223696101', 'Ibu Tika', 0),
(3, '020411020', 'PS001', '2014-09-15', 'PT SUZUKI', 'Jl. Soekarno Hatta', '08223696189', 'Dani Darmawan', 0),
(5, '020411013', 'p001', '2014-09-03', 'PT.Indodev Niaga Internet', 'Jakarta Selatan', '08223696777', 'Gordon Erns', 1),
(7, '020411018', 'PS002', '2014-10-01', 'PT Jaya Kusuma Bogor', 'Bogor', '085223696106', 'Rizal Maulana', 0),
(38, '020411001', 'PS001', '2014-10-01', 'PT.Indodev Niaga Internet', 'Kebayoran Lama', '085223696109', 'Gordon Erns', 0),
(39, '4548967948', 'p001', '2016-08-04', 'PT Sido Muncul', 'Jalan Asia Eropa', '87696749', 'Abdullah', 0),
(35, '020411016', 'p001', '2014-10-10', 'test', 'test', '085223696101', 'test', 1),
(40, '1465', 'PS004', '2017-04-28', 'PT Telkom', 'Jakarta', '087800003231', 'Jams', 0),
(41, '1704', 'PS006', '2017-04-30', 'PT Sido Muncul', 'Tegal', '087800077777', 'Kamad', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jadwalmonitoring`
--

CREATE TABLE `tbl_jadwalmonitoring` (
  `id_jadwal` varchar(11) NOT NULL,
  `id_dtprakerin` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `tgl_monitor` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jadwalmonitoring`
--

INSERT INTO `tbl_jadwalmonitoring` (`id_jadwal`, `id_dtprakerin`, `start_date`, `end_date`, `tgl_monitor`) VALUES
('J00001', 40, '2017-05-10', '2017-07-28', '2017-05-24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nilaidudi`
--

CREATE TABLE `tbl_nilaidudi` (
  `id_nilaidudi` varchar(11) NOT NULL,
  `tgl_penilaian` date NOT NULL,
  `id_pembdudi` varchar(11) NOT NULL,
  `nilai_kbd1` decimal(10,0) NOT NULL,
  `nilai_kbd2` decimal(10,0) NOT NULL,
  `nilai_kbd3` decimal(10,0) NOT NULL,
  `nilai_kbd4` decimal(10,0) NOT NULL,
  `nilai_kbd5` decimal(10,0) NOT NULL,
  `nilai_kbd6` decimal(10,0) NOT NULL,
  `nilai_kbd7` decimal(10,0) NOT NULL,
  `nilai_kbd8` decimal(10,0) NOT NULL,
  `component_kbd1` varchar(200) NOT NULL,
  `component_kbd2` varchar(200) NOT NULL,
  `component_kbd3` varchar(200) NOT NULL,
  `component_kbd4` varchar(200) NOT NULL,
  `component_kbd5` varchar(200) NOT NULL,
  `component_kbd6` varchar(200) NOT NULL,
  `component_kbd7` varchar(200) NOT NULL,
  `component_kbd8` varchar(200) NOT NULL,
  `grade1` varchar(2) NOT NULL,
  `grade2` varchar(2) NOT NULL,
  `grade3` varchar(2) NOT NULL,
  `grade4` varchar(2) NOT NULL,
  `grade5` varchar(2) NOT NULL,
  `grade6` varchar(2) NOT NULL,
  `grade7` varchar(2) NOT NULL,
  `grade8` varchar(2) NOT NULL,
  `nilai_ku1` decimal(10,0) NOT NULL,
  `nilai_ku2` decimal(10,0) NOT NULL,
  `nilai_ku3` decimal(10,0) NOT NULL,
  `nilai_ku4` decimal(10,0) NOT NULL,
  `component_ku1` varchar(200) NOT NULL,
  `component_ku2` varchar(200) NOT NULL,
  `component_ku3` varchar(200) NOT NULL,
  `component_ku4` varchar(200) NOT NULL,
  `gradeu1` varchar(2) NOT NULL,
  `gradeu2` varchar(2) NOT NULL,
  `gradeu3` varchar(2) NOT NULL,
  `gradeu4` varchar(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_nilaidudi`
--

INSERT INTO `tbl_nilaidudi` (`id_nilaidudi`, `tgl_penilaian`, `id_pembdudi`, `nilai_kbd1`, `nilai_kbd2`, `nilai_kbd3`, `nilai_kbd4`, `nilai_kbd5`, `nilai_kbd6`, `nilai_kbd7`, `nilai_kbd8`, `component_kbd1`, `component_kbd2`, `component_kbd3`, `component_kbd4`, `component_kbd5`, `component_kbd6`, `component_kbd7`, `component_kbd8`, `grade1`, `grade2`, `grade3`, `grade4`, `grade5`, `grade6`, `grade7`, `grade8`, `nilai_ku1`, `nilai_ku2`, `nilai_ku3`, `nilai_ku4`, `component_ku1`, `component_ku2`, `component_ku3`, `component_ku4`, `gradeu1`, `gradeu2`, `gradeu3`, `gradeu4`) VALUES
('1', '2017-05-06', 'PD001', '65', '0', '0', '0', '0', '0', '0', '0', 'wer', '', '', '', '', '', '', '', 'C', '', '', '', '', '', '', '', '78', '0', '0', '0', 'wer', '', '', '', 'B', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nilaisekolah`
--

CREATE TABLE `tbl_nilaisekolah` (
  `id_nilaiSek` varchar(11) NOT NULL,
  `tgl_penilaian` date NOT NULL,
  `id_dtprakerin` int(11) NOT NULL,
  `nilai_teknis` int(11) NOT NULL,
  `nilai_nonteknis` varchar(11) NOT NULL,
  `nilai_ratarataangka` float NOT NULL,
  `nilai_rataratahuruf` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_nilaisekolah`
--

INSERT INTO `tbl_nilaisekolah` (`id_nilaiSek`, `tgl_penilaian`, `id_dtprakerin`, `nilai_teknis`, `nilai_nonteknis`, `nilai_ratarataangka`, `nilai_rataratahuruf`) VALUES
('NS001', '2017-06-01', 40, 88, '99', 93.5, 'A'),
('987656', '2017-04-01', 41, 45, '56', 50.5, 'C');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembdudi`
--

CREATE TABLE `tbl_pembdudi` (
  `id_pembdudi` varchar(11) NOT NULL,
  `id_dtprakerin` int(11) NOT NULL,
  `nama_pembdudi` varchar(50) NOT NULL,
  `alamat_pembdudi` text NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pembdudi`
--

INSERT INTO `tbl_pembdudi` (`id_pembdudi`, `id_dtprakerin`, `nama_pembdudi`, `alamat_pembdudi`, `jabatan`, `no_telp`) VALUES
('PD001', 40, 'Bambang', 'Jakarta', 'Admin', '087800003230');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tahunajaran`
--

CREATE TABLE `tbl_tahunajaran` (
  `id_tahunajaran` int(11) NOT NULL,
  `tahun_ajaran` varchar(11) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tahunajaran`
--

INSERT INTO `tbl_tahunajaran` (`id_tahunajaran`, `tahun_ajaran`, `status`) VALUES
(1, '2012/2015', '1'),
(2, '2013/2014', '0'),
(3, '2014/2015', '1'),
(4, '2017/2018', '1'),
(5, '2011/2012', '1'),
(6, '2018/2019', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `nama_lengkap` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `level` varchar(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `nama_lengkap`, `email`, `level`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@gmail.com', '0'),
(17, 'a', 'a', 'a', 'coba@gmail.com', '0'),
(3, 'siswa', 'siswa', 'siswa', 'siswa@gmail.com', '1'),
(6, 'wilda', 'wilda', 'wilda', 'wilda@gmail.com', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mst_jurusan`
--
ALTER TABLE `mst_jurusan`
  ADD PRIMARY KEY (`id_jur`);

--
-- Indexes for table `mst_kelas`
--
ALTER TABLE `mst_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `mst_pembsek`
--
ALTER TABLE `mst_pembsek`
  ADD PRIMARY KEY (`id_pembsek`);

--
-- Indexes for table `mst_siswa`
--
ALTER TABLE `mst_siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `tbl_dataprakerin`
--
ALTER TABLE `tbl_dataprakerin`
  ADD PRIMARY KEY (`id_dtprakerin`);

--
-- Indexes for table `tbl_jadwalmonitoring`
--
ALTER TABLE `tbl_jadwalmonitoring`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `tbl_nilaidudi`
--
ALTER TABLE `tbl_nilaidudi`
  ADD PRIMARY KEY (`id_nilaidudi`);

--
-- Indexes for table `tbl_nilaisekolah`
--
ALTER TABLE `tbl_nilaisekolah`
  ADD PRIMARY KEY (`id_nilaiSek`);

--
-- Indexes for table `tbl_pembdudi`
--
ALTER TABLE `tbl_pembdudi`
  ADD PRIMARY KEY (`id_pembdudi`);

--
-- Indexes for table `tbl_tahunajaran`
--
ALTER TABLE `tbl_tahunajaran`
  ADD PRIMARY KEY (`id_tahunajaran`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_dataprakerin`
--
ALTER TABLE `tbl_dataprakerin`
  MODIFY `id_dtprakerin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `tbl_tahunajaran`
--
ALTER TABLE `tbl_tahunajaran`
  MODIFY `id_tahunajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
