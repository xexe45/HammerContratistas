-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-05-2018 a las 19:40:43
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
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_editar_empresa` (IN `v_id` INT, IN `v_nombre` VARCHAR(150), IN `v_ruc` CHAR(11), IN `v_logo` VARCHAR(200), IN `v_direccion` VARCHAR(200), IN `v_telefono` VARCHAR(15), IN `v_correo` VARCHAR(200), IN `v_presentacion` TEXT, OUT `v_res` BOOLEAN)  BEGIN
declare exit handler for sqlexception
begin
rollback;
set v_res = false;
end;
start transaction;
UPDATE empresa set nombre = v_nombre, ruc = v_ruc, logo = v_logo, direccion = v_direccion,
telefono = v_telefono, correo = v_correo, presentacion = v_presentacion
WHERE id = v_id;
commit;
set v_res = true;
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_registrar_proyecto` (IN `v_servico_id` INT, IN `v_nombre` TEXT, IN `v_tipo` ENUM('proceso','concluido'), IN `v_cliente_id` INT, IN `v_img_principal` VARCHAR(150), IN `v_descripcion` TEXT, OUT `v_res` BOOLEAN)  BEGIN
declare exit handler for sqlexception
begin
rollback;
set v_res = false;
end;
start transaction;
INSERT INTO proyecto (servicio_id, nombre, tipo, cliente_id, img_principal, descripcion) 
VALUES(v_servicio_id, v_nombre, v_tipo, v_cliente_id, v_img_principal, v_descripcion);
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
INSERT INTO servicio (servicio, img, descricion) 
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
(1, 'Hammer Contratistas', 'logo.png', '12345678910', 'Av. Los Tallanes G-5. Urb. La Providencia-Piura', '073596193', 'proyectos@hammer.com.pe', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti consequuntur voluptatem porro fugiat nostrum corrupti? Sint asperiores hic dolor quam. Laboriosam commodi aspernatur repellendus blanditiis vel aperiam molestiae dolorem a?\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti consequuntur voluptatem porro fugiat nostrum corrupti? Sint asperiores hic dolor quam. Laboriosam commodi aspernatur repellendus blanditiis vel aperiam molestiae dolorem a?');

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slides_portada`
--

CREATE TABLE `slides_portada` (
  `id` int(11) NOT NULL,
  `img` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `titulo` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `subtitulo` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `filosofia`
--
ALTER TABLE `filosofia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `galeria`
--
ALTER TABLE `galeria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `slides_portada`
--
ALTER TABLE `slides_portada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
