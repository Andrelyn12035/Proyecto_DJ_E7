-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 24-12-2020 a las 17:44:58
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_proyecto`
--
CREATE DATABASE IF NOT EXISTS `bd_proyecto` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `bd_proyecto`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `a_paterno` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `a_materno` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `curp` varchar(18) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `calle` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `numero` int COLLATE utf8_spanish_ci NOT NULL,
  `colonia` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `cp` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `alcaldia` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `entidad` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`curp`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

DROP TABLE IF EXISTS `evento`;
CREATE TABLE IF NOT EXISTS `evento` (
  `folio` varchar(26) COLLATE utf8_spanish_ci NOT NULL,
  `sede` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `tipo` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `menu` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `no_personas` int COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`folio`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

DROP TABLE IF EXISTS `administrador`;
CREATE TABLE IF NOT EXISTS `administrador` (
  `usuario` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `contraseña` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`usuario`, `contraseña`) VALUES
('antonioESCOM', 'antonio14'),
('amedinaa17', 'ana23'),
('andrelyn12035', 'kevin12');


/*
CREATE TABLE IF NOT EXISTS `evento` (
  `id_evento` INT COLLATE utf8_spanish_ci NOT NULL AUTO_INCREMENT,
  `folio` varchar(26) COLLATE utf8_spanish_ci NOT NULL,
  `sede` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `horario` time NOT NULL,
  `tipo` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `menu` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `no_personas` int COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `a_paterno` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `a_materno` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `curp` varchar(18) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `calle` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `numero` int COLLATE utf8_spanish_ci NOT NULL,
  `colonia` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `cp` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `alcaldia` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `entidad` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_evento`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

*/