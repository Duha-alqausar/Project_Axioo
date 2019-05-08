<?php 
include 'conn/koneksi.php';


$id_absensi = $_GET['id_absensi'];
$data = mysqli_query($koneksi, "SELECT * FROM absensi WHERE id_absensi='$id_absensi'");
$r = mysqli_fetch_array($data);
date_default_timezone_set("Asia/Jakarta");
$jam = date ('H:i:s');

$query = mysqli_query($koneksi, "UPDATE absensi SET jam_keluar='$jam' WHERE id_absensi='$id_absensi'");

if ($query) {
	

	echo "<script>alert('Kamu Berhasil absen keluar di jam $jam, Hati-hati di jalan ya.. :)')</script>";
	echo "<script>location='index.php';</script>";
} else {
	echo "<script>alert('Gagal')</script>";
	echo "<script>location='index.php';</script>";
}			
?>