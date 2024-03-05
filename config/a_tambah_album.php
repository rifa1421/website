<?php
include "koneksi.php";
session_start();

$namaalbum=$_POST['namaalbum'];
$deskripsi=$_POST['deskripsi'];
$tanggaldibuat=date("Y-m-d");
$userid=$_SESSION['userid'];

$sql=mysqli_query($koneksi,"insert into album values('','$namaalbum','$deskripsi','$tanggaldibuat','$namalengkap','$userid')");

header("location:album.php");
?>