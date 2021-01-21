<?php 

// cek data yang diambil
$cek = $koneksi->query("SELECT * FROM menu WHERE id_menu= '$_GET[id]'");
$pecah = $cek->fetch_assoc();
$foto = $pecah['foto_menu'];

echo "<pre>";

	print_r($pecah);
echo "</pre>";

if (file_exists("../foto_menu/$foto")) {
	unlink("../foto_menu/$foto");
}

$sql = $koneksi->query("DELETE FROM menu WHERE id_menu = '$_GET[id]' ");

// pengkondisian 

if ($sql) {
		//jika berhasil
	echo "<script>
			alert('Menu berhasil di hapus');
			document.location.href='index.php?halaman=menu';
		</script>";
}else{
	//jika gagal
	echo "<script>
			alert('Menu gagal di hapus');
			document.location.href='index.php?halaman=menu';
		</script>";
	}
	
 ?>