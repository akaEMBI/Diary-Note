<?php 
    require_once 'assets/php/session.php';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="author" content="Surya Astawan" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title><?= ucfirst(basename($_SERVER['PHP_SELF'], '.php')); ?> | Diary Note</title>
		<link
			rel="stylesheet"
			href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css"
			integrity="sha512-znmTf4HNoF9U6mfB6KlhAShbRvbt4CvCaHoNV0gyssfToNQ/9A0eNdUbvsSwOIUoJdMjFG2ndSvr0Lo3ZpsTqQ=="
			crossorigin="anonymous"
			referrerpolicy="no-referrer"
		/>
		<link
			rel="stylesheet"
			href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css"
			integrity="sha512-9BwLAVqqt6oFdXohPLuNHxhx36BVj5uGSGmizkmGkgl3uMSgNalKc/smum+GJU/TTP0jy0+ruwC3xNAk3F759A=="
			crossorigin="anonymous"
			referrerpolicy="no-referrer"
		/>
		<style type="text/css">
			@import url('https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400;500;600;700;800;900&display=swap');
			* {
				font-family: 'Maven Pro', sans-serif;
			}
		</style>
	</head>
	<!-- navbar start -->
	<nav class="navbar navbar-expand-md bg-dark navbar-dark">
		<!-- Brand -->
		<a class="navbar-brand" href="index.php"><i class="fas fa-book fa-lg"></i>&nbsp;&nbsp;Diary Note</a>

		<!-- Toggler/collapsibe Button -->
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon"></span>
		</button>

		<!-- Navbar links -->
		<div class="collapse navbar-collapse" id="collapsibleNavbar">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link <?= (basename($_SERVER['PHP_SELF']) == "home.php")?"active":""; ?>" href="home.php"><i class="fas fa-home">&nbsp;</i>Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?= (basename($_SERVER['PHP_SELF']) == "profile.php")?"active":""; ?>" href="profile.php"><i class="fas fa-user-circle">&nbsp;</i>Profile</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?= (basename($_SERVER['PHP_SELF']) == "feedback.php")?"active":""; ?>" href="feedback.php"><i class="fas fa-comment-dots">&nbsp;</i>Feedback</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?= (basename($_SERVER['PHP_SELF']) == "notification.php")?"active":""; ?>" href="notification.php"><i class="fas fa-bell">&nbsp;</i>Notification</a>
				</li>
				<li class="nav-item dropdown">
					<a href="#" class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown">
						<i class="fas fa-user-cog"></i>&nbsp;Hi!
						<?= $fname; ?>
					</a>
					<div class="dropdown-menu">
						<a href="#" class="dropdown-item"><i class="fas fa-cog"></i>&nbsp;Setting</a>
						<a href="assets/php/logout.php" class="dropdown-item"><i class="fas fa-sign-out-alt"></i>&nbsp;Logout</a>
					</div>
				</li>
			</ul>
		</div>
	</nav>
	<!-- navbar end -->
	<body>
