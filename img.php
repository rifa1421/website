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

 <div class="modal-dialog">
                                                    <div class="modal-content">
                                                      
        <?php
            include "config/koneksi.php";
            $fotoid=$_GET['fotoid'];
            $sql=mysqli_query($koneksi,"select * from foto where fotoid='$fotoid'");
            while($data=mysqli_fetch_array($sql)){
        ?>
       
        
               
 
               <a href="admin/home.php">
             <img style="height: 40rem"src="img/<?php echo $data['lokasifile'] ?>" class="card-img-top"> </a> 
                
          
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