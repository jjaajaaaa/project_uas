<?php 
include 'Models.php';
$modvar = new Models();

if($_GET['act']=='bayar') {
	$idukt = $_GET['id'];
	$nim   = $_GET['nim'];
	// bulan
	$data  = $modvar->proses_transaksi_bayar(date("ymd"));
	$lastNobayar = $data['last'];
	$lastNoUrut  = substr($lastNobayar, 6 ,4);
	$nextNoUrut  = $lastNoUrut + 1;
	$nextNobayar = $today.sprintf('%04s' , $nextNoUrut);
	// tanggal bayar
	$tglbayar = date('Y-m-d');
	// id admin
	$admin = $_SESSION['id'];
	$byr = $modvar->updata_transaksi_bayar($nextNobayar,$tglbayar,$admin,$idukt);
	if ($byr) 	header('location: transaksi.php?nim='.$nim);
	else 		echo "<script>alert('gagal')</script>";
}
else if($_GET['act']=='batal'){
	$idukt = $_GET['id'];
	$nim   = $_GET['nim'];
	$batal = $modvar->updata_transaksi_bayar(null,null,null,$idukt);
	if ($batal) header('location: transaksi.php?nim='.$nim);
}
 ?>