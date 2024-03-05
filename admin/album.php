
<?php
session_start();
include '../config/koneksi.php';
if ($_SESSION['status'] != 'login'){
	echo "<script>
	alert('anda belum Login!');
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
          <a class="nav-link"href="home.php"><h5>Home</h5></a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="album.php"><h5>Album</h5></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="foto.php"><h5>Foto</h5></a>
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
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Album
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="../config/aksi_album.php"method="POST">
            <label class="form-label">Nama Album</label>
            <input type="text"  name="namaalbum" class="form-control"required>
            <label class="form-label">Deskripsi</label>
            <textarea class="form-control" name="deskripsi"required></textarea>
            <div class="d-grid mt-2">
              
              <div class="modal-footer">
        
        <button class="btn btn-primary" type="submit" name="kirim">Tambah</button>
      </div>
            </div>
          </form>
        </div>
      </div>
                                                </div>
                                            </div>

            <a class="btn btn-outline-danger m-1"data-bs-toggle="modal" data-bs-target="#logout">Logout</a>
           
                                            <div class="modal fade" id="logout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                              
                                                               
                                                                Apakah anda ingin logout
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button href="../aksi_logout.php" type="submit" class="btn btn-danger">Logout</button>

                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

      </div>
  </div>
</nav>   
 <hr>
    <br><br>


        <table class="table table-striped" width="90%" align="center" border="1" cellpadding="5" cellspacing="10">
						 <tr><tr>
                                    <th>#</th>
                                   
                                    <th>Nama</th>
                                    <th>Deskripsi</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
</tr>
<?php
include "../config/koneksi.php";
$no = 1;
$userid=$_SESSION['userid'];
$sql=mysqli_query($koneksi, "select * from album where userid='$userid'");
while($data=mysqli_fetch_array($sql)){
    ?>
    <tr>
     <td> <?php echo $no++ ?></td>
      
        <td><?=$data['namaalbum']?></td>
        <td><?=$data['deskripsi']?></td>
        <td><?=$data['tanggaldibuat']?></td>
        <td><a data-bs-toggle="modal" data-bs-target="#edit_album<?php echo $data['albumid'] ?>"><i class="fa-solid fa-pen-to-square"></i>e</a>
                                           
                                            <!-- Modal -->
                                            <div class="modal fade" id="edit_album<?php echo $data['albumid'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Album
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="../update_album.php" method="POST" enctype="multipart/form-data">
                                                                <input type="hidden" name="albumid" value="<?php echo $data['albumid'] ?>">
                                                                <label class="form-label">Nama Album</label>
                                                                <input type="text" name="namaalbum" value="<?php echo $data['namaalbum'] ?>" class="form-control" required>
                                                                <label class="form-label">Deskripsi</label>
                                                                <textarea name="deskripsi" class="form-control" required><?php echo $data['deskripsi'] ?></textarea>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" name="edit" class="btn btn-warning">Edit
                                                                Data</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             
                  
                  
                      <a data-bs-toggle="modal" data-bs-target="#hapus_album"><i class="fa-solid fa-trash"></i>h</a>
                                           
                                            <div class="modal fade" id="hapus_album" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="../hapus_album.php?albumid=<?=$data['albumid']?>" method="POST">
                                                                
                                                                Apakah anda yakin akan menghapus data 
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" name="hapus" class="btn btn-danger">Hapus Data</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

        </td>
    </tr>
  </div>
</div>
							
							<?php 
						}?>

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<nav id="navbar-example2" class="navbar navbar-light bg-light px-3">
  <a class="navbar-brand" href="#">Navbar</a>
  <ul class="nav nav-pills">
    <li class="nav-item">
      <a class="nav-link" href="#scrollspyHeading1">First</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#scrollspyHeading2">Second</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Dropdown</a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#scrollspyHeading3">Third</a></li>
        <li><a class="dropdown-item" href="#scrollspyHeading4">Fourth</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="#scrollspyHeading5">Fifth</a></li> <div class="input-group">
    <div class="input-group-text" id="btnGroupAddon2">@</div>
    <input type="text" class="form-control" placeholder="Input group example" aria-label="Input group example" aria-describedby="btnGroupAddon2">
  </div>
</div>>
      </ul>
    </li>
  </ul>
</nav>
<div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="0" class="scrollspy-example" tabindex="0">
  <h4 id="scrollspyHeading1">First heading</h4>
  <p>...</p>
  <h4 id="scrollspyHeading2">Second heading</h4>
  <p>...</p>
  <h4 id="scrollspyHeading3">Third heading</h4>
  <p>...</p>
  <h4 id="scrollspyHeading4">Fourth heading</h4>
  <p>...</p>
  <h4 id="scrollspyHeading5">Fifth heading</h4>
  <p>...</p>
</div>
<footer class="d-flex justify-content-center border-top mt-3 bg-light fixed-bottom">
    <p>&copy; UKK RPL | Rifa Mustopa A</p>
</footer>
<script type="text/javascript" src="../aset/js/bootstrap.min.js"></script>
</body>
</html>