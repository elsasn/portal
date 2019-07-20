<?php
session_start();

// Panggil koneksi database.php untuk koneksi database
require_once "../../config/database.php";

// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan pesan = 1
if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
// jika user sudah login, maka jalankan perintah untuk insert, update, dan delete
else {
    if ($_GET['act']=='insert') {
        if (isset($_POST['simpan'])) {
            // ambil data hasil submit dari form
            $id_event  = mysqli_real_escape_string($mysqli, trim($_POST['id_event']));
            $tgl_mulai  = mysqli_real_escape_string($mysqli, trim($_POST['tgl_mulai']));
            $tgl_selesai  = mysqli_real_escape_string($mysqli, trim($_POST['tgl_selesai']));
            $nama  = mysqli_real_escape_string($mysqli, trim($_POST['nama']));
            $keterangan  = mysqli_real_escape_string($mysqli, trim($_POST['keterangan']));
            $status  = mysqli_real_escape_string($mysqli, trim($_POST['status']));
            
            //$created_user = $_SESSION['id_user'];

            // perintah query untuk menyimpan data ke tabel obat
            //print_r($query);
            $query = mysqli_query($mysqli, "INSERT INTO event(id_event,tgl_mulai,tgl_selesai,nama,keterangan,status)
                VALUES ('$id_event','$tgl_mulai','$tgl_selesai','$nama','$keterangan','$status')")
                or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));    

            // cek query

            if ($query) {
                // jika berhasil tampilkan pesan berhasil simpan data
                header("location: ../../main.php?module=event&alert=1");
                
            }   
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['simpan'])) {
            if (isset($_POST['id_event'])) {
                // ambil data hasil submit dari form
            $id_event  = mysqli_real_escape_string($mysqli, trim($_POST['id_event']));
            $tgl_mulai  = mysqli_real_escape_string($mysqli, trim($_POST['tgl_mulai']));
            $tgl_selesai  = mysqli_real_escape_string($mysqli, trim($_POST['tgl_selesai']));
            $nama  = mysqli_real_escape_string($mysqli, trim($_POST['nama']));
            $keterangan  = mysqli_real_escape_string($mysqli, trim($_POST['keterangan']));
            $status  = mysqli_real_escape_string($mysqli, trim($_POST['status']));
            
           
                //$updated_user = $_SESSION['id_user'];

                // perintah query untuk mengubah data pada tabel 
                $query = mysqli_query($mysqli, "UPDATE event SET  id_event   = '$id_event',
                                                                    tgl_mulai       = '$tgl_selesai',
                                                                    tgl_selesai       = '$tgl_selesai',
                                                                    nama       = '$nama',
                                                                    keterangan       = '$keterangan',
                                                                    status       = '$status'
                                                                    
                                                              WHERE id_event       = '$id_event'")
                                                or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                // cek query
                if ($query) {
                    // jika berhasil tampilkan pesan berhasil update data
                    header("location: ../../main.php?module=event&alert=2");
                    
                }         
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $id_event = $_GET['id'];
    
            // perintah query untuk menghapus data pada tabel obat
            $query = mysqli_query($mysqli, "DELETE FROM event WHERE id_event='$id_event'")
                                            or die('Ada kesalahan pada query delete : '.mysqli_error($mysqli));

            // cek hasil query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil delete data
                header("location: ../../main.php?module=event&alert=3");
            }
        }
    }       
}       
?>