<?php
session_start();
//skrip koneksi
include 'config/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="assets/login/images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/login/css/util.css">
    <link rel="stylesheet" type="text/css" href="assets/login/css/main.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <?php 
                    if (isset($_POST["signup"]))
                    {
                    $name= $_POST["name"];
                    $email = $_POST["email"];
                    $password = $_POST["password"];
                    $password2 =$_POST["password2"];
                                       //cek password
                    if ($password !== $password2) {
                        
                     echo "<script>alert('Konfirmasi password tidak sesuai');</script>";
                     echo "<script>location='register.php';</script>";

                     return false ;   
                    }

                    $ambil= $koneksi->query("SELECT * FROM calon_pelatih WHERE email='$email'");
                    $yangcocok= $ambil->num_rows;
                    if ($yangcocok==1)
                    {
                     echo "<script>alert('Pendaftaran Gagal, Email Sudah digunakan');</script>";
                     echo "<script>location='reg.php';</script>";
                     }
                     else{
                     $koneksi->query("INSERT INTO calon_pelatih(nama,email,password) VALUES('$name','$email','$password')");

                     echo "<div class='alert alert-info'>Data tersimpan , silahkan Login</div>";
                     echo "<meta http-equiv='refresh' content='1;url=login.php'>";
                     }
                     }
                    ?>
                <form class="login100-form validate-form p-l-55 p-r-55 p-t-178" method="POST" autocomplete="off">

                    <span class="login100-form-title">
                        Sign Up
                    </span>
                    <div class="wrap-input100 m-b-16">
                        <input class="input100" type="text" name="name" placeholder="Nama" autofocus>
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 m-b-16">
                        <input class="input100" type="email" name="email" placeholder="Email" autofocus>
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 m-b-16">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 m-b-16">
                        <input class="input100" type="password" name="password2" placeholder="Confirm Password">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="container-login100-form-btn p-t-20 p-b-23">
                        <button class="login100-form-btn" type="submit" name="signup" id="signup">
                            Register
                        </button>
                    </div>

                    <div class="flex-col-c p-t-70 p-b-40">
                        <span class="txt1 p-b-9">
                            Already have an account?
                        </span>

                        <a href="login.php" class="txt3">
                            Sign in now
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!--===============================================================================================-->
    <script src="assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="assets/login/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="assets/login/vendor/bootstrap/js/popper.js"></script>
    <script src="assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->

</body>

</html>