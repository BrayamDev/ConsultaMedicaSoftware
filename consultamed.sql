-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-02-2025 a las 03:24:48
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `consultamed`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidadesmedicas`
--

CREATE TABLE `especialidadesmedicas` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Descripcion` text DEFAULT NULL,
  `Estado` tinyint(1) NOT NULL DEFAULT 1,
  `FechaCreacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `especialidadesmedicas`
--

INSERT INTO `especialidadesmedicas` (`Id`, `Nombre`, `Descripcion`, `Estado`, `FechaCreacion`) VALUES
(1, 'Medicina General', 'Atención primaria y prevención de enfermedades en pacientes de todas las edades.', 1, '2025-02-27 01:36:56'),
(2, 'Cardiología', 'Diagnóstico y tratamiento de enfermedades del corazón y el sistema circulatorio.', 1, '2025-02-27 01:36:56'),
(3, 'Neurología', 'Estudio y tratamiento de trastornos del sistema nervioso.', 1, '2025-02-27 01:36:56'),
(4, 'Pediatría', 'Atención médica especializada en niños y adolescentes.', 1, '2025-02-27 01:36:56'),
(5, 'Dermatología', 'Diagnóstico y tratamiento de enfermedades de la piel, cabello y uñas.', 1, '2025-02-27 01:36:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historia_clinica`
--

