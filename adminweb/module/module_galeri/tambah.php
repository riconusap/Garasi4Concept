<?php

include('../../koneksi.php');

?>

<center>
	<font size="6">Tambah Data</font>
</center>
<hr>

<?php
if (isset($_POST['submit'])) {

	$id 	= $_POST['id'];
	$judul	= $_POST['judul'];

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
				$fileDestination = $path_galeri . $fileNameNew;
				move_uploaded_file($fileTmp, $fileDestination);

				$cek = mysqli_query($conect, "SELECT * FROM gambar WHERE id_galeri='$id'") or die(mysqli_error($conect));
				if (mysqli_num_rows($cek) == 0) {
					mysqli_query($conect, "INSERT INTO gambar VALUES('$id' ,'$fileNameNew','$judul')") or die(mysqli_error($conect));
					echo '<script>
							alert("Berhasil menambahkan data.");
							document.location = "index.php?page=tampil_galeri";
							</script>';
				} else {
					echo '<script>
							alert("Tidak Berhasil Menambahkan Data ke Database.");
							document.location = "index.php?page=tampil_galeri";
						  </script>';
				}
			} else {
				echo
					'<script>
						alert("Ukuran File terlalu Besar.");
						document.location = "index.php?page=tampil_galeri";
					</script>';
			}
		} else {
			echo
				'<script>
					alert("Terjadi Kesalahan Saat Upload Gambar, Silahkan Periksa Kembali.");
					document.location = "index.php?page=tampil_galeri";
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


<form action="index.php?page=tambah_galeri" method="post" enctype="multipart/form-data">

	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align">ID</label>
		<div class="col-md-6 col-sm-6">
			<input type="text" name="id" class="form-control" required>
			<p style="color: red">Masukan 8 Karakter</p>
		</div>
	</div>

	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align">Judul</label>
		<div class="col-md-6 col-sm-6">
			<input type="text" name="judul" class="form-control" required>
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
		<label class="col-form-label col-md-3 col-sm-3 label-align">GAMBAR PENGGANTI</label>
		<div id="image-holder" class="col-md-6 col-sm-6 ">
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