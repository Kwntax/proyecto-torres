-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 10-10-2022 a las 00:20:39
-- Versión del servidor: 8.0.30
-- Versión de PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `calificacionesutt`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

DROP TABLE IF EXISTS `alumnos`;
CREATE TABLE IF NOT EXISTS `alumnos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `matricula` int NOT NULL,
  `nombre` varchar(75) NOT NULL,
  `genero` varchar(6) NOT NULL,
  `foto` char(255) NOT NULL,
  `promedio_general` decimal(3,1) NOT NULL,
  `grupo` varchar(25) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_genero_alumno` (`genero`),
  KEY `fk_grupo_alumno` (`grupo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `matricula`, `nombre`, `genero`, `foto`, `promedio_general`, `grupo`) VALUES
(1, 319100123, 'Armenta Beltrán Carlos David', 'GN-M', 'https://localhost:80/fotos/alumnos/0319100123.png', '9.0', 'TI-IDGS-9A-202203');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apoyos_economicos`
--

DROP TABLE IF EXISTS `apoyos_economicos`;
CREATE TABLE IF NOT EXISTS `apoyos_economicos` (
  `id` varchar(6) NOT NULL COMMENT 'Valores: AE-PDR (Padre), AE-MDR (Madre), AE-HRM (Hermano(a)), AE-CNY (Cónyuge), AE-OF (Otro Familiar), AE-YO (Yo)',
  `apoyo_economico` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `apoyos_economicos`
--

INSERT INTO `apoyos_economicos` (`id`, `apoyo_economico`) VALUES
('AE-CNY', 'Cónyuge'),
('AE-HRM', 'Hermano(a)'),
('AE-MDR', 'Madre'),
('AE-OF', 'Otro Familiar'),
('AE-PDR', 'Padre'),
('AE-YO', 'Yo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bachilleratos`
--

DROP TABLE IF EXISTS `bachilleratos`;
CREATE TABLE IF NOT EXISTS `bachilleratos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tipo` varchar(6) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `entidad_federativa` varchar(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `bachilleratos`
--

INSERT INTO `bachilleratos` (`id`, `tipo`, `nombre`, `entidad_federativa`) VALUES
(1, 'TB-PBL', 'Cecyte Rio', 'BC'),
(2, 'TB-PBL', 'CBTIs 116', 'BC'),
(3, 'TB-PBL', 'Conalep II', 'BC'),
(4, 'TB-PBL', 'Cecyte Florido', 'BC'),
(5, 'TB-PBL', 'CBTIs 58', 'BC'),
(6, 'TB-PBL', 'Cecyte Villa del Sol', 'BC'),
(7, 'TB-PBL', 'Cobach Plantel El Florido', 'BC'),
(8, 'TB-PBL', 'CBTIs 237', 'BC'),
(9, 'TB-PBL', 'Cecyte Altiplano', 'BC'),
(10, 'TB-PBL', 'Conalep Tijuana I', 'BC'),
(11, 'TB-PRV', 'UNEA', 'BC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

DROP TABLE IF EXISTS `calificaciones`;
CREATE TABLE IF NOT EXISTS `calificaciones` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cuatrimestre` tinyint NOT NULL,
  `materia` varchar(50) NOT NULL,
  `calificacion` decimal(3,1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones_anteriores`
--

DROP TABLE IF EXISTS `calificaciones_anteriores`;
CREATE TABLE IF NOT EXISTS `calificaciones_anteriores` (
  `id` int NOT NULL AUTO_INCREMENT,
  `alumno` int NOT NULL,
  `ingreso` smallint NOT NULL,
  `ingles` tinytext NOT NULL,
  `bachillerato` tinyint NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_calificaciones_anteriores_alumno` (`alumno`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `calificaciones_anteriores`
--

INSERT INTO `calificaciones_anteriores` (`id`, `alumno`, `ingreso`, `ingles`, `bachillerato`) VALUES
(1, 1, 872, 'B2', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

DROP TABLE IF EXISTS `carreras`;
CREATE TABLE IF NOT EXISTS `carreras` (
  `id` varchar(6) NOT NULL,
  `carrera` varchar(50) NOT NULL,
  `nivel` varchar(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_carrera_nivel` (`nivel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`id`, `carrera`, `nivel`) VALUES
('INGTI', 'Ingeniería en Tecnologías de la Información', 'ING');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuatrimestres`
--

DROP TABLE IF EXISTS `cuatrimestres`;
CREATE TABLE IF NOT EXISTS `cuatrimestres` (
  `id` int NOT NULL AUTO_INCREMENT,
  `carrera` varchar(50) NOT NULL,
  `cuatrimestre` tinyint NOT NULL,
  `grupo` tinytext NOT NULL,
  `nivel` varchar(20) NOT NULL COMMENT 'Valores: TSU, Ingeniería, Licenciatura.',
  `especialidad` varchar(50) NOT NULL,
  `periodo` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_economicos`
--

DROP TABLE IF EXISTS `datos_economicos`;
CREATE TABLE IF NOT EXISTS `datos_economicos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `alumno` int NOT NULL,
  `ingresos` varchar(7) NOT NULL,
  `tipo_vivienda` varchar(6) NOT NULL,
  `vive_con` varchar(6) NOT NULL,
  `tipo_transporte` varchar(6) NOT NULL,
  `persona_apoyo_economico` varchar(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ingreso_datoseconomicos` (`ingresos`),
  KEY `fk_tipo_vivienda_datos_economicos` (`tipo_vivienda`),
  KEY `fk_vive_con_datos_economicos` (`vive_con`),
  KEY `fk_tipo_transporte_datos_economicos` (`tipo_transporte`),
  KEY `fk_apoyo_economico_datos_economicos` (`persona_apoyo_economico`),
  KEY `fk_alumno_datos_economicos` (`alumno`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `datos_economicos`
--

INSERT INTO `datos_economicos` (`id`, `alumno`, `ingresos`, `tipo_vivienda`, `vive_con`, `tipo_transporte`, `persona_apoyo_economico`) VALUES
(1, 1, 'IF-1015', 'VD-RNT', 'VC-AP', 'TR-PBL', 'AE-PDR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_escolares`
--

DROP TABLE IF EXISTS `datos_escolares`;
CREATE TABLE IF NOT EXISTS `datos_escolares` (
  `id` int NOT NULL AUTO_INCREMENT,
  `alumno` int NOT NULL,
  `bachillerato` int NOT NULL,
  `tipo_bachillerato` varchar(6) NOT NULL,
  `entidad_federativa` varchar(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_bachillerato_datos_escolares` (`bachillerato`),
  KEY `fk_tipo_bachillerato_datos_escolares` (`tipo_bachillerato`),
  KEY `fk_entidad_federativa_datos_escolares` (`entidad_federativa`),
  KEY `fk_alumno_datos_escolares` (`alumno`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `datos_escolares`
--

INSERT INTO `datos_escolares` (`id`, `alumno`, `bachillerato`, `tipo_bachillerato`, `entidad_federativa`) VALUES
(1, 1, 2, 'TB-PBL', 'BC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_familiares`
--

DROP TABLE IF EXISTS `datos_familiares`;
CREATE TABLE IF NOT EXISTS `datos_familiares` (
  `id` int NOT NULL AUTO_INCREMENT,
  `alumno` int NOT NULL,
  `nombre` varchar(75) NOT NULL,
  `ocupacion` varchar(75) NOT NULL,
  `telefono` char(10) NOT NULL,
  `parentesco` varchar(30) NOT NULL,
  `emergencia` tinyint(1) NOT NULL COMMENT 'Valores: 0: No emergencia, 1: Emergencia.',
  PRIMARY KEY (`id`),
  KEY `fk_datos_familiares_alumno` (`alumno`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `datos_familiares`
--

INSERT INTO `datos_familiares` (`id`, `alumno`, `nombre`, `ocupacion`, `telefono`, `parentesco`, `emergencia`) VALUES
(1, 1, 'Carlos Armenta López', 'Empleado', '6649584723', 'padre', 0),
(2, 1, 'Gabriela Beltran', 'Ama de Casa', '6641628372', 'madre', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_laborales`
--

DROP TABLE IF EXISTS `datos_laborales`;
CREATE TABLE IF NOT EXISTS `datos_laborales` (
  `id` int NOT NULL AUTO_INCREMENT,
  `alumno` int NOT NULL,
  `nombre` varchar(75) NOT NULL,
  `domicilio` varchar(100) NOT NULL,
  `telefono` char(10) NOT NULL,
  `puesto` varchar(50) NOT NULL,
  `departamento` varchar(50) NOT NULL,
  `relacion_estudio` tinyint(1) NOT NULL COMMENT 'Cero = No relación, Uno = Relación',
  `razon_trabajo` varchar(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_razon_trabajo_datos_laborales` (`razon_trabajo`),
  KEY `fk_alumnos_datos_laborales` (`alumno`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `datos_laborales`
--

INSERT INTO `datos_laborales` (`id`, `alumno`, `nombre`, `domicilio`, `telefono`, `puesto`, `departamento`, `relacion_estudio`, `razon_trabajo`) VALUES
(1, 1, 'ACME S.A. DE C.V', 'Parque Industrial el Florido 1234-A', '6648271627', 'Desarrollador Junior', 'Sistemas', 1, 'RT-AEF');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_personales`
--

DROP TABLE IF EXISTS `datos_personales`;
CREATE TABLE IF NOT EXISTS `datos_personales` (
  `id` int NOT NULL AUTO_INCREMENT,
  `alumno` int NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `edad` int NOT NULL,
  `ciudad_nacimiento` varchar(30) NOT NULL,
  `municipio_estado` varchar(6) NOT NULL,
  `domicilio` int NOT NULL,
  `telefono_celular` char(10) NOT NULL,
  `telefono_casa` char(10) NOT NULL,
  `correo_personal` varchar(50) NOT NULL,
  `correo_institucional` varchar(50) NOT NULL,
  `estado_civil` varchar(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_municipio_estado_datos_personales` (`municipio_estado`),
  KEY `fk_domicilio_datos_personales` (`domicilio`),
  KEY `fk_estado_civil_datos_personales` (`estado_civil`),
  KEY `fk_datos_personales_alumno` (`alumno`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `datos_personales`
--

INSERT INTO `datos_personales` (`id`, `alumno`, `fecha_nacimiento`, `edad`, `ciudad_nacimiento`, `municipio_estado`, `domicilio`, `telefono_celular`, `telefono_casa`, `correo_personal`, `correo_institucional`, `estado_civil`) VALUES
(1, 1, '2003-04-23', 19, 'Mazatlán', 'SIN', 1, '6649692607', '6649374859', 'carlos.armenta@gmail.com', '0319100123@uttijuana.edu.mx', 'EC-SLT');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `domicilios`
--

DROP TABLE IF EXISTS `domicilios`;
CREATE TABLE IF NOT EXISTS `domicilios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `calle` varchar(50) NOT NULL,
  `numero` varchar(50) NOT NULL,
  `colonia` varchar(50) NOT NULL,
  `municipio` varchar(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `domicilios`
--

INSERT INTO `domicilios` (`id`, `calle`, `numero`, `colonia`, `municipio`) VALUES
(1, 'Privade Los Robles', '1234-A', 'Jardines del Lago', 'MN-TJ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entidades_federativas`
--

DROP TABLE IF EXISTS `entidades_federativas`;
CREATE TABLE IF NOT EXISTS `entidades_federativas` (
  `id` varchar(6) NOT NULL,
  `entidad_federativa` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `entidades_federativas`
--

INSERT INTO `entidades_federativas` (`id`, `entidad_federativa`) VALUES
('AGC', 'Aguascalientes'),
('BC', 'Baja California'),
('SIN', 'Sinaloa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades`
--

DROP TABLE IF EXISTS `especialidades`;
CREATE TABLE IF NOT EXISTS `especialidades` (
  `id` varchar(6) NOT NULL,
  `periodo` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `especialidades`
--

INSERT INTO `especialidades` (`id`, `periodo`) VALUES
('TIDGS', 'Desarrollo y Gestión de Software'),
('TIEDC', 'Entornos Digitales Ciberseguridad'),
('TIEVD', 'Entornos Virtuales y Digitales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados_civiles`
--

DROP TABLE IF EXISTS `estados_civiles`;
CREATE TABLE IF NOT EXISTS `estados_civiles` (
  `id` varchar(6) NOT NULL COMMENT 'Valores: EC-CSD (Casado), EC-DVR (Divorciado), EC-SLT (Soltero), EC-UL (Union Libre).',
  `estado_civil` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `estados_civiles`
--

INSERT INTO `estados_civiles` (`id`, `estado_civil`) VALUES
('EC-CSD', 'Casado(a)'),
('EC-DVR', 'Divorciado(a)'),
('EC-SLT', 'Soltero(a)'),
('EC-UL', 'Unión Libre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

DROP TABLE IF EXISTS `generos`;
CREATE TABLE IF NOT EXISTS `generos` (
  `id` varchar(6) NOT NULL COMMENT 'Valores: GN-M (Masculino), GN-F (Femenino), GN-OND (Otro/No definido).',
  `genero` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`id`, `genero`) VALUES
('GN-F', 'Femenino'),
('GN-M', 'Masculino'),
('GN-OND', 'Otro/No definido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

DROP TABLE IF EXISTS `grupos`;
CREATE TABLE IF NOT EXISTS `grupos` (
  `id` varchar(25) NOT NULL,
  `cuatrimestre` tinyint(1) NOT NULL,
  `grupo` tinytext NOT NULL,
  `nombre_completo` varchar(100) NOT NULL,
  `carrera` varchar(6) NOT NULL,
  `especialidad` varchar(6) NOT NULL,
  `periodo` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_carrera_grupos` (`carrera`),
  KEY `fk_especialidad_grupos` (`especialidad`),
  KEY `fk_periodo_grupos` (`periodo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`id`, `cuatrimestre`, `grupo`, `nombre_completo`, `carrera`, `especialidad`, `periodo`) VALUES
('TI-IDGS-9A-202203', 9, 'A', '9-A Ingeniería en Tecnologías de la Información Área Desarrollo y Gestión de Software', 'INGTI', 'TIDGS', 202203);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresos_familiares`
--

DROP TABLE IF EXISTS `ingresos_familiares`;
CREATE TABLE IF NOT EXISTS `ingresos_familiares` (
  `id` varchar(7) NOT NULL COMMENT 'Valores: IF-ME5 (Menos de $5,000), IF-510 ($5,000 A $10,000), IF-1015 ($10,000 A $15,000), IF-MA15 (Más de $15,000).',
  `ingresos_familiares` varchar(55) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `ingresos_familiares`
--

INSERT INTO `ingresos_familiares` (`id`, `ingresos_familiares`) VALUES
('IF-1015', '$10,000 A $15,000'),
('IF-510', '$5,000 A $10,000'),
('IF-MA15', 'Más de $15,000'),
('IF-ME5', 'Menos de $5,000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instituciones`
--

DROP TABLE IF EXISTS `instituciones`;
CREATE TABLE IF NOT EXISTS `instituciones` (
  `id` int NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `municipio` varchar(25) NOT NULL,
  `domicilio` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestros`
--

DROP TABLE IF EXISTS `maestros`;
CREATE TABLE IF NOT EXISTS `maestros` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(75) NOT NULL,
  `genero` char(20) NOT NULL,
  `edad` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipios`
--

DROP TABLE IF EXISTS `municipios`;
CREATE TABLE IF NOT EXISTS `municipios` (
  `id` varchar(6) NOT NULL,
  `municipio` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `municipios`
--

INSERT INTO `municipios` (`id`, `municipio`) VALUES
('MN-RST', 'Rosarito'),
('MN-TC', 'Tecate'),
('MN-TJ', 'Tijuana'),
('SIN', 'Sinaloa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `niveles`
--

DROP TABLE IF EXISTS `niveles`;
CREATE TABLE IF NOT EXISTS `niveles` (
  `id` varchar(6) NOT NULL,
  `nivel` varchar(50) NOT NULL COMMENT 'Valores: TSU, Ingeniería, Licenciatura.',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `niveles`
--

INSERT INTO `niveles` (`id`, `nivel`) VALUES
('ING', 'Ingeniería'),
('TSU', 'Técnico Superior Universitario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodos`
--

DROP TABLE IF EXISTS `periodos`;
CREATE TABLE IF NOT EXISTS `periodos` (
  `id` int NOT NULL,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `periodos`
--

INSERT INTO `periodos` (`id`, `nombre`) VALUES
(202201, 'Enero - Abril 2022'),
(202202, 'Mayo - Agosto 2022'),
(202203, 'Septiembre - Diciembre 2022');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas_vivienda`
--

DROP TABLE IF EXISTS `personas_vivienda`;
CREATE TABLE IF NOT EXISTS `personas_vivienda` (
  `id` varchar(6) NOT NULL COMMENT 'Valores: VC-AP (Ambos Padres), VC-UP (Uno de los Padres), VC-PRJ (Pareja), VC-SL (Solo(a)), VC-OF (Otro familiar), VC-AMG (Amigos)',
  `vive_con` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `personas_vivienda`
--

INSERT INTO `personas_vivienda` (`id`, `vive_con`) VALUES
('VC-AMG', 'Amigos'),
('VC-AP', 'Ambos Padres'),
('VC-OF', 'Otro Familiar'),
('VC-PRJ', 'Pareja'),
('VC-SL', 'Solo(a)'),
('VC-UP', 'Uno de los Padres');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promedios`
--

DROP TABLE IF EXISTS `promedios`;
CREATE TABLE IF NOT EXISTS `promedios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cuatrimestre` int NOT NULL,
  `promedio` decimal(3,1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `razones_trabajo`
--

DROP TABLE IF EXISTS `razones_trabajo`;
CREATE TABLE IF NOT EXISTS `razones_trabajo` (
  `id` varchar(6) NOT NULL COMMENT 'RT-AEF (Apoyar Económicamente a la Familia), RT-ATF (Apoyar Totalmente a la Familia), RT-SGI (Solventar Algunos Gastos Personales), RT-ST (Sostenerme Totalmente).',
  `razon` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `razones_trabajo`
--

INSERT INTO `razones_trabajo` (`id`, `razon`) VALUES
('RT-AEF', 'Apoyar Económicamente a la Familia'),
('RT-ATF', 'Apoyar Totalmente a la Familia'),
('RT-SGI', 'Solventar Algunos Gastos Personales'),
('RT-ST', 'Sostenerme Totalmente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_bachilleratos`
--

DROP TABLE IF EXISTS `tipo_bachilleratos`;
CREATE TABLE IF NOT EXISTS `tipo_bachilleratos` (
  `id` varchar(6) NOT NULL COMMENT 'Valores: TB-PBL (Escuela Pública (Oficial de Gobierno)), TB-PRV (Privada o Particular).',
  `tipo_bachillerato` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `tipo_bachilleratos`
--

INSERT INTO `tipo_bachilleratos` (`id`, `tipo_bachillerato`) VALUES
('TB-PBL', 'Escuela Pública (Oficial de Gobierno)'),
('TB-PRV', 'Privada o Particular');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transportes`
--

DROP TABLE IF EXISTS `transportes`;
CREATE TABLE IF NOT EXISTS `transportes` (
  `id` varchar(6) NOT NULL COMMENT 'Valores: TR-PRP (Transporte Propio), TR-PBL (Transporte Público). ',
  `transporte` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `transportes`
--

INSERT INTO `transportes` (`id`, `transporte`) VALUES
('TR-PBL', 'Público'),
('TR-PRP', 'Propio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viviendas`
--

DROP TABLE IF EXISTS `viviendas`;
CREATE TABLE IF NOT EXISTS `viviendas` (
  `id` varchar(6) NOT NULL COMMENT 'Valores: VD-PRP (Propia), VD-RNT (Rentada), VD-PRS (Prestada).',
  `vivienda` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `viviendas`
--

INSERT INTO `viviendas` (`id`, `vivienda`) VALUES
('VD-PRP', 'Propia'),
('VD-PRS', 'Prestada'),
('VD-RNT', 'Rentada');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `fk_genero_alumno` FOREIGN KEY (`genero`) REFERENCES `generos` (`id`),
  ADD CONSTRAINT `fk_grupo_alumno` FOREIGN KEY (`grupo`) REFERENCES `grupos` (`id`);

--
-- Filtros para la tabla `calificaciones_anteriores`
--
ALTER TABLE `calificaciones_anteriores`
  ADD CONSTRAINT `fk_calificaciones_anteriores_alumno` FOREIGN KEY (`alumno`) REFERENCES `alumnos` (`id`);

--
-- Filtros para la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD CONSTRAINT `fk_carrera_nivel` FOREIGN KEY (`nivel`) REFERENCES `niveles` (`id`);

--
-- Filtros para la tabla `datos_economicos`
--
ALTER TABLE `datos_economicos`
  ADD CONSTRAINT `fk_apoyo_economico_datos_economicos` FOREIGN KEY (`persona_apoyo_economico`) REFERENCES `apoyos_economicos` (`id`),
  ADD CONSTRAINT `fk_datos_economicos_alumno` FOREIGN KEY (`alumno`) REFERENCES `alumnos` (`id`),
  ADD CONSTRAINT `fk_ingreso_datoseconomicos` FOREIGN KEY (`ingresos`) REFERENCES `ingresos_familiares` (`id`),
  ADD CONSTRAINT `fk_tipo_transporte_datos_economicos` FOREIGN KEY (`tipo_transporte`) REFERENCES `transportes` (`id`),
  ADD CONSTRAINT `fk_tipo_vivienda_datos_economicos` FOREIGN KEY (`tipo_vivienda`) REFERENCES `viviendas` (`id`),
  ADD CONSTRAINT `fk_vive_con_datos_economicos` FOREIGN KEY (`vive_con`) REFERENCES `personas_vivienda` (`id`);

--
-- Filtros para la tabla `datos_escolares`
--
ALTER TABLE `datos_escolares`
  ADD CONSTRAINT `fk_alumno_datos_escolares` FOREIGN KEY (`alumno`) REFERENCES `alumnos` (`id`),
  ADD CONSTRAINT `fk_bachillerato_datos_escolares` FOREIGN KEY (`bachillerato`) REFERENCES `bachilleratos` (`id`),
  ADD CONSTRAINT `fk_entidad_federativa_datos_escolares` FOREIGN KEY (`entidad_federativa`) REFERENCES `entidades_federativas` (`id`),
  ADD CONSTRAINT `fk_tipo_bachillerato_datos_escolares` FOREIGN KEY (`tipo_bachillerato`) REFERENCES `tipo_bachilleratos` (`id`);

--
-- Filtros para la tabla `datos_familiares`
--
ALTER TABLE `datos_familiares`
  ADD CONSTRAINT `fk_datos_familiares_alumno` FOREIGN KEY (`alumno`) REFERENCES `alumnos` (`id`);

--
-- Filtros para la tabla `datos_laborales`
--
ALTER TABLE `datos_laborales`
  ADD CONSTRAINT `fk_alumnos_datos_laborales` FOREIGN KEY (`alumno`) REFERENCES `alumnos` (`id`),
  ADD CONSTRAINT `fk_razon_trabajo_datos_laborales` FOREIGN KEY (`razon_trabajo`) REFERENCES `razones_trabajo` (`id`);

--
-- Filtros para la tabla `datos_personales`
--
ALTER TABLE `datos_personales`
  ADD CONSTRAINT `fk_datos_personales_alumno` FOREIGN KEY (`alumno`) REFERENCES `alumnos` (`id`),
  ADD CONSTRAINT `fk_domicilio_datos_personales` FOREIGN KEY (`domicilio`) REFERENCES `domicilios` (`id`),
  ADD CONSTRAINT `fk_estado_civil_datos_personales` FOREIGN KEY (`estado_civil`) REFERENCES `estados_civiles` (`id`),
  ADD CONSTRAINT `fk_municipio_estado_datos_personales` FOREIGN KEY (`municipio_estado`) REFERENCES `municipios` (`id`);

--
-- Filtros para la tabla `grupos`
--
ALTER TABLE grupos
  ADD CONSTRAINT `fk_carrera_grupos` FOREIGN KEY (`carrera`) REFERENCES `carreras` (`id`),
  ADD CONSTRAINT `fk_especialidad_grupos` FOREIGN KEY (`especialidad`) REFERENCES `especialidades` (`id`),
  ADD CONSTRAINT `fk_periodo_grupos` FOREIGN KEY (`periodo`) REFERENCES `periodos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
