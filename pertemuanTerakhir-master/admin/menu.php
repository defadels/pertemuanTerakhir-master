<h2>Ini Halaman Menu</h2>

<table class="table table-hover table-bordered">
	<thead>
		<tr>
			<th>No.</th>
			<th>Nama Menu</th>
			<th>Harga</th>
			<th>Deskripsi</th>
			<th>Gambar</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor = 1; ?>
		<?php $ambil = $koneksi->query("SELECT * FROM menu"); ?>
		<?php while($a = $ambil->fetch_assoc()) { ?>
			<tr>
				<td><?php echo $nomor++ ?></td>
				<td><?php echo $a['nama_menu']; ?></td>
				<td>Rp. <?php echo number_format($a['harga_menu']); ?></td>
				<td><?php echo $a['deskripsi_menu']; ?></td>
				<td>
					<img src="../foto_menu/<?php echo $a['foto_menu']; ?>" width="100">
				</td>
				<td>
					<a href="" class="btn btn-info">Edit</a>
					<a href="index.php?halaman=hapusmenu&id=<?php echo $a['id_menu']; ?>" class="btn btn-danger">Hapus</a>
				</td>
			</tr>
		<?php } ?>
	</tbody>
</table>
<a href="index.php?halaman=tambahmenu" class="btn btn-success">Tambah Menu</a>