<?php
include('koneksi.php');
 

if(isset($_GET['id'])){
	$id = $_GET['id'];
	
	$cek = mysqli_query($koneksi, "SELECT * FROM data WHERE id='$id'") or die(mysqli_error($koneksi));
	if(mysqli_num_rows($cek) > 0){
		$del = mysqli_query($koneksi, "DELETE FROM data WHERE id='$id'") or die(mysqli_error($koneksi));
		if($del){
			echo '<script>alert("Berhasil menghapus data."); document.location="template.php?f=notulen";</script>';
		}else{
			echo '<script>alert("Gagal menghapus data."); document.location="template.php?f=notulen";</script>';
		}
	}else{
		echo '<script>alert("ID tidak ditemukan di database."); document.location="template.php?f=notulen";</script>';
	}
}else{
	echo '<script>alert("ID tidak ditemukan di database."); document.location="template.php?f=notulen";</script>';
}
 
?>