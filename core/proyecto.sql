-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-02-2021 a las 03:08:48
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `crud_actividad` (IN `v_idactividad` INT, IN `v_nombreactividad` VARCHAR(255), IN `opcion` VARCHAR(255))  BEGIN
	-- variables
	DECLARE msj VARCHAR(255);
    
    CASE 
    WHEN opcion = 'guardar' then
		INSERT INTO actividad (idActividad,nomactividad)VALUES(v_idactividad,v_nombreactividad);
		SET msj = 'Registro guardado';
        SELECT msj;
    WHEN opcion = 'actualizar' then
		UPDATE actividad SET nomActividad=v_nombreactividad WHERE idActividad=v_idactividad;
		SET msj = 'Registro actualizado';
        SELECT msj;
    WHEN opcion = 'eliminar' then
		DELETE FROM actividad WHERE idActividad=v_idactividad;
		SET msj = 'Registro eliminado';
        SELECT msj;
    END CASE;
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crud_categoria` (IN `v_idCategoria` INT, IN `v_nombreCategoria` VARCHAR(255), IN `v_descripcionCategoria` VARCHAR(255), IN `opcion` VARCHAR(255))  BEGIN
	-- Declaracion de variables
    DECLARE msj varchar(255);
	CASE 
    WHEN opcion = 'guardar' then
		INSERT INTO categoria (idCategoria,nombreCategoria,descripcionCategoria) VALUES(v_idCategoria, v_nombreCategoria, v_descripcionCategoria);
		SET msj = 'Registro guardado';
        SELECT msj;
   WHEN opcion = 'actualizar' then
		UPDATE categoria SET nombreCategoria=v_nombreCategoria, descripcionCategoria=v_descripcionCategoria WHERE idCategoria=v_idCategoria;
		set msj = 'Registro actualizado';
		SELECT msj;
    WHEN opcion = 'eliminar' then
		DELETE FROM categoria WHERE idCategoria=v_idCategoria;
		set msj = 'Registro eliminado';
		SELECT msj;     
    END CASE;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crud_detalleactividad` (IN `v_iddetaactividad` INT, IN `v_cantidadActividad` INT, IN `v_fechaActividad` DATE, IN `v_precioActividad` DOUBLE, IN `v_idusuario` INT, IN `v_idactividad` INT, IN `opcion` VARCHAR(255))  BEGIN
	-- variables
	DECLARE msj VARCHAR(255);
    
    CASE 
    WHEN opcion = 'guardar' then
		INSERT INTO detalleactividad (idDEtalleactividad, cantidad, fechaactividad, precioactividad, idusuario_fk, idactividad_fk)VALUES
        (v_iddetaactividad, v_cantidadActividad, v_fechaActividad, v_precioActividad, v_idusuario, v_idactividad);
		SET msj = 'Registro guardado';
        SELECT msj;
    WHEN opcion = 'actualizar' then
		UPDATE detalleactividad SET cantidad=v_cantidadActividad, fechaactividad=v_fechaActividad, precioactividad=v_precioActividad, idusuario_fk=v_idusuario, idactividad_fk=v_idactividad WHERE idDEtalleactividad=v_iddetaactividad;
		SET msj = 'Registro actualizado';
        SELECT msj;
    WHEN opcion = 'eliminar' then
		DELETE FROM detalleactividad WHERE idDEtalleactividad=v_iddetaactividad;
		SET msj = 'Registro eliminado';
        SELECT msj;
    END CASE;
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crud_detallemovimiento` (IN `v_idDetamovimiento` INT, IN `v_idmovimiento` INT, IN `v_idproducto` INT, IN `v_cantidad` INT, IN `opcion` VARCHAR(255))  BEGIN
	-- Declaracion de variables
    DECLARE msj varchar(255);
	CASE 
    WHEN opcion = 'guardar' then
		INSERT INTO detallemovimiento (idDetalleMovimiento, idmovimiento_fk, idProducto_fk, cantidad) VALUES
        (v_idDetamovimiento, v_idmovimiento, v_idproducto, v_cantidad);
		SET msj = 'Registro guardado';
        SELECT msj;
   WHEN opcion = 'actualizar' then
		UPDATE detallemovimiento SET idmovimiento_fk=v_idmovimiento, idProducto_fk=v_idproducto, cantidad=v_cantidad WHERE idDetalleMovimiento=v_idDetamovimiento;
		set msj = 'Registro actualizado';
		SELECT msj;
    WHEN opcion = 'eliminar' then
		DELETE FROM detallemovimiento WHERE idDetalleMovimiento=v_idDetamovimiento;
		set msj = 'Registro eliminado';
		SELECT msj;     
    END CASE;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crud_detallerol` (IN `v_iddetarol` INT, IN `v_idrol` INT, IN `v_idusuario` INT, IN `v_fecha` DATE, IN `estadorol` VARCHAR(45), IN `opcion` VARCHAR(255))  BEGIN
	-- variables
	DECLARE msj VARCHAR(255);
    
    CASE 
    WHEN opcion = 'guardar' then
		INSERT INTO detallerol (idDetalleRol,idrol_fk,idusuario,fecha,estadoRol)VALUES(v_iddetarol,v_idrol,v_idusuario,v_fecha,estadorol);
		SET msj = 'Registro guardado';
        SELECT msj;
    WHEN opcion = 'actualizar' then
		UPDATE detallerol SET idrol_fk=v_idrol,idusuario=v_idusuario,fecha=v_fecha,estadoRol=estadorol WHERE idDetalleRol=v_iddetarol;
		SET msj = 'Registro actualizado';
        SELECT msj;
    WHEN opcion = 'eliminar' then
		DELETE FROM detallerol WHERE idDetalleRol=v_iddetarol;
		SET msj = 'Registro eliminado';
        SELECT msj;
    END CASE;
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crud_detalleusuario` (IN `v_idtipodocu` INT, IN `v_idusuario` INT, IN `v_nombreusuario` VARCHAR(255), IN `v_apellidousuario` VARCHAR(255), IN `v_direccionusuario` VARCHAR(255), IN `v_telefonousuario` VARCHAR(255), IN `opcion` VARCHAR(255))  BEGIN
	-- Declaracion de variables
    DECLARE msj varchar(255);
	CASE 
    WHEN opcion = 'guardar' then
		INSERT INTO detalleusuario (idDetalleUser, idtipodocu_fk, docusuario1_fk, nombreUsuario, apellidoUsuario,
direccionUsuario, telefonoUsuario, fechaRegistro) VALUES
        (v_iddetausuario, v_idtipodocu, v_idusuario, v_nombreusuario, v_apellidousuario, v_direccionusuario, v_telefonousuario, curdate());
    END CASE;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crud_movimiento` (IN `v_idmovimiento` INT, IN `v_idusuario` INT, IN `v_idtipomovimiento` INT, IN `v_fecha` DATE, IN `opcion` VARCHAR(255))  BEGIN
	-- Declaracion de variables
    DECLARE msj varchar(255);
	CASE 
    WHEN opcion = 'guardar' then
		INSERT INTO movimiento (idmovimiento, idusuario_fk, idTipoMovimiento, fechaMovi) VALUES
        (v_idmovimiento, v_idusuario, v_idtipomovimiento, v_fecha);
		SET msj = 'Registro guardado';
        SELECT msj;
   WHEN opcion = 'actualizar' then
		UPDATE movimiento SET idusuario_fk=v_idusuario, idTipoMovimiento=v_idtipomovimiento, fechaMovi=v_fecha WHERE idmovimiento=v_idmovimiento;
		set msj = 'Registro actualizado';
		SELECT msj;
    WHEN opcion = 'eliminar' then
		DELETE FROM movimiento WHERE idmovimiento=v_idmovimiento;
		set msj = 'Registro eliminado';
		SELECT msj;     
    END CASE;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crud_pago` (IN `v_idpago` INT, IN `v_idactividad` INT, IN `v_idusuario` INT, IN `v_fechapago` DATE, IN `v_total` DOUBLE, IN `opcion` VARCHAR(255))  BEGIN
	-- variables
	DECLARE msj VARCHAR(255);
    
    CASE 
    WHEN opcion = 'guardar' then
		INSERT INTO pago (idpago,idusuario_fk, idactividad_fk, fechapago, total)VALUES(v_idpago, v_idusuario, v_idactividad, v_fechapago, v_total);
		SET msj = 'Registro guardado';
        SELECT msj;
    WHEN opcion = 'actualizar' then
		UPDATE pago SET idactividad_fk=v_idactividad, idusuario_fk=v_idusuario, fechapago=v_fechapago, total=v_total WHERE idpago=v_idpago;
		SET msj = 'Registro actualizado';
        SELECT msj;
    WHEN opcion = 'eliminar' then
		DELETE FROM pago WHERE idpago=v_idpago;
		SET msj = 'Registro eliminado';
        SELECT msj;
    END CASE;
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crud_producto` (IN `v_idProducto` INT, IN `v_nombreProducto` VARCHAR(255), IN `v_idCategoria` INT, IN `opcion` VARCHAR(255))  BEGIN
	-- Declaracion de variables
    DECLARE msj varchar(255);
    
    CASE
    WHEN opcion = 'guardar' THEN
		INSERT INTO producto (idProducto, nombreProducto, idCategoria_fk)VALUES(v_idProducto, v_nombreProducto, v_idCategoria);
		SET msj = 'Registro guardado';
        SELECT msj;
    WHEN opcion = 'actualizar' THEN 
		UPDATE producto SET nombreProducto=v_nombreProducto, idCategoria_fk=v_idCategoria WHERE idProducto=v_idProducto;
		SET msj = 'Registro actualizado';
        SELECT msj;
    WHEN opcion = 'eliminar' THEN
		DELETE FROM producto WHERE idProducto=v_idProducto;
		SET msj = 'Registro eliminado';
        SELECT msj;
    END CASE;    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crud_rol` (IN `v_idrol` INT, IN `v_nombrerol` VARCHAR(45), IN `opcion` VARCHAR(255))  BEGIN
	-- variables
    DECLARE msj varchar(255);
    
    CASE
    WHEN opcion = 'guardar' then
		INSERT INTO rol (idRol,nombreRol) VALUES(v_idrol,v_nombrerol);
        SET msj = 'Registro guardado';
        SELECT msj;
    WHEN opcion = 'actualizar' then
		UPDATE rol SET nombreRol=v_nombrerol WHERE idRol=v_idrol;
        SET msj = 'Registro actualizado';
        SELECT msj;
    WHEN opcion = 'eliminar' then
		DELETE FROM rol WHERE idRol=v_idrol;
        SET msj = 'Registro eliminado';
        SELECT msj;
    END CASE;    
    

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crud_tipoDocumento` (IN `v_idTipoDocu` INT, IN `v_nombreTipoDocu` VARCHAR(255), IN `opcion` VARCHAR(255))  BEGIN
	-- Declaracion de variables
	DECLARE msj varchar(255);
    
    CASE 
    WHEN opcion = 'guardar' then
		INSERT INTO tipodocumento (idTipoDocumento,nombreTipoDocumento)VALUES(v_idTipoDocu, v_nombreTipoDocu);
		SET msj = 'Registro guardado';
        SELECT msj;
    WHEN opcion = 'actualizar' then
		UPDATE tipodocumento SET nombreTipoDocumento=v_nombreTipoDocu WHERE idTipoDocumento=v_idTipoDocu;
		SET msj = 'Registro actualizado';
        SELECT msj;
    WHEN opcion = 'eliminar' then
		DELETE FROM tipodocumento WHERE idTipoDocumento=v_idTipoDocu;
		SET msj = 'Registro eliminado';
        SELECT msj;
    END CASE;
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crud_tipomovimiento` (IN `v_idtipomovimiento` INT, IN `v_nombretipomovimiento` VARCHAR(255), IN `opcion` VARCHAR(255))  BEGIN
	-- variables
	DECLARE msj VARCHAR(255);
    
    CASE 
    WHEN opcion = 'guardar' then
		INSERT INTO tipomovimiento (idTipoMovimiento, nombreTipoMovimiento)VALUES
        (v_idtipomovimiento, v_nombretipomovimiento);
		SET msj = 'Registro guardado';
        SELECT msj;
    WHEN opcion = 'actualizar' then
		UPDATE tipomovimiento SET nombreTipoMovimiento=v_nombretipomovimiento WHERE idTipoMovimiento=v_idtipomovimiento;
		SET msj = 'Registro actualizado';
        SELECT msj;
    WHEN opcion = 'eliminar' then
		DELETE FROM tipomovimiento WHERE idTipoMovimiento=v_idtipomovimiento;
		SET msj = 'Registro eliminado';
        SELECT msj;
    END CASE;
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crud_usuario` (IN `v_idusuario` INT, IN `v_usuario` VARCHAR(255), IN `v_clave` VARCHAR(255), IN `v_cedula` VARCHAR(45), IN `opcion` VARCHAR(255))  BEGIN
	-- variables
	DECLARE msj VARCHAR(255);
    
    CASE 
    WHEN opcion = 'guardar' then
		INSERT INTO usuario (idusuario,usuario,clave,cedula)VALUES(v_idusuario,v_usuario,v_clave,v_cedula);
		SET msj = 'Registro guardado';
        SELECT msj;
    WHEN opcion = 'actualizar' then
		UPDATE usuario SET usuario=v_usuario,clave=v_clave,cedula=v_cedula WHERE idusuario=v_idusuario;
		SET msj = 'Registro actualizado';
        SELECT msj;
    WHEN opcion = 'eliminar' then
		DELETE FROM usuario WHERE idusuario=v_idusuario;
		SET msj = 'Registro eliminado';
        SELECT msj;
    END CASE;
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_bitacora` (IN `v_codb` VARCHAR(45), IN `v_docUser` VARCHAR(255), IN `fachaF` VARCHAR(45), IN `horaF` VARCHAR(45), IN `opcion` VARCHAR(255))  BEGIN
	-- variables
	DECLARE msj VARCHAR(255);
    
    CASE 
    WHEN opcion = 'guardar' then
		INSERT INTO bitacora (codbitacora,docUsuario, fechaInicio, fechaFinal, horaInicio, horaFinal)VALUES(v_codb, v_docUser, curdate(), fachaF, CURTIME(), horaF);
    END CASE;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `login` (IN `v_usuario` VARCHAR(255), IN `v_clave` VARCHAR(255))  BEGIN
	declare msj varchar(255);
	if exists(SELECT * FROM usuario WHERE usuario=v_usuario and clave=v_clave) then
		set msj = "bienvenido";
	else
		set msj = "El usuario o la contraseÃ±a es incorrecto";
    end if;
    SELECT msj;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_bitacora` (IN `v_codb` VARCHAR(45), IN `opcion` VARCHAR(255))  BEGIN
	-- variables
	DECLARE msj VARCHAR(255);
    
    CASE 
    WHEN opcion = 'actualizar' then
		UPDATE bitacora SET fechaFinal = curdate(), horaFinal=CURTIME() WHERE codbitacora= v_codb;
    END CASE;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_category` (IN `v_idCategoria` INT)  BEGIN
	UPDATE categoria c INNER JOIN producto p ON c.idCategoria = p.idCategoria_fk SET p.estadoProducto='inactivo', c.estado='inactiva' WHERE idCategoria=v_idCategoria;
END$$

--
-- Funciones
--
CREATE DEFINER=`root`@`localhost` FUNCTION `cont_categoria` () RETURNS INT(11) BEGIN
	SET @contador = (SELECT count(idCategoria) from categoria); 
RETURN @contador;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `cont_empleados` () RETURNS INT(11) BEGIN
	SET @empleados = (select count(idusuario) from usuario);
RETURN @empleados;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `cont_movimiento` () RETURNS INT(11) BEGIN
	SET @cont_movimiento = (SELECT count(idmovimiento) FROM movimiento);
RETURN @cont_movimiento;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `cont_productos` () RETURNS INT(11) BEGIN
	SET @contador = (SELECT count(idProducto) from producto); 
RETURN @contador;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `iva` (`subtotal` DECIMAL(20,2)) RETURNS DECIMAL(20,2) BEGIN
	SET @TOTAL = (SELECT(subtotal*1.19)); 
RETURN @TOTAL;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `new_ejemplo` (`tipodocu` INT) RETURNS VARCHAR(45) CHARSET utf8 BEGIN
	SET @nomtipodoc = (SELECT nombreTipoDocumento FROM tipodocumento WHERE idtipodocumento = tipodocu);
RETURN @nomtipodoc;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE `actividad` (
  `idActividad` int(11) NOT NULL,
  `nomActividad` varchar(225) NOT NULL,
  `precioUnidad` double NOT NULL,
  `estadoActividad` varchar(50) NOT NULL DEFAULT 'activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`idActividad`, `nomActividad`, `precioUnidad`, `estadoActividad`) VALUES
(2, 'ensamble Interruptor triple', 30, 'activo'),
(3, 'ensamble Salida coaxial', 18, 'activo'),
(4, 'ensamble Interruptor sencillo', 50, 'activo'),
(5, 'ensamble Toma doble integral', 40, 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE `bitacora` (
  `codbitacora` varchar(45) NOT NULL,
  `docUsuario` varchar(45) NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFinal` varchar(45) NOT NULL,
  `horaInicio` time NOT NULL,
  `horaFinal` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bitacora`
--

INSERT INTO `bitacora` (`codbitacora`, `docUsuario`, `fechaInicio`, `fechaFinal`, `horaInicio`, `horaFinal`) VALUES
('B138199016', '1001580847', '2020-08-14', 'Indefinida', '07:42:52', 'Indefinida'),
('B22044478', '1033342873', '2020-06-26', 'Indefinida', '21:34:52', 'Indefinida'),
('B30382944', '1001580847', '2020-06-26', '2020-06-26', '07:30:09', '08:12:22'),
('B337942018', '21990736', '2020-08-14', 'Indefinida', '14:47:55', 'Indefinida'),
('B35763446', '1033342873', '2020-06-26', '2020-06-26', '09:33:57', '09:35:47'),
('B39283277', '1033342873', '2020-06-26', 'Indefinida', '10:36:09', 'Indefinida'),
('B41692739', '1033342873', '2020-07-06', '2020-07-06', '15:03:54', '16:21:10'),
('B434866515', '1001580847', '2020-08-13', '2020-08-13', '23:16:58', '23:17:05'),
('B468125214', '1001580847', '2020-08-13', 'Indefinida', '23:13:30', 'Indefinida'),
('B50505863', '1033342873', '2020-06-26', 'Indefinida', '00:14:41', 'Indefinida'),
('B525606917', '1001580847', '2020-08-14', '2020-08-14', '14:32:49', '14:47:18'),
('B539979211', '1033342873', '2020-07-13', 'Indefinida', '14:39:15', 'Indefinida'),
('B655448519', '1001580847', '2020-08-14', 'Indefinida', '14:48:35', 'Indefinida'),
('B684092610', '1033342873', '2020-07-06', 'Indefinida', '16:21:21', 'Indefinida'),
('B734654620', '1001580847', '2021-02-08', '2021-02-08', '20:01:46', '20:42:29'),
('B74026131', '1033342873', '2020-06-26', '2020-06-26', '00:12:49', '00:13:52'),
('B79695765', '1033342873', '2020-06-26', '2020-06-26', '08:20:55', '08:55:21'),
('B894817512', '1033342873', '2020-07-14', 'Indefinida', '17:22:57', 'Indefinida'),
('B93927822', '1033342873', '2020-06-26', '2020-06-26', '00:14:12', '00:14:32'),
('B999016113', '1033342873', '2020-07-15', 'Indefinida', '09:41:34', 'Indefinida');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL,
  `nombreCategoria` varchar(225) NOT NULL,
  `descripcionCategoria` varchar(225) NOT NULL,
  `estado` varchar(45) NOT NULL DEFAULT 'activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `nombreCategoria`, `descripcionCategoria`, `estado`) VALUES
(1, 'Nova', '', 'activo'),
(2, 'Spazio', '', 'activo'),
(3, 'Ultra', '', 'activo'),
(4, 'Fuga', '', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleactividad`
--

