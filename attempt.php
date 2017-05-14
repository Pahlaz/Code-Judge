<!-- CONNECTING TO THE DATABASE -->
<?php require_once 'db.php';

	$connection = connectDB();
?>

<?php
	// FINDING THE REQUESTING PAGE
	$reqPage = $_POST['reqPage'];

	if($reqPage == 'practice'){
?>
		<!DOCTYPE html>
		<html>
		<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>Code Judge | Start Practicing</title>

			<link rel="manifest" href="manifest.json">
			<link rel="stylesheet" href="assets/css/header.css">
			<link rel="stylesheet" href="assets/css/attempt.css">
		</head>
		<body>
			<div class="wrapper">
				<?php include 'header.php'; ?>
				
				<div class="content">
					<?php
						if (!$connection) {
						   // die("Connection failed: " . mysqli_connect_error());
							header('Location: error.php');
							exit();
						}
						else {
							// FETCHING QUESTION ID 
							$qid = $_POST['qid'];

							// QUERY FOR FETCHING DATA OF THE QUESTION
							$query = "select heading, description from codejudge.q_bank where qid =\"$qid\"";
							$result = mysqli_query($connection, $query);

							// DATA FETCHED SUCCESSFULLY
							if(mysqli_num_rows($result) > 0) {
								$db_results = mysqli_fetch_assoc($result);
								$heading = $db_results["heading"];
								$description = $db_results["description"];
					?>
								<div class="question">
									<h1 class="heading"><?php echo $heading;?></h1>
									<pre class="desc"><?php echo $description;?></pre>
								</div>
					<?php
							}
						}
					?>
					
					<div class="editor" data-qid="<?php echo $qid; ?>" data-reqpage="<?php echo $reqPage; ?>">
						<div class="editor-header">
							<div class="lang">
							  	<label>Choose Language</label>
							  	<select>
									<option value="c_cpp">C and C++</option>
								  	<option value="java">Java</option>
								  	<option value="javascript">JavaScript</option>
								  	<option value="python">Python</option>
								</select>
						  	</div>
						</div>

						<div class="text-area">
							<div id="editor-area"></div>
						</div>

						<div class="btns">
							<span id="compile" class="btn" title="Compile Code">Compile Code</span>
							<span id="submit" class="btn" title="Submit Code">Submit Code</span>
						</div>

						<div id="output"></div>
					</div> 	
			
				</div>
				
			</div>

			<script src="assets/lib/jquery/jquery-1.12.2.min.js" type="text/javascript"></script>
			<script src="assets/lib/ace-builds/ace.js" type="text/javascript"></script>
			<script src="assets/js/script.js" type="text/javascript"></script>
			<script src="assets/js/attempt.js" type="text/javascript"></script>
		</body>
		</html>

<?php
	}
	else if($reqPage == 'test') {
			$tid = $_POST['tid'];

			if (!$connection) {
			   // die("Connection failed: " . mysqli_connect_error());
				header('Location: error.php');
				exit();
			}
			else {
				// VALIDATION THE USER BEFORE ATTEMPTING THE TEST

				// QUERY FOR FETCHING PASSWORD FROM DATABASE
				$query = "select * from codejudge.t_bank where tid =\"$tid\"";
				$result = mysqli_query($connection, $query);
				$db_results = mysqli_fetch_assoc($result);

				// FETCHING THE TEST PASSWORD
				$password_from_db = $db_results["pass"];

				// TEST HAS A PASSWORD
				if($password_from_db != '' or $password_from_db != NULL) {
					// VALIDATING THE PASSWORD
?>
					<script type="text/javascript">
						var pass = prompt('Enter the test password: ');
						var dbPass = "<?php echo $password_from_db; ?>";

						// PASSWORD DIDN'T MATCH
						if(pass != dbPass ) {
							alert('Wrong password');
							window.location = 'main.php';
						}
					</script>
<?php
				}

				// QUERY FOR FETCHING THE QUESTIONS AVAILABLE IN THE TEST
				$query = "select qid, heading, description from codejudge.pq_bank where tid =\"$tid\"";
				$result = mysqli_query($connection, $query);

				// TEST HAS ATLEAST 1 QUESTION
				if(mysqli_num_rows($result) > 0) {
					// FETCHING THE QUESTION IDs
					$qids = [];

					// STORING THE QUESTION IDs IN ARRAY
					while($arr = mysqli_fetch_row($result)) {
						array_push($qids, $arr[0]);
					}

					// SELECTING A RANDOM QUESTION ID FROM THE AVAILABLE QUESTIONS
					$key = array_rand($qids, 1);
					$random_id = $qids[$key];
				}
				// TEST DOESN'T HAVE ANY QUESTION
				else{
?>
					<script>
						alert('It Seems there is no question published in this test');
						window.location = "main.php";
					</script>
<?php
				}
			}
?>

		<!DOCTYPE html>
		<html>
		<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>Code Judge | Attempt Test</title>

			<link rel="manifest" href="manifest.json">
			<link rel="stylesheet" href="assets/css/header.css">
			<link rel="stylesheet" href="assets/css/attempt.css">
		</head>
		<body>
			<div class="wrapper">
				<?php include 'header.php'; ?>
				
				<div class="content">	
					<?php 
						if (!$connection) {
						   // die("Connection failed: " . mysqli_connect_error());
							header('Location: error.php');
							exit();
						}
						else {
							// TEST's QUESTION ID
							$qid = $random_id;

							// QUERY FOR FETCHING QUESTION DATA
							$query = "select heading, description from codejudge.pq_bank where qid =\"$qid\"";
							$result = mysqli_query($connection, $query);
							
							// QUESTION DATA FETCHED SUCCESSFULLY
							if(mysqli_num_rows($result) > 0) {
								while($arr = mysqli_fetch_row($result)) {
					?>
									<div class="question">
										<h1 class="heading"><?php echo $arr[0];?></h1>
										<pre class="desc"><?php echo $arr[1];?></pre>
									</div>
					<?php
								}
							}
						}
					?>

					<div class="editor" data-tid="<?php echo $tid; ?>" data-qid="<?php echo $qid; ?>" data-reqpage="<?php echo $reqPage; ?>">
						<div class="editor-header">
							<div class="lang">
						  	<label>Choose Language</label>
						  	<select>
								<option value="c_cpp">C and C++</option>
							  	<option value="java">Java</option>
							  	<option value="javascript">JavaScript</option>
							  	<option value="python">Python</option>
							</select>
						  </div>
						</div>

						<div class="text-area">
							<div id="editor-area"></div>
						</div>

						<div class="btns">
							<input type="hidden" name="requrl" value="test">
							
							<span id="compile" class="btn" title="Compile Code">Compile Code</span>
							<span id="submit" class="btn" title="Submit Code">Submit Code</span>
						</div>

						<div id="output"></div>
					</div> 
				
				</div>
			</div>

			<script src="assets/lib/jquery/jquery-1.12.2.min.js" type="text/javascript"></script>
			<script src="assets/lib/ace-builds/ace.js" type="text/javascript"></script>
			<script src="assets/js/script.js" type="text/javascript"></script>
			<script src="assets/js/attempt.js" type="text/javascript"></script>
		</body>
		</html>

		<!-- VALIDATING THE USER ON THE PAGE -->
		<?php
			session_start();
			// to not navigating to this page by changing the URL 
			if(!isset($_POST['attempt_test'])) {
				header('location: error.php');
				exit();
			}
	}
	else {
		header('location: index.php');
	}
?>