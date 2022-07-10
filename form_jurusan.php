<html>

<head>
    <title>PROJECT UAS</title>
    <link rel="stylesheet" href="../output.css">
</head>

<body>
    <div class="block mb-3 p-2 bg-slate-300">
        <a href="../Mahasiswa/index.php" class="block ml-3">Data Mahasiswa</a>
        <a href="../Jurusan/form_jurusan.php" class="block ml-3">Data Jurusan</a>
        <a href="../Dosen/form_dosen.php" class="block ml-3">Data Dosen</a>
        <a href="../Pembayaran/login_pembayaran.php" class="block ml-3">Pembayaran</a>
    </div>
    <!-- <link rel="stylesheet" href="style.css"> -->

    <form action="proses_insertjurusan.php" method="POST">
        <fieldset>
            <h3 class="text-3xl text-center my-4 animate-bounce">Form Jurusan</h3>
            <div class="container rounded-lg p-3 mx-auto bg-slate-300">
                <b>Lengkapi Data Jurusan Sesuai Minat</b>
                <table>
                    <tr>
                        <td>ID Jurusan</td>
                        <td>:</td>
                        <td><input type="text" name="id_jur" class="rounded-lg my-2 ml-3 w-52"></td>
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
                        <td><?php
                        include "koneksijurusan.php";
                        $qry = "SELECT * FROM dosen";
                        $exec = mysqli_query($con, $qry);
                      ?>
                        <select name="kep_jur" id="kep_jur" class="rounded-lg my-2 ml-3 w-52">
                          <?php while ($row1 = mysqli_fetch_array($exec)):; ?>
                            <option value="<?php echo $row1[0]; ?>"><?php echo $row1[1]; ?></option>
                          <?php endwhile; ?>
                        </select></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><input type="submit" value="simpan" class="rounded-lg bg-slate-400 p-2 my-2"></td>
                    </tr>
                </table>
            </div>
        </fieldset>

    </form>
    <h2 class="text-2xl text-center my-2">Tabel Jurusan</h2>
    <table class="table-auto mx-auto border">
        <tr class="bg-slate-300">
            <th width="100" class="border p-4">ID Jurusan</th>
            <th width="225" class="border p-4">Nama Jurusan</th>
            <th width="350" class="border p-4">Kepala Jurusan</th>
            <th width="125" class="border p-4">Action</th>
        </tr>
        <?php
        include "koneksijurusan.php";

        $qry = "SELECT * FROM jurusan";
        $exec = mysqli_query($con, $qry);
        while ($data = mysqli_fetch_array($exec)) 
        
        //tampil data
        {?>
            <td align='center' class="border p-4"><?php echo $data['id_jur'] ?></td>
            <td align='center' class="border p-4"><?php echo $data['nama_jur'] ?></td>
            <td align='center' class="border p-4"><?php echo $data['kep_jur'] ?></td>
            <td align='center' class="border p-4">
                <a href="editjurusan.php?id_jur=<?php echo $data['id_jur'] ?>"><input type='button' class='btn-edit' class="rounded-xl bg-slate-300 p-2">Edit</button></a> |
                <a href="proses_deletejurusan.php?id_jur=<?php echo $data['id_jur'] ?>"><input type='button' class='btn-delete' class="rounded-xl bg-slate-300 p-2">Delete</button></a>
            </td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>