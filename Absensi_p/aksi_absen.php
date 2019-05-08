<?php 
session_start();
include 'conn/koneksi.php';
$kode= $_POST['nip'];

$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM karyawan WHERE nip = $kode"));


$idkar = $data['id_karyawan'];
// kasi alert
$query = "SELECT tanggal_absen
FROM absensi 
where keterangan='Hadir'
AND id_karyawan = $idkar
ORDER BY tanggal_absen DESC";
$ket = mysqli_fetch_assoc(mysqli_query($koneksi, $query))['tanggal_absen'];
$tanggal = explode('-', $ket);
$tanggal = mktime(0,0,0, $tanggal[1], $tanggal[2], $tanggal[0]);
$now = time();

if (($tanggal+259200) < $now) {
	$_SESSION['ket'] = $data['nama'] . ", Anda sudah tidak datang lebih dari 3 hari, Harap Hubungi HRD..!!";
}
date_default_timezone_set("Asia/Jakarta");
$date = date ('Y-m-d');
$jam = date ('H:i:s');


$q = "SELECT * FROM absensi WHERE id_karyawan = $idkar AND tanggal_absen = '$date'";
$q = mysqli_query($koneksi, $q);
if (mysqli_num_rows($q) > 0) {
	echo "<script>alert('Anda Sudah Absen Hari Ini')</script>";
	echo "<script>location='index.php';</script>";
	exit;
}

$q = "INSERT INTO absensi VALUES(NULL,$idkar,'$date','$jam','Hadir',NULL)";
$q = mysqli_query($koneksi, $q);


if ($q) {
	

	echo "<script>alert('Kamu Berhasil Absen Di jam $jam')</script>";
	echo "<script>location='index.php';</script>";
} else {
	echo "<script>alert('Data Gagal Disimpan')</script>";
	echo "<script>location='index.php';</script>";
}			
?>