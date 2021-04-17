-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-04-2021 a las 16:04:15
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

--
-- Volcado de datos para la tabla `catalogo_conceptos`
--

INSERT INTO `catalogo_conceptos` (`id_Concepto`, `Nombre`) VALUES
(1, 'Proyectos geométricos'),
(2, 'Proyectos estructurales'),
(3, 'Geotecnia'),
(4, 'Impacto ambiental'),
(5, 'Topografía'),
(6, 'Diseño de pavimentos'),
(7, 'Batimetría'),
(8, 'Posicionamiento GPS'),
(9, 'Fotogrametría con Dron'),
(10, 'Estudios topohidráulicos'),
(11, 'Levantamientos'),
(12, 'Estudios de retroflexión de señalamientos'),
(13, 'Estudios hidrológicos'),
(14, 'Supervisión de obras'),
(15, 'Obra civil'),
(16, 'Proyecto ejecutivo'),
(17, 'Estudio'),
(18, 'Construccion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogo_indicadores`
--

CREATE TABLE `catalogo_indicadores` (
  `id_Dat` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Nombre` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Permiso` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `catalogo_indicadores`
--

INSERT INTO `catalogo_indicadores` (`id_Dat`, `Nombre`, `Permiso`) VALUES
('R10A', 'Numero de bajas', 'A'),
('R11A', 'Numero de horas extras', 'A'),
('R12A', 'Deuda proveedor', 'F'),
('R13A', 'Deuda cliente', 'F'),
('R14A', 'Costo por proyecto', 'F'),
('R15A', 'Numero de facturas por realiza', 'F'),
('R15B', 'Numero de facturas ralizadas', 'F'),
('R1A', 'Orden de trabajo recibida', 'M'),
('R1B', 'Orden de trabajo atendida', 'M'),
('R2A', 'Calificacion encuesta', 'A'),
('R3A', 'Numero de propuestas', 'A'),
('R4A', 'Numero de vacanates totales', 'A'),
('R4B', 'Numero de vacantes ocupadas', 'A'),
('R5A', 'Numero de reportes', 'A'),
('R6A', 'Numero de puestos', 'A'),
('R6B', 'Numero de descriptivos realiza', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_Cliente` bigint(20) NOT NULL,
  `Nombre` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `RFC` varchar(30) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `Correo` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Telefono` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_Cliente`, `Nombre`, `RFC`, `Correo`, `Telefono`) VALUES
(1, 'Edgar martinez', '', 'edgarmartinezv96@gmail.com', 2214419706);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `concepto_proyecto`
--

CREATE TABLE `concepto_proyecto` (
  `clave_Proyecto` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `id_Concepto` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mov_cliente`
--

CREATE TABLE `mov_cliente` (
  `id_MovCli` int(11) NOT NULL,
  `id_registro` int(11) DEFAULT NULL,
  `id_Cliente` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mov_prov`
--

CREATE TABLE `mov_prov` (
  `id_MovProv` int(11) NOT NULL,
  `id_Proveedor` bigint(20) DEFAULT NULL,
  `id_registro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mov_proyecto`
--

CREATE TABLE `mov_proyecto` (
  `id_MovPro` int(11) NOT NULL,
  `id_registro` int(11) DEFAULT NULL,
  `clave_Proyecto` varchar(30) COLLATE utf8mb4_spanish2_ci DEFAULT NULL
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
  `Telefono` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_Proveedor`, `Nombre`, `RFC`, `Correo`, `Telefono`) VALUES
(1, 'Ternium', '', 'asdasg@gmail.com', 516981),
(3, 'dasdasdf', '', 'editedlook@hotmail.com', 2214419706);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE `proyecto` (
  `clave_Proyecto` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Nombre` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `fecha_Inicio` date NOT NULL,
  `fecha_Fin` date NOT NULL,
  `monto_Contrato` bigint(20) NOT NULL,
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
  `Valor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

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
-- Indices de la tabla `concepto_proyecto`
--
ALTER TABLE `concepto_proyecto`
  ADD PRIMARY KEY (`clave_Proyecto`,`id_Concepto`),
  ADD KEY `Pertenece` (`id_Concepto`);

--
-- Indices de la tabla `mov_cliente`
--
ALTER TABLE `mov_cliente`
  ADD PRIMARY KEY (`id_MovCli`),
  ADD KEY `IX_Relationship16` (`id_registro`),
  ADD KEY `IX_Relationship17` (`id_Cliente`);

--
-- Indices de la tabla `mov_prov`
--
ALTER TABLE `mov_prov`
  ADD PRIMARY KEY (`id_MovProv`),
  ADD KEY `IX_Relationship14` (`id_Proveedor`),
  ADD KEY `IX_Relationship15` (`id_registro`);

--
-- Indices de la tabla `mov_proyecto`
--
ALTER TABLE `mov_proyecto`
  ADD PRIMARY KEY (`id_MovPro`),
  ADD KEY `IX_Relationship18` (`id_registro`),
  ADD KEY `IX_Relationship19` (`clave_Proyecto`);

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
  MODIFY `id_Cliente` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `mov_cliente`
--
ALTER TABLE `mov_cliente`
  MODIFY `id_MovCli` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mov_prov`
--
ALTER TABLE `mov_prov`
  MODIFY `id_MovProv` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mov_proyecto`
--
ALTER TABLE `mov_proyecto`
  MODIFY `id_MovPro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_Proveedor` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `registroindicadores`
--
ALTER TABLE `registroindicadores`
  MODIFY `id_registro` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `concepto_proyecto`
--
ALTER TABLE `concepto_proyecto`
  ADD CONSTRAINT `Pertenece` FOREIGN KEY (`id_Concepto`) REFERENCES `catalogo_conceptos` (`id_Concepto`),
  ADD CONSTRAINT `Tiene` FOREIGN KEY (`clave_Proyecto`) REFERENCES `proyecto` (`clave_Proyecto`);

--
-- Filtros para la tabla `mov_cliente`
--
ALTER TABLE `mov_cliente`
  ADD CONSTRAINT `Relationship16` FOREIGN KEY (`id_registro`) REFERENCES `registroindicadores` (`id_registro`),
  ADD CONSTRAINT `Relationship17` FOREIGN KEY (`id_Cliente`) REFERENCES `cliente` (`id_Cliente`);

--
-- Filtros para la tabla `mov_prov`
--
ALTER TABLE `mov_prov`
  ADD CONSTRAINT `Relationship14` FOREIGN KEY (`id_Proveedor`) REFERENCES `proveedor` (`id_Proveedor`),
  ADD CONSTRAINT `Relationship15` FOREIGN KEY (`id_registro`) REFERENCES `registroindicadores` (`id_registro`);

--
-- Filtros para la tabla `mov_proyecto`
--
ALTER TABLE `mov_proyecto`
  ADD CONSTRAINT `Relationship18` FOREIGN KEY (`id_registro`) REFERENCES `registroindicadores` (`id_registro`),
  ADD CONSTRAINT `Relationship19` FOREIGN KEY (`clave_Proyecto`) REFERENCES `proyecto` (`clave_Proyecto`);

--
-- Filtros para la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD CONSTRAINT `Solicita` FOREIGN KEY (`id_Cliente`) REFERENCES `cliente` (`id_Cliente`);

--
-- Filtros para la tabla `registroindicadores`
--
ALTER TABLE `registroindicadores`
  ADD CONSTRAINT `Relationship6` FOREIGN KEY (`Usuario`) REFERENCES `usuario` (`Usuario`),
  ADD CONSTRAINT `Relationship7` FOREIGN KEY (`id_Req`) REFERENCES `catalogo_indicadores` (`id_Dat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
