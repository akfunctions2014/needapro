-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.32 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.1.0.4867
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table needapro.account
CREATE TABLE IF NOT EXISTS `account` (
  `id` bigint(20) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `account` bigint(20) NOT NULL,
  `type` enum('ADMIN','PRO') NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` char(128) NOT NULL,
  `salt` char(128) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `cellphone` varchar(50) NOT NULL,
  `homephone` varchar(50) NOT NULL,
  `notes` text NOT NULL,
  `createdBy` bigint(20) NOT NULL,
  `updatedBy` bigint(20) NOT NULL,
  `createdOn` datetime NOT NULL,
  `updatedOn` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table needapro.account: ~2 rows (approximately)
DELETE FROM `account`;
/*!40000 ALTER TABLE `account` DISABLE KEYS */;
INSERT INTO `account` (`id`, `active`, `account`, `type`, `email`, `password`, `salt`, `fullname`, `avatar`, `cellphone`, `homephone`, `notes`, `createdBy`, `updatedBy`, `createdOn`, `updatedOn`) VALUES
	(1429189518, 1, 1429189518, 'ADMIN', 'drumforhim@gmail.com', 'bcfdb64ac822eb1a5a954d2059b1168900971dea298e3abf6330f1fffe519eb2bbb0c27eb2516b335e92a23fe96add1493eb9bb939b9dccc17eb83455b08c683', '49eb7958fed44d411eab821ff0a0dabbb30e6f6a8b658912d17970fd1780c94e48a5fbeb7217baae3bd043923dd412826113d54474e4fee58fa6cb01004a7983', 'Andreas Iosifelis', 'http://vpapi.iima.ca/uploads/85dde051acc2728dbbe5c0d48d3a5b93.jpg', '6474317628', '4164312332', 'These are the notes', 1429189518, 1429189518, '2015-04-16 17:16:49', '0000-00-00 00:00:00'),
	(1430367821, 1, 0, 'PRO', 'k_teloniatis83@hotmail.com', '4ee50c28b53ba6b61dff4478642d4b75ca0050f3d43ffb94b87517ecfbc5143c9875829d249fcc88239d00059cc5ff9c0d94f078d937ad3508a0019cfd602d19', '1e06821e26a29de6c480e7a4a44fe70007e9f04924bb0cd1ba0d6e56cc63d2f0821cb8c4d7944788ad09e1d904564738e71c078a42e480bc85331d899d487ecf', 'Katerina Teloniatis', '', '', '', '', 1430367821, 0, '2015-04-30 06:23:41', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `account` ENABLE KEYS */;


-- Dumping structure for table needapro.address
CREATE TABLE IF NOT EXISTS `address` (
  `id` bigint(20) NOT NULL,
  `account` bigint(20) NOT NULL,
  `lat` decimal(18,12) NOT NULL,
  `long` decimal(18,12) NOT NULL,
  `province` bigint(20) NOT NULL,
  `city` bigint(20) NOT NULL,
  `postalcode` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `apartment` varchar(255) NOT NULL,
  `createdBy` bigint(20) NOT NULL,
  `updatedBy` bigint(20) NOT NULL,
  `createdOn` datetime NOT NULL,
  `updatedOn` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table needapro.address: ~0 rows (approximately)
DELETE FROM `address`;
/*!40000 ALTER TABLE `address` DISABLE KEYS */;
/*!40000 ALTER TABLE `address` ENABLE KEYS */;


-- Dumping structure for table needapro.ci_sessions
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table needapro.ci_sessions: ~12 rows (approximately)
DELETE FROM `ci_sessions`;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
	('33d5387d7dcf31ff574166ab4edbfc02', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.90 Safari/537.36', 1430365279, ''),
	('3a152c26f1470061ad0937ff1913d8b3', '::1', 'Mozilla/5.0 (iPhone; U; CPU iPhone OS 4_2_1 like Mac OS X; en-us) AppleWebKit/533.17.9 (KHTML, like Gecko) Version/5.0.2', 1430366948, ''),
	('46dcc7387d4ddb9d4c250b0753c5c9a6', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.90 Safari/537.36', 1430366934, ''),
	('4bdff4f17f091bbed31f45365faacfc2', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 7_0 like Mac OS X; en-us) AppleWebKit/537.51.1 (KHTML, like Gecko) Version/7.0 Mobile', 1430362499, ''),
	('4f700207b7217a1661ca048c623448c8', '::1', 'Mozilla/5.0 (iPhone; U; CPU iPhone OS 4_2_1 like Mac OS X; en-us) AppleWebKit/533.17.9 (KHTML, like Gecko) Version/5.0.2', 1430366820, 'a:1:{s:9:"user_data";s:0:"";}'),
	('5f76bd018f5b298417046ffb7092e29b', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.90 Safari/537.36', 1430368747, ''),
	('66e2ee201fdd933b3698be9d89da0248', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.90 Safari/537.36', 1430366845, ''),
	('a6c6b29d0455124626ab2e4215884eff', '192.168.2.14', 'Mozilla/5.0 (Linux; Android 4.2.2; Lenovo A3500-FL Build/JDQ39) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.', 1430427947, ''),
	('c193d840814ca20023d7dcfb930023a4', '::1', 'Mozilla/5.0 (iPhone; U; CPU iPhone OS 4_2_1 like Mac OS X; en-us) AppleWebKit/533.17.9 (KHTML, like Gecko) Version/5.0.2', 1430365107, ''),
	('c6357ceca3dfc349e503d4c6fd9795e9', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.90 Safari/537.36', 1430365461, ''),
	('d32413827446182dea8cd4e865b18934', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.90 Safari/537.36', 1430363720, ''),
	('e48a5ff8a788242cd798142475c70824', '::1', 'Mozilla/5.0 (iPhone; U; CPU iPhone OS 4_2_1 like Mac OS X; en-us) AppleWebKit/533.17.9 (KHTML, like Gecko) Version/5.0.2', 1430365595, 'a:6:{s:9:"user_data";s:0:"";s:9:"connected";b:1;s:9:"accountid";s:10:"1429189518";s:5:"email";s:20:"drumforhim@gmail.com";s:8:"fullname";s:17:"Andreas Iosifelis";s:6:"avatar";s:65:"http://vpapi.iima.ca/uploads/85dde051acc2728dbbe5c0d48d3a5b93.jpg";}');
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;


-- Dumping structure for table needapro.lookup
CREATE TABLE IF NOT EXISTS `lookup` (
  `id` bigint(20) NOT NULL,
  `parent` bigint(20) NOT NULL,
  `description` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `createdBy` bigint(20) NOT NULL,
  `updatedBy` bigint(20) NOT NULL,
  `createdOn` datetime NOT NULL,
  `updatedOn` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table needapro.lookup: ~4 rows (approximately)
DELETE FROM `lookup`;
/*!40000 ALTER TABLE `lookup` DISABLE KEYS */;
INSERT INTO `lookup` (`id`, `parent`, `description`, `icon`, `createdBy`, `updatedBy`, `createdOn`, `updatedOn`) VALUES
	(1429189450, 1429189450, 'ROOT', '', 1429189518, 1429189518, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(1429189454, 1429189450, 'City', '', 1429189518, 1429189518, '2015-04-16 09:16:25', '2015-04-16 09:16:25'),
	(1429189455, 1429189450, 'State', '', 1429189518, 1429189518, '2015-04-16 09:16:52', '2015-04-16 09:16:53'),
	(1429189456, 1429189450, 'Category', '', 1429189518, 1429189518, '2015-04-16 09:17:19', '2015-04-16 09:17:20');
/*!40000 ALTER TABLE `lookup` ENABLE KEYS */;


-- Dumping structure for table needapro.session
CREATE TABLE IF NOT EXISTS `session` (
  `id` bigint(20) NOT NULL,
  `account` bigint(20) NOT NULL,
  `online` tinyint(1) NOT NULL,
  `browser` varchar(255) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `lastactivity` datetime NOT NULL,
  `login` datetime NOT NULL,
  `logout` datetime NOT NULL,
  `timestamp` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table needapro.session: ~17 rows (approximately)
DELETE FROM `session`;
/*!40000 ALTER TABLE `session` DISABLE KEYS */;
INSERT INTO `session` (`id`, `account`, `online`, `browser`, `ip`, `lastactivity`, `login`, `logout`, `timestamp`) VALUES
	(1429212763, 1429189518, 0, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.118 Safari/537.36', '::1', '2015-04-16 21:32:43', '2015-04-16 21:32:43', '2015-04-16 21:34:13', 1429212853),
	(1429213097, 1429213061, 1, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.118 Safari/537.36', '::1', '2015-04-16 21:38:17', '2015-04-16 21:38:17', '0000-00-00 00:00:00', 1429213097),
	(1429214882, 1429189518, 1, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.118 Safari/537.36', '::1', '2015-04-16 22:08:02', '2015-04-16 22:08:02', '0000-00-00 00:00:00', 1429214882),
	(1429216064, 1429189518, 0, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.118 Safari/537.36', '::1', '2015-04-16 22:27:44', '2015-04-16 22:27:44', '2015-04-16 22:32:58', 1429216378),
	(1429216474, 1429189518, 0, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.118 Safari/537.36', '::1', '2015-04-16 22:34:34', '2015-04-16 22:34:34', '2015-04-16 22:35:16', 1429216516),
	(1429217051, 1429217004, 0, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.118 Safari/537.36', '::1', '2015-04-16 22:44:11', '2015-04-16 22:44:11', '2015-04-16 22:45:28', 1429217128),
	(1429217203, 1429189518, 0, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.118 Safari/537.36', '::1', '2015-04-16 22:46:43', '2015-04-16 22:46:43', '2015-04-16 23:08:14', 1429218494),
	(1429218507, 1429189518, 0, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.118 Safari/537.36', '::1', '2015-04-16 23:08:27', '2015-04-16 23:08:27', '2015-04-16 23:24:32', 1429219472),
	(1429720222, 1429189518, 1, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.90 Safari/537.36', '::1', '2015-04-22 18:30:22', '2015-04-22 18:30:22', '0000-00-00 00:00:00', 1429720222),
	(1429720273, 1429189518, 1, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.90 Safari/537.36', '::1', '2015-04-22 18:31:13', '2015-04-22 18:31:13', '0000-00-00 00:00:00', 1429720273),
	(1429720295, 1429189518, 1, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.90 Safari/537.36', '::1', '2015-04-22 18:31:35', '2015-04-22 18:31:35', '0000-00-00 00:00:00', 1429720295),
	(1429720401, 1429189518, 1, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.90 Safari/537.36', '::1', '2015-04-22 18:33:21', '2015-04-22 18:33:21', '0000-00-00 00:00:00', 1429720401),
	(1429720430, 1429189518, 1, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.90 Safari/537.36', '::1', '2015-04-22 18:33:50', '2015-04-22 18:33:50', '0000-00-00 00:00:00', 1429720430),
	(1429720480, 1429189518, 1, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.90 Safari/537.36', '::1', '2015-04-22 18:34:40', '2015-04-22 18:34:40', '0000-00-00 00:00:00', 1429720480),
	(1429720564, 1429189518, 0, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.90 Safari/537.36', '::1', '2015-04-22 18:36:04', '2015-04-22 18:36:04', '2015-04-22 18:43:00', 1429720980),
	(1429721009, 1429189518, 0, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.90 Safari/537.36', '::1', '2015-04-22 18:43:29', '2015-04-22 18:43:29', '2015-04-22 18:43:33', 1429721013),
	(1429721068, 1429189518, 1, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.90 Safari/537.36', '::1', '2015-04-22 18:44:28', '2015-04-22 18:44:28', '0000-00-00 00:00:00', 1429721068);
/*!40000 ALTER TABLE `session` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
