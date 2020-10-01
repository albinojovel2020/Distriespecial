SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE IF NOT EXISTS distribuidora_especial;

USE distribuidora_especial;

DROP TABLE IF EXISTS categoria;

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(80) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_categoria`),
  KEY `fk_categoria_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS compra;

CREATE TABLE `compra` (
  `id_compra` int(11) NOT NULL AUTO_INCREMENT,
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
  `numero_compra` int(11) NOT NULL,
  PRIMARY KEY (`id_compra`),
  KEY `fk_compra_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS detalle_compra;

CREATE TABLE `detalle_compra` (
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




DROP TABLE IF EXISTS detalle_venta;

CREATE TABLE `detalle_venta` (
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




DROP TABLE IF EXISTS preguntasecreta;

CREATE TABLE `preguntasecreta` (
  `idpreguntasecreta` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  PRIMARY KEY (`idpreguntasecreta`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO preguntasecreta VALUES("1","mi nombre");
INSERT INTO preguntasecreta VALUES("2","mi apellido");



DROP TABLE IF EXISTS producto;

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `precio_unitario` decimal(3,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_producto`),
  KEY `fk_producto_usuario` (`id_usuario`),
  KEY `fk_producto_categoria` (`id_categoria`),
  KEY `fk_producto_estado` (`id_estado`),
  KEY `fk_producto_proveedor` (`id_proveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS proveedor;

CREATE TABLE `proveedor` (
  `id_proveedor` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `direccion_empresa` varchar(100) NOT NULL,
  `nombre_empresa` varchar(50) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  PRIMARY KEY (`id_proveedor`),
  KEY `fk_proveedor_usuario` (`id_usuario`),
  KEY `fk_proveedor_estado` (`id_estado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS tiposusuario;

CREATE TABLE `tiposusuario` (
  `idtipousuario` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(15) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  PRIMARY KEY (`idtipousuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO tiposusuario VALUES("1","Administrador","todos los permisos");
INSERT INTO tiposusuario VALUES("2","Normal","pocos permisos");



DROP TABLE IF EXISTS usuario;

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`idusuario`),
  KEY `fk_usuario_preguntasecreta` (`idpreguntasecreta`),
  KEY `fk_usuario_tipousuario` (`idtipousuario`),
  CONSTRAINT `fk_usuario_preguntasecreta` FOREIGN KEY (`idpreguntasecreta`) REFERENCES `preguntasecreta` (`idpreguntasecreta`),
  CONSTRAINT `fk_usuario_tipousuario` FOREIGN KEY (`idtipousuario`) REFERENCES `tiposusuario` (`idtipousuario`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

INSERT INTO usuario VALUES("1","Luis","Carranza","2222-0505","usuario1","81dc9bdb52d04dc20036dbd8313ed055","Modificación: 2020-09-19 a las 11:04:13 PM","1","brayan","1","1");
INSERT INTO usuario VALUES("2","Brayan","Rosales","7777-7779","el brayan","81dc9bdb52d04dc20036dbd8313ed055","Modificación: 2020-09-19 a las 11:09:10 PM","2","andres","1","0");
INSERT INTO usuario VALUES("15","Andres","Pineda","2322-4344","andrew","81dc9bdb52d04dc20036dbd8313ed055","Ultima modificación: 2020-09-20 a las 07:28:40 AM","1","231badb19b93e44f47da1bd64a8147f2","1","1");
INSERT INTO usuario VALUES("16","norberto","perez","2222-2222","usuario2","7ad4109292636b7498a9f5042081becf","Ultima modificación: 2020-09-20 a las 07:38:15 AM","2","765ba753b609d84b3813991fe23f81b3","1","1");



DROP TABLE IF EXISTS venta;

CREATE TABLE `venta` (
  `id_venta` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_venta` date NOT NULL,
  `numero_venta` int(11) NOT NULL,
  `subtotal` decimal(4,2) NOT NULL,
  `iva` int(11) NOT NULL,
  `total` decimal(4,2) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_venta`),
  KEY `fk_venta_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




SET FOREIGN_KEY_CHECKS=1;