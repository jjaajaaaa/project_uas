<?php 
include 'Models.php';
$modvar = new Models();

include 'header.php';
 ?>
<div class="container">
	<div class="page-header">
<h2>TAMBAH DATA MAHASISWA </h2>
</div>
 	<form action="" method="post">
 	<table class="table">
 		<tr>
 			<td>NIM</td>
 			<td>
 				<input class="form-control" type="text" name="nim" placeholder="Masukan Nomor Induk Mahasiswa" size="30" required>
 			</td>
 		</tr>
 		<tr>
 			<td>Nama Mahasiswa</td>
 			<td>
 				<input class="form-control" type="text" name="namamhs" placeholder="Masukan Nama Mahasiswa" maxlength="40" size="30" required>
 			</td>
 		</tr>
 		<tr>
 			<td>jurusan</td>
 			<td>
 				<select class="form-control" name="jurusan" required>
 					<option value="" selected >-pilih jurusan-</option>
 					<?php 
 					$data = $modvar->tampil_jurusan_mahasiswa();
 					while($dta = mysqli_fetch_assoc($data)){
 					 ?>
 					 <option value="<?= $dta['nama_jur']; ?>"><?= $dta['nama_jur']; ?></option>
 					 <?php 
 					}
 					?>
 				</select>
 			</td>
 		</tr>
 		<tr>
 			<td>Semester</td>
 			<td>
 				<input class="form-control" type="text" name="semester" value="1/2" >
 			</td>
 		</tr>
 		<tr>
 			<td>Biaya</td>
 			<td>
 				<input class="form-control" type="text" name="biaya" value="6000000" >
 			</td>
 		</tr>
 		<tr>
 			<td>Jatuh Tempo</td>
 			<td>
 				<input class="form-control" type="text" name="jatuhtempo" value="2023-10-10" >
 			</td>
 		</tr>
 		<tr>
 			<td></td>
 			<td>
 				<button class="btn btn-success" type="submit" name="tambah">SIMPAN DATA</button>
 			</td>
 		</tr>
 	</table>
 </form>
 
 </body>
 </html>
<?php 
 if (isset($_POST['tambah']) ) {
 	$nim   		 = $_POST['nim'];
 	$namamhs 	 = $_POST['namamhs'];
 	$jurusan 	 = $_POST['jurusan'];
 	$semester 	 = $_POST['semester'];
 	$biaya  	 = $_POST['biaya'];
 	$awaltempo	 = $_POST['jatuhtempo'];

 	$bulanIndo =[
 		'01' => 'januari',
 		'02' => 'Februari',
 		'03' => 'Maret',
 		'04' => 'April',
 		'05' => 'Mei',
 		'06' => 'Juni',
 		'07' => 'Juli',
 		'08' => 'Agustus',
 		'09' => 'September',
 		'10' => 'Oktober',
 		'11' => 'November',
 		'12' => 'Desember',
 	];

 	if ($nim == '' || $namamhs == '' || $jurusan ==''){
 		echo "Form belum lengkap";
 	}else {
 		$simpan = $modvar->tambah_user_mahasiswa ($nim,$namamhs,$jurusan,$semester,$biaya);

 		if(!$simpan) {
 			echo "
 			<script>
 			alert('data gagal disimpaan')
 			</script>
 			";
 		}else {
 			// ambil data id terakhir
 			$ds = $modvar->get_last_id_tambah_user();
 			$idmhs = $ds['idmhs'];
 			// var_dump($idsiswa); die;
 			// taggihan dan simpan di tabel ukt
 			for ($i=0 ; $i<12;$i++){
 				// tanggal jatuh tempo setiap tanggal 10
 				$jatuhtempo = date("Y-m-d" , strtotime("+$i month" , strtotime($awaltempo)));

 				$bulan = $bulanIndo[date('m' ,strtotime($jatuhtempo))]."  ".date('Y', strtotime($jatuhtempo));
 				// simpan data
 				$modvar->tambah_data_ukt($idmhs,$jatuhtempo,$bulan,$biaya);
 			}
 			header('Location: datamahasiswa.php');
 			
 			
 		}
 	}
 }


  ?>
</div>
 <?php include 'footer.php'; ?>