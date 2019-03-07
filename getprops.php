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
	}elseif($mtype=='activate'){
        $email=$_GET['liame'];
        $active=$_GET['verify'];
        $acode=$_GET['code'];
        $xmt = mysqli_num_rows(mysqli_query($connection,"select * from customer where email='$email' and verification='$active'"));
        if($xmt == 0){
            header('Location: ./confirmation.php?act=failed&title1=2$thr='.$code);
        }else{
            mysqli_query($connection,"update customer set confirmed=1 where email='$email' and verification='$active'");
            header('Location: ./confirmation.php?act=verified&title1=1$thr='.$code);
        }
    }elseif($mtype=='logout'){
        if(isset($_SESSION['islog'])){
            unset($_SESSION['islog'], $_SESSION['lname'], $_SESSION['email'], $_SESSION['fname'], $_SESSION['uid'], $_SESSION['postcode'], $_SESSION['phone'], $_SESSION['state'], $_SESSION['confirmed'], $_SESSION['address']);
        }
        header('Location: ./index.php');
    }
}
