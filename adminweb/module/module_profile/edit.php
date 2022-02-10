<?php
include('../../koneksi.php');
include('../../security.php');
?>


<div class="container" style="margin-top:10px; padding:auto;">
	<center>
		<font size="6">SETTING</font>
	</center>

	<hr>

	<?php
	//jika sudah mendapatkan parameter GET id dari URL
	if (isset($_GET['id'])) {
		//membuat variabel $id untuk menyimpan id dari GET id di URL
		$id = $_GET['id'];

		//query ke database SELECT tabel produk berdasarkan id = $id
		$select = mysqli_query($conect, "SELECT * FROM tb_admin WHERE email_admin='$id'") or die(mysqli_error($conect));

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
		$name	= $_POST['name'];

		$oldFile 		= $data['foto_admin'];
		$filename 		= $_FILES['file']['name'];
		$fileTmp		= $_FILES['file']['tmp_name'];
		$fileSize		= $_FILES['file']['size'];
		$fileError		= $_FILES['file']['error'];
		$fileType		= $_FILES['file']['type'];

		$fileExt = explode('.', $filename);
		$fileActualExt = strtolower(end($fileExt));

		$allowedExt = array('jpg', 'jpeg', 'png', 'svg');
		if (empty($filename)) {
			mysqli_query($conect, "UPDATE tb_admin SET nama_admin='$name' WHERE email_admin='$id'") or die(mysqli_error($conect));
			echo '<script>
							alert("Berhasil menambahkan data.");
							document.location = "index.php?page=edit_profile";
							</script>';
		}
		if (in_array($fileActualExt, $allowedExt)) {
			$delPath = $path_admin . $oldFile;
			unlink($delPath);
			if ($fileError === 0) {
				if ($fileSize < 10485760) {
					$fileNameNew = uniqid('', true) . "." . $fileActualExt;
					$fileDestination = $path_admin . $fileNameNew;
					move_uploaded_file($fileTmp, $fileDestination);
					mysqli_query($conect, "UPDATE tb_admin SET nama_admin='$name', foto_admin='$fileNameNew' WHERE email_admin='$id'") or die(mysqli_error($conect));
					echo '<script>
							alert("Berhasil menambahkan data.");
							document.location = "index.php?page=edit_profile";
							</script>';
				} else {
					echo
						'<script>
						alert("Ukuran File terlalu Besar.");
						document.location = "index.php?page=edit_profile";
					</script>';
				}
			} else {
				echo
					'<script>
					alert("Terjadi Kesalahan Saat Upload Gambar, Silahkan Periksa Kembali.");
					document.location = "index.php?page=edit_profile";
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

	<form action="index.php?page=edit_profile&id=<?php echo $admin['email_admin']; ?>" method="post" enctype="multipart/form-data">

		<div class="item form-group">
			<div class="col-md-6 col-sm-6">
				<div class="card d-flex d-xl-flex justify-content-center align-items-center m-auto justify-content-xl-center align-items-xl-center">
					<div class="card-body" style="margin: 0px;padding: 10px;">

						<div class="image_holder" style="width: 100%;margin: auto;padding: 36px;"><img class="img-circle d-lg-flex justify-content-lg-center align-items-lg-center" src="assets/images/admin/<?= $admin['foto_admin'] ?>" style="width: 350px;height:350px" />
							<h1 class="d-lg-flex justify-content-lg-center" style="font-size: 24px;font-family: Acme, sans-serif;margin: 10px;">Nama</h1>
							<input type="text" name="name" style="width: 100%;" value="<?= $admin['nama_admin'] ?>" />
							<p></p>
							<input id="fileUpload" type="file" name="file">
							<p style="color: red">Ukuran Maksimal : 10MB</p>
							<p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .gif | .svg</p>
							<div class="col-md-6 col-sm-6 offset-md-3">
								<input id="tombol" type="submit" name="submit" class="btn btn-primary" value="Simpan">
								<a href="index.php?" class="btn btn-warning">Kembali</a>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>


	</form>

</div>