-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-12-2020 a las 17:52:24
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
  `descripcion` varchar(200) NOT NULL,
  `correlativo` smallint(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cat_comprobante`
--

INSERT INTO `cat_comprobante` (`id`, `nombre`, `descripcion`, `correlativo`) VALUES
(1, 'Factura consumidor final', 'Factura para consumidor final', 400),
(2, 'Comprobante de credito fiscal', 'Factura con credito fiscal', 300),
(3, 'Nota de envio', 'Comprobante de nota de envio', 200),
(4, 'Ticket', 'ticket', 100);

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
(137, 134, 15, 1, '3.00', '0.39'),
(138, 134, 16, 1, '3.50', '0.46'),
(139, 135, 15, 1, '3.00', '0.39'),
(140, 135, 16, 1, '3.50', '0.46'),
(141, 136, 15, 1, '3.65', '0.47'),
(142, 136, 16, 1, '2.50', '0.33'),
(143, 137, 15, 1, '3.00', '0.39'),
(144, 137, 16, 1, '3.50', '0.46'),
(145, 138, 15, 1, '3.00', '0.39'),
(146, 139, 16, 1, '2.50', '0.33'),
(147, 139, 15, 3, '11.55', '1.50'),
(148, 140, 16, 3, '10.50', '1.37'),
(149, 141, 16, 1, '2.50', '0.33'),
(150, 141, 15, 1, '3.65', '0.47'),
(151, 142, 16, 1, '3.00', '0.39'),
(152, 142, 15, 1, '3.00', '0.39'),
(153, 143, 16, 1, '2.50', '0.33'),
(154, 144, 16, 1, '2.50', '0.33'),
(155, 144, 15, 1, '3.65', '0.47'),
(156, 145, 16, 1, '2.50', '0.33'),
(157, 145, 15, 1, '3.00', '0.39'),
(158, 146, 16, 1, '2.50', '0.33'),
(159, 146, 15, 1, '3.65', '0.47');

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
(57, 15, 0, 100, 100, 16, '2020-11-05', 'Por compra a proveedores'),
(58, 16, 0, 200, 200, 16, '2020-11-05', 'Por compra a proveedores'),
(59, 15, 99, 1, 100, 16, '2020-11-05', 'Por compra a proveedores'),
(60, 15, 100, 1, 101, 16, '2020-11-05', 'Por anulacion de venta'),
(61, 16, 199, 1, 200, 16, '2020-11-05', 'Por anulacion de venta'),
(62, 15, 98, 1, 99, 15, '2020-11-06', 'Por anulacion de venta'),
(63, 16, 197, 1, 198, 15, '2020-11-06', 'Por anulacion de venta'),
(64, 15, 95, 3, 98, 15, '2020-11-21', 'Por anulacion de venta'),
(65, 16, 194, 1, 195, 15, '2020-11-21', 'Por anulacion de venta'),
(66, 15, 98, 1, 99, 15, '2020-11-21', 'Por anulacion de venta'),
(67, 16, 195, 1, 196, 15, '2020-11-21', 'Por anulacion de venta'),
(68, 16, 195, 1, 196, 16, '0000-00-00', 'Por anulacion de venta'),
(69, 15, 97, 1, 98, 16, '0000-00-00', 'Por anulacion de venta'),
(70, 16, 195, 1, 196, 16, '0000-00-00', 'Por anulacion de venta');

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
(15, 'Harina de Trigo', 'Harina de trigo suave', '2.00', 97, 'img/producto.jpg', 8, 3, 16, 1, 2, '3.00', '3.65', '3.85'),
(16, 'harina arroz', 'arroz', '2.00', 195, 'img/logoulsfull_oficial_web.jpg', 1, 1, 15, 1, 2, '2.50', '3.00', '3.50'),
(17, 'Producto Uno', 'Agotado', '3.00', 0, 'img/693300.png', 5, 2, 15, 1, 2, '3.25', '3.50', '3.75'),
(18, 'Producto Dos', 'agotado 2', '1.00', 0, 'img/1513772868_581978_1513774571_noticia_normal.jpg', 6, 3, 15, 1, 3, '2.00', '3.00', '4.00');

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
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `iniciales` varchar(5) NOT NULL,
  `siguientefactura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `apellido`, `telefono`, `usuario`, `clave`, `fecha`, `idpreguntasecreta`, `respuestasecreta`, `idtipousuario`, `estado`, `iniciales`, `siguientefactura`) VALUES
