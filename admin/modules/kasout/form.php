
 <?php  
// fungsi untuk pengecekan tampilan form
// jika form add data yang dipilih
if ($_GET['form']=='add') { ?> 
  <!-- tampilan form add data -->
	<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Input Kas Masuk
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=kasin"> Kas Masuk </a></li>
      <li class="active"> Tambah </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/kasin/proses.php?act=insert" method="POST">
            <div class="box-body">
              <?php  
              // fungsi untuk membuat id_kasin transaksi
              $query_id_kasin = mysqli_query($mysqli, "SELECT RIGHT(id_kasin,6) as kode FROM kasin
                                                ORDER BY id_kasin DESC LIMIT 1")
                                                or die('Ada kesalahan pada query tampil id_kasin_kasin : '.mysqli_error($mysqli));

              $count = mysqli_num_rows($query_id_kasin);

              if ($count <> 0) {
                  // mengambil data kode_kasin
                  $data_id_kasin = mysqli_fetch_assoc($query_id_kasin);
                  $kode    = $data_id_kasin['kode']+1;
              } else {
                  $kode = 1;
              }

              // buat kode_kasin
              $buat_id_kasin   = str_pad($kode, 6, "0", STR_PAD_LEFT);
              $id_kasin_kasin = "REF-$buat_id_kasin";
              ?>

              <div class="form-group">
                <label class="col-sm-2 control-label">Tanggal Transaksi</label>
                <div class="col-sm-5">
                  <input type="date" class="form-control" name="tgl_transaksi" value="<?php echo date('Y-m-d'); ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">No. Referensi Transaksi</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="ref" value="<?php echo $id_kasin_kasin; ?>" readonly required>
                </div>
              </div>


              <div class="form-group">
                <label class="col-sm-2 control-label">Nama Penyetor</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nama_setor" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Keterangan</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="keterangan" autocomplete="off" required>
                </div>
              </div>


              <div class="form-group">
                <label class="col-sm-2 control-label">Nilai</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nilai" autocomplete="off" required>
                </div>
              </div>             


            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=kasin" class="btn btn-default btn-reset">Batal</a>
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
// isset : cek data ada / tid_kasinak
elseif ($_GET['form']=='edit') { 
  if (isset($_GET['id_kasin'])) {
      // fungsi query untuk menampilkan data dari tabel kasin
      $query = mysqli_query($mysqli, "SELECT * FROM kasin WHERE id_kasin_kasin='$_GET[id_kasin]'") 
                                      or die('Ada kesalahan pada query tampil Data kasin : '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
    }
?>
  <!-- tampilan form edit data -->
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Ubah kasin
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=kasin"> kasin </a></li>
      <li class="active"> Ubah </li>
    </ol>
  </section>

  <!-- Main content -->

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/kasin/proses.php?act=update" method="POST">
            <div class="box-body">
             
              <div class="form-group">
                <label class="col-sm-2 control-label">Tanggal Transaksi</label>
                <div class="col-sm-5">
                  <input type="date" class="form-control" name="tgl_transaksi" value="<?php echo date('Y-m-d'); ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">No. Referensi Transaksi</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="ref" value="<?php echo $id_kasin_kasin; ?>" readonly required>
                </div>
              </div>


              <div class="form-group">
                <label class="col-sm-2 control-label">Nama Penyetor</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nama_setor" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Keterangan</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="keterangan" autocomplete="off" required>
                </div>
              </div>


              <div class="form-group">
                <label class="col-sm-2 control-label">Nilai</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nilai" autocomplete="off" required>
                </div>
              </div>

              
            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=kasin" class="btn btn-default btn-reset">Batal</a>
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