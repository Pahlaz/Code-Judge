<?php
	// REQUST FROM PUBLISH TEST QUESTION BUTTON
	if(isset($_POST['add'])) {
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
			$tid = $_POST['tid'];
			$heading = $_POST['heading'];
			$desc = $_POST['desc'];

			// GENERATING A UNIQUE ID FOR THE QUESTION
			$qid = substr(md5(uniqid('testQuestionId', true)), 0, 20);

			// GETTING THE ID OF USER
			session_start();
			$uploadedby = $_SESSION['id'];

			// QUERY FOR INSERTING THE QUESTION IN DATABASE
			$query = "INSERT INTO codejudge.pq_bank (qid, tid, heading, description, uploaded_by) VALUES (\"$qid\", \"$tid\", \"$heading\", \"$desc\", \"$uploadedby\")";

			// QUESTION ADDED TO DATABASE SUCESSFULLY
			if (mysqli_query($connection, $query)) {	
				// ADD TESTCASES TO DATABASE

				// FETCHING VALUES FROM THE PAGE
				$input = $_POST['input'];
				$output = $_POST['output'];

				$tcid = substr(md5(uniqid('testcaseId', true)), 0, 20);

				// QUERY FOR INSERTING THE TESTCASE IN THE DATABASE
				$query = "INSERT INTO codejudge.testcases (tcid, qid, input, output) VALUES (\"$tcid\", \"$qid\", \"$input\", \"$output\")";

				// TESTCASE INSERTED TO THE DATABASE SUCCESSFULL
				if (mysqli_query($connection, $query)) {
					$out = shell_exec('cd /var/www/html/Code-Judge/test_cases && mkdir -p '.$qid.' 2>&1');

					if(is_null($out)) {
						$file_descriptor = fopen('/var/www/html/Code-Judge/test_cases/'.$qid.'/input'.$tcid,'w');
						fwrite($file_descriptor,$input);
						fclose($file_descriptor);

						$file_descriptor = fopen('/var/www/html/Code-Judge/test_cases/'.$qid.'/output'.$tcid,'w');
						fwrite($file_descriptor,$output);
						fclose($file_descriptor);
					}
					else {
					  echo "Can't able to create directory.";
					}

					echo "Testcase is added successfully";
?>
					<script>
						alert('Question is published successfully');
						window.location = "ptq_form.php";
					</script>						
<?php
				}
				// TESTCASE IS NOT INSERTED IN THE DATABASE
				else {
					// REMOVE/ROLEBACK THE QUESTION FROM THE DATABASE
					$query = "DELETE FROM codejudge.pq_bank WHERE qid = \"$qid\"";

					if (mysqli_query($connection, $query)) {
						echo 'Something went wrong please try again';
						header("location: ptq_form.php");
					}
					else {
						// echo "Error: ".mysqli_error($connection);
				   	mysqli_close($connection);
				    	header("location: error.php");
						exit();
					}
				}
			}
			// CAN'T ABLE TO ADD QUESTION TO DATABASE
			else {
				// echo "Error: ".mysql_error($connection);
		   	mysqli_close($connection);
		    	header("location: error.php");
				exit();
			}
		}
	}
	// REQUST IS NOT FROM PUBLISH TEST QUESTION BUTTON
	else {
		header("location: index.php");
	}
?>