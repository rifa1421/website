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
  <div class="container">
    <a class="navbar-brand" href="index.php"><h2>Website Gallery</h2></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      
</nav>   
    <div class="container">

<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-4">
      <div class="card">
        <div class="card-body bg-light">
          
            <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasLabel">Edit</h5>
    <a href="admin/album.php" type="button" class="btn-close"></a>
  </div>
            

    <form action="update_album.php" method="post">
        <?php
        include "config/koneksi.php";
        $albumid=$_GET['albumid'];
        $sql=mysqli_query($koneksi, "select * from album where albumid='$albumid'");
        while($data=mysqli_fetch_array($sql)){
?>
<input type="text" name="albumid" value="<?=$data['albumid']?>" hidden>
</table>
                <div class="card-body"> 
    
<table align="">
    <label class="form-label">Nama Album</label>
                        <input type="text"  name="namaalbum" value="<?=$data['namaalbum']?>"class="form-control"required>
                        <label class="form-label">Deskripsi</label>
                        <textarea type="text" name="deskripsi" value="<?=$data['deskripsi']?>"class="form-control" name="deskripsi"required></textarea>
                                                                <div class="d-grid mt-2">
              
              <div class="modal-footer">
        
        <button class="btn btn-primary" type="submit" name="kirim">Ubah</button>
      </div>
            </div>

</table>

</form>
</div>
</div>
</div>

<?php
}
        ?>
        
</body>
</html>