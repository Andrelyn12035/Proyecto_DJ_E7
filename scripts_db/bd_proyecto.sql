-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3307
-- Tiempo de generación: 28-05-2023 a las 05:56:32
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `CURP` varchar(18) NOT NULL,
  `Nombre` varchar(40) NOT NULL,
  `AMaterno` varchar(25) NOT NULL,
  `APaterno` varchar(25) NOT NULL,
  `Num_cas` int(11) NOT NULL,
  `Colonia` varchar(30) NOT NULL,
  `Calle` varchar(30) NOT NULL,
  `Alcadia` varchar(30) NOT NULL,
  `CP` varchar(5) NOT NULL,
  `Estado` varchar(30) NOT NULL,
  `Email` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contratacion`
--

CREATE TABLE `contratacion` (
  `CURP` varchar(18) NOT NULL,
  `DiaEvento` date NOT NULL,
  `HrInicio` time NOT NULL,
  `HrFinal` time NOT NULL,
  `EventoTipo` varchar(30) NOT NULL,
  `NumPersonas` int(11) NOT NULL,
  `Menu` varchar(30) NOT NULL,
  `Lugar` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`CURP`);

--
-- Indices de la tabla `contratacion`
--
ALTER TABLE `contratacion`
  ADD PRIMARY KEY (`DiaEvento`,`CURP`),
  ADD KEY `FK1` (`CURP`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contratacion`
--
ALTER TABLE `contratacion`
  ADD CONSTRAINT `FK1` FOREIGN KEY (`CURP`) REFERENCES `cliente` (`CURP`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
