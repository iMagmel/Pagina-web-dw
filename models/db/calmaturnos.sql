-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-07-2025 a las 23:06:36
-- Versión del servidor: 10.1.35-MariaDB
-- Versión de PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `calmaturnos`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_AgregarTurno` (IN `_fecha` DATE, IN `_hora` TIME, IN `_id_terapeuta` INT, IN `_usuario` VARCHAR(100))  BEGIN
    DECLARE v_id_usuario INT;

    -- Buscar ID del usuario por nombre de usuario
    SELECT id_usu INTO v_id_usuario
    FROM usuarios
    WHERE n_usuario = _usuario
    LIMIT 1;

    -- Insertar turno
    INSERT INTO turnos (fecha, hora, id_terapeuta, id_usuario)
    VALUES (_fecha, _hora, _id_terapeuta, v_id_usuario);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_BuscarUsuario` (IN `_usuario` VARCHAR(30), IN `_contrasena` VARCHAR(30))  BEGIN
    SELECT n_usuario, contrasena
    FROM usuarios
    WHERE n_usuario = _usuario AND contrasena = _contrasena;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_CambiarContrasena` (IN `_email` VARCHAR(100), IN `_nueva_contrasena` VARCHAR(30))  BEGIN
	UPDATE usuarios
    SET contrasena = _nueva_contrasena
    WHERE email = _email;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_CrearUsuario` (IN `_nombre` VARCHAR(20), IN `_apellido` VARCHAR(20), IN `_usuario` VARCHAR(30), IN `_email` VARCHAR(50), IN `_contrasena` VARCHAR(30))  BEGIN
    INSERT INTO usuarios(nombre, apellido, n_usuario, email, contrasena)
    VALUES(_nombre, _apellido, _usuario, _email, _contrasena);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_GuardarCodRecuperacion` (IN `_email` VARCHAR(100), IN `_codigo` VARCHAR(10))  BEGIN
    UPDATE usuarios
    SET codrecuperacion = _codigo
    WHERE email = _email;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ObtenerTerapeutas` ()  BEGIN
    SELECT id_terapeuta, nombre, apellido, descripcion
    FROM terapeutas
    ORDER BY id_terapeuta ASC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ObtenerTurnosUsuario` (IN `_id_usuario` INT)  BEGIN
    SELECT t.id_turno, t.fecha, t.hora, te.nombre AS nombre_terapeuta, te.apellido AS apellido_terapeuta, te.descripcion
    FROM turnos t
    INNER JOIN terapeutas te ON t.id_terapeuta = te.id_terapeuta
    WHERE t.id_usuario = _id_usuario
    ORDER BY t.fecha DESC, t.hora DESC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_VerificarCodRecuperacion` (IN `_email` VARCHAR(100), IN `_codigo` VARCHAR(10))  BEGIN
    SELECT id_usu
    FROM usuarios
    WHERE email = _email AND codrecuperacion = _codigo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_VerificarEmail` (IN `_email` VARCHAR(100))  BEGIN
    SELECT id_usu
    FROM usuarios
    WHERE email = _email;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `terapeutas`
--

CREATE TABLE `terapeutas` (
  `id_terapeuta` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `descripcion` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `terapeutas`
--

INSERT INTO `terapeutas` (`id_terapeuta`, `nombre`, `apellido`, `descripcion`) VALUES
(1, 'María', 'Sol', 'Masajes relajantes y aromaterapia'),
(2, 'Esteban', 'Ruiz', 'Descontracturante y deportivo'),
(3, 'Laura', 'M.', 'Reflexología podal'),
(4, 'Centro Holístico', 'Kairos', 'Atención integral');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turnos`
--

CREATE TABLE `turnos` (
  `id_turno` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `id_terapeuta` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `turnos`
--

INSERT INTO `turnos` (`id_turno`, `fecha`, `hora`, `id_terapeuta`, `id_usuario`) VALUES
(4, '2025-07-03', '15:25:00', 1, 1),
(6, '2025-07-01', '16:42:00', 2, 1),
(7, '2025-07-03', '22:36:00', 1, 1),
(8, '2025-07-06', '22:37:00', 2, 1),
(9, '2025-07-03', '17:47:00', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usu` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `n_usuario` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contrasena` varchar(30) NOT NULL,
  `codrecuperacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usu`, `nombre`, `apellido`, `n_usuario`, `email`, `contrasena`, `codrecuperacion`) VALUES
(1, 'rodrigo', 'novelino', 'iMagmel', 'novelinorodrigo3@gmail.com', '12345678', 9737);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `terapeutas`
--
ALTER TABLE `terapeutas`
  ADD PRIMARY KEY (`id_terapeuta`);

--
-- Indices de la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD PRIMARY KEY (`id_turno`),
  ADD KEY `id_terapeuta` (`id_terapeuta`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usu`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `terapeutas`
--
ALTER TABLE `terapeutas`
  MODIFY `id_terapeuta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `turnos`
--
ALTER TABLE `turnos`
  MODIFY `id_turno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD CONSTRAINT `turnos_ibfk_1` FOREIGN KEY (`id_terapeuta`) REFERENCES `terapeutas` (`id_terapeuta`),
  ADD CONSTRAINT `turnos_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
