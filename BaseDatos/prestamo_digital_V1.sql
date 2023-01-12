-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 30-11-2019 a las 19:01:03
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
-- Estructura de tabla para la tabla `accesorio`
--

DROP TABLE IF EXISTS `accesorio`;
CREATE TABLE IF NOT EXISTS `accesorio` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `A_Tipo` varchar(100) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COMMENT='Accesorios extras para prestar con un equipo, opcional';

--
-- Volcado de datos para la tabla `accesorio`
--

INSERT INTO `accesorio` (`Id`, `A_Tipo`) VALUES
(1, 'Ninguno'),
(2, 'Camara'),
(3, 'Cable de poder'),
(4, 'Cable de datos'),
(5, 'Mouse pad'),
(6, 'Estuche'),
(7, 'Microfono');

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COMMENT='Activos que se pueden prestar';

--
-- Volcado de datos para la tabla `activo`
--

INSERT INTO `activo` (`Id`, `Codigo`, `Equipo`, `Marca`, `Modelo`, `Serial`) VALUES
(1, 'DGT000001', 1, 1, 1, ' A1B2C3D4E5'),
(2, 'DGT000002', 1, 1, 2, 'E5F6G7H8'),
(3, 'DGT000003', 1, 1, 3, 'AA1BB2CC3DD4'),
(5, 'DGT000004', 1, 1, 4, 'EE5FF6GG7HH8'),
(7, 'DGT000006', 5, 8, 16, 'I1M2P3R4E5'),
(8, 'DGT000007', 5, 8, 16, 'P1R2I3N4T5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

DROP TABLE IF EXISTS `area`;
CREATE TABLE IF NOT EXISTS `area` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `Dependencia` varchar(100) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1 COMMENT='Facultades y departamentos de la ucp';

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`Id`, `Dependencia`) VALUES
(1, 'Rectoria'),
(2, 'Admisiones y Registro Academico'),
(3, 'Centro de Idiomas'),
(4, 'Investigaciones e Innovación'),
(5, 'Vicerrectoría Académica'),
(6, 'Centro de Graduados'),
(7, 'Prácticas Académicas'),
(8, 'Oficina de Mercadeo'),
(9, 'Centro de Innovación Educativa'),
(10, 'Vicerrectoría de Proyecto de Vida'),
(11, 'Área de Bienestar Social'),
(12, 'Centro de Familia'),
(13, 'Área de Desarrollo Humano'),
(14, 'Programa de Acompañamiento Académico'),
(15, 'Área de Expresión Cultural'),
(16, 'Área de Recreación y Deporte'),
(17, 'Pastoral Universitaria'),
(18, 'Gestión Financiera'),
(19, 'Oficina de Internacionalización y Relaciones Interinstitucionales'),
(20, 'Biblioteca Cardenal Darío Castrillón Hoyos'),
(21, 'Centro de Atención Psicológica'),
(22, 'Dirección Administrativa y Financiera'),
(23, 'Coordinación de Comunicaciones'),
(24, 'Gestión del Talento Humano'),
(25, 'Planeación y Calidad'),
(26, 'Gestion Tecnologica'),
(27, 'Gestión del Campus'),
(28, 'Secretaría General'),
(29, 'Proyección Social'),
(30, 'Recepción'),
(31, 'Decanatura de Arquitectura y Diseño'),
(32, 'Arquitectura'),
(33, 'Diseño Industrial'),
(34, 'Posgrados de Arquitectura y Diseño'),
(35, 'Talleres de diseño'),
(36, 'Decanatura de Ciencias Humanas, Sociales y de la Educación'),
(37, 'Centro de Medios'),
(38, 'Psicología'),
(39, 'Comunicación Social - Periodismo'),
(40, 'Licenciatura en Educación Religiosa'),
(41, 'Departamento de Humanidades'),
(42, 'Decanatura de Ciencias Económicas y Administrativas'),
(43, 'Administración de Empresas'),
(44, 'Economía'),
(45, 'Negocios Internacionales'),
(46, 'Programas de Mercadeo'),
(47, 'Tecnología en Gestión de Empresas Agroindustriales'),
(48, 'Punto de Bolsa Laboratorio de Econometría y Finanzas'),
(49, 'Decanatura de Ciencias Básicas e Ingeniería'),
(50, 'Ingeniería Industrial'),
(51, 'Ingeniería de Sistemas y Telecomunicaciones'),
(52, 'Tecnología en Desarrollo de Software'),
(53, 'Departamento de Ciencias Básicas'),
(54, 'Posgrados de Ciencias Humanas, Sociales y de la Educación'),
(55, 'Posgrados de Ciencias Económicas y Administrativas'),
(56, 'Posgrados de Ciencias Básicas e Ingeniería');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

