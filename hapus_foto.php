
<?php
include "config/koneksi.php";

$fotoid=$_GET['fotoid'];

$sql=mysqli_query($koneksi, "delete from foto where fotoid='$fotoid'");

 echo "<script>
        alert('Hapus berhasil');
        location.href='admin/foto.php';
        </script>";
?>