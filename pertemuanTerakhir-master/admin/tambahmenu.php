<h2>Tambah Menu</h2>
<hr>
<form method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama Menu</label>
		<input type="text" name="nama_menu" class="form-control">
	</div>
	<div class="form-group">
		<label>Harga Menu</label>
		<input type="number" name="harga_menu" class="form-control">
	</div>
	<div class="form-group">
		<label>Deskripsi</label>
		<textarea name="deskripsi_menu" rows="4" class="form-control"></textarea>
	</div>
	<div class="form-group">
		<label>Gambar</label>
		<input type="file" name="gambar" class="form-group">
	</div>
	<button class="btn btn-success" name="tambah">Tambah</button>
</form>

<!-- syntax php untuk menmbah menu -->

<?php 

// ambil data dari form simpan ke variabel
if (isset($_POST['tambah'])) {
$nama_menu 		= $_POST['nama_menu'];
$harga_menu 	= $_POST['harga_menu'];
$deskripsi_menu = $_POST['deskripsi_menu'];

// untuk menyimpan gambar
$foto 			= $_FILES['gambar']['name'];
$lokasi			= $_FILES['gambar']['tmp_name'];
move_uploaded_file($lokasi, "../foto_menu/".$foto);

// syntax untuk mengupload ke database
$sql = $koneksi->query("INSERT INTO menu (nama_menu, harga_menu, deskripsi_menu, foto_menu) VALUES ('$nama_menu','$harga_menu', '$deskripsi_menu', '$foto')");


if ($sql) {
		//jika berhasil
	echo "<script>
			alert('Menu berhasil di tambah');
			document.location.href='index.php?halaman=menu';
		</script>";
}else{
	//jika gagal
	echo "<script>
			alert('Menu gagal di tambah');
			document.location.href='index.php?halaman=menu';
		</script>";
	}
}

 ?>	