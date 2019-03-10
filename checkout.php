<?php
include_once("header.php");
if($_SESSION['cart'] == 0){
    //header('Location: ./menu-grid-navigation.php');
    echo "<script>window.location.href = './menu-grid-navigation.php';</script>";
}
if(isset($_POST['porform'])){
    $address = mysqli_real_escape_string($connection,$_POST['address']);
    $postcode = mysqli_real_escape_string($connection,$_POST['postcode']);
    $state = mysqli_real_escape_string($connection,$_POST['state']);
    $mdx = mysqli_fetch_array(mysqli_query($connection,"select * from postcode where postcode_id=$postcode"));

    if(isset($_POST['ch'])){
        mysqli_query($connection,"update customer set address='$address', postcode_id=$postcode, state='$state' where customer_id=".$_SESSION['uid']);
        $_SESSION['postcode'] = $mdx['postcode'];
        $_SESSION['city'] = $mdx['city'];
        $_SESSION['state'] = $state;
        $_SESSION['address'] = $address;
    }

}
if(isset($address)){
  $place = $address."\n".$mdx['city']."\n".$state.", ".$mdx['postcode'];
}else{
  $place = $_SESSION['address']."\n".$_SESSION['city']."\n".$_SESSION['state'].", ".$_SESSION['postcode'];
}

$_SESSION['place'] = $place;
?>

<script type="text/javascript">
    $(document).ready(function(){
        viewCart();
        //alert("here");
    });
</script>
<!-- Content -->
    <div id="content">

        <!-- Page Title -->
        <div class="page-title bg-dark dark">
            <!-- BG Image -->
            <div class="bg-image bg-parallax"><img src="assets/img/photos/meat1.jpg" alt=""></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 push-lg-4">
                        <h1 class="display-2 mb-2 black"><b>Checkout</b></h1>
                        <h3 class="display-5 mb-2 black">Confirm your Order</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section -->
        <section class="section bg-light">

            <div class="container">
                <div class="row">
                    <div class="col-xl-4 push-xl-8 col-lg-5 push-lg-7">
                        <div class="shadow bg-white stick-to-content mb-4">
                            <div class="bg-dark dark p-4"><h5 class="mb-0">You order</h5></div>
                            <div id="tablePrintx"> </div>
                        </div>
                    </div>
                    <div class="col-xl-8 pull-xl-4 col-lg-7 pull-lg-5">
                        <div class="bg-white p-4 p-md-5 mb-4">
                            <h4 class="border-bottom pb-4"><i class="ti ti-user mr-3 text-primary"></i>Basic informations</h4>
                            <div class="row mb-5">
                                <div class="form-group col-sm-6">
                                    <label>First Name:</label>
                                    <input type="text" class="form-control" value="<?php echo $_SESSION['fname']; ?>" disabled>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Last Name:</label>
                                    <input type="text" class="form-control" value="<?php echo $_SESSION['lname']; ?>" disabled>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Phone number:</label>
                                    <input type="text" class="form-control" value="<?php echo $_SESSION['phone']; ?>" disabled>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>E-mail address:</label>
                                    <input type="email" class="form-control" value="<?php echo $_SESSION['email']; ?>" disabled>
                                </div>
                                <div class="form-group col-sm-12">
                                    <textarea class="form-control" rows="5" id='d_add' name="address" readonly>
                                        <?php echo $place; ?>
                                    </textarea>
                                    <a href='#' class='btn btn-primary btn-md pull-right' data-toggle='modal' data-target=".del-add">Change Delivery Address</a>
                                </div>
                            </div>

                            <h4 class="border-bottom pb-4"><i class="ti ti-package mr-3 text-primary"></i>Delivery</h4>
                            <div class="row mb-5">
                                <div class="form-group col-sm-6">
                                    <label>Delivery time:</label>
                                    <div class="select-container">
                                        <select class="form-control">
                                            <option>In 1 to 2 business day</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <h4 class="border-bottom pb-4"><i class="ti ti-wallet mr-3 text-primary"></i>Payment</h4>
                            <div class="row text-lg">
                                <div class="col-md-4 col-sm-6 form-group">
                                    <label class="custom-control custom-radio">
                                        <input type="radio" name="payment_type" class="custom-control-input" disabled>
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">PayPal</span>
                                    </label>
                                </div>
                                <div class="col-md-4 col-sm-6 form-group">
                                    <label class="custom-control custom-radio">
                                        <input type="radio" name="payment_type" class="custom-control-input" disabled>
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">Credit Card</span>
                                    </label>
                                </div>
                                <div class="col-md-4 col-sm-6 form-group">
                                    <label class="custom-control custom-radio">
                                        <input type="radio" name="payment_type" class="custom-control-input" checked>
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">Pay on Delivery</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <a href="./confirmation.php?mtype=ordernow" class="btn btn-primary btn-lg" onclick=""><span>Order now!</span></a>
                        </div>
                    </div>
                </div>
            </div>

        </section>


        <!-- Address Modal -->
        <div class="modal fade del-add" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-xm" style="color:#000;font-family:Andalus;font-size:15px;text-align:justify;">
		<div class="modal-content">
			<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
			  </button>
			  <h4 class="modal-title" id="myModalLabel2">Supply the delivery address</h4>
			</div>
			<form class="form-horizontal form-label-left" name="mosque" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<div class="modal-body">
					<div class="form-group">
						<label>Delivery Address:</label>
						<textarea rows="3" name="address" class="form-control" placeholder="House Address" required></textarea>
					</div>
					<div class="form-group">
						<label>Area/Suburb:</label>
						<select style="color:purple;font-weight:400;" name="postcode" class="form-control" onChange="createLot(this.value);">
							<option value="-1">Select your Area or Suburb</option>
						  <?php
							  $qnx = mysqli_query($connection,"SELECT * FROM postcode ORDER BY city asc");
							  while($dns = mysqli_fetch_array($qnx)){  ?>
								<option value="<?php echo $dns['postcode_id']; ?>"><?php echo $dns['city']; ?></option>
						<?php } ?>
					   </select>
					</div>
					<div class="form-group">
						<label>Post Code:</label>
						<input style="color:purple;font-weight:400" id="lott" name="pcode" type="text" class="form-control" disabled>
					</div>
					<div class="form-group">
						<label>State:</label>
						<select name="state" class="form-control" onchange="">
							<option value="New South Wales">New South Wales</option>
						</select>
					</div>
                    <div class="form-group">
                        <label>Replace my address</label>
                        <input type="checkbox" name="ch" value="1" checked />
                    </div>
					<div class="ln_solid"></div>
					<input type="hidden" name="porform" value="TRUE" />
				</div>
				<div class="modal-footer">
				  <button type="submit" name="submit" class="btn btn-primary submit" onclick="">Change Address</button>
				  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				</div>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">
    function orderNow(){
        url = "./getprops.php?mtype=ordernow";
        //alert(url);
        if(window.XMLHttpRequest){
            xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET",url,false);
            xmlhttp.send(null);

        }
        else{
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            xmlhttp.open("GET",url,false);
            xmlhttp.send();
        }
        //alert(xmlhttp.responseText);
    }
</script>

<?php
include_once("footer.php");
?>
