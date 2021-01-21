<?php 

session_start();

// mengambil id yang dari URL 
$id_menu = $_GET['id'];

//cara menghapus keranjnag

unset($_SESSION['keranjang'][$id_menu]);

// alihkan ke halaman keranjang

header('location:keranjang.php');

 ?>