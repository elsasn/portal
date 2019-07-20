
 <?php  
// fungsi untuk pengecekan tampilan form
// jika form add data yang dipilih
if ($_GET['form']=='add') { ?> 
  <!-- tampilan form add data -->
	<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Input Data request
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=request"> Data request </a></li>
      <li class="active"> Tambah </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/request/proses.php?act=insert" method="POST">
            <div class="box-body">
              <?php  
              // fungsi untuk membuat id transaksi
              $query_id = mysqli_query($mysqli, "SELECT RIGHT(id_daftar,6) as kode FROM daftar
                                                ORDER BY id_daftar DESC LIMIT 1")
                                                or die('Ada kesalahan pada query tampil id_daftar : '.mysqli_error($mysqli));

              $count = mysqli_num_rows($query_id);

              if ($count <> 0) {
                  // mengambil data kode_request
                  $data_id = mysqli_fetch_assoc($query_id);
                  $kode    = $data_id['kode']+1;
              } else {
                  $kode = 1;
              }

              // buat kode_request
              $buat_id   = str_pad($kode, 4, "0", STR_PAD_LEFT);
              $id_daftar = "DFTR-$buat_id";
              ?>

              <div class="form-group">
                <label class="col-sm-2 control-label">ID request</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="id_daftar" value="<?php echo $id_daftar; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nama</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nama" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">NIRN</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nirn" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Foto 1</label>
                <div class="col-sm-5">
                  <input type="file" name="foto1" id="foto1">
                  <br/>
               
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Foto 2</label>
                <div class="col-sm-5">
                  <input type="file" name="foto2" id="foto2">
                  <br/>
               
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Foto 3</label>
                <div class="col-sm-5">
                  <input type="file" name="foto3" id="foto3">
                  <br/>
               
                </div>
              </div>

               <div class="form-group">
                <label class="col-sm-2 control-label">E-mail</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="email" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Alamat</label>
                <div class="col-sm-5">
                  <textarea type="text" class="form-control" name="alamat" autocomplete="off" required></textarea> 
                </div>
              </div>


               <div class="form-group">
                <label class="col-sm-2 control-label">No. Telepon request</label>
                <div class="col-sm-5">
                  <input type="number" class="form-control" name="no_hp" autocomplete="off" required>
                </div>
              </div>


             


            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=request" class="btn btn-default btn-reset">Batal</a>
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
      // fungsi query untuk menampilkan data dari tabel request
      $query = mysqli_query($mysqli, "SELECT * FROM request WHERE id_daftar='$_GET[id]'") 
                                      or die('Ada kesalahan pada query tampil Data request : '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
    }
?>
  <!-- tampilan form edit data -->
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Ubah request
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=request"> request </a></li>
      <li class="active"> Ubah </li>
    </ol>
  </section>

  <!-- Main content -->

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/request/proses.php?act=update" method="POST">
            <div class="box-body">
             
              <div class="form-group">
                <label class="col-sm-2 control-label">ID request</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="id_daftar" value="<?php echo $data['id_daftar']; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nama</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nama" value="<?php echo $data['nama'] ?>" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">NIRN</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nirn" value="<?php echo $data['nirn'] ?>" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Foto 1</label>
                <div class="col-sm-5">
                  <input type="file" name="foto1" id="foto1">
                  <br/>
               
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Foto 2</label>
                <div class="col-sm-5">
                  <input type="file" name="foto2" id="foto2">
                  <br/>
               
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Foto 3</label>
                <div class="col-sm-5">
                  <input type="file" name="foto3" id="foto3">
                  <br/>
               
                </div>
              </div>

               <div class="form-group">
                <label class="col-sm-2 control-label">E-mail</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="email" value="<?php echo $data['email'] ?>" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Alamat</label>
                <div class="col-sm-5">
                  <textarea type="text" class="form-control" name="alamat" value="<?php echo $data['alamat'] ?>"autocomplete="off" required></textarea> 
                </div>
              </div>


               <div class="form-group">
                <label class="col-sm-2 control-label">No. Telepon request</label>
                <div class="col-sm-5">
                  <input type="number" class="form-control" name="no_hp" value="<?php echo $data['no_hp'] ?>"autocomplete="off" required>
                </div>
              </div>


              
            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=request" class="btn btn-default btn-reset">Batal</a>
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