-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-06-2019 a las 15:57:30
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
  `idPartida` int(11) NOT NULL,
  `turno` int(11) NOT NULL,
  `puntos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `partidas`
--

INSERT INTO `partidas` (`idPartida`, `turno`, `puntos`) VALUES
(1, 1, 3),
(1, 2, 14),
(1, 3, 3),
(1, 4, 20),
(1, 5, 30),
(1, 6, 0),
(2, 1, 9),
(2, 2, 12),
(2, 3, 15),
(2, 4, 4),
(2, 5, 10),
(2, 6, 42),
(2, 7, 21),
(2, 8, 64),
(2, 9, 0),
(3, 1, 4),
(3, 2, 4),
(3, 3, 9),
(3, 4, 4),
(3, 5, 0),
(4, 1, 3),
(4, 2, 16),
(4, 3, 12),
(4, 4, 36),
(4, 5, 5),
(4, 6, 30),
(4, 7, 42),
(4, 8, 56),
(4, 9, 0),
(5, 1, 1),
(5, 2, 18),
(5, 3, 0),
(6, 1, 4),
(6, 2, 6),
(6, 3, 24),
(6, 4, 0),
(7, 1, 5),
(7, 2, 14),
(7, 3, 9),
(7, 4, 8),
(7, 5, 30),
(7, 6, 24),
(7, 7, 7),
(7, 8, 0),
(8, 1, 7),
(8, 2, 12),
(8, 3, 3),
(8, 4, 8),
(8, 5, 20),
(8, 6, 54),
(8, 7, 0),
(9, 1, 7),
(9, 2, 18),
(9, 3, 3),
(9, 4, 0),
(10, 1, 8),
(10, 2, 10),
(10, 3, 6),
(10, 4, 24),
(10, 5, 0),
(11, 1, 0),
(12, 1, 0),
(13, 1, 3),
(13, 2, 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posiciones`
--