DROP TABLE IF EXISTS `cargo`;
CREATE TABLE IF NOT EXISTS `cargo` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `Puesto` varchar(100) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1 COMMENT='Cargos de la ucp';

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`Id`, `Puesto`) VALUES
(1, 'Rector'),
(2, 'Auxiliar administrativo'),
(3, 'Coordinador/ra'),
(4, 'Profesional administrativo'),
(5, 'Director/ra'),
(6, 'Vicerrector'),
(7, 'Asistente'),
(8, 'Auxiliar de Postgrados'),
(9, 'Auxiliar de Pregrados'),
(10, 'Enfermera'),
(11, 'Lider'),
(12, 'Psicólogo/ga'),
(13, 'Auxiliar de Cartera'),
(14, 'Auxiliar contable'),
(15, 'Asistente de presupuesto'),
(16, 'Tesorera'),
(17, 'Recepcionista'),
(18, 'Decano/na'),
(19, 'Profesional de Apoyo'),
(20, 'Profesional'),
(21, 'Practicante'),
(22, 'Especialista'),
(23, 'Diseñador/ra'),
(24, 'Community manager'),
(25, 'Webmaster'),
(26, 'Administrador de Redes'),
(27, 'Jefe de Almacén'),
(28, 'Auxiliar de Archivo'),
(29, 'Secretaria general');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encargado`
--

DROP TABLE IF EXISTS `encargado`;
CREATE TABLE IF NOT EXISTS `encargado` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `Identificacion` varchar(100) NOT NULL,
  `E_Nombre` varchar(100) NOT NULL,
  `Area` int(10) NOT NULL,
  `Cargo` int(10) NOT NULL,
  `Oficina` int(10) NOT NULL,
  `Contacto` varchar(100) NOT NULL,
  `Correo` varchar(100) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `Area` (`Area`),
  KEY `Cargo` (`Cargo`),
  KEY `Oficina` (`Oficina`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COMMENT='Usuario que pueden prestar equipos';

--
-- Volcado de datos para la tabla `encargado`
--

INSERT INTO `encargado` (`Id`, `Identificacion`, `E_Nombre`, `Area`, `Cargo`, `Oficina`, `Contacto`, `Correo`) VALUES
(1, '1088298985', 'Jhon Edward Monroy Guevara', 26, 2, 3, '1023', 'jhon.monroy@ucp.edu.co'),
(2, '1234567890', 'Hethner Schneyder Rios Alzate', 26, 2, 3, '1024', 'hethner.rios@ucp.edu.co'),
(3, '1088320467', 'Daniel Cortes', 26, 21, 3, '0000', 'monitores@ucp.edu.co');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

DROP TABLE IF EXISTS `equipo`;
CREATE TABLE IF NOT EXISTS `equipo` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `Tipo` varchar(100) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COMMENT='Equipos que usa la ucp';

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`Id`, `Tipo`) VALUES
(1, 'Portatil'),
(2, 'Videobean'),
(3, 'Mouse'),
(4, 'Teclado'),
(5, 'Impresora'),
(6, 'Scaner'),
(7, 'Lector'),
(8, 'Switch'),
(9, 'Disco duro'),
(10, 'Cargador de portatil');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

DROP TABLE IF EXISTS `estado`;
CREATE TABLE IF NOT EXISTS `estado` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `Condicion` varchar(100) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COMMENT='Condiciones del prestamo';

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`Id`, `Condicion`) VALUES
(1, 'Entregado'),
(2, 'Devuelto'),
(3, 'No devuelto'),
(4, 'En mora'),
(5, 'Extendido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

DROP TABLE IF EXISTS `marca`;
CREATE TABLE IF NOT EXISTS `marca` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `N_Marca` varchar(100) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COMMENT='Marcas de equipo que usa la ucp';

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`Id`, `N_Marca`) VALUES
(1, 'Lenovo'),
(2, 'Dell'),
(3, 'Samsung'),
(4, 'Compaq'),
(5, 'Apple'),
(6, 'Toshiba'),
(7, 'Nec'),
(8, 'Hewlett-Packard'),
(9, 'D-link'),
(10, 'Asus');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelo`
--

DROP TABLE IF EXISTS `modelo`;
CREATE TABLE IF NOT EXISTS `modelo` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `N_Modelo` varchar(100) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1 COMMENT='Modelos de equipos usados por la ucp';

--
-- Volcado de datos para la tabla `modelo`
--

