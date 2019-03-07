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
        $qmx = mysqli_query($connection,"select * from customer where email='$email' and verification='$active'");
        $xmt = mysqli_num_rows($qmx);
        if($xmt == 0){
            header('Location: ./confirmation.php?act=failed&title1=2$thr='.$code);
        }else{
            $fname = mysqli_fetch_array($qmx)['fname'];

            mysqli_query($connection,"update customer set confirmed=1 where email='$email' and verification='$active'");

            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From: <info@emeat.com.au>' . "\r\n";
            //$headers .= 'Cc: myboss@example.com' . "\r\n";
            $subject = 'Welcome to eMeat Australia - Account Activated';
            $message = "Hi $fname,\n\nYour account with eMeat Australia has successfully been activated. \n\n";
            $message .= "<p>Now that you have signed up, we can't wait to start trading with you.<br><br><b>The right products.</b><br>Discover our extensive variation of meat and chicken, with a range of quality options to suit all needs, occasions and budgets.<br><br><b>Order meat on the way.</b><br>Our simple platform lets you order meat online at comfort of your home or office with expert ease.<br><br><b>Halal product guaranteed.</b>We assured you of pure and healthy halal meat and chicken from our trusted and certified supplier.<br><br><b>Pay on delivery.</b><br>Payment will only be made when your product is delivered.</p><p>Start ordering your meat by clicking the button below.</p>";
            $message .= "<a href='https://emeat.com.au' style=' background-color: #4CAF50;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 14px;'>Visit eMeat</a>";
            $message .= "\n\neMeat - Australia\nhttps://emeat.com.au";
            mail($email,$subject,$message,$headers);

            header('Location: ./confirmation.php?act=verified&title1=1$thr='.$code);
        }
    }elseif($mtype=='logout'){
        if(isset($_SESSION['islog'])){
            unset($_SESSION['islog'], $_SESSION['lname'], $_SESSION['email'], $_SESSION['fname'], $_SESSION['uid'], $_SESSION['postcode'], $_SESSION['phone'], $_SESSION['state'], $_SESSION['confirmed'], $_SESSION['address']);
        }
        header('Location: ./index.php');
    }
}
