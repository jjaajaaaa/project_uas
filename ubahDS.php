<?php
include 'Models.php';
$modvar = new Models();
$data = $modvar->munculkan_data_dosen($_GET['id']);
include 'header.php';
?>

<div class="container">
	<div class="page-header">
<h2 >EDIT DATA DOSEN</h2>
</div>
<form action="" method="post">
<table class="table">
	<?php
	while ($dta =mysqli_fetch_assoc($data) ) :
	?>
	<tr>
		<td>Nama Dosen</td>
		<td>
			<input class="form-control" type="hidden" name="nidn" value="<?= $dta['nidn'] ?>">
			<input class="form-control" type="text" name="dosen" value="<?= $dta['nama'] ?>" size = "30">
		</td>
	</tr>
	<tr>
		<td></td>
		<td>
			<button class="btn btn-success" type="submit" name="ubah">UPDATE</button>
		</td>
	</tr>
</table>
</form>
<?php endwhile; ?>
</body>
</html>
<?php
 if ( isset($_POST['ubah']) ) {
 	$id    = $_POST['nidn']; 
 	$dosen = $_POST['dosen'];

 	$ubah = $modvar->update_user_dosen($dosen,$id);
 	if( $ubah ){
 		echo "
 		<script>
 		alert('data dosen berhasil diedit');
 		document.location.href = 'datadosen.php';
 		</script>
 		";
 	}else {
 		echo "
 		<script>
 		alert('data dosen gagal diedit');
 		document.location.href = 'datadosen.php';
 		</script>
 		";
 	}
 }


?>
</div>
<?php  include 'footer.php';  ?>