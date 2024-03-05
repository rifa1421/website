<?php
session_start();
include '../config/koneksi.php';

if ($_SESSION['status'] != 'login') {
    echo "<script>
        alert('Anda belum login');
        location.href='../index.php';
    </script>";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Galeri Foto</title>
    <link rel="stylesheet" type="text/css" href="../aset/css/bootstrap.min.css">
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
    <div class="collapse navbar-collapse mt-2" id="navbarNavAltMarkup">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="home.php"><h5>Home</h5></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="album.php"><h5>Album</h5></a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="foto.php"><h5>Foto</h5></a>
        </li>
      </ul>
    </div>
      <div class="navbar-nav me-auto">
      </div>
            <a class="navbar-brand" href="#"data-bs-toggle="modal" data-bs-target="#tambah"><h1>+</h1></a>
            <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Album</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
                            <div class="modal-body">
                                <form action="../config/aksi_foto.php" method="post" enctype="multipart/form-data">
                                    <label class="form-label">Judul Foto</label>
                                    <input type="text" name="judulfoto" class="form-control" required>
                                    <label class="form-label">Deskripsi</label>
                                    <textarea name="deskripsifoto" class="form-control" required></textarea>
                                    <label class="form-label">Album</label>
                                    <select name="albumid" class="form-control" required>
                                    <?php
                                    $userid = $_SESSION['userid'];
                                    $sql_album = mysqli_query($koneksi, "select * from album where userid='$userid'");
                                       while ($data_album = mysqli_fetch_array($sql_album)) { 
                                        ?>
                                        <option value="<?php echo $data_album['albumid'] ?>">
                                            <?php echo $data_album['namaalbum'] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                    <label class="form-label">File</label>
                                    <input type="file" class="form-control" name="lokasifile" required>
                            <button type="submit" class="btn btn-primary mt-2" name="tambah">Tambah Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


 <a href="../config/aksi_logout.php" class="btn btn-outline-danger m-1">Logout</a>
      </div>
  </div>
</nav>   


    <hr>
    <br><br>

    

                
        <table class="table table-striped" width="90%" align="center" border="1" cellpadding="5" cellspacing="10">
                            <tr>
 
                                <tr>
                                    <th>#</th>
                                    <th>Foto</th>
                                    <th>Judul Foto</th>
                                    <th>Deskripsi</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $userid = $_SESSION['userid'];
                                $sql = mysqli_query($koneksi, "select * from foto where userid='$userid'");
                                while ($data = mysqli_fetch_array($sql)) {
                                ?>

                                    <tr>
                                        <td>
                                            <?php echo $no++ ?>
                                        </td>
                                        <td>

    <div class="modal fade" id="foto<?php echo $data['fotoid'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

 <div class="modal-dialog">
                                                    <div class="modal-content">
  
  
  </div>
 
               <a href="foto.php">
             <img style="height:700px" src="../img/<?php echo $data['lokasifile'] ?>" class="card-img-top">
                
          
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

                                             <a href="#"data-bs-toggle="modal" data-bs-target="#foto<?php echo $data['fotoid'] ?>">
                                            <img src="../img/<?php echo $data['lokasifile'] ?>" alt="" width="40"></a></td>
                                        <td>
                                            <?php echo $data['judulfoto'] ?>
                                        </td>
                                        <td>
                                            <?php echo $data['deskripsifoto'] ?>
                                        </td>
                                        <td>
                                            <?php echo $data['tanggalunggah'] ?>
                                        </td><td>
                                        <a data-bs-toggle="modal" data-bs-target="#edit<?php echo $data['fotoid'] ?>"><i class="fa-solid fa-pen-to-square"></i>e</a>
                                           
                                            <!-- Modal -->
                                            <div class="modal fade" id="edit<?php echo $data['fotoid'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="../config/aksi_foto.php" method="POST" enctype="multipart/form-data">
                                                                <input type="hidden" name="fotoid" value="<?php echo $data['fotoid'] ?>">
                                                                <label class="form-label">Judul Foto</label>
                                                                <input type="text" name="judulfoto" value="<?php echo $data['judulfoto'] ?>" class="form-control" required>
                                                                <label class="form-label">Deskripsi</label>
                                                                <textarea name="deskripsifoto" class="form-control" required><?php echo $data['deskripsifoto'] ?></textarea>

                                                                <label class="form-label">Album</label>
                                                                <select name="albumid" class="form-control">
                                                                    <?php
                                                                    $userid = $_SESSION['userid'];
                                                                    $sql_album = mysqli_query($koneksi, "select * from album where userid='$userid'");
                                                                    while ($data_album = mysqli_fetch_array($sql_album)) {
                                                                    ?>
                                                                        <option <?php if ($data_album['albumid'] ==  $data['albumid']) { ?> selected="selected" <?php } ?> value="<?php echo $data_album['albumid'] ?>">
                                                                            <?php echo $data_album['namaalbum'] ?>
                                                                        </option>
                                                                    <?php } ?>
                                                                </select>
                                                                <label class="form-label">Foto</label>
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <img src="../img/<?php echo $data['lokasifile'] ?>" alt="" width="100">
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <label class="form-label">Ganti File</label>
                                                                        <input type="file" class="form-control" name="lokasifile">
                                                                    </div>
                                                                </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" name="edit" class="btn btn-warning">Edit
                                                                Data</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             

                                           <a data-bs-toggle="modal" data-bs-target="#hapus<?php echo $data['fotoid'] ?>"><i class="fa-solid fa-trash"></i>h</a>
                                            </button>
                                            <div class="modal fade" id="hapus<?php echo $data['fotoid'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="../config/aksi_foto.php" method="POST">
                                                                <input type="hidden" name="fotoid" value="<?php echo $data['fotoid'] ?>">
                                                                Apakah anda yakin akan menghapus data <strong><?php $data['judulfoto'] ?></strong>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" name="hapus" class="btn btn-danger">Hapus Data</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br><br>

<footer class="d-flex justify-content-center border-top mt-3 bg-light fixed-bottom">
    <p>&copy; UKK RPL | Rifa Mustopa A</p>
</footer>
<script type="text/javascript" src="../aset/js/bootstrap.min.js"></script>
</body>
</html>