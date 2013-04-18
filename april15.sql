-- MySQL dump 10.13  Distrib 5.1.67, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: milk_db
-- ------------------------------------------------------
-- Server version	5.1.67-0ubuntu0.11.10.1

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
-- Temporary table structure for view `changestate`
--

DROP TABLE IF EXISTS `changestate`;
/*!50001 DROP VIEW IF EXISTS `changestate`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `changestate` (
  `donornumber` int(10) unsigned
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `labtable`
--

DROP TABLE IF EXISTS `labtable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `labtable` (
  `bottlenumber` varchar(20) NOT NULL COMMENT 'bottle number',
  `bpoolnumber` varchar(20) NOT NULL COMMENT 'Blue Pool Number',
  `bpooldate` date NOT NULL COMMENT 'Blue Pool Date',
  `bpooldsgn` varchar(20) NOT NULL COMMENT 'Blue Pool Designation',
  `bpoolrn` varchar(20) NOT NULL COMMENT 'Blue Pool Refregeration Number',
  `batchnumber` varchar(20) NOT NULL COMMENT 'Batch Number',
  `batchrnumber` varchar(20) NOT NULL COMMENT 'Batch Refrigeration Number',
  `batchdate` date NOT NULL COMMENT 'Batch Date',
  `batchdsgn` varchar(20) NOT NULL COMMENT 'Batch Designation',
  `bottlernumber` varchar(20) NOT NULL COMMENT 'Bottle Refrigeration Number',
  `bottledate` date NOT NULL COMMENT 'Bottle Date',
  `bottledsgn` varchar(20) NOT NULL COMMENT 'Bottle Designation',
  `donorstat` varchar(10) NOT NULL,
  `donornumberl` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='For Lab Technicians';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `labtable`
--

LOCK TABLES `labtable` WRITE;
/*!40000 ALTER TABLE `labtable` DISABLE KEYS */;
/*!40000 ALTER TABLE `labtable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `receivertable`
--

DROP TABLE IF EXISTS `receivertable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `receivertable` (
  `receivedate` date NOT NULL COMMENT 'Date Received',
  `numberofounces` int(11) NOT NULL COMMENT 'Number of Ounces per package',
  `donornumberr` int(11) NOT NULL,
  `coolernumber` int(11) NOT NULL,
  `expressiondatefrom` date DEFAULT NULL,
  `expressiondateto` date NOT NULL,
  `packetstate` varchar(3) NOT NULL,
  `packetstateother` varchar(20) NOT NULL,
  `storagelocation` varchar(10) NOT NULL,
  `storagelocationother` varchar(15) NOT NULL,
  `packagenumber` int(11) NOT NULL,
  `expressionrange` varchar(40) NOT NULL,
  `organization` varchar(5) NOT NULL,
  `organizationother` varchar(10) NOT NULL,
  `coolercomments` varchar(40) NOT NULL,
  `illness` varchar(15) NOT NULL,
  `illnesscomment` varchar(50) NOT NULL,
  `illnessbegan` date NOT NULL,
  `illnessend` date NOT NULL,
  `symptomdescription` varchar(52) NOT NULL,
  `feverstart` date NOT NULL,
  `feverend` date NOT NULL,
  `meduse` varchar(4) NOT NULL,
  `medtypes` varchar(20) NOT NULL,
  `dosage` varchar(20) NOT NULL,
  `dosagestart` date NOT NULL,
  `dosageend` date NOT NULL,
  `reportcomments` varchar(100) NOT NULL,
  `signature` varchar(30) NOT NULL,
  `signaturedate` date NOT NULL,
  `fever` int(11) NOT NULL,
  `mreport` varchar(4) NOT NULL COMMENT 'illness and medical report',
  `milkgrade` varchar(10) NOT NULL,
  `storefrom` varchar(15) NOT NULL,
  `determinechoose` varchar(25) NOT NULL,
  `rxbcchoose` varchar(5) NOT NULL,
  `rxbcdate` varchar(45) NOT NULL,
  `babysdob` date NOT NULL,
  `milkgradeother` varchar(15) NOT NULL,
  `diet` varchar(20) NOT NULL,
  `donorstatus` varchar(10) NOT NULL,
  `donorcomment` varchar(102) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='For Receiver Technicians';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `receivertable`
--

LOCK TABLES `receivertable` WRITE;
/*!40000 ALTER TABLE `receivertable` DISABLE KEYS */;
INSERT INTO `receivertable` VALUES ('2013-04-11',40,1,17,'2013-02-12','2013-02-17','O','Other','Lab','',2,'02-12-2013&nbsp;thru&nbsp;02-17-2013','IND','','Mushy\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r','','','0000-00-00','0000-00-00','','0000-00-00','0000-00-00','','','','0000-00-00','0000-00-00','','','0000-00-00',0,'','DF','','','No','','2012-12-23','','diaryfree','F','TEST 1\r\n\r\n\r\n\r\n\r\n\r\n\r\n'),('2013-04-11',40,2,15,'2013-02-06','2013-02-14','R','Other','Lab','',3,'02-06-2013&nbsp;thru&nbsp;02-14-2013','IND','','\r\nmushy\r\n','','','0000-00-00','0000-00-00','','0000-00-00','0000-00-00','','','','0000-00-00','0000-00-00','','','0000-00-00',0,'','DF Mature','','','No','','2012-11-15','','diaryfree','A','test 2\r\n'),('2013-04-10',50,1,15,'2013-03-18','2013-03-20','O','Other','Lab','',1,'03-18-2013&nbsp;thru&nbsp;03-20-2013','IND','','Mushy\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r','Donor','Had a cold                                        ','2013-03-06','2013-03-14','Runny Nose                                          ','2013-03-07','2013-03-10','Yes','Penicilan','20 mg','2013-03-07','2013-03-18','From Receiver notes','Ted Williams','2013-07-20',102,'yes','Hospital','','','No','','2012-12-23','','diaryfree','F','TEST 1\r\n\r\n\r\n\r\n\r\n\r\n\r\n');
/*!40000 ALTER TABLE `receivertable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `receivertablelog`
--

DROP TABLE IF EXISTS `receivertablelog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `receivertablelog` (
  `receivedate` date NOT NULL COMMENT 'Date Received',
  `expressiondatefrom` date NOT NULL COMMENT 'Date Created (Expression) from',
  `numberofounces` int(11) NOT NULL COMMENT 'Number of Ounces per package',
  `donornumberr` int(11) NOT NULL,
  `coolernumber` int(11) NOT NULL,
  `expressiondateto` date NOT NULL,
  `expressionrange` varchar(40) NOT NULL,
  `user` varchar(20) NOT NULL,
  `transactionnumber` int(11) NOT NULL,
  `transactiontype` varchar(10) NOT NULL,
  `transactiondate` date NOT NULL,
  `packetstate` varchar(3) NOT NULL,
  `packetstateother` varchar(10) NOT NULL,
  `storagelocation` varchar(10) NOT NULL,
  `storagelocationother` varchar(15) NOT NULL,
  `packagenumber` int(11) NOT NULL,
  `organization` varchar(5) NOT NULL,
  `organizationother` varchar(10) NOT NULL,
  `reportcomments` varchar(100) NOT NULL,
  `mreport` varchar(4) NOT NULL,
  `fever` int(11) NOT NULL,
  `coolercomments` varchar(40) NOT NULL,
  `illness` varchar(15) NOT NULL,
  `illnesscomment` varchar(50) NOT NULL,
  `illnessbegan` date NOT NULL,
  `illnessend` date NOT NULL,
  `symptomdescription` varchar(52) NOT NULL,
  `feverstart` date NOT NULL,
  `feverend` date NOT NULL,
  `meduse` varchar(4) NOT NULL,
  `medtypes` varchar(20) NOT NULL,
  `dosage` varchar(20) NOT NULL,
  `dosagestart` date NOT NULL,
  `dosageend` date NOT NULL,
  `signature` varchar(30) NOT NULL,
  `signaturedate` date NOT NULL,
  `milkgrade` varchar(10) NOT NULL,
  `rxbcdate` varchar(45) NOT NULL,
  `rxbcchoose` varchar(5) NOT NULL,
  `determinechoose` varchar(15) NOT NULL,
  `milkgradeother` varchar(15) NOT NULL,
  `diet` varchar(20) NOT NULL,
  `storefrom` varchar(15) NOT NULL,
  `babysdob` date NOT NULL,
  `donorstatus` varchar(10) NOT NULL,
  `donorcomment` varchar(102) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='For Receiver Technicians';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `receivertablelog`
--

LOCK TABLES `receivertablelog` WRITE;
/*!40000 ALTER TABLE `receivertablelog` DISABLE KEYS */;
INSERT INTO `receivertablelog` VALUES ('2013-04-11','2013-02-06',40,2,15,'2013-02-14','2-6-2013&nbsp;thru&nbsp;2-14-2013','root',1,'Created','2013-04-11','W','Other','F3','',3,'IND','','','',0,'\r\nmushy','','','0000-00-00','0000-00-00','','0000-00-00','0000-00-00','','','','0000-00-00','0000-00-00','','0000-00-00','DF Mature','','No','','','diaryfree','deep freeze','2012-11-15','A','test 2\r\n'),('2013-04-11','2013-02-12',40,1,17,'2013-02-17','02-12-2013&nbsp;thru&nbsp;02-17-2013','root',5,'Edited','2013-04-11','O','Other','Lab','',2,'IND','','','',0,'Mushy\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r','','','0000-00-00','0000-00-00','','0000-00-00','0000-00-00','','','','0000-00-00','0000-00-00','','0000-00-00','DF','','No','','','diaryfree','','2012-12-23','F',''),('2013-04-10','2013-03-18',50,1,15,'2013-03-20','03-18-2013&nbsp;thru&nbsp;03-20-2013','root',11,'Edited','2013-04-10','O','Other','Lab','',1,'IND','','From Receiver notes','yes',102,'Mushy\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r','Donor','Had a cold                                        ','2013-03-06','2013-03-14','Runny Nose                                          ','2013-03-07','2013-03-10','Yes','Penicilan','20 mg','2013-03-07','2013-03-18','Ted Williams','2013-07-20','Hospital','','No','','','diaryfree','','2012-12-23','F',''),('2013-04-10','2013-03-18',50,1,15,'2013-03-20','03-18-2013&nbsp;thru&nbsp;03-20-2013','root',10,'Edited','2013-04-10','W','Other','Lab','',1,'IND','','From Receiver notes','yes',102,'Mushy\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r','Donor','Had a cold                                        ','2013-03-06','2013-03-14','Runny Nose                                          ','2013-03-07','2013-03-10','Yes','Penicilan','20 mg','2013-03-07','2013-03-18','Ted Williams','2013-07-20','Hospital','','No','','','diaryfree','','2012-12-23','F',''),('2013-04-11','2013-02-12',40,1,17,'2013-02-17','02-12-2013&nbsp;thru&nbsp;02-17-2013','root',4,'Edited','2013-04-11','R','Other','Lab','',2,'IND','','','',0,'Mushy\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r','','','0000-00-00','0000-00-00','','0000-00-00','0000-00-00','','','','0000-00-00','0000-00-00','','0000-00-00','DF','','No','','','diaryfree','','2012-12-23','F',''),('2013-04-11','2013-02-12',40,1,17,'2013-02-17','02-12-2013&nbsp;thru&nbsp;02-17-2013','root',3,'Edited','2013-04-11','W','Other','Lab','',2,'IND','','','',0,'Mushy\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r','','','0000-00-00','0000-00-00','','0000-00-00','0000-00-00','','','','0000-00-00','0000-00-00','','0000-00-00','DF','','No','','','diaryfree','','2012-12-23','F',''),('2013-04-10','2013-03-18',50,1,15,'2013-03-20','03-18-2013&nbsp;thru&nbsp;03-20-2013','root',8,'Edited','2013-04-10','W','Other','Lab','',1,'IND','','From Receiver notes','yes',102,'Mushy\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n','Donor','Had a cold                                        ','2013-03-06','2013-03-14','Runny Nose                                          ','2013-03-07','2013-03-10','Yes','Penicilan','20 mg','2013-03-07','2013-03-18','Ted Williams','2013-07-20','Hospital','','No','','','diaryfree','','2012-12-23','F',''),('2013-04-11','2013-02-12',40,1,17,'2013-02-17','02-12-2013&nbsp;thru&nbsp;02-17-2013','root',2,'Edited','2013-04-11','O','Other','Lab','',2,'IND','','','',0,'Mushy\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r','','','0000-00-00','0000-00-00','','0000-00-00','0000-00-00','','','','0000-00-00','0000-00-00','','0000-00-00','DF','','No','','','diaryfree','','2012-12-23','F',''),('2013-04-10','2013-03-18',50,1,15,'2013-03-20','03-18-2013&nbsp;thru&nbsp;03-20-2013','root',7,'Edited','2013-04-10','O','Other','Lab','',1,'IND','','From Receiver notes','yes',102,'Mushy\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n','Donor','Had a cold                                        ','2013-03-06','2013-03-14','Runny Nose                                          ','2013-03-07','2013-03-10','Yes','Penicilan','20 mg','2013-03-07','2013-03-18','Ted Williams','2013-07-20','Hospital','','No','','','diaryfree','','2012-12-23','F',''),('2013-04-10','2013-03-18',50,1,15,'2013-03-20','03-18-2013&nbsp;thru&nbsp;03-20-2013','root',6,'Edited','2013-04-10','W','Other','Lab','',1,'IND','','From Receiver notes','yes',102,'Mushy\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n','Donor','Had a cold                                        ','2013-03-06','2013-03-14','Runny Nose                                          ','2013-03-07','2013-03-10','Yes','Penicilan','20 mg','2013-03-07','2013-03-18','Ted Williams','2013-07-20','Hospital','','No','','','diaryfree','','2012-12-23','F',''),('2013-04-10','2013-03-18',50,1,15,'2013-03-20','03-18-2013&nbsp;thru&nbsp;03-20-2013','root',5,'Edited','2013-04-10','R','Other','Lab','',1,'IND','','From Receiver notes','yes',102,'Mushy\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n','Donor','Had a cold                                        ','2013-03-06','2013-03-14','Runny Nose                                          ','2013-03-07','2013-03-10','Yes','Penicilan','20 mg','2013-03-07','2013-03-18','Ted Williams','2013-07-20','Hospital','','No','','','diaryfree','','2012-12-23','F',''),('2013-04-11','2013-02-06',40,2,15,'2013-02-14','02-06-2013&nbsp;thru&nbsp;02-14-2013','root',2,'Edited','2013-04-11','R','Other','Lab','',3,'IND','','','',0,'\r\nmushy\r\n','','','0000-00-00','0000-00-00','','0000-00-00','0000-00-00','','','','0000-00-00','0000-00-00','','0000-00-00','DF Mature','','No','','','diaryfree','','2012-11-15','A',''),('2013-04-11','2013-02-12',40,1,17,'2013-02-17','02-12-2013&nbsp;thru&nbsp;02-17-2013','root',1,'Edited','2013-04-11','R','Other','Lab','',2,'IND','','','',0,'Mushy\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r','','','0000-00-00','0000-00-00','','0000-00-00','0000-00-00','','','','0000-00-00','0000-00-00','','0000-00-00','DF','','No','','','diaryfree','','2012-12-23','F',''),('2013-04-10','2013-03-18',50,1,15,'2013-03-20','03-18-2013&nbsp;thru&nbsp;03-20-2013','root',4,'Edited','2013-04-10','W','Other','Lab','',1,'IND','','From Receiver notes','yes',102,'Mushy\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n','Donor','Had a cold                                        ','2013-03-06','2013-03-14','Runny Nose                                          ','2013-03-07','2013-03-10','Yes','Penicilan','20 mg','2013-03-07','2013-03-18','Ted Williams','2013-07-20','Hospital','','No','','','diaryfree','','2012-12-23','F',''),('2013-04-10','2013-03-18',50,1,15,'2013-03-20','03-18-2013&nbsp;thru&nbsp;03-20-2013','root',3,'Edited','2013-04-10','W','Other','Lab','',1,'IND','','From Receiver notes','yes',102,'Mushy\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n','Donor','Had a cold                                        ','2013-03-06','2013-03-14','Runny Nose                                          ','2013-03-07','2013-03-10','Yes','Penicilan','20 mg','2013-03-07','2013-03-18','Ted Williams','2013-07-20','Hospital','','No','','','diaryfree','','2012-12-23','F',''),('2013-04-10','2013-03-18',50,1,15,'2013-03-20','03-18-2013&nbsp;thru&nbsp;03-20-2013','root',9,'Edited','2013-04-10','R','Other','Lab','',1,'IND','','From Receiver notes','yes',102,'Mushy\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r','Donor','Had a cold                                        ','2013-03-06','2013-03-14','Runny Nose                                          ','2013-03-07','2013-03-10','Yes','Penicilan','20 mg','2013-03-07','2013-03-18','Ted Williams','2013-07-20','Hospital','','No','','','diaryfree','','2012-12-23','F',''),('2013-04-10','2013-03-18',50,1,15,'2013-03-20','03-18-2013&nbsp;thru&nbsp;03-20-2013','root',2,'Edited','2013-04-10','W','Other','Lab','',1,'IND','','From Receiver notes','yes',102,'Mushy\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n','Donor','Had a cold                                        ','2013-03-06','2013-03-14','Runny Nose                                          ','2013-03-07','2013-03-10','Yes','Penicilan','20 mg','2013-03-07','2013-03-18','Ted Williams','2013-07-20','Hospital','','No','','','diaryfree','','2012-12-23','F',''),('2013-04-10','2013-03-18',50,1,15,'2013-03-20','03-18-2013&nbsp;thru&nbsp;03-20-2013','root',1,'Edited','2013-04-10','W','Other','Lab','',1,'IND','','From Receiver notes','yes',102,'Mushy\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n','Donor','Had a cold                                        ','2013-03-06','2013-03-14','Runny Nose                                          ','2013-03-07','2013-03-10','Yes','Penicilan','20 mg','2013-03-07','2013-03-18','Ted Williams','2013-07-20','Hospital','','No','','','diaryfree','','2012-12-23','F','');
/*!40000 ALTER TABLE `receivertablelog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `screenertable`
--

DROP TABLE IF EXISTS `screenertable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `screenertable` (
  `lastname` varchar(20) NOT NULL,
  `dairyfree` varchar(15) NOT NULL,
  `apstatus` varchar(15) NOT NULL COMMENT 'application status',
  `dnrapdate` date NOT NULL COMMENT 'Donor  Application  Date (Call Date)',
  `donornumber` int(10) unsigned NOT NULL COMMENT 'donor number',
  `address` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) DEFAULT NULL,
  `zip` int(10) unsigned NOT NULL,
  `country` varchar(15) NOT NULL,
  `homephone` int(10) unsigned NOT NULL,
  `cellphone` int(10) unsigned NOT NULL,
  `babysname` varchar(20) NOT NULL COMMENT 'Baby''s Name',
  `email` varchar(30) NOT NULL COMMENT 'email address',
  `firstname` varchar(20) NOT NULL,
  `middlename` varchar(20) NOT NULL,
  `babysdob` date NOT NULL COMMENT 'Baby''s date of birth',
  `babystatus` varchar(15) NOT NULL,
  `referral` varchar(20) NOT NULL COMMENT 'How donor was referred',
  `donateamount` int(11) NOT NULL,
  `donatecommit` varchar(3) NOT NULL,
  `storefrom` varchar(15) NOT NULL,
  `milkcommit` varchar(4) NOT NULL,
  `herbs` varchar(25) NOT NULL,
  `alcohol` varchar(15) NOT NULL,
  `transfusion` varchar(15) NOT NULL,
  `createdby` varchar(20) NOT NULL,
  `lastedit` varchar(20) NOT NULL,
  `lasteditdate` date NOT NULL,
  `donorpacket` varchar(10) NOT NULL,
  `donorcomment` varchar(128) NOT NULL COMMENT 'Comments',
  `organization` varchar(5) NOT NULL,
  `rxbcdate` varchar(45) NOT NULL,
  `smoke` varchar(4) NOT NULL,
  `organizationother` varchar(45) NOT NULL,
  `rxbcchoose` varchar(5) NOT NULL,
  `herbschoose` varchar(5) NOT NULL,
  `alcoholchoose` varchar(5) NOT NULL,
  `ivDrug` varchar(5) NOT NULL,
  `transfusionchoose` varchar(5) NOT NULL,
  `workchoose` varchar(5) NOT NULL,
  `work` varchar(15) NOT NULL,
  `determinechoose` varchar(25) NOT NULL,
  `determine` varchar(15) NOT NULL,
  `processflag` varchar(4) NOT NULL,
  `heptest` varchar(15) NOT NULL,
  `diet` varchar(15) NOT NULL,
  `tattooschoose` varchar(10) NOT NULL,
  `tattoos` varchar(10) NOT NULL,
  `tbtest` varchar(10) NOT NULL,
  `hivtest` varchar(10) NOT NULL,
  `tbtreat` varchar(10) NOT NULL,
  `herpeschoose` varchar(10) NOT NULL,
  `herpes` varchar(10) NOT NULL,
  `hemophilia` varchar(10) NOT NULL,
  `hormones` varchar(10) NOT NULL,
  `ukmoschoose` varchar(10) NOT NULL,
  `ukmos` varchar(10) NOT NULL,
  `eurochoose` varchar(10) NOT NULL,
  `euro` varchar(10) NOT NULL,
  `process` varchar(10) NOT NULL,
  `processnumber` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='screener table';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `screenertable`
--

LOCK TABLES `screenertable` WRITE;
/*!40000 ALTER TABLE `screenertable` DISABLE KEYS */;
INSERT INTO `screenertable` VALUES ('Upton','','','2013-04-05',1,'54 Jupiter Way','Melbourne','Fl',65456,'USA',3324335434,4294967295,'Talia','kate@gmail.com','Kate','Louise','2012-12-23','Preterm','internet',50,'','deep freeze','yes','','','','root','root','2013-04-12','Sent','TEST 1\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n','IND','','N/A','','No','No','No','Yes','No','No','','F','         ','N','No','','N/A','','No','No','Neg','No','','N/A','No','No','','No','','',0),('Theron','','','2013-04-05',2,'54 Sunset Blvd','Hollywood','Ca',43323,'USA',4294967295,4294967295,'Donna','charlize@gmail.com','Charlize','Doloris','2012-11-15','Preterm','internet',70,'','deep freeze','yes','','','','root','root','2013-04-06','Sent','test 2\r\n','IND','','N/A','','No','No','No','N/A','No','No','','D',' ','N','No','diaryfree','N/A','','No','No','Neg','No','','N/A','No','No','','No','','',0);
/*!40000 ALTER TABLE `screenertable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `screenertablelog`
--

DROP TABLE IF EXISTS `screenertablelog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `screenertablelog` (
  `lastname` varchar(20) NOT NULL,
  `dairyfree` varchar(4) NOT NULL,
  `apstatus` varchar(15) NOT NULL COMMENT 'application status',
  `dnrapdate` date NOT NULL COMMENT 'Donor  Application  Date (Call Date)',
  `donornumber` int(10) unsigned NOT NULL COMMENT 'donor number',
  `address` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) DEFAULT NULL,
  `zip` int(10) unsigned NOT NULL,
  `country` varchar(15) NOT NULL,
  `homephone` int(10) unsigned NOT NULL,
  `cellphone` int(10) unsigned NOT NULL,
  `babysname` varchar(20) NOT NULL COMMENT 'Baby''s Name',
  `email` varchar(30) NOT NULL COMMENT 'email address',
  `firstname` varchar(20) NOT NULL,
  `middlename` varchar(20) NOT NULL,
  `babysdob` date NOT NULL COMMENT 'Baby''s date of birth',
  `babystatus` varchar(15) NOT NULL,
  `referral` varchar(20) NOT NULL COMMENT 'How donor was referred',
  `donateamount` int(11) NOT NULL,
  `donatecommit` varchar(3) NOT NULL,
  `storefrom` varchar(15) NOT NULL,
  `milkcommit` varchar(4) NOT NULL,
  `herbs` varchar(25) NOT NULL,
  `alcohol` varchar(25) NOT NULL,
  `transfusion` varchar(4) NOT NULL,
  `createdby` varchar(20) NOT NULL,
  `lastedit` varchar(20) NOT NULL,
  `lasteditdate` date NOT NULL,
  `donorpacket` varchar(10) NOT NULL,
  `donorcomment` varchar(128) NOT NULL COMMENT 'Comments',
  `transactionnumber` int(11) NOT NULL,
  `transactiontype` varchar(8) NOT NULL,
  `transactiondate` date NOT NULL,
  `username` varchar(20) NOT NULL,
  `organization` varchar(15) NOT NULL,
  `rxbcdate` varchar(45) NOT NULL,
  `smoke` varchar(25) NOT NULL,
  `organizationother` varchar(45) NOT NULL,
  `rxbcchoose` varchar(5) NOT NULL,
  `herbschoose` varchar(5) NOT NULL,
  `alcoholchoose` varchar(5) NOT NULL,
  `ivDrug` varchar(5) NOT NULL,
  `transfusionchoose` varchar(5) NOT NULL,
  `workchoose` varchar(5) NOT NULL,
  `work` varchar(15) NOT NULL,
  `determinechoose` varchar(25) NOT NULL,
  `determine` varchar(15) NOT NULL,
  `heptest` varchar(15) NOT NULL,
  `diet` varchar(15) NOT NULL,
  `tattooschoose` varchar(10) NOT NULL,
  `tattoos` varchar(10) NOT NULL,
  `hivtest` varchar(10) NOT NULL,
  `tbtest` varchar(10) NOT NULL,
  `tbtreat` varchar(10) NOT NULL,
  `herpeschoose` varchar(10) NOT NULL,
  `herpes` varchar(10) NOT NULL,
  `hemophilia` varchar(10) NOT NULL,
  `hormones` varchar(10) NOT NULL,
  `ukmoschoose` varchar(10) NOT NULL,
  `ukmos` varchar(10) NOT NULL,
  `eurochoose` varchar(10) NOT NULL,
  `euro` varchar(10) NOT NULL,
  `process` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='screener log table';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `screenertablelog`
--

LOCK TABLES `screenertablelog` WRITE;
/*!40000 ALTER TABLE `screenertablelog` DISABLE KEYS */;
INSERT INTO `screenertablelog` VALUES ('Upton','','','2013-04-05',1,'54 Jupiter Way','Melbourne','Fl',65456,'USA',3324335434,4294967295,'Talia','kate@gmail.com','Kate','Louise','0000-00-00','Preterm','internet',50,'','deepfreeze','yes','','','','root','','0000-00-00','Sent','TEST 1',1,'Created','2013-04-05','root','IND','','no','','No','No','','no','No','No','','A','','No','diaryfree','','','No','No','Neg','No','','No','No','No','','No','',''),('Theron','','','2013-04-05',2,'54 Sunset Blvd','Hollywood','Ca',43323,'USA',4294967295,4294967295,'Donna','charlize@gmail.com','Charlize','Doloris','0000-00-00','Preterm','internet',70,'','deepfreeze','yes','','','','root','','0000-00-00','Sent','test 2',1,'Created','2013-04-05','root','IND','','no','','No','No','','no','No','No','','A','','No','diaryfree','','','No','No','Neg','No','','No','No','No','','No','','');
/*!40000 ALTER TABLE `screenertablelog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usertable`
--

DROP TABLE IF EXISTS `usertable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usertable` (
  `userrights` int(11) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `firstname` varchar(20) DEFAULT NULL,
  `lastname` varchar(20) DEFAULT NULL,
  `password` varchar(10) NOT NULL COMMENT 'password',
  `middlename` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='for technicians';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usertable`
--

LOCK TABLES `usertable` WRITE;
/*!40000 ALTER TABLE `usertable` DISABLE KEYS */;
INSERT INTO `usertable` VALUES (3,'rtech','Tom','Johnson','wmays',''),(2049,'dtech','Donna','Smith','niners',''),(1,'root','Sara','Davis','niners',''),(4,'ninerpat','Pat','Dumalanta','',''),(1,'wmays','Willie','Mays','',''),(1,'kthornton','Kris','Thornton','',''),(1,'milk_milk','Jason','Richardson','','');
/*!40000 ALTER TABLE `usertable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `changestate`
--

/*!50001 DROP TABLE IF EXISTS `changestate`*/;
/*!50001 DROP VIEW IF EXISTS `changestate`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `changestate` AS select `screenertable`.`donornumber` AS `donornumber` from `screenertable` where ((`screenertable`.`determinechoose` = 'D') and (`screenertable`.`processflag` = 'y')) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-04-15 22:22:48
