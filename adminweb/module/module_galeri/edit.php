<?php

include('../../koneksi.php');
$sql = mysqli_query($conect, "UPDATE produk SET gambar_produk='$fileNameNew', nama_produk='$nama_produk', harga='$harga', keterangan_produk='$keterangan', spesifikasi='$spek' WHERE id_produk='$id_produk'") or die(mysqli_error($conect));
?>


<div class="container" style="margin-top:20px">
	<center>
		<font size="6">Edit Data Produk</font>
	</center>

	<hr>

	<?php
	//jika sudah mendapatkan parameter GET id dari URL
	if (isset($_GET['id'])) {
		//membuat variabel $id untuk menyimpan id dari GET id di URL
		$id = $_GET['id'];

		//query ke database SELECT tabel produk berdasarkan id = $id
		$select = mysqli_query($conect, "SELECT * FROM gambar WHERE id_galeri='$id'") or die(mysqli_error($conect));

		//jika hasil query = 0 maka muncul pesan error
		if (mysqli_num_rows($select) == 0) {
			echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
			exit();
			//jika hasil query > 0
		} else {
			//membuat variabel $data dan menyimpan data row dari query
			$data = mysqli_fetch_assoc($select);
		}
	}
	?>

	<?php
	if (isset($_POST['submit'])) {
		$judul	= $_POST['judul'];

		$oldFile 		= $data['nama_gambar'];
		$filename 		= $_FILES['gambar']['name'];
		$fileTmp		= $_FILES['gambar']['tmp_name'];
		$fileSize		= $_FILES['gambar']['size'];
		$fileError		= $_FILES['gambar']['error'];
		$fileType		= $_FILES['gambar']['type'];

		$fileExt = explode('.', $filename);
		$fileActualExt = strtolower(end($fileExt));

		$allowedExt = array('jpg', 'jpeg', 'png', 'svg');
		if (empty($filename)) {
			mysqli_query($conect, "UPDATE gambar SET judul='$judul' WHERE id_galeri='$id'") or die(mysqli_error($conect));
			echo '<script>
							alert("Berhasil menambahkan data.");
							document.location = "index.php?page=tampil_galeri";
							</script>';
		} else if (in_array($fileActualExt, $allowedExt)) {
			$delPath = $path_galeri . $oldFile;
			unlink($delPath);
			if ($fileError === 0) {
				if ($fileSize < 10485760) {
					$fileNameNew = uniqid('', true) . "." . $fileActualExt;
					$fileDestination = $path_galeri . $fileNameNew;
					move_uploaded_file($fileTmp, $fileDestination);
					mysqli_query($conect, "UPDATE gambar SET nama_gambar='$fileNameNew', judul='$judul' WHERE id_galeri='$id'") or die(mysqli_error($conect));
					echo '<script>
							alert("Berhasil menambahkan data.");
							document.location = "index.php?page=tampil_galeri";
							</script>';
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

	<form action="index.php?page=edit_galeri&id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">

		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">ID</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="id" class="form-control" size="4" value="<?php echo $data['id_galeri']; ?>" readonly required>
			</div>
		</div>

		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Gambar</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="judul" class="form-control" value="<?php echo $data['judul']; ?>" required>
			</div>
		</div>

		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">GAMBAR</label>
			<div class="col-md-6 col-sm-6">
				<img src="assets/images/galeri/<?php echo $data['nama_gambar'] ?>" style="width: 130px" />
			</div>
		</div>

		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">UPLOAD GAMBAR</label>
			<div class="col-md-6 col-sm-6 ">
				<input id="fileUpload" type="file" name="gambar">
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
				<input id="tombol" type="submit" name="submit" class="btn btn-primary" value="Simpan">
				<a href="index.php?page=tampil_produk" class="btn btn-warning">Kembali</a>
			</div>
		</div>

	</form>

</div>