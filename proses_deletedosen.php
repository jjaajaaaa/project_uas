<?php

//tangkap nim / value yang di delete
$nidn     = $_GET['nidn'];

//membuat koneksi ke database
include "koneksidosen.php";

//membuat query delete
$qry = "DELETE FROM dosen WHERE nidn = '$nidn'";
$exec = mysqli_query($con,$qry);

if ($exec) {
    echo "<script>alert('data berhasil di hapus'); window.location = 'form_dosen.php'; </script>";
} else {
    echo "Data gagal di proses";
}