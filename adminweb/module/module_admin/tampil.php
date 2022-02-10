<?php
//memasukkan file config.php
include('../../koneksi.php');
?>

<div class="container" style="margin-top:20px">
	<center>
		<font size="6">DATA ADMIN</font>
	</center>
	<hr>
	<a href="index.php?page=tambah_admin"><button class="btn btn-dark right">Tambah Data</button></a>
	<div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action">
			<thead>
				<tr>
					<th>NO.</th>
					<th>NAMA</th>
					<th>Email</th>
					<th>Level</th>
					<th>Foto</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				//query ke database SELECT tabel produk
				$sql = mysqli_query($conect, "SELECT * FROM tb_admin") or die(mysqli_error($conect));
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
							<td>' . $data['nama_admin'] . '</td>
							<td>' . $data['email_admin'] . '</td>
							<td>' . $data['level_admin'] . '</td>
							<td>' . '
							<img src="assets/images/admin/' . $data['foto_admin'] . '" alt="' . $data['foto_admin'] . '" style="width: 130px" />
							</td>

							<td>
								<a href="module/module_admin/delete.php?id=' . $data['email_admin'] . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
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