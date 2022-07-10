<?php 

include 'header.php';
 ?>
<div class="container">
	<div class="page-header">
<h2> DATA MAHASISWA ITB STIKOM Bali</h2>
	</div>
<a class="btn btn-primary " href="tambahMHS.php">TAMBAH DATA</a>
 <br/> <br>
 <table class="table table-bordered table-striped">
 	<tr>
 		<th>NO</th>
 		<th>JURUSAN</th>
 		<th>NIM</th>
 		<th>NAMA MAHASISWA</th>
 		<th>SEMESTER</th>
		<th>BIAYA</th>
		<th>AKSI</th>
 	</tr>
 	<?php 
	 require_once 'Models.php';
	 $modvar = new Models();
 	$data = $modvar->show_table_data_mahasiswa();
 	$i=1;
 	while ($dta = mysqli_fetch_assoc($data) ) : 
 	 ?>
 	 <tr>
 	 	<td><?= $i; ?></td>
 	 	<td><?= $dta['jurusan'] ?></td>
 	 	<td><?= $dta['nim'] ?></td>
 	 	<td><?= $dta['namamhs'] ?></td>
 	 	<td><?= $dta['semester'] ?></td>
 	 	<td><?= $dta['biaya'] ?></td>
 	 	<td>
 	 		<a class="btn btn-warning btn-sm" href="ubahMHS.php?id=<?= $dta['idmhs'] ?>">EDIT</a> 
 	 		<a class="btn btn-danger btn-sm" href="hapusMHS.php?id=<?= $dta['idmhs'] ?>" onclick ="return confirm('apakah anda yakin ingin menghapus data mahasiswa? data UKT Mahasiswa yang bersangkutan akan ikut terhapus')">HAPUS</a>
 	 	</td>
 	 </tr>
 	 <?php $i++;  ?>
 	<?php endwhile; ?>
 </table>
 <p align="center" style="font-family: arial; color: red; size: 10px;">Menghapus Data Mahasiswa Maka Akan menghapus Data Pembayaran dan data tagihan Mahasiswa pada tabel UKT</p>
 </div>
 <?php include 'footer.php'; ?>