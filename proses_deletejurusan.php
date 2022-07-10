<?php

//tangkap nim / value yang di delete
$id_jur     = $_GET['id_jur'];

//membuat koneksi ke database
include "koneksijurusan.php";

//membuat query delete
$qry = "DELETE FROM jurusan WHERE id_jur = '$id_jur'";
$exec = mysqli_query($con,$qry);

if ($exec) {
    echo "<script>alert('data berhasil di hapus'); window.location = 'form_jurusan.php'; </script>";
} else {
    echo "Data gagal di proses";
}
