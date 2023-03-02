<?php 
$nisn = $_GET['nisn'];
$nis = $_POST['nis'];
$nama = $_POST['nama'];
$id_kelas = $_POST['id_kelas'];
$alamat = $_POST['alamat'];
$no_telepon = $_POST['no_telepon'];
$id_spp = $_POST['id_spp'];


include'../koneksi.php';
$sql = "UPDATE  siswa SET nis='$nis', nama='$nama', id_kelas='$id_kelas', alamat='$alamat', no_telepon='$no_telepon', id_spp='$id_spp' WHERE nis='$nis'";
$query = mysqli_query($koneksi, $sql);
if($query) {
	header("Location:?url=siswa");
}else{
	echo "<script>alert('Maaf Data Tidak Tersimpan');
	window.location.assign('?url=siswa');</script>";
	}
 ?>
