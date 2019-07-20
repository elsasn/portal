
 <?php  
// fungsi untuk pengecekan tampilan form
// jika form add data yang dipilih
if ($_GET['form']=='add') { ?> 
  <!-- tampilan form add data -->
	<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Input video
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=video"> video </a></li>
      <li class="active"> Tambah </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/video/proses.php?act=insert" method="POST" enctype="multipart/form-data">
            <div class="box-body">
              <?php  
              // fungsi untuk membuat id transaksi
              $query_id = mysqli_query($mysqli, "SELECT RIGHT(id_video,6) as kode FROM video
                                                ORDER BY id_video DESC LIMIT 1")
                                                or die('Ada kesalahan pada query tampil id_video : '.mysqli_error($mysqli));

              $count = mysqli_num_rows($query_id);

              if ($count <> 0) {
                  // mengambil data kode_video
                  $data_id = mysqli_fetch_assoc($query_id);
                  $kode    = $data_id['kode']+1;
              } else {
                  $kode = 1;
              }

              // buat kode_video
              $buat_id   = str_pad($kode, 4, "0", STR_PAD_LEFT);
              $id_video = "VIDEO-$buat_id";
              ?>

              <div class="form-group">
                <label class="col-sm-2 control-label">ID video</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="id_video" value="<?php echo $id_video; ?>" readonly required>
                </div>
              </div>


              <div class="form-group">
                <label class="col-sm-2 control-label">Judul video</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="judul_video" autocomplete="off" required>
                </div>
              </div>


              <div class="form-group">
                <label class="col-sm-2 control-label">Video</label>
                <div class="col-sm-5">
                  <input type="file" name="video">
                  <br/>
                <!-- <?php  
                if ($data['foto']=="") { ?>
                  <img style="border:1px solid #eaeaea;border-radius:5px;" src="images/user/user-default.png" width="128">
                <?php
                }
                else { ?>
                  <img style="border:1px solid #eaeaea;border-radius:5px;" src="images/user/<?php echo $data['foto']; ?>" width="128">
                <?php
                }
                ?> -->
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Keterangan video</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="keterangan" autocomplete="off" required>
                </div>
              </div>
             


            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=video" class="btn btn-default btn-reset">Batal</a>
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
      // fungsi query untuk menampilkan data dari tabel video
      $query = mysqli_query($mysqli, "SELECT * FROM video WHERE id_video='$_GET[id]'") 
                                      or die('Ada kesalahan pada query tampil Data video : '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
    }
?>
  <!-- tampilan form edit data -->
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Ubah video
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=video"> video </a></li>
      <li class="active"> Ubah </li>
    </ol>
  </section>

  <!-- Main content -->

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/video/proses.php?act=update" method="POST" enctype="multipart/form-data">
            <div class="box-body">
             
              <div class="form-group">
                <label class="col-sm-2 control-label">Id video</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="id_video" value="<?php echo $data['id_video']; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Judul video</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="judul_video" autocomplete="off" required>
                </div>
              </div>


              <div class="form-group">
                <label class="col-sm-2 control-label">Video</label>
                <div class="col-sm-5">
                  <input type="file" name="video">
                  <br/>
                <!-- <?php  
                if ($data['foto']=="") { ?>
                  <img style="border:1px solid #eaeaea;border-radius:5px;" src="images/user/user-default.png" width="128">
                <?php
                }
                else { ?>
                  <img style="border:1px solid #eaeaea;border-radius:5px;" src="images/user/<?php echo $data['foto']; ?>" width="128">
                <?php
                }
                ?> -->
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Keterangan video</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="keterangan" autocomplete="off" required>
                </div>
              </div>

              
            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=video" class="btn btn-default btn-reset">Batal</a>
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