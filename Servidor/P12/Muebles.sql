-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 03-03-2015 a las 12:09:36
-- Versión del servidor: 5.1.66
-- Versión de PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `u569805685_fm`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Mueble`
--

CREATE TABLE IF NOT EXISTS `Mueble` (
  `cod` INT PRIMARY KEY,
  `nombre` varchar(30) UNIQUE,
  `precio` float NOT NULL
);

--
-- Volcado de datos para la tabla `Mueble`
--

INSERT INTO `Mueble` (`cod`, `nombre`, `precio`) VALUES
(1, 'Mesa TV', 35),
(2, 'Mesa de centro', 40),
(3, 'Mesa auxiliar', 20),
(4, 'Mesa comedor plegable', 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Pieza`
--

CREATE TABLE IF NOT EXISTS `Pieza` (
  `cod` INT PRIMARY KEY,
  `nombre` varchar(30) UNIQUE,
  `descripc` varchar(50) NOT NULL
);

--
-- Volcado de datos para la tabla `Pieza`
--

INSERT INTO `Pieza` (`cod`, `nombre`, `descripc`) VALUES
(1, 'Bisagra metálica', 'Bisagra metálica'),
(2, 'Tablero madera 50x50', 'Tablero de madera de planta cuadrada de 50 cm x 50 cm'),
(3, 'Tablero madera 50x20', 'Tablero de planta rectangular'),
(4, 'Rueda', 'Rueda de 5 cm de diámetro'),
(5, 'Pata de madera 20 cm', 'Pata de madera de sección cuadrada'),
(6, 'Pata de madera 50 cm', 'Pata de madera de sección cuadrada');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Formado`
--

CREATE TABLE IF NOT EXISTS `Formado` (
  `cod_mueble` INT,
  `cod_pieza` INT,
  `unidades` INT NOT NULL,
  PRIMARY KEY (`cod_mueble`, `cod_pieza`),
  FOREIGN KEY (`cod_mueble`) REFERENCES Mueble(`cod`),
  FOREIGN KEY (`cod_pieza`) REFERENCES Pieza(`cod`)
);

--
-- Volcado de datos para la tabla `Formado`
--

INSERT INTO `Formado` (`cod_mueble`, `cod_pieza`, `unidades`) VALUES
(1, 3, 1),
(1, 4, 4),
(1, 6, 4),
(2, 2, 1),
(2, 5, 4),
(3, 3, 1),
(3, 5, 4),
(4, 1, 2),
(4, 2, 2),
(4, 6, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Estante`
--

CREATE TABLE IF NOT EXISTS `Estante` (
  `pasillo` INT,
  `altura` INT,
  `cod_pieza` INT,
  `unidades` INT NOT NULL,
  PRIMARY KEY (`pasillo`, `altura`),
  FOREIGN KEY (`cod_pieza`) REFERENCES Pieza(`cod`)
);

--
-- Volcado de datos para la tabla `Estante`
--

INSERT INTO `Estante` (`pasillo`, `altura`, `cod_pieza`, `unidades`) VALUES
(1, 1, 1, 50),
(1, 2, 1, 50),
(1, 3, 1, 50),
(1, 4, 1, 23),
(1, 5, 2, 50),
(2, 1, 2, 50),
(2, 2, 2, 15),
(2, 3, 3, 50),
(2, 4, 3, 12),
(2, 5, 4, 50),
(3, 1, 4, 50),
(3, 2, 4, 50),
(3, 3, 4, 33),
(3, 4, 5, 50),
(3, 5, 5, 50),
(4, 1, 5, 50),
(4, 2, 5, 50),
(4, 3, 5, 50),
(4, 4, 5, 50),
(4, 5, 5, 45),
(5, 1, 6, 50),
(5, 2, 6, 50),
(5, 3, 6, 50),
(5, 4, 6, 50),
(5, 5, 6, 50),
(6, 1, 6, 35);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Mueble`
--

CREATE TABLE IF NOT EXISTS `Usuario` (
  `user` varchar(20) PRIMARY KEY,
  `pass` varchar(30) NOT NULL
);

--
-- Volcado de datos para la tabla `Mueble`
--

INSERT INTO `Usuario` (`user`, `pass`) VALUES
('plopez', 'lopez'),
('calonso', 'alonso'),
('aramos', 'ramos'),
('sdomingo', 'domingo');


