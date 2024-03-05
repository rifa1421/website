<?php
session_start();
$userid = $_SESSION['userid'];
include("../config/koneksi.php");
if ($_SESSION['status'] != 'login') {
    echo "<script>
            alert('Anda belum login!'); 
            location.href='../index.php';
        </script>";
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="ut-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Website Galery Foto</title>
    <link rel="stylesheet" type="text/css" href="../aset/css/bootstrap.min.css">
  <script src="https://kit.fontawesome.com/5b8a86cc74.js" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<i class="bi bi-arrow-left" onclick="history.back()"></i>
  <div class="container">
    <a class="navbar-brand"><h2>Website Gallery</h2></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse mt-2" id="navbarNavAltMarkup">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active"aria-current="page"href="home.php"><h5>Home</h5></a>
        </li>
        <li class="nav-item">
          <a class="nav-link "  href="album.php"><h5>Album</h5></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="foto.php"><h5>Foto</h5></a>
        </li>
      </ul>
    </div>
      <div class="navbar-nav me-auto">
      </div>
            <a href="../config/aksi_logout.php" class="btn btn-outline-danger m-1">Logout</a>
      </div>
  </div>
  <div class="modal fade" id="hapus_komentar<?php echo $data['fotoid'] ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
<nav>  

            <a href="../config/aksi_logout.php" class="btn btn-outline-danger m-1">Hapus</a>
      </div>
  </div>
</nav> 
</div></div> 

    <div class="container mt-3">

        <?php
        $album = mysqli_query($koneksi, "SELECT * FROM album where userid='$userid'");
        while ($row = mysqli_fetch_array($album)) { ?>
        <a href="home.php?albumid=<?php echo $row['albumid'] ?>" class="btn btn-outline-primary">
            <?php echo $row['namaalbum'] ?>
        </a>
        <?php } ?>

        <div class="row">

            <?php
            if (isset($_GET['albumid'])) {
                $albumid = $_GET['albumid'];
                $query = mysqli_query($koneksi, "SELECT * FROM foto WHERE userid='$userid' AND albumid='$albumid'");
                while ($data = mysqli_fetch_array($query)) { ?>
            <div class="col-md-3 mt-2">
                <div class=" card">
                    <a href="../img.php?fotoid=<?=$data['fotoid']?>">
                    <img style="height: 12rem;" src="../img/<?php echo $data['lokasifile'] ?>"
                        class="card-img-top" title="<?php echo $data['judulfoto'] ?>">
                    <div class="card-footer text-center">

                        <?php
                                $fotoid = $data['fotoid'];
                                $ceksuka = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid' AND userid='$userid'");
                                if (mysqli_num_rows($ceksuka) == 1) { ?>
                        <a href="../config/proses_like.php?fotoid=<?php echo $data['fotoid'] ?>" type="submit"
                            name="batalsuka"><i class="fa fa-heart"></i></a>
                        <?php } else { ?>
                        <a href="../config/proses_like.php?fotoid=<?php echo $data['fotoid'] ?>" type="submit"
                            name="suka"><i class="fa-regular fa-heart"></i></a>
                        <?php }

                                $like = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid'");
                                echo mysqli_num_rows($like) . ' Suka ';
                                ?>

                        <a href="#" type="button" data-bs-toggle="modal"
                            data-bs-target="#komentar<?php echo $data['fotoid'] ?>"><i
                                class="fa-regular fa-comment"></i></a>
                        <?php
                                $jmlkomen = mysqli_query($koneksi, "SELECT * FROM komentarfoto WHERE fotoid='$fotoid'");
                                echo mysqli_num_rows($jmlkomen) . ' Komentar ';
                                ?>
                    </div>
                </div>
                </a>


                <!-- Modal -->
                <div class="modal fade" id="komentar<?php echo $data['fotoid'] ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-8">

                                        <img src="../img/<?php echo $data['lokasifile'] ?>" class="card-img-top"
                                            title="<?php echo $data['judulfoto'] ?>">
                                    </div>
                                    <div class="class col-md-4">
                                        <div class="class m-2">
                                            <div class="overflow-auto">
                                                <div class="sticky-top">
                                                    <strong><?php echo $data['judulfoto'] ?></strong><br>

                                                    <span
                                                        class="badge bg-secondary"><?php echo $data['tanggalunggah'] ?></span>

                                                </div>
                                                <hr>
                                                <div>
                                                    <p align="left">
                                                        <?php echo $data['deskripsifoto'] ?>
                                                    </p>
                                                    <hr>
                                                    <?php
                                                        $fotoid = $data['fotoid'];
                                                        $komentar = mysqli_query($koneksi, "SELECT * FROM komentarfoto INNER JOIN user ON komentarfoto.userid=user.userid WHERE komentarfoto.fotoid='$fotoid'");
                                                        while ($row = mysqli_fetch_array($komentar)) { ?>
                                                    <p align="left">
                                                        <strong> <?php echo $row['namalengkap'] ?></strong>
                                                        <?php echo $row['isikomentar'] ?>
                                                    </p>
                                                    <?php  } ?>
                                                    <hr>
                                                    <div class="sticky-bottom">
                                                        <form action="../config/a_tambah_komentar.php" method="POST">
                                                            <div class="input group">
                                                                <input type="hidden" name="fotoid"
                                                                    value="<?php echo $data['fotoid'] ?>">
                                                                    <div class="modal-footer">
                                                            <
                                                                <input type="text" name="isikomentar"
                                                                    class="form-control" placeholder="Tambah komentar">
                                                                <div class="input-group-prepend">
                                                                    <button type="submit" name="kirim komentar"
                                                                        class="btn btn-outline-primary">kirim</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php }} else {

                
                $query = mysqli_query($koneksi, "SELECT * FROM foto WHERE userid='$userid'");
                while ($data = mysqli_fetch_array($query)) { ?>

            <div class="col-md-3 mt-2">
                <div class="card">
                     <a href="../img.php?fotoid=<?=$data['fotoid']?>">
                    <img style="height: 12rem" src="../img/<?php echo $data['lokasifile'] ?>"
                        class="card-img-top" title="<?php echo $data['judulfoto'] ?>">
                    <div class="card-footer text-center">

                        <?php
                                    $fotoid = $data['fotoid'];
                                    $ceksuka = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid' AND userid='$userid'");
                                    if (mysqli_num_rows($ceksuka) == 1) { ?>
                        <a href="../like.php?fotoid=<?php echo $data['fotoid'] ?>" type="submit"
                            name="batalsuka"><i class="fa fa-heart"></i></a>
                        <?php } else { ?>
                        <a href="../like.php?fotoid=<?php echo $data['fotoid'] ?>" type="submit"
                            name="suka"><i class="fa-regular fa-heart"></i>L</a>
                        <?php }

                                    $like = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid'");
                                    echo mysqli_num_rows($like) . ' Suka ';
                                    ?>

                        <a href="#" type="button" data-bs-toggle="modal"
                            data-bs-target="#komentar<?php echo $data['fotoid'] ?>"><i
                                class="fa-regular fa-comment"></i>K</a>
                        <?php
                                $jmlkomen = mysqli_query($koneksi, "SELECT * FROM komentarfoto WHERE fotoid='$fotoid'");
                                echo mysqli_num_rows($jmlkomen) . ' Komentar ';
                                ?>
                    </div>
                </div>
                </a>


                <!-- Modal -->
                <div class="modal fade" id="komentar<?php echo $data['fotoid'] ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <a href="../img.php?fotoid=<?=$data['fotoid']?>">
                                        <img src="../img/<?php echo $data['lokasifile'] ?>" class="card-img-top"
                                            title="<?php echo $data['judulfoto'] ?>"></a>
                                    </div>
                                    <div class="class col-md-4">
                                        <div class="class m-2">
                                            <div class="overflow-auto">
                                                <div class="sticky-top">
                                                    <strong><?php echo $data['judulfoto'] ?></strong><br>

                                                    <span
                                                        class="badge bg-secondary"><?php echo $data['tanggalunggah'] ?></span>

                                                </div>
                                                <hr>
                                                <div>
                                                    <p align="left">
                                                        <?php echo $data['deskripsifoto'] ?>
                                                    </p>
                                                    <hr>
                                                    <?php
                                                        $fotoid = $data['fotoid'];
                                                        $komentar = mysqli_query($koneksi, "SELECT * FROM komentarfoto INNER JOIN user ON komentarfoto.userid=user.userid WHERE komentarfoto.fotoid='$fotoid'");
                                                        while ($row = mysqli_fetch_array($komentar)) { ?>
                                                    <p align="left">
                                                        <strong> <?php echo $row['namalengkap'] ?></strong>
                                                        <a href="../hapus_komentar.php?komentarid=<?=$row['komentarid']?>">
                                                          <?php echo $row['isikomenatar'] ?></a>
                                                      <a data-bs-toggle="modal" data-bs-target="#hapus<?=$row['komentarid']?>">asa
                                                         
                                                       </a>
                                                            
                                                      
                                                         <td>
            
            
                                                    </p>
                                                    <?php  } ?>
                                                    <hr>
                                                    <div class="sticky-bottom">
                                                        <form action="../config/a_tambah_komentar.php" method="POST">
                                                            <div class="input group">
                                                                <input type="hidden" name="fotoid"
                                                                    value="<?php echo $data['fotoid'] ?>">
                                                                <input type="text" name="isikomentar"
                                                                    class="form-control" placeholder="Tambah komentar">
                                                                <div class="input-group-prepend">
                                                                    <button type="submit" name="kirim komentar"
                                                                        class="btn btn-outline-primary">kirim</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } } ?>
        </div>
    </div>
   <div class="modal fade" id="hapus<?=$row['komentarid']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="../hapus_komentar.php" method="POST">
                                                                
                                                                Apakah anda yakin akan menghapus data <strong><?php $row['kometarid'] ?></strong>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" name="hapus" class="btn btn-danger">Hapus Data</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                            
    <footer class="d-flex justify-content-center border-top mt-3 bg-light fixed-bottom">
    <p>&copy; UKK RPL | Rifa Mustopa A</p>
</footer>

    <script type="text/javascript" src="../aset/js/bootstrap.min.js"></script>
</body>

</html>