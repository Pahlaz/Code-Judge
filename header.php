<header>
	<!-- MENU BUTTON -->
	<button class="toggle-btn">
		<span></span>
	</button>
	
	<!-- LOGO -->
	<a href="index.php" class="logo"><strong>CodeJudge</strong></a>

	<?php
		session_start();

		// USER IS LOGGED IN
		if(isset($_SESSION['id'])) {
	?>
			<!-- LOGGED IN ACCOUNT MENU -->
			<div class="account">
				<div class="username"><div class="greetings"> Welcome!</div> <?php session_start(); echo ' '.$_SESSION["name"]; ?></div>
				
				<button class="toggle-menu">
					<img class="profile-pic" src="assets/img/user.png">	
				</button>
				
				<div class="menu">
					<ul>
						<li><a href="user_profile.php">Profile</a></li>
						<li><a href="user_profile.php#account">Account Settings</a></li>
						<li id="logout">
							<form action="logout.php" method="post">
								<input type="submit" name="logout" value="Logout" />	
							</form>
						</li>
					</ul>
				</div>
			</div>
	<?php
		}
	?>

	<?php
		// USER IS NOT LOGGED IN
		if(!isset($_SESSION['id'])) {
	?>
			<!-- NAVIGATION LIST -->
			<div class="nav">
				<a href="signin.php" title="Log In" id="login">Log In</a>
				<a href="signup.php" title="Sign Up" id="signup">Sign Up</a>
			</div>
	<?php
		}
	?>
</header>


<!-- NAVIGATION MENU -->
<nav class="navbar">
	<div class="profile-menu">
		<img class="profile-pic" src="assets/img/user.png">
		<div class="user-name"><?php echo $_SESSION["name"]; ?></div>
	</div>

	<!-- CLOSE BUTTON -->
	<button class="close-btn">
		<span></span>
	</button>

	<!-- NAVIGATION LIST -->
	<ul class="nav-list">
		<li><a href="index.php" title="Home">Home</a></li>
		<?php
			// USER IS LOGGED IN
			if(isset($_SESSION['id'])) {
				// ADMIN LOGIN
				if($_SESSION['post'] == 'admin') {
		?>
					<li><a href="show_users.php">Registered Users</a></li>
					<li><a href="signup_teacher.php">Add Teachers</a></li>
		<?php
				}
				// TEACHER LOGIN
				else if($_SESSION['post'] == 'teacher') {
		?>
					<li><a href="pq_form.php">Publish Practice Questions</a></li>
					<li><a href="pt_form.php">Publish Tests</a></li>
					<li><a href="ptq_form.php">Publish Questions in a Test</a></li>
					<li><a href="add_testcase_form.php">Add testcases to question</a></li>
					<li><a href="test_report.php">Test Report</a></li>
		<?php
				}
			}
			else {
		?>
				<li id="login"><a href="signin.php" title="Log In">Log In</a></li>
				<li id="signup"><a href="signup.php" title="Sign Up">Sign Up</a></li>
				<li id="about-us"><a href="index.php#about" title="">About Us</a></li>
		<?php
			}
		?>
	</ul>
</nav>

<script>
	var userName = document.querySelector('.navbar .user-name');

	// if user is not logged in
	if(userName.innerHTML == '') {
  		userName.innerHTML = 'Guest Login'
	}
</script>