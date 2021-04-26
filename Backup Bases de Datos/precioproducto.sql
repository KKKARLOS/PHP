-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-06-2019 a las 15:58:24
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
-- Base de datos: `precioproducto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ads`
--

CREATE TABLE `ads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `web_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `precio_vta` int(11) NOT NULL DEFAULT '0',
  `precio_chollo` int(11) NOT NULL DEFAULT '0',
  `precio_alto` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ads`
--

INSERT INTO `ads` (`id`, `category_id`, `web_id`, `user_id`, `title`, `url`, `foto`, `precio_vta`, `precio_chollo`, `precio_alto`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'SATUR NEW RAGLAN R T S\\S - Camiseta estampada', 'https://mosaic03.ztat.net/vgs/media/pdp-zoom/GS/12/2O/0G/WA/11/GS122O0GW-A11@9.jpg', 'https://mosaic03.ztat.net/vgs/media/pdp-zoom/PU/14/1E/09/SC/11/PU141E09S-C11@10.jpg', 30, 15, 40, '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(2, 1, 1, 1, 'PHANTOM ACADEMY IC - Botas de fútbol sin tacos', 'https://www.zalando.es/nike-performance-phantom-academy-ic-botas-de-futbol-sin-tacos-bright-crimsonblackmetallic-silver-n1242a1mf-g11.html', 'https://mosaic03.ztat.net/vgs/media/packshot/pdp-zoom/N1/24/2A/1M/FG/11/N1242A1MF-G11@4.jpg', 80, 55, 110, '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(3, 5, 4, 5, 'Grupo Núñez SA', 'http://www.delrio.com/', 'https://lorempixel.com/50/50/?13805', 262, 1185, 5781, '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(4, 15, 3, 13, 'Navarro y Valero', 'http://www.zelaya.org/adipisci-earum-ut-laborum.html', 'https://lorempixel.com/50/50/?26941', 359, 3286, 7878, '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(5, 22, 17, 22, 'Empresa Ramón', 'http://www.alonzo.es/quia-architecto-expedita-dolorem-quia-voluptatem-modi', 'https://lorempixel.com/50/50/?57196', 313, 4249, 6969, '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(6, 15, 17, 9, 'Corporación Plaza-Millán', 'http://campos.com/reiciendis-commodi-et-ab-commodi-voluptatem-quibusdam-perferendis-suscipit', 'https://lorempixel.com/50/50/?72922', 419, 3429, 7515, '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(7, 28, 19, 1, 'Empresa Delvalle', 'https://www.arriaga.com/neque-voluptatem-suscipit-animi-voluptates-fuga', 'https://lorempixel.com/50/50/?14869', 7, 1417, 8162, '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(8, 6, 3, 10, 'Asociación Cabrera', 'http://www.caballero.com/ipsum-repudiandae-aliquid-mollitia-voluptate-cum', 'https://lorempixel.com/50/50/?33757', 467, 2470, 5701, '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(9, 11, 13, 17, 'Empresa Sisneros-Andrés', 'http://escalante.org/adipisci-est-delectus-iusto-rem.html', 'https://lorempixel.com/50/50/?98578', 181, 1953, 6610, '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(10, 8, 8, 11, 'Ocampo, Zavala y Nieto SRL', 'http://lerma.es/consequatur-reiciendis-non-voluptatibus-sit-ad', 'https://lorempixel.com/50/50/?89056', 54, 4083, 7550, '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(11, 10, 2, 22, 'Orta y Pérez', 'http://www.luevano.es/', 'https://lorempixel.com/50/50/?20087', 374, 3195, 8195, '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(12, 22, 10, 12, 'Loya-Piña S. de H.', 'http://renteria.com/libero-magni-repudiandae-occaecati-ut', 'https://lorempixel.com/50/50/?81783', 65, 4641, 8289, '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(13, 21, 19, 9, 'Guillen y Avilés', 'https://www.lerma.org/inventore-hic-pariatur-suscipit', 'https://lorempixel.com/50/50/?47343', 256, 1708, 5230, '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(14, 10, 14, 8, 'Asociación Henríquez y Flia.', 'http://avalos.com.es/fugiat-ut-voluptatem-autem-dolorum-minus-ut-nemo-rerum', 'https://lorempixel.com/50/50/?10713', 215, 2152, 8298, '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(15, 14, 1, 9, 'Figueroa de Parra', 'http://ramirez.org/iste-vel-voluptatem-ut-reiciendis-ut-aspernatur-illo', 'https://lorempixel.com/50/50/?74226', 463, 3709, 7763, '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(16, 10, 4, 1, 'Air Ávila', 'http://www.duran.es/voluptate-nobis-reprehenderit-non-eos-sed-quisquam-eligendi.html', 'https://lorempixel.com/50/50/?28757', 48, 1418, 7316, '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(17, 6, 18, 19, 'Laboy de Alonzo y Flia.', 'http://www.carvajal.net/', 'https://lorempixel.com/50/50/?76549', 84, 708, 8091, '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(18, 6, 10, 21, 'Álvarez-Calero', 'https://www.barela.com/aut-qui-natus-sint-consequatur-quae-tenetur-consequatur', 'https://lorempixel.com/50/50/?13050', 214, 2739, 7623, '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(19, 27, 18, 21, 'Martí y Henríquez SRL', 'http://www.rey.net/officia-sapiente-at-ab-a-ex-occaecati', 'https://lorempixel.com/50/50/?59648', 256, 3250, 6534, '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(20, 5, 2, 6, 'Arriaga, Montañez y Pérez SA', 'http://ferrer.es/consequatur-numquam-ipsam-necessitatibus-aut-modi', 'https://lorempixel.com/50/50/?77971', 118, 2245, 5729, '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(21, 12, 17, 1, 'Viajes Valladares-Brito', 'http://www.alvarez.com/quia-sunt-deleniti-eveniet-omnis-nam-adipisci-dolores', 'https://lorempixel.com/50/50/?72909', 297, 1031, 7437, '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(22, 7, 20, 9, 'Global Silva', 'http://www.regalado.net/quo-vel-ex-nesciunt-similique-et-sed-perspiciatis.html', 'https://lorempixel.com/50/50/?77359', 121, 2685, 5679, '2019-04-02 13:20:10', '2019-04-02 13:20:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `nombre`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Moda', 'moda.jpg', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(2, 'Juguetes', 'juguetes.jpg', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(3, 'Electrónica', 'electronica.jpg', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(4, 'Inmobiliaria', 'inmobiliaria.gif', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(5, 'Perfumes', 'perfumes.jpg', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(6, 'Libros', 'libros.jpg', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(7, 'Calzado', 'calzado.jpg', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(8, 'Deporte', 'deporte.jpg', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(9, 'Hugo Blasco', 'https://lorempixel.com/50/50/?97660', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(10, 'Naia Rendón', 'https://lorempixel.com/50/50/?95120', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(11, 'Lola Montenegro Hijo', 'https://lorempixel.com/50/50/?54875', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(12, 'Sofía Fernández', 'https://lorempixel.com/50/50/?19133', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(13, 'Ing. Ainara Torres Tercero', 'https://lorempixel.com/50/50/?12664', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(14, 'Lic. Paola Anaya Hijo', 'https://lorempixel.com/50/50/?49532', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(15, 'Francisco Javier Caro', 'https://lorempixel.com/50/50/?51574', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(16, 'Sra. Nerea Matías', 'https://lorempixel.com/50/50/?64322', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(17, 'Dr. Celia Lemus', 'https://lorempixel.com/50/50/?65072', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(18, 'Miguel Zepeda', 'https://lorempixel.com/50/50/?15977', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(19, 'Ing. Aina Mateos', 'https://lorempixel.com/50/50/?87207', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(20, 'Ing. Biel Reina Segundo', 'https://lorempixel.com/50/50/?91942', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(21, 'Gonzalo Gil', 'https://lorempixel.com/50/50/?91003', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(22, 'Srita. Olivia Villaseñor Segundo', 'https://lorempixel.com/50/50/?63317', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(23, 'Lic. Ian Bermejo Tercero', 'https://lorempixel.com/50/50/?95290', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(24, 'Dr. Anna Marrero Tercero', 'https://lorempixel.com/50/50/?23949', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(25, 'Nahia Olivares', 'https://lorempixel.com/50/50/?76534', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(26, 'Andrea Domínquez', 'https://lorempixel.com/50/50/?70491', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(27, 'Nadia Solís', 'https://lorempixel.com/50/50/?50812', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(28, 'Rafael Esquivel', 'https://lorempixel.com/50/50/?80716', '2019-04-02 13:20:10', '2019-04-02 13:20:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ciudad` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pais` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitud` decimal(10,6) DEFAULT NULL,
  `longitud` decimal(10,6) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `locations`
