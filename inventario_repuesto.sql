-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-12-2019 a las 18:18:18
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inventario_repuesto`
--
CREATE DATABASE IF NOT EXISTS `inventario_repuesto` DEFAULT CHARACTER SET latin1 COLLATE latin1_spanish_ci;
USE `inventario_repuesto`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_piezas`
--

CREATE TABLE `categoria_piezas` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(50) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `categoria_piezas`
--

INSERT INTO `categoria_piezas` (`id_categoria`, `nombre_categoria`) VALUES
(3, 'CHIO'),
(7, 'HumbertoCat'),
(8, 'Probando'),
(12, 'Repuestos de Interior'),
(11, 'Suspension'),
(1, 'toyota');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clase_vehiculo`
--

CREATE TABLE `clase_vehiculo` (
  `id_clase` int(11) NOT NULL,
  `nombre_clase` varchar(50) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `clase_vehiculo`
--

INSERT INTO `clase_vehiculo` (`id_clase`, `nombre_clase`) VALUES
(2, 'cualquier cosa'),
(1, 'ejemplo2'),
(3, 'Humberto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `id_detalle_venta` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `id_pieza` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `detalle_venta`
--

INSERT INTO `detalle_venta` (`id_detalle_venta`, `id_venta`, `id_pieza`, `cantidad`) VALUES
(1, 1, 2, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `estado` varchar(50) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id_estado`, `estado`) VALUES
(1, 'probando1'),
(2, 'probando2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso`
--

CREATE TABLE `ingreso` (
  `id_ingreso` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `num_comprobante` char(8) COLLATE latin1_spanish_ci NOT NULL,
  `total_compra` double NOT NULL,
  `id_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `ingreso`
--

INSERT INTO `ingreso` (`id_ingreso`, `id_proveedor`, `fecha_hora`, `num_comprobante`, `total_compra`, `id_estado`) VALUES
(4, 3, '2019-12-09 00:00:00', '123', 12, 1),
(6, 3, '2019-12-20 10:41:40', '12345678', 5888, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `id_marca` int(11) NOT NULL,
  `nombre_marca` varchar(50) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id_marca`, `nombre_marca`) VALUES
(14, 'Audi'),
(13, 'BMW'),
(12, 'Honda'),
(4, 'Humberto'),
(15, 'Mercedes'),
(10, 'Miguelon'),
(1, 'pedrokjhgkhj'),
(3, 'probando'),
(11, 'Toyota');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelo`
--

CREATE TABLE `modelo` (
  `id_modelo` int(11) NOT NULL,
  `nombre_modelo` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `id_marca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `modelo`
--

INSERT INTO `modelo` (`id_modelo`, `nombre_modelo`, `id_marca`) VALUES
(1, 'fsdfs', 1),
(2, 'deeeeeeeee', 4),
(7, 'Benitez', 4),
(9, 'qqweqwedwedasdfaedgsadrfgcxvdfgsfvbw', 1),
(10, 'hola', 1),
(26, 'Corolla', 11),
(27, 'Civic', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `dui_persona` char(10) COLLATE latin1_spanish_ci NOT NULL,
  `nombre1` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `nombre2` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `apellido1` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `apellido2` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `id_sexo` int(11) NOT NULL,
  `telefono` char(9) COLLATE latin1_spanish_ci NOT NULL,
  `direccion` varchar(150) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`dui_persona`, `nombre1`, `nombre2`, `apellido1`, `apellido2`, `id_sexo`, `telefono`, `direccion`) VALUES
('123456', 'Humberto', 'dasdda', 'dasdadasd', 'adasda', 1, '', 'noooooooooooooooooooooooooo'),
('12345678-9', 'Wilfredo', 'Hum', 'Henriquez', 'Henitez', 1, '2275-2588', 'Km 481/2 Carretera Troncal Del Norte Caserio El Co'),
('123456789', 'Humberto', 'Wilfredo', 'Henriquez', 'Benitez', 1, '74164157', 'Edif 2 apto 31 colonia zacamil'),
('222222222', 'merlin', 'rocio', 'martinez', 'miranda', 2, '', 'planes de renderos'),
('24324', 'Wilfredo', 'sfsf', 'sdfsdfs', 'fsf', 1, '', 'fsfsdfs'),
('45353', 'Humberto', 'WIlfredo', 'Henriquez', 'Benitez', 1, '', '5353');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pieza`
--

CREATE TABLE `pieza` (
  `Id_pieza` int(11) NOT NULL,
  `nombre_pieza` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `pieza`
--

INSERT INTO `pieza` (`Id_pieza`, `nombre_pieza`, `id_categoria`) VALUES
(2, 'cualquiera 33', 1),
(3, 'meeeeeeeeeeeeeeeeeeeeerlinnnnnnnnnnnnnnnnnnn', 1),
(4, 'Pedro', 3),
(6, 'Humberto', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pieza_vehiculo`
--

CREATE TABLE `pieza_vehiculo` (
  `id_pieza_vehiculo` int(11) NOT NULL,
  `id_pieza` int(11) NOT NULL,
  `id_vehiculo` int(11) NOT NULL,
  `precio_ingreso` double NOT NULL,
  `precio_venta` double NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `pieza_vehiculo`
--

INSERT INTO `pieza_vehiculo` (`id_pieza_vehiculo`, `id_pieza`, `id_vehiculo`, `precio_ingreso`, `precio_venta`, `stock`) VALUES
(1, 4, 7, 5, 3, 315646),
(2, 6, 3, 4535, 345353, 53453),
(5, 3, 19, 3232, 3232, 232);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `poliza`
--

CREATE TABLE `poliza` (
  `id_poliza` char(11) COLLATE latin1_spanish_ci NOT NULL,
  `id_tipo_contenedor` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `peso` double NOT NULL,
  `doc_transporte` varchar(50) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `poliza`
--

INSERT INTO `poliza` (`id_poliza`, `id_tipo_contenedor`, `cantidad`, `peso`, `doc_transporte`) VALUES
('0000', 2, 123, 123, '123'),
('12', 1, 13, 0, '2342'),
('123', 1, 2, 23, 'bus'),
('asdad', 1, 5, 5, 'asdasdasd'),
('dfgbszfgxfg', 2, 0, 0, 'hnhnhnhnhn'),
('fdsf', 2, 3232, 343, '5345'),
('ljlkjl', 1, 50, 50, '54sa654da'),
('noooooooooo', 1, 5, 5, 'nooooooooooooooooo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id_proveedor` int(11) NOT NULL,
  `dui_persona` char(10) COLLATE latin1_spanish_ci NOT NULL,
  `telefono` char(10) COLLATE latin1_spanish_ci NOT NULL,
  `correo` varchar(50) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_proveedor`, `dui_persona`, `telefono`, `correo`) VALUES
(3, '123456789', '74164157', 'benitezh5@hotmail.com'),
(4, '123456', '7877-8410', 'isidrosalvador1@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(50) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `nombre_rol`) VALUES
(1, 'administrador'),
(2, 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sexo`
--

CREATE TABLE `sexo` (
  `id_sexo` int(11) NOT NULL,
  `sexo` varchar(20) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `sexo`
--

INSERT INTO `sexo` (`id_sexo`, `sexo`) VALUES
(1, 'Masculino'),
(2, 'Femenino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_contenedor`
--

CREATE TABLE `tipo_contenedor` (
  `id_tipo_contenedor` int(11) NOT NULL,
  `nombre_contenedor` varchar(50) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_contenedor`
--

INSERT INTO `tipo_contenedor` (`id_tipo_contenedor`, `nombre_contenedor`) VALUES
(1, 'contenedor 1'),
(2, 'contenedor 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_motor`
--

CREATE TABLE `tipo_motor` (
  `id_tipo_motor` int(11) NOT NULL,
  `nombre_tipo_motor` varchar(50) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_motor`
--

INSERT INTO `tipo_motor` (`id_tipo_motor`, `nombre_tipo_motor`) VALUES
(1, 'diesel'),
(2, 'especial');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transmision`
--

CREATE TABLE `transmision` (
  `id_transmision` int(11) NOT NULL,
  `tipo_transmision` varchar(50) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `transmision`
--

INSERT INTO `transmision` (`id_transmision`, `tipo_transmision`) VALUES
(1, 'transmision 1'),
(2, 'transmision 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `correo` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `clave` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `dui_persona` char(10) COLLATE latin1_spanish_ci NOT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `correo`, `clave`, `dui_persona`, `id_rol`) VALUES
(27, 'pdrmendoza007@gmail.com', '60f75fa1ac026844fbb09cbe0cd573e8', '123456789', 1),
(30, 'Definitivo definitivo', '81dc9bdb52d04dc20036dbd8313ed055', '123456', 1),
(31, 'Probando', '202cb962ac59075b964b07152d234b70', '123456', 1),
(32, '123!aMlm', '76d80224611fc919a5d54f0ff9fba446', '123456', 1),
(34, 'wilfredo@hotmail.com', '60f75fa1ac026844fbb09cbe0cd573e8', '123456789', 2),
(35, 'cactusworld@gmail.com', '202cb962ac59075b964b07152d234b70', '123456', 1),
(36, 'benitezh5@hotmail.com', '9e68ac7abe4f1e833f6f84d6cc86f1a6', '123456789', 1),
(37, 'rociomiranda@gmail.com', '60f75fa1ac026844fbb09cbe0cd573e8', '222222222', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `id_vehiculo` int(11) NOT NULL,
  `id_modelo` int(11) NOT NULL,
  `anio` year(4) NOT NULL,
  `color` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `VIN` char(17) COLLATE latin1_spanish_ci NOT NULL,
  `id_poliza` char(11) COLLATE latin1_spanish_ci DEFAULT NULL,
  `id_clase` int(11) NOT NULL,
  `millas` double DEFAULT NULL,
  `serie` int(11) DEFAULT NULL,
  `id_transmision` int(11) NOT NULL,
  `id_tipo_motor` int(11) NOT NULL,
  `serial` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `id_ingreso` int(11) NOT NULL,
  `precio_ingreso` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`id_vehiculo`, `id_modelo`, `anio`, `color`, `fecha_ingreso`, `VIN`, `id_poliza`, `id_clase`, `millas`, `serie`, `id_transmision`, `id_tipo_motor`, `serial`, `id_ingreso`, `precio_ingreso`) VALUES
(3, 1, 1992, '1dada', '0002-12-31', '12345678123456786', '123', 1, 3232, 123, 1, 1, '12345678912345672536', 4, 232),
(7, 1, 1992, '332', '0032-03-12', '12345678909876543', '123', 1, 32, 323, 2, 2, '12345678909876543218', 4, 30),
(12, 7, 0000, 'ads654asddsa', '2019-12-17', '98asd798a7d9s', '0000', 1, 5645546456654, 2147483647, 1, 1, '56465465', 4, 46456),
(14, 27, 2001, 'Blanco', '2019-08-03', '12345678912345645', 'asdad', 1, 2, 2147483647, 1, 1, '12345678909876543212', 4, 3),
(19, 27, 2001, 'blanco', '1991-08-03', '12345678912345652', 'asdad', 2, 2, 123456, 2, 1, '12345678909876543255', 4, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id_venta` int(11) NOT NULL,
  `dui_persona` char(10) COLLATE latin1_spanish_ci NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `num_factura` char(8) COLLATE latin1_spanish_ci NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `total_venta` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`id_venta`, `dui_persona`, `id_usuario`, `num_factura`, `fecha_hora`, `total_venta`) VALUES
(1, '123456789', 31, '12345678', '2019-12-20 08:16:37', 267);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria_piezas`
--
ALTER TABLE `categoria_piezas`
  ADD PRIMARY KEY (`id_categoria`),
  ADD UNIQUE KEY `nombre_categoria` (`nombre_categoria`);

--
-- Indices de la tabla `clase_vehiculo`
--
ALTER TABLE `clase_vehiculo`
  ADD PRIMARY KEY (`id_clase`),
  ADD UNIQUE KEY `nombre_clase` (`nombre_clase`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`id_detalle_venta`),
  ADD KEY `dv1` (`id_pieza`),
  ADD KEY `dv2` (`id_venta`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`),
  ADD UNIQUE KEY `estado` (`estado`);

--
-- Indices de la tabla `ingreso`
--
ALTER TABLE `ingreso`
  ADD PRIMARY KEY (`id_ingreso`),
  ADD UNIQUE KEY `num_comprobante` (`num_comprobante`),
  ADD KEY `ingreso_proveedor` (`id_proveedor`),
  ADD KEY `ingreso_estado` (`id_estado`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id_marca`),
  ADD UNIQUE KEY `nombre_marca` (`nombre_marca`);

--
-- Indices de la tabla `modelo`
--
ALTER TABLE `modelo`
  ADD PRIMARY KEY (`id_modelo`),
  ADD UNIQUE KEY `nombre_modelo` (`nombre_modelo`),
  ADD KEY `modelo_marca` (`id_marca`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`dui_persona`),
  ADD KEY `persona_sexo` (`id_sexo`);

--
-- Indices de la tabla `pieza`
--
ALTER TABLE `pieza`
  ADD PRIMARY KEY (`Id_pieza`),
  ADD UNIQUE KEY `nombre_pieza` (`nombre_pieza`),
  ADD UNIQUE KEY `nombre_pieza_2` (`nombre_pieza`),
  ADD KEY `pieza_categoria` (`id_categoria`);

--
-- Indices de la tabla `pieza_vehiculo`
--
ALTER TABLE `pieza_vehiculo`
  ADD PRIMARY KEY (`id_pieza_vehiculo`),
  ADD KEY `pv1` (`id_pieza`),
  ADD KEY `pv2` (`id_vehiculo`);

--
-- Indices de la tabla `poliza`
--
ALTER TABLE `poliza`
  ADD PRIMARY KEY (`id_poliza`),
  ADD KEY `poliza_contenedor` (`id_tipo_contenedor`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_proveedor`),
  ADD KEY `proveedor_persona` (`dui_persona`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`),
  ADD UNIQUE KEY `nombre_rol` (`nombre_rol`);

--
-- Indices de la tabla `sexo`
--
ALTER TABLE `sexo`
  ADD PRIMARY KEY (`id_sexo`);

--
-- Indices de la tabla `tipo_contenedor`
--
ALTER TABLE `tipo_contenedor`
  ADD PRIMARY KEY (`id_tipo_contenedor`);

--
-- Indices de la tabla `tipo_motor`
--
ALTER TABLE `tipo_motor`
  ADD PRIMARY KEY (`id_tipo_motor`),
  ADD UNIQUE KEY `nombre_tipo_motor` (`nombre_tipo_motor`);

--
-- Indices de la tabla `transmision`
--
ALTER TABLE `transmision`
  ADD PRIMARY KEY (`id_transmision`),
  ADD UNIQUE KEY `tipo_transmision` (`tipo_transmision`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `usuario_persona` (`dui_persona`),
  ADD KEY `usuario_rol` (`id_rol`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`id_vehiculo`),
  ADD UNIQUE KEY `VIN` (`VIN`),
  ADD UNIQUE KEY `serial` (`serial`),
  ADD KEY `vehiculo_modelo` (`id_modelo`),
  ADD KEY `vehiculo_clase` (`id_clase`),
  ADD KEY `vehiculo_transmision` (`id_transmision`),
  ADD KEY `vehiculo_poliza` (`id_poliza`),
  ADD KEY `vehiculo_motor` (`id_tipo_motor`) USING BTREE,
  ADD KEY `vehiculo_ingreso` (`id_ingreso`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `venta_persona` (`dui_persona`),
  ADD KEY `venta_usuario` (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria_piezas`
--
ALTER TABLE `categoria_piezas`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `clase_vehiculo`
--
ALTER TABLE `clase_vehiculo`
  MODIFY `id_clase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `id_detalle_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ingreso`
--
ALTER TABLE `ingreso`
  MODIFY `id_ingreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `modelo`
--
ALTER TABLE `modelo`
  MODIFY `id_modelo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `pieza`
--
ALTER TABLE `pieza`
  MODIFY `Id_pieza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `pieza_vehiculo`
--
ALTER TABLE `pieza_vehiculo`
  MODIFY `id_pieza_vehiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sexo`
--
ALTER TABLE `sexo`
  MODIFY `id_sexo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_contenedor`
--
ALTER TABLE `tipo_contenedor`
  MODIFY `id_tipo_contenedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_motor`
--
ALTER TABLE `tipo_motor`
  MODIFY `id_tipo_motor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `transmision`
--
ALTER TABLE `transmision`
  MODIFY `id_transmision` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  MODIFY `id_vehiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `dv1` FOREIGN KEY (`id_pieza`) REFERENCES `pieza` (`Id_pieza`),
  ADD CONSTRAINT `dv2` FOREIGN KEY (`id_venta`) REFERENCES `venta` (`id_venta`);

--
-- Filtros para la tabla `ingreso`
--
ALTER TABLE `ingreso`
  ADD CONSTRAINT `ingreso_estado` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`),
  ADD CONSTRAINT `ingreso_proveedor` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedor` (`id_proveedor`);

--
-- Filtros para la tabla `modelo`
--
ALTER TABLE `modelo`
  ADD CONSTRAINT `modelo_marca` FOREIGN KEY (`id_marca`) REFERENCES `marca` (`id_marca`);

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `persona_sexo` FOREIGN KEY (`id_sexo`) REFERENCES `sexo` (`id_sexo`);

--
-- Filtros para la tabla `pieza`
--
ALTER TABLE `pieza`
  ADD CONSTRAINT `pieza_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria_piezas` (`id_categoria`);

--
-- Filtros para la tabla `pieza_vehiculo`
--
ALTER TABLE `pieza_vehiculo`
  ADD CONSTRAINT `pv1` FOREIGN KEY (`id_pieza`) REFERENCES `pieza` (`Id_pieza`),
  ADD CONSTRAINT `pv2` FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculo` (`id_vehiculo`);

--
-- Filtros para la tabla `poliza`
--
ALTER TABLE `poliza`
  ADD CONSTRAINT `poliza_contenedor` FOREIGN KEY (`id_tipo_contenedor`) REFERENCES `tipo_contenedor` (`id_tipo_contenedor`);

--
-- Filtros para la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD CONSTRAINT `proveedor_persona` FOREIGN KEY (`dui_persona`) REFERENCES `persona` (`dui_persona`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_persona` FOREIGN KEY (`dui_persona`) REFERENCES `persona` (`dui_persona`),
  ADD CONSTRAINT `usuario_rol` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`);

--
-- Filtros para la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD CONSTRAINT `vehiculo_clase` FOREIGN KEY (`id_clase`) REFERENCES `clase_vehiculo` (`id_clase`),
  ADD CONSTRAINT `vehiculo_ingreso` FOREIGN KEY (`id_ingreso`) REFERENCES `ingreso` (`id_ingreso`),
  ADD CONSTRAINT `vehiculo_modelo` FOREIGN KEY (`id_modelo`) REFERENCES `modelo` (`id_modelo`),
  ADD CONSTRAINT `vehiculo_motor_tipo` FOREIGN KEY (`id_tipo_motor`) REFERENCES `tipo_motor` (`id_tipo_motor`),
  ADD CONSTRAINT `vehiculo_poliza` FOREIGN KEY (`id_poliza`) REFERENCES `poliza` (`id_poliza`),
  ADD CONSTRAINT `vehiculo_transmision` FOREIGN KEY (`id_transmision`) REFERENCES `transmision` (`id_transmision`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_persona` FOREIGN KEY (`dui_persona`) REFERENCES `persona` (`dui_persona`),
  ADD CONSTRAINT `venta_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
