<?php
    require_once ('./config/config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>

<!-- Meta -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />

<!-- Title -->
<title>eMeat Australia - Order Meat Online</title>

<!-- Favicons -->
<link rel="shortcut icon" href="assets/img/favicon.png">
<link rel="apple-touch-icon" href="assets/img/favicon_60x60.png">
<link rel="apple-touch-icon" sizes="76x76" href="assets/img/favicon_76x76.png">
<link rel="apple-touch-icon" sizes="120x120" href="assets/img/favicon_120x120.png">
<link rel="apple-touch-icon" sizes="152x152" href="assets/img/favicon_152x152.png">

<!-- CSS Plugins -->
<link rel="stylesheet" href="assets/plugins/bootstrap/dist/css/bootstrap.min.css" />
<link rel="stylesheet" href="assets/plugins/slick-carousel/slick/slick.css" />
<link rel="stylesheet" href="assets/plugins/animate.css/animate.min.css" />
<link rel="stylesheet" href="assets/plugins/animsition/dist/css/animsition.min.css" />

<!-- CSS Icons -->
<link rel="stylesheet" href="assets/css/themify-icons.css" />
<link rel="stylesheet" href="assets/css/prettify.css" />
<link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.min.css" />

<!-- CSS Theme -->
<link id="theme" rel="stylesheet" href="assets/css/themes/theme-beige.min.css" />

    <style type="text/css">
		#searchbox {width: 300px;}
        #searchresult {width: 300px; z-index: 10;position: absolute; overflow-y: auto; height: 250px; }
		.row1 img {width:25px;height:25px;border-radius:50%;vertical-align:middle; margin-right: 5px;}
		.row1 {font-weight: 500; color: #000; padding: 1px; background: #fff;}
        .row1:hover {background-color:#eee}

        #searchbox1 {width: 280px;}
        #searchresult1 {width: 280px; z-index: 10;position: absolute; overflow-y: auto; height: 250px; }
	</style>

</head>

<body>

<!-- Body Wrapper -->
<div id="body-wrapper" class="animsition">

    <!-- Header -->
    <header id="header" class="light">

        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <!-- Logo -->
                    <div class= "light">
                        <a href="#">
                            <img src="assets/img/Company%20Logo.png" alt="" width="88">
                        </a>
                    </div>
                </div>
                <div class="col-md-5">
                    <!-- Navigation -->
                    <nav class="module module-navigation left mr-4">
                        <ul id="nav-main" class="nav nav-main">
                            <li class="">
                                <a href="index.php">Home</a>
                            </li>
                            <li class="has-dropdown">
                                <a href="#">About</a>
                                <div class="dropdown-container">
                                    <ul class="dropdown-mega">
                                        <li><a href="page-about.php">About Us</a></li>
                                        <li><a href="page-reviews.php">Reviews</a></li>
                                        <li><a href="page-faq.php">FAQ</a></li>
                                    </ul>
                                    <div class="dropdown-image">
                                        <img src="assets/img/photos/about.jpg" alt="">
                                    </div>
                                </div>
                            </li>
                            <li class="has-dropdown">
                                <a href="#">Services</a>
                                <div class="dropdown-container">
                                    <ul>
                                        <li class="has-dropdown">
                                            <a href="#">Products</a>
                                            <ul>
                                                <li><a href="menu-grid-navigation.php">All Products</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li><a href="page-contact.php">Contact</a></li>
                        </ul>
                    </nav>
                    <div class="module left">
                        <a href="menu-grid-navigation.php" class="btn btn-outline-secondary"><span>Order Now</span></a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="module">
                        <div class="">
                            <input name="search" id="searchbox" type="search" class="form-control" placeholder="Search Products...">
                        </div>
                        <div id="searchresult"></div>
                    </div>
                </div>
                <div class="col-md-2">
                 <!--   <a href="#" class="module module-cart right" data-toggle="panel-cart">
                        <span class="cart-icon">
                            <i class="ti ti-shopping-cart"></i>
                            <span class="notification">2</span>
                        </span>
                        <span class="cart-value">$32.98</span>
                    </a>    -->
                    <a href="#" class="module module-cart right" data-toggle="modal" data-target="#loginModal">
                        <span class="cart-value">Register</span>
                        <span class="cart-value">Login</span>
                    </a>
                </div>
            </div>
        </div>

    </header>
    <!-- Header / End -->

    <!-- Header -->
    <header id="header-mobile" class="light">

        <div class="module module-nav-toggle">
            <a href="#" id="nav-toggle" data-toggle="panel-mobile"><span></span><span></span><span></span><span></span></a>
        </div>

        <div class="module module-logo">
            <div class="">
                <input name="search" id="searchbox1" type="search" class="form-control" placeholder="Search Products...">
            </div>
            <div id="searchresult1" align="left"></div>
        </div>
        <!--
        <a href="#" class="module module-cart" data-toggle="panel-cart">
            <i class="ti ti-shopping-cart"></i>
            <span class="notification">2</span>
        </a>
        -->

        <a href="#" class="module module-cart right" data-toggle="modal" data-target="#loginModal">
            <span class="btn btn-primary">Login</span>
        </a>

    </header>
    <!-- Header / End -->
