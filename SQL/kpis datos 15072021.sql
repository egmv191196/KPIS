-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-07-2021 a las 01:02:03
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `kpis`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogo_conceptos`
--

CREATE TABLE `catalogo_conceptos` (
  `id_Concepto` bigint(20) NOT NULL,
  `Nombre` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `catalogo_conceptos`
--

INSERT INTO `catalogo_conceptos` (`id_Concepto`, `Nombre`) VALUES
(1, 'Proyecto ejecutivo'),
(2, 'Supervisión'),
(3, 'Construcción'),
(4, 'Proyectos geométricos'),
(5, 'Proyectos estructurales'),
(6, 'Geotecnia'),
(7, 'Impacto ambiental'),
(8, 'Topografía'),
(9, 'Diseño de pavimentos'),
(10, 'Batimetría'),
(11, 'Posicionamiento GPS'),
(12, 'Fotogrametría con Dron'),
(13, 'Estudios topohidráulicos'),
(14, 'Levantamientos'),
(15, 'Estudios de retroflexión de señalamientos'),
(16, 'Estudios hidrológicos'),
(17, 'Supervisión de obras'),
(18, 'Obra civil');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogo_indicadores`
--

CREATE TABLE `catalogo_indicadores` (
  `id_Dat` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Nombre` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Permiso` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Periodicidad` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `catalogo_indicadores`
--

INSERT INTO `catalogo_indicadores` (`id_Dat`, `Nombre`, `Permiso`, `Periodicidad`) VALUES
('R10A', 'Numero de bajas', 'A', 'M'),
('R11A', 'Numero de horas extras', 'A', 'Q'),
('R12A', 'CXP', 'F', 'S'),
('R13A', 'CXC', 'F', 'S'),
('R14A', 'Costo acumulado por proyecto', 'F', 'M'),
('R15A', 'Reporte de facturacion', 'F', 'M'),
('R16A', 'Monto CXP', 'F', 'S'),
('R17A', 'Monto CXC', 'F', 'S'),
('R18A', 'Reporte de clientes', 'F', 'Q'),
('R19A', 'Saldo en cuentas bancaria', 'F', 'S'),
('R1A', 'Orden de trabajo recibida', 'M', 'Q'),
('R1B', 'Orden de trabajo atendida', 'M', 'Q'),
('R20A', 'Reporte de impuestos', 'F', 'M'),
('R21A', 'Monto consumo efectivale', 'F', 'S'),
('R22A', 'Monto cartera vencida', 'F', 'S'),
('R23A', 'Reporte de avances por proyect', 'T', 'S'),
('R24A', 'Plan de trabajo ejecutado', 'T', 'S'),
('R25A', 'Reporte de Kms por concepto', 'T', 'S'),
('R28A', 'Inconformidad por proyecto', 'T', 'S'),
('R29A', 'Reporte de entrega cumplido', 'T', 'S'),
('R2A', 'Calificacion encuesta', 'A', 'M'),
('R30A', 'Reporte de estimacion pendient', 'F', 'S'),
('R3A', 'Numero de propuestas entregada', 'A', 'M'),
('R3B', 'Numero de propuestas implement', 'A', 'M'),
('R4A', 'Numero de vacantes totales', 'A', 'U'),
('R4B', 'Numero de vacantes ocupadas', 'A', 'M'),
('R5A', 'Reportes de nomina', 'A', 'Q'),
('R6A', 'Numero de puestos', 'A', 'U'),
('R6B', 'Numero de descriptivos realiza', 'A', 'Q');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_Cliente` bigint(20) NOT NULL,
  `Nombre` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `RFC` varchar(30) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `Correo` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Telefono` bigint(20) NOT NULL,
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_Cliente`, `Nombre`, `RFC`, `Correo`, `Telefono`, `Estado`) VALUES
(1, 'Jorge Lopez 23', '124124868', 'kjhihi@gmail.com', 3225232151465, 1),
(2, 'Ternium', 'asdasdasd', 'dasdas@gmail.com', 123219, 1),
(3, 'sas', 'asfdsfsdaf514498', 'asdada@gmail.com', 21321, 1),
(4, 'El numero 3 ', 'asdasdasd', 'asdada@gmail.com', 123213213, 1),
(5, 'Ternium', 'asfdsfsdaf514498', 'asdada@gmail.com', 312321, 1),
(6, 'Ternium221', 'asdasdasd', 'asdasd@gmail.com', 21321321, 1),
(7, 'Ternium', 'asfdsfsdaf514498', 'dasdas@gmail.com', 321213213, 1),
(8, 'Home depot|', 'sadsadsad', '321321@gmail.com', 1235456, 1),
(9, 'Office', 'sadasdasdas', 'asdasd@gmail.com', 123213213, 1),
(10, 'Ternium12212', 'asdasdasd', 'dasdasd@gmail.com', 213213213, 1),
(11, 'dasdas', '12321', 'sdasf@gmail.com', 123213213, 1),
(12, 'dasdas', '12321', 'asdada@gmail.com', 12321321321, 1),
(50, 'Huawei', '', 'lae.jrv@gmail.com', 231231315616, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conceptos`
--

CREATE TABLE `conceptos` (
  `id_Concepto` int(1) NOT NULL,
  `num_Concepto` int(11) NOT NULL,
  `Nombre` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Valor` int(11) NOT NULL,
  `Avance` int(11) NOT NULL,
  `clave_Proyecto` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `conceptos`
--

INSERT INTO `conceptos` (`id_Concepto`, `num_Concepto`, `Nombre`, `Valor`, `Avance`, `clave_Proyecto`) VALUES
(1, 1, 'Levantamientos', 15, 0, 'TEC-102'),
(2, 2, 'Topografía', 25, 100, 'TEC-102'),
(3, 3, 'Batimetría', 35, 0, 'TEC-102'),
(4, 4, 'Construcción', 25, 0, 'TEC-102'),
(5, 1, 'Topografía', 35, 0, 'Tabasco-102'),
(6, 2, 'Levantamientos', 10, 0, 'Tabasco-102'),
(7, 3, 'Construcción', 50, 0, 'Tabasco-102'),
(8, 4, 'Batimetría', 5, 0, 'Tabasco-102'),
(9, 1, 'Batimetría', 25, 0, 'asdsad'),
(10, 2, 'Geotecnia', 30, 0, 'asdsad'),
(11, 3, 'Levantamientos', 10, 0, 'asdsad'),
(12, 4, 'Geotecnia', 15, 0, 'asdsad'),
(13, 5, 'Construcción', 20, 0, 'asdsad'),
(14, 1, 'Construcción', 30, 0, 'LT-012'),
(15, 2, 'Levantamientos', 35, 0, 'LT-012'),
(16, 3, 'Topografía', 35, 0, 'LT-012'),
(17, 1, 'Topografia', 15, 0, 'Jalisco'),
(18, 2, 'Obra Civil', 25, 15, 'Jalisco'),
(19, 3, 'LEvantamientos', 60, 0, 'Jalisco'),
(20, 1, 'Levantamiento', 15, 0, 'Sin-1058'),
(21, 2, 'BAtimetria', 25, 0, 'Sin-1058'),
(22, 3, 'Topografia', 35, 0, 'Sin-1058'),
(23, 4, 'Obra Civil', 25, 0, 'Sin-1058');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id_Proveedor` bigint(20) NOT NULL,
  `Nombre` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `RFC` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Correo` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Telefono` bigint(20) NOT NULL,
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_Proveedor`, `Nombre`, `RFC`, `Correo`, `Telefono`, `Estado`) VALUES
(1, 'Como Das ', '', 'fdsfdsfsd@gmail.com', 1232142141, 1),
(2, 'Ternium', 'asfdsfsdaf514498', 'asdada@gmail.com', 21321321, 1),
(3, 'asdasd', '', 'asdada@gmail.com', 123213, 1),
(4, 'dasdas', 'asfdsfsdaf514498', 'dasdas@gmail.com', 123213, 1),
(5, 'Ternium2', 'asdasdasd', '321321', 21321321, 1),
(6, 'Ternium', 'asfdsfsdaf514498', 'asdada@gmail.com', 12321321, 1),
(7, 'Home Depot', 'asdasda123213', '321321@gmail.com', 123456, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE `proyecto` (
  `clave_Proyecto` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Nombre` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `fecha_Inicio` date NOT NULL,
  `fecha_Fin` date NOT NULL,
  `monto_Contrato` double NOT NULL,
  `id_Presupuesto` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Estado` int(11) NOT NULL,
  `id_Cliente` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `proyecto`
--

INSERT INTO `proyecto` (`clave_Proyecto`, `Nombre`, `fecha_Inicio`, `fecha_Fin`, `monto_Contrato`, `id_Presupuesto`, `Estado`, `id_Cliente`) VALUES
('asdsad', 'Zaragoza', '2021-07-12', '2021-07-12', 100000, 'Pres-102', 1, 8),
('Jalisco', 'Construccion Tlaquepaque', '2020-07-10', '2020-07-10', 100000, 'Tla-105', 1, 3),
('LT-012', 'Huawei Playa del carmen', '2021-07-05', '2021-07-05', 100000, 'PR-155', 1, 50),
('Sin-1058', 'Sinaloa Carretera', '2020-10-10', '2020-10-10', 250000, 'Sin-pres', 1, 5),
('Tabasco-102', 'Supervisión Tabasco', '2021-05-12', '2021-05-12', 50000, 'Tab-02', 1, 8),
('TEC-102', 'Mercado de Tecamachalco', '2020-05-06', '2020-05-06', 100000, 'tec-02-pres', 1, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registroindicadores`
--

CREATE TABLE `registroindicadores` (
  `id_registro` int(11) NOT NULL,
  `Usuario` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `id_Req` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Fecha` date NOT NULL,
  `Valor` int(11) NOT NULL,
  `año` year(4) NOT NULL,
  `SQM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `registroindicadores`
--

INSERT INTO `registroindicadores` (`id_registro`, `Usuario`, `id_Req`, `Fecha`, `Valor`, `año`, `SQM`) VALUES
(1, 'JosaGG', 'R4A', '2021-05-18', 25, 2021, 5),
(2, 'JosaGG', 'R4A', '2021-04-20', 8, 2021, 3),
(4, 'JosaGG', 'R4B', '2021-04-24', 25, 2021, 4),
(5, 'JosaGG', 'R4B', '2021-03-24', 20, 2021, 3),
(6, 'JosaGG', 'R4B', '2021-02-24', 15, 2021, 2),
(7, 'JosaGG', 'R4B', '2021-01-24', 19, 2021, 1),
(8, 'JosaGG', 'R4B', '2020-12-24', 20, 2020, 12),
(9, 'JosaGG', 'R4B', '2020-11-24', 15, 2020, 11),
(10, 'JosaGG', 'R6A', '2021-05-20', 20, 2021, 10),
(11, 'JosaGG', 'R6B', '2021-05-22', 17, 2021, 10),
(12, 'JosaGG', 'R6B', '2021-05-02', 15, 2021, 9),
(13, 'JosaGG', 'R6B', '2021-04-22', 13, 2021, 8),
(14, 'JosaGG', 'R6B', '2021-04-02', 11, 2021, 7),
(15, 'JosaGG', 'R6B', '2021-03-22', 10, 2021, 6),
(16, 'JosaGG', 'R4B', '2021-05-22', 20, 2021, 5),
(17, 'JosaGG', 'R10A', '2021-05-23', 0, 2021, 5),
(18, 'JosaGG', 'R10A', '2021-04-23', 5, 2021, 4),
(19, 'JosaGG', 'R10A', '2021-03-23', 3, 2021, 3),
(20, 'JosaGG', 'R10A', '2021-02-23', 0, 2021, 2),
(21, 'JosaGG', 'R10A', '2021-01-23', 1, 2021, 1),
(22, 'JosaGG', 'R10A', '2020-12-23', 2, 2020, 12),
(23, 'JosaGG', 'R10A', '2020-11-23', 0, 2020, 11),
(24, 'JosaGG', 'R10A', '2020-10-23', 2, 2020, 10),
(25, 'JosaGG', 'R10A', '2020-09-23', 0, 2020, 9),
(26, 'JosaGG', 'R10A', '2020-08-23', 1, 2020, 8),
(28, 'JosaGG', 'R3A', '2021-04-27', 5, 2021, 4),
(29, 'JosaGG', 'R3A', '2021-03-27', 7, 2021, 3),
(30, 'JosaGG', 'R3A', '2021-02-27', 9, 2021, 2),
(31, 'JosaGG', 'R3A', '2021-01-27', 3, 2021, 1),
(33, 'JosaGG', 'R3B', '2021-04-27', 2, 2021, 4),
(34, 'JosaGG', 'R3B', '2021-03-27', 1, 2021, 3),
(35, 'JosaGG', 'R3B', '2021-02-27', 3, 2021, 2),
(36, 'JosaGG', 'R3B', '2021-01-27', 0, 2021, 1),
(39, 'JosaGG', 'R3B', '2021-05-27', 2, 2021, 5),
(40, 'JosaGG', 'R3A', '2021-05-27', 10, 2021, 5),
(41, 'JosaGG', 'R1A', '2021-05-27', 10, 2021, 10),
(42, 'JosaGG', 'R1A', '2021-04-27', 8, 2021, 9),
(43, 'JosaGG', 'R1A', '2021-03-27', 9, 2021, 8),
(44, 'JosaGG', 'R1A', '2021-02-27', 3, 2021, 7),
(45, 'JosaGG', 'R1A', '2021-01-27', 5, 2021, 6),
(46, 'JosaGG', 'R1B', '2021-05-27', 9, 2021, 10),
(47, 'JosaGG', 'R1B', '2021-04-27', 8, 2021, 9),
(48, 'JosaGG', 'R1B', '2021-03-27', 3, 2021, 8),
(49, 'JosaGG', 'R1B', '2021-02-27', 2, 2021, 7),
(50, 'JosaGG', 'R1B', '2021-01-27', 3, 2021, 6),
(51, 'JosaGG', 'R5A', '2021-05-31', 15, 2021, 10),
(52, 'JosaGG', 'R5A', '2021-05-20', 3, 2021, 9),
(53, 'JosaGG', 'R5A', '2021-04-30', 0, 2021, 8),
(54, 'JosaGG', 'R5A', '2021-04-12', 2, 2021, 7),
(55, 'JosaGG', 'R5A', '2021-03-31', 10, 2021, 6),
(56, 'JosaGG', 'R5A', '2021-03-10', 1, 2021, 5),
(57, 'JosaGG', 'R4B', '2021-06-03', 18, 2021, 6),
(58, 'JosaGG', 'R6B', '2021-06-03', 20, 2021, 11),
(59, 'JosaGG', 'R10A', '2021-06-03', 3, 2021, 6),
(60, 'JosaGG', 'R5A', '2020-11-23', 15, 2021, 11),
(61, 'JosaGG', 'R1A', '2020-11-23', 18, 2021, 11),
(62, 'JosaGG', 'R3B', '2021-06-03', 5, 2021, 6),
(63, 'JosaGG', 'R3A', '2021-06-03', 10, 2021, 6),
(64, 'JosaGG', 'R1B', '2020-11-23', 10, 2021, 11),
(65, 'LeoGC', 'R15A', '2021-05-05', 150000, 2021, 5),
(66, 'LeoGC', 'R15A', '2021-04-05', 300000, 2021, 4),
(67, 'LeoGC', 'R15A', '2021-03-05', 200000, 2021, 3),
(68, 'LeoGC', 'R15A', '2021-02-05', 300000, 2021, 2),
(69, 'LeoGC', 'R15A', '2021-01-05', 200000, 2021, 1),
(72, 'LeoGC', 'R15A', '2021-06-05', 300000, 2021, 6),
(73, 'LeoGC', 'R19A', '2021-06-03', 80000, 2021, 22),
(74, 'LeoGC', 'R19A', '2021-05-27', 75000, 2021, 21),
(75, 'LeoGC', 'R19A', '2021-05-20', 50000, 2021, 20),
(76, 'LeoGC', 'R19A', '2021-05-13', 100000, 2021, 19),
(77, 'LeoGC', 'R19A', '2021-05-04', 90000, 2021, 18),
(78, 'LeoGC', 'R19A', '2021-06-10', 90000, 2021, 23),
(79, 'LeoGC', 'R16A', '2021-06-03', 30000, 2021, 22),
(80, 'LeoGC', 'R16A', '2021-05-27', 45000, 2021, 21),
(81, 'LeoGC', 'R16A', '2021-05-20', 15000, 2021, 20),
(82, 'LeoGC', 'R16A', '2021-05-13', 25000, 2021, 19),
(83, 'LeoGC', 'R16A', '2021-05-05', 18000, 2021, 18),
(84, 'LeoGC', 'R16A', '2021-06-10', 25000, 2021, 23),
(85, 'LeoGC', 'R17A', '2021-06-03', 40000, 2021, 22),
(86, 'LeoGC', 'R17A', '2021-05-27', 20000, 2021, 21),
(87, 'LeoGC', 'R17A', '2021-05-20', 35000, 2021, 20),
(88, 'LeoGC', 'R17A', '2021-05-13', 25000, 2021, 19),
(89, 'LeoGC', 'R17A', '2021-05-06', 15000, 2021, 18),
(90, 'LeoGC', 'R21A', '2021-06-03', 23000, 2021, 22),
(91, 'LeoGC', 'R21A', '2021-05-27', 5000, 2021, 21),
(92, 'LeoGC', 'R21A', '2021-05-20', 15000, 2021, 20),
(93, 'LeoGC', 'R21A', '2021-05-13', 15000, 2021, 19),
(94, 'LeoGC', 'R21A', '2021-05-06', 10000, 2021, 18),
(95, 'LeoGC', 'R22A', '2021-06-03', 35000, 2021, 22),
(96, 'LeoGC', 'R22A', '2021-05-27', 25000, 2021, 21),
(97, 'LeoGC', 'R22A', '2021-05-20', 19000, 2021, 20),
(98, 'LeoGC', 'R22A', '2021-05-13', 22000, 2021, 19),
(99, 'LeoGC', 'R22A', '2021-05-06', 17000, 2021, 18),
(100, 'LeoGC', 'R20A', '2021-05-28', 10000, 2021, 5),
(101, 'LeoGC', 'R20A', '2021-04-28', 25000, 2021, 4),
(102, 'LeoGC', 'R20A', '2021-03-28', 15000, 2021, 3),
(103, 'LeoGC', 'R20A', '2021-02-28', 8000, 2021, 2),
(104, 'LeoGC', 'R20A', '2021-01-28', 16000, 2021, 1),
(105, 'LeoGC', 'R20A', '2021-06-12', 15000, 2021, 6),
(106, 'JosaGG', 'R6B', '2021-06-19', 20, 2021, 12),
(107, 'JosaGG', 'R1A', '2021-06-19', 15, 2021, 12),
(108, 'JosaGG', 'R1B', '2021-06-19', 12, 2021, 12),
(109, 'JosaGG', 'R5A', '2021-06-19', 8, 2021, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Usuario` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Nombre` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Password` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Cargo` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Area` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Usuario`, `Nombre`, `Password`, `Cargo`, `Area`) VALUES
('EdgarICC', 'Edgar ', '123456', 'Admin', 'Sistemas'),
('EsmeGT', 'Esmeralda', '123456', 'GT', 'Gerencia Técnica'),
('JosaGG', 'Josafath', '123456', 'GG', 'Gerencia General'),
('LeoGC', 'Leonardo', '123456', 'GC', 'Gerencia Comercial');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `catalogo_conceptos`
--
ALTER TABLE `catalogo_conceptos`
  ADD PRIMARY KEY (`id_Concepto`);

--
-- Indices de la tabla `catalogo_indicadores`
--
ALTER TABLE `catalogo_indicadores`
  ADD PRIMARY KEY (`id_Dat`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_Cliente`);

--
-- Indices de la tabla `conceptos`
--
ALTER TABLE `conceptos`
  ADD PRIMARY KEY (`id_Concepto`),
  ADD KEY `IX_Relationship20` (`clave_Proyecto`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_Proveedor`);

--
-- Indices de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD PRIMARY KEY (`clave_Proyecto`),
  ADD KEY `IX_Solicita` (`id_Cliente`);

--
-- Indices de la tabla `registroindicadores`
--
ALTER TABLE `registroindicadores`
  ADD PRIMARY KEY (`id_registro`),
  ADD KEY `IX_Relationship6` (`Usuario`),
  ADD KEY `IX_Relationship7` (`id_Req`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_Cliente` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `conceptos`
--
ALTER TABLE `conceptos`
  MODIFY `id_Concepto` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_Proveedor` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `registroindicadores`
--
ALTER TABLE `registroindicadores`
  MODIFY `id_registro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `conceptos`
--
ALTER TABLE `conceptos`
  ADD CONSTRAINT `Tiene` FOREIGN KEY (`clave_Proyecto`) REFERENCES `proyecto` (`clave_Proyecto`);

--
-- Filtros para la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD CONSTRAINT `Solicita` FOREIGN KEY (`id_Cliente`) REFERENCES `cliente` (`id_Cliente`);

--
-- Filtros para la tabla `registroindicadores`
--
ALTER TABLE `registroindicadores`
  ADD CONSTRAINT `Registra` FOREIGN KEY (`Usuario`) REFERENCES `usuario` (`Usuario`),
  ADD CONSTRAINT `necesita` FOREIGN KEY (`id_Req`) REFERENCES `catalogo_indicadores` (`id_Dat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
