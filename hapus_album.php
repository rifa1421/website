<?php
include "config/koneksi.php";

$albumid=$_GET['albumid'];

$sql=mysqli_query($koneksi, "delete from album where albumid='$albumid'");

if ($sql) {
	echo "<script>
alert ('Hapus berhasil');
location.href='admin/album.php';
</script>";
}
?>