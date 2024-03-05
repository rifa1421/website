<?php
    session_start();
    if(!isset($_SESSION['userid'])){
    echo "<script>
    alert('Anda belum Login');
    location.href='index.php';
    </script>";
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
  
                <div class="card-body"> <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasLabel"></h5>
    <a href="admin/home.php" type="button" class="btn-close"></a>
  </div>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card mt-4">
                
                <div class="card-body">
                    <form action="config/a_tambah_komentar.php" method="post">
        <?php
            include "config/koneksi.php";
            $fotoid=$_GET['fotoid'];
            $sql=mysqli_query($koneksi,"select * from foto where fotoid='$fotoid'");
            while($data=mysqli_fetch_array($sql)){
        ?>
        <input type="text" name="fotoid" value="<?=$data['fotoid']?>" hidden>
                
                <td>
                    <img src="img/<?=$data['lokasifile']?>" width="270px"></td>
            </tr>
            <tr>
                <td><input type="text" name="isikomentar"></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit" class="btn btn-primary" name="Tambah">Komentar</button></td>
            </tr>
        </table>
        <?php
            }
        ?>
    </form>
                </div>
            </div>
        </div>

        <div class="col-md-1">
           
                    <table class="table">
                        <thead>
           
        </tr>
        <?php
            include "config/koneksi.php";
            $userid=$_SESSION['userid'];
            $fotoid=$_GET['fotoid'];
            $sql=mysqli_query($koneksi,"SELECT * FROM komentarfoto INNER JOIN user ON komentarfoto.userid=user.userid WHERE komentarfoto.fotoid='$fotoid'");
            while($row=mysqli_fetch_array($sql)){
        ?>
            <tr>
                <td><?=$row['komentarid']?></td>
                <td><?=$row['namalengkap']?></td>
                <td><?=$row['isikomenatar']?></td>
                <td><?=$row['tanggalkomentar']?></td>
                  <td>
            <a href="hapus_komentar.php?komentarid=<?=$row['komentarid']?>"><i class="fa-solid fa-trash"></i>h</a>
            <a href="update_komentar.php?komentarid=<?=$row['komentarid']?>"><i class="fa-solid fa-pen-to-square"></i>e</a>
        </td>
            </tr>
        <?php
            }
        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

    <footer class="d-flex justify-content-center border-top mt-3 bg-light fixed-bottom">
    <p>&copy; UKK RPL 2024 | Rifa Mustopa A</p>
</footer>


<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>
</html>