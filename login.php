<?php
session_start();
//skrip koneksi
include 'config/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | Kodim 0201/BS Medan</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="assets/loginRegister/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="assets/loginRegister/css/style.css">
</head>
<style>
    .button-back{
  background-color: #ada871;
  border: none;
  color: white;
  padding: 15px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  border-radius: 8px;
  font-size: 12px;
}
.button-back:hover{
    background-color: #68600c;
}
</style>
<body>

    <div class="main">

                <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="assets/loginRegister/images/1.jpg" alt="sing up image"></figure>
                        <a href="register.php" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Login</h2>
                        <form method="POST" class="register-form" id="login-form">
                            <?php 
					if(isset($_POST['login']))
					{
						$ambil = $koneksi->query("SELECT * FROM calon_komandan WHERE email='$_POST[email]' 
						AND password='$_POST[pass]'");
						$yangcocok = $ambil->num_rows;
						if ($yangcocok==1)
						{
							$_SESSION['calon_komandan']=$ambil->fetch_assoc();
							echo "<div class='alert alert-info'>Login Berhasil</div>";
                             echo "<meta http-equiv='refresh' content='1;url=profil.php'>";
					 

						}
						else{
							echo "<script>alert('email atau paswrod salah, silahkan periksa kembali');</script>";
                     echo "<script>location='login.php';</script>";
						}
						

					}
				?> 
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="email" name="email" id="email" placeholder="Input your Email" required/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Input your Password"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                <a href="index.php" type="button" class="button-back">Back to home</a>
                                <input type="submit" name="login" id="login" class="form-submit" value="Log in"/>
                            </div>
                        </form>
                      
                            
                        

                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="assets/loginRegister/vendor/jquery/jquery.min.js"></script>
    <script src="assets/loginRegister/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>