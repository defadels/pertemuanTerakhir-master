<?php

session_start();
include 'koneksi.php';

if(!isset($_SESSION['keranjang'])){
	echo "
	<script>
		alert('keranjang kosong');
		location.href='index.php';
	</script>
	";
}
?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<title>Keranjang</title>
 	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
 </head>
 <body>
 <?php  

	//echo "<pre>";
	//print_r($_SESSION['keranjang']);
	//echo "</pre>";

 ?>
 	<nav class="navbar navbar-default">
		<div class="container">
			<ul class="nav navbar-nav">
				<li><a href="index.php">Home</a></li>
				<li><a href="keranjang.php">Keranjang</a></li>
				<li><a href="checkout.php">Checkout</a></li>
			</ul>
		</div>
	</nav>
<div class="container">
 <table class="table table-bordered">

 	<thead>
 		<tr>
 			<th>Nama Menu</th>
 			<th>Gambar</th>
 			<th>Harga</th>
 			<th>Jumlah</th>
 			<th>Total</th>
 			<th>Action</th>
 		</tr>
 	</thead>
 	<tbody>
 <?php foreach($_SESSION['keranjang'] as $id_menu => $jumlah): ?>
 <?php $ambil = $koneksi->query("SELECT * FROM menu WHERE id_menu='$id_menu' ");?>

	<?php  
	$m = $ambil->fetch_assoc();

	// echo "<pre>";
	// print_r($m);
	// echo "</pre>";

	?>
 		<tr>			
 			<td><?php echo $m['nama_menu']; ?></td>
 			<td>
 				<img src="foto_menu/<?php echo $m['foto_menu']; ?>" width=100;>
 			</td>
 			<td>Rp.<?php echo number_format($m['harga_menu']); ?></td>
 			<td><?php echo $jumlah; ?></td>
 			<td>Rp.<?php echo number_format($m['harga_menu']*$jumlah); ?></td>
 			<td>
 				<a href="hapuskeranjang.php?id=<?php echo $id_menu; ?>" class="btn btn-danger">Hapus</a>
 			</td>
 		</tr>
 		<?php endforeach ?>
 	</tbody>
 </table>
 
 <a href="index.php" class="btn btn-primary btn-sm">Tambah menu</a>
 <a href="checkout.php" class="btn btn-default btn-sm">Checkout</a>
</div>
</body>
</html>