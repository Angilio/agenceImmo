-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 08 juil. 2025 à 07:52
-- Version du serveur : 8.0.31
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `agenceimmo`
--

-- --------------------------------------------------------

--
-- Structure de la table `biens`
--

DROP TABLE IF EXISTS `biens`;
CREATE TABLE IF NOT EXISTS `biens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Surface` int NOT NULL,
  `price` int NOT NULL,
  `Sold` tinyint(1) NOT NULL,
  `images` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `quartier_id` bigint UNSIGNED NOT NULL,
  `type_bien_id` bigint UNSIGNED NOT NULL,
  `type_vente_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `biens_quartier_id_foreign` (`quartier_id`),
  KEY `biens_type_bien_id_foreign` (`type_bien_id`),
  KEY `biens_type_vente_id_foreign` (`type_vente_id`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `biens`
--

INSERT INTO `biens` (`id`, `title`, `Description`, `Surface`, `price`, `Sold`, `images`, `created_at`, `updated_at`, `quartier_id`, `type_bien_id`, `type_vente_id`) VALUES
(44, 'TABAKNA', 'ggggggggggggggggggggggggggggggg', 1000, 12000000, 0, '\"[\\\"biens\\\\/2Qj9mZKqZSqCjj9TbggiR8GXoFcxmAX6amEIrM4w.jpg\\\",\\\"biens\\\\/UoXUNfROcfBiQcUB6wvK4jzu8ZgIIZroW0pRTesR.jpg\\\"]\"', '2025-07-08 03:16:24', '2025-07-08 03:16:58', 2, 2, 1),
(39, 'Excellence', 'Agence immobilière', 25000, 700000, 0, '\"[\\\"biens\\\\/lUxgyZ5eskTm348kLk6XfcPawq1HQ3Moi4WfsiZ6.jpg\\\",\\\"biens\\\\/CtUIcoTpauaPUT4wHOzRwhRZkYPLM9IQ7Dgzu13A.jpg\\\",\\\"biens\\\\/JOopgxX87upAqNV17FafVH8p1ELA46jhcQUIflWa.jpg\\\"]\"', '2025-03-29 07:40:55', '2025-05-02 14:37:58', 7, 2, 2),
(40, 'Excellence', 'Agence immobilière', 20, 40000, 0, '\"[\\\"biens\\\\/nCuyrPtimAKYcXM85PnQcKhQgqrXTxKQvsKegEPj.jpg\\\",\\\"biens\\\\/In6gBotJDPb6phUC8kSZtuCQzFk8bnVvWHLE3zrD.jpg\\\"]\"', '2025-03-29 08:59:30', '2025-05-02 14:32:54', 1, 3, 2),
(41, 'Terrain situé par la route', 'Habitat Elite est une agence immobilière spécialisée dans la vente, la localisation et la gestion de biens.', 122, 4440000, 0, '\"[\\\"biens\\\\/RgYWuxLh7vtC5QSIM0bdKg89tv2RSFs402d0JzhD.jpg\\\"]\"', '2025-04-05 14:26:20', '2025-05-02 13:35:56', 23, 3, 1),
(43, 'TABAKNA', 'ouihyyiguiygyiiuguyh', 1000, 12000000, 0, '\"[\\\"biens\\\\/jFg9Lg1yr41T7K9Bvmd0k0SnuszxudFVfoQaepwq.jpg\\\",\\\"biens\\\\/TBkjYODeVDatPAXGzj1dYOm0141Prz8t4c7hg2A9.jpg\\\"]\"', '2025-07-07 09:33:35', '2025-07-07 09:33:35', 16, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_12_02_154437_permission', 1),
(6, '2024_12_23_155024_create_quartier_table', 2),
(7, '2024_12_23_155232_create__bien_table', 2),
(8, '2024_12_23_161001_create_quartiers_table', 3),
(9, '2024_12_23_161036_create_biens_table', 4),
(10, '2025_01_17_100257_add_quartier_to_biens', 5),
(11, '2025_01_18_103033_create_type_biens_table', 6),
(12, '2025_01_18_105025_add_quartier_id_to_biens', 7),
(16, '2025_01_22_143104_add_image_to_biens', 11),
(14, '2025_01_29_141240_add_type_vente_to_biens', 9),
(15, '2025_01_29_142755_add_type_vent_to_biens', 10),
(17, '2025_05_31_121806_add_prenoms_to_users', 12);

-- --------------------------------------------------------

--
-- Structure de la table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `quartiers`
--

DROP TABLE IF EXISTS `quartiers`;
CREATE TABLE IF NOT EXISTS `quartiers` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `quartiers`
--

INSERT INTO `quartiers` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Cap Diego', '2024-12-23 16:19:30', '2024-12-23 16:19:30'),
(2, 'Place Kabary', '2024-12-23 16:21:42', '2024-12-23 16:21:42'),
(3, 'Lazaret Nord', '2024-12-23 16:21:42', '2024-12-23 16:21:42'),
(4, 'Avenir', '2024-12-23 16:23:01', '2024-12-23 16:23:01'),
(5, 'Lazaret Sud', '2024-12-23 16:23:01', '2024-12-23 16:23:01'),
(6, 'Grand Pavois', '2024-12-23 16:23:50', '2024-12-23 16:23:50'),
(7, 'Bazarikely', '2024-12-23 16:23:50', '2024-12-23 16:23:50'),
(8, 'Mangarivotra', '2024-12-23 16:25:31', '2024-12-23 16:25:31'),
(9, 'Tanambao Nord', '2024-12-23 16:25:31', '2024-12-23 16:25:31'),
(10, 'Tanambao Tsena', '2024-12-23 16:26:15', '2024-12-23 16:26:15'),
(11, 'Tanambao Sud', '2024-12-23 16:26:15', '2024-12-23 16:26:15'),
(12, 'Tanambao III', '2024-12-23 16:27:05', '2024-12-23 16:27:05'),
(13, 'Tanambao IV', '2024-12-23 16:27:05', '2024-12-23 16:27:05'),
(14, 'Tanambao V', '2024-12-23 16:28:04', '2024-12-23 16:28:04'),
(15, 'Mahatsara', '2024-12-23 16:28:04', '2024-12-23 16:28:04'),
(16, 'Soafeno', '2024-12-23 16:28:46', '2024-12-23 16:28:46'),
(17, 'Cité Ouvrière', '2024-12-23 16:28:46', '2024-12-23 16:28:46'),
(18, 'Ambohimitsinjo', '2024-12-23 16:29:39', '2024-12-23 16:29:39'),
(19, 'Morafeno', '2024-12-23 16:29:39', '2024-12-23 16:29:39'),
(20, 'Manongalaza', '2024-12-23 16:30:31', '2024-12-23 16:30:31'),
(21, 'Ambalavola', '2024-12-23 16:30:31', '2024-12-23 16:30:31'),
(22, 'SCAMA', '2024-12-23 16:31:21', '2024-12-23 16:31:21'),
(23, 'Tsaramandroso', '2024-12-23 16:31:21', '2024-12-23 16:31:21'),
(24, 'Ambalakazaha', '2024-12-23 16:32:02', '2024-12-23 16:32:02'),
(25, 'Anamakia', '2024-12-23 16:32:02', '2024-12-23 16:32:02');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'SuperAdmin', 'web', '2025-02-01 14:02:34', '2025-02-01 14:02:34'),
(2, 'Admin', 'web', '2025-02-01 14:02:34', '2025-02-01 14:02:34'),
(3, 'user', 'web', '2025-02-01 14:02:34', '2025-02-01 14:02:34');

-- --------------------------------------------------------

--
-- Structure de la table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `type_biens`
--

DROP TABLE IF EXISTS `type_biens`;
CREATE TABLE IF NOT EXISTS `type_biens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `type_biens`
--

