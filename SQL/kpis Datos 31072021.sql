-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-07-2021 a las 08:48:03
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogo_indicadores`
--

CREATE TABLE `catalogo_indicadores` (
  `id_Dat` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Nombre` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Permiso` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Periodicidad` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `catalogo_indicadores`
--

INSERT INTO `catalogo_indicadores` (`id_Dat`, `Nombre`, `Permiso`, `Periodicidad`) VALUES
('K01', 'Proyecto ejecutivo', 'T', 'S'),
('K02', 'Supervision', 'T', 'S'),
('K03', 'Construccion', 'T', 'S'),
('K04', 'Proyectos Geometricos', 'T', 'S'),
('K05', 'Proyectos Estructurales', 'T', 'S'),
('K06', 'Geotecnia', 'T', 'S'),
('K07', 'Impacto Ambiental', 'T', 'S'),
('K08', 'Topografia', 'T', 'S'),
('K09', 'Diseño de Pavimentos', 'T', 'S'),
('K10', 'Batimetria', 'T', 'S'),
('K11', 'Posicionamiento GPS', 'T', 'S'),
('K12', 'Fotogrametria con Dron', 'T', 'S'),
('K13', 'Estudios Topohidraulicos', 'T', 'S'),
('K14', 'Levantamientos', 'T', 'S'),
('K15', 'Estudios de retroflexion de señalamientos', 'T', 'S'),
('K16', 'Estudios Hidrologicos', 'T', 'S'),
('K17', 'Supervision de obras', 'T', 'S'),
('K18', 'Obra civil', 'T', 'S'),
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
('R27A', 'Retrabajos', 'T', 'S'),
('R28A', 'Inconformidad por proyecto', 'T', 'S'),
('R29A', 'Entregas programadas', 'T', 'S'),
('R29B', 'Entregas cumplidas', 'T', 'S'),
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conceptos`
--

CREATE TABLE `conceptos` (
  `id_Concepto` int(11) NOT NULL,
  `num_Concepto` int(11) NOT NULL,
  `Nombre` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Valor` int(11) NOT NULL,
  `Avance` int(11) NOT NULL,
  `clave_Proyecto` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

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
  `monto_Gastado` double NOT NULL,
  `monto_Pagado` double NOT NULL,
  `id_Presupuesto` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Estado` int(11) NOT NULL,
  `id_Cliente` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registroindicadores`
--

