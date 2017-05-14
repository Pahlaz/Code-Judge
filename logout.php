<?php

	// REQUEST FROM LOGOUT BUTTON
	if (isset($_POST['logout'])) {
		session_start();
		session_destroy();
		header('Location: index.php'); //to login
		exit();
	}
	else{
		header('location: index.php');
	}
?>