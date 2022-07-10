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
$qry = "UPDATE dosen SET nama = '$nama', pendidikan = '$pendidikan', tgl_lahir = '$tgl_lahir',
        gender = '$gender', alamat = '$alamat', no_hp = '$no_hp', email = '$email' WHERE nidn = '$nidn' ";
$exec = mysqli_query($con, $qry);

if ($exec) {
    echo "<script>alert('data berhasil di update'); window.location = 'form_dosen.php'; </script>";
} else {
    echo "Data gagal di proses";
}