CREATE TABLE `registroindicadores` (
  `id_registro` int(11) NOT NULL,
  `Usuario` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `id_Req` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Fecha` date NOT NULL,
  `Valor` double NOT NULL,
  `año` year(4) NOT NULL,
  `SQM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `registroindicadores`
--

INSERT INTO `registroindicadores` (`id_registro`, `Usuario`, `id_Req`, `Fecha`, `Valor`, `año`, `SQM`) VALUES
(1, 'GC', 'R17A', '2021-07-30', 1369056.26, 2021, 1),
(2, 'GC', 'R17A', '2021-07-30', 1347573.48, 2021, 2),
(3, 'GC', 'R17A', '2021-07-30', 1378681.88, 2021, 3),
(4, 'GC', 'R17A', '2021-07-30', 1185945.78, 2021, 4),
(5, 'GC', 'R17A', '2021-07-30', 1174345.78, 2021, 5),
(6, 'GC', 'R17A', '2021-07-30', 1352383.44, 2021, 6),
(7, 'GC', 'R17A', '2021-07-30', 1272060.66, 2021, 7),
(8, 'GC', 'R17A', '2021-07-30', 1060224.94, 2021, 8),
(9, 'GC', 'R17A', '2021-07-30', 1071704.94, 2021, 9),
(10, 'GC', 'R17A', '2021-07-30', 1047112.94, 2021, 10),
(11, 'GC', 'R17A', '2021-07-30', 1323935.8, 2021, 11),
(12, 'GC', 'R17A', '2021-07-30', 1148604.69, 2021, 12),
(13, 'GC', 'R17A', '2021-07-30', 933596.87, 2021, 14),
(14, 'GC', 'R17A', '2021-07-30', 1717367.35, 2021, 15),
(15, 'GC', 'R17A', '2021-07-30', 1638162.03, 2021, 16),
(16, 'GC', 'R17A', '2021-07-30', 11791697, 2021, 18),
(17, 'GC', 'R17A', '2021-07-30', 11791697, 2021, 19),
(18, 'GC', 'R17A', '2021-07-30', 11703407.31, 2021, 20),
(19, 'GC', 'R17A', '2021-07-30', 10458500.28, 2021, 21),
(20, 'GC', 'R17A', '2021-07-30', 10531662.84, 2021, 22),
(21, 'GC', 'R17A', '2021-07-30', 10514318.83, 2021, 23),
(22, 'GC', 'R17A', '2021-07-30', 8888954.77, 2021, 24),
(23, 'GC', 'R17A', '2021-07-30', 8888954.77, 2021, 25),
(24, 'GC', 'R17A', '2021-07-30', 7683609.67, 2021, 26),
(25, 'GC', 'R16A', '2021-07-30', 989460.19, 2021, 1),
(26, 'GC', 'R16A', '2021-07-30', 987460.19, 2021, 2),
(27, 'GC', 'R16A', '2021-07-30', 1145187.07, 2021, 3),
(28, 'GC', 'R16A', '2021-07-30', 1145187.07, 2021, 4),
(29, 'GC', 'R16A', '2021-07-30', 1145187.07, 2021, 5),
(30, 'GC', 'R16A', '2021-07-30', 1145187.07, 2021, 6),
(31, 'GC', 'R16A', '2021-07-30', 1145187.07, 2021, 7),
(32, 'GC', 'R16A', '2021-07-30', 1142687.07, 2021, 8),
(33, 'GC', 'R16A', '2021-07-30', 681847.19, 2021, 9),
(34, 'GC', 'R16A', '2021-07-30', 671847.19, 2021, 10),
(35, 'GC', 'R16A', '2021-07-30', 705974.24, 2021, 11),
(36, 'GC', 'R16A', '2021-07-30', 645974.24, 2021, 12),
(37, 'GC', 'R16A', '2021-07-30', 525379.89, 2021, 14),
(38, 'GC', 'R16A', '2021-07-30', 525379.89, 2021, 15),
(39, 'GC', 'R16A', '2021-07-30', 600165.65, 2021, 16),
(40, 'GC', 'R16A', '2021-07-30', 600165.65, 2021, 18),
(41, 'GC', 'R16A', '2021-07-30', 600165.65, 2021, 19),
(42, 'GC', 'R16A', '2021-07-30', 598665.65, 2021, 20),
(43, 'GC', 'R16A', '2021-07-30', 598665.65, 2021, 21),
(44, 'GC', 'R16A', '2021-07-30', 540079.81, 2021, 22),
(45, 'GC', 'R16A', '2021-07-30', 598665.65, 2021, 23),
(46, 'GC', 'R16A', '2021-07-30', 405666.73, 2021, 24),
(47, 'GC', 'R16A', '2021-07-30', 336232.24, 2021, 25),
(48, 'GC', 'R16A', '2021-07-30', 336232.24, 2021, 26),
(49, 'GC', 'R19A', '2021-07-30', 117871.71, 2021, 1),
(50, 'GC', 'R19A', '2021-07-30', 50427.43, 2021, 2),
(51, 'GC', 'R19A', '2021-07-30', 19608.79, 2021, 3),
(52, 'GC', 'R19A', '2021-07-30', 10198.58, 2021, 4),
(53, 'GC', 'R19A', '2021-07-30', 1095.2, 2021, 5),
(54, 'GC', 'R19A', '2021-07-30', 141848.24, 2021, 6),
(55, 'GC', 'R19A', '2021-07-30', 68409.3, 2021, 7),
(56, 'GC', 'R19A', '2021-07-30', 128070.59, 2021, 8),
(57, 'GC', 'R19A', '2021-07-30', 67143.53, 2021, 9),
(58, 'GC', 'R19A', '2021-07-30', 16160.41, 2021, 10),
(59, 'GC', 'R19A', '2021-07-30', 21043.61, 2021, 11),
(60, 'GC', 'R19A', '2021-07-30', 1598245.4, 2021, 12),
(61, 'GC', 'R19A', '2021-07-30', 149595.17, 2021, 13),
(62, 'GC', 'R19A', '2021-07-30', 51917.22, 2021, 14),
(63, 'GC', 'R19A', '2021-07-30', 2185.26, 2021, 15),
(64, 'GC', 'R19A', '2021-07-30', 38294.07, 2021, 16),
(65, 'GC', 'R19A', '2021-07-30', 19856.86, 2021, 18),
(66, 'GC', 'R19A', '2021-07-30', 3268.29, 2021, 19),
(67, 'GC', 'R19A', '2021-07-30', 4284.46, 2021, 20),
(68, 'GC', 'R19A', '2021-07-30', 11318.41, 2021, 21),
(69, 'GC', 'R19A', '2021-07-30', 25404.15, 2021, 22),
(70, 'GC', 'R19A', '2021-07-30', 9469.32, 2021, 23),
(71, 'GC', 'R19A', '2021-07-30', 218914.01, 2021, 24),
(72, 'GC', 'R19A', '2021-07-30', 30117.99, 2021, 25),
(73, 'GC', 'R19A', '2021-07-30', 29186.36, 2021, 26),
(74, 'GC', 'R21A', '2021-07-30', 5499.17, 2021, 1),
(75, 'GC', 'R21A', '2021-07-30', 5300.3, 2021, 2),
(76, 'GC', 'R21A', '2021-07-30', 3363.42, 2021, 3),
(77, 'GC', 'R21A', '2021-07-30', 1050, 2021, 4),
(78, 'GC', 'R21A', '2021-07-30', 315, 2021, 5),
(79, 'GC', 'R21A', '2021-07-30', 5400.19, 2021, 9),
(80, 'GC', 'R21A', '2021-07-30', 3401.34, 2021, 10),
(81, 'GC', 'R21A', '2021-07-30', 3207.07, 2021, 11),
(82, 'GC', 'R21A', '2021-07-30', 1963.2, 2021, 12),
(83, 'GC', 'R21A', '2021-07-30', 1400, 2021, 13),
(84, 'GC', 'R21A', '2021-07-30', 800, 2021, 14),
(85, 'GC', 'R21A', '2021-07-30', 4209.57, 2021, 15),
(86, 'GC', 'R21A', '2021-07-30', 2150, 2021, 16),
(87, 'GC', 'R21A', '2021-07-30', 2350, 2021, 17),
(88, 'GC', 'R21A', '2021-07-30', 8395.48, 2021, 18),
(89, 'GC', 'R21A', '2021-07-30', 6816.05, 2021, 19),
(90, 'GC', 'R21A', '2021-07-30', 8589.76, 2021, 20),
(91, 'GC', 'R21A', '2021-07-30', 9088.28, 2021, 21),
(92, 'GC', 'R21A', '2021-07-30', 13086.05, 2021, 22),
(93, 'GC', 'R21A', '2021-07-30', 19050.7, 2021, 23),
(94, 'GC', 'R21A', '2021-07-30', 10808.18, 2021, 24),
(95, 'GC', 'R15A', '2021-07-30', 555942.38, 2021, 1),
(96, 'GC', 'R15A', '2021-07-30', 572158.96, 2021, 2),
(97, 'GC', 'R15A', '2021-07-30', 2158381.75, 2021, 3),
(98, 'GC', 'R15A', '2021-07-30', 530341.78, 2021, 4),
(99, 'GC', 'R15A', '2021-07-30', 1123121.63, 2021, 5),
(100, 'GC', 'R15A', '2021-07-30', 1737778.23, 2021, 6),
(101, 'GC', 'R20A', '2021-07-30', 52757.56, 2021, 1),
(102, 'GC', 'R20A', '2021-07-30', 81662.02, 2021, 2),
(103, 'GC', 'R20A', '2021-07-30', 101341.98, 2021, 3),
(104, 'GC', 'R20A', '2021-07-30', 60756.59, 2021, 4),
(105, 'GC', 'R20A', '2021-07-30', 91214.27, 2021, 5),
(106, 'GC', 'R20A', '2021-07-30', 132344.66, 2021, 6);

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
('GC', 'GC', '123456', 'GC', 'Gerencia Comercial'),
('GCDemo', 'GC', '123456', 'GC', 'Gerencia Comercial'),
('GG', 'GG', '123456', 'GG', 'Gerencia General'),
('GGDemo', 'GG', '123456', 'GG', 'Gerencia General'),
('GT', 'GT', '123456', 'GT', 'Gerencia Tecnica'),
('GTDemo', 'GT', '123456', 'GT', 'Gerencia Tecnica');

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
  MODIFY `id_Cliente` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `conceptos`
--
ALTER TABLE `conceptos`
  MODIFY `id_Concepto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_Proveedor` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `registroindicadores`
--
ALTER TABLE `registroindicadores`
  MODIFY `id_registro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

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
