-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-04-2019 a las 17:46:28
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cootranshuila`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuesta`
--

CREATE TABLE `encuesta` (
  `id` int(10) NOT NULL,
  `fecha` date NOT NULL,
  `area` enum('estacion','transporte') COLLATE utf8_spanish2_ci NOT NULL,
  `pregunta_uno` int(10) NOT NULL,
  `pregunta_dos` int(10) NOT NULL,
  `pregunta_tres` int(10) NOT NULL,
  `pregunta_cuatro` int(10) NOT NULL,
  `pregunta_cinco` int(10) NOT NULL,
  `sugerencia` varchar(800) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `encuesta`
--

INSERT INTO `encuesta` (`id`, `fecha`, `area`, `pregunta_uno`, `pregunta_dos`, `pregunta_tres`, `pregunta_cuatro`, `pregunta_cinco`, `sugerencia`) VALUES
(1, '2019-04-09', 'estacion', 5, 5, 5, 5, 5, 'sugerencia'),
(2, '2019-04-14', 'estacion', 4, 4, 4, 4, 4, 'daniel'),
(3, '2019-04-14', 'estacion', 1, 1, 1, 1, 1, ''),
(4, '2019-04-14', 'estacion', 1, 1, 1, 1, 1, ''),
(5, '2019-04-15', 'transporte', 1, 2, 3, 4, 5, 'mensaje');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `encuesta`
--
ALTER TABLE `encuesta`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `encuesta`
--
ALTER TABLE `encuesta`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
