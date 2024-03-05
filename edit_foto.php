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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
     <script src="https://kit.fontawesome.com/5b8a86cc74.js" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="index.php"><h2>Website Gallery</h2></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
</nav>  
   
    

                </div>
            </div>
        </div>
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-4">
      <div class="card">
        <div class="card-body bg-light">
          
            <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasLabel">Ubah Foto</h5>
    <a href="admin/foto.php" type="button" class="btn-close"></a>
  </div>
<div class="card-body">
    <form action="aksi_foto.php" method="post" >        <?php
            include "config/koneksi.php";
            $fotoid=$_GET['fotoid'];
            $sql=mysqli_query($koneksi,"select * from foto where fotoid='$fotoid'");
            while($data=mysqli_fetch_array($sql)){
        ?>
        <input type="text" name="fotoid" value="<?=$data['fotoid']?>" hidden>
        <table cellpadding="">
                <label class="form-label">Judul</label>
                        <input type="text"  name="judulfoto" value="<?=$data['judulfoto']?>"class="form-control"required>
                        <label class="form-label">Deskripsi</label>
                        <textarea type="text" name="deskripsifoto" value="<?=$data2['deskripsifoto']?>"class="form-control"required>
        </textarea>
                <td>LokasiFile</td>
                <td><input type="file" name="lokasifile"></td>
            </tr>
            <tr>
                <td>Album</td>
                <td>
                    <select name="albumid">
                    <?php
                        $userid=$_SESSION['userid'];
                        $sql2=mysqli_query($koneksi,"select * from album where userid='$userid'");
                        while($data2=mysqli_fetch_array($sql2)){
                    ?>
                            <option value="<?=$data2['albumid']?>" <?php if($data2['albumid']==$data['albumid']){echo 'selected';}?>><?=$data2['namaalbum']?></option>
                    <?php
                        }
                    ?>
                    </select>
                    
                </td>
            </tr>
        </table><div class="d-grid mt-2">
              
              <div class="modal-footer">
        
        <button class="btn btn-primary" type="submit" name="kirim">Ubah</button>
      </div>
            </div>
        <?php
            }
        ?>
    </form>

    
</body>
</html>