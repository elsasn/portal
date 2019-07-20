<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
  <i class="fa fa-folder-o icon-title"></i> Data Request
  <!-- <a class="btn btn-primary btn-social pull-right" href="?module=form_request&form=add" title="Tambah Data" data-toggle="tooltip">
    <i class="fa fa-plus"></i> Tambah
  </a> -->
  </h1>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <?php
      // fungsi untuk menampilkan pesan
      // jika alert = "" (kosong)
      // tampilkan pesan "" (kosong)
      if (empty($_GET['alert'])) {
      echo "";
      }
      // jika alert = 1
      // tampilkan pesan Sukses "Data request baru berhasil disimpan"
      elseif ($_GET['alert'] == 1) {
      echo "<div class='alert alert-success alert-dismissable'>
        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
        <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
        Data request baru berhasil disimpan.
      </div>";
      }
      // jika alert = 2
      // tampilkan pesan Sukses "Data request berhasil diubah"
      elseif ($_GET['alert'] == 2) {
      echo "<div class='alert alert-success alert-dismissable'>
        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
        <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
        Data request berhasil diubah.
      </div>";
      }
      // jika alert = 3
      // tampilkan pesan Sukses "Data request berhasil dihapus"
      elseif ($_GET['alert'] == 3) {
      echo "<div class='alert alert-success alert-dismissable'>
        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
        <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
        Data request berhasil dihapus.
      </div>";
      }
      ?>
      <div class="box box-primary">
        <div class="box-body">
          <!-- tampilan tabel request -->
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
            <!-- tampilan tabel header -->
            <thead>
              <tr>
                <th class="center">No.</th>
                <th class="center">Kode Request</th>
                <th class="center">Nama</th>
                <th class="center">NIRN</th>
                <th class="center">Foto 1</th>
                <th class="center">Foto 2</th>
                <th class="center">Foto 3</th>
                <th class="center">E - Mail</th>
                <th class="center">Alamat</th>
                <th class="center">No. Telepon</th>
                <th class="center">Action</th>
                
              </tr>
            </thead>
            <!-- tampilan tabel body -->
            <tbody>
              <?php
              $no = 1;
              // fungsi query untuk menampilkan data dari tabel request
              $query = mysqli_query($mysqli, "SELECT * FROM daftar ORDER BY id_daftar DESC")
              or die('Ada kesalahan pada query tampil Data request: '.mysqli_error($mysqli));
              // tampilkan data
              while ($data = mysqli_fetch_assoc($query)) {
              //   $harga_beli = format_rupiah($data['harga_beli']);
              //   $harga_jual = format_rupiah($data['harga_jual']);
              // menampilkan isi tabel dari database ke tabel di aplikasi
              echo "<tr>
                <td width='50' class='center'>$no</td>
                <td width='150' class='center'>$data[id_daftar]</td>
                <td width='150' class='center'>$data[nama]</td>
                <td width='150' class='center'>$data[nirn]</td>
                <td width='150' class='center'>$data[foto1]</td>
                <td width='150' class='center'>$data[foto2]</td>
                <td width='150' class='center'>$data[foto3]</td>
                <td width='150' class='center'>$data[email]</td>
                <td width='150' class='center'>$data[alamat]</td>
                <td width='150' class='center'>$data[no_hp]</td>
                <td class='center' width='100'>
                  <div>
                    <a data-toggle='tooltip' data-placement='top' title='Ubah' style='margin-right:5px' class='btn btn-primary btn-sm' href='?module=form_request&form=edit&id=$data[id_daftar]'>
                      <i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                    </a>";
                    ?>
                    <a data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-sm" href="modules/request/proses.php?act=delete&id=<?php echo $data['id_daftar'];?>" onclick="return confirm('Anda yakin ingin menghapus request <?php echo $data['nama_request']; ?> ?');">
                      <i style="color:#fff" class="glyphicon glyphicon-trash"></i>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Aktivasi" class="btn btn-primary btn-sm" href="modules/request/proses.php?act=aktivasi&id=<?php echo $data['id_daftar'];?>" onclick="return confirm('Anda yakin ingin menghapus request <?php echo $data['nama_request']; ?> ?');">
                      <i style="color:#fff" class="glyphicon glyphicon-trash"></i>
                    </a>
                    <?php
                  echo "    </div>
                </td>
              </tr>";
              $no++;
              }
              ?>
            </tbody>
          </table>
          </div><!-- /.box-body -->
          </div><!-- /.box -->
          </div><!--/.col -->
          </div>   <!-- /.row -->
        </section><!-- /.content