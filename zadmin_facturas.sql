-- phpMyAdmin SQL Dump
-- version 4.0.10.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 27-06-2018 a las 10:38:49
-- Versión del servidor: 5.5.56-MariaDB
-- Versión de PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `zadmin_facturas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket`
--

CREATE TABLE IF NOT EXISTS `ticket` (
  `ticket` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(5) NOT NULL,
  `proveedor` varchar(250) NOT NULL,
  `rfc` varchar(13) NOT NULL,
  `fecha` varchar(50) NOT NULL,
  `importe_IVA` varchar(50) NOT NULL,
  `num_factura` varchar(50) NOT NULL,
  `uuid` varchar(50) NOT NULL,
  `fecha_log` varchar(50) NOT NULL,
  `ruta` varchar(100) DEFAULT NULL,
  `estatus` varchar(25) NOT NULL,
  `comentario` varchar(100) NOT NULL,
  `pre_ticket` varchar(50) DEFAULT NULL,
  `com_ticket` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ticket`),
  UNIQUE KEY `uuid` (`uuid`),
  UNIQUE KEY `pre_ticket` (`pre_ticket`),
  UNIQUE KEY `com_ticket` (`com_ticket`),
  KEY `FK_id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nivel` varchar(50) NOT NULL,
  `nick` varchar(30) NOT NULL,
  `pass` varchar(130) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(80) NOT NULL,
  `last_session` datetime DEFAULT NULL,
  `bloqueo` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nick` (`nick`),
  UNIQUE KEY `correo` (`correo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nivel`, `nick`, `pass`, `nombre`, `correo`, `last_session`, `bloqueo`) VALUES
(1, 'ADMINISTRADOR', 'ADMINISTRADOR', 'bab8518a923c061567a34df0d583748a', 'ADMINISTRADOR', 'adm@correo.com', NULL, 1),
(2, 'ADMINISTRADOR', 'VICTORRB', '25f9e794323b453885f5181f1b624d0b', 'VICTOR ROJAS BARRERA', 'vr@correo.com', '2018-05-21 00:00:00', 1),
(3, 'COMPRAS', 'COMPRASUSU', 'bab8518a923c061567a34df0d583748a', 'COMPRASUSU', 'cm@correo.com', NULL, 1),
(4, 'ADMINISTRADOR', 'REDSOLUTION', '871fe11cae718ef29a52d77310d763cf', 'Patricio', 'ceo.patricio@redsolution-mx.com', '0000-00-00 00:00:00', 1),
(5, 'CUENTASPORPAGAR', 'CUENTASPORPAGAR', 'bab8518a923c061567a34df0d583748a', 'CUENTASPORPAGAR', 'cpp@correo.com', '0000-00-00 00:00:00', 1),
(6, 'MESADECONTROL', 'MESADECONTROL', 'bab8518a923c061567a34df0d583748a', 'MESA DE CONTROL', 'mc@correo.com', '0000-00-00 00:00:00', 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `FK_id` FOREIGN KEY (`id`) REFERENCES `usuarios` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
