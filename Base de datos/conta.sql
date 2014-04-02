-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 02-04-2014 a las 22:10:03
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `conta`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agentes`
--

CREATE TABLE IF NOT EXISTS `agentes` (
  `apellidos` varchar(100) COLLATE utf8_bin NOT NULL,
  `ciudad` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `codagente` varchar(10) COLLATE utf8_bin NOT NULL,
  `coddepartamento` varchar(6) COLLATE utf8_bin DEFAULT NULL,
  `codpais` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `codpostal` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `direccion` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `dnicif` varchar(15) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `fax` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `idprovincia` int(11) DEFAULT NULL,
  `idusuario` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `irpf` double DEFAULT NULL,
  `nombre` varchar(50) COLLATE utf8_bin NOT NULL,
  `nombreap` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `porcomision` double DEFAULT NULL,
  `provincia` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `telefono` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`codagente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `agentes`
--

INSERT INTO `agentes` (`apellidos`, `ciudad`, `codagente`, `coddepartamento`, `codpais`, `codpostal`, `direccion`, `dnicif`, `email`, `fax`, `idprovincia`, `idusuario`, `irpf`, `nombre`, `nombreap`, `porcomision`, `provincia`, `telefono`) VALUES
('Pepe', NULL, '1', NULL, NULL, NULL, NULL, '00000014Z', NULL, NULL, NULL, NULL, NULL, 'Paco', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacenes`
--

CREATE TABLE IF NOT EXISTS `almacenes` (
  `apartado` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `codalmacen` varchar(4) COLLATE utf8_bin NOT NULL,
  `codpais` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `codpostal` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `contacto` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `direccion` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `fax` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `idprovincia` int(11) DEFAULT NULL,
  `nombre` varchar(100) COLLATE utf8_bin NOT NULL,
  `observaciones` text COLLATE utf8_bin,
  `poblacion` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `porpvp` double DEFAULT NULL,
  `provincia` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `telefono` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `tipovaloracion` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`codalmacen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `almacenes`
--

INSERT INTO `almacenes` (`apartado`, `codalmacen`, `codpais`, `codpostal`, `contacto`, `direccion`, `fax`, `idprovincia`, `nombre`, `observaciones`, `poblacion`, `porpvp`, `provincia`, `telefono`, `tipovaloracion`) VALUES
(NULL, 'ALG', NULL, '', '', '', '', NULL, 'ALMACEN GENERAL', NULL, '', NULL, NULL, '', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `co_asientos`
--

CREATE TABLE IF NOT EXISTS `co_asientos` (
  `codejercicio` varchar(4) COLLATE utf8_bin NOT NULL,
  `codplanasiento` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `concepto` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `documento` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `editable` tinyint(1) NOT NULL,
  `fecha` date NOT NULL,
  `idasiento` int(11) NOT NULL AUTO_INCREMENT,
  `idconcepto` varchar(4) COLLATE utf8_bin DEFAULT NULL,
  `importe` double DEFAULT NULL,
  `numero` int(11) NOT NULL,
  `tipodocumento` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idasiento`),
  KEY `ca_co_asientos_ejercicios2` (`codejercicio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `co_codbalances08`
--

CREATE TABLE IF NOT EXISTS `co_codbalances08` (
  `descripcion4ba` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `descripcion4` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `nivel4` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `descripcion3` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `orden3` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `nivel3` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `descripcion2` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `nivel2` int(11) DEFAULT NULL,
  `descripcion1` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `nivel1` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `naturaleza` varchar(15) COLLATE utf8_bin NOT NULL,
  `codbalance` varchar(15) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`codbalance`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `co_cuentas`
--

CREATE TABLE IF NOT EXISTS `co_cuentas` (
  `codbalance` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `codcuenta` varchar(6) COLLATE utf8_bin NOT NULL,
  `codejercicio` varchar(4) COLLATE utf8_bin NOT NULL,
  `codepigrafe` varchar(6) COLLATE utf8_bin NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `idcuenta` int(11) NOT NULL AUTO_INCREMENT,
  `idcuentaesp` varchar(6) COLLATE utf8_bin DEFAULT NULL,
  `idepigrafe` int(11) NOT NULL,
  PRIMARY KEY (`idcuenta`),
  KEY `ca_co_cuentas_ejercicios2` (`codejercicio`),
  KEY `ca_co_cuentas_epigrafes2` (`idepigrafe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `co_cuentascb`
--

CREATE TABLE IF NOT EXISTS `co_cuentascb` (
  `desccuenta` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `codcuenta` varchar(6) COLLATE utf8_bin NOT NULL,
  `codbalance` varchar(15) COLLATE utf8_bin NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `co_cuentascbba`
--

CREATE TABLE IF NOT EXISTS `co_cuentascbba` (
  `desccuenta` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `codcuenta` varchar(6) COLLATE utf8_bin NOT NULL,
  `codbalance` varchar(15) COLLATE utf8_bin NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `co_cuentasesp`
--

CREATE TABLE IF NOT EXISTS `co_cuentasesp` (
  `codcuenta` varchar(6) COLLATE utf8_bin DEFAULT NULL,
  `codsubcuenta` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `descripcion` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `idcuentaesp` varchar(6) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idcuentaesp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `co_epigrafes`
--

CREATE TABLE IF NOT EXISTS `co_epigrafes` (
  `codejercicio` varchar(4) COLLATE utf8_bin NOT NULL,
  `codepigrafe` varchar(6) COLLATE utf8_bin NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `idepigrafe` int(11) NOT NULL AUTO_INCREMENT,
  `idgrupo` int(11) DEFAULT NULL,
  `idpadre` int(11) DEFAULT NULL,
  PRIMARY KEY (`idepigrafe`),
  KEY `ca_co_epigrafes_ejercicios2` (`codejercicio`),
  KEY `ca_co_epigrafes_gruposepigrafes2` (`idgrupo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `co_gruposepigrafes`
--

CREATE TABLE IF NOT EXISTS `co_gruposepigrafes` (
  `codejercicio` varchar(4) COLLATE utf8_bin NOT NULL,
  `codgrupo` varchar(6) COLLATE utf8_bin NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `idgrupo` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idgrupo`),
  KEY `ca_co_gruposepigrafes_ejercicios2` (`codejercicio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `co_partidas`
--

CREATE TABLE IF NOT EXISTS `co_partidas` (
  `baseimponible` double NOT NULL,
  `cifnif` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `codcontrapartida` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `coddivisa` varchar(3) COLLATE utf8_bin DEFAULT NULL,
  `codserie` varchar(2) COLLATE utf8_bin DEFAULT NULL,
  `codsubcuenta` varchar(15) COLLATE utf8_bin NOT NULL,
  `concepto` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `debe` double NOT NULL DEFAULT '0',
  `debeme` double NOT NULL,
  `documento` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `factura` double DEFAULT NULL,
  `haber` double NOT NULL DEFAULT '0',
  `haberme` double NOT NULL,
  `idasiento` int(11) NOT NULL,
  `idconcepto` varchar(4) COLLATE utf8_bin DEFAULT NULL,
  `idcontrapartida` int(11) DEFAULT NULL,
  `idpartida` int(11) NOT NULL AUTO_INCREMENT,
  `idsubcuenta` int(11) NOT NULL,
  `iva` double NOT NULL,
  `punteada` tinyint(1) NOT NULL DEFAULT '0',
  `recargo` double NOT NULL,
  `tasaconv` double NOT NULL,
  `tipodocumento` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idpartida`),
  KEY `ca_co_partidas_co_asientos2` (`idasiento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `co_secuencias`
--

CREATE TABLE IF NOT EXISTS `co_secuencias` (
  `codejercicio` varchar(4) COLLATE utf8_bin NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `idsecuencia` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_bin NOT NULL,
  `valor` int(11) DEFAULT NULL,
  `valorout` int(11) DEFAULT NULL,
  PRIMARY KEY (`idsecuencia`),
  KEY `ca_co_secuencias_ejercicios2` (`codejercicio`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `co_secuencias`
--

INSERT INTO `co_secuencias` (`codejercicio`, `descripcion`, `idsecuencia`, `nombre`, `valor`, `valorout`) VALUES
('0001', 'Creado por FacturaScripts', 1, 'nasiento', NULL, 5),
('0002', 'Creado por FacturaScripts', 2, 'nasiento', NULL, 16),
('0003', 'Creado por FacturaScripts', 3, 'nasiento', NULL, 7),
('0004', 'Creado por FacturaScripts', 4, 'nasiento', NULL, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `co_subcuentas`
--

CREATE TABLE IF NOT EXISTS `co_subcuentas` (
  `codcuenta` varchar(6) COLLATE utf8_bin NOT NULL,
  `coddivisa` varchar(3) COLLATE utf8_bin NOT NULL,
  `codejercicio` varchar(4) COLLATE utf8_bin NOT NULL,
  `codimpuesto` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `codsubcuenta` varchar(15) COLLATE utf8_bin NOT NULL,
  `debe` double NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `haber` double NOT NULL,
  `idcuenta` int(11) DEFAULT NULL,
  `idsubcuenta` int(11) NOT NULL AUTO_INCREMENT,
  `iva` double NOT NULL,
  `recargo` double NOT NULL,
  `saldo` double NOT NULL,
  PRIMARY KEY (`idsubcuenta`),
  KEY `ca_co_subcuentas_ejercicios2` (`codejercicio`),
  KEY `ca_co_subcuentas_cuentas2` (`idcuenta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `divisas`
--

CREATE TABLE IF NOT EXISTS `divisas` (
  `bandera` text COLLATE utf8_bin,
  `coddivisa` varchar(3) COLLATE utf8_bin NOT NULL,
  `codiso` varchar(3) COLLATE utf8_bin DEFAULT NULL,
  `descripcion` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `simbolo` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `tasaconv` double NOT NULL,
  PRIMARY KEY (`coddivisa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `divisas`
--

INSERT INTO `divisas` (`bandera`, `coddivisa`, `codiso`, `descripcion`, `fecha`, `simbolo`, `tasaconv`) VALUES
(NULL, 'ARS', '32', 'PESOS (ARG)', NULL, '$', 10.83),
(NULL, 'CLP', '152', 'PESOS (CLP)', NULL, '$', 755.73),
(NULL, 'EUR', '978', 'EUROS', NULL, '€', 1),
(NULL, 'MXN', '484', 'PESOS (MXN)', NULL, '$', 18.1),
(NULL, 'PAB', '590', 'BALBOAS', NULL, 'B', 38.17),
(NULL, 'USD', '840', 'DÓLARES EE.UU.', NULL, '$', 1.36),
(NULL, 'VEF', '937', 'BOLÍVARES', NULL, 'Bs', 38.17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejercicios`
--

CREATE TABLE IF NOT EXISTS `ejercicios` (
  `idasientocierre` int(11) DEFAULT NULL,
  `idasientopyg` int(11) DEFAULT NULL,
  `idasientoapertura` int(11) DEFAULT NULL,
  `plancontable` varchar(2) COLLATE utf8_bin DEFAULT NULL,
  `longsubcuenta` int(11) DEFAULT NULL,
  `estado` varchar(15) COLLATE utf8_bin NOT NULL,
  `fechafin` date NOT NULL,
  `fechainicio` date NOT NULL,
  `nombre` varchar(100) COLLATE utf8_bin NOT NULL,
  `codejercicio` varchar(4) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`codejercicio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `ejercicios`
--

INSERT INTO `ejercicios` (`idasientocierre`, `idasientopyg`, `idasientoapertura`, `plancontable`, `longsubcuenta`, `estado`, `fechafin`, `fechainicio`, `nombre`, `codejercicio`) VALUES
(NULL, NULL, NULL, '08', 10, 'ABIERTO', '2014-12-31', '2014-01-01', '2014', '0001'),
(NULL, NULL, NULL, '08', 10, 'ABIERTO', '2015-12-31', '2015-01-01', '2015', '0002'),
(NULL, NULL, NULL, '08', 10, 'ABIERTO', '2016-12-31', '2016-01-01', '2016', '0003'),
(NULL, NULL, NULL, '08', 10, 'ABIERTO', '2014-12-31', '2014-01-01', 'hola', '0004');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE IF NOT EXISTS `empresa` (
  `administrador` varchar(100) COLLATE utf8_bin NOT NULL,
  `apartado` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `cifnif` varchar(20) COLLATE utf8_bin NOT NULL,
  `ciudad` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `codalmacen` varchar(4) COLLATE utf8_bin DEFAULT NULL,
  `codcuentarem` varchar(6) COLLATE utf8_bin DEFAULT NULL,
  `coddivisa` varchar(3) COLLATE utf8_bin DEFAULT NULL,
  `codedi` varchar(17) COLLATE utf8_bin DEFAULT NULL,
  `codejercicio` varchar(4) COLLATE utf8_bin DEFAULT NULL,
  `codpago` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `codpais` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `codpostal` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `codserie` varchar(2) COLLATE utf8_bin DEFAULT NULL,
  `contintegrada` tinyint(1) DEFAULT NULL,
  `direccion` varchar(100) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `email_firma` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `email_password` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `fax` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `horario` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idprovincia` int(11) DEFAULT NULL,
  `lema` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `logo` text COLLATE utf8_bin,
  `nombre` varchar(100) COLLATE utf8_bin NOT NULL,
  `pie_factura` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `provincia` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `recequivalencia` tinyint(1) DEFAULT NULL,
  `stockpedidos` tinyint(1) DEFAULT NULL,
  `telefono` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `web` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`administrador`, `apartado`, `cifnif`, `ciudad`, `codalmacen`, `codcuentarem`, `coddivisa`, `codedi`, `codejercicio`, `codpago`, `codpais`, `codpostal`, `codserie`, `contintegrada`, `direccion`, `email`, `email_firma`, `email_password`, `fax`, `horario`, `id`, `idprovincia`, `lema`, `logo`, `nombre`, `pie_factura`, `provincia`, `recequivalencia`, `stockpedidos`, `telefono`, `web`) VALUES
('s', '', '', '', 'ALG', NULL, 'MXN', NULL, '0001', 'CONT', 'MEX', '', 'A', 0, 'C/ Falsa, 123', '', '', '', '', '', 1, NULL, '', NULL, 'CONTADITO', '', 'das', 0, 0, '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formaspago`
--

CREATE TABLE IF NOT EXISTS `formaspago` (
  `codpago` varchar(10) COLLATE utf8_bin NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `genrecibos` varchar(10) COLLATE utf8_bin NOT NULL,
  `codcuenta` varchar(6) COLLATE utf8_bin DEFAULT NULL,
  `domiciliado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`codpago`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `formaspago`
--

INSERT INTO `formaspago` (`codpago`, `descripcion`, `genrecibos`, `codcuenta`, `domiciliado`) VALUES
('CONT', 'CONTADO', 'Emitidos', NULL, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fs_pages`
--

CREATE TABLE IF NOT EXISTS `fs_pages` (
  `name` varchar(30) COLLATE utf8_bin NOT NULL,
  `title` varchar(40) COLLATE utf8_bin NOT NULL,
  `folder` varchar(15) COLLATE utf8_bin NOT NULL,
  `version` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `show_on_menu` tinyint(1) NOT NULL DEFAULT '1',
  `important` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `fs_pages`
--

INSERT INTO `fs_pages` (`name`, `title`, `folder`, `version`, `show_on_menu`, `important`) VALUES
('admin_empresa', 'Empresa', 'admin', '2014.3c', 1, 0),
('admin_info', 'Información del sistema', 'admin', '2014.3c', 1, 0),
('admin_pages', 'Páginas', 'admin', '2014.3c', 1, 0),
('admin_user', 'Usuario', 'admin', '2014.3c', 0, 0),
('admin_users', 'Usuarios', 'admin', '2014.3c', 1, 0),
('contabilidad_balance', 'Balance', 'contabilidad', '2014.3c', 0, 0),
('contabilidad_balances', 'Balances', 'contabilidad', '2014.3c', 0, 0),
('contabilidad_cuenta', 'Cuenta', 'contabilidad', '2014.3c', 0, 0),
('contabilidad_cuentas', 'Cuentas', 'contabilidad', '2014.3c', 1, 0),
('contabilidad_ejercicio', 'Ejercicio', 'contabilidad', '2014.3c', 0, 0),
('contabilidad_ejercicios', 'Ejercicios', 'contabilidad', '2014.3c', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fs_users`
--

CREATE TABLE IF NOT EXISTS `fs_users` (
  `nick` varchar(12) COLLATE utf8_bin NOT NULL,
  `password` varchar(100) COLLATE utf8_bin NOT NULL,
  `log_key` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `codagente` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `last_login` date DEFAULT NULL,
  `last_login_time` time DEFAULT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `last_browser` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `fs_page` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `codejercicio` varchar(4) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`nick`),
  KEY `ca_fs_users_agentes2` (`codagente`),
  KEY `ca_fs_users_pages2` (`fs_page`),
  KEY `ca_fs_users_ejercicios2` (`codejercicio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `fs_users`
--

INSERT INTO `fs_users` (`nick`, `password`, `log_key`, `admin`, `codagente`, `last_login`, `last_login_time`, `last_ip`, `last_browser`, `fs_page`, `codejercicio`) VALUES
('admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'd57334559a59fa548772f03a0cc9189f6d713128', 1, '1', '2014-04-01', '22:55:16', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750.152 Safari/537.36', 'admin_empresa', '0001');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fs_vars`
--

CREATE TABLE IF NOT EXISTS `fs_vars` (
  `name` varchar(20) COLLATE utf8_bin NOT NULL,
  `varchar` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `fs_vars`
--

INSERT INTO `fs_vars` (`name`, `varchar`) VALUES
('mail_enc', 'ssl'),
('mail_host', 'smtp.gmail.com'),
('mail_port', '465'),
('mail_user', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE IF NOT EXISTS `paises` (
  `validarprov` tinyint(1) DEFAULT NULL,
  `codiso` varchar(2) COLLATE utf8_bin DEFAULT NULL,
  `bandera` text COLLATE utf8_bin,
  `nombre` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `codpais` varchar(20) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`codpais`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`validarprov`, `codiso`, `bandera`, `nombre`, `codpais`) VALUES
(NULL, '', NULL, 'Argentina', 'ARG'),
(NULL, '', NULL, 'Chile', 'CHL'),
(NULL, '', NULL, 'Ecuador', 'ECU'),
(NULL, '', NULL, 'España', 'ESP'),
(NULL, '', NULL, 'México', 'MEX'),
(NULL, '', NULL, 'Panamá', 'PAN'),
(NULL, '', NULL, 'Venezuela', 'VEN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `series`
--

CREATE TABLE IF NOT EXISTS `series` (
  `irpf` double DEFAULT NULL,
  `idcuenta` int(11) DEFAULT NULL,
  `codserie` varchar(2) COLLATE utf8_bin NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `siniva` tinyint(1) DEFAULT NULL,
  `codcuenta` varchar(6) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`codserie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `series`
--

INSERT INTO `series` (`irpf`, `idcuenta`, `codserie`, `descripcion`, `siniva`, `codcuenta`) VALUES
(0, NULL, 'A', 'SERIE A', 0, NULL);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `co_asientos`
--
ALTER TABLE `co_asientos`
  ADD CONSTRAINT `ca_co_asientos_ejercicios2` FOREIGN KEY (`codejercicio`) REFERENCES `ejercicios` (`codejercicio`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `co_cuentas`
--
ALTER TABLE `co_cuentas`
  ADD CONSTRAINT `ca_co_cuentas_ejercicios2` FOREIGN KEY (`codejercicio`) REFERENCES `ejercicios` (`codejercicio`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ca_co_cuentas_epigrafes2` FOREIGN KEY (`idepigrafe`) REFERENCES `co_epigrafes` (`idepigrafe`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `co_epigrafes`
--
ALTER TABLE `co_epigrafes`
  ADD CONSTRAINT `ca_co_epigrafes_ejercicios2` FOREIGN KEY (`codejercicio`) REFERENCES `ejercicios` (`codejercicio`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ca_co_epigrafes_gruposepigrafes2` FOREIGN KEY (`idgrupo`) REFERENCES `co_gruposepigrafes` (`idgrupo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `co_gruposepigrafes`
--
ALTER TABLE `co_gruposepigrafes`
  ADD CONSTRAINT `ca_co_gruposepigrafes_ejercicios2` FOREIGN KEY (`codejercicio`) REFERENCES `ejercicios` (`codejercicio`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `co_partidas`
--
ALTER TABLE `co_partidas`
  ADD CONSTRAINT `ca_co_partidas_co_asientos2` FOREIGN KEY (`idasiento`) REFERENCES `co_asientos` (`idasiento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `co_secuencias`
--
ALTER TABLE `co_secuencias`
  ADD CONSTRAINT `ca_co_secuencias_ejercicios2` FOREIGN KEY (`codejercicio`) REFERENCES `ejercicios` (`codejercicio`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `co_subcuentas`
--
ALTER TABLE `co_subcuentas`
  ADD CONSTRAINT `ca_co_subcuentas_cuentas2` FOREIGN KEY (`idcuenta`) REFERENCES `co_cuentas` (`idcuenta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ca_co_subcuentas_ejercicios2` FOREIGN KEY (`codejercicio`) REFERENCES `ejercicios` (`codejercicio`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `fs_users`
--
ALTER TABLE `fs_users`
  ADD CONSTRAINT `ca_fs_users_agentes2` FOREIGN KEY (`codagente`) REFERENCES `agentes` (`codagente`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `ca_fs_users_ejercicios2` FOREIGN KEY (`codejercicio`) REFERENCES `ejercicios` (`codejercicio`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `ca_fs_users_pages2` FOREIGN KEY (`fs_page`) REFERENCES `fs_pages` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
