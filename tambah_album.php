<!DOCTYPE html>
<html>
<head>
	<meta charset="ut-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Website Galery Foto</title>
	<link rel="stylesheet" type="text/css" href="aset/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<i class="bi bi-arrow-left" onclick="history.back()"></i>
  <div class="container">
    <a class="navbar-brand"><h2>Website Gallery</h2></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
</nav>   
<div class="container">

<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-4">
      <div class="card">
        <div class="card-body bg-light">
          
            <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasLabel">Tambah</h5>
    <a href="admin/album.php" type="button" class="btn-close"></a>
  </div>
      		
			       	<div class="card-body">
                    
					<form action="config/aksi_album.php"method="POST">
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
</div>
</div>

<script type="aset/text/javascript" src="../aset/js/bootstrap.min.js"></script>
</body>
</html>
<body>
</html>