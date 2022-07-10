<?php
$id_jur = $_GET['id_jur'];
include "koneksijurusan.php";

$qry = "SELECT * FROM jurusan WHERE id_jur = '$id_jur'";
$exec = mysqli_query($con, $qry);
$data = mysqli_fetch_array($exec);
?>
<html>

<head>
    <title>Latihan form</title>
    <link rel="stylesheet" href="../output.css">
</head>

<body>
    <div class="block mb-3 p-2 bg-slate-300">
        <a href="../Mahasiswa/index.php" class="block ml-3">Data Mahasiswa</a>
        <a href="../Jurusan/form_jurusan.php" class="block ml-3">Data Jurusan</a>
        <a href="../Dosen/form_dosen.php" class="block ml-3">Data Dosen</a>
        <a href="../Mahasiswa/logoutmhs.php" class="block ml-3">Logout</a>
    </div>
    <form action="proses_updatejurusan.php" method="POST">
        <fieldset>
            <h3 class="text-3xl text-center my-4 animate-bounce">Form Update Jurusan</h3>
            <div class="container mx-auto rounded-lg bg-slate-300 p-3">
                <b>Lengkapi Jurusan Dengan Benar</b>
                <table>
                    <tr>
                        <td>ID Jurusan</td>
                        <td>:</td>
                        <td><input type="text" name="id_jur" value="<?php echo $data['id_jur'] ?>" class="rounded-lg my-2 ml-3 w-52" readonly> </td>
                    </tr>
                    <tr>
                        <td>Nama Jurusan</td>
                        <td>:</td>
                        <td><select name="nama_jur" class="rounded-lg my-2 ml-3 w-52">
                                <option>Sistem Komputer</option>
                                <option>Manajemen Informatika</option>
                                <option>Sistem Informasi</option>
                                <option>Teknologi Informasi</option>
                                <option>Bisnis Digital</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Kepala Jurusan</td>
                        <td>:</td>
                        <td><input type="text" name="kep_jur" value="<?php echo $data['kep_jur'] ?>" class="rounded-lg my-2 ml-3 w-52"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><input type="submit" value="Update" class="rounded-lg bg-slate-400 p-2 my-2"></td>
                    </tr>
                </table>
            </div>
        </fieldset>

    </form>

</body>

</html>