-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-06-2019 a las 15:55:31
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `banco`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta`
--

CREATE TABLE `cuenta` (
  `idcuenta` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `pin` varchar(4) NOT NULL,
  `accesos` int(11) DEFAULT '0',
  `ultimoacceso` datetime DEFAULT CURRENT_TIMESTAMP,
  `saldo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cuenta`
--

INSERT INTO `cuenta` (`idcuenta`, `nombre`, `pin`, `accesos`, `ultimoacceso`, `saldo`) VALUES
(30, 'Karlos', '1111', 2, '2019-02-06 19:42:08', 19100),
(31, 'Asier', '1111', 2, '2019-02-06 16:41:59', 200),
(32, 'Andrea', '7118', 1, '2019-02-06 19:55:24', 0),
(33, 'Andrea', '6445', 1, '2019-02-06 19:55:43', 0),
(34, '', '6843', 1, '2019-02-06 20:00:02', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos`
--

CREATE TABLE `movimientos` (
  `idmovimiento` int(11) NOT NULL,
  `idcuenta` int(11) NOT NULL,
  `denominacion` varchar(200) NOT NULL,
  `importe` int(11) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `movimientos`
--

INSERT INTO `movimientos` (`idmovimiento`, `idcuenta`, `denominacion`, `importe`, `fecha`) VALUES
(94, 30, 'Ingreso en efectivo', 1000, '2019-02-06 18:11:05'),
(95, 30, 'Ingreso en efectivo', 3000, '2019-02-06 18:11:12'),
(96, 30, 'Ingreso en efectivo', 5000, '2019-02-06 18:11:17'),
(97, 30, 'Retirada en efectivo', -100, '2019-02-06 18:11:24'),
(98, 30, 'Transferencia a la cuenta undefined', -1900, '2019-02-06 18:11:44'),
(99, 30, 'Ingreso en efectivo', 5000, '2019-02-06 18:12:21'),
(100, 30, 'Transferencia a la cuenta undefined', -3000, '2019-02-06 18:12:27'),
(101, 30, 'Transferencia a la cuenta undefined', -1000, '2019-02-06 18:12:57'),
(102, 30, 'Transferencia a la cuenta undefined', -100, '2019-02-06 18:17:55'),
(103, 30, 'Transferencia a la cuenta undefined', -100, '2019-02-06 18:18:01'),
(104, 30, 'Transferencia a la cuenta a-2354235_3thrh', -200, '2019-02-06 18:18:38'),
(105, 30, 'Ingreso en efectivo', 6500, '2019-02-06 19:15:37'),
(106, 30, 'Ingreso en efectivo', 0, '2019-02-06 19:22:19'),
(107, 30, 'Ingreso en efectivo', 5000, '2019-02-06 19:46:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prueba`
--

CREATE TABLE `prueba` (
  `prueba` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `prueba`
--

INSERT INTO `prueba` (`prueba`) VALUES
('ok'),
('ok');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD PRIMARY KEY (`idcuenta`);

--
-- Indices de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD PRIMARY KEY (`idmovimiento`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  MODIFY `idcuenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  MODIFY `idmovimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
