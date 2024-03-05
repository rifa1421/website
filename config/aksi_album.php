<?<?php
include "koneksi.php";
session_start();

$namaalbum=$_POST['namaalbum'];
$deskripsi=$_POST['deskripsi'];
$tanggaldibuat=date("Y-m-d");
$userid=$_SESSION['userid'];

$sql=mysqli_query($koneksi,"insert into album values('','$namaalbum','$deskripsi','$tanggaldibuat','$userid')");
header("location:../admin/album.php");

if (isset($_POST['edit'])) {
	# code...

$namaalbum=$_POST['namaalbum'];
$deskripsi=$_POST['deskripsi'];
$tanggaldibuat=date("Y-m-d");
$userid=$_SESSION['userid'];

$sql=mysqli_query($koneksi,"UPDATE album SET namaalbum='$namaalbum',deskripsi='$deskripsi',tanggal='$tanggal'WHERE albumid='albumid'");
	echo "<script>
	alert('Data berhasil diperbaharui');
	location.href='../admin/album.php';

	</script>";
}?>