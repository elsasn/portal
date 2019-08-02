
 <?php  
// fungsi untuk pengecekan tampilan form
// jika form add data yang dipilih
if ($_GET['form']=='add') { ?> 
  <!-- tampilan form add data -->
	<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Input Data Detail Company 
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=company"> Data Detail Company </a></li>
      <li class="active"> Tambah </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/company/proses.php?act=insert" method="POST" enctype="multipart/form-data">
            <div class="box-body">
              <?php  
              // fungsi untuk membuat id transaksi
              $query_id = mysqli_query($mysqli, "SELECT RIGHT(id_company,6) as kode FROM company
                                                ORDER BY id_company DESC LIMIT 1")
                                                or die('Ada kesalahan pada query tampil id_company : '.mysqli_error($mysqli));

              $count = mysqli_num_rows($query_id);

              if ($count <> 0) {
                  // mengambil data kode_company
                  $data_id = mysqli_fetch_assoc($query_id);
                  $kode    = $data_id['kode']+1;
              } else {
                  $kode = 1;
              }

              // buat kode_company
              $buat_id   = str_pad($kode, 4, "0", STR_PAD_LEFT);
              $id_company = "COMPRO-$buat_id";
              ?>

              <div class="form-group">
                <label class="col-sm-2 control-label">ID Company</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="id_company" value="<?php echo $id_company; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nama Company</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nama_company" autocomplete="off" required>
                </div>
              </div>

               <div class="form-group">
                <label class="col-sm-2 control-label">Keterangan company</label>
                <div class="col-sm-5">
                  <textarea type="text" class="form-control" name="keterangan" autocomplete="off" required></textarea>
                </div>
              </div>

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=company" class="btn btn-default btn-reset">Batal</a>
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
      // fungsi query untuk menampilkan data dari tabel company
      $query = mysqli_query($mysqli, "SELECT * FROM company WHERE id_company='$_GET[id]'") 
                                      or die('Ada kesalahan pada query tampil Data company : '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
    }
?>
  <!-- tampilan form edit data -->
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Ubah company
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=company"> company </a></li>
      <li class="active"> Ubah </li>
    </ol>
  </section>

  <!-- Main content -->

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/company/proses.php?act=update" method="POST" enctype="multipart/form-data">
            <div class="box-body">
             
              <div class="form-group">
                <label class="col-sm-2 control-label">ID Company</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="id_company" value="<?php echo $id_company; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nama Company</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nama_company" autocomplete="off" required>
                </div>
              </div>

               <div class="form-group">
                <label class="col-sm-2 control-label">Keterangan company</label>
                <div class="col-sm-5">
                  <textarea type="text" class="form-control" name="keterangan" autocomplete="off" required></textarea>
                </div>
              </div>

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=company" class="btn btn-default btn-reset">Batal</a>
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