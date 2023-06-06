-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-06-2023 a las 19:53:43
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `flujo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `ci` int(20) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `paterno` varchar(30) NOT NULL,
  `materno` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`ci`, `nombre`, `paterno`, `materno`) VALUES
(123, 'Pedro', 'Lima', 'Quispe');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centro`
--

CREATE TABLE `centro` (
  `idcentro` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `sigla` varchar(50) NOT NULL,
  `1ejecutivo` varchar(50) NOT NULL,
  `2ejecutivo` varchar(50) NOT NULL,
  `3ejecutivo` varchar(50) NOT NULL,
  `1hcf` varchar(50) NOT NULL,
  `2hcf` varchar(50) NOT NULL,
  `1caf` varchar(50) NOT NULL,
  `1hcc` varchar(50) NOT NULL,
  `2hcc` varchar(50) NOT NULL,
  `3hcc` varchar(50) NOT NULL,
  `1cac` varchar(50) NOT NULL,
  `notramite` int(20) NOT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `flujocondicionante`
--

CREATE TABLE `flujocondicionante` (
  `ID` int(11) NOT NULL,
  `proceso` varchar(3) DEFAULT NULL,
  `si` varchar(3) DEFAULT NULL,
  `no` varchar(3) DEFAULT NULL,
  `rol` varchar(20) NOT NULL,
  `formulario` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `flujocondicionante`
--

INSERT INTO `flujocondicionante` (`ID`, `proceso`, `si`, `no`, `rol`, `formulario`) VALUES
(1, 'P1', 'P4', 'P2', 'CEI', 'C1'),
(2, 'P3', 'P4', 'fin', 'CEI', 'C2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `flujoproceso`
--

CREATE TABLE `flujoproceso` (
  `id` int(11) NOT NULL,
  `flujo` varchar(3) DEFAULT NULL,
  `proceso` varchar(3) DEFAULT NULL,
  `procesosiguiente` varchar(3) DEFAULT NULL,
  `rol` varchar(15) DEFAULT NULL,
  `formulario` varchar(20) DEFAULT NULL,
  `tipo` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `flujoproceso`
--

INSERT INTO `flujoproceso` (`id`, `flujo`, `proceso`, `procesosiguiente`, `rol`, `formulario`, `tipo`) VALUES
(1, 'F1', 'P1', 'con', 'Usuario', 'P1', 'I'),
(2, 'F1', 'P2', 'P3', 'CEI', 'P2', 'P'),
(3, 'F1', 'P3', 'con', 'Usuario', 'P3', 'D'),
(4, 'F1', 'P4', 'P5', 'Kardex', 'P4', 'C'),
(5, 'F1', 'P5', 'fin', 'CEI', 'P5', 'F');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `observacion`
--

CREATE TABLE `observacion` (
  `idobservacion` int(11) NOT NULL,
  `notramite` varchar(30) NOT NULL,
  `observacion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimiento`
--

CREATE TABLE `seguimiento` (
  `id` int(11) NOT NULL,
  `notramite` int(11) DEFAULT NULL,
  `usuario` varchar(10) DEFAULT NULL,
  `flujo` varchar(3) DEFAULT NULL,
  `proceso` varchar(3) DEFAULT NULL,
  `fechainicio` varchar(30) DEFAULT NULL,
  `fechafin` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tramite`
--

CREATE TABLE `tramite` (
  `notramite` int(10) NOT NULL,
  `ci` int(20) NOT NULL,
  `fecha` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ci` int(11) NOT NULL,
  `usuario` varchar(10) DEFAULT NULL,
  `contrasenia` varchar(10) DEFAULT NULL,
  `rol` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ci`, `usuario`, `contrasenia`, `rol`) VALUES
(123, 'pedro', '123456', 'E'),
(456, 'CEI', '123456', 'C'),
(789, 'Kardex', '123456', 'K');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`ci`);

--
-- Indices de la tabla `centro`
--
ALTER TABLE `centro`
  ADD PRIMARY KEY (`idcentro`);

--
-- Indices de la tabla `flujocondicionante`
--
ALTER TABLE `flujocondicionante`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `flujoproceso`
--
ALTER TABLE `flujoproceso`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `observacion`
--
ALTER TABLE `observacion`
  ADD PRIMARY KEY (`idobservacion`);

--
-- Indices de la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tramite`
--
ALTER TABLE `tramite`
  ADD PRIMARY KEY (`notramite`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ci`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `centro`
--
ALTER TABLE `centro`
  MODIFY `idcentro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=450;

--
-- AUTO_INCREMENT de la tabla `flujocondicionante`
--
ALTER TABLE `flujocondicionante`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `flujoproceso`
--
ALTER TABLE `flujoproceso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `observacion`
--
ALTER TABLE `observacion`
  MODIFY `idobservacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT de la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT de la tabla `tramite`
--
ALTER TABLE `tramite`
  MODIFY `notramite` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
