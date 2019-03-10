<?php
//ob_start();
require_once("./config/site_func.php");
require_once ('./config/config.php');

$sfunc = new SiteFunction();

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
            header('Location: ./confirmation.php?act=failed&title1=2$thr='.$acode);
        }else{
            $fname = mysqli_fetch_array($qmx)['firstname'];

            mysqli_query($connection,"update customer set confirmed=1 where email='$email' and verification='$active'");

            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From: eMeat Australia <info@emeat.com.au>' . "\r\n";
            $subject = 'Welcome to eMeat Australia - Account Activated';
            $message = "Hi $fname,<br><br>Your account with eMeat Australia has successfully been activated. <br><br>";
            $message .= "<p>Now that you have signed up, we can't wait to start trading with you.<br><br><b>The right products.</b><br>Discover our extensive variation of meat and chicken, with a range of quality options to suit all needs, occasions and budgets.<br><br><b>Order meat on the way.</b><br>Our simple platform lets you order meat online at the comfort of your home or office with expert ease.<br><br><b>Halal product guaranteed.</b><br>We assured you of pure and healthy halal meat and chicken from our trusted and certified supplier.<br><br><b>Pay on delivery.</b><br>Payment will only be made when your product is delivered.</p><p>Start ordering your meat by clicking the button below.</p>";
            $message .= "<a href='https://emeat.com.au' style=' background-color: #4CAF50;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 14px;'>Visit eMeat</a>";
            $message .= "<br><br>eMeat - Australia<br>https://emeat.com.au";
            mail($email,$subject,$message,$headers);

            header('Location: ./confirmation.php?act=verified&title1=1$thr='.$acode);
        }
    }elseif($mtype=='logout'){
        if(isset($_SESSION['islog'])){
            unset($_SESSION['islog'], $_SESSION['lname'], $_SESSION['email'], $_SESSION['fname'], $_SESSION['uid'], $_SESSION['postcode'], $_SESSION['phone'], $_SESSION['state'], $_SESSION['confirmed'], $_SESSION['address']);
        }
        reset_sessions();
        header('Location: ./index.php');
    }elseif($mtype=='togrof'){
        $email=$_GET['liame'];
        $active=$_GET['verify'];//pass
        $ecode=$_GET['ecode'];//verify
        $dcode=$_GET['dcode'];//autocode
        $qmx = mysqli_query($connection,"select * from customer where email='$email' and verification='$ecode' and password='$active'");
        $xmt = mysqli_num_rows($qmx);
        if($xmt == 0){
            header('Location: ./confirmation.php?act=failed&title1=3$thr='.$dcode);
        }else{
            $fname = mysqli_fetch_array($qmx)['firstname'];
            $temp_pass = $sfunc->get_rand_id(8);
            $pass = sha1($temp_pass);

            mysqli_query($connection,"update customer set password='$pass' where email='$email' and verification='$ecode' and password='$active'");

            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From: eMeat Australia <info@emeat.com.au>' . "\r\n";
            $subject = 'eMeat Australia - Password changed';
            $message = "Hi $fname,<br><br>Your password account with eMeat Australia has successfully been changed. <br><br>";
            $message .= "<p>You can used the temporary password given below to login.<br><br><b>Temporary Password:&nbsp; $temp_pass</b><br><br>It is advised to change your password immidiately after you have signed on.</p>";
            $message .= "Click this button to login &nbsp; <a href='https://emeat.com.au' style=' background-color: #4CAF50;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 14px;'>Visit eMeat</a>";
            $message .= "<br><br>eMeat - Australia<br>https://emeat.com.au";
            mail($email,$subject,$message,$headers);

            header('Location: ./confirmation.php?act=verified&title1=4$thr='.$dcode);
        }
    }elseif($mtype=='addcart'){
		$idx=$_GET['idx'];
		$kgx=$_GET['kgx'];
		$prx=$_GET['prx'];
        $kg = $idx - 1;

        if(!isset($_SESSION['carts'])){
            $fxt = mysqli_query($connection,"select * from product");
            $xmt = mysqli_num_rows($fxt);
            $_SESSION["total"] = 0;
            for ($i=0; $i<$xmt; $i++) {
		      $_SESSION["qty"][$i] = 0;
		      $_SESSION["amounts"][$i] = 0;
              $_SESSION["price"][$i] = 0;
		      $_SESSION["namer"][$i] = "";
		      $_SESSION["descr"][$i] = "";
	        }
        }

        $fxx = mysqli_fetch_array(mysqli_query($connection,"select * from product where product_id=$idx"));
        $name = $fxx['product_name'];
        $price = $fxx['price'];
        $qty = $_SESSION["qty"][$kg] + $kgx;
        $_SESSION["amounts"][$kg] = $price * $qty;
        $_SESSION["carts"][$kg] = $kg;
        $_SESSION["qty"][$kg] = $qty;
		$_SESSION["namer"][$kg] = $name;
		$_SESSION["price"][$kg] = $price;
		$_SESSION["descr"][$kg] = "(".$qty."kg) - ".cut_type($prx);
        $_SESSION['cart'] = count($_SESSION['carts']);
        if (isset($_SESSION["carts"]) and count($_SESSION['carts'])>0 ) {
            $cart_reply = "[";
            foreach ($_SESSION["carts"] as $k) {
                $cart_reply .= '{"name":"'.$_SESSION["namer"][$k].'","description":"'.$_SESSION["descr"][$k].'","price":"'.$_SESSION["price"][$k].'","amount":"'.$_SESSION["amounts"][$k].'","id":"'.$_SESSION["carts"][$k].'"},';
            }
            $cart_reply = substr($cart_reply, 0, -1).']';
            echo $cart_reply;
        }else{
            echo 0;
        }

    }elseif($mtype=='removecart'){
        $i = $_GET['idx'];
        $_SESSION["amounts"][$i] = 0;
        $_SESSION["qty"][$i] = 0;
        $_SESSION["price"][$i] = 0;
        $_SESSION["namer"][$i] = "";
        $_SESSION["descr"][$i] = "";
        unset($_SESSION["carts"][$i]);
        $_SESSION['cart'] = count($_SESSION['carts']);
        echo "";

    }elseif($mtype=='resetcart'){
        reset_sessions();
        $_SESSION['cart'] = 0;
        echo 0;
    }elseif($mtype=='removeitem'){
        $idx=$_GET['idx'];
		$kgx=$_GET['kgx'];
		$prx=$_GET['prx'];
        $kg = $idx;
        $_SESSION["amounts"][$kg] = $price * $kgx;
        $_SESSION["carts"][$kg] = $kg;
        $_SESSION["qty"][$kg] = $kgx;
		$_SESSION["descr"][$kg] = "(".$kgx."kg) - ".cut_type($prx);
        if (isset($_SESSION["carts"]) and count($_SESSION['carts'])>0 ) {
            $_SESSION['cart'] = count($_SESSION['carts']);
            $cart_reply = "[";
            foreach ($_SESSION["carts"] as $k) {
                $cart_reply .= '{"name":"'.$_SESSION["namer"][$k].'","description":"'.$_SESSION["descr"][$k].'","price":"'.$_SESSION["price"][$k].'","amount":"'.$_SESSION["amounts"][$k].'","id":"'.$_SESSION["carts"][$k].'"},';
            }
            $cart_reply = substr($cart_reply, 0, -1).']';
            echo $cart_reply;
        }else{
            echo 0;
        }
    }elseif($mtype=='onecart'){
        $idx=$_GET['idx'];
        if (isset($_SESSION["carts"][$idx]) ) {
            $cart_reply = '[{"name":"'.$_SESSION["namer"][$idx].'","description":"'.$_SESSION["descr"][$idx].'","price":"'.$_SESSION["price"][$idx].'","amount":"'.$_SESSION["amounts"][$idx].'","id":"'.$_SESSION["carts"][$idx].'"}]';
            echo $cart_reply;
        }else{
            echo 0;
        }
    }elseif($mtype=='viewcart'){
        if (isset($_SESSION["carts"]) and count($_SESSION['carts'])>0) {
            $_SESSION['cart'] = count($_SESSION['carts']);
            $cart_reply = "[";
            foreach ($_SESSION["carts"] as $k) {
                $cart_reply .= '{"name":"'.$_SESSION["namer"][$k].'","description":"'.$_SESSION["descr"][$k].'","price":"'.$_SESSION["price"][$k].'","amount":"'.$_SESSION["amounts"][$k].'","id":"'.$_SESSION["carts"][$k].'"},';
            }
            $cart_reply = substr($cart_reply, 0, -1).']';
            echo $cart_reply;
        }else{
            echo 0;
        }
    }elseif($mtype=='ordernow'){
        $address = $_SESSION['place'];
        $order_num = "#".$sfunc->get_rand_num(8);
        $customer_id = $_SESSION['uid'];
        $email = $_SESSION['email'];
        $phone = $_SESSION['phone'];
        $fname = $_SESSION['fname'];
        $lname = $_SESSION['lname'];
        $emailw = 'orders@emeat.com.au';
        $order_date = time();
        $total = 0;
        $discount = 0;
        $shipping = 0;
        $alltot = 0;
        foreach ($_SESSION["carts"] as $k) {
            $name = $_SESSION["namer"][$k];
            $price = floatval($_SESSION["price"][$k]);
            $amount = floatval($_SESSION["amounts"][$k]);
            $descr = $_SESSION["descr"][$k];
            $total += $amount;
            mysqli_query($connection, "INSERT INTO orders(order_number, customer_id, order_date, product_name, price, amount, description, delivery_address) VALUES ('$order_num',$customer_id,$order_date,'$name',$price,$amount,'$descr','$address')");
        }
        if($total>=100){$discount = $total*0.05;}
        if($total<30){$shipping = 10;}
        $alltot = $total + $shipping - $discount;
        mysqli_query($connection, "UPDATE orders set total=$alltot, delivery=$shipping, discount=$discount where order_number='$order_num' and customer_id=$customer_id and order_date=$order_date");


        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: eMeat Australia <info@emeat.com.au>' . "\r\n";
        $subject = 'eMeat Australia - Order Confirmed';
        $message = "Hi $fname,<br><br>Your oder has been confirmed on the platform. A member of our team will call you shortly.<br><br>";
        $message .= "<p>Your order details <b>($order_num)</b> is given below:<br></p><table><thead><tr><th>Product Name</th><th>Description</th><th>Price/kg</th><th>Amount ($)</th></tr></thead><tbody>";
        $total = 0;
        $discount = 0;
        $shipping = 0;
        $alltot = 0;
        foreach ($_SESSION["carts"] as $k) {
            $name = $_SESSION["namer"][$k];
            $price = floatval($_SESSION["price"][$k]);
            $amount = floatval($_SESSION["amounts"][$k]);
            $amt = number_format($amount,2);
            $descr = $_SESSION["descr"][$k];
            $message .= "<tr><td>$name</td><td>$descr</td><td>$$price</td><td>$$amt</td></tr>";
            $total += $amount;
        }
        if($total>=100){
            $discount = $total*0.05;
            $dis = number_format($discount,2);
            $message .= "<tr><td colspan='2'>Discount(5% off)</td><td colspan='2'>$$dis<td></tr>";
        }
        if($total<30){
            $shipping = 10;
            $message .= "<tr><td colspan='2'>Delivery(< $30)</td><td colspan='2'>$10.00</td></tr>";
        }else{
            $message .= "<tr><td colspan='2'>Delivery(> $30)</td><td colspan='2'>$0.00</td></tr>";
        }
        $alltot = $total + $shipping - $discount;
        $altt = number_format($alltot,2);
        $message .= "<tr><td><b>Total</b></td><td colspan='3'>$$altt</td></tr></tbody></table><br>";
        $message .= "Your order will be delivered in 1 to 2 business day to<br>$address.<br>We only accept payment on delivery.<br><br>";
        $message .= "<br><br>eMeat - Australia<br>https://emeat.com.au";

        $message2 = $message . "<br<br>------<br>Order Number: $order_num <br>Name: $fname, $lname <br>Phone: $phone<br>E-mail: $email<br>Address: $address";
        mail($email,$subject,$message,$headers);
        mail($emailw,"New Order Received",$message2,$headers);
        reset_sessions();
        header('Location: ./confirmation.php?act=order&title1=5$thr='.$order_num);
    }
}

function reset_sessions(){
    unset($_SESSION['carts']);
    unset($_SESSION['amounts']);
    unset($_SESSION['qty']);
    unset($_SESSION['price']);
    unset($_SESSION['namer']);
    unset($_SESSION['descr']);
    $_SESSION['cart'] = 0;
}

function cut_type($x){
    if($x==0)
        return "Do not cut into pieces";
    elseif($x==1)
        return "Cut into smaller sizes";
    elseif($x==2)
        return "Cut into medium sizes";
    elseif($x==3)
        return "Cut into larger sizes";
    else
        return "Cut into any sizes";
}
?>
