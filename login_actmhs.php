<?php
//menangkap value form login
$username = $_POST['username'];
$password = $_POST['password'];

//koneksi ke database
include "koneksimhs.php";

//nyocokin data
$qry = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
$exec = mysqli_query($con, $qry);
$data = mysqli_fetch_array($exec);

if(!empty($data)){
    //berhasil
    session_start();
    $_SESSION['username'] = $data['username'];
    echo "<script>alert('login berhasil'); window.location = 'index.php'; </script>";

}else{
    //gagal
    echo "<script>alert('login gagal, silahkan cek username dan password dengan benar'); window.location = 'loginmhs.php'; </script>";
}