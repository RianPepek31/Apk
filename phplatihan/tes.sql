-- MySQL dump 10.13  Distrib 8.0.38, for Win64 (x86_64)
--
-- Host: localhost    Database: kuisioner_db
-- ------------------------------------------------------
-- Server version	9.0.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'admin1','password1'),(2,'admin2','password2');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aspek_penilaian`
--

DROP TABLE IF EXISTS `aspek_penilaian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `aspek_penilaian` (
  `id_aspek` int NOT NULL AUTO_INCREMENT,
  `nama_aspek` varchar(100) NOT NULL,
  `deskripsi` varchar(225) NOT NULL,
  PRIMARY KEY (`id_aspek`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aspek_penilaian`
--

LOCK TABLES `aspek_penilaian` WRITE;
/*!40000 ALTER TABLE `aspek_penilaian` DISABLE KEYS */;
/*!40000 ALTER TABLE `aspek_penilaian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dosen`
--

DROP TABLE IF EXISTS `dosen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dosen` (
  `nidn` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `fakultas` varchar(100) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`nidn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dosen`
--

LOCK TABLES `dosen` WRITE;
/*!40000 ALTER TABLE `dosen` DISABLE KEYS */;
/*!40000 ALTER TABLE `dosen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grup`
--

DROP TABLE IF EXISTS `grup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `grup` (
  `kode_group` varchar(50) NOT NULL,
  `group_name` varchar(255) DEFAULT NULL,
  `status` enum('Aktif','Tidak Aktif') DEFAULT NULL,
  PRIMARY KEY (`kode_group`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grup`
--

LOCK TABLES `grup` WRITE;
/*!40000 ALTER TABLE `grup` DISABLE KEYS */;
/*!40000 ALTER TABLE `grup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kuesioner`
--

DROP TABLE IF EXISTS `kuesioner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kuesioner` (
  `id_kuesioner` int NOT NULL AUTO_INCREMENT,
  `id_range_nilai` int DEFAULT NULL,
  `id_pertayaan` int DEFAULT NULL,
  `id_layanan` int DEFAULT NULL,
  `kode_group` varchar(50) DEFAULT NULL,
  `id_responden` int DEFAULT NULL,
  `id_periode` int DEFAULT NULL,
  `id_admin` int DEFAULT NULL,
  PRIMARY KEY (`id_kuesioner`),
  KEY `id_range_nilai` (`id_range_nilai`),
  KEY `id_pertayaan` (`id_pertayaan`),
  KEY `id_layanan` (`id_layanan`),
  KEY `id_responden` (`id_responden`),
  KEY `id_periode` (`id_periode`),
  KEY `kode_group` (`kode_group`),
  KEY `id_admin` (`id_admin`),
  CONSTRAINT `kuesioner_ibfk_1` FOREIGN KEY (`id_range_nilai`) REFERENCES `range_nilai` (`id_range_nilai`) ON DELETE CASCADE,
  CONSTRAINT `kuesioner_ibfk_2` FOREIGN KEY (`id_pertayaan`) REFERENCES `pertanyaan` (`id_pertanyaan`) ON DELETE CASCADE,
  CONSTRAINT `kuesioner_ibfk_3` FOREIGN KEY (`id_layanan`) REFERENCES `layanan` (`id_layanan`) ON DELETE CASCADE,
  CONSTRAINT `kuesioner_ibfk_4` FOREIGN KEY (`id_responden`) REFERENCES `responden` (`id_responden`) ON DELETE CASCADE,
  CONSTRAINT `kuesioner_ibfk_5` FOREIGN KEY (`id_periode`) REFERENCES `periode` (`id_periode`) ON DELETE CASCADE,
  CONSTRAINT `kuesioner_ibfk_6` FOREIGN KEY (`kode_group`) REFERENCES `grup` (`kode_group`) ON DELETE CASCADE,
  CONSTRAINT `kuesioner_ibfk_7` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kuesioner`
--

LOCK TABLES `kuesioner` WRITE;
/*!40000 ALTER TABLE `kuesioner` DISABLE KEYS */;
/*!40000 ALTER TABLE `kuesioner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `layanan`
--

DROP TABLE IF EXISTS `layanan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `layanan` (
  `id_layanan` int NOT NULL AUTO_INCREMENT,
  `nama_layanan` varchar(100) NOT NULL,
  PRIMARY KEY (`id_layanan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `layanan`
--

LOCK TABLES `layanan` WRITE;
/*!40000 ALTER TABLE `layanan` DISABLE KEYS */;
/*!40000 ALTER TABLE `layanan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mahasiswa`
--

DROP TABLE IF EXISTS `mahasiswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mahasiswa` (
  `npm` varchar(9) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jurusan` varchar(50) DEFAULT NULL,
  `semester` int DEFAULT NULL,
  `angkatan` year DEFAULT NULL,
  PRIMARY KEY (`npm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mahasiswa`
--

LOCK TABLES `mahasiswa` WRITE;
/*!40000 ALTER TABLE `mahasiswa` DISABLE KEYS */;
/*!40000 ALTER TABLE `mahasiswa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `periode`
--

DROP TABLE IF EXISTS `periode`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `periode` (
  `id_periode` int NOT NULL AUTO_INCREMENT,
  `tahun_akademik` varchar(20) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_periode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `periode`
--

LOCK TABLES `periode` WRITE;
/*!40000 ALTER TABLE `periode` DISABLE KEYS */;
/*!40000 ALTER TABLE `periode` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pertanyaan`
--

DROP TABLE IF EXISTS `pertanyaan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pertanyaan` (
  `id_pertanyaan` int NOT NULL AUTO_INCREMENT,
  `pertanyaan` text NOT NULL,
  `id_aspek` int DEFAULT NULL,
  PRIMARY KEY (`id_pertanyaan`),
  KEY `id_aspek` (`id_aspek`),
  CONSTRAINT `pertanyaan_ibfk_1` FOREIGN KEY (`id_aspek`) REFERENCES `aspek_penilaian` (`id_aspek`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pertanyaan`
--

LOCK TABLES `pertanyaan` WRITE;
/*!40000 ALTER TABLE `pertanyaan` DISABLE KEYS */;
/*!40000 ALTER TABLE `pertanyaan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `range_nilai`
--

DROP TABLE IF EXISTS `range_nilai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `range_nilai` (
  `id_range_nilai` int NOT NULL AUTO_INCREMENT,
  `nilai` int NOT NULL,
  `deskripsi` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_range_nilai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `range_nilai`
--

LOCK TABLES `range_nilai` WRITE;
/*!40000 ALTER TABLE `range_nilai` DISABLE KEYS */;
/*!40000 ALTER TABLE `range_nilai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `responden`
--

DROP TABLE IF EXISTS `responden`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `responden` (
  `id_responden` int NOT NULL AUTO_INCREMENT,
  `id` varchar(10) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `tipe_responden` enum('mahasiswa','dosen','staff') DEFAULT NULL,
  PRIMARY KEY (`id_responden`),
  KEY `id` (`id`),
  CONSTRAINT `responden_ibfk_1` FOREIGN KEY (`id`) REFERENCES `mahasiswa` (`npm`) ON DELETE CASCADE,
  CONSTRAINT `responden_ibfk_2` FOREIGN KEY (`id`) REFERENCES `dosen` (`nidn`) ON DELETE CASCADE,
  CONSTRAINT `responden_ibfk_3` FOREIGN KEY (`id`) REFERENCES `staff` (`nip`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `responden`
--

LOCK TABLES `responden` WRITE;
/*!40000 ALTER TABLE `responden` DISABLE KEYS */;
/*!40000 ALTER TABLE `responden` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `staff` (
  `nip` varchar(18) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `departemen` varchar(100) DEFAULT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff`
--

LOCK TABLES `staff` WRITE;
/*!40000 ALTER TABLE `staff` DISABLE KEYS */;
/*!40000 ALTER TABLE `staff` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-10-08 18:24:39
