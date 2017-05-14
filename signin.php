<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Code Judge | Sign In</title>

	<link rel="manifest" href="manifest.json">
	<link rel="stylesheet" href="assets/css/header.css">
	<link rel="stylesheet" href="assets/css/signin.css">
</head>
<body>
	<div class="wrapper">
		<?php include 'header.php'; ?>

		<div class="connect-container">
			<div class="profile-pic">
				<img src="assets/img/user.png">
			</div>
			<form class="signin" action="login_user.php" method="post">
			  	<div class="input-group">
				    <input type="email" id="email" name="email" required autofocus>
				    <label>Your Email Address</label>
			  	</div>
			  	<div class="input-group">
				    <input type="password" id="pass" name="password" required>
				    <label>Your Password</label>
			  	</div>
				
				<input type="submit" name="login" title="Login" value="Login">
				
				<p>Not Registered! <a href="signup.php" title="Sign Up">Sign Up </a>here</p>	
			</form>
		</div>

		<div id="test"></div>
	</div>

	<script src="assets/lib/jquery/jquery-1.12.2.min.js" type="text/javascript"></script>	
	<script src="assets/js/script.js" type="text/javascript"></script>
	<script src="assets/js/signin.js" type="text/javascript"></script>
</body>
</html>

<!-- VALIDATING THE USER ON THE PAGE -->
<?php
	session_start();
	// USER IS LOGGED IN
	if(isset($_SESSION['id'])) {
		// FETCHING THE POST OF LOGGED IN USER
		$post = $_SESSION['post'];

		// redirecting to a specific page based on the post of the user. 
		if($post == 'student') {
			header('location: main.php');
		}
		else{
			header('location: '.$post.'.php');
		}
	}
?>