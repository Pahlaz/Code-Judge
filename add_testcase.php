<?php
	if ($_POST['reqValidator'] == 'add_testcase') {
		require_once 'db.php';

		// CONNECTING TO THE DATABASE
		$connection = connectDB();

		if (!$connection) {
			header('Location: error.php');
			exit();
		}
		else {
			// FETCHING THE DATA FROM PAGE
			$qid = $_POST['qid'];
			$input = $_POST['input'];
			$output = $_POST['output'];

			// GENERATING THE UNIQUE ID FOR TESTCASE
			$tcid = substr(md5(uniqid('testcaseId', true)), 0, 20);

			// QUERY TO ADD TESTCASE TO DATABASE
			$query = "INSERT INTO codejudge.testcases (tcid, qid, input, output) VALUES (\"$tcid\", \"$qid\", \"$input\", \"$output\")";

			// TESTCASE ADDED SUCCESSFULLY
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
				  echo "Can't able to create directory";
				}

				echo "Testcase is added successfully";
			}
			else {
				// echo "Error: ".mysqli_error($connection);
			   mysqli_close($connection);
			   header("location: error.php");
				exit();
			}
		}
	}
	else {
		header('Location: error.php');
	}
?>