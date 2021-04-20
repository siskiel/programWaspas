<?php
//koneksi ke database
include 'config/koneksi.php';
?>
<?php session_start(); ?>
<!doctype html>
<html lang="en">

<head>

    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--====== Title ======-->
    <title>SPK - Calon Pelatih PSMS Medan</title>

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="assets/index/assets/images/1.png" type="image/png">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="assets/index/assets/css/bootstrap.min.css">

    <!--====== Line Icons css ======-->
    <link rel="stylesheet" href="assets/index/assets/css/LineIcons.css">

    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="assets/index/assets/css/magnific-popup.css">

    <!--====== Slick css ======-->
    <link rel="stylesheet" href="assets/index/assets/css/slick.css">

    <!--====== Animate css ======-->
    <link rel="stylesheet" href="assets/index/assets/css/animate.css">

    <!--====== Default css ======-->
    <link rel="stylesheet" href="assets/index/assets/css/default.css">

    <!--====== Style css ======-->
    <link rel="stylesheet" href="assets/index/assets/css/style.css">


</head>

<body>

    <!--====== PRELOADER PART START ======-->

    <div class="preloader">
        <div class="loader">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== PRELOADER PART ENDS ======-->

    <!--====== NAVBAR PART START ======-->

    <section class="header-area">
        <div class="navbar-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="#">
                                <h2 class="text-light">PSMS</h2>
                            </a>

                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarEight" aria-controls="navbarEight" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarEight">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item active">
                                        <a class="page-scroll" href="#home">Beranda</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#about">Tentang</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#portfolio">Sejarah PSMS</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#pricing">Data Calon Pelatih</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#contact">Contact</a>
                                    </li>

                                    <!-- jika sudah login ada session calon pelatih -->
                                    <?php if (isset($_SESSION['calon_pelatih'])): ?>
                                    <li class="nav-item"><a class="page-scroll" href="profil.php">Profil</a></li>
                                    <li class="nav-item"><a class="page-scroll" href="pengumuman.php">Pegumuman</a></li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="logout.php">Logout</a>
                                    </li>
                                    <?php else: ?>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="login.php">Login</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="register.php">Daftar</a>
                                    </li>
                                    <?php endif ?>
                                </ul>
                            </div>

                        </nav> <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- navbar area -->


        <!--====== NAVBAR PART ENDS ======-->