<?php

session_start();
session_destroy();

echo "<script>alert('Terima kasih, Silahkan login kembali'); window.location = 'loginmhs.php'; </script>";