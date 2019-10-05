-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 05, 2019 at 11:18 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Rangel`
--

-- --------------------------------------------------------

--
-- Table structure for table `ciudades`
--

CREATE TABLE `ciudades` (
  `id_ciudad` int(11) NOT NULL,
  `nombre_ciudad` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ciudades`
--

INSERT INTO `ciudades` (`id_ciudad`, `nombre_ciudad`) VALUES
(1, 'Magangue'),
(2, 'Cucuta'),
(3, 'Bogota'),
(4, 'Pereira'),
(5, 'Manizales'),
(6, 'Neiva');

-- --------------------------------------------------------

--
-- Table structure for table `eps`
--

CREATE TABLE `eps` (
  `id_eps` int(11) NOT NULL,
  `nombre_eps` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `eps`
--

INSERT INTO `eps` (`id_eps`, `nombre_eps`) VALUES
(1, 'Famisanar'),
(2, 'Sura'),
(3, 'Compensar');

-- --------------------------------------------------------

--
-- Table structure for table `estado_asistencia`
--

CREATE TABLE `estado_asistencia` (
  `id_estado_asistencia` int(11) NOT NULL,
  `nombre_estado_asistencia` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `estado_asistencia`
--

INSERT INTO `estado_asistencia` (`id_estado_asistencia`, `nombre_estado_asistencia`) VALUES
(1, 'A'),
(2, 'F'),
(4, 'FJ'),
(3, 'R');

-- --------------------------------------------------------

--
-- Table structure for table `estudiantes`
--

CREATE TABLE `estudiantes` (
  `id_estudiante` int(11) NOT NULL,
  `numero_identificacion_estudiante` int(11) NOT NULL,
  `nombres_estudiante` varchar(75) DEFAULT NULL,
  `apellidos_estudiante` varchar(75) DEFAULT NULL,
  `edad_estudiante` int(11) DEFAULT NULL,
  `direccion_estudiante` varchar(100) DEFAULT NULL,
  `celular_estudiante` char(16) DEFAULT NULL,
  `email_estudiante` varchar(25) DEFAULT NULL,
  `fk_grupo` int(11) DEFAULT NULL,
  `fk_eps` int(11) NOT NULL,
  `fk_tipo_documento` int(11) NOT NULL,
  `fk_genero` int(11) NOT NULL,
  `fk_ciudad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `estudiantes`
--

INSERT INTO `estudiantes` (`id_estudiante`, `numero_identificacion_estudiante`, `nombres_estudiante`, `apellidos_estudiante`, `edad_estudiante`, `direccion_estudiante`, `celular_estudiante`, `email_estudiante`, `fk_grupo`, `fk_eps`, `fk_tipo_documento`, `fk_genero`, `fk_ciudad`) VALUES
(1, 1233890, 'Jhon Alex', 'Ramos ', 25, 'Cll 115', '3004037', 'alexx19@protonmail.', 2, 2, 3, 2, 4),
(3, 1454890166, 'Dashell Alexander', 'Carrero Fuentes', 19, 'Cll Norte', '3004124585', 'dashell@gmail.com', 2, 1, 2, 1, 1),
(4, 44587566, 'Vanesa', 'Vega Santa', 18, 'Cll 54', '321548956', 'vane@gmail.com', 2, 2, 1, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `generos`
--

CREATE TABLE `generos` (
  `id_genero` int(11) NOT NULL,
  `nombre_genero` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `generos`
--

INSERT INTO `generos` (`id_genero`, `nombre_genero`) VALUES
(1, 'Masculino'),
(2, 'Femenino');

-- --------------------------------------------------------

--
-- Table structure for table `grupos`
--

CREATE TABLE `grupos` (
  `id_grupo` int(11) NOT NULL,
  `nombre_grupo` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `grupos`
--

INSERT INTO `grupos` (`id_grupo`, `nombre_grupo`) VALUES
(1, 'Grado 6'),
(2, 'Grado Undecimo'),
(3, 'Grado Once');

-- --------------------------------------------------------

--
-- Table structure for table `profesores`
--

CREATE TABLE `profesores` (
  `id_profesor` int(11) NOT NULL,
  `numero_identificacion_profesor` char(20) NOT NULL,
  `nombres_profesor` varchar(75) DEFAULT NULL,
  `apellidos_profesor` varchar(75) DEFAULT NULL,
  `edad_profesor` int(11) DEFAULT NULL,
  `direccion_profesor` varchar(80) DEFAULT NULL,
  `celular_profesor` char(16) DEFAULT NULL,
  `email_profesor` varchar(25) DEFAULT NULL,
  `fk_eps` int(11) NOT NULL,
  `fk_tipo_documento` int(11) NOT NULL,
  `fk_genero` int(11) NOT NULL,
  `fk_ciudad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profesores`
--

INSERT INTO `profesores` (`id_profesor`, `numero_identificacion_profesor`, `nombres_profesor`, `apellidos_profesor`, `edad_profesor`, `direccion_profesor`, `celular_profesor`, `email_profesor`, `fk_eps`, `fk_tipo_documento`, `fk_genero`, `fk_ciudad`) VALUES
(1, '112554512', 'Miriam ', 'Villadiego', 32, 'Cll 45', '312458564', 'none@mail.com', 3, 4, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `registro_asistencias`
--

CREATE TABLE `registro_asistencias` (
  `id_registro_asistencia` int(11) NOT NULL,
  `fk_estado_asistencia` int(11) NOT NULL,
  `fk_estudiante` int(11) NOT NULL,
  `fk_profesor` int(11) NOT NULL,
  `fk_grupo` int(11) NOT NULL,
  `fecha_registro_asistencia` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `registro_asistencias`
--

INSERT INTO `registro_asistencias` (`id_registro_asistencia`, `fk_estado_asistencia`, `fk_estudiante`, `fk_profesor`, `fk_grupo`, `fecha_registro_asistencia`) VALUES
(1, 1, 1, 1, 3, '2019-10-09'),
(2, 2, 1, 1, 2, '2019-10-05'),
(3, 4, 3, 1, 2, '2019-10-05'),
(4, 3, 4, 1, 2, '2019-10-05'),
(5, 1, 1, 1, 3, '2019-10-17');

-- --------------------------------------------------------

--
-- Table structure for table `registro_grupo`
--

CREATE TABLE `registro_grupo` (
  `id_registro_grupo` int(11) NOT NULL,
  `fk_grupo` int(11) NOT NULL,
  `fk_profesor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tipo_documento`
--

CREATE TABLE `tipo_documento` (
  `id_tipo_documento` int(11) NOT NULL,
  `nombre_tipo_documento` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tipo_documento`
--

INSERT INTO `tipo_documento` (`id_tipo_documento`, `nombre_tipo_documento`) VALUES
(2, 'C.C'),
(3, 'C.E'),
(4, 'D.N.I'),
(5, 'otro'),
(1, 'T.I');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `no_identificacion_usuario` int(11) NOT NULL,
  `nombres_usuario` varchar(75) DEFAULT NULL,
  `apellidos_usuario` varchar(75) DEFAULT NULL,
  `clave_usuario` varchar(255) NOT NULL,
  `email_usuario` varchar(75) DEFAULT NULL,
  `fk_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ciudades`
--
ALTER TABLE `ciudades`
  ADD PRIMARY KEY (`id_ciudad`);

--
-- Indexes for table `eps`
--
ALTER TABLE `eps`
  ADD PRIMARY KEY (`id_eps`);

--
-- Indexes for table `estado_asistencia`
--
ALTER TABLE `estado_asistencia`
  ADD PRIMARY KEY (`id_estado_asistencia`),
  ADD UNIQUE KEY `nombre_estado_asistencia` (`nombre_estado_asistencia`);

--
-- Indexes for table `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`id_estudiante`),
  ADD KEY `fk_grupo` (`fk_grupo`),
  ADD KEY `fk_eps` (`fk_eps`),
  ADD KEY `fk_tipo_documento` (`fk_tipo_documento`),
  ADD KEY `fk_genero` (`fk_genero`),
  ADD KEY `fk_ciudad` (`fk_ciudad`);

--
-- Indexes for table `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`id_genero`);

--
-- Indexes for table `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id_grupo`);

--
-- Indexes for table `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`id_profesor`),
  ADD KEY `fk_eps` (`fk_eps`),
  ADD KEY `fk_tipo_documento` (`fk_tipo_documento`),
  ADD KEY `fk_genero` (`fk_genero`),
  ADD KEY `fk_ciudad` (`fk_ciudad`);

--
-- Indexes for table `registro_asistencias`
--
ALTER TABLE `registro_asistencias`
  ADD PRIMARY KEY (`id_registro_asistencia`),
  ADD KEY `fk_estado_asistencia` (`fk_estado_asistencia`),
  ADD KEY `fk_estudiante` (`fk_estudiante`),
  ADD KEY `fk_profesor` (`fk_profesor`),
  ADD KEY `fk_grupo` (`fk_grupo`);

--
-- Indexes for table `registro_grupo`
--
ALTER TABLE `registro_grupo`
  ADD PRIMARY KEY (`id_registro_grupo`),
  ADD KEY `fk_grupo` (`fk_grupo`),
  ADD KEY `fk_profesor` (`fk_profesor`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`),
  ADD UNIQUE KEY `nombre_rol` (`nombre_rol`);

