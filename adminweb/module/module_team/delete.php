<?php
//include file config.php
include('../../koneksi.php');
//jika benar mendapatkan GET id dari URL
if (isset($_GET['id'])) {
	//membuat variabel $id yang menyimpan nilai dari $_GET['id']
	$id = $_GET['id'];

	//melakukan query ke database, dengan cara SELECT data yang memiliki id yang sama dengan variabel $id
	$cek = mysqli_query($conect, "SELECT * FROM team WHERE id_team='$id'") or die(mysqli_error($conect));
	$data = mysqli_fetch_assoc($cek);
	//jika query menghasilkan nilai > 0 maka eksekusi script di bawah
	if (mysqli_num_rows($cek) > 0) {
		//query ke database DELETE untuk menghapus data dengan kondisi id=$id
		$del = mysqli_query($conect, "DELETE FROM team WHERE id_team='$id'") or die(mysqli_error($conect));
		$delPath = $path_team . $data['gambar_team'];
		unlink($delPath);
		if ($del) {
			echo '<script>alert("Berhasil menghapus data."); document.location="../../index.php?page=tampil_team";</script>';
		} else {
			echo '<script>alert("Gagal menghapus data."); document.location="../../index.php?page=tampil_team";</script>';
		}
	} else {
		echo '<script>alert("ID tidak ditemukan di database."); document.location="../../index.php?page=tampil_team";</script>';
	}
} else {
	echo '<script>alert("ID tidak ditemukan di database."); document.location="../../index.php?page=tampil_team";</script>';
}
