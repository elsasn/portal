<?php
// fungsi pengecekan level untuk menampilkan menu sesuai dengan hak akses
// jika hak akses = Super Admin, tampilkan menu
if ($_SESSION['hak_akses']=='Super Admin') { ?>
<!-- sidebar menu start -->
<ul class="sidebar-menu">
  <li class="header">MAIN MENU</li>
  <?php
  // fungsi untuk pengecekan menu aktif
  // jika menu beranda dipilih, menu beranda aktif
  if ($_GET["module"]=="beranda") { ?>
  <li class="active">
    <a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a>
  </li>
  <?php
  }
  // jika tidak, menu home tidak aktif
  else { ?>
  <li>
    <a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a>
  </li>
  <?php
  }
  // jika menu data obat dipilih, menu data obat aktif
  if ($_GET["module"]=="master_data") { ?>
  <li class="active treeview">
    <a href="javascript:void(0);">
      <i class="fa fa-file-text"></i> <span>Master Data</span> <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="?module=artikel"><i class="fa fa-circle-o"></i> Data Artikel </a></li>
      <li><a href="?module=pengurus"><i class="fa fa-circle-o"></i> Data Pengurus </a></li>
      <li><a href="?module=video"><i class="fa fa-circle-o"></i> Video </a></li>
      <li><a href="?module=motto"><i class="fa fa-circle-o"></i> Moto Komunitas </a></li>
      <li><a href="?module=testimoni"><i class="fa fa-circle-o"></i> Data Testimoni </a></li>
      <li><a href="?module=request"><i class="fa fa-circle-o"></i> Data Request Anggota Baru</a></li>
    </ul>
  </li>
  <?php
  }
  // jika menu Laporan  Masuk dipilih, menu Laporan  Masuk aktif
  elseif ($_GET["module"]=="lap") { ?>
  <li class="active treeview">
    <a href="javascript:void(0);">
      <i class="fa fa-file-text"></i> <span>Master Data</span> <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="?module=artikel"><i class="fa fa-circle-o"></i> Data Artikel </a></li>
      <li><a href="?module=pengurus"><i class="fa fa-circle-o"></i> Data Pengurus</a></li>
      <li><a href="?module=video"><i class="fa fa-circle-o"></i> Video </a></li>
      <li><a href="?module=motto"><i class="fa fa-circle-o"></i> Moto Komunitas </a></li>
      <li><a href="?module=testimoni"><i class="fa fa-circle-o"></i> Data Testimoni</a></li>
      <li><a href="?module=request"><i class="fa fa-circle-o"></i> Data Request Anggota Baru</a></li>
    </ul>
  </li>
  <?php
  }
  // jika menu Laporan tidak dipilih, menu Laporan tidak aktif
  else { ?>
  <li class="treeview">
    <a href="javascript:void(0);">
      <i class="fa fa-file-text"></i> <span>Master Data</span> <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="?module=artikel"><i class="fa fa-circle-o"></i> Artikel </a></li>
      <li><a href="?module=pengurus"><i class="fa fa-circle-o"></i> Data Pengurus</a></li>
      <li><a href="?module=video"><i class="fa fa-circle-o"></i> Video </a></li>
      <li><a href="?module=motto"><i class="fa fa-circle-o"></i> Moto Komunitas </a></li>
      <li><a href="?module=testimoni"><i class="fa fa-circle-o"></i> Data Testimoni  </a></li>
      <li><a href="?module=request"><i class="fa fa-circle-o"></i> Data Request Anggota Baru</a></li>
    </ul>
  </li>
  <?php
  }
  // jika menu Laporan Stok obat dipilih, menu Laporan Stok obat aktif
  if ($_GET["module"]=="lap_stok") { ?>
  <li class="active treeview">
    <a href="javascript:void(0);">
      <i class="fa fa-file-text"></i> <span>Kesekretariatan</span> <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="?module=surat"><i class="fa fa-circle-o"></i> Surat - Menyurat </a></li>
      
      
    </ul>
  </li>
  <?php
  }
  // jika menu Laporan obat Masuk dipilih, menu Laporan obat Masuk aktif
  elseif ($_GET["module"]=="lap_obat_masuk") { ?>
  <li class="active treeview">
    <a href="javascript:void(0);">
      <i class="fa fa-file-text"></i> <span>Kesekretariatan</span> <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="?module=surat"><i class="fa fa-circle-o"></i> Surat - Menyurat </a></li>
      
    </ul>
  </li>
  <?php
  }
  // jika menu Laporan tidak dipilih, menu Laporan tidak aktif
  else { ?>
  <li class="treeview">
    <a href="javascript:void(0);">
      <i class="fa fa-file-text"></i> <span>Kesekretariatan</span> <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="?module=surat"><i class="fa fa-circle-o"></i> Surat - Menyurat </a></li>
      
    </ul>
  </li>
  <?php
  }
  // jika menu Laporan surat dipilih, menu Laporan surat aktif
  if ($_GET["module"]=="lap") { ?>
  <li class="active treeview">
    <a href="javascript:void(0);">
      <i class="fa fa-finance"></i> <span>Finance</span> <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="?module=kasin"><i class="fa fa-circle-o"></i> Kas Masuk </a></li>
      <li><a href="?module=kasout"><i class="fa fa-circle-o"></i> Kas Keluar </a></li>
     
    </ul>
  </li>
  <?php
  }
  // jika menu Laporan obat Masuk dipilih, menu Laporan obat Masuk aktif
  elseif ($_GET["module"]=="lap") { ?>
  <li class="active treeview">
    <a href="javascript:void(0);">
      <i class="fa fa-file-text"></i> <span>Finance</span> <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="?module=kasin"><i class="fa fa-circle-o"></i> Kas Masuk </a></li>
      <li><a href="?module=kasout"><i class="fa fa-circle-o"></i> Kas Keluar </a></li>
     
    </ul>
  </li>
  <?php
  }
  // jika menu Laporan tidak dipilih, menu Laporan tidak aktif
  else { ?>
  <li class="treeview">
    <a href="javascript:void(0);">
      <i class="fa fa-file-text"></i> <span>Finance</span> <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="?module=kasin"><i class="fa fa-circle-o"></i> Kas Masuk </a></li>
      <li><a href="?module=kasout"><i class="fa fa-circle-o"></i> Kas Keluar </a></li>
     
      
    </ul>
  </li>
  <?php
  }
  // jika menu user dipilih, menu user aktif
  if ($_GET["module"]=="user" || $_GET["module"]=="form_user") { ?>
  <li class="active">
    <a href="?module=user"><i class="fa fa-user"></i> Manajemen User</a>
  </li>
  <?php
  }
  // jika tidak, menu user tidak aktif
  else { ?>
  <li>
    <a href="?module=user"><i class="fa fa-user"></i> Manajemen User</a>
  </li>
  <?php
  }
  // jika menu ubah password dipilih, menu ubah password aktif
  if ($_GET["module"]=="password") { ?>
  <li class="active">
    <a href="?module=password"><i class="fa fa-lock"></i> Ubah Password</a>
  </li>
  <?php
  }
  // jika tidak, menu ubah password tidak aktif
  else { ?>
  <li>
    <a href="?module=password"><i class="fa fa-lock"></i> Ubah Password</a>
  </li>
  <?php
  }
  ?>
</ul>
<!--sidebar menu end-->
<?php
}
// jika hak akses = Manajer, tampilkan menu
elseif ($_SESSION['hak_akses']=='Sekretaris') { ?>
<!-- sidebar menu start -->
<ul class="sidebar-menu">
  <li class="header">MAIN MENU</li>
  <?php
  // fungsi untuk pengecekan menu aktif
  // jika menu beranda dipilih, menu beranda aktif
  if ($_GET["module"]=="beranda") { ?>
  <li class="active">
    <a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a>
  </li>
  <?php
  }
  // jika tidak, menu beranda tidak aktif
  else { ?>
  <li>
    <a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a>
  </li>
  <?php
  }
  
  if ($_GET["module"]=="lap") { ?>
  <li class="active treeview">
    <a href="javascript:void(0);">
      <i class="fa fa-file-text"></i> <span>Transaksi</span> <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="?module=surat"><i class="fa fa-circle-o"></i> Surat - Menyurat </a></li>
      </ul>
  </li>
  <?php
  }
  
  elseif ($_GET["module"]=="lap") { ?>
  <li class="active treeview">
    <a href="javascript:void(0);">
      <i class="fa fa-file-text"></i> <span>Transaksi</span> <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="?module=surat"><i class="fa fa-circle-o"></i> Surat - Menyurat </a></li>
      </ul>
  </li>
  <?php
  }
  // jika menu Laporan tidak dipilih, menu Laporan tidak aktif
  else { ?>
  <li class="active treeview">
    <a href="javascript:void(0);">
      <i class="fa fa-file-text"></i> <span>Kesekretariatan</span> <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="?module=surat"><i class="fa fa-circle-o"></i> Surat - Menyurat </a></li>
      </ul>
  </li>
  <?php
  }
  // jika menu ubah password dipilih, menu ubah password aktif
  if ($_GET["module"]=="password") { ?>
  <li class="active">
    <a href="?module=password"><i class="fa fa-lock"></i> Ubah Password</a>
  </li>
  <?php
  }
  // jika tidak, menu ubah password tidak aktif
  else { ?>
  <li>
    <a href="?module=password"><i class="fa fa-lock"></i> Ubah Password</a>
  </li>
  <?php
  }
  ?>
</ul>
<!--sidebar menu end-->
<?php
}
// jika hak akses = Gudang, tampilkan menu
if ($_SESSION['hak_akses']=='Finance') { ?>
<!-- sidebar menu start -->
<ul class="sidebar-menu">
  <li class="header">MAIN MENU</li>
  <?php
  // fungsi untuk pengecekan menu aktif
  // jika menu beranda dipilih, menu beranda aktif
  if ($_GET["module"]=="beranda") { ?>
  <li class="active">
    <a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a>
  </li>
  <?php
  }
  // jika tidak, menu beranda tidak aktif
  else { ?>
  <li>
    <a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a>
  </li>
  <?php
  }
  // fungsi untuk pengecekan menu aktif
  // jika menu beranda dipilih, menu beranda aktif
  if ($_GET["module"]=="lap_stok") { ?>
  <li class="active treeview">
    <a href="javascript:void(0);">
      <i class="fa fa-file-text"></i> <span>Finance</span> <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="?module=kasin"><i class="fa fa-circle-o"></i> Kas Masuk </a></li>
      <li class="active"><a href="?module=pembayaran"><i class="fa fa-circle-o"></i> Kas Keluar </a></li>
      
    </ul>
  </li>
  <?php
  }
  // jika menu Laporan obat Masuk dipilih, menu Laporan obat Masuk aktif
  elseif ($_GET["module"]=="lap_obat_masuk") { ?>
  <li class="active treeview">
    <a href="javascript:void(0);">
      <i class="fa fa-file-text"></i> <span>Finance</span> <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="?module=kasin"><i class="fa fa-circle-o"></i> Kas Masuk </a></li>
      <li class="active"><a href="?module=pembayaran"><i class="fa fa-circle-o"></i> Kas Keluar </a></li>
      </ul>
  </li>
  <?php
  }
  // jika menu Laporan tidak dipilih, menu Laporan tidak aktif
  else { ?>
  <li class="treeview">
    <a href="javascript:void(0);">
      <i class="fa fa-file-text"></i> <span>Finance</span> <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="?module=kasin"><i class="fa fa-circle-o"></i> Kas Masuk </a></li>
      <li class="active"><a href="?module=pembayaran"><i class="fa fa-circle-o"></i> Kas Keluar </a></li>
      
    </ul>
  </li>
  <?php
  }
  // jika menu ubah password dipilih, menu ubah password aktif
  if ($_GET["module"]=="password") { ?>
  <li class="active">
    <a href="?module=password"><i class="fa fa-lock"></i> Ubah Password</a>
  </li>
  <?php
  }
  // jika tidak, menu ubah password tidak aktif
  else { ?>
  <li>
    <a href="?module=password"><i class="fa fa-lock"></i> Ubah Password</a>
  </li>
  <?php
  }
  ?>
</ul>
<!--sidebar menu end-->
<?php
}
if ($_SESSION['hak_akses']=='Office') { ?>
<!-- sidebar menu start -->
<ul class="sidebar-menu">
  <li class="header">MAIN MENU</li>
  <?php
  // fungsi untuk pengecekan menu aktif
  // jika menu beranda dipilih, menu beranda aktif
  if ($_GET["module"]=="beranda") { ?>
  <li class="active">
    <a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a>
  </li>
  <?php
  }
  // jika tidak, menu beranda tidak aktif
  else { ?>
  <li>
    <a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a>
  </li>
  <?php
  }


  // fungsi untuk pengecekan menu aktif
  // jika menu beranda dipilih, menu beranda aktif
  if ($_GET["module"]=="lap_stok") { ?>
  <li class="active treeview">
    <a href="javascript:void(0);">
      <i class="fa fa-file-text"></i> <span>Master Data</span> <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="?module=pengurus"><i class="fa fa-circle-o"></i> Data Pengurus </a></li>
      
    </ul>
  </li>
  <?php
  }
  // jika menu Laporan obat Masuk dipilih, menu Laporan obat Masuk aktif
  elseif ($_GET["module"]=="lap_obat_masuk") { ?>
  <li class="active treeview">
    <a href="javascript:void(0);">
      <i class="fa fa-file-text"></i> <span>Master Data</span> <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="?module=pengurus"><i class="fa fa-circle-o"></i> Data Pengurus </a></li>
      
    </ul>
  </li>
  <?php
  }
  // jika menu Laporan tidak dipilih, menu Laporan tidak aktif
  else { ?>
  <li class="active treeview">
    <a href="javascript:void(0);">
      <i class="fa fa-file-text"></i> <span>Master Data</span> <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="?module=pengurus"><i class="fa fa-circle-o"></i> Data Pengurus </a></li>
      
    </ul>
  </li>
  <?php
  }

// jika menu Laporan Stok obat dipilih, menu Laporan Stok obat aktif
  if ($_GET["module"]=="lap_stok") { ?>
  <li class="active treeview">
    <a href="javascript:void(0);">
      <i class="fa fa-file-text"></i> <span>Kesekretariatan</span> <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="?module=surat"><i class="fa fa-circle-o"></i> Surat - Menyurat </a></li>
      
      
    </ul>
  </li>
  <?php
  }
  // jika menu Laporan obat Masuk dipilih, menu Laporan obat Masuk aktif
  elseif ($_GET["module"]=="lap_obat_masuk") { ?>
  <li class="active treeview">
    <a href="javascript:void(0);">
      <i class="fa fa-file-text"></i> <span>Kesekretariatan</span> <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="?module=surat"><i class="fa fa-circle-o"></i> Surat - Menyurat </a></li>
      
    </ul>
  </li>
  <?php
  }
  // jika menu Laporan tidak dipilih, menu Laporan tidak aktif
  else { ?>
  <li class="treeview">
    <a href="javascript:void(0);">
      <i class="fa fa-file-text"></i> <span>Kesekretariatan</span> <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="?module=surat"><i class="fa fa-circle-o"></i> Surat - Menyurat </a></li>
      
    </ul>
  </li>
  <?php
  }


  // jika menu Laporan surat dipilih, menu Laporan surat aktif
  if ($_GET["module"]=="lap") { ?>
  <li class="active treeview">
    <a href="javascript:void(0);">
      <i class="fa fa-file-text"></i> <span>Finance</span> <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="?module=kasin"><i class="fa fa-circle-o"></i> Kas Masuk </a></li>
      <li><a href="?module=lap-pembayaran"><i class="fa fa-circle-o"></i> Kas Keluar </a></li>
     
    </ul>
  </li>
  <?php
  }
  // jika menu Laporan obat Masuk dipilih, menu Laporan obat Masuk aktif
  elseif ($_GET["module"]=="lap") { ?>
  <li class="active treeview">
    <a href="javascript:void(0);">
      <i class="fa fa-file-text"></i> <span>Finance</span> <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="?module=kasin"><i class="fa fa-circle-o"></i> Kas Masuk </a></li>
      <li><a href="?module=lap-pembayaran"><i class="fa fa-circle-o"></i> Kas Keluar </a></li>
     
    </ul>
  </li>
  <?php
  }
  // jika menu Laporan tidak dipilih, menu Laporan tidak aktif
  else { ?>
  <li class="treeview">
    <a href="javascript:void(0);">
      <i class="fa fa-file-text"></i> <span>Finance</span> <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="?module=kasin"><i class="fa fa-circle-o"></i> Kas Masuk </a></li>
      <li><a href="?module=lap-pembayaran"><i class="fa fa-circle-o"></i> Kas Keluar </a></li>
     
      
    </ul>
  </li>
  <?php
  }


  // jika menu ubah password dipilih, menu ubah password aktif
  if ($_GET["module"]=="password") { ?>
  <li class="active">
    <a href="?module=password"><i class="fa fa-lock"></i> Ubah Password</a>
  </li>
  <?php
  }
  // jika tidak, menu ubah password tidak aktif
  else { ?>
  <li>
    <a href="?module=password"><i class="fa fa-lock"></i> Ubah Password</a>
  </li>
  <?php
  }
  ?>
</ul>
<!--sidebar menu end-->
<?php
}
?>
?>