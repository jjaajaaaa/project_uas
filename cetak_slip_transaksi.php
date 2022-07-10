<?php 
	include 'Models.php';
	$modvar = new Models();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Slip Pembayaran UKT</title>
	
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
	<?php 
	$sw = $modvar->show_mhs_slip($_GET);
	 ?>
	<table>
		<tr>
			<td>Nama Mahasiswa</td>
			<td>:</td>
			<td> <?= $sw['namamhs'] ?></td>
		</tr>
		<tr>
			<td>Nim</td>
			<td>:</td>
			<td> <?= $sw['nim'] ?></td>
		</tr>
		<tr>
			<td>jurusan</td>
			<td>:</td>
			<td> <?= $sw['jurusan'] ?></td>
		</tr>
	</table>
	<hr>
	<table border="1" cellspacing="" cellpadding="4" width="100%">
	<tr>
		<th>NO</th>
		<th>ID</th>
		<th>NO. BAYAR</th>
		<th>PEMBAYARAN BULAN</th>
		<th>JUMLAH</th>
		<th>KETERANGAN</th>
	</tr>
	<?php 
	$ukt = $modvar->show_table_slip($_GET['id']);
	$i=1;
	$total = 0;
	while($dta=mysqli_fetch_array($ukt)) :
	 ?>
	<tr>
		<td align="center"><?= $i ?></td>
		<td align="center"><?= $dta['idmhs'] ?></td>
		<td align=""><?= $dta['nobayar'] ?></td>
		<td align=""><?= $dta['bulan'] ?></td>
		<td align="right"><?= $dta['jumlah'] ?></td>
		<td align="center"><?= $dta['ket'] ?></td>
	</tr>
	<?php $i++; ?>
	

<?php endwhile; ?>

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
