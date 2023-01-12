-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 30-11-2019 a las 20:57:34
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prestamo digital`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activo`
--

DROP TABLE IF EXISTS `activo`;
CREATE TABLE IF NOT EXISTS `activo` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `Codigo` varchar(100) NOT NULL,
  `Equipo` int(10) NOT NULL,
  `Marca` int(10) NOT NULL,
  `Modelo` int(10) NOT NULL,
  `Serial` varchar(100) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `Equipo` (`Equipo`),
  KEY `Marca` (`Marca`),
  KEY `Modelo` (`Modelo`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1 COMMENT='Activos que se pueden prestar';

--
-- Volcado de datos para la tabla `activo`
--

INSERT INTO `activo` (`Id`, `Codigo`, `Equipo`, `Marca`, `Modelo`, `Serial`) VALUES
(1, 'DGT000001', 1, 1, 1, 'A0'),
(2, 'DGT000002', 1, 1, 2, 'B1'),
(3, 'DGT000003', 1, 1, 3, 'C2'),
(4, 'DGT000004', 1, 1, 4, 'D3'),
(5, 'DGT000005', 1, 1, 5, 'E4'),
(6, 'DGT000006', 1, 1, 6, 'F5'),
(7, 'DGT000007', 1, 1, 7, 'G6'),
(8, 'DGT000008', 1, 1, 8, 'H7'),
(9, 'DGT000009', 1, 1, 9, 'I8'),
(10, 'DGT000010', 1, 1, 10, 'J9'),
(11, 'DGT000011', 1, 1, 11, 'K0'),
(12, 'DGT000012', 1, 1, 12, 'L1'),
(13, 'DGT000013', 1, 1, 13, 'M2'),
(14, 'DGT000014', 1, 1, 14, 'N3'),
(15, 'DGT000015', 1, 1, 15, 'O4'),
(16, 'DGT000016', 5, 8, 16, 'P5'),
(17, 'DGT000017', 1, 8, 17, 'Q6'),
(18, 'DGT000018', 1, 8, 18, 'R7'),
(19, 'DGT000019', 1, 8, 19, 'S8'),
(20, 'DGT000020', 1, 8, 20, 'T9'),
(21, 'DGT000021', 1, 8, 21, 'U0'),
(22, 'DGT000022', 1, 8, 22, 'V1'),
(23, 'DGT000023', 1, 8, 23, 'W2'),
(24, 'DGT000024', 1, 8, 24, 'X3');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `activo`
--
ALTER TABLE `activo`
  ADD CONSTRAINT `activo_ibfk_1` FOREIGN KEY (`Equipo`) REFERENCES `equipo` (`Id`),
  ADD CONSTRAINT `activo_ibfk_2` FOREIGN KEY (`Marca`) REFERENCES `marca` (`Id`),
  ADD CONSTRAINT `activo_ibfk_3` FOREIGN KEY (`Modelo`) REFERENCES `modelo` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
