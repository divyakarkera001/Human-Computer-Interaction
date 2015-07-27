-- MySQL dump 10.13  Distrib 5.6.17, for osx10.7 (x86_64)
--
-- Host: localhost    Database: wildbook
-- ------------------------------------------------------
-- Server version	5.6.17-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `activity`
--

DROP TABLE IF EXISTS `activity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activity` (
  `act_id` int(11) NOT NULL,
  `location_name` varchar(45) NOT NULL,
  `loc_lat` decimal(8,4) DEFAULT NULL,
  `loc_long` decimal(8,4) DEFAULT NULL,
  `ic_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT '0',
  PRIMARY KEY (`act_id`),
  KEY `FK_ACT_IC_idx` (`ic_id`),
  CONSTRAINT `FK_ACT_IC` FOREIGN KEY (`ic_id`) REFERENCES `interest_category` (`ic_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activity`
--

LOCK TABLES `activity` WRITE;
/*!40000 ALTER TABLE `activity` DISABLE KEYS */;
INSERT INTO `activity` VALUES (1,'Goa',999.0000,999.0000,5,4),(2,'KOA',19.7389,156.0456,1,3),(3,'El Captain',37.7340,119.6370,2,4),(4,'Pacific Port',72.7451,-11.7652,3,4),(5,'Bangalore',12.9939,77.6514,5,0),(6,'Mexico',-0.3428,-56.5129,2,0),(7,'Mexico',-0.3428,-56.5129,2,0),(8,'Mexico',-0.3428,-56.5129,2,0),(9,'Iraq',32.4974,44.6543,3,0),(10,'green',77.5294,-43.2363,4,0);
/*!40000 ALTER TABLE `activity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_id` int(11) DEFAULT NULL,
  `u_id` int(11) DEFAULT NULL,
  `comment_str` varchar(255) NOT NULL,
  `commented_on` date NOT NULL,
  PRIMARY KEY (`c_id`),
  KEY `FK_COMMENT_POST_idx` (`p_id`),
  KEY `FK_COMMENT_USER_idx` (`u_id`),
  CONSTRAINT `FK_COMMENT_POST` FOREIGN KEY (`p_id`) REFERENCES `post` (`p_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_COMMENT_USER` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` VALUES (1,1,2,'Nice Pics.','2014-02-14'),(2,1,3,'Wow.','2014-02-15'),(3,2,1,'Die...Die...Die :)','2013-07-14'),(4,4,1,'asdf','2014-05-12'),(5,4,1,'asdf','2014-05-12'),(6,1,1,'a','2014-05-13'),(7,1,13,'Seen This','2014-05-13'),(8,1,13,'Nice Pic...','2014-05-13');
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `friends`
--

DROP TABLE IF EXISTS `friends`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `friends` (
  `u1_id` int(11) NOT NULL DEFAULT '0',
  `u2_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`u1_id`,`u2_id`),
  KEY `FK_FR_USER_U2_idx` (`u2_id`),
  CONSTRAINT `FK_FR_USER_U1` FOREIGN KEY (`u1_id`) REFERENCES `user` (`u_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_FR_USER_U2` FOREIGN KEY (`u2_id`) REFERENCES `user` (`u_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `friends`
--

LOCK TABLES `friends` WRITE;
/*!40000 ALTER TABLE `friends` DISABLE KEYS */;
INSERT INTO `friends` VALUES (2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(11,1),(13,1),(1,2),(1,3),(1,4),(1,5),(1,6),(1,7),(1,8),(10,9),(9,10),(1,11),(10,11),(13,11),(1,13),(11,13);
/*!40000 ALTER TABLE `friends` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `interest_category`
--

DROP TABLE IF EXISTS `interest_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `interest_category` (
  `ic_id` int(11) NOT NULL,
  `Name` varchar(45) NOT NULL,
  PRIMARY KEY (`ic_id`),
  UNIQUE KEY `Name_UNIQUE` (`Name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `interest_category`
--

LOCK TABLES `interest_category` WRITE;
/*!40000 ALTER TABLE `interest_category` DISABLE KEYS */;
INSERT INTO `interest_category` VALUES (5,'Bird Watching'),(1,'Camping'),(3,'Deep Sea Diving'),(4,'Fishing'),(2,'Rock Climbing');
/*!40000 ALTER TABLE `interest_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `interested_in`
--

DROP TABLE IF EXISTS `interested_in`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `interested_in` (
  `u_id` int(11) NOT NULL,
  `ic_id` int(11) NOT NULL,
  PRIMARY KEY (`u_id`,`ic_id`),
  KEY `FK_II_IC_idx` (`ic_id`),
  CONSTRAINT `FK_II_IC` FOREIGN KEY (`ic_id`) REFERENCES `interest_category` (`ic_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_II_USER` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `interested_in`
--

LOCK TABLES `interested_in` WRITE;
/*!40000 ALTER TABLE `interested_in` DISABLE KEYS */;
INSERT INTO `interested_in` VALUES (1,1),(1,2),(2,2),(1,3),(1,4),(2,4),(4,4),(1,5),(9,5),(10,5);
/*!40000 ALTER TABLE `interested_in` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pending_req`
--

DROP TABLE IF EXISTS `pending_req`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pending_req` (
  `req_from` int(11) NOT NULL,
  `req_to` int(11) NOT NULL,
  `requested_on` date NOT NULL,
  PRIMARY KEY (`req_from`,`req_to`),
  KEY `FR_PR_USER_idx` (`req_to`),
  CONSTRAINT `FK_PR_USER` FOREIGN KEY (`req_from`) REFERENCES `user` (`u_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FR_PR_USER` FOREIGN KEY (`req_to`) REFERENCES `user` (`u_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pending_req`
--

LOCK TABLES `pending_req` WRITE;
/*!40000 ALTER TABLE `pending_req` DISABLE KEYS */;
INSERT INTO `pending_req` VALUES (1,12,'2014-05-12'),(10,5,'2014-05-22'),(12,1,'2014-05-13');
/*!40000 ALTER TABLE `pending_req` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post` (
  `p_id` int(11) NOT NULL,
  `u_id` int(11) DEFAULT NULL,
  `title` varchar(45) NOT NULL,
  `posted_on` date NOT NULL,
  `access_ctl` int(11) NOT NULL DEFAULT '0',
  `likes` int(11) DEFAULT '0',
  PRIMARY KEY (`p_id`),
  KEY `FK_POST_USER_idx` (`u_id`),
  CONSTRAINT `FK_POST_USER` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` VALUES (1,1,'Goa Trip','2014-02-14',0,1011),(2,2,'El Captain Rock Climbing','2013-07-13',1,100),(3,11,'Pacific Ocean Sea Dive','1014-04-11',0,11),(4,1,'Back To Bang Bang','2014-05-09',0,2),(5,13,'Been to mexico','2014-05-13',0,0),(6,13,'Been to mexico','2014-05-13',0,0),(7,13,'Been to mexico','2014-05-13',0,0),(8,13,'Iraq','2014-05-13',0,0),(9,13,'green','2014-05-13',0,0);
/*!40000 ALTER TABLE `post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_content`
--

DROP TABLE IF EXISTS `post_content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post_content` (
  `pc_id` int(11) NOT NULL,
  `p_id` int(11) DEFAULT NULL,
  `content` varchar(255) NOT NULL,
  `likes` int(11) NOT NULL DEFAULT '0',
  `content_type` varchar(45) NOT NULL,
  PRIMARY KEY (`pc_id`),
  KEY `FK_PC_POST_idx` (`p_id`),
  CONSTRAINT `FK_PC_POST` FOREIGN KEY (`p_id`) REFERENCES `post` (`p_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_content`
--

LOCK TABLES `post_content` WRITE;
/*!40000 ALTER TABLE `post_content` DISABLE KEYS */;
INSERT INTO `post_content` VALUES (1,1,'The trip was exciting. Got to see a lot of Birds.',10,'text'),(2,1,'content/pic1.jpg',5,'pic'),(3,2,'The rock climb almost killed me.',100,'text'),(4,3,'Got to swim with the whales.',150,'text'),(5,3,'content/whales_n_me.mp4',150,'vid'),(6,4,'content/Friends_of_Music_logo.jpg',0,'pic'),(7,4,'Returning to Bangalore after an year. Loving It.',0,'text'),(8,5,'content/comments.png',0,'pic'),(9,5,'asdsgd',0,'text'),(10,6,'content/comments.png',0,'pic'),(11,6,'asdsgd',0,'text'),(12,7,'content/comments.png',0,'pic'),(13,7,'asdsgd',0,'text'),(14,8,'Iraq',0,'text'),(15,9,'green',0,'text');
/*!40000 ALTER TABLE `post_content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_for_activity`
--

DROP TABLE IF EXISTS `post_for_activity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post_for_activity` (
  `act_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  PRIMARY KEY (`act_id`,`p_id`),
  KEY `FK_PFA_POST_idx` (`p_id`),
  CONSTRAINT `FK_PFA_ACT` FOREIGN KEY (`act_id`) REFERENCES `activity` (`act_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_PFA_POST` FOREIGN KEY (`p_id`) REFERENCES `post` (`p_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_for_activity`
--

LOCK TABLES `post_for_activity` WRITE;
/*!40000 ALTER TABLE `post_for_activity` DISABLE KEYS */;
INSERT INTO `post_for_activity` VALUES (1,1),(3,2),(4,3),(5,4),(6,5),(7,6),(8,7),(9,8),(10,9);
/*!40000 ALTER TABLE `post_for_activity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posy_1`
--

DROP TABLE IF EXISTS `posy_1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posy_1` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_id` int(11) DEFAULT NULL,
  `title` varchar(45) NOT NULL,
  `posted_on` date NOT NULL,
  `access_ctl` int(11) NOT NULL DEFAULT '0',
  `likes` int(11) DEFAULT '0',
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posy_1`
--

LOCK TABLES `posy_1` WRITE;
/*!40000 ALTER TABLE `posy_1` DISABLE KEYS */;
INSERT INTO `posy_1` VALUES (1,1,'Goa Trip','2014-02-14',0,1009),(2,2,'El Captain Rock Climbing','2013-07-13',1,100),(3,11,'Pacific Ocean Sea Dive','1014-04-11',0,11);
/*!40000 ALTER TABLE `posy_1` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `dob` date DEFAULT NULL,
  `introduction` varchar(70) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `ph_num` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`u_id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'san339@nyu.edu','qwerty','1988-12-31','Traveler Enthusiast','273 Bergen St','2015655504'),(2,'hsp339@nyu.edu','qwerty','1989-12-31','Travel Enthusiast','273 Bergen St','2015656505'),(3,'nikki@dav.edu','qwerty','1990-12-31','Travel Enthusiast','273 Bergen St','2015655506'),(4,'kau@dav.edu','qwerty','1991-12-31','Travel Enthusiast','273 Bergen St','2015655507'),(5,'rv@cisco.com','qwerty','1991-12-31','Travel Enthusiast','273 Bergen St','2015655508'),(6,'mkp@tcs.com','qwerty','1992-12-31','Travel Enthusiast','273 Bergen St','2015655509'),(7,'vg@ibm.com','qwerty','1992-12-31','Travel Enthusiast','273 Bergen St','2015655510'),(8,'pts@ge.com','qwerty','1992-12-31','Travel Enthusiast','273 Bergen St','2015655511'),(9,'hn@dell.com','qwerty','1990-11-17','Bird Watcher','Nagenhalli','9591505060'),(10,'sk@sap.com','asdfgh','1991-11-17','Bird Watcher','Nagenhalli','9591505061'),(11,'sa@subex.com','asdfgh','1991-10-12','Deep Sea Diver','Kodigehalli',NULL),(12,'abc@pqr.com','qwerty',NULL,NULL,NULL,NULL),(13,'qwe@rty.com','qwerty',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-12-04 12:37:55
