<?php 
//untuk mengirim http perintah ke kelayen
header("content-type: application/vnd-ms-excel");
header("content-Disposition: attachment; filename=Laporan-Pembayaran-SPP.xls");
 ?>

<h5>Laporan Pembayaran.</h5>
<hr>
<table class="table table-striped table-bordered">
	<tr class="fw-bold">
		<td>No</td>
		<td>NISN</td>
		<td>Nama</td>
		<td>Kelas</td>
		<td> Tahun SPP</td>
		<td>Nominal Dibayar</td>
		<td>Sudah Dibayar</td>
		<td>Tanggal Bayar</td>
		<td>Petugas</td>
		
	</tr>	
	<?php 
	//menyimpan sebuah file php kedalam file php lain
	include'../koneksi.php';
	$no = 1;
	$sql = "SELECT*FROM Pembayaran,siswa,kelas,spp,petugas WHERE pembayaran.nisn=siswa.nisn AND siswa.id_kelas=kelas.id_kelas AND pembayaran.id_spp=spp.id_spp AND pembayaran.id_petugas=petugas.id_petugas ORDER BY tgl_bayar DESC";
	//memudahkan pengelolaan data yang ada di database
	$query = mysqli_query($koneksi, $sql);
	//untuk pengulangan sebuah array
	foreach ($query as $data) {
		
 	 ?>
	 <tr>
	 	<td><?= $no++; ?></td>
	 	<td><?= $data['nisn'] ?></td>
	 	
	 	<td><?= $data['nama'] ?></td>
	 	<td><?= $data['nama_kelas'] ?></td>
	 	<td><?= $data['tahun'] ?></td>
	 	<td><?= number_format( $data['nominal'],2, ',', ',');?></td>
	 	<td><?= number_format( $data['jumlah_bayar'],2, ',', ',');?></td>
	 	<td><?= $data['tgl_bayar'] ?></td>
	 	<td><?= $data['nama_petugas'] ?></td>
	 </tr>

	
	 <?php } ?>	
</table>