<br><div class="row">
	<div class="container">
<form action='aksi_absen.php' method='POST' >
	<div class="row">
<div class="form-group col-md-10">
            <input type="password" class="form-control" name="nip" id="Kode Unik" placeholder="Masukkan Kode Unik" required oninvalid="this.setCustomValidity('Isi kolom kode unik dengan Benar')" />
        </div>
<div class="form-group col-md-2">
            <input type="submit" class="btn btn-success"/>

        </div></div>
    </form>
    <?php 
    session_start();
    if (isset($_SESSION['ket'])): ?>
    	
		<div class="alert alert-danger" role="alert">
		  <?= $_SESSION['ket']; unset($_SESSION['ket']); ?>
		</div>
    <?php endif ?>
<script type="text/javascript">
  
    <?php date_default_timezone_set('Asia/Jakarta'); ?>

    var serverTime = new Date(<?php print date('Y, m, d, H, i, s, 0'); ?>);
    var clientTime = new Date();
    var Diff = serverTime.getTime() - clientTime.getTime();

    function displayServerTime(){
        var clientTime = new Date();
        var time = new Date(clientTime.getTime() + Diff);
        var sh = time.getHours().toString();
        var sm = time.getMinutes().toString();
        var ss = time.getSeconds().toString();
        document.getElementById("clock").innerHTML = (sh.length==1?"0"+sh:sh) + ":" + (sm.length==1?"0"+sm:sm) + ":" + (ss.length==1?"0"+ss:ss);
    }
</script>
</head>
<body onload="setInterval('displayServerTime()', 1000);">
Waktu Server (Timezone: Asia/Jakarta):<br/>
<span id="clock"><?php print date('H:i:s'); ?></span>
<div class="tabel-responsive">
	
<table class="table table-hover table-striped">
 <thead class="thead-dark">
          <th>No</th>
		<th>Nama</th>
		<th>Tanggal</th>
		<th>Jam Masuk</th>
		<th>Keluar</th>
		<th>Keterangan</th>
		<th>Action</th>

          </tr>
        </thead>
  <tbody>
          <tr>
            <?php 
	$no = 1;
	$query = mysqli_query($koneksi,"SELECT * FROM absensi 
		INNER JOIN karyawan ON absensi.id_karyawan = karyawan.id_karyawan 
		");
	while ($r=mysqli_fetch_array($query)) { ?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $r['nama'] ?></td>
			<td><?php echo $r['tanggal_absen'] ?></td>
			<td><?php echo $r['jam_masuk'] ?></td>
			<td><?php echo $r['jam_keluar'] ?></td>
			<td><?php echo $r['keterangan'] ?>
          	<td>
          		<a href="index.php?p=aksi_keluar&id_absensi=<?php echo $r['id_absensi']?>" class="btn btn-warning">Keluar</a>
          	</td>

			
          </tr>
         
    <?php } ?>
    </tbody>
</table>
</div>
   

</div></div>


 