--

INSERT INTO `locations` (`id`, `ciudad`, `pais`, `latitud`, `longitud`, `created_at`, `updated_at`) VALUES
(1, 'San Sebastian', 'España', '43.314714', '-1.972496', '2019-04-02 13:20:11', '2019-04-02 13:20:11'),
(2, 'Madrid', 'España', '40.423282', '-3.710726', '2019-04-02 13:20:11', '2019-04-02 13:20:11'),
(3, 'Barcelona', 'España', '41.387920', '2.169919', '2019-04-02 13:20:11', '2019-04-02 13:20:11'),
(4, 'Sevilla', 'España', '37.382640', '-5.996295', '2019-04-02 13:20:11', '2019-04-02 13:20:11');

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
(282, '2014_10_12_000000_create_users_table', 1),
(283, '2014_10_12_100000_create_password_resets_table', 1),
(284, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(285, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(286, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(287, '2016_06_01_000004_create_oauth_clients_table', 1),
(288, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(289, '2019_03_12_161810_create_categories_table', 1),
(290, '2019_03_13_105805_create_webs_table', 1),
(291, '2019_03_20_152449_create_ads_table', 1),
(292, '2019_03_27_165844_create_roles_table', 1),
(293, '2019_03_27_170053_create_role_user_table', 1),
(294, '2019_04_02_095309_create_locations_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('01c927aa7c1ce51fdc6fa6eea0c99f43360c6904a2394801a4ae08d48f01792818983004e44d01d8', 23, 1, 'Personal Access Token', '[]', 0, '2019-05-23 15:09:11', '2019-05-23 15:09:11', '2020-05-23 17:09:11'),
('03a48f4765dbda3066bc1478bfed034fdfe3c9f8cf8a8b7e59dafa39ed6fb8d4c18cd852fe45d34c', 24, 1, 'Personal Access Token', '[]', 0, '2019-05-23 13:42:19', '2019-05-23 13:42:19', '2020-05-23 15:42:19'),
('092ab28620ad5ac0a82cc38fe43ebce1ceb844be5411713b534b027ddc0540c49537fd5e2db63746', 24, 1, 'Personal Access Token', '[]', 0, '2019-05-23 13:17:26', '2019-05-23 13:17:26', '2020-05-23 15:17:26'),
('1c34ee7c215b5562edf8fecb2298dd0e3cb7b00015bc289928d0774b617aee60b111f95256ae4ea9', 23, 1, 'Personal Access Token', '[]', 0, '2019-05-23 15:08:06', '2019-05-23 15:08:06', '2020-05-23 17:08:06'),
('2786907716e824fceff468d68e5f330c9cc3ff413f454a092f1ceb916a5c199e394a733aa7e5a61f', 24, 1, 'Personal Access Token', '[]', 0, '2019-05-23 13:22:35', '2019-05-23 13:22:35', '2020-05-23 15:22:35'),
('2acb60058852c0ea1747492dbf70dfe3f566d0fb8e26936467b76d5c23bfb9c4362c62a9ddc463a8', 23, 1, 'Personal Access Token', '[]', 0, '2019-05-23 15:10:05', '2019-05-23 15:10:05', '2020-05-23 17:10:05'),
('2dcb0f97b2d22e73e44dd51d0e791ef560cf34d1dab8d32492bb7f6ec34edf2d53135a36fe726f59', 23, 1, 'Personal Access Token', '[]', 0, '2019-05-23 13:07:28', '2019-05-23 13:07:28', '2020-05-23 15:07:28'),
('6eafaae0ee5053ae1828339cc2634947829e95364c570b711fa8e1c70990ac440cbb487a9e1254aa', 24, 1, 'Personal Access Token', '[]', 0, '2019-05-23 13:32:31', '2019-05-23 13:32:31', '2020-05-23 15:32:31'),
('7a71769029278a32f57f11ab11cc45da0a01a732f42baaa3a5f9e7163ad93a1042c86816f8200262', 23, 1, 'Personal Access Token', '[]', 0, '2019-05-23 15:32:18', '2019-05-23 15:32:18', '2020-05-23 17:32:18'),
('7b87b8f69a3afddda6f3f8a7f93c68c235a5f99f42203768bb65abae7dbf4a6cdc0a8fb7682564f7', 24, 1, 'Personal Access Token', '[]', 0, '2019-05-23 13:49:18', '2019-05-23 13:49:18', '2020-05-23 15:49:18'),
('8e185220cb3fd0931ec5f2f11c88b4456b2382a96c052b5cdd2874cd4addd0da3c7c83da2d7f27e1', 23, 1, 'Personal Access Token', '[]', 0, '2019-05-23 15:06:36', '2019-05-23 15:06:36', '2020-05-23 17:06:36'),
('928c6849dc9460902fd28f1a7baa133b4c41bf3864392d45f26db84093fd61b4309ad9a1d2bf46c6', 23, 1, 'Personal Access Token', '[]', 0, '2019-05-23 13:15:34', '2019-05-23 13:15:34', '2020-05-23 15:15:34'),
('a09a1e5b15c5a8b95203964e45f6f689faadaba4266e397733f36fd4cfa44b71766509d14321897e', 24, 1, 'Personal Access Token', '[]', 0, '2019-05-23 13:26:57', '2019-05-23 13:26:57', '2020-05-23 15:26:57'),
('a6d0e2cb1307a3b77a815bc1d5431f996b3cfef20a4cab7d37541fa4b3e10bb31d95555f8bbedb55', 24, 1, 'Personal Access Token', '[]', 0, '2019-05-23 13:37:11', '2019-05-23 13:37:11', '2020-05-23 15:37:11'),
('ab57f0525ec7bee54dd2b82b8304986e2886a702525ed93cbf61bbf0e48335485d45ef8da3c96c28', 23, 1, 'Personal Access Token', '[]', 0, '2019-05-23 15:00:07', '2019-05-23 15:00:07', '2020-05-23 17:00:07'),
('e7cbf3356028d8fad777dff91ca8b2e116db7ddaeef85e6aca665d2163d7b61bc282f0b5d29cab29', 24, 1, 'Personal Access Token', '[]', 0, '2019-05-23 13:34:31', '2019-05-23 13:34:31', '2020-05-23 15:34:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'precioproducto', 'DIjzOo2QFFJ4UWuqMQO9xi4ADjqjshcrYF04PQOo', 'http://localhost', 1, 0, 0, '2019-05-23 13:07:19', '2019-05-23 13:07:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2019-05-23 13:07:19', '2019-05-23 13:07:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'SuperAdministrador', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(2, 'admin', 'Administrator', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(3, 'user', 'User', '2019-04-02 13:20:10', '2019-04-02 13:20:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_user`
--

CREATE TABLE `role_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(2, 2, 1, '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(3, 2, 2, '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(4, 3, 3, '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(5, 3, 4, '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(6, 3, 5, '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(7, 3, 6, '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(8, 3, 7, '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(9, 3, 8, '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(10, 3, 9, '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(11, 3, 10, '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(12, 3, 11, '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(13, 3, 12, '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(14, 3, 13, '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(15, 3, 14, '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(16, 3, 15, '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(17, 3, 16, '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(18, 3, 17, '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(19, 3, 18, '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(20, 3, 19, '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(21, 3, 20, '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(22, 3, 21, '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(23, 3, 22, '2019-04-02 13:20:10', '2019-04-02 13:20:10');

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
(1, 'Karlos Perdiguero Otxoa', 'jc.perdiguerocarlos@gmail.com', '2019-04-02 13:20:10', '$2y$10$oOYAjEmSDjMzn0xNdaX93OeXlz9XvurYxIPlr0Oet6zyHT2W/RGLK', 'W90yUeqsLbllw8ryk9wBH8myrV8DEdiwQKa7McDcRJUWBu6cred2I0AeX8hb', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(2, 'Asier Perdiguero Urretabizkaia', 'asier.perdiguerourreta@gmail.com', '2019-04-02 13:20:10', '$2y$10$0DOtpTopbDROqe.DJyqqJeLRj.xv/ZBbo2OzKOmWZo1yLBmEeY2.2', 'BxlfjGwVOC', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(3, 'Eduardo Pagan', 'agaytan@example.com', '2019-04-02 13:20:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2ixlhKdQif', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(4, 'Miriam Santacruz', 'raul04@example.net', '2019-04-02 13:20:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'nm8wBWsYkz', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(5, 'Nayara Valdés Hijo', 'malave.jesus@example.net', '2019-04-02 13:20:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'UP1P6CaS8a', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(6, 'Lara Juárez', 'wgalindo@example.org', '2019-04-02 13:20:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'b4jHE4WE9v', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(7, 'Óscar Santamaría', 'dvalero@example.org', '2019-04-02 13:20:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'yxns13Mn6q', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(8, 'Zoe Merino', 'alma94@example.com', '2019-04-02 13:20:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'QPC5vquj6Q', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(9, 'Marco Flores', 'juan.eva@example.com', '2019-04-02 13:20:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'HTddiuHAYG', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(10, 'Adam Laboy', 'omendez@example.com', '2019-04-02 13:20:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '6OylGi9Kdq', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(11, 'Ing. Miriam Armas Hijo', 'segovia.juanjose@example.net', '2019-04-02 13:20:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'aziTdDW46u', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(12, 'Arnau Mascareñas', 'mesa.berta@example.com', '2019-04-02 13:20:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'phSfF9gUxo', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(13, 'Srita. Irene Lucero', 'jaime13@example.net', '2019-04-02 13:20:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'GgZx7Kx8E5', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(14, 'Gabriela Lira', 'lmendoza@example.net', '2019-04-02 13:20:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'mD9qidULw9', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(15, 'José Loya', 'anna42@example.net', '2019-04-02 13:20:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'wByBC2tCzT', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(16, 'Paola Cobo', 'cmuniz@example.net', '2019-04-02 13:20:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'xevwEcPFES', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(17, 'Celia Barragán', 'domenech.irene@example.org', '2019-04-02 13:20:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'puROGITxDq', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(18, 'Ing. Isaac Córdoba', 'angel30@example.org', '2019-04-02 13:20:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'P9eikQ6c5I', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(19, 'Mar Narváez', 'gabriel.tijerina@example.com', '2019-04-02 13:20:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'jgEOPriqfm', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(20, 'Sergio Anaya Tercero', 'gdeanda@example.com', '2019-04-02 13:20:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'RYZeqRHU7G', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(21, 'Unai Nájera Hijo', 'jurrutia@example.net', '2019-04-02 13:20:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'p5uKAKO31U', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(22, 'Lucas Villar', 'villa.isaac@example.org', '2019-04-02 13:20:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '3WjWdfOequ', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(23, 'asier', 'asier@hotmail.es', NULL, '$2y$10$23Bdn1si1JXPcvcM56pzkuccuwNPoXfkDHPP7m4wzi5jeO4OsIdeO', NULL, '2019-05-23 13:02:22', '2019-05-23 13:02:22'),
(24, 'Asier Perdiguero Urretabizkaia', 'asierperdi@gmail.com', NULL, '$2y$10$h4QvZ.BlTWh5nMfY5BF4w.09Hx45.lgc7t51A.DIt98PT35N.UPOq', NULL, '2019-05-23 13:17:02', '2019-05-23 13:17:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `webs`
--

CREATE TABLE `webs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `webs`
--

INSERT INTO `webs` (`id`, `nombre`, `url`, `created_at`, `updated_at`) VALUES
(1, 'Zalando', 'https://www.zalando.es', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(2, 'Fotocasa', 'http://www.fotocasa.com', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(3, 'Jugettos', 'www.jugettos.com', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(4, 'Decathlon', 'https://www.decathlon.es/es/', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(5, 'Naia Caldera Tercero', 'http://www.santos.com/sint-voluptatem-ducimus-voluptate-quas', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(6, 'Lic. Álvaro Beltrán Hijo', 'http://www.sierra.es/cum-aut-odio-fuga-et', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(7, 'Nayara Solorio', 'http://www.narvaez.com/omnis-voluptatem-repellendus-enim-culpa-in-non-deserunt-recusandae', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(8, 'Víctor Aguilar', 'http://www.alonzo.org/ex-ut-ipsum-praesentium-ut-facere-repellendus-illo.html', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(9, 'Sra. Julia Yáñez Tercero', 'http://gamez.net/nam-vitae-quae-voluptatum-culpa-ut-rem-nihil-perspiciatis.html', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(10, 'Arnau Páez', 'http://www.millan.es/', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(11, 'Alonso Garza', 'https://www.pacheco.es/saepe-iure-voluptates-reiciendis-maxime-qui-earum', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(12, 'Lucía Corona', 'http://villalpando.com/repellendus-molestiae-consequatur-ab-expedita-voluptatem-est.html', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(13, 'Marina Páez Tercero', 'http://serra.com/nam-neque-natus-architecto-fugiat', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(14, 'Sr. Ismael Carrera Hijo', 'https://www.barroso.es/ipsum-aut-ducimus-officia-minima', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(15, 'Nadia Vera', 'http://luna.es/dolores-enim-a-natus-distinctio-architecto-sunt', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(16, 'Sra. Luna Muro', 'http://riojas.es/commodi-voluptates-suscipit-nisi.html', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(17, 'Nayara Oquendo Hijo', 'http://aguilar.com.es/quam-repellendus-illo-blanditiis-laboriosam-laborum-eos-voluptas', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(18, 'Yago Macias Hijo', 'http://mena.com/adipisci-quae-alias-necessitatibus-placeat-a-perspiciatis.html', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(19, 'Alexandra Solorzano Tercero', 'http://www.portillo.org/', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(20, 'Srita. Jimena Santamaría Segundo', 'http://valdez.com/officia-officiis-quos-itaque-consequatur.html', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(21, 'Dr. Ana Vera', 'http://www.orosco.es/asperiores-blanditiis-perferendis-unde-quia-et-eos-eos.html', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(22, 'Patricia Mata Hijo', 'http://requena.org/sed-numquam-aliquam-maiores-dolores', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(23, 'Izan Cazares Segundo', 'https://quinonez.es/vero-quia-voluptatem-dolores-ab-cum-et-ipsa.html', '2019-04-02 13:20:10', '2019-04-02 13:20:10'),
(24, 'Patricia Deleón', 'http://www.negron.org/', '2019-04-02 13:20:10', '2019-04-02 13:20:10');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ads_category_id_foreign` (`category_id`),
  ADD KEY `ads_web_id_foreign` (`web_id`),
  ADD KEY `ads_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indices de la tabla `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indices de la tabla `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indices de la tabla `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `webs`
--
ALTER TABLE `webs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `webs_nombre_unique` (`nombre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ads`
--
ALTER TABLE `ads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=295;

--
-- AUTO_INCREMENT de la tabla `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `webs`
--
ALTER TABLE `webs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ads`
--
ALTER TABLE `ads`
  ADD CONSTRAINT `ads_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ads_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ads_web_id_foreign` FOREIGN KEY (`web_id`) REFERENCES `webs` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
