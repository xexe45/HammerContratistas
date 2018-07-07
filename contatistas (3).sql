-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-07-2018 a las 08:47:58
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
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_access_denied` (IN `v_fecha_fin` DATETIME, IN `v_user_id` INT, OUT `v_res` BOOLEAN)  BEGIN
declare exit handler for sqlexception
begin
rollback;
set v_res = false;
end;
start transaction;
INSERT INTO logindiario (fecha, estado, fecha_inicio, fecha_fin, user_id) 
VALUES(DATE_FORMAT(NOW(),'%y-%m-%d'), 0, NOW(), v_fecha_fin, v_user_id);
commit;
set v_res = true;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_buscar_cliente` (IN `v_parametro` VARCHAR(25))  BEGIN
select id as id, cliente as name
from cliente
where cliente like concat('%', v_parametro, '%');
END$$

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

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_count_edicion` ()  BEGIN
select count(*) as y, 'ediciones' as label
from historial
where tipo = 'edicion';
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_count_registro` ()  BEGIN
select count(*) as y, 'registros' as label
from historial
where tipo = 'registro';
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_editar_empresa` (IN `v_id` INT, IN `v_user` INT, IN `v_nombre` VARCHAR(150), IN `v_ruc` CHAR(11), IN `v_direccion` VARCHAR(200), IN `v_telefono` VARCHAR(15), IN `v_correo` VARCHAR(200), IN `v_presentacion` TEXT, OUT `v_res` BOOLEAN)  BEGIN
declare exit handler for sqlexception
begin
rollback;
set v_res = false;
end;
start transaction;

INSERT INTO historial(tipo,slug,descripcion,usuario_id,fecha)
VALUES('edicion','empresa','edición información empresa',v_user, NOW());

UPDATE empresa set nombre = v_nombre, ruc = v_ruc, direccion = v_direccion,
telefono = v_telefono, correo = v_correo, presentacion = v_presentacion
WHERE id = v_id;
commit;
set v_res = true;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_editar_filosofia` (IN `v_id` INT, IN `v_user` INT, IN `v_historia` TEXT, IN `v_mision` TEXT, IN `v_vision` TEXT, IN `v_valores` TEXT, OUT `v_res` BOOLEAN)  BEGIN
declare exit handler for sqlexception
begin
rollback;
set v_res = false;
end;
start transaction;

INSERT INTO historial(tipo,slug,descripcion,usuario_id,fecha)
VALUES('edicion','filosofia','edición filosofía empresarial',v_user, NOW());

