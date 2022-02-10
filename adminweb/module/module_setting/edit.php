<?php
include('../../koneksi.php');
?>


<div class="container" style="margin-top:20px">
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
		$select = mysqli_query($conect, "SELECT * FROM setting WHERE id='$id'") or die(mysqli_error($conect));

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
		$ig				= $_POST['ig'];
		$fb				= $_POST['fb'];
		$twitter		= $_POST['twitter'];

		$perkenalan		= $_POST['perkenalan'];

		$maps			= $_POST['maps'];
		$telepon		= $_POST['telepon'];
		$email			= $_POST['email'];
		$yt				= $_POST['yt'];

		$oldFile2	 	= $data['gambar2'];
		$oldFile1		= $data['gambar1'];
		$oldFile 		= $data['gambar'];

		$gambar2	 		= $_FILES['gambar2']['name'];
		$fileTmp2			= $_FILES['gambar2']['tmp_name'];

		$gambar1	 		= $_FILES['gambar1']['name'];
		$fileTmp1			= $_FILES['gambar1']['tmp_name'];

		$gambar		 		= $_FILES['gambar']['name'];
		$fileTmp			= $_FILES['gambar']['tmp_name'];

		$delPath2 = $path_setting . $oldFile2;
		$delPath1 = $path_setting . $oldFile1;
		$delPath = $path_setting . $oldFile;

		$delPathNew = array($delPath, $delPath1, $delPath2,);
		$fileTmpNew = array($fileTmp, $fileTmp1, $fileTmp2,);
		$imageVars = array($gambar, $gambar1, $gambar2,);

		$updateImages = "";

		for ($i = 0; $i < 3; $i++) {
			if (!empty($imageVars[$i])) {
				//the image variable has a value, add it to the UPDATE query
				$imageNum = (string)$i; //cast index as string
				if ($imageNum == "0") {
					//first image does not have a number
					$imageNum = "";
				}
				unlink($delPathNew[$i]);
				$fileDestination = 'assets/images/setting/' . $imageVars[$i];
				move_uploaded_file($fileTmpNew[$i], $fileDestination);
				$updateImages .= ",gambar" . $imageNum . "='" . $imageVars[$i] . "'";
			}
		}
		$sql = "UPDATE setting SET link_fb='$fb',link_twitter='$twitter',link_ig='$ig',perkenalan='$perkenalan',no_telp='$telepon',email='$email',maps='$maps',yt='$yt'" . $updateImages . "WHERE id='$id'";
		mysqli_query($conect, "$sql") or die(mysqli_error($conect));
		echo '<script>
                alert("Berhasil menambahkan data.");
                document.location = "index.php?page=edit_setting&id=1";
                </script>';
	}
	?>

	<form action="index.php?page=edit_setting&id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">

		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">LINK IG</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="ig" class="form-control" value="<?php echo $data['link_ig']; ?>" required>
			</div>
		</div>

		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">LINK TWITTER</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="twitter" class="form-control" value="<?php echo $data['link_twitter']; ?>" required>
			</div>
		</div>

		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">LINK FB</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="fb" class="form-control" value="<?php echo $data['link_fb']; ?>" required>
			</div>
		</div>

		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Perkenalan</label>
			<div class="col-md-6 col-sm-6">
				<textarea style="height: 150px;" type="text" name="perkenalan" class="form-control" required><?php echo $data['perkenalan']; ?></textarea>
			</div>
		</div>

		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">NO TELEPON</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="telepon" class="form-control" value="<?php echo $data['no_telp']; ?>" required>
			</div>
		</div>

		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">EMAIL</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="email" class="form-control" value="<?php echo $data['email']; ?>" required>
			</div>
		</div>

		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">MAPS</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="maps" class="form-control" value="<?php echo $data['maps']; ?>" required>
			</div>
		</div>

		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">YOUTUBE LINK</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="yt" class="form-control" value="<?php echo $data['yt']; ?>" required>
			</div>
		</div>

		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">FOTO TOKO FISIK</label>
			<div class="col-md-6 col-sm-6">
				<img src="assets/images/setting/<?php echo $data['gambar'] ?>" style="width: 130px" />
			</div>
		</div>

		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">UPLOAD FOTO FISIK</label>
			<div class="col-md-6 col-sm-6 ">
				<input id="fileUpload" type="file" name="gambar">
				<p style="color: red">Ukuran Maksimal : 10MB</p>
				<p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .gif | .svg</p>
			</div>
		</div>

		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align"> LOGO </label>
			<div class="col-md-6 col-sm-6">
				<img src="assets/images/setting/<?php echo $data['gambar1'] ?>" style="width: 130px" />
			</div>
		</div>

		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">UPLOAD LOGO</label>
			<div class="col-md-6 col-sm-6 ">
				<input id="fileUpload" type="file" name="gambar1">
				<p style="color: red">Ukuran Maksimal : 10MB</p>
				<p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .gif | .svg</p>
			</div>
		</div>

		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align"> NAVBAR BACKGROUND</label>
			<div class="col-md-6 col-sm-6">
				<img src="assets/images/setting/<?php echo $data['gambar2'] ?>" style="width: 130px" />
			</div>
		</div>

		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">UPLOAD NAVBAR BACKGROUND</label>
			<div class="col-md-6 col-sm-6 ">
				<input id="fileUpload" type="file" name="gambar2">
				<p style="color: red">Ukuran Maksimal : 10MB</p>
				<p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .gif | .svg</p>
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