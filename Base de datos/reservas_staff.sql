-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-01-2021 a las 01:05:17
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `reservas_staff`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL,
  `cedula` int(11) NOT NULL,
  `Nombres` varchar(20) DEFAULT NULL,
  `Apellidos` varchar(50) DEFAULT NULL,
  `cargo` varchar(100) NOT NULL,
  `cod_tipo_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `cedula`, `Nombres`, `Apellidos`, `cargo`, `cod_tipo_fk`) VALUES
(1, 8028865, 'DANIEL', 'GOMEZ VELASQUEZ', 'DIRECTOR DE MANTENIMIENTO', 2),
(2, 8305975, 'MANUEL ', 'TORRES MALDONADO', 'INGENIERO PIDA Y MANTENIMIENTO', 2),
(3, 9774509, 'CARLOS ANDRES', 'PACHON PEREZ', 'DIRECTOR DE PLANEACIÓN DE OPERACIONES', 2),
(4, 16287493, 'JAVIER ANDRES', 'BENITEZ RIOS', 'DIRECTOR DE OPERACIONES', 2),
(5, 21448771, 'ANA LUCIA', 'PEREZ MESA', 'COMUNICADOR SOCIAL', 2),
(6, 28538263, 'VIVIAN TATIANA', 'FLOREZ DELGADO', 'COORD. DEL PROGRAMA GESTIÓN DE RIESGO', 2),
(7, 32323131, 'ADRIANA ', 'PAREJA LOPEZ', 'ASISTENTE TALENTO HUMANO', 2),
(8, 39191789, 'MARIA YOLIMA', 'ARANGO GIRALDO', 'ANALISTAS CONTABLE', 2),
(9, 39443756, 'GLADYS CECILIA', 'CARDONA MACIA', 'GESTOR DEL SISTEMA DE CONTROL INTERNO', 2),
(10, 39449162, 'LINA MARIA', 'GONZALEZ MEJIA', 'COORDINADORA AMBIENTAL', 2),
(11, 42789955, 'ANA LUCIA', 'ESPINOSA PALACIOS', 'DIRECTORA  FINANCIERA', 2),
(12, 42876450, 'SARA INES', 'RAMIREZ RESTREPO', 'GERENTE GENERAL', 2),
(13, 43162033, 'ELIZABETH MILENA', 'MONTOYA BEDOYA', 'COORDINADOR TALENTO HUMANO', 2),
(14, 43181251, 'INYIRA MARIA', 'LONDONO DUQUE', 'ANALISTA COMERCIAL', 2),
(15, 43220581, 'EMILIANA ', 'VILLA MEJIA', 'DIRECTORA JURIDICA', 2),
(16, 43255725, 'MONICA ANDREA', 'MONTOYA CASTAÑO', 'GESTOR DE NEGOCIOS', 2),
(17, 43500913, 'CLAUDIA ELENA', 'SEPULVEDA ROLDAN', 'AUXILIAR DE INGENIERIA', 2),
(18, 43539475, 'MARGARITA MARIA', 'NUÑEZ MUÑOZ', 'CONTADOR LIDER', 2),
(19, 43626179, 'MARIA CATALINA', 'RENDON GUTIERREZ', 'DIRECTOR COMERCIAL', 2),
(20, 43743660, 'BLANCA ESTELLA', 'JIMENEZ ACEVEDO', 'COORDINADORA GESTION DOCUMENTAL', 2),
(21, 43743772, 'LUZ MERY', 'LOPEZ BETANCUR', 'ASISTENTE TALENTO HUMANO', 2),
(22, 43876477, 'SANDRA MILENA', 'AGUDELO ESCOBAR', 'ANALISTA DE SELECCION DE PERSONAL', 2),
(23, 43907666, 'NELFI JASMIN', 'MURILLO VALENCIA', 'COORDINADOR DE COMPRAS', 2),
(24, 52814514, 'JIMENA DEL PILAR', 'CERMEÑO CRISTANCHO', 'ABOGADO(A)', 2),
(25, 70909332, 'EDWIN ARLEY', 'URIBE PULGARIN', 'ANALISTA DE INFORMACION Y TECNOLOGIA', 2),
(26, 71276469, 'JHON JAIRO', 'ORTIZ VILLAFANE', 'INGENIERO PIDA Y MANTENIMIENTO', 2),
(27, 71724091, 'ALEXANDER ', 'ALVAREZ ARISTIZABAL', 'INGENIERO PIDA Y MANTENIMIENTO', 2),
(28, 71759651, 'JUAN DAVID', 'JARAMILLO RESTREPO', 'COORD. SISTEMA DE GESTION INFORMACION Y TECNOLOGIA', 2),
(29, 71794204, 'EDGAR EDUARDO', 'DIAZ ROJAS', 'ANALISTA DE MANTENIMIENTO', 2),
(30, 75080899, 'DAVID ALONSO', 'QUINTERO HENAO', 'INGENIERO PIDA Y MANTENIMIENTO', 2),
(31, 80881338, 'ELKIN ', 'LEON BARBOSA', 'COORD. DEL PROGRAMA GESTIÓN DE RIESGO', 2),
(32, 98557749, 'JUAN GONZALO', 'DIAZ RODRIGUEZ', 'DIRECTOR P.I.D.A', 2),
(33, 1000438382, 'YESICA DAHIANA', 'PINEDA LONDONO', 'AUXILIAR DE TESORERIA', 2),
(34, 1000538319, 'YAIDER ', 'CORDOBA CORDOBA', 'APRENDIZ EN SISTEMAS', 1),
(35, 1001651664, 'ALEJANDRA ', 'ARBOLEDA BUITRAGO', 'APRENDIZ CARTERA', 2),
(36, 1001762660, 'CAMILA ', 'VARGAS SERNA', 'AUXILIAR DE GESTION DOCUMENTAL', 2),
(37, 1007291989, 'DILAURA ', 'RIOS RIOS', 'APRENDIZ CARTERA', 2),
(38, 1007760118, 'JHOVANNI ', 'GEREDA LAGUADO', 'APRENDIZ DE MANTENIMIENTO', 2),
(39, 1017154044, 'JOHN ANDERSON', 'VELEZ RUA', 'COMPRADOR', 2),
(40, 1017215828, 'DANIEL FELIPE', 'CRUZ IBARRA', 'ANALISTA DE PRODUCTIVIDAD', 2),
(41, 1017220875, 'DANIEL ENRIQUE', 'LOPEZ OCAMPO', 'GERENTE DE SEGURIDAD OPERACIONAL', 2),
(42, 1017244468, 'KAROLAINE ', 'CALDERON JIMENEZ', 'TECNOLOGO EN SEGURIDAD Y SALUD EN EL TRABAJO', 2),
(43, 1020482705, 'SALOME ', 'RUIZ GALLEGO', 'TECNICO DE INFORMACION Y MANTENIMIENTO', 2),
(44, 1022124383, 'JAIR ANDRES', 'CASTAÑEDA DIAZ', 'APRENDIZ CARTERA', 2),
(45, 1035856089, 'ASTRID YOHANA', 'AGUDELO GAÑAN', 'APRENDIZ GESTION TALENTO HUMANO', 2),
(46, 1036392447, 'JOSE DANIEL', 'ALVAREZ RESTREPO', 'COORDINADOR DE ALMACEN', 2),
(47, 1036394775, 'CAROLINA ', 'GIRALDO VALENCIA', 'COMUNICADORA SOCIAL CM', 2),
(48, 1036395467, 'YENNY PAOLA', 'GARCIA GARCIA', 'AUXILIAR DE TESORERIA', 2),
(49, 1036651709, 'DAVID ', 'ORTIZ SERNA', 'ANALISTA DE INFORMACION Y TECNOLOGIA', 2),
(50, 1036666542, 'ESTEBAN ', 'PULGARIN BEDOYA', 'TECNICO DE INFORMACION Y MANTENIMIENTO', 2),
(51, 1036927180, 'VERONICA MARCELA', 'ZAPATA FLOREZ', 'AUDITOR CONTROL INTERNO', 2),
(52, 1036929424, 'LINA MARCELA', 'BRICENO ECHEVERRI', 'AUXILIAR DE TESORERIA', 2),
(53, 1036935983, 'ANDREA ', 'MONTOYA GONZALEZ', 'SECRETARIA RECEPCIONISTA', 2),
(54, 1036940894, 'PAULA YURANY', 'MEJIA SERNA', 'TESORERA', 2),
(55, 1036947373, 'NATALIA ', 'ECHEVERRI PEREZ', 'ANALISTAS CONTABLE', 2),
(56, 1036949682, 'SANDRA PATRICIA', 'ZAPATA  ORTIZ', 'ALMACENISTA', 2),
(57, 1036960574, 'SUSANA ', 'CORREA COVELLI', 'ANALISTA DE COMPRAS', 2),
(58, 1037571116, 'JORGE LUIS', 'LOPEZ DELGADO', 'GESTOR DE NEGOCIOS', 2),
(59, 1038408983, 'YENNY ASTRID', 'ALVAREZ CARDONA', 'AUXILIAR CONTABLE', 2),
(60, 1038409103, 'NURY NATALY', 'LÓPEZ MARIN', 'AUXILIAR CONTABLE', 2),
(61, 1039685575, 'DERLY NURBHEY', 'ANDRADE CHACON', 'AUXILIAR DE PELIGRO AVIARIO', 2),
(62, 1040041246, 'VIVIANA MARIA', 'CASTAÑO MUÑOZ', 'ANALISTAS CONTABLE', 2),
(63, 1040045657, 'JUAN  CAMILO', 'LOPEZ LOPEZ', 'COMPRADOR', 2),
(64, 1040049227, 'EMANUEL ', 'OROZCO MARTINEZ', 'APRENDIZ INGENIERIA MECATRONICA', 2),
(65, 1040050583, 'LIZETH ', 'FLOREZ PATIÑO', 'AUXILIAR DE TESORERIA', 2),
(66, 1040181046, 'ANA MARIA', 'RIOS AGUILAR', 'ABOGADO(A)', 2),
(67, 1040731518, 'LUISA FERNANDA', 'MURIEL MARULANDA', 'GESTOR DE NEGOCIOS', 2),
(68, 1040732868, 'MARIA ALEJANDRA', 'VELEZ PARRA', 'GESTOR COMERCIAL', 2),
(69, 1112624205, 'CRISTIAN CAMILO', 'MONTOYA SANCHEZ', 'ANALISTA DE INFORMACION Y TECNOLOGIA', 2),
(70, 1128264832, 'MARIA ALEJANDRA', 'URIBE GARCIA', 'ABOGADO(A)', 2),
(71, 1128266857, 'JUAN SANTIAGO', 'BAEZ MORALES', 'INGENIERO PIDA Y MANTENIMIENTO', 2),
(72, 1128268781, 'JULIANA ', 'VELEZ CHAVARRIAGA', 'ABOGADO(A)', 2),
(73, 1128272383, 'MARIA TERESA', 'CARDENAS TRIANA', 'COORDINADORA DE SEGURIDAD Y SALUD EN EL TRABAJO', 1),
(74, 1128276544, 'JOHANA ', 'RAMIREZ BERRIO', 'CONTADOR', 2),
(75, 1128453800, 'YAZMIN YOHANA', 'ACEVEDO ROJAS', 'ANALISTA DE GESTIÓN DOCUMENTAL', 2),
(76, 1143342975, 'MARIA JOSE', 'MERCADO DIAZ', 'INGENIERO PIDA Y MANTENIMIENTO', 2),
(77, 1152198268, 'SARA LUCIA', 'BEDOYA LONDOÑO', 'ANALISTA DE SEGURIDAD OPERACIONAL', 2),
(78, 1152684103, 'GEOVANNY ', 'DIAZ RAMIREZ', 'ARQUITECTO', 2),
(79, 1216726795, 'ALEJANDRA ', 'ACOSTA CANO', 'APRENDIZ EN INGENIERIA AERONAUTICA', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE `modulos` (
  `cod_modulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `modulos`