INSERT INTO `type_biens` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Terrain', '2025-01-18 10:01:59', '2025-01-18 10:01:59'),
(2, 'Maison', '2025-01-18 10:01:59', '2025-01-18 10:01:59'),
(3, 'Chambre', '2025-01-18 10:01:59', '2025-01-18 10:01:59');

-- --------------------------------------------------------

--
-- Structure de la table `type_ventes`
--

DROP TABLE IF EXISTS `type_ventes`;
CREATE TABLE IF NOT EXISTS `type_ventes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `type_ventes`
--

INSERT INTO `type_ventes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Location', '2025-01-29 13:26:02', '2025-01-29 13:26:02'),
(2, 'Vente', '2025-01-29 13:26:02', '2025-01-29 13:26:02');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenoms` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `prenoms`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'RAZAFINDRATSOTRY Paulinaud', '', 'razafindratsotrypaulinaud77@gmail.com', NULL, '$2y$10$4GeS1fexTcmtIT2Itjz1N.oG1/m0cLV6AZaL6VJCa.4zWJWJxEc3S', NULL, '2024-12-02 14:58:45', '2025-04-05 10:27:47'),
(5, 'RAZAFINDRATSOTRY', 'Paulinaud', 'johntroaikkyman@gmail.com', NULL, '$2y$10$lrrFjlsUC1aqNetPW6WCrerzz7N8yARET2TCKUssCU84QJLPSjRpG', NULL, '2025-06-01 08:26:58', '2025-06-01 08:26:58');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
