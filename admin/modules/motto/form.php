 <?php  
// fungsi untuk pengecekan tampilan form
// jika form add data yang dipilih
if ($_GET['form']=='add') { ?> 
  <!-- tampilan form add data -->
	<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Input Motto
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=motto"> Motto </a></li>
      <li class="active"> Tambah </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/motto/proses.php?act=insert" method="POST">
            <div class="box-body">
              <?php  
              // fungsi untuk membuat id transaksi
              $query_id = mysqli_query($mysqli, "SELECT RIGHT(id_motto,6) as kode FROM motto
                                                ORDER BY id_motto DESC LIMIT 1")
                                                or die('Ada kesalahan pada query tampil id_motto : '.mysqli_error($mysqli));

              $count = mysqli_num_rows($query_id);

              if ($count <> 0) {
                  // mengambil data kode_motto
                  $data_id = mysqli_fetch_assoc($query_id);
                  $kode    = $data_id['kode']+1;
              } else {
                  $kode = 1;
              }

              // buat kode_motto
              $buat_id   = str_pad($kode, 6, "0", STR_PAD_LEFT);
              $id_motto = "MTT-$buat_id";
              ?>

              <div class="form-group">
                <label class="col-sm-2 control-label">ID Motto Perusahaan</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="id_motto" value="<?php echo $id_motto; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Isi Motto Perusahaan</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="motto" autocomplete="off" required>
                </div>
              </div>

              
              <div class="form-group">
                <label class="col-sm-2 control-label">Keterangan Motto</label>
                <div class="col-sm-5">
                  <textarea type="text" class="form-control" name="keterangan" autocomplete="off" required></textarea> 
                </div>
              </div>


               <div class="form-group">
                <label class="col-sm-2 control-label">Status Motto</label>
                <div class="col-sm-5">
                  <select class="form-control" name="status" required>
                    <option value="Aktif">Aktif</option>
                    <option value="Tidak Aktif">Tidak Aktif</option>
                  </select>
                </div>
              </div>

              

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=motto" class="btn btn-default btn-reset">Batal</a>
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
      // fungsi query untuk menampilkan data dari tabel motto
      $query = mysqli_query($mysqli, "SELECT * FROM motto WHERE id_motto='$_GET[id]'") 
                                      or die('Ada kesalahan pada query tampil Data motto : '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
    }
?>
  <!-- tampilan form edit data -->
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Ubah motto
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=motto"> motto </a></li>
      <li class="active"> Ubah </li>
    </ol>
  </section>

  <!-- Main content -->

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/motto/proses.php?act=update" method="POST">
            <div class="box-body">
             
              <div class="form-group">
                <label class="col-sm-2 control-label">ID Motto</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="id_motto" value="<?php echo $data['id_motto']; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Isi Motto Perusahaan</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="motto" autocomplete="off" value="<?php echo $data['motto']; ?>" required>
                </div>
              </div>


              <div class="form-group">
                <label class="col-sm-2 control-label">Keterangan Motto</label>
                <div class="col-sm-5">
                  <textarea type="text" class="form-control" name="keterangan" autocomplete="off"  value="<?php echo $data['keterangan']; ?>"required></textarea> 
                </div>
              </div>
              

              <div class="form-group">
                <label class="col-sm-2 control-label">Status Motto</label>
                <div class="col-sm-5">
                  <select class="form-control" name="status" required>
                    <option value="Aktif">Aktif</option>
                    <option value="Tidak Aktif">Tidak Aktif</option>
                  </select>
                </div>
              </div>  

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=motto" class="btn btn-default btn-reset">Batal</a>
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