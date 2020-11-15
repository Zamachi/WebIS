-- MariaDB dump 10.17  Distrib 10.4.14-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: sii
-- ------------------------------------------------------
-- Server version	10.4.14-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `developed_by`
--

DROP TABLE IF EXISTS `developed_by`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `developed_by` (
  `developed_by_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `developer_id` int(10) unsigned NOT NULL,
  `game_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`developed_by_id`),
  UNIQUE KEY `uq_developed_by_developer_id_game_id` (`developer_id`,`game_id`),
  KEY `fk_developed_by_game_id` (`game_id`),
  CONSTRAINT `fk_developed_by_developer_id` FOREIGN KEY (`developer_id`) REFERENCES `developers` (`developer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_developed_by_game_id` FOREIGN KEY (`game_id`) REFERENCES `games` (`game_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `developed_by`
--

LOCK TABLES `developed_by` WRITE;
/*!40000 ALTER TABLE `developed_by` DISABLE KEYS */;
INSERT INTO `developed_by` VALUES (1,1,1),(2,1,2),(3,1,3),(4,1,4),(7,2,5),(8,2,6),(9,2,7),(10,2,8),(11,2,9),(12,3,10),(13,3,11),(14,3,12),(15,4,13),(16,4,14),(17,4,15),(18,4,16),(30,4,28),(31,4,29),(19,5,17),(20,6,18),(21,6,19),(27,7,25),(28,7,26),(29,7,27),(22,9,20),(23,11,21),(24,13,22),(25,13,23),(26,13,24),(5,14,2),(6,14,4),(32,15,30);
/*!40000 ALTER TABLE `developed_by` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `developers`
--

DROP TABLE IF EXISTS `developers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `developers` (
  `developer_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `developer_name` varchar(45) NOT NULL,
  PRIMARY KEY (`developer_id`),
  UNIQUE KEY `uq_developers_developer_name` (`developer_name`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `developers`
--

LOCK TABLES `developers` WRITE;
/*!40000 ALTER TABLE `developers` DISABLE KEYS */;
INSERT INTO `developers` VALUES (1,'Bethesda Softworks'),(2,'Blizzard Entertainment'),(11,'Capcom'),(6,'CD Projekt'),(8,'EA games'),(5,'Epic Games'),(3,'NCsoft'),(15,'Paradox Development Studio'),(12,'Rockstar'),(13,'Square Enix'),(9,'THQ'),(7,'Ubisoft'),(4,'VALVE Corporation'),(10,'XLGames'),(14,'Zenimax Media');
/*!40000 ALTER TABLE `developers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `games`
--

DROP TABLE IF EXISTS `games`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `games` (
  `game_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `publish_date` date NOT NULL,
  `price` decimal(10,2) unsigned NOT NULL,
  `image` varchar(512) DEFAULT NULL,
  `file` varchar(512) DEFAULT NULL,
  `description` text DEFAULT NULL,
  PRIMARY KEY (`game_id`),
  UNIQUE KEY `uq_games_title` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `games`
--

LOCK TABLES `games` WRITE;
/*!40000 ALTER TABLE `games` DISABLE KEYS */;
INSERT INTO `games` VALUES (1,'The Elder Scrolls V Skyrim','2011-11-11',59.99,'http://localhost/ProjekatZaDrugiKolokvijum/img/games/Skyrim.png','http://localhost/ProjekatZaDrugiKolokvijum/skyrim.php','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),(2,'Fallout 76','2018-10-23',39.99,'https://steamcdn-a.akamaihd.net/steam/apps/1151340/header.jpg?t=1588798263','http://localhost/ProjekatZaDrugiKolokvijum/fallout76.php','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),(3,'Doom Eternal','2020-03-20',44.99,'https://steamcdn-a.akamaihd.net/steam/apps/782330/header.jpg?t=1588895742','http://localhost/ProjekatZaDrugiKolokvijum/doometernal.php','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),(4,'Elder Scrolls Online','2014-02-28',49.99,'https://steamcdn-a.akamaihd.net/steam/apps/306130/header.jpg?t=1586472356','http://localhost/ProjekatZaDrugiKolokvijum/eso.php','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),(5,'World of Warcraft','2004-11-20',49.99,'https://upload.wikimedia.org/wikipedia/sr/thumb/9/91/WoW_Box_Art1.jpg/220px-WoW_Box_Art1.jpg','http://localhost/ProjekatZaDrugiKolokvijum/wow.php','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),(6,'Overwatch','2016-12-01',59.99,'https://img-a.udemycdn.com/course/750x422/1712892_fcab.jpg','http://localhost/ProjekatZaDrugiKolokvijum/overwatch.php','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),(7,'Diablo III','2012-05-24',29.99,'https://upload.wikimedia.org/wikipedia/sr/thumb/5/53/Diablo_III.png/220px-Diablo_III.png','http://localhost/ProjekatZaDrugiKolokvijum/diablo3.php','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),(8,'StarCraft II: Wings of Liberty','2010-12-24',29.99,'https://www.benchmark.rs/assets/img/article/large/3116f3e3c7894eafe2183650340a1198.jpg','http://localhost/ProjekatZaDrugiKolokvijum/starcraft2.php','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),(9,'Warcraft III','2002-01-21',22.99,'https://upload.wikimedia.org/wikipedia/en/6/66/WarcraftIII.jpg','http://localhost/ProjekatZaDrugiKolokvijum/warcraft3.php','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),(10,'Lineage II','2003-03-01',0.00,'https://mmoculture.com/wp-content/uploads/2019/11/Lineage-II-image.png','http://localhost/ProjekatZaDrugiKolokvijum/lineage2.php','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),(11,'Blade & Soul','2012-08-15',0.00,'https://mos.pcgamebenchmark.com/img/game/blade-soul/blade-soul-system-requirements.jpg','http://localhost/ProjekatZaDrugiKolokvijum/bladeandsoul.php','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),(12,'Guild Wars 2','2012-12-31',15.00,'https://cdna.artstation.com/p/assets/images/images/008/245/330/large/luke-dowding-gw2-pof-s4e01-movie-cover-web.jpg?1511448046','http://localhost/ProjekatZaDrugiKolokvijum/guildwars2.php','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),(13,'Dota 2','2013-06-30',0.00,'https://www.benchmark.rs/assets/img/news/big_thumb/f5a5527f3ea2c2b26f51dffd64f8ec09.jpg','http://localhost/ProjekatZaDrugiKolokvijum/dota2.php','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),(14,'Half-Life 2','2004-02-24',30.00,'https://steamcdn-a.akamaihd.net/half-life.com/images/halflife2/halflife2_coverart.jpg','http://localhost/ProjekatZaDrugiKolokvijum/halflife2.php','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),(15,'Portal 2','2004-02-24',30.00,'https://steamcdn-a.akamaihd.net/steam/apps/620/header.jpg?t=1587582232','http://localhost/ProjekatZaDrugiKolokvijum/portal2.php','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),(16,'Counter-Strike: Global Offensive','2012-02-24',12.00,'https://cdn-cf.gamivo.com/image_cover.jpg?f=26073&n=47263531930005853.jpg&h=8104eb1555ac18f00b0f464b3a565cae','http://localhost/ProjekatZaDrugiKolokvijum/csgo.php','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),(17,'Fortnite','2018-12-29',0.00,'https://play.co.rs/wp-content/uploads/2020/04/fortnite-chapter-2-season-2-extended.jpg','http://localhost/ProjekatZaDrugiKolokvijum/fortnite.php','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),(18,'Cyberpunk 2077','2020-12-29',59.99,'https://play.co.rs/wp-content/uploads/2019/11/keanu-reeves-cyberpunk-2077-johnny-silverhand-740x415.jpg','http://localhost/ProjekatZaDrugiKolokvijum/cyberpunk.php','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),(19,'Witcher 3: Wild Hunt','2015-09-12',59.99,'https://upload.wikimedia.org/wikipedia/sr/thumb/0/0c/Witcher_3_cover_art.jpg/220px-Witcher_3_cover_art.jpg','http://localhost/ProjekatZaDrugiKolokvijum/witcher3.php','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),(20,'Warhammer 40k: Dawn of War','2004-09-24',24.99,'https://upload.wikimedia.org/wikipedia/en/thumb/9/9f/Dawn_of_War_box_art.jpg/220px-Dawn_of_War_box_art.jpg','http://localhost/ProjekatZaDrugiKolokvijum/dawnofwar.php','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),(21,'ArcheAge','2013-08-01',0.00,'https://mmoexaminer.com/wp-content/uploads/2016/11/archeage.jpg','http://localhost/ProjekatZaDrugiKolokvijum/archeage.php','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),(22,'Grand Theft Auto V','2013-08-01',59.99,'https://images.g2a.com/newlayout/323x433/1x1x0/387a113709aa/59e5efeb5bafe304c4426c47','http://localhost/ProjekatZaDrugiKolokvijum/gta5.php','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),(23,'Red Dead Redemption 2','2018-02-01',59.99,'https://lh3.googleusercontent.com/HCUkD69MAHEOj84Yi7Kb5vxHpCePTsmQI4g9vYuVPUo-87cWE6ZZIk0tiyYzaiS9zaAFMTXRNYJaaRczRN-yQYw','http://localhost/ProjekatZaDrugiKolokvijum/rdr2.php','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),(24,'L.A Noire','2011-02-01',39.99,'https://images.g2a.com/newlayout/323x433/1x1x0/3f27caac79f1/59111993ae653ac90c267e63','http://localhost/ProjekatZaDrugiKolokvijum/lanoire.php','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),(25,'Tom Clancy\'s Rainbow Six Siege','2015-04-07',49.99,'https://steamuserimages-a.akamaihd.net/ugc/960852464597139563/9C68B626D0D28C71EE4F34D371F4BD406BAE03B8/','http://localhost/ProjekatZaDrugiKolokvijum/rainbowsixsiege.php','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),(26,'Assassin\'s Creed Odyssey','2018-09-07',69.99,'https://play.co.rs/wp-content/uploads/2018/11/Assassins-Creed-Odyssey-cover.jpg','http://localhost/ProjekatZaDrugiKolokvijum/acodyssey.php','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),(27,'Watch Dogs','2014-05-21',54.99,'https://s3.gaming-cdn.com/images/products/254/orig/watch-dogs-cover.jpg','http://localhost/ProjekatZaDrugiKolokvijum/watchdogs.php','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),(28,'Stardew Valley','2016-05-21',14.99,'https://lh3.googleusercontent.com/IRzV1qSynfxIIS3huwZuAc5V8Jbej8N2dvX-yuVcCeCbRfgMGOxOjO_KlJpVH9d8jQ1cOXdSp5cL__8KOdlMeVyh0Q','http://localhost/ProjekatZaDrugiKolokvijum/stardewvalley.php','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),(29,'Terraria','2011-05-21',4.99,'https://www.mobygames.com/images/covers/l/293163-terraria-windows-front-cover.jpg','http://localhost/ProjekatZaDrugiKolokvijum/terraria.php','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),(30,'Crusader Kings II','2012-05-21',99.99,'https://images.g2a.com/newlayout/323x433/1x1x0/f33820499db3/5911b0d3ae653a3da06fbd97','http://localhost/ProjekatZaDrugiKolokvijum/crusaderkings2.php','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
/*!40000 ALTER TABLE `games` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `games_tags`
--

DROP TABLE IF EXISTS `games_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `games_tags` (
  `games_tags_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tag_id` int(10) unsigned NOT NULL,
  `game_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`games_tags_id`),
  UNIQUE KEY `uq_games_tags_tag_id_game_id` (`tag_id`,`game_id`),
  KEY `fk_games_tags_game_id` (`game_id`),
  CONSTRAINT `fk_games_tags_game_id` FOREIGN KEY (`game_id`) REFERENCES `games` (`game_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_games_tags_tag_id` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`tag_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `games_tags`
--

LOCK TABLES `games_tags` WRITE;
/*!40000 ALTER TABLE `games_tags` DISABLE KEYS */;
INSERT INTO `games_tags` VALUES (1,1,1),(2,1,4),(3,1,5),(4,1,7),(5,1,10),(6,1,11),(7,1,12),(8,1,18),(9,1,19),(10,1,21),(11,1,22),(12,1,26),(13,2,1),(14,2,2),(15,2,4),(16,2,5),(17,2,7),(18,2,8),(19,2,10),(20,2,11),(21,2,12),(22,2,17),(23,2,18),(24,2,19),(25,2,20),(26,2,21),(27,5,2),(28,5,3),(29,5,6),(30,5,14),(31,5,16),(32,5,17),(33,5,18),(34,5,22),(35,5,23),(36,5,25),(37,5,27),(38,11,8),(39,11,9),(40,11,20),(41,13,21);
/*!40000 ALTER TABLE `games_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `library`
--

DROP TABLE IF EXISTS `library`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `library` (
  `library_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `hours_played` decimal(10,2) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `game_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`library_id`),
  UNIQUE KEY `uq_library_user_id_game_id` (`user_id`,`game_id`),
  KEY `fk_library_game_id` (`game_id`),
  CONSTRAINT `fk_library_game_id` FOREIGN KEY (`game_id`) REFERENCES `games` (`game_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_library_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `library`
--

LOCK TABLES `library` WRITE;
/*!40000 ALTER TABLE `library` DISABLE KEYS */;
INSERT INTO `library` VALUES (1,532.64,5,7),(2,365.15,1,27),(3,924.32,2,26),(4,483.89,6,23),(5,163.06,3,23),(6,693.63,1,2),(7,392.14,3,15),(8,24.15,7,15),(9,69.72,1,29),(10,361.68,1,25),(11,219.77,6,3),(12,515.14,1,19),(13,345.78,10,12),(14,408.10,8,16),(15,815.29,8,20),(16,665.57,9,7),(17,950.54,7,29),(18,240.65,7,8),(19,798.00,10,21),(20,110.49,8,13),(21,982.35,2,12),(22,217.57,3,30),(23,862.66,5,11),(24,374.02,9,11),(25,436.42,6,17),(26,311.44,10,22),(27,793.11,1,7),(28,413.58,3,12),(29,80.40,8,8),(30,337.10,3,9),(31,739.30,3,11),(32,979.02,9,18),(33,352.60,4,5),(34,352.70,1,26),(35,917.75,8,7),(36,544.17,8,1),(37,298.10,1,6),(38,70.21,3,22),(39,309.54,5,6),(40,752.84,5,15),(41,514.98,9,16),(42,437.65,3,19),(43,686.33,7,27),(44,25.27,9,13),(45,867.78,1,4),(46,960.80,8,12),(47,367.99,8,23),(48,354.39,9,20),(49,383.35,7,25);
/*!40000 ALTER TABLE `library` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tags` (
  `tag_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(45) NOT NULL,
  PRIMARY KEY (`tag_id`),
  UNIQUE KEY `uq_tags_tag_name` (`tag_name`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` VALUES (7,'2D'),(1,'Fantasy'),(5,'FPS'),(6,'Horror'),(9,'Indie'),(8,'Medieval'),(12,'MMO'),(4,'Multiplayer'),(10,'Roguelike'),(2,'RPG'),(11,'RTS'),(13,'Sandbox'),(3,'Singleplayer');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `country` varchar(64) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `account_balance` decimal(10,2) unsigned NOT NULL DEFAULT 0.00,
  `avatar` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `uq_users_username` (`username`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Mikeyyyy','$2y$10$F1J7R3DwifsE7DCIUQ9wg.TAM9ecwkICMTShQ27ql7zZcE06Xid7u','United Kingdom','2020-11-15 18:25:06',0.00,'https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/1b/1b82bca939309ae692dd697df93b3b1281a7dc63_full.jpg'),(2,'Steph999','$2y$10$AMlHS4otY1eoxXLgyZ4jq.EzzHChDvg66AQ.bpB4fXfPn9pw7HREG','Serbia','2020-11-15 18:25:06',0.00,'https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/00/006b07a8c10b3b86ac8f4850f4dfd48bf251295c_full.jpg'),(3,'StivENDy','$2y$10$VgzBpZmC4pxetVZxbDdxXOa2VDDsyC25mfuF10vZ0ZT3fp3luzKTq','Romania','2020-11-15 18:25:06',0.00,'https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/00/00a9394dbe2341bc73d2b198894e246748e93f75_full.jpg'),(4,'LinERGEb','$2y$10$a/9T9yrFIArY6jwojcxlquybX/JOn47jsYRxdLJC3HQKsSS15..Le','Bosnia and Herzegovina','2020-11-15 18:25:06',0.00,'https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/4d/4dc5a3517abffa33b060ad3aa5dbbcde80d016a4_full.jpg'),(5,'EsTRATei','$2y$10$3cx7XlSAgEXe35Cp3QfaXeMGZBVS4ow2FNTfrGBXgzstNvasMNM.S','Albania','2020-11-15 18:25:06',0.00,'https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/c6/c6867005599b89265633356c9634998b7ac7414e_full.jpg'),(6,'IveliSPH','$2y$10$hSY7wjavZmUhA7LspTZARuXsxeqTBrriTrNFYdysPQ45eq6kWqFry','Hungary','2020-11-15 18:25:06',0.00,'https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/7f/7f95e593302f4101ec1f72845df62c85b48d0a58_full.jpg'),(7,'ITUPTioN','$2y$10$PINd5OE./seSmzQUEmHoYeB.A7FohyBw/x50Z4MbgxpmrEv8io2P2','Montenegro','2020-11-15 18:25:06',0.00,'https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/67/6737515f5e4a806796cd75677a34c93668fbb5e9_full.jpg'),(8,'IZomONso','$2y$10$2svpsNPBARPSx82Rg/GsVuny8xoCF1qMORT7Byu6EAWSiWJdEu.AG','Macedonia','2020-11-15 18:25:06',0.00,'https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/00/00cf70a8049a71ea7cae83295f99c88a7b00599b_full.jpg'),(9,'DicaitYl','$2y$10$BMFXUR.AGxTqhgubJElTluWEHH0XQxWMbQT3x2wu0sac63RV9EJZG','Bulgaria','2020-11-15 18:25:06',0.00,'https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/71/71d93eb0a8032c081294f8f0f6eac13d12a43131_full.jpg'),(10,'ONEwarkl','$2y$10$NYtOVO0GF6DNLZPpRpqjNOcQ08rPc4vmk0dyHLIhRe4V/.9kqlHjK','Slovenia','2020-11-15 18:25:06',0.00,'https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/d1/d19fa6b89538f214763e156500f09d44114cd0bb_full.jpg'),(11,'HaFTEDiC','$2y$10$.h5/VaImJllFE1sgIArIdeyRFaZoPn.iF0C.Zu5T/vPI5sNyFlG7S','United States of America','2020-11-15 18:25:06',0.00,'https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/3d/3d2f1745411fe876d8ceee54df31ac20ef7ffa3e_full.jpg');
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

-- Dump completed on 2020-11-15 19:44:25
