<?php
include 'header.php';
include 'koneksi.php';
$query = mysqli_query($mysqli, "SELECT * FROM company WHERE STATUS='Aktif' ORDER BY id_company DESC")
or die('Ada kesalahan pada query tampil Data motto: '.mysqli_error($mysqli));
//$data = mysqli_fetch_assoc($query);
//print_r($data);die();
?>
<section class="ftco-counter img ftco-section ftco-no-pt ftco-no-pb" id="section-counter" data-section="about">
	<div class="container">
		<div class="row d-flex">
			<div class="col-md-6 col-lg-4 d-flex">
				<div class="img d-flex align-self-stretch align-items-center" style="background-color: #0000">
					<div class="request-quote py-5">
						<div class="py-2">
							<span class="subheading">Form Pendaftaran Anggota</span>
							<h3>Send Request</h3>
						</div>
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
						<form action="modules/pengurus/proses.php?act=insert" class="request-form ftco-animate">
							<div class="form-group">
								<input type="text" class="form-control" name="id_pengurus" value="<?php echo $id_pengurus; ?>" readonly required>
								
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="nama_pengurus" autocomplete="off" placeholder="Nama Anda" required>
							</div>
							<div class="form-group">
								<textarea type="text" class="form-control" name="alamat" autocomplete="off" placeholder="Alamat" required></textarea>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="email" autocomplete="off" placeholder="E-Mail"
								required>
							</div>
							<div class="form-group">
								<input type="number" class="form-control" name="no_telp" placeholder="No Telepon" autocomplete="off" required>
							</div>
							<input type="submit" class="btn btn-primary btn-submit" name="Daftar" value="Simpan">
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-8 pl-lg-5 py-5">
				<div class="row justify-content-start pb-3">
					<?php
					//print_r($data);die();
					while ($data = mysqli_fetch_assoc($query)) {
					?>
					<div class="col-md-12 heading-section ftco-animate">
						<span class="subheading"><?php echo $data['nama_company']; ?></span>
					<h2 class="mb-4"><?php echo $data['keterangan']; ?></p>
				</div>
				<?php }  ?>
			</div>
		</div>
	</div>
</div>
</div>