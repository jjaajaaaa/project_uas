<?php include 'header.php'; ?>
<style >
	.btn{
		margin-bottom: 10px;
	}
</style>
<div class="container">
	<div class="page-header">
<h2> DATA DOSEN ITB STIKOM Bali</h2>
	</div>
<a class="btn btn-primary " href="tambahDS.php">TAMBAH DATA</a>
<?php
	?>
<table class="table table-bordered table-striped">
 	<tr>
 		<th>NO</th>
 		<th>ID</th>
 		<th>NAMA DOSEN</th>
		<th>AKSI</th>
 	</tr>
 	<?php 
 	require_once 'Models.php';
	$modvar = new Models();
	$data = $modvar->show_table_data_dosen();
 	$i=1; 
 	while($dta = mysqli_fetch_assoc($data) ):
 	 ?>
 	 <tr>
 	 	<td width="40px" align="center"><?= $i; ?></td>
 	 	<td align="center"><?= $dta['nidn'] ?></td>
 	 	<td><?= $dta['nama'] ?></td>
 	 	<td width="160px">
 	 		<a class="btn btn-warning btn-sm" href="ubahDS.php?id=<?= $dta['nidn'] ?>">EDIT</a> 
 	 		<a class="btn btn-danger btn-sm" href="hapusDS.php?id=<?= $dta['nidn'] ?>" onclick ="return confirm('apakah anda yakin ingin menghapus data dosen?')">HAPUS</a>
 	 	</td>
 	 </tr>
 	 <?php $i++;  ?>
 	<?php endwhile; ?>
 </table>
</body>
</div>
</html>
<?php include 'footer.php'; ?>