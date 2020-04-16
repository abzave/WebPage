-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-04-2020 a las 03:16:35
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `blog`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `author`
--

CREATE TABLE `author` (
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `path` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `post`
--

CREATE TABLE `post` (
  `title` varchar(255) NOT NULL,
  `description` tinytext NOT NULL,
  `content` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `image` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `post_categories`
--

CREATE TABLE `post_categories` (
  `post` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `post_tags`
--

CREATE TABLE `post_tags` (
  `post` varchar(255) NOT NULL,
  `tag` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tag`
--

CREATE TABLE `tag` (
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`name`);

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`name`);

--
-- Indices de la tabla `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`title`),
  ADD KEY `author` (`author`),
  ADD KEY `image` (`image`);

--
-- Indices de la tabla `post_categories`
--
ALTER TABLE `post_categories`
  ADD KEY `post` (`post`),
  ADD KEY `category` (`category`);

--
-- Indices de la tabla `post_tags`
--
ALTER TABLE `post_tags`
  ADD KEY `post` (`post`),
  ADD KEY `tag` (`tag`);

--
-- Indices de la tabla `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`name`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`author`) REFERENCES `author` (`name`),
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`image`) REFERENCES `image` (`id`);

--
-- Filtros para la tabla `post_categories`
--
ALTER TABLE `post_categories`
  ADD CONSTRAINT `post_categories_ibfk_1` FOREIGN KEY (`post`) REFERENCES `post` (`title`),
  ADD CONSTRAINT `post_categories_ibfk_2` FOREIGN KEY (`category`) REFERENCES `category` (`name`);

--
-- Filtros para la tabla `post_tags`
--
ALTER TABLE `post_tags`
  ADD CONSTRAINT `post_tags_ibfk_1` FOREIGN KEY (`post`) REFERENCES `post` (`title`),
  ADD CONSTRAINT `post_tags_ibfk_2` FOREIGN KEY (`tag`) REFERENCES `tag` (`name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
