<?php
//ob_start();
require_once ('./config/config.php');

@$mtype = $_GET['mtype'];
if(isset($mtype)){
	if($mtype=='postcode'){
		$idx=$_GET['idx'];
		$output = "0";
		$xmt = mysqli_fetch_array(mysqli_query($connection,"select postcode from postcode where postcode_id=$idx"))['postcode'];
		echo $xmt;
	}elseif($mtype=='confirmation'){
        $email=$_GET['liame'];
        $active=$_GET['activation'];
    }elseif($mtype=='logout'){
        if(isset($_SESSION['islog'])){
            unset($_SESSION['islog'], $_SESSION['lname'], $_SESSION['email'], $_SESSION['fname'], $_SESSION['uid'], $_SESSION['postcode'], $_SESSION['phone'], $_SESSION['state'], $_SESSION['confirmed'], $_SESSION['address']);
        }
        header('Location: ./index.php');
    }
}
