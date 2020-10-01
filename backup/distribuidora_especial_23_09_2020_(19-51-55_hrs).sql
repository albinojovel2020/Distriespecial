SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE IF NOT EXISTS distribuidora_especial;

USE distribuidora_especial;

DROP TABLE IF EXISTS categoria;

CREATE TABLE `categoria` (
  `idcategoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(80) NOT NULL,
  `idusuario` int(11) NOT NULL,
  PRIMARY KEY (`idcategoria`),
  KEY `fk_categoria_usuario` (`idusuario`),
  CONSTRAINT `fk_categoria_usuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO categoria VALUES("1","Arina","arina de maiz y arroz","15");
INSERT INTO categoria VALUES("3","Huevo","pequeño, mediano, grande, extra grande","2");
INSERT INTO categoria VALUES("4","Arroz","blanco o precosidoo","15");
INSERT INTO categoria VALUES("5","Arroz","hola","15");
INSERT INTO categoria VALUES("6","Prueba","prueba1","15");



DROP TABLE IF EXISTS compra;

CREATE TABLE `compra` (
  `idcompra` int(11) NOT NULL AUTO_INCREMENT,
  `numerocompra` int(11) NOT NULL,
  `descripcion` varchar(80) NOT NULL,
  `fechacompra` date NOT NULL,
  `cantidad` int(11) NOT NULL,
  `preciounitario` decimal(3,2) NOT NULL,
  `unidad` varchar(20) NOT NULL,
  `totaliva` decimal(4,2) NOT NULL,
  `subtotal` decimal(5,2) NOT NULL,
  `totalcompra` decimal(4,2) NOT NULL,
  `idproveedor` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  PRIMARY KEY (`idcompra`),
  KEY `fk_compra_proveedor` (`idproveedor`),
  KEY `fk_compra_usuario` (`idusuario`),
  CONSTRAINT `fk_compra_proveedor` FOREIGN KEY (`idproveedor`) REFERENCES `proveedor` (`idproveedor`),
  CONSTRAINT `fk_compra_usuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS detallecompra;

CREATE TABLE `detallecompra` (
  `iddetallecompra` int(11) NOT NULL AUTO_INCREMENT,
  `idcompra` int(11) NOT NULL,
  `idproveedor` int(11) NOT NULL,
  `duiproveedor` varchar(10) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `cantidadcompra` int(11) NOT NULL,
  `preciocompra` decimal(3,2) NOT NULL,
  `descuento` decimal(3,0) NOT NULL,
  `fechacompra` date NOT NULL,
  `totalcompra` decimal(5,2) NOT NULL,
  `idcategoria` int(11) NOT NULL,
  PRIMARY KEY (`iddetallecompra`),
  KEY `fk_detallecompra_categoria` (`idcategoria`),
  KEY `fk_detallecompra_proveedor` (`idproveedor`),
  KEY `fk_detallecompra_producto` (`idproducto`),
  KEY `fk_detallecompra_compra` (`idcompra`),
  CONSTRAINT `fk_detallecompra_categoria` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`idcategoria`),
  CONSTRAINT `fk_detallecompra_compra` FOREIGN KEY (`idcompra`) REFERENCES `compra` (`idcompra`),
  CONSTRAINT `fk_detallecompra_producto` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`idproducto`),
  CONSTRAINT `fk_detallecompra_proveedor` FOREIGN KEY (`idproveedor`) REFERENCES `proveedor` (`idproveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS detalleventa;

CREATE TABLE `detalleventa` (
  `iddetalleventa` int(11) NOT NULL AUTO_INCREMENT,
  `idventa` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `fechaventa` date NOT NULL,
  `cantidadventa` int(11) NOT NULL,
  `precioventa` decimal(3,2) NOT NULL,
  `descuento` decimal(3,2) NOT NULL,
  `totalventa` decimal(4,2) NOT NULL,
  `idcategoria` int(11) NOT NULL,
  PRIMARY KEY (`iddetalleventa`),
  KEY `fk_detalleventa_venta` (`idventa`),
  KEY `fk_detalleventa_categoria` (`idcategoria`),
  KEY `fk_detalleventa_producto` (`idproducto`),
  CONSTRAINT `fk_detalleventa_categoria` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`idcategoria`),
  CONSTRAINT `fk_detalleventa_producto` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`idproducto`),
  CONSTRAINT `fk_detalleventa_venta` FOREIGN KEY (`idventa`) REFERENCES `venta` (`idventa`)
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
  `idproducto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `preciounitario` decimal(3,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `imagen` varchar(90) NOT NULL,
  `idcategoria` int(11) NOT NULL,
  `idproveedor` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idproducto`),
  KEY `fk_producto_categoria` (`idcategoria`),
  KEY `fk_producto_proveedor` (`idproveedor`),
  KEY `fk_producto_usuario` (`idusuario`),
  CONSTRAINT `fk_producto_categoria` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`idcategoria`),
  CONSTRAINT `fk_producto_proveedor` FOREIGN KEY (`idproveedor`) REFERENCES `proveedor` (`idproveedor`),
  CONSTRAINT `fk_producto_usuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS proveedor;

CREATE TABLE `proveedor` (
  `idproveedor` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `dui` varchar(10) NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `direccionempresa` varchar(100) NOT NULL,
  `nombreempresa` varchar(50) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idproveedor`),
  KEY `fk_proveedor_usuario` (`idusuario`),
  CONSTRAINT `fk_proveedor_usuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`)
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

INSERT INTO usuario VALUES("1","Luis","Carranza","2222-0505","usuario1","f688ae26e9cfa3ba6235477831d5122e","Ultima modificación: 2020-09-20 a las 08:29:08 AM","1","brayan","1","1");
INSERT INTO usuario VALUES("2","Brayan","Salomon Fuentes Quijano","7777-7779","el brayan","81dc9bdb52d04dc20036dbd8313ed055","Modificación: 2020-09-20 a las 07:21:45 AM","2","andres","1","0");
INSERT INTO usuario VALUES("15","Andres","Pineda","2322-4344","andrew","231badb19b93e44f47da1bd64a8147f2","Modificación: 2020-09-20 a las 08:28:20 AM","1","231badb19b93e44f47da1bd64a8147f2","1","1");



DROP TABLE IF EXISTS venta;

CREATE TABLE `venta` (
  `idventa` int(11) NOT NULL AUTO_INCREMENT,
  `numeroventa` int(11) NOT NULL,
  `fechaventa` date NOT NULL,
  `cantidad` int(11) NOT NULL,
  `preciounitario` decimal(10,0) NOT NULL,
  `iva` decimal(3,2) NOT NULL,
  `subtotal` decimal(3,2) NOT NULL,
  `total` decimal(4,2) NOT NULL,
  `idusuario` int(11) NOT NULL,
  PRIMARY KEY (`idventa`),
  KEY `fk_venta_usuario` (`idusuario`),
  CONSTRAINT `fk_venta_usuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




SET FOREIGN_KEY_CHECKS=1;