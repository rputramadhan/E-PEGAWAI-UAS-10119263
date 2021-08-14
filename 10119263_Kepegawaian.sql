-- MariaDB dump 10.17  Distrib 10.4.14-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: 10119263_kepegawaian
-- ------------------------------------------------------
-- Server version	10.4.14-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `data_jabatan`
--

DROP TABLE IF EXISTS `data_jabatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_jabatan` (
  `kd_jabatan` varchar(11) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `gaji` int(30) NOT NULL,
  `komisi` int(30) DEFAULT NULL,
  PRIMARY KEY (`kd_jabatan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_jabatan`
--

LOCK TABLES `data_jabatan` WRITE;
/*!40000 ALTER TABLE `data_jabatan` DISABLE KEYS */;
INSERT INTO `data_jabatan` VALUES ('KJ-1','Pimpinan Perusahaan',6000000,2500000),('KJ-2','Personalia (HRD)',4500000,1500000),('KJ-3','Kepala Bagian Keuangan',3800000,1200000),('KJ-4','Kepala Bagian Produksi',3500000,1000000),('KJ-5','Karyawan (Operator)',3000000,500000);
/*!40000 ALTER TABLE `data_jabatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_kewarganegaraan`
--

DROP TABLE IF EXISTS `data_kewarganegaraan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_kewarganegaraan` (
  `kd_kewarganegaraan` varchar(11) NOT NULL,
  `nik_ktp` varchar(30) NOT NULL,
  `nama_ktp` varchar(30) NOT NULL,
  `alamat_ktp` text NOT NULL,
  `kodepos_ktp` int(10) NOT NULL,
  PRIMARY KEY (`kd_kewarganegaraan`),
  UNIQUE KEY `nik_ktp` (`nik_ktp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_kewarganegaraan`
--

LOCK TABLES `data_kewarganegaraan` WRITE;
/*!40000 ALTER TABLE `data_kewarganegaraan` DISABLE KEYS */;
INSERT INTO `data_kewarganegaraan` VALUES ('KKW-1','3273172611010002','Rkdwan Ramadhan','Jln leuwipanjang gg kebonlega 2',40235),('KKW-2','3273172611020001','Dina Rohmatin Utami','Jln lengkong barat no 24',40231),('KKW-3','3273472611060004','Dimas Mahenra','Jln Ahmad Yani no 22',40222),('KKW-4','3273172619910021','Gilang Muharram','Jln Pungkur Sari selatan no 42',40235),('KKW-5','3273172611000002','Muhaamad Abdul Haris','Taman Cibaduyut Indah Blok O no 21',41235);
/*!40000 ALTER TABLE `data_kewarganegaraan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_pegawai`
--

DROP TABLE IF EXISTS `data_pegawai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_pegawai` (
  `kd_pegawai` varchar(11) NOT NULL,
  `nama_pegawai` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(30) NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita') NOT NULL,
  `kd_kewarganegaraan` varchar(11) NOT NULL,
  `kd_jabatan` varchar(11) NOT NULL,
  `kd_pembayaran_gaji` varchar(11) NOT NULL,
  `kd_riwayat_pendidikan` varchar(11) NOT NULL,
  `kd_riwayat_pekerjaan` varchar(11) NOT NULL,
  PRIMARY KEY (`kd_pegawai`),
  KEY `kd_kewarganegaraan` (`kd_kewarganegaraan`),
  KEY `kd_jabatan` (`kd_jabatan`),
  KEY `kd_pembayaran_gaji` (`kd_pembayaran_gaji`),
  KEY `kd_riwayat_pendidikan` (`kd_riwayat_pendidikan`),
  KEY `kd_riwayat_pekerjaan` (`kd_riwayat_pekerjaan`),
  CONSTRAINT `kd_jabatan` FOREIGN KEY (`kd_jabatan`) REFERENCES `data_jabatan` (`kd_jabatan`),
  CONSTRAINT `kd_kewarganegaraan` FOREIGN KEY (`kd_kewarganegaraan`) REFERENCES `data_kewarganegaraan` (`kd_kewarganegaraan`),
  CONSTRAINT `kd_pembayaran_gaji` FOREIGN KEY (`kd_pembayaran_gaji`) REFERENCES `data_pembayaran_gaji` (`kd_pembayaran_gaji`),
  CONSTRAINT `kd_riwayat_pekerjaan` FOREIGN KEY (`kd_riwayat_pekerjaan`) REFERENCES `data_riwayat_pekerjaan` (`kd_riwayat_pekerjaan`),
  CONSTRAINT `kd_riwayat_pendidikan` FOREIGN KEY (`kd_riwayat_pendidikan`) REFERENCES `data_riwayat_pendidikan` (`kd_riwayat_pendidikan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_pegawai`
--

LOCK TABLES `data_pegawai` WRITE;
/*!40000 ALTER TABLE `data_pegawai` DISABLE KEYS */;
INSERT INTO `data_pegawai` VALUES ('KPE-1','Ridwan Ramadhan','Jln leuwipanjang gg kebonlega 2','2001-11-26','Islam','Pria','KKW-1','KJ-1','KPG-1','KPD-1','KRJ-1'),('KPE-2','Dina Rohmatin Utami','Jln lengkong barat no 24','2001-10-10','Islam','Wanita','KKW-2','KJ-5','KPG-2','KPD-2','KRJ-2'),('KPE-3','Dimas Mahenra','Jln Ahmad Yani no 22','1998-06-01','Islam','Pria','KKW-3','KJ-4','KPG-3','KPD-3','KRJ-3'),('KPE-4','Gilang Muharram','Jln Pungkur Sari selatan no 42','2001-10-10','Islam','Pria','KKW-4','KJ-3','KPG-4','KPD-4','KRJ-4'),('KPE-5','Muhaamad Abdul Haris','STaman Cibaduyut Indah Blok O no 21','2001-10-10','Islam','Pria','KKW-5','KJ-2','KPG-5','KPD-5','KRJ-5');
/*!40000 ALTER TABLE `data_pegawai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_pembayaran_gaji`
--

DROP TABLE IF EXISTS `data_pembayaran_gaji`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_pembayaran_gaji` (
  `kd_pembayaran_gaji` varchar(11) NOT NULL,
  `metode_pembayaran` enum('Cash','Transfer') NOT NULL,
  `bank_tujuan` enum('BCA','Mandiri','BRI','BNI') DEFAULT NULL,
  `nomor_rekening` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`kd_pembayaran_gaji`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_pembayaran_gaji`
--

LOCK TABLES `data_pembayaran_gaji` WRITE;
/*!40000 ALTER TABLE `data_pembayaran_gaji` DISABLE KEYS */;
INSERT INTO `data_pembayaran_gaji` VALUES ('KPG-1','Transfer','BCA','0083274321'),('KPG-2','Cash','',''),('KPG-3','Transfer','BCA','082137211238'),('KPG-4','Transfer','Mandiri','20123383274321'),('KPG-5','Cash','','');
/*!40000 ALTER TABLE `data_pembayaran_gaji` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_riwayat_pekerjaan`
--

DROP TABLE IF EXISTS `data_riwayat_pekerjaan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_riwayat_pekerjaan` (
  `kd_riwayat_pekerjaan` varchar(11) NOT NULL,
  `nama_perusahaan_satu` varchar(30) NOT NULL,
  `nama_perusahaan_dua` varchar(30) DEFAULT NULL,
  `nama_perusahaan_tiga` varchar(30) DEFAULT NULL,
  `jabatan_perusahaan_satu` varchar(30) NOT NULL,
  `jabatan_perusahaan_dua` varchar(30) DEFAULT NULL,
  `jabatan_perusahaan_tiga` varchar(30) DEFAULT NULL,
  `lamakerja_perusahaan_satu` varchar(30) NOT NULL,
  `lamakerja_perusahaan_dua` varchar(30) DEFAULT NULL,
  `lamakerja_perusahaan_tiga` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`kd_riwayat_pekerjaan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_riwayat_pekerjaan`
--

LOCK TABLES `data_riwayat_pekerjaan` WRITE;
/*!40000 ALTER TABLE `data_riwayat_pekerjaan` DISABLE KEYS */;
INSERT INTO `data_riwayat_pekerjaan` VALUES ('KRJ-1','PT GERLINK',NULL,NULL,'HRD',NULL,NULL,'2 Tahun',NULL,NULL),('KRJ-2','PT INDOFOOD',NULL,NULL,'HRD',NULL,NULL,'1 Tahun',NULL,NULL),('KRJ-3','PT Trans Media',NULL,NULL,'Kepala Bagian',NULL,NULL,'3 Tahun',NULL,NULL),('KRJ-4','PT LEN',NULL,NULL,'Kepala Bagian',NULL,NULL,'3 Tahun',NULL,NULL),('KRJ-5','PT INDO JAYA',NULL,NULL,'Operator',NULL,NULL,'2 Tahun',NULL,NULL);
/*!40000 ALTER TABLE `data_riwayat_pekerjaan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_riwayat_pendidikan`
--

DROP TABLE IF EXISTS `data_riwayat_pendidikan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_riwayat_pendidikan` (
  `kd_riwayat_pendidikan` varchar(11) NOT NULL,
  `pendidikan_terakhir` varchar(30) NOT NULL,
  `nama_sd` varchar(30) DEFAULT NULL,
  `nama_smp` varchar(30) DEFAULT NULL,
  `nama_smak` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`kd_riwayat_pendidikan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_riwayat_pendidikan`
--

LOCK TABLES `data_riwayat_pendidikan` WRITE;
/*!40000 ALTER TABLE `data_riwayat_pendidikan` DISABLE KEYS */;
INSERT INTO `data_riwayat_pendidikan` VALUES ('KPD-1','SMA','SDS DIAN KENCANA','SMPN 3 Bandung','SMA 5 Bandung'),('KPD-2','SMP','SD Muhammadiyah 7','SMPN 10 Bandung',''),('KPD-3','SMK','SD Gagas Ceria','SMPN 1 Bandung','SMKN 8 Bandung'),('KPD-4','SMK','SD Trkdaya Tunas Bangsa','SMPN 2 Bandung','SMKN 4 Bandung'),('KPD-5','SMA','SDS Dian Emas','SMPN 5 Bandung','SMA 9 Bandung');
/*!40000 ALTER TABLE `data_riwayat_pendidikan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_user`
--

DROP TABLE IF EXISTS `tb_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_user` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_user`
--

LOCK TABLES `tb_user` WRITE;
/*!40000 ALTER TABLE `tb_user` DISABLE KEYS */;
INSERT INTO `tb_user` VALUES ('admin','$2y$10$7ZeCwKOFxs8bP5UJyUxsn.MqFQwXR.418tRbE0Ao4f1pZUA43TWha','Ridwan Ramadhan');
/*!40000 ALTER TABLE `tb_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-08-13 20:12:27
