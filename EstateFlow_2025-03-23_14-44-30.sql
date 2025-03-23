/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19  Distrib 10.5.27-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: EstateFlow
-- ------------------------------------------------------
-- Server version	10.5.27-MariaDB

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
-- Table structure for table `Bid`
--

DROP TABLE IF EXISTS `Bid`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Bid` (
  `bid_id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `time` time NOT NULL DEFAULT current_timestamp(),
  `amount` decimal(10,0) NOT NULL,
  `client_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `delete_flag` tinyint(1) NOT NULL,
  PRIMARY KEY (`bid_id`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Bid`
--

LOCK TABLES `Bid` WRITE;
/*!40000 ALTER TABLE `Bid` DISABLE KEYS */;
INSERT INTO `Bid` VALUES (3,'2025-02-13','00:00:00',65,1,1,0),(4,'2025-02-09','00:00:00',45,1,1,0),(12,'2025-03-13','00:00:00',100000,12,73,0),(13,'2025-03-14','00:00:00',1000000,12,73,0),(14,'2025-03-14','00:00:00',100,12,73,0),(16,'2025-03-18','00:00:00',40000,7,77,0),(17,'2025-03-18','00:00:00',5000000,7,77,0),(18,'2025-03-18','00:00:00',60,7,76,0),(19,'2025-03-18','00:00:00',2000000,7,77,0),(22,'2025-03-18','00:00:00',200000,7,77,0),(23,'2025-03-19','00:00:00',600000000,7,74,0),(25,'2025-03-19','00:00:00',8800000,1,73,0),(26,'2025-03-19','00:00:00',889,1,93,0),(27,'2025-03-19','00:00:00',88,12,94,0),(38,'2025-05-19','00:00:00',4000,1,62,0),(39,'2025-05-19','00:00:00',4000,1,62,0),(40,'2025-05-19','00:00:00',4000,1,62,0),(41,'2025-05-19','00:00:00',4000,1,62,0),(42,'2025-05-19','00:00:00',4000,1,62,0),(43,'2025-05-19','00:00:00',4000,1,62,0),(44,'2025-05-19','00:00:00',4000,1,62,0),(45,'2025-05-19','00:00:00',4000,1,62,0),(46,'2025-05-19','00:00:00',4000,1,62,0),(47,'2025-05-19','00:00:00',4000,1,62,0),(48,'2025-05-19','00:00:00',4000,1,62,0),(49,'2025-05-19','00:00:00',4000,1,62,0),(50,'2025-05-19','00:00:00',4000,1,62,0),(51,'2025-05-19','00:00:00',4000,1,62,0),(52,'2025-05-19','15:05:45',45000,1,38,0),(53,'2025-03-19','21:13:04',20,1,0,0),(54,'2025-03-19','21:22:35',77,7,0,0),(55,'2025-05-20','15:08:00',40,1,76,0),(56,'2025-05-20','15:09:02',84,1,94,0),(57,'2025-05-20','15:16:15',45,7,94,0),(58,'2025-02-20','15:26:51',50,1,77,0),(59,'2025-05-20','15:27:52',45,1,77,0),(60,'2025-05-20','15:31:21',50,1,95,0),(61,'2025-05-20','15:32:42',50,1,76,0),(62,'2025-05-20','15:33:38',50,1,77,0),(63,'1111-01-01','15:34:34',45,1,77,0),(64,'2025-01-01','15:35:05',55,1,95,0),(65,'2025-05-20','15:36:30',56,1,95,0),(66,'2025-05-20','15:36:47',57,1,95,0),(67,'2025-05-20','15:37:37',55,1,77,0),(68,'2025-05-20','15:39:02',55,1,94,0),(69,'2025-05-20','15:39:35',56,1,77,0),(70,'2025-05-20','15:44:26',96000,1,10,0),(71,'2025-05-20','15:45:20',56000,7,1,0),(72,'2025-05-20','15:46:16',50000,12,76,0),(73,'2025-05-20','15:49:23',57,1,77,0),(74,'2025-05-20','16:33:54',57,1,77,0),(75,'2025-03-22','00:01:46',5000001,14,77,0),(76,'2025-03-22','00:02:15',5000001,14,77,0);
/*!40000 ALTER TABLE `Bid` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Client`
--

DROP TABLE IF EXISTS `Client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Client` (
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `eircode` varchar(45) NOT NULL,
  `phone_no` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `buyer` tinyint(1) NOT NULL,
  `seller` tinyint(1) NOT NULL,
  `delete_flag` tinyint(1) NOT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Client`
--

LOCK TABLES `Client` WRITE;
/*!40000 ALTER TABLE `Client` DISABLE KEYS */;
INSERT INTO `Client` VALUES (1,'Donal whelan','normal address','R45 51E3','087 417 6757','wheelieD@gmail.com',0,1,0),(7,'jimmy mcgill','Jimmys House, ABQ NM','BR4 ABC5','056 678 3369','jmm@mail.net',1,1,0),(12,'Amelia','11 willows','R93WR00','0111111111','c00296605@setu.ie',0,1,0),(13,'Donny Phelan','49 Hebron Park, Kilkenny','R95 A32H','086 415 6995','d.phelan@mail.com',0,1,0),(14,'Johnny Donny','47 place, Carlow','A11 Bx4T','085415','dude@mail.com',1,0,0),(15,'Dunn Denny','48 place, Louth','E45 243R','085','dunn.denny@mail.com',1,1,0),(16,'','','','','',0,0,1);
/*!40000 ALTER TABLE `Client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Land`
--

DROP TABLE IF EXISTS `Land`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Land` (
  `land_id` int(11) NOT NULL AUTO_INCREMENT,
  `property_id` int(11) NOT NULL,
  `acres` decimal(10,2) NOT NULL,
  `buildings` text NOT NULL,
  `residence_details` varchar(150) NOT NULL,
  `quotas` int(11) NOT NULL,
  `notes` text NOT NULL,
  `delete_flag` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`land_id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Land`
--

LOCK TABLES `Land` WRITE;
/*!40000 ALTER TABLE `Land` DISABLE KEYS */;
INSERT INTO `Land` VALUES (1,1,2500.00,'Two large buildings','4 bedroom period residence in need of repair',50,'Exceptional condition, beautiful view',0),(17,10,4500.00,'Three storage units, one small workshop','No residence, commercial use only',30,'Ideal for industrial use, close to main road access',0),(19,12,3500.00,'Small cabin by the beach','2-bedroom coastal cottage with private beach access ',100,'Excellent for development, prime location - futureproof',0),(39,35,1800.00,'One barn, two cattle sheds','3-bedrom farmhouse with modern kitchen extension',42,'Prime agricultural land with excellent road access, stunning countryside views, and a private lake',0),(42,38,1199.00,'One stone cottage, small barn','2-bedroom vernacular cottage',134,'Excellent location for a small holding or weekend retreat, surrounded by forestry, access to walking trails',0),(54,96,567.00,'One large building suitable for an office','Quaint family home',1000,'Land is situated on a slight incline',1),(59,111,5500.00,'One large castle','The castle',1000,'Was it mentioned there is a castle',0),(63,115,22540.00,'Log cabin, office, barn and large shed','Large farm-house',230000,'Suitable for both livestock and produce agriculture',0);
/*!40000 ALTER TABLE `Land` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Office`
--

DROP TABLE IF EXISTS `Office`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Office` (
  `office_id` int(11) NOT NULL AUTO_INCREMENT,
  `property_id` int(11) NOT NULL,
  `floor` int(11) NOT NULL,
  `area` float NOT NULL,
  `layout` varchar(255) NOT NULL,
  `internet` varchar(50) NOT NULL,
  `access` varchar(255) NOT NULL,
  `telephone_system` varchar(255) NOT NULL,
  `reception` varchar(255) NOT NULL,
  `security` varchar(255) NOT NULL,
  `canteen` varchar(255) NOT NULL,
  `ownership` varchar(50) NOT NULL,
  `delete_flag` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`office_id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Office`
--

LOCK TABLES `Office` WRITE;
/*!40000 ALTER TABLE `Office` DISABLE KEYS */;
INSERT INTO `Office` VALUES (22,73,3,2000,'large open space area','none','none','none','none','none','large open access canteen','long lease',1),(23,74,3,400,'large canteen','wireless','elevators','none','none','Netwatch','open access','freehold',1),(25,76,2,455,'large open area',' 6 big rooms','wired','ramps','none','none','patrols','large open access',0),(26,77,5,700,'large open area',' 2 small rooms','none','elevators','none','none','netwatch','large open access',0),(42,93,6,777,'large','none','ramps and elevators','none','none','none','none','long lease',0),(43,94,2,445,'large open area, 2 small rooms','wireless','elevators/ramps','none','none','net watch','small canteen','freehold',0),(44,95,7,255,'large open area, 5 big rooms','none','ramps and elevators','none','none','netwatch','large','freehold',0);
/*!40000 ALTER TABLE `Office` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Property`
--

DROP TABLE IF EXISTS `Property`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Property` (
  `property_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `eircode` varchar(8) NOT NULL,
  `location` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `completion_date` date NOT NULL DEFAULT current_timestamp(),
  `owner` int(11) NOT NULL,
  `highest_bid` decimal(10,2) NOT NULL,
  `asking_price` decimal(10,2) NOT NULL,
  `viewing_times` text NOT NULL,
  `date_listed` timestamp NOT NULL DEFAULT current_timestamp(),
  `delete_flag` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`property_id`)
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Property`
--

LOCK TABLES `Property` WRITE;
/*!40000 ALTER TABLE `Property` DISABLE KEYS */;
INSERT INTO `Property` VALUES (1,'Land','Carlow St, Carlow  ','Y21T341','Carlow',1,'2025-03-20',1,56000.00,67000.00,'12:00 - 12:00','2025-02-02 00:00:00',0),(10,'Land','Greenway Ave, Galway      ','H91 567','Galway',2,'2025-03-20',7,96000.00,80000.00,'12:00 - 18:00','2025-02-15 00:00:00',0),(12,'Land','Seaside Road, Cork          ','T12 346','Cork',1,'2025-03-20',1,0.00,200000.00,'9:00 - 15:00','2025-02-01 00:00:00',0),(35,'Land','Greenhill Farm Ballyragget County Kilkenny    ','R95 X742','Kilkenny',0,'2025-03-20',7,0.00,650000.00,'14:00 - 17:00','2025-02-15 00:00:00',0),(38,'Land','The Ridge Enniscorthy Wexford  ','A65B452','Wexford',0,'2025-03-20',7,45000.00,320007.00,'12:00 - 18:05','2025-02-05 00:00:00',0),(73,'Office','12 Kilkenny road','R93 S999','Kilkenny',2,'2025-03-20',1,8800000.00,100000.00,'10:00 - 19:00','2025-03-17 12:01:32',1),(74,'Office','116 Dublin road, willows street, Ballon','W99 89A9','Carlow',1,'2025-03-20',7,99999999.99,200000.00,'10:00 - 20:00','2025-03-05 12:01:20',1),(76,'Office','15 yellow street','R99TO60','Cork',1,'2025-03-20',7,50000.00,180000.00,'8:00 - 13:00','2025-03-16 12:01:07',0),(77,'Office','114 green road','W89 TKC6','Kilkenny',0,'2025-03-20',7,5000001.00,22000.00,'10:00 - 19:00','2025-03-05 12:00:57',0),(93,'Office','66 lower dublin street','r89 9999','kilkenny',0,'2025-03-20',1,889.00,100.00,'11 -9','2025-03-01 12:00:45',0),(94,'Office','99 brownshill road','R97PK99','Killenny',0,'2025-03-20',12,88.00,100000.00,'10:00 - 19:00','2025-03-12 12:00:34',0),(95,'Office','77 blue road','W56 777N','Wexford',1,'2025-03-20',7,57.00,10000.00,'09:00 - 15:00','2025-03-19 11:54:44',0),(96,'Land','10 Brammal Lane Sligo   ','R12 345','Sligo',0,'2025-03-20',7,0.00,50000000.00,'12:00 - 18:00','2025-03-19 20:58:51',1),(111,'Land','Slane Castle Slane Meath        ','Y43C567','Meath',0,'2025-03-21',1,0.00,550000.00,'17: 00 - 12:00','2025-03-21 20:15:45',0),(115,'Land','Palmgrove Lodge   Dromneavane  Kenmare, Co. Kerry','V93 R2W1','Northbound on N71',0,'2025-03-22',15,0.00,450000.00,'10:00 - 22:00','2025-03-22 22:39:05',0);
/*!40000 ALTER TABLE `Property` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Residential`
--

DROP TABLE IF EXISTS `Residential`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Residential` (
  `residential_id` int(11) NOT NULL AUTO_INCREMENT,
  `property_id` int(11) NOT NULL,
  `levels` int(11) NOT NULL,
  `reception` varchar(45) NOT NULL,
  `bedrooms` varchar(45) NOT NULL,
  `bathrooms` varchar(45) NOT NULL,
  `area` varchar(45) NOT NULL,
  `heating` varchar(45) NOT NULL,
  `notes` varchar(45) NOT NULL,
  `amenities` varchar(45) NOT NULL,
  PRIMARY KEY (`residential_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Residential`
--

LOCK TABLES `Residential` WRITE;
/*!40000 ALTER TABLE `Residential` DISABLE KEYS */;
/*!40000 ALTER TABLE `Residential` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Staff`
--

DROP TABLE IF EXISTS `Staff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Staff` (
  `staff_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `eircode` varchar(8) NOT NULL,
  `phone_no` varchar(20) NOT NULL,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`staff_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Staff`
--

LOCK TABLES `Staff` WRITE;
/*!40000 ALTER TABLE `Staff` DISABLE KEYS */;
INSERT INTO `Staff` VALUES (1,'John O\'Connor','123 Main Street, Dublin 2','D02 X912','087 123 4567',0),(2,'Mary Murphy','45 Oakwood Road, Cork','T12 A987','086 234 5678',0),(3,'Kevin O\'Neill','67 Elm Park, Galway','H91 N215','085 345 6789',0),(4,'Paul Byrne ','11 Castle Avenue, Kilkenny','R95 A490','089 567 8901',0),(5,'Cassy Gallagher','89 Green Street, Limerick ','V94 C356','089 456 7890',0);
/*!40000 ALTER TABLE `Staff` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'EstateFlow'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-03-23 14:44:44
