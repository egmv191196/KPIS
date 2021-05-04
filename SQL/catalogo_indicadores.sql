-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-05-2021 a las 14:48:05
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.7

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
-- Estructura de tabla para la tabla `catalogo_indicadores`
--

CREATE TABLE `catalogo_indicadores` (
  `id_Dat` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Nombre` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
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
('R15A', 'Numero de facturas por realizar', 'F'),
('R15B', 'Numero de facturas ralizadas', 'F'),
('R16A', 'Registro Pago', 'F'),
('R17A', 'Registro Cobro', 'F'),
('R19A', 'Saldo en cuenta bancaria', 'F'),
('R1A', 'Orden de trabajo recibida', 'M'),
('R1B', 'Orden de trabajo atendida', 'M'),
('R20A', 'Registro impuesto', 'F'),
('R21A', 'Registro consumo efectivale', 'F'),
('R23A', 'Registro reporte semanal entregado', 'T'),
('R24A', '% de trabajo ejecutado', 'T'),
('R25A', 'Reporte de Kms por concepto', 'T'),
('R28A', 'Registrar inconformidad de cliente', 'T'),
('R29A', 'Reporte de entrega cumplido', 'T'),
('R2A', 'Calificacion encuesta', 'A'),
('R30A', 'Reporte de estimacion pendiente', 'F'),
('R3A', 'Numero de propuestas', 'A'),
('R4A', 'Numero de vacanates totales', 'A'),
('R4B', 'Numero de vacantes ocupadas', 'A'),
('R5A', 'Numero de reportes', 'A'),
('R6A', 'Numero de puestos', 'A'),
('R6B', 'Numero de descriptivos realizados', 'A');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `catalogo_indicadores`
--
ALTER TABLE `catalogo_indicadores`
  ADD PRIMARY KEY (`id_Dat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
