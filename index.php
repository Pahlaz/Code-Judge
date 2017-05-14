<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Code Judge | Home</title>

	<link rel="stylesheet" href="assets/css/header.css">
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
	<div class="wrapper">
		<?php include 'header.php'; ?>

		<div class="front">
			<div class="front-container">
				<div class="logo">Code Judge</div>
				<div class="tag-line">Test your coding skills</div>
				<a href="main.php" class="start-btn">Start Coding</a>
			</div>
		</div>

		<section id="main-features">
			<h1>Our Main Features</h1>

			<div class="features">
				<div class="feature">
					<div class="pic">
						<img src="assets/img/practice coding.ico">
					</div>
					<div class="details">
						<span class="title">Practice Coding</span>
						<span class="sub-title">Practice your codding skills with our easy user interface</span>	
					</div>
				</div>

				<div class="feature">
					<div class="pic">
						<img src="assets/img/attempt test.png">
					</div>
					<div class="details">
						<span class="title">Attempt Tests</span>
						<span class="sub-title">Attempt challenging tests</span>
					</div>
				</div>
			</div>
		</section>

		<section id="about">
			<div class="team">
				<h1>Our Team</h1>
				<div class="members">
					<div class="member">
						<div class="profile-pic">
							<img src="assets/img/divyank.jpg">
						</div>
						<div class="details">
							<span class="name">Divyank Pahlazani</span>
							<span class="email">pahlaz.divyank@gmail.com</span>
							<div class="social-links">
								<a target="_blank" target="_blank" id="in" href="https://www.linkedin.com/in/divyank-pahlazani-8509a2102" title="LinkedIn"><img src="assets/img/in.png"></a>
								<a target="_blank" id="codepen" href="http://codepen.io/Pahlaz/" title="Codepen"><img src="assets/img/codepen.png"></a>
								<a target="_blank" id="github" href="https://github.com/Pahlaz" title="Github"><img src="assets/img/github.png"></a>
								<a target="_blank" id="fb" href="https://www.facebook.com/divyank.pahlazani" title="Facebook"><img src="assets/img/fb.png"></a>
								<a target="_blank" id="twitter" href="https://twitter.com/Divyank_Pahlaz" title="Twitter"><img src="assets/img/twitter.png"></a>
							</div>	
						</div>
					</div>

					<div class="member">
						<div class="profile-pic">
							<img src="assets/img/gaurav.jpg">
						</div>
						<div class="details">
							<span class="name">Gaurav Rajput</span>
							<span class="email">gaurav.rajput_cs13@gla.ac.in</span>
							<div class="social-links">
								<a target="_blank" id="in" href="https://www.linkedin.com/in/gaurav-rajput-690326ab" title="LinkedIn"><img src="assets/img/in.png"></a>
								<a target="_blank" id="fb" href="https://www.facebook.com/gauravrajput95" title="Facebook"><img src="assets/img/fb.png"></a>
							</div>
						</div>
					</div>

					<div class="member">
						<div class="profile-pic">
							<img src="assets/img/himanshu_nigam.jpg">
						</div>
						<div class="details">
							<span class="name">Himanshu Nigam</span>
							<span class="email">himanshu.nigam_cs13@gla.ac.in</span>
							<div class="social-links">
								<a target="_blank" id="in" href="https://www.linkedin.com/in/himanshu-nigam-aa995a103" title="LinkedIn"><img src="assets/img/in.png"></a>
								<a target="_blank" id="fb" href="https://www.facebook.com/himanshu.nigam.33" title="Facebook"><img src="assets/img/fb.png"></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<footer>
			<span>CodeJudge&copy 2016-2020</span>
		</footer>

	</div>

	<script src="assets/lib/jquery/jquery-1.12.2.min.js" type="text/javascript"></script>
	<script src="assets/js/script.js" type="text/javascript"></script>
</body>
</html>

<!-- VALIDATING THE USER ON THE PAGE -->
<?php
	session_start();
	// USER IS LOGGED IN
	if(isset($_SESSION['id'])) {
		// FETCHING THE POST OF LOGGED IN USER
		$post = $_SESSION['post'];

		// redirecting to a specific page based on the post of the user. 
		if($post == 'student') {
			header('location: main.php');
		}
		else{
			header('location: '.$post.'.php');
		}
	}
?>