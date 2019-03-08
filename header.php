
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

<!-- Alertify -->
<link rel="stylesheet" href="assets/plugins/alertify/css/alertify.core.css" />
<link rel="stylesheet" href="assets/plugins/alertify/css/alertify.default.css" />
<!-- JS Alertify -->
<script src="assets/plugins/alertify/js/alertify.min.js"></script>

<!-- PNotify -->
<link href="assets/plugins/pnotify/dist/pnotify.css" rel="stylesheet">
<link href="assets/plugins/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
<link href="assets/plugins/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">


<!-- CSS Theme -->
<link id="theme" rel="stylesheet" href="assets/css/themes/theme-beige.min.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>



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
        $password2 = mysqli_real_escape_string($connection,$_POST['password2']);
        $encrypt = sha1($password);

        if ($postcode != -1){
            if($password == $password2){
                $req = mysqli_query($connection,"select * from customer where email='$email'");
                if(mysqli_num_rows($req) == 0){
                    $hash = md5($email.$password.$phone);
                    $link = "https://emeat.com.au/getprops.php?mtype=activate&liame=$email&verify=$hash&code=$encrypt";
                    mysqli_query($connection,"insert into customer (firstname, lastname, address, postcode_id, state, phone, email, password, verification) values ('$fname','$lname','$address',$postcode,'$state','$phone','$email','$encrypt','$hash')");
                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    $headers .= 'From: eMeat Australia <no-reply@emeat.com.au>' . "\r\n";
                    //$headers .= 'Cc: myboss@example.com' . "\r\n";
                    $subject = 'Welcome to eMeat Australia - Email Activation';
                    $message = "Hi $fname,\n\nYou are one step away from joining eMeat Australia. Please click the button below to activate your account in order to start ordering your favourites.\n";
                    $message .= "<a href='$link' style=' background-color: #4CAF50;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;'>Activate</a>";
                    $message .= "\n\neMeat - Australia\nhttps://emeat.com.au";

                    mail($email,$subject,$message,$headers);

                    echo "<script>$(document).ready(function(e){alertify.alert('Your account has been created successfully. An activation email has been sent to your email ($email). Please click on the activation button provided to activate your account.');alertify.success('Account created.');});</script>";
                }else{
                    echo "<script>$(document).ready(function(e){alertify.alert('The email address used has already been registered. Please use another email address.');alertify.error('Email address has been used.');});</script>";
                }
            }else{
                echo "<script>$(document).ready(function(e){alertify.alert('Your password does not match.');alertify.error('Password not match');});</script>";
            }
        }else{
            echo "<script>$(document).ready(function(e){alertify.alert('Error Occured. Please select your suburb');alertify.error('Suburb not selected.');});</script>";
        }
    }elseif(isset($_POST['logform'])){
        $email = mysqli_real_escape_string($connection,$_POST['email']);
        $password = mysqli_real_escape_string($connection,$_POST['password']);
        $encrypt = sha1($password);

        $req = mysqli_query($connection,"select * from customer where email='$email'");
		$dn = mysqli_fetch_array($req);
		if(mysqli_num_rows($req)>0 and ($dn['password']==$encrypt)){
            if($dn['confirmed']==1){
                $_SESSION['email'] = $email;
                $_SESSION['uid'] = $dn['customer_id'];
                $_SESSION['fname'] = $dn['firstname'];
                $_SESSION['lname'] = $dn['lastname'];
                $_SESSION['address'] = $dn['address'];
                $_SESSION['phone'] = $dn['phone'];
                $_SESSION['state'] = $dn['state'];
                $_SESSION['postcode'] = $dn['postcode'];
                $_SESSION['confirmed'] = $dn['confirmed'];
                $_SESSION['islog'] = true;
            }else{
                echo "<script>$(document).ready(function(e){alertify.alert('Your account has not been activated. Please activate your account first.');alertify.error('Account not activated.');});</script>";
            }
        }else{
            echo "<script>$(document).ready(function(e){alertify.alert('Cannot login! You have entered wrong username or password.');alertify.error('wrong username or password.');});</script>";
        }
    }elseif(isset($_POST['forgotform'])){
        $email = mysqli_real_escape_string($connection,$_POST['email']);
        $req = mysqli_query($connection,"select * from customer where email='$email'");
        if(mysqli_num_rows($req)>0){
            $hash = mysqli_fetch_query($req)['password'];
            $encrypt = md5(date('D, d-m-Y h:i:s', time()));
            $link = "https://emeat.com.au/getprops.php?mtype=togrof&liame=$email&verify=$hash&code=$encrypt";

            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From: eMeat Australia <no-reply@emeat.com.au>' . "\r\n";
            $subject = 'Welcome to eMeat Australia - Email Activation';
            $message = "Hi $fname,\n\nYou are one step away from joining eMeat Australia. Please click the button below to activate your account in order to start ordering your favourites.\n";
            $message .= "<a href='$link' style=' background-color: #4CAF50;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;'>Activate</a>";
            $message .= "\n\neMeat - Australia\nhttps://emeat.com.au";

            mail($email,$subject,$message,$headers);
        }else{
            echo "<script>$(document).ready(function(e){alertify.alert('Error Occured. Email address you entered cannot be found!');alertify.error('wrong email entered');});</script>";
        }
    }
?>


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
                       <a href="getprops.php?mtype=logout">Logout</a>
                    </a>
                    <?php }else{ ?>
                    <a href="#" class="module module-cart right">
                        <span class="cart-value" data-toggle="modal" data-target="#modalLRForm">Register</span>
                        <span class="cart-value" data-toggle="modal" data-target="#modalLRForm">Login</span>
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
        <a href="getprops.php?mtype=logout">Logout</a>
        <?php }else{ ?>
        <div class="module module-cart right">
            <a href="#panel7" class="btn fa fa-lock" data-toggle="modal" data-target="#modalLRForm"> Login</a>
        </div>
        <?php } ?>

    </header>
    <!-- Header / End -->


