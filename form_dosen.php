<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../output.css">
    <title>PROJECT UAS</title>
</head>

<body>

    <div class="block mb-3 p-2 bg-slate-300">
        <a href="../Mahasiswa/index.php" class="block ml-3">Data Mahasiswa</a>
        <a href="../Jurusan/form_jurusan.php" class="block ml-3">Data Jurusan</a>
        <a href="../Dosen/form_dosen.php" class="block ml-3">Data Dosen</a>
        <a href="../Pembayaran/login_pembayaran.php" class="block ml-3">Pembayaran</a>
    </div>
    <form action="proses_insertdosen.php" method="POST">
        <fieldset>
            <h3 class="text-3xl text-center my-4 animate-bounce">Form Input Biodata Dosen</h3>
            <div class="container mx-auto rounded-lg bg-slate-300 p-3">

                <b>Lengkapi Biodata Dengan Benar</b>
                <table>
                    <tr>
                        <td>NIDN</td>
                        <td>: </td>
                        <td><input type="text" name="nidn" class="rounded-lg my-2 ml-3 w-52"></td>
                    </tr>
                    <tr>
                        <td>Nama Dosen</td>
                        <td>: </td>
                        <td><input type="text" name="nama" class="rounded-lg my-2 ml-3 w-52"></td>
                    </tr>
                    <tr>
                        <td>Pendidikan</td>
                        <td>: </td>
                        <td><input type="text" name="pendidikan" class="rounded-lg my-2 ml-3 w-52"></td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td>: </td>
                        <td><input type="date" name="tgl_lahir" class="rounded-lg my-2 ml-3 w-52"></td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td>:</td>
                        <td>
                            <input type="radio" name="gender" value="1" class="ml-3">Laki - Laki
                            <input type="radio" name="gender" value="2" class="ml-3">Perempuan
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
                        <td><input type="number" name="no_hp" class="rounded-lg my-2 ml-3 w-52 "></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td><input type="email" name="email" class="rounded-lg my-2 ml-3 w-52"></td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="simpan" class="rounded-lg bg-slate-400 p-2 my-2"></td>
                    </tr>
                </table>
            </div>
        </fieldset>

    </form>

    <h2 class="text-2xl text-center my-2">Data Dosen</h2>
    <table class="table-auto mx-auto border">
        <tr class="bg-slate-300">
            <td class="border p-4">NIDN</td>
            <td class="border p-4">Nama Dosen</td>
            <td class="border p-4">Pendidikan</td>
            <td class="border p-4">Tanggal Lahir</td>
            <td class="border p-4">Gender</td>
            <td class="border p-4">Alamat</td>
            <td class="border p-4">No HP</td>
            <td class="border p-4">Email</td>
            <td class="border p-4">Action</td>
        </tr>
        <?php
        include "koneksidosen.php";

        $qry = "SELECT * FROM dosen";
        $exec = mysqli_query($con, $qry);
        while ($data = mysqli_fetch_array($exec)) 
        
        //tampil data
        { ?>
            <tr class="">
                <td class="border p-4"><?php echo $data['nidn'] ?></td>
                <td class="border p-4"><?php echo $data['nama'] ?></td>
                <td class="border p-4"><?php echo $data['pendidikan'] ?></td>
                <td class="border p-4"><?php echo $data['tgl_lahir'] ?></td>
                <td class="border p-4"><?php echo $data['gender'] ?></td>
                <td class="border p-4"><?php echo $data['alamat'] ?></td>
                <td class="border p-4"><?php echo $data['no_hp'] ?></td>
                <td class="border p-4"><?php echo $data['email'] ?></td>
                <td class="border p-4">
                    <a href="editdosen.php?nidn=<?php echo $data['nidn'] ?>" class="rounded-xl bg-slate-300 p-2"><button>edit</button></a>
                    | <a href="proses_deletedosen.php?nidn=<?php echo $data['nidn'] ?>" class="rounded-xl bg-slate-300 p-2"><button>Delete</button></a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>