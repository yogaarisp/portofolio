-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for portofolio_yoga
CREATE DATABASE IF NOT EXISTS `portofolio_yoga` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `portofolio_yoga`;

-- Dumping structure for table portofolio_yoga.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table portofolio_yoga.cache: ~0 rows (approximately)

-- Dumping structure for table portofolio_yoga.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table portofolio_yoga.cache_locks: ~0 rows (approximately)

-- Dumping structure for table portofolio_yoga.experiences
CREATE TABLE IF NOT EXISTS `experiences` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `period` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `responsibilities` json DEFAULT NULL,
  `dot_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#0d9488',
  `badge_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'outline',
  `is_current` tinyint(1) NOT NULL DEFAULT '0',
  `is_leadership` tinyint(1) NOT NULL DEFAULT '0',
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table portofolio_yoga.experiences: ~5 rows (approximately)
INSERT INTO `experiences` (`id`, `title`, `company`, `period`, `description`, `responsibilities`, `dot_color`, `badge_type`, `is_current`, `is_leadership`, `sort_order`, `created_at`, `updated_at`) VALUES
	(1, 'Freelancer', 'Independent Consultant', '2023 – Present', 'Providing custom IT infrastructure solutions and independent technical consulting for various clients.', '["Infrastructure Audit & Optimization", "Custom Web Application Development", "Technical Advisor for IT Startups", "Network Security Implementation"]', '#e9c349', 'filled', 1, 0, 1, '2026-04-30 02:17:01', '2026-04-30 02:17:01'),
	(2, 'IT Staff', 'PNM', '2022', 'Managed daily IT operations, supported corporate infrastructure, and ensured system reliability for internal stakeholders.', '["End-user technical support for 500+ employees", "Server maintenance and backup procedures", "Hardware procurement and asset management", "Network monitoring and troubleshooting"]', '#0d9488', 'outline', 0, 0, 2, '2026-04-30 02:17:01', '2026-04-30 02:17:01'),
	(3, 'IT Staff', 'All Stay Hotel', '2022', 'Overseeing hospitality IT systems, maintaining network infrastructure, and resolving technical issues to ensure a seamless guest experience.', '["Managing Hotel PMS (Property Management System)", "Ensuring 99.9% WiFi availability for guests", "IP PBX and VoIP system administration", "NVR/CCTV system monitoring"]', '#0d9488', 'outline', 0, 0, 3, '2026-04-30 02:17:01', '2026-04-30 02:17:01'),
	(4, 'IT Helpdesk Coordinator', 'USG', '2019 – 2022', 'Leading the IT support team, establishing structured helpdesk protocols, and managing the technical issue resolution workflow company-wide.', '["Managing a team of 5 IT support staff", "Implementing a ticketing system (30% SLA improvement)", "Standardizing IT onboarding processes", "Coordinating with external vendors for project implementation"]', '#7f1d1d', 'outline', 0, 1, 4, '2026-04-30 02:17:01', '2026-04-30 02:17:01'),
	(5, 'IT Support', 'Busana Apparel Group', '2018 – 2019', 'Initial role handling frontline technical support, hardware troubleshooting, and basic network setup for manufacturing facilities.', '["Daily hardware maintenance and repair", "Windows OS installation and configuration", "LAN/WAN cable termination and testing", "Printer and peripheral troubleshooting"]', '#0d9488', 'outline', 0, 0, 5, '2026-04-30 02:17:01', '2026-04-30 02:17:01');

-- Dumping structure for table portofolio_yoga.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
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

-- Dumping data for table portofolio_yoga.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table portofolio_yoga.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
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

-- Dumping data for table portofolio_yoga.jobs: ~0 rows (approximately)

-- Dumping structure for table portofolio_yoga.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
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

-- Dumping data for table portofolio_yoga.job_batches: ~0 rows (approximately)

-- Dumping structure for table portofolio_yoga.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table portofolio_yoga.migrations: ~0 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2026_04_30_054832_create_projects_table', 1),
	(5, '2026_04_30_054833_create_skills_table', 1),
	(6, '2026_04_30_055244_create_settings_table', 1),
	(7, '2026_04_30_082614_create_experiences_table', 1);