UPDATE filosofia set historia = v_historia,
mision = v_mision,
vision = v_vision,
valores = v_valores
WHERE id = v_id;
commit;
set v_res = true;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_editar_logo` (IN `v_id` INT, IN `v_user` INT, IN `v_logo` VARCHAR(200), OUT `v_res` BOOLEAN)  BEGIN
declare exit handler for sqlexception
begin
rollback;
set v_res = false;
end;
start transaction;
INSERT INTO historial(tipo,slug,descripcion,usuario_id,fecha)
VALUES('edicion','empresa','edición logo',v_user, NOW());

UPDATE empresa set logo = v_logo
WHERE id = v_id;
commit;
set v_res = true;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_editar_mensaje` (IN `v_id` INT, IN `v_user` INT, IN `v_descripcion` TEXT, OUT `v_res` BOOLEAN)  BEGIN
declare exit handler for sqlexception
begin
rollback;
set v_res = false;
end;
start transaction;
INSERT INTO historial(tipo,slug,descripcion,usuario_id,fecha)
VALUES('edicion','mensajes',v_descripcion,v_user, NOW());
UPDATE contacto set visto = 1
WHERE id = v_id;
commit;
set v_res = true;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_editar_slides` (IN `v_user` INT, IN `v_slide1` VARCHAR(255), IN `v_slide2` VARCHAR(255), OUT `v_res` BOOLEAN)  BEGIN
declare exit handler for sqlexception
begin
rollback;
set v_res = false;
end;
start transaction;

INSERT INTO historial(tipo,slug,descripcion,usuario_id,fecha)
VALUES('edicion','filosofia','edición slides filosofía empresarial',v_user, NOW());

UPDATE filosofia set slide1 = v_slide1, slide2 = v_slide2;
commit;
set v_res = true;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_get_clientes` ()  BEGIN
select id as v1, cliente as v2, logo as v3, web as v4
from cliente;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_get_empresa` ()  BEGIN
select id as v1, nombre as v2, logo as v3, ruc as v4, direccion as v5,
telefono as v6, correo as v7, presentacion as v8
from empresa;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_get_filosofia` ()  BEGIN
SELECT id as v1, historia as v2, mision as v3, vision as v4, 
slide1 as v5, slide2 as v6, valores as v7
FROM filosofia;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_get_galeria` (IN `v_slug` TEXT)  BEGIN
select id as v1, proyecto_id as v2, img as v3
from galeria
where proyecto_id = (select id from proyecto where slug = v_slug);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_get_gallery_slug` (IN `v_slug` TEXT)  BEGIN
set @id = (select id from proyecto where slug = v_slug);
select id as v1, proyecto_id as v2, img as v3
from galeria
where proyecto_id = @id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_get_historial` ()  BEGIN
select h.id as v1, h.tipo as v2, h.slug as v3, h.descripcion as v4, usuario_id as v5,
CONCAT(u.nombre,' ', u.apellidos) as v6,h.fecha as v7
from historial h inner join usuario u on h.usuario_id = u.id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_get_info` ()  BEGIN
select id as v1, nombre as v2, logo as v3, ruc as v4,
direccion as v5, telefono as v6, correo as v7, presentacion as v8
from empresa;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_get_proyectos` ()  BEGIN
select p.id as v1, p.servicio_id as v2, s.servicio as v3, p.nombre as v4,
p.tipo as v5, p.cliente_id as v6, c.cliente as v7, p.fecha as v8, p.img_principal as v9,
p.descripcion as v10, p.slug as v11
from proyecto p inner join servicios s on p.servicio_id = s.id
inner join cliente c on p.cliente_id = c.id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_get_proyect_slug` (IN `v_slug` TEXT)  BEGIN
select id as v1, nombre as v2
from proyecto
where slug = v_slug;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_get_servicios` ()  BEGIN
select id as v1, servicio as v2, img as v3, descripcion as v4
from servicios;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_mensajes` ()  BEGIN
select id as v1, nombre as v2, telefono as v3, correo as v4, mensaje as v5, fecha as v6,
visto as v7
from contacto;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_slides` ()  BEGIN
select id as v1, img as v2, titulo as v4, subtitulo as v5
from slides_portada;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_tareas` ()  BEGIN
select t.id as v1, t.servicio_id as v2, t.tarea as v3, s.servicio as v4
from tarea_servicio t inner join servicios s on t.servicio_id = s.id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_usuarios` ()  BEGIN
select id as v1, nombre as v2, apellidos as v3, dni as v4, telefono as v5, direccion as v6,
correo as v7, rol as v8, fecha_creacion as v9
from usuario;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_login` (IN `v_correo` VARCHAR(200), IN `v_password` VARCHAR(200), OUT `v_res` BOOLEAN)  BEGIN
select id as v1, concat(nombre,' ', apellidos) as v2, correo as v3, rol as v4
from usuario
where correo = v_correo and password = v_password;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_registrar_cliente` (IN `v_user` INT, IN `v_cliente` VARCHAR(200), IN `v_logo` VARCHAR(200), IN `v_web` VARCHAR(200), OUT `v_res` BOOLEAN)  BEGIN
declare exit handler for sqlexception
begin
rollback;
set v_res = false;
end;
start transaction;
INSERT INTO historial(tipo,slug,descripcion,usuario_id,fecha)
VALUES('registro','cliente',CONCAT('Registro de',' ',v_cliente),v_user, NOW());

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

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_registrar_galeria` (IN `v_proyecto_id` INT, IN `v_user` INT, IN `v_proyecto` TEXT, IN `v_img` VARCHAR(150), OUT `v_res` INT)  BEGIN
declare exit handler for sqlexception
begin
rollback;
set v_res = 0;
end;
start transaction;
INSERT INTO galeria (proyecto_id, img) 
VALUES(v_proyecto_id, v_img);
SET @last_id = LAST_INSERT_ID();

