<?php 
include 'Models.php';
$modvar = new Models();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Laporan Data Mahasiswa</title>
	
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
	<b>LAPORAN DATA MAHASISWA</b>
	<br/>
	<hr/>
	
	<table border="1" cellspacing="" cellpadding="4" width="100%">
	<tr>
		<th>NO</th>
		<th>ID</th>
		<th>NIM</th>
		<th>NAMA MAHASISWA</th>
		<th>JURUSAN</th>
		<th>SEMESTER</th>
	</tr>
	<?php 
	$data = $modvar->show_table_data_mahasiswa();
	$i=1;
	while ($dta = mysqli_fetch_assoc($data)) :
	 ?>
	<tr>
		<td align="center"><?= $i ?></td>
		<td align="center"><?= $dta['idmhs'] ?></td>
		<td align="center"><?= $dta['nim'] ?></td>
		<td align=""><?= $dta['namamhs'] ?></td>
		<td align=""><?= $dta['jurusan'] ?></td>
		<td align=""><?= $dta['semester'] ?></td>
	</tr>
	<?php $i++; ?>
<?php endwhile; ?>
	</table>
<table width="100%">
	<tr>
		<td></td>
		<td width="200px">
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