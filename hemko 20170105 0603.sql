-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.18


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema hemko
--

CREATE DATABASE IF NOT EXISTS hemko;
USE hemko;

--
-- Definition of table `bedallotment`
--

DROP TABLE IF EXISTS `bedallotment`;
CREATE TABLE `bedallotment` (
  `allotid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `patientid` varchar(45) DEFAULT NULL,
  `ward` varchar(45) DEFAULT NULL,
  `bedno` int(10) unsigned DEFAULT NULL,
  `dateadmitted` varchar(45) DEFAULT NULL,
  `healthstatus` varchar(255) DEFAULT NULL,
  `datedischarged` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `comment` longtext,
  PRIMARY KEY (`allotid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bedallotment`
--

/*!40000 ALTER TABLE `bedallotment` DISABLE KEYS */;
INSERT INTO `bedallotment` (`allotid`,`patientid`,`ward`,`bedno`,`dateadmitted`,`healthstatus`,`datedischarged`,`status`,`comment`) VALUES 
 (1,'1','4',1,'12/29/2016','Critical','N/A','Admitted',NULL),
 (2,'2','2',1,'12/29/2016','Severe','N/A','Admitted',NULL),
 (3,'3','4',2,'12/29/2016','Severe','12/29/2016','Discharged','Today<b> 28th of September, 2016</b> this Patient was admitted and was given a bed space His Condition is yet to improve.<br><br><br>Today <b>29th December, 2016</b> this Patient condition became critical and he was moved to ICU.<br>');
/*!40000 ALTER TABLE `bedallotment` ENABLE KEYS */;


--
-- Definition of table `beds`
--

DROP TABLE IF EXISTS `beds`;
CREATE TABLE `beds` (
  `deptid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bedtype` varchar(45) DEFAULT NULL,
  `quantity` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`deptid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beds`
--

/*!40000 ALTER TABLE `beds` DISABLE KEYS */;
INSERT INTO `beds` (`deptid`,`bedtype`,`quantity`) VALUES 
 (1,'Ward Bed','10'),
 (4,'ICU','2');
/*!40000 ALTER TABLE `beds` ENABLE KEYS */;


--
-- Definition of table `bloodbank`
--

DROP TABLE IF EXISTS `bloodbank`;
CREATE TABLE `bloodbank` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bloodgroup` varchar(45) DEFAULT NULL,
  `quantity` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bloodbank`
--

/*!40000 ALTER TABLE `bloodbank` DISABLE KEYS */;
INSERT INTO `bloodbank` (`id`,`bloodgroup`,`quantity`) VALUES 
 (1,'A+','10'),
 (2,'A-','5'),
 (3,'B+','0'),
 (4,'B-','0'),
 (5,'AB+','0'),
 (6,'AB-','0'),
 (7,'O+','0'),
 (8,'O-','0');
/*!40000 ALTER TABLE `bloodbank` ENABLE KEYS */;


--
-- Definition of table `blooddonor`
--

DROP TABLE IF EXISTS `blooddonor`;
CREATE TABLE `blooddonor` (
  `donorid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) DEFAULT NULL,
  `bloodgroup` varchar(45) DEFAULT NULL,
  `sex` varchar(45) DEFAULT NULL,
  `dob` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `address` longtext,
  `lastdondate` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`donorid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blooddonor`
--

/*!40000 ALTER TABLE `blooddonor` DISABLE KEYS */;
INSERT INTO `blooddonor` (`donorid`,`fullname`,`bloodgroup`,`sex`,`dob`,`phone`,`email`,`address`,`lastdondate`) VALUES 
 (1,'Nwankwo Gabriel Onyedikachi','O+','Male','07/14/1993','07037382623','gfunzy@gmail.com','Wurukum, Makurdi<br>','12/29/2016'),
 (2,'Obilikwu Pauline','AB+','Female','03/16/1990','07058651393','paulineobi@gmail.com','Wadata, Makurdi','12/29/2016');
/*!40000 ALTER TABLE `blooddonor` ENABLE KEYS */;


--
-- Definition of table `casehistory`
--

