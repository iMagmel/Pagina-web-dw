-- Crear base de datos si no existe
CREATE DATABASE IF NOT EXISTS `calmaturnos`;
USE `calmaturnos`;

-- Configuraciones iniciales
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";
SET NAMES utf8mb4;

-- Tabla: terapeutas
CREATE TABLE IF NOT EXISTS `terapeutas` (
  `id_terapeuta` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `descripcion` varchar(256) NOT NULL,
  PRIMARY KEY (`id_terapeuta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Tabla: usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usu` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `n_usuario` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contrasena` varchar(30) NOT NULL,
  `codrecuperacion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_usu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Tabla: turnos
CREATE TABLE IF NOT EXISTS `turnos` (
  `id_turno` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `id_terapeuta` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_turno`),
  KEY `id_terapeuta` (`id_terapeuta`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `turnos_ibfk_1` FOREIGN KEY (`id_terapeuta`) REFERENCES `terapeutas` (`id_terapeuta`),
  CONSTRAINT `turnos_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Procedimientos almacenados
DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_AgregarTurno` (
    IN `_terapeuta` VARCHAR(20),
    IN `_fecha` DATE,
    IN `_hora` TIME,
    IN `_usuario` VARCHAR(20)
)
BEGIN
    DECLARE v_id_terapeuta INT;
    DECLARE v_id_usuario INT;

    SELECT id_terapeuta INTO v_id_terapeuta
    FROM terapeutas
    WHERE nombre = _terapeuta
    LIMIT 1;

    SELECT id_usu INTO v_id_usuario
    FROM usuarios
    WHERE n_usuario = _usuario
    LIMIT 1;

    INSERT INTO turnos(fecha, hora, id_terapeuta, id_usuario)
    VALUES(_fecha, _hora, v_id_terapeuta, v_id_usuario);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_BuscarUsuario` (
    IN `_usuario` VARCHAR(30),
    IN `_contrasena` VARCHAR(30)
)
BEGIN
    SELECT n_usuario, contrasena
    FROM usuarios
    WHERE n_usuario = _usuario AND contrasena = _contrasena;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_CrearUsuario` (
    IN `_nombre` VARCHAR(20),
    IN `_apellido` VARCHAR(20),
    IN `_usuario` VARCHAR(30),
    IN `_email` VARCHAR(50),
    IN `_contrasena` VARCHAR(30)
)
BEGIN
    INSERT INTO usuarios(nombre, apellido, n_usuario, email, contrasena)
    VALUES(_nombre, _apellido, _usuario, _email, _contrasena);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_GuardarCodRecuperacion` (
    IN `_email` VARCHAR(100),
    IN `_codigo` VARCHAR(10)
)
BEGIN
    UPDATE usuarios
    SET codrecuperacion = _codigo
    WHERE email = _email;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_VerificarCodRecuperacion` (
    IN `_email` VARCHAR(100),
    IN `_codigo` VARCHAR(10)
)
BEGIN
    SELECT id_usu
    FROM usuarios
    WHERE email = _email AND codrecuperacion = _codigo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_VerificarEmail` (
    IN `_email` VARCHAR(100)
)
BEGIN
    SELECT id_usu
    FROM usuarios
    WHERE email = _email;
END$$

DELIMITER ;

COMMIT;
