<?php 

session_start();
include 'koneksi.php';
	
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
</head>
<body>

	<nav class="navbar navbar-default">
		<div class="container">
			<ul class="nav navbar-nav">
				<li><a href="index.php">Home</a></li>
				<li><a href="keranjang.php">Keranjang</a></li>
				<li><a href="checkout.php">Checkout</a></li>
			</ul>
		</div>
	</nav>

<section>
<div class="container">
	<h1>DAFTAR MENU</h1>
	<hr>
	<div class="row">
	<?php $ambil = $koneksi->query("SELECT * FROM menu"); ?>	
	<?php while($menu = $ambil->fetch_assoc()) { ?>
	<div class="col-md-3">
		<div class="thumbnail">
			<img class="img-responsive" src="foto_menu/<?php echo $menu['foto_menu']; ?>"  width="100%">
		<div class="caption">
			<h4><?php echo $menu['nama_menu']; ?></h4>
			<h5>Rp. <?php echo number_format($menu['harga_menu']);  ?></h5>
			<a href="pesan.php?id=<?php echo $menu['id_menu']; ?>" class="btn btn-primary btn-sm">Pesan</a>
		</div>	
		</div>
	</div>
<?php } ?>
	</div>
</div>
</section>

</body>
</html>