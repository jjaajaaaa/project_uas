<?php
//menangkap value/data dari form
$id_jur     = $_POST['id_jur'];
$nama_jur   = $_POST['nama_jur'];
$kep_jur    = $_POST['kep_jur'];

//membuat koneksi database
include "koneksijurusan.php";

//membuat query insert data
$qry = "UPDATE jurusan SET nama_jur = '$nama_jur', kep_jur = '$kep_jur' WHERE id_jur = '$id_jur' ";
$exec = mysqli_query($con, $qry);

if ($exec) {
    echo "<script>alert('data berhasil di update'); window.location = 'form_jurusan.php'; </script>";
} else {
    echo "Data gagal di proses";
}
