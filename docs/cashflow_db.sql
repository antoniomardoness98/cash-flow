-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 03-05-2022 a las 18:51:09
-- Versión del servidor: 5.7.36
-- Versión de PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cashflow`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acceso_usuarios`
--

DROP TABLE IF EXISTS `acceso_usuarios`;
CREATE TABLE IF NOT EXISTS `acceso_usuarios` (
  `acceso_usuarios_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `negocio_id` int(10) UNSIGNED NOT NULL,
  `usuario_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`acceso_usuarios_id`),
  KEY `fk_acceso_usuarios` (`usuario_id`),
  KEY `fk_acceso_negocios` (`negocio_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `acceso_usuarios`
--

INSERT INTO `acceso_usuarios` (`acceso_usuarios_id`, `negocio_id`, `usuario_id`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `negocios`
--

DROP TABLE IF EXISTS `negocios`;
CREATE TABLE IF NOT EXISTS `negocios` (
  `negocio_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `negocio_nombre` varchar(255) NOT NULL,
  `negocio_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `negocio_estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`negocio_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `negocios`
--

INSERT INTO `negocios` (`negocio_id`, `negocio_nombre`, `negocio_creacion`, `negocio_estado`) VALUES
(1, 'negocio 1', '2022-04-25 23:30:16', 1),
(2, 'negocio 2', '2022-04-25 23:34:18', 1),
(3, '3', '2022-04-26 21:50:45', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros_usuarios`
--

DROP TABLE IF EXISTS `registros_usuarios`;
CREATE TABLE IF NOT EXISTS `registros_usuarios` (
  `registro_usuario_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `registro_usuario_descripcion` varchar(255) NOT NULL,
  `registro_usuario_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`registro_usuario_id`),
  KEY `fk_registros_usuarios` (`usuario_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `registros_usuarios`
--

INSERT INTO `registros_usuarios` (`registro_usuario_id`, `registro_usuario_descripcion`, `registro_usuario_creacion`, `usuario_id`) VALUES
(1, 'prueba', '2022-04-23 01:25:07', 1),
(2, 'hola', '2022-04-23 20:45:29', 1),
(3, 'Se ha registrado el usuario: ', '2022-04-23 20:49:00', 1),
(4, 'Se ha registrado el usuario:asdfsa dsafjhsk', '2022-04-23 20:49:44', 1),
(5, 'Se ha registrado el usuario:sdfsahjkhf jhdsakfgh', '2022-04-23 20:53:14', 1),
(6, 'Se ha registrado el negocio:negocio 2', '2022-04-25 23:34:18', 1),
(7, 'Se ha modificado el usuario: Tests Testsadfdsafa', '2022-04-26 21:48:21', 1),
(8, 'Se ha registrado el usuario: usuario 2 apellido 2', '2022-04-26 21:49:28', 1),
(9, 'Se ha eliminado el usuario: usuario 2 apellido 2', '2022-04-26 21:49:59', 1),
(10, 'Se ha registrado el negocio:negocio 3', '2022-04-26 21:50:45', 1),
(11, 'El usuario: Tests Testsadfdsafa se ha modificado a: Tests22 Tests22', '2022-04-26 21:55:12', 1),
(12, 'El negocio: negocio 3 se ha modificado a: negocio 3333', '2022-04-26 21:59:59', 1),
(13, 'El negocio: negocio 3333 se ha modificado a: 3', '2022-04-26 22:00:10', 1),
(14, 'Se ha eliminado el negocio: ', '2022-04-26 22:00:20', 1),
(15, 'Se ha eliminado el negocio: 3', '2022-04-26 22:02:15', 1),
(16, 'Se ha registrado el usuario: Fernando  Mardones', '2022-04-27 01:58:07', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transacciones`
--

DROP TABLE IF EXISTS `transacciones`;
CREATE TABLE IF NOT EXISTS `transacciones` (
  `transaccion_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `transaccion_fecha` date NOT NULL,
  `transaccion_creacion` timestamp NOT NULL,
  `transaccion_descripcion` varchar(255) NOT NULL,
  `transaccion_monto` int(11) NOT NULL,
  `transaccion_tipo` tinyint(1) NOT NULL,
  `negocio_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`transaccion_id`),
  KEY `fk_transacciones_negocio` (`negocio_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `usuario_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `usuario_rol` int(11) NOT NULL,
  `usuario_nombre` varchar(255) NOT NULL,
  `usuario_apellido` varchar(255) NOT NULL,
  `usuario_email` varchar(255) NOT NULL,
  `usuario_contrasena` varchar(255) NOT NULL,
  `usuario_estado` int(11) NOT NULL,
  PRIMARY KEY (`usuario_id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `usuario_rol`, `usuario_nombre`, `usuario_apellido`, `usuario_email`, `usuario_contrasena`, `usuario_estado`) VALUES
(1, 1, 'Antonio', 'Mardones', 'antonio@gmail.com', '12345678', 1),
(2, 0, 'Tests22', 'Tests22', 'test@test', '12345678', 1),
(22, 0, 'Fernando ', 'Mardones', 'fernando@gmail.com', '1234', 1),
(21, 0, 'usuario 2', 'apellido 2', 'usuario@emal.com', '1234', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
