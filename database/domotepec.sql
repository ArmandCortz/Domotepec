-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 16-12-2023 a las 09:25:25
-- Versión del servidor: 8.0.30
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `domotepec`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bienes`
--

CREATE TABLE `bienes` (
  `id` bigint UNSIGNED NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `costo` double(8,2) NOT NULL,
  `empresa` int NOT NULL,
  `sucursal` int NOT NULL,
  `estado` int NOT NULL,
  `stock` int DEFAULT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cabanas`
--

CREATE TABLE `cabanas` (
  `id` bigint UNSIGNED NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ubicacion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sucursal` int NOT NULL,
  `precio` double(8,2) DEFAULT NULL,
  `huespedes` int DEFAULT NULL,
  `habitaciones` int DEFAULT NULL,
  `camas` int DEFAULT NULL,
  `baños` int DEFAULT NULL,
  `limpieza` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cabanas`
--

INSERT INTO `cabanas` (`id`, `imagen`, `nombre`, `ubicacion`, `descripcion`, `sucursal`, `precio`, `huespedes`, `habitaciones`, `camas`, `baños`, `limpieza`, `created_at`, `updated_at`) VALUES
(1, '1702713144.png', 'La Equidna', 'Ilopango', 'La Equidna, una hermosa locacion en la que disfrutas de un atardecer reflejado en aguas turquesas', 1, 80.00, 15, 6, 6, 4, 30.00, '2023-12-16 13:52:24', '2023-12-16 13:52:24'),
(2, '1702713741.png', 'Los Chorritos', 'Ilopango', 'Hermosa cabaña con una vista panoramica a orilla del lago de Ilopango', 1, 90.00, 10, 6, 6, 3, 35.00, '2023-12-16 14:02:22', '2023-12-16 14:03:03'),
(3, '1702714115.png', 'Los Conacastes', 'Ilopango', 'Hermosa y atractiva cabaña con resplandeciente vista panoramica del lago de Ilopango y sus alrededores', 1, 110.00, 15, 7, 9, 5, 40.00, '2023-12-16 14:08:35', '2023-12-16 14:08:35'),
(4, '1702714438.png', 'El zapote', 'Cabañas', 'Cabaña con hermosa vista hacia un maravilloso bosque tropical', 2, 70.00, 8, 5, 7, 2, 25.00, '2023-12-16 14:13:59', '2023-12-16 14:13:59'),
(5, '1702715434.png', 'Las Palmas', 'Cabañas', 'Una hermosa y calida bienvenida te espera en la cabaña Las Palmas, donde encontraras muchas sorpresas.', 2, 75.00, 7, 4, 5, 2, 20.00, '2023-12-16 14:30:34', '2023-12-16 14:30:34'),
(6, '1702716151.png', 'Las Tenderas', 'Cabañas', 'Una maravillosa experiencia te espera en Las Tenderas, disfruta de ella como tu quieras.', 2, 95.00, 7, 4, 5, 2, 30.00, '2023-12-16 14:42:31', '2023-12-16 14:42:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cabanas_has_servicios`
--

CREATE TABLE `cabanas_has_servicios` (
  `id` bigint UNSIGNED NOT NULL,
  `cabana` bigint UNSIGNED NOT NULL,
  `servicio` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cabanas_has_servicios`
--

INSERT INTO `cabanas_has_servicios` (`id`, `cabana`, `servicio`) VALUES
(1, 1, 2),
(2, 1, 3),
(3, 2, 3),
(4, 2, 1),
(5, 3, 2),
(7, 4, 2),
(8, 5, 2),
(9, 6, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` bigint UNSIGNED NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `identificacion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `id` bigint UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mensaje` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `id` bigint UNSIGNED NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`id`, `imagen`, `nombre`, `created_at`, `updated_at`) VALUES
(1, '1702712745.jpeg', 'Domotepec', '2023-12-16 13:45:45', '2023-12-16 13:45:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galerias`
--

CREATE TABLE `galerias` (
  `id` bigint UNSIGNED NOT NULL,
  `empresa` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sucursal` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ubicacion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id` bigint UNSIGNED NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cabana` int NOT NULL,
  `clase` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id`, `imagen`, `cabana`, `clase`, `created_at`, `updated_at`) VALUES
(1, 'imagen_0_1702713601.png', 1, 1, '2023-12-16 13:52:24', '2023-12-16 14:00:01'),
(2, 'imagen_1_1702713601.png', 1, 2, '2023-12-16 13:52:24', '2023-12-16 14:00:01'),
(3, 'imagen_2_1702713601.png', 1, 3, '2023-12-16 13:52:24', '2023-12-16 14:00:01'),
(4, 'imagen_3_1702713601.png', 1, 4, '2023-12-16 13:52:24', '2023-12-16 14:00:01'),
(5, 'imagen_4_1702713601.png', 1, 5, '2023-12-16 13:52:24', '2023-12-16 14:00:01'),
(6, 'imagen_5_1702713601.png', 1, 6, '2023-12-16 13:52:24', '2023-12-16 14:00:01'),
(7, 'imagen_0_1702713859.png', 2, 1, '2023-12-16 14:02:22', '2023-12-16 14:04:19'),
(8, 'imagen_1_1702713859.png', 2, 2, '2023-12-16 14:02:22', '2023-12-16 14:04:19'),
(9, 'imagen_2_1702713859.png', 2, 3, '2023-12-16 14:02:22', '2023-12-16 14:04:19'),
(10, 'imagen_3_1702713859.png', 2, 4, '2023-12-16 14:02:22', '2023-12-16 14:04:19'),
(11, 'imagen_4_1702713859.png', 2, 5, '2023-12-16 14:02:22', '2023-12-16 14:04:19'),
(12, 'imagen_5_1702713859.png', 2, 6, '2023-12-16 14:02:22', '2023-12-16 14:04:19'),
(13, 'imagen_0_1702714247.png', 3, 1, '2023-12-16 14:08:35', '2023-12-16 14:10:47'),
(14, 'imagen_1_1702714247.png', 3, 2, '2023-12-16 14:08:35', '2023-12-16 14:10:47'),
(15, 'imagen_2_1702714247.png', 3, 3, '2023-12-16 14:08:35', '2023-12-16 14:10:47'),
(16, 'imagen_3_1702714247.png', 3, 4, '2023-12-16 14:08:35', '2023-12-16 14:10:47'),
(17, 'imagen_4_1702714247.png', 3, 5, '2023-12-16 14:08:35', '2023-12-16 14:10:47'),
(18, 'imagen_5_1702714247.png', 3, 6, '2023-12-16 14:08:35', '2023-12-16 14:10:47'),
(19, NULL, 4, 1, '2023-12-16 14:13:59', '2023-12-16 14:13:59'),
(20, 'imagen_1_1702714667.png', 4, 2, '2023-12-16 14:13:59', '2023-12-16 14:17:47'),
(21, 'imagen_2_1702714667.png', 4, 3, '2023-12-16 14:13:59', '2023-12-16 14:17:47'),
(22, 'imagen_3_1702714667.png', 4, 4, '2023-12-16 14:13:59', '2023-12-16 14:17:47'),
(23, 'imagen_4_1702714667.png', 4, 5, '2023-12-16 14:13:59', '2023-12-16 14:17:47'),
(24, 'imagen_5_1702714667.png', 4, 6, '2023-12-16 14:13:59', '2023-12-16 14:17:47'),
(25, 'imagen_0_1702715542.png', 5, 1, '2023-12-16 14:30:34', '2023-12-16 14:32:22'),
(26, 'imagen_1_1702715542.png', 5, 2, '2023-12-16 14:30:34', '2023-12-16 14:32:22'),
(27, 'imagen_2_1702715542.png', 5, 3, '2023-12-16 14:30:34', '2023-12-16 14:32:22'),
(28, 'imagen_3_1702715542.png', 5, 4, '2023-12-16 14:30:34', '2023-12-16 14:32:22'),
(29, 'imagen_4_1702715542.png', 5, 5, '2023-12-16 14:30:34', '2023-12-16 14:32:22'),
(30, 'imagen_5_1702715542.png', 5, 6, '2023-12-16 14:30:34', '2023-12-16 14:32:22'),
(31, 'imagen_0_1702716574.png', 6, 1, '2023-12-16 14:42:31', '2023-12-16 14:49:34'),
(32, 'imagen_1_1702716574.png', 6, 2, '2023-12-16 14:42:31', '2023-12-16 14:49:34'),
(33, 'imagen_2_1702716574.png', 6, 3, '2023-12-16 14:42:31', '2023-12-16 14:49:34'),
(34, 'imagen_3_1702716574.png', 6, 4, '2023-12-16 14:42:31', '2023-12-16 14:49:34'),
(35, 'imagen_4_1702716574.png', 6, 5, '2023-12-16 14:42:31', '2023-12-16 14:49:34'),
(36, 'imagen_5_1702716574.png', 6, 6, '2023-12-16 14:42:31', '2023-12-16 14:49:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_11_15_234711_create_permission_tables', 1),
(6, '2023_11_16_020044_create_cabaña_table', 1),
(7, '2023_11_16_020115_create_cliente_table', 1),
(8, '2023_11_16_020335_create_reserva_table', 1),
(9, '2023_11_16_020425_create_servicio_table', 1),
(10, '2023_11_16_020534_create_sucursal_table', 1),
(11, '2023_11_16_020632_create_galerias_table', 1),
(12, '2023_11_16_020703_create_empresas_table', 1),
(13, '2023_11_16_020726_create_contacto_table', 1),
(14, '2023_11_16_020754_create_bienes_table', 1),
(15, '2023_11_16_020755_create_ser_hab_table', 1),
(16, '2023_11_16_020820_create_reservas_adm_table', 1),
(17, '2023_11_16_020840_create_imagenes_table', 1),
(18, '2023_12_06_204958_create_cabañas_has_servicios_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `description`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'home', 'Ver Dashboard', 'web', '2023-12-16 13:44:57', '2023-12-16 13:44:57'),
(2, 'modulos', 'Ver Modulos', 'web', '2023-12-16 13:44:57', '2023-12-16 13:44:57'),
(3, 'perfil', 'Ver Perfil', 'web', '2023-12-16 13:44:57', '2023-12-16 13:44:57'),
(4, 'users.index', 'Ver Usuarios', 'web', '2023-12-16 13:44:57', '2023-12-16 13:44:57'),
(5, 'users.create', 'Crear Usuarios', 'web', '2023-12-16 13:44:57', '2023-12-16 13:44:57'),
(6, 'users.edit', 'Editar Usuarios', 'web', '2023-12-16 13:44:57', '2023-12-16 13:44:57'),
(7, 'users.destroy', 'Eliminar Usuarios', 'web', '2023-12-16 13:44:57', '2023-12-16 13:44:57'),
(8, 'cabanas.index', 'Ver Cabanas', 'web', '2023-12-16 13:44:57', '2023-12-16 13:44:57'),
(9, 'cabanas.create', 'Crear Cabanas', 'web', '2023-12-16 13:44:57', '2023-12-16 13:44:57'),
(10, 'cabanas.edit', 'Editar Cabanas', 'web', '2023-12-16 13:44:57', '2023-12-16 13:44:57'),
(11, 'cabanas.destroy', 'Eliminar Cabanas', 'web', '2023-12-16 13:44:57', '2023-12-16 13:44:57'),
(12, 'empresas.index', 'Ver Empresas', 'web', '2023-12-16 13:44:57', '2023-12-16 13:44:57'),
(13, 'empresas.create', 'Crear Empresas', 'web', '2023-12-16 13:44:57', '2023-12-16 13:44:57'),
(14, 'empresas.edit', 'Editar Empresas', 'web', '2023-12-16 13:44:57', '2023-12-16 13:44:57'),
(15, 'empresas.destroy', 'Eliminar Empresas', 'web', '2023-12-16 13:44:57', '2023-12-16 13:44:57'),
(16, 'sucursales.index', 'Ver Sucursales', 'web', '2023-12-16 13:44:57', '2023-12-16 13:44:57'),
(17, 'sucursales.create', 'Crear Sucursales', 'web', '2023-12-16 13:44:57', '2023-12-16 13:44:57'),
(18, 'sucursales.edit', 'Editar Sucursales', 'web', '2023-12-16 13:44:57', '2023-12-16 13:44:57'),
(19, 'sucursales.destroy', 'Eliminar Sucursales', 'web', '2023-12-16 13:44:57', '2023-12-16 13:44:57'),
(20, 'servicios.index', 'Ver Servicios', 'web', '2023-12-16 13:44:57', '2023-12-16 13:44:57'),
(21, 'servicios.create', 'Crear Servicios', 'web', '2023-12-16 13:44:58', '2023-12-16 13:44:58'),
(22, 'servicios.edit', 'Editar Servicios', 'web', '2023-12-16 13:44:58', '2023-12-16 13:44:58'),
(23, 'servicios.destroy', 'Eliminar Servicios', 'web', '2023-12-16 13:44:58', '2023-12-16 13:44:58'),
(24, 'bienes.index', 'Ver Bienes', 'web', '2023-12-16 13:44:58', '2023-12-16 13:44:58'),
(25, 'bienes.create', 'Crear Bienes', 'web', '2023-12-16 13:44:58', '2023-12-16 13:44:58'),
(26, 'bienes.edit', 'Editar Bienes', 'web', '2023-12-16 13:44:58', '2023-12-16 13:44:58'),
(27, 'bienes.destroy', 'Eliminar Bienes', 'web', '2023-12-16 13:44:58', '2023-12-16 13:44:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `id` bigint UNSIGNED NOT NULL,
  `cliente` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` bigint NOT NULL,
  `cabana` bigint UNSIGNED NOT NULL,
  `ingreso` date NOT NULL,
  `egreso` date NOT NULL,
  `costo` double(8,2) NOT NULL,
  `huespedes` bigint UNSIGNED NOT NULL,
  `estado` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`id`, `cliente`, `email`, `telefono`, `cabana`, `ingreso`, `egreso`, `costo`, `huespedes`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Leonel Cortez', 'armand1515.lc@gmail.com', 50360043157, 1, '2023-12-17', '2023-12-18', 144.00, 2, 3, '2023-12-16 14:59:19', '2023-12-16 15:02:37'),
(2, 'Javier Moran', 'Javilop@gmail.com', 50367895847, 2, '2023-12-18', '2023-12-21', 372.00, 3, 2, '2023-12-16 15:00:30', '2023-12-16 15:04:39'),
(3, 'Victor Daniel', 'Daniel2000@gmail.com', 50376895674, 3, '2023-12-27', '2023-12-29', 258.00, 2, 1, '2023-12-16 15:04:01', '2023-12-16 15:04:01'),
(4, 'Jonathan Orellana', 'JonathanOrellana@gmail.com', 50378964562, 5, '2023-12-26', '2023-12-28', 258.00, 2, 2, '2023-12-16 15:07:03', '2023-12-16 15:07:40'),
(5, 'Raul Cortez', 'Raul@gmail.com', 50389771233, 4, '2023-12-21', '2023-12-26', 600.00, 1, 3, '2023-12-16 15:09:15', '2023-12-16 15:09:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas_adm`
--

CREATE TABLE `reservas_adm` (
  `id` bigint UNSIGNED NOT NULL,
  `id_cliente` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_empresa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_sucursal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_cabaña` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `fecha_salida` date NOT NULL,
  `n_personas` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'SuperAdministrador', 'web', '2023-12-16 13:44:57', '2023-12-16 13:44:57'),
(2, 'Administrador', 'web', '2023-12-16 13:44:57', '2023-12-16 13:44:57'),
(3, 'Cliente', 'web', '2023-12-16 13:44:57', '2023-12-16 13:44:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(6, 2),
(8, 2),
(10, 2),
(12, 2),
(14, 2),
(16, 2),
(18, 2),
(20, 2),
(22, 2),
(24, 2),
(26, 2),
(1, 3),
(3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id` bigint UNSIGNED NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `costo` decimal(13,2) NOT NULL,
  `empresa` int NOT NULL,
  `sucursal` int NOT NULL,
  `estado` int NOT NULL,
  `stock` int DEFAULT NULL,
  `descripcion` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id`, `imagen`, `nombre`, `costo`, `empresa`, `sucursal`, `estado`, `stock`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, '1702716859.jpg', 'Cayac', 20.00, 1, 1, 1, 2, 'Cayac con equipo incluido', '2023-12-16 14:54:20', '2023-12-16 14:54:20'),
(2, '1702716945.png', 'Canopie', 5.00, 1, 2, 1, 10, 'Canopie extremo de 200 metros de largo', '2023-12-16 14:55:46', '2023-12-16 14:55:46'),
(3, '1702717055.png', 'Pesca', 25.00, 1, 1, 1, 5, 'Pesca a orilla del lago o en lancha, con equipo incluido', '2023-12-16 14:57:35', '2023-12-16 14:57:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ser_hab`
--

CREATE TABLE `ser_hab` (
  `id` bigint UNSIGNED NOT NULL,
  `bien` bigint UNSIGNED DEFAULT NULL,
  `servicio` bigint UNSIGNED DEFAULT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `cabana` bigint UNSIGNED NOT NULL,
  `cliente` bigint UNSIGNED NOT NULL,
  `reserva` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

CREATE TABLE `sucursal` (
  `id` bigint UNSIGNED NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `empresa` int NOT NULL,
  `direccion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gerente` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sucursal`
--

INSERT INTO `sucursal` (`id`, `imagen`, `nombre`, `empresa`, `direccion`, `telefono`, `gerente`, `created_at`, `updated_at`) VALUES
(1, '1702712821.png', 'Ilopango', 1, 'Lago de Ilopango', '+503 6004 3157', 'Daniel', '2023-12-16 13:47:01', '2023-12-16 13:47:01'),
(2, '1702712935.png', 'Cabañas', 1, 'Cabañas', '+503 6004 3157', 'Leonel', '2023-12-16 13:48:56', '2023-12-16 13:48:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombres` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apellidos` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dui` int DEFAULT NULL,
  `telefono` bigint DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `img`, `name`, `nombres`, `apellidos`, `dui`, `telefono`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 'administrador', 'Leonel Armando', 'Garcia Cortez', 59240267, 50360043157, 'admin@admin.com', NULL, '$2y$10$JKqK6j2tUSFoNfGG.NXC/OZOcGTPRqNQT6zM5zwWqFTEOD2jcGUM.', NULL, '2023-12-16 13:44:58', '2023-12-16 13:44:58');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bienes`
--
ALTER TABLE `bienes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cabanas`
--
ALTER TABLE `cabanas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cabanas_has_servicios`
--
ALTER TABLE `cabanas_has_servicios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cabanas_has_servicios_cabana_foreign` (`cabana`),
  ADD KEY `cabanas_has_servicios_servicio_foreign` (`servicio`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `galerias`
--
ALTER TABLE `galerias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reserva_cabana_foreign` (`cabana`);

--
-- Indices de la tabla `reservas_adm`
--
ALTER TABLE `reservas_adm`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ser_hab`
--
ALTER TABLE `ser_hab`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ser_hab_bien_foreign` (`bien`),
  ADD KEY `ser_hab_servicio_foreign` (`servicio`),
  ADD KEY `ser_hab_cabana_foreign` (`cabana`),
  ADD KEY `ser_hab_cliente_foreign` (`cliente`),
  ADD KEY `ser_hab_reserva_foreign` (`reserva`);

--
-- Indices de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_name_unique` (`name`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_dui_unique` (`dui`),
  ADD UNIQUE KEY `users_telefono_unique` (`telefono`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bienes`
--
ALTER TABLE `bienes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cabanas`
--
ALTER TABLE `cabanas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `cabanas_has_servicios`
--
ALTER TABLE `cabanas_has_servicios`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `galerias`
--
ALTER TABLE `galerias`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `reservas_adm`
--
ALTER TABLE `reservas_adm`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ser_hab`
--
ALTER TABLE `ser_hab`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cabanas_has_servicios`
--
ALTER TABLE `cabanas_has_servicios`
  ADD CONSTRAINT `cabanas_has_servicios_cabana_foreign` FOREIGN KEY (`cabana`) REFERENCES `cabanas` (`id`),
  ADD CONSTRAINT `cabanas_has_servicios_servicio_foreign` FOREIGN KEY (`servicio`) REFERENCES `servicios` (`id`);

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_cabana_foreign` FOREIGN KEY (`cabana`) REFERENCES `cabanas` (`id`);

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `ser_hab`
--
ALTER TABLE `ser_hab`
  ADD CONSTRAINT `ser_hab_bien_foreign` FOREIGN KEY (`bien`) REFERENCES `bienes` (`id`),
  ADD CONSTRAINT `ser_hab_cabana_foreign` FOREIGN KEY (`cabana`) REFERENCES `cabanas` (`id`),
  ADD CONSTRAINT `ser_hab_cliente_foreign` FOREIGN KEY (`cliente`) REFERENCES `cliente` (`id`),
  ADD CONSTRAINT `ser_hab_reserva_foreign` FOREIGN KEY (`reserva`) REFERENCES `reserva` (`id`),
  ADD CONSTRAINT `ser_hab_servicio_foreign` FOREIGN KEY (`servicio`) REFERENCES `servicios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
