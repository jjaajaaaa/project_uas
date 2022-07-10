<?php
include 'Models.php';
$modvar = new Models();
$hapus = $modvar->delete_user_dosen($_GET['id']);
if( $hapus) {
	echo "
	<script>
	alert('data dosen berhasil dihapus');
	document.location.href = 'datadosen.php';
	</script>
	";
}else {
	echo "
	<script>
	alert('data dosen ini digunakan sebagai lainnya');
	alert('data dosen gagal dihapus');
	document.location.href = 'datadosen.php';
	</script>
	";
}
