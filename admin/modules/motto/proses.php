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
            $id_motto  = mysqli_real_escape_string($mysqli, trim($_POST['id_motto']));
            $motto  = mysqli_real_escape_string($mysqli, trim($_POST['motto']));
            $keterangan  = mysqli_real_escape_string($mysqli, trim($_POST['keterangan']));
            $status  = mysqli_real_escape_string($mysqli, trim($_POST['status']));
            

            //$created_user = $_SESSION['id_user'];

            // perintah query untuk menyimpan data ke tabel obat
            //print_r($query);
            $query = mysqli_query($mysqli, "INSERT INTO motto(id_motto,motto,keterangan,status)
                VALUES ('$id_motto','$motto','$keterangan','$status')")
                or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));    

            // cek query

            if ($query) {
                // jika berhasil tampilkan pesan berhasil simpan data
                header("location: ../../main.php?module=motto&alert=1");
            }   
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['simpan'])) {
            if (isset($_POST['id_motto'])) {
                // ambil data hasil submit dari form
            $id_motto  = mysqli_real_escape_string($mysqli, trim($_POST['id_motto']));
            $motto  = mysqli_real_escape_string($mysqli, trim($_POST['motto']));
            $keterangan  = mysqli_real_escape_string($mysqli, trim($_POST['keterangan']));
            $status  = mysqli_real_escape_string($mysqli, trim($_POST['status']));
           
                //$updated_user = $_SESSION['id_user'];

                // perintah query untuk mengubah data pada tabel obat
                $query = mysqli_query($mysqli, "UPDATE motto SET  id_motto   = '$id_motto',
                                                                    motto       = '$motto',
                                                                    keterangan       = '$keterangan',
                                                                    status              = '$status'
                                                              WHERE id_motto       = '$id_motto'")
                                                or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                // cek query
                if ($query) {
                    // jika berhasil tampilkan pesan berhasil update data
                    header("location: ../../main.php?module=motto&alert=2");
                }         
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $id_motto = $_GET['id'];
    
            // perintah query untuk menghapus data pada tabel obat
            $query = mysqli_query($mysqli, "DELETE FROM motto WHERE id_motto='$id_motto'")
                                            or die('Ada kesalahan pada query delete : '.mysqli_error($mysqli));

            // cek hasil query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil delete data
                header("location: ../../main.php?module=motto&alert=3");
            }
        }
    }       
}       
?>