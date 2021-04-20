<?php
session_start();
//skrip koneksi
include 'config/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
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
                <form class="login100-form validate-form p-l-55 p-r-55 p-t-178" method="POST" id="login-form">
                    <?php 
					if(isset($_POST['login']))
					{
						$ambil = $koneksi->query("SELECT * FROM calon_pelatih WHERE email='$_POST[email]' 
						AND password='$_POST[password]'");
						$yangcocok = $ambil->num_rows;
						if ($yangcocok==1)
						{
							$_SESSION['calon_pelatih']=$ambil->fetch_assoc();
							echo "<div class='alert alert-info'>Login Berhasil</div>";
                             echo "<meta http-equiv='refresh' content='1;url=profil.php'>";
					 

						}
						else{
                            echo "<div class='alert alert-info'>email atau paswrod salah, silahkan periksa kembali</div>";
                             echo "<meta http-equiv='refresh' content='1;url=login.php'>";
							
						}
						

					}
				?>
                    <span class="login100-form-title">
                        Login Calon Pelatih
                    </span>

                    <div class="wrap-input100 m-b-16">
                        <input class="input100" type="email" name="email" placeholder="Email@gmail.com" autofocus>
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="container-login100-form-btn p-t-20 p-b-23">
                        <button class="login100-form-btn" type="submit" name="login" id="login">
                            Login
                        </button>
                    </div>

                    <div class="flex-col-c p-t-70 p-b-40">
                        <span class="txt1 p-b-9">
                            Don’t have an account?
                        </span>

                        <a href="register.php" class="txt3">
                            Regiater now
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