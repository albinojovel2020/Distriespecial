-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 13-09-2020 a las 03:33:57
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `Distribuidora_Especial`
--
CREATE DATABASE IF NOT EXISTS `Distribuidora_Especial` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `Distribuidora_Especial`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Categoria`
--

CREATE TABLE `Categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(80) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Compra`
--

CREATE TABLE `Compra` (
  `id_compra` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_unitario` decimal(3,2) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `descripcion` varchar(80) NOT NULL,
  `unidad` varchar(20) NOT NULL,
  `total_compra` decimal(4,2) NOT NULL,
  `fecha_compra` date NOT NULL,
  `subtotal` decimal(4,2) NOT NULL,
  `total_iva` decimal(5,2) NOT NULL,
  `numero_compra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_Compra`
--

CREATE TABLE `detalle_Compra` (
  `id_detalle_compra` int(11) NOT NULL,
  `id_compra` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `dui_proveedor` varchar(9) NOT NULL,
  `numero_compra` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `precio_compra` decimal(3,2) NOT NULL,
  `cantidad_compra` int(11) NOT NULL,
  `descuento` int(11) NOT NULL,
  `fecha_compra` date NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `total_compra` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_Venta`
--

CREATE TABLE `detalle_Venta` (
  `id_detalle_venta` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `fecha_venta` date NOT NULL,
  `precio_venta` decimal(3,2) NOT NULL,
  `cantidad_venta` int(11) NOT NULL,
  `descuento` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `total_venta` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Estado`
--

CREATE TABLE `Estado` (
  `id_estado` int(11) NOT NULL,
  `nombre` varchar(10) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Estado`
--

INSERT INTO `Estado` (`id_estado`, `nombre`, `descripcion`) VALUES
(0, 'Inactivo', 'Estado es 0 y se encuentra inactivo'),
(1, 'Activo', 'Estado es 1 y se encuentra activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta_Secreta`
--

CREATE TABLE `pregunta_Secreta` (
  `id_pregunta_secreta` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pregunta_Secreta`
--

INSERT INTO `pregunta_Secreta` (`id_pregunta_secreta`, `nombre`) VALUES
(1, 'Nombre de tu Primer Mascota'),
(2, 'Nombre de tu abuela Paterna');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Producto`
--

CREATE TABLE `Producto` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `precio_unitario` decimal(3,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Proveedor`
--

CREATE TABLE `Proveedor` (
  `id_proveedor` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `direccion_empresa` varchar(100) NOT NULL,
  `nombre_empresa` varchar(50) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_Usuario`
--

CREATE TABLE `tipo_Usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_Usuario`
--

INSERT INTO `tipo_Usuario` (`id_usuario`, `nombre`, `descripcion`) VALUES
(1, 'Administrador', 'Tendra acceso a todo el sistema de Inventario y Facturación \"Distribuidora Especial\"'),
(2, 'Normal', 'No Tendra acceso a todo el sistema de Inventario y Facturación \"Distribuidora Especial\"');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuario`
--

CREATE TABLE `Usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `clave` varchar(20) NOT NULL,
  `id_pregunta_secreta` int(11) NOT NULL,
  `respuesta_secreta` varchar(100) NOT NULL,
  `id_tipo_usuario` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Usuario`
--

INSERT INTO `Usuario` (`id_usuario`, `nombre`, `apellido`, `telefono`, `usuario`, `clave`, `id_pregunta_secreta`, `respuesta_secreta`, `id_tipo_usuario`, `id_estado`) VALUES
(1, 'Andres', 'Pineda', '2334-1213', 'totty', '1234', 1, 'Pirata', 1, 1),
(2, 'Brayan', 'Rosales', '2333-1133', 'el bryan', '1234', 1, 'Dolar', 1, 0),
(3, 'Luis', 'Pocasangre', '2334-1122', 'comunica', '1234', 2, 'María', 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Venta`
--

CREATE TABLE `Venta` (
  `id_venta` int(11) NOT NULL,
  `fecha_venta` date NOT NULL,
  `numero_venta` int(11) NOT NULL,
  `subtotal` decimal(4,2) NOT NULL,
  `iva` int(11) NOT NULL,
  `total` decimal(4,2) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Categoria`
--
ALTER TABLE `Categoria`
  ADD PRIMARY KEY (`id_categoria`),
  ADD KEY `fk_categoria_usuario` (`id_usuario`);

--
-- Indices de la tabla `Compra`
--
ALTER TABLE `Compra`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `fk_compra_usuario` (`id_usuario`),
  ADD KEY `fk_compra_proveedor` (`id_proveedor`);

--
-- Indices de la tabla `detalle_Compra`
--
ALTER TABLE `detalle_Compra`
  ADD PRIMARY KEY (`id_detalle_compra`),
  ADD KEY `fk_detallecompra_compra` (`id_compra`),
  ADD KEY `fk_detallecompra_proveedor` (`id_proveedor`),
  ADD KEY `fk_detallecompra_producto` (`id_producto`),
  ADD KEY `fk_detallecompra_categoria` (`id_categoria`);

--
-- Indices de la tabla `detalle_Venta`
--
ALTER TABLE `detalle_Venta`
  ADD PRIMARY KEY (`id_detalle_venta`),
  ADD KEY `fk_detalleventa_venta` (`id_venta`),
  ADD KEY `fk_detalleventa_producto` (`id_producto`),
  ADD KEY `fk_detalleventa_categoria` (`id_categoria`);

--
-- Indices de la tabla `Estado`
--
ALTER TABLE `Estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `pregunta_Secreta`
--
ALTER TABLE `pregunta_Secreta`
  ADD PRIMARY KEY (`id_pregunta_secreta`);

--
-- Indices de la tabla `Producto`
--
ALTER TABLE `Producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `fk_producto_usuario` (`id_usuario`),
  ADD KEY `fk_producto_categoria` (`id_categoria`),
  ADD KEY `fk_producto_estado` (`id_estado`),
  ADD KEY `fk_producto_proveedor` (`id_proveedor`);

--
-- Indices de la tabla `Proveedor`
--
ALTER TABLE `Proveedor`
  ADD PRIMARY KEY (`id_proveedor`),
  ADD KEY `fk_proveedor_usuario` (`id_usuario`),
  ADD KEY `fk_proveedor_estado` (`id_estado`);

--
-- Indices de la tabla `tipo_Usuario`
--
ALTER TABLE `tipo_Usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `Usuario`
--
ALTER TABLE `Usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `fk_usuario_tipousuario` (`id_tipo_usuario`),
  ADD KEY `fk_usuario_estado` (`id_estado`),
  ADD KEY `fk_usuario_preguntasecreta` (`id_pregunta_secreta`);

--
-- Indices de la tabla `Venta`
--
ALTER TABLE `Venta`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `fk_venta_usuario` (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Categoria`
--
ALTER TABLE `Categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Compra`
--
ALTER TABLE `Compra`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_Venta`
--
ALTER TABLE `detalle_Venta`
  MODIFY `id_detalle_venta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Estado`
--
ALTER TABLE `Estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `pregunta_Secreta`
--
ALTER TABLE `pregunta_Secreta`
  MODIFY `id_pregunta_secreta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `Producto`
--
ALTER TABLE `Producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Proveedor`
--
ALTER TABLE `Proveedor`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_Usuario`
--
ALTER TABLE `tipo_Usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `Usuario`
--
ALTER TABLE `Usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `Venta`
--
ALTER TABLE `Venta`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Categoria`
--
ALTER TABLE `Categoria`
  ADD CONSTRAINT `fk_categoria_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `Usuario` (`id_usuario`);

--
-- Filtros para la tabla `Compra`
--
ALTER TABLE `Compra`
  ADD CONSTRAINT `fk_compra_proveedor` FOREIGN KEY (`id_proveedor`) REFERENCES `Proveedor` (`id_proveedor`),
  ADD CONSTRAINT `fk_compra_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `Usuario` (`id_usuario`);

--
-- Filtros para la tabla `detalle_Compra`
--
ALTER TABLE `detalle_Compra`
  ADD CONSTRAINT `fk_detallecompra_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `Categoria` (`id_categoria`),
  ADD CONSTRAINT `fk_detallecompra_compra` FOREIGN KEY (`id_compra`) REFERENCES `Compra` (`id_compra`),
  ADD CONSTRAINT `fk_detallecompra_producto` FOREIGN KEY (`id_producto`) REFERENCES `Producto` (`id_producto`),
  ADD CONSTRAINT `fk_detallecompra_proveedor` FOREIGN KEY (`id_proveedor`) REFERENCES `Proveedor` (`id_proveedor`);

--
-- Filtros para la tabla `detalle_Venta`
--
ALTER TABLE `detalle_Venta`
  ADD CONSTRAINT `fk_detalleventa_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `Categoria` (`id_categoria`),
  ADD CONSTRAINT `fk_detalleventa_producto` FOREIGN KEY (`id_producto`) REFERENCES `Producto` (`id_producto`),
  ADD CONSTRAINT `fk_detalleventa_venta` FOREIGN KEY (`id_venta`) REFERENCES `Venta` (`id_venta`);

--
-- Filtros para la tabla `Producto`
--
ALTER TABLE `Producto`
  ADD CONSTRAINT `fk_producto_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `Categoria` (`id_categoria`),
  ADD CONSTRAINT `fk_producto_estado` FOREIGN KEY (`id_estado`) REFERENCES `Estado` (`id_estado`),
  ADD CONSTRAINT `fk_producto_proveedor` FOREIGN KEY (`id_proveedor`) REFERENCES `Proveedor` (`id_proveedor`),
  ADD CONSTRAINT `fk_producto_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `Usuario` (`id_usuario`);

--
-- Filtros para la tabla `Proveedor`
--
ALTER TABLE `Proveedor`
  ADD CONSTRAINT `fk_proveedor_estado` FOREIGN KEY (`id_estado`) REFERENCES `Estado` (`id_estado`),
  ADD CONSTRAINT `fk_proveedor_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `Usuario` (`id_usuario`);

--
-- Filtros para la tabla `Usuario`
--
ALTER TABLE `Usuario`
  ADD CONSTRAINT `fk_usuario_estado` FOREIGN KEY (`id_estado`) REFERENCES `Estado` (`id_estado`),
  ADD CONSTRAINT `fk_usuario_preguntasecreta` FOREIGN KEY (`id_pregunta_secreta`) REFERENCES `pregunta_Secreta` (`id_pregunta_secreta`),
  ADD CONSTRAINT `fk_usuario_tipousuario` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tipo_Usuario` (`id_usuario`);

--
-- Filtros para la tabla `Venta`
--
ALTER TABLE `Venta`
  ADD CONSTRAINT `fk_venta_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `Usuario` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
