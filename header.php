<?php
//koneksi ke database
include 'config/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SPK - KODIM 0201/BS Medan</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/home/img/icon.png" rel="icon">
  <link href="assets/home/img/icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/home/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/home/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/home/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/home/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/home/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/home/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/home/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/home/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Bethany - v2.0.0
  * Template URL: https://bootstrapmade.com/bethany-free-onepage-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container">
      <div class="header-container d-flex align-items-center">
        <div class="logo mr-auto">
          <h1 class="text-light"><a href="index.html"><span>KODIM O201/BS</span></a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html"><img src="assets/home/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav class="nav-menu d-none d-lg-block">
          <ul>
            <li class="active"><a href="#header">Home</a></li>
            <li><a href="index.php#about">About</a></li>
            <li><a href="index.php#services">Profil Kodim</a></li>
            <li><a href="index.php#why-us">Data Calon Komandan</a></li>
         
            <li><a href="index.php#contact">Contact</a></li>
            <?php session_start(); ?>
			<!-- jika sudah login ada session calon komandan -->
      <?php if (isset($_SESSION["calon_komandan"])): ?>
        <li><a href="profil.php">Profil</a></li>
        <li><a href="pengumuman.php">Pegumuman</a></li>
                    <li class="get-started"><a href="logout.php">Logout</a></li>

                    <!-- selain itu tampilan belum login  -->
			<?php else: ?>
            <li><a href="register.php">Registrasi</a></li>
            <li class="get-started"><a href="login.php">Login</a></li>
            <?php endif ?>
          </ul>
        </nav><!-- .nav-menu -->
      </div><!-- End Header Container -->
    </div>
  </header><!-- End Header -->
