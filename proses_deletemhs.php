<?php

//tangkap nim / value yang di delete
$nim     = $_GET['nim'];

//membuat koneksi ke database
include "koneksimhs.php";

//membuat query delete
$qry = "DELETE FROM mahasiswa WHERE nim = '$nim'";
$exec = mysqli_query($con,$qry);

if ($exec) {
    echo "<script>alert('data berhasil di hapus'); window.location = 'index.php'; </script>";
} else {
    echo "Data gagal di proses";
}