INSERT INTO historial(tipo,slug,descripcion,usuario_id,fecha)
VALUES('registro','galeria',CONCAT('Registro de foto',' ', v_proyecto),v_user, NOW());
commit;
set v_res = @last_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_registrar_proyecto` (IN `v_servicio_id` INT, IN `v_user` INT, IN `v_nombre` TEXT, IN `v_slug` VARCHAR(255), IN `v_tipo` ENUM('proceso','concluido'), IN `v_cliente_id` INT, IN `v_fecha` DATE, IN `v_img_principal` VARCHAR(150), IN `v_descripcion` TEXT, OUT `v_res` BOOLEAN)  BEGIN
declare exit handler for sqlexception
begin
rollback;
set v_res = false;
end;
start transaction;
INSERT INTO historial(tipo,slug,descripcion,usuario_id,fecha)
VALUES('registro','proyecto',CONCAT('Registro de proyecto',' ', v_nombre),v_user, NOW());

INSERT INTO proyecto (servicio_id, nombre, tipo, cliente_id, fecha, img_principal, descripcion, slug) 
VALUES(v_servicio_id, v_nombre, v_tipo, v_cliente_id, v_fecha ,v_img_principal, v_descripcion, v_slug);
commit;
set v_res = true;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_registrar_servicio` (IN `v_user` INT, IN `v_servicio` VARCHAR(150), IN `v_img` VARCHAR(150), IN `v_descripcion` TEXT, OUT `v_res` BOOLEAN)  BEGIN
declare exit handler for sqlexception
begin
rollback;
set v_res = false;
end;
start transaction;
INSERT INTO historial(tipo,slug,descripcion,usuario_id,fecha)
VALUES('registro','servicio',CONCAT('Registro de servicio',' ', v_servicio),v_user, NOW());

