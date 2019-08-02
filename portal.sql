/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.1.38-MariaDB : Database - portal
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`portal` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `portal`;

/*Table structure for table `akun` */

DROP TABLE IF EXISTS `akun`;

CREATE TABLE `akun` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_akun` varchar(20) DEFAULT NULL,
  `sub_klasifikasi` varchar(20) DEFAULT NULL,
  `nama` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `akun` */

insert  into `akun`(`id`,`id_akun`,`sub_klasifikasi`,`nama`) values 
(1,'110-01','Kas','Kas'),
(2,'110-02','Kas','Kas Kecil');

/*Table structure for table `artikel` */

DROP TABLE IF EXISTS `artikel`;

CREATE TABLE `artikel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_artikel` varchar(20) DEFAULT NULL,
  `tgl_artikel` date DEFAULT NULL,
  `judul` text,
  `isi` text,
  `foto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `artikel` */

insert  into `artikel`(`id`,`id_artikel`,`tgl_artikel`,`judul`,`isi`,`foto`) values 
(1,'ARTKL-000001','2019-07-15','dasdas','adasd','15072019171902tc_logo.jpg');

/*Table structure for table `bayar` */

DROP TABLE IF EXISTS `bayar`;

CREATE TABLE `bayar` (
  `id_bayar` varchar(20) NOT NULL,
  `id_booking` varchar(20) DEFAULT NULL,
  `harga` varchar(20) DEFAULT NULL,
  `subtotal` varchar(50) DEFAULT NULL,
  `jml_bayar` varchar(50) DEFAULT NULL,
  `jenis_bayar` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `biaya_jemput` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_bayar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `bayar` */

/*Table structure for table `company` */

DROP TABLE IF EXISTS `company`;

CREATE TABLE `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_company` varchar(20) DEFAULT NULL,
  `nama_company` varchar(20) DEFAULT NULL,
  `keterangan` text,
  `status` enum('Aktif','Tidak Aktif') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `company` */

insert  into `company`(`id`,`id_company`,`nama_company`,`keterangan`,`status`) values 
(1,'COMPRO-0001','SELAMAT DATANG DI KO','AHDAHSDASKDKASDKADASDASDASDASDASDASD','Aktif');

/*Table structure for table `daftar` */

DROP TABLE IF EXISTS `daftar`;

CREATE TABLE `daftar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_daftar` varchar(20) DEFAULT NULL,
  `nama` varchar(20) DEFAULT NULL,
  `nirn` varchar(20) DEFAULT NULL,
  `foto1` varchar(20) DEFAULT NULL,
  `foto2` varchar(20) DEFAULT NULL,
  `foto3` varchar(20) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `alamat` text,
  `no_hp` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `daftar` */

/*Table structure for table `data_karyawan` */

DROP TABLE IF EXISTS `data_karyawan`;

CREATE TABLE `data_karyawan` (
  `id_karyawan` varchar(20) NOT NULL,
  `nama_karyawan` varchar(20) DEFAULT NULL,
  `jabatan` varchar(20) DEFAULT NULL,
  `jenis_kelamin` varchar(20) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `no_telp` int(20) DEFAULT NULL,
  PRIMARY KEY (`id_karyawan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `data_karyawan` */

insert  into `data_karyawan`(`id_karyawan`,`nama_karyawan`,`jabatan`,`jenis_kelamin`,`alamat`,`no_telp`) values 
('KRY-000002','kmji','Operator','Perempuan','kio',79),
('KRY-000003','uyguyg','Super Admin','Laki - Laki','ytgrf',987),
('KRY-000004','dsd','Operator','Perempuan','efe',212);

/*Table structure for table `event` */

DROP TABLE IF EXISTS `event`;

CREATE TABLE `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_event` varchar(20) DEFAULT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `nama` varchar(20) DEFAULT NULL,
  `keterangan` text,
  `status` enum('Selesai','Coming Soon') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `event` */

/*Table structure for table `is_users` */

DROP TABLE IF EXISTS `is_users`;

CREATE TABLE `is_users` (
  `id_user` int(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telepon` varchar(13) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `hak_akses` enum('Super Admin','Sekretaris','Finance','Office') NOT NULL,
  `status` enum('aktif','blokir') NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_user`),
  KEY `level` (`hak_akses`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `is_users` */

insert  into `is_users`(`id_user`,`username`,`nama_user`,`password`,`email`,`telepon`,`foto`,`hak_akses`,`status`,`created_at`,`updated_at`) values 
(1,'superadmin','superadmin','21232f297a57a5a743894a0e4a801fc3','superadmin@gmail.com','085669919769','user-default.png','Super Admin','aktif','2017-04-01 15:15:15','2019-07-13 19:39:50'),
(2,'sekre','sekre','64505edd09be53b9e1657d6f74201532','sekre@gmail.com','123456789','kadina.png','Sekretaris','aktif','2017-04-01 15:15:15','2019-07-13 14:53:19'),
(3,'finance','finance','57336afd1f4b40dfd9f5731e35302fe5','finance@gmail.com','123456789','','Finance','aktif','2017-04-01 15:15:15','2019-07-13 14:53:14'),
(4,'office','office','e72f4545eb68c96c754f91fc01573517','','',NULL,'Office','aktif','2019-07-13 14:51:12','2019-07-13 14:53:09');

/*Table structure for table `kasin` */

DROP TABLE IF EXISTS `kasin`;

CREATE TABLE `kasin` (
  `id_kasin` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_transaksi` date DEFAULT NULL,
  `ref` varchar(20) DEFAULT NULL,
  `nama_setor` varchar(20) DEFAULT NULL,
  `keterangan` text,
  `nilai` float DEFAULT NULL,
  PRIMARY KEY (`id_kasin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `kasin` */

insert  into `kasin`(`id_kasin`,`tgl_transaksi`,`ref`,`nama_setor`,`keterangan`,`nilai`) values 
(1,'2019-07-13','REF-000001','dasd','sdasdsa',10000000);

/*Table structure for table `kasout` */

DROP TABLE IF EXISTS `kasout`;

CREATE TABLE `kasout` (
  `id_kasout` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_transaksi` date DEFAULT NULL,
  `ref` varchar(20) DEFAULT NULL,
  `nama_setor` varchar(20) DEFAULT NULL,
  `keterangan` text,
  `nilai` float DEFAULT NULL,
  PRIMARY KEY (`id_kasout`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `kasout` */

insert  into `kasout`(`id_kasout`,`tgl_transaksi`,`ref`,`nama_setor`,`keterangan`,`nilai`) values 
(1,'2019-07-13','REF-000001','dasd','sdasdsa',10000000);

/*Table structure for table `kategori` */

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategori` varchar(20) DEFAULT NULL,
  `nama_kategori` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `kategori` */

insert  into `kategori`(`id`,`id_kategori`,`nama_kategori`) values 
(1,'ARTKL-000001','Teknologi');

/*Table structure for table `motto` */

DROP TABLE IF EXISTS `motto`;

CREATE TABLE `motto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_motto` varchar(20) DEFAULT NULL,
  `motto` varchar(20) DEFAULT NULL,
  `keterangan` text,
  `status` enum('Aktif','Tidak Aktif') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `motto` */

insert  into `motto`(`id`,`id_motto`,`motto`,`keterangan`,`status`) values 
(1,'MTT-000001','Never Give Up','Never Give UpNever Give UpNever Give Up','Aktif'),
(2,'MTT-000002','Solidaritas','Membangun komunitas yang mempunyai solidaritas antar sesama anggota untuk mewujudkan lingkungan yang positif\r\nMembangun komunitas yang mempunyai solidaritas antar sesama anggota untuk mewujudkan lingkungan yang positif\r\nMembangun komunitas yang mempunyai solidaritas antar sesama anggota untuk mewujudkan lingkungan yang positif','Aktif'),
(3,'MTT-000003','Kekeluargaan','Membangun komunitas yang mempunyai solidaritas antar sesama anggota untuk mewujudkan lingkungan yang positif\r\nMembangun komunitas yang mempunyai solidaritas antar sesama anggota untuk mewujudkan lingkungan yang positif\r\nMembangun komunitas yang mempunyai solidaritas antar sesama anggota untuk mewujudkan lingkungan yang positif','Aktif');

/*Table structure for table `pengurus` */

DROP TABLE IF EXISTS `pengurus`;

CREATE TABLE `pengurus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pengurus` varchar(20) DEFAULT NULL,
  `nama_pengurus` varchar(20) DEFAULT NULL,
  `alamat` text,
  `email` varchar(20) DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `pengurus` */

insert  into `pengurus`(`id`,`id_pengurus`,`nama_pengurus`,`alamat`,`email`,`no_telp`) values 
(1,'PNGRS-000001','tes','tes','tes@example.com','123456789');

/*Table structure for table `surat` */

DROP TABLE IF EXISTS `surat`;

CREATE TABLE `surat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_surat` varchar(20) DEFAULT NULL,
  `tgl_surat` date DEFAULT NULL,
  `judul` varchar(20) DEFAULT NULL,
  `asal_surat` varchar(20) DEFAULT NULL,
  `tujuan_surat` varchar(20) DEFAULT NULL,
  `isi_surat` text,
  `keterangan` text,
  `file` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `surat` */

insert  into `surat`(`id`,`id_surat`,`tgl_surat`,`judul`,`asal_surat`,`tujuan_surat`,`isi_surat`,`keterangan`,`file`) values 
(1,'SRT-ORG-000001','0000-00-00','sdfsdf','sdfsdf','dsfsd','fs','sdfsd','15072019162843tc_logo.jpg');

/*Table structure for table `testimoni` */

DROP TABLE IF EXISTS `testimoni`;

CREATE TABLE `testimoni` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_testimoni` varchar(20) DEFAULT NULL,
  `judul_testimoni` varchar(20) DEFAULT NULL,
  `isi_testimoni` text,
  `foto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `testimoni` */

/*Table structure for table `video` */

DROP TABLE IF EXISTS `video`;

CREATE TABLE `video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_video` varchar(20) DEFAULT NULL,
  `judul_video` varchar(20) DEFAULT NULL,
  `video` text,
  `keterangan` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `video` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
