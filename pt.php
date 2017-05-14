<?php
	// REQUST FROM PUBLISH TEST BUTTON
	if(isset($_POST['pt'])) {
		require_once 'db.php';
	
		// connecting to the database
		$connection = connectDB();

		if (!$connection) {
		   // die("Connection failed: " . mysqli_connect_error());
			header('Location: error.php');
			exit();
		}
		else {
			//get the values from the page
			$heading = $_POST['heading'];
			$desc = $_POST['desc'];
			$pass = $_POST['pass'];

			session_start();
			$uploadedby = $_SESSION['id'];

			// GENERATING THE TEST ID
			$tid = substr(md5(uniqid('testId', true)), 0, 20);

			// QUERY TO ADD TEST TO DATABASE
			$query = "INSERT INTO codejudge.t_bank (tid, heading, description, uploaded_by, pass) VALUES (\"$tid\", \"$heading\", \"$desc\", \"$uploadedby\", \"$pass\")";

			// TEST ADDED SUCCESSFULL TO DATABASE
			if (mysqli_query($connection, $query)) {
?>
				<script>
					alert('Test is published successfully');
					window.location = "ptq_form.php";
				</script>						
<?php
			}
			// CAN'T ABLE TO ADD TEST TO DATABASE
			else {
				// echo "Error: ".mysql_error($connection);
			   mysqli_close($connection);
			   header("location: error.php");
				exit();
			}
		}
	}
	// REQUST IS NOT FROM PUBLISH TEST BUTTON
	else {
		header("location: index.php");
	}
?>