-- Dumping structure for table portofolio_yoga.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table portofolio_yoga.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table portofolio_yoga.projects
CREATE TABLE IF NOT EXISTS `projects` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `tags` json DEFAULT NULL,
  `gradient` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'published',
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table portofolio_yoga.projects: ~4 rows (approximately)
INSERT INTO `projects` (`id`, `name`, `description`, `tags`, `gradient`, `url`, `status`, `sort_order`, `created_at`, `updated_at`) VALUES
	(1, 'Enterprise Asset Management', 'Comprehensive system for tracking and managing IT hardware assets, licenses, and lifecycles across departments. Features real-time dashboards and automated reporting.', '["Laravel", "Livewire", "MySQL"]', 'linear-gradient(135deg,#0d9488,#2dd4bf)', NULL, 'published', 1, '2026-04-30 02:17:01', '2026-04-30 02:17:01'),
	(2, 'Campus Network Overhaul', 'Full-scale redesign of multi-building network infrastructure. Implemented advanced firewall rules, load balancing, VLAN segmentation, and Active Directory.', '["Mikrotik", "Windows Server", "VLAN"]', 'linear-gradient(135deg,#0ea5e9,#38bdf8)', NULL, 'published', 2, '2026-04-30 02:17:01', '2026-04-30 02:17:01'),
	(3, 'Remote CCTV Monitoring', 'Deployment of a 64-channel IP CCTV system with centralized NVR management and secure remote access via VPN for 24/7 high-definition facility surveillance.', '["IP Camera", "NVR", "VPN"]', 'linear-gradient(135deg,#6366f1,#818cf8)', NULL, 'published', 3, '2026-04-30 02:17:01', '2026-04-30 02:17:01'),
	(4, 'IT Helpdesk Portal', 'Custom internal ticketing system with SLA tracking, departmental routing, and real-time notifications, significantly improving technical support efficiency.', '["Laravel", "Tailwind", "REST API"]', 'linear-gradient(135deg,#0f766e,#14b8a6)', NULL, 'published', 4, '2026-04-30 02:17:01', '2026-04-30 02:17:01');

-- Dumping structure for table portofolio_yoga.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
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

-- Dumping data for table portofolio_yoga.sessions: ~0 rows (approximately)

-- Dumping structure for table portofolio_yoga.settings
CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table portofolio_yoga.settings: ~9 rows (approximately)
INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
	(1, 'site_name', 'Yoga Aris Purwanto', '2026-04-30 02:17:01', '2026-04-30 02:17:01'),
	(2, 'site_role', 'IT Specialist', '2026-04-30 02:17:01', '2026-04-30 02:17:01'),
	(3, 'site_subrole', '(Infrastructure, Networking, & Software Development)', '2026-04-30 02:17:01', '2026-04-30 02:17:01'),
	(4, 'site_description', 'Bridging Infrastructure and Innovation. With extensive experience spanning hardware management, network architecture, and modern software engineering, I build robust and scalable technical foundations to drive business success.', '2026-04-30 02:17:01', '2026-04-30 02:17:01'),
	(5, 'contact_email', 'yoga99se@gmail.com', '2026-04-30 02:17:01', '2026-04-30 02:42:07'),
	(6, 'linkedin_url', 'https://linkedin.com', '2026-04-30 02:17:01', '2026-04-30 02:17:01'),
	(7, 'years_experience', '8+', '2026-04-30 02:17:01', '2026-04-30 02:17:01'),
	(8, 'projects_count', '50+', '2026-04-30 02:17:01', '2026-04-30 02:17:01'),
	(9, 'client_satisfaction', '100%', '2026-04-30 02:17:01', '2026-04-30 02:17:01'),
	(10, 'github_url', '', '2026-04-30 02:42:07', '2026-04-30 02:42:07'),
	(11, 'hero_title', 'Technical Support & System Developer', '2026-04-30 02:42:07', '2026-04-30 02:42:07'),
	(12, 'hero_subtitle', 'Spesialis dalam optimasi infrastruktur IT, manajemen jaringan, dan pengembangan sistem yang efisien.', '2026-04-30 02:42:07', '2026-04-30 02:42:07'),
	(13, 'hero_image_path', 'settings/tMl4fqZJgIvsgc5jkLs2V8LNLTMoC5iLUCoI6q7f.jpg', '2026-04-30 03:43:19', '2026-04-30 03:43:19');

