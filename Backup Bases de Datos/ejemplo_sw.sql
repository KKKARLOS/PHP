-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-06-2019 a las 15:57:05
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
-- Base de datos: `ejemplo_sw`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `platos`
--

CREATE TABLE `platos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `idFamilia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `platos`
--

INSERT INTO `platos` (`id`, `nombre`, `idFamilia`) VALUES
(1, 'Garbanzos con chorizo', 1),
(2, 'Alubias con sacramentos', 1),
(3, 'Vainas con patatas', 1),
(4, 'Pisto a la navarra', 1),
(5, 'Escalope de ternera', 2),
(6, 'Magret de pato', 2),
(7, 'Txitxarro al horno con patatas', 2),
(8, 'Rape salvaje', 2),
(9, 'Pudding de manzana', 3),
(10, 'Torrijas caseras', 3),
(11, 'Nueces con membrillo', 3),
(12, 'Tarta de queso', 3),
(13, 'Cuajada', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `platosfamilia`
--

CREATE TABLE `platosfamilia` (
  `idFamilia` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `platosfamilia`
--

INSERT INTO `platosfamilia` (`idFamilia`, `nombre`) VALUES
(1, 'Primer Plato'),
(2, 'Segundo Plato'),
(3, 'Postre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE `tareas` (
  `id` int(11) NOT NULL,
  `tarea` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`id`, `tarea`) VALUES
(2, 'Ir al gimnasio'),
(8, 'Ir al entrenamiento de Asier'),
(9, 'Ir a cenar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nombre` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`email`, `password`, `nombre`) VALUES
('alberto@gmail.com', '1324234', 'Alberto Ruiz'),
('aritzo@gmail.com', '1324234', 'Aritz Cuadrado'),
('asier@gmail.com', '1324234', 'Asier Perdiguero'),
('jc.perdiguerocarlos@gmail.com', '123456', 'Karlos Perdiguero Otxoa'),
('karmele@gmail.com', '324234', 'Karmele Urretabizkaia'),
('karuso@gmail.com', '1324234', 'Karuso Gonzalez'),
('kontxi@gmail.com', '1324234', 'Kontxi Garin'),
('niko@gmail.com', '1324234', 'Nikolas Otxoa');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `platos`
--
ALTER TABLE `platos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `platosfamilia`
--
ALTER TABLE `platosfamilia`
  ADD PRIMARY KEY (`idFamilia`);

--
-- Indices de la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `platos`
--
ALTER TABLE `platos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `platosfamilia`
--
ALTER TABLE `platosfamilia`
  MODIFY `idFamilia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
