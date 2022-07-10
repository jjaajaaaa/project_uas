<?php
$nim = $_GET['nim'];
include "koneksimhs.php";

$qry = "SELECT * FROM mahasiswa WHERE nim = '$nim'";
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
    <form action="proses_updatemhs.php" method="POST">
        <fieldset>
            <h3 class="text-3xl text-center my-4 animate-bounce">Form Update biodata</h3>
            <div class="container mx-auto rounded-lg bg-slate-300 p-3">
                <b>Lengkapi Biodata Dengan Benar</b>
                <table>
                    <tr>
                        <td>NIM (Nomor induk Mahasiswa)</td>
                        <td>:</td>
                        <td><input type="text" name="nim" value="<?php echo $data['nim'] ?>" class="rounded-lg my-2 ml-3 w-52" readonly></td>
                    </tr>
                    <tr>
                        <td>Nama Mahasiswa</td>
                        <td>:</td>
                        <td><input type="text" name="nama" value="<?php echo $data['nama_mhs'] ?>" class="rounded-lg my-2 ml-3 w-52"></td>
                    </tr>
                    <tr>
                        <td>Jurusan</td>
                        <td>:</td>
                        <td><?php
                        include "koneksimhs.php";
                        $qry = "SELECT * FROM jurusan";
                        $exec = mysqli_query($con, $qry);
                      ?>
                        <select name="jurusan" id="jurusan" class="rounded-lg my-2 ml-3 w-52">
                          <?php while ($row1 = mysqli_fetch_array($exec)):; ?>
                            <option value="<?php echo $row1[0]; ?>"><?php echo $row1[1]; ?></option>
                          <?php endwhile; ?>
                        </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td>
                            <?php if ($data['jenis_kelamin'] == 1) { ?>
                                <input type="radio" name="jk" value="1" class="ml-3" checked>Laki - Laki
                                <input type="radio" name="jk" value="2" class="ml-3">Perempuan
                            <?php } else { ?>
                                <input type="radio" name="jk" value="1" class="ml-3">Laki - Laki
                                <input type="radio" name="jk" value="2" class="ml-3" checked>Perempuan
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
                        <td>Foto</td>
                        <td>:</td>
                        <td><input type="file" name="foto" class="rounded-lg my-2 ml-3 w-52"></td>
                    </tr>
                    <tr>
                        <td>Dosen Wali</td>
                        <td>:</td>
                        <td><?php
                        include "koneksimhs.php";
                        $qry = "SELECT * FROM dosen";
                        $exec = mysqli_query($con, $qry);
                      ?>
                        <select name="dosen" id="dosen" class="rounded-lg my-2 ml-3 w-52">
                          <?php while ($row1 = mysqli_fetch_array($exec)):; ?>
                            <option value="<?php echo $row1[0]; ?>"><?php echo $row1[1]; ?></option>
                          <?php endwhile; ?>
                        </select></td>
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