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
	<title>Code Judge | Test Report</title>

	<link rel="stylesheet" href="assets/css/header.css">
</head>
<body>
	<div class="wrapper">
		<?php include 'header.php'; ?>

		<div id="test_report">
			<div style="display: inline-flex">
				<h1>Generate test report</h1>

				<select id="tid" style="margin-left: 10px" name="tid">
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

							$query = "select tid, heading from codejudge.t_bank where uploaded_by=\"$uploadedby\"";
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

			<div class="report" style="margin-top: 20px;"></div>
		</div>

	</div>

	<script src="assets/lib/jquery/jquery-1.12.2.min.js" type="text/javascript"></script>
	<script src="assets/js/script.js" type="text/javascript"></script>
	
	<script type="text/javascript">
   	var httpRequest = new XMLHttpRequest();
   	var tidSelected = document.querySelector('#tid');
   	var result = document.querySelector('.report');

		tidSelected.onchange = () => {
	      var tid = tidSelected.value;

	      result.innerHTML = ' ';

	      if (!httpRequest) {
	         alert('Error in making a ajax request');
	      }
	      else {
	         httpRequest.onreadystatechange = generateReport;
	         httpRequest.open('POST', 'generate_report.php');
	         httpRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	         httpRequest.send('tid='+tid+'&reqValidator=generate_report');
	      }
	   }
	   function generateReport() {
	      if (httpRequest.readyState === XMLHttpRequest.DONE) {
	      	if (httpRequest.status === 200) {
	         	result.innerHTML = httpRequest.responseText;
	         } 
	         else {
	            alert('There was a problem with the request.');
	         }
	      }
	   }
	</script>
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