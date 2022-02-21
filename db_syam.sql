-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-02-2022 a las 02:42:11
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_syam`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_orden`
--

CREATE TABLE `detalles_orden` (
  `Id` int(11) NOT NULL,
  `Id_orden` int(11) NOT NULL,
  `Id_articulo` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalles_orden`
--

INSERT INTO `detalles_orden` (`Id`, `Id_orden`, `Id_articulo`) VALUES
(57, 48, 'DepilYA'),
(58, 48, 'Foam'),
(59, 48, 'Bronceador'),
(60, 49, 'Antiestrias'),
(61, 49, 'Dermatónico'),
(62, 50, 'Despigmentante Facial'),
(63, 50, 'DepilYA'),
(64, 51, 'Antiestrias'),
(65, 51, 'Bronceador'),
(66, 52, 'Antiestrias'),
(67, 53, 'Dermatónico'),
(68, 53, 'Carbón Activado WIKI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden`
--

CREATE TABLE `orden` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Fecha` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Subtotal` double NOT NULL,
  `Iva` double NOT NULL,
  `Total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `orden`
--

INSERT INTO `orden` (`Id`, `Nombre`, `Fecha`, `Subtotal`, `Iva`, `Total`) VALUES
(48, 'Juan Manuel', '2022-02-21 10:00:00', 125000, 23750, 148750),
(49, 'Laura Marin', '2022-02-16 11:21:00', 110000, 20900, 130900),
(50, 'Alejandra Arango', '2022-02-16 00:23:00', 65000, 12350, 77350),
(51, 'Valentina Cano', '2022-02-15 09:31:00', 830000, 157700, 987700),
(52, 'Camila', '2022-02-22 22:24:00', 35000, 6650, 41650),
(53, 'Sara vasquez', '2022-02-25 11:30:00', 970000, 184300, 1154300);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalles_orden`
--
ALTER TABLE `detalles_orden`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `orden`
--
ALTER TABLE `orden`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalles_orden`
--
ALTER TABLE `detalles_orden`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT de la tabla `orden`
--
ALTER TABLE `orden`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
