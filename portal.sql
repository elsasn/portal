/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.1.38-MariaDB : Database - travel
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`travel` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `travel`;

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

/*Table structure for table `data_jadwal` */

DROP TABLE IF EXISTS `data_jadwal`;

CREATE TABLE `data_jadwal` (
  `id_jadwal` varchar(20) NOT NULL,
  `nama_jurusan` varchar(20) DEFAULT NULL,
  `harga` int(20) DEFAULT NULL,
  `jam_berangkat` int(20) DEFAULT NULL,
  `kapasitas` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_jadwal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `data_jadwal` */

insert  into `data_jadwal`(`id_jadwal`,`nama_jurusan`,`harga`,`jam_berangkat`,`kapasitas`) values 
('JDWL-000001','JOGJA-KEBUMEN',70000,20,'10'),
('JDWL-000002','JOGJA-MAJENANG',100000,10,'20');

/*Table structure for table `data_jurusan` */

DROP TABLE IF EXISTS `data_jurusan`;

CREATE TABLE `data_jurusan` (
  `id_jurusan` varchar(20) NOT NULL,
  `nama_jurusan` varchar(20) DEFAULT NULL,
  `harga` int(20) DEFAULT NULL,
  `jam_berangkat` int(20) DEFAULT NULL,
  `kapasitas` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_jurusan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `data_jurusan` */

insert  into `data_jurusan`(`id_jurusan`,`nama_jurusan`,`harga`,`jam_berangkat`,`kapasitas`) values 
('JR-000001','JOJGA - PANGANDARAN',180000,9,'20'),
('JR-000002','JOGJA - PANGANDARAN ',180000,16,'20');

/*Table structure for table `data_user` */

DROP TABLE IF EXISTS `data_user`;

CREATE TABLE `data_user` (
  `id_user` varchar(20) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `level` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `data_user` */

/*Table structure for table `det_bayar` */

DROP TABLE IF EXISTS `det_bayar`;

CREATE TABLE `det_bayar` (
  `id_det_bayar` varchar(20) NOT NULL,
  `id_bayar` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_det_bayar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `det_bayar` */

/*Table structure for table `det_trans_booking` */

DROP TABLE IF EXISTS `det_trans_booking`;

CREATE TABLE `det_trans_booking` (
  `id_det_trans_booking` varchar(50) DEFAULT NULL,
  `id_booking` varchar(20) DEFAULT NULL,
  `id_jurusan` varchar(20) DEFAULT NULL,
  `id_supir` varchar(20) DEFAULT NULL,
  `harga` varchar(20) DEFAULT NULL,
  `jumlah_tiket` int(11) DEFAULT NULL,
  `total_bayar` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `det_trans_booking` */

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

/*Table structure for table `jadwal` */

DROP TABLE IF EXISTS `jadwal`;

CREATE TABLE `jadwal` (
  `id_jadwal` varchar(20) NOT NULL,
  `nama_jurusan` varchar(20) DEFAULT NULL,
  `harga` int(20) DEFAULT NULL,
  `jam_berangkat` datetime DEFAULT NULL,
  `kapasitas` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_jadwal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `jadwal` */

insert  into `jadwal`(`id_jadwal`,`nama_jurusan`,`harga`,`jam_berangkat`,`kapasitas`) values 
('JDWL-000001','JOGJA-KEBUMEN',70000,'0000-00-00 00:00:00','10');

/*Table structure for table `jurusan` */

DROP TABLE IF EXISTS `jurusan`;

CREATE TABLE `jurusan` (
  `id_jurusan` varchar(50) NOT NULL,
  `nama_jurusan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_jurusan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `jurusan` */

insert  into `jurusan`(`id_jurusan`,`nama_jurusan`) values 
('JUR-1001 ','JOGJA-PURWOREJO '),
('JUR-1002 ','JOGJA-KEBUMEN'),
('JUR-1003 ','JOGJA-WANGON'),
('JUR-1004 ','JOGJA-KR.PCUNG'),
('JUR-1005 ','JOGJA-MAJENANG');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `motto` */

insert  into `motto`(`id`,`id_motto`,`motto`,`keterangan`,`status`) values 
(1,'MTT-000001','Never Give Up','Never Give UpNever Give UpNever Give Up','Aktif');

/*Table structure for table `pembatalan` */

DROP TABLE IF EXISTS `pembatalan`;

CREATE TABLE `pembatalan` (
  `id_pembatalan` varchar(20) NOT NULL,
  `id_booking` varchar(20) DEFAULT NULL,
  `total_bayar` varchar(20) DEFAULT NULL,
  `total_pengembalian` varchar(20) DEFAULT NULL,
  `status_pembatalan` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_pembatalan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pembatalan` */

/*Table structure for table `pembayaran` */

DROP TABLE IF EXISTS `pembayaran`;

CREATE TABLE `pembayaran` (
  `id_pembayaran` varchar(20) NOT NULL,
  `id_pembelian` varchar(20) DEFAULT NULL,
  `id_jurusan` varchar(20) DEFAULT NULL,
  `subtotal` int(50) DEFAULT NULL,
  `jumlah_bayar` int(50) DEFAULT NULL,
  `jenis_bayar` varchar(20) DEFAULT NULL,
  `status` enum('Lunas','Belum Lunas') DEFAULT 'Lunas',
  PRIMARY KEY (`id_pembayaran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pembayaran` */

/*Table structure for table `pembelian` */

DROP TABLE IF EXISTS `pembelian`;

CREATE TABLE `pembelian` (
  `id_pembelian` varchar(20) NOT NULL,
  `tgl_transaksi` date DEFAULT NULL,
  `id_pelanggan` varchar(20) DEFAULT NULL,
  `id_jadwal` varchar(20) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `tgl_berangkat` datetime DEFAULT NULL,
  `jumlah_tiket` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pembelian`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pembelian` */

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
