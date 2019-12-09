-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-12-2019 a las 07:11:35
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.2.12

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
(1, 'toyota'),
(2, 'honda');

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
(1, 'ejemplo2'),
(2, 'cualquier cosa');

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
-- Estructura de tabla para la tabla `id_tipo_contenedor`
--

CREATE TABLE `id_tipo_contenedor` (
  `id_tipo_contenedor` int(11) NOT NULL,
  `nombre_contenedor` varchar(50) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `id_tipo_contenedor`
--

INSERT INTO `id_tipo_contenedor` (`id_tipo_contenedor`, `nombre_contenedor`) VALUES
(1, 'contenedor 1'),
(2, 'contenedor 2');

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
(4, 3, '2019-12-09 00:00:00', '123', 12, 1);

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
(1, 'dawrq'),
(2, '1231asa');

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
(1, 'fdsfsdas', 2),
(2, 'dasda', 1);

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
  `direccion` varchar(50) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`dui_persona`, `nombre1`, `nombre2`, `apellido1`, `apellido2`, `id_sexo`, `telefono`, `direccion`) VALUES
('123456789', 'Humberto', 'Wilfredo', 'Henriquez', 'Benitez', 1, '74164157', 'Edif 2 apto 31 colonia zacamil');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pieza`
--

CREATE TABLE `pieza` (
  `Id_pieza` int(11) NOT NULL,
  `nombre_pieza` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

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
('123', 1, 2, 23, 'bus');

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
(3, '123456789', '74164157', 'benitezh5@hotmail.com');

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
(4, 'dsadasd231', 'dada212', '123456789', 1);

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
(1, 2, 1993, 'azul', '2019-12-03', '123', '123', 1, 122, 1234, 2, 2, '4123', 4, 1234);

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
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria_piezas`
--
ALTER TABLE `categoria_piezas`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `clase_vehiculo`
--
ALTER TABLE `clase_vehiculo`
  ADD PRIMARY KEY (`id_clase`);

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
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `id_tipo_contenedor`
--
ALTER TABLE `id_tipo_contenedor`
  ADD PRIMARY KEY (`id_tipo_contenedor`);

--
-- Indices de la tabla `ingreso`
--
ALTER TABLE `ingreso`
  ADD PRIMARY KEY (`id_ingreso`),
  ADD KEY `ingreso_proveedor` (`id_proveedor`),
  ADD KEY `ingreso_estado` (`id_estado`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `modelo`
--
ALTER TABLE `modelo`
  ADD PRIMARY KEY (`id_modelo`),
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
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `sexo`
--
ALTER TABLE `sexo`
  ADD PRIMARY KEY (`id_sexo`);

--
-- Indices de la tabla `tipo_motor`
--
ALTER TABLE `tipo_motor`
  ADD PRIMARY KEY (`id_tipo_motor`);

--
-- Indices de la tabla `transmision`
--
ALTER TABLE `transmision`
  ADD PRIMARY KEY (`id_transmision`);

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
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `clase_vehiculo`
--
ALTER TABLE `clase_vehiculo`
  MODIFY `id_clase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `id_detalle_venta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `id_tipo_contenedor`
--
ALTER TABLE `id_tipo_contenedor`
  MODIFY `id_tipo_contenedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ingreso`
--
ALTER TABLE `ingreso`
  MODIFY `id_ingreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `modelo`
--
ALTER TABLE `modelo`
  MODIFY `id_modelo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pieza`
--
ALTER TABLE `pieza`
  MODIFY `Id_pieza` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pieza_vehiculo`
--
ALTER TABLE `pieza_vehiculo`
  MODIFY `id_pieza_vehiculo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- AUTO_INCREMENT de la tabla `tipo_motor`
--
ALTER TABLE `tipo_motor`
  MODIFY `id_tipo_motor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `transmision`
--
ALTER TABLE `transmision`
  MODIFY `id_transmision` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  MODIFY `id_vehiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `poliza_contenedor` FOREIGN KEY (`id_tipo_contenedor`) REFERENCES `id_tipo_contenedor` (`id_tipo_contenedor`);

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
