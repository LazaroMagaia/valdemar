-- MySQL dump 10.13  Distrib 8.0.36, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: valdemar
-- ------------------------------------------------------
-- Server version	8.0.40-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Administração','fas fa-cogs','Gerência\r\nAssistente administrativo\r\nSecretariado','2024-10-29 22:35:35','2024-11-15 05:46:36'),(2,'Tecnologia da Informação',NULL,'Desenvolvimento de software\r\nSuporte técnico\r\nAnálise de sistemas','2024-10-29 22:35:46','2024-10-29 22:35:46'),(3,'Vendas e Marketing',NULL,'Representante de vendas\r\nMarketing digital\r\nGestão de produtos','2024-10-29 22:36:09','2024-10-29 22:36:09'),(4,'Recursos Humanos',NULL,'Recrutamento e seleção\r\nTreinamento e desenvolvimento\r\nGestão de talentos','2024-10-29 22:36:36','2024-10-29 22:36:36'),(5,'Finanças',NULL,'Contabilidade\r\nAnálise financeira\r\nControladoria','2024-10-29 22:36:47','2024-10-29 22:36:47'),(6,'Saúde',NULL,'Médicos\r\nEnfermeiros\r\nTécnicos de saúde','2024-10-29 22:36:57','2024-10-29 22:36:57'),(7,'Engenharia',NULL,'Engenharia civil\r\nEngenharia elétrica\r\nEngenharia de produção','2024-10-29 22:37:06','2024-10-29 22:37:06'),(8,'Serviços Gerais',NULL,'Limpeza\r\nManutenção\r\nSegurança','2024-10-29 22:37:14','2024-10-29 22:37:14'),(9,'Educação',NULL,'Professores\r\nCoordenadores pedagógicos\r\nOrientadores educacionais','2024-10-29 22:37:31','2024-10-29 22:37:31'),(10,'Logística e Transporte',NULL,'Motoristas\r\nGerente de logística\r\nArmazenagem e distribuição','2024-10-29 22:37:40','2024-10-29 22:37:40');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(7,'2024_10_29_220443_create_categories_table',2),(8,'2024_10_30_000948_create_vagas_table',2),(10,'2024_10_30_011511_create_vaga_funcoes_table',3),(11,'2024_10_30_020337_create_vaga_requirements_table',4),(12,'2024_10_30_030353_create_vagas_candidaturas_table',5),(14,'2024_11_15_073531_add_icon_to_categories_table',6),(15,'2024_11_15_090821_add_provincia_to_vagas_table',7),(17,'2024_11_15_114805_create_user_profiles_table',8);
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
INSERT INTO `sessions` VALUES ('IztUhqje4as9Ixu3aAQAJdFKVEXQVl93vUT60oQj',14,'127.0.0.1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWFhiUFF2NTd2aVBGTE5kTXFxdUZnbklLVzluZDVxUmxVNGNHWUl3MCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jbGllbnQvYXBwbGllZF9jYW5kaWRhdGVzIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTQ7fQ==',1731679192),('Yb7Ys8i32n3pudyRly9bX8DNitMYjydA96Qqg9ZL',NULL,'127.0.0.1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiT2JlTWs1WGV1VnJFcE1aWW1teWdTczNURUJxZUx5SG04S01QZ3l1cCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9yZWdpc3RlciI7fX0=',1731679970);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_profiles`
--

DROP TABLE IF EXISTS `user_profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_profiles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `cv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthdate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `education_level` enum('Básico','Médio','Técnico','Licenciatura','Mestrado','Doutorado') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_complete` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_profiles_user_id_foreign` (`user_id`),
  CONSTRAINT `user_profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_profiles`
--

LOCK TABLES `user_profiles` WRITE;
/*!40000 ALTER TABLE `user_profiles` DISABLE KEYS */;
INSERT INTO `user_profiles` VALUES (1,14,'Coop','827017601',NULL,'cv/2Ck7qWnaSb9FjWwwabYmnwd1XyCfDEpUBT6nQRr9.pdf',NULL,'male','1996-11-04','Maputo','Maputo','Básico',0,'2024-11-15 10:25:20','2024-11-15 10:36:35');
/*!40000 ALTER TABLE `user_profiles` ENABLE KEYS */;
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
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Lazaro Magaia','llmagaia2@gmail.com',NULL,'$2y$12$/50ipRSI8JQTCTboHoLu3.xXYUxuL14hptzKPURnKvP3ltfOiz4Gi','admin',NULL,'2024-10-29 08:42:44','2024-10-29 08:42:44'),(12,'Lazaro Magaia','llmagaia3@gmail.com',NULL,'$2y$12$ViZ2qpur2ysP0kTrDAbX8O2.8eTZOvFl9gf6eqpdBlSj8Fad9TxOm','company',NULL,'2024-10-29 16:22:12','2024-10-29 16:22:12'),(13,'Lazaro Magaia','llmagaia4@gmail.com',NULL,'$2y$12$S3hI7YR93caPQVs1BV0nieflYlDiy0k5P8Ita8TN10845m2UDP66K','admin',NULL,'2024-10-29 18:17:11','2024-10-29 18:17:11'),(14,'Lazaro Magaia q','llmagaia5@gmail.com',NULL,'$2y$12$zqi1Zl91cPCvGxZ1/zBtIOmlJmPFobXcaHOlP4YsGLNCo52ZQPVtS','user',NULL,'2024-10-29 18:19:36','2024-10-29 19:42:41');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vaga_funcoes`
--

