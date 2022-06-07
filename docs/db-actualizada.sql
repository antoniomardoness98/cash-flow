-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 21-04-2022 a las 23:42:52
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `negocios`
--

DROP TABLE IF EXISTS `negocios`;
CREATE TABLE IF NOT EXISTS `negocios` (
  `negocio_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `negocio_nombre` varchar(255) NOT NULL,
  `negocio_creacion` timestamp NOT NULL,
  PRIMARY KEY (`negocio_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros_usuarios`
--

DROP TABLE IF EXISTS `registros_usuarios`;
CREATE TABLE IF NOT EXISTS `registros_usuarios` (
  `registro_usuario_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `registro_usuario_descripcion` varchar(255) NOT NULL,
  `registro_usuario_creacion` timestamp NOT NULL,
  `usuario_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`registro_usuario_id`),
  KEY `fk_registros_usuarios` (`usuario_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `usuario_rol`, `usuario_nombre`, `usuario_apellido`, `usuario_email`, `usuario_contrasena`, `usuario_estado`) VALUES
(1, 1, 'Antonio', 'Mardones', 'antonio@gmail.com', '12345678', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
