-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-04-2020 a las 23:39:49
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
-- Base de datos: `projects`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `name` varchar(127) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `image`
--

CREATE TABLE `image` (
  `path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `language`
--

CREATE TABLE `language` (
  `name` varchar(127) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paradigm`
--

CREATE TABLE `paradigm` (
  `name` varchar(127) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project`
--

CREATE TABLE `project` (
  `title` varchar(255) NOT NULL,
  `description` tinytext NOT NULL,
  `image` varchar(255) NOT NULL,
  `url` tinytext NOT NULL,
  `category` varchar(127) NOT NULL,
  `date` date NOT NULL,
  `long_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project_languages`
--

CREATE TABLE `project_languages` (
  `project` varchar(127) NOT NULL,
  `language` varchar(127) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project_paradigms`
--

CREATE TABLE `project_paradigms` (
  `project` varchar(127) NOT NULL,
  `paradigm` varchar(127) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project_technologies`
--

CREATE TABLE `project_technologies` (
  `project` varchar(127) NOT NULL,
  `technology` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `technology`
--

CREATE TABLE `technology` (
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`name`);

--
-- Indices de la tabla `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`path`);

--
-- Indices de la tabla `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`name`);

--
-- Indices de la tabla `paradigm`
--
ALTER TABLE `paradigm`
  ADD PRIMARY KEY (`name`);

--
-- Indices de la tabla `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`title`),
  ADD KEY `image` (`image`),
  ADD KEY `category` (`category`);

--
-- Indices de la tabla `project_languages`
--
ALTER TABLE `project_languages`
  ADD KEY `project` (`project`),
  ADD KEY `language` (`language`);

--
-- Indices de la tabla `project_paradigms`
--
ALTER TABLE `project_paradigms`
  ADD KEY `project` (`project`),
  ADD KEY `paradigm` (`paradigm`);

--
-- Indices de la tabla `project_technologies`
--
ALTER TABLE `project_technologies`
  ADD KEY `project` (`project`),
  ADD KEY `technology` (`technology`);

--
-- Indices de la tabla `technology`
--
ALTER TABLE `technology`
  ADD PRIMARY KEY (`name`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`image`) REFERENCES `image` (`path`),
  ADD CONSTRAINT `project_ibfk_2` FOREIGN KEY (`category`) REFERENCES `category` (`name`);

--
-- Filtros para la tabla `project_languages`
--
ALTER TABLE `project_languages`
  ADD CONSTRAINT `project_languages_ibfk_1` FOREIGN KEY (`project`) REFERENCES `project` (`title`),
  ADD CONSTRAINT `project_languages_ibfk_2` FOREIGN KEY (`language`) REFERENCES `language` (`name`);

--
-- Filtros para la tabla `project_paradigms`
--
ALTER TABLE `project_paradigms`
  ADD CONSTRAINT `project_paradigms_ibfk_1` FOREIGN KEY (`project`) REFERENCES `project` (`title`),
  ADD CONSTRAINT `project_paradigms_ibfk_2` FOREIGN KEY (`paradigm`) REFERENCES `paradigm` (`name`);

--
-- Filtros para la tabla `project_technologies`
--
ALTER TABLE `project_technologies`
  ADD CONSTRAINT `project_technologies_ibfk_1` FOREIGN KEY (`project`) REFERENCES `project` (`title`),
  ADD CONSTRAINT `project_technologies_ibfk_2` FOREIGN KEY (`technology`) REFERENCES `technology` (`name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