CREATE TABLE `historia_clinica` (
  `id` int(11) NOT NULL,
  `id_paciente` int(11) DEFAULT NULL,
  `fecha_alta` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `historia_clinica`
--

INSERT INTO `historia_clinica` (`id`, `id_paciente`, `fecha_alta`) VALUES
(1, 1, '2024-08-16'),
(2, 2, '2020-09-27'),
(3, 3, '2020-12-04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `primer_apellido` varchar(100) NOT NULL,
  `segundo_apellido` varchar(100) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `sexo` enum('Masculino','Femenino','Otro') DEFAULT NULL,
  `pais_origen` varchar(100) DEFAULT NULL,
  `provincia` varchar(100) DEFAULT NULL,
  `poblacion` varchar(100) DEFAULT NULL,
  `tipo_documento` varchar(50) DEFAULT NULL,
  `numero_documento` varchar(50) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `codigo_postal` varchar(10) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `movil` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `procedencia` varchar(100) DEFAULT NULL,
  `aseguradora` varchar(100) DEFAULT NULL,
  `observaciones` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id`, `nombre`, `primer_apellido`, `segundo_apellido`, `fecha_nacimiento`, `sexo`, `pais_origen`, `provincia`, `poblacion`, `tipo_documento`, `numero_documento`, `direccion`, `codigo_postal`, `telefono`, `movil`, `email`, `procedencia`, `aseguradora`, `observaciones`) VALUES
(1, 'Juan', 'Pérez', 'Gómez', '1985-06-15', 'Masculino', 'España', 'Madrid', 'Madrid', 'DNI', '12345678A', 'Calle Mayor 123', '28001', '911234567', '611234567', 'juan.perez@example.com', 'Hospital General', 'Mapfre', 'Paciente con historial de hipertensión.'),
(2, 'María', 'López', 'Fernández', '1990-08-21', 'Femenino', 'España', 'Barcelona', 'Barcelona', 'DNI', '23456789B', 'Av. Diagonal 456', '08010', '932345678', '622345678', 'maria.lopez@example.com', 'Clínica Santa Ana', 'Sanitas', 'Paciente con alergia a la penicilina.'),
(3, 'Carlos', 'González', 'Ruiz', '1978-03-12', 'Masculino', 'México', 'CDMX', 'CDMX', 'CURP', 'GONC780312HMCRZS01', 'Calle Reforma 789', '06000', '5512345678', '5519876543', 'carlos.gonzalez@example.com', 'Centro Médico Nacional', 'GNP', 'Sin antecedentes médicos importantes.'),
(4, 'Ana', 'Martínez', 'Sánchez', '2000-11-30', 'Femenino', 'Argentina', 'Buenos Aires', 'Buenos Aires', 'DNI', '30567890', 'Av. Libertador 321', 'C1001', '114567890', '116789012', 'ana.martinez@example.com', 'Hospital Italiano', 'Swiss Medical', 'Paciente con diabetes tipo 1.'),
(5, 'Pedro', 'Ramírez', 'Díaz', '1982-07-25', 'Masculino', 'Chile', 'Santiago', 'Santiago', 'RUT', '18234567-9', 'Calle Alameda 654', '8320000', '229876543', '967654321', 'pedro.ramirez@example.com', 'Clínica Alemana', 'Banmédica', 'Historial de migrañas recurrentes.'),
(6, 'Sofía', 'Hernández', 'Torres', '1995-09-10', 'Femenino', 'Colombia', 'Bogotá', 'Bogotá', 'CC', '1012345678', 'Carrera 10 #45-67', '110111', '3205678901', '3101234567', 'sofia.hernandez@example.com', 'Hospital San José', 'Sura', 'Paciente con antecedentes de asma.'),
(7, 'Luis', 'Castro', 'Morales', '1971-02-14', 'Masculino', 'Perú', 'Lima', 'Lima', 'DNI', '09123456', 'Av. Arequipa 890', 'LIMA01', '014567890', '999876543', 'luis.castro@example.com', 'Hospital Rebagliati', 'Pacífico', 'Paciente con hipertensión y colesterol alto.'),
(8, 'Elena', 'Gómez', 'Vargas', '1988-05-22', 'Femenino', 'Ecuador', 'Quito', 'Quito', 'CI', '1712345678', 'Calle Amazonas 543', '170150', '022345678', '0987654321', 'elena.gomez@example.com', 'Clínica Pichincha', 'Confiamed', 'Embarazada de 5 meses.'),
(9, 'Fernando', 'Duarte', 'Mendoza', '1993-12-03', 'Masculino', 'Uruguay', 'Montevideo', 'Montevideo', 'CI', '45891237', 'Av. Italia 222', '11300', '24056789', '091234567', 'fernando.duarte@example.com', 'Sanatorio Americano', 'BlueCross', 'Paciente con historial de fracturas óseas.'),
(10, 'Lucía', 'Navarro', 'Paredes', '1980-06-18', 'Femenino', 'Paraguay', 'Asunción', 'Asunción', 'CI', '29876543', 'Calle Palma 999', '1208', '021567890', '098765432', 'lucia.navarro@example.com', 'Hospital Central', 'Bristol', 'Paciente con insuficiencia renal leve.'),
(11, 'Juan', 'Pérez', 'Gómez', '1990-05-12', 'Masculino', 'México', 'CDMX', 'Benito Juárez', 'DNI', '12345678', 'Calle 1 #123', '01000', '5551234567', '5557654321', 'juan.perez@email.com', 'Particular', 'Seguro A', 'Sin observaciones'),
(12, 'María', 'López', 'Fernández', '1985-08-25', 'Femenino', 'España', 'Madrid', 'Madrid', 'DNI', '87654321', 'Avenida 2 #456', '28001', '912345678', '611234567', 'maria.lopez@email.com', 'Hospital', 'Seguro B', 'Paciente frecuente'),
(13, 'Carlos', 'García', 'Rodríguez', '1978-12-10', 'Masculino', 'Argentina', 'Buenos Aires', 'Palermo', 'Pasaporte', 'A1234567', 'Calle 3 #789', 'C1425', '114567890', '115678901', 'carlos.garcia@email.com', 'Particular', 'Seguro C', 'Consulta anual'),
(14, 'Ana', 'Martínez', 'Sánchez', '1992-07-14', 'Femenino', 'Chile', 'Santiago', 'Las Condes', 'DNI', '45612378', 'Avenida 4 #321', '7550000', '224567890', '225678901', 'ana.martinez@email.com', 'Clínica', 'Seguro D', 'Paciente nuevo'),
(15, 'Pedro', 'Fernández', 'Gómez', '1980-01-30', 'Masculino', 'Colombia', 'Bogotá', 'Chapinero', 'Cédula', '1098765432', 'Calle 5 #654', '110010', '3145678901', '3156789012', 'pedro.fernandez@email.com', 'Emergencias', 'Seguro E', 'Atención prioritaria'),
(16, 'Sofía', 'Ramírez', 'Díaz', '1995-11-22', 'Femenino', 'Perú', 'Lima', 'Miraflores', 'DNI', '23456789', 'Jirón 6 #987', '15074', '124567890', '125678901', 'sofia.ramirez@email.com', 'Particular', 'Seguro A', 'Seguimiento médico'),
(17, 'Luis', 'Torres', 'Hernández', '1987-09-18', 'Masculino', 'Ecuador', 'Quito', 'Centro Histórico', 'Pasaporte', 'B9876543', 'Calle 7 #852', '170401', '234567890', '235678901', 'luis.torres@email.com', 'Hospital', 'Seguro B', 'Control rutinario'),
(18, 'Elena', 'Díaz', 'Mendoza', '1993-03-05', 'Femenino', 'México', 'Jalisco', 'Guadalajara', 'CURP', 'XDF123456', 'Calle 8 #159', '44100', '334567890', '335678901', 'elena.diaz@email.com', 'Clínica', 'Seguro C', 'Paciente recurrente'),
(19, 'Ricardo', 'Gómez', 'Ortega', '1975-06-29', 'Masculino', 'Argentina', 'Mendoza', 'Godoy Cruz', 'DNI', '56712345', 'Avenida 9 #753', '5501', '444567890', '445678901', 'ricardo.gomez@email.com', 'Emergencias', 'Seguro D', 'Consulta especial'),
(20, 'Gabriela', 'Santos', 'Vargas', '2000-12-01', 'Femenino', 'Chile', 'Valparaíso', 'Viña del Mar', 'DNI', '67823456', 'Calle 10 #951', '2520000', '554567890', '555678901', 'gabriela.santos@email.com', 'Particular', 'Seguro E', 'Revisión anual'),
(21, 'Jorge', 'Pérez', 'Navarro', '1991-04-17', 'Masculino', 'España', 'Barcelona', 'Eixample', 'DNI', '78934567', 'Calle 11 #246', '08036', '664567890', '665678901', 'jorge.perez@email.com', 'Hospital', 'Seguro A', 'Paciente frecuente'),
(22, 'Lucía', 'Hernández', 'Muñoz', '1982-10-09', 'Femenino', 'Colombia', 'Medellín', 'El Poblado', 'Cédula', '89045678', 'Avenida 12 #753', '050021', '774567890', '775678901', 'lucia.hernandez@email.com', 'Clínica', 'Seguro B', 'Control de rutina'),
(23, 'Fernando', 'Vega', 'López', '1979-07-23', 'Masculino', 'Perú', 'Cusco', 'Centro', 'DNI', '90156789', 'Calle 13 #135', '08000', '884567890', '885678901', 'fernando.vega@email.com', 'Emergencias', 'Seguro C', 'Atención urgente'),
(24, 'Natalia', 'Silva', 'Pérez', '1997-02-28', 'Femenino', 'Ecuador', 'Guayas', 'Guayaquil', 'Pasaporte', 'C6543210', 'Jirón 14 #864', '090101', '994567890', '995678901', 'natalia.silva@email.com', 'Particular', 'Seguro D', 'Paciente nueva'),
(25, 'Andrés', 'Mendoza', 'Rojas', '1983-11-15', 'Masculino', 'México', 'Nuevo León', 'Monterrey', 'CURP', 'YTZ987654', 'Calle 15 #753', '64000', '104567890', '105678901', 'andres.mendoza@email.com', 'Hospital', 'Seguro E', 'Seguimiento anual'),
(26, 'Valeria', 'Ortega', 'Vásquez', '1994-05-06', 'Femenino', 'Argentina', 'Córdoba', 'Centro', 'DNI', '12378945', 'Avenida 16 #369', '5000', '114567891', '115678902', 'valeria.ortega@email.com', 'Clínica', 'Seguro A', 'Revisión general'),
(27, 'Esteban', 'Rodríguez', 'Soto', '1989-08-19', 'Masculino', 'Chile', 'Antofagasta', 'Centro', 'DNI', '23489156', 'Calle 17 #456', '1240000', '124567891', '125678902', 'esteban.rodriguez@email.com', 'Emergencias', 'Seguro B', 'Consulta de urgencia'),
(28, 'Clara', 'Gómez', 'Navarro', '2001-03-11', 'Femenino', 'Colombia', 'Cartagena', 'Centro', 'Cédula', '34591267', 'Jirón 18 #753', '130001', '134567891', '135678902', 'clara.gomez@email.com', 'Particular', 'Seguro C', 'Atención pediátrica'),
(29, 'Daniel', 'Fernández', 'Muñoz', '1986-09-30', 'Masculino', 'Perú', 'Arequipa', 'Yanahuara', 'DNI', '45692378', 'Avenida 19 #246', '04017', '144567891', '145678902', 'daniel.fernandez@email.com', 'Hospital', 'Seguro D', 'Consulta por cirugía'),
(30, 'Carolina', 'Martínez', 'Santos', '1998-12-22', 'Femenino', 'Ecuador', 'Manabí', 'Portoviejo', 'Pasaporte', 'D7890123', 'Calle 20 #864', '130105', '154567891', '155678902', 'carolina.martinez@email.com', 'Clínica', 'Seguro E', 'Revisión médica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre_user` varchar(50) NOT NULL,
  `nombre_completo` varchar(100) NOT NULL,
  `contrasena_user` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefono` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre_user`, `nombre_completo`, `contrasena_user`, `email`, `telefono`) VALUES
(1, 'JuanP', 'Juan pablo guzman', '1234', 'JuanP@gmail.com', '3023568596'),
(3, 'Veronica', 'Veronica Castro', '1234', 'VeronicaCastro@gmail.com', '3204680601');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `especialidadesmedicas`
--
ALTER TABLE `especialidadesmedicas`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Nombre` (`Nombre`);

--
-- Indices de la tabla `historia_clinica`
--
ALTER TABLE `historia_clinica`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_paciente` (`id_paciente`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `numero_documento` (`numero_documento`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `especialidadesmedicas`
--
ALTER TABLE `especialidadesmedicas`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `historia_clinica`
--
ALTER TABLE `historia_clinica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `historia_clinica`
--
ALTER TABLE `historia_clinica`
  ADD CONSTRAINT `historia_clinica_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
