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
            $id_daftar  = mysqli_real_escape_string($mysqli, trim($_POST['id_daftar']));
            $nama  = mysqli_real_escape_string($mysqli, trim($_POST['nama']));
            $nirn  = mysqli_real_escape_string($mysqli, trim($_POST['nirn']));
            $alamat  = mysqli_real_escape_string($mysqli, trim($_POST['alamat']));
            $email  = mysqli_real_escape_string($mysqli, trim($_POST['email']));
            $no_hp  = mysqli_real_escape_string($mysqli, trim($_POST['no_hp']));
            $foto1 = $_FILES['foto1']['name'];
            $tmp = $_FILES['foto1']['tmp_name'];
  
            // Rename nama fotonya dengan menambahkan tanggal dan jam upload
            $fotobaru1 = date('dmYHis').$foto1;
            // Set path folder tempat menyimpan fotonya
            $path = "../../images/".$fotobaru1;

            $foto1 = $_FILES['foto1']['name'];
            $tmp = $_FILES['foto1']['tmp_name'];
  
            // Rename nama fotonya dengan menambahkan tanggal dan jam upload
            $fotobaru2 = date('dmYHis').$foto2;
            // Set path folder tempat menyimpan fotonya
            $path = "../../images/".$fotobaru2;

            $foto2 = $_FILES['foto2']['name'];
            $tmp = $_FILES['foto2']['tmp_name'];
  
            // Rename nama fotonya dengan menambahkan tanggal dan jam upload
            $fotobaru3 = date('dmYHis').$foto3;
            // Set path folder tempat menyimpan fotonya
            $path = "../../images/".$fotobaru3;
            
            //$created_user = $_SESSION['id_user'];
            if(move_uploaded_file($tmp, $path)){
            // perintah query untuk menyimpan data ke tabel obat
            //print_r($query);
            $query = mysqli_query($mysqli, "INSERT INTO request(id_daftar,nama,nirn,foto1,foto2,foto3,email,alamat,no_hp)
                VALUES ('$id_daftar','$nama','$nirn','$fotobaru1','$fotobaru2','$fotobaru3','$email','$alamat','$no_hp')")
                or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));    

            // cek query

            if ($query) {
                // jika berhasil tampilkan pesan berhasil simpan data
                header("location: ../../main.php?module=request&alert=1");
            }
        }   
    }   
}
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['simpan'])) {
            if (isset($_POST['id_daftar'])) {
                // ambil data hasil submit dari form
            $id_daftar  = mysqli_real_escape_string($mysqli, trim($_POST['id_daftar']));
            $nama  = mysqli_real_escape_string($mysqli, trim($_POST['nama']));
            $nirn  = mysqli_real_escape_string($mysqli, trim($_POST['nirn']));
            $alamat  = mysqli_real_escape_string($mysqli, trim($_POST['alamat']));
            $email  = mysqli_real_escape_string($mysqli, trim($_POST['email']));
            $no_hp  = mysqli_real_escape_string($mysqli, trim($_POST['no_hp']));
            $foto1 = $_FILES['foto1']['name'];
            $tmp = $_FILES['foto1']['tmp_name'];
  
            // Rename nama fotonya dengan menambahkan tanggal dan jam upload
            $fotobaru1 = date('dmYHis').$foto1;
            // Set path folder tempat menyimpan fotonya
            $path = "../../images/".$fotobaru1;

            // Rename nama fotonya dengan menambahkan tanggal dan jam upload
            $fotobaru2 = date('dmYHis').$foto2;
            // Set path folder tempat menyimpan fotonya
            $path = "../../images/".$fotobaru2;

            $foto2 = $_FILES['foto2']['name'];
            $tmp = $_FILES['foto2']['tmp_name'];
  
            // Rename nama fotonya dengan menambahkan tanggal dan jam upload
            $fotobaru3 = date('dmYHis').$foto3;
            // Set path folder tempat menyimpan fotonya
            $path = "../../images/".$fotobaru3;
           
                //$updated_user = $_SESSION['id_user'];
                 if(move_uploaded_file($tmp, $path)){
                // perintah query untuk mengubah data pada tabel 
            //print_r($_POST);die;
                $query = mysqli_query($mysqli, "UPDATE request SET  id_daftar   = '$id_daftar',
                                                                nama       = '$nama',
                                                            nirn             = '$nirn',
                                                                    foto1                = '$fotobaru1',
                                                                    foto2                = '$fotobaru2',
                                                                    foto3                = '$fotobaru3',
                                                                    email                = '$email',
                                                                    alamat                = '$alamat',
                                                                    no_hp                = '$no_hp'
                                                                    
                                                              WHERE id_daftar       = '$id_daftar'")
                                                or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                // cek query
                if ($query) {
                    // jika berhasil tampilkan pesan berhasil update data
                    header("location: ../../main.php?module=request&alert=2");
                    }         
                }
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $id_daftar = $_GET['id'];
    
            // perintah query untuk menghapus data pada tabel obat
            $query = mysqli_query($mysqli, "DELETE FROM request WHERE id_daftar='$id_daftar'")
                                            or die('Ada kesalahan pada query delete : '.mysqli_error($mysqli));

            // cek hasil query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil delete data
                header("location: ../../main.php?module=request&alert=3");
            }
        }
    }

    elseif ($_GET['act']=='aktivasi') {
        if (isset($_GET['id'])) {
            $id_daftar = $_GET['id'];
    
            // perintah query untuk menghapus data pada tabel obat
            $query = mysqli_query($mysqli, "DELETE FROM request WHERE id_daftar='$id_daftar'")
                                            or die('Ada kesalahan pada query delete : '.mysqli_error($mysqli));

            // cek hasil query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil delete data
                header("location: ../../main.php?module=request&alert=3");
            }
        }
    }       
}       
?>