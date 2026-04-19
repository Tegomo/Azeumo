-- MySQL dump 10.13  Distrib 8.0.45, for Linux (x86_64)
--
-- Host: 172.25.0.1    Database: azeumo
-- ------------------------------------------------------
-- Server version	8.0.45-0ubuntu0.24.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact_messages`
--

DROP TABLE IF EXISTS `contact_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contact_messages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_messages`
--

LOCK TABLES `contact_messages` WRITE;
/*!40000 ALTER TABLE `contact_messages` DISABLE KEYS */;
INSERT INTO `contact_messages` VALUES (1,'Armand','tegomovarmand@gmail.com','test de mail','Praesent quis orci sit amet ante facilisis suscipit. Integer in eros molestie, ultricies arcu ac, cursus quam. Nulla facilisi. Ut egestas semper magna ac condimentum. Aliquam erat volutpat. Sed bibendum sollicitudin orci, at viverra metus vehicula sed.\n\nPraesent placerat, magna in vehicula vestibulum, felis urna cursus lorem, sed vestibulum quam eros vel libero. Vivamus commodo, odio sed fringilla pretium, sem nulla feugiat odio, in cursus elit dolor et ex.\n\nEtiam accumsan urna a mauris dapibus, nec aliquet nunc convallis. Phasellus eget justo et libero ultrices posuere. Cras euismod, arcu nec congue convallis, ipsum nunc cursus nibh, vel condimentum sapien orci non libero. Integer ullamcorper felis sit amet felis placerat, eu convallis lorem iaculis.\n\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\n\nMauris vitae quam in justo dictum sodales. In eget tortor a nunc vehicula tempor. Nam ac tincidunt ipsum, eget accumsan nisi. Praesent porta, magna vitae dapibus pharetra, erat eros efficitur nunc, in mattis lectus libero a velit. Nulla facilisi.',1,'2026-04-19 04:41:21','2026-04-19 04:46:21'),(2,'Armand','tegomovarmand@gmail.com','test de mail','Praesent quis orci sit amet ante facilisis suscipit. Integer in eros molestie, ultricies arcu ac, cursus quam. Nulla facilisi. Ut egestas semper magna ac condimentum. Aliquam erat volutpat. Sed bibendum sollicitudin orci, at viverra metus vehicula sed.\n\nPraesent placerat, magna in vehicula vestibulum, felis urna cursus lorem, sed vestibulum quam eros vel libero. Vivamus commodo, odio sed fringilla pretium, sem nulla feugiat odio, in cursus elit dolor et ex.\n\nEtiam accumsan urna a mauris dapibus, nec aliquet nunc convallis. Phasellus eget justo et libero ultrices posuere. Cras euismod, arcu nec congue convallis, ipsum nunc cursus nibh, vel condimentum sapien orci non libero. Integer ullamcorper felis sit amet felis placerat, eu convallis lorem iaculis.\n\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\n\nMauris vitae quam in justo dictum sodales. In eget tortor a nunc vehicula tempor. Nam ac tincidunt ipsum, eget accumsan nisi. Praesent porta, magna vitae dapibus pharetra, erat eros efficitur nunc, in mattis lectus libero a velit. Nulla facilisi.',1,'2026-04-19 04:42:03','2026-04-19 10:34:22'),(3,'Tegomo','tegomovarmand@gmail.com','test','test test testtest test testtest test testtest test testtest test testtest test testtest test testtest test testtest test testtest test testtest test testtest test testtest test testtest test test',0,'2026-04-19 04:55:29','2026-04-19 04:55:29');
/*!40000 ALTER TABLE `contact_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2026_04_12_225922_create_posts_table',1),(5,'2026_04_12_225925_create_services_table',1),(6,'2026_04_12_225926_create_contact_messages_table',1),(7,'2026_04_18_204343_add_image_to_posts_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_fr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt_fr` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body_fr` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `body_en` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` json DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (10,'lintelligence-economique-au-service-du-developpement-africain-1776615876','/images/blog/lintelligence-economique-au-service-du-developpement-africain-1776615876.png','L\'Intelligence Économique au service du développement africain','Economic Intelligence at the service of African development','<p>Nullam vehicula magna sit amet magna ullamcorper, at dictum est gravida. Morbi nec magna at quam malesuada accumsan. Suspendisse potenti. Vivamus feugiat massa ut tortor scelerisque, non dapibus nulla consectetur. Aliquam erat volutpat.</p>','<p>Nullam vehicula magna sit amet magna ullamcorper, at dictum est gravida. Morbi nec magna at quam malesuada accumsan. Suspendisse potenti. Vivamus feugiat massa ut tortor scelerisque, non dapibus nulla consectetur. Aliquam erat volutpat.</p>','<h2>Nullam vehicula magna sit amet magna ullamcorper,</h2><p>&nbsp;at dictum est gravida. Morbi nec magna at quam malesuada accumsan. Suspendisse potenti. Vivamus feugiat massa ut tortor scelerisque, non dapibus nulla consectetur. Aliquam erat volutpat.</p><p>Fusce at nisi arcu. Quisque sed dolor nec dui scelerisque dapibus. Sed at purus at sem aliquet luctus. Sed non massa sit amet sapien porttitor ornare. Vivamus pretium, tortor at tempus ullamcorper, diam ligula lobortis quam, at scelerisque libero lectus ut risus.</p><p>In hac habitasse platea dictumst. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nam eu nunc non augue tincidunt suscipit. Suspendisse potenti. Aliquam erat volutpat. Integer vel turpis sed purus scelerisque euismod.</p><p>Suspendisse potenti. Vivamus non arcu tincidunt, congue massa at, porttitor velit. Curabitur lacinia nisl ut turpis convallis, at dictum urna aliquet. Nullam non urna eget felis interdum feugiat. Morbi vel neque elit. Nullam a luctus leo. Integer maximus sapien in bibendum scelerisque.</p><p>Aliquam erat volutpat. Nullam scelerisque auctor libero, id volutpat est dignissim vitae. Aliquam erat volutpat. Integer laoreet, nisi a tincidunt tincidunt, odio nisl commodo libero, id ultricies sapien purus non odio. Phasellus ac ultricies ex, vel scelerisque libero.</p>','<h2>Nullam vehicula magna sit amet magna ullamcorper,</h2><p>Nullam vehicula magna sit amet magna ullamcorper, at dictum est gravida. Morbi nec magna at quam malesuada accumsan. Suspendisse potenti. Vivamus feugiat massa ut tortor scelerisque, non dapibus nulla consectetur. Aliquam erat volutpat.</p><p>Fusce at nisi arcu. Quisque sed dolor nec dui scelerisque dapibus. Sed at purus at sem aliquet luctus. Sed non massa sit amet sapien porttitor ornare. Vivamus pretium, tortor at tempus ullamcorper, diam ligula lobortis quam, at scelerisque libero lectus ut risus.</p><p>In hac habitasse platea dictumst. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nam eu nunc non augue tincidunt suscipit. Suspendisse potenti. Aliquam erat volutpat. Integer vel turpis sed purus scelerisque euismod.</p><p>Suspendisse potenti. Vivamus non arcu tincidunt, congue massa at, porttitor velit. Curabitur lacinia nisl ut turpis convallis, at dictum urna aliquet. Nullam non urna eget felis interdum feugiat. Morbi vel neque elit. Nullam a luctus leo. Integer maximus sapien in bibendum scelerisque.</p><p>Aliquam erat volutpat. Nullam scelerisque auctor libero, id volutpat est dignissim vitae. Aliquam erat volutpat. Integer laoreet, nisi a tincidunt tincidunt, odio nisl commodo libero, id ultricies sapien purus non odio. Phasellus ac ultricies ex, vel scelerisque libero.</p>','[]',1,'2026-04-19 14:24:36','2026-04-19 14:24:36','2026-04-19 14:24:36');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `services` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_fr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary_fr` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body_fr` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `body_en` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` tinyint unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `services_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (1,'conseil-management','building','Conseil en Management des Organisations','Organisational Management Consulting','Stratégie fiable, outils simples, pour atteindre la performance par anticipation.','Reliable strategy and simple tools to achieve anticipated performance.','Gérer une entreprise demande beaucoup d\'énergie. J\'interviens pour mettre en place une stratégie fiable permettant d\'atteindre la performance escomptée et de prendre les bonnes décisions au moment opportun.\n\nMon intervention couvre : la fidélisation clients, l\'innovation, la qualité des relations internes, fournisseurs et clients.','Running a business takes a great deal of energy. I step in to establish a reliable strategy enabling you to reach expected performance and make the right decisions at the right time.\n\nMy scope covers: customer loyalty, innovation, and the quality of internal, supplier and client relationships.',1,'2026-04-13 11:26:21','2026-04-15 19:27:58'),(2,'conception-gestion-projets','clipboard','Conception et Gestion des Projets','Project Design and Management','+10 ans d\'expérience dans la conduite de projets complexes pour des organisations africaines et internationales.','+10 years of experience managing complex projects for African and international organisations.','Maîtrise de la conception de projets avec +10 ans d\'expérience.\n\nProjet phare : Incubateur d\'entrepreneurs sociaux → +500 jeunes accompagnés, +90 entreprises stables, agrément gouvernemental 2022.\n\nRôles : conception, recherche de financements, mise en œuvre, pilotage d\'équipe, reporting bailleurs.','Project design expertise with +10 years of experience.\n\nFlagship project: Social entrepreneur incubator → +500 young people supported, +90 stable businesses, government accreditation 2022.\n\nRoles: design, fundraising, implementation, team management, donor reporting.',2,'2026-04-13 11:26:21','2026-04-15 19:27:58'),(3,'intelligence-economique','search','Intelligence Économique en Afrique','Economic Intelligence in Africa','+15 ans dans la conduite de missions d\'Intelligence Économique.','+15 years conducting Economic Intelligence missions.','+15 ans dans la conduite de missions d\'IE : procédés défensifs / offensifs / d\'influence.\n\nMissions types :\n- Collecte OSINT\n- Benchmarking — Best Practices\n- Veille OSINT + SWOT\n- Due Diligence\n- Cartographie client\n- Construction d\'argumentaires de lobbying\n- Implémentation de départements IE','+15 years conducting EI missions: defensive / offensive / influence.\n\nTypical missions:\n- OSINT data collection\n- Benchmarking — Best Practices\n- OSINT + SWOT monitoring\n- Due Diligence\n- Client mapping\n- Lobbying strategy building\n- EI department setup',3,'2026-04-13 11:26:21','2026-04-15 19:27:58'),(4,'veille-due-diligence','shield','Veille Stratégique · Due Diligence · Protection des données','Strategic Watch · Due Diligence · Data Protection','Veille concurrentielle, diligence raisonnable et conformité des données personnelles.','Competitive watch, due diligence and personal data compliance.','Veille Stratégique : veille concurrentielle, environnementale et sociétale.\n\nDue Diligence : vérifications juridiques, financières, environnementales et sociales avant toute signature.\n\nProtection des données : conformité aux lois camerounaises et internationales.','Strategic Watch: competitive, environmental and societal monitoring.\n\nDue Diligence: legal, financial, environmental and social checks before any signature.\n\nData Protection: compliance with Cameroonian and international law.',4,'2026-04-13 11:26:21','2026-04-15 19:27:58'),(5,'projets-developpement','globe','Projets de Développement','Development Projects','Conception, gestion opérationnelle, gestion financière et évaluation d\'impact de projets financés par des bailleurs internationaux.','Design, operational management, financial management and impact assessment of internationally funded projects.','Conception, gestion opérationnelle, gestion financière et évaluation d\'impact de projets de développement, notamment financés par des bailleurs internationaux (AICS, CEI, ONG AVSI).\n\nExpérience directe de coordination locale, rédaction de rapports bailleurs, gestion des relations institutionnelles.','Design, operational management, financial management and impact assessment of development projects, notably funded by international donors (AICS, CEI, AVSI NGO).\n\nDirect experience in local coordination, donor reporting, and institutional relations management.',5,'2026-04-13 11:26:21','2026-04-15 19:27:58');
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('6YcKyV2qCMIkahdp3JK6YzrnqvVaEcmJUWLXpV14',NULL,'160.154.232.83','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiSW1yMUdnNW1uUkFoaFA1MDJOUnJuTVRUeVdqUDZ6OWxtaDcwTFZTNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHBzOi8vYXpldW1vLmNsb3VkLmFudXZpcy5uZXQvbWV0aG9kZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1776618516),('FW4Rvk0bv6saYFX1F3sqZEwZOaP6HvOuQACl50B8',NULL,'149.154.161.236','TelegramBot (like TwitterBot)','YTozOntzOjY6Il90b2tlbiI7czo0MDoiRzVWVWRqb2l1Qldwb2pvMUVBSzJVV2x3b1l3SFRkdWtJNDJvMG54bSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHBzOi8vYXpldW1vLmNsb3VkLmFudXZpcy5uZXQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1776618326),('reQldrhHFm9gyJQqmMMXvJgRVyjG2FFifQk9xyOT',NULL,'160.154.232.83','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoick5ZUmpacjFyU3pZNWVweDA2WGU4VzZvbHlyRzZwRGJBdmM0MjJXdSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHBzOi8vYXpldW1vLmNsb3VkLmFudXZpcy5uZXQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1776618333),('t2WuueF4Z87fxVvSryH20b16vVsqXK5dDOELcVbd',1,'104.28.163.109','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiOXVPaVhWZjJRMHhIaXF5Szd5dFpkSlpCWWN4UGhSTGxFa1lpUEZYYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHBzOi8vYXpldW1vLmNsb3VkLmFudXZpcy5uZXQvc2VydmljZXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=',1776619735);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Steve Azeumo','admin@azeumo.com',NULL,'$2y$12$ZaEqtQ56zWb7oECcNO8fLerqECkmp19cxMgmg4J254R.iCol55Mx6','qphWkF6RTZ0zxHmPB52nLw4ctY8OvOPHVVqdenmKjlwisUCVJyeRdHiVNSD9','2026-04-13 11:26:33','2026-04-18 22:08:13');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-04-19 19:17:54