--
-- Indexes for table `tipo_documento`
--
ALTER TABLE `tipo_documento`
  ADD PRIMARY KEY (`id_tipo_documento`),
  ADD UNIQUE KEY `nombre_tipo_documento` (`nombre_tipo_documento`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `no_identificacion_usuario` (`no_identificacion_usuario`),
  ADD KEY `fk_rol` (`fk_rol`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ciudades`
--
ALTER TABLE `ciudades`
  MODIFY `id_ciudad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `eps`
--
ALTER TABLE `eps`
  MODIFY `id_eps` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `estado_asistencia`
--
ALTER TABLE `estado_asistencia`
  MODIFY `id_estado_asistencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `id_estudiante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `generos`
--
ALTER TABLE `generos`
  MODIFY `id_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `profesores`
--
ALTER TABLE `profesores`
  MODIFY `id_profesor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `registro_asistencias`
--
ALTER TABLE `registro_asistencias`
  MODIFY `id_registro_asistencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `registro_grupo`
--
ALTER TABLE `registro_grupo`
  MODIFY `id_registro_grupo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tipo_documento`
--
ALTER TABLE `tipo_documento`
  MODIFY `id_tipo_documento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD CONSTRAINT `estudiantes_ibfk_1` FOREIGN KEY (`fk_grupo`) REFERENCES `grupos` (`id_grupo`) ON DELETE CASCADE,
  ADD CONSTRAINT `estudiantes_ibfk_2` FOREIGN KEY (`fk_eps`) REFERENCES `eps` (`id_eps`) ON DELETE CASCADE,
  ADD CONSTRAINT `estudiantes_ibfk_3` FOREIGN KEY (`fk_tipo_documento`) REFERENCES `tipo_documento` (`id_tipo_documento`) ON DELETE CASCADE,
  ADD CONSTRAINT `estudiantes_ibfk_4` FOREIGN KEY (`fk_genero`) REFERENCES `generos` (`id_genero`) ON DELETE CASCADE,
  ADD CONSTRAINT `estudiantes_ibfk_5` FOREIGN KEY (`fk_ciudad`) REFERENCES `ciudades` (`id_ciudad`) ON DELETE CASCADE;

--
-- Constraints for table `profesores`
--
ALTER TABLE `profesores`
  ADD CONSTRAINT `profesores_ibfk_1` FOREIGN KEY (`fk_eps`) REFERENCES `eps` (`id_eps`) ON DELETE CASCADE,
  ADD CONSTRAINT `profesores_ibfk_2` FOREIGN KEY (`fk_tipo_documento`) REFERENCES `tipo_documento` (`id_tipo_documento`) ON DELETE CASCADE,
  ADD CONSTRAINT `profesores_ibfk_3` FOREIGN KEY (`fk_genero`) REFERENCES `generos` (`id_genero`) ON DELETE CASCADE,
  ADD CONSTRAINT `profesores_ibfk_4` FOREIGN KEY (`fk_ciudad`) REFERENCES `ciudades` (`id_ciudad`) ON DELETE CASCADE;

--
-- Constraints for table `registro_asistencias`
--
ALTER TABLE `registro_asistencias`
  ADD CONSTRAINT `registro_asistencias_ibfk_1` FOREIGN KEY (`fk_estado_asistencia`) REFERENCES `estado_asistencia` (`id_estado_asistencia`) ON DELETE CASCADE,
  ADD CONSTRAINT `registro_asistencias_ibfk_2` FOREIGN KEY (`fk_estudiante`) REFERENCES `estudiantes` (`id_estudiante`) ON DELETE CASCADE,
  ADD CONSTRAINT `registro_asistencias_ibfk_3` FOREIGN KEY (`fk_profesor`) REFERENCES `profesores` (`id_profesor`) ON DELETE CASCADE,
  ADD CONSTRAINT `registro_asistencias_ibfk_4` FOREIGN KEY (`fk_grupo`) REFERENCES `grupos` (`id_grupo`) ON DELETE CASCADE;

--
-- Constraints for table `registro_grupo`
--
ALTER TABLE `registro_grupo`
  ADD CONSTRAINT `registro_grupo_ibfk_1` FOREIGN KEY (`fk_grupo`) REFERENCES `grupos` (`id_grupo`) ON DELETE CASCADE,
  ADD CONSTRAINT `registro_grupo_ibfk_2` FOREIGN KEY (`fk_profesor`) REFERENCES `profesores` (`id_profesor`) ON DELETE CASCADE;

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`fk_rol`) REFERENCES `roles` (`id_rol`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
