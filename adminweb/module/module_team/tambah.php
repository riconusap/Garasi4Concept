<?php

include('../../koneksi.php');

?>

<center>
	<font size="6">Tambah Team</font>
</center>
<hr>

<?php
if (isset($_POST['submit'])) {
	$id				= $_POST['id_team'];
	$nama			= $_POST['nama'];
	$keahlian		= $_POST['keahlian'];
	$fb				= $_POST['uname_fb'];
	$ig 			= $_POST['uname_ig'];

	$filename 		= $_FILES['file']['name'];
	$fileTmp		= $_FILES['file']['tmp_name'];
	$fileSize		= $_FILES['file']['size'];
	$fileError		= $_FILES['file']['error'];
	$fileType		= $_FILES['file']['type'];

	$fileExt = explode('.', $filename);
	$fileActualExt = strtolower(end($fileExt));

	$allowedExt = array('jpg', 'jpeg', 'png', 'svg');

	if (in_array($fileActualExt, $allowedExt)) {
		if ($fileError === 0) {
			if ($fileSize < 10485760) {
				$fileNameNew = uniqid('', true) . "." . $fileActualExt;
				$fileDestination = 'assets/images/team/' . $fileNameNew;
				move_uploaded_file($fileTmp, $fileDestination);

				$cek = mysqli_query($conect, "SELECT * FROM team WHERE id_team='$id'") or die(mysqli_error($conect));
				if (mysqli_num_rows($cek) == 0) {
					mysqli_query($conect, "INSERT INTO team VALUES('$id','$nama','$keahlian', '$fileNameNew', '$fb', '$ig')") or die(mysqli_error($conect));
					echo '<script>
							alert("Berhasil menambahkan data.");
							document.location = "index.php?page=tampil_team";
							</script>';
				} else {
					echo '<script>
							alert("Tidak Berhasil Menambahkan Data ke Database.");
							document.location = "index.php?page=tampil_team";
						  </script>';
				}
			} else {
				echo
					'<script>
						alert("Ukuran File terlalu Besar.");
						document.location = "index.php?page=tampil_team";
					</script>';
			}
		} else {
			echo
				'<script>
					alert("Terjadi Kesalahan Saat Upload Gambar, Silahkan Periksa Kembali.");
					document.location = "index.php?page=tampil_team";
				</script>';
		}
	} else {
		echo
			'<script>
				alert("Ekstensi Gambar Tidak Di Izinkan.");
			</script>';
	}
}
?>


<form action="index.php?page=tambah_team" method="post" enctype="multipart/form-data">
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align">ID</label>
		<div class="col-md-6 col-sm-6">
			<input type="text" name="id_team" class="form-control" size="4" required>
		</div>
	</div>

	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align">Nama</label>
		<div class="col-md-6 col-sm-6">
			<input type="text" name="nama" class="form-control" required>
		</div>
	</div>

	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align">Keahlian</label>
		<div class="col-md-6 col-sm-6">
			<input type="text" name="keahlian" class="form-control" required>
		</div>
	</div>

	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align">Username Instagram</label>
		<div class="col-md-6 col-sm-6">
			<input type="text" name="uname_ig" class="form-control" required>
		</div>
	</div>

	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align">Username Facebook</label>
		<div class="col-md-6 col-sm-6">
			<input type="text" name="uname_fb" class="form-control" required>
		</div>
	</div>

	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align">UPLOAD GAMBAR</label>
		<div class="col-md-6 col-sm-6">
			<input type="file" name="file" required="required">
			<p style="color: red">Ukuran Maksimal : 10MB</p>
			<p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .gif | .svg</p>
		</div>
	</div>

	<div class="item form-group">
		<div class="col-md-6 col-sm-6 offset-md-3">
			<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
			<a href="index.php?page=tampil_produk" class="btn btn-warning">Kembali</a>
		</div>
	</div>
</form>
</div>