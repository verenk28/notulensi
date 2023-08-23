<?php 
include 'koneksi.php';
$username=$_POST['username'];
$password=$_POST['password'];
$login=mysqli_query($koneksi,"select * from login where username='$username' and password='$password'");
$cek=mysqli_num_rows($login);
if($cek>0){
	session_start();
	$row = mysqli_fetch_assoc($login);
    $_SESSION['username'] = $row['username'];
	$_SESSION['uname']=$username;
	$_SESSION['status']="login";
	$_SESSION['role']=$row['role'];

	header("location:template.php?f=home");
}else{
	header("location:index.php");
}
 ?>