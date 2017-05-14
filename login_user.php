<?php
	// REQUEST CAME FROM SIGNIN PAGE
	if(isset($_POST['login'])) {
		require_once 'db.php';
	
		// connecting to the database
		$connection = connectDB();

		if (!$connection) {
		   // die("Connection failed: " . mysqli_connect_error());
			header('Location: error.php');
			exit();
		}
		else {
			// FETCHING the values for the page
			$email = $_POST['email'];
			$pass = $_POST['password'];

			// ENCRYPTING THE PASSWORD
			$encryptedPass = md5($pass);

			// QUERY FOR FETCHING DATA OF USER
			$query = "select * from codejudge.reg_users where email =\"$email\"";
			$result = mysqli_query($connection, $query);
			
			// USER EXIST
			if(mysqli_num_rows($result) > 0) {
				$db_results = mysqli_fetch_assoc($result);
				$password_from_db = $db_results["pass"];

				// PASSWORD MATCHED
				if($encryptedPass == $password_from_db) {
					mysqli_close($connection);

					// ADDING THE LOGIN LOG
					$uid = $db_results["uid"];
					$name = $db_results["name"];
					$post = $db_results["post"];
					// $time;
					// $query = "insert into codejudge.signin_log (uid, time) values(\"$uid_from_db\", \"$time\")";
					// $result = mysqli_query($connection, $query);
			

					// MANITAING SESSISONS FOR CHECKING LOGGED IN USER IN THE WEBSITE
					session_start();
					$_SESSION['email'] = $email;
					$_SESSION['name'] = $name;
					$_SESSION['id'] = $uid;
					$_SESSION['post'] = $post;
					session_write_close();

					// REDIRECTING USER BASED ON IT'S POST
					if($post == 'student') {
?>
						<script>
							alert('You have successfully been logged in');
							window.location = "main.php";
						</script>						
<?php
					}
					else {
?>
						<script>
							alert('You have successfully been logged in');
							window.location = "<?php echo $post; ?>.php";
						</script>
<?php
					}
				}
				// PASSWORD DID'T MATCHED
				else {
					mysqli_close($connection);
?>
					<script>
						alert('Umm it seems You have entered wrong password');
						window.location = "signin.php";
					</script>					
<?php
				}
			}
			// USER DOESN'T EXIST
			else {
				mysqli_close($connection);
?>
				<script> 
					alert('Well! why don\'t you sign up for start using codejudge');
					window.location = "signup.php";
				</script>
<?php
			}		    
		}
	}
	// REQUEST IS NOT FROM SIGNIN PAGE
	else {
		// REDIRECTING TO LOGIN PAGE
		header('location: signin.php');
		exit();
	}
?>