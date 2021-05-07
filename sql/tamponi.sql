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
  `password` varchar(50) NOT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nomeUtente` (`nomeUtente`),
  UNIQUE KEY `password` (`password`),
  KEY `id_admin` (`id_admin`),
  CONSTRAINT `account_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `account` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account`
--

LOCK TABLES `account` WRITE;
/*!40000 ALTER TABLE `account` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prenotazione`
--

LOCK TABLES `prenotazione` WRITE;
/*!40000 ALTER TABLE `prenotazione` DISABLE KEYS */;
INSERT INTO `prenotazione` VALUES (1,'2021-05-04','sgndfhdfhgsfdg','124213',0,1),(2,'2021-05-12','sdfghgsdfh','2316512',0,1),(4,'2021-05-12','aeerfhdefh','2456146',0,2),(5,'2021-05-11','afbdbdfghsg','152513412',1,1),(14,'2021-05-09','Roberto','BxMvp2UEb8',0,1),(15,'2021-05-09','Roberto','wltDyoW67V',0,1);
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `presidio`
--

LOCK TABLES `presidio` WRITE;
/*!40000 ALTER TABLE `presidio` DISABLE KEYS */;
INSERT INTO `presidio` VALUES (1,'Brescia Fiere','BresciaFiere'),(2,'Centro Congressi','CentroCongressi');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tampone`
--

LOCK TABLES `tampone` WRITE;
/*!40000 ALTER TABLE `tampone` DISABLE KEYS */;
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

-- Dump completed on 2021-05-07 22:04:50
