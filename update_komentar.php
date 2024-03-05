<?php
include "config/koneksi.php";

$komentarid=$_POST['komentarid'];
$isikomentar=$_POST['komentarid'];

$sql=mysqli_query($komentar, "update komentarfoto set isikomentar='$isikomentar' where komentarid='$komentarid'");
header("location:'admin/#.php'");
?>