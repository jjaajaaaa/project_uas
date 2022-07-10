<?php 
include 'Models.php';
$modvar = new Models();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Laporan Pembayaran</title>
	
	<style >
		body{
			font-family: arial;
		}
		.print{
			margin-top: 10px;
		}
		@media print{
			.print{
				display: none;
			}
		}
		table{
			border-collapse: collapse;
		}
	</style>
</head>
<body>
	<h3>ITB STIKOM Bali<b><br/>LAPORAN PEMBAYARAN UKT</b></h3>
	<br/>
	<hr/>
	Tanggal <?= $_GET['tgl1']." -- ".$_GET['tgl2'];  ?>
	<br/>
	<br>
	<table border="1" cellspacing="" cellpadding="4" width="100%">
	<tr>
		<th>NO</th>
		<th>ID</th>
		<th>NIM</th>
		<th>NAMA MAHASISWA</th>
		<th>JURUSAN</th>
		<th>NO. BAYAR</th>
		<th>PEMBAYARAN BULAN</th>
		<th>JUMLAH</th>
		<th>KETERANGAN</th>
	</tr>
	<?php 
	$ukt = $modvar->tampilkan_laporan_pembayaran($_GET['tgl1'],$_GET['tgl2']);
	$i=1;
	$total = 0;
	while($dta=mysqli_fetch_array($ukt)) :
	 ?>
	<tr>
		<td align="center"><?= $i ?></td>
		<td align="center"><?= $dta['idmhs'] ?></td>
		<td align="center"><?= $dta['nim'] ?></td>
		<td align=""><?= $dta['namamhs'] ?></td>
		<td align=""><?= $dta['jurusan'] ?></td>
		<td align=""><?= $dta['nobayar'] ?></td>
		<td align=""><?= $dta['bulan'] ?></td>
		<td align="right"><?= $dta['jumlah'] ?></td>
		<td align="center"><?= $dta['ket'] ?></td>
	</tr>
	<?php $i++; ?>
	<?php $total += $dta['jumlah']; ?>

<?php endwhile; ?>
<tr>
		<td colspan="7" align="right">TOTAL</td>
		<td align="right"><b><?= $total ?></b></td>
		<td></td>
	</tr>
	</table>
<table width="100%">
	<tr>
		<td></td>
		<td width="200px">
			<BR/>
			<p>Renon , <?= date('d/m/y') ?> <br/>
				Operator,
			<br/>
			<br/>
			<br/>
		<p>__________________________</p>
		</td>
	</tr>
</table>


	<a  href="#" onclick="window.print();"><button class="print">CETAK</button></a>
</body>
</html>
