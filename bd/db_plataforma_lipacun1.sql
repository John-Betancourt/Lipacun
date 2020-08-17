-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-08-2020 a las 10:20:54
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_plataforma_lipacun`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `id` int(11) NOT NULL,
  `cargo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`id`, `cargo`) VALUES
(1, 'Presidente'),
(2, 'Vicepresidente'),
(3, 'Entrenador'),
(4, 'Delegado'),
(5, 'Otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `categoria` varchar(10) NOT NULL,
  `detalles` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `categoria`, `detalles`) VALUES
(1, 'A', '5 - 6 años'),
(2, 'B', '7 - 8 años'),
(3, 'C', '9 - 10 años'),
(4, 'D', '11- 12 años'),
(5, 'E', '13 - 14 años'),
(6, 'F', '15 +');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_resultados`
--

CREATE TABLE `categorias_resultados` (
  `id` int(2) NOT NULL,
  `categorias_resultados` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias_resultados`
--

INSERT INTO `categorias_resultados` (`id`, `categorias_resultados`) VALUES
(3, 'Mayores'),
(1, 'Menores'),
(2, 'Transicion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clubes`
--

CREATE TABLE `clubes` (
  `departamento` int(2) NOT NULL,
  `municipio` int(6) NOT NULL,
  `nombre_completo_club` varchar(100) NOT NULL,
  `nombres` tinytext NOT NULL,
  `apellidos` tinytext NOT NULL,
  `identificacion` int(11) NOT NULL,
  `cargo` int(11) NOT NULL,
  `telefono` bigint(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `reconocimiento` int(11) NOT NULL,
  `no_reconocimiento` int(11) DEFAULT NULL,
  `fecha_reconocimiento` date DEFAULT NULL,
  `nombre_corto_club` varchar(20) NOT NULL,
  `clave` varchar(50) DEFAULT NULL,
  `direccion` varchar(30) NOT NULL,
  `fecha_inscripcion` date NOT NULL,
  `estado` int(11) NOT NULL,
  `token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clubes`
--

INSERT INTO `clubes` (`departamento`, `municipio`, `nombre_completo_club`, `nombres`, `apellidos`, `identificacion`, `cargo`, `telefono`, `email`, `reconocimiento`, `no_reconocimiento`, `fecha_reconocimiento`, `nombre_corto_club`, `clave`, `direccion`, `fecha_inscripcion`, `estado`, `token`) VALUES
(25, 355, 'AR SKATING FUSAGASUGÁ', 'Luis ', 'Medina Coronado', 283746352, 1, 3214543235, 'bdavidlozano@gmail.com', 1, 23243, '2016-02-09', 'AR SKATING', 'a45e50c4516725814bb3c7cabd53a27a', 'Fusagasuga Carrera 15', '2020-04-24', 1, 'm0zw2Ai8HA5krIYQTTeiU19xBoBQvKxqS8e0s5vI'),
(25, 54, 'CLUB DE PATIN ARBELAEZ REAL', 'JESUS ANDRE', 'LOPEZ SILVA', 1292726123, 1, 3213745342, 'bdavidlozano@gmail.com', 1, 12, '2020-05-05', 'ARBELAEZ REAL', 'ec8706beeb66dc36435e56d8eb7ef32a', 'carrera 100 #23-15', '2020-05-28', 1, NULL),
(25, 39, 'BIG SKATERS ANOLAIMA', 'Juan ', 'Lopez Perilla', 23423534, 3, 25345464, 'bdavidlozano@gmail.com', 1, 34526, '2018-10-24', 'BIG SKATERS', '15bbe5a5dadbb4746d6feb2d64960cfd', 'Anolaima calle 25', '2020-04-24', 1, NULL),
(25, 246, 'CITIUS COTA', 'Juan Esteban', 'Robayo Rodrigues', 826635222, 3, 3254432233, 'bdavidlozano@gmail.com', 1, 97865, '2020-04-08', 'CITIUS COTA', '53fe6d0d0fe7247df46a1d7c70c49a24', 'cota avenida siempre viva', '2020-04-24', 1, NULL),
(25, 108, 'Coorporación Club JGB', 'Luis', 'Fernandez Clevez', 1000148608, 2, 32456162633, 'bdavidlozano@gmail.com', 2, NULL, NULL, 'Club JGB', 'f52e58bd9eae81cfb4325d22401a8b55', 'carrera 100 #23-14', '2020-04-24', 1, NULL),
(5, 20, 'CLUB REAL DE PATINAJE ANTIOQUIA', 'JUAN MANUEL', 'FRANCO REYES', 387264873, 1, 3192771722, 'bdavidlozano@gmail.com', 1, 736435, '2016-06-16', 'CLUB REAL ANTIOUIA', 'ec7ee2fed8e459e685aaf34aaed3f9f6', 'Carrera 15 #54 - 21', '0000-00-00', 1, NULL),
(25, 246, ' COLSKATER COTA', 'Sebastian ', 'Aldayo Quintana', 2147483647, 3, 3124656363, 'bdavidlozano@gmail.com', 2, 0, '0000-00-00', 'COLSKATER ', '80dc37f9fd70a1e802289ecff9d2daf9', 'cota calle 20', '2020-04-24', 1, NULL),
(25, 355, 'CPF Jeysson Martans Fusagasuga', 'Jeysson', 'Martans', 87725533, 1, 3241524442, 'bdavidlozano@gmail.com', 2, NULL, NULL, 'CPF FUSAGASUGA', '1e0b95b7d246d199389db566bed13cd3', 'carrera 45 fusagasuga', '2020-04-24', 1, NULL),
(25, 476, 'ECOPATIN', 'Valentina ', 'Gil', 114436442, 2, 3226534242, 'bdavidlozano@gmail.com', 2, NULL, NULL, 'ECOPATIN', '2d74744080753336fcb0b6ded2b3242f', 'Calle 25 #14-45', '2020-04-24', 1, NULL),
(25, 579, 'ESCUELA DE FORMACIÓN MOSQUERA', 'Samuel Andres', 'Mayorga Moreno', 2147483647, 3, 3245542332, 'bdavidlozano@gmail.com', 1, 363, '2020-07-27', 'ESC MOSQUERA', 'ae857a15c72af3363f249ce38f744c95', 'Mosquera calle 15 - 15', '2020-04-25', 1, NULL),
(25, 590, 'Institucion Educativa Departamental Nacionalizado Antonio Nariño', 'John', 'Betancourt Hernandez', 1006118630, 1, 3123655653, 'jbetancou45@uniminuto.edu.co', 2, 0, '0000-00-00', 'IEDAN', '12ec4d7cf3a05e1b6a7cb703952f53ec', 'Calle 4 Cra 2 - 36', '0000-00-00', 1, NULL),
(25, 198, 'NUEVA GENERACION', 'Paolo ', 'Lopez Arenas', 441332314, 2, 3167355253, 'bdavidlozano@gmail.com', 2, NULL, NULL, 'NEW GENERATION', '7324baf092a4dae6da962da99f02b62d', 'carrera 100 #23-15', '2020-05-06', 1, NULL),
(25, 108, 'REAL FUNZA DE PATINAJE', 'Leandro ', 'Rincon Perez', 234353445, 2, 3243322324, 'bdavidlozano@gmail.com', 2, 0, '0000-00-00', 'REAL FUNZA', '02fbf81f9f5fc1316f0112f2c8ace95f', 'funza calle 4 #34 - 45', '2020-05-06', 1, NULL),
(25, 104, 'TALENTO EN LINEA DE PATINAJE', 'Cristian ', 'Cardenas Ortega', 2147483647, 1, 3124543345, 'jobeher2000@gmail.com', 2, NULL, NULL, 'TALENTO EN LINEA', 'd279dae5828037cb3bdf6163be606e45', 'carrera 7ma ', '2020-05-06', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `id_departamento` int(2) NOT NULL,
  `departamento` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id_departamento`, `departamento`) VALUES
(5, 'ANTIOQUIA'),
(8, 'ATLÁNTICO'),
(11, 'BOGOTÁ, D.C.'),
(13, 'BOLÍVAR'),
(15, 'BOYACÁ'),
(17, 'CALDAS'),
(18, 'CAQUETÁ'),
(19, 'CAUCA'),
(20, 'CESAR'),
(23, 'CÓRDOBA'),
(25, 'CUNDINAMARCA'),
(27, 'CHOCÓ'),
(41, 'HUILA'),
(44, 'LA GUAJIRA'),
(47, 'MAGDALENA'),
(50, 'META'),
(52, 'NARIÑO'),
(54, 'NORTE DE SANTANDER'),
(63, 'QUINDIO'),
(66, 'RISARALDA'),
(68, 'SANTANDER'),
(70, 'SUCRE'),
(73, 'TOLIMA'),
(76, 'VALLE DEL CAUCA'),
(81, 'ARAUCA'),
(85, 'CASANARE'),
(86, 'PUTUMAYO'),
(88, 'ARCHIPIÉLAGO DE SAN ANDRÉS, PROVIDENCIA Y SANTA CATALINA'),
(91, 'AMAZONAS'),
(94, 'GUAINÍA'),
(95, 'GUAVIARE'),
(97, 'VAUPÉS'),
(99, 'VICHADA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deportistas`
--

CREATE TABLE `deportistas` (
  `tipo_identificacion` int(11) NOT NULL,
  `identificacion` bigint(12) NOT NULL,
  `primer_nombre` tinytext NOT NULL,
  `segundo_nombre` tinytext,
  `primer_apellido` tinytext NOT NULL,
  `segundo_apellido` tinytext,
  `nombre_corto_club` varchar(20) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `tipo_patin` int(11) NOT NULL,
  `edad` int(11) NOT NULL,
  `categoria` int(11) NOT NULL,
  `rama` int(11) NOT NULL,
  `ligado` int(11) NOT NULL,
  `departamento` int(2) NOT NULL,
  `fecha_afiliacion` date DEFAULT NULL,
  `fecha_renovacion` date DEFAULT NULL,
  `fecha_inscripcion` date NOT NULL,
  `fecha_estado` date NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `deportistas`
--

INSERT INTO `deportistas` (`tipo_identificacion`, `identificacion`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `nombre_corto_club`, `fecha_nacimiento`, `tipo_patin`, `edad`, `categoria`, `rama`, `ligado`, `departamento`, `fecha_afiliacion`, `fecha_renovacion`, `fecha_inscripcion`, `fecha_estado`, `estado`) VALUES
(2, 0, 'bghmnhgn', 'hnvbvbfv', 'bvgnhngh', 'nhnhnghngh', 'IEDAN', '2013-08-03', 2, 7, 2, 2, 2, 25, NULL, NULL, '2020-08-16', '2020-08-16', 1),
(2, 23422345, 'hysg', 'jkhbs', 'hjdgh', 'hdh', 'IEDAN', '2013-07-01', 2, 7, 2, 1, 2, 25, NULL, NULL, '2020-07-14', '2020-07-14', 1),
(2, 23873726, 'bdshbdsh', 'kjhsbs', 'jbshbhjs', 'qjhhsb', 'IEDAN', '2013-07-12', 1, 7, 2, 1, 2, 25, NULL, NULL, '2020-07-14', '2020-08-16', 4),
(2, 23984624, 'Luis ', 'Andres', 'Herrera', 'Sanchez', 'CITIUS COTA', '2013-08-07', 1, 7, 2, 2, 2, 25, NULL, NULL, '2020-08-13', '2020-08-13', 1),
(2, 62726262, 'jdjhs', 'hsdhsh', 'hshsh', 'hshshs', 'IEDAN', '2013-07-02', 2, 7, 2, 1, 2, 25, NULL, NULL, '2020-07-14', '2020-07-14', 1),
(3, 239846248, 'leidy', 'Andres', 'csdvdfv', 'Sanchez', 'CITIUS COTA', '2002-08-02', 1, 18, 6, 2, 2, 25, NULL, NULL, '2020-08-13', '2020-08-13', 1),
(2, 347367733, 'JESUS', 'MANUEL', 'HERRERA', 'APONTE', 'CLUB REAL ANTIOUIA', '2002-10-16', 2, 17, 6, 2, 2, 5, NULL, NULL, '2020-07-10', '2020-07-10', 1),
(2, 353464635, 'vcxvcvxc', 'vcvdfxvdf', 'vdfvdfvdf', 'vdfvdfbf', 'CITIUS COTA', '2009-11-18', 3, 10, 3, 2, 2, 25, NULL, NULL, '2020-08-13', '2020-08-13', 1),
(2, 728367324, 'zhsdbgszd', 'kjsdhgh', 'kjsfhv', 'jhcfd', 'IEDAN', '2013-07-10', 2, 7, 2, 1, 2, 25, NULL, NULL, '2020-07-14', '2020-07-14', 1),
(2, 1000132152, 'JUANA', 'NATALIA', 'TERAN', 'COLORADO', 'TALENTO EN LINEA', '2003-05-22', 2, 17, 6, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1000241139, 'JUAN', 'DAVID', 'RENGIFO', 'PALACIOS', 'TALENTO EN LINEA', '2002-09-19', 2, 17, 6, 2, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1000256416, 'LAURA', 'VALENTINA', 'CASTILLO', 'GUTIERREZ', 'CPF FUSAGASUGA', '2003-08-17', 2, 16, 6, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1000274659, 'LUZ', 'ADRIANA', 'BERNAL', 'VERANO', 'NEW GENERATION', '2003-03-13', 2, 17, 6, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1000332351, 'JUAN', 'CAMILO', 'RAMIREZ', 'BEDOYA', 'TALENTO EN LINEA', '2000-09-12', 2, 19, 6, 2, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1000460458, 'NICOL', 'XIMENAS', 'FORERO', 'SOTOSA', 'AR SKATING', '2002-09-02', 2, 17, 6, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1000519061, 'Alejandro', '', 'palacio', 'Escobar', 'REAL FUNZA', '2002-10-18', 3, 17, 6, 2, 1, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1000572241, 'DANIELA', 'MARIA', 'PI?EROS', 'CALDERON', 'COLSKATER', '2001-05-21', 3, 19, 6, 1, 1, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1000580163, 'PAULA', 'ANDREA', 'MONTEALEGRE', 'CONTRERAS', 'REAL FUNZA', '2003-06-26', 3, 17, 6, 1, 1, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1000604891, 'LAURAS', 'ALEJANDRA', 'THOMAS', 'MONROY', 'AR SKATING', '2001-02-09', 2, 19, 6, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1000714029, 'MARIA', 'JULIANA', 'SALINAS', 'REYES', 'COLSKATER', '2001-12-24', 2, 18, 6, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1000856124, 'juan', 'esteba', 'pavajeau', 'diaz', 'REAL FUNZA', '2003-07-03', 2, 17, 6, 2, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1000932999, 'VALERIA', '', 'PRIETO', 'VAQUIRO', 'REAL FUNZA', '2003-06-11', 2, 17, 6, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1000953434, 'FEDERICO', '', 'GONZALEZ', 'JIMENEZ', 'REAL FUNZA', '2003-03-18', 3, 17, 6, 2, 1, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1000973534, 'NIKOLL', 'DAYANNA', 'PITA', 'BALLESTEROS', 'TALENTO EN LINEA', '2002-11-15', 2, 17, 6, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1000991074, 'MICHAEL', 'RICARDO', 'RESTREPO', 'VARGAS', 'TALENTO EN LINEA', '2003-09-18', 3, 16, 6, 2, 1, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1001116580, 'MARIA', 'FERNANDA', 'MARIN', 'SOTOS', 'AR SKATING', '2003-02-24', 3, 17, 6, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1001176360, 'JUANA', 'SOFIA', 'VIDALES', 'CUELLAR', 'ECOPATIN', '2001-08-27', 3, 18, 6, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1001204136, 'NICOLLE', 'TATIANA', 'PEREZ', 'MENESES', 'TALENTO EN LINEA', '2003-06-29', 2, 17, 6, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1001269557, 'CAROL', 'DAYAN', 'VASQUEZ', 'BASALLO', 'TALENTO EN LINEA', '2000-04-12', 1, 20, 6, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1001275404, 'helem', 'sofia', 'Camargo', 'Casta?eda', 'REAL FUNZA', '2003-03-24', 1, 17, 6, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1001275814, 'ERIKA', 'VIVIANA', 'ALARCON', 'RODRIGUEZ', 'TALENTO EN LINEA', '2003-06-15', 1, 17, 6, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1003379371, 'LIDA', 'MARCELA', 'ESP?TIA', '', 'Club JGB', '2002-08-27', 2, 17, 6, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1003530579, 'ALEJANDRA', '', 'JIMENEZ', '', 'NEW GENERATION', '2004-10-28', 1, 15, 6, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1003568690, 'PAULA', '', 'GARCIA', 'MOGOLLON', 'REAL FUNZA', '2003-11-07', 2, 16, 6, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1003587547, 'NOHORA', 'ALEJANDRA', 'JUZGA', 'UCHUVO', 'ECOPATIN', '2002-05-29', 1, 18, 6, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1003587952, 'DIEGO', 'ARMANDO', 'PIMIENTO', 'RINCON', 'ECOPATIN', '2000-12-12', 3, 19, 6, 2, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1003661217, 'KAREN', 'JULIETH', 'VENEGAS', 'BARRETO', 'TALENTO EN LINEA', '2003-09-02', 3, 16, 6, 1, 1, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1003823631, 'JUAN', 'SEBASTIAN', 'AVILA', 'MOJICA', 'CPF FUSAGASUGA', '2002-02-14', 3, 18, 6, 2, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1003825984, 'LEIDY', 'KHATERINE', 'RAMBAO', 'CALDERON', 'COLSKATER', '2003-07-22', 2, 16, 6, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1003844970, 'BIBIANA', 'ALEXANDRA', 'NIEVES', 'CHUNZA', 'COLSKATER', '2003-02-19', 1, 17, 6, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1007366947, 'KEVIN', 'YESID', 'DIAZ', 'MOLINA', 'TALENTO EN LINEA', '2000-06-10', 1, 20, 6, 2, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1007418794, 'BRITNEY', '', 'MARYORGA', 'GARZON', 'Club JGB', '2003-11-24', 2, 16, 6, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1007430443, 'BRANDON', 'JHEFFREY', 'CALDERON', 'GOYENECHE', 'COLSKATER', '2003-08-22', 3, 16, 6, 2, 1, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1007463366, 'LAURA', 'STEFANIA', 'SANDOVAL', 'BEJARANO', 'TALENTO EN LINEA', '2001-03-15', 3, 19, 6, 1, 1, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1010182499, 'laura', 'sofia', 'pinto', 'Bernal', 'TALENTO EN LINEA', '2007-03-23', 2, 13, 5, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1010283747, 'ANDRES', 'MANUEL', 'RICO', 'GUARIN', 'ARBELAEZ REAL', '2004-06-07', 2, 15, 6, 2, 2, 25, NULL, NULL, '2020-05-28', '2020-05-28', 1),
(2, 1010761194, 'NATHALIA', 'ANDREA', 'SABOGAL', 'MERCHAN', 'BIG SKATERS', '2005-05-04', 3, 15, 6, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-08-16', 4),
(2, 1011062214, 'nicolas', 'Ger?nimo', 'rojas', 'li', 'TALENTO EN LINEA', '2010-12-01', 1, 9, 3, 2, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1011087600, 'SOFIA', '', 'SANTANA', '', 'NEW GENERATION', '2005-11-10', 2, 14, 5, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1011087601, 'ISABELLA', '', 'CORDERO', '', 'NEW GENERATION', '2005-09-12', 1, 14, 5, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1011089051, 'ALEJANDRA', '', 'CALDERON', 'JEREZ', 'CITIUS COTA', '2005-11-29', 3, 14, 5, 1, 1, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-29', 4),
(2, 1011092871, 'CAMILO', 'ANDRES', 'CUTA', 'VEGA', 'IEDAN', '2006-03-20', 2, 14, 5, 2, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1011093280, 'LAURA', 'SOFIA', 'FLOREZ', 'SAENZ', 'TALENTO EN LINEA', '2006-04-02', 1, 14, 5, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1011096326, 'SANTIAGO', '', 'VILLEGAS', 'GUTIERREZ', 'TALENTO EN LINEA', '2006-09-25', 3, 13, 5, 2, 1, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1011102470, 'DANNA', '', 'CAMACHO', '', 'NEW GENERATION', '2006-06-06', 2, 13, 5, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1011102474, 'ZAMIRA', 'VALENTINA', 'CADENA', 'RIOS', 'NEW GENERATION', '2009-01-06', 1, 11, 4, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1011103193, 'MELANY', 'SOFIA', 'BRUGOS', 'RINCON', 'TALENTO EN LINEA', '2009-02-06', 1, 11, 4, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1011207390, 'Mar?a', 'ALEJANDRA', 'RINCON', '', 'REAL FUNZA', '2010-12-02', 2, 9, 3, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1011213017, 'Alison', 'Valentina', 'correal', 'Dom?nguez', 'TALENTO EN LINEA', '2011-08-31', 2, 8, 2, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1011213897, 'juaquin', '', 'pinilla', 'mu?os', 'TALENTO EN LINEA', '2011-10-03', 2, 8, 2, 2, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1011322214, 'ELIZABETH', '', 'SANCHEZ', 'BRAVO', 'TALENTO EN LINEA', '2006-03-30', 3, 14, 5, 1, 1, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1012917120, 'KAROL', 'TATIANA', 'VEGA', 'MARTINEZ', 'TALENTO EN LINEA', '2006-05-08', 1, 14, 5, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1013011276, 'LAURA', '', 'ROJAS', 'ZAPATA', 'TALENTO EN LINEA', '2011-05-03', 3, 9, 3, 1, 1, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1013102838, 'SARA', '', 'RAMIREZ', 'VANEGAS', 'TALENTO EN LINEA', '1999-03-04', 2, 21, 6, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1013103234, 'DANNIA', 'LISETH', 'CESPEDES', 'PATI?O', 'REAL FUNZA', '2004-12-20', 3, 15, 6, 1, 1, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1013105084, 'SAMARA', '', 'ORTIZ', 'CORTES', 'BIG SKATERS', '2005-07-07', 2, 14, 5, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-08-16', 4),
(2, 1013120819, 'DANNA', '', 'RUIZ', '', 'CPF FUSAGASUGA', '2008-03-31', 3, 12, 4, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1013121699, 'ANNY', '', 'NI?O', '', 'CPF FUSAGASUGA', '2008-05-30', 2, 12, 4, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1013122089, 'sara', 'nicol', 'villareal', 'Rodr?guez', 'REAL FUNZA', '2008-07-05', 2, 12, 4, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1013258654, 'LILY', 'FERNANDA', 'CELY', 'ROJAS', 'Club JGB', '2004-12-26', 3, 15, 6, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1013260730, 'David', 'Augusto', 'meguia', 'hoyos', 'REAL FUNZA', '2006-01-02', 2, 14, 5, 2, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1013260938, 'YINETHss', 'JULIANA', 'HUERTAS', 'CASTRO', 'IEDAN', '2006-01-13', 2, 14, 5, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1013268489, 'JUAN', 'MANUEL', 'PERUGACHI', 'SALINAS', 'TALENTO EN LINEA', '2008-10-24', 2, 11, 4, 2, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1013582060, 'LENNY', 'ALEJANDRO', 'GONZALEZ', 'MORA', 'NEW GENERATION', '2004-09-17', 2, 15, 6, 2, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1013596355, 'VALERY', 'CAMILA', 'BERNAL', 'MALLORGA', 'TALENTO EN LINEA', '2006-05-08', 3, 14, 5, 1, 1, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1014661459, 'KAREN', 'DAIANA', 'BOCIGA', 'VEGA', 'TALENTO EN LINEA', '2006-01-07', 3, 14, 5, 1, 1, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1014663368, 'MARIA', 'ESTEFANIA', 'FIGUEROA', '', 'REAL FUNZA', '2005-09-22', 3, 14, 5, 1, 1, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1014670503, 'LAURA', 'SOFIA', 'CALDERON', 'POVEDA', 'TALENTO EN LINEA', '2009-01-19', 1, 11, 4, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1014672307, 'SANTIAGO', 'RIVEROS', 'OLIVEROS', '', 'NEW GENERATION', '2009-11-27', 1, 10, 3, 2, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1014736635, 'MARIA', 'JULIANA', 'HUESO', 'RAMIREZ', 'TALENTO EN LINEA', '2004-03-25', 2, 16, 6, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1014739991, 'ISABELLA', '', 'ALDANA', 'VELASQUEZ', 'CITIUS COTA', '2008-10-04', 2, 11, 4, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1014862182, 'ANGIE', 'NICOLLE', 'ROJAS', 'BONILLA', 'ECOPATIN', '2006-07-18', 2, 13, 5, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1014863772, 'JUAN', 'DAVID', 'GARRIDO', 'CASTIBLANCO', 'AR SKATING', '2007-11-27', 1, 12, 4, 2, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1014874685, 'LAURA', 'CAMILA', 'CORZO', 'SANCHES', 'CITIUS COTA', '2009-12-31', 2, 10, 3, 1, 1, 25, '2020-05-12', '2020-05-29', '2020-05-06', '2020-05-06', 1),
(2, 1014876720, 'MANUELA', '', 'PRIETO', 'VAQUIRO', 'IEDAN', '2010-03-31', 3, 10, 3, 1, 1, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-08-16', 4),
(2, 1014880212, 'ANTONIA', '', 'CALDERON', 'JEREZ', 'IEDAN', '2011-09-20', 1, 8, 2, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1014976040, 'KAREN', 'VALERIA', 'GIRALDO', 'MONTERO', 'AR SKATING', '2003-03-12', 1, 17, 6, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1014979164, 'VALENTINA', '', 'MORENO', 'BARRETO', 'BIG SKATERS', '2005-11-21', 1, 14, 5, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1016006843, 'Paula', 'Tatiana', 'Avenda?o', 'estrada', 'REAL FUNZA', '2005-11-27', 2, 14, 5, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1016042324, 'estefani', 'Dayana', 'Ar?valo', 'L?pez', 'TALENTO EN LINEA', '2010-02-06', 3, 10, 3, 1, 1, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1016592458, 'DENIS', 'NAYARA', 'MILLAN', 'VANEGAS', 'TALENTO EN LINEA', '2004-02-28', 3, 16, 6, 1, 1, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1016714687, 'DIANA', 'ISABEL', 'RODRIGUEZ', 'PINTO', 'TALENTO EN LINEA', '2006-08-06', 1, 13, 5, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1016717117, 'SAMANTHA', '', 'DELGADO', 'NIETO', 'AR SKATING', '2007-11-20', 3, 12, 4, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1016717903, 'LAURA', 'SOFIA', 'MORENO', 'GUERRERO', 'REAL FUNZA', '2008-09-19', 1, 11, 4, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1016720303, 'SHARON', 'SOFIA', 'ALBA', 'FORIGUA', 'TALENTO EN LINEA', '2010-02-09', 2, 10, 3, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1016833908, 'ANA', 'MARIA', 'FORERO', 'ALDANA', 'CITIUS COTA', '2006-04-05', 1, 14, 5, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1016834964, 'mariana', 'Osorio', 'Zambrano', '', 'TALENTO EN LINEA', '2008-10-11', 2, 11, 4, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1016835575, 'juan', 'pablo', 'osorio', 'Zambrano', 'TALENTO EN LINEA', '2011-06-15', 1, 9, 3, 2, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1018408923, 'LUISA', 'FERNANDA', 'MENDOZA', '', 'NEW GENERATION', '2005-02-11', 1, 15, 6, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1019022928, 'SAMYR', 'LEONARDO', 'ROSAS', 'VILLAMIL', 'AR SKATING', '2001-05-01', 2, 19, 6, 2, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1019082257, 'MARIANA', '', 'TOVAR', 'OSORIO', 'NEW GENERATION', '2011-04-19', 2, 9, 3, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1019762854, 'ANNY', 'SOFIA', 'TORRES', 'LEON', 'TALENTO EN LINEA', '2005-06-26', 2, 15, 6, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1019994075, 'MARIA', 'ALEJANDRA', 'LOPEZ', 'RAMIREZ', 'CITIUS COTA', '2008-03-18', 3, 12, 4, 1, 1, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1020734344, 'PAULA', 'ESTEFANIA', 'CUERVO', 'CARDENAS', 'NEW GENERATION', '2006-08-06', 2, 13, 5, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1021312950, 'KAREN', 'DANIELA', 'MONCADA', 'QUIMBAYO', 'TALENTO EN LINEA', '2005-04-11', 2, 15, 6, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1021315009, 'DANA', 'KAROLINA', 'CUERVO', 'CORTES', 'TALENTO EN LINEA', '2009-04-26', 1, 11, 4, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1021396139, 'BRIAN', 'SEBASTIAN', 'PRIETO', 'MORENO', 'IEDAN', '2002-02-17', 3, 18, 6, 2, 1, 25, '2016-07-07', '2019-08-07', '2020-05-06', '2020-05-06', 1),
(2, 1021513060, 'ISABELLA', '', 'ALARCON', 'CHAVES', 'CITIUS COTA', '2007-07-23', 2, 13, 5, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-08-16', 4),
(2, 1021634361, 'MANUELLA', '', 'ESTUPI?AN', 'MARTINEZ', 'AR SKATING', '2007-01-22', 3, 13, 5, 1, 1, 25, '2020-08-05', '2020-08-06', '2020-05-06', '2020-05-06', 1),
(2, 1022384407, 'MIGUEL', 'ANGEL', 'LARA', 'ZARATE', 'TALENTO EN LINEA', '2011-06-11', 3, 9, 3, 2, 1, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1022928126, 'JULIAN', 'YESID', 'BUITRAGO', 'PINCHAO', 'TALENTO EN LINEA', '2004-09-06', 1, 15, 6, 2, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1022930058, 'SARAI', 'JULIANA', 'CARRE?O', 'PATI?O', 'REAL FUNZA', '2004-11-07', 2, 15, 6, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1022983828, 'JARITH', 'FERNANDA', 'CARRE?O', 'PATI?O', 'IEDAN', '2011-02-11', 2, 9, 3, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1023085010, 'ANGELA', 'MARIA', 'DIAZ', 'MONTAÑA', 'AR SKATING', '2009-03-13', 2, 11, 4, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1023085012, 'ANGELA', 'MARIA', 'DIAZ', 'MONTA?A', 'ECOPATIN', '2009-03-13', 2, 11, 4, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1023165656, 'DIEGO', 'ALEJANDRO', 'LOZANO', 'CASTA?EDA', 'NEW GENERATION', '2010-03-16', 2, 10, 3, 2, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1023373508, 'LUISA', 'FERNANDA', 'PARDO', '', 'NEW GENERATION', '2006-10-03', 1, 13, 5, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1023373831, 'PAULA', 'ANDREA', 'SANTAMARIA', 'SANCHEZ', 'TALENTO EN LINEA', '2006-11-02', 2, 13, 5, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1023380853, 'MICHELL', 'SAMANTHA', 'MU?OZ?', '', 'TALENTO EN LINEA', '2008-07-31', 2, 11, 4, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1023391767, 'SARA', 'LUCIA', 'ALFONSO', 'REAL', 'TALENTO EN LINEA', '2011-02-07', 2, 9, 3, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1023404311, 'ASHLEE', 'KAROLAIN', 'MONTERO', 'NARANJO', 'TALENTO EN LINEA', '2006-06-18', 1, 14, 5, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1023783662, 'SEBASTIAN', '', 'CELY', 'ROJAS', 'ECOPATIN', '2007-07-16', 1, 12, 4, 2, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1024401789, 'NICOLL', 'STEFANNY', 'RINCON', 'LEON', 'TALENTO EN LINEA', '2004-03-09', 3, 16, 6, 1, 1, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1024465476, 'MICHELL', 'NATHALIA', 'PORTILLO', 'VARGAS', 'TALENTO EN LINEA', '2004-05-20', 1, 16, 6, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1025064099, 'JUAN', 'MIGUEL', 'DELGADO', 'BAQUERO', 'NEW GENERATION', '2009-02-24', 1, 11, 4, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1025065780, 'HENRY', '', 'LOPEZ', '', 'CPF FUSAGASUGA', '2010-03-02', 3, 10, 3, 2, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1025143187, 'JUAN', 'ANDRES', 'RAMIREZ', 'GALVIS', 'NEW GENERATION', '2007-11-12', 3, 12, 4, 2, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1025143332, 'PAULA', 'CAMILA', 'CULMA', 'CONTRERAS', 'TALENTO EN LINEA', '2007-11-25', 3, 12, 4, 1, 1, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1025460749, 'MARIA', 'CAMILA', 'HIGUERA', 'RAMIREZ', 'TALENTO EN LINEA', '2004-06-11', 1, 16, 6, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1025527554, 'ANA', 'MARIA', 'CASTA?EDA', 'CASTA?O', 'BIG SKATERS', '2005-11-09', 1, 14, 5, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-08-16', 4),
(2, 1025532910, 'CAROLINA', '', 'MORA', 'MORENO', 'TALENTO EN LINEA', '2007-01-03', 2, 13, 5, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1025537881, 'JOSE', 'LUIS', 'TAUTAS', 'PATI?O', 'TALENTO EN LINEA', '2008-02-21', 3, 12, 4, 2, 1, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1025540817, 'laura', 'nicol', 'pinto', 'Rodr?guez', 'TALENTO EN LINEA', '2009-01-12', 1, 11, 4, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1025540913, 'NICOLLE', 'MARIANA', 'CASTILLO', 'GOMEZ', 'TALENTO EN LINEA', '2009-01-18', 1, 11, 4, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1025703882, 'Michelle', 'estefani', 'mayorquin', 'Rubiano', 'TALENTO EN LINEA', '2004-10-20', 3, 15, 6, 1, 1, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1027626524, 'JUAN', 'FELIPE', 'TELLES', '', 'REAL FUNZA', '2006-05-13', 1, 14, 5, 2, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1028483507, 'ELIANA', '', 'GOMEZ', 'CA?ON', 'Club JGB', '2007-02-11', 1, 13, 5, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1028485738, 'JENIFER', 'CATALINA', 'MARTINEZ', 'MU?OZ', 'TALENTO EN LINEA', '2007-11-13', 1, 12, 4, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1028486258, 'LAURA', 'VALENTINA', 'ROMERO', 'TOVAR', 'IEDAN', '2008-01-11', 2, 12, 4, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1028487025, 'MARIA', 'PAULA', 'PEDRAZA', 'SUAREZ', 'NEW GENERATION', '2008-04-05', 2, 12, 4, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1028487211, 'VERONICA', '', 'GOMEZ', 'CA?ON', 'TALENTO EN LINEA', '2007-04-29', 3, 13, 5, 1, 1, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1028492959, 'mariana', 'Alejandra', 'Rodr?guez', 'Duarte', 'TALENTO EN LINEA', '2010-06-04', 2, 10, 3, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1028494337, 'ISABEL', 'SOFIA', 'AREVALO', 'CASTA?EDA', 'ECOPATIN', '2010-11-07', 1, 9, 3, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1028495132, 'GABRIEL', '', 'TELLES', '', 'REAL FUNZA', '2011-04-04', 3, 9, 3, 2, 1, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1028840498, 'LAURA', 'SOFIA', 'MURCIA', 'HERNANDEZ', 'TALENTO EN LINEA', '2007-05-28', 1, 13, 5, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1028840499, 'ASHLY', 'JULIANA', 'MURCIA', 'HERNANDEZ', 'TALENTO EN LINEA', '2007-05-28', 3, 13, 5, 1, 1, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1028842320, 'MARIA', 'FERNANDA', 'CALDERON', 'RUBIANO', 'TALENTO EN LINEA', '2010-02-28', 1, 10, 3, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1028861317, 'martin', '', 'nieto', 'rojas', 'REAL FUNZA', '2007-10-10', 3, 12, 4, 2, 1, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1028861957, 'DANA', 'VALENTINA', 'LEAL', 'SOTO', 'TALENTO EN LINEA', '2006-12-20', 1, 13, 5, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1028865409, 'ana', 'sofia', 'Vargas', 'Cristancho', 'TALENTO EN LINEA', '2008-06-01', 1, 12, 4, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1028865595, 'ANGELA', '', 'TIGA', 'ALBA?IL', 'TALENTO EN LINEA', '2008-07-03', 2, 12, 4, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1029142976, 'ANGELICA', 'LORENA', 'VIVAS', 'ACOSTA', 'CITIUS COTA', '2006-05-09', 2, 14, 5, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-08-16', 4),
(2, 1029145291, 'laura', 'sofia', 'diaz', 'Ord??ez', 'REAL FUNZA', '2007-10-11', 3, 12, 4, 1, 1, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1031423968, 'MARIA', 'PAZ', 'ARDILA', 'JIMENEZ', 'TALENTO EN LINEA', '2009-03-17', 3, 11, 4, 1, 1, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1031610702, 'ELYHANNA', '', 'BUITRAGO', 'CACERES', 'AR SKATING', '2008-02-11', 3, 12, 4, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1031610745, 'ELYHANNA', '', 'BUITRAGO', 'CACERES', 'ECOPATIN', '2008-02-11', 1, 12, 4, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1031651663, 'PAULA', 'ANDREA', 'CARDENAS', 'SALCEDO', 'NEW GENERATION', '2007-01-07', 3, 13, 5, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1031819670, 'MARIA', 'JOSE', 'MARTINEZ', 'FIGUEROA', 'NEW GENERATION', '2009-10-03', 3, 10, 3, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1031821947, 'SARA', 'SOFIA', 'AGUILAR', 'AYALA', 'NEW GENERATION', '2010-05-22', 3, 10, 3, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1032430132, 'PAULA', 'VALENTINA', 'GARCIA', 'VASQUEZ', 'CITIUS COTA', '2007-06-22', 3, 13, 5, 1, 1, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1032679384, 'Mar?a', 'FERNANDA', 'GALVIZ', '', 'REAL FUNZA', '2007-02-21', 3, 13, 5, 1, 1, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1032797264, 'CHRISTIAN', 'DAVID', 'CASTILLO', 'GIRAL', 'TALENTO EN LINEA', '2004-08-10', 3, 15, 6, 2, 1, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1032877341, 'LUIS', 'DAVID', 'BERNAL', 'BETTER', 'AR SKATING', '2006-07-24', 2, 13, 5, 2, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1032940186, 'MARIA', 'DANIELA', 'ORTIZ', 'ZAPATA', 'TALENTO EN LINEA', '2007-01-03', 2, 13, 5, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1032941883, 'MARIA', 'CAMILA', 'DUARTE', 'SURINCHA', 'TALENTO EN LINEA', '2008-10-24', 2, 11, 4, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1032943463, 'HANNA', 'ISABELLA', 'DIAZ', 'RODRIGUEZ', 'AR SKATING', '2011-02-19', 2, 9, 3, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1032943485, 'JUANITA', '', 'ORTIZ', 'ZAPATA', 'TALENTO EN LINEA', '2011-03-16', 1, 9, 3, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1033101148, 'SARA', 'SOFIA', 'URREGO', 'MARTINEZ', 'TALENTO EN LINEA', '2007-07-03', 1, 13, 5, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1033103385, 'LAURA', 'CAMILA', 'RODRIGUEZ', 'SALINAS', 'TALENTO EN LINEA', '2008-06-26', 1, 12, 4, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1034281792, 'Mar?a', 'FERNANDA', 'TELLES', '', 'REAL FUNZA', '2005-08-02', 2, 14, 5, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1034283726, 'SOFIA', '', 'TELLES', '', 'REAL FUNZA', '2006-03-25', 1, 14, 5, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1034398387, 'ANA', 'MARIA', 'GUINEA', 'AGUILERA', 'TALENTO EN LINEA', '2005-05-26', 2, 15, 6, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1034401495, 'SARA', 'VANESSA', 'DIAZ', 'BALAGUERA', 'Club JGB', '2008-04-22', 2, 12, 4, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1034517530, 'MARIANA', '', 'NI?O', 'GRECCO', 'Club JGB', '2006-11-01', 3, 13, 5, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1034518758, 'SANTIAGO', '', 'MENDOZA', 'PUENTES', 'AR SKATING', '2008-01-09', 2, 12, 4, 2, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1034518759, 'SANTIAGO', '', 'MENDOZA', 'PUENTES', 'ECOPATIN', '2008-01-09', 3, 12, 4, 2, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1034520774, 'VALERIA', '', 'NI?O', 'GRECCO', 'Club JGB', '2009-12-18', 1, 10, 3, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1034577415, 'KAROL', 'MARIANA', 'MU?OZ', 'GIRALDO', 'TALENTO EN LINEA', '2007-08-02', 2, 12, 4, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1034657219, 'SOFIA', 'ALEJANDRA', 'RODRIGUEZ', 'RODRIGUEZ', 'REAL FUNZA', '2004-07-28', 1, 15, 6, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1034658678, 'PAULA', 'SOFIA', 'MADRID', 'CUERVO', 'NEW GENERATION', '2005-06-21', 1, 14, 5, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-08-16', 4),
(2, 1034662497, 'luciana', 'Hern?ndez', 'ilarion', '', 'TALENTO EN LINEA', '2008-03-27', 2, 12, 4, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1034662721, 'MARIA', 'ALEJANDRA', 'ROMERO', 'RAMIREZ', 'CITIUS COTA', '2008-05-18', 1, 12, 4, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1034664768, 'valeria', '', 'delgado', 'aldana', 'REAL FUNZA', '2009-09-13', 1, 10, 3, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1034664918, 'CAMILA', 'ALEJANDRA', 'MADRID', 'CUERVO', 'NEW GENERATION', '2009-10-17', 3, 10, 3, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1034779459, 'angie', 'Juliana', 'rosos', 'gallo', 'REAL FUNZA', '2006-04-17', 1, 14, 5, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1044618905, 'HELLEN', 'DEL/CARMEN', 'GUTIERREZ', '', 'TALENTO EN LINEA', '2004-09-19', 1, 15, 6, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1051069079, 'LAURA', 'CAMILA', 'PARDO', 'MALAGON', 'NEW GENERATION', '2003-11-10', 3, 16, 6, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-08-16', 4),
(2, 1058138501, 'MARIA', 'CAMILA', 'GALLEGO', 'OROZCO', 'TALENTO EN LINEA', '2005-08-28', 2, 14, 5, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1066868012, 'EMILY', 'ZARAY', 'SANCHEZ', 'ROCHA', 'TALENTO EN LINEA', '2009-12-17', 3, 10, 3, 1, 1, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1069178077, 'CAMILO', '', 'DIAZ', 'JUAN', 'TALENTO EN LINEA', '1996-04-22', 3, 24, 6, 2, 1, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1069643709, 'MARIA', 'FERNANDA', 'RODRIGUEZ', 'LOPEZ', 'IEDAN', '2007-09-26', 1, 12, 4, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1069644048, 'LAURA', 'VALENTINA', 'PALACIOS', 'ROMERO', 'IEDAN', '2008-02-09', 3, 12, 4, 1, 1, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1070328823, 'KAROL', '', 'MONTENEGRO', '', 'CPF FUSAGASUGA', '2010-06-29', 1, 10, 3, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1070388646, 'angel', 'samuel', 'acosta', 'Garc?a', 'TALENTO EN LINEA', '2007-09-15', 1, 12, 4, 2, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1070392328, 'AYLIN', 'STEPHANIE', 'ANGEL', 'PALACIOS', 'IEDAN', '2010-01-20', 3, 10, 3, 1, 1, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1070394438, 'linda', 'salome', 'cortes', 'Sop?', 'TALENTO EN LINEA', '2011-08-25', 1, 8, 2, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1070599564, 'MICHELL', '', 'GONZALEZ', 'AREVALO', 'REAL FUNZA', '2008-01-05', 1, 12, 4, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1070609213, 'YUSTIN', 'SARAY', 'RIOS', 'SUAREZ', 'TALENTO EN LINEA', '2011-03-09', 1, 9, 3, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1070706445, 'SOL', 'YINETH', 'MOYANO', 'HERNANDEZ', 'AR SKATING', '2010-01-23', 3, 10, 3, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1070958268, 'DANIELA', 'SIERRA', 'PINTO', '', 'CPF FUSAGASUGA', '2008-05-08', 2, 12, 4, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1071328321, 'NICOLLE', 'ADAMARYS', 'RODRIGUEZ', 'ESTEVEZ', 'ECOPATIN', '2005-01-24', 1, 15, 6, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1071328354, 'JUAN', 'GUILLERMO', 'MAMANCHE', 'MOCENTON', 'IEDAN', '2005-03-09', 3, 15, 6, 2, 1, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1071329231, 'NICOL', 'FERNANDA', 'GONZALEZ', 'GARZON', 'ECOPATIN', '2008-01-26', 1, 12, 4, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1071329830, 'BRIAM', 'DAVID', 'MAMANCHE', 'MOCETON', 'IEDAN', '2009-12-10', 1, 10, 3, 2, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1072098423, 'KATERIN', '', 'CASTRO', 'MARROQUIN', 'NEW GENERATION', '2004-11-03', 3, 15, 6, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1072100505, 'DAYANA', '', 'ESPA?A', 'BETANCOURT', 'TALENTO EN LINEA', '2008-02-08', 3, 12, 4, 1, 1, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1072104529, 'SEBASTIAN', '', 'MANTILLA', 'PERDOMO', 'NEW GENERATION', '2010-11-04', 2, 9, 3, 2, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1072106040, 'SHAYRA', '', 'ESPA?A', 'BETANCOURT', 'TALENTO EN LINEA', '2011-10-03', 2, 8, 2, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1072191624, 'LUISA', 'FERNANDA', 'RODRIGUEZ', 'PAEZ', 'TALENTO EN LINEA', '2008-11-15', 3, 11, 4, 1, 1, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1072644568, 'STEFHANY', '', 'JUZGA', 'GUERRERO', 'ECOPATIN', '2005-08-27', 2, 14, 5, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1072644595, 'MARIA', 'ALEJANDRA', 'PINILLA', 'ROZO', 'TALENTO EN LINEA', '2005-08-26', 3, 14, 5, 1, 1, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1072655401, 'BRAD', 'NAJIB', 'PRIETO', 'MORENO', 'IEDAN', '2008-01-25', 2, 12, 4, 2, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1072657535, 'SOFIA', '', 'ORJUELA', 'BARRETO', 'IEDAN', '2008-07-29', 1, 12, 4, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1072658958, 'DANNA', 'SOFIA', 'ALFONSO', 'SUAREZ', 'TALENTO EN LINEA', '2008-12-12', 3, 11, 4, 1, 1, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1072666026, 'ISABELLA', '', 'ACOSTA', 'ALFONSO', 'ECOPATIN', '2010-08-18', 2, 9, 3, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1073234436, 'Alison', 'Dayana', 'gacharna', 'nieto', 'TALENTO EN LINEA', '2007-04-28', 1, 13, 5, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1073483508, 'JERONIMO', '', 'GONZALEZ', 'PARRA', 'TALENTO EN LINEA', '2010-10-03', 2, 9, 3, 2, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1073515948, 'SANDRA', 'MILENA', 'RINCON', '', 'AR SKATING', '1994-12-27', 2, 25, 6, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1073578093, 'David', 'Santiago', 'duarte', 'Bermeo', 'TALENTO EN LINEA', '2009-01-28', 3, 11, 4, 2, 1, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1073578159, 'juanita', 'sofia', 'Bol?var', 'Venegas', 'TALENTO EN LINEA', '2011-01-07', 3, 9, 3, 1, 1, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1073676830, 'RAMIREZ', 'RODRIGUEZ', 'JUAN', 'SEBASTIAN?', 'NEW GENERATION', '2006-07-07', 3, 13, 5, 2, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1074344969, 'sharick', 'Michelle', 'Gonz?lez', 'chabedra', 'TALENTO EN LINEA', '2009-03-31', 1, 11, 4, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1074810388, 'MAGDA', 'JULIANA', 'CASTA?EDA', '', 'NEW GENERATION', '2006-01-06', 2, 14, 5, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1075657114, 'NATALIE', '', 'RICO', 'MAHECHA', 'Club JGB', '2006-12-03', 1, 13, 5, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1075663864, 'PAULA', 'VALENTINA', 'HERRERA', 'ROJAS', 'TALENTO EN LINEA', '2009-05-29', 3, 11, 4, 1, 1, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1075668080, 'LUISA', 'VALERIA', 'JIMENEZ', 'SANDOVAL', 'ECOPATIN', '2010-11-23', 3, 9, 3, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1075870775, 'MARIA', 'CAMILA', 'CUCHA', 'ARISMENDY', 'TALENTO EN LINEA', '2005-04-26', 1, 15, 6, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1075871441, 'ANA', 'VALERIA', 'SARMIENTO', 'TELLEZ', 'COLSKATER', '2006-08-09', 2, 13, 5, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1075872074, 'LUISA', 'FERNANDA', 'TORRES', 'MORALES', 'Club JGB', '2007-10-07', 2, 12, 4, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1075872344, 'SCHARICK', 'VANESSA', 'SANTOS', 'ALMANZA', 'Club JGB', '2008-03-09', 3, 12, 4, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1075873140, 'NATALIA', '', 'ACERO', 'SARMIENTO', 'TALENTO EN LINEA', '2009-09-13', 2, 10, 3, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1076242675, 'DANNA', 'VALENTINA', 'PRIETO', 'SIATOYA', 'COLSKATER', '2006-05-13', 3, 14, 5, 1, 1, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1076646760, 'KAROL', 'DANIELA', 'BALLESTEROS', '', 'Club JGB', '2004-05-30', 1, 15, 6, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1076648654, 'VALENTINA', '', 'GOMEZ', 'BALLEN', 'Club JGB', '2005-06-04', 2, 14, 5, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1076649358, 'MARIA', 'ALEJANDRA', 'PAEZ', 'ALONSO', 'Club JGB', '2005-09-27', 3, 14, 5, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1076651239, 'DAYANA', '', 'ROCHA', 'LOPEZ', 'ECOPATIN', '2006-10-18', 3, 13, 5, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1076652122, 'DANNA', '', 'CARRILLO', 'HERNANDEZ', 'ECOPATIN', '2007-03-21', 2, 13, 5, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1076652612, 'MARIA', 'ALEJANDRA', 'VARELA', '', 'Club JGB', '2007-07-19', 2, 12, 4, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1076652957, 'ANDREA', '', 'CASTRO', 'GARCIA', 'ECOPATIN', '2007-09-12', 1, 12, 4, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1076654313, 'TATIANA', '', 'RABA', 'PACHON', 'NEW GENERATION', '2008-06-06', 1, 11, 4, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1076656027, 'JOEL', 'STEBAN', 'OROSCO', 'INFANTE', 'Club JGB', '2009-06-17', 1, 10, 3, 2, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1076736048, 'MARIA', 'PAULA', 'RODRIGUEZ', 'CRUZ', 'COLSKATER', '2003-12-28', 1, 16, 6, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1076736394, 'MELANIE', 'JULIETH', 'GARZON', 'CASTRO', 'ECOPATIN', '2004-05-15', 3, 16, 6, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1076740612, 'SALMA', 'SARAY', 'PIRASAN', 'CORTES', 'ECOPATIN', '2008-03-31', 3, 12, 4, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1077112032, 'KAROL', 'DAYANNA', 'INFANTE', '', 'IEDAN', '2003-12-17', 3, 16, 6, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1077112198, 'JULIANA', '', 'CALDERON', 'PATI?O', 'Club JGB', '2004-07-16', 3, 15, 6, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1077112529, 'MARIA', 'JOSE', 'CONTRERAS', '', 'Club JGB', '2005-09-05', 1, 14, 5, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1077113202, 'NIKOL', 'CAMILA', 'DELGADO', '', 'Club JGB', '2007-05-02', 3, 13, 5, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1077113374, 'ALYSON', '', 'CALDERON', 'PATI?O', 'ECOPATIN', '2007-11-03', 2, 12, 4, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1077114398, 'LIZETH', 'NATALIA', 'DELGADO', '', 'IEDAN', '2009-12-29', 3, 10, 3, 1, 1, 25, '2020-07-02', '2020-07-09', '2020-05-06', '2020-05-06', 1),
(2, 1077340170, 'ANDREA', '', 'CORTEZ', 'HERNANDEZ', 'Club JGB', '2005-05-15', 2, 15, 6, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1077340450, 'SOFIA', '', 'NIETO', 'GOMEZ', 'Club JGB', '2007-08-03', 1, 12, 4, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1077340460, 'LIZETH', 'MARIANA', 'INFANTES', '', 'IEDAN', '2007-09-07', 2, 12, 4, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1077920473, 'JUAN', 'DAVID', 'GONZALEZ', '', 'COLSKATER', '2008-06-13', 2, 12, 4, 2, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1092460821, 'juan', 'felipe', 'Bernal', 'Velandia', 'TALENTO EN LINEA', '2010-05-24', 3, 10, 3, 2, 1, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1107974783, 'Brenda', 'juliana', 'vega', 'mantilla', 'REAL FUNZA', '2004-06-30', 3, 16, 6, 1, 1, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1110370310, 'JUAN', 'SEBASTIAN', 'FUENTES', 'TASCON', 'AR SKATING', '2008-10-14', 1, 11, 4, 2, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1110370311, 'JUAN', 'SEBASTIAN', 'FUENTES', 'TASCON', 'ECOPATIN', '2008-10-14', 2, 11, 4, 2, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1127586875, 'ISABEL', '', 'OCHOA', 'BELTRAN', 'AR SKATING', '2008-06-02', 2, 11, 4, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1127586877, 'ISABEL', '', 'OCHOA', 'BELTRAN', 'ECOPATIN', '2008-06-02', 3, 11, 4, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1140922124, 'MARIA', 'JOSE', 'MERCHAN', 'GONZALEZ', 'TALENTO EN LINEA', '2010-04-10', 2, 10, 3, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1141117120, 'ana', 'lucia', 'pinilla', 'Mu?oz', 'TALENTO EN LINEA', '2008-02-08', 3, 12, 4, 1, 1, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1141117420, 'LAURA', 'ALEJANDRA', 'CHOACHI', 'GUEVARA', 'ECOPATIN', '2008-04-01', 1, 12, 4, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1141117422, 'CHOACHI', 'GUEVARA', 'LAURA', 'ALEJANDRA', 'AR SKATING', '2008-04-01', 3, 12, 4, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1141122490, 'sara', 'Gabriela', 'pint?', 'Bernal', 'TALENTO EN LINEA', '2010-08-03', 2, 9, 3, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1141320902, 'TANIA', 'SOFIA', 'RINCON', 'LOZADA', 'CPF FUSAGASUGA', '2008-06-12', 1, 12, 4, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1171963141, 'BRANDON', 'STIVENN', 'MAYORGA', 'GARZON', 'NEW GENERATION', '2010-03-12', 3, 10, 3, 2, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1188213507, 'SARAH', '', 'RODRIGUEZ', 'MUNEVAR', 'AR SKATING', '2010-05-27', 1, 10, 3, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 2),
(2, 1192792199, 'ALEJANDRO', '', 'CARDONA', 'JUAN', 'TALENTO EN LINEA', '2001-06-22', 3, 19, 6, 2, 1, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1193556533, 'KAROLL', 'TATIANA', 'GARZON', 'CASTRO', 'ECOPATIN', '2001-04-06', 2, 19, 6, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 1220213080, '?ngel', 'Santiago', 'Garc?a', 'Gim?nez', 'TALENTO EN LINEA', '2011-04-26', 3, 9, 3, 2, 1, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 2342234511, 'dhbhsdf', 'jksfhsd', 'skjnjcsd', 'kjsnjs', 'IEDAN', '2013-07-03', 2, 7, 2, 2, 2, 25, NULL, NULL, '2020-07-14', '2020-07-14', 1),
(2, 2342234545, 'jhdgsh', 'jksdjskb', 'kjdhb', 'jhbchjdb', 'IEDAN', '2013-07-03', 2, 7, 2, 1, 2, 25, NULL, NULL, '2020-07-14', '2020-07-14', 1),
(2, 2387463766, 'jdhj', 'kjdsj', 'kjhsfb', 'kjhjd', 'IEDAN', '2013-07-03', 2, 7, 2, 1, 2, 25, NULL, NULL, '2020-07-14', '2020-07-14', 1),
(2, 2398462412, 'leidy', '', 'dsvdfbf', 'vdfbfdvbf', 'CITIUS COTA', '2013-08-07', 1, 7, 2, 1, 2, 25, NULL, NULL, '2020-08-13', '2020-08-13', 1),
(3, 2736275263, 'vdfved', 'fdkbvdh', 'jndj', 'jdnjd', 'IEDAN', '2002-07-04', 2, 18, 6, 1, 2, 25, NULL, NULL, '2020-07-14', '2020-07-14', 1),
(2, 2872711123, 'kxjhsa', 'jshs', 'jsjdh', 'jdj', 'IEDAN', '2013-07-11', 2, 7, 2, 1, 2, 25, NULL, NULL, '2020-07-14', '2020-07-14', 1),
(2, 3423534524, 'vdg', 'gffg', 'bgfbfgbfg', 'bfgbfgbfg', 'IEDAN', '2013-04-11', 1, 7, 2, 1, 2, 25, NULL, NULL, '2020-08-16', '2020-08-16', 1),
(3, 3435346456, 'csdcsdcsd', 'cdscsdc', 'cdscsd', 'cdscdsc', 'IEDAN', '2002-08-02', 2, 18, 6, 1, 2, 25, NULL, NULL, '2020-08-16', '2020-08-16', 1),
(3, 3454564556, 'xcxzzcszxv', 'vxcvdvd', 'vcsdvdv', 'vsdvdfv', 'IEDAN', '2002-08-09', 2, 18, 6, 1, 2, 25, NULL, NULL, '2020-08-13', '2020-08-13', 1),
(2, 3454654565, 'bgbf', 'bfgbfg', 'mjmhjm', 'mjmhj', 'CITIUS COTA', '2013-08-01', 1, 7, 2, 1, 2, 25, NULL, NULL, '2020-08-13', '2020-08-13', 1),
(3, 3627777111, 'nmbcdsn', 'nbsndsb', 'nsbsd', 'nsnsd', 'IEDAN', '2000-06-13', 3, 20, 6, 1, 2, 25, NULL, NULL, '2020-07-17', '2020-07-17', 1),
(3, 5464365756, 'gdfgfvbf', 'bfgng', 'ngngh', 'nghngh', 'IEDAN', '2002-08-02', 1, 18, 6, 1, 2, 25, NULL, NULL, '2020-08-16', '2020-08-16', 1),
(2, 8273643263, 'jcbvbsdhg', 'kjshs', 'jhdsgyh', 'kjdhj', 'IEDAN', '2013-07-12', 2, 7, 2, 1, 2, 25, NULL, NULL, '2020-07-14', '2020-07-14', 1),
(3, 23784623526, 'vdfvdf', 'Andres', 'Ruiz', 'vdfvfdvd', 'CITIUS COTA', '2002-08-01', 3, 18, 6, 1, 1, 25, '2020-08-05', '2020-08-11', '2020-08-13', '2020-08-13', 1),
(2, 23984624123, 'leidy', 'cdcds', 'sdcsdc', 'csdcsdc', 'CITIUS COTA', '2007-11-15', 1, 12, 4, 1, 2, 25, NULL, NULL, '2020-08-13', '2020-08-13', 1),
(2, 29837483240, 'cdsvfsdv', 'vcdvzd', 'csdvsdv', 'vdvsd', 'CITIUS COTA', '2013-08-02', 2, 7, 2, 2, 2, 25, NULL, NULL, '2020-08-13', '2020-08-13', 1),
(2, 37662324762, 'hdshsdg', 'kjbfchjbd', 'jbdhb', 'kjbdhj', 'IEDAN', '2013-07-10', 1, 7, 2, 1, 2, 25, NULL, NULL, '2020-07-14', '2020-07-14', 1),
(2, 98110910754, 'TANIA', 'ALEJANDRA', 'PINZON', '', 'AR SKATING', '1998-11-09', 1, 21, 6, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 99072606228, 'nicolas', '', 'palacio', 'Escobar', 'REAL FUNZA', '1999-07-26', 1, 20, 6, 2, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 99091401610, 'CLAUDIA', 'NATALIA', 'GUERRERO', 'GARZON', 'TALENTO EN LINEA', '1999-09-14', 3, 20, 6, 1, 1, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1),
(2, 99100300032, 'INGRID', 'VALENTINA', 'MENDOZA', 'VILLAMIZAR', 'TALENTO EN LINEA', '1999-10-03', 1, 20, 6, 1, 2, 25, '0000-00-00', '0000-00-00', '2020-05-06', '2020-05-06', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `ID` int(11) NOT NULL,
  `Estado` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`ID`, `Estado`) VALUES
(1, 'Activo'),
(4, 'Baja'),
(3, 'En proceso'),
(2, 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `municipio` int(6) NOT NULL,
  `tipo_evento` varchar(20) NOT NULL,
  `fecha_activacion` date NOT NULL,
  `fecha_evento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `nombre`, `municipio`, `tipo_evento`, `fecha_activacion`, `fecha_evento`) VALUES
(1, '1er departamental de escuelas de prueba', 45, 'Escuelas', '2020-05-07', '2020-09-08'),
(2, '1er Ranking de Prueba Municipal Girardot', 372, 'Ranking', '2020-05-07', '2020-09-08'),
(3, '2do municipal de escuelas Girardot', 372, 'Escuelas', '2020-05-28', '2020-07-17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion_deportistas_eventos_escuelas`
--

CREATE TABLE `inscripcion_deportistas_eventos_escuelas` (
  `id` int(11) NOT NULL,
  `evento` varchar(100) NOT NULL,
  `club` varchar(100) NOT NULL,
  `identificacion_deportista` bigint(11) NOT NULL,
  `numero_deportista` int(11) DEFAULT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `edad` int(2) NOT NULL,
  `categoria` varchar(10) NOT NULL,
  `rama` varchar(11) NOT NULL,
  `tipo_patin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `inscripcion_deportistas_eventos_escuelas`
--

INSERT INTO `inscripcion_deportistas_eventos_escuelas` (`id`, `evento`, `club`, `identificacion_deportista`, `numero_deportista`, `nombres`, `apellidos`, `edad`, `categoria`, `rama`, `tipo_patin`) VALUES
(11, '1er departamental de escuelas de prueba', 'BIG SKATERS', 1014979164, 1, 'VALENTINA ', 'MORENO BARRETO', 14, 'E', 'Damas', 'Semiprofesional'),
(12, '1er departamental de escuelas de prueba', 'BIG SKATERS', 1013105084, 2, 'SAMARA ', 'ORTIZ CORTES', 14, 'E', 'Damas', 'Profesional No Avanzado'),
(13, '1er departamental de escuelas de prueba', 'BIG SKATERS', 1025527554, 17, 'ANA MARIA', 'CASTA?EDA CASTA?O', 14, 'E', 'Damas', 'Semiprofesional'),
(14, '1er departamental de escuelas de prueba', 'CITIUS COTA', 1014739991, 21, 'ISABELLA ', 'ALDANA VELASQUEZ', 11, 'D', 'Damas', 'Profesional No Avanzado'),
(15, '1er departamental de escuelas de prueba', 'CITIUS COTA', 1014874685, 20, 'LAURA CAMILA', 'CORZO SANCHES', 10, 'C', 'Damas', 'Semiprofesional'),
(16, '1er departamental de escuelas de prueba', 'CITIUS COTA', 1016833908, 18, 'ANA MARIA', 'FORERO ALDANA', 14, 'E', 'Damas', 'Semiprofesional'),
(17, '1er departamental de escuelas de prueba', 'CITIUS COTA', 1021513060, 19, 'ISABELLA ', 'ALARCON CHAVES', 12, 'D', 'Damas', 'Profesional No Avanzado'),
(18, '1er departamental de escuelas de prueba', 'CITIUS COTA', 1029142976, 22, 'ANGELICA LORENA', 'VIVAS ACOSTA', 13, 'E', 'Damas', 'Profesional No Avanzado'),
(19, '1er departamental de escuelas de prueba', 'CITIUS COTA', 1034662721, 23, 'MARIA ALEJANDRA', 'ROMERO RAMIREZ', 11, 'D', 'Damas', 'Semiprofesional'),
(20, '1er departamental de escuelas de prueba', 'AR SKATING', 1000460458, 16, 'NICOL XIMENA', 'FORERO ', 17, 'F', 'Damas', 'Semiprofesional'),
(21, '1er departamental de escuelas de prueba', 'AR SKATING', 1000604891, 15, 'LAURA ALEJANDRA', 'THOMAS MONROY', 19, 'F', 'Damas', 'Profesional No Avanzado'),
(22, '1er departamental de escuelas de prueba', 'AR SKATING', 1014863772, 14, 'JUAN DAVID', 'GARRIDO CASTIBLANCO', 12, 'D', 'Varones', 'Semiprofesional'),
(23, '1er departamental de escuelas de prueba', 'AR SKATING', 1014976040, 13, 'KAREN VALERIA', 'GIRALDO MONTERO', 17, 'F', 'Damas', 'Semiprofesional'),
(24, '1er departamental de escuelas de prueba', 'AR SKATING', 1019022928, 4, 'SAMYR LEONARDO', 'ROSAS VILLAMIL', 19, 'F', 'Varones', 'Profesional No Avanzado'),
(25, '1er departamental de escuelas de prueba', 'AR SKATING', 1023085010, 5, 'ANGELA MARIA', 'DIAZ MONTA?A', 11, 'D', 'Damas', 'Semiprofesional'),
(26, '1er departamental de escuelas de prueba', 'AR SKATING', 1032877341, 6, 'LUIS DAVID', 'BERNAL BETTER', 13, 'E', 'Varones', 'Profesional No Avanzado'),
(27, '1er departamental de escuelas de prueba', 'AR SKATING', 1032943463, 7, 'HANNA ISABELLA', 'DIAZ RODRIGUEZ', 9, 'C', 'Damas', 'Profesional No Avanzado'),
(28, '1er departamental de escuelas de prueba', 'AR SKATING', 1034518758, 8, 'SANTIAGO ', 'MENDOZA PUENTES', 12, 'D', 'Varones', 'Profesional No Avanzado'),
(29, '1er departamental de escuelas de prueba', 'AR SKATING', 1073515948, 3, 'SANDRA MILENA', 'RINCON ', 25, 'F', 'Damas', 'Profesional No Avanzado'),
(30, '1er departamental de escuelas de prueba', 'AR SKATING', 1110370310, 9, 'JUAN SEBASTIAN', 'FUENTES TASCON', 11, 'D', 'Varones', 'Semiprofesional'),
(31, '1er departamental de escuelas de prueba', 'AR SKATING', 1127586875, 10, 'ISABEL ', 'OCHOA BELTRAN', 11, 'D', 'Damas', 'Profesional No Avanzado'),
(32, '1er departamental de escuelas de prueba', 'AR SKATING', 1188213507, 11, 'SARAH ', 'RODRIGUEZ MUNEVAR', 9, 'C', 'Damas', 'Semiprofesional'),
(33, '1er departamental de escuelas de prueba', 'AR SKATING', 98110910754, 12, 'TANIA ALEJANDRA', 'PINZON ', 21, 'F', 'Damas', 'Semiprofesional'),
(34, '1er departamental de escuelas de prueba', 'IEDAN', 1011092871, 66, 'CAMILO ANDRES', 'CUTA VEGA', 14, 'E', 'Varones', 'Profesional No Avanzado'),
(35, '1er departamental de escuelas de prueba', 'IEDAN', 1013260938, 65, 'YINETH JULIANA', 'HUERTAS CASTRO', 14, 'E', 'Damas', 'Profesional No Avanzado'),
(36, '1er departamental de escuelas de prueba', 'IEDAN', 1014880212, 64, 'ANTONIA ', 'CALDERON JEREZ', 8, 'B', 'Damas', 'Semiprofesional'),
(37, '1er departamental de escuelas de prueba', 'IEDAN', 1022983828, 63, 'JARITH FERNANDA', 'CARRE?O PATI?O', 9, 'C', 'Damas', 'Profesional No Avanzado'),
(38, '1er departamental de escuelas de prueba', 'IEDAN', 1028486258, 68, 'LAURA VALENTINA', 'ROMERO TOVAR', 12, 'D', 'Damas', 'Profesional No Avanzado'),
(39, '1er departamental de escuelas de prueba', 'IEDAN', 1069643709, 60, 'MARIA FERNANDA', 'RODRIGUEZ LOPEZ', 12, 'D', 'Damas', 'Semiprofesional'),
(40, '1er departamental de escuelas de prueba', 'IEDAN', 1071329830, 67, 'BRIAM DAVID', 'MAMANCHE MOCETON', 10, 'C', 'Varones', 'Semiprofesional'),
(41, '1er departamental de escuelas de prueba', 'IEDAN', 1072655401, 62, 'BRAD NAJIB', 'PRIETO MORENO', 12, 'D', 'Varones', 'Profesional No Avanzado'),
(45, '1er departamental de escuelas de prueba', 'COLSKATER ', 1000714029, 43, 'MARIA JULIANA', 'SALINAS REYES', 18, 'F', 'Damas', 'Profesional No Avanzado'),
(46, '1er departamental de escuelas de prueba', 'COLSKATER ', 1003825984, 42, 'LEIDY KHATERINE', 'RAMBAO CALDERON', 16, 'F', 'Damas', 'Profesional No Avanzado'),
(47, '1er departamental de escuelas de prueba', 'COLSKATER ', 1003844970, 41, 'BIBIANA ALEXANDRA', 'NIEVES CHUNZA', 17, 'F', 'Damas', 'Semiprofesional'),
(48, '1er departamental de escuelas de prueba', 'COLSKATER ', 1075871441, 40, 'ANA VALERIA', 'SARMIENTO TELLEZ', 13, 'E', 'Damas', 'Profesional No Avanzado'),
(49, '1er departamental de escuelas de prueba', 'COLSKATER ', 1076736048, 39, 'MARIA PAULA', 'RODRIGUEZ CRUZ', 16, 'F', 'Damas', 'Semiprofesional'),
(50, '1er departamental de escuelas de prueba', 'COLSKATER ', 1077920473, 38, 'JUAN DAVID', 'GONZALEZ ', 11, 'D', 'Varones', 'Profesional No Avanzado'),
(51, '1er departamental de escuelas de prueba', 'Club JGB', 1003379371, 29, 'LIDA MARCELA', 'ESP?TIA ', 17, 'F', 'Damas', 'Profesional No Avanzado'),
(52, '1er departamental de escuelas de prueba', 'Club JGB', 1007418794, 28, 'BRITNEY ', 'MARYORGA GARZON', 16, 'F', 'Damas', 'Profesional No Avanzado'),
(53, '1er departamental de escuelas de prueba', 'Club JGB', 1028483507, 27, 'ELIANA ', 'GOMEZ CA?ON', 13, 'E', 'Damas', 'Semiprofesional'),
(54, '1er departamental de escuelas de prueba', 'Club JGB', 1034401495, 26, 'SARA VANESSA', 'DIAZ BALAGUERA', 12, 'D', 'Damas', 'Profesional No Avanzado'),
(55, '1er departamental de escuelas de prueba', 'Club JGB', 1034520774, 25, 'VALERIA ', 'NI?O GRECCO', 10, 'C', 'Damas', 'Semiprofesional'),
(56, '1er departamental de escuelas de prueba', 'Club JGB', 1075657114, 24, 'NATALIE ', 'RICO MAHECHA', 13, 'E', 'Damas', 'Semiprofesional'),
(57, '1er departamental de escuelas de prueba', 'Club JGB', 1075872074, 30, 'LUISA FERNANDA', 'TORRES MORALES', 12, 'D', 'Damas', 'Profesional No Avanzado'),
(58, '1er departamental de escuelas de prueba', 'Club JGB', 1076646760, 31, 'KAROL DANIELA', 'BALLESTEROS ', 15, 'F', 'Damas', 'Semiprofesional'),
(59, '1er departamental de escuelas de prueba', 'Club JGB', 1076648654, 32, 'VALENTINA ', 'GOMEZ BALLEN', 14, 'E', 'Damas', 'Profesional No Avanzado'),
(60, '1er departamental de escuelas de prueba', 'Club JGB', 1076652612, 33, 'MARIA ALEJANDRA', 'VARELA ', 12, 'D', 'Damas', 'Profesional No Avanzado'),
(61, '1er departamental de escuelas de prueba', 'Club JGB', 1076656027, 34, 'JOEL STEBAN', 'OROSCO INFANTE', 10, 'C', 'Varones', 'Semiprofesional'),
(62, '1er departamental de escuelas de prueba', 'Club JGB', 1077340170, 35, 'ANDREA ', 'CORTEZ HERNANDEZ', 14, 'E', 'Damas', 'Profesional No Avanzado'),
(64, '1er departamental de escuelas de prueba', 'Club JGB', 1077112529, 37, 'MARIA JOSE', 'CONTRERAS ', 14, 'E', 'Damas', 'Semiprofesional'),
(65, '1er departamental de escuelas de prueba', 'CPF FUSAGASUGA', 1000256416, 48, 'LAURA VALENTINA', 'CASTILLO GUTIERREZ', 16, 'F', 'Damas', 'Profesional No Avanzado'),
(66, '1er departamental de escuelas de prueba', 'CPF FUSAGASUGA', 1013121699, 47, 'ANNY ', 'NI?O ', 11, 'D', 'Damas', 'Profesional No Avanzado'),
(67, '1er departamental de escuelas de prueba', 'CPF FUSAGASUGA', 1070328823, 46, 'KAROL ', 'MONTENEGRO ', 9, 'C', 'Damas', 'Semiprofesional'),
(68, '1er departamental de escuelas de prueba', 'CPF FUSAGASUGA', 1070958268, 45, 'DANIELA SIERRA', 'PINTO ', 11, 'D', 'Damas', 'Profesional No Avanzado'),
(69, '1er departamental de escuelas de prueba', 'CPF FUSAGASUGA', 1141320902, 44, 'TANIA SOFIA', 'RINCON LOZADA', 11, 'D', 'Damas', 'Semiprofesional'),
(70, '1er departamental de escuelas de prueba', 'ECOPATIN', 1003587547, 59, 'NOHORA ALEJANDRA', 'JUZGA UCHUVO', 17, 'F', 'Damas', 'Semiprofesional'),
(71, '1er departamental de escuelas de prueba', 'ECOPATIN', 1014862182, 50, 'ANGIE NICOLLE', 'ROJAS BONILLA', 13, 'E', 'Damas', 'Profesional No Avanzado'),
(72, '1er departamental de escuelas de prueba', 'ECOPATIN', 1023085012, 51, 'ANGELA MARIA', 'DIAZ MONTA?A', 11, 'D', 'Damas', 'Profesional No Avanzado'),
(73, '1er departamental de escuelas de prueba', 'ECOPATIN', 1023783662, 49, 'SEBASTIAN ', 'CELY ROJAS', 12, 'D', 'Varones', 'Semiprofesional'),
(74, '1er departamental de escuelas de prueba', 'ECOPATIN', 1028494337, 52, 'ISABEL SOFIA', 'AREVALO CASTA?EDA', 9, 'C', 'Damas', 'Semiprofesional'),
(75, '1er departamental de escuelas de prueba', 'ECOPATIN', 1031610745, 53, 'ELYHANNA ', 'BUITRAGO CACERES', 12, 'D', 'Damas', 'Semiprofesional'),
(76, '1er departamental de escuelas de prueba', 'ECOPATIN', 1071328321, 54, 'NICOLLE ADAMARYS', 'RODRIGUEZ ESTEVEZ', 15, 'F', 'Damas', 'Semiprofesional'),
(77, '1er departamental de escuelas de prueba', 'ECOPATIN', 1071329231, 55, 'NICOL FERNANDA', 'GONZALEZ GARZON', 12, 'D', 'Damas', 'Semiprofesional'),
(78, '1er departamental de escuelas de prueba', 'ECOPATIN', 1072644568, 56, 'STEFHANY ', 'JUZGA GUERRERO', 14, 'E', 'Damas', 'Profesional No Avanzado'),
(79, '1er departamental de escuelas de prueba', 'ECOPATIN', 1072666026, 57, 'ISABELLA ', 'ACOSTA ALFONSO', 9, 'C', 'Damas', 'Profesional No Avanzado'),
(80, '1er departamental de escuelas de prueba', 'ECOPATIN', 1076652122, 58, 'DANNA ', 'CARRILLO HERNANDEZ', 13, 'E', 'Damas', 'Profesional No Avanzado'),
(81, '1er departamental de escuelas de prueba', 'REAL FUNZA', 1003568690, 83, 'PAULA ', 'GARCIA MOGOLLON', 16, 'F', 'Damas', 'Profesional No Avanzado'),
(82, '1er departamental de escuelas de prueba', 'REAL FUNZA', 1011207390, 82, 'Mar?a ALEJANDRA', 'RINCON ', 9, 'C', 'Damas', 'Profesional No Avanzado'),
(83, '1er departamental de escuelas de prueba', 'REAL FUNZA', 1013122089, 81, 'sara nicol', 'villareal Rodr?guez', 11, 'D', 'Damas', 'Profesional No Avanzado'),
(84, '1er departamental de escuelas de prueba', 'REAL FUNZA', 1013260730, 80, 'David Augusto', 'meguia hoyos', 14, 'E', 'Varones', 'Profesional No Avanzado'),
(85, '1er departamental de escuelas de prueba', 'REAL FUNZA', 1016006843, 79, 'Paula Tatiana', 'Avenda?o estrada', 14, 'E', 'Damas', 'Profesional No Avanzado'),
(86, '1er departamental de escuelas de prueba', 'REAL FUNZA', 1016717903, 78, 'LAURA SOFIA', 'MORENO GUERRERO', 11, 'D', 'Damas', 'Semiprofesional'),
(87, '1er departamental de escuelas de prueba', 'REAL FUNZA', 1022930058, 77, 'SARAI JULIANA', 'CARRE?O PATI?O', 15, 'F', 'Damas', 'Profesional No Avanzado'),
(88, '1er departamental de escuelas de prueba', 'REAL FUNZA', 1027626524, 76, 'JUAN FELIPE', 'TELLES ', 13, 'E', 'Varones', 'Semiprofesional'),
(89, '1er departamental de escuelas de prueba', 'REAL FUNZA', 1034281792, 71, 'Mar?a FERNANDA', 'TELLES ', 14, 'E', 'Damas', 'Profesional No Avanzado'),
(91, '1er departamental de escuelas de prueba', 'REAL FUNZA', 1034657219, 73, 'SOFIA ALEJANDRA', 'RODRIGUEZ RODRIGUEZ', 15, 'F', 'Damas', 'Semiprofesional'),
(92, '1er departamental de escuelas de prueba', 'REAL FUNZA', 1034664768, 74, 'valeria ', 'delgado aldana', 10, 'C', 'Damas', 'Semiprofesional'),
(93, '1er departamental de escuelas de prueba', 'REAL FUNZA', 1034779459, 75, 'angie Juliana', 'rosos gallo', 14, 'E', 'Damas', 'Semiprofesional'),
(94, '1er departamental de escuelas de prueba', 'TALENTO EN LINEA', 1000132152, 148, 'JUANA', 'TERAN', 16, 'F', 'Damas', 'Profesional No Avanzado'),
(95, '1er departamental de escuelas de prueba', 'TALENTO EN LINEA', 1000241139, 131, 'JUAN', 'RENGIFO', 17, 'F', 'Varones', 'Profesional No Avanzado'),
(96, '1er departamental de escuelas de prueba', 'TALENTO EN LINEA', 1000332351, 130, 'JUAN', 'RAMIREZ', 19, 'F', 'Varones', 'Profesional No Avanzado'),
(97, '1er departamental de escuelas de prueba', 'TALENTO EN LINEA', 1000973534, 129, 'NIKOLL', 'PITA', 17, 'F', 'Damas', 'Profesional No Avanzado'),
(99, '1er departamental de escuelas de prueba', 'TALENTO EN LINEA', 1001204136, 128, 'NICOLLE', 'PEREZ', 16, 'F', 'Damas', 'Profesional No Avanzado'),
(100, '1er departamental de escuelas de prueba', 'TALENTO EN LINEA', 1001269557, 127, 'CAROL', 'VASQUEZ', 20, 'F', 'Damas', 'Semiprofesional'),
(101, '1er departamental de escuelas de prueba', 'TALENTO EN LINEA', 1001275814, 126, 'ERIKA', 'ALARCON', 16, 'F', 'Damas', 'Semiprofesional'),
(103, '1er departamental de escuelas de prueba', 'TALENTO EN LINEA', 1007366947, 125, 'KEVIN', 'DIAZ', 19, 'F', 'Varones', 'Semiprofesional'),
(105, '1er departamental de escuelas de prueba', 'TALENTO EN LINEA', 1010182499, 124, 'laura', 'pinto', 13, 'E', 'Damas', 'Profesional No Avanzado'),
(106, '1er departamental de escuelas de prueba', 'TALENTO EN LINEA', 1011062214, 123, 'nicolas', 'rojas', 9, 'C', 'Varones', 'Semiprofesional'),
(107, '1er departamental de escuelas de prueba', 'TALENTO EN LINEA', 1011093280, 122, 'LAURA', 'FLOREZ', 14, 'E', 'Damas', 'Semiprofesional'),
(109, '1er departamental de escuelas de prueba', 'TALENTO EN LINEA', 1011103193, 121, 'MELANY', 'BRUGOS', 11, 'D', 'Damas', 'Semiprofesional'),
(110, '1er departamental de escuelas de prueba', 'TALENTO EN LINEA', 1011213017, 120, 'Alison', 'correal', 8, 'B', 'Damas', 'Profesional No Avanzado'),
(111, '1er departamental de escuelas de prueba', 'TALENTO EN LINEA', 1011213897, 119, 'juaquin', 'pinilla', 8, 'B', 'Varones', 'Profesional No Avanzado'),
(113, '1er departamental de escuelas de prueba', 'TALENTO EN LINEA', 1012917120, 118, 'KAROL', 'VEGA', 14, 'E', 'Damas', 'Semiprofesional'),
(115, '1er departamental de escuelas de prueba', 'TALENTO EN LINEA', 1013102838, 132, 'SARA', 'RAMIREZ', 21, 'F', 'Damas', 'Profesional No Avanzado'),
(116, '1er departamental de escuelas de prueba', 'TALENTO EN LINEA', 1013268489, 133, 'JUAN', 'PERUGACHI', 11, 'D', 'Varones', 'Profesional No Avanzado'),
(119, '1er departamental de escuelas de prueba', 'TALENTO EN LINEA', 1014670503, 147, 'LAURA', 'CALDERON', 11, 'D', 'Damas', 'Semiprofesional'),
(120, '1er departamental de escuelas de prueba', 'TALENTO EN LINEA', 1014736635, 146, 'MARIA', 'HUESO', 16, 'F', 'Damas', 'Profesional No Avanzado'),
(123, '1er departamental de escuelas de prueba', 'TALENTO EN LINEA', 1016714687, 145, 'DIANA', 'RODRIGUEZ', 13, 'E', 'Damas', 'Semiprofesional'),
(124, '1er departamental de escuelas de prueba', 'TALENTO EN LINEA', 1016720303, 144, 'SHARON', 'ALBA', 10, 'C', 'Damas', 'Profesional No Avanzado'),
(125, '1er departamental de escuelas de prueba', 'TALENTO EN LINEA', 1016834964, 143, 'mariana', 'Zambrano', 11, 'D', 'Damas', 'Profesional No Avanzado'),
(126, '1er departamental de escuelas de prueba', 'TALENTO EN LINEA', 1016835575, 142, 'juan', 'osorio', 8, 'B', 'Varones', 'Semiprofesional'),
(127, '1er departamental de escuelas de prueba', 'TALENTO EN LINEA', 1019762854, 141, 'ANNY', 'TORRES', 14, 'E', 'Damas', 'Profesional No Avanzado'),
(128, '1er departamental de escuelas de prueba', 'TALENTO EN LINEA', 1021312950, 140, 'KAREN', 'MONCADA', 15, 'F', 'Damas', 'Profesional No Avanzado'),
(129, '1er departamental de escuelas de prueba', 'TALENTO EN LINEA', 1021315009, 139, 'DANA', 'CUERVO', 11, 'D', 'Damas', 'Semiprofesional'),
(131, '1er departamental de escuelas de prueba', 'TALENTO EN LINEA', 1022928126, 138, 'JULIAN', 'BUITRAGO', 15, 'F', 'Varones', 'Semiprofesional'),
(132, '1er departamental de escuelas de prueba', 'TALENTO EN LINEA', 1023373831, 137, 'PAULA', 'SANTAMARIA', 13, 'E', 'Damas', 'Profesional No Avanzado'),
(133, '1er departamental de escuelas de prueba', 'TALENTO EN LINEA', 1023380853, 136, 'MICHELL', 'MU?OZ?', 11, 'D', 'Damas', 'Profesional No Avanzado'),
(134, '1er departamental de escuelas de prueba', 'TALENTO EN LINEA', 1023391767, 135, 'SARA', 'ALFONSO', 9, 'C', 'Damas', 'Profesional No Avanzado'),
(135, '1er departamental de escuelas de prueba', 'TALENTO EN LINEA', 1023404311, 134, 'ASHLEE', 'MONTERO', 13, 'E', 'Damas', 'Semiprofesional'),
(137, '1er departamental de escuelas de prueba', 'TALENTO EN LINEA', 1024465476, 117, 'MICHELL', 'PORTILLO', 15, 'F', 'Damas', 'Semiprofesional'),
(139, '1er departamental de escuelas de prueba', 'TALENTO EN LINEA', 1025460749, 116, 'MARIA', 'HIGUERA', 15, 'F', 'Damas', 'Semiprofesional'),
(140, '1er departamental de escuelas de prueba', 'TALENTO EN LINEA', 1025532910, 115, 'CAROLINA', 'MORA', 13, 'E', 'Damas', 'Profesional No Avanzado'),
(142, '1er departamental de escuelas de prueba', 'TALENTO EN LINEA', 1025540817, 97, 'laura', 'pinto', 11, 'D', 'Damas', 'Semiprofesional'),
(143, '1er departamental de escuelas de prueba', 'TALENTO EN LINEA', 1025540913, 96, 'NICOLLE', 'CASTILLO', 11, 'D', 'Damas', 'Semiprofesional'),
(145, '1er departamental de escuelas de prueba', 'TALENTO EN LINEA', 1028485738, 95, 'JENIFER', 'MARTINEZ', 12, 'D', 'Damas', 'Semiprofesional'),
(147, '1er departamental de escuelas de prueba', 'TALENTO EN LINEA', 1028492959, 94, 'mariana', 'Rodr?guez', 9, 'C', 'Damas', 'Profesional No Avanzado'),
(148, '1er departamental de escuelas de prueba', 'TALENTO EN LINEA', 1028840498, 93, 'LAURA', 'MURCIA', 12, 'D', 'Damas', 'Semiprofesional'),
(150, '1er departamental de escuelas de prueba', 'TALENTO EN LINEA', 1028842320, 92, 'MARIA', 'CALDERON', 10, 'C', 'Damas', 'Semiprofesional'),
(151, '1er departamental de escuelas de prueba', 'TALENTO EN LINEA', 1028861957, 91, 'DANA', 'LEAL', 13, 'E', 'Damas', 'Semiprofesional'),
(152, '1er departamental de escuelas de prueba', 'TALENTO EN LINEA', 1028865409, 90, 'ana', 'Vargas', 11, 'D', 'Damas', 'Semiprofesional'),
(153, '1er departamental de escuelas de prueba', 'TALENTO EN LINEA', 1028865595, 84, 'ANGELA', 'TIGA', 11, 'D', 'Damas', 'Profesional No Avanzado'),
(156, '1er departamental de escuelas de prueba', 'TALENTO EN LINEA', 1032940186, 85, 'MARIA', 'ORTIZ', 13, 'E', 'Damas', 'Profesional No Avanzado'),
(157, '1er departamental de escuelas de prueba', 'TALENTO EN LINEA', 1032941883, 86, 'MARIA', 'DUARTE', 11, 'D', 'Damas', 'Profesional No Avanzado'),
(158, '1er departamental de escuelas de prueba', 'TALENTO EN LINEA', 1032943485, 87, 'JUANITA', 'ORTIZ', 9, 'C', 'Damas', 'Semiprofesional'),
(159, '1er departamental de escuelas de prueba', 'TALENTO EN LINEA', 1033101148, 88, 'SARA', 'URREGO', 12, 'D', 'Damas', 'Semiprofesional'),
(160, '1er departamental de escuelas de prueba', 'TALENTO EN LINEA', 1033103385, 89, 'LAURA', 'RODRIGUEZ', 11, 'D', 'Damas', 'Semiprofesional'),
(161, '1er departamental de escuelas de prueba', 'TALENTO EN LINEA', 1034398387, 98, 'ANA', 'GUINEA', 14, 'E', 'Damas', 'Profesional No Avanzado'),
(162, '1er departamental de escuelas de prueba', 'TALENTO EN LINEA', 1034577415, 99, 'KAROL', 'MU?OZ', 12, 'D', 'Damas', 'Profesional No Avanzado'),
(163, '1er departamental de escuelas de prueba', 'TALENTO EN LINEA', 1034662497, 100, 'luciana', 'ilarion', 12, 'D', 'Damas', 'Profesional No Avanzado'),
(164, '1er departamental de escuelas de prueba', 'TALENTO EN LINEA', 1044618905, 114, 'HELLEN', 'GUTIERREZ', 15, 'F', 'Damas', 'Semiprofesional'),
(165, '1er departamental de escuelas de prueba', 'TALENTO EN LINEA', 1058138501, 113, 'MARIA', 'GALLEGO', 14, 'E', 'Damas', 'Profesional No Avanzado'),
(168, '1er departamental de escuelas de prueba', 'TALENTO EN LINEA', 1070388646, 112, 'angel', 'acosta', 12, 'D', 'Varones', 'Semiprofesional'),
(169, '1er departamental de escuelas de prueba', 'TALENTO EN LINEA', 1070394438, 111, 'linda', 'cortes', 8, 'B', 'Damas', 'Semiprofesional'),
(170, '1er departamental de escuelas de prueba', 'TALENTO EN LINEA', 1070609213, 110, 'YUSTIN', 'RIOS', 9, 'C', 'Damas', 'Semiprofesional'),
(172, '1er departamental de escuelas de prueba', 'TALENTO EN LINEA', 1072106040, 109, 'SHAYRA', 'ESPA?A', 8, 'B', 'Damas', 'Profesional No Avanzado'),
(176, '1er departamental de escuelas de prueba', 'TALENTO EN LINEA', 1073234436, 108, 'Alison', 'gacharna', 13, 'E', 'Damas', 'Semiprofesional'),
(177, '1er departamental de escuelas de prueba', 'TALENTO EN LINEA', 1073483508, 107, 'JERONIMO', 'GONZALEZ', 9, 'C', 'Varones', 'Profesional No Avanzado'),
(180, '1er departamental de escuelas de prueba', 'TALENTO EN LINEA', 1074344969, 106, 'sharick', 'Gonz?lez', 11, 'D', 'Damas', 'Semiprofesional'),
(182, '1er departamental de escuelas de prueba', 'TALENTO EN LINEA', 1075870775, 105, 'MARIA', 'CUCHA', 15, 'F', 'Damas', 'Semiprofesional'),
(183, '1er departamental de escuelas de prueba', 'TALENTO EN LINEA', 1075873140, 104, 'NATALIA', 'ACERO', 10, 'C', 'Damas', 'Profesional No Avanzado'),
(185, '1er departamental de escuelas de prueba', 'TALENTO EN LINEA', 1140922124, 103, 'MARIA', 'MERCHAN', 10, 'C', 'Damas', 'Profesional No Avanzado'),
(187, '1er departamental de escuelas de prueba', 'TALENTO EN LINEA', 1141122490, 102, 'sara', 'pint?', 9, 'C', 'Damas', 'Profesional No Avanzado'),
(191, '1er departamental de escuelas de prueba', 'TALENTO EN LINEA', 99100300032, 101, 'INGRID', 'MENDOZA', 20, 'F', 'Damas', 'Semiprofesional'),
(192, '1er departamental de escuelas de prueba', 'REAL FUNZA', 1000856124, 149, 'juan esteba', 'pavajeau diaz', 16, 'F', 'Varones', 'Profesional No Avanzado'),
(193, '1er departamental de escuelas de prueba', 'REAL FUNZA', 1001275404, 150, 'helem sofia', 'Camargo Casta?eda', 17, 'F', 'Damas', 'Semiprofesional'),
(194, '1er departamental de escuelas de prueba', 'REAL FUNZA', 1070599564, 151, 'MICHELL ', 'GONZALEZ AREVALO', 12, 'D', 'Damas', 'Semiprofesional'),
(195, '1er departamental de escuelas de prueba', 'REAL FUNZA', 99072606228, 152, 'nicolas ', 'palacio Escobar', 20, 'F', 'Varones', 'Semiprofesional'),
(196, '1er departamental de escuelas de prueba', 'ECOPATIN', 1076652957, 153, 'ANDREA ', 'CASTRO GARCIA', 12, 'D', 'Damas', 'Semiprofesional'),
(197, '1er departamental de escuelas de prueba', 'ECOPATIN', 1077113374, 154, 'ALYSON ', 'CALDERON PATI?O', 12, 'D', 'Damas', 'Profesional No Avanzado'),
(198, '1er departamental de escuelas de prueba', 'ECOPATIN', 1110370311, 155, 'JUAN SEBASTIAN', 'FUENTES TASCON', 11, 'D', 'Varones', 'Profesional No Avanzado'),
(199, '1er departamental de escuelas de prueba', 'ECOPATIN', 1141117420, 156, 'LAURA ALEJANDRA', 'CHOACHI GUEVARA', 12, 'D', 'Damas', 'Semiprofesional'),
(200, '1er departamental de escuelas de prueba', 'ECOPATIN', 1193556533, 157, 'KAROLL TATIANA', 'GARZON CASTRO', 19, 'F', 'Damas', 'Profesional No Avanzado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion_deportistas_eventos_ranking`
--

CREATE TABLE `inscripcion_deportistas_eventos_ranking` (
  `id` int(11) NOT NULL,
  `evento` varchar(100) NOT NULL,
  `club` varchar(100) NOT NULL,
  `identificacion_deportista` bigint(11) NOT NULL,
  `numero_deportista` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `edad` int(2) NOT NULL,
  `categoria` varchar(10) NOT NULL,
  `rama` varchar(11) NOT NULL,
  `tipo_patin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `inscripcion_deportistas_eventos_ranking`
--

INSERT INTO `inscripcion_deportistas_eventos_ranking` (`id`, `evento`, `club`, `identificacion_deportista`, `numero_deportista`, `nombres`, `apellidos`, `edad`, `categoria`, `rama`, `tipo_patin`) VALUES
(1, '1er Ranking de Prueba Municipal Girardot', 'IEDAN', 1014876720, 34, 'MANUELA ', 'PRIETO VAQUIRO', 10, 'C', 'Damas', 'Profesional Avanzado'),
(2, '1er Ranking de Prueba Municipal Girardot', 'IEDAN', 1021396139, 36, 'BRIAN SEBASTIAN', 'PRIETO MORENO', 18, 'F', 'Varones', 'Profesional Avanzado'),
(3, '1er Ranking de Prueba Municipal Girardot', 'IEDAN', 1069644048, 31, 'LAURA VALENTINA', 'PALACIOS ROMERO', 12, 'D', 'Damas', 'Profesional Avanzado'),
(4, '1er Ranking de Prueba Municipal Girardot', 'IEDAN', 1070392328, 33, 'AYLIN STEPHANIE', 'ANGEL PALACIOS', 10, 'C', 'Damas', 'Profesional Avanzado'),
(5, '1er Ranking de Prueba Municipal Girardot', 'IEDAN', 1071328354, 32, 'JUAN GUILLERMO', 'MAMANCHE MOCENTON', 15, 'F', 'Varones', 'Profesional Avanzado'),
(7, '1er Ranking de Prueba Municipal Girardot', 'IEDAN', 1077112032, 35, 'KAROL DAYANNA', 'INFANTE ', 16, 'F', 'Damas', 'Profesional Avanzado'),
(8, '1er Ranking de Prueba Municipal Girardot', 'REAL FUNZA', 1000519061, 51, 'Alejandro ', 'palacio Escobar', 17, 'F', 'Varones', 'Profesional Avanzado'),
(9, '1er Ranking de Prueba Municipal Girardot', 'REAL FUNZA', 1000580163, 50, 'PAULA ANDREA', 'MONTEALEGRE CONTRERAS', 17, 'F', 'Damas', 'Profesional Avanzado'),
(10, '1er Ranking de Prueba Municipal Girardot', 'REAL FUNZA', 1000953434, 49, 'FEDERICO ', 'GONZALEZ JIMENEZ', 17, 'F', 'Varones', 'Profesional Avanzado'),
(11, '1er Ranking de Prueba Municipal Girardot', 'REAL FUNZA', 1013103234, 53, 'DANNIA LISETH', 'CESPEDES PATI?O', 15, 'F', 'Damas', 'Profesional Avanzado'),
(12, '1er Ranking de Prueba Municipal Girardot', 'REAL FUNZA', 1014663368, 48, 'MARIA ESTEFANIA', 'FIGUEROA ', 14, 'E', 'Damas', 'Profesional Avanzado'),
(13, '1er Ranking de Prueba Municipal Girardot', 'REAL FUNZA', 1028495132, 52, 'GABRIEL ', 'TELLES ', 9, 'C', 'Varones', 'Profesional Avanzado'),
(14, '1er Ranking de Prueba Municipal Girardot', 'REAL FUNZA', 1028861317, 54, 'martin ', 'nieto rojas', 12, 'D', 'Varones', 'Profesional Avanzado'),
(15, '1er Ranking de Prueba Municipal Girardot', 'REAL FUNZA', 1107974783, 47, 'Brenda juliana', 'vega mantilla', 16, 'F', 'Damas', 'Profesional Avanzado'),
(16, '1er Ranking de Prueba Municipal Girardot', 'REAL FUNZA', 1032679384, 46, 'Mar?a FERNANDA', 'GALVIZ ', 13, 'E', 'Damas', 'Profesional Avanzado'),
(17, '1er Ranking de Prueba Municipal Girardot', 'REAL FUNZA', 1029145291, 55, 'laura sofia', 'diaz Ord??ez', 12, 'D', 'Damas', 'Profesional Avanzado'),
(18, '1er Ranking de Prueba Municipal Girardot', 'COLSKATER ', 1000572241, 17, 'DANIELA MARIA', 'PI?EROS CALDERON', 19, 'F', 'Damas', 'Profesional Avanzado'),
(19, '1er Ranking de Prueba Municipal Girardot', 'COLSKATER ', 1007430443, 18, 'BRANDON JHEFFREY', 'CALDERON GOYENECHE', 16, 'F', 'Varones', 'Profesional Avanzado'),
(20, '1er Ranking de Prueba Municipal Girardot', 'COLSKATER ', 1076242675, 19, 'DANNA VALENTINA', 'PRIETO SIATOYA', 14, 'E', 'Damas', 'Profesional Avanzado'),
(21, '1er Ranking de Prueba Municipal Girardot', 'TALENTO EN LINEA', 1000991074, 64, 'MICHAEL RICARDO', 'RESTREPO VARGAS', 16, 'F', 'Varones', 'Profesional Avanzado'),
(22, '1er Ranking de Prueba Municipal Girardot', 'TALENTO EN LINEA', 1003661217, 62, 'KAREN JULIETH', 'VENEGAS BARRETO', 16, 'F', 'Damas', 'Profesional Avanzado'),
(23, '1er Ranking de Prueba Municipal Girardot', 'TALENTO EN LINEA', 1007463366, 69, 'LAURA STEFANIA', 'SANDOVAL BEJARANO', 19, 'F', 'Damas', 'Profesional Avanzado'),
(24, '1er Ranking de Prueba Municipal Girardot', 'TALENTO EN LINEA', 1011096326, 61, 'SANTIAGO ', 'VILLEGAS GUTIERREZ', 13, 'E', 'Varones', 'Profesional Avanzado'),
(25, '1er Ranking de Prueba Municipal Girardot', 'TALENTO EN LINEA', 1011322214, 59, 'ELIZABETH ', 'SANCHEZ BRAVO', 14, 'E', 'Damas', 'Profesional Avanzado'),
(26, '1er Ranking de Prueba Municipal Girardot', 'TALENTO EN LINEA', 1013011276, 57, 'LAURA ', 'ROJAS ZAPATA', 9, 'C', 'Damas', 'Profesional Avanzado'),
(27, '1er Ranking de Prueba Municipal Girardot', 'TALENTO EN LINEA', 1013596355, 56, 'VALERY CAMILA', 'BERNAL MALLORGA', 14, 'E', 'Damas', 'Profesional Avanzado'),
(28, '1er Ranking de Prueba Municipal Girardot', 'TALENTO EN LINEA', 1014661459, 58, 'KAREN DAIANA', 'BOCIGA VEGA', 14, 'E', 'Damas', 'Profesional Avanzado'),
(29, '1er Ranking de Prueba Municipal Girardot', 'TALENTO EN LINEA', 1016042324, 70, 'estefani Dayana', 'Ar?valo L?pez', 10, 'C', 'Damas', 'Profesional Avanzado'),
(30, '1er Ranking de Prueba Municipal Girardot', 'TALENTO EN LINEA', 1016592458, 87, 'DENIS NAYARA', 'MILLAN VANEGAS', 16, 'F', 'Damas', 'Profesional Avanzado'),
(31, '1er Ranking de Prueba Municipal Girardot', 'TALENTO EN LINEA', 1022384407, 85, 'MIGUEL ANGEL', 'LARA ZARATE', 9, 'C', 'Varones', 'Profesional Avanzado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion_evento_clubes`
--

CREATE TABLE `inscripcion_evento_clubes` (
  `id` int(11) NOT NULL,
  `evento` varchar(100) NOT NULL,
  `club` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `inscripcion_evento_clubes`
--

INSERT INTO `inscripcion_evento_clubes` (`id`, `evento`, `club`) VALUES
(1, '1er departamental de escuelas de prueba', 'BIG SKATERS'),
(2, '1er departamental de escuelas de prueba', 'CITIUS COTA'),
(3, '1er departamental de escuelas de prueba', 'AR SKATING'),
(4, '1er departamental de escuelas de prueba', 'IEDAN'),
(5, '1er departamental de escuelas de prueba', 'COLSKATER '),
(6, '1er departamental de escuelas de prueba', 'Club JGB'),
(7, '1er departamental de escuelas de prueba', 'CPF FUSAGASUGA'),
(8, '1er departamental de escuelas de prueba', 'ECOPATIN'),
(9, '1er departamental de escuelas de prueba', 'ESC MOSQUERA'),
(10, '1er departamental de escuelas de prueba', 'REAL FUNZA'),
(11, '1er departamental de escuelas de prueba', 'TALENTO EN LINEA'),
(40, '1er Ranking de Prueba Municipal Girardot', 'IEDAN'),
(41, '1er Ranking de Prueba Municipal Girardot', 'REAL FUNZA'),
(42, '1er Ranking de Prueba Municipal Girardot', 'COLSKATER '),
(43, '1er Ranking de Prueba Municipal Girardot', 'TALENTO EN LINEA'),
(44, '2do municipal de escuelas Girardot', 'IEDAN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ligado`
--

CREATE TABLE `ligado` (
  `id` int(11) NOT NULL,
  `ligado` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ligado`
--

INSERT INTO `ligado` (`id`, `ligado`) VALUES
(1, 'Si'),
(2, 'No');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `listados_carriles`
--

CREATE TABLE `listados_carriles` (
  `id` int(11) NOT NULL,
  `evento` varchar(100) NOT NULL,
  `nombre_listado` varchar(200) NOT NULL,
  `id_listado_carriles` int(11) NOT NULL,
  `estado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `listados_carriles`
--

INSERT INTO `listados_carriles` (`id`, `evento`, `nombre_listado`, `id_listado_carriles`, `estado`) VALUES
(1, '1er departamental de escuelas de prueba', 'Velocidad Contrareloj Individual  Semiprofesional  Damas 11 y 12 años', 10, 'Terminado'),
(2, '1er departamental de escuelas de prueba', 'Velocidad Contrareloj Individual  Profesional No Avanzado  Damas 11 y 12 años', 12, 'Pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `listados_eventos`
--

CREATE TABLE `listados_eventos` (
  `id` int(11) NOT NULL,
  `evento` varchar(100) NOT NULL,
  `nombre_listado` varchar(200) NOT NULL,
  `competencia` varchar(50) NOT NULL,
  `tipo_competencia` varchar(50) NOT NULL,
  `codigo_sql` varchar(200) NOT NULL,
  `oro` int(1) NOT NULL,
  `plata` int(1) NOT NULL,
  `bronce` int(1) NOT NULL,
  `estado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `listados_eventos`
--

INSERT INTO `listados_eventos` (`id`, `evento`, `nombre_listado`, `competencia`, `tipo_competencia`, `codigo_sql`, `oro`, `plata`, `bronce`, `estado`) VALUES
(1, '1er departamental de escuelas de prueba', 'Habilidad Circuito Estrella  Semiprofesional  Damas 9 y 10 años', 'Habilidad', 'Circuito Estrella', 'SELECT * FROM Resultados_Eventos_Competencia_Habilidad WHERE evento = \'1er departamental de escuelas de prueba\' AND listado = \'1\'', 1, 1, 1, 'terminado'),
(2, '1er departamental de escuelas de prueba', 'Fondo_Puntos Vuelta al circuito  Semiprofesional  Damas 9 y 10 años', 'Fondo_Puntos', 'Vuelta al Circuito', 'SELECT * FROM Resultados_Eventos_Competencia_Fondo_Puntos WHERE evento = \'1er departamental de escuelas de prueba\' AND listado = \'2\'', 1, 1, 1, 'terminado'),
(3, '1er departamental de escuelas de prueba', 'Fondo_Eliminacion Vuelta al circuito 100mts  Semiprofesional  Damas 9 y 10 años', 'Fondo_Eliminacion', 'Vuelta al Circuito', 'SELECT * FROM Resultados_Eventos_Competencia_Fondo_Eliminacion WHERE evento = \'1er departamental de escuelas de prueba\' AND listado = \'3\'', 1, 1, 1, 'terminado'),
(4, '1er departamental de escuelas de prueba', 'Fondo_Puntos_Eliminacion 1000 mts pista  Semiprofesional  Damas 9 y 10 años', 'Fondo_Puntos_Eliminacion', '1000 mts pista', 'SELECT * FROM Resultados_Eventos_Competencia_Fondo_Puntos_Eliminacion WHERE evento = \'1er departamental de escuelas de prueba\' AND listado = \'4\'', 1, 1, 1, 'terminado'),
(5, '1er departamental de escuelas de prueba', 'Velocidad CRI  Semiprofesional  Damas 9 y 10 años', 'Velocidad', 'Contrareloj Individual', 'SELECT * FROM Resultados_Eventos_Competencia_Velocidad WHERE evento = \'1er departamental de escuelas de prueba\' AND listado = \'5\'', 1, 1, 1, 'terminado'),
(7, '1er departamental de escuelas de prueba', 'Velocidad 10000 MTS   Semiprofesional  Damas 9 y 10 años', 'Velocidad', '10000 MTS', 'SELECT * FROM Resultados_Eventos_Competencia_Velocidad WHERE evento = \'1er departamental de escuelas de prueba\' AND listado = \'7\'', 1, 1, 1, 'pendiente'),
(8, '1er departamental de escuelas de prueba', 'Velocidad 100 MTS RUTA  Semiprofesional  Damas 9 y 10 años', 'Velocidad', '100 MTS RUTA', 'SELECT * FROM Resultados_Eventos_Competencia_Velocidad WHERE evento = \'1er departamental de escuelas de prueba\' AND listado = \'8\'', 1, 1, 1, 'terminado'),
(9, '1er departamental de escuelas de prueba', 'Libre VUELTA AL CIRCUITO  Semiprofesional  Damas 9 y 10 años', 'Libre', 'Vuelta al Circuito', 'SELECT * FROM Resultados_Eventos_Competencia_Libre WHERE evento = \'1er departamental de escuelas de prueba\' AND listado = \'9\'', 1, 1, 1, 'terminado'),
(10, '1er departamental de escuelas de prueba', 'Velocidad Contrareloj Individual  Semiprofesional  Damas 11 y 12 años', 'Velocidad', 'Contrareloj Individual', 'SELECT * FROM Resultados_Eventos_Competencia_Velocidad WHERE evento = \'1er departamental de escuelas de prueba\' AND listado = \'10\'', 1, 1, 1, 'terminado'),
(12, '1er departamental de escuelas de prueba', 'Velocidad Contrareloj Individual  Profesional No Avanzado  Damas 11 y 12 años', 'Velocidad', 'Contrareloj Individual', 'SELECT * FROM Resultados_Eventos_Competencia_Velocidad WHERE evento = \'1er departamental de escuelas de prueba\' AND listado = \'12\'', 1, 2, 1, 'terminado'),
(13, '1er departamental de escuelas de prueba', 'Habilidad 1000 mts planos  Semiprofesional  Damas 7 y 8 años', 'Habilidad', '1000 mts planos', 'SELECT * FROM Resultados_Eventos_Competencia_Habilidad WHERE evento = \'1er departamental de escuelas de prueba\' AND listado = \'13\'', 1, 1, 0, 'Pendiente'),
(14, '1er departamental de escuelas de prueba', 'Fondo_Puntos 1000 mts planos  Profesional No Avanzado  Varones 11 y 12 años', 'Fondo_Puntos', '1000 mts planos', 'SELECT * FROM Resultados_Eventos_Competencia_Fondo_Puntos WHERE evento = \'1er departamental de escuelas de prueba\' AND listado = \'14\'', 1, 1, 1, 'terminado'),
(15, '1er Ranking de Prueba Municipal Girardot', 'Velocidad Contrareloj Individual  Profesional Avanzado  Damas 13 y 14 años', 'Velocidad', 'Contrareloj Individual', 'SELECT * FROM Resultados_Eventos_Competencia_Velocidad WHERE evento = \'1er Ranking de Prueba Municipal Girardot\' AND listado = \'15\'', 1, 1, 1, 'terminado'),
(16, '1er Ranking de Prueba Municipal Girardot', 'Fondo_Puntos 1000 mts planos  Profesional Avanzado  Damas 13 y 14 años', 'Fondo_Puntos', '1000 mts planos', 'SELECT * FROM Resultados_Eventos_Competencia_Fondo_Puntos WHERE evento = \'1er Ranking de Prueba Municipal Girardot\' AND listado = \'16\'', 1, 1, 1, 'terminado'),
(17, '1er Ranking de Prueba Municipal Girardot', 'Fondo_Eliminacion 1000 mts planos  Profesional Avanzado  Damas 13 y 14 años', 'Fondo_Eliminacion', '1000 mts planos', 'SELECT * FROM Resultados_Eventos_Competencia_Fondo_Eliminacion WHERE evento = \'1er Ranking de Prueba Municipal Girardot\' AND listado = \'17\'', 1, 1, 1, 'terminado'),
(18, '1er Ranking de Prueba Municipal Girardot', 'Fondo_Puntos_Eliminacion 1000 mts planos  Profesional Avanzado  Damas 13 y 14 años', 'Fondo_Puntos_Eliminacion', '1000 mts planos', 'SELECT * FROM Resultados_Eventos_Competencia_Fondo_Puntos_Eliminacion WHERE evento = \'1er Ranking de Prueba Municipal Girardot\' AND listado = \'18\'', 1, 1, 1, 'terminado'),
(19, '1er Ranking de Prueba Municipal Girardot', 'Libre 1000 mts planos  Profesional Avanzado  Damas 13 y 14 años', 'Libre', '1000 mts planos', 'SELECT * FROM Resultados_Eventos_Competencia_Libre WHERE evento = \'1er Ranking de Prueba Municipal Girardot\' AND listado = \'19\'', 1, 1, 1, 'Pendiente'),
(20, '1er departamental de escuelas de prueba', 'Habilidad 10000 mts planos  Semiprofesional  Damas 11 y 12 años', 'Habilidad', '10000 mts planos', 'SELECT * FROM Resultados_Eventos_Competencia_Habilidad WHERE evento = \'1er departamental de escuelas de prueba\' AND listado = \'20\'', 2, 3, 3, 'Pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipios`
--

CREATE TABLE `municipios` (
  `id_municipio` int(6) NOT NULL,
  `municipio` varchar(255) NOT NULL,
  `estado` int(1) NOT NULL,
  `departamento_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `municipios`
--

INSERT INTO `municipios` (`id_municipio`, `municipio`, `estado`, `departamento_id`) VALUES
(1, 'Abriaquí', 1, 5),
(2, 'Acacías', 1, 50),
(3, 'Acandí', 1, 27),
(4, 'Acevedo', 1, 41),
(5, 'Achí', 1, 13),
(6, 'Agrado', 1, 41),
(7, 'Agua de Dios', 1, 25),
(8, 'Aguachica', 1, 20),
(9, 'Aguada', 1, 68),
(10, 'Aguadas', 1, 17),
(11, 'Aguazul', 1, 85),
(12, 'Agustín Codazzi', 1, 20),
(13, 'Aipe', 1, 41),
(14, 'Albania', 1, 18),
(15, 'Albania', 1, 44),
(16, 'Albania', 1, 68),
(17, 'Albán', 1, 25),
(18, 'Albán (San José)', 1, 52),
(19, 'Alcalá', 1, 76),
(20, 'Alejandria', 1, 5),
(21, 'Algarrobo', 1, 47),
(22, 'Algeciras', 1, 41),
(23, 'Almaguer', 1, 19),
(24, 'Almeida', 1, 15),
(25, 'Alpujarra', 1, 73),
(26, 'Altamira', 1, 41),
(27, 'Alto Baudó (Pie de Pato)', 1, 27),
(28, 'Altos del Rosario', 1, 13),
(29, 'Alvarado', 1, 73),
(30, 'Amagá', 1, 5),
(31, 'Amalfi', 1, 5),
(32, 'Ambalema', 1, 73),
(33, 'Anapoima', 1, 25),
(34, 'Ancuya', 1, 52),
(35, 'Andalucía', 1, 76),
(36, 'Andes', 1, 5),
(37, 'Angelópolis', 1, 5),
(38, 'Angostura', 1, 5),
(39, 'Anolaima', 1, 25),
(40, 'Anorí', 1, 5),
(41, 'Anserma', 1, 17),
(42, 'Ansermanuevo', 1, 76),
(43, 'Anzoátegui', 1, 73),
(44, 'Anzá', 1, 5),
(45, 'Apartadó', 1, 5),
(46, 'Apulo', 1, 25),
(47, 'Apía', 1, 66),
(48, 'Aquitania', 1, 15),
(49, 'Aracataca', 1, 47),
(50, 'Aranzazu', 1, 17),
(51, 'Aratoca', 1, 68),
(52, 'Arauca', 1, 81),
(53, 'Arauquita', 1, 81),
(54, 'Arbeláez', 1, 25),
(55, 'Arboleda (Berruecos)', 1, 52),
(56, 'Arboledas', 1, 54),
(57, 'Arboletes', 1, 5),
(58, 'Arcabuco', 1, 15),
(59, 'Arenal', 1, 13),
(60, 'Argelia', 1, 5),
(61, 'Argelia', 1, 19),
(62, 'Argelia', 1, 76),
(63, 'Ariguaní (El Difícil)', 1, 47),
(64, 'Arjona', 1, 13),
(65, 'Armenia', 1, 5),
(66, 'Armenia', 1, 63),
(67, 'Armero (Guayabal)', 1, 73),
(68, 'Arroyohondo', 1, 13),
(69, 'Astrea', 1, 20),
(70, 'Ataco', 1, 73),
(71, 'Atrato (Yuto)', 1, 27),
(72, 'Ayapel', 1, 23),
(73, 'Bagadó', 1, 27),
(74, 'Bahía Solano (Mútis)', 1, 27),
(75, 'Bajo Baudó (Pizarro)', 1, 27),
(76, 'Balboa', 1, 19),
(77, 'Balboa', 1, 66),
(78, 'Baranoa', 1, 8),
(79, 'Baraya', 1, 41),
(80, 'Barbacoas', 1, 52),
(81, 'Barbosa', 1, 5),
(82, 'Barbosa', 1, 68),
(83, 'Barichara', 1, 68),
(84, 'Barranca de Upía', 1, 50),
(85, 'Barrancabermeja', 1, 68),
(86, 'Barrancas', 1, 44),
(87, 'Barranco de Loba', 1, 13),
(88, 'Barranquilla', 1, 8),
(89, 'Becerríl', 1, 20),
(90, 'Belalcázar', 1, 17),
(91, 'Bello', 1, 5),
(92, 'Belmira', 1, 5),
(93, 'Beltrán', 1, 25),
(94, 'Belén', 1, 15),
(95, 'Belén', 1, 52),
(96, 'Belén de Bajirá', 1, 27),
(97, 'Belén de Umbría', 1, 66),
(98, 'Belén de los Andaquíes', 1, 18),
(99, 'Berbeo', 1, 15),
(100, 'Betania', 1, 5),
(101, 'Beteitiva', 1, 15),
(102, 'Betulia', 1, 5),
(103, 'Betulia', 1, 68),
(104, 'Bituima', 1, 25),
(105, 'Boavita', 1, 15),
(106, 'Bochalema', 1, 54),
(107, 'Bogotá D.C.', 1, 11),
(108, 'Bojacá', 1, 25),
(109, 'Bojayá (Bellavista)', 1, 27),
(110, 'Bolívar', 1, 5),
(111, 'Bolívar', 1, 19),
(112, 'Bolívar', 1, 68),
(113, 'Bolívar', 1, 76),
(114, 'Bosconia', 1, 20),
(115, 'Boyacá', 1, 15),
(116, 'Briceño', 1, 5),
(117, 'Briceño', 1, 15),
(118, 'Bucaramanga', 1, 68),
(119, 'Bucarasica', 1, 54),
(120, 'Buenaventura', 1, 76),
(121, 'Buenavista', 1, 15),
(122, 'Buenavista', 1, 23),
(123, 'Buenavista', 1, 63),
(124, 'Buenavista', 1, 70),
(125, 'Buenos Aires', 1, 19),
(126, 'Buesaco', 1, 52),
(127, 'Buga', 1, 76),
(128, 'Bugalagrande', 1, 76),
(129, 'Burítica', 1, 5),
(130, 'Busbanza', 1, 15),
(131, 'Cabrera', 1, 25),
(132, 'Cabrera', 1, 68),
(133, 'Cabuyaro', 1, 50),
(134, 'Cachipay', 1, 25),
(135, 'Caicedo', 1, 5),
(136, 'Caicedonia', 1, 76),
(137, 'Caimito', 1, 70),
(138, 'Cajamarca', 1, 73),
(139, 'Cajibío', 1, 19),
(140, 'Cajicá', 1, 25),
(141, 'Calamar', 1, 13),
(142, 'Calamar', 1, 95),
(143, 'Calarcá', 1, 63),
(144, 'Caldas', 1, 5),
(145, 'Caldas', 1, 15),
(146, 'Caldono', 1, 19),
(147, 'California', 1, 68),
(148, 'Calima (Darién)', 1, 76),
(149, 'Caloto', 1, 19),
(150, 'Calí', 1, 76),
(151, 'Campamento', 1, 5),
(152, 'Campo de la Cruz', 1, 8),
(153, 'Campoalegre', 1, 41),
(154, 'Campohermoso', 1, 15),
(155, 'Canalete', 1, 23),
(156, 'Candelaria', 1, 8),
(157, 'Candelaria', 1, 76),
(158, 'Cantagallo', 1, 13),
(159, 'Cantón de San Pablo', 1, 27),
(160, 'Caparrapí', 1, 25),
(161, 'Capitanejo', 1, 68),
(162, 'Caracolí', 1, 5),
(163, 'Caramanta', 1, 5),
(164, 'Carcasí', 1, 68),
(165, 'Carepa', 1, 5),
(166, 'Carmen de Apicalá', 1, 73),
(167, 'Carmen de Carupa', 1, 25),
(168, 'Carmen de Viboral', 1, 5),
(169, 'Carmen del Darién (CURBARADÓ)', 1, 27),
(170, 'Carolina', 1, 5),
(171, 'Cartagena', 1, 13),
(172, 'Cartagena del Chairá', 1, 18),
(173, 'Cartago', 1, 76),
(174, 'Carurú', 1, 97),
(175, 'Casabianca', 1, 73),
(176, 'Castilla la Nueva', 1, 50),
(177, 'Caucasia', 1, 5),
(178, 'Cañasgordas', 1, 5),
(179, 'Cepita', 1, 68),
(180, 'Cereté', 1, 23),
(181, 'Cerinza', 1, 15),
(182, 'Cerrito', 1, 68),
(183, 'Cerro San Antonio', 1, 47),
(184, 'Chachaguí', 1, 52),
(185, 'Chaguaní', 1, 25),
(186, 'Chalán', 1, 70),
(187, 'Chaparral', 1, 73),
(188, 'Charalá', 1, 68),
(189, 'Charta', 1, 68),
(190, 'Chigorodó', 1, 5),
(191, 'Chima', 1, 68),
(192, 'Chimichagua', 1, 20),
(193, 'Chimá', 1, 23),
(194, 'Chinavita', 1, 15),
(195, 'Chinchiná', 1, 17),
(196, 'Chinácota', 1, 54),
(197, 'Chinú', 1, 23),
(198, 'Chipaque', 1, 25),
(199, 'Chipatá', 1, 68),
(200, 'Chiquinquirá', 1, 15),
(201, 'Chiriguaná', 1, 20),
(202, 'Chiscas', 1, 15),
(203, 'Chita', 1, 15),
(204, 'Chitagá', 1, 54),
(205, 'Chitaraque', 1, 15),
(206, 'Chivatá', 1, 15),
(207, 'Chivolo', 1, 47),
(208, 'Choachí', 1, 25),
(209, 'Chocontá', 1, 25),
(210, 'Chámeza', 1, 85),
(211, 'Chía', 1, 25),
(212, 'Chíquiza', 1, 15),
(213, 'Chívor', 1, 15),
(214, 'Cicuco', 1, 13),
(215, 'Cimitarra', 1, 68),
(216, 'Circasia', 1, 63),
(217, 'Cisneros', 1, 5),
(218, 'Ciénaga', 1, 15),
(219, 'Ciénaga', 1, 47),
(220, 'Ciénaga de Oro', 1, 23),
(221, 'Clemencia', 1, 13),
(222, 'Cocorná', 1, 5),
(223, 'Coello', 1, 73),
(224, 'Cogua', 1, 25),
(225, 'Colombia', 1, 41),
(226, 'Colosó (Ricaurte)', 1, 70),
(227, 'Colón', 1, 86),
(228, 'Colón (Génova)', 1, 52),
(229, 'Concepción', 1, 5),
(230, 'Concepción', 1, 68),
(231, 'Concordia', 1, 5),
(232, 'Concordia', 1, 47),
(233, 'Condoto', 1, 27),
(234, 'Confines', 1, 68),
(235, 'Consaca', 1, 52),
(236, 'Contadero', 1, 52),
(237, 'Contratación', 1, 68),
(238, 'Convención', 1, 54),
(239, 'Copacabana', 1, 5),
(240, 'Coper', 1, 15),
(241, 'Cordobá', 1, 63),
(242, 'Corinto', 1, 19),
(243, 'Coromoro', 1, 68),
(244, 'Corozal', 1, 70),
(245, 'Corrales', 1, 15),
(246, 'Cota', 1, 25),
(247, 'Cotorra', 1, 23),
(248, 'Covarachía', 1, 15),
(249, 'Coveñas', 1, 70),
(250, 'Coyaima', 1, 73),
(251, 'Cravo Norte', 1, 81),
(252, 'Cuaspud (Carlosama)', 1, 52),
(253, 'Cubarral', 1, 50),
(254, 'Cubará', 1, 15),
(255, 'Cucaita', 1, 15),
(256, 'Cucunubá', 1, 25),
(257, 'Cucutilla', 1, 54),
(258, 'Cuitiva', 1, 15),
(259, 'Cumaral', 1, 50),
(260, 'Cumaribo', 1, 99),
(261, 'Cumbal', 1, 52),
(262, 'Cumbitara', 1, 52),
(263, 'Cunday', 1, 73),
(264, 'Curillo', 1, 18),
(265, 'Curití', 1, 68),
(266, 'Curumaní', 1, 20),
(267, 'Cáceres', 1, 5),
(268, 'Cáchira', 1, 54),
(269, 'Cácota', 1, 54),
(270, 'Cáqueza', 1, 25),
(271, 'Cértegui', 1, 27),
(272, 'Cómbita', 1, 15),
(273, 'Córdoba', 1, 13),
(274, 'Córdoba', 1, 52),
(275, 'Cúcuta', 1, 54),
(276, 'Dabeiba', 1, 5),
(277, 'Dagua', 1, 76),
(278, 'Dibulla', 1, 44),
(279, 'Distracción', 1, 44),
(280, 'Dolores', 1, 73),
(281, 'Don Matías', 1, 5),
(282, 'Dos Quebradas', 1, 66),
(283, 'Duitama', 1, 15),
(284, 'Durania', 1, 54),
(285, 'Ebéjico', 1, 5),
(286, 'El Bagre', 1, 5),
(287, 'El Banco', 1, 47),
(288, 'El Cairo', 1, 76),
(289, 'El Calvario', 1, 50),
(290, 'El Carmen', 1, 54),
(291, 'El Carmen', 1, 68),
(292, 'El Carmen de Atrato', 1, 27),
(293, 'El Carmen de Bolívar', 1, 13),
(294, 'El Castillo', 1, 50),
(295, 'El Cerrito', 1, 76),
(296, 'El Charco', 1, 52),
(297, 'El Cocuy', 1, 15),
(298, 'El Colegio', 1, 25),
(299, 'El Copey', 1, 20),
(300, 'El Doncello', 1, 18),
(301, 'El Dorado', 1, 50),
(302, 'El Dovio', 1, 76),
(303, 'El Espino', 1, 15),
(304, 'El Guacamayo', 1, 68),
(305, 'El Guamo', 1, 13),
(306, 'El Molino', 1, 44),
(307, 'El Paso', 1, 20),
(308, 'El Paujil', 1, 18),
(309, 'El Peñol', 1, 52),
(310, 'El Peñon', 1, 13),
(311, 'El Peñon', 1, 68),
(312, 'El Peñón', 1, 25),
(313, 'El Piñon', 1, 47),
(314, 'El Playón', 1, 68),
(315, 'El Retorno', 1, 95),
(316, 'El Retén', 1, 47),
(317, 'El Roble', 1, 70),
(318, 'El Rosal', 1, 25),
(319, 'El Rosario', 1, 52),
(320, 'El Tablón de Gómez', 1, 52),
(321, 'El Tambo', 1, 19),
(322, 'El Tambo', 1, 52),
(323, 'El Tarra', 1, 54),
(324, 'El Zulia', 1, 54),
(325, 'El Águila', 1, 76),
(326, 'Elías', 1, 41),
(327, 'Encino', 1, 68),
(328, 'Enciso', 1, 68),
(329, 'Entrerríos', 1, 5),
(330, 'Envigado', 1, 5),
(331, 'Espinal', 1, 73),
(332, 'Facatativá', 1, 25),
(333, 'Falan', 1, 73),
(334, 'Filadelfia', 1, 17),
(335, 'Filandia', 1, 63),
(336, 'Firavitoba', 1, 15),
(337, 'Flandes', 1, 73),
(338, 'Florencia', 1, 18),
(339, 'Florencia', 1, 19),
(340, 'Floresta', 1, 15),
(341, 'Florida', 1, 76),
(342, 'Floridablanca', 1, 68),
(343, 'Florián', 1, 68),
(344, 'Fonseca', 1, 44),
(345, 'Fortúl', 1, 81),
(346, 'Fosca', 1, 25),
(347, 'Francisco Pizarro', 1, 52),
(348, 'Fredonia', 1, 5),
(349, 'Fresno', 1, 73),
(350, 'Frontino', 1, 5),
(351, 'Fuente de Oro', 1, 50),
(352, 'Fundación', 1, 47),
(353, 'Funes', 1, 52),
(354, 'Funza', 1, 25),
(355, 'Fusagasugá', 1, 25),
(356, 'Fómeque', 1, 25),
(357, 'Fúquene', 1, 25),
(358, 'Gachalá', 1, 25),
(359, 'Gachancipá', 1, 25),
(360, 'Gachantivá', 1, 15),
(361, 'Gachetá', 1, 25),
(362, 'Galapa', 1, 8),
(363, 'Galeras (Nueva Granada)', 1, 70),
(364, 'Galán', 1, 68),
(365, 'Gama', 1, 25),
(366, 'Gamarra', 1, 20),
(367, 'Garagoa', 1, 15),
(368, 'Garzón', 1, 41),
(369, 'Gigante', 1, 41),
(370, 'Ginebra', 1, 76),
(371, 'Giraldo', 1, 5),
(372, 'Girardot', 1, 25),
(373, 'Girardota', 1, 5),
(374, 'Girón', 1, 68),
(375, 'Gonzalez', 1, 20),
(376, 'Gramalote', 1, 54),
(377, 'Granada', 1, 5),
(378, 'Granada', 1, 25),
(379, 'Granada', 1, 50),
(380, 'Guaca', 1, 68),
(381, 'Guacamayas', 1, 15),
(382, 'Guacarí', 1, 76),
(383, 'Guachavés', 1, 52),
(384, 'Guachené', 1, 19),
(385, 'Guachetá', 1, 25),
(386, 'Guachucal', 1, 52),
(387, 'Guadalupe', 1, 5),
(388, 'Guadalupe', 1, 41),
(389, 'Guadalupe', 1, 68),
(390, 'Guaduas', 1, 25),
(391, 'Guaitarilla', 1, 52),
(392, 'Gualmatán', 1, 52),
(393, 'Guamal', 1, 47),
(394, 'Guamal', 1, 50),
(395, 'Guamo', 1, 73),
(396, 'Guapota', 1, 68),
(397, 'Guapí', 1, 19),
(398, 'Guaranda', 1, 70),
(399, 'Guarne', 1, 5),
(400, 'Guasca', 1, 25),
(401, 'Guatapé', 1, 5),
(402, 'Guataquí', 1, 25),
(403, 'Guatavita', 1, 25),
(404, 'Guateque', 1, 15),
(405, 'Guavatá', 1, 68),
(406, 'Guayabal de Siquima', 1, 25),
(407, 'Guayabetal', 1, 25),
(408, 'Guayatá', 1, 15),
(409, 'Guepsa', 1, 68),
(410, 'Guicán', 1, 15),
(411, 'Gutiérrez', 1, 25),
(412, 'Guática', 1, 66),
(413, 'Gámbita', 1, 68),
(414, 'Gámeza', 1, 15),
(415, 'Génova', 1, 63),
(416, 'Gómez Plata', 1, 5),
(417, 'Hacarí', 1, 54),
(418, 'Hatillo de Loba', 1, 13),
(419, 'Hato', 1, 68),
(420, 'Hato Corozal', 1, 85),
(421, 'Hatonuevo', 1, 44),
(422, 'Heliconia', 1, 5),
(423, 'Herrán', 1, 54),
(424, 'Herveo', 1, 73),
(425, 'Hispania', 1, 5),
(426, 'Hobo', 1, 41),
(427, 'Honda', 1, 73),
(428, 'Ibagué', 1, 73),
(429, 'Icononzo', 1, 73),
(430, 'Iles', 1, 52),
(431, 'Imúes', 1, 52),
(432, 'Inzá', 1, 19),
(433, 'Inírida', 1, 94),
(434, 'Ipiales', 1, 52),
(435, 'Isnos', 1, 41),
(436, 'Istmina', 1, 27),
(437, 'Itagüí', 1, 5),
(438, 'Ituango', 1, 5),
(439, 'Izá', 1, 15),
(440, 'Jambaló', 1, 19),
(441, 'Jamundí', 1, 76),
(442, 'Jardín', 1, 5),
(443, 'Jenesano', 1, 15),
(444, 'Jericó', 1, 5),
(445, 'Jericó', 1, 15),
(446, 'Jerusalén', 1, 25),
(447, 'Jesús María', 1, 68),
(448, 'Jordán', 1, 68),
(449, 'Juan de Acosta', 1, 8),
(450, 'Junín', 1, 25),
(451, 'Juradó', 1, 27),
(452, 'La Apartada y La Frontera', 1, 23),
(453, 'La Argentina', 1, 41),
(454, 'La Belleza', 1, 68),
(455, 'La Calera', 1, 25),
(456, 'La Capilla', 1, 15),
(457, 'La Ceja', 1, 5),
(458, 'La Celia', 1, 66),
(459, 'La Cruz', 1, 52),
(460, 'La Cumbre', 1, 76),
(461, 'La Dorada', 1, 17),
(462, 'La Esperanza', 1, 54),
(463, 'La Estrella', 1, 5),
(464, 'La Florida', 1, 52),
(465, 'La Gloria', 1, 20),
(466, 'La Jagua de Ibirico', 1, 20),
(467, 'La Jagua del Pilar', 1, 44),
(468, 'La Llanada', 1, 52),
(469, 'La Macarena', 1, 50),
(470, 'La Merced', 1, 17),
(471, 'La Mesa', 1, 25),
(472, 'La Montañita', 1, 18),
(473, 'La Palma', 1, 25),
(474, 'La Paz', 1, 68),
(475, 'La Paz (Robles)', 1, 20),
(476, 'La Peña', 1, 25),
(477, 'La Pintada', 1, 5),
(478, 'La Plata', 1, 41),
(479, 'La Playa', 1, 54),
(480, 'La Primavera', 1, 99),
(481, 'La Salina', 1, 85),
(482, 'La Sierra', 1, 19),
(483, 'La Tebaida', 1, 63),
(484, 'La Tola', 1, 52),
(485, 'La Unión', 1, 5),
(486, 'La Unión', 1, 52),
(487, 'La Unión', 1, 70),
(488, 'La Unión', 1, 76),
(489, 'La Uvita', 1, 15),
(490, 'La Vega', 1, 19),
(491, 'La Vega', 1, 25),
(492, 'La Victoria', 1, 15),
(493, 'La Victoria', 1, 17),
(494, 'La Victoria', 1, 76),
(495, 'La Virginia', 1, 66),
(496, 'Labateca', 1, 54),
(497, 'Labranzagrande', 1, 15),
(498, 'Landázuri', 1, 68),
(499, 'Lebrija', 1, 68),
(500, 'Leiva', 1, 52),
(501, 'Lejanías', 1, 50),
(502, 'Lenguazaque', 1, 25),
(503, 'Leticia', 1, 91),
(504, 'Liborina', 1, 5),
(505, 'Linares', 1, 52),
(506, 'Lloró', 1, 27),
(507, 'Lorica', 1, 23),
(508, 'Los Córdobas', 1, 23),
(509, 'Los Palmitos', 1, 70),
(510, 'Los Patios', 1, 54),
(511, 'Los Santos', 1, 68),
(512, 'Lourdes', 1, 54),
(513, 'Luruaco', 1, 8),
(514, 'Lérida', 1, 73),
(515, 'Líbano', 1, 73),
(516, 'López (Micay)', 1, 19),
(517, 'Macanal', 1, 15),
(518, 'Macaravita', 1, 68),
(519, 'Maceo', 1, 5),
(520, 'Machetá', 1, 25),
(521, 'Madrid', 1, 25),
(522, 'Magangué', 1, 13),
(523, 'Magüi (Payán)', 1, 52),
(524, 'Mahates', 1, 13),
(525, 'Maicao', 1, 44),
(526, 'Majagual', 1, 70),
(527, 'Malambo', 1, 8),
(528, 'Mallama (Piedrancha)', 1, 52),
(529, 'Manatí', 1, 8),
(530, 'Manaure', 1, 44),
(531, 'Manaure Balcón del Cesar', 1, 20),
(532, 'Manizales', 1, 17),
(533, 'Manta', 1, 25),
(534, 'Manzanares', 1, 17),
(535, 'Maní', 1, 85),
(536, 'Mapiripan', 1, 50),
(537, 'Margarita', 1, 13),
(538, 'Marinilla', 1, 5),
(539, 'Maripí', 1, 15),
(540, 'Mariquita', 1, 73),
(541, 'Marmato', 1, 17),
(542, 'Marquetalia', 1, 17),
(543, 'Marsella', 1, 66),
(544, 'Marulanda', 1, 17),
(545, 'María la Baja', 1, 13),
(546, 'Matanza', 1, 68),
(547, 'Medellín', 1, 5),
(548, 'Medina', 1, 25),
(549, 'Medio Atrato', 1, 27),
(550, 'Medio Baudó', 1, 27),
(551, 'Medio San Juan (ANDAGOYA)', 1, 27),
(552, 'Melgar', 1, 73),
(553, 'Mercaderes', 1, 19),
(554, 'Mesetas', 1, 50),
(555, 'Milán', 1, 18),
(556, 'Miraflores', 1, 15),
(557, 'Miraflores', 1, 95),
(558, 'Miranda', 1, 19),
(559, 'Mistrató', 1, 66),
(560, 'Mitú', 1, 97),
(561, 'Mocoa', 1, 86),
(562, 'Mogotes', 1, 68),
(563, 'Molagavita', 1, 68),
(564, 'Momil', 1, 23),
(565, 'Mompós', 1, 13),
(566, 'Mongua', 1, 15),
(567, 'Monguí', 1, 15),
(568, 'Moniquirá', 1, 15),
(569, 'Montebello', 1, 5),
(570, 'Montecristo', 1, 13),
(571, 'Montelíbano', 1, 23),
(572, 'Montenegro', 1, 63),
(573, 'Monteria', 1, 23),
(574, 'Monterrey', 1, 85),
(575, 'Morales', 1, 13),
(576, 'Morales', 1, 19),
(577, 'Morelia', 1, 18),
(578, 'Morroa', 1, 70),
(579, 'Mosquera', 1, 25),
(580, 'Mosquera', 1, 52),
(581, 'Motavita', 1, 15),
(582, 'Moñitos', 1, 23),
(583, 'Murillo', 1, 73),
(584, 'Murindó', 1, 5),
(585, 'Mutatá', 1, 5),
(586, 'Mutiscua', 1, 54),
(587, 'Muzo', 1, 15),
(588, 'Málaga', 1, 68),
(589, 'Nariño', 1, 5),
(590, 'Nariño', 1, 25),
(591, 'Nariño', 1, 52),
(592, 'Natagaima', 1, 73),
(593, 'Nechí', 1, 5),
(594, 'Necoclí', 1, 5),
(595, 'Neira', 1, 17),
(596, 'Neiva', 1, 41),
(597, 'Nemocón', 1, 25),
(598, 'Nilo', 1, 25),
(599, 'Nimaima', 1, 25),
(600, 'Nobsa', 1, 15),
(601, 'Nocaima', 1, 25),
(602, 'Norcasia', 1, 17),
(603, 'Norosí', 1, 13),
(604, 'Novita', 1, 27),
(605, 'Nueva Granada', 1, 47),
(606, 'Nuevo Colón', 1, 15),
(607, 'Nunchía', 1, 85),
(608, 'Nuquí', 1, 27),
(609, 'Nátaga', 1, 41),
(610, 'Obando', 1, 76),
(611, 'Ocamonte', 1, 68),
(612, 'Ocaña', 1, 54),
(613, 'Oiba', 1, 68),
(614, 'Oicatá', 1, 15),
(615, 'Olaya', 1, 5),
(616, 'Olaya Herrera', 1, 52),
(617, 'Onzaga', 1, 68),
(618, 'Oporapa', 1, 41),
(619, 'Orito', 1, 86),
(620, 'Orocué', 1, 85),
(621, 'Ortega', 1, 73),
(622, 'Ospina', 1, 52),
(623, 'Otanche', 1, 15),
(624, 'Ovejas', 1, 70),
(625, 'Pachavita', 1, 15),
(626, 'Pacho', 1, 25),
(627, 'Padilla', 1, 19),
(628, 'Paicol', 1, 41),
(629, 'Pailitas', 1, 20),
(630, 'Paime', 1, 25),
(631, 'Paipa', 1, 15),
(632, 'Pajarito', 1, 15),
(633, 'Palermo', 1, 41),
(634, 'Palestina', 1, 17),
(635, 'Palestina', 1, 41),
(636, 'Palmar', 1, 68),
(637, 'Palmar de Varela', 1, 8),
(638, 'Palmas del Socorro', 1, 68),
(639, 'Palmira', 1, 76),
(640, 'Palmito', 1, 70),
(641, 'Palocabildo', 1, 73),
(642, 'Pamplona', 1, 54),
(643, 'Pamplonita', 1, 54),
(644, 'Pandi', 1, 25),
(645, 'Panqueba', 1, 15),
(646, 'Paratebueno', 1, 25),
(647, 'Pasca', 1, 25),
(648, 'Patía (El Bordo)', 1, 19),
(649, 'Pauna', 1, 15),
(650, 'Paya', 1, 15),
(651, 'Paz de Ariporo', 1, 85),
(652, 'Paz de Río', 1, 15),
(653, 'Pedraza', 1, 47),
(654, 'Pelaya', 1, 20),
(655, 'Pensilvania', 1, 17),
(656, 'Peque', 1, 5),
(657, 'Pereira', 1, 66),
(658, 'Pesca', 1, 15),
(659, 'Peñol', 1, 5),
(660, 'Piamonte', 1, 19),
(661, 'Pie de Cuesta', 1, 68),
(662, 'Piedras', 1, 73),
(663, 'Piendamó', 1, 19),
(664, 'Pijao', 1, 63),
(665, 'Pijiño', 1, 47),
(666, 'Pinchote', 1, 68),
(667, 'Pinillos', 1, 13),
(668, 'Piojo', 1, 8),
(669, 'Pisva', 1, 15),
(670, 'Pital', 1, 41),
(671, 'Pitalito', 1, 41),
(672, 'Pivijay', 1, 47),
(673, 'Planadas', 1, 73),
(674, 'Planeta Rica', 1, 23),
(675, 'Plato', 1, 47),
(676, 'Policarpa', 1, 52),
(677, 'Polonuevo', 1, 8),
(678, 'Ponedera', 1, 8),
(679, 'Popayán', 1, 19),
(680, 'Pore', 1, 85),
(681, 'Potosí', 1, 52),
(682, 'Pradera', 1, 76),
(683, 'Prado', 1, 73),
(684, 'Providencia', 1, 52),
(685, 'Providencia', 1, 88),
(686, 'Pueblo Bello', 1, 20),
(687, 'Pueblo Nuevo', 1, 23),
(688, 'Pueblo Rico', 1, 66),
(689, 'Pueblorrico', 1, 5),
(690, 'Puebloviejo', 1, 47),
(691, 'Puente Nacional', 1, 68),
(692, 'Puerres', 1, 52),
(693, 'Puerto Asís', 1, 86),
(694, 'Puerto Berrío', 1, 5),
(695, 'Puerto Boyacá', 1, 15),
(696, 'Puerto Caicedo', 1, 86),
(697, 'Puerto Carreño', 1, 99),
(698, 'Puerto Colombia', 1, 8),
(699, 'Puerto Concordia', 1, 50),
(700, 'Puerto Escondido', 1, 23),
(701, 'Puerto Gaitán', 1, 50),
(702, 'Puerto Guzmán', 1, 86),
(703, 'Puerto Leguízamo', 1, 86),
(704, 'Puerto Libertador', 1, 23),
(705, 'Puerto Lleras', 1, 50),
(706, 'Puerto López', 1, 50),
(707, 'Puerto Nare', 1, 5),
(708, 'Puerto Nariño', 1, 91),
(709, 'Puerto Parra', 1, 68),
(710, 'Puerto Rico', 1, 18),
(711, 'Puerto Rico', 1, 50),
(712, 'Puerto Rondón', 1, 81),
(713, 'Puerto Salgar', 1, 25),
(714, 'Puerto Santander', 1, 54),
(715, 'Puerto Tejada', 1, 19),
(716, 'Puerto Triunfo', 1, 5),
(717, 'Puerto Wilches', 1, 68),
(718, 'Pulí', 1, 25),
(719, 'Pupiales', 1, 52),
(720, 'Puracé (Coconuco)', 1, 19),
(721, 'Purificación', 1, 73),
(722, 'Purísima', 1, 23),
(723, 'Pácora', 1, 17),
(724, 'Páez', 1, 15),
(725, 'Páez (Belalcazar)', 1, 19),
(726, 'Páramo', 1, 68),
(727, 'Quebradanegra', 1, 25),
(728, 'Quetame', 1, 25),
(729, 'Quibdó', 1, 27),
(730, 'Quimbaya', 1, 63),
(731, 'Quinchía', 1, 66),
(732, 'Quipama', 1, 15),
(733, 'Quipile', 1, 25),
(734, 'Ragonvalia', 1, 54),
(735, 'Ramiriquí', 1, 15),
(736, 'Recetor', 1, 85),
(737, 'Regidor', 1, 13),
(738, 'Remedios', 1, 5),
(739, 'Remolino', 1, 47),
(740, 'Repelón', 1, 8),
(741, 'Restrepo', 1, 50),
(742, 'Restrepo', 1, 76),
(743, 'Retiro', 1, 5),
(744, 'Ricaurte', 1, 25),
(745, 'Ricaurte', 1, 52),
(746, 'Rio Negro', 1, 68),
(747, 'Rioblanco', 1, 73),
(748, 'Riofrío', 1, 76),
(749, 'Riohacha', 1, 44),
(750, 'Risaralda', 1, 17),
(751, 'Rivera', 1, 41),
(752, 'Roberto Payán (San José)', 1, 52),
(753, 'Roldanillo', 1, 76),
(754, 'Roncesvalles', 1, 73),
(755, 'Rondón', 1, 15),
(756, 'Rosas', 1, 19),
(757, 'Rovira', 1, 73),
(758, 'Ráquira', 1, 15),
(759, 'Río Iró', 1, 27),
(760, 'Río Quito', 1, 27),
(761, 'Río Sucio', 1, 17),
(762, 'Río Viejo', 1, 13),
(763, 'Río de oro', 1, 20),
(764, 'Ríonegro', 1, 5),
(765, 'Ríosucio', 1, 27),
(766, 'Sabana de Torres', 1, 68),
(767, 'Sabanagrande', 1, 8),
(768, 'Sabanalarga', 1, 5),
(769, 'Sabanalarga', 1, 8),
(770, 'Sabanalarga', 1, 85),
(771, 'Sabanas de San Angel (SAN ANGEL)', 1, 47),
(772, 'Sabaneta', 1, 5),
(773, 'Saboyá', 1, 15),
(774, 'Sahagún', 1, 23),
(775, 'Saladoblanco', 1, 41),
(776, 'Salamina', 1, 17),
(777, 'Salamina', 1, 47),
(778, 'Salazar', 1, 54),
(779, 'Saldaña', 1, 73),
(780, 'Salento', 1, 63),
(781, 'Salgar', 1, 5),
(782, 'Samacá', 1, 15),
(783, 'Samaniego', 1, 52),
(784, 'Samaná', 1, 17),
(785, 'Sampués', 1, 70),
(786, 'San Agustín', 1, 41),
(787, 'San Alberto', 1, 20),
(788, 'San Andrés', 1, 68),
(789, 'San Andrés Sotavento', 1, 23),
(790, 'San Andrés de Cuerquía', 1, 5),
(791, 'San Antero', 1, 23),
(792, 'San Antonio', 1, 73),
(793, 'San Antonio de Tequendama', 1, 25),
(794, 'San Benito', 1, 68),
(795, 'San Benito Abad', 1, 70),
(796, 'San Bernardo', 1, 25),
(797, 'San Bernardo', 1, 52),
(798, 'San Bernardo del Viento', 1, 23),
(799, 'San Calixto', 1, 54),
(800, 'San Carlos', 1, 5),
(801, 'San Carlos', 1, 23),
(802, 'San Carlos de Guaroa', 1, 50),
(803, 'San Cayetano', 1, 25),
(804, 'San Cayetano', 1, 54),
(805, 'San Cristobal', 1, 13),
(806, 'San Diego', 1, 20),
(807, 'San Eduardo', 1, 15),
(808, 'San Estanislao', 1, 13),
(809, 'San Fernando', 1, 13),
(810, 'San Francisco', 1, 5),
(811, 'San Francisco', 1, 25),
(812, 'San Francisco', 1, 86),
(813, 'San Gíl', 1, 68),
(814, 'San Jacinto', 1, 13),
(815, 'San Jacinto del Cauca', 1, 13),
(816, 'San Jerónimo', 1, 5),
(817, 'San Joaquín', 1, 68),
(818, 'San José', 1, 17),
(819, 'San José de Miranda', 1, 68),
(820, 'San José de Montaña', 1, 5),
(821, 'San José de Pare', 1, 15),
(822, 'San José de Uré', 1, 23),
(823, 'San José del Fragua', 1, 18),
(824, 'San José del Guaviare', 1, 95),
(825, 'San José del Palmar', 1, 27),
(826, 'San Juan de Arama', 1, 50),
(827, 'San Juan de Betulia', 1, 70),
(828, 'San Juan de Nepomuceno', 1, 13),
(829, 'San Juan de Pasto', 1, 52),
(830, 'San Juan de Río Seco', 1, 25),
(831, 'San Juan de Urabá', 1, 5),
(832, 'San Juan del Cesar', 1, 44),
(833, 'San Juanito', 1, 50),
(834, 'San Lorenzo', 1, 52),
(835, 'San Luis', 1, 73),
(836, 'San Luís', 1, 5),
(837, 'San Luís de Gaceno', 1, 15),
(838, 'San Luís de Palenque', 1, 85),
(839, 'San Marcos', 1, 70),
(840, 'San Martín', 1, 20),
(841, 'San Martín', 1, 50),
(842, 'San Martín de Loba', 1, 13),
(843, 'San Mateo', 1, 15),
(844, 'San Miguel', 1, 68),
(845, 'San Miguel', 1, 86),
(846, 'San Miguel de Sema', 1, 15),
(847, 'San Onofre', 1, 70),
(848, 'San Pablo', 1, 13),
(849, 'San Pablo', 1, 52),
(850, 'San Pablo de Borbur', 1, 15),
(851, 'San Pedro', 1, 5),
(852, 'San Pedro', 1, 70),
(853, 'San Pedro', 1, 76),
(854, 'San Pedro de Cartago', 1, 52),
(855, 'San Pedro de Urabá', 1, 5),
(856, 'San Pelayo', 1, 23),
(857, 'San Rafael', 1, 5),
(858, 'San Roque', 1, 5),
(859, 'San Sebastián', 1, 19),
(860, 'San Sebastián de Buenavista', 1, 47),
(861, 'San Vicente', 1, 5),
(862, 'San Vicente del Caguán', 1, 18),
(863, 'San Vicente del Chucurí', 1, 68),
(864, 'San Zenón', 1, 47),
(865, 'Sandoná', 1, 52),
(866, 'Santa Ana', 1, 47),
(867, 'Santa Bárbara', 1, 5),
(868, 'Santa Bárbara', 1, 68),
(869, 'Santa Bárbara (Iscuandé)', 1, 52),
(870, 'Santa Bárbara de Pinto', 1, 47),
(871, 'Santa Catalina', 1, 13),
(872, 'Santa Fé de Antioquia', 1, 5),
(873, 'Santa Genoveva de Docorodó', 1, 27),
(874, 'Santa Helena del Opón', 1, 68),
(875, 'Santa Isabel', 1, 73),
(876, 'Santa Lucía', 1, 8),
(877, 'Santa Marta', 1, 47),
(878, 'Santa María', 1, 15),
(879, 'Santa María', 1, 41),
(880, 'Santa Rosa', 1, 13),
(881, 'Santa Rosa', 1, 19),
(882, 'Santa Rosa de Cabal', 1, 66),
(883, 'Santa Rosa de Osos', 1, 5),
(884, 'Santa Rosa de Viterbo', 1, 15),
(885, 'Santa Rosa del Sur', 1, 13),
(886, 'Santa Rosalía', 1, 99),
(887, 'Santa Sofía', 1, 15),
(888, 'Santana', 1, 15),
(889, 'Santander de Quilichao', 1, 19),
(890, 'Santiago', 1, 54),
(891, 'Santiago', 1, 86),
(892, 'Santo Domingo', 1, 5),
(893, 'Santo Tomás', 1, 8),
(894, 'Santuario', 1, 5),
(895, 'Santuario', 1, 66),
(896, 'Sapuyes', 1, 52),
(897, 'Saravena', 1, 81),
(898, 'Sardinata', 1, 54),
(899, 'Sasaima', 1, 25),
(900, 'Sativanorte', 1, 15),
(901, 'Sativasur', 1, 15),
(902, 'Segovia', 1, 5),
(903, 'Sesquilé', 1, 25),
(904, 'Sevilla', 1, 76),
(905, 'Siachoque', 1, 15),
(906, 'Sibaté', 1, 25),
(907, 'Sibundoy', 1, 86),
(908, 'Silos', 1, 54),
(909, 'Silvania', 1, 25),
(910, 'Silvia', 1, 19),
(911, 'Simacota', 1, 68),
(912, 'Simijaca', 1, 25),
(913, 'Simití', 1, 13),
(914, 'Sincelejo', 1, 70),
(915, 'Sincé', 1, 70),
(916, 'Sipí', 1, 27),
(917, 'Sitionuevo', 1, 47),
(918, 'Soacha', 1, 25),
(919, 'Soatá', 1, 15),
(920, 'Socha', 1, 15),
(921, 'Socorro', 1, 68),
(922, 'Socotá', 1, 15),
(923, 'Sogamoso', 1, 15),
(924, 'Solano', 1, 18),
(925, 'Soledad', 1, 8),
(926, 'Solita', 1, 18),
(927, 'Somondoco', 1, 15),
(928, 'Sonsón', 1, 5),
(929, 'Sopetrán', 1, 5),
(930, 'Soplaviento', 1, 13),
(931, 'Sopó', 1, 25),
(932, 'Sora', 1, 15),
(933, 'Soracá', 1, 15),
(934, 'Sotaquirá', 1, 15),
(935, 'Sotara (Paispamba)', 1, 19),
(936, 'Sotomayor (Los Andes)', 1, 52),
(937, 'Suaita', 1, 68),
(938, 'Suan', 1, 8),
(939, 'Suaza', 1, 41),
(940, 'Subachoque', 1, 25),
(941, 'Sucre', 1, 19),
(942, 'Sucre', 1, 68),
(943, 'Sucre', 1, 70),
(944, 'Suesca', 1, 25),
(945, 'Supatá', 1, 25),
(946, 'Supía', 1, 17),
(947, 'Suratá', 1, 68),
(948, 'Susa', 1, 25),
(949, 'Susacón', 1, 15),
(950, 'Sutamarchán', 1, 15),
(951, 'Sutatausa', 1, 25),
(952, 'Sutatenza', 1, 15),
(953, 'Suárez', 1, 19),
(954, 'Suárez', 1, 73),
(955, 'Sácama', 1, 85),
(956, 'Sáchica', 1, 15),
(957, 'Tabio', 1, 25),
(958, 'Tadó', 1, 27),
(959, 'Talaigua Nuevo', 1, 13),
(960, 'Tamalameque', 1, 20),
(961, 'Tame', 1, 81),
(962, 'Taminango', 1, 52),
(963, 'Tangua', 1, 52),
(964, 'Taraira', 1, 97),
(965, 'Tarazá', 1, 5),
(966, 'Tarqui', 1, 41),
(967, 'Tarso', 1, 5),
(968, 'Tasco', 1, 15),
(969, 'Tauramena', 1, 85),
(970, 'Tausa', 1, 25),
(971, 'Tello', 1, 41),
(972, 'Tena', 1, 25),
(973, 'Tenerife', 1, 47),
(974, 'Tenjo', 1, 25),
(975, 'Tenza', 1, 15),
(976, 'Teorama', 1, 54),
(977, 'Teruel', 1, 41),
(978, 'Tesalia', 1, 41),
(979, 'Tibacuy', 1, 25),
(980, 'Tibaná', 1, 15),
(981, 'Tibasosa', 1, 15),
(982, 'Tibirita', 1, 25),
(983, 'Tibú', 1, 54),
(984, 'Tierralta', 1, 23),
(985, 'Timaná', 1, 41),
(986, 'Timbiquí', 1, 19),
(987, 'Timbío', 1, 19),
(988, 'Tinjacá', 1, 15),
(989, 'Tipacoque', 1, 15),
(990, 'Tiquisio (Puerto Rico)', 1, 13),
(991, 'Titiribí', 1, 5),
(992, 'Toca', 1, 15),
(993, 'Tocaima', 1, 25),
(994, 'Tocancipá', 1, 25),
(995, 'Toguí', 1, 15),
(996, 'Toledo', 1, 5),
(997, 'Toledo', 1, 54),
(998, 'Tolú', 1, 70),
(999, 'Tolú Viejo', 1, 70),
(1000, 'Tona', 1, 68),
(1001, 'Topagá', 1, 15),
(1002, 'Topaipí', 1, 25),
(1003, 'Toribío', 1, 19),
(1004, 'Toro', 1, 76),
(1005, 'Tota', 1, 15),
(1006, 'Totoró', 1, 19),
(1007, 'Trinidad', 1, 85),
(1008, 'Trujillo', 1, 76),
(1009, 'Tubará', 1, 8),
(1010, 'Tuchín', 1, 23),
(1011, 'Tulúa', 1, 76),
(1012, 'Tumaco', 1, 52),
(1013, 'Tunja', 1, 15),
(1014, 'Tunungua', 1, 15),
(1015, 'Turbaco', 1, 13),
(1016, 'Turbaná', 1, 13),
(1017, 'Turbo', 1, 5),
(1018, 'Turmequé', 1, 15),
(1019, 'Tuta', 1, 15),
(1020, 'Tutasá', 1, 15),
(1021, 'Támara', 1, 85),
(1022, 'Támesis', 1, 5),
(1023, 'Túquerres', 1, 52),
(1024, 'Ubalá', 1, 25),
(1025, 'Ubaque', 1, 25),
(1026, 'Ubaté', 1, 25),
(1027, 'Ulloa', 1, 76),
(1028, 'Une', 1, 25),
(1029, 'Unguía', 1, 27),
(1030, 'Unión Panamericana (ÁNIMAS)', 1, 27),
(1031, 'Uramita', 1, 5),
(1032, 'Uribe', 1, 50),
(1033, 'Uribia', 1, 44),
(1034, 'Urrao', 1, 5),
(1035, 'Urumita', 1, 44),
(1036, 'Usiacuri', 1, 8),
(1037, 'Valdivia', 1, 5),
(1038, 'Valencia', 1, 23),
(1039, 'Valle de San José', 1, 68),
(1040, 'Valle de San Juan', 1, 73),
(1041, 'Valle del Guamuez', 1, 86),
(1042, 'Valledupar', 1, 20),
(1043, 'Valparaiso', 1, 5),
(1044, 'Valparaiso', 1, 18),
(1045, 'Vegachí', 1, 5),
(1046, 'Venadillo', 1, 73),
(1047, 'Venecia', 1, 5),
(1048, 'Venecia (Ospina Pérez)', 1, 25),
(1049, 'Ventaquemada', 1, 15),
(1050, 'Vergara', 1, 25),
(1051, 'Versalles', 1, 76),
(1052, 'Vetas', 1, 68),
(1053, 'Viani', 1, 25),
(1054, 'Vigía del Fuerte', 1, 5),
(1055, 'Vijes', 1, 76),
(1056, 'Villa Caro', 1, 54),
(1057, 'Villa Rica', 1, 19),
(1058, 'Villa de Leiva', 1, 15),
(1059, 'Villa del Rosario', 1, 54),
(1060, 'Villagarzón', 1, 86),
(1061, 'Villagómez', 1, 25),
(1062, 'Villahermosa', 1, 73),
(1063, 'Villamaría', 1, 17),
(1064, 'Villanueva', 1, 13),
(1065, 'Villanueva', 1, 44),
(1066, 'Villanueva', 1, 68),
(1067, 'Villanueva', 1, 85),
(1068, 'Villapinzón', 1, 25),
(1069, 'Villarrica', 1, 73),
(1070, 'Villavicencio', 1, 50),
(1071, 'Villavieja', 1, 41),
(1072, 'Villeta', 1, 25),
(1073, 'Viotá', 1, 25),
(1074, 'Viracachá', 1, 15),
(1075, 'Vista Hermosa', 1, 50),
(1076, 'Viterbo', 1, 17),
(1077, 'Vélez', 1, 68),
(1078, 'Yacopí', 1, 25),
(1079, 'Yacuanquer', 1, 52),
(1080, 'Yaguará', 1, 41),
(1081, 'Yalí', 1, 5),
(1082, 'Yarumal', 1, 5),
(1083, 'Yolombó', 1, 5),
(1084, 'Yondó (Casabe)', 1, 5),
(1085, 'Yopal', 1, 85),
(1086, 'Yotoco', 1, 76),
(1087, 'Yumbo', 1, 76),
(1088, 'Zambrano', 1, 13),
(1089, 'Zapatoca', 1, 68),
(1090, 'Zapayán (PUNTA DE PIEDRAS)', 1, 47),
(1091, 'Zaragoza', 1, 5),
(1092, 'Zarzal', 1, 76),
(1093, 'Zetaquirá', 1, 15),
(1094, 'Zipacón', 1, 25),
(1095, 'Zipaquirá', 1, 25),
(1096, 'Zona Bananera (PRADO - SEVILLA)', 1, 47),
(1097, 'Ábrego', 1, 54),
(1098, 'Íquira', 1, 41),
(1099, 'Úmbita', 1, 15),
(1100, 'Útica', 1, 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `numero_deportistas`
--

CREATE TABLE `numero_deportistas` (
  `identificacion_deportista` bigint(12) NOT NULL,
  `numero_deportista` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `numero_deportistas`
--

INSERT INTO `numero_deportistas` (`identificacion_deportista`, `numero_deportista`) VALUES
(1070706445, 1),
(1021634361, 2),
(1010761194, 3),
(1001116580, 4),
(1141117422, 5),
(1016717117, 6),
(1031610702, 7),
(1011089051, 8),
(1019994075, 9),
(1032430132, 10),
(1077113202, 11),
(1076649358, 12),
(1077112198, 14),
(1034517530, 15),
(1013258654, 16),
(1000572241, 17),
(1007430443, 18),
(1076242675, 19),
(1013120819, 20),
(1025065780, 21),
(1003823631, 22),
(1127586877, 23),
(1001176360, 24),
(1003587952, 25),
(1076736394, 26),
(1075668080, 27),
(1034518759, 28),
(1076740612, 29),
(1076651239, 30),
(1069644048, 31),
(1071328354, 32),
(1070392328, 33),
(1014876720, 34),
(1077112032, 35),
(1021396139, 36),
(1031819670, 37),
(1171963141, 38),
(1031651663, 39),
(1025143187, 40),
(1034664918, 41),
(1051069079, 42),
(1073676830, 43),
(1072098423, 44),
(1031821947, 45),
(1032679384, 46),
(1107974783, 47),
(1014663368, 48),
(1000953434, 49),
(1000580163, 50),
(1000519061, 51),
(1028495132, 52),
(1013103234, 53),
(1028861317, 54),
(1029145291, 55),
(1013596355, 56),
(1013011276, 57),
(1014661459, 58),
(1011322214, 59),
(1073578093, 60),
(1011096326, 61),
(1003661217, 62),
(1092460821, 63),
(1000991074, 64),
(1141117120, 65),
(1192792199, 66),
(1220213080, 67),
(99091401610, 68),
(1007463366, 69),
(1016042324, 70),
(1075663864, 71),
(1032797264, 72),
(1028840499, 73),
(1066868012, 74),
(1069178077, 75),
(1028487211, 76),
(1025703882, 77),
(1025537881, 78),
(1025143332, 79),
(1024401789, 80),
(1072100505, 81),
(1072191624, 82),
(1072644595, 83),
(1072658958, 84),
(1022384407, 85),
(1073578159, 86),
(1016592458, 87),
(1031423968, 88),
(1075872344, 89);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil_usuario`
--

CREATE TABLE `perfil_usuario` (
  `ID` int(2) NOT NULL,
  `Perfil` char(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `perfil_usuario`
--

INSERT INTO `perfil_usuario` (`ID`, `Perfil`) VALUES
(1, 'Administrador'),
(2, 'Secretario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rama`
--

CREATE TABLE `rama` (
  `id` int(11) NOT NULL,
  `rama` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rama`
--

INSERT INTO `rama` (`id`, `rama`) VALUES
(1, 'Damas'),
(2, 'Varones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reconocimiento`
--

CREATE TABLE `reconocimiento` (
  `id` int(11) NOT NULL,
  `reconocimiento` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `reconocimiento`
--

INSERT INTO `reconocimiento` (`id`, `reconocimiento`) VALUES
(1, 'Si'),
(2, 'No');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultados_eventos_competencia_carriles`
--

CREATE TABLE `resultados_eventos_competencia_carriles` (
  `id` int(11) NOT NULL,
  `nombre_evento` varchar(100) NOT NULL,
  `carriles_listado` int(11) NOT NULL,
  `id_listado` int(11) NOT NULL,
  `numero_deportista` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `tipo_patin` varchar(50) NOT NULL,
  `club` varchar(100) NOT NULL,
  `categoria` varchar(15) NOT NULL,
  `posicion_octavos` int(2) NOT NULL,
  `tiempo_octavos` varchar(20) DEFAULT NULL,
  `miliseg_octavos` bigint(15) DEFAULT NULL,
  `resultados_octavos` varchar(20) DEFAULT NULL,
  `posicion_cuartos` int(2) NOT NULL,
  `tiempo_cuartos` varchar(20) DEFAULT NULL,
  `miliseg_cuartos` bigint(15) DEFAULT NULL,
  `resultados_cuartos` varchar(20) DEFAULT NULL,
  `posicion_semifinal` int(2) NOT NULL,
  `tiempo_semifinal` varchar(20) DEFAULT NULL,
  `miliseg_semifinal` bigint(15) DEFAULT NULL,
  `posicion_final` int(2) NOT NULL,
  `tiempo_final` varchar(20) DEFAULT NULL,
  `miliseg_final` bigint(15) DEFAULT NULL,
  `resultados_final` varchar(20) DEFAULT NULL,
  `observacion` varchar(10) DEFAULT NULL,
  `premiacion_final` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `resultados_eventos_competencia_carriles`
--

INSERT INTO `resultados_eventos_competencia_carriles` (`id`, `nombre_evento`, `carriles_listado`, `id_listado`, `numero_deportista`, `nombres`, `tipo_patin`, `club`, `categoria`, `posicion_octavos`, `tiempo_octavos`, `miliseg_octavos`, `resultados_octavos`, `posicion_cuartos`, `tiempo_cuartos`, `miliseg_cuartos`, `resultados_cuartos`, `posicion_semifinal`, `tiempo_semifinal`, `miliseg_semifinal`, `posicion_final`, `tiempo_final`, `miliseg_final`, `resultados_final`, `observacion`, `premiacion_final`) VALUES
(1, '1er departamental de escuelas de prueba', 10, 1, 153, 'ANDREA  CASTRO GARCIA', 'Semiprofesional', 'ECOPATIN', 'Transicion', 1, '0:40:123', 40123, '40123', 1, '0:44:123', 44123, 'Eliminado', 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(2, '1er departamental de escuelas de prueba', 10, 1, 69, 'SOFIA  ORJUELA BARRETO', 'Semiprofesional', 'IEDAN', 'Transicion', 2, '0:46:300', 46300, 'Eliminado', 0, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(3, '1er departamental de escuelas de prueba', 10, 1, 96, 'NICOLLE CASTILLO', 'Semiprofesional', 'TALENTO EN LINEA', 'Transicion', 3, '0:51:112', 51112, 'Eliminado', 0, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(4, '1er departamental de escuelas de prueba', 10, 1, 23, 'MARIA ALEJANDRA ROMERO RAMIREZ', 'Semiprofesional', 'CITIUS COTA', 'Transicion', 4, '0:43:723', 43723, '43723', 4, '0:46:100', 46100, '46100', 4, NULL, 999999999999996, 3, NULL, 999999999999996, '4', 'NT', ''),
(5, '1er departamental de escuelas de prueba', 10, 1, 53, 'ELYHANNA  BUITRAGO CACERES', 'Semiprofesional', 'ECOPATIN', 'Transicion', 5, '0:43:567', 43567, '43567', 3, '0:45:091', 45091, '45091', 3, '0:45:200', 45200, 4, '0:29:100', 29100, '3', NULL, 'Bronce'),
(6, '1er departamental de escuelas de prueba', 10, 1, 93, 'LAURA MURCIA', 'Semiprofesional', 'TALENTO EN LINEA', 'Transicion', 6, '0:43:301', 43301, '43301', 2, '0:41:800', 41800, '41800', 1, '0:42:198', 42198, 1, '0:34:123', 34123, '1', NULL, 'Oro'),
(7, '1er departamental de escuelas de prueba', 10, 1, 5, 'ANGELA MARIA DIAZ MONTA?A', 'Semiprofesional', 'AR SKATING', 'Transicion', 7, '0:51:100', 51100, '51100', 8, NULL, 999999999999996, 'Eliminado', 0, NULL, NULL, 0, NULL, NULL, NULL, 'NT', NULL),
(8, '1er departamental de escuelas de prueba', 10, 1, 60, 'MARIA FERNANDA RODRIGUEZ LOPEZ', 'Semiprofesional', 'IEDAN', 'Transicion', 8, '0:45:612', 45612, 'Eliminado', 0, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(9, '1er departamental de escuelas de prueba', 10, 1, 88, 'SARA URREGO', 'Semiprofesional', 'TALENTO EN LINEA', 'Transicion', 9, '0:41:100', 41100, 'Eliminado', 0, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(10, '1er departamental de escuelas de prueba', 10, 1, 36, 'SOFIA  NIETO GOMEZ', 'Semiprofesional', 'Club JGB', 'Transicion', 10, '0:45:100', 45100, '45100', 5, '0:44:100', 44100, '44100', 2, '0:45:100', 45100, 2, '0:34:156', 34156, '2', NULL, 'Plata'),
(11, '1er departamental de escuelas de prueba', 10, 1, 147, 'LAURA CALDERON', 'Semiprofesional', 'TALENTO EN LINEA', 'Transicion', 11, '0:49:295', 49295, '49295', 7, '0:46:865', 46865, 'Eliminado', 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(12, '1er departamental de escuelas de prueba', 10, 1, 78, 'LAURA SOFIA MORENO GUERRERO', 'Semiprofesional', 'REAL FUNZA', 'Transicion', 12, '0:45:432', 45432, 'Eliminado', 0, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(13, '1er departamental de escuelas de prueba', 10, 1, 89, 'LAURA RODRIGUEZ', 'Semiprofesional', 'TALENTO EN LINEA', 'Transicion', 13, '0:44:465', 44465, 'Eliminado', 0, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(14, '1er departamental de escuelas de prueba', 10, 1, 44, 'TANIA SOFIA RINCON LOZADA', 'Semiprofesional', 'CPF FUSAGASUGA', 'Transicion', 14, NULL, 999999999999996, 'Eliminado', 0, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, 'NT', NULL),
(15, '1er departamental de escuelas de prueba', 10, 1, 139, 'DANA CUERVO', 'Semiprofesional', 'TALENTO EN LINEA', 'Transicion', 15, NULL, 999999999999996, 'Eliminado', 0, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, 'NT', NULL),
(16, '1er departamental de escuelas de prueba', 10, 1, 121, 'MELANY BRUGOS', 'Semiprofesional', 'TALENTO EN LINEA', 'Transicion', 16, '0:45:234', 45234, '45234', 6, '0:42:098', 42098, 'Eliminado', 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(17, '1er departamental de escuelas de prueba', 12, 2, 19, 'ISABELLA  ALARCON CHAVES', 'Profesional No Avanzado', 'CITIUS COTA', 'Transicion', 1, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(18, '1er departamental de escuelas de prueba', 12, 2, 143, 'mariana Zambrano', 'Profesional No Avanzado', 'TALENTO EN LINEA', 'Transicion', 2, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(19, '1er departamental de escuelas de prueba', 12, 2, 86, 'MARIA DUARTE', 'Profesional No Avanzado', 'TALENTO EN LINEA', 'Transicion', 3, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(20, '1er departamental de escuelas de prueba', 12, 2, 84, 'ANGELA TIGA', 'Profesional No Avanzado', 'TALENTO EN LINEA', 'Transicion', 4, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(21, '1er departamental de escuelas de prueba', 12, 2, 47, 'ANNY  NI?O ', 'Profesional No Avanzado', 'CPF FUSAGASUGA', 'Transicion', 5, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(22, '1er departamental de escuelas de prueba', 12, 2, 10, 'ISABEL  OCHOA BELTRAN', 'Profesional No Avanzado', 'AR SKATING', 'Transicion', 6, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(23, '1er departamental de escuelas de prueba', 12, 2, 51, 'ANGELA MARIA DIAZ MONTA?A', 'Profesional No Avanzado', 'ECOPATIN', 'Transicion', 7, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(24, '1er departamental de escuelas de prueba', 12, 2, 26, 'SARA VANESSA DIAZ BALAGUERA', 'Profesional No Avanzado', 'Club JGB', 'Transicion', 8, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(25, '1er departamental de escuelas de prueba', 12, 2, 45, 'DANIELA SIERRA PINTO ', 'Profesional No Avanzado', 'CPF FUSAGASUGA', 'Transicion', 9, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(26, '1er departamental de escuelas de prueba', 12, 2, 30, 'LUISA FERNANDA TORRES MORALES', 'Profesional No Avanzado', 'Club JGB', 'Transicion', 10, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(27, '1er departamental de escuelas de prueba', 12, 2, 21, 'ISABELLA  ALDANA VELASQUEZ', 'Profesional No Avanzado', 'CITIUS COTA', 'Transicion', 11, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(28, '1er departamental de escuelas de prueba', 12, 2, 100, 'luciana ilarion', 'Profesional No Avanzado', 'TALENTO EN LINEA', 'Transicion', 12, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(29, '1er departamental de escuelas de prueba', 12, 2, 81, 'sara nicol villareal Rodr?guez', 'Profesional No Avanzado', 'REAL FUNZA', 'Transicion', 13, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(30, '1er departamental de escuelas de prueba', 12, 2, 154, 'ALYSON  CALDERON PATI?O', 'Profesional No Avanzado', 'ECOPATIN', 'Transicion', 14, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(31, '1er departamental de escuelas de prueba', 12, 2, 33, 'MARIA ALEJANDRA VARELA ', 'Profesional No Avanzado', 'Club JGB', 'Transicion', 15, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(32, '1er departamental de escuelas de prueba', 12, 2, 68, 'LAURA VALENTINA ROMERO TOVAR', 'Profesional No Avanzado', 'IEDAN', 'Transicion', 16, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultados_eventos_competencia_fondo_eliminacion`
--

CREATE TABLE `resultados_eventos_competencia_fondo_eliminacion` (
  `id` int(11) NOT NULL,
  `numero_deportista` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `tipo_patin` varchar(50) NOT NULL,
  `categorias` varchar(15) NOT NULL,
  `club` varchar(100) NOT NULL,
  `evento` varchar(100) NOT NULL,
  `listado` int(11) NOT NULL,
  `orden_llegada` int(2) DEFAULT NULL,
  `eliminado` varchar(3) DEFAULT NULL,
  `vuelta_eliminado` int(3) DEFAULT NULL,
  `observacion` varchar(10) DEFAULT NULL,
  `posicion` bigint(5) DEFAULT NULL,
  `premiacion` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `resultados_eventos_competencia_fondo_eliminacion`
--

INSERT INTO `resultados_eventos_competencia_fondo_eliminacion` (`id`, `numero_deportista`, `nombres`, `apellidos`, `tipo_patin`, `categorias`, `club`, `evento`, `listado`, `orden_llegada`, `eliminado`, `vuelta_eliminado`, `observacion`, `posicion`, `premiacion`) VALUES
(1, 11, 'SARAH ', 'RODRIGUEZ MUNEVAR', 'Semiprofesional', 'Menores', 'AR SKATING', '1er departamental de escuelas de prueba', 3, 1, 'NO', NULL, NULL, 1, 'Oro'),
(2, 20, 'LAURA CAMILA', 'CORZO SANCHES', 'Semiprofesional', 'Menores', 'CITIUS COTA', '1er departamental de escuelas de prueba', 3, NULL, 'SI', 50, 'NT', 51, NULL),
(3, 25, 'VALERIA ', 'NI?O GRECCO', 'Semiprofesional', 'Menores', 'Club JGB', '1er departamental de escuelas de prueba', 3, 5, 'NO', NULL, NULL, 5, NULL),
(4, 46, 'KAROL ', 'MONTENEGRO ', 'Semiprofesional', 'Menores', 'CPF FUSAGASUGA', '1er departamental de escuelas de prueba', 3, 3, 'NO', NULL, NULL, 3, 'Bronce'),
(5, 52, 'ISABEL SOFIA', 'AREVALO CASTA?EDA', 'Semiprofesional', 'Menores', 'ECOPATIN', '1er departamental de escuelas de prueba', 3, NULL, 'SI', 70, 'NT', 71, NULL),
(6, 70, 'LIZETH NATALIA', 'DELGADO ', 'Semiprofesional', 'Menores', 'IEDAN', '1er departamental de escuelas de prueba', 3, 4, 'NO', NULL, NULL, 4, NULL),
(7, 74, 'valeria ', 'delgado aldana', 'Semiprofesional', 'Menores', 'REAL FUNZA', '1er departamental de escuelas de prueba', 3, NULL, NULL, NULL, 'DNSP', 99997, NULL),
(8, 92, 'MARIA', 'CALDERON', 'Semiprofesional', 'Menores', 'TALENTO EN LINEA', '1er departamental de escuelas de prueba', 3, 2, 'NO', NULL, NULL, 2, 'Plata'),
(9, 87, 'JUANITA', 'ORTIZ', 'Semiprofesional', 'Menores', 'TALENTO EN LINEA', '1er departamental de escuelas de prueba', 3, NULL, 'SI', 50, 'DQST', 99998, NULL),
(10, 110, 'YUSTIN', 'RIOS', 'Semiprofesional', 'Menores', 'TALENTO EN LINEA', '1er departamental de escuelas de prueba', 3, NULL, NULL, NULL, 'DNSP', 99997, NULL),
(11, 19, 'DANNA VALENTINA', 'PRIETO SIATOYA', 'Profesional Avanzado', 'Mayores', 'COLSKATER ', '1er Ranking de Prueba Municipal Girardot', 17, 2, 'NO', NULL, NULL, 2, 'Plata'),
(12, 48, 'MARIA ESTEFANIA', 'FIGUEROA ', 'Profesional Avanzado', 'Mayores', 'REAL FUNZA', '1er Ranking de Prueba Municipal Girardot', 17, 3, 'NO', NULL, NULL, 3, 'Bronce'),
(13, 46, 'Mar?a FERNANDA', 'GALVIZ ', 'Profesional Avanzado', 'Transicion', 'REAL FUNZA', '1er Ranking de Prueba Municipal Girardot', 17, NULL, 'SI', 6, 'NT', 7, NULL),
(14, 59, 'ELIZABETH ', 'SANCHEZ BRAVO', 'Profesional Avanzado', 'Mayores', 'TALENTO EN LINEA', '1er Ranking de Prueba Municipal Girardot', 17, NULL, 'SI', 3, 'NT', 4, NULL),
(15, 56, 'VALERY CAMILA', 'BERNAL MALLORGA', 'Profesional Avanzado', 'Mayores', 'TALENTO EN LINEA', '1er Ranking de Prueba Municipal Girardot', 17, 1, 'NO', NULL, NULL, 1, 'Oro'),
(16, 58, 'KAREN DAIANA', 'BOCIGA VEGA', 'Profesional Avanzado', 'Mayores', 'TALENTO EN LINEA', '1er Ranking de Prueba Municipal Girardot', 17, NULL, 'SI', 4, 'NT', 5, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultados_eventos_competencia_fondo_puntos`
--

CREATE TABLE `resultados_eventos_competencia_fondo_puntos` (
  `id` int(11) NOT NULL,
  `numero_deportista` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `tipo_patin` varchar(50) NOT NULL,
  `categorias` varchar(15) NOT NULL,
  `club` varchar(100) NOT NULL,
  `evento` varchar(100) NOT NULL,
  `listado` int(11) NOT NULL,
  `orden_llegada` int(2) DEFAULT NULL,
  `puntos_totales` int(4) DEFAULT NULL,
  `observacion` varchar(10) DEFAULT NULL,
  `posicion` bigint(5) DEFAULT NULL,
  `premiacion` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `resultados_eventos_competencia_fondo_puntos`
--

INSERT INTO `resultados_eventos_competencia_fondo_puntos` (`id`, `numero_deportista`, `nombres`, `apellidos`, `tipo_patin`, `categorias`, `club`, `evento`, `listado`, `orden_llegada`, `puntos_totales`, `observacion`, `posicion`, `premiacion`) VALUES
(1, 11, 'SARAH ', 'RODRIGUEZ MUNEVAR', 'Semiprofesional', 'Menores', 'AR SKATING', '1er departamental de escuelas de prueba', 2, 5, 23, NULL, 23, NULL),
(2, 20, 'LAURA CAMILA', 'CORZO SANCHES', 'Semiprofesional', 'Menores', 'CITIUS COTA', '1er departamental de escuelas de prueba', 2, 2, 23, NULL, 26, NULL),
(3, 25, 'VALERIA ', 'NI?O GRECCO', 'Semiprofesional', 'Menores', 'Club JGB', '1er departamental de escuelas de prueba', 2, 3, 0, NULL, 0, NULL),
(4, 46, 'KAROL ', 'MONTENEGRO ', 'Semiprofesional', 'Menores', 'CPF FUSAGASUGA', '1er departamental de escuelas de prueba', 2, 3, 25, NULL, 27, NULL),
(5, 52, 'ISABEL SOFIA', 'AREVALO CASTA?EDA', 'Semiprofesional', 'Menores', 'ECOPATIN', '1er departamental de escuelas de prueba', 2, NULL, 12, 'NT', -99996, NULL),
(6, 70, 'LIZETH NATALIA', 'DELGADO ', 'Semiprofesional', 'Menores', 'IEDAN', '1er departamental de escuelas de prueba', 2, NULL, 11, 'NT', -99996, NULL),
(7, 74, 'valeria ', 'delgado aldana', 'Semiprofesional', 'Menores', 'REAL FUNZA', '1er departamental de escuelas de prueba', 2, 6, 12, NULL, 11, NULL),
(8, 92, 'MARIA', 'CALDERON', 'Semiprofesional', 'Menores', 'TALENTO EN LINEA', '1er departamental de escuelas de prueba', 2, NULL, NULL, 'NT', -99996, NULL),
(9, 87, 'JUANITA', 'ORTIZ', 'Semiprofesional', 'Menores', 'TALENTO EN LINEA', '1er departamental de escuelas de prueba', 2, NULL, NULL, 'NT', -99996, NULL),
(10, 110, 'YUSTIN', 'RIOS', 'Semiprofesional', 'Menores', 'TALENTO EN LINEA', '1er departamental de escuelas de prueba', 2, NULL, NULL, 'DNSP', -99997, NULL),
(11, 8, 'SANTIAGO ', 'MENDOZA PUENTES', 'Profesional No Avanzado', 'Transicion', 'AR SKATING', '1er departamental de escuelas de prueba', 14, 1, 4, NULL, 8, 'Oro'),
(12, 38, 'JUAN DAVID', 'GONZALEZ ', 'Profesional No Avanzado', 'Transicion', 'COLSKATER ', '1er departamental de escuelas de prueba', 14, 3, 4, NULL, 6, 'Bronce'),
(13, 155, 'JUAN SEBASTIAN', 'FUENTES TASCON', 'Profesional No Avanzado', 'Transicion', 'ECOPATIN', '1er departamental de escuelas de prueba', 14, NULL, NULL, 'NT', -99996, NULL),
(14, 62, 'BRAD NAJIB', 'PRIETO MORENO', 'Profesional No Avanzado', 'Transicion', 'IEDAN', '1er departamental de escuelas de prueba', 14, 3, 5, NULL, 7, 'Plata'),
(15, 133, 'JUAN', 'PERUGACHI', 'Profesional No Avanzado', 'Transicion', 'TALENTO EN LINEA', '1er departamental de escuelas de prueba', 14, 5, 3, NULL, 3, NULL),
(16, 19, 'DANNA VALENTINA', 'PRIETO SIATOYA', 'Profesional Avanzado', 'Mayores', 'COLSKATER ', '1er Ranking de Prueba Municipal Girardot', 16, 4, 7, NULL, 8, 'Plata'),
(17, 48, 'MARIA ESTEFANIA', 'FIGUEROA ', 'Profesional Avanzado', 'Mayores', 'REAL FUNZA', '1er Ranking de Prueba Municipal Girardot', 16, 1, 5, NULL, 9, 'Bronce'),
(18, 46, 'Mar?a FERNANDA', 'GALVIZ ', 'Profesional Avanzado', 'Transicion', 'REAL FUNZA', '1er Ranking de Prueba Municipal Girardot', 16, 3, 5, NULL, 7, NULL),
(19, 59, 'ELIZABETH ', 'SANCHEZ BRAVO', 'Profesional Avanzado', 'Mayores', 'TALENTO EN LINEA', '1er Ranking de Prueba Municipal Girardot', 16, 6, 4, NULL, 3, NULL),
(20, 56, 'VALERY CAMILA', 'BERNAL MALLORGA', 'Profesional Avanzado', 'Mayores', 'TALENTO EN LINEA', '1er Ranking de Prueba Municipal Girardot', 16, 2, 7, NULL, 10, 'Oro'),
(21, 58, 'KAREN DAIANA', 'BOCIGA VEGA', 'Profesional Avanzado', 'Mayores', 'TALENTO EN LINEA', '1er Ranking de Prueba Municipal Girardot', 16, 5, 5, NULL, 5, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultados_eventos_competencia_fondo_puntos_eliminacion`
--

CREATE TABLE `resultados_eventos_competencia_fondo_puntos_eliminacion` (
  `id` int(11) NOT NULL,
  `numero_deportista` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `tipo_patin` varchar(50) NOT NULL,
  `categorias` varchar(15) NOT NULL,
  `club` varchar(100) NOT NULL,
  `evento` varchar(100) NOT NULL,
  `listado` int(11) NOT NULL,
  `eliminado` varchar(3) DEFAULT NULL,
  `orden_llegada` int(2) DEFAULT NULL,
  `puntos_totales` int(4) DEFAULT NULL,
  `vuelta_eliminado` int(3) DEFAULT NULL,
  `observacion` varchar(10) DEFAULT NULL,
  `posicion` bigint(5) DEFAULT NULL,
  `premiacion` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `resultados_eventos_competencia_fondo_puntos_eliminacion`
--

INSERT INTO `resultados_eventos_competencia_fondo_puntos_eliminacion` (`id`, `numero_deportista`, `nombres`, `apellidos`, `tipo_patin`, `categorias`, `club`, `evento`, `listado`, `eliminado`, `orden_llegada`, `puntos_totales`, `vuelta_eliminado`, `observacion`, `posicion`, `premiacion`) VALUES
(1, 11, 'SARAH ', 'RODRIGUEZ MUNEVAR', 'Semiprofesional', 'Menores', 'AR SKATING', '1er departamental de escuelas de prueba', 4, 'SI', NULL, NULL, 90, 'DQSD', 99999, NULL),
(2, 20, 'LAURA CAMILA', 'CORZO SANCHES', 'Semiprofesional', 'Menores', 'CITIUS COTA', '1er departamental de escuelas de prueba', 4, 'SI', NULL, NULL, 70, 'NT', 71, 'Bronce'),
(3, 25, 'VALERIA ', 'NI?O GRECCO', 'Semiprofesional', 'Menores', 'Club JGB', '1er departamental de escuelas de prueba', 4, 'SI', NULL, NULL, 71, 'NT', 72, NULL),
(4, 46, 'KAROL ', 'MONTENEGRO ', 'Semiprofesional', 'Menores', 'CPF FUSAGASUGA', '1er departamental de escuelas de prueba', 4, 'NO', 1, 24, NULL, NULL, -23, 'Oro'),
(5, 52, 'ISABEL SOFIA', 'AREVALO CASTA?EDA', 'Semiprofesional', 'Menores', 'ECOPATIN', '1er departamental de escuelas de prueba', 4, 'SI', NULL, 5, 4, 'NT', 5, 'Plata'),
(6, 70, 'LIZETH NATALIA', 'DELGADO ', 'Semiprofesional', 'Menores', 'IEDAN', '1er departamental de escuelas de prueba', 4, NULL, NULL, NULL, NULL, 'DNSP', 99997, NULL),
(7, 74, 'valeria ', 'delgado aldana', 'Semiprofesional', 'Menores', 'REAL FUNZA', '1er departamental de escuelas de prueba', 4, 'SI', NULL, NULL, 53, 'DQST', 99998, NULL),
(8, 92, 'MARIA', 'CALDERON', 'Semiprofesional', 'Menores', 'TALENTO EN LINEA', '1er departamental de escuelas de prueba', 4, 'NO', 2, 0, NULL, NULL, 2, 'Oro'),
(9, 87, 'JUANITA', 'ORTIZ', 'Semiprofesional', 'Menores', 'TALENTO EN LINEA', '1er departamental de escuelas de prueba', 4, 'NO', 3, 24, NULL, NULL, -21, 'Plata'),
(10, 110, 'YUSTIN', 'RIOS', 'Semiprofesional', 'Menores', 'TALENTO EN LINEA', '1er departamental de escuelas de prueba', 4, 'NO', 4, 9, NULL, NULL, -5, 'Bronce'),
(11, 19, 'DANNA VALENTINA', 'PRIETO SIATOYA', 'Profesional Avanzado', 'Mayores', 'COLSKATER ', '1er Ranking de Prueba Municipal Girardot', 18, 'NO', 2, 7, NULL, NULL, -5, 'Oro'),
(12, 48, 'MARIA ESTEFANIA', 'FIGUEROA ', 'Profesional Avanzado', 'Mayores', 'REAL FUNZA', '1er Ranking de Prueba Municipal Girardot', 18, 'SI', NULL, 7, 4, 'NT', 5, NULL),
(13, 46, 'Mar?a FERNANDA', 'GALVIZ ', 'Profesional Avanzado', 'Transicion', 'REAL FUNZA', '1er Ranking de Prueba Municipal Girardot', 18, 'NO', 3, 7, NULL, NULL, -4, 'Plata'),
(14, 59, 'ELIZABETH ', 'SANCHEZ BRAVO', 'Profesional Avanzado', 'Mayores', 'TALENTO EN LINEA', '1er Ranking de Prueba Municipal Girardot', 18, 'SI', NULL, 5, 3, 'NT', 4, NULL),
(15, 56, 'VALERY CAMILA', 'BERNAL MALLORGA', 'Profesional Avanzado', 'Mayores', 'TALENTO EN LINEA', '1er Ranking de Prueba Municipal Girardot', 18, 'SI', NULL, 8, 5, 'NT', 6, NULL),
(16, 58, 'KAREN DAIANA', 'BOCIGA VEGA', 'Profesional Avanzado', 'Mayores', 'TALENTO EN LINEA', '1er Ranking de Prueba Municipal Girardot', 18, 'NO', 1, 4, NULL, NULL, -3, 'Bronce');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultados_eventos_competencia_habilidad`
--

CREATE TABLE `resultados_eventos_competencia_habilidad` (
  `id` int(11) NOT NULL,
  `numero_deportista` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `tipo_patin` varchar(50) NOT NULL,
  `categorias` varchar(15) NOT NULL,
  `club` varchar(100) NOT NULL,
  `evento` varchar(100) NOT NULL,
  `listado` int(11) NOT NULL,
  `tiempo` varchar(20) DEFAULT NULL,
  `tiempo_miliseg` bigint(15) DEFAULT NULL,
  `faltas` int(2) DEFAULT NULL,
  `tiempo_final` varchar(20) DEFAULT NULL,
  `final_miliseg` bigint(15) DEFAULT NULL,
  `premiacion` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `resultados_eventos_competencia_habilidad`
--

INSERT INTO `resultados_eventos_competencia_habilidad` (`id`, `numero_deportista`, `nombres`, `apellidos`, `tipo_patin`, `categorias`, `club`, `evento`, `listado`, `tiempo`, `tiempo_miliseg`, `faltas`, `tiempo_final`, `final_miliseg`, `premiacion`) VALUES
(1, 11, 'SARAH ', 'RODRIGUEZ MUNEVAR', 'Semiprofesional', 'Menores', 'AR SKATING', '1er departamental de escuelas de prueba', 1, '0:45:765', 45765, 0, '0:45:765', 45765, NULL),
(2, 20, 'LAURA CAMILA', 'CORZO SANCHES', 'Semiprofesional', 'Menores', 'CITIUS COTA', '1er departamental de escuelas de prueba', 1, '0:44:230', 44230, 2, '0:44:730', 44730, 'Plata'),
(3, 25, 'VALERIA ', 'NI?O GRECCO', 'Semiprofesional', 'Menores', 'Club JGB', '1er departamental de escuelas de prueba', 1, '0:45:712', 45712, 3, 'NT', 999999999999999, NULL),
(4, 46, 'KAROL ', 'MONTENEGRO ', 'Semiprofesional', 'Menores', 'CPF FUSAGASUGA', '1er departamental de escuelas de prueba', 1, '0:45:710', 45710, 0, '0:45:710', 45710, NULL),
(5, 52, 'ISABEL SOFIA', 'AREVALO CASTA?EDA', 'Semiprofesional', 'Menores', 'ECOPATIN', '1er departamental de escuelas de prueba', 1, '0:45:912', 45912, 2, '0:46:412', 46412, NULL),
(6, 70, 'LIZETH NATALIA', 'DELGADO ', 'Semiprofesional', 'Menores', 'IEDAN', '1er departamental de escuelas de prueba', 1, '0:43:412', 43412, 1, '0:43:662', 43662, 'Oro'),
(7, 74, 'valeria ', 'delgado aldana', 'Semiprofesional', 'Menores', 'REAL FUNZA', '1er departamental de escuelas de prueba', 1, NULL, NULL, NULL, 'DNSP', 9999999999999999, NULL),
(8, 92, 'MARIA', 'CALDERON', 'Semiprofesional', 'Menores', 'TALENTO EN LINEA', '1er departamental de escuelas de prueba', 1, '0:45:274', 45274, 0, '0:45:274', 45274, 'Bronce'),
(9, 87, 'JUANITA', 'ORTIZ', 'Semiprofesional', 'Menores', 'TALENTO EN LINEA', '1er departamental de escuelas de prueba', 1, NULL, NULL, NULL, 'DNSP', 9999999999999999, NULL),
(10, 110, 'YUSTIN', 'RIOS', 'Semiprofesional', 'Menores', 'TALENTO EN LINEA', '1er departamental de escuelas de prueba', 1, NULL, NULL, NULL, 'DNSP', 9999999999999999, NULL),
(11, 64, 'ANTONIA ', 'CALDERON JEREZ', 'Semiprofesional', 'Menores', 'IEDAN', '1er departamental de escuelas de prueba', 13, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 111, 'linda', 'cortes', 'Semiprofesional', 'Menores', 'TALENTO EN LINEA', '1er departamental de escuelas de prueba', 13, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 5, 'ANGELA MARIA', 'DIAZ MONTA?A', 'Semiprofesional', 'Transicion', 'AR SKATING', '1er departamental de escuelas de prueba', 20, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 23, 'MARIA ALEJANDRA', 'ROMERO RAMIREZ', 'Semiprofesional', 'Transicion', 'CITIUS COTA', '1er departamental de escuelas de prueba', 20, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 44, 'TANIA SOFIA', 'RINCON LOZADA', 'Semiprofesional', 'Transicion', 'CPF FUSAGASUGA', '1er departamental de escuelas de prueba', 20, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 53, 'ELYHANNA ', 'BUITRAGO CACERES', 'Semiprofesional', 'Transicion', 'ECOPATIN', '1er departamental de escuelas de prueba', 20, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 55, 'NICOL FERNANDA', 'GONZALEZ GARZON', 'Semiprofesional', 'Transicion', 'ECOPATIN', '1er departamental de escuelas de prueba', 20, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 153, 'ANDREA ', 'CASTRO GARCIA', 'Semiprofesional', 'Transicion', 'ECOPATIN', '1er departamental de escuelas de prueba', 20, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 156, 'LAURA ALEJANDRA', 'CHOACHI GUEVARA', 'Semiprofesional', 'Transicion', 'ECOPATIN', '1er departamental de escuelas de prueba', 20, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 60, 'MARIA FERNANDA', 'RODRIGUEZ LOPEZ', 'Semiprofesional', 'Transicion', 'IEDAN', '1er departamental de escuelas de prueba', 20, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 78, 'LAURA SOFIA', 'MORENO GUERRERO', 'Semiprofesional', 'Transicion', 'REAL FUNZA', '1er departamental de escuelas de prueba', 20, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 151, 'MICHELL ', 'GONZALEZ AREVALO', 'Semiprofesional', 'Transicion', 'REAL FUNZA', '1er departamental de escuelas de prueba', 20, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 121, 'MELANY', 'BRUGOS', 'Semiprofesional', 'Transicion', 'TALENTO EN LINEA', '1er departamental de escuelas de prueba', 20, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 147, 'LAURA', 'CALDERON', 'Semiprofesional', 'Transicion', 'TALENTO EN LINEA', '1er departamental de escuelas de prueba', 20, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 139, 'DANA', 'CUERVO', 'Semiprofesional', 'Transicion', 'TALENTO EN LINEA', '1er departamental de escuelas de prueba', 20, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 97, 'laura', 'pinto', 'Semiprofesional', 'Transicion', 'TALENTO EN LINEA', '1er departamental de escuelas de prueba', 20, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 96, 'NICOLLE', 'CASTILLO', 'Semiprofesional', 'Transicion', 'TALENTO EN LINEA', '1er departamental de escuelas de prueba', 20, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 95, 'JENIFER', 'MARTINEZ', 'Semiprofesional', 'Transicion', 'TALENTO EN LINEA', '1er departamental de escuelas de prueba', 20, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 93, 'LAURA', 'MURCIA', 'Semiprofesional', 'Transicion', 'TALENTO EN LINEA', '1er departamental de escuelas de prueba', 20, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 90, 'ana', 'Vargas', 'Semiprofesional', 'Transicion', 'TALENTO EN LINEA', '1er departamental de escuelas de prueba', 20, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 88, 'SARA', 'URREGO', 'Semiprofesional', 'Transicion', 'TALENTO EN LINEA', '1er departamental de escuelas de prueba', 20, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 89, 'LAURA', 'RODRIGUEZ', 'Semiprofesional', 'Transicion', 'TALENTO EN LINEA', '1er departamental de escuelas de prueba', 20, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 106, 'sharick', 'Gonz?lez', 'Semiprofesional', 'Transicion', 'TALENTO EN LINEA', '1er departamental de escuelas de prueba', 20, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultados_eventos_competencia_libre`
--

CREATE TABLE `resultados_eventos_competencia_libre` (
  `id` int(11) NOT NULL,
  `numero_deportista` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `tipo_patin` varchar(50) NOT NULL,
  `categorias` varchar(15) NOT NULL,
  `club` varchar(100) NOT NULL,
  `evento` varchar(100) NOT NULL,
  `listado` int(11) NOT NULL,
  `observacion` varchar(10) DEFAULT NULL,
  `posicion` bigint(5) DEFAULT NULL,
  `posicion_final` bigint(5) DEFAULT NULL,
  `premiacion` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `resultados_eventos_competencia_libre`
--

INSERT INTO `resultados_eventos_competencia_libre` (`id`, `numero_deportista`, `nombres`, `apellidos`, `tipo_patin`, `categorias`, `club`, `evento`, `listado`, `observacion`, `posicion`, `posicion_final`, `premiacion`) VALUES
(1, 11, 'SARAH ', 'RODRIGUEZ MUNEVAR', 'Semiprofesional', 'Menores', 'AR SKATING', '1er departamental de escuelas de prueba', 9, NULL, 1, 1, 'Oro'),
(2, 20, 'LAURA CAMILA', 'CORZO SANCHES', 'Semiprofesional', 'Menores', 'CITIUS COTA', '1er departamental de escuelas de prueba', 9, NULL, 2, 2, 'Plata'),
(3, 25, 'VALERIA ', 'NI?O GRECCO', 'Semiprofesional', 'Menores', 'Club JGB', '1er departamental de escuelas de prueba', 9, NULL, 6, 6, NULL),
(4, 46, 'KAROL ', 'MONTENEGRO ', 'Semiprofesional', 'Menores', 'CPF FUSAGASUGA', '1er departamental de escuelas de prueba', 9, NULL, 5, 5, NULL),
(5, 52, 'ISABEL SOFIA', 'AREVALO CASTA?EDA', 'Semiprofesional', 'Menores', 'ECOPATIN', '1er departamental de escuelas de prueba', 9, 'DNSP', NULL, 501, NULL),
(6, 70, 'LIZETH NATALIA', 'DELGADO ', 'Semiprofesional', 'Menores', 'IEDAN', '1er departamental de escuelas de prueba', 9, 'DQSD', NULL, 503, NULL),
(7, 74, 'valeria ', 'delgado aldana', 'Semiprofesional', 'Menores', 'REAL FUNZA', '1er departamental de escuelas de prueba', 9, 'DQST', NULL, 502, NULL),
(8, 92, 'MARIA', 'CALDERON', 'Semiprofesional', 'Menores', 'TALENTO EN LINEA', '1er departamental de escuelas de prueba', 9, NULL, 3, 3, 'Bronce'),
(9, 87, 'JUANITA', 'ORTIZ', 'Semiprofesional', 'Menores', 'TALENTO EN LINEA', '1er departamental de escuelas de prueba', 9, 'NT', NULL, 500, NULL),
(10, 110, 'YUSTIN', 'RIOS', 'Semiprofesional', 'Menores', 'TALENTO EN LINEA', '1er departamental de escuelas de prueba', 9, NULL, 4, 4, NULL),
(11, 19, 'DANNA VALENTINA', 'PRIETO SIATOYA', 'Profesional Avanzado', 'Mayores', 'COLSKATER ', '1er Ranking de Prueba Municipal Girardot', 19, NULL, NULL, NULL, NULL),
(12, 48, 'MARIA ESTEFANIA', 'FIGUEROA ', 'Profesional Avanzado', 'Mayores', 'REAL FUNZA', '1er Ranking de Prueba Municipal Girardot', 19, NULL, NULL, NULL, NULL),
(13, 46, 'Mar?a FERNANDA', 'GALVIZ ', 'Profesional Avanzado', 'Transicion', 'REAL FUNZA', '1er Ranking de Prueba Municipal Girardot', 19, NULL, NULL, NULL, NULL),
(14, 59, 'ELIZABETH ', 'SANCHEZ BRAVO', 'Profesional Avanzado', 'Mayores', 'TALENTO EN LINEA', '1er Ranking de Prueba Municipal Girardot', 19, NULL, NULL, NULL, NULL),
(15, 56, 'VALERY CAMILA', 'BERNAL MALLORGA', 'Profesional Avanzado', 'Mayores', 'TALENTO EN LINEA', '1er Ranking de Prueba Municipal Girardot', 19, NULL, NULL, NULL, NULL),
(16, 58, 'KAREN DAIANA', 'BOCIGA VEGA', 'Profesional Avanzado', 'Mayores', 'TALENTO EN LINEA', '1er Ranking de Prueba Municipal Girardot', 19, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultados_eventos_competencia_velocidad`
--

CREATE TABLE `resultados_eventos_competencia_velocidad` (
  `id` int(11) NOT NULL,
  `numero_deportista` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `tipo_patin` varchar(50) NOT NULL,
  `categorias` varchar(15) NOT NULL,
  `club` varchar(100) NOT NULL,
  `evento` varchar(100) NOT NULL,
  `listado` int(11) NOT NULL,
  `tiempo` varchar(20) DEFAULT NULL,
  `tiempo_miliseg` bigint(15) DEFAULT NULL,
  `observacion` varchar(10) DEFAULT NULL,
  `premiacion` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `resultados_eventos_competencia_velocidad`
--

INSERT INTO `resultados_eventos_competencia_velocidad` (`id`, `numero_deportista`, `nombres`, `apellidos`, `tipo_patin`, `categorias`, `club`, `evento`, `listado`, `tiempo`, `tiempo_miliseg`, `observacion`, `premiacion`) VALUES
(1, 11, 'SARAH ', 'RODRIGUEZ MUNEVAR', 'Semiprofesional', 'Menores', 'AR SKATING', '1er departamental de escuelas de prueba', 5, '0:25:125', 25125, NULL, 'Bronce'),
(2, 20, 'LAURA CAMILA', 'CORZO SANCHES', 'Semiprofesional', 'Menores', 'CITIUS COTA', '1er departamental de escuelas de prueba', 5, '0:34:245', 34245, NULL, NULL),
(3, 25, 'VALERIA ', 'NI?O GRECCO', 'Semiprofesional', 'Menores', 'Club JGB', '1er departamental de escuelas de prueba', 5, NULL, 999999999999997, 'DNSP', NULL),
(4, 46, 'KAROL ', 'MONTENEGRO ', 'Semiprofesional', 'Menores', 'CPF FUSAGASUGA', '1er departamental de escuelas de prueba', 5, NULL, 999999999999996, 'NT', NULL),
(5, 52, 'ISABEL SOFIA', 'AREVALO CASTA?EDA', 'Semiprofesional', 'Menores', 'ECOPATIN', '1er departamental de escuelas de prueba', 5, '0:42:843', 42843, NULL, NULL),
(6, 70, 'LIZETH NATALIA', 'DELGADO ', 'Semiprofesional', 'Menores', 'IEDAN', '1er departamental de escuelas de prueba', 5, '0:15:999', 15999, NULL, 'Oro'),
(7, 74, 'valeria ', 'delgado aldana', 'Semiprofesional', 'Menores', 'REAL FUNZA', '1er departamental de escuelas de prueba', 5, NULL, 999999999999997, 'DNSP', NULL),
(8, 92, 'MARIA', 'CALDERON', 'Semiprofesional', 'Menores', 'TALENTO EN LINEA', '1er departamental de escuelas de prueba', 5, '0:23:125', 23125, NULL, 'Plata'),
(9, 87, 'JUANITA', 'ORTIZ', 'Semiprofesional', 'Menores', 'TALENTO EN LINEA', '1er departamental de escuelas de prueba', 5, '0:45:124', 45124, NULL, NULL),
(10, 110, 'YUSTIN', 'RIOS', 'Semiprofesional', 'Menores', 'TALENTO EN LINEA', '1er departamental de escuelas de prueba', 5, NULL, 999999999999998, 'DQST', NULL),
(11, 11, 'SARAH ', 'RODRIGUEZ MUNEVAR', 'Semiprofesional', 'Menores', 'AR SKATING', '1er departamental de escuelas de prueba', 7, NULL, NULL, NULL, NULL),
(12, 20, 'LAURA CAMILA', 'CORZO SANCHES', 'Semiprofesional', 'Menores', 'CITIUS COTA', '1er departamental de escuelas de prueba', 7, NULL, NULL, NULL, NULL),
(13, 25, 'VALERIA ', 'NI?O GRECCO', 'Semiprofesional', 'Menores', 'Club JGB', '1er departamental de escuelas de prueba', 7, NULL, NULL, NULL, NULL),
(14, 46, 'KAROL ', 'MONTENEGRO ', 'Semiprofesional', 'Menores', 'CPF FUSAGASUGA', '1er departamental de escuelas de prueba', 7, NULL, NULL, NULL, NULL),
(15, 52, 'ISABEL SOFIA', 'AREVALO CASTA?EDA', 'Semiprofesional', 'Menores', 'ECOPATIN', '1er departamental de escuelas de prueba', 7, NULL, NULL, NULL, NULL),
(16, 70, 'LIZETH NATALIA', 'DELGADO ', 'Semiprofesional', 'Menores', 'IEDAN', '1er departamental de escuelas de prueba', 7, NULL, NULL, NULL, NULL),
(17, 74, 'valeria ', 'delgado aldana', 'Semiprofesional', 'Menores', 'REAL FUNZA', '1er departamental de escuelas de prueba', 7, NULL, NULL, NULL, NULL),
(18, 92, 'MARIA', 'CALDERON', 'Semiprofesional', 'Menores', 'TALENTO EN LINEA', '1er departamental de escuelas de prueba', 7, NULL, NULL, NULL, NULL),
(19, 87, 'JUANITA', 'ORTIZ', 'Semiprofesional', 'Menores', 'TALENTO EN LINEA', '1er departamental de escuelas de prueba', 7, NULL, NULL, NULL, NULL),
(20, 110, 'YUSTIN', 'RIOS', 'Semiprofesional', 'Menores', 'TALENTO EN LINEA', '1er departamental de escuelas de prueba', 7, NULL, NULL, NULL, NULL),
(21, 11, 'SARAH ', 'RODRIGUEZ MUNEVAR', 'Semiprofesional', 'Menores', 'AR SKATING', '1er departamental de escuelas de prueba', 8, '0:09:100', 9100, NULL, 'Plata'),
(22, 20, 'LAURA CAMILA', 'CORZO SANCHES', 'Semiprofesional', 'Menores', 'CITIUS COTA', '1er departamental de escuelas de prueba', 8, '0:10:254', 10254, NULL, 'Bronce'),
(23, 25, 'VALERIA ', 'NI?O GRECCO', 'Semiprofesional', 'Menores', 'Club JGB', '1er departamental de escuelas de prueba', 8, '1:00:955', 60955, NULL, NULL),
(24, 46, 'KAROL ', 'MONTENEGRO ', 'Semiprofesional', 'Menores', 'CPF FUSAGASUGA', '1er departamental de escuelas de prueba', 8, NULL, 999999999999997, 'DNSP', NULL),
(25, 52, 'ISABEL SOFIA', 'AREVALO CASTA?EDA', 'Semiprofesional', 'Menores', 'ECOPATIN', '1er departamental de escuelas de prueba', 8, NULL, 999999999999997, 'DNSP', NULL),
(26, 70, 'LIZETH NATALIA', 'DELGADO ', 'Semiprofesional', 'Menores', 'IEDAN', '1er departamental de escuelas de prueba', 8, NULL, 999999999999998, 'DQST', NULL),
(27, 74, 'valeria ', 'delgado aldana', 'Semiprofesional', 'Menores', 'REAL FUNZA', '1er departamental de escuelas de prueba', 8, NULL, 999999999999999, 'DQSD', NULL),
(28, 92, 'MARIA', 'CALDERON', 'Semiprofesional', 'Menores', 'TALENTO EN LINEA', '1er departamental de escuelas de prueba', 8, '0:25:751', 25751, NULL, NULL),
(29, 87, 'JUANITA', 'ORTIZ', 'Semiprofesional', 'Menores', 'TALENTO EN LINEA', '1er departamental de escuelas de prueba', 8, NULL, 999999999999996, 'NT', NULL),
(30, 110, 'YUSTIN', 'RIOS', 'Semiprofesional', 'Menores', 'TALENTO EN LINEA', '1er departamental de escuelas de prueba', 8, '0:09:099', 9099, NULL, 'Oro'),
(31, 5, 'ANGELA MARIA', 'DIAZ MONTA?A', 'Semiprofesional', 'Transicion', 'AR SKATING', '1er departamental de escuelas de prueba', 10, '0:45:236', 45236, NULL, NULL),
(32, 23, 'MARIA ALEJANDRA', 'ROMERO RAMIREZ', 'Semiprofesional', 'Transicion', 'CITIUS COTA', '1er departamental de escuelas de prueba', 10, '0:44:761', 44761, NULL, NULL),
(33, 36, 'SOFIA ', 'NIETO GOMEZ', 'Semiprofesional', 'Transicion', 'Club JGB', '1er departamental de escuelas de prueba', 10, '0:45:922', 45922, NULL, NULL),
(34, 44, 'TANIA SOFIA', 'RINCON LOZADA', 'Semiprofesional', 'Transicion', 'CPF FUSAGASUGA', '1er departamental de escuelas de prueba', 10, '0:46:867', 46867, NULL, NULL),
(35, 53, 'ELYHANNA ', 'BUITRAGO CACERES', 'Semiprofesional', 'Transicion', 'ECOPATIN', '1er departamental de escuelas de prueba', 10, '0:44:887', 44887, NULL, NULL),
(36, 55, 'NICOL FERNANDA', 'GONZALEZ GARZON', 'Semiprofesional', 'Transicion', 'ECOPATIN', '1er departamental de escuelas de prueba', 10, NULL, 999999999999997, 'DNSP', NULL),
(37, 153, 'ANDREA ', 'CASTRO GARCIA', 'Semiprofesional', 'Transicion', 'ECOPATIN', '1er departamental de escuelas de prueba', 10, '0:43:100', 43100, NULL, 'Oro'),
(38, 156, 'LAURA ALEJANDRA', 'CHOACHI GUEVARA', 'Semiprofesional', 'Transicion', 'ECOPATIN', '1er departamental de escuelas de prueba', 10, NULL, 999999999999996, 'NT', NULL),
(39, 60, 'MARIA FERNANDA', 'RODRIGUEZ LOPEZ', 'Semiprofesional', 'Transicion', 'IEDAN', '1er departamental de escuelas de prueba', 10, '0:45:611', 45611, NULL, NULL),
(40, 69, 'SOFIA ', 'ORJUELA BARRETO', 'Semiprofesional', 'Transicion', 'IEDAN', '1er departamental de escuelas de prueba', 10, '0:44:200', 44200, NULL, 'Plata'),
(41, 78, 'LAURA SOFIA', 'MORENO GUERRERO', 'Semiprofesional', 'Transicion', 'REAL FUNZA', '1er departamental de escuelas de prueba', 10, '0:46:233', 46233, NULL, NULL),
(42, 151, 'MICHELL ', 'GONZALEZ AREVALO', 'Semiprofesional', 'Transicion', 'REAL FUNZA', '1er departamental de escuelas de prueba', 10, '0:51:542', 51542, NULL, NULL),
(43, 121, 'MELANY', 'BRUGOS', 'Semiprofesional', 'Transicion', 'TALENTO EN LINEA', '1er departamental de escuelas de prueba', 10, '0:48:121', 48121, NULL, NULL),
(44, 147, 'LAURA', 'CALDERON', 'Semiprofesional', 'Transicion', 'TALENTO EN LINEA', '1er departamental de escuelas de prueba', 10, '0:46:147', 46147, NULL, NULL),
(45, 139, 'DANA', 'CUERVO', 'Semiprofesional', 'Transicion', 'TALENTO EN LINEA', '1er departamental de escuelas de prueba', 10, '0:47:139', 47139, NULL, NULL),
(46, 97, 'laura', 'pinto', 'Semiprofesional', 'Transicion', 'TALENTO EN LINEA', '1er departamental de escuelas de prueba', 10, '0:50:311', 50311, NULL, NULL),
(47, 96, 'NICOLLE', 'CASTILLO', 'Semiprofesional', 'Transicion', 'TALENTO EN LINEA', '1er departamental de escuelas de prueba', 10, '0:44:510', 44510, NULL, 'Bronce'),
(48, 95, 'JENIFER', 'MARTINEZ', 'Semiprofesional', 'Transicion', 'TALENTO EN LINEA', '1er departamental de escuelas de prueba', 10, '0:48:348', 48348, NULL, NULL),
(49, 93, 'LAURA', 'MURCIA', 'Semiprofesional', 'Transicion', 'TALENTO EN LINEA', '1er departamental de escuelas de prueba', 10, '0:45:100', 45100, NULL, NULL),
(50, 90, 'ana', 'Vargas', 'Semiprofesional', 'Transicion', 'TALENTO EN LINEA', '1er departamental de escuelas de prueba', 10, NULL, 999999999999998, 'DQST', NULL),
(51, 88, 'SARA', 'URREGO', 'Semiprofesional', 'Transicion', 'TALENTO EN LINEA', '1er departamental de escuelas de prueba', 10, '0:45:855', 45855, NULL, NULL),
(52, 89, 'LAURA', 'RODRIGUEZ', 'Semiprofesional', 'Transicion', 'TALENTO EN LINEA', '1er departamental de escuelas de prueba', 10, '0:46:601', 46601, NULL, NULL),
(53, 106, 'sharick', 'Gonz?lez', 'Semiprofesional', 'Transicion', 'TALENTO EN LINEA', '1er departamental de escuelas de prueba', 10, '0:49:278', 49278, NULL, NULL),
(64, 10, 'ISABEL ', 'OCHOA BELTRAN', 'Profesional No Avanzado', 'Transicion', 'AR SKATING', '1er departamental de escuelas de prueba', 12, '0:25:154', 25154, NULL, NULL),
(65, 21, 'ISABELLA ', 'ALDANA VELASQUEZ', 'Profesional No Avanzado', 'Transicion', 'CITIUS COTA', '1er departamental de escuelas de prueba', 12, '0:34:248', 34248, NULL, NULL),
(66, 19, 'ISABELLA ', 'ALARCON CHAVES', 'Profesional No Avanzado', 'Transicion', 'CITIUS COTA', '1er departamental de escuelas de prueba', 12, '0:12:124', 12124, NULL, 'Oro'),
(67, 26, 'SARA VANESSA', 'DIAZ BALAGUERA', 'Profesional No Avanzado', 'Transicion', 'Club JGB', '1er departamental de escuelas de prueba', 12, '0:25:354', 25354, NULL, NULL),
(68, 30, 'LUISA FERNANDA', 'TORRES MORALES', 'Profesional No Avanzado', 'Transicion', 'Club JGB', '1er departamental de escuelas de prueba', 12, '0:30:254', 30254, NULL, NULL),
(69, 33, 'MARIA ALEJANDRA', 'VARELA ', 'Profesional No Avanzado', 'Transicion', 'Club JGB', '1er departamental de escuelas de prueba', 12, '0:60:205', 60205, NULL, NULL),
(70, 47, 'ANNY ', 'NI?O ', 'Profesional No Avanzado', 'Transicion', 'CPF FUSAGASUGA', '1er departamental de escuelas de prueba', 12, '0:24:916', 24916, NULL, NULL),
(71, 45, 'DANIELA SIERRA', 'PINTO ', 'Profesional No Avanzado', 'Transicion', 'CPF FUSAGASUGA', '1er departamental de escuelas de prueba', 12, '0:25:554', 25554, NULL, NULL),
(72, 51, 'ANGELA MARIA', 'DIAZ MONTA?A', 'Profesional No Avanzado', 'Transicion', 'ECOPATIN', '1er departamental de escuelas de prueba', 12, '0:25:224', 25224, NULL, NULL),
(73, 154, 'ALYSON ', 'CALDERON PATI?O', 'Profesional No Avanzado', 'Transicion', 'ECOPATIN', '1er departamental de escuelas de prueba', 12, '0:60:000', 60000, NULL, NULL),
(74, 68, 'LAURA VALENTINA', 'ROMERO TOVAR', 'Profesional No Avanzado', 'Transicion', 'IEDAN', '1er departamental de escuelas de prueba', 12, NULL, 999999999999997, 'DNSP', NULL),
(75, 61, 'LIZETH MARIANA', 'INFANTES ', 'Profesional No Avanzado', 'Transicion', 'IEDAN', '1er departamental de escuelas de prueba', 12, NULL, 999999999999997, 'DNSP', NULL),
(76, 81, 'sara nicol', 'villareal Rodr?guez', 'Profesional No Avanzado', 'Transicion', 'REAL FUNZA', '1er departamental de escuelas de prueba', 12, '0:54:258', 54258, NULL, NULL),
(77, 143, 'mariana', 'Zambrano', 'Profesional No Avanzado', 'Transicion', 'TALENTO EN LINEA', '1er departamental de escuelas de prueba', 12, '0:12:155', 12155, NULL, 'Plata'),
(78, 136, 'MICHELL', 'MU?OZ?', 'Profesional No Avanzado', 'Transicion', 'TALENTO EN LINEA', '1er departamental de escuelas de prueba', 12, NULL, 999999999999999, 'DQSD', NULL),
(79, 84, 'ANGELA', 'TIGA', 'Profesional No Avanzado', 'Transicion', 'TALENTO EN LINEA', '1er departamental de escuelas de prueba', 12, '0:24:685', 24685, NULL, 'Bronce'),
(80, 86, 'MARIA', 'DUARTE', 'Profesional No Avanzado', 'Transicion', 'TALENTO EN LINEA', '1er departamental de escuelas de prueba', 12, '0:18:999', 18999, NULL, 'Plata'),
(81, 99, 'KAROL', 'MU?OZ', 'Profesional No Avanzado', 'Transicion', 'TALENTO EN LINEA', '1er departamental de escuelas de prueba', 12, NULL, 999999999999998, 'DQST', NULL),
(82, 100, 'luciana', 'ilarion', 'Profesional No Avanzado', 'Transicion', 'TALENTO EN LINEA', '1er departamental de escuelas de prueba', 12, '0:54:254', 54254, NULL, NULL),
(83, 19, 'DANNA VALENTINA', 'PRIETO SIATOYA', 'Profesional Avanzado', 'Mayores', 'COLSKATER ', '1er Ranking de Prueba Municipal Girardot', 15, '0:44:567', 44567, NULL, 'Plata'),
(84, 48, 'MARIA ESTEFANIA', 'FIGUEROA ', 'Profesional Avanzado', 'Mayores', 'REAL FUNZA', '1er Ranking de Prueba Municipal Girardot', 15, '0:46:230', 46230, NULL, NULL),
(85, 46, 'Mar?a FERNANDA', 'GALVIZ ', 'Profesional Avanzado', 'Transicion', 'REAL FUNZA', '1er Ranking de Prueba Municipal Girardot', 15, '0:46:043', 46043, NULL, 'Bronce'),
(86, 59, 'ELIZABETH ', 'SANCHEZ BRAVO', 'Profesional Avanzado', 'Mayores', 'TALENTO EN LINEA', '1er Ranking de Prueba Municipal Girardot', 15, '0:46:553', 46553, NULL, NULL),
(87, 56, 'VALERY CAMILA', 'BERNAL MALLORGA', 'Profesional Avanzado', 'Mayores', 'TALENTO EN LINEA', '1er Ranking de Prueba Municipal Girardot', 15, NULL, 999999999999996, 'NT', NULL),
(88, 58, 'KAREN DAIANA', 'BOCIGA VEGA', 'Profesional Avanzado', 'Mayores', 'TALENTO EN LINEA', '1er Ranking de Prueba Municipal Girardot', 15, '0:43:871', 43871, NULL, 'Oro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_eventos`
--

CREATE TABLE `tipo_eventos` (
  `id` int(11) NOT NULL,
  `tipo_evento` varchar(20) NOT NULL,
  `descripcion` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_eventos`
--

INSERT INTO `tipo_eventos` (`id`, `tipo_evento`, `descripcion`) VALUES
(1, 'Escuelas', 'Patin Semi Profesional - Patin Profesional No Avanzado'),
(2, 'Ranking', 'Patin Profesional Avanzado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_identificacion`
--

CREATE TABLE `tipo_identificacion` (
  `id` int(11) NOT NULL,
  `tipo_identificacion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_identificacion`
--

INSERT INTO `tipo_identificacion` (`id`, `tipo_identificacion`) VALUES
(1, 'RC'),
(2, 'TI'),
(3, 'CC'),
(4, 'CE'),
(5, 'PAS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_patin`
--

CREATE TABLE `tipo_patin` (
  `id` int(11) NOT NULL,
  `tipo_patin` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_patin`
--

INSERT INTO `tipo_patin` (`id`, `tipo_patin`) VALUES
(3, 'Profesional Avanzado'),
(2, 'Profesional No Avanzado'),
(1, 'Semiprofesional');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(11) NOT NULL,
  `Usuario` varchar(20) NOT NULL,
  `Rol` varchar(20) NOT NULL,
  `Clave` varchar(50) NOT NULL,
  `Perfil_Usuario` int(11) NOT NULL,
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `Usuario`, `Rol`, `Clave`, `Perfil_Usuario`, `Estado`) VALUES
(1, 'Admin', 'Administrador', '3165ef863aed4fbc217240902c0d21c3', 1, 1),
(2, 'Secretario1', 'Secretario', '9f39ba248c839ee64b43cc48b9c876e7', 2, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categoria` (`categoria`);

--
-- Indices de la tabla `categorias_resultados`
--
ALTER TABLE `categorias_resultados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categorias_resultados` (`categorias_resultados`);

--
-- Indices de la tabla `clubes`
--
ALTER TABLE `clubes`
  ADD PRIMARY KEY (`nombre_corto_club`),
  ADD UNIQUE KEY `nombre_completo_club` (`nombre_completo_club`),
  ADD UNIQUE KEY `token` (`token`) USING BTREE,
  ADD KEY `cargo` (`cargo`) USING BTREE,
  ADD KEY `reconocimiento` (`reconocimiento`) USING BTREE,
  ADD KEY `departamentos` (`departamento`),
  ADD KEY `municipios` (`municipio`),
  ADD KEY `estado` (`estado`) USING BTREE;

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id_departamento`);

--
-- Indices de la tabla `deportistas`
--
ALTER TABLE `deportistas`
  ADD PRIMARY KEY (`identificacion`),
  ADD KEY `nombre_corto_club` (`nombre_corto_club`),
  ADD KEY `rama` (`rama`) USING BTREE,
  ADD KEY `ligado` (`ligado`) USING BTREE,
  ADD KEY `tipo_patin` (`tipo_patin`) USING BTREE,
  ADD KEY `tipo_identificacion` (`tipo_identificacion`) USING BTREE,
  ADD KEY `estado` (`estado`),
  ADD KEY `departamento` (`departamento`),
  ADD KEY `categoria` (`categoria`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Estado` (`Estado`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`),
  ADD KEY `municipio` (`municipio`) USING BTREE,
  ADD KEY `tipo_evento` (`tipo_evento`);

--
-- Indices de la tabla `inscripcion_deportistas_eventos_escuelas`
--
ALTER TABLE `inscripcion_deportistas_eventos_escuelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deportista` (`identificacion_deportista`),
  ADD KEY `evento` (`evento`),
  ADD KEY `club` (`club`),
  ADD KEY `tipo_patin` (`tipo_patin`),
  ADD KEY `categoria` (`categoria`),
  ADD KEY `rama` (`rama`);

--
-- Indices de la tabla `inscripcion_deportistas_eventos_ranking`
--
ALTER TABLE `inscripcion_deportistas_eventos_ranking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deportista` (`identificacion_deportista`),
  ADD KEY `evento` (`evento`),
  ADD KEY `club` (`club`),
  ADD KEY `categoria` (`categoria`),
  ADD KEY `rama` (`rama`),
  ADD KEY `numero_deportista` (`numero_deportista`) USING BTREE,
  ADD KEY `tipo_patin` (`tipo_patin`);

--
-- Indices de la tabla `inscripcion_evento_clubes`
--
ALTER TABLE `inscripcion_evento_clubes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evento` (`evento`),
  ADD KEY `club` (`club`);

--
-- Indices de la tabla `ligado`
--
ALTER TABLE `ligado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `listados_carriles`
--
ALTER TABLE `listados_carriles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `listados_remates` (`id_listado_carriles`);

--
-- Indices de la tabla `listados_eventos`
--
ALTER TABLE `listados_eventos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre_listado` (`nombre_listado`),
  ADD KEY `evento` (`evento`);

--
-- Indices de la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD PRIMARY KEY (`id_municipio`),
  ADD KEY `departamento_id` (`departamento_id`);

--
-- Indices de la tabla `numero_deportistas`
--
ALTER TABLE `numero_deportistas`
  ADD PRIMARY KEY (`identificacion_deportista`),
  ADD UNIQUE KEY `numero_deportista` (`numero_deportista`);

--
-- Indices de la tabla `perfil_usuario`
--
ALTER TABLE `perfil_usuario`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `rama`
--
ALTER TABLE `rama`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rama` (`rama`);

--
-- Indices de la tabla `reconocimiento`
--
ALTER TABLE `reconocimiento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `resultados_eventos_competencia_carriles`
--
ALTER TABLE `resultados_eventos_competencia_carriles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo_patin` (`tipo_patin`),
  ADD KEY `nombre_evento` (`nombre_evento`),
  ADD KEY `carriles_listado` (`carriles_listado`),
  ADD KEY `id_listado` (`id_listado`),
  ADD KEY `club` (`club`),
  ADD KEY `categoria` (`categoria`);

--
-- Indices de la tabla `resultados_eventos_competencia_fondo_eliminacion`
--
ALTER TABLE `resultados_eventos_competencia_fondo_eliminacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo_patin` (`tipo_patin`),
  ADD KEY `evento` (`evento`),
  ADD KEY `listado` (`listado`),
  ADD KEY `club` (`club`),
  ADD KEY `categorias` (`categorias`);

--
-- Indices de la tabla `resultados_eventos_competencia_fondo_puntos`
--
ALTER TABLE `resultados_eventos_competencia_fondo_puntos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo_patin` (`tipo_patin`),
  ADD KEY `evento` (`evento`),
  ADD KEY `listado` (`listado`),
  ADD KEY `club` (`club`),
  ADD KEY `categorias` (`categorias`);

--
-- Indices de la tabla `resultados_eventos_competencia_fondo_puntos_eliminacion`
--
ALTER TABLE `resultados_eventos_competencia_fondo_puntos_eliminacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo_patin` (`tipo_patin`),
  ADD KEY `evento` (`evento`),
  ADD KEY `listado` (`listado`),
  ADD KEY `club` (`club`),
  ADD KEY `categorias` (`categorias`);

--
-- Indices de la tabla `resultados_eventos_competencia_habilidad`
--
ALTER TABLE `resultados_eventos_competencia_habilidad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo_patin` (`tipo_patin`),
  ADD KEY `evento` (`evento`),
  ADD KEY `listado` (`listado`),
  ADD KEY `club` (`club`),
  ADD KEY `categorias` (`categorias`);

--
-- Indices de la tabla `resultados_eventos_competencia_libre`
--
ALTER TABLE `resultados_eventos_competencia_libre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo_patin` (`tipo_patin`),
  ADD KEY `evento` (`evento`),
  ADD KEY `listado` (`listado`),
  ADD KEY `club` (`club`),
  ADD KEY `categorias` (`categorias`);

--
-- Indices de la tabla `resultados_eventos_competencia_velocidad`
--
ALTER TABLE `resultados_eventos_competencia_velocidad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo_patin` (`tipo_patin`),
  ADD KEY `evento` (`evento`),
  ADD KEY `listado` (`listado`),
  ADD KEY `club` (`club`),
  ADD KEY `categorias` (`categorias`);

--
-- Indices de la tabla `tipo_eventos`
--
ALTER TABLE `tipo_eventos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tipo_evento` (`tipo_evento`);

--
-- Indices de la tabla `tipo_identificacion`
--
ALTER TABLE `tipo_identificacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_patin`
--
ALTER TABLE `tipo_patin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tipo_patin` (`tipo_patin`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Usuario` (`Usuario`),
  ADD UNIQUE KEY `Rol` (`Rol`),
  ADD KEY `Perfil_Usuario` (`Perfil_Usuario`),
  ADD KEY `Estado` (`Estado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `categorias_resultados`
--
ALTER TABLE `categorias_resultados`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id_departamento` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `inscripcion_deportistas_eventos_escuelas`
--
ALTER TABLE `inscripcion_deportistas_eventos_escuelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT de la tabla `inscripcion_deportistas_eventos_ranking`
--
ALTER TABLE `inscripcion_deportistas_eventos_ranking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `inscripcion_evento_clubes`
--
ALTER TABLE `inscripcion_evento_clubes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `ligado`
--
ALTER TABLE `ligado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `listados_carriles`
--
ALTER TABLE `listados_carriles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `listados_eventos`
--
ALTER TABLE `listados_eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `municipios`
--
ALTER TABLE `municipios`
  MODIFY `id_municipio` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1101;

--
-- AUTO_INCREMENT de la tabla `perfil_usuario`
--
ALTER TABLE `perfil_usuario`
  MODIFY `ID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `rama`
--
ALTER TABLE `rama`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `reconocimiento`
--
ALTER TABLE `reconocimiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `resultados_eventos_competencia_carriles`
--
ALTER TABLE `resultados_eventos_competencia_carriles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `resultados_eventos_competencia_fondo_eliminacion`
--
ALTER TABLE `resultados_eventos_competencia_fondo_eliminacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `resultados_eventos_competencia_fondo_puntos`
--
ALTER TABLE `resultados_eventos_competencia_fondo_puntos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `resultados_eventos_competencia_fondo_puntos_eliminacion`
--
ALTER TABLE `resultados_eventos_competencia_fondo_puntos_eliminacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `resultados_eventos_competencia_habilidad`
--
ALTER TABLE `resultados_eventos_competencia_habilidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `resultados_eventos_competencia_libre`
--
ALTER TABLE `resultados_eventos_competencia_libre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `resultados_eventos_competencia_velocidad`
--
ALTER TABLE `resultados_eventos_competencia_velocidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT de la tabla `tipo_eventos`
--
ALTER TABLE `tipo_eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_identificacion`
--
ALTER TABLE `tipo_identificacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipo_patin`
--
ALTER TABLE `tipo_patin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clubes`
--
ALTER TABLE `clubes`
  ADD CONSTRAINT `clubes_ibfk_2` FOREIGN KEY (`cargo`) REFERENCES `cargo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `clubes_ibfk_3` FOREIGN KEY (`reconocimiento`) REFERENCES `reconocimiento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `clubes_ibfk_4` FOREIGN KEY (`departamento`) REFERENCES `departamentos` (`id_departamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `clubes_ibfk_5` FOREIGN KEY (`municipio`) REFERENCES `municipios` (`id_municipio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `clubes_ibfk_6` FOREIGN KEY (`estado`) REFERENCES `estados` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `deportistas`
--
ALTER TABLE `deportistas`
  ADD CONSTRAINT `deportistas_ibfk_1` FOREIGN KEY (`tipo_identificacion`) REFERENCES `tipo_identificacion` (`id`),
  ADD CONSTRAINT `deportistas_ibfk_2` FOREIGN KEY (`tipo_patin`) REFERENCES `tipo_patin` (`id`),
  ADD CONSTRAINT `deportistas_ibfk_3` FOREIGN KEY (`rama`) REFERENCES `rama` (`id`),
  ADD CONSTRAINT `deportistas_ibfk_4` FOREIGN KEY (`ligado`) REFERENCES `ligado` (`id`),
  ADD CONSTRAINT `deportistas_ibfk_6` FOREIGN KEY (`estado`) REFERENCES `estados` (`ID`),
  ADD CONSTRAINT `deportistas_ibfk_7` FOREIGN KEY (`departamento`) REFERENCES `departamentos` (`id_departamento`),
  ADD CONSTRAINT `deportistas_ibfk_8` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`id`),
  ADD CONSTRAINT `deportistas_ibfk_9` FOREIGN KEY (`nombre_corto_club`) REFERENCES `clubes` (`nombre_corto_club`);

--
-- Filtros para la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_ibfk_2` FOREIGN KEY (`municipio`) REFERENCES `municipios` (`id_municipio`),
  ADD CONSTRAINT `eventos_ibfk_3` FOREIGN KEY (`tipo_evento`) REFERENCES `tipo_eventos` (`tipo_evento`);

--
-- Filtros para la tabla `inscripcion_deportistas_eventos_escuelas`
--
ALTER TABLE `inscripcion_deportistas_eventos_escuelas`
  ADD CONSTRAINT `inscripcion_deportistas_eventos_escuelas_ibfk_1` FOREIGN KEY (`evento`) REFERENCES `inscripcion_evento_clubes` (`evento`),
  ADD CONSTRAINT `inscripcion_deportistas_eventos_escuelas_ibfk_2` FOREIGN KEY (`club`) REFERENCES `clubes` (`nombre_corto_club`),
  ADD CONSTRAINT `inscripcion_deportistas_eventos_escuelas_ibfk_3` FOREIGN KEY (`identificacion_deportista`) REFERENCES `deportistas` (`identificacion`),
  ADD CONSTRAINT `inscripcion_deportistas_eventos_escuelas_ibfk_4` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`categoria`),
  ADD CONSTRAINT `inscripcion_deportistas_eventos_escuelas_ibfk_5` FOREIGN KEY (`rama`) REFERENCES `rama` (`rama`),
  ADD CONSTRAINT `inscripcion_deportistas_eventos_escuelas_ibfk_6` FOREIGN KEY (`tipo_patin`) REFERENCES `tipo_patin` (`tipo_patin`);

--
-- Filtros para la tabla `inscripcion_deportistas_eventos_ranking`
--
ALTER TABLE `inscripcion_deportistas_eventos_ranking`
  ADD CONSTRAINT `inscripcion_deportistas_eventos_ranking_ibfk_2` FOREIGN KEY (`evento`) REFERENCES `inscripcion_evento_clubes` (`evento`),
  ADD CONSTRAINT `inscripcion_deportistas_eventos_ranking_ibfk_3` FOREIGN KEY (`club`) REFERENCES `clubes` (`nombre_corto_club`),
  ADD CONSTRAINT `inscripcion_deportistas_eventos_ranking_ibfk_4` FOREIGN KEY (`identificacion_deportista`) REFERENCES `deportistas` (`identificacion`),
  ADD CONSTRAINT `inscripcion_deportistas_eventos_ranking_ibfk_5` FOREIGN KEY (`numero_deportista`) REFERENCES `numero_deportistas` (`numero_deportista`),
  ADD CONSTRAINT `inscripcion_deportistas_eventos_ranking_ibfk_6` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`categoria`),
  ADD CONSTRAINT `inscripcion_deportistas_eventos_ranking_ibfk_7` FOREIGN KEY (`rama`) REFERENCES `rama` (`rama`),
  ADD CONSTRAINT `inscripcion_deportistas_eventos_ranking_ibfk_8` FOREIGN KEY (`tipo_patin`) REFERENCES `tipo_patin` (`tipo_patin`);

--
-- Filtros para la tabla `inscripcion_evento_clubes`
--
ALTER TABLE `inscripcion_evento_clubes`
  ADD CONSTRAINT `inscripcion_evento_clubes_ibfk_1` FOREIGN KEY (`evento`) REFERENCES `eventos` (`nombre`),
  ADD CONSTRAINT `inscripcion_evento_clubes_ibfk_2` FOREIGN KEY (`club`) REFERENCES `clubes` (`nombre_corto_club`);

--
-- Filtros para la tabla `listados_carriles`
--
ALTER TABLE `listados_carriles`
  ADD CONSTRAINT `listados_carriles_ibfk_1` FOREIGN KEY (`id_listado_carriles`) REFERENCES `listados_eventos` (`id`);

--
-- Filtros para la tabla `listados_eventos`
--
ALTER TABLE `listados_eventos`
  ADD CONSTRAINT `listados_eventos_ibfk_1` FOREIGN KEY (`evento`) REFERENCES `eventos` (`nombre`);

--
-- Filtros para la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD CONSTRAINT `municipios_ibfk_1` FOREIGN KEY (`departamento_id`) REFERENCES `departamentos` (`id_departamento`);

--
-- Filtros para la tabla `numero_deportistas`
--
ALTER TABLE `numero_deportistas`
  ADD CONSTRAINT `numero_deportistas_ibfk_1` FOREIGN KEY (`identificacion_deportista`) REFERENCES `deportistas` (`identificacion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `resultados_eventos_competencia_carriles`
--
ALTER TABLE `resultados_eventos_competencia_carriles`
  ADD CONSTRAINT `resultados_eventos_competencia_carriles_ibfk_1` FOREIGN KEY (`tipo_patin`) REFERENCES `tipo_patin` (`tipo_patin`),
  ADD CONSTRAINT `resultados_eventos_competencia_carriles_ibfk_2` FOREIGN KEY (`nombre_evento`) REFERENCES `eventos` (`nombre`),
  ADD CONSTRAINT `resultados_eventos_competencia_carriles_ibfk_3` FOREIGN KEY (`carriles_listado`) REFERENCES `listados_eventos` (`id`),
  ADD CONSTRAINT `resultados_eventos_competencia_carriles_ibfk_4` FOREIGN KEY (`id_listado`) REFERENCES `listados_carriles` (`id`),
  ADD CONSTRAINT `resultados_eventos_competencia_carriles_ibfk_5` FOREIGN KEY (`club`) REFERENCES `inscripcion_evento_clubes` (`club`),
  ADD CONSTRAINT `resultados_eventos_competencia_carriles_ibfk_6` FOREIGN KEY (`categoria`) REFERENCES `categorias_resultados` (`categorias_resultados`);

--
-- Filtros para la tabla `resultados_eventos_competencia_fondo_eliminacion`
--
ALTER TABLE `resultados_eventos_competencia_fondo_eliminacion`
  ADD CONSTRAINT `resultados_eventos_competencia_fondo_eliminacion_ibfk_1` FOREIGN KEY (`tipo_patin`) REFERENCES `tipo_patin` (`tipo_patin`),
  ADD CONSTRAINT `resultados_eventos_competencia_fondo_eliminacion_ibfk_2` FOREIGN KEY (`evento`) REFERENCES `inscripcion_evento_clubes` (`evento`),
  ADD CONSTRAINT `resultados_eventos_competencia_fondo_eliminacion_ibfk_3` FOREIGN KEY (`listado`) REFERENCES `listados_eventos` (`id`),
  ADD CONSTRAINT `resultados_eventos_competencia_fondo_eliminacion_ibfk_4` FOREIGN KEY (`club`) REFERENCES `inscripcion_evento_clubes` (`club`),
  ADD CONSTRAINT `resultados_eventos_competencia_fondo_eliminacion_ibfk_5` FOREIGN KEY (`categorias`) REFERENCES `categorias_resultados` (`categorias_resultados`);

--
-- Filtros para la tabla `resultados_eventos_competencia_fondo_puntos`
--
ALTER TABLE `resultados_eventos_competencia_fondo_puntos`
  ADD CONSTRAINT `resultados_eventos_competencia_fondo_puntos_ibfk_1` FOREIGN KEY (`tipo_patin`) REFERENCES `tipo_patin` (`tipo_patin`),
  ADD CONSTRAINT `resultados_eventos_competencia_fondo_puntos_ibfk_2` FOREIGN KEY (`evento`) REFERENCES `inscripcion_evento_clubes` (`evento`),
  ADD CONSTRAINT `resultados_eventos_competencia_fondo_puntos_ibfk_3` FOREIGN KEY (`listado`) REFERENCES `listados_eventos` (`id`),
  ADD CONSTRAINT `resultados_eventos_competencia_fondo_puntos_ibfk_4` FOREIGN KEY (`club`) REFERENCES `inscripcion_evento_clubes` (`club`),
  ADD CONSTRAINT `resultados_eventos_competencia_fondo_puntos_ibfk_5` FOREIGN KEY (`categorias`) REFERENCES `categorias_resultados` (`categorias_resultados`);

--
-- Filtros para la tabla `resultados_eventos_competencia_fondo_puntos_eliminacion`
--
ALTER TABLE `resultados_eventos_competencia_fondo_puntos_eliminacion`
  ADD CONSTRAINT `resultados_eventos_competencia_fondo_puntos_eliminacion_ibfk_1` FOREIGN KEY (`tipo_patin`) REFERENCES `tipo_patin` (`tipo_patin`),
  ADD CONSTRAINT `resultados_eventos_competencia_fondo_puntos_eliminacion_ibfk_2` FOREIGN KEY (`evento`) REFERENCES `inscripcion_evento_clubes` (`evento`),
  ADD CONSTRAINT `resultados_eventos_competencia_fondo_puntos_eliminacion_ibfk_3` FOREIGN KEY (`listado`) REFERENCES `listados_eventos` (`id`),
  ADD CONSTRAINT `resultados_eventos_competencia_fondo_puntos_eliminacion_ibfk_4` FOREIGN KEY (`club`) REFERENCES `inscripcion_evento_clubes` (`club`),
  ADD CONSTRAINT `resultados_eventos_competencia_fondo_puntos_eliminacion_ibfk_5` FOREIGN KEY (`categorias`) REFERENCES `categorias_resultados` (`categorias_resultados`);

--
-- Filtros para la tabla `resultados_eventos_competencia_habilidad`
--
ALTER TABLE `resultados_eventos_competencia_habilidad`
  ADD CONSTRAINT `resultados_eventos_competencia_habilidad_ibfk_1` FOREIGN KEY (`tipo_patin`) REFERENCES `tipo_patin` (`tipo_patin`),
  ADD CONSTRAINT `resultados_eventos_competencia_habilidad_ibfk_2` FOREIGN KEY (`evento`) REFERENCES `inscripcion_evento_clubes` (`evento`),
  ADD CONSTRAINT `resultados_eventos_competencia_habilidad_ibfk_3` FOREIGN KEY (`listado`) REFERENCES `listados_eventos` (`id`),
  ADD CONSTRAINT `resultados_eventos_competencia_habilidad_ibfk_4` FOREIGN KEY (`club`) REFERENCES `inscripcion_evento_clubes` (`club`),
  ADD CONSTRAINT `resultados_eventos_competencia_habilidad_ibfk_5` FOREIGN KEY (`categorias`) REFERENCES `categorias_resultados` (`categorias_resultados`);

--
-- Filtros para la tabla `resultados_eventos_competencia_libre`
--
ALTER TABLE `resultados_eventos_competencia_libre`
  ADD CONSTRAINT `resultados_eventos_competencia_libre_ibfk_1` FOREIGN KEY (`tipo_patin`) REFERENCES `tipo_patin` (`tipo_patin`),
  ADD CONSTRAINT `resultados_eventos_competencia_libre_ibfk_2` FOREIGN KEY (`evento`) REFERENCES `inscripcion_evento_clubes` (`evento`),
  ADD CONSTRAINT `resultados_eventos_competencia_libre_ibfk_3` FOREIGN KEY (`listado`) REFERENCES `listados_eventos` (`id`),
  ADD CONSTRAINT `resultados_eventos_competencia_libre_ibfk_4` FOREIGN KEY (`club`) REFERENCES `inscripcion_evento_clubes` (`club`),
  ADD CONSTRAINT `resultados_eventos_competencia_libre_ibfk_5` FOREIGN KEY (`categorias`) REFERENCES `categorias_resultados` (`categorias_resultados`);

--
-- Filtros para la tabla `resultados_eventos_competencia_velocidad`
--
ALTER TABLE `resultados_eventos_competencia_velocidad`
  ADD CONSTRAINT `resultados_eventos_competencia_velocidad_ibfk_1` FOREIGN KEY (`tipo_patin`) REFERENCES `tipo_patin` (`tipo_patin`),
  ADD CONSTRAINT `resultados_eventos_competencia_velocidad_ibfk_2` FOREIGN KEY (`evento`) REFERENCES `inscripcion_evento_clubes` (`evento`),
  ADD CONSTRAINT `resultados_eventos_competencia_velocidad_ibfk_3` FOREIGN KEY (`listado`) REFERENCES `listados_eventos` (`id`),
  ADD CONSTRAINT `resultados_eventos_competencia_velocidad_ibfk_4` FOREIGN KEY (`club`) REFERENCES `inscripcion_evento_clubes` (`club`),
  ADD CONSTRAINT `resultados_eventos_competencia_velocidad_ibfk_5` FOREIGN KEY (`categorias`) REFERENCES `categorias_resultados` (`categorias_resultados`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`Perfil_Usuario`) REFERENCES `perfil_usuario` (`ID`),
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`Estado`) REFERENCES `estados` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
