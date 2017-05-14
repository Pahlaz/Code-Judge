<?php
	// REQUST FROM PUBLISH QUESTION BUTTON
	if(isset($_POST['publish'])) {
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
			$heading = mysqli_real_escape_string($connection, $_POST['heading']);
			$desc = mysqli_real_escape_string($connection, $_POST['desc']);
			
			// GENERATING THE QUESTION ID
			$qid = substr(md5(uniqid('questionId', true)), 0, 20);

			// FETCHING THE USER ID
			session_start();
			$uploadedby = $_SESSION['id'];

			// query to add question to db
			$query = "INSERT INTO codejudge.q_bank (qid, heading, description, uploaded_by) VALUES (\"$qid\", \"$heading\", \"$desc\", \"$uploadedby\")";

			// QUESTION ADDED SUCCESSFULLY TO DATABASE
			if (mysqli_query($connection, $query)) {
				// FETCHING TESTCASE
				$input = $_POST['input'];
				$output = $_POST['output'];

				// GENERATING TESTCASE ID
				$tcid = substr(md5(uniqid('testcaseId', true)), 0, 20);

				// query to add testcase to db
				$query = "INSERT INTO codejudge.testcases (tcid, qid, input, output) VALUES (\"$tcid\", \"$qid\", \"$input\", \"$output\")";

				// TESTCASE ADDED SUCCESSFULLY TO DATABASE
				if (mysqli_query($connection, $query)) {
					// GENERATING TESTCASES FILE IN TEST_CASES FOLDER
					$out = shell_exec('cd /var/www/html/Code-Judge/test_cases && mkdir -p '.$qid.' 2>&1');

					if(is_null($out)) {
						$file_descriptor = fopen('/var/www/html/Code-Judge/test_cases/'.$qid.'/input1','w');
						fwrite($file_descriptor,$input);
						fclose($file_descriptor);

						$file_descriptor = fopen('/var/www/html/Code-Judge/test_cases/'.$qid.'/output2','w');
						fwrite($file_descriptor,$output);
						fclose($file_descriptor);
					}
					else {
					  echo "Can't able to create directory.";
					}
?>
					<script>
						alert('Question is published successfully');
						window.location = "pq_form.php";
					</script>						
<?php
				}
				// CAN'T ABLE TO ADD TESTCASE TO DATABASE
				else {
					// QUERY TO REMOVE THE QUESTION THAT WAS ADDED TO DATABASE
					$query = "DELETE FROM codejudge.q_bank WHERE qid = \"$qid\"";

					// QUESTION DELETED SUCCESSFULLY
					if (mysqli_query($connection, $query)) {
?>
						<script>
							alert('Something went worng please try again');
							window.location = "pq_form.php";
						</script>						
<?php
					}
					// CAN'T ABLE TO DELETE THE QUESTION
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
				// echo "Error: ".mysqli_error($connection);
		   	mysqli_close($connection);
			   header("location: error.php");
				exit();
			}
		}
	}
	// REQUST IS NOT FROM PUBLISH QUESTION BUTTON
	else {
		header("location: index.php");
	}
?>