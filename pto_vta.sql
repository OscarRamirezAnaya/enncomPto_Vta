-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-04-2016 a las 16:49:23
-- Versión del servidor: 10.1.10-MariaDB
-- Versión de PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pto_vta`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoriap`
--

CREATE TABLE `categoriap` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `recorddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `sku` varchar(20) NOT NULL,
  `name` varchar(80) DEFAULT NULL,
  `app` varchar(80) DEFAULT NULL,
  `apm` varchar(80) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `sexo` char(2) DEFAULT NULL,
  `dir` varchar(200) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `cp` int(11) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `recorddate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `sku`, `name`, `app`, `apm`, `edad`, `sexo`, `dir`, `tel`, `cp`, `email`, `recorddate`) VALUES
(27, '', 'Aztra Zeneca', 'SA de CV', 'NA', 0, '', 'Periferico sur ', '55265146', 0, 'astra@gmail.com', '2016-04-27 02:16:59'),
(28, '', 'Lalo', 'perez', 'perez', 0, '', 'asdd', '5555555', 0, 'astra@gmail.com', '2016-04-30 14:39:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `h_venta`
--

CREATE TABLE `h_venta` (
  `id` int(11) NOT NULL,
  `idCliente` int(11) DEFAULT NULL,
  `recorddate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `total` float DEFAULT NULL,
  `estatus_cta` int(11) NOT NULL,
  `fechapago` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `l_venta`
--

CREATE TABLE `l_venta` (
  `id` int(11) NOT NULL,
  `idHead` int(11) NOT NULL,
  `idProducto` int(11) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `costo` float DEFAULT NULL,
  `monto` float DEFAULT NULL,
  `cantidad` float DEFAULT NULL,
  `recorddate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `name` varchar(80) DEFAULT NULL,
  `costo` varchar(80) DEFAULT NULL,
  `precio` varchar(80) DEFAULT NULL,
  `idCliente` int(11) DEFAULT NULL,
  `idCategoria` int(11) NOT NULL,
  `img` varchar(100) NOT NULL,
  `recorddate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `usuario` varchar(20) DEFAULT NULL,
  `psw` varchar(100) DEFAULT NULL,
  `estatus` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `RecordDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UltimaSession` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `usuario`, `psw`, `estatus`, `estado`, `RecordDate`, `UltimaSession`) VALUES
(1, 'administrador', '202cb962ac59075b964b07152d234b70', 1, 1, '2016-03-09 20:24:34', NULL);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v_productos`
--
CREATE TABLE `v_productos` (
`id` int(11)
,`nombreProducto` varchar(80)
,`costo` varchar(80)
,`precio` varchar(80)
,`nombreCliente` varchar(80)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v_ventas`
--
CREATE TABLE `v_ventas` (
`id` int(11)
,`name` varchar(80)
,`total` float
,`recorddate` timestamp
);

-- --------------------------------------------------------

--
-- Estructura para la vista `v_productos`
--
DROP TABLE IF EXISTS `v_productos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_productos`  AS  select `a`.`id` AS `id`,`a`.`name` AS `nombreProducto`,`a`.`costo` AS `costo`,`a`.`precio` AS `precio`,`b`.`name` AS `nombreCliente` from (`productos` `a` join `clientes` `b` on((`a`.`idCliente` = `b`.`id`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `v_ventas`
--
DROP TABLE IF EXISTS `v_ventas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_ventas`  AS  select distinct `h`.`id` AS `id`,`c`.`name` AS `name`,`h`.`total` AS `total`,`h`.`recorddate` AS `recorddate` from ((`h_venta` `h` join `l_venta` `l` on((`h`.`id` = `l`.`idHead`))) join `clientes` `c` on((`c`.`id` = `h`.`idCliente`))) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoriap`
--
ALTER TABLE `categoriap`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `h_venta`
--
ALTER TABLE `h_venta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCliente` (`idCliente`);

--
-- Indices de la tabla `l_venta`
--
ALTER TABLE `l_venta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idHead` (`idHead`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoriap`
--
ALTER TABLE `categoriap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT de la tabla `h_venta`
--
ALTER TABLE `h_venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `l_venta`
--
ALTER TABLE `l_venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `h_venta`
--
ALTER TABLE `h_venta`
  ADD CONSTRAINT `h_venta_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`id`);

--
-- Filtros para la tabla `l_venta`
--
ALTER TABLE `l_venta`
  ADD CONSTRAINT `l_venta_ibfk_1` FOREIGN KEY (`idHead`) REFERENCES `h_venta` (`id`);

DELIMITER $$
--
-- Eventos
--
CREATE DEFINER=`root`@`localhost` EVENT `elimina_vacios` ON SCHEDULE EVERY 5 MINUTE STARTS '2016-04-26 20:49:41' ON COMPLETION NOT PRESERVE ENABLE DO DELETE FROM clientes WHERE name is null$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
