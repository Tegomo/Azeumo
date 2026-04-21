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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (10,'lintelligence-economique-au-service-du-developpement-africain-1776615876','/images/blog/la-place-de-lafrique-dans-la-mondialisation-1776758085.jpeg','la place de l\'Afrique dans la mondialisation','la place de l\'Afrique dans la mondialisation','<p>&nbsp; &nbsp; &nbsp; L\'histoire d\'un peuple, pour parler comme les historiens, nous renseigne sur l\'évolution passée de ce dernier. Et c\'est dans les faits retracés par celle-ci que l\'intellectuel et l\'analyste peuvent se permettre de détecter,</p>','<p>&nbsp; &nbsp; &nbsp; L\'histoire d\'un peuple, pour parler comme les historiens, nous renseigne sur l\'évolution passée de ce dernier. Et c\'est dans les faits retracés par celle-ci que l\'intellectuel et l\'analyste peuvent se permettre de détecter,</p>','<h2><strong>LA&nbsp; PLACE DE L\'AFRIQUE DANS LA MONDIALISATION</strong></h2><h2><br>&nbsp;</h2><p><i>\"L\'histoire a pour égout des temps comme les nôtres;</i></p><p><i>Et c\'est là que la table est mise pour vous autres\".</i></p><p><i><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong></i><strong>Victor HUGO, </strong>les châtiments (1853)</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp; &nbsp; &nbsp; L\'histoire d\'un peuple, pour parler comme les historiens, nous renseigne sur l\'évolution passée de ce dernier. Et c\'est dans les faits retracés par celle-ci que l\'intellectuel et l\'analyste peuvent se permettre de détecter,&nbsp; d\'analyser et d\'apporter à la lumière une nouvelle direction, quand l\'ancienne est jugée inefficace. Ce faisant une question majeure semble se poser d\'elle-même, celle de savoir: quelle était&nbsp; l\'ancienne direction? La réponse à cette question est d\'autant plus rhétorique que le contexte actuel de mondialisation masque les frontières et les identités, les cultures et les systèmes de pensées, et tout questionnement s\'inscrivant dans l\'analyse des faits antérieurs est presque toujours perçue comme une transgression à la nouvelle loi et idéologie en place. Le présent article n\'a pas la prétention de donner une leçon d\'histoire au lecteur, ni même l\'ambition de faire une rétrospection exhaustive sur les faits passés. Il se donne pour tâche de donner l\'impulsion ou encore le ton, afin, qu\'à travers un réveil des consciences longtemps endormis, l\' Afrique, et&nbsp; en l\'occurrence la jeunesse Africaine, de ce début du 21ème siècle se mette au nouveau diapason, car il est évident aujourd\'hui que l\'Afrique est passée par des époques et des révolutions, cependant aucune époque ni aucune révolution ne se reconnait sa paternité ( il n\'est nullement question ici d\'une révolution comme celle de l\'empire Romain des siècles avant Jésus-Christ, qui consisterait en une annexion des territoires ou économies) ni même aussi d\'une révolution qui soit semblable à celle française de 1789, et consisterait, elle, à un soulèvement contre les régimes en place, mais d\'une nouvelle forme de révolution axée dans la réflexion sur l\'identité de l\'Afrique et de l\'Africain dans un monde où la frontière entre l\'espace continentale et l\'espace intercontinentale déjà n\'existe plus. Le présent article aura ainsi pour ambition de présenter dans une première partie une Afrique différente de celle que nous connaissons et dont l\'histoire constitue fondamentalement un héritage aux peuples Africains, lancés sur les sentiers de l\'assimilation et du sous-développement; La deuxième partie s\'attellera à développer une réflexion sur la question de l’identité de l’Africain ou de son être-au-monde.&nbsp;<strong> &nbsp;&nbsp;</strong></p><p><br>&nbsp;</p><p><br>&nbsp;</p><p><strong>L\'Afrique dans sa tradition</strong></p><p><br>&nbsp;</p><p>&nbsp; &nbsp; La tendance actuelle dans le monde entier et même en Afrique est de parler justement de cette dernière comme si elle datait de la période des indépendances. Comme si elle était un vaste territoire sauvage et sans civilisation qu\'on aurait découvert au XIXème siècle, et à qui il aurait fallu tout apprendre comme à un nouveau-né. L\'objet de cette section est d\'apporter un contredit à cette conception des choses car l\'Afrique, bien avant la&nbsp; période coloniale existait et avait une organisation politique, économique et sociale qui surprendrait plus d\'une personne aujourd\'hui, à commencer par les Africains même.</p><p>&nbsp; &nbsp; C’est l\'histoire longue d\'une tradition Africaine qui s\'est étalée sur des siècles avant et après notre ère, et dont nos ancêtres s\'étaient donnés pour mission de transmettre l\'originalité de génération en génération et pour principe de ne point faillir à cette tâche. Cette tradition Africaine par essence à pendant des millénaires nourrie l\'organisation sociale, économique et même politique de notre continent avant l\'arrivée des premiers explorateurs blancs.</p><p>&nbsp;</p><p><strong>De l\'organisation sociopolitique</strong></p><p><br>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;&nbsp; &nbsp; L\'organisation sociale de l\'Afrique d\'alors est soutenue par une morale et une éthique forte et dépositaire de la valeur humaine. Les relations entre individus et groupes d\'individus manifestes un certain degré de cohésion et à la fois d\'hiérarchisation au sein des groupes sociaux, ce qui conduit Léopold S. Senghor à voir dans cette société traditionnelle Africaine <i>un socialisme tout fait</i>(1).</p><p>&nbsp; Les faits nous rapporte d\'ailleurs aussi que la démocratie a existée en Afrique avant la période coloniale, et les formes de gouvernements d\'alors étaient calquées sur des grands principes tels que: le consensus, la tolérance, le respect du bien public, la confiance, la loyauté. La société est organisée en groupes, et à la tête de chaque groupe se trouve un chef, qui d\'après les critères du peule doit revêtir une certaine humilité et posséder une bonne dose de patience. La principale mission qui est confié à ce dernier est&nbsp; la création d\'un cadre social mue par l\'amour et l\'amitié, et où chaque citoyen puisse participer à la prise de décision. L\'arbre à palabre est par définition le lieu public et stratégique, un peu comme les assemblées générales d\'aujourd\'hui, où sont débattus et discutés les questions et les problèmes de la communauté. Bref, l\'organisation sociopolitique de l\'Afrique précoloniale est forte dépositaire des fondements de la démocratie. Il n\'est donc pas eu besoin à l\'époque de voyager pour la Grèce, ou de suivre un savant exposé d\'Aristote sur la démocratie pour appliquer les principes démocratiques de base.</p><p>&nbsp;</p><p><strong>De l\'organisation économique</strong></p><p>&nbsp;</p><p>&nbsp; &nbsp; L\'échange qui est connu pour être l\'une des caractéristiques fondamentales de&nbsp; l\'économie, est d\'ores et déjà au cœur des relations entre individus et groupes sociaux, et on va progressivement assister à une apparition des communautés d\'échanges. Les économies Africaines, pour la plus part, sont organisées autour de ces systèmes d\'échanges et durant plusieurs siècles, les biens vont s\'échanger contre les biens, les produits contre les produits, ce qui va conduire les historiens à les qualifier d’économies de troc. Les Africains avaient alors compris, et comme le démontrait Aristote, <i>qu\'&nbsp;«&nbsp;il n\'y a pas de communauté sans échange&nbsp;».</i></p><p><i>&nbsp;&nbsp; </i>L’agriculture existe déjà en Afrique 2000 ans avant Jésus-Christ (2), et constitue en elle-même une source de subsistance pour les populations. Les agriculteurs s’organisent en groupes ou communautés de profession afin d’être plus productifs&nbsp;; ils constituent des greniers communautaires, du moins dans certaines régions afin d’assurer une satisfaction de leurs besoins quotidien, s’inscrivant ainsi dans une vision long-termiste de leur consommation.</p><p>&nbsp; &nbsp; La solidarité plus que la concurrence est prônée. La solidarité est tenue pour valeur sociale, et la culture populaire en est faite. L’économie est basée sur le partage des fruits de la production entre les membres de la communauté, et ces principes solidaires limitent les dérives et les souffrances humanitaires que nous déplorons de nos jours (…) Ce&nbsp;<i>« socialisme complet&nbsp;»</i> et<strong> économie de partage </strong>sera pris pour leur compte par plusieurs pays Européens, qui &nbsp;en feront le socle de leurs modèles de développement économique.</p><p>&nbsp;&nbsp; «&nbsp;<i>La monnaie comme unité de compte serait apparue dès le début de la civilisation urbaine</i>&nbsp;»(3).L’Afrique a compris la nécessité d’un tel élément «&nbsp;<i>dans la facilitation du calcul économique et pour rendre à la fois aisées et équitables les transactions&nbsp;»</i> (4). La monnaie n’est pas encore ce que nous savons d’elle aujourd’hui, c’est-à-dire réserve de valeur et moyen de paiements. Elle est essentiellement utilisée comme numéraire dans les transactions, et va prendre différentes formes d’une région à une autre&nbsp;; ainsi, on aura du <i>«&nbsp;tissu à Bornu, servant de garantie d’échange, en Sénégambie et surtout chez les Wolof, du métal ferreux sur la côte de la Haute-Guinée, barres de cuivre dans le Delta du Niger&nbsp;; Cependant, il y aussi des monnaies à vocation interrégionale&nbsp;: d’abord,&nbsp; l’or dont on observe la circulation dans l’ouest Soudan et dans les régions forestières du royaume ashanti&nbsp; au XIe siècle, et qui y existait «&nbsp;probablement avant&nbsp;» sous forme de poudre, soit de pièces (le mithgal frappé à Nikki au Bénin actuel).</i> <i>Ensuite, le cauri dont on décèlera l’utilisation plus tard (au XVe siècle en Mauritanie). Afin de parer à l’insuffisance de l’or&nbsp;». (5)</i> Le secteur bancaire de l’époque n’est peut-être pas aussi vaste et complexe que ce que nous connaissons aujourd’hui, mais il tout aussi organisé&nbsp;; C’est ainsi que <i>«&nbsp;l’organisation du crédit et du financement comprend deux catégories d’institutions&nbsp;: au niveau du village, il y a des associations de crédit telles les esusu yorouba, destinées à collecter des fonds à des fins essentiellement sociales comme les funérailles. Au niveau national et international, on a des marchés de capitaux où opèrent les marchands et les banquiers spécialisés, implantés dans les grands centres, les entrepôts&nbsp;: ils financent les activités au nom de leur clientèle et spéculent sur la «&nbsp;valeur&nbsp;» des monnaies&nbsp;». (6)</i></p><p>&nbsp;</p><p>&nbsp;&nbsp; L’Afrique antique est donc structurée autour des valeurs culturelle, organisationnelle,&nbsp; éthique et est fortement attachée à sa tradition. Toutefois, la mondialisation, comme nous l’avons souligné au début de cet article, soulève dans l’Afrique moderne et partout dans le monde la question de l’assimilation des peuples, c’est-à-dire leur déracinement vis-à-vis de leurs traditions, le dénie de leurs cultures et le rejet de leur véritable identité.</p><p>&nbsp;</p><p><strong>DE L’IDENTITE</strong></p><p><i>&nbsp; &nbsp;</i> &nbsp; L\'identité d\'un peule ne se forge pas en une cinquantaine d\'années, ni même en une centaine, mais durant des siècles et à travers les civilisations et les cultures qui le compose. C\'est l\'élément ou la caractéristique fondamentale qui permet à ce dernier de connaître et de comprendre sa différence et donc sa spécificité. Une rétrospection est donc, loin s\'en faut, un signe de faiblesse, mais juste un recul, nécessaire à l\'ajustement préalable qui permettra de faire le bon décisif vers l\'émergence: car \"le passé permet d\'ordonner le présent pour se projeter dans le futur\". L\'histoire n\'est donc pas sans utilité. Non. Car si nous estimons que cinquante ans ne saurait suffire pour imprimer une identité à un peuple, nous estimons aussi qu\'en cinquante ans&nbsp; l\'identité de ce dernier peut être biaisé voir même complètement supplantée aux risques et périls de son progrès. L’Afrique est typiquement aujourd\'hui plongée dans cette situation, et le temps se prête encore bien à un retour à sa véritable identité. La principale caractéristique de la mondialisation aujourd’hui, c\'est qu\'elle a la rageuse tendance à effacer les identités et les cultures des peuples et à les assimiler à celles des puissances dominantes dont la seule ambition est d\'imposer leur système de pensées. Nous sommes donc au cœur de la révolution la plus violente que le monde n’ait jamais connu: <i><strong>La révolution culturelle</strong></i>.&nbsp; L’identité d\'un peule découle directement de sa culture originelle; cela signifie que: qui tient la culture tient l\'identité, et c\'est curieusement la mission que le monde semble avoir assigné à la grande mondialisation. Les multiples frustrations et séquelles psychologiques hérités de la colonisation ont conduit les Africains tels que <strong>Kwamé Nkrumah</strong>, <strong>Léopold Sédar Senghor</strong>, à prôner l\'unité de l\'Afrique (à travers le mouvement du Panafricanisme) pour l\'un et à défendre l\'émancipation de la culture noire (à travers le mouvement de la Négritude) pour l\'autre. Ces pères qui avaient pour vision une Afrique différente de celle qui prévalait alors, ont par leurs actions, quoiqu’elles ne fussent pas coordonnées, initiés un long processus de restauration et de démêlement du méli-mélo culturelle qui avaient poussé beaucoup d\'observateurs à qualifier les intellectuels africains&nbsp; d\'analphabètes à l\'entrée du vestibule de la mémoire perdue de nos ancêtres.</p><p>&nbsp; &nbsp; Pour CHINDJI-KOULEU, philosophe Camerounais et auteur du livre<i> Négritude, Philosophie et mondialisation,&nbsp;«&nbsp; l\'Afrique noire traverse en ce moment une période de transition vers sa propre prise en&nbsp; charge. Viendra donc le temps d\'assurer son propre être-au-monde&nbsp;».</i> Pour que donc se concrétise ce temps de sa propre prise en charge, elle doit non chercher à effacer son passé, moins encore retourner dans celui-ci, mais elle doit faire un intelligent recours à ses sources (...)</p><p>&nbsp;&nbsp; &nbsp;</p><p>&nbsp;&nbsp; L\'Afrique doit définitivement se soustraire du cycle des revendications et des accusations vis-à-vis de l\'occident (Europe et Amérique) pour s\'intégrer dans une nouvelle dynamique: celle du changement de mentalité et l\'ouverture d\'une nouvelle page de son histoire; celle de l\'action, ou plus généralement ce que CHINDJI-KOULEU désigne dans <i>Négritude, philosophie et mondialisation</i> par un retour à une situation normale. Cette situation normale, caractérisée par un changement de mentalité sera le préalable<i> sine qua none</i> pour l\'acheminement vers un progrès économique, politique et culturel, le tout porté par un fort rayonnement culturel.</p><p>&nbsp; L’Afrique doit également remettre à l’ordre du jour le concept de l’unité Africaine, longtemps prôné par Kwamé Nkrumah, le premier président de la république du Ghana, afin de s’arrimer aux exigences imposées par l’avènement du concept d’économie monde, et qui implique un certain niveau de compétitivité et d’autonomie de sa part&nbsp;; Elle devra donc constituer un bloc uni, à l’exemple des autres pôles stratégico-économiques que sont l’Europe et les Etats-Unis, afin d’opposer aux attaques des marchés&nbsp; internationaux une résilience à même de protégés ses intérêts et surtout ses couches sociales les plus faibles.</p><p>&nbsp;</p><p>&nbsp;&nbsp; En fin, nous pouvons dire avec Joseph TCHUNDJANG POUEMI <i>que</i>&nbsp;«<i>l’Afrique devrait rompre avec le passivisme, fermer les oreilles aux mythes qui la condamnent à la misère, ne pas céder à l’illusion déterministe et avoir une véritable attitude prospective, celle qui accepte les faits mais non les fatalités, explorer l’avenir pour discerner, aujourd’hui, les moyens de l’occuper&nbsp;».</i><br>&nbsp;</p><p><i><strong>&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong></i></p><p><i><strong>&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</strong></i><strong>Marius FOKA&nbsp;; Azeumo Steve</strong></p><p><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong><br>&nbsp;</p><p><strong>REFERENCES</strong><br>&nbsp;</p><p><strong>(1) CHINDJI-KOULEU</strong><i><strong> </strong></i><strong>(2001)</strong><i><strong>&nbsp;: Négritude, philosophie et mondialisation, Editons CLE p.</strong></i></p><p><strong>(23), (4)) 5), (6) Joseph TCHUNDJANG POUEMI (1980)&nbsp;:</strong><i><strong> Monnaie, servitude et liberté, la répression monétaire de l’Afrique, éditions j.a.</strong></i></p><p><br>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p><br>&nbsp;</p>','<h2>Nullam vehicula magna sit amet magna ullamcorper,</h2><p>Nullam vehicula magna sit amet magna ullamcorper, at dictum est gravida. Morbi nec magna at quam malesuada accumsan. Suspendisse potenti. Vivamus feugiat massa ut tortor scelerisque, non dapibus nulla consectetur. Aliquam erat volutpat.</p><p>Fusce at nisi arcu. Quisque sed dolor nec dui scelerisque dapibus. Sed at purus at sem aliquet luctus. Sed non massa sit amet sapien porttitor ornare. Vivamus pretium, tortor at tempus ullamcorper, diam ligula lobortis quam, at scelerisque libero lectus ut risus.</p><p>In hac habitasse platea dictumst. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nam eu nunc non augue tincidunt suscipit. Suspendisse potenti. Aliquam erat volutpat. Integer vel turpis sed purus scelerisque euismod.</p><p>Suspendisse potenti. Vivamus non arcu tincidunt, congue massa at, porttitor velit. Curabitur lacinia nisl ut turpis convallis, at dictum urna aliquet. Nullam non urna eget felis interdum feugiat. Morbi vel neque elit. Nullam a luctus leo. Integer maximus sapien in bibendum scelerisque.</p><p>Aliquam erat volutpat. Nullam scelerisque auctor libero, id volutpat est dignissim vitae. Aliquam erat volutpat. Integer laoreet, nisi a tincidunt tincidunt, odio nisl commodo libero, id ultricies sapien purus non odio. Phasellus ac ultricies ex, vel scelerisque libero.</p>','[]',1,'2026-04-19 14:24:36','2026-04-19 14:24:36','2026-04-21 05:54:45'),(11,'article-1-1776757878','/images/blog/article-1-1776757878.jpeg','Le Nouvel Ordre Mondial monétaire','Le Nouvel Ordre Mondial monétaire','<p>A bien des égards, même si la mondialisation profite aux africains, il n’en demeure pas moins que pour eux, elle est plutôt source d’ennuis, de soucis, d’inquiétudes. De l’homme de la rue&nbsp;;&nbsp;</p>','<p>A bien des égards, même si la mondialisation profite aux africains, il n’en demeure pas moins que pour eux, elle est plutôt source d’ennuis, de soucis, d’inquiétudes. De l’homme de la rue&nbsp;;&nbsp;</p>','<p>&nbsp;&nbsp;</p><p>«&nbsp;<strong>Le Nouvel Ordre Mondial monétaire est une Aubaine pour cette Afrique Unie et forte et un malheur pour celle-là qui va en rang dispersé</strong>&nbsp;»</p><p>A bien des égards, même si la mondialisation profite aux africains, il n’en demeure pas moins que pour eux, elle est plutôt source d’ennuis, de soucis, d’inquiétudes. De l’homme de la rue&nbsp;; en passant par quelques intellectuel Africain ; tous sont d’accord pour dire que la mondialisation est une forme d’exploitation des pays africains par les pays occidentaux. «&nbsp;Ils ne se donnent aucune limite qu’il s’agisse de l’exploitation des richesses ou de l’exploitation humaine&nbsp;; Afin d’atteindre leurs objectifs, sans que personne ne puisse leur reprocher bien que soupçonneux&nbsp;». Ils créent des structures spécialisées en la matière, et des Programmes d’Ajustement Structurel (PAS)&nbsp;; Plus loin même, ils sont toujours soupçonnés de concevoir les politiques des pays pauvres à la place de leurs dirigeants. Dans ce monde lancé dans une Economie Intelligente, où tout Organisme est à la recherche des stratégies pour rester compétitif il est presqu’unanimement reconnu que les politiques commerciales et de partenariat ne profitent qu’aux Etats de l’hexagone,&nbsp;des exemples sont pris (cas des accords de partenariat Union Européenne - ACP sur le commerce des denrées de consommations à prix raisonnables. Également, le binôme infernal aide-crédit concessionnel qui serai un outil de promotion des intérêts du bailleur de fond.</p><p>&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; S’il est vrai que toute ces inquiétudes sont légitimes, il n’en demeure pas moins vrai que Pour d’autres intellectuels à l’instar du camerounais Alain Bindjouli Bindjouli dans L’Afrique noire face aux pièges de la mondialisation (L’Harmattan, 2006), le principal problème de l’Afrique face à la mondialisation c’est les africains eux-mêmes. Cet auteur, pour ne citer que celui-là, prône alors d’une manière globale un réveil de l’Afrique, afin qu’elle se prenne en main et puisse avancer. Bondant dans son sens, et ce Au regard de l’Environnement Africain, il faut dire que l’une des faiblesses de l’Afrique actuellement dans ce village planétaire, c’est son incapacité avérée, à faire à temps réel, de la surveillance de l’information, du traitement de l’information, et pouvoir l’utiliser afin de satisfaire ses acteurs économiques et prendre des décisions à temps réel. Peu de politiques Africains se prononce à temps réel sur des questions internationales&nbsp;; Des chefs d’entreprises bataillent pour avoir une information sensé être basic&nbsp;; ce qui retarde leur prise de décisions d’où l’impact sur leur productivité&nbsp;; Dans nos Organisations,(publics&nbsp;;para publics&nbsp;; privés) les flux et la chaine&nbsp; d’informations encore mal coordonné font ralentir les process de&nbsp; prise de décision et d’exécution des calendriers&nbsp;; ce qui est une opportunité pour les détourneurs et corrupteurs. les Organismes internationaux &nbsp; parmi lesquels FMI, OMS&nbsp;; sont surement des organismes de veille, mais la veille conduite par ces organismes ne saurait continuer à bénéficier seulement à une seule partie, mais à tous les Etats membres, parmi lesquels le Cameroun, qui devrait utiliser le flux informationnelle assez important qui y découle pour pouvoir être compétitif&nbsp;; car dans un monde où tous sont des loups&nbsp;; vaut mieux être aussi un loup que de se comporter en gazelle&nbsp;; car là&nbsp;, même le louveteau nous mangera&nbsp;; louveteau d’autrefois aujourd’hui devenu une louve aux terrifiantes ongles et à l’intelligence économiquement impressionnante (la chine).</p><p>Il est donc question de mettre à disposition des pays Africain et du Cameroun en particulier des mécanismes et pratiques d’Intelligence Economique et Stratégique tenant compte de nos cultures, nos spécificités et relevant de l’autorité de l’Etat, du privé&nbsp;; et de la société civile, afin de se montrer plus que jamais compétitif et pouvoir bénéficier pleinement des avantages qui sont les nôtres dans les structures dite ici de veille internationales (FMI&nbsp;;OMS…)&nbsp;</p><p>Steve William Azeumo</p>','<p>&nbsp;&nbsp;</p><p>«&nbsp;<strong>Le Nouvel Ordre Mondial monétaire est une Aubaine pour cette Afrique Unie et forte et un malheur pour celle-là qui va en rang dispersé</strong>&nbsp;»</p><p>A bien des égards, même si la mondialisation profite aux africains, il n’en demeure pas moins que pour eux, elle est plutôt source d’ennuis, de soucis, d’inquiétudes. De l’homme de la rue&nbsp;; en passant par quelques intellectuel Africain ; tous sont d’accord pour dire que la mondialisation est une forme d’exploitation des pays africains par les pays occidentaux. «&nbsp;Ils ne se donnent aucune limite qu’il s’agisse de l’exploitation des richesses ou de l’exploitation humaine&nbsp;; Afin d’atteindre leurs objectifs, sans que personne ne puisse leur reprocher bien que soupçonneux&nbsp;». Ils créent des structures spécialisées en la matière, et des Programmes d’Ajustement Structurel (PAS)&nbsp;; Plus loin même, ils sont toujours soupçonnés de concevoir les politiques des pays pauvres à la place de leurs dirigeants. Dans ce monde lancé dans une Economie Intelligente, où tout Organisme est à la recherche des stratégies pour rester compétitif il est presqu’unanimement reconnu que les politiques commerciales et de partenariat ne profitent qu’aux Etats de l’hexagone,&nbsp;des exemples sont pris (cas des accords de partenariat Union Européenne - ACP sur le commerce des denrées de consommations à prix raisonnables. Également, le binôme infernal aide-crédit concessionnel qui serai un outil de promotion des intérêts du bailleur de fond.</p><p>&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; S’il est vrai que toute ces inquiétudes sont légitimes, il n’en demeure pas moins vrai que Pour d’autres intellectuels à l’instar du camerounais Alain Bindjouli Bindjouli dans L’Afrique noire face aux pièges de la mondialisation (L’Harmattan, 2006), le principal problème de l’Afrique face à la mondialisation c’est les africains eux-mêmes. Cet auteur, pour ne citer que celui-là, prône alors d’une manière globale un réveil de l’Afrique, afin qu’elle se prenne en main et puisse avancer. Bondant dans son sens, et ce Au regard de l’Environnement Africain, il faut dire que l’une des faiblesses de l’Afrique actuellement dans ce village planétaire, c’est son incapacité avérée, à faire à temps réel, de la surveillance de l’information, du traitement de l’information, et pouvoir l’utiliser afin de satisfaire ses acteurs économiques et prendre des décisions à temps réel. Peu de politiques Africains se prononce à temps réel sur des questions internationales&nbsp;; Des chefs d’entreprises bataillent pour avoir une information sensé être basic&nbsp;; ce qui retarde leur prise de décisions d’où l’impact sur leur productivité&nbsp;; Dans nos Organisations,(publics&nbsp;;para publics&nbsp;; privés) les flux et la chaine&nbsp; d’informations encore mal coordonné font ralentir les process de&nbsp; prise de décision et d’exécution des calendriers&nbsp;; ce qui est une opportunité pour les détourneurs et corrupteurs. les Organismes internationaux &nbsp; parmi lesquels FMI, OMS&nbsp;; sont surement des organismes de veille, mais la veille conduite par ces organismes ne saurait continuer à bénéficier seulement à une seule partie, mais à tous les Etats membres, parmi lesquels le Cameroun, qui devrait utiliser le flux informationnelle assez important qui y découle pour pouvoir être compétitif&nbsp;; car dans un monde où tous sont des loups&nbsp;; vaut mieux être aussi un loup que de se comporter en gazelle&nbsp;; car là&nbsp;, même le louveteau nous mangera&nbsp;; louveteau d’autrefois aujourd’hui devenu une louve aux terrifiantes ongles et à l’intelligence économiquement impressionnante (la chine).</p><p>Il est donc question de mettre à disposition des pays Africain et du Cameroun en particulier des mécanismes et pratiques d’Intelligence Economique et Stratégique tenant compte de nos cultures, nos spécificités et relevant de l’autorité de l’Etat, du privé&nbsp;; et de la société civile, afin de se montrer plus que jamais compétitif et pouvoir bénéficier pleinement des avantages qui sont les nôtres dans les structures dite ici de veille internationales (FMI&nbsp;;OMS…)&nbsp;</p><p>Steve William Azeumo</p>','[]',1,'2026-04-21 05:51:18','2026-04-21 05:51:18','2026-04-21 05:55:36');
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
INSERT INTO `sessions` VALUES ('04Hd77iyhe1BY4EUiJQJMtXWKsbawL6miFZBWSxo',NULL,'104.28.96.61','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_1) AppleWebKit/601.2.4 (KHTML, like Gecko) Version/9.0.1 Safari/601.2.4 facebookexternalhit/1.1 Facebot Twitterbot/1.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiZnJBdm1JdUk5UlpWOXZCZndGWVVTSlJJWDN0UDRHclM4T0VidDh5UyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHBzOi8vYXpldW1vLmNsb3VkLmFudXZpcy5uZXQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1776754616),('0Ljbj5CWdU2U6WqOEH8ufLQMQqfWNU3UR2vw5wai',NULL,'104.28.96.61','Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaDNPZ3VqMG5Jc1k0MTQyUWNRdU5TWnF4NDZRMFVBajIwNjZLNmlpViI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNzoiaHR0cHM6Ly9hemV1bW8uY2xvdWQuYW51dmlzLm5ldC9hZG1pbiI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM3OiJodHRwczovL2F6ZXVtby5jbG91ZC5hbnV2aXMubmV0L2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1776758186),('CmXGvSojjpzpCq3F16vqm3Bq1BgwmeFesW9GnDNp',NULL,'160.154.244.189','Mozilla/5.0 (iPhone; CPU iPhone OS 26_3_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) EdgiOS/146.0.3856.102 Version/26.0 Mobile/15E148 Safari/604.1','YTozOntzOjY6Il90b2tlbiI7czo0MDoicXNzWnVVS3RzWUIweGF5cDJSajNZYjg5dFRPanFTZ1R0dTNtT1J3VCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDg6Imh0dHBzOi8vYXpldW1vLmNsb3VkLmFudXZpcy5uZXQvbWVudGlvbnMtbGVnYWxlcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1776755975),('eaOR5TrQj0te2D1LSyqipY4GNmJGncRXfNNwFjON',NULL,'104.28.164.131','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoic244cGt1MFNRdUc3dVVmUjhIVGZHeXNiMVhjeldDOVJDaEpuc3hFbSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHBzOi8vYXpldW1vLmNsb3VkLmFudXZpcy5uZXQvYS1wcm9wb3MiO31zOjM6InVybCI7YToxOntzOjg6ImludGVuZGVkIjtzOjM3OiJodHRwczovL2F6ZXVtby5jbG91ZC5hbnV2aXMubmV0L2FkbWluIjt9fQ==',1776758485),('lt1fpqrn4jUE5kM6LbKtmmQqFDpkVoYaM9yNMBkw',NULL,'104.28.96.61','Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1','YTozOntzOjY6Il90b2tlbiI7czo0MDoiTXhTQ3ZPZGc1VVVhdDhCTnpEaFIza1J0Mm5sRmd3NFZzNXFhQlJwNyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHBzOi8vYXpldW1vLmNsb3VkLmFudXZpcy5uZXQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1776754616),('o7jxbq9X5ZoCRfObpC4jGDwhZc21XPqsmeL45Fl8',NULL,'104.28.96.60','Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNzdDTDRyVGlyTjdKS2ZrR0NMTjdsWkkwZUk4bm04Y1haMkcyM3p5OSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNzoiaHR0cHM6Ly9hemV1bW8uY2xvdWQuYW51dmlzLm5ldC9hZG1pbiI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM3OiJodHRwczovL2F6ZXVtby5jbG91ZC5hbnV2aXMubmV0L2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1776758326),('QB0AnZFH8QnCEckdxtg6Iym6ADj6DAwexZN5wTYU',NULL,'104.28.96.60','Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1','YTozOntzOjY6Il90b2tlbiI7czo0MDoiNmdZalhMamFDYUdBWHAxRm5NQlI0VmY1UW9vdmE0UU5hNTB1SEJBRSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHBzOi8vYXpldW1vLmNsb3VkLmFudXZpcy5uZXQvYS1wcm9wb3MiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1776756146),('v1BI7qOFsWPeWD1ojlNVCTnVOhNXR53kbVdE3dG6',NULL,'104.28.96.62','Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1','YTozOntzOjY6Il90b2tlbiI7czo0MDoiQkFQZjhrYWdpdWJPSG9OdFZ5c1BYVWxETEdFM1hhdFlLTm1IUVJRTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHBzOi8vYXpldW1vLmNsb3VkLmFudXZpcy5uZXQvbWV0aG9kZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1776756415);
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
INSERT INTO `users` VALUES (1,'Steve Azeumo','admin@azeumo.com',NULL,'$2y$12$ZaEqtQ56zWb7oECcNO8fLerqECkmp19cxMgmg4J254R.iCol55Mx6','ycDBRg6OPQTwxNHdzJlJMdONLi6ZTEl2LdYFObXLNTEDEK0KyBk2Bncaa8V0','2026-04-13 11:26:33','2026-04-18 22:08:13');
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

-- Dump completed on 2026-04-21  8:05:43
