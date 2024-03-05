 <?php
session_start();
if(!isset($_SESSION['userid'])){
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Galeri Foto</title>
    <link rel="stylesheet" type="text/css" href="aset/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/5b8a86cc74.js" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <i class="bi bi-arrow-left" ></i>
  <div class="container">
    <a class="navbar-brand"><h2>Website Gallery</h2></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
</nav>   

   
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-4">
      <div class="card">
        <div class="card-body bg-light">
          
            <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasLabel">Tambah</h5>
    <a href="admin/foto.php" type="button" class="btn-close"></a>
  </div>
    <form action="config/aksi_foto.php" method="post" enctype="multipart/form-data">
<table align="">
    <label class="form-label">Judul</label>
                        <input type="text"  name="judulfoto" class="form-control"required>
                        <label class="form-label">Deskripsi</label>
                        <textarea class="form-control" name="deskripsifoto"required></textarea>
     <td>LokasiFile</td>
        <td><input type="file" name="lokasifile"></td>
</tr>
<tr>
        <td>Album</td>
        <td>
            <select name="albumid">
            <?php
include "config/koneksi.php";
$userid=$_SESSION['userid'];
$sql=mysqli_query($koneksi, "select * from album where userid='$userid'");
while ($data=mysqli_fetch_array($sql)) {
            ?>
            <option value="<?=$data['albumid']?>"><?=$data['namaalbum']?></option>
            <?php
}
?>
            </select>
        </td>
</tr>
<tr>
        <td></td>
        <td></td>
    </tr>
             
</table>
 <div class="modal-footer">
        
        <button type="submit" class="btn btn
</form>
-primary" name="Tambah">Tambah</button>
      </div>
            </div>
                </div>
            </div>
        </div></div></div></body></html>