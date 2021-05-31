CREATE TABLE `usuario` (
 `usu_codigo` int(11) NOT NULL AUTO_INCREMENT,
 `usu_cedula` varchar(10) NOT NULL,
 `usu_nombres` varchar(50) NOT NULL,
 `usu_apellidos` varchar(50) NOT NULL,
 `usu_direccion` varchar(75) NOT NULL,
 `usu_telefono` varchar(20) NOT NULL,
 `usu_correo` varchar(20) NOT NULL,
 `usu_password` varchar(255) NOT NULL,
 `usu_fecha_nacimiento` date NOT NULL,
 `usu_eliminado` varchar(1) NOT NULL DEFAULT 'N',
 `usu_fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
 `usu_fecha_modificacion` timestamp NULL DEFAULT NULL,
 PRIMARY KEY (`usu_codigo`),
 UNIQUE KEY `usu_cedula` (`usu_cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


CREATE TABLE `libro` (
 `lib_codigo` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
 `lib_nombre` varchar(50) NOT NULL,
 `lib_isbn` varchar(50) NOT NULL,
 `lib_numpag` int(11) NOT NULL,
 `usu_eliminado` varchar(1) NOT NULL DEFAULT 'N',
 `usu_fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
 `usu_fecha_modificacion` timestamp NULL DEFAULT NULL,
 `cap_codigo` int NOT NULL ,
 `aut_codigo` int NOT NULL,
 FOREIGN KEY fk_cap(cap_codigo) REFERENCES capitulo(cap_codigo),
 FOREIGN KEY fk_aut(aut_codigo) REFERENCES autor(aut_codigo)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


INSERT INTO `libro`(`lib_codigo`, `lib_nombre`, `lib_isbn`, `lib_numpag`, `usu_eliminado`, `usu_fecha_creacion`, `usu_fecha_modificacion`, `cap_codigo`, `aut_codigo`) VALUES 
(4,'Matematica Aplicada','ISBN-21IC033',500,'N','2021-05-30 15:07:56',null,7,6), 
(5,'Razon Fe','ISBN-21IC033',500,'N','2021-05-30 15:07:56',null,7,6),
(6,'Manuelas','ISBN-21IC033',500,'N','2021-05-30 15:07:56',null,7,8),
(7,'Politica Social','ISBN-21IC033',500,'N','2021-05-30 15:07:56',null,7,6), 
(8,'Politica Social','ISBN-21IC033',500,'N','2021-05-30 15:07:56',null,7,7), 
(9,'Manuelas','ISBN-21IC033',500,'N','2021-05-30 15:07:56',null,8,8)
CREATE TABLE `autor` (
 `aut_codigo` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
 `aut_nombres` varchar(50) NOT NULL,
 `aut_apellidos` varchar(50) NOT NULL,
 `aut_nacionalidad` varchar(50) NOT NULL,
 `aut_anio` date NOT NULL,
 `aut_eliminado` varchar(1) NOT NULL DEFAULT 'N',
 `aut_fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
 `aut_fecha_modificacion` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE `capitulo` (
 `cap_codigo` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
 `cap_numero` int(11) NOT NULL,
 `cap_titulo` varchar(50) NOT NULL,
 `cap_eliminado` varchar(1) NOT NULL DEFAULT 'N',
 `cap_fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
 `cap_fecha_modificacion` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;