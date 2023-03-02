<?php 
$id_kelas= $_GET['id_kelas'];
//menyimpan sebuah file php kedalam file php lain
include'../koneksi.php';
$sql = "SELECT*FROM kelas WHERE id_kelas='$id_kelas'";
//memudahkan pengelolaan data yang ada di database
	$query = mysqli_query($koneksi, $sql);
//menangkap data dari hasil perintah query dan membentuknya jadi array asosiatif/array numerik
	$data = mysqli_fetch_array($query);

 ?>

<h5>Halaman Edit Data Kelas.</h5>
<a href="?url=kelas" class="btn btn-primary"> KEMBALI </a>
<hr>
<form method="post" action="?url=proses-edit-kelas&id_kelas=<?= $id_kelas; ?>">
	<di class="form-group mb-2">
		<label>Nama Kelas</label>
		<input value="<?= $data['nama_kelas']; ?>" type="text" name="nama_kelas"  class="form-control" required>
	</di>	
	<di class="form-group mb-2">
		<label>Kompetensi Keahlian</label>
		<input value="<?= $data['kompetensi_keahlian']; ?>" type="text" name="kompetensi_keahlian" class="form-control" required>
	</di>	
	<div class="form-group">
		<button type="submit" class="btn btn-success"> SIMPAN </button>
		<button type="reset" class="btn btn-warning"> KOSONGKAN </button>
	</div>

</form>