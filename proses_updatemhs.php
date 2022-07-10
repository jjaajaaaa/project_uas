<?php
//menangkap value/data dari form
$nim        = $_POST['nim'];
$nama_mhs   = $_POST['nama'];
$jurusan    = $_POST['jurusan'];
$jk         = $_POST['jk'];
$alamat     = $_POST['alamat'];
$no_hp      = $_POST['no_hp'];
$email      = $_POST['email'];

//membuat koneksi database
include "koneksimhs.php";

//membuat query insert data
$qry = "UPDATE mahasiswa SET nama_mhs = '$nama_mhs', kode_jurusan = '$jurusan',
        jenis_kelamin = '$jk', alamat = '$alamat', no_hp = '$no_hp', email = '$email' WHERE nim = '$nim' ";
$exec = mysqli_query($con, $qry);

if ($exec) {
    echo "<script>alert('data berhasil di update'); window.location = 'index.php'; </script>";
} else {
    echo "Data gagal di proses";
}
