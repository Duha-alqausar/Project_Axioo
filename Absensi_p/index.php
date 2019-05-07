<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>

<nav class="navbar navbar-dark bg-dark justify-content-center">
  <a class="navbar-brand" href="index.php">
    <h3>ABSENSI PEGAWAI</h3>
  </a>
</nav>

<?php 
include("conn/koneksi.php");

if (@$_GET['p']=='') {
	include_once 'dashboard.php';
	
}

elseif (@$_GET['p']=='dashboard') {
		include_once 'dashboard.php';

	}
elseif (@$_GET['p']=='aksi_keluar') {
		include_once 'aksi_keluar.php';
		
	}

else {
	include_once '404.php';
}

 ?>