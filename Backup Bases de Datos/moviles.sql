-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-06-2019 a las 15:57:47
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `moviles`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(134, '2014_10_12_000000_create_users_table', 1),
(135, '2014_10_12_100000_create_password_resets_table', 1),
(136, '2019_04_05_100855_create_roles_table', 1),
(137, '2019_04_05_102101_create_role_user_table', 1),
(138, '2019_04_05_151750_create_ranges_table', 1),
(139, '2019_04_05_151751_create_phones_table', 1),
(140, '2019_04_05_151818_create_opinions_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opinions`
--

CREATE TABLE `opinions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cantidad` int(11) NOT NULL DEFAULT '0',
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `opinions`
--

INSERT INTO `opinions` (`id`, `nombre`, `cantidad`, `url`, `phone_id`, `created_at`, `updated_at`) VALUES
(1, 'Computerhoy.com', 172, 'https://www.xataka.com/analisis/samsung-galaxy-note-4-analisis#comments', 1, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(2, 'Asociación Banda-Arguello', 296, 'http://www.arevalo.com/', 6, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(3, 'Meza de Cobo', 12, 'http://www.zapata.es/', 1, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(4, 'Sandoval de Hidalgo y Flia.', 190, 'https://villalpando.es/sit-ut-voluptatem-ipsam-accusantium.html', 1, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(5, 'Corporación Matos-Bustos', 40, 'http://briones.es/recusandae-magnam-voluptatibus-provident-vel-qui-voluptatem-quaerat.html', 5, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(6, 'Air Lomeli', 367, 'http://osorio.com.es/ea-quia-alias-quasi-et-minus.html', 8, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(7, 'Alvarado, Garrido y Andreu e Hijos', 375, 'http://blazquez.com/officiis-odit-in-quis-temporibus-velit-est', 1, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(8, 'Corporación Salvador', 450, 'http://peralta.com/provident-consequuntur-illum-voluptatem-modi', 1, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(11, 'Salcedo, López y García SA', 390, 'http://tafoya.es/odio-quo-quia-aut-et-rem-mollitia.html', 5, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(12, 'Global Farías e Hija', 347, 'https://arellano.es/rerum-molestiae-commodi-labore-odit.html', 8, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(13, 'Segovia de Cabrera SA', 240, 'http://www.soria.es/aspernatur-quidem-similique-ut-beatae-consectetur-deserunt.html', 2, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(14, 'Mireles y Lázaro', 455, 'http://valdez.com/libero-voluptate-aut-iure', 1, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(16, 'Canales-Orozco', 155, 'http://www.candelaria.org/dolores-perspiciatis-cum-sit-quam-occaecati.html', 1, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(17, 'Empresa Rodríguez e Hijos', 135, 'https://www.franco.com/impedit-eligendi-sed-et-expedita-accusamus-placeat-omnis', 2, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(18, 'Cepeda, Rodarte y Fierro e Hijo', 145, 'http://www.font.es/illum-voluptas-reprehenderit-nihil-nihil-voluptatem-ipsum-odit-consequatur', 8, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(19, 'Asociación Aragón-Ramírez', 448, 'http://www.manzano.com/quia-itaque-totam-accusantium-ratione', 2, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(20, 'Luque-Carrión e Hija', 393, 'http://lucas.es/voluptates-sed-sed-eveniet-quos', 1, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(21, 'Leal y Abrego S. de H.', 47, 'https://www.aviles.es/voluptas-cupiditate-numquam-aut-minus-ea-aliquid', 1, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(22, 'Cornejo-Ramírez y Flia.', 363, 'http://casas.com/', 8, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(24, 'Suárez, Tafoya y Herrero e Hijo', 55, 'http://www.roque.com.es/eveniet-saepe-libero-quos-nobis-explicabo-reiciendis-necessitatibus.html', 2, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(25, 'Perales, Antón y Amador S. de H.', 375, 'http://madrid.net/et-nam-adipisci-cumque-ullam-et-voluptatem.html', 2, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(27, 'Miranda, Gómez y Gaytán y Asoc.', 316, 'http://www.carrera.com/', 1, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(28, 'Ureña y Centeno y Asoc.', 385, 'http://www.longoria.org/quaerat-sequi-vel-asperiores.html', 1, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(29, 'Huerta de Gómez', 18, 'http://www.bustos.com/', 8, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(31, 'Centro Espinoza-Palomino', 50, 'http://www.oquendo.com.es/neque-iusto-sequi-aut-ea.html', 1, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(32, 'Millán-Páez', 37, 'http://robledo.org/exercitationem-dignissimos-velit-nemo-autem-quam', 8, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(33, 'Asociación Ballesteros', 457, 'http://delao.es/placeat-sunt-repellat-tempore-nihil-delectus-voluptatum-architecto-quos.html', 8, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(34, 'Negrón, Alarcón y Gallegos SRL', 5, 'https://trujillo.org/fuga-ad-dolorem-qui-vel.html', 4, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(35, 'Agosto-Ocampo e Hijos', 493, 'https://coronado.com.es/quam-doloribus-quia-ut-cum-dolorum.html', 5, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(36, 'Perea de Hinojosa', 151, 'http://crespo.com/', 6, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(37, 'Expósito y Barrios', 215, 'http://mena.es/magni-nihil-omnis-voluptatem-repellendus-dolor-exercitationem-reiciendis', 1, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(38, 'Rosas-Portillo', 388, 'http://www.cortez.org/', 8, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(39, 'Global Peña-Muro', 153, 'http://arana.com/necessitatibus-harum-consequatur-commodi-porro-officiis-sit', 2, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(40, 'Gestora Ontiveros', 310, 'https://saenz.org/ut-cumque-omnis-voluptas-perferendis-odit-impedit-assumenda-sunt.html', 5, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(41, 'Galván y Barrientos y Flia.', 241, 'https://www.melendez.com/cum-optio-aperiam-sit-saepe', 1, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(42, 'Puga de Calero y Flia.', 340, 'http://www.cruz.es/ut-qui-quibusdam-iste-mollitia-corrupti-accusantium.html', 3, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(44, 'Romero y Henríquez', 442, 'http://www.figueroa.org/sit-dolore-magnam-id-dolor-soluta-quos-molestiae', 1, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(45, 'Corporación Zúñiga e Hijo', 494, 'http://mendez.com/labore-voluptatum-quia-sed-voluptas-veritatis.html', 3, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(47, 'Air Villagómez', 256, 'https://pastor.net/quis-perferendis-eaque-sequi-a-iure-vero-culpa.html', 3, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(48, 'Gestora Parra', 497, 'http://www.reyes.org/', 4, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(49, 'Reina y Puig e Hijos', 120, 'https://segovia.com/ipsa-id-ut-quisquam-deleniti-iste.html', 6, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(50, 'Grupo Naranjo S. de H.', 178, 'https://www.villagomez.com/minima-numquam-et-corrupti-eveniet', 6, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(51, 'Alfonso y Rueda', 10, 'http://www.santos.es/', 3, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(52, 'https://www.phonehouse.es', 7, 'https://www.phonehouse.es/movil/apple/iphone-7-32gb/opiniones.html', 9, '2019-04-29 13:19:54', '2019-04-29 13:19:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `phones`
--

CREATE TABLE `phones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `modelo` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urlfoto` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valoracion` int(11) NOT NULL DEFAULT '0',
  `range_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `phones`
--

INSERT INTO `phones` (`id`, `modelo`, `urlfoto`, `valoracion`, `range_id`, `created_at`, `updated_at`) VALUES
(1, 'Samsung Galaxy note 4', 'https://images-na.ssl-images-amazon.com/images/I/A1fEs3xq8NL._SL1500_.jpg', 8, 4, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(2, 'Samsung Galaxy S-5 2015', 'https://www.movilzona.es/app/uploads/2018/10/Samsung-Galaxy-S5-grande.png', 10, 2, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(3, 'Nokia Lumia 1320', 'https://images-na.ssl-images-amazon.com/images/I/61ASikC8mEL._SL1000_.jpg', 7, 3, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(4, 'Xiaomi My Play', 'https://www.xiaomi-shop.es/media/catalog/product/cache/1/thumbnail/600x/17f82f742ffe127f42dca9de82fb58b1/x/i/xiaomi-mi-play-negro.png', 8, 3, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(5, 'LG Leon 2015', 'https://images-na.ssl-images-amazon.com/images/I/71YNYI3YZEL._SL1500_.jpg', 8, 4, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(6, 'IPhone 6', 'https://images-na.ssl-images-amazon.com/images/I/41slW0c5zEL._SL500_AA300_.jpg', 9, 5, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(8, 'Xiaomi mi 9', 'https://www.xiaomi-shop.es/media/catalog/product/cache/1/thumbnail/600x/17f82f742ffe127f42dca9de82fb58b1/x/i/xiaomi-mi-9-lila-128.png', 9, 5, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(9, 'Iphone 7', 'https://encrypted-tbn0.gstatic.com/shopping?q=tbn:ANd9GcQugrivm7ubGkmZGi4GIROBYbuzTxY8xauca30BHC0wMxEr-KdEyA&usqp=CAc', 9, 3, '2019-04-29 13:18:48', '2019-04-29 13:18:48'),
(10, 'Xiaomi Redmi 6A', 'https://images-na.ssl-images-amazon.com/images/I/413V18jDleL.jpg', 8, 3, '2019-04-29 13:28:07', '2019-04-29 13:28:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ranges`
--

CREATE TABLE `ranges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rango` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ranges`
--

INSERT INTO `ranges` (`id`, `rango`, `created_at`, `updated_at`) VALUES
(1, '0-10', '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(2, '10-50', '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(3, '50-100', '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(4, '100-1000', '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(5, '>1000', '2019-04-12 12:01:39', '2019-04-12 12:01:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'SuperAdministrador', '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(2, 'admin', 'Administrator', '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(3, 'user', 'User', '2019-04-12 12:01:39', '2019-04-12 12:01:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(2, 2, 1, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(3, 2, 2, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(4, 3, 3, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(5, 3, 4, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(6, 3, 5, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(7, 3, 6, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(8, 3, 7, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(9, 3, 8, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(10, 3, 9, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(11, 3, 10, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(12, 3, 11, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(13, 3, 12, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(14, 3, 13, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(15, 3, 14, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(16, 3, 15, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(17, 3, 16, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(18, 3, 17, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(19, 3, 18, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(20, 3, 19, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(21, 3, 20, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(22, 3, 21, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(23, 3, 22, '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(24, 3, 23, '2019-04-29 13:17:54', '2019-04-29 13:17:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Karlos Perdiguero Otxoa', 'jc.perdiguerocarlos@gmail.com', '2019-04-12 12:01:39', '$2y$10$30FGM8P563Z9eal33NmGxuffB1kSAunvI64J8AnIQT9ZmNUFVtSa.', 'Y5HfPBzqbHdp5yTJ4It5ihcB9KWIX74c9VlczU8HEqJ1L3dolEPczV81ilVQ', '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(2, 'Asier Perdiguero Urretabizkaia', 'asier.perdiguerourreta@gmail.com', '2019-04-12 12:01:39', '$2y$10$5behxPrdHbWf0/WCCq0U6eQfznZwWSvxeoth.zasVfoz5h40luW.2', 'wpEGGrhci9', '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(3, 'Sra. Andrea Alba', 'rubio.andrea@example.net', '2019-04-12 12:01:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Q2boMUAmU5', '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(4, 'Eva Bermejo', 'rzarate@example.com', '2019-04-12 12:01:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'DZexEp3A9K', '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(5, 'Lic. Diego Rendón', 'montenegro.ismael@example.org', '2019-04-12 12:01:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ry8VTIX6rX', '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(6, 'Iker Covarrubias', 'oscar67@example.org', '2019-04-12 12:01:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'JItcRe3GXb', '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(7, 'Dr. Lara Muro', 'paula.gutierrez@example.org', '2019-04-12 12:01:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '6xVLtohVr4', '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(8, 'Paula Pineda', 'santamaria.marina@example.org', '2019-04-12 12:01:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'xvX5mcMfXN', '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(9, 'Helena Amaya', 'rquintanilla@example.org', '2019-04-12 12:01:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'wq00zqzth3', '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(10, 'Carlos Zúñiga', 'lerma.cristina@example.com', '2019-04-12 12:01:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'hlqJ2wGqHn', '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(11, 'Samuel Navarrete', 'nora.villa@example.com', '2019-04-12 12:01:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'phIcSzw5x7', '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(12, 'Jimena Deleón Segundo', 'unajera@example.org', '2019-04-12 12:01:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '1ulvGkAqXi', '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(13, 'Jesús Pineda', 'cedillo.patricia@example.com', '2019-04-12 12:01:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'BC2kJS27de', '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(14, 'Asier Montoya', 'fatima.florez@example.com', '2019-04-12 12:01:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'znO5NMohXJ', '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(15, 'Ainara Cisneros', 'limon.joan@example.net', '2019-04-12 12:01:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'y4xyxM3tiZ', '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(16, 'Iker Blázquez', 'irizarry.paola@example.org', '2019-04-12 12:01:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'JlOmrDzeXB', '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(17, 'Aaron Carbajal', 'mar56@example.com', '2019-04-12 12:01:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Nw0ZM3OIiK', '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(18, 'Rodrigo Vargas', 'pedroza.naia@example.net', '2019-04-12 12:01:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'SuyOLwjrDQ', '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(19, 'Dn. Mateo Arteaga Tercero', 'tdeanda@example.net', '2019-04-12 12:01:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'UETcjeuKtI', '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(20, 'Ing. Teresa Velázquez', 'chapa.unai@example.net', '2019-04-12 12:01:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Xycwov00Jv', '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(21, 'Mateo Redondo', 'burgos.ian@example.com', '2019-04-12 12:01:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0lD4JWuW4L', '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(22, 'Adriana Mondragón Tercero', 'jesus.alaniz@example.net', '2019-04-12 12:01:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'QlulkZEOBZ', '2019-04-12 12:01:39', '2019-04-12 12:01:39'),
(23, 'Santiago', 'santi@gmail.com', NULL, '$2y$10$PSvEEpad76LJ6XoIpQ95IeTMBdvXnlzU5u.RC6ktWEdjm5WN/XjbO', NULL, '2019-04-29 13:17:54', '2019-04-29 13:17:54'),
(24, 'asier', 'asier@hotmail.es', NULL, '$2y$10$r9.s0UGM4qo4pMW98C67LewZyHRdL/PROMgjVqil8b7w8E/dcwmqq', NULL, '2019-05-23 12:50:56', '2019-05-23 12:50:56');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `opinions`
--
ALTER TABLE `opinions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `opinions_phone_id_foreign` (`phone_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `phones`
--
ALTER TABLE `phones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phones_range_id_foreign` (`range_id`);

--
-- Indices de la tabla `ranges`
--
ALTER TABLE `ranges`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT de la tabla `opinions`
--
ALTER TABLE `opinions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `phones`
--
ALTER TABLE `phones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `ranges`
--
ALTER TABLE `ranges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `opinions`
--
ALTER TABLE `opinions`
  ADD CONSTRAINT `opinions_phone_id_foreign` FOREIGN KEY (`phone_id`) REFERENCES `phones` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `phones`
--
ALTER TABLE `phones`
  ADD CONSTRAINT `phones_range_id_foreign` FOREIGN KEY (`range_id`) REFERENCES `ranges` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