INSERT INTO `modelo` (`Id`, `N_Modelo`) VALUES
(1, 'ThinkPad_T490'),
(2, 'ThinkPad_L390'),
(3, 'ThinkPad_P52'),
(4, 'ThinkPad_L390_Yoga'),
(5, 'ThinkPad_P52s'),
(6, 'ThinkPad_L480'),
(7, 'ThinkPad_E490'),
(8, 'ThinkPad_X1 Carbon 6ta Gen'),
(9, 'ThinkPad_X390_Yoga'),
(10, 'ThinkPad_X390'),
(11, 'ThinkPad_P72'),
(12, 'ThinkPad_T490s'),
(13, 'ThinkPad_E480'),
(14, 'ThinkPad_X1 Extreme'),
(15, 'ThinkPad_L380'),
(16, 'LaserJet Pro P1102w'),
(17, 'Stream 14-ax003ns'),
(18, '15-bw007ns'),
(20, 'Pavilion 14-bk001ns'),
(21, 'ENVY 13-ad110ns'),
(22, 'Pavilion Power 15-cb032ns '),
(23, 'Spectre x360 13-ac001ns'),
(24, 'ENVY 17-ae101ns'),
(25, 'OMEN 15-ce002ns');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `observacion`
--

DROP TABLE IF EXISTS `observacion`;
CREATE TABLE IF NOT EXISTS `observacion` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `Detalles` varchar(100) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COMMENT='Detalles del prestamo para tener en cuanta, opcional';

--
-- Volcado de datos para la tabla `observacion`
--

