<?php
//memasukkan file config.php
include('../../koneksi.php');
?>

<div class="container" style="margin-top:20px">
	<center>
		<font size="6">DATA GALERYI</font>
	</center>
	<hr>
	<a href="index.php?page=tambah_galeri"><button class="btn btn-dark right">Tambah Data</button></a>
	<div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action">
			<thead>
				<tr>
					<th>NO.</th>
					<th>NAMA GAMBAR</th>
					<th>GAMBAR</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				//query ke database SELECT tabel produk
				$sql = mysqli_query($conect, "SELECT * FROM gambar") or die(mysqli_error($conect));
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if (mysqli_num_rows($sql) > 0) {
					//membuat variabel $no untuk menyimpan nomor urut
					$no = 1;
					//melakukan perulangan while dengan dari dari query $sql
					while ($data = mysqli_fetch_assoc($sql)) {
						//menampilkan data perulangan
						echo '
						<tr>
							<td>' . $no . '</td>
							<td>' . $data['judul'] . '</td>
							<td>' . '
							<img src="assets/images/galeri/' . $data['nama_gambar'] . '" alt="' . $data['nama_gambar'] . '" style="width: 130px" />
							</td>

							<td>
								<a href="index.php?page=edit_galeri&id=' . $data['id_galeri'] . '" class="btn btn-secondary btn-sm">Edit</a>
								<a href="module/module_galeri/delete.php?id=' . $data['id_galeri'] . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
							</td>
						</tr>
						';
						$no++;
					}
					//jika query menghasilkan nilai 0
				} else {
					echo '
					<tr>
						<td colspan="8">Tidak ada data.</td>
					</tr>
					';
				}
				?>
			<tbody>
		</table>
	</div>
</div>