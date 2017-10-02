-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-09-2017 a las 00:44:53
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `capacitacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL,
  `numero_empleado` int(4) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido1` varchar(30) NOT NULL,
  `apellido2` varchar(30) DEFAULT NULL,
  `plaza` int(11) DEFAULT NULL,
  `activo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `numero_empleado`, `nombre`, `apellido1`, `apellido2`, `plaza`, `activo`) VALUES
(1, 1324, 'Leticia', 'Hernandez', 'Quiroz', 8, 1),
(2, 9876, 'Aracely', 'Hernandez', 'Quiroz', 4, 1),
(4, 123, 'Gerardo', 'Hernandez', 'Quiroz', 3, 1),
(14, 1238, 'Gerardo', 'Hernandez', 'Quiroz', 3, 1),
(21, 7743, 'Maribel', 'Hernández', 'Quiroz', 9, 1),
(33, 3333, 'Sofia', 'Reyes', 'Santos', 4, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plazas`
--

CREATE TABLE `plazas` (
  `idP` int(11) NOT NULL,
  `nombre_plaza` varchar(30) NOT NULL,
  `unidad_administrativa` varchar(50) NOT NULL,
  `activo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `plazas`
--

INSERT INTO `plazas` (`idP`, `nombre_plaza`, `unidad_administrativa`, `activo`) VALUES
(1, 'Analista de Desarrollo', 'Gerencia de Informatica', 1),
(2, 'Jefe de Departamento', 'Gerencia de Informatica', 0),
(3, 'Analista de DBA', 'Gerencia de Informatica', 1),
(4, 'Analista de BI', 'Gerencia de Informatica', 1),
(5, 'Analista de Personal', 'Gerencia de Recursos Humanos', 1),
(6, 'Analista de Desarrollo', 'Gerencia de Informatica', 1),
(7, 'Jefe de Departamento', 'Gerencia de Recursos Humanos', 1),
(8, 'Analista de Capacitacion', 'Gerencia de Produccion', 1),
(9, 'Gerente de Materiales', 'Gerencia de Materiales', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `numero_empleado` (`numero_empleado`),
  ADD KEY `plaza` (`plaza`);

--
-- Indices de la tabla `plazas`
--
ALTER TABLE `plazas`
  ADD PRIMARY KEY (`idP`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT de la tabla `plazas`
--
ALTER TABLE `plazas`
  MODIFY `idP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`plaza`) REFERENCES `plazas` (`idP`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
