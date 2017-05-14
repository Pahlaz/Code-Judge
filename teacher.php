<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Code Judge | Teacher Login</title>

	<link rel="stylesheet" href="assets/css/header.css">
	<link rel="stylesheet" href="assets/css/post.css">
</head>
<body style="background: url('assets/img/bg.jpg');">
	<div class="wrapper">
		<?php include 'header.php'; ?>

		<ul class="fun">
			<li><a href="pq_form.php">Publish Practice Questions</a></li>
			<li><a href="pt_form.php">Publish Tests</a></li>
			<li><a href="ptq_form.php">Publish Questions in a Test</a></li>
			<li><a href="add_testcase_form.php">Add testcases to question</a></li>
			<li><a href="test_report.php">Test Report</a></li>
		</ul>
		
	</div>

	<script src="assets/lib/jquery/jquery-1.12.2.min.js" type="text/javascript"></script>
	<script src="assets/js/script.js" type="text/javascript"></script>
</body>
</html>

<!-- VALIDATING THE USER ON THE PAGE -->
<?php
	session_start();
	if(isset($_SESSION['id'])) {
		//user is logged in
		$post = $_SESSION['post'];

		// redirecting the a specific page based on the post of the user. 
		if($post != 'teacher') {
			header('location: index.php');
		}
	}
	else {
		//user is not logged in
		header('location: index.php');
	}
?>