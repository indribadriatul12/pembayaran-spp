<?php
//$_POST : mengirim data melalui url
$username = $_POST['username'];
$password = $_POST['password'];
//untuk menghubungkan file php ke file php lainnya
include 'koneksi.php';
$sql = "SELECT*FROM petugas WHERE username='$username' AND password='$password'";
//memudahkan pengelolaan data yang ada di database
$query = mysqli_query($koneksi, $sql);
if(mysqli_num_rows($query)>0) {
	$data = mysqli_fetch_array($query);
	//untuk memulai menjalankan apk
	session_start();
	$_SESSION['id_petugas'] = $data['id_petugas'];
	$_SESSION['nama_petugas'] = $data['nama_petugas'];
	$_SESSION['level'] = $data['level'];
	if ($data['level']=='admin') {
		header('Location:admin/admin.php');
	}elseif ($data['level']=='petugas') {
		header('Location:petugas/petugas.php');
	//location : mengarahkan file yang akan di tuju
	}
	
}else{
	//echo :mencetak data
	echo "<script>
	alert('Maaf Login Gagal, Silahkan Ulangi Lagi');
	window.location.assign('index2.php');
	</script>";

	}
 ?>
