-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 08-02-2020 a las 21:03:30
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `lavanderia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ganchosvendidos`
--

DROP TABLE IF EXISTS `ganchosvendidos`;
CREATE TABLE IF NOT EXISTS `ganchosvendidos` (
  `id_ganchosvendidos` int(11) NOT NULL AUTO_INCREMENT,
  `Cantidad` int(11) NOT NULL,
  `PrecioVenta` float NOT NULL,
  `Fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `empleado` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_ganchosvendidos`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
CREATE TABLE IF NOT EXISTS `pedidos` (
  `idpedido` int(11) NOT NULL AUTO_INCREMENT,
  `idproductos` int(11) NOT NULL,
  `Cliente` varchar(35) NOT NULL,
  `Abono` float DEFAULT NULL,
  `ganchoscliente` int(11) DEFAULT NULL,
  `ganchosvendidos` int(11) DEFAULT NULL,
  `pendientepagar` float NOT NULL,
  `total` float NOT NULL,
  `horapedido` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `horaentregado` datetime DEFAULT NULL,
  `Empleado` varchar(35) NOT NULL,
  `Entregadopor` varchar(50) DEFAULT NULL,
  `Entregado` int(11) NOT NULL,
  PRIMARY KEY (`idpedido`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precioganchos`
--

DROP TABLE IF EXISTS `precioganchos`;
CREATE TABLE IF NOT EXISTS `precioganchos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Gancho` varchar(10) NOT NULL,
  `PrecioG` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Prenda` varchar(60) NOT NULL,
  `PrecioLavado` float NOT NULL,
  `PrecioPlanchado` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productospedidos`
--

DROP TABLE IF EXISTS `productospedidos`;
CREATE TABLE IF NOT EXISTS `productospedidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idproducto` int(11) NOT NULL,
  `Prenda` varchar(50) NOT NULL,
  `idpedido` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `express` float NOT NULL,
  `almidon` float NOT NULL,
  `Planchado` varchar(30) DEFAULT NULL,
  `Lavado` varchar(30) DEFAULT NULL,
  `detalle` varchar(400) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte`
--

DROP TABLE IF EXISTS `reporte`;
CREATE TABLE IF NOT EXISTS `reporte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idproductos` int(255) NOT NULL,
  `Prenda` varchar(50) NOT NULL,
  `cantidad` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmp`
--

DROP TABLE IF EXISTS `tmp`;
CREATE TABLE IF NOT EXISTS `tmp` (
  `id_tmp` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `preciol` float DEFAULT NULL,
  `preciop` float DEFAULT NULL,
  `express` float DEFAULT NULL,
  `almidon` int(11) DEFAULT NULL,
  `detalle` varchar(400) DEFAULT NULL,
  `especial` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_tmp`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `NuevoPedido` int(11) NOT NULL,
  `PedidosPendientes` int(11) NOT NULL,
  `PedidosEntregados` int(11) NOT NULL,
  `Productos` int(11) NOT NULL,
  `Empleados` int(11) NOT NULL,
  `ReportePedidos` int(11) NOT NULL,
  `GanchosVendidos` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
