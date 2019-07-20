
 <?php  
// fungsi untuk pengecekan tampilan form
// jika form add data yang dipilih
if ($_GET['form']=='add') { ?> 
  <!-- tampilan form add data -->
	<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Input Kategori Artikel
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=kategori"> Kategori Artikel </a></li>
      <li class="active"> Tambah </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/kategori/proses.php?act=insert" method="POST">
            <div class="box-body">
              <?php  
              // fungsi untuk membuat id transaksi
              $query_id = mysqli_query($mysqli, "SELECT RIGHT(id_kategori,6) as kode FROM kategori
                                                ORDER BY id_kategori DESC LIMIT 1")
                                                or die('Ada kesalahan pada query tampil id_kategori : '.mysqli_error($mysqli));

              $count = mysqli_num_rows($query_id);

              if ($count <> 0) {
                  // mengambil data kode_kategori
                  $data_id = mysqli_fetch_assoc($query_id);
                  $kode    = $data_id['kode']+1;
              } else {
                  $kode = 1;
              }

              // buat kode_kategori
              $buat_id   = str_pad($kode, 6, "0", STR_PAD_LEFT);
              $id_kategori = "ARTKL-$buat_id";
              ?>

              <div class="form-group">
                <label class="col-sm-2 control-label">ID kategori</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="id_kategori" value="<?php echo $id_kategori; ?>" readonly required>
                </div>
              </div>


              <div class="form-group">
                <label class="col-sm-2 control-label">Nama Kategori</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="judul" autocomplete="off" required>
                </div>
              </div>

             


            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=kategori" class="btn btn-default btn-reset">Batal</a>
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
      // fungsi query untuk menampilkan data dari tabel kategori
      $query = mysqli_query($mysqli, "SELECT * FROM kategori WHERE id_kategori='$_GET[id]'") 
                                      or die('Ada kesalahan pada query tampil Data kategori : '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
    }
?>
  <!-- tampilan form edit data -->
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Ubah kategori
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=kategori"> kategori </a></li>
      <li class="active"> Ubah </li>
    </ol>
  </section>

  <!-- Main content -->

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/kategori/proses.php?act=update" method="POST">
            <div class="box-body">
             
              <div class="form-group">
                <label class="col-sm-2 control-label">Id kategori</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="id_kategori" value="<?php echo $data['id_kategori']; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nama kategori</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nama_kategori" autocomplete="off" value="<?php echo $data['nama_kategori']; ?>" required>
                </div>
              </div>

              
            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=kategori" class="btn btn-default btn-reset">Batal</a>
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