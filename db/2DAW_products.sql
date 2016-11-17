-- MySQL dump 10.13  Distrib 5.7.12, for linux-glibc2.5 (x86_64)
--
-- Host: 127.0.0.1    Database: 2DAW
-- ------------------------------------------------------
-- Server version	5.7.16-0ubuntu0.16.04.1

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
  `price` varchar(10) NOT NULL,
  `computing` tinyint(4) NOT NULL,
  `home_appliances` tinyint(4) NOT NULL,
  `clothes` tinyint(4) NOT NULL,
  `entry_date` varchar(30) NOT NULL,
  `expiration_date` varchar(30) NOT NULL,
  `avatar` varchar(500) NOT NULL,
  PRIMARY KEY (`cod_prod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
 
--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1111,'Product1','Esto es un producto','rojo','BADALONA','08','ES','1356',1,1,0,'24/10/2016','18/06/2020','/proyecto_v3/media/1279412902-1025640568-flowers.png'),(2222,'Product2','Esto es un producto','azul','BADALONA','08','ES','456',1,1,0,'24/10/2016','18/06/2020','/proyecto_v3/media/1279412902-1025640568-flowers.png'),(3242,'Dsfas','dsf asdf asdf sad fds ','rojo','DEFAULT_CITY','DEFAULT_PROVINCE','AZ','324',0,1,0,'27/10/2016','26/08/2020','media/default-avatar.png'),(4324,'Sdfasdfd','asdf asd fasdf asd','rojo','DEFAULT_CITY','DEFAULT_PROVINCE','AW','325',0,1,0,'24/10/2016','31/10/2016','/proyecto_v3/media/865408673-1025640568-flowers.png'),(4355,'Sdfad','asdfasdf asdf ','rojo','DEFAULT_CITY','DEFAULT_PROVINCE','AO','2344',0,1,0,'27/10/2016','29/10/2020','media/default-avatar.png'),(4522,'Lol','dslkj lsndlf skdjf sdk fskdj fksd fksd fjksd fsd fdofjpop paopdoj ajsfpjoaej jf aeojf joefjpejof jaefopjf aej fpaejfef paej','verde','ALAMILLO','13','ES','33,99',0,1,0,'08/11/2016','07/04/2022','/proyecto_v3/media/1096058637-product.jpg'),(5612,'portatil hp','Esto es un producto','azul','BADALONA','08','ES','456',1,0,0,'24/10/2016','18/06/2020','/proyecto_v3/media/1279412902-1025640568-flowers.png'),(5623,'Productoprueba2','Este es el segundo producto de prueba','rojo','DEFAULT_CITY','DEFAULT_PROVINCE','AS','499,99',0,0,1,'27/10/2016','07/02/2018','/proyecto_v3/media/249330515-technology_64.png'),(6512,'Coche','esto es un coche rojo ','rojo','DEFAULT_CITY','DEFAULT_PROVINCE','CY','55222',1,0,0,'08/11/2016','23/08/2024','/proyecto_v3/media/4965081-hal-9000-1920x1200-top-scientists-experts-and-philosophers-warn-of-dangers-of-artificial-intelligence-jpeg-223677.jpg'),(6666,'Product666','Esto es un producto de prueba ','azul','CAMPO DE ARAS','14','ES','39,99',0,1,1,'09/11/2016','16/06/2022','/proyecto_v3/media/505393724-product.jpg'),(7655,'Fdsdfa','rgerg rgqer g re','rojo','DEFAULT_CITY','DEFAULT_PROVINCE','BH','534',0,1,0,'27/10/2016','22/11/2023','/proyecto_v3/media/1771101758-hal-9000-1920x1200-top-scientists-experts-and-philosophers-warn-of-dangers-of-artificial-intelligence-jpeg-223677.jpg'),(8465,'Sfdfa','sdfads afg dfg dfg ','azul','DEFAULT_CITY','DEFAULT_PROVINCE','AT','32',1,0,0,'01/11/2016','22/08/2019','media/default-avatar.png'),(8961,'tele','Esto es un producto','azul','BADALONA','08','ES','456',1,1,0,'24/10/2016','18/06/2020','/proyecto_v3/media/1279412902-1025640568-flowers.png'),(8974,'Producteprueba1','Esto es un producto de prueba dadfsfjos sdfsdf sdf','rojo','ALMERIA','04','ES','49,99',0,1,0,'27/10/2016','16/03/2024','/proyecto_v3/media/1901074881-imatge.gif'),(9874,'Proba34','proba hola sdfs dfa sdf','verde','PILES, DE','46','ES','454,20',1,1,0,'02/11/2016','22/07/2021','media/default-avatar.png');
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

-- Dump completed on 2016-11-09 20:28:19
