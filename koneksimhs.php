<?php

$con = mysqli_connect("localhost", "root", "", "bo203");

if ($con) {
    //echo "koneksi berhasil";
} else {
    echo "Konek gagal : " . mysqli_connect_error();
}
