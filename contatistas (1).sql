-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-06-2018 a las 08:27:11
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `contatistas`
--
CREATE DATABASE IF NOT EXISTS `contatistas` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `contatistas`;

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `sp_buscar_cliente`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_buscar_cliente` (IN `v_parametro` VARCHAR(25))  BEGIN
select id as id, cliente as name
from cliente
where cliente like concat('%', v_parametro, '%');
END$$

DROP PROCEDURE IF EXISTS `sp_contacto`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_contacto` (IN `v_nombre` VARCHAR(255), IN `v_telefono` VARCHAR(15), IN `v_correo` VARCHAR(255), IN `v_mensaje` TEXT, OUT `v_res` BOOLEAN)  BEGIN
declare exit handler for sqlexception
begin
rollback;
set v_res = false;
end;
start transaction;
INSERT INTO contacto (nombre, telefono, correo, mensaje) 
VALUES(v_nombre, v_telefono, v_correo, v_mensaje);
commit;
set v_res = true;
END$$

DROP PROCEDURE IF EXISTS `sp_editar_empresa`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_editar_empresa` (IN `v_id` INT, IN `v_nombre` VARCHAR(150), IN `v_ruc` CHAR(11), IN `v_direccion` VARCHAR(200), IN `v_telefono` VARCHAR(15), IN `v_correo` VARCHAR(200), IN `v_presentacion` TEXT, OUT `v_res` BOOLEAN)  BEGIN
declare exit handler for sqlexception
begin
rollback;
set v_res = false;
end;
start transaction;
UPDATE empresa set nombre = v_nombre, ruc = v_ruc, direccion = v_direccion,
telefono = v_telefono, correo = v_correo, presentacion = v_presentacion
WHERE id = v_id;
commit;
set v_res = true;
END$$

DROP PROCEDURE IF EXISTS `sp_editar_filosofia`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_editar_filosofia` (IN `v_id` INT, IN `v_historia` TEXT, IN `v_mision` TEXT, IN `v_vision` TEXT, IN `v_valores` TEXT, OUT `v_res` BOOLEAN)  BEGIN
declare exit handler for sqlexception
begin
rollback;
set v_res = false;
end;
start transaction;
UPDATE filosofia set historia = v_historia,
mision = v_mision,
vision = v_vision,
valores = v_valores
WHERE id = v_id;
commit;
set v_res = true;
END$$

DROP PROCEDURE IF EXISTS `sp_editar_logo`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_editar_logo` (IN `v_id` INT, IN `v_logo` VARCHAR(200), OUT `v_res` BOOLEAN)  BEGIN
declare exit handler for sqlexception
begin
rollback;
set v_res = false;
end;
start transaction;
UPDATE empresa set logo = v_logo
WHERE id = v_id;
commit;
set v_res = true;
END$$

DROP PROCEDURE IF EXISTS `sp_editar_slides`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_editar_slides` (IN `v_slide1` VARCHAR(255), IN `v_slide2` VARCHAR(255), OUT `v_res` BOOLEAN)  BEGIN
declare exit handler for sqlexception
begin
rollback;
set v_res = false;
end;
start transaction;
UPDATE filosofia set slide1 = v_slide1, slide2 = v_slide2;
commit;
set v_res = true;
END$$

DROP PROCEDURE IF EXISTS `sp_get_clientes`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_get_clientes` ()  BEGIN
select id as v1, cliente as v2, logo as v3, web as v4
from cliente;
END$$

DROP PROCEDURE IF EXISTS `sp_get_empresa`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_get_empresa` ()  BEGIN
select id as v1, nombre as v2, logo as v3, ruc as v4, direccion as v5,
telefono as v6, correo as v7, presentacion as v8
from empresa;
END$$

DROP PROCEDURE IF EXISTS `sp_get_filosofia`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_get_filosofia` ()  BEGIN
SELECT id as v1, historia as v2, mision as v3, vision as v4, 
slide1 as v5, slide2 as v6, valores as v7
FROM filosofia;
END$$

DROP PROCEDURE IF EXISTS `sp_get_info`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_get_info` ()  BEGIN
select id as v1, nombre as v2, logo as v3, ruc as v4,
direccion as v5, telefono as v6, correo as v7, presentacion as v8
from empresa;
END$$

