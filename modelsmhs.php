<?php
include "koneksimhs.php";
class Mahasiswa extends Koneksi{

	function __construct(){
		parent::__construct();

		session_start();
		if ($_SESSION['login']==""){
			echo "<script>alert('Anda belum login, silahkan login terlebih dahulu');window.location = 'loginmhs.php'</script>";
		}
	}

	function tampil_data(){
		$qry = mysqli_query($this->conn,"select * from mahasiswa");
		while($x = mysqli_fetch_assoc($qry)){
			$data[] = $x;
		}
		return $data;
	}

	function tambah_data($data){
		$qry = mysqli_query($this->conn, "insert into mahasiswa values ('".$data['nim']."','".$data['nama_mhs']."','".$data['kode_jurusan']."','".$data['jenis_kelamin']."','".$data['alamat']."','".$data['no_hp']."','".$data['email']."')") or die(mysqli_error($this->conn));
		return $qry;
	}

	function hapus_data($id){
		$qry = mysqli_query($this->conn,"delete from mahasiswa where nim = '$id'") or die(mysqli_error($this->conn));
		return $qry;
	}

	function edit($id){
		$qry = mysqli_query($this->conn,"select * from mahasiswa where nim = '$id'");
		$data= mysqli_fetch_assoc($qry);
		return $data;
	}

	function update_data($data){
		$qry = mysqli_query($this->conn, "update mahasiswa set nama = '".$data['nim']."','".$data['nama_mhs']."','".$data['kode_jurusan']."','".$data['jenis_kelamin']."','".$data['alamat']."','".$data['no_hp']."','".$data['email']."')") or die(mysqli_error($this->conn));
		return $qry;
	}
}


?>