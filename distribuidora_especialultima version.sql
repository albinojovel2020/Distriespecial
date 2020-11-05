-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-11-2020 a las 17:22:38
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
-- Base de datos: `distribuidora_especial`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `ps_guardar_detalleventa` (IN `val_idventa` INT, IN `val_idproducto` INT, IN `val_cantidadventa` INT, IN `val_precioventa` DECIMAL(10,2), IN `val_montoiva` DECIMAL(10,2))  BEGIN
	
	INSERT INTO `detalleventa` (`iddetalleventa`, `idventa`, `idproducto`, `cantidadventa`, `precioventa`,`montoiva`) VALUES (NULL, val_idventa, val_idproducto, val_cantidadventa, val_precioventa,val_montoiva);


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ps_guardar_venta` (IN `val_numeroventa` INT, IN `val_fechaventa` VARCHAR(50), IN `val_total` DECIMAL(10,2), IN `val_idusuario` INT, IN `val_tipo_comprobante` INT, IN `val_tiva` DECIMAL(10,2), IN `val_cliente` VARCHAR(200), IN `val_giro` VARCHAR(500), IN `val_nrc` VARCHAR(20), IN `val_nit` VARCHAR(20))  BEGIN
	
	INSERT INTO `venta`(`numeroventa`, `fechaventa`, `total`, `idusuario`, `tipo_comprobante`,`tiva`,`cliente`,`giro`,`nrc`,`nit`) 
	VALUES (val_numeroventa,val_fechaventa,val_total,val_idusuario,val_tipo_comprobante,val_tiva,val_cliente,val_giro,val_nrc,val_nit);
    
     SELECT last_insert_id() AS nuevoid;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idcategoria` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(80) NOT NULL,
  `idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idcategoria`, `nombre`, `descripcion`, `idusuario`) VALUES
