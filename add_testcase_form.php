<?php require_once 'db.php';
	
	$connection = connectDB();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Code Judge | Add Testcases</title>

	<link rel="stylesheet" href="assets/css/header.css">
	<link rel="stylesheet" href="assets/css/test.css">
</head>
<body style="background: url('assets/img/bg1.png');">
	<div class="wrapper">
		<?php include 'header.php';?>

		<div id="atc">
			<h1>Add testcase</h1>

			<h2>Add a testcase to question</h2>
			<select id="qid" style="margin-left: 10px" name="qid">
				<option value="#">Select a question</option>
				<?php
					if (!$connection) {
					   // die("Connection failed: " . mysqli_connect_error());
						header('Location: error.php');
						exit();
					}
					else {
						//get the values from the page
						$uploadedby = $_SESSION['id'];

						$query = "select qid, heading from codejudge.pq_bank where uploaded_by=\"$uploadedby\"";
						$result = mysqli_query($connection, $query);

						while($arr = mysqli_fetch_row($result)) {
				?>
  							<option value="<?php echo $arr[0];?>"><?php echo $arr[1];?></option>
				<?php
						}

						$query = "select qid, heading from codejudge.q_bank where uploaded_by=\"$uploadedby\"";
						$result = mysqli_query($connection, $query);

						while($arr = mysqli_fetch_row($result)) {
				?>
  							<option value="<?php echo $arr[0];?>"><?php echo $arr[1];?></option>
				<?php
						}
					}
				?>
			</select>

			<div class="test-case">
				<input class="input" type="text" name="input" placeholder="Input" required>
				<input class="output" type="text" name="output" placeholder="Output" required>
			</div>
		
			<button id="addTC" type="button">Add</button>
		</div>

	</div>

	<script src="assets/lib/jquery/jquery-1.12.2.min.js" type="text/javascript"></script>
	<script src="assets/js/script.js" type="text/javascript"></script>
	<script type="text/javascript">
		var addTCBtn = document.querySelector("#addTC");
	   var inputTC = document.querySelector(".test-case .input");
	   var outputTC = document.querySelector(".test-case .output");
	   
	   var httpRequest = new XMLHttpRequest();

	   addTCBtn.onclick = function() {
	      var input = inputTC.value;
	      var output = outputTC.value;
	      var qid = document.querySelector('#qid').value;

	      if(!input || !output) {
	         alert('you can\'t leave fields empty');
	      }
	      else{
	         if (!httpRequest) {
	            alert('Error in making a ajax request');
	         }
	         else {
	            httpRequest.onreadystatechange = addTC;
	            httpRequest.open('POST', 'add_testcase.php');
	            httpRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	            httpRequest.send('qid='+qid+'&input='+input+'&output='+output+'&reqValidator=add_testcase');
	         }
	      }
	   }
	   function addTC() {
	       if (httpRequest.readyState === XMLHttpRequest.DONE) {
	         if (httpRequest.status === 200) {
	            var response = httpRequest.responseText;
	            alert(response);

	            inputTC.value = '';
	            outputTC.value = '';
	         } 
	         else {
	            alert('There was a problem with the request.');
	         }
	       }
	   }
	</script>
</body>
</html>

<!-- VALIDATING THE USER ON THE PAGE -->
<?php
	session_start();

	if(isset($_SESSION['id'])) {	//user is logged in
		// to redirect unauthorized users
		if($_SESSION['post'] != 'teacher') {
			header('location: index.php');
			exit();
		}
	}
	else {	//user is not logged in
		header('location: index.php');
	}
?>