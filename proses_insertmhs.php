<?php
//menangkap value/data dari form
$nim        = $_POST['nim'];
$nama_mhs   = $_POST['nama'];
$jurusan    = $_POST['jurusan'];
$jk         = $_POST['jk'];
$alamat     = $_POST['alamat'];
$no_hp      = $_POST['no_hp'];
$email      = $_POST['email'];
$nidn       = $_POST['dosen'];

//membuat koneksi database
include "koneksimhs.php";

$target_dir = "foto/";
$target_file = $target_dir . ($_FILES['foto']['name']);
$filetype = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$filename = ($_FILES['foto']['name']);
$uploadOk = 1;

//untuk mengecek ketersediaan foto/file
if (file_exists($target_file)) {
    echo "Maaf, foto sudah tersedia";
    $uploadOk = 0;
}

//untuk mengecek size foto/file
if ($_FILES['foto']['size'] > 500000) {
    echo "Maaf, foto terlalu besar";
    $uploadOk = 0;
}

//untuk filter type file/foto
if($filetype != 'jpg' && $filetype != 'png' && $filetype != 'jpeg'){
    echo "Maaf, type file tidak diijinkan";
}

if($uploadOk == 0){
    echo "File tidak dapat di proses";
    }else{
      if(move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)){
        include "koneksimhs.php";

        $qry = "INSERT INTO mahasiswa 
        VALUES ('$nim','$nama_mhs','$jurusan','$jk','$alamat','$no_hp',
        '$email','$nidn','$filename')";
        $exec = mysqli_query($con,$qry);
          if($exec){
            echo "<script>alert('Upload foto berhasil di proses'); window.location='index.php'</script>";
            }
        }else{
          echo "<script>alert('Gagal upload foto'); window.location='index.php'</script>";
    }
}
?>