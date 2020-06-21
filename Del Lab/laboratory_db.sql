/*
SQLyog Community v13.1.1 (64 bit)
MySQL - 10.1.35-MariaDB : Database - laboratory_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`laboratory_db` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `laboratory_db`;

/*Table structure for table `alat` */

DROP TABLE IF EXISTS `alat`;

CREATE TABLE `alat` (
  `kode` varchar(20) NOT NULL,
  `nama_alat` varchar(60) NOT NULL,
  `jumlah` int(20) NOT NULL,
  `nomor_rak` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`kode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `alat` */

insert  into `alat`(`kode`,`nama_alat`,`jumlah`,`nomor_rak`,`status`) values 
('4','OHP',2,'124','not available');

/*Table structure for table `details_peminjaman_alat` */

DROP TABLE IF EXISTS `details_peminjaman_alat`;

CREATE TABLE `details_peminjaman_alat` (
  `id_peminjaman_alat` varchar(20) NOT NULL,
  `id_peminjam` varchar(20) NOT NULL,
  `id_alat` varchar(20) NOT NULL,
  `tanggal_pemakaian` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  PRIMARY KEY (`id_peminjaman_alat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `details_peminjaman_alat` */

/*Table structure for table `details_peminjaman_ruangan` */

DROP TABLE IF EXISTS `details_peminjaman_ruangan`;

CREATE TABLE `details_peminjaman_ruangan` (
  `id_peminjaman_ruangan` varchar(20) NOT NULL,
  `id_pegawai` varchar(20) NOT NULL,
  `id_peminjam` varchar(20) NOT NULL,
  `id_ruangan` varchar(20) NOT NULL,
  `tanggal_pemakaian` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  PRIMARY KEY (`id_peminjaman_ruangan`),
  KEY `id_pegawai` (`id_pegawai`),
  KEY `id_peminjam` (`id_peminjam`),
  KEY `id_ruangan` (`id_ruangan`),
  CONSTRAINT `id_pegawai` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`),
  CONSTRAINT `id_peminjam` FOREIGN KEY (`id_peminjam`) REFERENCES `peminjam` (`id_peminjam`),
  CONSTRAINT `id_ruangan` FOREIGN KEY (`id_ruangan`) REFERENCES `ruangan` (`id_ruangan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `details_peminjaman_ruangan` */

insert  into `details_peminjaman_ruangan`(`id_peminjaman_ruangan`,`id_pegawai`,`id_peminjam`,`id_ruangan`,`tanggal_pemakaian`,`tanggal_selesai`,`tanggal_kembali`) values 
('11S1','13S','12S17014','722','2020-01-15','2020-01-17',NULL);

/*Table structure for table `pegawai` */

DROP TABLE IF EXISTS `pegawai`;

CREATE TABLE `pegawai` (
  `id_pegawai` varchar(20) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id_pegawai`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pegawai` */

insert  into `pegawai`(`id_pegawai`,`nama`,`jenis_kelamin`,`username`,`password`) values 
('12S','Heppy Simanungkalit','P','heppy','heppy'),
('13S','Yolanda Manurung','P','yol','yol');

/*Table structure for table `peminjam` */

DROP TABLE IF EXISTS `peminjam`;

CREATE TABLE `peminjam` (
  `id_peminjam` varchar(20) NOT NULL,
  `nama_peminjam` varchar(60) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  PRIMARY KEY (`id_peminjam`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `peminjam` */

insert  into `peminjam`(`id_peminjam`,`nama_peminjam`,`jenis_kelamin`) values 
('12S17014','David Simamora','L'),
('12S17041','Yeni Panjaitan','P');

/*Table structure for table `ruangan` */

DROP TABLE IF EXISTS `ruangan`;

CREATE TABLE `ruangan` (
  `id_ruangan` varchar(20) NOT NULL,
  `nama_ruangan` varchar(60) NOT NULL,
  `status` varchar(20) NOT NULL,
  `fasilitas` varchar(100) NOT NULL,
  PRIMARY KEY (`id_ruangan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ruangan` */

insert  into `ruangan`(`id_ruangan`,`nama_ruangan`,`status`,`fasilitas`) values 
('513','Ruangan Rapat','not available','Meja: 10 ; kursi: 30 ; proyektor: 2 ; AC: 1'),
('515','Ruangan Rapat','available','Meja: 10 ; kursi: 30 ; proyektor: 1'),
('522','Ruangan Presentasi','available','proyektor: 1; meja: 3; kursi: 10; whiteboard:1'),
('713','Lab. Komputer-3','available','Komputer PC:1 ; Whiteboard:1 ; Proyektor: 1 ; AC:1'),
('722','Lab. Komputer-1','available','Komputer PC:1 ; Whiteboard:1 ; Proyektor: 1 ; AC:1'),
('723','Lab. Komputer-1','not available','Komputer PC:1 ; Whiteboard:1 ; Proyektor: 1 ; CCTV:1'),
('818','Ruangan Rapat','not available','Meja: 10 ; kursi: 30 ; proyektor: 1'),
('823','Lab. Praktikum Kimia Dasar','available','proyektor: 1; meja: 3; kursi: 10; whiteboard:1'),
('913','Ruangan Presentasi','available','proyektor: 1; meja: 3; kursi: 10; whiteboard:1');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
