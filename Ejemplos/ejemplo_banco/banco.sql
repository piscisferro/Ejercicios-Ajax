-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 13-01-2014 a las 09:06:15
-- Versión del servidor: 5.5.16
-- Versión de PHP: 5.4.0beta2-dev

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `banco`
--
CREATE DATABASE `banco-ajax` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;
USE `banco-ajax`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `dni` varchar(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `direccion` varchar(130) NOT NULL,
  `telefono` int(11) NOT NULL,
  PRIMARY KEY (`dni`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`dni`, `nombre`, `direccion`, `telefono`) VALUES
('001112', 'pepe1', 'pepepepe122', 12312311),
('234234', '41', '2342341', 2342341),
('3223', '3232', '3232', 3232),
('3333', '3331', '3331', 3331),
('4444', '444', '444', 444),
('dsffdsdf', 'sdfsdf', 'sdfsd', 3333);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE IF NOT EXISTS `empleado` (
  `dni` varchar(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `cargo` varchar(30) NOT NULL,
  `sueldo` double NOT NULL,
  PRIMARY KEY (`dni`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`dni`, `nombre`, `cargo`, `sueldo`) VALUES
('12345678', 'Rosmualdo Fernández', 'director', 2400),
('13579', 'Satumino Peláez', 'administrativo', 1200);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prueba`
--

CREATE TABLE IF NOT EXISTS `prueba` (
  `id` varchar(30) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `prueba`
--

INSERT INTO `prueba` (`id`, `time`) VALUES
('', '2012-11-19 18:47:35'),
('', '2012-12-05 10:46:36'),
('', '2012-12-05 10:46:46'),
('', '2012-12-05 10:46:50'),
('', '2012-12-05 10:47:03'),
('', '2012-12-05 12:16:10'),
('', '2012-12-05 12:52:28'),
('', '2012-12-05 12:52:38'),
('', '2012-12-09 19:45:09'),
('', '2012-12-09 19:45:27'),
('', '2012-12-09 19:45:29');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
