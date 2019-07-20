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
            $id_video  = mysqli_real_escape_string($mysqli, trim($_POST['id_video']));
            $judul_video  = mysqli_real_escape_string($mysqli, trim($_POST['judul_video']));
            $keterangan  = mysqli_real_escape_string($mysqli, trim($_POST['keterangan']));
            
            $video = $_FILES['video']['name'];
            $tmp = $_FILES['video']['tmp_name'];
  
            // Rename nama filenya dengan menambahkan tanggal dan jam upload
            $videobaru = date('dmYHis').$video;
            // Set path folder tempat menyimpan filenya
            $path = "../../video/".$videobaru;
            
            //$created_user = $_SESSION['id_user'];
            if((($type == "video/mp4") || ($type == "video/3gpp")) && ($size < 8000000 )){
                (move_uploaded_file($tmp, $path));
                $pesan="Upload file video $videobaru berhasil diupload";
            // }
            // else{
            //     $pesan="File Video Terlalu Besar Atau Format Video Salah!";
            // }
            //$created_user = $_SESSION['id_user'];

            // perintah query untuk menyimpan data ke tabel obat
            //print_r($query);
            $query = mysqli_query($mysqli, "INSERT INTO video(id_video,judul_video,video,keterangan)
                VALUES ('$id_video','$judul_video','$videobaru','$keterangan')")
                or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));    

            // cek query

            if ($query) {
                // jika berhasil tampilkan pesan berhasil simpan data
                header("location: ../../main.php?module=video&alert=1");
                }
            }   
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['simpan'])) {
            if (isset($_POST['id_video'])) {
                // ambil data hasil submit dari form
            $id_video  = mysqli_real_escape_string($mysqli, trim($_POST['id_video']));
            $judul_video  = mysqli_real_escape_string($mysqli, trim($_POST['judul_video']));
            $keterangan  = mysqli_real_escape_string($mysqli, trim($_POST['keterangan']));
            
            $video = $_FILES['video']['name'];
            $tmp = $_FILES['video']['tmp_name'];
  
            // Rename nama filenya dengan menambahkan tanggal dan jam upload
            $videobaru = date('dmYHis').$video;
            // Set path folder tempat menyimpan filenya
            $path = "../../video/".$videobaru;
            
            //$created_user = $_SESSION['id_user'];
            if(move_uploaded_file($tmp, $path)){
           
                //$updated_user = $_SESSION['id_user'];

                // perintah query untuk mengubah data pada tabel 
                $query = mysqli_query($mysqli, "UPDATE video SET  id_video   = '$id_video',
                                                                    judul_video       = '$judul_video',
                                                                    keterangan = '$keterangan',
                                                                    video = '$videobaru'
                                                              WHERE id_video       = '$id_video'")
                                                or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                // cek query
                if ($query) {
                    // jika berhasil tampilkan pesan berhasil update data
                    header("location: ../../main.php?module=video&alert=2");
                    }
                }         
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $id_video = $_GET['id'];
    
            // perintah query untuk menghapus data pada tabel obat
            $query = mysqli_query($mysqli, "DELETE FROM video WHERE id_video='$id_video'")
                                            or die('Ada kesalahan pada query delete : '.mysqli_error($mysqli));

            // cek hasil query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil delete data
                header("location: ../../main.php?module=video&alert=3");
            }
        }
    }       
}       
?>