<?php
include 'Models.php';
include 'header.php';
$modvar = new Models();
?>

<div class="container">
	<div class="page-header">
<h2 >TAMBAH DATA DOSEN</h2>
</div>
<form action="" method="post">
<table class="table ">
	<tr>
 		<td>NIM</td>
 		<td>
 			<input class="form-control" type="text" name="nidn" placeholder="Masukan NIDN">
 		</td>
 	</tr>
	<tr>
		<td>Nama Dosen</td>
		<td>
			<input class="form-control" type="text" name="dosen" placeholder="Masukan Nama Dosen">
		</td>
	</tr>
	<tr>
		<td></td>
		<td>
			<button class="btn btn-success" type="submit" name="tambah">SIMPAN</button>
		</td>
	</tr>
</table>
</form>

<?php
 if ( isset($_POST['tambah']) ) {
	$nidn  = $_POST['nidn'];
 	$dosen = $_POST['dosen'];

 	$simpan = $modvar->tambah_user_dosen($nidn,$dosen);
 	if( $simpan ){
 		echo "
 		<script>
 		alert('data dosen berhasil ditambahkan');
 		document.location.href = 'datadosen.php';
 		</script>
 		";
 	}else {
 		echo "
 		<script>
 		alert('data dosen gagal ditambahkan');
 		document.location.href = 'datadosen.php';
 		</script>
 		";
 	}
 }


?>
</div>
<?php  include 'footer.php';  ?>