--

INSERT INTO `modulos` (`cod_modulo`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15),
(16),
(17),
(18),
(19),
(20),
(21),
(22),
(23),
(24),
(25),
(26),
(27),
(28),
(29),
(30),
(31),
(32),
(33),
(34),
(35),
(36),
(37),
(38),
(39),
(40);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `cod_reserva` int(11) NOT NULL,
  `id_fk` int(11) NOT NULL,
  `fecha_reserva` date DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_final` time DEFAULT NULL,
  `cod_modulo_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`cod_reserva`, `id_fk`, `fecha_reserva`, `hora_inicio`, `hora_final`, `cod_modulo_fk`) VALUES
(2, 34, '2021-01-07', '08:55:00', '09:00:00', 8),
(3, 34, '2021-01-08', '08:55:00', '09:00:00', 2),
(4, 34, '2021-01-09', '08:00:00', '16:00:00', 6),
(5, 34, '2021-01-21', '08:00:00', '16:00:00', 5),
(6, 34, '2021-01-23', '08:00:00', '16:00:00', 6),
(7, 34, '2021-01-14', '08:55:00', '09:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuarios`
--

CREATE TABLE `tipo_usuarios` (
  `cod_tipo` int(11) NOT NULL,
  `nombre` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_usuarios`
--

INSERT INTO `tipo_usuarios` (`cod_tipo`, `nombre`) VALUES
(1, 'administra'),
(2, 'usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tipo` (`cod_tipo_fk`);

--
-- Indices de la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`cod_modulo`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`cod_reserva`),
  ADD KEY `id_fk` (`id_fk`),
  ADD KEY `cod_modulo_fk` (`cod_modulo_fk`);

--
-- Indices de la tabla `tipo_usuarios`
--
ALTER TABLE `tipo_usuarios`
  ADD PRIMARY KEY (`cod_tipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `cod_modulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `cod_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`cod_tipo_fk`) REFERENCES `tipo_usuarios` (`cod_tipo`),
  ADD CONSTRAINT `fk_tipo` FOREIGN KEY (`cod_tipo_fk`) REFERENCES `tipo_usuarios` (`cod_tipo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`id_fk`) REFERENCES `empleados` (`id`),
  ADD CONSTRAINT `reservas_ibfk_2` FOREIGN KEY (`cod_modulo_fk`) REFERENCES `modulos` (`cod_modulo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
