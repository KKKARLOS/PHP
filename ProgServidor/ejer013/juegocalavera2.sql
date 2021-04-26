-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-01-2019 a las 17:35:19
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
-- Base de datos: `juegocalavera2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partidas`
--

CREATE TABLE `partidas` (
  `id` int(11) NOT NULL,
  `turno` int(11) NOT NULL,
  `estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `partidas`
--

INSERT INTO `partidas` (`id`, `turno`, `estado`) VALUES
(33, 5, -1),
(34, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posiciones`
--

CREATE TABLE `posiciones` (
  `id` int(11) NOT NULL,
  `posicion` int(11) NOT NULL,
  `pinchado` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  `partida` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `posiciones`
--

INSERT INTO `posiciones` (`id`, `posicion`, `pinchado`, `valor`, `partida`) VALUES
(1, 1, 0, 1, 33),
(2, 2, 2, 4, 33),
(3, 3, 1, 2, 33),
(4, 4, 3, 7, 33),
(5, 5, 4, 6, 33),
(6, 6, 5, 0, 33),
(7, 7, 0, 8, 33),
(8, 8, 0, 5, 33),
(9, 9, 0, 3, 33),
(10, 10, 0, 9, 33),
(11, 1, 0, 4, 34),
(12, 2, 0, 1, 34),
(13, 3, 0, 7, 34),
(14, 4, 0, 6, 34),
(15, 5, 0, 9, 34),
(16, 6, 0, 2, 34),
(17, 7, 0, 0, 34),
(18, 8, 0, 8, 34),
(19, 9, 0, 5, 34),
(20, 10, 0, 3, 34);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `partidas`
--
ALTER TABLE `partidas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `posiciones`
--
ALTER TABLE `posiciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `partida` (`partida`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `partidas`
--
ALTER TABLE `partidas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `posiciones`
--
ALTER TABLE `posiciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `posiciones`
--
ALTER TABLE `posiciones`
  ADD CONSTRAINT `posiciones_ibfk_1` FOREIGN KEY (`partida`) REFERENCES `partidas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
