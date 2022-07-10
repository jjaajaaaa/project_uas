<?php
//menangkap value/data dari form
$id_jur      = $_POST['id_jur'];
$nama_jur      = $_POST['nama_jur'];
$kep_jur       = $_POST['kep_jur'];

//membuat koneksi database
include "koneksijurusan.php";

//membuat query insert data
$qry = "INSERT INTO jurusan VALUES ('$id_jur', '$nama_jur','$kep_jur')";
$exec = mysqli_query($con, $qry);

if ($exec) {
    echo "<script>alert('data berhasil di simpan'); window.location = 'form_jurusan.php'; </script>";
} else {
    echo "Data gagal di proses";
}
