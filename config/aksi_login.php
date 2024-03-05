<?php
include "koneksi.php";
session_start();

$username=$_POST['username'];
$password=md5($_POST['password']);


$sql=mysqli_query($koneksi,"select * from user where username='$username' and password='$password'");

$cek=mysqli_num_rows($sql);

if($cek==1){
        $data=mysqli_fetch_array($sql);

        $_SESSION['ussername'] =$data ['username'];
         $_SESSION['userid']=$data['userid'];
        $_SESSION['status'] ='login';
       
    
    
       echo "<script>
        alert('Login berhasil');
        location.href='../admin/home.php';
        </script>";
    
    
}else{
     echo "<script>
        alert('Username atau password salah');
        location.href='../login.php';
        </script>";
}


?>