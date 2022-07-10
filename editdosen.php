<?php
$nidn = $_GET['nidn'];
include "koneksidosen.php";

$qry = "SELECT * FROM dosen WHERE nidn = '$nidn'";
$exec = mysqli_query($con, $qry);
$data = mysqli_fetch_array($exec);
?>
<html>

<head>
    <title>Form Update</title>
    <link rel="stylesheet" href="../output.css">
</head>

<body>
    <div class="block mb-3 p-2 bg-slate-300">
        <a href="../Mahasiswa/index.php" class="block ml-3">Data Mahasiswa</a>
        <a href="../Jurusan/form_jurusan.php" class="block ml-3">Data Jurusan</a>
        <a href="../Dosen/form_dosen.php" class="block ml-3">Data Dosen</a>
        <a href="../Mahasiswa/logoutmhs.php" class="block ml-3">Logout</a>
    </div>
    <form action="proses_updatedosen.php" method="POST">
        <fieldset>
            <h3 class="text-3xl text-center my-4 animate-bounce">Form Update Biodata Dosen</h3>
            <div class="container mx-auto rounded-lg bg-slate-300 p-3">
                <b>Lengkapi Biodata Dengan Benar</b>
                <table>
                    <tr>
                        <td>NIDN</td>
                        <td>:</td>
                        <td><input type="text" name="nidn" value="<?php echo $data['nidn'] ?>" class="rounded-lg my-2 ml-3 w-52" readonly></td>
                    </tr>
                    <tr>
                        <td>Nama Dosen</td>
                        <td>:</td>
                        <td><input type="text" name="nama" value="<?php echo $data['nama'] ?>" class="rounded-lg my-2 ml-3 w-52"></td>
                    </tr>
                    <tr>
                        <td>Pendidikan</td>
                        <td>:</td>
                        <td><input type="text" name="pendidikan" value="<?php echo $data['pendidikan'] ?>" class="rounded-lg my-2 ml-3 w-52"></td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td>:</td>
                        <td><input type="date" name="tgl_lahir" value="<?php echo $data['tgl_lahir'] ?>" class="rounded-lg my-2 ml-3 w-52"></td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td>:</td>
                        <td>
                            <?php if ($data['gender'] == 1) { ?>
                                <input type="radio" name="gender" value="1" class="ml-3" checked>Laki - Laki
                                <input type="radio" name="gender" value="2" class="ml-3">Perempuan
                            <?php } else { ?>
                                <input type="radio" name="gender" value="1" class="ml-3">Laki - Laki
                                <input type="radio" name="gender" value="2" class="ml-3" checked>Perempuan
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td><input type="text" name="alamat" value="<?php echo $data['alamat'] ?>" class="rounded-lg my-2 ml-3 w-52"></td>
                    </tr>
                    <tr>
                        <td>No HP</td>
                        <td>:</td>
                        <td><input type="number" name="no_hp" value="<?php echo $data['no_hp'] ?>" class="rounded-lg my-2 ml-3 w-52"></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td><input type="email" name="email" value="<?php echo $data['email'] ?>" class="rounded-lg my-2 ml-3 w-52"></td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Update" class="rounded-lg bg-slate-400 p-2 my-2"></td>
                    </tr>
                </table>
        </fieldset>

    </form>

</body>

</html>