INSERT INTO `observacion` (`Id`, `Detalles`) VALUES
(1, 'Se entrego completo'),
(2, 'Se entrego con cargador'),
(3, 'Se devolvió con cargador'),
(4, 'Se entrego sin cargador'),
(5, 'Se devolvió sin cargador'),
(6, 'Se entrego con accesorios'),
(7, 'Se entrego con cargador y accesorios'),
(8, 'Se entrego con cargador y sin accesorios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oficina`
--

DROP TABLE IF EXISTS `oficina`;
CREATE TABLE IF NOT EXISTS `oficina` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `Ubicacion` varchar(100) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COMMENT='Oficinas de la ucp';

--
-- Volcado de datos para la tabla `oficina`
--

INSERT INTO `oficina` (`Id`, `Ubicacion`) VALUES
(1, 'Aletheia 1er piso'),
(2, 'Aletheia 2do piso'),
(3, 'Aletheia 3er piso'),
(4, 'Kabai 1er piso'),
(5, 'Kabai 2do piso'),
(6, 'Kabai 3er piso'),
(7, 'Dabar 1er piso'),
(8, 'Dabar 2do piso'),
(9, 'Humanitas 1er piso'),
(10, 'Humanitas 2do piso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo`
--

DROP TABLE IF EXISTS `prestamo`;
CREATE TABLE IF NOT EXISTS `prestamo` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `Fecha` date NOT NULL,
  `Dependencia` varchar(100) NOT NULL DEFAULT 'Gestion Tecnologica',
  `Usuario` int(10) NOT NULL,
  `Razon` int(10) NOT NULL,
  `Activo` int(10) NOT NULL,
  `Accesorios` int(10) NOT NULL,
  `Encargado` int(10) NOT NULL,
  `Devolucion` date NOT NULL,
  `Estado` int(10) NOT NULL,
  `Observaciones` int(10) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `Usuario` (`Usuario`),
  KEY `Razon` (`Razon`),
  KEY `Activo` (`Activo`),
  KEY `Accesorios` (`Accesorios`),
  KEY `Encargado` (`Encargado`),
  KEY `Estado` (`Estado`),
  KEY `Observaciones` (`Observaciones`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 COMMENT='Registro de prestamos';

--
-- Volcado de datos para la tabla `prestamo`
--

INSERT INTO `prestamo` (`Id`, `Fecha`, `Dependencia`, `Usuario`, `Razon`, `Activo`, `Accesorios`, `Encargado`, `Devolucion`, `Estado`, `Observaciones`) VALUES
(1, '2019-11-19', 'Gestion Tecnologica', 1, 1, 1, 1, 1, '2019-11-20', 1, 1),
(2, '2019-11-20', 'Gestion Tecnologica', 2, 2, 2, 2, 1, '2019-12-05', 5, 7),
(3, '2019-11-20', 'Gestion Tecnologica', 3, 8, 7, 3, 1, '2019-11-30', 1, 6),
(4, '2019-11-25', 'Gestion Tecnologica', 4, 6, 5, 2, 1, '2019-12-06', 5, 7),
(5, '2019-11-26', 'Gestion Tecnologica', 7, 9, 8, 1, 2, '2019-11-30', 2, 4),
(8, '2019-11-28', 'Gestion Tecnologica', 11, 7, 7, 5, 2, '2019-12-02', 5, 6),
(12, '2019-11-26', 'Gestion Tecnologica', 1, 1, 1, 1, 1, '2019-12-01', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `razon`
--

DROP TABLE IF EXISTS `razon`;
CREATE TABLE IF NOT EXISTS `razon` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `Motivos` varchar(100) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 COMMENT='Motivos para solicitar un prestamo de equipo';

--
-- Volcado de datos para la tabla `razon`
--

INSERT INTO `razon` (`Id`, `Motivos`) VALUES
(1, 'Presentacion'),
(2, 'Reunion'),
(3, 'Videoconferencia'),
(4, 'Telepresencia'),
(5, 'Evaluacion'),
(6, 'Registro'),
(7, 'Investigacion'),
(8, 'Inscripcion'),
(9, 'Clase'),
(10, 'Examen'),
(11, 'Practica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `Identificacion` varchar(100) NOT NULL,
  `U_Nombre` varchar(100) NOT NULL,
  `Area` int(10) NOT NULL,
  `Cargo` int(10) NOT NULL,
  `Oficina` int(10) NOT NULL,
  `Contacto` varchar(100) NOT NULL,
  `Correo` varchar(100) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `Area` (`Area`),
  KEY `Cargo` (`Cargo`),
  KEY `Oficina` (`Oficina`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 COMMENT='Usuarios que pueden solicitar un equipo';

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Id`, `Identificacion`, `U_Nombre`, `Area`, `Cargo`, `Oficina`, `Contacto`, `Correo`) VALUES
(1, '18511519', 'Jhon Fredy Franco Delgado', 1, 1, 2, '1012', 'Jhon.franco@ucp.edu.co'),
(2, '43085332', 'Marleny del socorro Serna Sabogal', 1, 2, 2, '1012', 'marleny.serna@ucp.edu.co'),
(3, '42160376', 'Diana Constanza Patiño Gutierrez', 2, 3, 2, '1017', 'diana.patiño@ucp.edu.co'),
(4, '1087993363', 'Francisledy Valle', 2, 2, 2, '1008', 'francisledy.valle@ucp.edu.co'),
(5, '1087559195', 'Carolina Betancur Valencia', 2, 2, 2, '1046', 'carolina.betancur@ucp.edu.co'),
(6, '1088011631', 'Héctor Fabio Giraldo Arango', 2, 2, 2, '1045', 'héctor.giraldo@ucp.edu.co'),
(7, '1088291223', 'Vanessa Ocampo López', 2, 2, 2, '1056', 'vanessa.ocampo@ucp.edu.co'),
(8, '42148228', 'Luz Adriana Gallón Uribe', 3, 3, 9, '2011', 'adriana.gallón@ucp.edu.co'),
(9, '1087993890', 'Juan Sebastian Gómez', 3, 4, 9, '4000', 'sebastian.gómez@ucp.edu.co'),
(10, '1047379752', 'Alejandro David Julio Rhenals', 3, 4, 9, '4000', 'alejandro.rhenals@ucp.edu.co'),
(11, '1054918612', 'Jhon James Galvez Corrales', 3, 4, 9, '4000', 'jhon.galvez@ucp.edu.co'),
(12, '1112765967', 'María Luisa Nieto Taborda', 4, 5, 10, '5676', 'maria.nieto@ucp.edu.co');

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

--
-- Filtros para la tabla `encargado`
--
ALTER TABLE `encargado`
  ADD CONSTRAINT `encargado_ibfk_1` FOREIGN KEY (`Area`) REFERENCES `area` (`Id`),
  ADD CONSTRAINT `encargado_ibfk_2` FOREIGN KEY (`Cargo`) REFERENCES `cargo` (`Id`),
  ADD CONSTRAINT `encargado_ibfk_3` FOREIGN KEY (`Oficina`) REFERENCES `oficina` (`Id`);

--
-- Filtros para la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD CONSTRAINT `prestamo_ibfk_1` FOREIGN KEY (`Usuario`) REFERENCES `usuario` (`Id`),
  ADD CONSTRAINT `prestamo_ibfk_2` FOREIGN KEY (`Razon`) REFERENCES `razon` (`Id`),
  ADD CONSTRAINT `prestamo_ibfk_3` FOREIGN KEY (`Observaciones`) REFERENCES `observacion` (`Id`),
  ADD CONSTRAINT `prestamo_ibfk_4` FOREIGN KEY (`Activo`) REFERENCES `activo` (`Id`),
  ADD CONSTRAINT `prestamo_ibfk_5` FOREIGN KEY (`Accesorios`) REFERENCES `accesorio` (`Id`),
  ADD CONSTRAINT `prestamo_ibfk_6` FOREIGN KEY (`Encargado`) REFERENCES `encargado` (`Id`),
  ADD CONSTRAINT `prestamo_ibfk_7` FOREIGN KEY (`Estado`) REFERENCES `estado` (`Id`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`Area`) REFERENCES `area` (`Id`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`Cargo`) REFERENCES `cargo` (`Id`),
  ADD CONSTRAINT `usuario_ibfk_3` FOREIGN KEY (`Oficina`) REFERENCES `oficina` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
