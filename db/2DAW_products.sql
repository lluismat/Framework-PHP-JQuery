CREATE DATABASE  IF NOT EXISTS `2DAW` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `2DAW`;
-- MySQL dump 10.13  Distrib 5.7.12, for linux-glibc2.5 (x86_64)
--
-- Host: 127.0.0.1    Database: 2DAW
-- ------------------------------------------------------
-- Server version	5.7.15-0ubuntu0.16.04.1

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
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `cod_prod` int(20) NOT NULL,
  `name_prod` varchar(30) NOT NULL,
  `description` varchar(250) NOT NULL,
  `color` varchar(45) NOT NULL,
  `city` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `computing` tinyint(4) NOT NULL,
  `home_appliances` tinyint(4) NOT NULL,
  `clothes` tinyint(4) NOT NULL,
  `entry_date` varchar(30) NOT NULL,
  `expiration_date` varchar(30) NOT NULL,
  `avatar` varchar(100) NOT NULL,
  PRIMARY KEY (`cod_prod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (111,'Product1','Esto es un producto','rojo','BOCAIRENT','COMUNIDAD VALENCIANA','ES',32,43,1,1,'0','17/10/2016','31/10/2016/proyecto_v3/media/124530868-1025640568-flowers.png'),(2222,'Product2','producto dos verde','rojo','HUERTA MAHOYA','30','ES',45,99,1,0,'0','19/10/2016','11/04/2020/proyecto_v3/media/1394263125-1025640568-flowers.png'),(3333,'product3','Es un prod','verde','boc','cv','esp',54,54,1,0,'1','19/07/2011','11/11/2016avatar133123eww'),(5413,'CamisaVerde','esto es una camisa verde','rojo','DEFAULT_CITY','DEFAULT_PROVINCE','CN',9,99,0,0,'1','19/10/2016','20/04/2018/proyecto_v3/media/1995985441-1025640568-flowers.png');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-10-20 18:55:54
