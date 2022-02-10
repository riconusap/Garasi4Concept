<?php
//memasukkan file config.php
include('../../koneksi.php');
?>


<div class="container" style="margin-top:20px">
	<center>
		<font size="6">DATA TEAM</font>
	</center>
	<hr>
	<a href="index.php?page=tambah_team"><button class="btn btn-dark right">Tambah Team</button></a>
	<div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action">
			<thead>
				<tr>
					<th>NO.</th>
					<th>ID</th>
					<th>NAMA</th>
					<th>KEAHLIAN</th>
					<th>FOTO</th>
					<th>USERNAME FACEBOOK</th>
					<th>USERNAME INSTAGRAM</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				//query ke database SELECT tabel produk
				$sql = mysqli_query($conect, "SELECT * FROM team") or die(mysqli_error($conect));
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
							<td>' . $data['id_team'] . '</td>
							<td>' . $data['nama_team'] . '</td>
							<td>' . $data['keahlian'] . '</td>
							<td>' . '
							<img src="assets/images/team/' . $data['gambar_team'] . '" alt="' . $data['nama_team'] . '" style="width: 130px" />
							</td>
							<td>' . $data['fb_uname'] . '</td>
							<td>' . $data['instagram_uname'] . '</td>
							<td>
								<a href="index.php?page=edit_team&id=' . $data['id_team'] . '" class="btn btn-secondary btn-sm">Edit</a>
								<a href="module/module_team/delete.php?id=' . $data['id_team'] . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
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