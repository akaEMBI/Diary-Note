<?php 
    session_start();
    if(!isset($_SESSION['username'])){
        header('location:index.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
        $title = basename($_SERVER['PHP_SELF'], '.php');
        $title = explode('-', $title);
        $title = ucfirst($title[1]);
    ?>
    <title><?= $title ?> | Admin Panel</title>
    <!-- data tables css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha512-znmTf4HNoF9U6mfB6KlhAShbRvbt4CvCaHoNV0gyssfToNQ/9A0eNdUbvsSwOIUoJdMjFG2ndSvr0Lo3ZpsTqQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css"
        integrity="sha512-9BwLAVqqt6oFdXohPLuNHxhx36BVj5uGSGmizkmGkgl3uMSgNalKc/smum+GJU/TTP0jy0+ruwC3xNAk3F759A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets\css\style.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"
        integrity="sha512-bnIvzh6FU75ZKxp0GXLH9bewza/OIw6dLVh9ICg0gogclmYGguQJWl8U30WpbsGTqbIiAwxTsbe76DErLq5EDQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"
        integrity="sha512-c4wThPPCMmu4xsVufJHokogA9X4ka58cy9cEYf5t147wSw0Zo43fwdTy/IC0k1oLxXcUlPvWZMnD8be61swW7g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"
        integrity="sha512-xd+EFQjacRjTkapQNqqRNk8M/7kaek9rFqYMsbpEhTLdzq/3mgXXRXaz1u5rnYFH5mQ9cEZQjGFHFdrJX2CilA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
    $(document).ready(function() {
        $("#open-nav").click(function() {
            $(".admin-nav").toggleClass('animate');
        });
    });
    </script>

    <style>
    .admin-nav {
        width: 220px;
        min-height: 100vh;
        overflow: hidden;
        background-color: #343a40;
        transition: 0.3s all ease-in-out;
    }

    .admin-link {
        background-color: #343a40;
    }

    .admin-link:hover,
    .nav-active {
        background-color: #212529;
        text-decoration: none;
    }

    .animate {
        width: 0;
        transition: 0.3s all ease-in-out;
    }
    </style>

</head>

<body style="background-image: linear-gradient(to top, #e6e9f0 0%, #eef1f5 100%);">
    <div class="container-fluid">
        <div class="row">
            <div class="admin-nav p-0">
                <h4 class="text-light text-center p-2">Admin Panel</h4>

                <div class="list-group list-group-flush">
                    <a href="admin-dashboard.php"
                        class="list-group-item text-light admin-link <?= (basename($_SERVER['PHP_SELF']) == 'admin-dashboard.php')?"nav-active":""; ?>"><i
                            class="fas fa-chart-pie"></i>&nbsp;&nbsp;Dashboard</a>

                    <a href="admin-users.php"
                        class="list-group-item text-light admin-link <?= (basename($_SERVER['PHP_SELF']) == 'admin-users.php')?"nav-active":""; ?>"><i
                            class="fas fa-user-friends"></i>&nbsp;&nbsp;Users</a>

                    <a href="admin-notes.php"
                        class="list-group-item text-light admin-link <?= (basename($_SERVER['PHP_SELF']) == 'admin-notes.php')?"nav-active":""; ?>"><i
                            class="fas fa-sticky-note"></i>&nbsp;&nbsp;Notes</a>

                    <a href="admin-feedback.php"
                        class="list-group-item text-light admin-link <?= (basename($_SERVER['PHP_SELF']) == 'admin-feedback.php')?"nav-active":""; ?>"
                        hidden><i class="fas fa-comment"></i>&nbsp;&nbsp;Feedback</a>

                    <a href="admin-notification.php"
                        class="list-group-item text-light admin-link <?= (basename($_SERVER['PHP_SELF']) == 'admin-notification.php')?"nav-active":""; ?>"
                        hidden><i class="fas fa-bell"></i>&nbsp;&nbsp;Notification</a>

                    <a href="admin-deleteduser.php"
                        class="list-group-item text-light admin-link <?= (basename($_SERVER['PHP_SELF']) == 'admin-deleteduser.php')?"nav-active":""; ?>"><i
                            class="fas fa-user-slash"></i>&nbsp;&nbsp;Deleted Users</a>

                    <a href="assets/php/admin-action.php?export=excel" class="list-group-item text-light admin-link"><i
                            class="fas fa-table"></i>&nbsp;&nbsp;Export Users</a>

                    <a href="#" class="list-group-item text-light admin-link"><i
                            class="fas fa-id-card"></i>&nbsp;&nbsp;Profile</a>

                    <a href="#" class="list-group-item text-light admin-link"><i
                            class="fas fa-cog"></i>&nbsp;&nbsp;Setting</a>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <div class="col-lg-12 bg-dark pt-2 justify-content-between d-flex">
                        <a href="#" class="text-white" id="open-nav">
                            <h3><i class="fas fa-bars"></i></h3>
                        </a>
                        <h4 class="text-light"><?= $title; ?></h4>
                        <a href="assets/php/logout.php" class="text-light mt-1"><i
                                class="fas fa-sign-out-alt"></i>&nbsp;Logout</a>
                    </div>
                </div>