DROP TABLE IF EXISTS `casehistory`;
CREATE TABLE `casehistory` (
  `caseid` int(10) unsigned NOT NULL,
  `patient` varchar(45) DEFAULT NULL,
  `doctor` varchar(45) DEFAULT NULL,
  `diagnosis` longtext,
  `medication` longtext,
  `medpharm` longtext,
  `pharmacist` varchar(45) DEFAULT NULL,
  `comment` longtext,
  `dateofdiag` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`caseid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `casehistory`
--

/*!40000 ALTER TABLE `casehistory` DISABLE KEYS */;
INSERT INTO `casehistory` (`caseid`,`patient`,`doctor`,`diagnosis`,`medication`,`medpharm`,`pharmacist`,`comment`,`dateofdiag`,`status`) VALUES 
 (1,'1','2','Severe Headache<br>','Panadol Extra<br>','The Following Drugs were administered to the patient:<br>1. Panadol Extra<br>2. Multi Vitamins<br>3. Vitamin C<br>','5','<b>Doctor:</b> Check Up scheduled for next week<br><br><b>Pharmacist:</b> Patient Should feel better after taking the tablets according to the prescribed dosage<br>','11/23/2016','1'),
 (2,'1','2','Sore Throat<br>','Tulips<br>','Hooray<br>','5','<b>Doctor:</b> Should be fine in 3 days<br><br><b>Pharmacist:</b> Hooray<br>','12/30/2016','1'),
 (3,'3','2','Testing Stuffs<br>','Testing Stuffs<br>','Patient did not visit the pharmacy','','<b>Doctor:</b> Testing Stuffs<br>','12/30/2016','0');
/*!40000 ALTER TABLE `casehistory` ENABLE KEYS */;


--
-- Definition of table `department`
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE `department` (
  `deptid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` longtext,
  PRIMARY KEY (`deptid`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` (`deptid`,`name`,`description`) VALUES 
 (1,'Anesthesiology','Anesthesiology<br>'),
 (2,'Bacteriological Laboratory','Bacteriological Laboratory<br><br>'),
 (3,'Physical Therapy','Physical Therapy<br><br>'),
 (4,'Plastic Surgery','Plastic Surgery<br><br>'),
 (5,'Finance','Finance');
/*!40000 ALTER TABLE `department` ENABLE KEYS */;


--
-- Definition of table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE `invoice` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` longtext,
  `patient` varchar(45) DEFAULT NULL,
  `amount` varchar(45) DEFAULT NULL,
  `invoicedate` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `accountant` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

/*!40000 ALTER TABLE `invoice` DISABLE KEYS */;
INSERT INTO `invoice` (`id`,`title`,`description`,`patient`,`amount`,`invoicedate`,`status`,`accountant`) VALUES 
 (1,'Drug Purchasal','Payment for the following drugs<br>','2','2000','01/01/2017','paid','7'),
 (2,'Drug Purchasal','Payment for drugs<br>','3','1500','01/01/2017','paid','7');
/*!40000 ALTER TABLE `invoice` ENABLE KEYS */;


--
-- Definition of table `laboratory`
--

DROP TABLE IF EXISTS `laboratory`;
CREATE TABLE `laboratory` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `reporttype` varchar(255) DEFAULT NULL,
  `doctype` varchar(45) DEFAULT NULL,
  `description` longtext,
  `recdate` varchar(45) DEFAULT NULL,
  `laboratorist` varchar(45) DEFAULT NULL,
  `caseid` varchar(45) DEFAULT NULL,
  `fileurl` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laboratory`
--

/*!40000 ALTER TABLE `laboratory` DISABLE KEYS */;
INSERT INTO `laboratory` (`id`,`reporttype`,`doctype`,`description`,`recdate`,`laboratorist`,`caseid`,`fileurl`) VALUES 
 (1,'Testing','Image','Testing the upload<br>','01/05/2017','8','3','uploads/Face_Urself.jpg'),
 (2,'Testing','Doc','testing<br>','01/05/2017','8','3','uploads/Abia.docx'),
 (3,'Testing','PDF','wasup<br>','01/05/2017','8','3','uploads/ode.pdf');
/*!40000 ALTER TABLE `laboratory` ENABLE KEYS */;


--
-- Definition of table `medcat`
--

DROP TABLE IF EXISTS `medcat`;
CREATE TABLE `medcat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(45) DEFAULT NULL,
  `description` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medcat`
--

/*!40000 ALTER TABLE `medcat` DISABLE KEYS */;
INSERT INTO `medcat` (`id`,`category`,`description`) VALUES 
 (1,'Allergy Liquids','Allergic Medicines'),
 (2,'Vitamins Tablets','Vitamins Tablets Only'),
 (3,'Lil Kesh','Kesh is an excellency');
/*!40000 ALTER TABLE `medcat` ENABLE KEYS */;


--
-- Definition of table `medicine`
--

DROP TABLE IF EXISTS `medicine`;
CREATE TABLE `medicine` (
  `medid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` int(10) unsigned DEFAULT NULL,
  `manufcompany` varchar(255) DEFAULT NULL,
  `quantity` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`medid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine`
--

/*!40000 ALTER TABLE `medicine` DISABLE KEYS */;
INSERT INTO `medicine` (`medid`,`name`,`category`,`description`,`price`,`manufcompany`,`quantity`) VALUES 
 (1,'Viagra','1','For Strong Erection',200,'Slinedalfin Nigeria Limited',0),
 (2,'Panadol Extra','2','For Strong Headaches',50,'Emzor Pharamceuticals, Nigeria',10),
 (3,'Aber C 500','1','Vitamin C 500gm',200,'Company Cipla',50);
/*!40000 ALTER TABLE `medicine` ENABLE KEYS */;


--
-- Definition of table `noticeboard`
--

DROP TABLE IF EXISTS `noticeboard`;
CREATE TABLE `noticeboard` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `notice` varchar(255) DEFAULT NULL,
  `date` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `noticeboard`
--

/*!40000 ALTER TABLE `noticeboard` DISABLE KEYS */;
INSERT INTO `noticeboard` (`id`,`title`,`notice`,`date`,`status`) VALUES 
 (1,'New Year Holiday','1st January, 2017 will be New Year Holiday','01/01/2017','Active'),
 (2,'Chairman\'s Birthday','24th January, 2017 is Chairman\'s Birthday','01/24/2017','Active'),
 (3,'Valentine\'s Day','14th February, 2017 is Holiday','02/14/2017','Active');
/*!40000 ALTER TABLE `noticeboard` ENABLE KEYS */;


--
-- Definition of table `patients`
--

DROP TABLE IF EXISTS `patients`;
CREATE TABLE `patients` (
  `patientid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) DEFAULT NULL,
  `sex` varchar(45) DEFAULT NULL,
  `dob` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `contactperson` varchar(255) DEFAULT NULL,
  `contactphone` varchar(45) DEFAULT NULL,
  `regdate` varchar(45) DEFAULT NULL,
  `recofficer` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`patientid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients`
--

/*!40000 ALTER TABLE `patients` DISABLE KEYS */;
INSERT INTO `patients` (`patientid`,`fullname`,`sex`,`dob`,`phone`,`address`,`contactperson`,`contactphone`,`regdate`,`recofficer`) VALUES 
 (1,'Iyawo Beni','Female','12/12/1992','08188773920','Lagos, Nigeria<br>','Iyawo Busayo','09087654321','12/28/2016','Falz'),
 (2,'Randy Ortom','Male','01/12/1990','08160470444','Abuja, Nigeria<br>Benue State','Randy Mgbede','09087654321','12/28/2016','Falz'),
 (3,'Oke Ndalem','Female','12/08/1985','','Akpako<br>','adecwilliams','09087654321','12/29/2016','Falz');
/*!40000 ALTER TABLE `patients` ENABLE KEYS */;


--
-- Definition of table `report`
--

DROP TABLE IF EXISTS `report`;
CREATE TABLE `report` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(45) DEFAULT NULL,
  `doctor` varchar(45) DEFAULT NULL,
  `patient` varchar(45) DEFAULT NULL,
  `eventdate` varchar(45) DEFAULT NULL,
  `description` longtext,
  `recofficer` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

/*!40000 ALTER TABLE `report` DISABLE KEYS */;
INSERT INTO `report` (`id`,`type`,`doctor`,`patient`,`eventdate`,`description`,`recofficer`) VALUES 
 (1,'birth','1','1','12/29/2016','Succesfull Birth<br>','3'),
 (2,'death','2','2','12/29/2016','Died during Operation<br>','3'),
 (3,'operation','2','2','12/29/2016','Was Operated Upon<br>','3'),
 (4,'other','1','3','12/30/2016','Dunno<br>','3');
/*!40000 ALTER TABLE `report` ENABLE KEYS */;


--
-- Definition of table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE `staff` (
  `staffid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `sex` varchar(45) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `specialty` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`staffid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

/*!40000 ALTER TABLE `staff` DISABLE KEYS */;
INSERT INTO `staff` (`staffid`,`email`,`fullname`,`sex`,`phone`,`address`,`department`,`designation`,`specialty`) VALUES 
 (1,'gabsterry@gmail.com','Nwankwo Gabriel Onyedikachi','Male','07058651393','No. 48 Onitsha Street, <br>Wurukum, <br>Makurdi<br>','Plastic Surgery','doctor','Surgery'),
 (2,'egentistanley@gmail.com','Nwankwo Gabriel Onyedikachi','Male','08166659470','South Africa<br>','Physical Therapy','doctor','Therapeutics'),
 (3,'falzthebadguy@gmail.com','Falz','Male','08138713533','Abuja<br>','Physical Therapy','nurse','Nursing'),
 (5,'realdjtony@yahoo.com','Dj Tony','Male','09034028518','Soft Work<br>','Bacteriological Laboratory','pharmacist','Pharmaceuticals'),
 (6,'ukalizzy01@gmail.com','bnbn','Male','bnbn','bn','Pharmacy','pharmacist','Pharmaceuticals'),
 (7,'tekno@easy.com','Alhaji Tekno','Male','08094382202','Rara<br>','Finance','accountant','Accountancy'),
 (8,'dprinceworldwide@gmail.com','D Prince','Male','08052966549','<b><i><u>World Wide</u></i></b><br>','Bacteriological Laboratory','laboratorist','Clinical Biology'),
 (9,'vivian@gmail.com','Vivi Funzy','Ffemale','0703194299','Kaduna, Nigeria',NULL,'admin',NULL);
/*!40000 ALTER TABLE `staff` ENABLE KEYS */;


--
-- Definition of table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `email` varchar(255) NOT NULL,
  `password` varchar(45) DEFAULT NULL,
  `role` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`email`,`password`,`role`) VALUES 
 ('dprinceworldwide@gmail.com','laboratorist','laboratorist'),
 ('egentistanley@gmail.com','doctor','doctor'),
 ('falzthebadguy@gmail.com','nurse','nurse'),
 ('realdjtony@yahoo.com','pharmacist','pharmacist'),
 ('tekno@easy.com','accountant','accountant'),
 ('ukalizzy01@gmail.com','pharmacist','pharmacist'),
 ('vivian@gmail.com','admin','admin');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
