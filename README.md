# TPE-WEB2-ECOMMERCE
Integrantes:
            -Joaquin Cambareri (joaquin.cambareri@eest3necochea.edu.ar)
            -Bruno De la Penna (bdelapenna@gmail.com)

#Tematica: Ecommerce de ventas de celulares reacondicionados

#Breve Descripción de la Temática:
El sitio web se enfocará en la venta de teléfonos móviles reacondicionados. Los usuarios podrán explorar una variedad de modelos de teléfonos reacondicionados, ver detalles de cada producto y realizar compras en línea.
# DIAGRAMA ENTIDAD-RELACION
![der](https://github.com/Jcambareri6/TPE-WEB2-ECOMMERCE/assets/108158462/072f2dd3-885a-44a3-9f56-0a27781719f7)
#SQL BASE DE DATOS 

[Uploading -- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-09-2023 a las 17:24:37
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tpe_web2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `CompraID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `ProductoID` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `FechaCompra` int(11) NOT NULL
  FOREIGN KEY (ProductoID) REFERENCES productos(ProductoID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `MarcaID` int(11) NOT NULL,
  `Nombre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `ProductoID` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Descripcion` text NOT NULL,
  `Precio` double NOT NULL,
  `Stock` int(11) NOT NULL,
  `marcaID` int(11) NOT NULL
  `Condicion` varchar(20) NOT NULL,
  FOREIGN KEY (marcaID) REFERENCES marcas(MarcaID)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`CompraID`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`MarcaID`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`ProductoID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `CompraID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `MarcaID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `ProductoID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
tpe_web2 (2).sql…]()








            
