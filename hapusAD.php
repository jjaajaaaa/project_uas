<?php 
include 'Models.php';
$modvar = new Models();
$hapus = $modvar->delete_user_admin($_GET['id']);
if ($hapus) echo "<script>alert('data admin berhasil dihapus');document.location.href= 'dataadmin.php';</script>";
else 		echo "<script>alert('data admin digunakan ditabel mahasiswa');alert('data admin gagal dihapus');document.location.href= 'dataadmin.php';</script>";
?>