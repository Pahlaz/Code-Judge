<?php
	if(isset($_POST['Register'])) {	
		require_once 'db.php';
	
		// connecting to the database
		$connection = connectDB();

		if (!$connection) {
		   // die("Connection failed: " . mysqli_connect_error());
			header('Location: error.php');
			exit();
		}
		
		//getting the email from page
		$email= $_POST['email'];

		//check if user already registered
		$query = "select uid from codejudge.reg_users where email =\"$email\"";
		$result = mysqli_query($connection, $query);
		
		if(mysqli_num_rows($result) > 0) {
			mysqli_close($connection);
?>
			<script type="text/javascript">
				alert('Umm you have already registered. Pls login');
				window.location = "signin.php";
			</script>
<?php
		}
		else {
			//getting the values from page
			$name = $_POST['name'];
			$pass = $_POST['password'];
			$encryptedPass = md5($pass);
			$post = $_POST['type'];

			$uid = substr(md5(uniqid('userId', true)), 0, 20);

			$query = "INSERT INTO codejudge.reg_users (uid, name, email, pass, post) VALUES (\"$uid\", \"$name\", \"$email\", \"$encryptedPass\", \"$post\")";

			if (mysqli_query($connection, $query)) {
				session_start();
				$_SESSION['email'] = $email;
				$_SESSION['name'] = $name;
				$_SESSION['id'] = $uid;
				$_SESSION['post'] = $post;
				session_write_close();				
?>
		        <script type="text/javascript">
		        	alert('You have registered sucessfully');
					window.location = "index.php";
		        </script>
<?php
			}
			else {
			   	mysqli_close($connection);
			    header("location: error.php");
				exit();
			}
		}
	}
	else {
		header("location: signup.php");
		exit();
	}
?>