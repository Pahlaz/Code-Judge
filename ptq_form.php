<?php require_once 'db.php';
	
	// connecting to the database
	$connection = connectDB();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Code Judge | Publish Questions In Test</title>

	<link rel="manifest" href="manifest.json">
	<link rel="stylesheet" href="assets/css/header.css">
	<link rel="stylesheet" href="assets/css/test.css">
</head>
<body style="background: url('assets/img/bg1.png');">
	<div class="wrapper">
		<?php include 'header.php';?>

		<div id="ptq">
			<h1>Publish questions in a test</h1>

			<form action="ptq.php" method="post">
				<div style="display: flex;margin-bottom: 10px;">
					<h2>Add a question to test</h2>
					<select style="margin-left: 10px" name="tid">
						<option value="#">Select a test</option>
						<?php
							if (!$connection) {
							   // die("Connection failed: " . mysqli_connect_error());
								header('Location: error.php');
								exit();
							}
							else {
								//get the values from the page
								$uploadedby = $_SESSION['id'];

								$query = "select * from codejudge.t_bank where uploaded_by=\"$uploadedby\"";
								$result = mysqli_query($connection, $query);

								while($arr = mysqli_fetch_row($result)) {
						?>
		  							<option value="<?php echo $arr[0];?>"><?php echo $arr[1];?></option>
						<?php
								}
							}
						?>
					</select>
				</div>
				<div class="heading">
					<textarea name="heading" placeholder="Heading for the question" required></textarea>
				</div>

				<div class="desc">
					<textarea name="desc" placeholder="Description for the question" required></textarea>
				</div>

				<div class="test-case">
					<input class="input" type="text" name="input" placeholder="Input" required>
					<input class="output" type="text" name="output" placeholder="Output" required>
				</div>

				<input type="submit" name="add" value="Add">
			</form>
		</div>
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