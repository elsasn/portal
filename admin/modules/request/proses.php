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
            $id_pengurus  = mysqli_real_escape_string($mysqli, trim($_POST['id_pengurus']));
            $nama_pengurus  = mysqli_real_escape_string($mysqli, trim($_POST['nama_pengurus']));
            $alamat  = mysqli_real_escape_string($mysqli, trim($_POST['alamat']));
            $email  = mysqli_real_escape_string($mysqli, trim($_POST['email']));
            $no_telp  = mysqli_real_escape_string($mysqli, trim($_POST['no_telp']));
            
            //$created_user = $_SESSION['id_user'];

            // perintah query untuk menyimpan data ke tabel obat
            //print_r($query);
            $query = mysqli_query($mysqli, "INSERT INTO pengurus(id_pengurus,nama_pengurus,alamat,email,no_telp)
                VALUES ('$id_pengurus','$nama_pengurus','$alamat','$email','$no_telp')")
                or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));    

            // cek query

            if ($query) {
                // jika berhasil tampilkan pesan berhasil simpan data
                header("location: ../../main.php?module=pengurus&alert=1");
            }   
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['simpan'])) {
            if (isset($_POST['id_pengurus'])) {
                // ambil data hasil submit dari form
            $id_pengurus  = mysqli_real_escape_string($mysqli, trim($_POST['id_pengurus']));
            $nama_pengurus  = mysqli_real_escape_string($mysqli, trim($_POST['nama_pengurus']));
            $alamat  = mysqli_real_escape_string($mysqli, trim($_POST['alamat']));
            $email  = mysqli_real_escape_string($mysqli, trim($_POST['email']));
            $no_telp  = mysqli_real_escape_string($mysqli, trim($_POST['no_telp']));
            
           
                //$updated_user = $_SESSION['id_user'];

                // perintah query untuk mengubah data pada tabel 
                $query = mysqli_query($mysqli, "UPDATE pengurus SET  id_pengurus   = '$id_pengurus',
                                                                    nama_pengurus       = '$nama_pengurus',
                                                                    alamat       = '$alamat',
                                                                    email       = '$email',
                                                                    no_telp       = '$no_telp'
                                                              WHERE id_pengurus       = '$id_pengurus'")
                                                or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                // cek query
                if ($query) {
                    // jika berhasil tampilkan pesan berhasil update data
                    header("location: ../../main.php?module=pengurus&alert=2");
                }         
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $id_pengurus = $_GET['id'];
    
            // perintah query untuk menghapus data pada tabel obat
            $query = mysqli_query($mysqli, "DELETE FROM pengurus WHERE id_pengurus='$id_pengurus'")
                                            or die('Ada kesalahan pada query delete : '.mysqli_error($mysqli));

            // cek hasil query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil delete data
                header("location: ../../main.php?module=pengurus&alert=3");
            }
        }
    }       
}       
?>