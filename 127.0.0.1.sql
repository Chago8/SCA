-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-11-2019 a las 19:14:12
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sca`
--
CREATE DATABASE `sca` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sca`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE IF NOT EXISTS `grupo` (
  `idGrupo` int(11) NOT NULL AUTO_INCREMENT,
  `NombreG` varchar(250) DEFAULT NULL,
  `Descripcion` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`idGrupo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`idGrupo`, `NombreG`, `Descripcion`) VALUES
(1, 'Secretaria', 'Secretaria'),
(2, 'joven', 'xxxx'),
(3, 't', 'yyy');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `idRol` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idRol`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`idRol`, `Nombre`) VALUES
(1, 'Administrador'),
(2, 'Padre'),
(3, 'Coordinador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tcalendario`
--

CREATE TABLE IF NOT EXISTS `tcalendario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `usuario` int(11) NOT NULL,
  `evento` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `tcalendario`
--

INSERT INTO `tcalendario` (`id`, `fecha`, `usuario`, `evento`) VALUES
(5, '2019-11-01', 0, 'z'),
(6, '2019-11-01', 2, 's');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(250) DEFAULT NULL,
  `ApellidoPaterno` varchar(250) DEFAULT NULL,
  `ApellidoMaterno` varchar(250) DEFAULT NULL,
  `Direccion` varchar(250) DEFAULT NULL,
  `Telefono` varchar(50) DEFAULT NULL,
  `Grupo` int(11) DEFAULT NULL,
  `Usuario` varchar(250) DEFAULT NULL,
  `Contrasena` varchar(250) DEFAULT NULL,
  `Rol` int(11) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`),
  KEY `Grupo` (`Grupo`),
  KEY `Rol` (`Rol`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `Nombre`, `ApellidoPaterno`, `ApellidoMaterno`, `Direccion`, `Telefono`, `Grupo`, `Usuario`, `Contrasena`, `Rol`) VALUES
(2, 'Isabel', 'Admin', 'Admin', 'Admin', 'Admin', 1, 'Admin', 'Admin', 1),
(3, 'chago', 'qui', 'alm', 'jj', '456', 2, 'x', 'x', 2),
(6, 'santiago', 'quiroz', 'almaguer', 'j. encarnacion quiroz', '4561321874', 2, 'santiago', '12345678', 2),
(7, 'q', 'q', 'q', 'q', 'q', 1, 'q', 'qq', 1),
(8, 'a', 'a', 'a', 'a', 'a', 1, 'a', 'aaaaaaaa', 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`Rol`) REFERENCES `roles` (`idRol`),
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`Grupo`) REFERENCES `grupo` (`idGrupo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