(1, 'Cereales', 'Productos cereales', 1),
(2, 'Granos basicos', 'Todo tipo de grano basico', 16),
(3, 'Carnes', 'Todo tipo de carnes', 16),
(4, 'Confiteria', 'Todo tipo de dulces', 2),
(5, 'Leches', 'Todo tipo de leches', 1),
(6, 'Semillas', 'Todo tipo de semillas', 1),
(7, 'Toppings', 'Todo tipo de toppings', 2),
(8, 'Harinas', 'Todo tipo de harinas', 16),
(9, 'Utensilios', 'Utencilios de cocina', 15),
(10, 'Manteca', 'Todo tipo de mantecas', 2),
(11, 'Saborizantes', 'Todo tipo de saborizantes', 1),
(13, 'Sopitas', 'sopitas', 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_comprobante`
--

CREATE TABLE `cat_comprobante` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cat_comprobante`
--

INSERT INTO `cat_comprobante` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Factura consumidor final', 'Factura para consumidor final'),
(2, 'Comprobante de credito fiscal', 'Factura con credito fiscal'),
(3, 'Nota de envio', 'Comprobante de nota de envio'),
(4, 'Ticket', 'ticket');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_impuesto`
--

CREATE TABLE `cat_impuesto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `porcentaje` int(11) NOT NULL,
  `monto` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cat_impuesto`
--

INSERT INTO `cat_impuesto` (`id`, `nombre`, `descripcion`, `porcentaje`, `monto`) VALUES
(1, 'IVA', 'Impuesto al valor agregado', 13, '0.13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_medidas`
--

CREATE TABLE `cat_medidas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(10) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `codigo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cat_medidas`
--

INSERT INTO `cat_medidas` (`id`, `nombre`, `descripcion`, `codigo`) VALUES
(1, 'Onza', 'Medida de producto en onzas', 'UONZA'),
(2, 'Libra', 'Medida de producto en libras', 'ULIBRA'),
(3, 'Litro', 'Medida de producto en Litros', 'ULITRO'),
(4, 'Galon', 'Medida de producto en galones', 'UGALON'),
(5, 'Metro', 'Unidad de producto en metros', 'UMETRO'),
(6, 'Mililitros', 'Unidad de medida en militiros', 'UMILI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleventa`
--

CREATE TABLE `detalleventa` (
  `iddetalleventa` int(11) NOT NULL,
  `idventa` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `cantidadventa` int(11) DEFAULT NULL,
  `precioventa` decimal(6,2) NOT NULL,
  `montoiva` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalleventa`
--

INSERT INTO `detalleventa` (`iddetalleventa`, `idventa`, `idproducto`, `cantidadventa`, `precioventa`, `montoiva`) VALUES
(128, 129, 15, 1, '3.65', '0.47'),
(129, 129, 16, 1, '3.00', '0.39'),
(130, 130, 15, 1, '3.00', '0.39'),
(131, 130, 16, 1, '3.00', '0.39'),
(132, 131, 15, 1, '3.65', '0.47'),
(133, 131, 16, 1, '2.50', '0.33'),
(134, 132, 15, 1, '3.00', '0.39'),
(135, 132, 16, 1, '2.50', '0.33'),
(136, 133, 16, 1, '2.50', '0.33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso_producto`
--

CREATE TABLE `ingreso_producto` (
  `id` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `stockanterior` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `stockdespues` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `fcrea` date NOT NULL,
  `motivo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ingreso_producto`
--

INSERT INTO `ingreso_producto` (`id`, `idproducto`, `stockanterior`, `cantidad`, `stockdespues`, `usuario`, `fcrea`, `motivo`) VALUES
(54, 15, 0, 20, 20, 15, '2020-10-24', 'Por compra a proveedores'),
(55, 15, 0, 100, 100, 16, '2020-11-04', 'Por compra a proveedores'),
(56, 16, 0, 60, 60, 16, '2020-11-04', 'Por compra a proveedores');

--
-- Disparadores `ingreso_producto`
--
DELIMITER $$
CREATE TRIGGER `TIPRODUCTOS` AFTER INSERT ON `ingreso_producto` FOR EACH ROW UPDATE producto SET stock = stock + NEW.cantidad where idproducto = NEW.idproducto
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntasecreta`
--

CREATE TABLE `preguntasecreta` (
  `idpreguntasecreta` tinyint(4) NOT NULL,
  `nombre` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `preguntasecreta`
--

INSERT INTO `preguntasecreta` (`idpreguntasecreta`, `nombre`) VALUES
(1, 'mi nombre'),
(2, 'mi apellido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idproducto` int(11) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `preciocompra` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `imagen` varchar(90) NOT NULL,
  `idcategoria` int(11) NOT NULL,
  `idproveedor` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `umedida` int(11) NOT NULL,
  `precio1` decimal(10,2) NOT NULL,
  `precio2` decimal(10,2) NOT NULL,
  `precio3` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idproducto`, `nombre`, `descripcion`, `preciocompra`, `stock`, `imagen`, `idcategoria`, `idproveedor`, `idusuario`, `estado`, `umedida`, `precio1`, `precio2`, `precio3`) VALUES
(15, 'Harina de Trigo', 'Harina de trigo suave', '2.00', 100, 'img/producto.jpg', 8, 3, 16, 1, 2, '3.00', '3.65', '3.85'),
(16, 'harina arroz', 'arroz', '2.00', 60, 'img/logoulsfull_oficial_web.jpg', 1, 1, 15, 1, 2, '2.50', '3.00', '3.50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `idproveedor` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `dui` varchar(10) NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `direccionempresa` varchar(100) NOT NULL,
  `nombreempresa` varchar(50) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`idproveedor`, `nombre`, `apellido`, `dui`, `telefono`, `direccionempresa`, `nombreempresa`, `idusuario`, `estado`) VALUES
(1, 'Distribuidora Morazan', 'SA de CV', '00000000-0', '7777-7777', 'Calle a morazan #3', 'Distribuidora Morazan', 1, 1),
(2, 'Lido', 'SA de CV', '00000000-0', '7777-7777', 'CALLE EL NANCE', 'NESTLE', 16, 1),
(3, 'Inversiones rugamas', 'sa de cv', '88888888-8', '8787-8787', 'ALALALALA', 'Inversiones rugamas', 16, 1),
(4, 'Chocolate and co', 'sa de cv', '00000000-0', '7878-7878', 'calle a mariona', 'Chocolate and co', 16, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposusuario`
--

CREATE TABLE `tiposusuario` (
  `idtipousuario` tinyint(4) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `descripcion` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tiposusuario`
--

INSERT INTO `tiposusuario` (`idtipousuario`, `nombre`, `descripcion`) VALUES
(1, 'Administrador', 'todos los permisos'),
(2, 'Normal', 'pocos permisos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `clave` varchar(32) NOT NULL,
  `fecha` varchar(100) NOT NULL,
  `idpreguntasecreta` tinyint(4) NOT NULL,
  `respuestasecreta` varchar(32) NOT NULL,
  `idtipousuario` tinyint(4) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `apellido`, `telefono`, `usuario`, `clave`, `fecha`, `idpreguntasecreta`, `respuestasecreta`, `idtipousuario`, `estado`) VALUES
(1, 'Luis', 'Carranza', '2222-0505', 'usuario1', 'f688ae26e9cfa3ba6235477831d5122e', 'Ultima modificación: 2020-09-20 a las 08:29:08 AM', 1, 'brayan', 1, 1),
(2, 'Brayan', 'Salomon Fuentes Quijano', '7777-7779', 'el brayan', '81dc9bdb52d04dc20036dbd8313ed055', 'Modificación: 2020-09-20 a las 07:21:45 AM', 2, 'andres', 1, 1),
(15, 'Andres', 'Pineda', '2322-4344', 'andrew', '231badb19b93e44f47da1bd64a8147f2', 'Modificación: 2020-09-20 a las 08:28:20 AM', 1, '231badb19b93e44f47da1bd64a8147f2', 1, 1),
(16, 'Rafael Albino', 'Jovel Alfaro', '7786-7999', 'albino', 'cbe7855c7afdb4a521ee4d1a63d89e89', 'Modificación: 2020-09-30 a las 10:04:32 PM', 1, 'cbe7855c7afdb4a521ee4d1a63d89e89', 1, 1),
(17, 'Carlos', 'Alfaro', '2222-2222', 'davialfa', 'a008167316b8afef949b8f3146ed42e5', '2020-09-30 a las 10:27:41 PM', 1, 'eb8dd5745ad86bcbd8f87b4ed20013b4', 1, 1),
(18, 'Rafael', 'Jovel', '7777-7777', 'rafael.jovel@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2020-10-09 a las 01:27:41 PM', 1, '35cd2d0d62d9bc5e60a3ca9f7593b05b', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `idventa` int(11) NOT NULL,
  `numeroventa` int(11) NOT NULL,
  `fechaventa` varchar(100) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `tipo_comprobante` int(11) NOT NULL,
  `anulada` tinyint(1) NOT NULL,
  `tiva` decimal(10,2) NOT NULL,
  `cliente` varchar(200) DEFAULT NULL,
  `giro` varchar(500) DEFAULT NULL,
  `nrc` varchar(20) DEFAULT NULL,
  `nit` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`idventa`, `numeroventa`, `fechaventa`, `total`, `idusuario`, `tipo_comprobante`, `anulada`, `tiva`, `cliente`, `giro`, `nrc`, `nit`) VALUES
(129, 54554, '2020-11-03 11:34:21 AM', '7.51', 16, 1, 0, '0.86', '', '', '', ''),
(130, 7777, '2020-11-03 11:40:48 AM', '6.78', 16, 1, 0, '0.78', '', '', '', ''),
(131, 34344, '2020-11-03 01:50:24 PM', '6.95', 16, 2, 0, '0.80', 'Mirna Flores', 'Venta de Articulos de panaderia', '', ''),
(132, 23, '2020-11-03 01:57:57 PM', '6.22', 16, 2, 0, '0.72', 'Alberto Garcia', 'Venta de Animales', '9898-8', '0614-230794-177-6'),
(133, 9897, '2020-11-03 02:40:33 PM', '2.83', 16, 4, 0, '0.33', 'Albberto antonio', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas_producto`
--

CREATE TABLE `ventas_producto` (
  `id` int(11) NOT NULL,
  `idventa` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `stockanterior` int(11) NOT NULL,
  `cantidadventa` int(11) NOT NULL,
  `stockdespues` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `preciocompra` decimal(10,2) NOT NULL,
  `precioventa` decimal(10,2) NOT NULL,
  `fcrea` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ventas_producto`
--

INSERT INTO `ventas_producto` (`id`, `idventa`, `idproducto`, `stockanterior`, `cantidadventa`, `stockdespues`, `usuario`, `preciocompra`, `precioventa`, `fcrea`) VALUES
(36, 129, 15, 4, 1, 3, 16, '2.00', '3.65', '2020-11-03'),
(37, 129, 16, 5, 1, 4, 16, '2.00', '3.00', '2020-11-03'),
(38, 130, 15, 3, 1, 2, 16, '2.00', '3.00', '2020-11-03'),
(39, 130, 16, 4, 1, 3, 16, '2.00', '3.00', '2020-11-03'),
(40, 131, 15, 2, 1, 1, 16, '2.00', '3.65', '2020-11-03'),
(41, 131, 16, 3, 1, 2, 16, '2.00', '2.50', '2020-11-03'),
(42, 132, 15, 1, 1, 0, 16, '2.00', '3.00', '2020-11-03'),
(43, 132, 16, 2, 1, 1, 16, '2.00', '2.50', '2020-11-03'),
(44, 133, 16, 1, 1, 0, 16, '2.00', '2.50', '2020-11-03');

--
-- Disparadores `ventas_producto`
--
DELIMITER $$
CREATE TRIGGER `TIVENTASPRODUCTO` AFTER INSERT ON `ventas_producto` FOR EACH ROW UPDATE producto SET stock = stock - NEW.cantidadventa where idproducto = NEW.idproducto
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idcategoria`),
  ADD KEY `fk_categoria_usuario` (`idusuario`);

--
-- Indices de la tabla `cat_comprobante`
--
ALTER TABLE `cat_comprobante`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cat_impuesto`
--
ALTER TABLE `cat_impuesto`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `cat_medidas`
--
ALTER TABLE `cat_medidas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD PRIMARY KEY (`iddetalleventa`),
  ADD KEY `fk_detalleventa_venta` (`idventa`),
  ADD KEY `fk_detalleventa_producto` (`idproducto`);

--
-- Indices de la tabla `ingreso_producto`
--
ALTER TABLE `ingreso_producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_producto` (`idproducto`),
  ADD KEY `fk_usuario` (`usuario`);

--
-- Indices de la tabla `preguntasecreta`
--
ALTER TABLE `preguntasecreta`
  ADD PRIMARY KEY (`idpreguntasecreta`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idproducto`),
  ADD KEY `fk_producto_categoria` (`idcategoria`),
  ADD KEY `fk_producto_proveedor` (`idproveedor`),
  ADD KEY `fk_producto_usuario` (`idusuario`),
  ADD KEY `fkumedida` (`umedida`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`idproveedor`),
  ADD KEY `fk_proveedor_usuario` (`idusuario`);

--
-- Indices de la tabla `tiposusuario`
--
ALTER TABLE `tiposusuario`
  ADD PRIMARY KEY (`idtipousuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD KEY `fk_usuario_preguntasecreta` (`idpreguntasecreta`),
  ADD KEY `fk_usuario_tipousuario` (`idtipousuario`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`idventa`),
  ADD KEY `fk_venta_usuario` (`idusuario`),
  ADD KEY `fk_venta_catcomprobante` (`tipo_comprobante`);

--
-- Indices de la tabla `ventas_producto`
--
ALTER TABLE `ventas_producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idventa` (`idventa`),
  ADD KEY `fk_idproducto` (`idproducto`),
  ADD KEY `fk_usuarioid` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `cat_comprobante`
--
ALTER TABLE `cat_comprobante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cat_impuesto`
--
ALTER TABLE `cat_impuesto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cat_medidas`
--
ALTER TABLE `cat_medidas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  MODIFY `iddetalleventa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT de la tabla `ingreso_producto`
--
ALTER TABLE `ingreso_producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `preguntasecreta`
--
ALTER TABLE `preguntasecreta`
  MODIFY `idpreguntasecreta` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idproducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `idproveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tiposusuario`
--
ALTER TABLE `tiposusuario`
  MODIFY `idtipousuario` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `idventa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT de la tabla `ventas_producto`
--
ALTER TABLE `ventas_producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD CONSTRAINT `fk_categoria_usuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`);

--
-- Filtros para la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD CONSTRAINT `fk_detalleventa_producto` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`idproducto`),
  ADD CONSTRAINT `fk_detalleventa_venta` FOREIGN KEY (`idventa`) REFERENCES `venta` (`idventa`);

--
-- Filtros para la tabla `ingreso_producto`
--
ALTER TABLE `ingreso_producto`
  ADD CONSTRAINT `fk_producto` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`idproducto`),
  ADD CONSTRAINT `fk_usuario` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`idusuario`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_producto_categoria` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`idcategoria`),
  ADD CONSTRAINT `fk_producto_proveedor` FOREIGN KEY (`idproveedor`) REFERENCES `proveedor` (`idproveedor`),
  ADD CONSTRAINT `fk_producto_usuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`),
  ADD CONSTRAINT `fkumedida` FOREIGN KEY (`umedida`) REFERENCES `cat_medidas` (`id`);

--
-- Filtros para la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD CONSTRAINT `fk_proveedor_usuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_preguntasecreta` FOREIGN KEY (`idpreguntasecreta`) REFERENCES `preguntasecreta` (`idpreguntasecreta`),
  ADD CONSTRAINT `fk_usuario_tipousuario` FOREIGN KEY (`idtipousuario`) REFERENCES `tiposusuario` (`idtipousuario`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `fk_venta_catcomprobante` FOREIGN KEY (`tipo_comprobante`) REFERENCES `cat_comprobante` (`id`),
  ADD CONSTRAINT `fk_venta_usuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`);

--
-- Filtros para la tabla `ventas_producto`
--
ALTER TABLE `ventas_producto`
  ADD CONSTRAINT `fk_idproducto` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`idproducto`),
  ADD CONSTRAINT `fk_idventa` FOREIGN KEY (`idventa`) REFERENCES `venta` (`idventa`),
  ADD CONSTRAINT `fk_usuarioid` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`idusuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
