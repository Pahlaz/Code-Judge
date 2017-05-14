<?php 
	require_once 'db.php';
	
	// connecting to the database
	$connection = connectDB();

	if (!$connection) {
	   // die("Connection failed: " . mysqli_connect_error());
		header('Location: error.php');
		exit();
	}
	else {
		// FETCHING DATA FROM PAGE
		$uid = $_POST[uid];

		$query = "DELETE FROM codejudge.reg_users WHERE uid=\"$uid\"";

		// USER DELETED SUCCESSFULLY
		if (mysqli_query($connection, $query)) {
			echo "User deleted successfully";
		}
		// CAN'T ABLE TO DELETE THE USER
		else {
		   mysqli_close($connection);
		   header("location: error.php");
			exit();
		}
	}
?>