<?php
    require_once ('./config/config.php');

    if(isset($_POST['regform'])){
        $fname = mysqli_real_escape_string($connection,$_POST['fname']);
        $lname = mysqli_real_escape_string($connection,$_POST['lname']);
        $address = mysqli_real_escape_string($connection,$_POST['address']);
        $phone = mysqli_real_escape_string($connection,$_POST['phone']);
        $postcode = mysqli_real_escape_string($connection,$_POST['postcode']);
        $state = mysqli_real_escape_string($connection,$_POST['state']);
        $email = mysqli_real_escape_string($connection,$_POST['email']);
        $password = mysqli_real_escape_string($connection,$_POST['password']);
        $encrypt = sha1($password);

        if ($postcode != -1){
            $req = mysqli_query($connection,"select * from customer where email='$email'");
            if(mysqli_num_rows($req) == 0){
                mysqli_query($connection,"insert into customer (firstname, lastname, address, postcode_id, state, phone, email, password) values ('$fname','$lname','$address',$postcode,'$state','$phone','$email','$encrypt')");
                mail($email,"eMeat Australia","Welcome to eMeat Australia");
                echo "<script>alert('Your account has been created successfully');</script>";
            }else{
                echo "<script>alert('The email used has already been registered. Please use another email address.');</script>";
            }
        }else{
            echo "<script>alert('Please select your suburb');</script>";
        }
    }elseif(isset($_POST['logform'])){
        $email = mysqli_real_escape_string($connection,$_POST['email']);
        $password = mysqli_real_escape_string($connection,$_POST['password']);
        $encrypt = sha1($password);

        $req = mysqli_query($connection,"select * from customer where email='$email'");
		$dn = mysqli_fetch_array($req);
		if(($dn['password']==$encrypt) and mysqli_num_rows($req)>0){
			$_SESSION['email'] = $email;
			$_SESSION['uid'] = $dn['customer_id'];
			$_SESSION['fname'] = $dn['firstname'];
			$_SESSION['lname'] = $dn['lastname'];
			$_SESSION['address'] = $dn['address'];
			$_SESSION['phone'] = $dn['phone'];
			$_SESSION['state'] = $dn['state'];
			$_SESSION['postcode'] = $dn['postcode'];
			$_SESSION['islog'] = true;
        }else{
            echo "<script>alert('Cannot login: Wrong username/password');</script>";
        }
    }
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
<link rel="shortcut icon" href="assets/img/Company%20Logo.png">
<link rel="apple-touch-icon" href="assets/img/Company%20Logo.png">
<link rel="apple-touch-icon" sizes="76x76" href="assets/img/Company%20Logo.png">
<link rel="apple-touch-icon" sizes="120x120" href="assets/img/Company%20Logo.png">
<link rel="apple-touch-icon" sizes="152x152" href="assets/img/Company%20Logo.png">

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
                    <?php if($_SESSION['islog']){ ?>
                   <a href="#" class="module module-cart right" data-toggle="panel-cart">
                        <span class="cart-icon">
                            <i class="ti ti-shopping-cart"></i>
                            <span class="notification">2</span>
                        </span>
                        <span class="cart-value">$32.98</span>
                    </a>
                    <?php }else{ ?>
                    <a href="#" class="module module-cart right">
                        <span class="cart-value" data-toggle="modal" data-target="#signModal">Register</span>
                        <span class="cart-value" data-toggle="modal" data-target="#loginModal">Login</span>
                    </a>
                    <?php } ?>
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
        <?php if($_SESSION['islog']){ ?>
        <a href="#" class="module module-cart" data-toggle="panel-cart">
            <i class="ti ti-shopping-cart"></i>
            <span class="notification">2</span>
        </a>
        <?php }else{ ?>
        <div class="module module-cart right">
            <a href="#" class="btn fa fa-lock" data-toggle="modal" data-target="#loginModal"> Login</a>
        </div>
        <?php } ?>

    </header>
    <!-- Header / End -->