-- Dumping structure for table portofolio_yoga.skills
CREATE TABLE IF NOT EXISTS `skills` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#0d9488',
  `icon_path` text COLLATE utf8mb4_unicode_ci,
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table portofolio_yoga.skills: ~15 rows (approximately)
INSERT INTO `skills` (`id`, `category`, `name`, `color`, `icon_path`, `sort_order`, `created_at`, `updated_at`) VALUES
	(1, 'IT Support & Hardware', 'Preventive & Corrective Maintenance', '#0d9488', 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z M15 12a3 3 0 11-6 0 3 3 0 016 0z', 1, '2026-04-30 02:17:01', '2026-04-30 02:17:01'),
	(2, 'IT Support & Hardware', 'Hardware Troubleshooting & Repair', '#0d9488', 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z M15 12a3 3 0 11-6 0 3 3 0 016 0z', 2, '2026-04-30 02:17:01', '2026-04-30 02:17:01'),
	(3, 'IT Support & Hardware', 'System Performance Tuning', '#0d9488', 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z M15 12a3 3 0 11-6 0 3 3 0 016 0z', 3, '2026-04-30 02:17:01', '2026-04-30 02:17:01'),
	(4, 'IT Support & Hardware', 'Data Recovery & Backup', '#0d9488', 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z M15 12a3 3 0 11-6 0 3 3 0 016 0z', 4, '2026-04-30 02:17:01', '2026-04-30 02:17:01'),
	(5, 'IT Support & Hardware', 'OS & Software Deployment', '#0d9488', 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z M15 12a3 3 0 11-6 0 3 3 0 016 0z', 5, '2026-04-30 02:17:01', '2026-04-30 02:17:01'),
	(6, 'Software Development', 'Laravel MVC & RESTful API', '#6366f1', 'M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4', 6, '2026-04-30 02:17:01', '2026-04-30 02:17:01'),
	(7, 'Software Development', 'Tailwind CSS & Modern UI', '#6366f1', 'M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4', 7, '2026-04-30 02:17:01', '2026-04-30 02:17:01'),
	(8, 'Software Development', 'Livewire & Alpine.js', '#6366f1', 'M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4', 8, '2026-04-30 02:17:01', '2026-04-30 02:17:01'),
	(9, 'Software Development', 'Database Architecture', '#6366f1', 'M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4', 9, '2026-04-30 02:17:01', '2026-04-30 02:17:01'),
	(10, 'Software Development', 'CI/CD Pipeline & Automation', '#6366f1', 'M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4', 10, '2026-04-30 02:17:01', '2026-04-30 02:17:01'),
	(11, 'Infrastructure & Networking', 'Mikrotik Routing & Firewall', '#0ea5e9', 'M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01', 11, '2026-04-30 02:17:01', '2026-04-30 02:17:01'),
	(12, 'Infrastructure & Networking', 'Advanced Bandwidth Management', '#0ea5e9', 'M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01', 12, '2026-04-30 02:17:01', '2026-04-30 02:17:01'),
	(13, 'Infrastructure & Networking', 'CCTV Systems & Remote Monitoring', '#0ea5e9', 'M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01', 13, '2026-04-30 02:17:01', '2026-04-30 02:17:01'),
	(14, 'Infrastructure & Networking', 'Windows Server & AD', '#0ea5e9', 'M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01', 14, '2026-04-30 02:17:01', '2026-04-30 02:17:01'),
	(15, 'Infrastructure & Networking', 'Virtualization (Hyper-V)', '#0ea5e9', 'M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01', 15, '2026-04-30 02:17:01', '2026-04-30 02:17:01');

-- Dumping structure for table portofolio_yoga.users
CREATE TABLE IF NOT EXISTS `users` (
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

-- Dumping data for table portofolio_yoga.users: ~0 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Yoga Aris Purwanto', 'yoga99se@gmail.com', NULL, '$2y$12$Qhg3tTT4hMhE8IelSxH3R..H7TyvqMJkGvDSawFOG2tesySbruTFa', NULL, '2026-04-30 10:54:33', '2026-04-30 10:54:33');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
