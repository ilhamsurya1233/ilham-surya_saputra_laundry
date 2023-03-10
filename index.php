<?php 

include_once 'controllers/c_login.php';
error_reporting(0);

if ($_SESSION['role'] == "admin") {
	header("location:views/pengguna/home.php");
  } else if ($_SESSION['role'] == "kasir" ){
	header("location:views/pengguna/home.php");
  } else if ($_SESSION['role'] == "owner" ){
	header("location:views/pengguna/home.php");
  } else {
	
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V4</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="assets/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="assets/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="assets/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">
<!--===============================================================================================-->
<style>
       
video{
	position: absolute;
	top:0;
	left:0;
	width: 100%;
	height: 100%;
	overflow: hidden;
	object-fit: cover;
	z-index: -2;
}

body::after {
	content: "";
	width: 100%;
	height: 100vh;
	background: black;
	opacity: 0.0;
	position: absolute;
	top: 0;
	left: 0;
	z-index: -1;
}
.limiter .wrap-login100{
 position:relative;
 top:85px;
 left:400px;
}
.limiter .wrap-login100{
 background-color:rgba(29,3,68,0.43);
 color:#eaf4f4;
}
.wrap-login100 .validate-form span{
 color:rgba(224,219,255,0.65);
}
.validate-form .validate-input input[type=text]{
 color:#ded4f1;
}

/* Input */
.validate-form .validate-input input[type=password]{
 color:#ded4f1;
}
    </style>
</head>
<body>
	

	<div class="limiter">
		
	<div class="fullscreen-bg">
            <video loop muted autoplay poster="poster.jpg" class="fullscreen-bg__video">
                <source src="assets\vidio\km_20230310_720p.mp4" type="video/mp4">
            </video>
        </div>
		<!-- <div class="fullscreen-bg">
            <video loop muted autoplay poster="poster.jpg" class="fullscreen-bg__video">
                <source src="12345.mp4" type="video/mp4">
            </video>
        </div> -->
		<!-- <div class="container-login100" style="background-image: url('assets/images/wp4866962.jpg');"> -->
			<div class="wrap-login100 p-l-70 p-r-55 p-t-65 p-b-54" style="opacity: 0.9;">
				
				<form class="login100-form validate-form" action="" method="post">

                    
					<span class="login100-form-title p-b-49">
						LOGIN
					</span>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
						<span class="label-input100">Username<requered/span>
						<input class="input100" type="text" name="username" placeholder="Type your username">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="Type your password">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
					
					<div class="text-right p-t-8 p-b-31">
						<a href="#">
							Forgot password?
						</a>
					</div>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="login">
								Login
							</button>
						</div>
					</div>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="assets/assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/vendor/bootstrap/js/popper.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/vendor/daterangepicker/moment.min.js"></script>
	<script src="assets/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="assets/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="assets/js/main.js"></script>

	
</body>
</html>