SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE IF NOT EXISTS distribuidora_especial;

USE distribuidora_especial;

DROP TABLE IF EXISTS cat_comprobante;

CREATE TABLE `cat_comprobante` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `correlativo` smallint(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO cat_comprobante VALUES("1","Factura consumidor final","Factura para consumidor final","400");
INSERT INTO cat_comprobante VALUES("2","Comprobante de credito fiscal","Factura con credito fiscal","300");
INSERT INTO cat_comprobante VALUES("3","Nota de envio","Comprobante de nota de envio","200");
INSERT INTO cat_comprobante VALUES("4","Ticket","ticket","100");



DROP TABLE IF EXISTS cat_impuesto;

CREATE TABLE `cat_impuesto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `porcentaje` int(11) NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO cat_impuesto VALUES("1","IVA","Impuesto al valor agregado","13","0.13");



DROP TABLE IF EXISTS cat_medidas;

CREATE TABLE `cat_medidas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(10) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `codigo` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

INSERT INTO cat_medidas VALUES("1","Onza","Medida de producto en onzas","UONZA");
INSERT INTO cat_medidas VALUES("2","Libra","Medida de producto en libras","ULIBRA");
INSERT INTO cat_medidas VALUES("3","Litro","Medida de producto en Litros","ULITRO");
INSERT INTO cat_medidas VALUES("4","Galon","Medida de producto en galones","UGALON");
INSERT INTO cat_medidas VALUES("5","Metro","Unidad de producto en metros","UMETRO");
INSERT INTO cat_medidas VALUES("6","Mililitros","Unidad de medida en militiros","UMILI");



DROP TABLE IF EXISTS categoria;

CREATE TABLE `categoria` (
  `idcategoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(80) NOT NULL,
  `idusuario` int(11) NOT NULL,
  PRIMARY KEY (`idcategoria`),
  KEY `fk_categoria_usuario` (`idusuario`),
  CONSTRAINT `fk_categoria_usuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

INSERT INTO categoria VALUES("1","Cereales","Productos cereales","1");
INSERT INTO categoria VALUES("2","Granos basicos","Todo tipo de grano basico","16");
INSERT INTO categoria VALUES("3","Carnes","Todo tipo de carnes","16");
INSERT INTO categoria VALUES("4","Confiteria","Todo tipo de dulces","2");
INSERT INTO categoria VALUES("5","Leches","Todo tipo de leches","1");
INSERT INTO categoria VALUES("6","Semillas","Todo tipo de semillas","1");
INSERT INTO categoria VALUES("7","Toppings","Todo tipo de toppings","2");
INSERT INTO categoria VALUES("8","Harinas","Todo tipo de harinas","16");
INSERT INTO categoria VALUES("9","Utensilios","Utencilios de cocina","15");
INSERT INTO categoria VALUES("10","Manteca","Todo tipo de mantecas","2");
INSERT INTO categoria VALUES("11","Saborizantes","Todo tipo de saborizantes","1");
INSERT INTO categoria VALUES("13","Sopitas","sopitas","16");



DROP TABLE IF EXISTS detalleventa;

CREATE TABLE `detalleventa` (
  `iddetalleventa` int(11) NOT NULL AUTO_INCREMENT,
  `idventa` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `cantidadventa` int(11) DEFAULT NULL,
  `precioventa` decimal(6,2) NOT NULL,
  `montoiva` decimal(10,2) NOT NULL,
  PRIMARY KEY (`iddetalleventa`),
  KEY `fk_detalleventa_venta` (`idventa`),
  KEY `fk_detalleventa_producto` (`idproducto`),
  CONSTRAINT `fk_detalleventa_producto` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`idproducto`),
  CONSTRAINT `fk_detalleventa_venta` FOREIGN KEY (`idventa`) REFERENCES `venta` (`idventa`)
) ENGINE=InnoDB AUTO_INCREMENT=149 DEFAULT CHARSET=utf8;

INSERT INTO detalleventa VALUES("137","134","15","1","3.00","0.39");
INSERT INTO detalleventa VALUES("138","134","16","1","3.50","0.46");
INSERT INTO detalleventa VALUES("139","135","15","1","3.00","0.39");
INSERT INTO detalleventa VALUES("140","135","16","1","3.50","0.46");
INSERT INTO detalleventa VALUES("141","136","15","1","3.65","0.47");
INSERT INTO detalleventa VALUES("142","136","16","1","2.50","0.33");
INSERT INTO detalleventa VALUES("143","137","15","1","3.00","0.39");
INSERT INTO detalleventa VALUES("144","137","16","1","3.50","0.46");
INSERT INTO detalleventa VALUES("145","138","15","1","3.00","0.39");
INSERT INTO detalleventa VALUES("146","139","16","1","2.50","0.33");
INSERT INTO detalleventa VALUES("147","139","15","3","11.55","1.50");
INSERT INTO detalleventa VALUES("148","140","16","3","10.50","1.37");



DROP TABLE IF EXISTS ingreso_producto;

CREATE TABLE `ingreso_producto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idproducto` int(11) NOT NULL,
  `stockanterior` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `stockdespues` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `fcrea` date NOT NULL,
  `motivo` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_producto` (`idproducto`),
  KEY `fk_usuario` (`usuario`),
  CONSTRAINT `fk_producto` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`idproducto`),
  CONSTRAINT `fk_usuario` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;

INSERT INTO ingreso_producto VALUES("57","15","0","100","100","16","2020-11-05","Por compra a proveedores");
INSERT INTO ingreso_producto VALUES("58","16","0","200","200","16","2020-11-05","Por compra a proveedores");
INSERT INTO ingreso_producto VALUES("59","15","99","1","100","16","2020-11-05","Por compra a proveedores");
INSERT INTO ingreso_producto VALUES("60","15","100","1","101","16","2020-11-05","Por anulacion de venta");
INSERT INTO ingreso_producto VALUES("61","16","199","1","200","16","2020-11-05","Por anulacion de venta");
INSERT INTO ingreso_producto VALUES("62","15","98","1","99","15","2020-11-06","Por anulacion de venta");
INSERT INTO ingreso_producto VALUES("63","16","197","1","198","15","2020-11-06","Por anulacion de venta");
INSERT INTO ingreso_producto VALUES("64","15","95","3","98","15","2020-11-21","Por anulacion de venta");
INSERT INTO ingreso_producto VALUES("65","16","194","1","195","15","2020-11-21","Por anulacion de venta");
INSERT INTO ingreso_producto VALUES("66","15","98","1","99","15","2020-11-21","Por anulacion de venta");
INSERT INTO ingreso_producto VALUES("67","16","195","1","196","15","2020-11-21","Por anulacion de venta");



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
  `precio3` decimal(10,2) NOT NULL,
  PRIMARY KEY (`idproducto`),
  KEY `fk_producto_categoria` (`idcategoria`),
  KEY `fk_producto_proveedor` (`idproveedor`),
  KEY `fk_producto_usuario` (`idusuario`),
  KEY `fkumedida` (`umedida`),
  CONSTRAINT `fk_producto_categoria` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`idcategoria`),
  CONSTRAINT `fk_producto_proveedor` FOREIGN KEY (`idproveedor`) REFERENCES `proveedor` (`idproveedor`),
  CONSTRAINT `fk_producto_usuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`),
  CONSTRAINT `fkumedida` FOREIGN KEY (`umedida`) REFERENCES `cat_medidas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

INSERT INTO producto VALUES("15","Harina de Trigo","Harina de trigo suave","2.00","99","img/producto.jpg","8","3","16","1","2","3.00","3.65","3.85");
INSERT INTO producto VALUES("16","harina arroz","arroz","2.00","196","img/logoulsfull_oficial_web.jpg","1","1","15","1","2","2.50","3.00","3.50");
INSERT INTO producto VALUES("17","Producto Uno","Agotado","3.00","0","img/693300.png","5","2","15","1","2","3.25","3.50","3.75");
INSERT INTO producto VALUES("18","Producto Dos","agotado 2","1.00","0","img/1513772868_581978_1513774571_noticia_normal.jpg","6","3","15","1","3","2.00","3.00","4.00");



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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO proveedor VALUES("1","Distribuidora Morazan","SA de CV","00000000-0","7777-7777","Calle a morazan #3","Distribuidora Morazan","1","1");
INSERT INTO proveedor VALUES("2","Lido","SA de CV","00000000-0","7777-7777","CALLE EL NANCE","NESTLE","16","1");
INSERT INTO proveedor VALUES("3","Inversiones rugamas","sa de cv","88888888-8","8787-8787","ALALALALA","Inversiones rugamas","16","1");
INSERT INTO proveedor VALUES("4","Chocolate and co","sa de cv","00000000-0","7878-7878","calle a mariona","Chocolate and co","16","1");



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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

INSERT INTO usuario VALUES("1","Luis","Carranza","2222-0505","usuario1","f688ae26e9cfa3ba6235477831d5122e","Ultima modificación: 2020-09-20 a las 08:29:08 AM","1","brayan","1","0");
INSERT INTO usuario VALUES("2","Brayan","Salomon Fuentes Quijano","7777-7779","el brayan","81dc9bdb52d04dc20036dbd8313ed055","Modificación: 2020-09-20 a las 07:21:45 AM","2","andres","1","1");
INSERT INTO usuario VALUES("15","Andres","Pineda","2322-4344","andrew","231badb19b93e44f47da1bd64a8147f2","Modificación: 2020-09-20 a las 08:28:20 AM","1","231badb19b93e44f47da1bd64a8147f2","1","1");
INSERT INTO usuario VALUES("16","Rafael Albino","Jovel Alfaro","7786-7999","albino","cbe7855c7afdb4a521ee4d1a63d89e89","Modificación: 2020-11-11 a las 08:35:27 PM","1","cbe7855c7afdb4a521ee4d1a63d89e89","2","1");
INSERT INTO usuario VALUES("17","Carlos","Alfaro","2222-2222","davialfa","a008167316b8afef949b8f3146ed42e5","2020-09-30 a las 10:27:41 PM","1","eb8dd5745ad86bcbd8f87b4ed20013b4","1","1");
INSERT INTO usuario VALUES("18","Rafael","Jovel","7777-7777","rafael.jovel@gmail.com","e10adc3949ba59abbe56e057f20f883e","2020-10-09 a las 01:27:41 PM","1","35cd2d0d62d9bc5e60a3ca9f7593b05b","1","1");



DROP TABLE IF EXISTS venta;

CREATE TABLE `venta` (
  `idventa` int(11) NOT NULL AUTO_INCREMENT,
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
  `nit` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idventa`),
  KEY `fk_venta_usuario` (`idusuario`),
  KEY `fk_venta_catcomprobante` (`tipo_comprobante`),
  CONSTRAINT `fk_venta_catcomprobante` FOREIGN KEY (`tipo_comprobante`) REFERENCES `cat_comprobante` (`id`),
  CONSTRAINT `fk_venta_usuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=141 DEFAULT CHARSET=utf8;

INSERT INTO venta VALUES("134","7777","2020-11-05 11:09:02 PM","7.35","16","1","1","0.85","Consumidor final","","","");
INSERT INTO venta VALUES("135","6112020","2020-11-06 02:54:52 PM","7.35","15","4","0","0.85","Publico General","","","");
INSERT INTO venta VALUES("136","61120201","2020-11-06 03:33:17 PM","6.95","15","1","1","0.80","Publico General","","","");
INSERT INTO venta VALUES("137","61120202","2020-11-06 04:14:50 PM","7.35","15","4","1","0.85","publico general","","","");
INSERT INTO venta VALUES("138","191120202","19-11-2020 03:37:19 PM","3.39","15","1","0","0.39","fian","","","");
INSERT INTO venta VALUES("139","21112020","21-11-2020 10:38:35 AM","15.88","15","2","1","1.83","Credito fiscal","Pasteleria","9999","6666");
INSERT INTO venta VALUES("140","211120203","21-11-2020 06:53:33 PM","11.86","15","2","0","1.36","Prueba de fecha","Venta","1","333");



DROP TABLE IF EXISTS ventas_producto;

CREATE TABLE `ventas_producto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idventa` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `stockanterior` int(11) NOT NULL,
  `cantidadventa` int(11) NOT NULL,
  `stockdespues` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `preciocompra` decimal(10,2) NOT NULL,
  `precioventa` decimal(10,2) NOT NULL,
  `fcrea` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_idventa` (`idventa`),
  KEY `fk_idproducto` (`idproducto`),
  KEY `fk_usuarioid` (`usuario`),
  CONSTRAINT `fk_idproducto` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`idproducto`),
  CONSTRAINT `fk_idventa` FOREIGN KEY (`idventa`) REFERENCES `venta` (`idventa`),
  CONSTRAINT `fk_usuarioid` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;

INSERT INTO ventas_producto VALUES("45","134","15","100","1","99","16","2.00","3.00","2020-11-05");
INSERT INTO ventas_producto VALUES("46","134","16","200","1","199","16","2.00","3.50","2020-11-05");
INSERT INTO ventas_producto VALUES("47","135","15","101","1","100","15","2.00","3.00","2020-11-06");
INSERT INTO ventas_producto VALUES("48","135","16","200","1","199","15","2.00","3.50","2020-11-06");
INSERT INTO ventas_producto VALUES("49","136","15","100","1","99","15","2.00","3.65","2020-11-06");
INSERT INTO ventas_producto VALUES("50","136","16","199","1","198","15","2.00","2.50","2020-11-06");
INSERT INTO ventas_producto VALUES("51","137","15","99","1","98","15","2.00","3.00","2020-11-06");
INSERT INTO ventas_producto VALUES("52","137","16","198","1","197","15","2.00","3.50","2020-11-06");
INSERT INTO ventas_producto VALUES("53","138","15","99","1","98","15","2.00","3.00","2020-11-19 03:37:00 PM");
INSERT INTO ventas_producto VALUES("54","139","16","198","1","197","15","2.00","2.50","2020-11-21 10:35:29 AM");
INSERT INTO ventas_producto VALUES("55","139","15","98","3","95","15","2.00","11.55","2020-11-21 10:35:29 AM");
INSERT INTO ventas_producto VALUES("56","140","16","197","3","194","15","2.00","10.50","21-11-2020 06:52:57 PM");



SET FOREIGN_KEY_CHECKS=1;