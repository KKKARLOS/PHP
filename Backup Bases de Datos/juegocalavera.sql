-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-06-2019 a las 15:57:22
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
-- Base de datos: `juegocalavera`
--

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
(4, '2019-01-08 04:16:16', 0, 'Juan Carlos '),
(5, '2019-01-08 04:29:44', 40, 'Karlos'),
(6, '2019-01-08 04:38:25', 40, 'Karlos'),
(7, '2019-01-08 04:39:25', 40, 'Karlos'),
(8, '2019-01-08 04:41:17', 40, 'Karlos'),
(9, '2019-01-08 04:41:22', 40, 'Karlos'),
(10, '2019-01-08 04:41:53', 41, 'AITOR'),
(11, '2019-01-08 04:42:11', 41, 'AITOR'),
(12, '2019-01-08 04:42:53', 41, 'AITOR'),
(13, '2019-01-08 04:43:23', 44, 'Kkarlos'),
(14, '2019-01-08 04:47:56', 44, 'Kkarlos'),
(15, '2019-01-08 04:50:06', 46, 'pepe'),
(16, '2019-01-08 04:55:59', 47, 'Juanillo'),
(17, '2019-01-08 06:31:31', 1, 'AITOR'),
(18, '2019-01-09 03:39:07', 3, 'LUis');

--
-- Índices para tablas volcadas
--

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
