<?php 
	if ($_POST['reqValidator'] == 'generate_report') {
		require_once 'db.php';
		
		$connection = connectDB();
?>
		<table id="testreport" border="1" cellspacing="0" cellpadding="10px">
			<thead>
		    	<tr>
		      	<th>USER'S NAME</th>
		      	<th>QUESTION ALLOTTED</th>
				 	<th>TESTCASES PASSED</th>
			   </tr>
		  	</thead>
		  	<tbody>
				<?php 
					if (!$connection) {
					   // die("Connection failed: " . mysqli_connect_error());
						header('Location: error.php');
						exit();
					}
					else {
						$tid = $_POST['tid'];

						// BUG - THIS QUERY IS NOT GIVING ANY RESULT
						$query = "SELECT reg_users.name, pq_bank.heading, submited_test.testcase_passed FROM codejudge.reg_users NATURAL JOIN codejudge.pq_bank NATURAL JOIN codejudge.submited_test WHERE reg_users.uid IN (SELECT uid FROM codejudge.submited_test WHERE tid = \"$tid\") AND pq_bank.qid IN (SELECT qid FROM codejudge.submited_test WHERE tid = \"$tid\")";
						$result = mysqli_query($connection, $query);

						if(mysqli_num_rows($result) > 0) {
							while($arr = mysqli_fetch_row($result)) {
				?>
								<tr>
									<td> <?php echo $arr[0]; ?> </td>
									<td> <?php echo $arr[1]; ?> </td>
									<td> <?php echo $arr[2]; ?> </td>
								</tr>
				<?php
							}
						}
						else {
							echo "<td>No user has attempted this test till now<td>";
						}
					}
				?>
			</tbody>
		</table>
<?php
	}
	else {
		header('Location: error.php');
	}
?>