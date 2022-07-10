<?php
include "koneksi.php";
class Models extends Koneksi{
    function __construct(){
		parent::__construct();

		session_start();
		if(!isset($_SESSION['login']) ) {
			echo "<script>alert('Anda belum login, silahkan login terlebih dahulu');window.location = 'login_pembayaran.php'</script>";
		}
	}
    #MASSIVE
    public function show_table(){

    }
    #Process transaksi page
    public function proses_transaksi_bayar($today){
        $query = $this->con->query("SELECT max(nobayar) AS last FROM ukt WHERE nobayar LIKE '$today%'");
        $result = mysqli_fetch_assoc($query);
        return $result;
    }
    public function updata_transaksi_bayar($nextNobayar,$tglbayar,$admin,$idukt){
        $query = $this->con->query("UPDATE ukt SET nobayar = '$nextNobayar',tglbayar = '$tglbayar',ket = 'LUNAS',iduser = '$admin' WHERE idukt = '$idukt'");
        return $query;
    }
    #Cetak Slip Transasi Page
    public function show_mhs_slip(){
        $mhs = $this->con->query("SELECT * FROM nmmahasiswa");
	    $result = mysqli_fetch_assoc($mhs);
        return $result;
    }
    public function show_table_slip($id){
        $mhs = $this->con->query("SELECT ukt.*,nmmahasiswa.nim,nmmahasiswa.namamhs,nmmahasiswa.jurusan
							FROM ukt INNER JOIN nmmahasiswa ON ukt.idmhs=nmmahasiswa.idmhs
							WHERE idukt ='$id'
							ORDER BY nobayar ASC");
        return $mhs;
    }
    #Admin
    public function show_table_data_admin(){
        $result = $this->con->query("SELECT * FROM user ORDER BY id ASC");
        return $result;
    }
    public function delete_user_admin($id){
        return $this->con->query("DELETE FROM user WHERE id = '$id'");
    }
    public function tambah_user_admin($user,$password,$nama){
        return $this->con->query("INSERT INTO user (username,password,namalengkap) VALUES('$user','$password','$nama')");
    }
    public function tampilkan_data_user($id){
        $data = $this->con->query("SELECT * FROM user WHERE id='$id'");
        $result = mysqli_fetch_assoc($data);
        return $result;
    }
    public function update_user_admin($user,$password,$nama,$id){
        return $this->con->query("UPDATE user SET username = '$user', password = '$password',namalengkap = '$nama' WHERE id =".$id);
    }
    

    #Dosen
    public function show_table_data_dosen(){
        return $this->con->query("SELECT * FROM dosen ORDER BY nidn ASC");
    }
    public function munculkan_data_dosen($nidn){
        return $this->con->query("SELECT * FROM dosen WHERE nidn = '$nidn'");
    }

    public function delete_user_dosen($id){
        return $this->con->query("DELETE FROM dosen WHERE nidn = '$id'");
    }
    public function tambah_user_dosen($nidn,$dosen){
        return $this->con->query("INSERT INTO dosen (nidn,nama) VALUES('$nidn','$dosen')");
    }
    public function update_user_dosen($dosen,$id){
        return $this->con->query("UPDATE dosen SET nama = '$dosen' WHERE nidn = ".$id);
    }


    #Mahasiswa
    public function show_table_data_mahasiswa(){
        $result = $this->con->query("SELECT * FROM nmmahasiswa ORDER BY idmhs ASC");
        return $result;
    }
    public function tampil_data_user_mahasiswa($idmhs){
        $result = $this->con->query("SELECT * FROM nmmahasiswa WHERE idmhs = '$idmhs'");
        $data = mysqli_fetch_assoc($result);
        return $data;
    }
    public function delete_user_mahasiswa($id){
        return $this->con->query("DELETE FROM nmmahasiswa WHERE nim = '$id'");
    }
    public function tampil_jurusan_mahasiswa(){
        return $this->con->query("SELECT * FROM jurusan ORDER BY id_jur ASC");
    }
    public function tambah_user_mahasiswa($nim,$namamhs,$jurusan,$semester,$biaya){
        return $this->con->query("INSERT INTO nmmahasiswa(nim,namamhs,jurusan,semester,biaya)
        VALUES('$nim','$namamhs','$jurusan','$semester','$biaya')");
    }
    public function get_last_id_tambah_user(){
        return $this->con->query("SELECT idmhs FROM nmmahasiswa ORDER BY idmhs DESC LIMIT 1");
    }
    public function mencari_data_mahasiswa($nim){
        $data = $this->con->query("SELECT * FROM nmmahasiswa WHERE nim = '$nim'");
        return mysqli_fetch_assoc($data);
    }
    public function update_user_mahasiswa($nim,$namamhs,$jurusan,$semester,$biaya,$id){
        return $this->con->query("UPDATE nmmahasiswa SET nim = '$nim',namamhs = '$namamhs',jurusan = '$jurusan',semester = '$semester',biaya  = '$biaya' WHERE idmhs = '$id'");
    }

    #UKT
    public function tambah_data_ukt($idmhs,$jatuhtempo,$bulan,$biaya){
        return $this->con->query("INSERT INTO ukt(idmhs , jatuhtempo, bulan, jumlah) VALUES ('$idmhs','$jatuhtempo','$bulan','$biaya')");
    }
    public function mencari_data_ukt1($idmhs){
        return $this->con->query(" SELECT * FROM ukt WHERE idmhs = '$idmhs' ORDER BY jatuhtempo ASC ");
    }




    #Laporan Pembayaran Page
    public function tampilkan_laporan_pembayaran($start,$end){
       return $this->con->query("SELECT ukt.*,nmmahasiswa.nim,nmmahasiswa.namamhs,nmmahasiswa.jurusan
							FROM ukt INNER JOIN nmmahasiswa ON ukt.idmhs=nmmahasiswa.idmhs
							WHERE tglbayar BETWEEN '$start' AND '$end'
							ORDER BY nobayar ASC");
    }
}