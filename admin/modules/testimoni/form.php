
 <?php  
// fungsi untuk pengecekan tampilan form
// jika form add data yang dipilih
if ($_GET['form']=='add') { ?> 
  <!-- tampilan form add data -->
	<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Input Testimoni
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=testimoni"> Testimoni </a></li>
      <li class="active"> Tambah </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/testimoni/proses.php?act=insert" method="POST" enctype="multipart/form-data">
            <div class="box-body">
              <?php  
              // fungsi untuk membuat id transaksi
              $query_id = mysqli_query($mysqli, "SELECT RIGHT(id_testimoni,6) as kode FROM testimoni
                                                ORDER BY id_testimoni DESC LIMIT 1")
                                                or die('Ada kesalahan pada query tampil id_testimoni : '.mysqli_error($mysqli));

              $count = mysqli_num_rows($query_id);

              if ($count <> 0) {
                  // mengambil data kode_testimoni
                  $data_id = mysqli_fetch_assoc($query_id);
                  $kode    = $data_id['kode']+1;
              } else {
                  $kode = 1;
              }

              // buat kode_testimoni
              $buat_id   = str_pad($kode, 4, "0", STR_PAD_LEFT);
              $id_testimoni = "TEST-$buat_id";
              ?>

              <div class="form-group">
                <label class="col-sm-2 control-label">ID testimoni</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="id_testimoni" value="<?php echo $id_testimoni; ?>" readonly required>
                </div>
              </div>


              <div class="form-group">
                <label class="col-sm-2 control-label">Judul testimoni</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="judul_testimoni" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Isi testimoni</label>
                <div class="col-sm-5">
                  <textarea type="text" class="form-control" name="isi_testimoni" autocomplete="off" required></textarea> 
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Gambar</label>
                <div class="col-sm-5">
                  <input type="file" name="foto" id="foto">
                  <br/>
               
                </div>
              </div>


            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=testimoni" class="btn btn-default btn-reset">Batal</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
<?php
}
// jika form edit data yang dipilih
// isset : cek data ada / tidak
elseif ($_GET['form']=='edit') { 
  if (isset($_GET['id'])) {
      // fungsi query untuk menampilkan data dari tabel testimoni
      $query = mysqli_query($mysqli, "SELECT * FROM testimoni WHERE id_testimoni='$_GET[id]'") 
                                      or die('Ada kesalahan pada query tampil Data testimoni : '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
    }
?>
  <!-- tampilan form edit data -->
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Ubah testimoni
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=testimoni"> testimoni </a></li>
      <li class="active"> Ubah </li>
    </ol>
  </section>

  <!-- Main content -->

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/testimoni/proses.php?act=update" method="POST" enctype="multipart/form-data">
            <div class="box-body">
             
              <div class="form-group">
                <label class="col-sm-2 control-label">ID testimoni</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="id_testimoni" value="<?php echo $data['id_testimoni']; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Judul testimoni</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="judul_testimoni" autocomplete="off" value="<?php echo $data['judul_testimoni']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Isi testimoni</label>
                <div class="col-sm-5">
                  <textarea type="text" class="form-control" name="isi_testimoni" autocomplete="off" value="<?php echo $data['isi_testimoni']; ?>" required></textarea> 
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Gambar</label>
                <div class="col-sm-5">
                  <input type="file" name="foto">
                  <br/>
               <!--  <?php  
                if ($data['gambar']=="") { ?>
                  <img style="border:1px solid #eaeaea;border-radius:5px;" src="images/user/user-default.png" width="128">
                <?php
                }
                else { ?>
                  <img style="border:1px solid #eaeaea;border-radius:5px;" src="images/user/<?php echo $data['gambar']; ?>" width="128">
                <?php
                }
                ?> -->
                </div>
              </div>


            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=testimoni" class="btn btn-default btn-reset">Batal</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
<?php
}
?>