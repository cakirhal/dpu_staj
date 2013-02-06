-- MySQL dump 10.11
--
-- Host: localhost    Database: staj
-- ------------------------------------------------------
-- Server version	5.0.51a-24+lenny4

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
-- Table structure for table `dokuman`
--

DROP TABLE IF EXISTS `dokuman`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `dokuman` (
  `id` tinyint(3) unsigned NOT NULL auto_increment,
  `ad` varchar(50) NOT NULL,
  `yol` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `dokuman`
--

LOCK TABLES `dokuman` WRITE;
/*!40000 ALTER TABLE `dokuman` DISABLE KEYS */;
INSERT INTO `dokuman` VALUES (43,'Staj Zorunluluk Belgesi','d/c4f.doc'),(45,'Bölüm Staj Yönergesi','d/d4a.pdf'),(39,'Dönem Ýçi Staj Kurul Kararý','d/22d.jpg'),(40,'Staj Adýmlarý','d/3f3.pdf'),(41,'Staj Bilgilendirme Sunumu','d/825.pdf'),(42,'Staj Sigorta Formu','d/2bc.jpg'),(44,'Örnek Staj Kabul Belgesi','d/722.jpg'),(62,'ismail','d/02a.pdf'),(59,'burak','d/3f8.gif'),(52,'12','d/e7e.gif'),(60,'56','d/d5d.gif'),(61,'nnnn','d/853.pdf'),(63,'wqeqweqwe','d/f91.txt');
/*!40000 ALTER TABLE `dokuman` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ogrenci`
--

DROP TABLE IF EXISTS `ogrenci`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `ogrenci` (
  `ogrenci_no` char(12) NOT NULL,
  `tc_no` varchar(11) default NULL,
  `ad_soyad` varchar(50) NOT NULL,
  `cep_telefonu` varchar(15) default NULL,
  `e_posta` varchar(50) default NULL,
  `sifre` varchar(32) NOT NULL,
  PRIMARY KEY  (`ogrenci_no`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `ogrenci`
--

LOCK TABLES `ogrenci` WRITE;
/*!40000 ALTER TABLE `ogrenci` DISABLE KEYS */;
INSERT INTO `ogrenci` VALUES ('200513171802','40399756980','Halil Ýbrahim ÇAKIR','','','e10adc3949ba59abbe56e057f20f883e');
/*!40000 ALTER TABLE `ogrenci` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personel`
--

DROP TABLE IF EXISTS `personel`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `personel` (
  `kullanici_adi` char(12) NOT NULL,
  `ad_soyad` varchar(50) NOT NULL,
  `sifre` varchar(32) NOT NULL,
  PRIMARY KEY  (`kullanici_adi`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `personel`
--

LOCK TABLES `personel` WRITE;
/*!40000 ALTER TABLE `personel` DISABLE KEYS */;
INSERT INTO `personel` VALUES ('nihat','nihat yurtseven','510115'),('2','nihat yurtseven','c81e728d9d4c2f636f067f89cc14862c'),('cakirhal','Halil Ýbrahim ÇAKIR','dc0403d1b4a61aec259859dfe7690a13');
/*!40000 ALTER TABLE `personel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staj_bilgileri`
--

DROP TABLE IF EXISTS `staj_bilgileri`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `staj_bilgileri` (
  `id` int(11) NOT NULL auto_increment,
  `staj_yeri` int(11) NOT NULL,
  `staj_turu` tinyint(3) unsigned NOT NULL,
  `ogrenci_no` char(12) NOT NULL,
  `baslangic` date NOT NULL,
  `bitis` date NOT NULL,
  `kabul_gun` tinyint(4) default '0',
  `toplam_gun` tinyint(4) NOT NULL,
  `aciklama` varchar(100) default NULL,
  `durum` varchar(20) default NULL,
  `donem` varchar(20) default NULL,
  PRIMARY KEY  (`id`),
  KEY `ogrenci_staj_bilgisi` (`ogrenci_no`),
  KEY `staj_yeri_bilgisi` (`staj_yeri`),
  KEY `staj_turu_bilgisi` (`staj_turu`)
) ENGINE=MyISAM AUTO_INCREMENT=103 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `staj_bilgileri`
--

LOCK TABLES `staj_bilgileri` WRITE;
/*!40000 ALTER TABLE `staj_bilgileri` DISABLE KEYS */;
INSERT INTO `staj_bilgileri` VALUES (29,2,2,'55555','2010-12-12','2010-12-12',33,33,'33','33','33'),(102,66,5,'200513171802','2007-06-06','2007-06-26',20,20,'','','2007-YAZ'),(101,11,2,'200513171802','2007-02-02','2007-02-25',20,20,'','','2007-ARA'),(100,29,5,'200513171802','2006-06-05','2006-06-25',20,20,'','','2006-YAZ');
/*!40000 ALTER TABLE `staj_bilgileri` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staj_turu`
--

DROP TABLE IF EXISTS `staj_turu`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `staj_turu` (
  `id` tinyint(3) unsigned NOT NULL auto_increment,
  `ad` varchar(25) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `staj_turu`
--

LOCK TABLES `staj_turu` WRITE;
/*!40000 ALTER TABLE `staj_turu` DISABLE KEYS */;
INSERT INTO `staj_turu` VALUES (5,'Yazýlým'),(2,'Donaným');
/*!40000 ALTER TABLE `staj_turu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staj_yeri`
--

DROP TABLE IF EXISTS `staj_yeri`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `staj_yeri` (
  `id` int(11) NOT NULL auto_increment,
  `ad` varchar(150) NOT NULL,
  `adres` varchar(250) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `staj_yeri`
--

LOCK TABLES `staj_yeri` WRITE;
/*!40000 ALTER TABLE `staj_yeri` DISABLE KEYS */;
INSERT INTO `staj_yeri` VALUES (11,'DPÜ Bilgisayar Müh.','DPÜ Bilgisayar Müh.'),(10,'MikroMask Arge Yaz.','MikroMask Arge Yaz.'),(9,'Türk Telekom','Türk Telekom'),(12,'FdnSoft','FdnSoft'),(13,'DHMÝ Antalya Havalimaný BaþMüd.','DHMÝ Antalya Havalimaný BaþMüd.'),(14,'DEÜ Bilgi Ýþlem Dairesi','DEÜ Bilgi Ýþlem Dairesi'),(16,'Hasbim Bilgi Ýþlem','Hasbim Bilgi Ýþlem'),(17,'Türk Telekom(Sivas)','Türk Telekom(Sivas)'),(18,'Hava Kuvvetleri Komutanlýðý','Hava Kuvvetleri Komutanlýðý'),(19,'Fintek A. Þ.','Fintek A. Þ.'),(20,'Mersin Üniversitesi','Mersin Üniversitesi'),(21,'Docuart Bilgisayar','Docuart Bilgisayar'),(22,'Ýpek Büro Donaným','Ýpek Büro Donaným'),(23,'Havelsan Ehsim','Havelsan Ehsim'),(24,'Türk Telekom (Muðla)','Türk Telekom (Muðla)'),(25,'Menderes Elektrik Daðýtým A.Þ.','Menderes Elektrik Daðýtým A.Þ.'),(26,'Graniser Granit ve Seramik Sanayi','Graniser Granit ve Seramik Sanayi'),(27,'DHMÝ Trabzon Havalimaný BaþMüd.','DHMÝ Trabzon Havalimaný BaþMüd.'),(28,'Talya Biliþim','Talya Biliþim'),(29,'Akýþýk Yazýlým','Akýþýk Yazýlým menderes'),(30,'Veriyaz Yazýlým','Veriyaz Yazýlým'),(31,'MEB Eðitek','MEB Eðitek'),(32,'DHMÝ Ankara Havalimaný BaþMüd.','DHMÝ Ankara Havalimaný BaþMüd.'),(33,'Labris Tek. Bil.','Labris Tek. Bil.'),(34,'Uludað Biliþim','Uludað Biliþim'),(35,'Fujitsu Siemens Computers','Fujitsu Siemens Computers'),(36,'Meram Elektrik Daðýtým A. Þ.','Konya'),(66,'Iþýk Kardeþler','UÞAK');
/*!40000 ALTER TABLE `staj_yeri` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-04-30 10:37:11