CREATE TABLE `detalleactividad` (
  `idDEtalleactividad` int(11) NOT NULL,
  `idactividad_fk` int(11) NOT NULL,
  `docusuario3_fk` varchar(45) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fechaactividad` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalleactividad`
--

INSERT INTO `detalleactividad` (`idDEtalleactividad`, `idactividad_fk`, `docusuario3_fk`, `cantidad`, `fechaactividad`) VALUES
(1, 2, '1001580847', 200, '2020-06-26'),
(3, 4, '1001580847', 100, '2020-06-26'),
(4, 2, '1033342873', 11000, '2020-06-26'),
(5, 2, '1001580847', 500, '2020-08-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallemovimiento`
--

CREATE TABLE `detallemovimiento` (
  `idDetalleMovimiento` int(11) NOT NULL,
  `idmovimiento_fk` varchar(45) NOT NULL,
  `idProducto` varchar(50) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detallemovimiento`
--

INSERT INTO `detallemovimiento` (`idDetalleMovimiento`, `idmovimiento_fk`, `idProducto`, `cantidad`) VALUES
(294, 'id12873411', '1SPBl', 2000),
(295, 'id28263871', '1SpBl', 1000),
(296, 'id11795712', '1FuBl', 300),
(297, 'id11795712', '2FuBl', 500),
(298, 'id11795712', '1SpBl', 100),
(299, 'id97640862', '1FuBl', 300),
(300, 'id72146933', '1FuBl', 300),
(301, 'id47409104', '1FuBl', 1000),
(302, 'id47409104', '2FuBl', 400),
(303, 'id70648053', '1FuBl', 1000),
(304, 'id80665994', '2FuBl', 900),
(305, 'id21315325', '3NoBl', 1500),
(306, 'id69761226', '1FuBl', 2000),
(307, 'id69761226', '1NoBl', 300),
(308, 'id69761226', '1UlBl', 300),
(309, 'id56958047', '1UlBl', 321),
(310, 'id24175618', '1FuBl', 300),
(311, 'id24175618', '1SpBl', 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallerol`
--

CREATE TABLE `detallerol` (
  `idDetalleRol` int(11) NOT NULL,
  `idrol_fk` int(11) NOT NULL,
  `idusuario` varchar(45) NOT NULL,
  `estadoRol` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detallerol`
--

INSERT INTO `detallerol` (`idDetalleRol`, `idrol_fk`, `idusuario`, `estadoRol`) VALUES
(28, 5, '1033342873', 'Activo'),
(29, 5, '1001580847', 'Activo'),
(30, 5, '11111', 'Activo'),
(31, 5, '1010', 'Activo'),
(32, 8, '21990736', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleusuario`
--

CREATE TABLE `detalleusuario` (
  `idDetalleUser` int(11) NOT NULL,
  `idtipodocu_fk` int(11) NOT NULL,
  `docusuario1_fk` varchar(45) NOT NULL,
  `nombreUsuario` varchar(225) NOT NULL,
  `apellidoUsuario` varchar(225) NOT NULL,
  `direccionUsuario` varchar(225) NOT NULL,
  `telefonoUsuario` varchar(225) NOT NULL,
  `fechaRegistro` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalleusuario`
--

INSERT INTO `detalleusuario` (`idDetalleUser`, `idtipodocu_fk`, `docusuario1_fk`, `nombreUsuario`, `apellidoUsuario`, `direccionUsuario`, `telefonoUsuario`, `fechaRegistro`) VALUES
(46, 5, '1033342873', 'Brayan', 'aaa', 'CL 55 CR 67 B-160(1165)', '3054504265', '2020-06-25'),
(47, 5, '1001580847', 'Javier Alonso', 'Osorio Caro', 'santo domingo', '3002121434', '2020-06-26'),
(48, 6, '11111', 'Juan', 'muñoz', 'cll', '1000', '2020-06-26'),
(49, 5, '1010', 'camilo', 'alvarez', 'call', '310', '2020-07-15'),
(50, 5, '21990736', 'Alejandro', 'Posada c', 'calle 1 #123', '12345', '2020-08-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimiento`
--

CREATE TABLE `movimiento` (
  `idmovimiento` varchar(45) NOT NULL,
  `docusuario5_fk` varchar(45) NOT NULL,
  `idtipoMovimiento` int(11) NOT NULL,
  `fechaMovi` date NOT NULL DEFAULT current_timestamp(),
  `estadoMovimiento` varchar(50) NOT NULL DEFAULT 'activo',
  `contadorMovimiento` int(11) NOT NULL,
  `identificador` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `movimiento`
--

INSERT INTO `movimiento` (`idmovimiento`, `docusuario5_fk`, `idtipoMovimiento`, `fechaMovi`, `estadoMovimiento`, `contadorMovimiento`, `identificador`) VALUES
('id11795712', '1033342873', 1, '2020-06-26', 'activo', 2, ''),
('id12873411', '1033342873', 1, '2020-06-26', 'activo', 1, ''),
('id21315325', '1033342873', 1, '2020-07-14', 'activo', 5, ''),
('id24175618', '1001580847', 1, '2020-08-14', 'activo', 8, ''),
('id28263871', '1033342873', 2, '2020-06-26', 'activo', 1, ''),
('id47409104', '1033342873', 1, '2020-06-26', 'activo', 4, ''),
('id56958047', '1001580847', 1, '2020-08-14', 'activo', 7, ''),
('id69761226', '1001580847', 1, '2020-08-14', 'activo', 6, ''),
('id70648053', '1033342873', 2, '2020-06-26', 'activo', 3, ''),
('id72146933', '1001580847', 1, '2020-06-26', 'activo', 3, ''),
('id80665994', '1033342873', 2, '2020-07-06', 'activo', 4, ''),
('id97640862', '1033342873', 2, '2020-06-26', 'activo', 2, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `idpago` int(11) NOT NULL,
  `docusuario4_fk` varchar(45) NOT NULL,
  `idactividad_fk` int(11) NOT NULL,
  `fechapago` date NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idProducto` varchar(50) NOT NULL,
  `idCategoria_fk` int(11) NOT NULL,
  `nombreProducto` varchar(255) NOT NULL,
  `estadoProducto` varchar(100) NOT NULL DEFAULT 'activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProducto`, `idCategoria_fk`, `nombreProducto`, `estadoProducto`) VALUES
('1FuBl', 4, 'Interruptor triple conmutable', 'activo'),
('1NoBl', 1, 'Interruptor triple conmutable', 'activo'),
('1SpBl', 2, 'Salida de datos sencilla', 'activo'),
('1UlBl', 3, 'Salida coaxial sencilla', 'activo'),
('2FuBl', 4, 'Interruptor sencillo', 'activo'),
('2NoBl', 1, 'Interruptor sencillo', 'activo'),
('3FuBl', 4, 'Toma doble integral', 'activo'),
('3NoBl', 1, 'Toma doble ', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idRol` int(11) NOT NULL,
  `nombreRol` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idRol`, `nombreRol`) VALUES
(5, 'administrador'),
(6, 'contador'),
(8, 'empleado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodocumento`
--

CREATE TABLE `tipodocumento` (
  `idtipodocumento` int(11) NOT NULL,
  `nombreTipoDocumento` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipodocumento`
--

INSERT INTO `tipodocumento` (`idtipodocumento`, `nombreTipoDocumento`) VALUES
(5, 'Cedula de ciudadania'),
(6, 'cedula de extranjeria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipomovimiento`
--

CREATE TABLE `tipomovimiento` (
  `idTipoMovimiento` int(11) NOT NULL,
  `nombreTipoMovimiento` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipomovimiento`
--

INSERT INTO `tipomovimiento` (`idTipoMovimiento`, `nombreTipoMovimiento`) VALUES
(1, 'ENES'),
(2, 'SENS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `doc` varchar(45) NOT NULL,
  `usuario` varchar(225) NOT NULL,
  `clave` varchar(225) NOT NULL,
  `estadoUsuario` varchar(100) NOT NULL DEFAULT 'activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`doc`, `usuario`, `clave`, `estadoUsuario`) VALUES
('1001580847', 'javier', '1234', 'activo'),
('1010', 'camilo', '123', 'activo'),
('1033342873', 'brayan', 'lotus', 'activo'),
('11111', 'jun', '123', 'activo'),
('21990736', 'alejo', '123', 'activo');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_movimiento`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_movimiento` (
`idProducto` varchar(50)
,`cantidad` int(11)
,`nombreProducto` varchar(255)
,`idmovimiento_fk` varchar(45)
,`contadorMovimiento` int(11)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_usuario`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_usuario` (
`doc` varchar(45)
,`usuario` varchar(225)
,`clave` varchar(225)
,`nombreUsuario` varchar(225)
,`apellidoUsuario` varchar(225)
,`estadoRol` varchar(45)
,`nombreRol` varchar(45)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_movimiento`
--
DROP TABLE IF EXISTS `vista_movimiento`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_movimiento`  AS  select `dtm`.`idProducto` AS `idProducto`,`dtm`.`cantidad` AS `cantidad`,`p`.`nombreProducto` AS `nombreProducto`,`dtm`.`idmovimiento_fk` AS `idmovimiento_fk`,`m`.`contadorMovimiento` AS `contadorMovimiento` from ((`movimiento` `m` join `detallemovimiento` `dtm` on(`m`.`idmovimiento` = `dtm`.`idmovimiento_fk`)) join `producto` `p` on(`p`.`idProducto` = `dtm`.`idProducto`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_usuario`
--
DROP TABLE IF EXISTS `vista_usuario`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_usuario`  AS  select `u`.`doc` AS `doc`,`u`.`usuario` AS `usuario`,`u`.`clave` AS `clave`,`d`.`nombreUsuario` AS `nombreUsuario`,`d`.`apellidoUsuario` AS `apellidoUsuario`,`dtr`.`estadoRol` AS `estadoRol`,`r`.`nombreRol` AS `nombreRol` from (((`usuario` `u` join `detalleusuario` `d` on(`u`.`doc` = `d`.`docusuario1_fk`)) join `detallerol` `dtr` on(`dtr`.`idusuario` = `u`.`doc`)) join `rol` `r` on(`r`.`idRol` = `dtr`.`idrol_fk`)) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`idActividad`);

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`codbitacora`),
  ADD UNIQUE KEY `codbitacora_UNIQUE` (`codbitacora`),
  ADD KEY `fk_bitacora_usuario_idx` (`docUsuario`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `detalleactividad`
--
ALTER TABLE `detalleactividad`
  ADD PRIMARY KEY (`idDEtalleactividad`),
  ADD KEY `fk_DEtalleactividad_trabajo` (`idactividad_fk`),
  ADD KEY `fk_detalleactividad_usuario1_idx` (`docusuario3_fk`);

--
-- Indices de la tabla `detallemovimiento`
--
ALTER TABLE `detallemovimiento`
  ADD PRIMARY KEY (`idDetalleMovimiento`),
  ADD KEY `fk_producto_idx` (`idProducto`),
  ADD KEY `fk_detallemovimiento_movimiento1_idx` (`idmovimiento_fk`);

--
-- Indices de la tabla `detallerol`
--
ALTER TABLE `detallerol`
  ADD PRIMARY KEY (`idDetalleRol`),
  ADD KEY `fk_detallerol_rol_idx` (`idrol_fk`),
  ADD KEY `fk_detallerol_usuario_idx` (`idusuario`);

--
-- Indices de la tabla `detalleusuario`
--
ALTER TABLE `detalleusuario`
  ADD PRIMARY KEY (`idDetalleUser`),
  ADD KEY `fk_detalleusuario_tipodocumento1_idx1` (`idtipodocu_fk`),
  ADD KEY `fk_detalleusuario_usuario1_idx` (`docusuario1_fk`);

--
-- Indices de la tabla `movimiento`
--
ALTER TABLE `movimiento`
  ADD PRIMARY KEY (`idmovimiento`),
  ADD KEY `fk_movimiento_usuario1_idx` (`docusuario5_fk`),
  ADD KEY `fk_movimiento_tipomovimiento1_idx` (`idtipoMovimiento`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`idpago`),
  ADD KEY `fk_idactividad_idx` (`idactividad_fk`),
  ADD KEY `fk_pago_usuario1_idx` (`docusuario4_fk`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idProducto`),
  ADD KEY `fk_Producto_Categoria1_idx` (`idCategoria_fk`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `tipodocumento`
--
ALTER TABLE `tipodocumento`
  ADD PRIMARY KEY (`idtipodocumento`);

--
-- Indices de la tabla `tipomovimiento`
--
ALTER TABLE `tipomovimiento`
  ADD PRIMARY KEY (`idTipoMovimiento`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`doc`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividad`
--
ALTER TABLE `actividad`
  MODIFY `idActividad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `detalleactividad`
--
ALTER TABLE `detalleactividad`
  MODIFY `idDEtalleactividad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `detallemovimiento`
--
ALTER TABLE `detallemovimiento`
  MODIFY `idDetalleMovimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=312;

--
-- AUTO_INCREMENT de la tabla `detallerol`
--
ALTER TABLE `detallerol`
  MODIFY `idDetalleRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `detalleusuario`
--
ALTER TABLE `detalleusuario`
  MODIFY `idDetalleUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `idpago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tipodocumento`
--
ALTER TABLE `tipodocumento`
  MODIFY `idtipodocumento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tipomovimiento`
--
ALTER TABLE `tipomovimiento`
  MODIFY `idTipoMovimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalleactividad`
--
ALTER TABLE `detalleactividad`
  ADD CONSTRAINT `fk_Detalleactividad_trabajo` FOREIGN KEY (`idactividad_fk`) REFERENCES `actividad` (`idActividad`),
  ADD CONSTRAINT `fk_detalleactividad_usuario1` FOREIGN KEY (`docusuario3_fk`) REFERENCES `usuario` (`doc`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detallemovimiento`
--
ALTER TABLE `detallemovimiento`
  ADD CONSTRAINT `fk_detallemovimiento_movimiento1` FOREIGN KEY (`idmovimiento_fk`) REFERENCES `movimiento` (`idmovimiento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_producto` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detallerol`
--
ALTER TABLE `detallerol`
  ADD CONSTRAINT `fk_detallerol_rol` FOREIGN KEY (`idrol_fk`) REFERENCES `rol` (`idRol`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detallerol_usuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`doc`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalleusuario`
--
ALTER TABLE `detalleusuario`
  ADD CONSTRAINT `fk_detalleusuario_tipodocumento1` FOREIGN KEY (`idtipodocu_fk`) REFERENCES `tipodocumento` (`idtipodocumento`),
  ADD CONSTRAINT `fk_detalleusuario_usuario1` FOREIGN KEY (`docusuario1_fk`) REFERENCES `usuario` (`doc`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `movimiento`
--
ALTER TABLE `movimiento`
  ADD CONSTRAINT `fk_movimiento_tipomovimiento1` FOREIGN KEY (`idtipoMovimiento`) REFERENCES `tipomovimiento` (`idTipoMovimiento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_movimiento_usuario1` FOREIGN KEY (`docusuario5_fk`) REFERENCES `usuario` (`doc`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `fk_idactividad` FOREIGN KEY (`idactividad_fk`) REFERENCES `actividad` (`idActividad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pago_usuario1` FOREIGN KEY (`docusuario4_fk`) REFERENCES `usuario` (`doc`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_Producto_Categoria1` FOREIGN KEY (`idCategoria_fk`) REFERENCES `categoria` (`idCategoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