(1, 'Luis', 'Carranza', '2222-0505', 'usuario1', 'f688ae26e9cfa3ba6235477831d5122e', 'Ultima modificación: 2020-09-20 a las 08:29:08 AM', 1, 'brayan', 1, 0, 'LC', 1),
(2, 'Brayan', 'Salomon Fuentes Quijano', '7777-7779', 'el brayan', '81dc9bdb52d04dc20036dbd8313ed055', 'Modificación: 2020-09-20 a las 07:21:45 AM', 2, 'andres', 1, 1, 'BS', 1),
(15, 'Andres', 'Pineda', '2322-4344', 'andrew', '231badb19b93e44f47da1bd64a8147f2', 'Modificación: 2020-09-20 a las 08:28:20 AM', 1, '231badb19b93e44f47da1bd64a8147f2', 1, 1, 'AP', 1),
(16, 'Rafael Albino', 'Jovel Alfaro', '7786-7999', 'albino', 'cbe7855c7afdb4a521ee4d1a63d89e89', 'Modificación: 2020-11-11 a las 08:35:27 PM', 1, 'cbe7855c7afdb4a521ee4d1a63d89e89', 1, 1, 'RA', 2),
(17, 'Carlos', 'Alfaro', '2222-2222', 'davialfa', 'a008167316b8afef949b8f3146ed42e5', '2020-09-30 a las 10:27:41 PM', 1, 'eb8dd5745ad86bcbd8f87b4ed20013b4', 1, 1, 'CA', 1),
(18, 'Rafael', 'Jovel', '7777-7777', 'rafael.jovel@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2020-10-09 a las 01:27:41 PM', 1, '35cd2d0d62d9bc5e60a3ca9f7593b05b', 1, 1, 'RJ', 1),
(20, 'Antonio', 'Garcia', '7786-7999', 'ag5', 'e10adc3949ba59abbe56e057f20f883e', '2020-12-18 a las 07:51:01 AM', 1, '885383f16fccd10370814fcd862aa10d', 1, 1, 'AG', 1),
(21, 'albert', 'albert', '2222-2222', 'albert', 'e10adc3949ba59abbe56e057f20f883e', '2020-12-18 a las 10:46:28 AM', 1, '6c5bc43b443975b806740d8e41146479', 1, 1, 'AH', 1);

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
  `anulada` tinyint(1) NOT NULL DEFAULT 0,
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
(134, 7777, '06-11-2020 11:09:02 PM', '7.35', 16, 1, 1, '0.85', 'Consumidor final', '', '', ''),
(135, 6112020, '06-11-2020 02:54:52 PM', '7.35', 15, 4, 0, '0.85', 'Publico General', '', '', ''),
(136, 61120201, '06-11-2020  03:33:17 PM', '6.95', 15, 1, 1, '0.80', 'Publico General', '', '', ''),
(137, 61120202, '06-11-2020 04:14:50 PM', '7.35', 15, 4, 1, '0.85', 'publico general', '', '', ''),
(138, 191120202, '19-11-2020 03:37:19 PM', '3.39', 15, 1, 0, '0.39', 'fian', '', '', ''),
(139, 21112020, '21-11-2020 10:38:35 AM', '15.88', 15, 2, 1, '1.83', 'Credito fiscal', 'Pasteleria', '9999', '6666'),
(140, 211120203, '21-11-2020 06:53:33 PM', '11.86', 15, 2, 0, '1.36', 'Prueba de fecha', 'Venta', '1', '333'),
(141, 1231, '17-12-2020 11:43:11 PM', '6.15', 16, 1, 0, '0.80', 'rafael', NULL, NULL, NULL),
(142, 0, '18-12-2020 08:20:30 AM', '6.00', 16, 1, 0, '0.78', 'Albino Jovel', NULL, NULL, NULL),
(143, 0, '18-12-2020 08:24:42 AM', '2.50', 16, 1, 1, '0.33', 'rtyrty', NULL, NULL, NULL),
(144, 0, '18-12-2020 10:30:47 AM', '6.15', 16, 1, 0, '0.80', 'lakjsdkajs', NULL, NULL, NULL),
(145, 0, '18-12-2020 10:32:08 AM', '5.50', 16, 1, 1, '0.72', 'asdd', NULL, NULL, NULL),
(146, 0, '18-12-2020 10:37:09 AM', '6.15', 16, 1, 0, '0.80', 'ASLD', NULL, NULL, NULL);

