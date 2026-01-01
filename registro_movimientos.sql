-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-03-2025 a las 15:15:18
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `registro_movimientos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos`
--

CREATE TABLE `movimientos` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `factura` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `debe` decimal(10,2) DEFAULT 0.00,
  `haber` decimal(10,2) DEFAULT 0.00,
  `saldo` decimal(10,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `movimientos`
--

INSERT INTO `movimientos` (`id`, `fecha`, `factura`, `descripcion`, `debe`, `haber`, `saldo`) VALUES
(28, '2025-02-02', 'n/a', 'Registro inicial', '280.80', '0.00', '280.80'),
(29, '2025-02-02', 'n/a', 'Centralización F.D.V ', '91.00', '0.00', '371.80'),
(30, '2025-02-02', 'n/a', 'Centralización CMF', '75.00', '0.00', '446.80'),
(31, '2025-02-02', 'n/a', 'Ofrenda General de Domingo', '7.40', '0.00', '454.20'),
(32, '2025-02-02', 'n/a', 'Diezmo de Ofrenda general', '0.00', '0.74', '453.46'),
(33, '2025-02-02', 'n/a', 'Donación por Segundo Castaneda', '100.00', '0.00', '553.46'),
(34, '2025-02-02', 'n/a', 'Diezmo de la donación ', '0.00', '10.00', '543.46'),
(35, '2025-02-02', 'n/a', 'Diezmos de iglesia local', '141.00', '0.00', '684.46'),
(36, '2025-02-02', 'n/a', 'Diezmo de Diezmo local', '0.00', '14.10', '670.36'),
(37, '2025-02-09', 'n/a', '	Ofrenda General de Domingo', '9.35', '0.00', '679.71'),
(38, '2025-02-09', 'n/a', '	Diezmo de Ofrenda general', '0.00', '0.95', '678.76'),
(39, '2025-02-09', 'n/a', 'Diezmos de iglesia local', '91.00', '0.00', '769.76'),
(40, '2025-02-09', 'n/a', 'Diezmo de Diezmo local', '0.00', '9.10', '760.66'),
(41, '2025-02-09', 'n/a', 'Ofrenda para Pastor que nos visitó.', '0.00', '13.50', '747.16'),
(42, '2025-02-15', 'n/a', 'Pago de camionada de arena', '0.00', '100.00', '647.16'),
(43, '2025-02-15', 'n/a', 'Pago de 20 volsas de cemento maya ', '0.00', '158.00', '489.16'),
(44, '2025-02-16', 'n/a', 'Ofrenda General de Domingo', '6.30', '0.00', '495.46'),
(45, '2025-02-16', 'n/a', 'Diezmo de Ofrenda general', '0.00', '0.60', '494.86'),
(46, '2025-02-16', 'n/a', 'Diezmos de iglesia local', '73.00', '0.00', '567.86'),
(47, '2025-02-16', 'n/a', 'Diezmo de Diezmo local', '0.00', '7.30', '560.56'),
(48, '2025-02-16', 'n/a', 'Ingreso de pro luz eléctrica ', '14.00', '0.00', '574.56'),
(49, '2025-02-16', 'n/a', 'Pago de factura de energía electrica', '0.00', '16.84', '557.72'),
(50, '2025-02-17', 'n/a', 'Compra de material PVC', '0.00', '5.00', '552.72'),
(51, '2025-02-21', '6106', 'Compra de material PVC', '0.00', '9.35', '543.37'),
(52, '2025-02-23', 'n/a', 'Pago de albañil por trabajos de la semana a Ovidio Soto', '0.00', '60.00', '483.37'),
(53, '2025-02-23', 'n/a', 'Pago de ayudante por un dia de trabajo Mariano Gonzales', '0.00', '10.00', '473.37'),
(54, '2025-02-23', 'n/a', 'Diezmos recaudados el día domingo ', '229.00', '0.00', '702.37'),
(55, '2025-02-23', 'n/a', 'Diezmo de Diezmo ', '0.00', '22.90', '679.47'),
(56, '2025-02-25', '6211', 'Compra de materiales, como toiler, canal, tubo pvc entre otras cosas.', '0.00', '405.75', '273.72'),
(57, '2025-03-02', 'n/a', 'Pago por trabajos hechos en casa pastoral. ', '0.00', '140.00', '133.72'),
(58, '2025-03-02', 'n/a', 'Centralización E.D.C', '12.95', '0.00', '146.67'),
(59, '2025-03-02', 'n/a', 'Ofrenda General de Domingo', '10.25', '0.00', '156.92'),
(60, '2025-03-02', 'n/a', 'Diezmo de Ofrenda general', '0.00', '1.00', '155.92'),
(61, '2025-03-02', 'n/a', 'Diezmos recaudado el día domingo ', '209.25', '0.00', '365.17'),
(62, '2025-03-02', 'n/a', 'Diezmo de Diezmo ', '0.00', '21.00', '344.17'),
(63, '2025-03-02', 'n/a', 'Ofrenda para Pastor que nos visitó.', '0.00', '12.00', '332.17');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