INSERT INTO servicios (servicio, img, descripcion) 
VALUES(v_servicio, v_img, v_descripcion);
commit;
set v_res = true;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_registrar_slides` (IN `v_user` INT, IN `v_img` VARCHAR(150), IN `v_titulo` VARCHAR(200), IN `v_subtitulo` VARCHAR(200), OUT `v_res` BOOLEAN)  BEGIN
declare exit handler for sqlexception
begin
rollback;
set v_res = false;
end;
start transaction;
INSERT INTO historial(tipo,slug,descripcion,usuario_id,fecha)
VALUES('registro','portada','Registro de slides de portada',v_user, NOW());

INSERT INTO slides_portada (img,titulo,subtitulo) 
VALUES(v_img,v_titulo,v_subtitulo);
commit;
set v_res = true;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_registrar_tarea` (IN `v_servicio_id` INT, IN `v_user` INT, IN `v_tarea` VARCHAR(200), OUT `v_res` BOOLEAN)  BEGIN
declare exit handler for sqlexception
begin
rollback;
set v_res = false;
end;
start transaction;
INSERT INTO historial(tipo,slug,descripcion,usuario_id,fecha)
VALUES('registro','tarea',CONCAT('Registro de tarea',' ', v_tarea),v_user, NOW());
INSERT INTO tarea_servicio (servicio_id, tarea) 
VALUES(v_servicio_id, v_tarea);
commit;
set v_res = true;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_registrar_usuario` (IN `v_user` INT, IN `v_nombres` VARCHAR(80), IN `v_apellidos` VARCHAR(160), IN `v_dni` CHAR(8), IN `v_telefono` VARCHAR(12), IN `v_direccion` VARCHAR(255), IN `v_correo` VARCHAR(150), IN `v_password` VARCHAR(200), IN `v_rol` ENUM('user','admin'), OUT `v_res` BOOLEAN)  BEGIN
declare exit handler for sqlexception
begin
rollback;
set v_res = false;
end;
start transaction;
INSERT INTO historial(tipo,slug,descripcion,usuario_id,fecha)
VALUES('registro','usuario',CONCAT('Registro de usuario',' ',v_nombres,' ',v_apellidos),v_user, NOW());

INSERT INTO usuario (nombre, apellidos, dni, telefono, direccion, correo, password,rol,fecha_creacion) 
VALUES(v_nombres, v_apellidos, v_dni, v_telefono, v_direccion, v_correo, v_password,v_rol,NOW());
commit;
set v_res = true;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_reporte_iteracciones` (IN `v_anio` VARCHAR(10))  BEGIN
select count(*) as y, MONTH(fecha) as label
from historial 
where YEAR(fecha) = v_anio
GROUP BY MONTH(fecha);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_servicio_id` (IN `v_id` INT)  BEGIN
select id as v1, servicio as v2, img as v3, descripcion as v4
from servicios
where id = v_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_update_foto` (IN `v_id` INT, IN `v_img` TEXT, OUT `v_res` BOOLEAN)  BEGIN
declare exit handler for sqlexception
begin
rollback;
set v_res = false;
end;
start transaction;
UPDATE galeria set img = v_img
where id = v_id;
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
(13, 'Navarro Solutions', '31c60edc1157df6b2f249468fa690368.jpg', 'https://www.navarro.com'),
(14, 'Chunatec', '7b5a466946cbc52ab4224acb7752a4ba.jpg', 'https://www.chunated.com'),
(15, 'Clínica Miraflores', 'f9ad0e0e6e49faf0a21195622ac703c0.jpg', 'https://www.clinicamiraflores.com'),
(16, 'Clínica Sana', '8e8d0b53a112664fa49f00053738db6a.jpg', 'https://www.sana.com'),
(17, 'Maza Solutions', '6fba6592f79d14cb748fd7873a0d5f9e.jpg', 'https://www.maza.com'),
(18, 'ClaudiaSolutions', '23ae64d423933ff6587a5cfc75dc3399.jpg', ''),
(19, 'MazaHidalgo S.A', 'df5020c544bc4d52a9ab681c33d75907.jpg', 'https://www.hidalgos.com'),
(20, 'TeroTec', '6c5836fd3ff367b06d5acece23251fa4.jpg', 'https://www.terococa.com'),
(21, 'SicchaTec', '97b906fff5c23beeb3a58c9ac40a1597.jpg', 'https://www.siccha.com'),
(22, 'MoroTec', '217b3c2b1116caea3a0f30e0647f93ed.png', 'https://www.morotec.com'),
(23, 'Don Bife', 'a8885e802bdaf4c0ff5b105c1cbd1093.jpg', 'http://www.donbife.cl/');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `mensaje` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `visto` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id`, `nombre`, `telefono`, `correo`, `mensaje`, `fecha`, `visto`) VALUES
(1, 'Juan Cosio Coma', '964088583', 'juanco@gmail.com', 'Hola comunicarse conmigo por favor, necesito un proyecto de una capilla', '2018-06-25 00:47:57', 1),
(2, 'Juan Perez Perez', '967099183', 'juanchi@gmail.com', 'Necesito cotizar una piscina.', '2018-06-18 03:12:59', 1);

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
(1, 'Hammer Contratistas', 'ffc03595b19a4377bb5ef156a880aebe.jpg', '12345678912', 'Av. Los Tallanes G-5. Urb. La Providencia-Piura', '073596193', 'proyectos@hammer.com.pe', 'Somos una empresa dedicada al rubro de la arquitectura, ingeniería y construcción, liderada por un equipo de profesionales calificados. \r\n\r\nNuestro trabajo se basa en la exigencia y preocupación de cada detalle, además de caracterizarnos por brindar ideas innovadoras garantizando un trabajo de calidad.');

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
(1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Nuestra misión es', 'Nuestra visión es', 'a2a8285ffdff1f77a972135774659da2.png', '0016c7ac129a509316347e88d4da0202.jpg', 'Nuestros valores son');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria`
--

