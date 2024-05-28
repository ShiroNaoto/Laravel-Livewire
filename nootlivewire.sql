-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 28, 2024 at 07:11 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nootlivewire`
--

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `head` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duty` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `code`, `head`, `duty`, `created_at`, `updated_at`) VALUES
(4, 'The Phantom Thieves of Hearts', 'DIVP5R2020', 'The Joker', 'We will take your hearts for we are the Phantom Thieves!', '2024-03-03 22:37:47', '2024-04-11 22:47:45'),
(5, 'The Investigation Team', 'DIVP4G2012', 'Yu Narukami', 'We reach out to the truth', '2024-03-03 22:38:40', '2024-03-03 22:38:40'),
(6, 'Specialized Extracurricular Execution Squad', 'DIVP3R2024', 'Makoto Yuki', 'Destroy the Dark Hour with the Suicide Squad', '2024-03-03 22:39:15', '2024-04-10 23:10:33'),
(7, 'Strategic Initiatives Division', 'DIV100', 'Naoto Shirogane', 'Develop and implement long-term strategic plans to ensure the organization\'s growth and adaptability in a dynamic environment.', '2024-03-03 22:40:38', '2024-03-03 22:49:12'),
(8, 'Operations and Logistics Division', 'DIV123', 'Mitsuru Kirijo', 'Oversee day-to-day operations, manage supply chains, and optimize logistical processes to enhance efficiency and productivity.', '2024-03-03 22:41:40', '2024-03-03 22:41:40'),
(10, 'Human Resources Division', 'DIV571', 'Byleth Eisnier', 'Foster a positive work environment by managing recruitment, employee relations, training, and ensuring compliance with HR policies.', '2024-03-03 22:43:10', '2024-03-03 22:43:10'),
(11, 'Marketing and Communications Division', 'DIV452', 'Yosuke Hanamura', 'Develop and execute marketing strategies, manage brand communication, and enhance the organization\'s presence in the market.', '2024-03-03 22:43:40', '2024-03-03 22:43:40'),
(12, 'Finance and Administration Division', 'DIV213', 'Brother Virtue', 'Manage financial resources, budgeting, and administrative functions to ensure fiscal responsibility and organizational sustainability. be calm just like virtue', '2024-03-03 22:44:26', '2024-04-10 23:06:05'),
(13, 'Research and Development Division', 'DIV932', 'Takuto Maruki', 'Conduct research, innovate products or services, and contribute to the organization\'s intellectual property and future growth', '2024-03-03 22:45:09', '2024-03-03 22:45:09'),
(14, 'Information Technology Division', 'DIVIT124', 'Futaba Sakura', 'Manage and optimize IT infrastructure, cybersecurity, and digital initiatives to support the organization\'s technological needs.', '2024-03-03 22:45:57', '2024-03-03 22:45:57'),
(15, 'Sustainability and Corporate Responsibility Division', 'DIV624', 'Cynthia', 'Develop and implement initiatives to promote environmental sustainability and corporate social responsibility.', '2024-03-03 22:46:34', '2024-03-03 22:46:34'),
(16, 'Quality Assurance Division', 'DIV752', 'Yukari Takeba', 'Ensure product or service quality by implementing and maintaining quality control processes and standards', '2024-03-03 23:44:48', '2024-03-03 23:44:48'),
(20, 'Amagi Inn', 'DIV4M461', 'Yukiko Amagi', 'Popular Inn in Inaba (real)', '2024-03-07 22:59:53', '2024-03-10 20:42:35'),
(30, 'Lethal Company', 'DIV666', 'The Company', 'Collecting scraps for the Company', '2024-03-10 20:27:10', '2024-03-10 20:27:10'),
(37, 'Lethal Content Company Warning', 'DIVCL0859', 'Felix Kjellberg', 'EY wassup my name is PEEEEEEEEWDIEPIE', '2024-04-11 20:26:48', '2024-04-11 20:28:34'),
(39, 'WWE SmackDown', '619', 'Ray Mysterio', 'WAO', '2024-04-11 22:46:30', '2024-04-11 22:46:30');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_02_27_045012_add_username_field_to_users_table', 2),
(6, '2024_02_27_045358_add_division_field_to_users_table', 3),
(7, '2024_02_27_045505_add_acctype_field_to_users_table', 4),
(8, '2024_03_04_050507_create_divisions_table', 5),
(9, '2024_03_04_235511_remove_division_id_from_users', 6),
(10, '2024_03_05_005159_change_division_column_in_users_table', 7),
(11, '2024_03_05_030658_update_users_table_change_division_to_division_id', 8),
(12, '2024_03_05_064134_create_tickets_table', 9),
(13, '2024_03_05_072203_add_category_field_to_tickets_table', 10),
(14, '2024_03_06_004209_change_ticketdiv_column_in_tickets_table', 11),
(15, '2024_03_06_010749_add_user_id_field_to_tickets_table', 12),
(16, '2024_03_06_055404_add_remark_field_to_tickets_table', 13),
(17, '2024_04_17_233926_add_status_field_to_users_table', 14),
(18, '2024_05_16_073801_create_sessions_table', 15);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `state` enum('Pending','Processing','Resolved') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `staffname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticketdiv` bigint UNSIGNED NOT NULL,
  `severity` enum('Critical','High','Medium','Low') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` enum('Hardware','Website','Network') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `user_id`, `state`, `staffname`, `email`, `ticketdiv`, `severity`, `category`, `description`, `remark`, `created_at`, `updated_at`) VALUES
(10, 29, 'Processing', 'Johnmark Bornasal', 'makmakxd@gmail.com', 8, 'Medium', 'Website', 'Content Management Issues', 'aaaaaaaaaaaaa', '2024-03-05 20:21:23', '2024-03-10 21:06:52'),
(27, 28, 'Processing', 'Mitsuru Kirijo', 'punoErnest@gmail.com', 6, 'Medium', 'Website', 'Phan Website Exist', 'mid site', '2024-03-07 20:03:08', '2024-03-11 17:29:39'),
(30, 28, 'Resolved', 'Mitsuru Kirijo', 'punoErnest@gmail.com', 6, 'Low', 'Hardware', 'how to open pc', 'push the power button', '2024-03-07 20:07:28', '2024-03-11 17:29:39'),
(36, 29, 'Processing', 'Johnmark Bornasal', 'makmakxd@gmail.com', 8, 'Low', 'Hardware', 'tor porta vitae, eleifend at neque. Suspendisse potenti. Aliquam pretium tortor et tortor pulvinar, vel vestibulum odio gravida. Donec vulputate magna a eros egestas viverra. Pellentesque accumsan consequat lorem, in bibendum massa blandit quis. Vestibulum quis diam ac nisi sodales curs', NULL, '2024-03-07 20:16:36', '2024-03-10 16:35:52'),
(37, 29, 'Pending', 'Johnmark Bornasal', 'makmakxd@gmail.com', 8, 'Medium', 'Hardware', 'nim tempus. Duis euismod bibendum sapien, eget fermentum libero interdum pulvinar. Etiam eget massa consequat, bibendum dui vitae, porta justo. Curabitur aliquet elit ut odio vestibulum lobortis. Donec suscipit felis lectus, non rutrum nisi vulputate ut. Nunc porttitor lacinia magna.', NULL, '2024-03-07 20:16:49', '2024-03-10 16:35:52'),
(38, 29, 'Pending', 'Johnmark Bornasal', 'makmakxd@gmail.com', 8, 'High', 'Hardware', 'vestibulum efficitur. Nulla auctor dui leo, in pretium lorem tempor vitae. Vestibulum turpis erat, sagittis tempus egestas in, vulputate eu arcu. Vestibu', 'nah i broke it', '2024-03-07 20:17:14', '2024-04-11 16:37:41'),
(39, 29, 'Resolved', 'Johnmark Bornasal', 'makmakxd@gmail.com', 8, 'Critical', 'Hardware', 'a eros egestas viverra. Pellentesque accumsan consequat lorem, in bibendum massa blandit quis. Vestibulum quis diam ac nisi sodales cursus', 'ayee', '2024-03-07 20:17:24', '2024-04-11 20:45:01'),
(40, 29, 'Processing', 'Johnmark Bornasal', 'makmakxd@gmail.com', 8, 'Low', 'Website', 'on libero eleifend, sed varius ex vulputate. Praesent nulla justo, pretium eu mauris quis, posuere fermentum est. Cras sit amet nunc quis neque', NULL, '2024-03-07 20:17:36', '2024-03-10 16:35:52'),
(41, 29, 'Resolved', 'Johnmark Bornasal', 'makmakxd@gmail.com', 8, 'High', 'Website', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...\" \"There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain...\"', 'test', '2024-03-07 20:17:51', '2024-04-03 23:26:40'),
(42, 29, 'Processing', 'Johnmark Bornasal', 'makmakxd@gmail.com', 8, 'Medium', 'Network', 'Duis euismod bibendum sapien, eget fermentum libero interdum pulvinar. Etiam eget massa consequat, bibendum dui vitae, porta justo. Cura', 'gh', '2024-03-07 20:18:13', '2024-03-10 21:07:33'),
(45, 16, 'Processing', 'Ren Amamiya', 'persona5@gmail.com', 4, 'Medium', 'Website', 'ndisse non felis et erat pulvinar vulputate. Donec eu eros quis ex vestibulum iaculis. Donec tincidunt volutpat libero, sollicitudin blandit lore', NULL, '2024-03-07 20:22:31', '2024-03-11 22:58:54'),
(46, 16, 'Resolved', 'Ren Amamiya', 'persona5@gmail.com', 4, 'High', 'Website', '. Praesent nulla justo, pretium eu mauris quis, posuere fermentum est. Cras sit amet nunc quis neque eleifend condimentum. Nulla placerat', 'goods', '2024-03-07 20:22:46', '2024-04-07 18:01:53'),
(47, 16, 'Pending', 'Ren Amamiya', 'persona5@gmail.com', 4, 'Medium', 'Network', 'nt et vehicula diam. Fusce ornare porta tortor pellentesque pulvinar. Ut vitae elit turpis. Quisque a lacus sem. Pellentesque at interdum libe', NULL, '2024-03-07 20:23:02', '2024-03-07 20:23:02'),
(48, 16, 'Resolved', 'Ren Amamiya', 'persona5@gmail.com', 4, 'Critical', 'Website', 'nsequat, bibendum dui vitae, porta justo. Curabitur aliquet elit ut odio vestibulum lobortis. Donec suscipit felis lectus, non rutrum nisi vulputa', 'omke', '2024-03-07 20:23:14', '2024-04-16 17:13:57'),
(55, 58, 'Resolved', 'Rise Kujikawa', 'risette@gmail.com', 5, 'Low', 'Website', 'no internet :((((', 'say no more', '2024-03-10 23:27:15', '2024-04-07 22:55:52'),
(56, 58, 'Resolved', 'Rise Kujikawa', 'risette@gmail.com', 5, 'High', 'Website', 'MY ACCOUNT GOT HACKED.', 'not anymore!', '2024-03-10 23:27:41', '2024-04-03 22:43:54'),
(57, 28, 'Processing', 'Mitsuru Kirijo', 'punoErnest@gmail.com', 6, 'High', 'Hardware', 'Overheat', 'omw', '2024-03-11 19:03:28', '2024-04-16 17:54:40'),
(100, 28, 'Processing', 'Mitsuru Kirijo', 'punoErnest@gmail.com', 6, 'Medium', 'Website', 'Mitsuru FOKKKKKK', 'pending borny', '2024-04-07 19:11:01', '2024-04-07 22:57:32'),
(107, 28, 'Pending', 'Mitsuru Kirijo', 'punoErnest@gmail.com', 6, 'Medium', 'Website', 'wahooo', NULL, '2024-04-11 19:09:25', '2024-04-11 19:09:25'),
(109, 28, 'Processing', 'Mitsuru Kirijo', 'punoErnest@gmail.com', 6, 'Critical', 'Hardware', 'Explotano Car', 'wtf', '2024-04-11 19:34:15', '2024-04-11 20:46:53'),
(110, 28, 'Pending', 'Mitsuru Kirijo', 'punoErnest@gmail.com', 6, 'Critical', 'Website', 'ConrSite Spotted Hole Sheesh', NULL, '2024-04-11 19:36:31', '2024-04-11 19:36:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `acctype` enum('user','admin') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','approved','disapproved') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `division_id` bigint DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `acctype`, `username`, `email`, `status`, `division_id`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(16, 'Ren Amamiya', 'user', 'Yoker', 'persona5@gmail.com', 'approved', 4, NULL, '$2y$12$B0Y595SpT7KGWcPjOgbjD.rHeEnfrl9cNz38kgR5b7WOUB5H/HR2G', NULL, '2024-02-28 18:34:12', '2024-04-17 20:47:11'),
(26, 'Sid Nacilla', 'user', 'Cunnyseur', 'cunnyexpert@gmail.com', 'approved', 7, NULL, '$2y$12$nM7j52BDpecx/CGXKUY0Ju2MqXFhsS3ADJyyiYgss6KJw6uSCa52K', NULL, '2024-03-03 18:54:46', '2024-04-17 20:47:11'),
(28, 'Bearnest Sacrizzmento', 'user', 'Solitude', 'punoErnest@gmail.com', 'approved', 6, NULL, '$2y$12$BVSdaoUV7GK2SH5NXO06keSKaUJkdhZf0UUEwQ504Rb2ullDo2qAa', NULL, '2024-03-03 18:56:26', '2024-04-17 21:13:59'),
(29, 'MakBernasal', 'user', 'MakweenKitten', 'makmakxd@gmail.com', 'approved', 14, NULL, '$2y$12$3Y0EsS1SRUSX4DID9dL1weTEYgY6kJevNF8y3lb6iuDkdefJfgG.S', NULL, '2024-03-03 18:57:06', '2024-04-17 21:15:53'),
(32, 'Makoto Niijima', 'user', 'Queen', 'queenanat@gmail.com', 'approved', 4, NULL, '$2y$12$D/aa1ElwrJVDCxtgkUL9KOflv5i42ArgnKKmMVVQweWSD4ja/9Zs6', NULL, '2024-03-03 23:41:13', '2024-04-17 20:47:11'),
(33, 'Futaba Sakura', 'admin', 'Alibaba', 'currypoggers@xd.com', 'approved', 14, NULL, '$2y$12$eoPRV2UZDoDPJ92oewdZr.aL9DKQ6LMi9iLu.7xBSqUMi0EUhj54G', NULL, '2024-03-03 23:43:04', '2024-04-17 16:22:44'),
(34, 'Naoto Shirogane', 'admin', 'Ace', 'sherlockholmes@gmail.com', 'approved', 5, NULL, '$2y$12$3vgnC02zwWI5NmryOEehqOpiJ/qok.nWQMANqedLEt0j8n72MUu8G', 'VxUPA8EUytZkpoUlXuQqSLXTSKuX9ahkIrlAK0xqphauT61GBvqeCBks0XCf', '2024-03-04 18:14:50', '2024-04-17 16:22:44'),
(35, 'Lucy Kushinada', 'user', 'Lucy', 'netrunner@email.com', 'approved', 13, NULL, '$2y$12$K6HHlXtPtFPdP.2vRsQUp.RHw.3kxNc5yji0hmkjjwLmCTGvtCiK.', NULL, '2024-03-04 19:01:13', '2024-04-17 20:47:11'),
(37, 'David Martinez', 'user', 'Sandevistan', 'edgerunner@gmail.com', 'pending', 10, NULL, '$2y$12$BWO6EfuFDdO8D1UvDLFfBuDFkZhBhrBglgYy6KRSnOU3jI85LkkNe', NULL, '2024-03-04 20:30:52', '2024-03-11 22:56:54'),
(42, 'Jessie Alcaraz', 'admin', 'Kolerin', 'jba1826@gmail.com', 'approved', 14, NULL, '$2y$12$MTAPw6wtgTvJ2vfuw2Skx.aJSNiRtcYktbI9hrAfr9r7hm8aH.1cC', NULL, '2024-03-07 18:24:41', '2024-04-17 16:22:44'),
(43, 'Jaemie Alcaraz', 'admin', 'MsKolerin', 'topjoy420@yahoo.com', 'approved', 12, NULL, '$2y$12$Yojcs9FIDRpp/2o0YkXxLe/mzAeCsG6myY5jFZI69TO4C68MesJSu', NULL, '2024-03-07 18:31:43', '2024-04-17 16:42:38'),
(44, 'Yosuke Hanamura', 'user', 'Jiraia', 'junes@yahoo.com', 'approved', 11, NULL, '$2y$12$iivi1M818vXe9wswGknTJOocomI3mzWxoCKMC1kJrsr1iqvusUVqy', NULL, '2024-03-07 18:33:28', '2024-04-17 20:47:11'),
(46, 'Chie Satonaka', 'user', 'tomoe', 'p4gtest@gmail.com', 'pending', 13, NULL, '$2y$12$bNfKhGQ5XfL5bGGd/IiP8OXv6bnEv4dzRlOFef/eOvt5teXSL8EMK', NULL, '2024-03-07 18:37:49', '2024-03-07 18:37:49'),
(48, 'Yukiko Amagi', 'admin', 'Konohanasakuya', 'amagidyne@gmail.com', 'approved', 12, NULL, '$2y$12$VOAZiTsk7SK7JUXGDSCaYepTVv/5PCDLw9uo/VlcTDtJeGzWYPVrK', NULL, '2024-03-07 18:52:33', '2024-04-17 16:22:44'),
(49, 'Kanji Tatsumi', 'user', 'NootEnjoyer', 'naotobestgirl@yahoo.com', 'pending', 5, NULL, '$2y$12$cTMPt9ZUs2bsYQFVViYP2ezGlssDqITiuk0jPQThYXyMcceLR6Iqu', NULL, '2024-03-07 18:54:16', '2024-03-11 17:39:24'),
(51, 'Akihiko Sanada', 'admin', 'ProteinMan', 'ceasar@yahoo.com', 'approved', 6, NULL, '$2y$12$goySKvhpVvRlrufcF0TzxueI4ZjOOgzbTRLvIMzAsixTLCZngjqpe', NULL, '2024-03-10 20:46:05', '2024-04-17 16:22:44'),
(53, 'Aragaki Shinjiro', 'user', 'Castor', 'koromaru@gmail.com', 'pending', 6, NULL, '$2y$12$VyK6rWyC8bZ6wpGah0gHtuA15uJld.H4S0COv3pmc1OedelWfjTmi', NULL, '2024-03-10 20:58:47', '2024-03-12 17:06:05'),
(57, 'Teddie', 'user', 'Kuma', 'teddiefurry@yahoo.com', 'pending', 10, NULL, '$2y$12$deeZ7qNQe2KD9hAwptisqOh/zoJAZYN5OmsJVsgYu8IchIgazWDly', NULL, '2024-03-10 21:59:01', '2024-03-10 21:59:01'),
(58, 'Rise Kujikawa', 'user', 'Risette', 'risette@gmail.com', 'pending', 5, NULL, '$2y$12$d8eV5Mp5NCgxe9mfi4Abn.R7DrX2btu4TnDVVeiV7Urt2blIR35XK', NULL, '2024-03-10 23:25:53', '2024-03-10 23:25:53'),
(59, 'Tohru Adachi', 'user', 'Cabbage', 'magatsuizanagi@yahoo.com', 'pending', 30, NULL, '$2y$12$e0LKJ3RPWTLotYQ4mwuSeuOAI/IjgmVNx1T7wOpius1Qy.BvHUVNu', NULL, '2024-03-10 23:29:54', '2024-03-10 23:29:54'),
(60, 'Ann Takamaki', 'user', 'Panther', 'shihobff@email.com', 'pending', 4, NULL, '$2y$12$HIawSIVPln08ERdPfsIZo.jf3pgo1unpADt22K6b6AyMBaJhQTiW2', NULL, '2024-03-10 23:32:52', '2024-03-10 23:32:52'),
(62, 'Junpei Iori', 'user', 'AceDefective', 'chidorita@gmail.com', 'pending', 6, NULL, '$2y$12$4XZNA3Zu1H8FcO1GgnAeUO8lETS33nvDiFaAucko4TBko1vMbunMa', NULL, '2024-03-12 15:59:28', '2024-03-12 15:59:28'),
(63, 'Yukari Takeba', 'admin', 'Io', 'makotoyuki@gmail.com', 'approved', 6, NULL, '$2y$12$1S/fNYq4s7EaDlRlSRnXQ.kyYt2sreeP5fWjsNvWFOY6L2t/9Dsbq', NULL, '2024-03-12 16:03:34', '2024-04-17 16:22:44'),
(65, 'Aigis', 'user', 'Athena', 'orgiamode@gmail.com', 'pending', 6, NULL, '$2y$12$94FJWVA.9bPBJa4prUpStO/6Crip9d5VGPVLM8UXUSJUoADGs9pWy', NULL, '2024-03-12 16:23:10', '2024-03-12 16:23:10'),
(66, 'Ken Amada', 'user', 'Koro', 'nemesis@gmail.com', 'pending', 6, NULL, '$2y$12$dABnLPu1badylb9UVCgb/O8r1WNcvPG34qLuQkToqfMTSJeTt54mi', NULL, '2024-03-12 16:25:35', '2024-03-12 16:25:35'),
(67, 'Yu Narukami', 'admin', 'Kingpin', 'investigationteam@gmail.com', 'approved', 5, NULL, '$2y$12$VKVpnOO8pAv5zkAXO841BOPeOE6c8QuRqt.XzCj5bf.yNi1uVvdqm', NULL, '2024-03-12 16:33:29', '2024-04-17 16:22:23'),
(68, 'Elizabeth', 'admin', 'ElleP', 'igorlongnose@velvet.room', 'approved', 12, NULL, '$2y$12$8Y3zulbrhhPw3CFhIRLfz.qJsq1RjRUf99Pi4rn4JD8n09jcfB6xO', NULL, '2024-03-12 16:36:33', '2024-04-17 16:22:44'),
(69, 'Margaret', 'admin', 'Scarygirl', 'velvetroom@gmail.com', 'approved', 11, NULL, '$2y$12$Ov4kQ7ebFZtL69DPi.zhR.MSeNQHX5yYeOGMIDBJE/n4xVBLLBO1G', NULL, '2024-03-12 16:40:35', '2024-04-17 16:22:44'),
(70, 'Ryuji Sakamoto', 'user', 'Skull', 'forreal@gmail.com', 'pending', 4, NULL, '$2y$12$6iRODgOtwkuvjnHO1kJO1eZIGMJEi5VsCSfWQtpNCZg3EE5d35Khy', NULL, '2024-03-12 16:51:04', '2024-03-12 16:51:04'),
(71, 'Kiryu Kazuma', 'user', 'Dragon', 'likeadragon@gmail.com', 'pending', 10, NULL, '$2y$12$hrSfxcmTdTikTlwgNJqveu.cdWxYLrgXRFM.tZBsA7EBaaUPudWjC', NULL, '2024-03-12 16:55:32', '2024-03-12 16:55:32'),
(72, 'Haru Okumura', 'admin', 'Noir', 'beautythief@gmail.com', 'approved', 13, NULL, '$2y$12$oE0uD0q1ZRu8K7iUpaUczuecl2xF265a5N3i1PtohOKGvmHEHlCc2', NULL, '2024-03-13 20:15:21', '2024-04-17 20:03:58'),
(74, 'Yusuke Kitagawa', 'user', 'Fox', 'sayuri@gmail.com', 'pending', 13, NULL, '$2y$12$rIahasY6k0FX8bdNmcod/uweas80Cdnugfwkg046yuWp4p7yGoxfu', NULL, '2024-03-21 22:30:41', '2024-03-21 22:30:41'),
(77, 'Andoird 18', 'user', 'Andoird18', 'rr@gmail.com', 'pending', 14, NULL, '$2y$12$MOJdYO/TAKya/FWbzIaaTu2zFBmpc9HsFXF2YTifXOpxt6.8dVpfa', NULL, '2024-03-24 16:35:04', '2024-03-24 16:35:04'),
(81, 'Goro Akechi', 'user', 'Crow', 'defectiveprince@gmail.com', 'pending', 4, NULL, '$2y$12$ZJUGH.u4hDTLMTt9GGd10uAxxvNX47MNJx8ClHN60gMDvstEzP4fO', NULL, '2024-03-24 18:38:31', '2024-03-24 18:38:31'),
(82, 'Sumire Yoshizawa', 'user', 'VIolet', 'p5r@gmail.commmm', 'pending', 10, NULL, '$2y$12$kULDdVWIJCIVnjwH1Tip4eqWzAEaIj9rnEZ5vpnH1uG6T2.7M7N9S', NULL, '2024-03-24 18:48:34', '2024-03-24 18:48:34'),
(83, 'Coach', 'admin', 'Cheeseburger', 'l4d2@email.com', 'disapproved', 15, NULL, '$2y$12$sHFnBvSeUq.eZr3b1IlS3uQhetOD6konoFX4ppzcU1lWXCxJ3s0DS', NULL, '2024-03-24 18:50:35', '2024-04-17 16:45:39'),
(86, 'Midkoto Niijima', 'user', 'Kween', 'useless@gmail.com', 'pending', 4, NULL, '$2y$12$Esh7cLwpCTsHzthLNuFAu.BoiwJA43gcnYikh8PPfehPjUMITvhBG', NULL, '2024-03-25 15:22:04', '2024-03-25 15:22:04'),
(88, 'Android 17', 'user', '17', 'rr17@gmail.com', 'pending', 15, NULL, '$2y$12$qI7i/E4ecENW9PS7JwYTDORKdJMGBQC1AdPDqXbYeD5i9SCouGXja', NULL, '2024-03-25 15:51:17', '2024-03-25 15:51:17'),
(89, 'Sigurd Chalfy', 'user', 'Tyrfing', 'geneology@gmail.com', 'pending', 12, NULL, '$2y$12$QSGBCB8kXDSdW8KM4QPDtOCH9bErZdsvR4QMT7Pv65GqrInTcb7qC', NULL, '2024-03-25 15:53:20', '2024-03-25 15:53:20'),
(92, 'asdasdasd', 'user', 'asdasdasdaa', 'asda@asad', 'pending', 6, NULL, '$2y$12$4nNv0c7/QHK88ZloEr0Ire88HCwNCQU2X8M/rh8DuhDN0xN5JqHOG', NULL, '2024-03-25 16:06:03', '2024-03-25 16:06:03'),
(95, 'Son Goku', 'user', 'Kakarot', 'heyitsmegoku@yahoo.com', 'pending', 5, NULL, '$2y$12$d8KYwTCItBJunqaAeAh9Je2BtSNsuy26i.mtoXBwdThA2DmTFv8gK', NULL, '2024-03-25 17:21:13', '2024-03-25 17:21:13'),
(96, 'Samus Aran', 'admin', 'Samus', 'bountyhunter@email.com', 'disapproved', 12, NULL, '$2y$12$ylQnb4bk48ZJR3YlPc87MuY8r3OiXx4eEcwIovFXpfRC7an0vw5OS', NULL, '2024-03-25 18:53:15', '2024-04-17 16:45:39'),
(97, 'Edelgard von Hresvelg', 'admin', 'FlameEmpreror', 'bylethsheesh@gmail.com', 'disapproved', 13, NULL, '$2y$12$fBhEXKrd2oJVBokZtoEvju75waQyaX99.NrhctClxR63XFKAUieU2', NULL, '2024-03-25 18:55:43', '2024-04-17 16:45:39'),
(98, 'Juice Juan Alcarizz', 'user', 'Mido', 'joshuaaronalcaraz18200@gmail.com', 'pending', 11, NULL, '$2y$12$YwMJRKzfMpsqnKiw32hPZ.SF05V/DXn0tPtiX7tvPAkD0FdUzcZ5e', NULL, '2024-03-25 19:27:18', '2024-03-25 19:27:18'),
(99, 'Amogus', 'user', 'medo', 'sus@com', 'pending', 12, NULL, '$2y$12$FC6ULyprfw5gcIeT18jKCeX4Jf2Bi9T3rHtsZ4LJ6tsytkirS7b6y', NULL, '2024-03-25 21:44:46', '2024-03-25 21:44:46'),
(100, 'Goro Pancakes', 'user', 'Aced', 'amongus@email.com', 'pending', 11, NULL, '$2y$12$e8Ifc932KCWC92KxKbBMgeiXB7ZpeTBL7hBfde05t96E05.vbiSWW', NULL, '2024-03-31 16:51:07', '2024-03-31 16:51:07'),
(102, 'Captain Price', 'user', 'Price', 'codmid@gmail.com', 'pending', 12, NULL, '$2y$12$nfhQV7c8Si.fE0IdAcsxPecEjJ/AXVr93QdtF8.F7.Tt6EbTZMDja', NULL, '2024-04-02 20:36:53', '2024-04-02 20:36:53'),
(103, 'Lenneth Valkyrie', 'admin', 'Val', 'profile@test.com', 'pending', 7, NULL, '$2y$12$UNrt4Z6ObX9vWtBs5bUpVuAbEtmq6y0A0/OfyVYPa49mZV90uvlee', NULL, '2024-04-02 22:15:23', '2024-04-02 22:15:23'),
(105, 'Josie Alcaraz', 'user', 'Josie', 'josie@email.com', 'pending', 15, NULL, '$2y$12$WLmGqzhN78oi/s0iAW9SS.T6n5On8KX2Vp7M/H./2Q1NDkl/gtsZC', NULL, '2024-04-07 20:53:59', '2024-04-07 20:53:59'),
(107, 'Ike', 'user', 'Radiant', 'fe13@gmail.com', 'pending', 12, NULL, '$2y$12$DoIISf6apFPUTD9B8JrR3OZKLpa8CvuIEJcRojjcEelSvgYLDNm9q', NULL, '2024-04-07 22:59:06', '2024-04-07 22:59:06'),
(108, 'Kaine', 'admin', 'test', 'replicant@gmail.com', 'pending', 15, NULL, '$2y$12$yu12xHY69XsLZ33wrOe/Pel.t6lS0FJNaJaXrhBN5UjlsnXkbBP9i', NULL, '2024-04-10 15:19:34', '2024-04-21 19:52:08'),
(109, 'Loki Laveteinn', 'admin', 'Trickster', 'godofmischief@asgard.com', 'disapproved', 8, NULL, '$2y$12$ezuKK4fEmniEp1muQKjhye1o2Qew7.fB64T3nMfqJwP13G9f.uVgC', NULL, '2024-04-11 16:27:08', '2024-04-17 16:31:48'),
(110, 'Medomi Tashi', 'admin', 'Medomi', 'zhentashi@gmail.com', 'approved', 12, NULL, '$2y$12$oiBi4j5go0eTlCG7G9fye.6m9zyaQFGym4MHfoK14y7GmGl3Fg9M2', NULL, '2024-04-11 21:38:32', '2024-04-17 20:47:11'),
(111, 'Nyaoto Shinyagane', 'admin', 'Nyaoto', 'nekodetective@gmail.com', 'approved', 5, NULL, '$2y$12$WmT0FLr7Q7OYDOKc8PzK1.VmhJ8SDP5pGwo1tJDtnscFhcNpuIAEy', NULL, '2024-04-16 17:11:25', '2024-04-17 16:22:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `divisions_code_unique` (`code`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
