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
            $tgl_transaksi  = mysqli_real_escape_string($mysqli, trim($_POST['tgl_transaksi']));
            $ref  = mysqli_real_escape_string($mysqli, trim($_POST['ref']));
            $nama_setor  = mysqli_real_escape_string($mysqli, trim($_POST['nama_setor']));
            $keterangan  = mysqli_real_escape_string($mysqli, trim($_POST['keterangan']));
            $nilai  = mysqli_real_escape_string($mysqli, trim($_POST['nilai']));
            
            
            //$created_user = $_SESSION['id_user'];

            // perintah query untuk menyimpan data ke tabel obat
            //print_r($_POST);die;
            $query = mysqli_query($mysqli, "INSERT INTO kasin(tgl_transaksi,ref,nama_setor,keterangan,nilai)
                VALUES ('$tgl_transaksi','$ref','$nama_setor','$keterangan','$nilai')")
                or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));    

            // cek query

            if ($query) {
                // jika berhasil tampilkan pesan berhasil simpan data
                header("location: ../../main.php?module=kasin&alert=1");
            }   
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['simpan'])) {
            if (isset($_POST['id_kasin'])) {
                // ambil data hasil submit dari form
            $tgl_transaksi  = mysqli_real_escape_string($mysqli, trim($_POST['tgl_transaksi']));
            $ref  = mysqli_real_escape_string($mysqli, trim($_POST['ref']));
            $nama_setor  = mysqli_real_escape_string($mysqli, trim($_POST['nama_setor']));
            $keterangan  = mysqli_real_escape_string($mysqli, trim($_POST['keterangan']));
            $nilai  = mysqli_real_escape_string($mysqli, trim($_POST['nilai']));
            
           
                //$updated_user = $_SESSION['id_user'];

                // perintah query untuk mengubah data pada tabel 
                $query = mysqli_query($mysqli, "UPDATE kasin SET  id_kasin   = '$id_kasin',
                                                                    nama_kasin       = '$nama_kasin'
                                                              WHERE id_kasin       = '$id_kasin'")
                                                or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                // cek query
                if ($query) {
                    // jika berhasil tampilkan pesan berhasil update data
                    header("location: ../../main.php?module=kasin&alert=2");
                }         
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $id_kasin = $_GET['id'];
    
            // perintah query untuk menghapus data pada tabel obat
            $query = mysqli_query($mysqli, "DELETE FROM kasin WHERE id_kasin='$id_kasin'")
                                            or die('Ada kesalahan pada query delete : '.mysqli_error($mysqli));

            // cek hasil query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil delete data
                header("location: ../../main.php?module=kasin&alert=3");
            }
        }
    }       
}       
?>