--
-- Disparadores `venta`
--
DELIMITER $$
CREATE TRIGGER `AIVENTASCORREFACTURA` AFTER INSERT ON `venta` FOR EACH ROW UPDATE usuario SET siguientefactura = siguientefactura + 1 where idusuario = NEW.idusuario
$$
DELIMITER ;

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
  `fcrea` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ventas_producto`
--

INSERT INTO `ventas_producto` (`id`, `idventa`, `idproducto`, `stockanterior`, `cantidadventa`, `stockdespues`, `usuario`, `preciocompra`, `precioventa`, `fcrea`) VALUES
(45, 134, 15, 100, 1, 99, 16, '2.00', '3.00', '2020-11-05'),
(46, 134, 16, 200, 1, 199, 16, '2.00', '3.50', '2020-11-05'),
(47, 135, 15, 101, 1, 100, 15, '2.00', '3.00', '2020-11-06'),
(48, 135, 16, 200, 1, 199, 15, '2.00', '3.50', '2020-11-06'),
(49, 136, 15, 100, 1, 99, 15, '2.00', '3.65', '2020-11-06'),
(50, 136, 16, 199, 1, 198, 15, '2.00', '2.50', '2020-11-06'),
(51, 137, 15, 99, 1, 98, 15, '2.00', '3.00', '2020-11-06'),
(52, 137, 16, 198, 1, 197, 15, '2.00', '3.50', '2020-11-06'),
(53, 138, 15, 99, 1, 98, 15, '2.00', '3.00', '2020-11-19 03:37:00 PM'),
(54, 139, 16, 198, 1, 197, 15, '2.00', '2.50', '2020-11-21 10:35:29 AM'),
(55, 139, 15, 98, 3, 95, 15, '2.00', '11.55', '2020-11-21 10:35:29 AM'),
(56, 140, 16, 197, 3, 194, 15, '2.00', '10.50', '21-11-2020 06:52:57 PM'),
(57, 141, 16, 196, 1, 195, 16, '2.00', '2.50', '17-12-2020 11:41:40 PM'),
(58, 141, 15, 99, 1, 98, 16, '2.00', '3.65', '17-12-2020 11:41:40 PM'),
(59, 142, 16, 196, 1, 195, 16, '2.00', '3.00', '18-12-2020 08:20:02 AM'),
(60, 142, 15, 99, 1, 98, 16, '2.00', '3.00', '18-12-2020 08:20:02 AM'),
(61, 143, 16, 196, 1, 195, 16, '2.00', '2.50', '18-12-2020 08:20:59 AM'),
(62, 144, 16, 196, 1, 195, 16, '2.00', '2.50', '18-12-2020 10:30:28 AM'),
(63, 144, 15, 99, 1, 98, 16, '2.00', '3.65', '18-12-2020 10:30:28 AM'),
(64, 145, 16, 196, 1, 195, 16, '2.00', '2.50', '18-12-2020 10:31:41 AM'),
(65, 145, 15, 98, 1, 97, 16, '2.00', '3.00', '18-12-2020 10:31:41 AM'),
(66, 146, 16, 196, 1, 195, 16, '2.00', '2.50', '18-12-2020 10:36:45 AM'),
(67, 146, 15, 98, 1, 97, 16, '2.00', '3.65', '18-12-2020 10:36:45 AM');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `iddetalleventa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT de la tabla `ingreso_producto`
--
ALTER TABLE `ingreso_producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT de la tabla `preguntasecreta`
--
ALTER TABLE `preguntasecreta`
  MODIFY `idpreguntasecreta` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idproducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `idventa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT de la tabla `ventas_producto`
--
ALTER TABLE `ventas_producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

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
