
 <?php  
// fungsi untuk pengecekan tampilan form
// jika form add data yang dipilih
if ($_GET['form']=='add') { ?> 
  <!-- tampilan form add data -->
	<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Input Data Pengurus
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=pengurus"> Data Pengurus </a></li>
      <li class="active"> Tambah </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/pengurus/proses.php?act=insert" method="POST">
            <div class="box-body">
              <?php  
              // fungsi untuk membuat id transaksi
              $query_id = mysqli_query($mysqli, "SELECT RIGHT(id_pengurus,6) as kode FROM pengurus
                                                ORDER BY id_pengurus DESC LIMIT 1")
                                                or die('Ada kesalahan pada query tampil id_pengurus : '.mysqli_error($mysqli));

              $count = mysqli_num_rows($query_id);

              if ($count <> 0) {
                  // mengambil data kode_pengurus
                  $data_id = mysqli_fetch_assoc($query_id);
                  $kode    = $data_id['kode']+1;
              } else {
                  $kode = 1;
              }

              // buat kode_pengurus
              $buat_id   = str_pad($kode, 6, "0", STR_PAD_LEFT);
              $id_pengurus = "PNGRS-$buat_id";
              ?>

              <div class="form-group">
                <label class="col-sm-2 control-label">ID Pengurus</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="id_pengurus" value="<?php echo $id_pengurus; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nama pengurus</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nama_pengurus" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Alamat Pengurus</label>
                <div class="col-sm-5">
                  <textarea type="text" class="form-control" name="alamat" autocomplete="off" required></textarea> 
                </div>
              </div>

               <div class="form-group">
                <label class="col-sm-2 control-label">E-mail pengurus</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="email" autocomplete="off" required>
                </div>
              </div>

               <div class="form-group">
                <label class="col-sm-2 control-label">No. Telepon pengurus</label>
                <div class="col-sm-5">
                  <input type="number" class="form-control" name="no_telp" autocomplete="off" required>
                </div>
              </div>


             


            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=pengurus" class="btn btn-default btn-reset">Batal</a>
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
      // fungsi query untuk menampilkan data dari tabel pengurus
      $query = mysqli_query($mysqli, "SELECT * FROM pengurus WHERE id_pengurus='$_GET[id]'") 
                                      or die('Ada kesalahan pada query tampil Data pengurus : '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
    }
?>
  <!-- tampilan form edit data -->
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Ubah pengurus
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=pengurus"> pengurus </a></li>
      <li class="active"> Ubah </li>
    </ol>
  </section>

  <!-- Main content -->

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/pengurus/proses.php?act=update" method="POST">
            <div class="box-body">
             
              <div class="form-group">
                <label class="col-sm-2 control-label">ID pengurus</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="id_pengurus" value="<?php echo $data['id_pengurus']; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nama pengurus</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nama_pengurus" autocomplete="off" value="<?php echo $data['nama_pengurus']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Alamat Pengurus</label>
                <div class="col-sm-5">
                  <textarea type="text" class="form-control" name="alamat" autocomplete="off" value="<?php echo $data['alamat']; ?>" required></textarea> 
                </div>
              </div>

               <div class="form-group">
                <label class="col-sm-2 control-label">E-mail pengurus</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="email" autocomplete="off" value="<?php echo $data['email']; ?>" required>
                </div>
              </div>

               <div class="form-group">
                <label class="col-sm-2 control-label">No. Telepon pengurus</label>
                <div class="col-sm-5">
                  <input type="number" class="form-control" name="no_telp" autocomplete="off" value="<?php echo $data['no_telp']; ?>" required>
                </div>
              </div>

              
            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=pengurus" class="btn btn-default btn-reset">Batal</a>
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