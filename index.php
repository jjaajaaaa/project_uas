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
    <form action="proses_insertmhs.php" enctype="multipart/form-data" method="POST">
        <fieldset>
            <h3 class="text-3xl text-center my-4 animate-bounce">Form input biodata</h3>
            <div class="container mx-auto rounded-lg bg-slate-300 p-3">
                <b>Lengkapi Biodata Dengan Benar</b>
                <table>
                    <tr>
                        <td>NIM (Nomor induk Mahasiswa)</td>
                        <td>:</td>
                        <td><input type="text" name="nim" class="rounded-lg my-2 ml-3 w-52"></td>
                    </tr>
                    <tr>
                        <td>Nama Mahasiswa</td>
                        <td>:</td>
                        <td><input type="text" name="nama" class="rounded-lg my-2 ml-3 w-52"></td>
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
                            <input type="radio" name="jk" value="1" class="ml-3">Laki - Laki
                            <input type="radio" name="jk" value="2" class="ml-3">Perempuan
                        </td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td><input type="text" name="alamat" class="rounded-lg my-2 ml-3 w-52"></td>
                    </tr>
                    <tr>
                        <td>No HP</td>
                        <td>:</td>
                        <td><input type="number" name="no_hp" class="rounded-lg my-2 ml-3 w-52"></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td><input type="email" name="email" class="rounded-lg my-2 ml-3 w-52"></td>
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
                        </select>
                    </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><input type="submit" value="simpan" class="rounded-lg bg-slate-400 p-2 my-2" name="button" ></td>
                    </tr>
                </table>
            </div>
        </fieldset>

    </form>

    <h2 class="text-2xl text-center my-2">Data Mahasiswa</h2>
    <table class="table-auto mx-auto border">
        <tr class="bg-slate-300">
            <td class="border p-4">NIM</td>
            <td class="border p-4">Nama Mahasiswa</td>
            <td class="border p-4">Jurusan</td>
            <td class="border p-4">Gender</td>
            <td class="border p-4">Alamat</td>
            <td class="border p-4">No HP</td>
            <td class="border p-4">Email</td>
            <td class="border p-4">Foto</td>
            <td class="border p-4">Dosen Wali</td>
            <td class="border p-4">Action</td>
        </tr>
        <?php
        include "koneksimhs.php";
        
        //inner join
        $qry = "SELECT mhs.*, jur.nama_jur, dos.nama FROM mahasiswa AS mhs
                INNER JOIN jurusan AS jur ON mhs.kode_jurusan = jur.id_jur
                INNER JOIN dosen AS dos ON mhs.nidn = dos.nidn ORDER BY mhs.nim";
        $exec = mysqli_query($con, $qry);
        while ($data = mysqli_fetch_array($exec)) 
        
        //tampil data
        { ?>
            <tr>
                <td class="border p-4"><?php echo $data['nim'] ?></td>
                <td class="border p-4"><?php echo $data['nama_mhs'] ?></td>
                <td class="border p-4"><?php echo $data['nama_jur'] ?></td>
                <td class="border p-4"><?php echo $data['jenis_kelamin'] ?></td>
                <td class="border p-4"><?php echo $data['alamat'] ?></td>
                <td class="border p-4"><?php echo $data['no_hp'] ?></td>
                <td class="border p-4"><?php echo $data['email'] ?></td>
                <td img src="foto/<?php echo $data['foto'] ?>"
                alt="<?php echo $data['nama_mhs'] ?> - Profile picture"
                style="object-fit: cover; width: 80px; height: 80px;"></td>
                <td class="border p-4"><?php echo $data['nama'] ?></td>
                <td>
                    <a href="editmhs.php?nim=<?php echo $data['nim'] ?>" class="rounded-xl bg-slate-300 p-2"><button>Edit</button></a>
                    | <a href="proses_deletemhs.php?nim=<?php echo $data['nim'] ?>" class="rounded-xl bg-slate-300 p-2"><button>Delete</button></a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>