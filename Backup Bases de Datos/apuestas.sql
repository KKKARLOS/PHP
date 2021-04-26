-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-06-2019 a las 15:55:02
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
-- Base de datos: `apuestas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apuestas`
--

CREATE TABLE `apuestas` (
  `idApuesta` int(11) NOT NULL,
  `idPartido` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `minutoGol` int(11) NOT NULL,
  `importe` int(11) NOT NULL,
  `liquidada` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `apuestas`
--

INSERT INTO `apuestas` (`idApuesta`, `idPartido`, `email`, `minutoGol`, `importe`, `liquidada`) VALUES
(12, 1, 'asier.perdiguero@gmail.com', 50, 1000, 1),
(13, 2, 'asier.perdiguero@gmail.com', 40, 5000, 1),
(14, 3, 'asier.perdiguero@gmail.com', 50, 2000, 1),
(15, 2, 'jc.perdiguerocarlos@gmail.com', 50, 2000, 1),
(16, 1, 'jc.perdiguerocarlos@gmail.com', 50, 2000, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partidos`
--

CREATE TABLE `partidos` (
  `idPartido` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `minutoGol` int(11) NOT NULL,
  `estado` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `partidos`
--

INSERT INTO `partidos` (`idPartido`, `nombre`, `fecha`, `hora`, `minutoGol`, `estado`) VALUES
(1, 'Barcelona - Español', '2019-01-23', '20:30:00', 10, 'F'),
(2, 'Real Madrid - Leganes', '2019-01-24', '22:00:00', 80, 'F'),
(3, 'Getafe - Español', '2019-01-26', '12:00:00', 0, 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `email` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `rol` char(1) NOT NULL,
  `saldo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`email`, `nombre`, `password`, `rol`, `saldo`) VALUES
('andrea.perdiguerourretabizkaia@gmail.com', 'Andrea Perdiguero Urretabizkaia', '1234', 'J', 10000),
('asier.perdiguero@gmail.com', 'Asier Perdiguero Urretabizkaia', '1234', 'J', 12000),
('jc.perdiguerocarlos@gmail.com', 'Karlos Perdiguero Otxoa', '1234', 'A', 21000);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `apuestas`
--
ALTER TABLE `apuestas`
  ADD PRIMARY KEY (`idApuesta`),
  ADD KEY `idPartido` (`idPartido`),
  ADD KEY `email` (`email`);

--
-- Indices de la tabla `partidos`
--
ALTER TABLE `partidos`
  ADD PRIMARY KEY (`idPartido`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `apuestas`
--
ALTER TABLE `apuestas`
  MODIFY `idApuesta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `partidos`
--
ALTER TABLE `partidos`
  MODIFY `idPartido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `apuestas`
--
ALTER TABLE `apuestas`
  ADD CONSTRAINT `apuestas_ibfk_1` FOREIGN KEY (`idPartido`) REFERENCES `partidos` (`idPartido`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
