-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-01-2019 a las 14:32:22
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.10

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
  `email` varchar(20) NOT NULL,
  `idPartido` int(11) NOT NULL,
  `importe` int(11) NOT NULL,
  `minutoGol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `idEquipo` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partidos`
--

CREATE TABLE `partidos` (
  `idPartido` int(11) NOT NULL,
  `idEquipoLocal` int(11) NOT NULL,
  `IdEquipoVisitante` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` int(11) NOT NULL,
  `minutoGol` int(11) NOT NULL,
  `finalizado` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `email` varchar(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `rol` char(1) NOT NULL,
  `saldo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `apuestas`
--
ALTER TABLE `apuestas`
  ADD PRIMARY KEY (`idApuesta`),
  ADD KEY `Apuestas_Partidos` (`idPartido`),
  ADD KEY `Apuestas_Usuarios` (`email`);

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`idEquipo`);

--
-- Indices de la tabla `partidos`
--
ALTER TABLE `partidos`
  ADD PRIMARY KEY (`idPartido`),
  ADD KEY `partidos_equipo_local` (`idEquipoLocal`),
  ADD KEY `partidos_equipo_visitante` (`IdEquipoVisitante`);

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
  MODIFY `idApuesta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `idEquipo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `partidos`
--
ALTER TABLE `partidos`
  MODIFY `idPartido` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `apuestas`
--
ALTER TABLE `apuestas`
  ADD CONSTRAINT `Apuestas_Partidos` FOREIGN KEY (`idPartido`) REFERENCES `partidos` (`idPartido`),
  ADD CONSTRAINT `Apuestas_Usuarios` FOREIGN KEY (`email`) REFERENCES `usuarios` (`email`);

--
-- Filtros para la tabla `partidos`
--
ALTER TABLE `partidos`
  ADD CONSTRAINT `partidos_equipo_local` FOREIGN KEY (`idEquipoLocal`) REFERENCES `partidos` (`idPartido`),
  ADD CONSTRAINT `partidos_equipo_visitante` FOREIGN KEY (`IdEquipoVisitante`) REFERENCES `partidos` (`idPartido`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
