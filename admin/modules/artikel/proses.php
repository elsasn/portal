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
            $id_artikel  = mysqli_real_escape_string($mysqli, trim($_POST['id_artikel']));
            $tgl_artikel  = mysqli_real_escape_string($mysqli, trim($_POST['tgl_artikel']));
            $judul  = mysqli_real_escape_string($mysqli, trim($_POST['judul']));
            $isi  = mysqli_real_escape_string($mysqli, trim($_POST['isi']));
            $foto = $_FILES['foto']['name'];
            $tmp = $_FILES['foto']['tmp_name'];
  
            // Rename nama filenya dengan menambahkan tanggal dan jam upload
            $fotobaru = date('dmYHis').$foto;
            // Set path folder tempat menyimpan filenya
            $path = "../../images/".$fotobaru;
            
            //$created_user = $_SESSION['id_user'];
            if(move_uploaded_file($tmp, $path)){

            
            //$created_user = $_SESSION['id_user'];

            // perintah query untuk menyimpan data ke tabel obat
            //print_r($query);
            $query = mysqli_query($mysqli, "INSERT INTO artikel(id_artikel,tgl_artikel,judul,isi,foto)
                VALUES ('$id_artikel','$tgl_artikel','$judul','$isi','$fotobaru')")
                or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));    

            // cek query

            if ($query) {
                // jika berhasil tampilkan pesan berhasil simpan data
                header("location: ../../main.php?module=artikel&alert=1");
                }
            }   
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['simpan'])) {
            if (isset($_POST['id_artikel'])) {
                // ambil data hasil submit dari form
            $id_artikel  = mysqli_real_escape_string($mysqli, trim($_POST['id_artikel']));
            $tgl_artikel  = mysqli_real_escape_string($mysqli, trim($_POST['tgl_artikel']));
            $judul  = mysqli_real_escape_string($mysqli, trim($_POST['judul']));
            $isi  = mysqli_real_escape_string($mysqli, trim($_POST['isi']));
            $foto = $_FILES['foto']['name'];
            $tmp = $_FILES['foto']['tmp_name'];
  
            // Rename nama filenya dengan menambahkan tanggal dan jam upload
            $fotobaru = date('dmYHis').$foto;
            // Set path folder tempat menyimpan filenya
            $path = "../../images/".$fotobaru;
            
            //$created_user = $_SESSION['id_user'];
            if(move_uploaded_file($tmp, $path)){
           
                //$updated_user = $_SESSION['id_user'];

                // perintah query untuk mengubah data pada tabel 
                $query = mysqli_query($mysqli, "UPDATE artikel SET  id_artikel   = '$id_artikel',
                                                                    tgl_artikel = '$tgl_artikel',
                                                                    judul             = '$judul',
                                                                    isi                = '$isi',
                                                                foto                 = '$fotobaru'
                                                                    
                                                              WHERE id_artikel       = '$id_artikel'")
                                            or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                // cek query
                if ($query) {
                    // jika berhasil tampilkan pesan berhasil update data
                    header("location: ../../main.php?module=artikel&alert=2");
                    }
                }         
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $id_artikel = $_GET['id'];
    
            // perintah query untuk menghapus data pada tabel obat
            $query = mysqli_query($mysqli, "DELETE FROM artikel WHERE id_artikel='$id_artikel'")
                                            or die('Ada kesalahan pada query delete : '.mysqli_error($mysqli));

            // cek hasil query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil delete data
                header("location: ../../main.php?module=artikel&alert=3");
            }
        }
    }       
}       
?>