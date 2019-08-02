
<?php
/* panggil file database.php untuk koneksi ke database */
require_once "config/database.php";
/* panggil file fungsi tambahan */
require_once "config/fungsi_tanggal.php";
require_once "config/fungsi_rupiah.php";
// fungsi untuk pengecekan status login user
// jika user belum login, alihkan ke halaman login dan tampilkan message = 1
if (empty($_SESSION['username']) && empty($_SESSION['password'])){
	echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
// jika user sudah login, maka jalankan perintah untuk pemanggilan file halaman konten
else {
	// jika halaman konten yang dipilih beranda, panggil file view beranda
	if ($_GET['module'] == 'beranda') {
		include "modules/beranda/view.php";
	}
	// Master Data
	elseif ($_GET['module'] == 'artikel') {
		include "modules/artikel/view.php";
	}
	// jika halaman konten yang dipilih form user, panggil file form user
	elseif ($_GET['module'] == 'form_artikel') {
		include "modules/artikel/form.php";
	}

	elseif ($_GET['module'] == 'pengurus') {
		include "modules/pengurus/view.php";
	}
	// jika halaman konten yang dipilih form user, panggil file form user
	elseif ($_GET['module'] == 'form_pengurus') {
		include "modules/pengurus/form.php";
	}

	elseif ($_GET['module'] == 'request') {
		include "modules/request/view.php";
	}
	// jika halaman konten yang dipilih form user, panggil file form user
	elseif ($_GET['module'] == 'form_request') {
		include "modules/request/form.php";
	}

	//
	elseif ($_GET['module'] == 'motto') {
		include "modules/motto/view.php";
	}
	// jika halaman konten yang dipilih form user, panggil file form user
	elseif ($_GET['module'] == 'form_motto') {
		include "modules/motto/form.php";
	}
	elseif ($_GET['module'] == 'video') {
		include "modules/video/view.php";
	}
	// jika halaman konten yang dipilih form user, panggil file form user
	elseif ($_GET['module'] == 'form_video') {
		include "modules/video/form.php";
	}
	elseif ($_GET['module'] == 'karyawan') {
		include "modules/karyawan/view.php";
	}
	// jika halaman konten yang dipilih form user, panggil file form user
	elseif ($_GET['module'] == 'form_karyawan') {
		include "modules/karyawan/form.php";
	}

	elseif ($_GET['module'] == 'testimoni') {
		include "modules/testimoni/view.php";
	}
	// jika halaman konten yang dipilih form user, panggil file form user
	elseif ($_GET['module'] == 'form_testimoni') {
		include "modules/testimoni/form.php";
	}

	elseif ($_GET['module'] == 'company') {
		include "modules/company/view.php";
	}
	// jika halaman konten yang dipilih form user, panggil file form user
	elseif ($_GET['module'] == 'form_company') {
		include "modules/company/form.php";
	}

	elseif ($_GET['module'] == 'akun') {
		include "modules/akun/view.php";
	}
	// jika halaman konten yang dipilih form user, panggil file form user
	elseif ($_GET['module'] == 'form_akun') {
		include "modules/akun/form.php";
	}
	
	// -----------------------------------------------------------------------------
	// Transaksi
	// jika halaman konten yang dipilih laporan stok, panggil file view laporan stok
	elseif ($_GET['module'] == 'surat') {
		include "modules/surat/view.php";
	}
	// -----------------------------------------------------------------------------
	// jika halaman konten yang dipilih laporan obat masuk, panggil file view laporan obat masuk
	elseif ($_GET['module'] == 'form_surat') {
		include "modules/surat/form.php";
	}
	// -----------------------------------------------------------------------------
	// jika halaman konten yang dipilih laporan stok, panggil file view laporan stok
	
	// -----------------------------------------------------------------------------
	// jika halaman konten yang dipilih laporan stok, panggil file view laporan stok
	elseif ($_GET['module'] == 'kasin') {
		include "modules/kasin/view.php";
	}
	// -----------------------------------------------------------------------------
	// jika halaman konten yang dipilih laporan obat masuk, panggil file view laporan obat masuk
	elseif ($_GET['module'] == 'form_kasin') {
		include "modules/kasin/form.php";
	}

	elseif ($_GET['module'] == 'kasout') {
		include "modules/kasout/view.php";
	}
	// -----------------------------------------------------------------------------
	// jika halaman konten yang dipilih laporan obat masuk, panggil file view laporan obat masuk
	elseif ($_GET['module'] == 'form_kasout') {
		include "modules/kasout/form.php";
	}
	elseif ($_GET['module'] == 'form_pembatalan2') {
		include "modules/pembatalan/form2.php";
	}

	//-----------------------------------------------------------------

	elseif ($_GET['module'] == 'lap-pembelian') {
		include "modules/lap-pembelian/view.php";
	}
	// -----------------------------------------------------------------------------
	// jika halaman konten yang dipilih laporan obat masuk, panggil file view laporan obat masuk
	elseif ($_GET['module'] == 'form_lap-pembelian') {
		include "modules/lap-pembelian/form.php";
	}

	elseif ($_GET['module'] == 'lap-pembayaran') {
		include "modules/lap-pembayaran/view.php";
	}
	// -----------------------------------------------------------------------------
	// jika halaman konten yang dipilih laporan obat masuk, panggil file view laporan obat masuk
	elseif ($_GET['module'] == 'form_lap-pembayaran') {
		include "modules/pembayaran/form.php";
	}
	elseif ($_GET['module'] == 'lap-pembatalan') {
		include "modules/lap-pembatalan/view.php";
	}
	// -----------------------------------------------------------------------------
	// jika halaman konten yang dipilih laporan obat masuk, panggil file view laporan obat masuk
	elseif ($_GET['module'] == 'form_lap-pembatalan') {
		include "modules/lap-pembatalan/form.php";
	}


	// -----------------------------------------------------------------------------
	// jika halaman konten yang dipilih user, panggil file view user
	elseif ($_GET['module'] == 'user') {
		include "modules/user/view.php";
	}
	// jika halaman konten yang dipilih form user, panggil file form user
	elseif ($_GET['module'] == 'form_user') {
		include "modules/user/form.php";
	}

	elseif ($_GET['module'] == 'event') {
		include "modules/event/view.php";
	}
	// jika halaman konten yang dipilih form user, panggil file form user
	elseif ($_GET['module'] == 'form_event') {
		include "modules/event/form.php";
	}

	// -----------------------------------------------------------------------------
	// jika halaman konten yang dipilih profil, panggil file view profil
	elseif ($_GET['module'] == 'profil') {
		include "modules/profil/view.php";
	}
	// jika halaman konten yang dipilih form profil, panggil file form profil
	elseif ($_GET['module'] == 'form_profil') {
		include "modules/profil/form.php";
	}
	// -----------------------------------------------------------------------------
	
	// jika halaman konten yang dipilih password, panggil file view password
	elseif ($_GET['module'] == 'password') {
		include "modules/password/view.php";
	}
}
?>