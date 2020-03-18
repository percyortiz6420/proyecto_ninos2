-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 17-03-2020 a las 22:55:22
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ninos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_culto`
--

CREATE TABLE `detalle_culto` (
  `id_detalle` int(11) NOT NULL,
  `id_culto` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_encargado` int(11) NOT NULL,
  `fecha_hora_ingreso` datetime NOT NULL,
  `fecha_hora_salida` datetime DEFAULT NULL,
  `id_usuario_salida` int(11) DEFAULT NULL,
  `observaciones` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `refaccion` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `detalle_culto`
--

INSERT INTO `detalle_culto` (`id_detalle`, `id_culto`, `id_usuario`, `id_encargado`, `fecha_hora_ingreso`, `fecha_hora_salida`, `id_usuario_salida`, `observaciones`, `refaccion`) VALUES
(62, 13, 24, 103, '2020-03-17 12:35:55', '2020-03-17 12:44:33', 24, 'Ninguna', 'SI'),
(64, 13, 24, 102, '2020-03-17 12:50:11', '2020-03-17 12:50:20', 24, 'Ninguna', 'SI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encargado`
--

CREATE TABLE `encargado` (
  `id_encargado` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono1` int(11) NOT NULL,
  `nombre_nino` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido_nino` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edad` int(11) NOT NULL,
  `atención_especial` text COLLATE utf8mb4_unicode_ci DEFAULT 'Ninguna',
  `ruta` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `encargado`
--

INSERT INTO `encargado` (`id_encargado`, `nombre`, `apellido`, `telefono1`, `nombre_nino`, `apellido_nino`, `edad`, `atención_especial`, `ruta`) VALUES
(102, 'Percy', 'Ortiz', 40062792, 'Percy', 'Ortiz', 10, 'Ninguna', 'imagenesBD/2020-03-17-06:51:34-123.jpg'),
(103, 'Percy', 'Ortiz', 40062792, 'Percy', 'Ortiz', 11, 'Ninguna', 'imagenesBD/2020-03-17-06:05:54-Imagen.jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `id_servicio` int(11) NOT NULL,
  `fecha` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_servidor` int(11) NOT NULL,
  `descripción` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`id_servicio`, `fecha`, `id_servidor`, `descripción`) VALUES
(12, '17-03-2020', 13, 'culto 1'),
(13, '17-03-2020', 13, 'hola');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servidor`
--

CREATE TABLE `servidor` (
  `Id_servidor` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` int(11) NOT NULL,
  `DPI` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_tiposervidor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `servidor`
--

INSERT INTO `servidor` (`Id_servidor`, `nombre`, `apellido`, `telefono`, `DPI`, `id_tiposervidor`) VALUES
(13, 'percy', 'Ortiz', 40056902, '34123412341', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_servidor`
--

CREATE TABLE `tipo_servidor` (
  `id_tiposervidor` int(11) NOT NULL,
  `Nombre` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_servidor`
--

INSERT INTO `tipo_servidor` (`id_tiposervidor`, `Nombre`) VALUES
(1, 'Coordinador'),
(2, 'Maestro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(40) NOT NULL,
  `contrasena` varchar(50) NOT NULL,
  `id_servidor` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `contrasena`, `id_servidor`) VALUES
(24, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 13);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalle_culto`
--
ALTER TABLE `detalle_culto`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `id_culto` (`id_culto`),
  ADD KEY `id_servidor` (`id_usuario`),
  ADD KEY `id_encargado` (`id_encargado`);

--
-- Indices de la tabla `encargado`
--
ALTER TABLE `encargado`
  ADD PRIMARY KEY (`id_encargado`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`id_servicio`),
  ADD KEY `id_servidor` (`id_servidor`);

--
-- Indices de la tabla `servidor`
--
ALTER TABLE `servidor`
  ADD PRIMARY KEY (`Id_servidor`),
  ADD KEY `id_tiposervidor` (`id_tiposervidor`);

--
-- Indices de la tabla `tipo_servidor`
--
ALTER TABLE `tipo_servidor`
  ADD PRIMARY KEY (`id_tiposervidor`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalle_culto`
--
ALTER TABLE `detalle_culto`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT de la tabla `encargado`
--
ALTER TABLE `encargado`
  MODIFY `id_encargado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `id_servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `servidor`
--
ALTER TABLE `servidor`
  MODIFY `Id_servidor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `tipo_servidor`
--
ALTER TABLE `tipo_servidor`
  MODIFY `id_tiposervidor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_culto`
--
ALTER TABLE `detalle_culto`
  ADD CONSTRAINT `detalle_culto_ibfk_2` FOREIGN KEY (`id_culto`) REFERENCES `servicio` (`id_servicio`),
  ADD CONSTRAINT `detalle_culto_ibfk_3` FOREIGN KEY (`id_encargado`) REFERENCES `encargado` (`id_encargado`);

--
-- Filtros para la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD CONSTRAINT `servicio_ibfk_1` FOREIGN KEY (`id_servidor`) REFERENCES `servidor` (`Id_servidor`);

--
-- Filtros para la tabla `servidor`
--
ALTER TABLE `servidor`
  ADD CONSTRAINT `servidor_ibfk_1` FOREIGN KEY (`id_tiposervidor`) REFERENCES `tipo_servidor` (`id_tiposervidor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
