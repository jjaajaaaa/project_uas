<?php 
include 'Models.php';
$modvar = new Models();
$sw = $modvar->tampil_data_user_mahasiswa($idmhs);

include 'header.php';
 ?>
<div class="container">
	<div class="page-header">
<h2 >EDIT DATA MAHASISWA</h2>
</div>
 	<?php if (isset($error)) : ?>
 		<p style="font-family: arial; color: red; size: 14px;">Silahkan Lengkapi Form Terlebih Dahulu</p>
 	<?php endif; ?>
 	<form action="" method="post">
 	<table class="table">
 		<tr>
 			<td>NIM</td>
 			<td>
 				<input class="form-control" type="hidden" name="id" value="<?= $sw['idmhs'] ?>">
 				<input class="form-control" type="text" name="nim" value="<?= $sw['nim'] ?>" size="30">
 			</td>
 		</tr>
 		<tr>
 			<td>Nama Mahasiswa</td>
 			<td>
 				<input class="form-control" type="text" name="namamhs" value="<?= $sw['namamhs'] ?>" maxlength="40" size="30">
 			</td>
 		</tr>
 		<tr>
 			<td>Jurusan</td>
 			<td>
 				<select class="form-control" name="jurusan">
 					<?php 
 					$data = $modvar->tampil_jurusan_mahasiswa();
 					while($jurusan = mysqli_fetch_assoc($data)){
 					 ?>
 					 <?php if($sw['jurusan'] == $jurusan['jurusan']) {
 					 	$selected = 'selected';
 					 }else {
 					 	$selected="";
 					 }
 					 ?>
 					 <option value="<?= $jurusan['nama_jur']; ?>"><?= $jurusan['nama_jur']; ?></option>
 					 <?php
 					}
 					 ?>
 							
 				</select>
 			</td>
 		</tr>
 		<tr>
 			<td>Semester</td>
 			<td>
 				<input class="form-control" type="text" name="semester" value="<?= $sw['semester'] ?>" >
 			</td>
 		</tr>
 		<tr>
 			<td>Biaya</td>
 			<td>
 				<input class="form-control" type="text" name="biaya" value="<?= $sw['biaya'] ?>" >
 			</td>
 		</tr>
 		<tr>
 			<td>Jatuh Tempo</td>
 			<td>
 				<input class="form-control" type="text" name="jatuhtempo" value="2022-10-10" >
 			</td>
 		</tr>
 		<tr>
 			<td></td>
 			<td>
 				<button class="btn btn-success" type="submit" name="ubah">UPDATE DATA</button>
 			</td>
 		</tr>
 	</table>
 </form>
 
 </body>
 </html>
<?php 
 if (isset($_POST['ubah']) ) {
 	$id = $_POST['id'];
 	$nim   		 = $_POST['nim'];
 	$namamhs 	 = $_POST['namamhs'];
 	$jurusan 	 = $_POST['jurusan'];
 	$semester 	 = $_POST['semester'];
 	$biaya  	 = $_POST['biaya'];
 	$awaltempo	 = $_POST['jatuhtempo'];
 	// $awaltempo	 = $_POST['jatuhtempo'];

 	$ubah = $modvar->update_user_mahasiswa($nim,$namamhs,$jurusan,$semester,$biaya,$id);

 	if ($ubah){
 		echo "
 		<script>
 		alert('data berhasil diedit');
 		document.location.href = 'datamahasiswa.php';
 		</script>
 		";
 	}else{
 		echo "
 		<script>
 		alert('data gagal diedit');
 		</script>
 		";
 	}
 }


  ?>
</div>
 <?php include 'footer.php'; ?>