CREATE TABLE `posiciones` (
  `idPartida` int(11) NOT NULL,
  `idCasilla` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  `pinchado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `posiciones`
--

INSERT INTO `posiciones` (`idPartida`, `idCasilla`, `valor`, `pinchado`) VALUES
(1, 0, 1, 0),
(1, 1, 8, 1),
(1, 2, 3, 1),
(1, 3, 9, 0),
(1, 4, 1, 1),
(1, 5, 7, 1),
(1, 6, 4, 0),
(1, 7, 5, 1),
(1, 8, 6, 1),
(1, 9, 2, 0),
(2, 0, 3, 0),
(2, 1, 9, 1),
(2, 2, 2, 1),
(2, 3, 4, 1),
(2, 4, 5, 1),
(2, 5, 3, 1),
(2, 6, 1, 1),
(2, 7, 8, 1),
(2, 8, 6, 1),
(2, 9, 7, 1),
(3, 0, 2, 0),
(3, 1, 1, 1),
(3, 2, 8, 1),
(3, 3, 4, 1),
(3, 4, 5, 0),
(3, 5, 6, 0),
(3, 6, 2, 1),
(3, 7, 9, 0),
(3, 8, 3, 1),
(3, 9, 7, 0),
(4, 0, 8, 0),
(4, 1, 3, 1),
(4, 2, 6, 1),
(4, 3, 9, 1),
(4, 4, 5, 1),
(4, 5, 4, 1),
(4, 6, 7, 1),
(4, 7, 1, 1),
(4, 8, 2, 1),
(4, 9, 8, 1),
(5, 0, 6, 0),
(5, 1, 9, 1),
(5, 2, 7, 0),
(5, 3, 6, 0),
(5, 4, 1, 1),
(5, 5, 3, 0),
(5, 6, 4, 1),
(5, 7, 8, 0),
(5, 8, 2, 0),
(5, 9, 5, 0),
(6, 0, 8, 0),
(6, 1, 4, 1),
(6, 2, 5, 0),
(6, 3, 2, 0),
(6, 4, 3, 1),
(6, 5, 1, 0),
(6, 6, 8, 1),
(6, 7, 7, 0),
(6, 8, 6, 1),
(6, 9, 9, 0),
(7, 0, 9, 0),
(7, 1, 5, 1),
(7, 2, 9, 0),
(7, 3, 2, 1),
(7, 4, 4, 1),
(7, 5, 7, 1),
(7, 6, 1, 1),
(7, 7, 3, 1),
(7, 8, 6, 1),
(7, 9, 8, 1),
(8, 0, 8, 0),
(8, 1, 7, 1),
(8, 2, 8, 0),
(8, 3, 9, 1),
(8, 4, 1, 1),
(8, 5, 6, 1),
(8, 6, 2, 1),
(8, 7, 4, 1),
(8, 8, 5, 1),
(8, 9, 3, 0),
(9, 0, 7, 0),
(9, 1, 7, 1),
(9, 2, 2, 0),
(9, 3, 9, 1),
(9, 4, 6, 0),
(9, 5, 1, 1),
(9, 6, 5, 0),
(9, 7, 3, 1),
(9, 8, 8, 0),
(9, 9, 4, 0),
(10, 0, 2, 0),
(10, 1, 8, 1),
(10, 2, 9, 1),
(10, 3, 2, 1),
(10, 4, 1, 0),
(10, 5, 5, 1),
(10, 6, 4, 0),
(10, 7, 6, 1),
(10, 8, 7, 0),
(10, 9, 3, 0),
(11, 0, 3, 0),
(11, 1, 7, 0),
(11, 2, 5, 0),
(11, 3, 6, 0),
(11, 4, 4, 0),
(11, 5, 2, 0),
(11, 6, 9, 0),
(11, 7, 3, 0),
(11, 8, 1, 0),
(11, 9, 8, 0),
(12, 0, 8, 0),
(12, 1, 6, 0),
(12, 2, 5, 0),
(12, 3, 9, 0),
(12, 4, 7, 0),
(12, 5, 2, 0),
(12, 6, 3, 0),
(12, 7, 8, 0),
(12, 8, 1, 0),
(12, 9, 4, 0),
(13, 0, 6, 0),
(13, 1, 3, 1),
(13, 2, 4, 0),
(13, 3, 1, 0),
(13, 4, 6, 0),
(13, 5, 7, 1),
(13, 6, 8, 0),
(13, 7, 9, 0),
(13, 8, 5, 0),
(13, 9, 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntuaciones`
--

CREATE TABLE `puntuaciones` (
  `id` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `puntos` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `puntuaciones`
--

INSERT INTO `puntuaciones` (`id`, `fecha`, `puntos`, `nombre`) VALUES
(20, '2019-01-11 04:15:58', 70, 'Karlos Perdiguero'),
(21, '2019-01-11 04:17:02', 177, 'Kkarlos Perdiguero'),
(22, '2019-01-11 04:17:39', 21, 'Luis Alcibar'),
(23, '2019-01-11 04:18:14', 200, 'Aitor Garmendia'),
(24, '2019-01-11 04:18:48', 19, 'Patxi Mendiguren'),
(25, '2019-01-11 04:19:16', 34, 'Mikel Paniego'),
(26, '2019-01-11 04:19:50', 97, 'Andoni Torres'),
(27, '2019-01-11 04:21:13', 104, 'Arantxa Puertas'),
(28, '2019-01-11 05:39:53', 28, 'AITOR'),
(29, '2019-01-14 03:49:31', 48, 'Pepe');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `partidas`
--
ALTER TABLE `partidas`
  ADD PRIMARY KEY (`idPartida`,`turno`);

--
-- Indices de la tabla `posiciones`
--
ALTER TABLE `posiciones`
  ADD PRIMARY KEY (`idPartida`,`idCasilla`);

--
-- Indices de la tabla `puntuaciones`
--
ALTER TABLE `puntuaciones`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `puntuaciones`
--
ALTER TABLE `puntuaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