DROP PROCEDURE IF EXISTS `sp_get_proyectos`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_get_proyectos` ()  BEGIN
select p.id as v1, p.servicio_id as v2, s.servicio as v3, p.nombre as v4,
p.tipo as v5, p.cliente_id as v6, c.cliente as v7, p.fecha as v8, p.img_principal as v9,
p.descripcion as v10
from proyecto p inner join servicios s on p.servicio_id = s.id
inner join cliente c on p.cliente_id = c.id;
END$$

DROP PROCEDURE IF EXISTS `sp_get_servicios`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_get_servicios` ()  BEGIN
select id as v1, servicio as v2, img as v3, descripcion as v4
from servicios;
END$$

DROP PROCEDURE IF EXISTS `sp_listar_slides`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_slides` ()  BEGIN
select id as v1, img as v2, titulo as v4, subtitulo as v5
from slides_portada;
END$$

DROP PROCEDURE IF EXISTS `sp_listar_tareas`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_tareas` ()  BEGIN
select t.id as v1, t.servicio_id as v2, t.tarea as v3, s.servicio as v4
from tarea_servicio t inner join servicios s on t.servicio_id = s.id;
END$$

DROP PROCEDURE IF EXISTS `sp_registrar_cliente`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_registrar_cliente` (IN `v_cliente` VARCHAR(200), IN `v_logo` VARCHAR(200), IN `v_web` VARCHAR(200), OUT `v_res` BOOLEAN)  BEGIN
declare exit handler for sqlexception
begin
rollback;
set v_res = false;
end;
start transaction;
INSERT INTO cliente (cliente, logo, web) 
VALUES(v_cliente, v_logo, v_web);
commit;
set v_res = true;
END$$

DROP PROCEDURE IF EXISTS `sp_registrar_filosofia`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_registrar_filosofia` (IN `v_historia` TEXT, IN `v_mision` TEXT, IN `v_vision` TEXT, IN `v_slide1` VARCHAR(255), IN `v_slide2` VARCHAR(255), IN `v_valores` TEXT, OUT `v_res` BOOLEAN)  BEGIN
declare exit handler for sqlexception
begin
rollback;
set v_res = false;
end;
start transaction;
INSERT INTO filosofia (historia,mision,vision,slide1,slide2,valores) 
VALUES(v_historia,v_mision,v_vision,v_slide1,v_slide2,v_valores);
commit;
set v_res = true;
END$$

DROP PROCEDURE IF EXISTS `sp_registrar_galeria`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_registrar_galeria` (IN `v_proyecto_id` INT, IN `v_img` VARCHAR(150), OUT `v_res` BOOLEAN)  BEGIN
declare exit handler for sqlexception
begin
rollback;
set v_res = false;
end;
start transaction;
INSERT INTO galeria (proyecto_id, img) 
VALUES(v_proyecto_id, v_img);
commit;
set v_res = true;
END$$

DROP PROCEDURE IF EXISTS `sp_registrar_proyecto`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_registrar_proyecto` (IN `v_servicio_id` INT, IN `v_nombre` TEXT, IN `v_tipo` ENUM('proceso','concluido'), IN `v_cliente_id` INT, IN `v_fecha` DATE, IN `v_img_principal` VARCHAR(150), IN `v_descripcion` TEXT, OUT `v_res` BOOLEAN)  BEGIN
declare exit handler for sqlexception
begin
rollback;
set v_res = false;
end;
start transaction;
INSERT INTO proyecto (servicio_id, nombre, tipo, cliente_id, fecha, img_principal, descripcion) 
VALUES(v_servicio_id, v_nombre, v_tipo, v_cliente_id, v_fecha ,v_img_principal, v_descripcion);
commit;
set v_res = true;
END$$

DROP PROCEDURE IF EXISTS `sp_registrar_servicio`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_registrar_servicio` (IN `v_servicio` VARCHAR(150), IN `v_img` VARCHAR(150), IN `v_descripcion` TEXT, OUT `v_res` BOOLEAN)  BEGIN
declare exit handler for sqlexception
begin
rollback;
set v_res = false;
end;
start transaction;
INSERT INTO servicios (servicio, img, descripcion) 
VALUES(v_servicio, v_img, v_descripcion);
commit;
set v_res = true;
END$$

DROP PROCEDURE IF EXISTS `sp_registrar_slides`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_registrar_slides` (IN `v_img` VARCHAR(150), IN `v_titulo` VARCHAR(200), IN `v_subtitulo` VARCHAR(200), OUT `v_res` BOOLEAN)  BEGIN
declare exit handler for sqlexception
begin
rollback;
set v_res = false;
end;
start transaction;
INSERT INTO slides_portada (img,titulo,subtitulo) 
VALUES(v_img,v_titulo,v_subtitulo);
commit;
set v_res = true;
END$$

