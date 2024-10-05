-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-10-2024 a las 04:12:37
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdcatastro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distritos`
--

CREATE TABLE `distritos` (
  `id_distrito` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `distritos`
--

INSERT INTO `distritos` (`id_distrito`, `nombre`) VALUES
(1, 'Centro Histórico'),
(2, 'San Juan'),
(3, 'La Victoria'),
(4, 'Miraflores'),
(5, 'Surquillo'),
(6, 'San Isidro'),
(7, 'Callao'),
(8, 'Los Olivos'),
(9, 'San Martín de Porres'),
(10, 'Villa El Salvador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id_persona` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `paterno` varchar(100) NOT NULL,
  `materno` varchar(100) NOT NULL,
  `dni` varchar(20) NOT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `distrito_id` int(11) DEFAULT NULL,
  `zona_id` int(11) DEFAULT NULL,
  `user` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id_persona`, `nombre`, `paterno`, `materno`, `dni`, `direccion`, `distrito_id`, `zona_id`, `user`, `password`, `rol`) VALUES
(1, 'Moisés', 'Gonzales', 'Silva', '12345678', 'Av. Principal 123', 1, 1, 'moises123', 'admin', 1),
(2, 'Laura', 'Fernandez', 'Fernandez', '87654321', 'Calle Secundaria 456', 4, 10, 'laura123', '123456', 3),
(4, 'Juan', 'Pérez', 'González', '36456376', 'Calle 123', 1, 3, 'juan123', 'juan123', 3),
(8, 'ss', 'ss', 'ss', '2323131', 'asasa', 7, 20, 'admin', 'admin', 0),
(9, 'ss', 'ss', 'ss', '2323232', 'sdsad', 6, 17, 'admin', 'admin', 0),
(13, 'sasasa', 'sasas', 'asasa', '34564567', 'asdasd', 8, 22, 'admin', 'admin', 0),
(15, 'aa', 'aa', 'aa', '45463738', 'sdasd', 9, 25, 'admin', 'admin', 0),
(16, 'asa', 'sas', 'sasa', '34544564545', 'sdadasd', 9, 25, 'admin', 'admin', 0),
(18, 'dd', 'dd', 'dd', '34536456', 'dsds', 8, 22, 'admin', 'admin', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propiedades`
--

CREATE TABLE `propiedades` (
  `id_propiedad` int(11) NOT NULL,
  `cod_catastral` varchar(50) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `id_persona` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `propiedades`
--

INSERT INTO `propiedades` (`id_propiedad`, `cod_catastral`, `direccion`, `id_persona`) VALUES
(1, '100-2024', 'Av. Principal 123', 1),
(2, '200-2024', 'Calle Secundaria 456', 2),
(3, '300-2024', 'Malecón de la Reserva', 1),
(7, '123456', 'Calle de la Paz 1', 1),
(8, '234567', 'Avenida del Libertador 74', 2),
(9, '345678', 'Boulevard de los Héroes 30', 4),
(10, '123789', 'Calle Independencia 15', 1),
(11, '234890', 'Avenida Victoria 90', 2),
(12, '345890', 'Calle Libertad 45', 8),
(13, '123890', 'Calle Central 22', 1),
(14, '234678', 'Calle Nueva 10', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zonas`
--

CREATE TABLE `zonas` (
  `id_zona` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `distrito_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `zonas`
--

INSERT INTO `zonas` (`id_zona`, `nombre`, `distrito_id`) VALUES
(1, 'Jirón de la Unión', 1),
(2, 'Plaza Mayor', 1),
(3, 'Barranco', 1),
(4, 'Los Jardines', 2),
(5, 'La Palma', 2),
(6, 'San Luis', 2),
(7, 'Arenales', 3),
(8, 'Javier Prado', 3),
(9, 'La Victoria', 3),
(10, 'Parque Kennedy', 4),
(11, 'Punta Roquitas', 4),
(12, 'Malecón de la Reserva', 4),
(13, 'Los Alamos', 5),
(14, 'La Capullana', 5),
(15, 'Surquillo Centro', 5),
(16, 'El Golf', 6),
(17, 'Las Flores', 6),
(18, 'San Isidro Centro', 6),
(19, 'Plaza Grau', 7),
(20, 'La Punta', 7),
(21, 'Callao Norte', 7),
(22, 'Las Palmas', 8),
(23, 'Santa Rosa', 8),
(24, 'Los Olivos Norte', 8),
(25, 'Los Pinos', 9),
(26, 'San Martín', 9),
(27, 'Zarate', 9),
(28, 'Pueblo Joven', 10),
(29, 'Villa Sol', 10),
(30, 'Santa María', 10);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `distritos`
--
ALTER TABLE `distritos`
  ADD PRIMARY KEY (`id_distrito`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id_persona`),
  ADD UNIQUE KEY `dni` (`dni`),
  ADD KEY `distrito_id` (`distrito_id`),
  ADD KEY `zona_id` (`zona_id`);

--
-- Indices de la tabla `propiedades`
--
ALTER TABLE `propiedades`
  ADD PRIMARY KEY (`id_propiedad`),
  ADD UNIQUE KEY `cod_catastral` (`cod_catastral`),
  ADD KEY `id_persona` (`id_persona`);

--
-- Indices de la tabla `zonas`
--
ALTER TABLE `zonas`
  ADD PRIMARY KEY (`id_zona`),
  ADD KEY `distrito_id` (`distrito_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `distritos`
--
ALTER TABLE `distritos`
  MODIFY `id_distrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `propiedades`
--
ALTER TABLE `propiedades`
  MODIFY `id_propiedad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `zonas`
--
ALTER TABLE `zonas`
  MODIFY `id_zona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `personas`
--
ALTER TABLE `personas`
  ADD CONSTRAINT `personas_ibfk_1` FOREIGN KEY (`distrito_id`) REFERENCES `distritos` (`id_distrito`),
  ADD CONSTRAINT `personas_ibfk_2` FOREIGN KEY (`zona_id`) REFERENCES `zonas` (`id_zona`);

--
-- Filtros para la tabla `propiedades`
--
ALTER TABLE `propiedades`
  ADD CONSTRAINT `propiedades_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`);

--
-- Filtros para la tabla `zonas`
--
ALTER TABLE `zonas`
  ADD CONSTRAINT `zonas_ibfk_1` FOREIGN KEY (`distrito_id`) REFERENCES `distritos` (`id_distrito`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
