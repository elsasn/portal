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
            $id_surat  = mysqli_real_escape_string($mysqli, trim($_POST['id_surat']));
            $tgl_surat  = mysqli_real_escape_string($mysqli, trim($_POST['tgl_surat']));
            $judul  = mysqli_real_escape_string($mysqli, trim($_POST['judul']));
            $asal_surat  = mysqli_real_escape_string($mysqli, trim($_POST['asal_surat']));
            $tujuan_surat  = mysqli_real_escape_string($mysqli, trim($_POST['tujuan_surat']));
            $isi_surat  = mysqli_real_escape_string($mysqli, trim($_POST['isi_surat']));
            $keterangan  = mysqli_real_escape_string($mysqli, trim($_POST['keterangan']));
            $file = $_FILES['file']['name'];
            $tmp = $_FILES['file']['tmp_name'];
  
            // Rename nama filenya dengan menambahkan tanggal dan jam upload
            $filebaru = date('dmYHis').$file;
            // Set path folder tempat menyimpan filenya
            $path = "../../surat/".$filebaru;
            
            //$created_user = $_SESSION['id_user'];
            if(move_uploaded_file($tmp, $path)){
            
            
            //$created_user = $_SESSION['id_user'];

            // perintah query untuk menyimpan data ke tabel obat
            //print_r($query);
            $query = mysqli_query($mysqli, "INSERT INTO surat(id_surat,tgl_surat,judul,asal_surat,tujuan_surat,isi_surat,keterangan,file)
                VALUES ('$id_surat','$tgl_surat','$judul','$asal_surat','$tujuan_surat','$isi_surat','$keterangan','$filebaru')")
                or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));    

            // cek query

            if ($query) {
                // jika berhasil tampilkan pesan berhasil simpan data
                header("location: ../../main.php?module=surat&alert=1");
                }
            }   
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['simpan'])) {
            if (isset($_POST['id_surat'])) {
                // ambil data hasil submit dari form
            $id_surat  = mysqli_real_escape_string($mysqli, trim($_POST['id_surat']));
            $tgl_surat  = mysqli_real_escape_string($mysqli, trim($_POST['tgl_surat']));
            $judul  = mysqli_real_escape_string($mysqli, trim($_POST['judul']));
            $asal_surat  = mysqli_real_escape_string($mysqli, trim($_POST['asal_surat']));
            $tujuan_surat  = mysqli_real_escape_string($mysqli, trim($_POST['tujuan_surat']));
            $isi_surat  = mysqli_real_escape_string($mysqli, trim($_POST['isi_surat']));
            $keterangan  = mysqli_real_escape_string($mysqli, trim($_POST['keterangan']));
            $file = $_FILES['file']['name'];
            $tmp = $_FILES['file']['tmp_name'];
  
            // Rename nama filenya dengan menambahkan tanggal dan jam upload
            $filebaru = date('dmYHis').$file;
            // Set path folder tempat menyimpan filenya
            $path = "../../surat/".$filebaru;
            
            //$created_user = $_SESSION['id_user'];
            if(move_uploaded_file($tmp, $path)){
            
           
                //$updated_user = $_SESSION['id_user'];

                // perintah query untuk mengubah data pada tabel 
                $query = mysqli_query($mysqli, "UPDATE surat SET  id_surat   = '$id_surat',
                                                                    tgl_surat       = '$tgl_surat',
                                                                    judul       = '$judul',
                                                                    asal_surat       = '$asal_surat',
                                                                    tujuan_surat       = '$tujuan_surat',
                                                                    isi_surat       = '$isi_surat',
                                                                    keterangan       = '$keterangan',
                                                                    file       = '$filebaru'
                                                              WHERE id_surat       = '$id_surat'")
                                                or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                // cek query
                if ($query) {
                    // jika berhasil tampilkan pesan berhasil update data
                    header("location: ../../main.php?module=surat&alert=2");
                    }
                }         
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $id_surat = $_GET['id'];
    
            // perintah query untuk menghapus data pada tabel obat
            $query = mysqli_query($mysqli, "DELETE FROM surat WHERE id_surat='$id_surat'")
                                            or die('Ada kesalahan pada query delete : '.mysqli_error($mysqli));

            // cek hasil query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil delete data
                header("location: ../../main.php?module=surat&alert=3");
            }
        }
    }       
}       
?>