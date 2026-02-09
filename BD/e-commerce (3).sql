-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-07-2024 a las 19:07:00
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `e-commerce`
--
CREATE DATABASE IF NOT EXISTS `e-commerce` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `e-commerce`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritos`
--

CREATE TABLE `favoritos` (
  `id_favorito` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `fecha_agregado` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `favoritos`
--

INSERT INTO `favoritos` (`id_favorito`, `id_usuario`, `id_producto`, `fecha_agregado`) VALUES
(249, 3, 11, '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(25) NOT NULL,
  `nombre_producto` varchar(50) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `nombre_imagen` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre_producto`, `marca`, `categoria`, `descripcion`, `nombre_imagen`) VALUES
(10, 'Airmax95 White&Grey', 'Airmax 95', 'Zapatillas', 'Tallas 36-45 <br>\r\nBlancas y grises\r\n', 'Airmax95 White&Grey.jpeg'),
(11, 'Airmax95 Brown&Black', 'Airmax 95', 'Zapatillas', 'Tallas 36-46 <br>\r\nMarrones y Negras', 'Airmax95 Brown&Black.jpeg'),
(13, 'Airmax 95 White&Blue', 'Airmax 95', 'Zapatillas', 'Tallas 36-46 <br>\r\nBlancas y azules', 'Airmax 95 White&Blue.jpeg'),
(14, 'Airmax95 DarkBlue&Orange', 'Airmax 95', 'Zapatillas', 'Tallas 36-46 <br>\r\nAzules y naranjas', 'Airmax95 DarkBlue&Orange.jpeg'),
(26, 'NorthFace Black', 'NorthFace', 'Abrigos', 'NorthFace Black', 'NorthFace Black.jpg'),
(27, 'NorthFace Beige', 'NorthFace', 'Abrigos', 'NorthFace Beige', 'NorthFace Beige.jpg'),
(28, 'NorthFace White', 'NorthFace', 'Abrigos', 'NorthFace White', 'NorthFace White.jpg'),
(29, 'NorthFace Darkblue', 'NorthFace', 'Abrigos', 'NorthFace Darkblue', 'NorthFace Darkblue.jpg'),
(30, 'NorthFace Orange', 'NorthFace', 'Abrigos', 'NorthFace Orange', 'NorthFace Orange.jpg'),
(31, 'NorthFace Blue', 'NorthFace', 'Abrigos', 'NorthFace Blue', 'NorthFace Blue.jpg'),
(32, 'NorthFace Yellow', 'NorthFace', 'Abrigos', 'NorthFace Yellow', 'NorthFace Yellow.jpg'),
(33, 'NorthFace Purple', 'NorthFace', 'Abrigos', 'NorthFace Purple', 'NorthFace Purple.jpg'),
(34, 'NorthFace Green', 'NorthFace', 'Abrigos', 'NorthFace Green', 'NorthFace Green.jpg'),
(35, 'Airmax TN Blue&Black', 'Airmax TN', 'Zapatillas', 'Tallas 36-45 <br>\r\nBlue&Black', 'Airmax TN Blue&Black.jpg'),
(36, 'Airmax TN Yellow', 'Airmax TN', 'Zapatillas', 'Tallas 36-45\r\nYellow', 'Airmax TN Yellow.jpg'),
(37, 'Airmax TN White&Blue&Yellow', 'Airmax TN', 'Zapatillas', 'Tallas 36-45\r\n<br> White&Blue&Yellow', 'Airmax TN White&Blue&Yellow.jpg'),
(38, 'NorthFace Gucci', 'NorthFace', 'Abrigos', 'NorthFace Gucci', 'NorthFace Gucci.jpg'),
(39, 'Sudadera Ralph', 'RalpLauren', 'Camisetas', 'Tallas S-XL', 'Sudadera Ralph.jpg'),
(40, 'Polo Stussy', 'Stussy', 'Camisetas', 'Polo Stussy', 'Polo Stussy.jpg'),
(41, 'Polo Ralph Lauren', 'RalpLauren', 'Camisetas', 'Polo Ralph Lauren', 'Polo Ralph Lauren.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(25) NOT NULL,
  `apellido_usuario` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `tipo_usuario` varchar(25) NOT NULL DEFAULT 'user',
  `estado` varchar(25) NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `apellido_usuario`, `email`, `contraseña`, `tipo_usuario`, `estado`) VALUES
(1, 'Menji', 'Menjibar', 'cristianmenjibar@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'administrador', 'OK'),
(2, 'Cristina', 'Menjibar', 'cristina@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'user', 'OK');


--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD PRIMARY KEY (`id_favorito`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  MODIFY `id_favorito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
