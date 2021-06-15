-- MariaDB dump 10.17  Distrib 10.4.14-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: tamponi
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
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomeUtente` varchar(20) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `cancellato` int(11) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nomeUtente` (`nomeUtente`),
  UNIQUE KEY `password` (`password`),
  KEY `id_admin` (`id_admin`),
  CONSTRAINT `account_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `account` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account`
--

LOCK TABLES `account` WRITE;
/*!40000 ALTER TABLE `account` DISABLE KEYS */;
INSERT INTO `account` VALUES (4,'Roberto','$2y$10$mzAvo/zTGtbNrgqj7HISrOQ8AFOM472zk7r8UxKi7LAYmkCShu9pC',1,NULL,0),(5,'Mario','$2y$10$d.a44Sml90h2Nh7m6NziC.AUnBoviACSoZqKwqZqJehayXof52zGu',0,4,0),(6,'Mirco','$2y$10$JAdKCnf24H6mCnmFVP43we4nBD2bN.GzIzBFY//.2lfZqArwwXv/e',0,4,1),(7,'Jacopo','$2y$10$WR1zs9UvbLaSJpgG2HH7je2oomZ73mw0AblHVZ.mDVbbL1N2b1HaG',0,4,1),(8,'Albert','$2y$10$rIl.yyoNbv8QzeQ3WbmwBOs1ugCz.mAEARo9wiROJfAkSdwW0dkE6',0,4,0),(9,'Marco','$2y$10$xTPoRxxzgbWy0zT1wRN7iuPaBR.vmnOPXSe7GbjTAkdFXOYJY2w2S',0,4,1),(10,'Marocchino','$2y$10$PaZ9gHWBrfVAF9dAYbtz/ew2J6J7SgblP/zDzZqRN6oJwC4wwVIRG',0,4,1),(11,'Giuseppe','$2y$10$oNBBK825ripNsXPnniZYyuypJJLMYqSc0peBpUYWSvwMmY4SKHo52',0,4,1),(12,'Daniele','$2y$10$Nu/zwuXw9kpyzBvSfKY9UuuX8Lu5qyuguIPqeHw4p0BZI9cWsQpHq',0,4,1);
/*!40000 ALTER TABLE `account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prenotazione`
--

DROP TABLE IF EXISTS `prenotazione`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prenotazione` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `giorno` date NOT NULL,
  `codice_fiscale` varchar(20) NOT NULL,
  `codice` varchar(40) NOT NULL,
  `annullata` tinyint(1) NOT NULL,
  `id_presidio` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_presidio` (`id_presidio`),
  CONSTRAINT `prenotazione_ibfk_1` FOREIGN KEY (`id_presidio`) REFERENCES `presidio` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prenotazione`
--

LOCK TABLES `prenotazione` WRITE;
/*!40000 ALTER TABLE `prenotazione` DISABLE KEYS */;
INSERT INTO `prenotazione` VALUES (1,'2021-05-04','sgndfhdfhgsfdg','124213',0,1),(2,'2021-05-12','sdfghgsdfh','2316512',0,1),(4,'2021-05-12','aeerfhdefh','2456146',0,2),(5,'2021-05-11','afbdbdfghsg','152513412',1,1),(14,'2021-05-09','Roberto','BxMvp2UEb8',0,1),(15,'2021-05-09','Roberto','wltDyoW67V',0,1),(18,'2021-05-10','Robertoaqsfg','LkobyIFqOC',0,2),(19,'2021-05-11','asfawrfw','vxTzktw0yH',0,2),(20,'2021-05-11','asgasdg','V1mNnPjpQD',0,2),(21,'2021-05-12','afgawf','av0O2wUbl8',0,2),(22,'2021-05-12','Robertoaqsfg','iengUkQC2S',0,2),(23,'2021-05-13','Robertoaqsfg','YNIefJ0cLw',0,2),(25,'2021-05-11','Roberto','GHDp3sUJPc',0,2),(26,'2021-05-12','Robertoaqsfg','UVj92nESNI',0,2),(27,'2021-05-08','Roberto','81xZMICzdt',0,1),(28,'2021-05-12','Robertoaqsfg','quHOkKWlhC',0,2),(29,'2021-05-11','gag','5ndSmECkrY',0,2),(30,'2021-05-13','asdgfasf','Fc5pyI4sXj',0,2),(31,'2021-05-11','Robertoaqsfg','bstjafCJER',0,2),(33,'2021-05-11','Robertoaqsfg','M1meEhLyXk',0,2),(34,'2021-05-13','Robertoaqsfg','dwrMoc3YNA',0,2),(35,'2021-05-10','Roberto','5KUlidXTqm',0,2),(36,'2021-05-10','Roberto','WfbdpJZth6',0,2),(37,'2021-05-13','Robertoaqsfg','X5qHyBTeAD',0,2),(38,'2021-05-12','Robertoaqsfg','EyBfrcXqk4',0,2),(42,'2021-05-10','Roberto','Ei2Y1rZlFB',0,1),(43,'2021-05-10','Roberto','FqZToPWOIh',0,2),(44,'2021-05-10','Robertoaqsfg','zpDScFfQGl',0,2),(45,'2021-05-13','Robertoaqsfg','qgp4dDesiL',0,2),(46,'2021-05-10','Roberto','LsS5cY2PZK',1,2),(47,'2021-05-15','Robertoaqsfg','OxCTjF60rB',0,2),(49,'2021-05-15','Roberto','e167BZLi0m',0,2),(50,'2021-05-16','Robertoaqsfg','6uxakpOn8M',0,2),(51,'2021-05-16','Roberto','7TMbVzyDeC',0,2),(52,'2021-05-15','Roberto','CldpjG0yXx',0,2),(53,'2021-05-16','Roberto','KfkbpZQM1W',1,2),(54,'2021-05-16','Robertoaqsfg','S8WljU2h0p',1,3),(55,'2021-05-19','DCAMVN80L46E146G','EZ7sI6h5g0',0,3),(56,'2021-05-14','RCVTYH82B08G583O','iFkMRuUWJH',0,3),(57,'2021-05-14','FNJSCG61H02L603R','0y6izfcdbs',0,1),(58,'2021-05-14','CSZTWF57R27H033B','V7Xp94dkrY',0,1),(59,'2021-05-17','BXLFGQ99L63G890P','BWE8vp1Lnk',1,3),(60,'2021-05-16','Marocchina123','w3tvTz5D8U',1,3),(61,'2021-06-18','12qwetqwetr23tq34t','aiLkGY8mZ1',0,3),(62,'2021-06-17','FKYTZV89T16L631P','zOY4v79C3q',1,3),(63,'2021-06-17','FKYTZV89T16L631P','fjL8hRDUZI',1,3),(64,'2021-06-14','WFKTGP69H11I684E','V2AuQ69kHh',0,2);
/*!40000 ALTER TABLE `prenotazione` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `presidio`
--

DROP TABLE IF EXISTS `presidio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `presidio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `value` varchar(50) NOT NULL,
  `dismesso` int(11) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `presidio`
--

LOCK TABLES `presidio` WRITE;
/*!40000 ALTER TABLE `presidio` DISABLE KEYS */;
INSERT INTO `presidio` VALUES (1,'Brescia Fiere','BresciaFiere',0),(2,'Centro Congressi','CentroCongressi',0),(3,'Parcheggio Volta','ParcheggioVolta',0),(4,'Stazione Metro','StazioneMetro',0),(5,'Centro sanitario','Centrosanitario',1),(6,'Giuseppe','Giuseppe',1),(7,'Centro museo','Centromuseo',1);
/*!40000 ALTER TABLE `presidio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tampone`
--

DROP TABLE IF EXISTS `tampone`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tampone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `esito` varchar(20) DEFAULT NULL,
  `id_sanitario` int(11) DEFAULT NULL,
  `id_prenotazione` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_sanitario` (`id_sanitario`),
  KEY `id_prenotazione` (`id_prenotazione`),
  CONSTRAINT `tampone_ibfk_1` FOREIGN KEY (`id_sanitario`) REFERENCES `account` (`id`),
  CONSTRAINT `tampone_ibfk_2` FOREIGN KEY (`id_prenotazione`) REFERENCES `prenotazione` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tampone`
--

LOCK TABLES `tampone` WRITE;
/*!40000 ALTER TABLE `tampone` DISABLE KEYS */;
INSERT INTO `tampone` VALUES (1,'pending',NULL,49),(2,'pending',NULL,50),(3,'pending',NULL,51),(4,'negativo',5,52),(5,'negativo',5,53),(6,'pending',NULL,54),(7,'pending',NULL,55),(8,'pending',NULL,56),(9,'pending',NULL,57),(10,'positivo',5,58),(11,'pending',NULL,59),(12,'pending',NULL,60),(13,'pending',NULL,61),(14,'pending',NULL,62),(15,'pending',NULL,63),(16,'negativo',5,64);
/*!40000 ALTER TABLE `tampone` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-06-15 10:15:33