DROP PROCEDURE IF EXISTS `sp_registrar_tarea`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_registrar_tarea` (IN `v_servicio_id` INT, IN `v_tarea` VARCHAR(200), OUT `v_res` BOOLEAN)  BEGIN
declare exit handler for sqlexception
begin
rollback;
set v_res = false;
end;
start transaction;
INSERT INTO tarea_servicio (servicio_id, tarea) 
VALUES(v_servicio_id, v_tarea);
commit;
set v_res = true;
END$$

DROP PROCEDURE IF EXISTS `sp_registrar_usuario`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_registrar_usuario` (IN `v_nombres` VARCHAR(80), IN `v_apellidos` VARCHAR(160), IN `v_dni` CHAR(8), IN `v_telefono` VARCHAR(12), IN `v_direccion` VARCHAR(255), IN `v_correo` VARCHAR(150), IN `v_password` VARCHAR(200), IN `v_rol` ENUM('user','admin'), OUT `v_res` BOOLEAN)  BEGIN
declare exit handler for sqlexception
begin
rollback;
set v_res = false;
end;
start transaction;
INSERT INTO usuario (nombres, apellidos, dni, telefono, direccion, fecha_creacion, correo, password,rol) 
VALUES(v_nombres, v_apellidos, v_dni, v_telefono, v_direccion, NOW(), v_correo, v_password,v_rol);
commit;
set v_res = true;
END$$