DROP TABLE IF EXISTS `vaga_funcoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vaga_funcoes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `vaga_id` bigint unsigned NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `vaga_funcoes_vaga_id_foreign` (`vaga_id`),
  CONSTRAINT `vaga_funcoes_vaga_id_foreign` FOREIGN KEY (`vaga_id`) REFERENCES `vagas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vaga_funcoes`
--

LOCK TABLES `vaga_funcoes` WRITE;
/*!40000 ALTER TABLE `vaga_funcoes` DISABLE KEYS */;
INSERT INTO `vaga_funcoes` VALUES (1,1,'dasdsadasdasa q','2024-10-29 23:32:08','2024-10-29 23:49:30'),(2,1,'dsadsdssads','2024-10-29 23:49:37','2024-10-29 23:49:37'),(4,3,'dcasdssada','2024-10-30 00:13:47','2024-10-30 00:13:47'),(5,3,'adadasdasdas','2024-10-30 00:13:50','2024-10-30 00:13:50'),(6,3,'dsdsaasd','2024-10-30 00:13:52','2024-10-30 00:13:52');
/*!40000 ALTER TABLE `vaga_funcoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vaga_requirements`
--

DROP TABLE IF EXISTS `vaga_requirements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vaga_requirements` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `vaga_id` bigint unsigned NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `vaga_requirements_vaga_id_foreign` (`vaga_id`),
  CONSTRAINT `vaga_requirements_vaga_id_foreign` FOREIGN KEY (`vaga_id`) REFERENCES `vagas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vaga_requirements`
--

LOCK TABLES `vaga_requirements` WRITE;
/*!40000 ALTER TABLE `vaga_requirements` DISABLE KEYS */;
INSERT INTO `vaga_requirements` VALUES (1,1,'xsaadss','2024-10-30 00:08:58','2024-10-30 00:08:58'),(2,1,'dasdassadsa','2024-10-30 00:09:02','2024-10-30 00:09:02'),(4,3,'sadsdasdasdsa','2024-10-30 00:13:54','2024-10-30 00:13:54'),(5,3,'dsadadasdada','2024-10-30 00:13:58','2024-10-30 00:13:58'),(6,3,'sdasdsdasds','2024-10-30 00:14:01','2024-10-30 00:14:01');
/*!40000 ALTER TABLE `vaga_requirements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vagas`
--

DROP TABLE IF EXISTS `vagas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vagas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `salary` decimal(10,2) DEFAULT NULL,
  `contract_type` enum('Estágio','Temporário','Freelancer','Tempo_Integral','Part-Time') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provincia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint unsigned NOT NULL,
  `expiration_date` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `vagas_category_id_foreign` (`category_id`),
  CONSTRAINT `vagas_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vagas`
--

LOCK TABLES `vagas` WRITE;
/*!40000 ALTER TABLE `vagas` DISABLE KEYS */;
INSERT INTO `vagas` VALUES (1,'Clínica Geral',NULL,5000.00,'Estágio','123 Main St','Gaza','jobs/images/cAMHorWVVvGe1BoSc76pDbP6yzU7zLfdDnGUvZwy.png','12',4,'2024-11-12',1,'2024-10-29 22:51:03','2024-11-15 07:15:59'),(3,'Desenvolvedor fullstack','Se você é apaixonado por tecnologia e busca um novo desafio em um ambiente dinâmico, envie seu currículo e portfólio para [llmagaia@llmagaia.com] com o assunto \"Candidatura - Desenvolvedor Fullstack\".',25000.00,'Tempo_Integral','123 Main St','Tete','','12',2,'2024-12-19',1,'2024-10-30 00:13:42','2024-11-15 07:16:18');
/*!40000 ALTER TABLE `vagas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vagas_candidaturas`
--

DROP TABLE IF EXISTS `vagas_candidaturas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vagas_candidaturas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `vaga_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `status` enum('Pendente','Aprovada','Rejeitada') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pendente',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `vagas_candidaturas_vaga_id_foreign` (`vaga_id`),
  KEY `vagas_candidaturas_user_id_foreign` (`user_id`),
  CONSTRAINT `vagas_candidaturas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `vagas_candidaturas_vaga_id_foreign` FOREIGN KEY (`vaga_id`) REFERENCES `vagas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vagas_candidaturas`
--

LOCK TABLES `vagas_candidaturas` WRITE;
/*!40000 ALTER TABLE `vagas_candidaturas` DISABLE KEYS */;
INSERT INTO `vagas_candidaturas` VALUES (5,3,14,'Aprovada','2024-11-11 06:52:01','2024-11-15 12:01:53');
/*!40000 ALTER TABLE `vagas_candidaturas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-12-23 11:17:06
