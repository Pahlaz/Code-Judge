<?php
	session_start();

	if(isset($_POST['reqPage'])) {
		// USER IS LOGGED IN
		if(isset($_SESSION['id'])) {
			// FETCHING THE ID OF LOGGED IN USER
			$id = $_SESSION['id'];
		}
		// USER IS NOT LOGGED IN
		else {
			// GENERATING THE ID FOR GUEST USER
			$id = substr(md5(uniqid('guestuserId', true)), 0, 20);
		}

		// FETCHING DATA
		$code = $_POST['code'];
		$qid = $_POST['qid'];

		if(empty($code)) {
			echo "Why don't u write something so that it could be compiled !!";
		}
		else {
			// make these directory if it doesn't exist.
			$out = shell_exec('cd /var/www/html/Code-Judge/compilation_inside; mkdir -p '.$id.'/'.$qid.' 2>&1'); 

			// if directory created succesfully or exists
			if(is_null($out)) {
				//create a file with qid as its name
				$file_descriptor = fopen('/var/www/html/Code-Judge/compilation_inside/'.$id.'/'.$qid.'/'.$qid.'.c','w'); 
				
				// entering the code in the above file
				fwrite($file_descriptor,$code);
				fclose($file_descriptor);

				//copies the compile.sh and execute.sh shell scripts
				$copy_shell = shell_exec('cp /var/www/html/Code-Judge/shell_scripts/compile.sh /var/www/html/Code-Judge/compilation_inside/'.$id.'/'.$qid.' && cp /var/www/html/Code-Judge/shell_scripts/execute.sh /var/www/html/Code-Judge/compilation_inside/'.$id.'/'.$qid.' 2>&1'); 

				// COPY ALL TESTCASES FROM TESTCASE DIRECTORY TO USER DIRECTORY
				$copy_test_case = shell_exec('cp /var/www/html/Code-Judge/test_cases/'.$qid.'/* /var/www/html/Code-Judge/compilation_inside/'.$id.'/'.$qid.' && cp /var/www/html/Code-Judge/test_cases/'.$qid.'/* /var/www/html/Code-Judge/compilation_inside/'.$id.'/'.$qid.' 2>&1');

				// check if all files copied successfully or not 
				if(is_null($copy_shell) && is_null($copy_test_case)) {
					//2>&1 for testing purpose, compiles the file
					$compiling_output = shell_exec('cd /var/www/html/Code-Judge/compilation_inside/'.$id.'/'.$qid.' && ./compile.sh '.$qid.' 2>&1');

					if(is_null($compiling_output)) {
						// execute.sh is executed here
						$execute_output= shell_exec('cd /var/www/html/Code-Judge/compilation_inside/'.$id.'/'.$qid.' && ./execute.sh '.$qid.' 2>&1');

						echo "You have passed".$execute_output."test cases !!."; // prints how many test cases passed
					}
					else {
						echo $compiling_output; //prints the compiler error if it occurs.
					}
				}
				else {
					echo "Whoa, did u know an error occured !!";
				}
			}
			else {
				// if directory doesnt exist and can't be created then redirected here
				echo "Whoa, did u know an error occured !!";
			}
		}
	}
	else {
		header('Location: error.php');
	}
?>
