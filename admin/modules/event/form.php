
 <?php  
// fungsi untuk pengecekan tampilan form
// jika form add data yang dipilih
if ($_GET['form']=='add') { ?> 
  <!-- tampilan form add data -->
	<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Input Data event 
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=event"> Data event </a></li>
      <li class="active"> Tambah </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/event/proses.php?act=insert" method="POST" enctype="multipart/form-data">
            <div class="box-body">
              <?php  
              // fungsi untuk membuat id transaksi
              $query_id = mysqli_query($mysqli, "SELECT RIGHT(id_event,6) as kode FROM event
                                                ORDER BY id_event DESC LIMIT 1")
                                                or die('Ada kesalahan pada query tampil id_event : '.mysqli_error($mysqli));

              $count = mysqli_num_rows($query_id);

              if ($count <> 0) {
                  // mengambil data kode_event
                  $data_id = mysqli_fetch_assoc($query_id);
                  $kode    = $data_id['kode']+1;
              } else {
                  $kode = 1;
              }

              // buat kode_event
              $buat_id   = str_pad($kode, 4, "0", STR_PAD_LEFT);
              $id_event = "EVNT-$buat_id";
              ?>

              <div class="form-group">
                <label class="col-sm-2 control-label">ID event</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="id_event" value="<?php echo $id_event; ?>" readonly required>
                </div>
              </div>


              <div class="form-group">
                <label class="col-sm-2 control-label">Tanggal event mulai</label>
                <div class="col-sm-5">
                  <input type="date" class="form-control" name="tgl_mulai" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Tanggal event selesai</label>
                <div class="col-sm-5">
                  <input type="date" class="form-control" name="tgl_selesai" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nama event</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nama" autocomplete="off" required>
                </div>
              </div>

               <div class="form-group">
                <label class="col-sm-2 control-label">Keterangan event</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="keterangan" autocomplete="off" required>
                </div>
              </div>

               <div class="form-group">
                <label class="col-sm-2 control-label">Status Event</label>
                <div class="col-sm-5">
                  <select class="form-control" name="status" required>
                    <option value="Selesai">Selesai</option>
                    <option value="Coming Soon">Coming Soon</option>
                  </select>
                </div>
              </div>
             


            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=event" class="btn btn-default btn-reset">Batal</a>
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
      // fungsi query untuk menampilkan data dari tabel event
      $query = mysqli_query($mysqli, "SELECT * FROM event WHERE id_event='$_GET[id]'") 
                                      or die('Ada kesalahan pada query tampil Data event : '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
    }
?>
  <!-- tampilan form edit data -->
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Ubah event
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=event"> event </a></li>
      <li class="active"> Ubah </li>
    </ol>
  </section>

  <!-- Main content -->

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/event/proses.php?act=update" method="POST" enctype="multipart/form-data">
            <div class="box-body">
             
              <div class="form-group">
                <label class="col-sm-2 control-label">Id event</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="id_event" value="<?php echo $data['id_event']; ?>" readonly required>
                </div>
              </div>

             <div class="form-group">
                <label class="col-sm-2 control-label">Tanggal event</label>
                <div class="col-sm-5">
                  <input type="date" class="form-control" name="tgl_event" value="<?php date('Y-m-d') ?>" autocomplete="off" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Judul event</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="judul" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Asal event</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="asal_event" autocomplete="off" required>
                </div>
              </div>

               <div class="form-group">
                <label class="col-sm-2 control-label">Tujuan event</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="tujuan_event" autocomplete="off" required>
                </div>
              </div>

               <div class="form-group">
                <label class="col-sm-2 control-label">Isi event</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="isi_event" autocomplete="off" required>
                </div>
              </div>

               <div class="form-group">
                <label class="col-sm-2 control-label">Keterangan event</label>
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
                  <a href="?module=event" class="btn btn-default btn-reset">Batal</a>
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