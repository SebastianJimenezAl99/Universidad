-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-10-2023 a las 17:32:08
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
-- Base de datos: `universidad`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

CREATE TABLE `calificaciones` (
  `id_calificacion` int(11) NOT NULL,
  `calificacion` float(2,2) NOT NULL,
  `id_clase` int(11) NOT NULL,
  `id_maestro` int(11) NOT NULL,
  `maestro` varchar(250) DEFAULT NULL,
  `mensaje` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clases`
--

CREATE TABLE `clases` (
  `id_clase` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `id_maestro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clases`
--

INSERT INTO `clases` (`id_clase`, `nombre`, `id_maestro`) VALUES
(1, 'Calculo Integral', 0),
(2, 'Programación I', 7),
(3, 'Algebra Lineal', 4),
(4, 'Calculo Diferencial', 8),
(5, 'Prueba 2', 0),
(6, 'Lengua Inglesa', NULL),
(7, 'Ética Empresarial', NULL),
(8, 'Robótica I', 5),
(9, 'Física Mecánica', 0),
(10, 'Prueba', NULL),
(11, 'Quimica', 0),
(12, 'Física Eléctrica', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes_clases`
--

CREATE TABLE `estudiantes_clases` (
  `id_clase` int(11) NOT NULL,
  `id_estudiante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estudiantes_clases`
--

INSERT INTO `estudiantes_clases` (`id_clase`, `id_estudiante`) VALUES
(1, 1),
(1, 40),
(1, 41),
(1, 42),
(1, 43),
(1, 44),
(1, 45),
(1, 46),
(1, 47),
(1, 48),
(1, 49),
(2, 40),
(2, 41),
(2, 42),
(2, 43),
(2, 44),
(2, 45),
(2, 46),
(2, 47),
(2, 48),
(2, 49),
(3, 40),
(3, 41),
(3, 42),
(3, 43),
(3, 44),
(3, 45),
(3, 46),
(3, 47),
(3, 48),
(3, 49);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `rol` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `rol`) VALUES
(1, 'Administrador'),
(2, 'Maestro'),
(3, 'Estudiante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuarioID` int(11) NOT NULL,
  `dni` varchar(250) DEFAULT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `apellido` varchar(250) DEFAULT NULL,
  `direccion` varchar(250) DEFAULT NULL,
  `fechaNacimiento` date DEFAULT NULL,
  `estado` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuarioID`, `dni`, `email`, `password`, `id_rol`, `nombre`, `apellido`, `direccion`, `fechaNacimiento`, `estado`) VALUES
(1, '9876543210', 'alumno@alumno', '$2y$10$RgD4/cuInZ0AEGChNbP5euq8gwgz3XbQRIpYIYCKp8Uh4ol3t0DGi', 3, 'Alumno', 'Alumno', 'Los Alpes, Calle 31h #71A - 40', '1999-02-07', 'Activo'),
(2, '654987321', 'admin@admin', '$2y$10$2inDB053ZgkzQ5M6xeyHg.J4VUMrPYOoPsV/tGnyFFFeTfBsjZPyS', 1, 'Administrador', 'Administrador', 'Calle Administrador #32 calle b', '2005-08-01', 'Activo'),
(3, '321456987', 'maestro@maestro', '$2y$10$RgD4/cuInZ0AEGChNbP5euq8gwgz3XbQRIpYIYCKp8Uh4ol3t0DGi', 2, 'Maestro', 'Maestro', 'Catellana calle Principal #71-53', '2000-10-10', 'Activo'),
(4, NULL, 'mr.sjaldana@gmail.com', '$2y$10$GHDVyHYYeOnhYcKhNKGgp.I1EoyIiFgc2kFCzjCj7W.o8FqSZWQAC', 2, 'Sebastian', 'Aldana', 'Los berrios Calle 1 numero 71', '2007-10-02', 'Activo'),
(5, NULL, 'yaper@gmial.com', '$2y$10$eNfPDTu3qnm7EOJbDllc7.1QnVN7GKv4DP/8euQF5CCxQxhqxDqSO', 2, 'Yamile', 'Perdomo', 'Los lirios del campo calle 31 lote 6', '2008-12-09', 'Activo'),
(6, '999999999', 'Samuel@gmail.com', '$2y$10$39Ob6McEP9JsmQ.YLrMvr.Pzf/eRf8IzRGx7298vqlRz4lz1cI3Oi', 3, 'Samuel', 'Padilla', 'Turbaco Calle 75  Mz 20 L 6', '2002-02-28', 'Activo'),
(7, NULL, 'hyhemyviq@mailinator.com', '$2y$10$9cY4/gTtYs8.mF267myNz.m0pKsKl5BSujY68hSdmfp/Woxg/Wz2.', 2, 'Eum culpa consequatu', 'Lorem voluptate aute', 'Suscipit enim nulla ', '1977-02-19', 'Activo'),
(8, NULL, 'tatax@mailinator.com', '$2y$10$KsZgPNJV6VZg9PO5i4tV8.Z3uSAIn6F6wfng2ltF8nnMdOTIZN986', 2, 'Sed laborum et aperi', 'Est eligendi non mag', 'Consequuntur placeat', '1982-12-04', 'Activo'),
(10, NULL, 'zetini@mailinator.com', '$2y$10$BsAn6a//HmKN/DQlvRkOpuAMwKhJOlyIJfliwVyRb7KYck/rq8Usq', 2, 'Lorem eligendi id d', 'Esse magni eiusmod i', 'Voluptates exercitat', '1980-07-04', 'Activo'),
(15, NULL, 'Prueba@prueba', '$2y$10$86gd7ppnp01ccuPaJZSxO.QIeJYW7U1ASRseDl1A45LUlr3vTtuEa', 2, 'Prueba', 'Prueba', 'Castellana calle principal', '2008-12-08', 'Inactivo'),
(18, '75', 'hoqol@mailinator.com', '$2y$10$AUF7sgY1pW3BaCqHqvEbfeVGUjGNKbiFhEgsJA.SPCAqSlGUOjtoy', 3, 'Sint culpa exercitat', 'In anim eos ut cons', 'Qui officia veniam ', '2002-08-10', 'Activo'),
(19, '6', 'mybugi@mailinator.com', '$2y$10$aHBYuBTqE2iXL6xekpED/ut0HqfWNq7Em5KSoRoOlkwS/V8ml.0sG', 3, 'Fugiat hic iste off', 'Consectetur sed sun', 'Incididunt maxime qu', '1971-12-02', 'Activo'),
(20, '11111111A', 'usuario1@ejemplo.com', '$2y$10$AUF7sgY1pW3BaCqHqvEbfeVGUjGNKbiFhEgsJA.SPCAqSlGUOjtoy', 1, 'Usuario1', 'Apellido1', 'Dirección1', '1990-01-01', 'Inactivo'),
(21, '22222222B', 'usuario2@ejemplo.com', '$2y$10$AUF7sgY1pW3BaCqHqvEbfeVGUjGNKbiFhEgsJA.SPCAqSlGUOjtoy', 1, 'Usuario2', 'Apellido2', 'Dirección2', '1991-02-02', 'Inactivo'),
(22, '33333333C', 'usuario3@ejemplo.com', '$2y$10$AUF7sgY1pW3BaCqHqvEbfeVGUjGNKbiFhEgsJA.SPCAqSlGUOjtoy', 1, 'Usuario3', 'Apellido3', 'Dirección3', '1992-03-03', 'Activo'),
(23, '44444444D', 'usuario4@ejemplo.com', '$2y$10$AUF7sgY1pW3BaCqHqvEbfeVGUjGNKbiFhEgsJA.SPCAqSlGUOjtoy', 1, 'Usuario4', 'Apellido4', 'Dirección4', '1993-04-04', 'Inactivo'),
(24, '55555555E', 'usuario5@ejemplo.com', '$2y$10$AUF7sgY1pW3BaCqHqvEbfeVGUjGNKbiFhEgsJA.SPCAqSlGUOjtoy', 1, 'Usuario5', 'Apellido5', 'Dirección5', '1994-05-05', 'Activo'),
(25, '66666666F', 'usuario6@ejemplo.com', '$2y$10$AUF7sgY1pW3BaCqHqvEbfeVGUjGNKbiFhEgsJA.SPCAqSlGUOjtoy', 1, 'Usuario6', 'Apellido6', 'Dirección6', '1995-06-06', 'Activo'),
(26, '77777777G', 'usuario7@ejemplo.com', '$2y$10$AUF7sgY1pW3BaCqHqvEbfeVGUjGNKbiFhEgsJA.SPCAqSlGUOjtoy', 1, 'Usuario7', 'Apellido7', 'Dirección7', '1996-07-07', 'Activo'),
(27, '88888888H', 'usuario8@ejemplo.com', '$2y$10$AUF7sgY1pW3BaCqHqvEbfeVGUjGNKbiFhEgsJA.SPCAqSlGUOjtoy', 1, 'Usuario8', 'Apellido8', 'Dirección8', '1997-08-08', 'Activo'),
(28, '99999999I', 'usuario9@ejemplo.com', '$2y$10$AUF7sgY1pW3BaCqHqvEbfeVGUjGNKbiFhEgsJA.SPCAqSlGUOjtoy', 1, 'Usuario9', 'Apellido9', 'Dirección9', '1998-09-09', 'Activo'),
(29, '10101010J', 'usuario10@ejemplo.com', '$2y$10$AUF7sgY1pW3BaCqHqvEbfeVGUjGNKbiFhEgsJA.SPCAqSlGUOjtoy', 1, 'Usuario10', 'Apellido10', 'Dirección10', '1999-10-10', 'Activo'),
(30, '12121212A', 'usuario11@ejemplo.com', '$2y$10$AUF7sgY1pW3BaCqHqvEbfeVGUjGNKbiFhEgsJA.SPCAqSlGUOjtoy', 2, 'Usuario11', 'Apellido11', 'Dirección11', '1990-01-01', 'Inactivo'),
(31, '13131313B', 'usuario12@ejemplo.com', '$2y$10$AUF7sgY1pW3BaCqHqvEbfeVGUjGNKbiFhEgsJA.SPCAqSlGUOjtoy', 2, 'Usuario12', 'Apellido12', 'Dirección12', '1991-02-02', 'Inactivo'),
(32, '14141414C', 'usuario13@ejemplo.com', '$2y$10$AUF7sgY1pW3BaCqHqvEbfeVGUjGNKbiFhEgsJA.SPCAqSlGUOjtoy', 2, 'Usuario13', 'Apellido13', 'Dirección13', '1992-03-03', 'Activo'),
(33, '15151515D', 'usuario14@ejemplo.com', '$2y$10$AUF7sgY1pW3BaCqHqvEbfeVGUjGNKbiFhEgsJA.SPCAqSlGUOjtoy', 2, 'Usuario14', 'Apellido14', 'Dirección14', '1993-04-04', 'Activo'),
(34, '16161616E', 'usuario15@ejemplo.com', '$2y$10$AUF7sgY1pW3BaCqHqvEbfeVGUjGNKbiFhEgsJA.SPCAqSlGUOjtoy', 2, 'Usuario15', 'Apellido15', 'Dirección15', '1994-05-05', 'Activo'),
(35, '17171717F', 'usuario16@ejemplo.com', '$2y$10$AUF7sgY1pW3BaCqHqvEbfeVGUjGNKbiFhEgsJA.SPCAqSlGUOjtoy', 2, 'Usuario16', 'Apellido16', 'Dirección16', '1995-06-06', 'Activo'),
(36, '18181818G', 'usuario17@ejemplo.com', '$2y$10$AUF7sgY1pW3BaCqHqvEbfeVGUjGNKbiFhEgsJA.SPCAqSlGUOjtoy', 2, 'Usuario17', 'Apellido17', 'Dirección17', '1996-07-07', 'Activo'),
(37, '19191919H', 'usuario18@ejemplo.com', '$2y$10$AUF7sgY1pW3BaCqHqvEbfeVGUjGNKbiFhEgsJA.SPCAqSlGUOjtoy', 2, 'Usuario18', 'Apellido18', 'Dirección18', '1997-08-08', 'Activo'),
(38, '20202020I', 'usuario19@ejemplo.com', '$2y$10$AUF7sgY1pW3BaCqHqvEbfeVGUjGNKbiFhEgsJA.SPCAqSlGUOjtoy', 2, 'Usuario19', 'Apellido19', 'Dirección19', '1998-09-09', 'Activo'),
(39, '21212121J', 'usuario20@ejemplo.com', '$2y$10$AUF7sgY1pW3BaCqHqvEbfeVGUjGNKbiFhEgsJA.SPCAqSlGUOjtoy', 2, 'Usuario20', 'Apellido20', 'Dirección20', '1999-10-10', 'Activo'),
(40, '22222222A', 'usuario21@ejemplo.com', '$2y$10$AUF7sgY1pW3BaCqHqvEbfeVGUjGNKbiFhEgsJA.SPCAqSlGUOjtoy', 3, 'Usuario21', 'Apellido21', 'Dirección21', '1990-01-01', 'Activo'),
(41, '23232323B', 'usuario22@ejemplo.com', '$2y$10$AUF7sgY1pW3BaCqHqvEbfeVGUjGNKbiFhEgsJA.SPCAqSlGUOjtoy', 3, 'Usuario22', 'Apellido22', 'Dirección22', '1991-02-02', 'Activo'),
(42, '24242424C', 'usuario23@ejemplo.com', '$2y$10$AUF7sgY1pW3BaCqHqvEbfeVGUjGNKbiFhEgsJA.SPCAqSlGUOjtoy', 3, 'Usuario23', 'Apellido23', 'Dirección23', '1992-03-03', 'Activo'),
(43, '25252525D', 'usuario24@ejemplo.com', '$2y$10$AUF7sgY1pW3BaCqHqvEbfeVGUjGNKbiFhEgsJA.SPCAqSlGUOjtoy', 3, 'Usuario24', 'Apellido24', 'Dirección24', '1993-04-04', 'Activo'),
(44, '26262626E', 'usuario25@ejemplo.com', '$2y$10$AUF7sgY1pW3BaCqHqvEbfeVGUjGNKbiFhEgsJA.SPCAqSlGUOjtoy', 3, 'Usuario25', 'Apellido25', 'Dirección25', '1994-05-05', 'Activo'),
(45, '27272727F', 'usuario26@ejemplo.com', '$2y$10$AUF7sgY1pW3BaCqHqvEbfeVGUjGNKbiFhEgsJA.SPCAqSlGUOjtoy', 3, 'Usuario26', 'Apellido26', 'Dirección26', '1995-06-06', 'Activo'),
(46, '28282828G', 'usuario27@ejemplo.com', '$2y$10$AUF7sgY1pW3BaCqHqvEbfeVGUjGNKbiFhEgsJA.SPCAqSlGUOjtoy', 3, 'Usuario27', 'Apellido27', 'Dirección27', '1996-07-07', 'Activo'),
(47, '29292929H', 'usuario28@ejemplo.com', '$2y$10$AUF7sgY1pW3BaCqHqvEbfeVGUjGNKbiFhEgsJA.SPCAqSlGUOjtoy', 3, 'Usuario28', 'Apellido28', 'Dirección28', '1997-08-08', 'Activo'),
(48, '30303030I', 'usuario29@ejemplo.com', '$2y$10$AUF7sgY1pW3BaCqHqvEbfeVGUjGNKbiFhEgsJA.SPCAqSlGUOjtoy', 3, 'Usuario29', 'Apellido29', 'Dirección29', '1998-09-09', 'Activo'),
(49, '31313131J', 'usuario30@ejemplo.com', '$2y$10$AUF7sgY1pW3BaCqHqvEbfeVGUjGNKbiFhEgsJA.SPCAqSlGUOjtoy', 3, 'Usuario30', 'Apellido30', 'Dirección30', '1999-10-10', 'Activo'),
(50, '1111111A', 'usuarioEjem1@ejemplo1.com', '$2y$10$AUF7sgY1pW3BaCqHqvEbfeVGUjGNKbiFhEgsJA.SPCAqSlGUOjtoy', 1, 'NombreEjemplo1', 'ApellidoEjemplo1', 'DireccionEjemplo1', '1990-01-01', 'Activo'),
(51, '2222222B', 'usuarioEjem2@ejemplo2.com', '$2y$10$AUF7sgY1pW3BaCqHqvEbfeVGUjGNKbiFhEgsJA.SPCAqSlGUOjtoy', 1, 'NombreEjemplo2', 'ApellidoEjemplo2', 'DireccionEjemplo2', '1991-02-02', 'Activo'),
(52, '3333333C', 'usuarioEjem3@ejemplo3.com', '$2y$10$AUF7sgY1pW3BaCqHqvEbfeVGUjGNKbiFhEgsJA.SPCAqSlGUOjtoy', 1, 'NombreEjemplo3', 'ApellidoEjemplo3', 'DireccionEjemplo3', '1992-03-03', 'Activo'),
(53, '4444444D', 'usuarioEjem4@ejemplo4.com', '$2y$10$AUF7sgY1pW3BaCqHqvEbfeVGUjGNKbiFhEgsJA.SPCAqSlGUOjtoy', 1, 'NombreEjemplo4', 'ApellidoEjemplo4', 'DireccionEjemplo4', '1993-04-04', 'Activo'),
(54, '5555555E', 'usuarioEjem5@ejemplo5.com', '$2y$10$AUF7sgY1pW3BaCqHqvEbfeVGUjGNKbiFhEgsJA.SPCAqSlGUOjtoy', 1, 'NombreEjemplo5', 'ApellidoEjemplo5', 'DireccionEjemplo5', '1994-05-05', 'Activo'),
(55, '6666666F', 'usuarioEjem6@ejemplo6.com', '$2y$10$AUF7sgY1pW3BaCqHqvEbfeVGUjGNKbiFhEgsJA.SPCAqSlGUOjtoy', 1, 'NombreEjemplo6', 'ApellidoEjemplo6', 'DireccionEjemplo6', '1995-06-06', 'Activo'),
(56, '7777777G', 'usuarioEjem7@ejemplo7.com', '$2y$10$AUF7sgY1pW3BaCqHqvEbfeVGUjGNKbiFhEgsJA.SPCAqSlGUOjtoy', 1, 'NombreEjemplo7', 'Apellido_ejemplo7', 'DireccionEjemplo7', '1996-07-07', 'Activo'),
(57, '8888888H', 'usuarioEjem8@ejemplo8.com', '$2y$10$AUF7sgY1pW3BaCqHqvEbfeVGUjGNKbiFhEgsJA.SPCAqSlGUOjtoy', 1, 'NombreEjemplo8', 'ApellidoEjemplo8', 'DireccionEjemplo8', '1997-08-08', 'Activo'),
(58, '9999999I', 'usuarioEjem9@ejemplo9.com', '$2y$10$AUF7sgY1pW3BaCqHqvEbfeVGUjGNKbiFhEgsJA.SPCAqSlGUOjtoy', 1, 'NombreEjemplo9', 'ApellidoEjemplo9', 'DireccionEjemplo9', '1998-09-09', 'Activo'),
(59, '0101010J', 'usuarioEjem0@ejemplo10.com', '$2y$10$AUF7sgY1pW3BaCqHqvEbfeVGUjGNKbiFhEgsJA.SPCAqSlGUOjtoy', 1, 'NombreEjemplo10', 'ApellidoEjemplo10', 'DireccionEjemplo10', '1999-10-10', 'Activo'),
(60, '1121212A', 'usuarioEjem11@ejemplo11.com', '$2y$10$AUF7sgY1pW3BaCqHqvEbfeVGUjGNKbiFhEgsJA.SPCAqSlGUOjtoy', 2, 'NombreEjemplo11', 'ApellidoEjemplo11', 'DireccionEjemplo11', '1990-01-01', 'Activo'),
(61, '1131313B', 'usuarioEjem12@ejemplo12.com', '$2y$10$AUF7sgY1pW3BaCqHqvEbfeVGUjGNKbiFhEgsJA.SPCAqSlGUOjtoy', 2, 'NombreEjemplo12', 'ApellidoEjemplo12', 'DireccionEjemplo12', '1991-02-02', 'Activo'),
(62, '1141414C', 'usuarioEjem13@ejemplo13.com', '$2y$10$AUF7sgY1pW3BaCqHqvEbfeVGUjGNKbiFhEgsJA.SPCAqSlGUOjtoy', 2, 'NombreEjemplo13', 'ApellidoEjemplo13', 'DireccionEjemplo13', '1992-03-03', 'Activo'),
(63, '1151515D', 'usuarioEjem14@ejemplo14.com', '$2y$10$AUF7sgY1pW3BaCqHqvEbfeVGUjGNKbiFhEgsJA.SPCAqSlGUOjtoy', 2, 'NombreEjemplo14', 'ApellidoEjemplo14', 'DireccionEjemplo14', '1993-04-04', 'Activo'),
(64, '1161616E', 'usuarioEjem15@ejemplo15.com', '$2y$10$AUF7sgY1pW3BaCqHqvEbfeVGUjGNKbiFhEgsJA.SPCAqSlGUOjtoy', 2, 'NombreEjemplo15', 'ApellidoEjemplo15', 'DireccionEjemplo15', '1994-05-05', 'Activo'),
(65, '1171717F', 'usuarioEjem16@ejemplo16.com', '$2y$10$AUF7sgY1pW3BaCqHqvEbfeVGUjGNKbiFhEgsJA.SPCAqSlGUOjtoy', 2, 'NombreEjemplo16', 'ApellidoEjemplo16', 'DireccionEjemplo16', '1995-06-06', 'Activo'),
(66, '1181818G', 'usuarioEjem17@ejemplo17.com', '$2y$10$AUF7sgY1pW3BaCqHqvEbfeVGUjGNKbiFhEgsJA.SPCAqSlGUOjtoy', 2, 'NombreEjemplo17', 'ApellidoEjemplo17', 'DireccionEjemplo17', '1996-07-07', 'Activo'),
(67, '1191919H', 'usuarioEjem18@ejemplo18.com', '$2y$10$AUF7sgY1pW3BaCqHqvEbfeVGUjGNKbiFhEgsJA.SPCAqSlGUOjtoy', 2, 'NombreEjemplo18', 'ApellidoEjemplo18', 'DireccionEjemplo18', '1997-08-08', 'Activo'),
(68, '2202020I', 'usuarioEjem19@ejemplo19.com', '$2y$10$AUF7sgY1pW3BaCqHqvEbfeVGUjGNKbiFhEgsJA.SPCAqSlGUOjtoy', 2, 'NombreEjemplo19', 'ApellidoEjemplo19', 'DireccionEjemplo19', '1998-09-09', 'Activo'),
(69, '2212121J', 'usuarioEjem20@ejemplo20.com', '$2y$10$AUF7sgY1pW3BaCqHqvEbfeVGUjGNKbiFhEgsJA.SPCAqSlGUOjtoy', 2, 'NombreEjemplo20', 'ApellidoEjemplo20', 'DireccionEjemplo20', '1999-10-10', 'Activo'),
(70, '2221222A', 'usuarioEjem21@ejemplo21.com', '$2y$10$AUF7sgY1pW3BaCqHqvEbfeVGUjGNKbiFhEgsJA.SPCAqSlGUOjtoy', 3, 'NombreEjemplo21', 'ApellidoEjemplo21', 'DireccionEjemplo21', '1990-01-01', 'Activo'),
(71, '2331323B', 'usuarioEjem22@ejemplo22.com', '$2y$10$AUF7sgY1pW3BaCqHqvEbfeVGUjGNKbiFhEgsJA.SPCAqSlGUOjtoy', 3, 'NombreEjemplo22', 'ApellidoEjemplo22', 'DireccionEjemplo22', '1991-02-02', 'Activo'),
(72, '2441424C', 'usuarioEjem23@ejemplo23.com', '$2y$10$AUF7sgY1pW3BaCqHqvEbfeVGUjGNKbiFhEgsJA.SPCAqSlGUOjtoy', 3, 'NombreEjemplo23', 'ApellidoEjemplo23', 'DireccionEjemplo23', '1992-03-03', 'Activo'),
(73, '2551525D', 'usuarioEjem24@ejemplo24.com', '$2y$10$AUF7sgY1pW3BaCqHqvEbfeVGUjGNKbiFhEgsJA.SPCAqSlGUOjtoy', 3, 'NombreEjemplo24', 'ApellidoEjemplo24', 'DireccionEjemplo24', '1993-04-04', 'Activo'),
(74, '2661626E', 'usuarioEjem25@ejemplo25.com', '$2y$10$AUF7sgY1pW3BaCqHqvEbfeVGUjGNKbiFhEgsJA.SPCAqSlGUOjtoy', 3, 'NombreEjemplo25', 'ApellidoEjemplo25', 'DireccionEjemplo25', '1994-05-05', 'Activo'),
(75, '2771727F', 'usuarioEjem26@ejemplo26.com', '$2y$10$AUF7sgY1pW3BaCqHqvEbfeVGUjGNKbiFhEgsJA.SPCAqSlGUOjtoy', 3, 'NombreEjemplo26', 'ApellidoEjemplo26', 'DireccionEjemplo26', '1995-06-06', 'Activo'),
(76, '2881828G', 'usuarioEjem27@ejemplo27.com', '$2y$10$AUF7sgY1pW3BaCqHqvEbfeVGUjGNKbiFhEgsJA.SPCAqSlGUOjtoy', 3, 'NombreEjemplo27', 'ApellidoEjemplo27', 'DireccionEjemplo27', '1996-07-07', 'Activo'),
(77, '2991929H', 'usuarioEjem28@ejemplo28.com', '$2y$10$AUF7sgY1pW3BaCqHqvEbfeVGUjGNKbiFhEgsJA.SPCAqSlGUOjtoy', 3, 'NombreEjemplo28', 'ApellidoEjemplo28', 'DireccionEjemplo28', '1997-08-08', 'Activo'),
(78, '3001030I', 'usuarioEjem29@ejemplo29.com', '$2y$10$AUF7sgY1pW3BaCqHqvEbfeVGUjGNKbiFhEgsJA.SPCAqSlGUOjtoy', 3, 'NombreEjemplo29', 'ApellidoEjemplo29', 'DireccionEjemplo29', '1998-09-09', 'Activo'),
(79, '3111131J', 'usuarioEjem30@ejemplo30.com', '$2y$10$AUF7sgY1pW3BaCqHqvEbfeVGUjGNKbiFhEgsJA.SPCAqSlGUOjtoy', 3, 'NombreEjemplo30', 'ApellidoEjemplo30', 'DireccionEjemplo30', '1999-10-10', 'Inactivo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD PRIMARY KEY (`id_calificacion`);

--
-- Indices de la tabla `clases`
--
ALTER TABLE `clases`
  ADD PRIMARY KEY (`id_clase`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuarioID`),
  ADD KEY `alumnos_id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `id_calificacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clases`
--
ALTER TABLE `clases`
  MODIFY `id_clase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuarioID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `alumnos_id_rol` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
