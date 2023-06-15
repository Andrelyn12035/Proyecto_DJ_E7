CREATE DATABASE  IF NOT EXISTS `bd_proyecto` /*!40100 DEFAULT CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `bd_proyecto`;
-- MySQL dump 10.13  Distrib 8.0.31, for Win64 (x86_64)
--
-- Host: proyecto-dj.cvnwmcsl2fhb.us-east-1.rds.amazonaws.com    Database: bd_proyecto
-- ------------------------------------------------------
-- Server version	8.0.32

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
SET @MYSQLDUMP_TEMP_LOG_BIN = @@SESSION.SQL_LOG_BIN;
SET @@SESSION.SQL_LOG_BIN= 0;

--
-- GTID state at the beginning of the backup 
--

SET @@GLOBAL.GTID_PURGED=/*!80000 '+'*/ '';

--
-- Table structure for table `administrador`
--

DROP TABLE IF EXISTS `administrador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `administrador` (
  `usuario` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `contraseña` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  PRIMARY KEY (`usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrador`
--

LOCK TABLES `administrador` WRITE;
/*!40000 ALTER TABLE `administrador` DISABLE KEYS */;
INSERT INTO `administrador` VALUES ('antonioESCOM','antonio14'),('amedinaa17','ana23'),('andrelyn12035','kevin12');
/*!40000 ALTER TABLE `administrador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evento`
--

DROP TABLE IF EXISTS `evento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `evento` (
  `id_evento` int NOT NULL AUTO_INCREMENT,
  `folio` varchar(40) COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `sede` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `tipo` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `menu` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `no_personas` int NOT NULL,
  `nombre` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `a_paterno` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `a_materno` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `curp` varchar(18) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `correo` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `calle` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `numero` int NOT NULL,
  `colonia` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `cp` varchar(5) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `alcaldia` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `entidad` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `hora` int NOT NULL,
  PRIMARY KEY (`id_evento`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evento`
--

LOCK TABLES `evento` WRITE;
/*!40000 ALTER TABLE `evento` DISABLE KEYS */;
INSERT INTO `evento` VALUES (9,'RAMK030718HNEMRVB5S118/06/20232','S1','2023-06-18','Otro','m_ejecutivo',100,'Andr','Ram','Ds','RAMK030718HNEMRVB5','KRANDYM1993@HOTMAIL.COM','CLA',5,'SAN','56335','Alvaro_Obregon','CDMX',2),(8,'RAMK030718HNEMRVB5S116/06/20231','S1','2023-06-16','Si','m_ejecutivo',100,'Andres','Ramk','Mart','RAMK030718HNEMRVB5','KRANDYM1993@HOTMAIL.COM','Clave',5,'Dlave','56335','Alvaro_Obregon','CDMX',1),(7,'RAMK030718HNEMRVB5S124-06-20231','S1','2023-06-24','bautizo','m_ejecutivo',100,'Andres','Rami','Mart','RAMK030718HNEMRVB5','KRANDYM1993@HOTMAIL.COM','CLA',5,'MIGUEL','56335','Alvaro_Obregon','CDMX',1),(4,'RAMK030718HNEMRVB5J117-06-20231','J1','2023-06-17','bautizo','m_ejecutivo',100,'Andres','Ramirez','Martinez','RAMK030718HNEMRVB5','KRANDYM1993@HOTMAIL.COM','clavel',5,'Miguel','56335','Alvaro_Obregon','CDMX',1),(5,'RAMK030718HNEMRVB5S117-06-20231','S1','2023-06-17','bautizo','m_ejecutivo',100,'Andres','Ramirez','Martinez','RAMK030718HNEMRVB5','KRANDYM1993@HOTMAIL.COM','clavel',5,'Miguel','56335','Alvaro_Obregon','CDMX',1),(6,'RAMK030718HNEMRVB5S124-06-20231','S1','2023-06-24','bautizo','m_ejecutivo',100,'Kevin','Andres','Ram','RAMK030718HNEMRVB5','KRANDYM1993@HOTMAIL.COM','CLAVEL',5,'MIGU','56335','Alvaro_Obregon','CDMX',1),(10,'RAMK030718HNEMRVB5S130/06/20232','S1','2023-06-30','Sias','m_ejecutivo',100,'Andr','Ram','Ds','RAMK030718HNEMRVB5','KRANDYM1993@HOTMAIL.COM','CLA',5,'SAN','56335','Alvaro_Obregon','CDMX',2),(11,'RAMK030718HNEMRVB5S117/06/20232','S1','2023-06-17','bautizo','m_ejecutivo',100,'Andtres','Ras','Masa','RAMK030718HNEMRVB5','KRANDYM1993@HOTMAI.COM','CLAV',5,'SAN','56335','Sanjose','Hidalgo',2),(12,'RAMK030718HNEMRVB5S123/06/20232','S1','2023-06-23','bautizo','m_ejecutivo',100,'Andtres','Ras','Masa','RAMK030718HNEMRVB5','KRANDYM1993@HOTMAI.COM','CLAV',5,'SAN','56335','si','Estado de México',2),(13,'RAMK030718HNEMRVB5S130/06/20231','S1','2023-06-30','bautizo','m_ejecutivo',100,'As','Dsd','Dsd','RAMK030718HNEMRVB5','KRANDYM1993@HOTMAIL.COM','CLA',5,'SAN','56335','Alvaro_Obregon','CDMX',1);
/*!40000 ALTER TABLE `evento` ENABLE KEYS */;
UNLOCK TABLES;
SET @@SESSION.SQL_LOG_BIN = @MYSQLDUMP_TEMP_LOG_BIN;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-15  1:53:28
