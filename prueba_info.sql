-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-05-2023 a las 08:26:26
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
-- Base de datos: `prueba_info`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitante`
--

CREATE TABLE `visitante` (
  `idVisitante` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `apellidos` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contrasena` varchar(255) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `fecNaci` date DEFAULT NULL,
  `categoria` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `visitante`
--

INSERT INTO `visitante` (`idVisitante`, `nombre`, `apellidos`, `email`, `contrasena`, `telefono`, `fecNaci`, `categoria`) VALUES
(1, 'carolina', 'rivera', 'l19980835@roque.tecnm.mx', '12345678', '4612547778', '2023-05-17', 'ADMIN'),
(2, 'Carolina', 'Alfaro', 'carolinabely22@gmail.com', '12345678', '4613801264', '2023-05-18', 'NORMAL'),
(3, 'ximena monserrat', 'rodriguez morales', 'l20031806@celaya.tecnm.mx', '12345678', '46125477', '2023-05-19', 'ADMIN'),
(14, 'sdasd', 'asdas', 'admin@admin', '12345678', '4613801264', '2023-05-17', 'Selecciona una opción...'),
(16, 'bryan', 'montoya', 'admin@admin.com', '12345678', '4613801264', '2023-05-15', 'ADMIN'),
(17, 'erick', 'alfaro', 'erick@erick', '12345678', '4612358958', '2023-05-18', 'NORMAL'),
(18, 'caro', 'rivera', 'caro@caro', '12345678', '4612358984', '2023-05-17', 'ADMIN'),
(19, 'bryan', 'rodriguez', 'bryan@bryan.com', '12345678', '4615896324', '2023-05-30', 'ADMIN'),
(20, 'bryan', 'rodriguez', 'bryan@bryan.co', '12345678', '4615896324', '2023-05-30', 'ADMIN');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `visitante`
--
ALTER TABLE `visitante`
  ADD PRIMARY KEY (`idVisitante`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `visitante`
--
ALTER TABLE `visitante`
  MODIFY `idVisitante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
