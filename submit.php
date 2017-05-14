<!-- CONNECTING TO THE DATABASE -->
<?php require_once 'db.php';

	$connection = connectDB();
?>

<?php
	// FINDING THE REQUESTING PAGE
	$reqPage = $_POST['reqPage'];

	if (!$connection) {
		header('Location: error.php');
		exit();
	}
	else {
		// FETCHING DATA
		$code = mysqli_real_escape_string($connection, $_POST['code']);
	}

	session_start();
	$uid = $_SESSION["id"];

	// SUBMITING PRACTICE QUESTION
	if($reqPage == 'practice'){
		$qid = $_POST['qid'];

		if(empty($code)) {
			echo "Why don't u write something so that it could be compiled !!";
		}
		else {
			// QUERY TO CHECK IF QUESTION IS PREVIOUSLY SUBMITTED
			$query = "SELECT * FROM codejudge.submited_practice_question WHERE uid = \"$uid\" AND qid = \"$qid\"";
			$result = mysqli_query($connection, $query);
		
			// IF PRIVIOUSLY SUBMITED
			if(mysqli_num_rows($result) > 0) {
				// QUERY TO UPDATE THE SUBMITTED CODE
				$query = "UPDATE codejudge.submited_practice_question SET code = \"$code\" WHERE uid = \"$uid\" AND qid = \"$qid\"";

				// SOURCE CODE UPDATED SUCCESSFULLY
				if (mysqli_query($connection, $query)) {
					echo "Updated your submitted code";
				}
				else{
					echo "Can't able to update please try again";	
				}
			}
			// IF NOT PRIVIOUSLY SUBMITED
			else{
				// QUERY TO STORE SOURCE CODE
				$query = "INSERT INTO codejudge.submited_practice_question (uid, qid, code) VALUES (\"$uid\", \"$qid\", \"$code\")";

				// SOURCE CODE STORED SUCCESSFULLY
				if (mysqli_query($connection, $query)) {
					echo "Submitted Practice Question";
				}
				else{
					echo "Can't able to submit practice question please try again";	
				}
			}
		}
	}
	// SUBMITING TEST QUESTION
	else if($reqPage == 'test') {
		$tid = $_POST['tid'];
		$qid = $_POST['qid'];

		if(empty($code)) {
			echo "Why don't u write something so that it could be compiled !!";
		}
		else {
			// QUERY TO CHECK IF TEST IS PREVIOUSLY SUBMITTED
			$query = "SELECT * FROM codejudge.submited_test WHERE uid = \"$uid\" AND tid = \"$tid\"";
			$result = mysqli_query($connection, $query);
		
			// IF PRIVIOUSLY SUBMITED
			if(mysqli_num_rows($result) > 0) {
				// QUERY TO UPDATE THE SUBMITTED CODE
				$query = "UPDATE codejudge.submited_test SET code = \"$code\" WHERE uid = \"$uid\" AND tid = \"$tid\"";

				// SOURCE CODE UPDATED SUCCESSFULLY
				if (mysqli_query($connection, $query)) {
					echo "Updated your submitted code";
				}
				else{
					echo "Can't able to update please try again";	
				}
			}
			// IF NOT PRIVIOUSLY SUBMITED
			else{
				// QUERY TO STORE SOURCE CODE
				$query = "INSERT INTO codejudge.submited_test (uid, tid, qid, code) VALUES (\"$uid\", \"$tid\", \"$qid\", \"$code\")";

				// SOURCE CODE STORED SUCCESSFULLY
				if (mysqli_query($connection, $query)) {
					echo "Submitted Test";
				}
				else{
					echo "Can't able to submit test please try again";	
				}
			}
		}
	}
	else {
		echo "Something went wrong, can't able to submit the code";
	}
?>