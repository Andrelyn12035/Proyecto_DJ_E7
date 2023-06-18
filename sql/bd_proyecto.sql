CREATE DATABASE  IF NOT EXISTS `bd_proyecto`;
USE `bd_proyecto`;


--
-- Table structure for table `administrador`
--

DROP TABLE IF EXISTS `administrador`;
CREATE TABLE `administrador` (
  `usuario` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `contraseña` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  PRIMARY KEY (`usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Dumping data for table `administrador`
--

LOCK TABLES `administrador` WRITE;
INSERT INTO `administrador` VALUES ('antonioESCOM','antonio14'),('amedinaa17','ana23'),('andrelyn12035','kevin12'),('ArturoRodrigo29','rodrigo56');
UNLOCK TABLES;

--
-- Table structure for table `evento`
--

DROP TABLE IF EXISTS `evento`;
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
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Dumping data for table `evento`
--

LOCK TABLES `evento` WRITE;
INSERT INTO `evento` VALUES (1,'MEAA050423MMCDPPA5S225/06/20233	','S2','2023-06-18','Cumpleaños','Completo',100,'Ana Cristina','Medina','Angeles','MEAA050423MMCDPPA5','ana@gmail.com','Palmas',5,'Huertas','52734','Naucalpan de Juárez','Estado de México',2),
(2,'RAMK030718HNEMRVB5J125/06/20231','J1','2023-06-25','Bautizo','Ejecutivo',100,'Kevin','Ramirez','Martinez','RAMK030718HNEMRVB5','krandym1993@hiotmail.com','Dalias',5,'Lomas','56335','Chimalhuacán','Estado de México',1);

UNLOCK TABLES;