CREATE TABLE `galeria` (
  `id` int(11) NOT NULL,
  `proyecto_id` int(11) NOT NULL,
  `img` varchar(150) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `galeria`
--

INSERT INTO `galeria` (`id`, `proyecto_id`, `img`) VALUES
(1, 5, 'foto_5_1.png'),
(2, 5, 'foto_5_2.jpg'),
(3, 4, 'foto_4_3.png'),
(4, 4, 'foto_4_4.jpg'),
(5, 7, 'foto_7_5.png'),
(6, 7, 'foto_7_6.png'),
(7, 7, 'foto_7_7.jpg'),
(8, 1, 'foto_1_8.jpg'),
(9, 3, 'foto_3_9.png'),
(10, 3, 'foto_3_10.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `id` int(11) NOT NULL,
  `tipo` enum('registro','edicion','eliminar','') COLLATE utf8_spanish_ci NOT NULL,
  `slug` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`id`, `tipo`, `slug`, `descripcion`, `usuario_id`, `fecha`) VALUES
(1, 'edicion', 'empresa', 'edición información empresa', 1, '2018-04-24 19:36:59'),
(2, 'edicion', 'filosofia', 'edición filosofía empresarial', 1, '2018-05-24 19:38:45'),
(3, 'edicion', 'empresa', 'edición logo', 1, '2018-06-24 19:40:53'),
(5, 'edicion', 'mensajes', 'Mensaje de Juan Cosio Coma puesto en visto', 1, '2018-06-24 19:47:57'),
(6, 'edicion', 'filosofia', 'edición slides filosofía empresarial', 1, '2018-06-24 19:51:16'),
(7, 'edicion', 'filosofia', 'edición slides filosofía empresarial', 1, '2018-06-24 19:52:50'),
(8, 'registro', 'cliente', 'Registro de MoroTec', 1, '2018-06-24 19:56:09'),
(9, 'registro', 'proyecto', 'Registro de proyecto Edificación Suma', 1, '2018-06-24 20:00:51'),
(10, 'registro', 'servicio', 'Registro de servicio Diseño de Planos', 1, '2018-06-24 20:11:59'),
(11, 'registro', 'portada', 'Registro de slides de portada', 1, '2018-06-24 20:16:42'),
(12, 'registro', 'tarea', 'Registro de tarea Diseño de planos 3D', 1, '2018-06-24 20:20:05'),
(13, 'registro', 'usuario', 'Registro de usuario Oscar Milano', 1, '2018-06-24 20:24:12'),
(14, 'edicion', 'filosofia', 'edición filosofía empresarial', 1, '2018-06-24 21:33:21'),
(15, 'edicion', 'filosofia', 'edición filosofía empresarial', 1, '2018-06-24 21:34:34'),
(16, 'registro', 'usuario', 'Registro de usuario Jorge Cáceres', 1, '2018-07-01 16:54:10'),
(17, 'registro', 'usuario', 'Registro de usuario Carlos Coba Roa', 1, '2018-07-01 17:00:09'),
(18, 'registro', 'usuario', 'Registro de usuario Fernando Abarca', 1, '2018-07-01 17:29:47'),
(19, 'registro', 'galeria', 'Registro de foto Contrucción Civil', 1, '2018-07-07 00:37:53'),
(20, 'registro', 'galeria', 'Registro de foto Contrucción Civil', 1, '2018-07-07 00:37:53'),
(21, 'registro', 'cliente', 'Registro de Don Bife', 2, '2018-07-07 01:15:42'),
(25, 'registro', 'proyecto', 'Registro de proyecto Terracería Don Bife', 2, '2018-07-07 01:24:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logindiario`
--

CREATE TABLE `logindiario` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_fin` datetime NOT NULL,
  `user_id` int(11) NOT NULL
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
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `proyecto`
--

INSERT INTO `proyecto` (`id`, `servicio_id`, `nombre`, `tipo`, `cliente_id`, `fecha`, `img_principal`, `descripcion`, `slug`) VALUES
(1, 7, 'Clínica Sana', 'concluido', 16, '2017-01-01', 'c4998a876714fbc0815ab2690681dbed.png', 'Clínica', 'clinica-sana'),
(2, 7, 'Clínica Miraflores', 'concluido', 15, '2010-01-01', '390f4c5dee74edc6801f7c5c28bfb034.jpg', 'Clínica Belén', 'clinica-miraflores'),
(3, 3, 'Contrucción Civil', 'concluido', 18, '2014-01-01', 'e193e14d9beecbb46c91968730cc13cd.png', 'Proyecto realizado', 'construccion-civil'),
(4, 3, 'Obra', 'proceso', 17, '2017-01-01', 'df505fdb7415e3b561ffdda3d303805b.jpg', 'Proyecto Maza Solutions', 'obra'),
(5, 6, 'Terracería', 'proceso', 20, '2018-12-12', 'fe96e7935630aa189d8056c9577c1252.png', 'Terracería', 'terraceria'),
(6, 7, 'Edificacion', 'concluido', 19, '2017-12-12', '1bec1eb30e310cd21d7c3ee1e91991b6.png', 'Proyecto', 'edificacion'),
(7, 7, 'Edificación Suma', 'concluido', 16, '2017-01-01', 'a7294ab8773dcaa142e6c665c909e33d.png', 'Un proyecto de gran alcance...', 'edificacion-suma'),
(9, 6, 'Terracería Don Bife', 'proceso', 23, '2018-06-01', '03a607a98f56931f658eb1f005447996.jpg', 'Terracería para Don Bife', 'terraceria-don-bife');

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
(3, 'Construcción de Obra Civil', '43b2125fc5dad6b904f9bac771228235.png', 'Para Hammer Contratistas no hay nada más importante que nuestros clientes y sus proyectos, por ello realizamos con eficacia, cuidado en el rendimiento económico y profesionalismo la construcción de Accesos, Vialidades, Estacionamientos y Patios de Maniobras, así como todo tipo de Urbanizaciones.'),
(4, 'Estudios Preliminares', '0a03701bae1056bff473bc74acb9af3b.png', 'Enfocados en la realización de proyectos integrales, en Hammer Contratistas ofrecemos una amplia gama de procesos para el desarrollo de todo proyecto y durante la construcción de toda obra, nuestra experiencia y precisión, nos permite realizar trabajos de planimetría y altimetría, así como diversos estudios preliminares propios de cada obra.'),
(5, 'Proyectos Arquitectónicos', 'cf5464d24fa3ee3655ce2e5a2ac634e7.png', 'En Hammer Contratistas cada proyecto representa un compromiso profundo con la calidad, para lograr esto conjugamos elementos clave de nuestro equipo para trabajar con nuestros clientes y poder desarrollar así proyectos de calidad total a la altura de las expectativas y que sean capaces de satisfacer todas sus necesidades actuales y futuras.'),
(6, 'Terracerías', '6fdea52579fd8e972627492788960181.png', 'Para cualquier desarrollo y construcción, el manejo de suelos representa una piedra angular para acceso, soporte y planeación de la obra, ofrecemos soluciones en Cortes, Rellenos, Nivelaciones y Mejoramiento de Suelos.\r\n\r\nmanejo de suelos representa una piedra angular para acceso, soporte y planeación de la obra, ofrecemos soluciones en Cortes, Rellenos, Nivelaciones y Mejoramiento de Suelos. Todos son realizados con el mayor factor de seguridad, apoyándolos con Pruebas de Laboratorio para verificar Pesos Volumétricos, Contenido de Humedad y Porcentajes de Compactación requeridos, según el Diseño y Cálculos previamente establecidos.'),
(7, 'Edificaciones', 'a41e472e00ee098ddf95d84446572174.png', 'En Hammer Contratistas queremos convertir grandes ideas en grandes construcciones, por ello establecemos y ejecutamos modelos y planes de trabajo estructurado para lograr levantar cualquier edificación. Contamos con la asesoría técnica y profesional para la realización del Proyecto y Construcción de la Edificación que su empresa requiera.'),
(8, 'Estructuras metálicas y cubiertas', 'aeea1a33c72b7e245e9f63d048497e68.png', 'En Hammer Contratistas estamos orgullosos de poder contribuir en con nuestros clientes desde el primer momento, te ofrecemos Diseño, Fabricación, Transporte y Montaje de estructuras metálicas a base de Marcos Rígidos de sección variable, los cuales poseen una gran versatilidad para ser empleados en Construcciones Industriales, Bodegas y Edificios Comerciales, cubriendo Grandes Claros con gran Rapidez, Economía y proporcionando una Apariencia Inmejorable.'),
(9, 'Diseño de Planos', '36b95be9f71303138edb545853ffa3f6.jpg', 'Diseño de planos para empresas...');

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
(3, '4369f602fdb6f4f0b47d91cd521abcba.png', 'Ingeniería', 'Ingeniería de calidad'),
(4, '90cef3db842d4fca360f0b5f0cb37b8c.png', 'Construcción', 'Construcción de calidad'),
(5, 'f6e4ebdbedc92c514c5325da886f4b53.png', 'Portada', 'Sub Titulo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea_servicio`
--

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
(3, 5, 'Diseñado Medieval'),
(4, 5, 'Diseño 7D'),
(5, 9, 'Diseño de planos 3D');

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
  `rol` enum('admin','user') COLLATE utf8_spanish_ci NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `fecha_edicion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellidos`, `dni`, `telefono`, `direccion`, `correo`, `password`, `rol`, `fecha_creacion`, `fecha_edicion`) VALUES
(1, 'César', 'Maza Hidalgo', '70365813', '965088182', 'Urb. Las Mercedes k-1', 'cmaza@gmail.com', '$2a$08$Kynil62N430dcxNN9gj4Rux6YBKBpLSzHm2BwBzTg9BEBULe4ypja', 'admin', '2018-06-17 18:36:24', '2018-06-18 03:39:00'),
(2, 'Claudia', 'Serpa', '12345452', '967988102', 'Urb. Las Magnolias j12', 'claudia@gmail.com', '$2a$08$GrLmMIDNnpPMEkgUS02XNeVGu967SKuKv6PFrw00ixH.ot1BQEd8.', 'user', '2018-06-17 22:47:02', '2018-06-18 03:47:02'),
(3, 'Oscar', 'Milano', '78690913', '967099194', 'Av. Sullana 216', 'milano@gmail.com', '$2a$08$9YDa6dOx6sAhGnZ1IIu3Lel7kd6Y9aVyb02b4stvH80E7MA6WLhr.', 'user', '2018-06-24 20:24:12', '2018-06-25 01:24:12'),
(4, 'Jorge', 'Cáceres', '56765312', '965088112', 'AA.HH. 18 de Mayo', 'jorgito@gmail.com', '$2a$08$uki7KwlU4NCc0X/FHJavx.ijYKlFvc1iupUeWoacdgHaUXP9QZj/y', 'user', '2018-07-01 16:54:11', '2018-07-01 21:54:11'),
(5, 'Carlos', 'Coba Roa', '78653489', '965099105', 'Av. Sullana 216', 'coba@gmail.com', '$2a$08$9Kq0CnrWnXrITi4sT2fk5uvrWuPV9R4mrFgO0pCuv.SpLQ4Drg0V.', 'user', '2018-07-01 17:00:09', '2018-07-01 22:00:09'),
(6, 'Fernando', 'Abarca', '49856320', '965088189', 'Jose Olaya j-10', 'fabarca@gmail.com', '$2a$08$ByIhoTOQQ6JpFDsiCICJS.oiMYnYCgJnHEwBr/DY0QTTtSzTM/XVG', 'user', '2018-07-01 17:29:48', '2018-07-01 22:29:48');

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
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_historial_usuario` (`usuario_id`);

--
-- Indices de la tabla `logindiario`
--
ALTER TABLE `logindiario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_logindiario_usuario` (`user_id`);

--
-- Indices de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `titulo` (`titulo`,`subtitulo`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `logindiario`
--
ALTER TABLE `logindiario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `slides_portada`
--
ALTER TABLE `slides_portada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tarea_servicio`
--
ALTER TABLE `tarea_servicio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `galeria`
--
ALTER TABLE `galeria`
  ADD CONSTRAINT `fk_galeria_proyecto` FOREIGN KEY (`proyecto_id`) REFERENCES `proyecto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `fk_historial_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `logindiario`
--
ALTER TABLE `logindiario`
  ADD CONSTRAINT `fk_logindiario_usuario` FOREIGN KEY (`user_id`) REFERENCES `usuario` (`id`);

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
