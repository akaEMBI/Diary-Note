<?php 
    require_once 'assets/php/session.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- meta tag -->
    <meta charset="UTF-8" />
    <meta name="author" content="Surya Astawan" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= ucfirst(basename($_SERVER['PHP_SELF'], '.php')); ?> | Diary Note</title>
    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha512-znmTf4HNoF9U6mfB6KlhAShbRvbt4CvCaHoNV0gyssfToNQ/9A0eNdUbvsSwOIUoJdMjFG2ndSvr0Lo3ZpsTqQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- fontawesome css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css"
        integrity="sha512-9BwLAVqqt6oFdXohPLuNHxhx36BVj5uGSGmizkmGkgl3uMSgNalKc/smum+GJU/TTP0jy0+ruwC3xNAk3F759A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- data tables css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css" />
    <!-- mycss -->
    <style type="text/css">
    @import url('https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400;500;600;700;800;900&display=swap');

    * {
        font-family: 'Maven Pro', sans-serif;
    }
    </style>
</head>
<!-- navbar start -->
<nav class="navbar navbar-expand-md navbar-dark" style="background: #0f0c29;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #24243e, #302b63, #0f0c29);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #24243e, #302b63, #0f0c29); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

">
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
                <a class="nav-link <?= (basename($_SERVER['PHP_SELF']) == "home.php")?"active":""; ?>"
                    href="home.php"><i class="fas fa-home"></i>&nbsp;Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= (basename($_SERVER['PHP_SELF']) == "profile.php")?"active":""; ?>"
                    href="profile.php"><i class="fas fa-user-circle"></i>&nbsp;Profile</a>
            </li>
            <li class="nav-item" hidden>
                <a class="nav-link <?= (basename($_SERVER['PHP_SELF']) == "feedback.php")?"active":""; ?>"
                    href="feedback.php"><i class="fas fa-comment-dots"></i>&nbsp;Feedback</a>
            </li>
            <li class="nav-item" hidden>
                <a class="nav-link <?= (basename($_SERVER['PHP_SELF']) == "notification.php")?"active":""; ?>"
                    href="notification.php"><i class="fas fa-bell"></i>&nbsp;Notification</a>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown">
                    <i class="fas fa-user-cog"></i>&nbsp;Hi!
                    <?= $fname; ?>
                </a>
                <div class="dropdown-menu">
                    <a href="#" class="dropdown-item"><i class="fas fa-cog"></i>&nbsp;Setting</a>
                    <a href="assets/php/logout.php" class="dropdown-item"><i
                            class="fas fa-sign-out-alt"></i>&nbsp;Logout</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
<!-- navbar end -->

<body style="background: #E0EAFC;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #CFDEF3, #E0EAFC);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #CFDEF3, #E0EAFC); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
">