<?php 

session_start();
include 'koneksi.php';

 ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin | Login</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
    <div class="container">
        <div class="row text-center ">
            <div class="col-md-12">
                <br /><br />
                <h2> Login Admin </h2>
               
                <h5>( Login untuk masuk kehalaman admin )</h5>
                 <br />
            </div>
        </div>
         <div class="row ">
                  <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <strong>   Enter Details To Login </strong>  
                            </div>
                            <div class="panel-body">
                                <form method="POST">
                                       <br />
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                            <input type="text" class="form-control" placeholder="Masukkan Username " name="user"required/>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                            <input type="password" class="form-control"  placeholder="Masukkan Password" name="pass" required/>
                                        </div>
                                   
                                  <button class="btn btn-primary" name="login">Login</button>
                                  </form>
                                  <?php

                                  if (isset($_POST['login'])) {
                                    $user = $_POST['user'];
                                    $pass  = $_POST['pass'];

                                    $sql = $koneksi->query("SELECT * FROM admin WHERE username='$user' AND password='$pass'");

                                    $cek = $sql->num_rows;

                                    if ($cek == 1) {
                                      $_SESSION['admin'] = $sql->fetch_assoc();

                                      //arahkan ke halaman checkout
                                      echo "<script>alert('Login sukses');</script>";
                                      echo "<script>document.location.href='index.php';</script>";
                                    }
                                    else{
                                      echo "<script>alert('Login gagal');</script>";
                                      echo "<script>document.location.href='login.php';</script>";
                                    }
                                  }

                                   ?>
                            </div>
                        </div>
                    </div>
            </div>
    </div>


     <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
   
</body>
</html>
