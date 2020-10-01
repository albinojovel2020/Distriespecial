SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE IF NOT EXISTS distribuidora_especial;

USE distribuidora_especial;

DROP TABLE IF EXISTS preguntasecreta;

CREATE TABLE `preguntasecreta` (
  `idpreguntasecreta` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  PRIMARY KEY (`idpreguntasecreta`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO preguntasecreta VALUES("1","mi nombre");
INSERT INTO preguntasecreta VALUES("2","mi apellido");



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

INSERT INTO usuario VALUES("1","Luis","Carranza","2222-0505","usuario1","81dc9bdb52d04dc20036dbd8313ed055","Modificación: 2020-09-19 a las 09:09:49 PM","1","brayan","1","1");
INSERT INTO usuario VALUES("2","Brayan","Salomon Fuentes Quijano","7777-7779","el brayan","81dc9bdb52d04dc20036dbd8313ed055","Modificación: 2020-09-19 a las 09:10:57 PM","2","andres","2","0");
INSERT INTO usuario VALUES("15","Andres","Pineda","2322-4344","andrew","81dc9bdb52d04dc20036dbd8313ed055","Ultima modificación: 2020-09-19 a las 09:31:34 PM","1","231badb19b93e44f47da1bd64a8147f2","1","1");



SET FOREIGN_KEY_CHECKS=1;