DROP PROCEDURE IF EXISTS `sp_servicio_id`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_servicio_id` (IN `v_id` INT)  BEGIN
select id as v1, servicio as v2, img as v3, descripcion as v4
from servicios
where id = v_id;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `cliente` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `logo` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `web` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `cliente`, `logo`, `web`) VALUES
(13, 'Navarro Solutions', '31c60edc1157df6b2f249468fa690368.jpg', 'https://www.navarro.com'),
(14, 'Chunatec', '7b5a466946cbc52ab4224acb7752a4ba.jpg', 'https://www.chunated.com'),
(15, 'Clínica Miraflores', 'f9ad0e0e6e49faf0a21195622ac703c0.jpg', 'https://www.clinicamiraflores.com'),
(16, 'Clínica Sana', '8e8d0b53a112664fa49f00053738db6a.jpg', 'https://www.sana.com'),
(17, 'Maza Solutions', '6fba6592f79d14cb748fd7873a0d5f9e.jpg', 'https://www.maza.com'),
(18, 'ClaudiaSolutions', '23ae64d423933ff6587a5cfc75dc3399.jpg', ''),
(19, 'MazaHidalgo S.A', 'df5020c544bc4d52a9ab681c33d75907.jpg', 'https://www.hidalgos.com'),
(20, 'TeroTec', '6c5836fd3ff367b06d5acece23251fa4.jpg', 'https://www.terococa.com'),
(21, 'SicchaTec', '97b906fff5c23beeb3a58c9ac40a1597.jpg', 'https://www.siccha.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

DROP TABLE IF EXISTS `contacto`;
CREATE TABLE `contacto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `mensaje` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id`, `nombre`, `telefono`, `correo`, `mensaje`, `fecha`) VALUES
(1, 'Juan Cosio Coma', '964088583', 'juanco@gmail.com', 'Hola comunicarse conmigo por favor, necesito un proyecto de una capilla', '2018-06-05 06:51:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

DROP TABLE IF EXISTS `empresa`;
CREATE TABLE `empresa` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `logo` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `ruc` char(11) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `presentacion` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id`, `nombre`, `logo`, `ruc`, `direccion`, `telefono`, `correo`, `presentacion`) VALUES
(1, 'Hammer Contratistas', '150b02c21b793bd89f407c62e6bbe869.jpg', '12345678912', 'Av. Los Tallanes G-5. Urb. La Providencia-Piura', '073596193', 'proyectos@hammer.com.pe', 'Somos una empresa dedicada al rubro de la arquitectura, ingeniería y construcción, liderada por un equipo de profesionales calificados. \r\n\r\nNuestro trabajo se basa en la exigencia y preocupación de cada detalle, además de caracterizarnos por brindar ideas innovadoras garantizando un trabajo de calidad.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `filosofia`
--

DROP TABLE IF EXISTS `filosofia`;
CREATE TABLE `filosofia` (
  `id` int(11) NOT NULL,
  `historia` text COLLATE utf8_spanish_ci NOT NULL,
  `mision` text COLLATE utf8_spanish_ci NOT NULL,
  `vision` text COLLATE utf8_spanish_ci NOT NULL,
  `slide1` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `slide2` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `valores` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `filosofia`
--

INSERT INTO `filosofia` (`id`, `historia`, `mision`, `vision`, `slide1`, `slide2`, `valores`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Nuestra misión es', 'Nuestra visión es', 'adc30155573fbf48831b6d9a3ed1aeee.jpg', '0016c7ac129a509316347e88d4da0202.jpg', 'Nuestros valores son');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria`
--

DROP TABLE IF EXISTS `galeria`;
CREATE TABLE `galeria` (
  `id` int(11) NOT NULL,
  `proyecto_id` int(11) NOT NULL,
  `img` varchar(150) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

DROP TABLE IF EXISTS `proyecto`;
CREATE TABLE `proyecto` (
  `id` int(11) NOT NULL,
  `servicio_id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `tipo` enum('proceso','concluido') COLLATE utf8_spanish_ci NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `img_principal` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `proyecto`
--

INSERT INTO `proyecto` (`id`, `servicio_id`, `nombre`, `tipo`, `cliente_id`, `fecha`, `img_principal`, `descripcion`) VALUES
(1, 7, 'Clínica Sana', 'concluido', 16, '2017-01-01', 'c4998a876714fbc0815ab2690681dbed.png', 'Clínica'),
(2, 7, 'Clínica Miraflores', 'concluido', 15, '2010-01-01', '390f4c5dee74edc6801f7c5c28bfb034.jpg', 'Clínica Belén');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

DROP TABLE IF EXISTS `servicios`;
CREATE TABLE `servicios` (
  `id` int(11) NOT NULL,
  `servicio` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `img` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id`, `servicio`, `img`, `descripcion`) VALUES
(3, 'Construcción de Obra Civil', '43b2125fc5dad6b904f9bac771228235.png', 'Para Hammer Contratistas no hay nada más importante que nuestros clientes y sus proyectos, por ello realizamos con eficacia, cuidado en el rendimiento económico y profesionalismo la construcción de Accesos, Vialidades, Estacionamientos y Patios de Maniobras, así como todo tipo de Urbanizaciones.'),
(4, 'Estudios Preliminares', '0a03701bae1056bff473bc74acb9af3b.png', 'Enfocados en la realización de proyectos integrales, en Hammer Contratistas ofrecemos una amplia gama de procesos para el desarrollo de todo proyecto y durante la construcción de toda obra, nuestra experiencia y precisión, nos permite realizar trabajos de planimetría y altimetría, así como diversos estudios preliminares propios de cada obra.'),
(5, 'Proyectos Arquitectónicos', 'cf5464d24fa3ee3655ce2e5a2ac634e7.png', 'En Hammer Contratistas cada proyecto representa un compromiso profundo con la calidad, para lograr esto conjugamos elementos clave de nuestro equipo para trabajar con nuestros clientes y poder desarrollar así proyectos de calidad total a la altura de las expectativas y que sean capaces de satisfacer todas sus necesidades actuales y futuras.'),
(6, 'Terracerías', '6fdea52579fd8e972627492788960181.png', 'Para cualquier desarrollo y construcción, el manejo de suelos representa una piedra angular para acceso, soporte y planeación de la obra, ofrecemos soluciones en Cortes, Rellenos, Nivelaciones y Mejoramiento de Suelos.\r\n\r\nmanejo de suelos representa una piedra angular para acceso, soporte y planeación de la obra, ofrecemos soluciones en Cortes, Rellenos, Nivelaciones y Mejoramiento de Suelos. Todos son realizados con el mayor factor de seguridad, apoyándolos con Pruebas de Laboratorio para verificar Pesos Volumétricos, Contenido de Humedad y Porcentajes de Compactación requeridos, según el Diseño y Cálculos previamente establecidos.'),
(7, 'Edificaciones', 'a41e472e00ee098ddf95d84446572174.png', 'En Hammer Contratistas queremos convertir grandes ideas en grandes construcciones, por ello establecemos y ejecutamos modelos y planes de trabajo estructurado para lograr levantar cualquier edificación. Contamos con la asesoría técnica y profesional para la realización del Proyecto y Construcción de la Edificación que su empresa requiera.'),
(8, 'Estructuras metálicas y cubiertas', 'aeea1a33c72b7e245e9f63d048497e68.png', 'En Hammer Contratistas estamos orgullosos de poder contribuir en con nuestros clientes desde el primer momento, te ofrecemos Diseño, Fabricación, Transporte y Montaje de estructuras metálicas a base de Marcos Rígidos de sección variable, los cuales poseen una gran versatilidad para ser empleados en Construcciones Industriales, Bodegas y Edificios Comerciales, cubriendo Grandes Claros con gran Rapidez, Economía y proporcionando una Apariencia Inmejorable.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slides_portada`
--

DROP TABLE IF EXISTS `slides_portada`;
CREATE TABLE `slides_portada` (
  `id` int(11) NOT NULL,
  `img` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `titulo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `subtitulo` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `slides_portada`
--

INSERT INTO `slides_portada` (`id`, `img`, `titulo`, `subtitulo`) VALUES
(1, 'fb1f1e324ccc60d85326676c8c38ae49.png', 'Arquitectura', 'Expertos en diseño de construcciones'),
(3, '4369f602fdb6f4f0b47d91cd521abcba.png', 'Ingeniería', 'Ingeniería de calidad'),
(4, '90cef3db842d4fca360f0b5f0cb37b8c.png', 'Construcción', 'Construcción de calidad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea_servicio`
--

DROP TABLE IF EXISTS `tarea_servicio`;
CREATE TABLE `tarea_servicio` (
  `id` int(11) NOT NULL,
  `servicio_id` int(11) NOT NULL,
  `tarea` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tarea_servicio`
--

INSERT INTO `tarea_servicio` (`id`, `servicio_id`, `tarea`) VALUES
(1, 5, 'Diseñado 3D'),
(2, 5, 'Diseñado Interiores'),
(3, 5, 'Diseñado Medieval');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `dni` char(8) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `rol` enum('admin','user','','') COLLATE utf8_spanish_ci NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `fecha_edicion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cliente_UNIQUE` (`cliente`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre_UNIQUE` (`nombre`),
  ADD UNIQUE KEY `correo_UNIQUE` (`correo`),
  ADD UNIQUE KEY `ruc` (`ruc`);

--
-- Indices de la tabla `filosofia`
--
ALTER TABLE `filosofia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `galeria`
--
ALTER TABLE `galeria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_galeria_proyecto_idx` (`proyecto_id`);

--
-- Indices de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_proyecto_servicio_idx` (`servicio_id`),
  ADD KEY `fk_proyecto_cliente_idx` (`cliente_id`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `servicio_UNIQUE` (`servicio`);

--
-- Indices de la tabla `slides_portada`
--
ALTER TABLE `slides_portada`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tarea_servicio`
--
ALTER TABLE `tarea_servicio`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tarea_UNIQUE` (`tarea`),
  ADD KEY `fk_tarea_servicio_idx` (`servicio_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dni` (`dni`),
  ADD UNIQUE KEY `email` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `filosofia`
--
ALTER TABLE `filosofia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `galeria`
--
ALTER TABLE `galeria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `slides_portada`
--
ALTER TABLE `slides_portada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tarea_servicio`
--
ALTER TABLE `tarea_servicio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `galeria`
--
ALTER TABLE `galeria`
  ADD CONSTRAINT `fk_galeria_proyecto` FOREIGN KEY (`proyecto_id`) REFERENCES `proyecto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD CONSTRAINT `fk_proyecto_cliente` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_proyecto_servicio` FOREIGN KEY (`servicio_id`) REFERENCES `servicios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tarea_servicio`
--
ALTER TABLE `tarea_servicio`
  ADD CONSTRAINT `fk_tarea_servicio` FOREIGN KEY (`servicio_id`) REFERENCES `servicios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
