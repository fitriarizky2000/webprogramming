<?php
include('koneksi.php');

//jika benar mendapatkan GET id dari URL
if(isset($_GET['id'])){
	//membuat variabel $id yang menyimpan nilai dari $_GET['id']
	$id = $_GET['id'];
	
	//melakukan query ke database, dengan cara SELECT data yang memiliki id yang sama dengan variabel $id
	$cek = mysqli_query($koneksi, "SELECT * FROM data WHERE id='$id'") or die(mysqli_error($koneksi));
	
	//jika query menghasilkan nilai > 0 maka eksekusi script di bawah
	if(mysqli_num_rows($cek) > 0){

		$del = mysqli_query($koneksi, "DELETE FROM data WHERE id='$id'") or die(mysqli_error($koneksi));
		if($del){
			echo '<script>alert("Berhasil menghapus data."); document.location="index.php";</script>';
		}else{
			echo '<script>alert("Gagal menghapus data."); document.location="index.php";</script>';
		}
	}else{
		echo '<script>alert("id tidak ditemukan di database."); document.location="index.php";</script>';
	}
}else{
	echo '<script>alert("id tidak ditemukan di database."); document.location="index.php";</script>';
}

?>