<?php 
include 'Models.php';
$modvar = new Models();

include 'header.php';

 ?>
 <div class="container">
	<div class="page-header">
<h2>CARI MAHASISWA BERDASARKAN NIM</h2>
	</div>
 <form action="" method="get">
 	<table class="table">
 		<tr>
 			<td>NIM</td>
 			<td>:</td>
 			<td>
 				<input class="form-control" type="text" name="nim">
 			</td>
 			<td>
 				<button class="btn btn-success" type="submit" name="cari">Cari</button>
 			</td>
 		</tr>
 		
 	</table>
 </form>
<?php 
if (isset($_GET['nim']) && $_GET['nim'] != ''){
	$dta = $modvar->mencari_data_mahasiswa($_GET['nim']);
	$nis = $dta['nim'];

?>
<div class="panel panel-info">
	<div class="panel-heading">
<h3>BIODATA MAHASISWA</h3>
</div>
<div class="panel panel-body">
	<table class="table table-bordered table-striped">
		<tr>
			<td>NIM</td>
			<td><?= $dta['nim'] ?></td>
		</tr>
		<tr>
			<td>Nama Mahasiswa</td>
			<td><?= $dta['namamhs'] ?></td>
		</tr>
		<tr>
			<td>Jurusan</td>
			<td><?= $dta['jurusan'] ?></td>
		</tr>
		<tr>
			<td>Semester</td>
			<td><?= $dta['semester'] ?></td>
		</tr>
	</table>
</div>
</div>

<div class="panel panel-info">
	<div class="panel-heading">
<h3>Tagihan UKT Mahasiswa</h3>
</div>
<div class="panel-body ">
	<table class="table table-bordered table-striped">
<tr>
	<th>NO</th>
	<th>Bulan</th>
	<th>jatuh tempo</th>
	<th>No bayar</th>
	<th>Tanggal Bayar</th>
	<th>Jumalah</th>
	<th>Keterangan</th>
	<th>Bayar</th>
</tr>
<?php 
$sql= $modvar->mencari_data_ukt1($dta['idmhs']);
$i=1;
while($sq = mysqli_fetch_assoc($sql)){
	echo "

		<tr>
			<td>$i</td>
			<td>$sq[bulan]</td>
			<td>$sq[jatuhtempo]</td>
			<td>$sq[nobayar]</td>
			<td>$sq[tglbayar]</td>
			<td>$sq[jumlah]</td>
			<td>$sq[ket]</td>
			<td align='center'";
				if ($sq['nobayar'] == ''){
					echo "<a   href='proses_transaksi.php?&act=bayar&id=$sq[idukt]'></a> ";
					echo "<a class='btn btn-primary btn-sm' href='proses_transaksi.php?&act=bayar&id=$sq[idukt]'>Bayar</a> ";
				}else {
					echo "</a>";
					echo "<a class='btn btn-success btn-sm' href='cetak_slip_transaksi.php?&act=bayar&id=$sq[idukt]' target='_blank'>Cetak</a> ";
					
				}
			echo "</td>
		</tr>

		";
		$i++;
}
 ?>
</table>
</div>
</div>
<?php 
}
?>
<p style="color: red;">Pembayaran dilakukan dengan cara mencari tagihan mahasiswa berdasarkan NIM </p>

<?php include 'footer.php' ?>