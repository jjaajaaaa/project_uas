<?php
//menangkap value/data dari form
$nidn        = $_POST['nidn'];
$nama        = $_POST['nama'];
$pendidikan  = $_POST['pendidikan'];
$tgl_lahir   = $_POST['tgl_lahir'];
$gender      = $_POST['gender'];
$alamat      = $_POST['alamat'];
$no_hp       = $_POST['no_hp'];
$email       = $_POST['email'];

//membuat koneksi database
include "koneksidosen.php";

//membuat query insert data
$qry = "INSERT INTO dosen VALUES ('$nidn','$nama','$pendidikan','$tgl_lahir','$gender','$alamat','$no_hp','$email')";
$exec = mysqli_query($con, $qry);

if ($exec) {
    echo "<script>alert('data berhasil di simpan'); window.location = 'form_dosen.php'; </script>";
} else {
    echo "Data gagal di proses";
}
