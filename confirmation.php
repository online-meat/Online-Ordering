<?php
    include_once("header.php");
    require_once("./config/site_func.php");
    @$title1 = $_GET['title1'];
    @$title2 = $_GET['title2'];
    @$title3 = $_GET['title3'];
    @$mtype = $_GET['mtype'];


    $top = $title1;

    if(!isset($title1)){
        $title1 = "Thank you!";
    }
    if(!isset($title2)){
        $title2 = "";
    }
    if(!isset($title3)){
        $title3 = "<a href='index.php' class='btn btn-outline-secondary'>Go back to Home</a>";
    }

    if($title1==1){
        $title1 = "Account Activated!";
        $title2 = "Your email address has been successfully confirmed. You can start ordering your meat by sign in to your account.";
        echo "<script>$(document).ready(function(e){alertify.success('Account activated successfully.');});</script>";
        echo "<script type='text/javascript'> $(document).ready(function(e){notifyUser('Discover our extensive variation of meat and chicken, with a range of quality options to suit all needs, occasions and budgets. Login to your account','success'); });
				</script>";
    }elseif($title1==2){
        $title1 = "Activation Failed!";
        $title2 = "Your email address cannot be confirmed.  Please try to register again.";
        echo "<script>$(document).ready(function(e){alertify.error('Account cannot be activated.');});</script>";
    }elseif($title1==4){
        $title1 = "Password Changed Successfully!";
        $title2 = "Your password has been successfully changed. A temporary password has been sent to your email address. Use this temporary password to login and change it to your choice.";
        echo "<script>$(document).ready(function(e){alertify.success('Account password changed successfully.');});</script>";
        echo "<script type='text/javascript'> $(document).ready(function(e){notifyUser('Discover our extensive variation of meat and chicken, with a range of quality options to suit all needs, occasions and budgets. Login to your account','success'); });
				</script>";
    }elseif($title1==3){
        $title1 = "Password Change Failed!";
        $title2 = "Your email address cannot be confirmed.  Please try to register again.";
        echo "<script>$(document).ready(function(e){alertify.error('Password cannot be changed.');});</script>";
    }


if(isset($mtype)){
    if($_SESSION['cart'] == 0){
    echo "<script>window.location.href = './menu-grid-navigation.php';</script>";
    }
    if($mtype=='ordernow'){

        $sfunc = new SiteFunction();
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

        $message2 = $message . "<br><br>------<br>Order Number: $order_num <br>Name: $fname, $lname <br>Phone: $phone<br>E-mail: $email<br>Address: $address";
        mail($email,$subject,$message,$headers);
        mail($emailw,"New Order Received",$message2,$headers);
        reset_sessions();


        $top=1;
        $title1 = "Thank you for your order!";
        $title2 = "You will receice a call from one of our team member shortly.";
        $title3 = "<a href='index.php' class='btn btn-outline-secondary'>Go back to Home</a>";
        echo "<script>$(document).ready(function(e){alertify.success('Order Confirmed.');viewCart();});</script>";
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
?>



<!-- Content -->
    <div id="content">

        <!-- Section -->
        <section class="section bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 push-lg-4">
                        <span class="icon icon-xl icon-<?php echo $top==1?'success':'warning'; ?>"><i class="ti ti-check-box"></i></span>
                        <h1 class="mb-2"><?php echo $title1; ?></h1>
                        <h4 class="text-muted mb-5"><?php echo $title2; ?></h4>
                        <p><?php echo $title3; ?></p>
                    </div>
                </div>
            </div>
        </section>




<?php
    include_once("footer.php");
?>
