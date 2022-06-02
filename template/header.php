<?php
print <<<EOT


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>$name</title>
    <!-- Plugin css -->
    <link rel="stylesheet" type="text/css" href="static/css/font-awesome.min.css" media="all">
    <link rel="stylesheet" type="text/css" href="static/css/flaticon.css" media="all">
    <link rel="stylesheet" type="text/css" href="static/css/bootstrap.min.css" media="all">
    <link rel="stylesheet" type="text/css" href="static/css/animate.css" media="all">
    <link rel="stylesheet" type="text/css" href="static/css/swiper.min.css" media="all">
    <link rel="stylesheet" type="text/css" href="static/css/lightcase.css" media="all">
    <link rel="stylesheet" type="text/css" href="static/css/jquery.nstSlider.css" media="all">
    <link rel="stylesheet" type="text/css" href="static/css/flexslider.css" media="all">

    <!-- own style css -->
    <link rel="stylesheet" type="text/css" href="static/css/style.css" media="all">
    <link rel="stylesheet" type="text/css" href="static/css/rtl.css" media="all">
    <link rel="stylesheet" type="text/css" href="static/css/responsive.css" media="all">

</head>

<body>
    <div class="box-layout">

        <!-- End Pre-Loader -->
        <header class="header-style-2">
            <!-- Start Menu -->
            <div class="bg-main-menu menu-scroll">
                <div class="container">
                    <div class="row">
                        <div class="main-menu">
                            <div class="main-menu-bottom">
                                <div class="navbar-header">
                                    <a class="navbar-brand" href="index.php"><img src="static/picture/logo.jpg" alt="logo" class="img-responsive"></a>
                                    <button type="button" class="navbar-toggler collapsed d-lg-none" data-bs-toggle="collapse" data-bs-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false">
                                        <span class="navbar-toggler-icon">
                                            <i class="fa fa-bars"></i>
                                        </span>
                                    </button>


                                </div>
                                <div class="main-menu-area">
                                    <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1">
                                        <ul>
                                            <li><a href="index.php?action=about">$menuabout</a></li>
                                            <li><a href="index.php?action=shop&page=1">$menushop</a></li>
                                            <li><a href="index.php?action=blog&page=1">$menublog</a></li>
                                            $userfunction
                                            <li><a href="index.php?action=signup">Sign Up</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
           </div>
        </header>


EOT;

?>
