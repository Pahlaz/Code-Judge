<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Code Judge | Publish Test</title>

	<link rel="manifest" href="manifest.json">
	<link rel="stylesheet" href="assets/css/header.css">
	<link rel="stylesheet" href="assets/css/test.css">
</head>
<body style="background: url('assets/img/bg1.png');">
	<div class="wrapper">
		<?php include 'header.php';?>

		<form id="pt" action="pt.php" method="post">
			<h1>Publish a test</h1>
			<div class="heading">
				<textarea name="heading" placeholder="Heading for the Test" required></textarea>
			</div>
			<div class="desc">
				<textarea name="desc" placeholder="Description for the Test" required></textarea>
			</div>
			
			<input type="password" name="pass" placeholder="Enter test password">			

			<input type="submit" name="pt" value="Publish">
		</form>
	</div>

	<script src="assets/lib/jquery/jquery-1.12.2.min.js" type="text/javascript"></script>
	<script src="assets/js/script.js" type="text/javascript"></script>
</body>
</html>

<!-- VALIDATING THE USER ON THE PAGE -->
<?php
	session_start();

	if(isset($_SESSION['id'])) {	//user is logged in
		// to redirect unauthorized users
		if($_SESSION['post'] != 'teacher') {
			header('location: index.php');
			exit();
		}
	}
	else {	//user is not logged in
		header('location: index.php');
	}
?>