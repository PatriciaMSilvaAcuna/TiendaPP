-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-06-2024 a las 15:13:24
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tiendapabeso`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caja`
--

CREATE TABLE `caja` (
  `id_Caja` int(11) NOT NULL,
  `id_Empleado` int(11) NOT NULL,
  `monto_Inicio` double NOT NULL,
  `monto_Final` double NOT NULL,
  `fecha_Apertura` datetime DEFAULT NULL,
  `fecha_Cierre` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `caja`
--

INSERT INTO `caja` (`id_Caja`, `id_Empleado`, `monto_Inicio`, `monto_Final`, `fecha_Apertura`, `fecha_Cierre`) VALUES
(1, 11, 1600, 1, '2024-06-28 00:00:00', '2024-06-28 00:00:00'),
(2, 11, 7000, 7888, '2024-06-28 00:00:00', '2024-06-28 00:00:00'),
(3, 11, 70, 0, '2024-06-28 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `color`
--

CREATE TABLE `color` (
  `id_Color` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `color`
--

INSERT INTO `color` (`id_Color`, `nombre`) VALUES
(1, 'blanco'),
(2, 'negro'),
(3, 'verde'),
(4, 'verde');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleventa`
--

CREATE TABLE `detalleventa` (
  `id_Detalle_venta` int(11) NOT NULL,
  `id_Venta` int(11) NOT NULL,
  `id_Prenda` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` double DEFAULT NULL,
  `subtotal` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id_Empleado` int(11) NOT NULL,
  `dni` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `contrasena` varchar(100) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `id_Tipo_de_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id_Empleado`, `dni`, `nombre`, `usuario`, `contrasena`, `estado`, `id_Tipo_de_usuario`) VALUES
(11, 30953341, 'Patricia', 'Pato', '1234', 1, 1),
(12, 34555666, 'Belen', 'Belu', '1234', 1, 2),
(17, 12345678, 'ADMIN', 'ADMIN', '1234', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mediodepago`
--

CREATE TABLE `mediodepago` (
  `id_Medio_de_pago` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `mediodepago`
--

INSERT INTO `mediodepago` (`id_Medio_de_pago`, `nombre`) VALUES
(1, 'Efectivo'),
(2, 'Tarjeta Debito'),
(3, 'Tarjeta Credito');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id_Pedido` int(11) NOT NULL,
  `id_Prenda` int(11) NOT NULL,
  `precio` double NOT NULL,
  `cantidad` int(11) NOT NULL,
  `subtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precio`
--

CREATE TABLE `precio` (
  `id_Precio` int(11) NOT NULL,
  `id_Prenda` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `fecha_Inicio` int(11) NOT NULL,
  `fecha_Fin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `precio`
--

INSERT INTO `precio` (`id_Precio`, `id_Prenda`, `precio`, `fecha_Inicio`, `fecha_Fin`) VALUES
(1, 1, 1000, 2023, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prendas`
--

CREATE TABLE `prendas` (
  `id_Prenda` int(11) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `id_Tipo_de_prenda` int(11) NOT NULL,
  `id_Color` int(11) NOT NULL,
  `id_Talle` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `stock_Minimo` int(11) NOT NULL,
  `id_Precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `prendas`
--

INSERT INTO `prendas` (`id_Prenda`, `descripcion`, `id_Tipo_de_prenda`, `id_Color`, `id_Talle`, `stock`, `stock_Minimo`, `id_Precio`) VALUES
(1, 'remera cuello v', 1, 1, 1, 101, 10, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talle`
--

CREATE TABLE `talle` (
  `id_Talle` int(11) NOT NULL,
  `nombre` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `talle`
--

INSERT INTO `talle` (`id_Talle`, `nombre`) VALUES
(1, 'S'),
(2, 'M'),
(3, 'L'),
(4, 'XL'),
(5, 'XXL'),
(6, 'XXL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodeprenda`
--

CREATE TABLE `tipodeprenda` (
  `id_Tipo_de_prenda` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `tipodeprenda`
--

INSERT INTO `tipodeprenda` (`id_Tipo_de_prenda`, `nombre`) VALUES
(1, 'remera'),
(2, 'pantalon corto'),
(3, 'pollera'),
(4, 'pantalon largo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodeusuario`
--

CREATE TABLE `tipodeusuario` (
  `id_Tipo_de_usuario` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `tipodeusuario`
--

INSERT INTO `tipodeusuario` (`id_Tipo_de_usuario`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Vendedor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_ventas` int(11) NOT NULL,
  `id_Empleado` int(11) NOT NULL,
  `fecha_Venta` datetime DEFAULT NULL,
  `id_Medio_de_pago` int(11) DEFAULT NULL,
  `total` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_ventas`, `id_Empleado`, `fecha_Venta`, `id_Medio_de_pago`, `total`) VALUES
(1, 1, '2023-11-09 00:00:00', 1, 3000),
(2, 11, '2024-06-28 02:57:43', 1, 1000),
(3, 11, '2024-06-28 03:03:49', 1, 1000),
(4, 11, '2024-06-28 03:04:11', 2, 1000);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `caja`
--
ALTER TABLE `caja`
  ADD PRIMARY KEY (`id_Caja`),
  ADD KEY `fk_idEmpleado` (`id_Empleado`);

--
-- Indices de la tabla `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id_Color`);

--
-- Indices de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD PRIMARY KEY (`id_Detalle_venta`),
  ADD KEY `id_Venta` (`id_Venta`),
  ADD KEY `id_Prenda` (`id_Prenda`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id_Empleado`),
  ADD KEY `id_Tipo_de_usuario` (`id_Tipo_de_usuario`);

--
-- Indices de la tabla `mediodepago`
--
ALTER TABLE `mediodepago`
  ADD PRIMARY KEY (`id_Medio_de_pago`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_Pedido`),
  ADD KEY `id_Prenda` (`id_Prenda`);

--
-- Indices de la tabla `precio`
--
ALTER TABLE `precio`
  ADD PRIMARY KEY (`id_Precio`),
  ADD KEY `id_Prenda` (`id_Prenda`);

--
-- Indices de la tabla `prendas`
--
ALTER TABLE `prendas`
  ADD PRIMARY KEY (`id_Prenda`),
  ADD KEY `fk_id_Precio_idx` (`id_Precio`);

--
-- Indices de la tabla `talle`
--
ALTER TABLE `talle`
  ADD PRIMARY KEY (`id_Talle`);

--
-- Indices de la tabla `tipodeprenda`
--
ALTER TABLE `tipodeprenda`
  ADD PRIMARY KEY (`id_Tipo_de_prenda`);

--
-- Indices de la tabla `tipodeusuario`
--
ALTER TABLE `tipodeusuario`
  ADD PRIMARY KEY (`id_Tipo_de_usuario`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_ventas`),
  ADD KEY `fk_Mediodepago` (`id_Medio_de_pago`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `caja`
--
ALTER TABLE `caja`
  MODIFY `id_Caja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `color`
--
ALTER TABLE `color`
  MODIFY `id_Color` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  MODIFY `id_Detalle_venta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id_Empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `mediodepago`
--
ALTER TABLE `mediodepago`
  MODIFY `id_Medio_de_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_Pedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `prendas`
--
ALTER TABLE `prendas`
  MODIFY `id_Prenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `talle`
--
ALTER TABLE `talle`
  MODIFY `id_Talle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tipodeprenda`
--
ALTER TABLE `tipodeprenda`
  MODIFY `id_Tipo_de_prenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipodeusuario`
--
ALTER TABLE `tipodeusuario`
  MODIFY `id_Tipo_de_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_ventas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `caja`
--
ALTER TABLE `caja`
  ADD CONSTRAINT `fk_idEmpleado` FOREIGN KEY (`id_Empleado`) REFERENCES `empleado` (`id_Empleado`);

--
-- Filtros para la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD CONSTRAINT `detalleventa_ibfk_1` FOREIGN KEY (`id_Venta`) REFERENCES `ventas` (`id_ventas`),
  ADD CONSTRAINT `detalleventa_ibfk_2` FOREIGN KEY (`id_Prenda`) REFERENCES `prendas` (`id_Prenda`);

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`id_Tipo_de_usuario`) REFERENCES `tipodeusuario` (`id_Tipo_de_usuario`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`id_Prenda`) REFERENCES `prendas` (`id_Prenda`);

--
-- Filtros para la tabla `precio`
--
ALTER TABLE `precio`
  ADD CONSTRAINT `precio_ibfk_1` FOREIGN KEY (`id_Prenda`) REFERENCES `prendas` (`id_Prenda`);

--
-- Filtros para la tabla `prendas`
--
ALTER TABLE `prendas`
  ADD CONSTRAINT `fk_idColor` FOREIGN KEY (`id_Prenda`) REFERENCES `color` (`id_Color`),
  ADD CONSTRAINT `fk_idTalle` FOREIGN KEY (`id_Prenda`) REFERENCES `talle` (`id_Talle`),
  ADD CONSTRAINT `fk_idTipoPrenda` FOREIGN KEY (`id_Prenda`) REFERENCES `tipodeprenda` (`id_Tipo_de_prenda`),
  ADD CONSTRAINT `fk_id_Precio` FOREIGN KEY (`id_Precio`) REFERENCES `precio` (`id_Precio`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `fk_Mediodepago` FOREIGN KEY (`id_Medio_de_pago`) REFERENCES `mediodepago` (`id_Medio_de_pago`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
