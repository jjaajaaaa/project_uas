<?php 
include 'Models.php';
$modvar = new Models();
$hapus = $modvar->delete_user_mahasiswa($_GET['id']);
	if($hapus){
		echo "
		<script>
		alert('data berhasil dihapus');
		document.location.href = 'datamahasiswa.php';
		</script>
		";
	}else {
		echo "
		<script>
		alert('data gagal dihapus data digunakan ditabel lain');
		document.location.href = 'datamahasiswa.php';
		</script>
		";

	}
 ?>