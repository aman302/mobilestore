<!DOCTYPE html>
<html>
<head>
	<title>Login page</title>
	  
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">

</head>
<body>
<?php
include"header.php";
?>

	

</center>
<div class=hero>
	<div class=form-box>
		<div class="button-box">
			<div id="btn"></div>
			<button type="button" class="toggle-btn" onclick="login()">Log In</button>
			<button type="button" class="toggle-btn" 
			onclick="register()">Register</button>
		</div>

		<form id="login" class="input-group" action="validation.php" method="post">

			<div class="form-group">
				<label>Username</label>
				<input type="text" name="user" class="form-control" required="">
				
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" name="password" class="form-control" required="">
				
			</div>
			<input type="checkbox" class="checkbox"><span>Remember Password</span>
		<a href=""><button type="submit" class="submit-btn">Login</button></a>	
			
		</form>
		<form id="register" class="input-group" action="registration.php" method="post">
			<div class="form-group">
				<label>Username</label>
				<input type="text" name="user" class="form-control" required="">
				
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" name="password" class="form-control" required="">
				
			</div>
			<input type="checkbox" class="checkbox"><span>I agree to the terms & conditions</span>
			<button type="submit" class="submit-btn">Register</button>
			
		</form>
	</div>

</div>
<script>
	var x = document.getElementById("login");
	var y = document.getElementById("register");
	var z= document.getElementById("btn");
	function register(){
		x.style.left = "-400px";
		y.style.left = "50px";
		z.style.left = "110px";

	}
	function login(){
		x.style.left = "50px";
		y.style.left = "450px";
		z.style.left = "0px";

	}
	

</script>
</body>
</html>