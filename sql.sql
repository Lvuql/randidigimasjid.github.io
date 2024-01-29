/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.4.28-MariaDB : Database - digitalisasimasjid
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`digitalisasimasjid` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `digitalisasimasjid`;

/*Table structure for table `tbl_agenda` */

DROP TABLE IF EXISTS `tbl_agenda`;

CREATE TABLE `tbl_agenda` (
  `id_agenda` char(10) NOT NULL,
  `nama_agenda` varchar(200) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `jenis_agenda` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_agenda`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_agenda` */

insert  into `tbl_agenda`(`id_agenda`,`nama_agenda`,`tanggal`,`jam`,`jenis_agenda`) values 
('KE001','Kegiatan Untuk Anak Yatim 1','2024-01-17','02:12:00','Anak Yatim'),
('KE002','Kegiatan Untuk TPQ 1','2024-01-18','05:12:00','TPQ'),
('KE003','Kegiatan Untuk Sosial 1','2024-01-18','06:15:00','Sosial'),
('KE004','Kegiatan Untuk Masjid 1','2024-02-01','02:18:00','Mesjid'),
('KE005','Kegiatan Anak  Yatim 2','2024-01-18','03:54:00','Anak Yatim'),
('KE006','Kegiatan TPQ 2','2024-12-17','04:21:00','TPQ'),
('KE007','Kegiatan Sosial 2','2024-01-17','04:28:00','Sosial'),
('KE008','Kegiatan Masjid 2','2024-01-11','04:36:00','Mesjid'),
('KE009','Kegiatan Anak Yatim 2','2024-01-17','10:46:00','Anak Yatim'),
('KE010','Kegiatan Anak Yatim 3','2024-01-17','10:46:00','Anak Yatim'),
('KE011','Agenda Anak Yatim 3','2024-01-17','13:43:00','Anak Yatim'),
('KE021','Yatiimmm','2024-01-17','14:45:00','Anak Yatim');

/*Table structure for table `tbl_donatur` */

DROP TABLE IF EXISTS `tbl_donatur`;

CREATE TABLE `tbl_donatur` (
  `iddonatur` char(10) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `nohp` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`iddonatur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_donatur` */

insert  into `tbl_donatur`(`iddonatur`,`nama`,`alamat`,`nohp`) values 
('D001','Randi Fadillah','Jl Teratai Indah ','0821084343'),
('D002','Musri Wandra','Jl Pasaman Ah','082188889999');

/*Table structure for table `tbl_kas_keluar` */

DROP TABLE IF EXISTS `tbl_kas_keluar`;

CREATE TABLE `tbl_kas_keluar` (
  `id_kas_masjid` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `ket` varchar(200) DEFAULT NULL,
  `kas_keluar` double DEFAULT NULL,
  `jenis_kas` varchar(200) DEFAULT NULL,
  `id_agendamasjid` char(10) DEFAULT NULL,
  PRIMARY KEY (`id_kas_masjid`),
  KEY `id_agendamasjid` (`id_agendamasjid`),
  CONSTRAINT `tbl_kas_keluar_ibfk_1` FOREIGN KEY (`id_agendamasjid`) REFERENCES `tbl_agenda` (`id_agenda`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_kas_keluar` */

insert  into `tbl_kas_keluar`(`id_kas_masjid`,`tanggal`,`ket`,`kas_keluar`,`jenis_kas`,`id_agendamasjid`) values 
(7,'2024-01-16','Upah Angkat Angkat',10,'TPQ','KE002'),
(10,'2024-01-16','aadvcv',22,'TPQ','KE006'),
(14,'2024-01-16','Tahlilan',20,'Sosial','KE007'),
(16,'2024-02-01','Hilal bi hilal ',20,'Mesjid','KE008'),
(19,'2024-01-17','YAtim',25,'Anak Yatim','KE021'),
(20,'2024-01-17','tes 1',10,'Anak Yatim','KE005'),
(21,'2024-01-17','Tes 2',20,'Anak Yatim','KE005'),
(23,'2024-01-17','Tes Update',5,'Anak Yatim','KE005'),
(24,'2024-01-17','Tes Update',10000,'Anak Yatim','KE006'),
(25,'2024-01-17','aa',2,'Anak Yatim','KE006'),
(26,'2024-01-17','aa',2,'TPQ','KE006'),
(27,'2024-01-17','aa',2,'TPQ','KE006'),
(28,'2024-01-17','a',1,'Sosial','KE007'),
(29,'2024-01-17','q',2,'Sosial','KE003'),
(30,'2024-01-17','aa',5,'Mesjid','KE008'),
(31,'2024-01-17','tpq',2,'TPQ','KE006');

/*Table structure for table `tbl_kas_masjid` */

DROP TABLE IF EXISTS `tbl_kas_masjid`;

CREATE TABLE `tbl_kas_masjid` (
  `id_kas_masjid` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `ket` varchar(200) DEFAULT NULL,
  `kas_masuk` double DEFAULT NULL,
  `jenis_kas` varchar(100) DEFAULT NULL,
  `iddonaturmasjid` char(10) DEFAULT NULL,
  PRIMARY KEY (`id_kas_masjid`),
  KEY `iddonaturmasjid` (`iddonaturmasjid`),
  CONSTRAINT `tbl_kas_masjid_ibfk_1` FOREIGN KEY (`iddonaturmasjid`) REFERENCES `tbl_donatur` (`iddonatur`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_kas_masjid` */

insert  into `tbl_kas_masjid`(`id_kas_masjid`,`tanggal`,`ket`,`kas_masuk`,`jenis_kas`,`iddonaturmasjid`) values 
(1,'2024-01-15','Sumbangan Rafi',20,'TPQ',NULL),
(2,'2024-01-15','Sumbangan Wandra',20,'Sosial',NULL),
(3,'2024-01-15','Ket Tesss  ',20,'Anak Yatim','D001'),
(4,'2024-01-15','Dana JackPot a',20,'Mesjid','D001'),
(5,'2024-01-12','Lanjo Tukang ',20,'Sosial','D001'),
(6,'2024-01-16','Kas Masuk 24 ',20,'TPQ','D001'),
(7,'2024-01-16','Hibah Caleg',20,'Anak Yatim','D002'),
(9,'2024-01-17','YATIIIMMM',25,'Anak Yatim','D001'),
(10,'2024-01-17','abc',30,'Mesjid','D001');

/*Table structure for table `tbl_pengurus` */

DROP TABLE IF EXISTS `tbl_pengurus`;

CREATE TABLE `tbl_pengurus` (
  `id_pengurus` char(11) NOT NULL,
  `nama_pengurus` varchar(35) DEFAULT NULL,
  `jabatan` varchar(30) NOT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_pengurus`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `tbl_pengurus` */

insert  into `tbl_pengurus`(`id_pengurus`,`nama_pengurus`,`jabatan`,`alamat`,`no_hp`) values 
('001','Musri Wandra','Ketua Yayasan','Jl Pasaman1','082288169342'),
('002','zkai','sdf','lkjf','09');

/*Table structure for table `tbl_user` */

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `id_user` char(11) NOT NULL,
  `nama_user` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `tbl_user` */

insert  into `tbl_user`(`id_user`,`nama_user`,`email`,`password`,`level`) values 
('001','wandra','wandra@gmail.com ','827ccb0eea8a706c4c34a16891f84e7b',2),
('003','putra','putra@gmail.com','$2y$10$D/zHRLaTicAN1o./rq.xO.R0o2aNsctqVi62nMN7Q/d6Si58c4ova',1),
('004','randi','randi@gmail.com','$2y$10$s0qeaRYl2pDF/kiTVUwk8.8cqJpRJXIZgUKiVDNYMyPlagHw4Cdl.',1),
('005','corny','corny@gmail.com','$2y$10$VzjQtRhvspJyo2cXFsioee8NsdvA7fC.YYcEB7NAtXrFrWrWmNsGi',3),
('006','admin','admin@gmail.com','$2y$10$IBlHYveYX4dqdrs18DBIvu.YgcJsFhHxSNMTQQ19f3FJ6oUES0oxa',1),
('007','donatur','donatur@gmail.com','$2y$10$N9FkWYfvPXDxJZn6VyCo7OUIvjs1f.LH54TwGvPDaG0yk2pkdGCx2',2),
('008','bendahara','bendahara@gmail.com','$2y$10$OMVjvsqq7IWvwvvCxZkAwOY7hxU4MI2Kn4b.AqWFjyd8BqNf7VU5q',3);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
