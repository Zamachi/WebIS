/*
 Navicat Premium Data Transfer

 Source Server         : yuwanori
 Source Server Type    : MariaDB
 Source Server Version : 100414
 Source Host           : localhost:3306
 Source Schema         : wbis

 Target Server Type    : MariaDB
 Target Server Version : 100414
 File Encoding         : 65001

 Date: 16/11/2020 09:28:50
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for developed_by
-- ----------------------------
DROP TABLE IF EXISTS `developed_by`;
CREATE TABLE `developed_by`  (
  `developed_by_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `developer_id` int(10) UNSIGNED NOT NULL,
  `game_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`developed_by_id`) USING BTREE,
  UNIQUE INDEX `uq_developed_by_developer_id_game_id`(`developer_id`, `game_id`) USING BTREE,
  INDEX `fk_developed_by_game_id`(`game_id`) USING BTREE,
  CONSTRAINT `fk_developed_by_developer_id` FOREIGN KEY (`developer_id`) REFERENCES `developers` (`developer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_developed_by_game_id` FOREIGN KEY (`game_id`) REFERENCES `games` (`game_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 33 CHARACTER SET = utf8 COLLATE = utf8_unicode_520_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of developed_by
-- ----------------------------
INSERT INTO `developed_by` VALUES (1, 1, 1);
INSERT INTO `developed_by` VALUES (2, 1, 2);
INSERT INTO `developed_by` VALUES (3, 1, 3);
INSERT INTO `developed_by` VALUES (4, 1, 4);
INSERT INTO `developed_by` VALUES (7, 2, 5);
INSERT INTO `developed_by` VALUES (8, 2, 6);
INSERT INTO `developed_by` VALUES (9, 2, 7);
INSERT INTO `developed_by` VALUES (10, 2, 8);
INSERT INTO `developed_by` VALUES (11, 2, 9);
INSERT INTO `developed_by` VALUES (12, 3, 10);
INSERT INTO `developed_by` VALUES (13, 3, 11);
INSERT INTO `developed_by` VALUES (14, 3, 12);
INSERT INTO `developed_by` VALUES (15, 4, 13);
INSERT INTO `developed_by` VALUES (16, 4, 14);
INSERT INTO `developed_by` VALUES (17, 4, 15);
INSERT INTO `developed_by` VALUES (18, 4, 16);
INSERT INTO `developed_by` VALUES (30, 4, 28);
INSERT INTO `developed_by` VALUES (31, 4, 29);
INSERT INTO `developed_by` VALUES (19, 5, 17);
INSERT INTO `developed_by` VALUES (20, 6, 18);
INSERT INTO `developed_by` VALUES (21, 6, 19);
INSERT INTO `developed_by` VALUES (27, 7, 25);
INSERT INTO `developed_by` VALUES (28, 7, 26);
INSERT INTO `developed_by` VALUES (29, 7, 27);
INSERT INTO `developed_by` VALUES (22, 9, 20);
INSERT INTO `developed_by` VALUES (23, 11, 21);
INSERT INTO `developed_by` VALUES (24, 13, 22);
INSERT INTO `developed_by` VALUES (25, 13, 23);
INSERT INTO `developed_by` VALUES (26, 13, 24);
INSERT INTO `developed_by` VALUES (5, 14, 2);
INSERT INTO `developed_by` VALUES (6, 14, 4);
INSERT INTO `developed_by` VALUES (32, 15, 30);

-- ----------------------------
-- Table structure for developers
-- ----------------------------
DROP TABLE IF EXISTS `developers`;
CREATE TABLE `developers`  (
  `developer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `developer_name` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci NOT NULL,
  PRIMARY KEY (`developer_id`) USING BTREE,
  UNIQUE INDEX `uq_developers_developer_name`(`developer_name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8 COLLATE = utf8_unicode_520_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of developers
-- ----------------------------
INSERT INTO `developers` VALUES (1, 'Bethesda Softworks');
INSERT INTO `developers` VALUES (2, 'Blizzard Entertainment');
INSERT INTO `developers` VALUES (11, 'Capcom');
INSERT INTO `developers` VALUES (6, 'CD Projekt');
INSERT INTO `developers` VALUES (8, 'EA games');
INSERT INTO `developers` VALUES (5, 'Epic Games');
INSERT INTO `developers` VALUES (3, 'NCsoft');
INSERT INTO `developers` VALUES (15, 'Paradox Development Studio');
INSERT INTO `developers` VALUES (12, 'Rockstar');
INSERT INTO `developers` VALUES (13, 'Square Enix');
INSERT INTO `developers` VALUES (9, 'THQ');
INSERT INTO `developers` VALUES (7, 'Ubisoft');
INSERT INTO `developers` VALUES (4, 'VALVE Corporation');
INSERT INTO `developers` VALUES (10, 'XLGames');
INSERT INTO `developers` VALUES (14, 'Zenimax Media');

-- ----------------------------
-- Table structure for games
-- ----------------------------
DROP TABLE IF EXISTS `games`;
CREATE TABLE `games`  (
  `game_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci NOT NULL,
  `publish_date` date NOT NULL,
  `price` decimal(10, 2) UNSIGNED NOT NULL,
  `image` varchar(512) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci NULL DEFAULT NULL,
  `file` varchar(512) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci NULL DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_520_ci NULL DEFAULT NULL,
  PRIMARY KEY (`game_id`) USING BTREE,
  UNIQUE INDEX `uq_games_title`(`title`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 31 CHARACTER SET = utf8 COLLATE = utf8_unicode_520_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of games
-- ----------------------------
INSERT INTO `games` VALUES (1, 'The Elder Scrolls V Skyrim', '2011-11-11', 59.99, 'http://localhost/ProjekatZaDrugiKolokvijum/img/games/Skyrim.png', 'http://localhost/ProjekatZaDrugiKolokvijum/skyrim.php', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
INSERT INTO `games` VALUES (2, 'Fallout 76', '2018-10-23', 39.99, 'https://steamcdn-a.akamaihd.net/steam/apps/1151340/header.jpg?t=1588798263', 'http://localhost/ProjekatZaDrugiKolokvijum/fallout76.php', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
INSERT INTO `games` VALUES (3, 'Doom Eternal', '2020-03-20', 44.99, 'https://steamcdn-a.akamaihd.net/steam/apps/782330/header.jpg?t=1588895742', 'http://localhost/ProjekatZaDrugiKolokvijum/doometernal.php', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
INSERT INTO `games` VALUES (4, 'Elder Scrolls Online', '2014-02-28', 49.99, 'https://steamcdn-a.akamaihd.net/steam/apps/306130/header.jpg?t=1586472356', 'http://localhost/ProjekatZaDrugiKolokvijum/eso.php', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
INSERT INTO `games` VALUES (5, 'World of Warcraft', '2004-11-20', 49.99, 'https://upload.wikimedia.org/wikipedia/sr/thumb/9/91/WoW_Box_Art1.jpg/220px-WoW_Box_Art1.jpg', 'http://localhost/ProjekatZaDrugiKolokvijum/wow.php', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
INSERT INTO `games` VALUES (6, 'Overwatch', '2016-12-01', 59.99, 'https://img-a.udemycdn.com/course/750x422/1712892_fcab.jpg', 'http://localhost/ProjekatZaDrugiKolokvijum/overwatch.php', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
INSERT INTO `games` VALUES (7, 'Diablo III', '2012-05-24', 29.99, 'https://upload.wikimedia.org/wikipedia/sr/thumb/5/53/Diablo_III.png/220px-Diablo_III.png', 'http://localhost/ProjekatZaDrugiKolokvijum/diablo3.php', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
INSERT INTO `games` VALUES (8, 'StarCraft II: Wings of Liberty', '2010-12-24', 29.99, 'https://www.benchmark.rs/assets/img/article/large/3116f3e3c7894eafe2183650340a1198.jpg', 'http://localhost/ProjekatZaDrugiKolokvijum/starcraft2.php', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
INSERT INTO `games` VALUES (9, 'Warcraft III', '2002-01-21', 22.99, 'https://upload.wikimedia.org/wikipedia/en/6/66/WarcraftIII.jpg', 'http://localhost/ProjekatZaDrugiKolokvijum/warcraft3.php', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
INSERT INTO `games` VALUES (10, 'Lineage II', '2003-03-01', 0.00, 'https://mmoculture.com/wp-content/uploads/2019/11/Lineage-II-image.png', 'http://localhost/ProjekatZaDrugiKolokvijum/lineage2.php', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
INSERT INTO `games` VALUES (11, 'Blade & Soul', '2012-08-15', 0.00, 'https://mos.pcgamebenchmark.com/img/game/blade-soul/blade-soul-system-requirements.jpg', 'http://localhost/ProjekatZaDrugiKolokvijum/bladeandsoul.php', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
INSERT INTO `games` VALUES (12, 'Guild Wars 2', '2012-12-31', 15.00, 'https://cdna.artstation.com/p/assets/images/images/008/245/330/large/luke-dowding-gw2-pof-s4e01-movie-cover-web.jpg?1511448046', 'http://localhost/ProjekatZaDrugiKolokvijum/guildwars2.php', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
INSERT INTO `games` VALUES (13, 'Dota 2', '2013-06-30', 0.00, 'https://www.benchmark.rs/assets/img/news/big_thumb/f5a5527f3ea2c2b26f51dffd64f8ec09.jpg', 'http://localhost/ProjekatZaDrugiKolokvijum/dota2.php', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
INSERT INTO `games` VALUES (14, 'Half-Life 2', '2004-02-24', 30.00, 'https://steamcdn-a.akamaihd.net/half-life.com/images/halflife2/halflife2_coverart.jpg', 'http://localhost/ProjekatZaDrugiKolokvijum/halflife2.php', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
INSERT INTO `games` VALUES (15, 'Portal 2', '2004-02-24', 30.00, 'https://steamcdn-a.akamaihd.net/steam/apps/620/header.jpg?t=1587582232', 'http://localhost/ProjekatZaDrugiKolokvijum/portal2.php', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
INSERT INTO `games` VALUES (16, 'Counter-Strike: Global Offensive', '2012-02-24', 12.00, 'https://cdn-cf.gamivo.com/image_cover.jpg?f=26073&n=47263531930005853.jpg&h=8104eb1555ac18f00b0f464b3a565cae', 'http://localhost/ProjekatZaDrugiKolokvijum/csgo.php', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
INSERT INTO `games` VALUES (17, 'Fortnite', '2018-12-29', 0.00, 'https://play.co.rs/wp-content/uploads/2020/04/fortnite-chapter-2-season-2-extended.jpg', 'http://localhost/ProjekatZaDrugiKolokvijum/fortnite.php', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
INSERT INTO `games` VALUES (18, 'Cyberpunk 2077', '2020-12-29', 59.99, 'https://play.co.rs/wp-content/uploads/2019/11/keanu-reeves-cyberpunk-2077-johnny-silverhand-740x415.jpg', 'http://localhost/ProjekatZaDrugiKolokvijum/cyberpunk.php', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
INSERT INTO `games` VALUES (19, 'Witcher 3: Wild Hunt', '2015-09-12', 59.99, 'https://upload.wikimedia.org/wikipedia/sr/thumb/0/0c/Witcher_3_cover_art.jpg/220px-Witcher_3_cover_art.jpg', 'http://localhost/ProjekatZaDrugiKolokvijum/witcher3.php', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
INSERT INTO `games` VALUES (20, 'Warhammer 40k: Dawn of War', '2004-09-24', 24.99, 'https://upload.wikimedia.org/wikipedia/en/thumb/9/9f/Dawn_of_War_box_art.jpg/220px-Dawn_of_War_box_art.jpg', 'http://localhost/ProjekatZaDrugiKolokvijum/dawnofwar.php', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
INSERT INTO `games` VALUES (21, 'ArcheAge', '2013-08-01', 0.00, 'https://mmoexaminer.com/wp-content/uploads/2016/11/archeage.jpg', 'http://localhost/ProjekatZaDrugiKolokvijum/archeage.php', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
INSERT INTO `games` VALUES (22, 'Grand Theft Auto V', '2013-08-01', 59.99, 'https://images.g2a.com/newlayout/323x433/1x1x0/387a113709aa/59e5efeb5bafe304c4426c47', 'http://localhost/ProjekatZaDrugiKolokvijum/gta5.php', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
INSERT INTO `games` VALUES (23, 'Red Dead Redemption 2', '2018-02-01', 59.99, 'https://lh3.googleusercontent.com/HCUkD69MAHEOj84Yi7Kb5vxHpCePTsmQI4g9vYuVPUo-87cWE6ZZIk0tiyYzaiS9zaAFMTXRNYJaaRczRN-yQYw', 'http://localhost/ProjekatZaDrugiKolokvijum/rdr2.php', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
INSERT INTO `games` VALUES (24, 'L.A Noire', '2011-02-01', 39.99, 'https://images.g2a.com/newlayout/323x433/1x1x0/3f27caac79f1/59111993ae653ac90c267e63', 'http://localhost/ProjekatZaDrugiKolokvijum/lanoire.php', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
INSERT INTO `games` VALUES (25, 'Tom Clancy\'s Rainbow Six Siege', '2015-04-07', 49.99, 'https://steamuserimages-a.akamaihd.net/ugc/960852464597139563/9C68B626D0D28C71EE4F34D371F4BD406BAE03B8/', 'http://localhost/ProjekatZaDrugiKolokvijum/rainbowsixsiege.php', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
INSERT INTO `games` VALUES (26, 'Assassin\'s Creed Odyssey', '2018-09-07', 69.99, 'https://play.co.rs/wp-content/uploads/2018/11/Assassins-Creed-Odyssey-cover.jpg', 'http://localhost/ProjekatZaDrugiKolokvijum/acodyssey.php', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
INSERT INTO `games` VALUES (27, 'Watch Dogs', '2014-05-21', 54.99, 'https://s3.gaming-cdn.com/images/products/254/orig/watch-dogs-cover.jpg', 'http://localhost/ProjekatZaDrugiKolokvijum/watchdogs.php', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
INSERT INTO `games` VALUES (28, 'Stardew Valley', '2016-05-21', 14.99, 'https://lh3.googleusercontent.com/IRzV1qSynfxIIS3huwZuAc5V8Jbej8N2dvX-yuVcCeCbRfgMGOxOjO_KlJpVH9d8jQ1cOXdSp5cL__8KOdlMeVyh0Q', 'http://localhost/ProjekatZaDrugiKolokvijum/stardewvalley.php', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
INSERT INTO `games` VALUES (29, 'Terraria', '2011-05-21', 4.99, 'https://www.mobygames.com/images/covers/l/293163-terraria-windows-front-cover.jpg', 'http://localhost/ProjekatZaDrugiKolokvijum/terraria.php', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
INSERT INTO `games` VALUES (30, 'Crusader Kings II', '2012-05-21', 99.99, 'https://images.g2a.com/newlayout/323x433/1x1x0/f33820499db3/5911b0d3ae653a3da06fbd97', 'http://localhost/ProjekatZaDrugiKolokvijum/crusaderkings2.php', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');

-- ----------------------------
-- Table structure for games_tags
-- ----------------------------
DROP TABLE IF EXISTS `games_tags`;
CREATE TABLE `games_tags`  (
  `games_tags_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tag_id` int(10) UNSIGNED NOT NULL,
  `game_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`games_tags_id`) USING BTREE,
  UNIQUE INDEX `uq_games_tags_tag_id_game_id`(`tag_id`, `game_id`) USING BTREE,
  INDEX `fk_games_tags_game_id`(`game_id`) USING BTREE,
  CONSTRAINT `fk_games_tags_game_id` FOREIGN KEY (`game_id`) REFERENCES `games` (`game_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_games_tags_tag_id` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`tag_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 42 CHARACTER SET = utf8 COLLATE = utf8_unicode_520_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of games_tags
-- ----------------------------
INSERT INTO `games_tags` VALUES (1, 1, 1);
INSERT INTO `games_tags` VALUES (2, 1, 4);
INSERT INTO `games_tags` VALUES (3, 1, 5);
INSERT INTO `games_tags` VALUES (4, 1, 7);
INSERT INTO `games_tags` VALUES (5, 1, 10);
INSERT INTO `games_tags` VALUES (6, 1, 11);
INSERT INTO `games_tags` VALUES (7, 1, 12);
INSERT INTO `games_tags` VALUES (8, 1, 18);
INSERT INTO `games_tags` VALUES (9, 1, 19);
INSERT INTO `games_tags` VALUES (10, 1, 21);
INSERT INTO `games_tags` VALUES (11, 1, 22);
INSERT INTO `games_tags` VALUES (12, 1, 26);
INSERT INTO `games_tags` VALUES (13, 2, 1);
INSERT INTO `games_tags` VALUES (14, 2, 2);
INSERT INTO `games_tags` VALUES (15, 2, 4);
INSERT INTO `games_tags` VALUES (16, 2, 5);
INSERT INTO `games_tags` VALUES (17, 2, 7);
INSERT INTO `games_tags` VALUES (18, 2, 8);
INSERT INTO `games_tags` VALUES (19, 2, 10);
INSERT INTO `games_tags` VALUES (20, 2, 11);
INSERT INTO `games_tags` VALUES (21, 2, 12);
INSERT INTO `games_tags` VALUES (22, 2, 17);
INSERT INTO `games_tags` VALUES (23, 2, 18);
INSERT INTO `games_tags` VALUES (24, 2, 19);
INSERT INTO `games_tags` VALUES (25, 2, 20);
INSERT INTO `games_tags` VALUES (26, 2, 21);
INSERT INTO `games_tags` VALUES (27, 5, 2);
INSERT INTO `games_tags` VALUES (28, 5, 3);
INSERT INTO `games_tags` VALUES (29, 5, 6);
INSERT INTO `games_tags` VALUES (30, 5, 14);
INSERT INTO `games_tags` VALUES (31, 5, 16);
INSERT INTO `games_tags` VALUES (32, 5, 17);
INSERT INTO `games_tags` VALUES (33, 5, 18);
INSERT INTO `games_tags` VALUES (34, 5, 22);
INSERT INTO `games_tags` VALUES (35, 5, 23);
INSERT INTO `games_tags` VALUES (36, 5, 25);
INSERT INTO `games_tags` VALUES (37, 5, 27);
INSERT INTO `games_tags` VALUES (38, 11, 8);
INSERT INTO `games_tags` VALUES (39, 11, 9);
INSERT INTO `games_tags` VALUES (40, 11, 20);
INSERT INTO `games_tags` VALUES (41, 13, 21);

-- ----------------------------
-- Table structure for library
-- ----------------------------
DROP TABLE IF EXISTS `library`;
CREATE TABLE `library`  (
  `library_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `hours_played` decimal(10, 2) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `game_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`library_id`) USING BTREE,
  UNIQUE INDEX `uq_library_user_id_game_id`(`user_id`, `game_id`) USING BTREE,
  INDEX `fk_library_game_id`(`game_id`) USING BTREE,
  CONSTRAINT `fk_library_game_id` FOREIGN KEY (`game_id`) REFERENCES `games` (`game_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_library_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 50 CHARACTER SET = utf8 COLLATE = utf8_unicode_520_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of library
-- ----------------------------
INSERT INTO `library` VALUES (1, 532.64, 5, 7);
INSERT INTO `library` VALUES (2, 365.15, 1, 27);
INSERT INTO `library` VALUES (3, 924.32, 2, 26);
INSERT INTO `library` VALUES (4, 483.89, 6, 23);
INSERT INTO `library` VALUES (5, 163.06, 3, 23);
INSERT INTO `library` VALUES (6, 693.63, 1, 2);
INSERT INTO `library` VALUES (7, 392.14, 3, 15);
INSERT INTO `library` VALUES (8, 24.15, 7, 15);
INSERT INTO `library` VALUES (9, 69.72, 1, 29);
INSERT INTO `library` VALUES (10, 361.68, 1, 25);
INSERT INTO `library` VALUES (11, 219.77, 6, 3);
INSERT INTO `library` VALUES (12, 515.14, 1, 19);
INSERT INTO `library` VALUES (13, 345.78, 10, 12);
INSERT INTO `library` VALUES (14, 408.10, 8, 16);
INSERT INTO `library` VALUES (15, 815.29, 8, 20);
INSERT INTO `library` VALUES (16, 665.57, 9, 7);
INSERT INTO `library` VALUES (17, 950.54, 7, 29);
INSERT INTO `library` VALUES (18, 240.65, 7, 8);
INSERT INTO `library` VALUES (19, 798.00, 10, 21);
INSERT INTO `library` VALUES (20, 110.49, 8, 13);
INSERT INTO `library` VALUES (21, 982.35, 2, 12);
INSERT INTO `library` VALUES (22, 217.57, 3, 30);
INSERT INTO `library` VALUES (23, 862.66, 5, 11);
INSERT INTO `library` VALUES (24, 374.02, 9, 11);
INSERT INTO `library` VALUES (25, 436.42, 6, 17);
INSERT INTO `library` VALUES (26, 311.44, 10, 22);
INSERT INTO `library` VALUES (27, 793.11, 1, 7);
INSERT INTO `library` VALUES (28, 413.58, 3, 12);
INSERT INTO `library` VALUES (29, 80.40, 8, 8);
INSERT INTO `library` VALUES (30, 337.10, 3, 9);
INSERT INTO `library` VALUES (31, 739.30, 3, 11);
INSERT INTO `library` VALUES (32, 979.02, 9, 18);
INSERT INTO `library` VALUES (33, 352.60, 4, 5);
INSERT INTO `library` VALUES (34, 352.70, 1, 26);
INSERT INTO `library` VALUES (35, 917.75, 8, 7);
INSERT INTO `library` VALUES (36, 544.17, 8, 1);
INSERT INTO `library` VALUES (37, 298.10, 1, 6);
INSERT INTO `library` VALUES (38, 70.21, 3, 22);
INSERT INTO `library` VALUES (39, 309.54, 5, 6);
INSERT INTO `library` VALUES (40, 752.84, 5, 15);
INSERT INTO `library` VALUES (41, 514.98, 9, 16);
INSERT INTO `library` VALUES (42, 437.65, 3, 19);
INSERT INTO `library` VALUES (43, 686.33, 7, 27);
INSERT INTO `library` VALUES (44, 25.27, 9, 13);
INSERT INTO `library` VALUES (45, 867.78, 1, 4);
INSERT INTO `library` VALUES (46, 960.80, 8, 12);
INSERT INTO `library` VALUES (47, 367.99, 8, 23);
INSERT INTO `library` VALUES (48, 354.39, 9, 20);
INSERT INTO `library` VALUES (49, 383.35, 7, 25);

-- ----------------------------
-- Table structure for tags
-- ----------------------------
DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags`  (
  `tag_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci NOT NULL,
  PRIMARY KEY (`tag_id`) USING BTREE,
  UNIQUE INDEX `uq_tags_tag_name`(`tag_name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_unicode_520_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tags
-- ----------------------------
INSERT INTO `tags` VALUES (7, '2D');
INSERT INTO `tags` VALUES (1, 'Fantasy');
INSERT INTO `tags` VALUES (5, 'FPS');
INSERT INTO `tags` VALUES (6, 'Horror');
INSERT INTO `tags` VALUES (9, 'Indie');
INSERT INTO `tags` VALUES (8, 'Medieval');
INSERT INTO `tags` VALUES (12, 'MMO');
INSERT INTO `tags` VALUES (4, 'Multiplayer');
INSERT INTO `tags` VALUES (10, 'Roguelike');
INSERT INTO `tags` VALUES (2, 'RPG');
INSERT INTO `tags` VALUES (11, 'RTS');
INSERT INTO `tags` VALUES (13, 'Sandbox');
INSERT INTO `tags` VALUES (3, 'Singleplayer');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci NOT NULL,
  `password` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci NOT NULL,
  `country` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci NOT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp,
  `account_balance` decimal(10, 2) UNSIGNED NOT NULL DEFAULT 0,
  `avatar` varchar(512) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`) USING BTREE,
  UNIQUE INDEX `uq_users_username`(`username`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_unicode_520_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Mikeyyyy', '$2y$10$F1J7R3DwifsE7DCIUQ9wg.TAM9ecwkICMTShQ27ql7zZcE06Xid7u', 'United Kingdom', '2020-11-15 18:25:06', 0.00, 'https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/1b/1b82bca939309ae692dd697df93b3b1281a7dc63_full.jpg');
INSERT INTO `users` VALUES (2, 'Steph999', '$2y$10$AMlHS4otY1eoxXLgyZ4jq.EzzHChDvg66AQ.bpB4fXfPn9pw7HREG', 'Serbia', '2020-11-15 18:25:06', 0.00, 'https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/00/006b07a8c10b3b86ac8f4850f4dfd48bf251295c_full.jpg');
INSERT INTO `users` VALUES (3, 'StivENDy', '$2y$10$VgzBpZmC4pxetVZxbDdxXOa2VDDsyC25mfuF10vZ0ZT3fp3luzKTq', 'Romania', '2020-11-15 18:25:06', 0.00, 'https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/00/00a9394dbe2341bc73d2b198894e246748e93f75_full.jpg');
INSERT INTO `users` VALUES (4, 'LinERGEb', '$2y$10$a/9T9yrFIArY6jwojcxlquybX/JOn47jsYRxdLJC3HQKsSS15..Le', 'Bosnia and Herzegovina', '2020-11-15 18:25:06', 0.00, 'https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/4d/4dc5a3517abffa33b060ad3aa5dbbcde80d016a4_full.jpg');
INSERT INTO `users` VALUES (5, 'EsTRATei', '$2y$10$3cx7XlSAgEXe35Cp3QfaXeMGZBVS4ow2FNTfrGBXgzstNvasMNM.S', 'Albania', '2020-11-15 18:25:06', 0.00, 'https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/c6/c6867005599b89265633356c9634998b7ac7414e_full.jpg');
INSERT INTO `users` VALUES (6, 'IveliSPH', '$2y$10$hSY7wjavZmUhA7LspTZARuXsxeqTBrriTrNFYdysPQ45eq6kWqFry', 'Hungary', '2020-11-15 18:25:06', 0.00, 'https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/7f/7f95e593302f4101ec1f72845df62c85b48d0a58_full.jpg');
INSERT INTO `users` VALUES (7, 'ITUPTioN', '$2y$10$PINd5OE./seSmzQUEmHoYeB.A7FohyBw/x50Z4MbgxpmrEv8io2P2', 'Montenegro', '2020-11-15 18:25:06', 0.00, 'https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/67/6737515f5e4a806796cd75677a34c93668fbb5e9_full.jpg');
INSERT INTO `users` VALUES (8, 'IZomONso', '$2y$10$2svpsNPBARPSx82Rg/GsVuny8xoCF1qMORT7Byu6EAWSiWJdEu.AG', 'Macedonia', '2020-11-15 18:25:06', 0.00, 'https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/00/00cf70a8049a71ea7cae83295f99c88a7b00599b_full.jpg');
INSERT INTO `users` VALUES (9, 'DicaitYl', '$2y$10$BMFXUR.AGxTqhgubJElTluWEHH0XQxWMbQT3x2wu0sac63RV9EJZG', 'Bulgaria', '2020-11-15 18:25:06', 0.00, 'https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/71/71d93eb0a8032c081294f8f0f6eac13d12a43131_full.jpg');
INSERT INTO `users` VALUES (10, 'ONEwarkl', '$2y$10$NYtOVO0GF6DNLZPpRpqjNOcQ08rPc4vmk0dyHLIhRe4V/.9kqlHjK', 'Slovenia', '2020-11-15 18:25:06', 0.00, 'https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/d1/d19fa6b89538f214763e156500f09d44114cd0bb_full.jpg');
INSERT INTO `users` VALUES (11, 'HaFTEDiC', '$2y$10$.h5/VaImJllFE1sgIArIdeyRFaZoPn.iF0C.Zu5T/vPI5sNyFlG7S', 'United States of America', '2020-11-15 18:25:06', 0.00, 'https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/3d/3d2f1745411fe876d8ceee54df31ac20ef7ffa3e_full.jpg');

SET FOREIGN_KEY_CHECKS = 1;
