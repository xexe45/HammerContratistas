-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-05-2018 a las 21:32:54
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_get_clientes` ()  BEGIN
select id as v1, cliente as v2, logo as v3, web as v4
from cliente;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_get_filosofia` ()  BEGIN
SELECT id as v1, historia as v2, mision as v3, vision as v4, 
slide1 as v5, slide2 as v6, valores as v7
FROM filosofia;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_get_info` ()  BEGIN
select id as v1, nombre as v2, logo as v3, ruc as v4,
direccion as v5, telefono as v6, correo as v7, presentacion as v8
from empresa;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_get_servicios` ()  BEGIN
select id as v1, servicio as v2, img as v3, descripcion as v4
from servicios;
END$$

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

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_registrar_tarea` (IN `v_servicio_id` INT, IN `v_tarea` VARCHAR(200), IN `v_res` BOOLEAN)  BEGIN
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

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

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
(5, 'Navarro Solutions', '1c9a9d850b37b64bce9e57317cfb3459.png', 'https://www.navarro.com'),
(6, 'Empresa Mazas', '9877b645d2bd3224e79326b20ac6a17e.png', 'https://www.mazas.com/'),
(7, 'Empresas Claudias', NULL, ''),
(8, 'Empresa Siccha', '87c31018f9a7b1356ee804fcf9f3aaf7.png', 'https://www.siccha.com'),
(9, 'Clínica Miraflores', NULL, 'https://www.clinica.com'),
(10, 'Clínica Sana', '21a141f0dba1eb97cb0c2dc7012dc17d.png', 'https://www.sana.com'),
(11, 'Clínica Belén', NULL, 'https://www.belen.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

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
(1, 'Hammer Contratistas', '150b02c21b793bd89f407c62e6bbe869.jpg', '12345678912', 'Av. Los Tallanes G-5. Urb. La Providencia-Piura', '073596193', 'proyectos@hammer.com.pe', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti consequuntur voluptatem porro fugiat nostrum corrupti? Sint asperiores hic dolor quam. Laboriosam commodi aspernatur repellendus blanditiis vel aperiam molestiae dolorem a?\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti consequuntur voluptatem porro fugiat nostrum corrupti? Sint asperiores hic dolor quam. Laboriosam commodi aspernatur repellendus blanditiis vel aperiam molestiae dolorem a?');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `filosofia`
--

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
(1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Nuestra misión es', 'Nuestra visión es', 'slide1.jpg', 'slide2.jpg', 'Nuestros valores son');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria`
--

CREATE TABLE `galeria` (
  `id` int(11) NOT NULL,
  `proyecto_id` int(11) NOT NULL,
  `img` varchar(150) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

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
(2, 1, 'Diseño de Clínica Belén', 'concluido', 11, '2017-01-01', 'e8227430aef67a32169e529a256612da.jpg', 'Proyecto realizado por...'),
(3, 2, 'Construcción Clínica Sana', 'proceso', 10, '2018-01-01', '7c341998028c55ea41507b3a65b56067.jpg', 'El proyecto se viene realizando...');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

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
(1, 'Arquitectura', '6dc53312028016fd8ff5d97bf50af0ef.png', 'Ofrecemos el servicio de arquitectura'),
(2, 'Ingeniería', '88a255a590e6a5afe9ec67bddfa28de1.jpg', 'Expertos en Ingeniería');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slides_portada`
--

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
(2, 'ecfed1ec1eebec0e2985ad7c4a80271a.png', 'Angular', 'Excelente framework JS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea_servicio`
--

CREATE TABLE `tarea_servicio` (
  `id` int(11) NOT NULL,
  `servicio_id` int(11) NOT NULL,
  `tarea` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `slides_portada`
--
ALTER TABLE `slides_portada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tarea_servicio`
--
ALTER TABLE `tarea_servicio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
