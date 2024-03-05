<?php
include "config/koneksi.php";

$komentarid=$_GET['komentarid'];

$sql=mysqli_query($koneksi, "delete from komentarfoto where komentarid='$komentarid'");

 header("location:komentar.php?fotoid=".$fotoid.$userid);
?>
