
 <?php  
// fungsi untuk pengecekan tampilan form
// jika form add data yang dipilih
if ($_GET['form']=='add') { ?> 
  <!-- tampilan form add data -->
	<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Input Data Surat 
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=surat"> Data Surat </a></li>
      <li class="active"> Tambah </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/surat/proses.php?act=insert" method="POST" enctype="multipart/form-data">
            <div class="box-body">
              <?php  
              // fungsi untuk membuat id transaksi
              $query_id = mysqli_query($mysqli, "SELECT RIGHT(id_surat,6) as kode FROM surat
                                                ORDER BY id_surat DESC LIMIT 1")
                                                or die('Ada kesalahan pada query tampil id_surat : '.mysqli_error($mysqli));

              $count = mysqli_num_rows($query_id);

              if ($count <> 0) {
                  // mengambil data kode_surat
                  $data_id = mysqli_fetch_assoc($query_id);
                  $kode    = $data_id['kode']+1;
              } else {
                  $kode = 1;
              }

              // buat kode_surat
              $buat_id   = str_pad($kode, 6, "0", STR_PAD_LEFT);
              $id_surat = "SRT-ORG-$buat_id";
              ?>

              <div class="form-group">
                <label class="col-sm-2 control-label">ID surat</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="id_surat" value="<?php echo $id_surat; ?>" readonly required>
                </div>
              </div>


              <div class="form-group">
                <label class="col-sm-2 control-label">Tanggal surat</label>
                <div class="col-sm-5">
                  <input type="date" class="form-control" name="tgl_surat" value="<?php date('Y-m-d') ?>" autocomplete="off" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Judul surat</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="judul" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Asal surat</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="asal_surat" autocomplete="off" required>
                </div>
              </div>

               <div class="form-group">
                <label class="col-sm-2 control-label">Tujuan surat</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="tujuan_surat" autocomplete="off" required>
                </div>
              </div>

               <div class="form-group">
                <label class="col-sm-2 control-label">Isi surat</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="isi_surat" autocomplete="off" required>
                </div>
              </div>

               <div class="form-group">
                <label class="col-sm-2 control-label">Keterangan surat</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="keterangan" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Foto</label>
                <div class="col-sm-5">
                  <input type="file" name="file">
                  <br/>
               
                </div>
              </div>

             


            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=surat" class="btn btn-default btn-reset">Batal</a>
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
      // fungsi query untuk menampilkan data dari tabel surat
      $query = mysqli_query($mysqli, "SELECT * FROM surat WHERE id_surat='$_GET[id]'") 
                                      or die('Ada kesalahan pada query tampil Data surat : '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
    }
?>
  <!-- tampilan form edit data -->
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Ubah surat
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=surat"> surat </a></li>
      <li class="active"> Ubah </li>
    </ol>
  </section>

  <!-- Main content -->

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/surat/proses.php?act=update" method="POST" enctype="multipart/form-data">
            <div class="box-body">
             
              <div class="form-group">
                <label class="col-sm-2 control-label">Id surat</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="id_surat" value="<?php echo $data['id_surat']; ?>" readonly required>
                </div>
              </div>

             <div class="form-group">
                <label class="col-sm-2 control-label">Tanggal surat</label>
                <div class="col-sm-5">
                  <input type="date" class="form-control" name="tgl_surat" value="<?php date('Y-m-d') ?>" autocomplete="off" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Judul surat</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="judul" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Asal surat</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="asal_surat" autocomplete="off" required>
                </div>
              </div>

               <div class="form-group">
                <label class="col-sm-2 control-label">Tujuan surat</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="tujuan_surat" autocomplete="off" required>
                </div>
              </div>

               <div class="form-group">
                <label class="col-sm-2 control-label">Isi surat</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="isi_surat" autocomplete="off" required>
                </div>
              </div>

               <div class="form-group">
                <label class="col-sm-2 control-label">Keterangan surat</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="keterangan" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Foto</label>
                <div class="col-sm-5">
                  <input type="file" name="file">
                  <br/>
               
                </div>
              </div>


              
            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=surat" class="btn btn-default btn-reset">Batal</a>
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