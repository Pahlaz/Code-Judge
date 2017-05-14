<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Code Judge | Publish Questions</title>

	<link rel="manifest" href="manifest.json">
	<link rel="stylesheet" href="assets/css/header.css">
	<link rel="stylesheet" href="assets/css/publish_questions.css">
</head>
<body style="background: url('assets/img/bg1.png');">
	<div class="wrapper">
		<?php include 'header.php'; ?>

		<form id="pq" action="pq.php" method="post">
			<h1>Publish a question</h1>
			<div class="heading">
				<textarea name="heading" placeholder="Heading for the question" required></textarea>
			</div>
			<div class="desc">
				<textarea name="desc" placeholder="Description for the question" required></textarea>
			</div>

			<h2>Add a Testcase</h2>

			<div class="test-case">
				<input class="input" type="text" name="input" placeholder="Input" required>
				<input class="output" type="text" name="output" placeholder="Output" required>
			</div>

			<input type="submit" name="publish" value="Publish">

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