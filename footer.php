    <section><div></div></section>
        <!-- Section -->
        <section class="section section-lg dark bg-dark">

            <!-- BG Image -->
            <div class="bg-image bg-parallax"><img src="assets/img/photos/meat-banner.jpg" alt=""></div>

            <div class="container text-center">
                <div class="col-lg-8 push-lg-2">
                    <h2 class="display-2 mb-3">Would you like to order now?</h2>
                    <h5 class="display-5">Make an online order now and enjoy great services!</h5>
                    <a href="menu-grid-navigation.php" class="btn btn-primary"><span>Order Online</span></a>
                </div>
            </div>

        </section>



<!-- Footer -->
        <footer id="footer" class="bg-dark dark">

            <div class="container">
                <!-- Footer 2nd Row -->
                <div class="footer-second-row row align-items-center">
                    <div class="col-lg-4 text-center text-md-left">
                        <span class="text-sm text-muted">Copyright &copy; 2019 eMeat Australia<br>Design by eMeat.</span>
                    </div>
                    <div class="col-lg-4 text-center">
                        <a href="index.php"><img src="assets/img/logo-light.svg" alt="" width="88" class="mt-5 mb-5"></a>
                    </div>
                    <div class="col-lg-4 col-md-6 text-center text-md-right">
                        <a href="#" class="icon icon-social icon-circle icon-sm icon-facebook"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="icon icon-social icon-circle icon-sm icon-google"><i class="fa fa-google"></i></a>
                        <a href="#" class="icon icon-social icon-circle icon-sm icon-twitter"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="icon icon-social icon-circle icon-sm icon-youtube"><i class="fa fa-youtube"></i></a>
                        <a href="#" class="icon icon-social icon-circle icon-sm icon-instagram"><i class="fa fa-instagram"></i></a>
                    </div>
                </div>
            </div>

            <!-- Back To Top -->
            <a href="#" id="back-to-top"><i class="ti ti-angle-up"></i></a>

        </footer>
        <!-- Footer / End -->

        <script type="text/javascript">
            function closeModal(idx){
                $(idx).modal('hide');
            }
            function showModal(idx){
                $(idx).modal('show');
            }
            function destroyModal(idx){
                $(idx).modal('dispose');
            }
        </script>

        <!--Modal: Login / Register Form-->
        <div class="modal fade" id="modalLRForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog cascading-modal" role="document">
            <!--Content-->
            <div class="modal-content">
                <!-- Tab panels -->
                <div class="tab-content">
                  <!--Panel 7-->
                  <div class="tab-pane fade in show active" id="panel7" role="tabpanel">
                    <div class="modal-header modal-header-lg dark bg-dark">
                        <div class="bg-image"><img src="assets/img/images/review.jpg" alt=""></div>
                        <h2 class="modal-title fa fa-user-circle"> Login</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ti-close"></i></button>
                    </div>
                    <!--Body-->
                    <div class="modal-body mb-1">
                      <form action="#" method="post">
                        <div class="form-group">
                            <label>Email Address:</label>
                            <input type="email" name="email" class="form-control" placeholder="Email Address" required>
                        </div>
                        <div class="form-group">
                            <label>Password:</label>
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="text-center">
                            <input type="submit" class="btn btn-primary" value="Login"/>
                        </div>
                        <input type="hidden" name='logform' value="TRUE" />
                      </form>
                    </div>
                    <!--Footer-->
                    <div class="modal-footer">
                      <div class="options text-center text-md-right mt-1">
                          <p>Not a member? <a data-toggle="tab" href="#panel8" class="blue-text"><b>Sign Up</b></a></p>
                          <p>Forgot <a data-toggle="tab" href="#panel9" class="blue-text"><b>Password?</b></a></p>
                      </div>
                      <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
                    </div>

                  </div>
                  <!--/.Panel 7-->

                  <!--Panel 9-->
                  <div class="tab-pane fade" id="panel9" role="tabpanel">
                    <div class="modal-header modal-header-lg dark bg-dark">
                        <div class="bg-image"><img src="assets/img/images/review.jpg" alt=""></div>
                        <h2 class="modal-title fa fa-key"> Retrieve your password</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ti-close"></i></button>
                    </div>
                    <div class="modal-body">
                    <form action="#" method="post">
                        <div class="form-group">
                            <label>Email Address:</label>
                            <input type="email" name="email" class="form-control" placeholder="Email Address" required>
                        </div>
                        <div class="text-center">
                            <input type="submit" class="btn btn-primary" value="Retrieve"/>
                        </div>
                        <input type="hidden" name='forgotform' value="TRUE" />
                    </form>
                    </div>
                    <div class="modal-footer">
                        <div class="options text-right">
                          <p class="pt-1"><a data-toggle="tab" href="#panel7" class="blue-text"><b>Log In</b></a></p>
                      </div>
                      <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
                    </div>
                  </div>


                  <!--Panel 8-->
                  <div class="tab-pane fade" id="panel8" role="tabpanel">

                    <div class="modal-header modal-header-lg dark bg-dark">
                        <div class="bg-image"><img src="assets/img/images/review.jpg" alt=""></div>
                        <h2 class="modal-title fa fa-user-plus"> Sign Up</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ti-close"></i></button>
                    </div>
                    <!--Body-->
                    <div class="modal-body">
                      <form action="#" method="post">
                                    <div class="form-group">
                                        <label>First Name:</label>
                                        <input type="text" name="fname" class="form-control" placeholder="First Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Last Name:</label>
                                        <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label>House Address:</label>
                                        <textarea rows="4" name="address" class="form-control" placeholder="House Address" required></textarea>
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
                                        <input style="color:purple;font-weight:400" id="lott" type="text" class="form-control" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>State:</label>
                                        <select name="state" class="form-control" onchange="">
                                            <option value="New South Wales">New South Wales</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Phone Number:</label>
                                        <input type="number" name="phone" class="form-control" placeholder="Phone Number" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Email Address:</label>
                                        <input type="email" name="email" class="form-control" placeholder="Email Address" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Password:</label>
                                        <input type="password" name = "password" class="form-control" placeholder="Password" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password:</label>
                                        <input type="password" name = "password2" class="form-control" placeholder="Repeat Password" required>
                                    </div>
                                    <div class="text-center">
                                        <input type="submit" class="btn btn-primary " value="Register"/>
                                    </div>
                                    <input type="hidden" name='regform' value="TRUE" />
                                </form>

                    </div>
                    <!--Footer-->
                    <div class="modal-footer">
                      <div class="options text-right">
                          <p class="pt-1">Already have an account? <a data-toggle="tab" href="#panel7" class="blue-text"><b>Log In</b></a></p>
                      </div>
                      <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                  <!--/.Panel 8-->
                </div>
            </div>
            <!--/.Content-->
          </div>
        </div>
        <!--Modal: Login / Register Form-->


    <!-- Modal: modalAbandonedCart-->
    <div class="modal fade right" id="modalAddedCart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
      aria-hidden="true" data-backdrop="false">
      <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-info" role="document">
        <!--Content-->
        <div class="modal-content">
          <!--Header-->
          <div class="modal-header">
            Product added to the cart
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ti-close"></i></button>
          </div>

          <!--Body-->
          <div class="modal-body">

            <div class="row">
              <div class="col-3">
                <p></p>
                <p class="text-center"><i class="ti ti-shopping-cart-full"></i></p>
              </div>

              <div class="col-9">
                <p>Item Added Cart?</p>
                <p>Do you wish to checkout or continue shopping?</p>
              </div>
            </div>
          </div>

          <!--Footer-->
          <div class="modal-footer justify-content-center">
            <a href="./checkout.php" type="button" class="btn btn-info"  onclick="">Checkout</a>
            <a href='./menu-grid-navigation.php' class="btn btn-outline-info waves-effect" data-dismiss="modal">Continue Shopping</a>
          </div>
        </div>
        <!--/.Content-->
      </div>
    </div>
    <!-- Modal: modalAbandonedCart-->

    <!-- Panel Cart -->
    <div id="panel-cart">
        <div class="panel-cart-container" style="height:90%">
            <div class="panel-cart-title">
                <h5 class="title ti ti-shopping-cart"> Your Cart  &nbsp; <span id='carttot' class='pull-right'></span></h5>
                <button class="close" data-toggle="panel-cart"><i class="ti ti-close"></i></button>
            </div>
            <div class="panel-cart-content">
                <div id="tablePrints"> </div>
            </div>
        </div>
        <?php if($_SESSION['cart'] > 0){ ?>
        <a href="./checkout.php" class="panel-cart-action btn btn-secondary btn-block btn-lg"><span>Go to checkout</span></a>
        <?php }else{ ?>
        <a href="#" class="panel-cart-action btn btn-secondary btn-block btn-lg" aria-disabled="true"><span>Empty Cart</span></a>
        <?php } ?>
    </div>

    <!-- Panel Mobile -->
    <nav id="panel-mobile">
        <div class="module module-logo bg-dark dark">
            <a href="#">
                <img src="assets/img/Company%20Logo.png" alt="" width="88">
            </a>
            <button class="close" data-toggle="panel-mobile"><i class="ti ti-close"></i></button>
        </div>

        <nav class="module module-navigation"></nav>

        <div class="module module-social">
            <h6 class="text-sm mb-3">Follow Us!</h6>
            <a href="#" class="icon icon-social icon-circle icon-sm icon-facebook"><i class="fa fa-facebook"></i></a>
            <a href="#" class="icon icon-social icon-circle icon-sm icon-google"><i class="fa fa-google"></i></a>
            <a href="#" class="icon icon-social icon-circle icon-sm icon-twitter"><i class="fa fa-twitter"></i></a>
            <a href="#" class="icon icon-social icon-circle icon-sm icon-youtube"><i class="fa fa-youtube"></i></a>
            <a href="#" class="icon icon-social icon-circle icon-sm icon-instagram"><i class="fa fa-instagram"></i></a>
        </div>
    </nav>

    <!-- Body Overlay -->
    <div id="body-overlay"></div>

</div>

<!-- Modal / Product -->
<div class="modal fade" id="productModal" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header modal-header-lg dark bg-dark">
                <div class="bg-image"><img src="assets/img/photos/modal-add.jpg" alt=""></div>
                <h4 class="modal-title">Specify the item</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ti-close"></i></button>
            </div>
            <div id="jsproduct"></div>
            <div class="modal-body panel-details-container">
                <!-- Panel Details / KG -->
                <div class="panel-details">
                    <h5 class="panel-details-title">
                        <a href="#panelDetailsAdditions" data-toggle="collapse"><i class="ti ti-package" ></i> How many kilogram? <i class="pull-right ti-arrow-circle-down" ></i> </a>
                    </h5>
                    <div id="panelDetailsAdditions" class="collapse show">
                        <div class="panel-details-content">
                            <div class="row">
                                kg <div class="col-sm-3">
                                   <input id="kgid" name="kgx" type="number" min="1.0" step="0.5" value="1.0" class="control-input"  onkeyup="checkInp(this.value);" onchange="checkInp(this.value);" required>
                                </div> &nbsp;
                                <div class="col-sm-9">
                                    Example: 10, 11.5, 12.0, 12.5, ...
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Panel Details / Size -->
                <div class="panel-details">
                    <h5 class="panel-details-title">
                        <a href="#panelDetailsSize" data-toggle="collapse"><i class="ti ti-split-v" ></i> Select cutting option <i class="pull-right ti-arrow-circle-down" ></i> </a>
                    </h5>
                    <div id="panelDetailsSize" class="collapse">
                        <div class="panel-details-content">
                            <div class="form-group">
                                <label class="custom-control custom-radio">
                                    <input name="radio_size" type="radio" class="custom-control-input" value="0" checked>
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Do not cut into pieces</span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label class="custom-control custom-radio">
                                    <input name="radio_size" type="radio" class="custom-control-input" value="1">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Cut into small sizes</span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label class="custom-control custom-radio">
                                    <input name="radio_size" type="radio" class="custom-control-input" value="2">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Cut into medium sizes</span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label class="custom-control custom-radio">
                                    <input name="radio_size" type="radio" class="custom-control-input" value="3">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Cut into large sizes</span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label class="custom-control custom-radio">
                                    <input name="radio_size" type="radio" class="custom-control-input" value="4">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Cut into any sizes</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Panel Details / Total -->
                <div class="panel-details">
                    <h5 class="panel-details-title">
                        <i class="ti ti-shopping-cart-full" ></i> Amount: &nbsp;<div class="pull-right" id="totalitem"></div>
                    </h5>
                </div>
            </div>
            <button type="button" class="modal-btn btn btn-secondary btn-block btn-lg" onclick="addToCart();" data-target="#modalAddedCart" data-toggle="modal" data-dismiss="modal"><span>Add to Cart</span></button>
        </div>
    </div>
</div>

<script type="text/javascript">
function resetAlert () {
    $("#toggleCSS").attr("href", "assets/plugins/alertify/css/alertify.default.css");
    alertify.set({
        labels : {
            ok     : "OK",
            cancel : "Cancel"
        },
        delay : 5000,
        buttonReverse : false,
        buttonFocus   : "ok"
    });
}
function logoutAlert() {
    alertify.set({ labels: { ok: "Logout", cancel: "Cancel" } });
    alertify.confirm("Do you wish to logout?", function (e) {
        if (e) {
            alertify.log("You've logged out");
            window.location.href = "./getprops.php?mtype=logout";
        } else {
            alertify.log("You're still logon");
        }
    });
    resetAlert();
    return false;
}
function viewCartAlert() {
    alertify.log("Item Added to Cart");
    $("#panel-cart").modal();
}

</script>

<script type="text/javascript">
    function createLot(idx){
        url = "./getprops.php?mtype=postcode&idx="+idx;
        //alert(url);
        //Send an XMLHttpRequest to the 'getnew.php' file

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

        // "<div class='alert alert-success' role='alert'></div>";
        document.getElementById('lott').value = xmlhttp.responseText
    }
</script>

<script type="text/javascript">
		var textBox = document.getElementById('searchbox'),
			resultContainer = document.getElementById('searchresult'),
            textBox1 = document.getElementById('searchbox1'),
			resultContainer1 = document.getElementById('searchresult1')

		// keep this global to abort it if already a request is running even textbox is upated
		var ajax = null;
		var loadedUsers = 0; // number of users shown in the results

		textBox.onkeyup = function() {
			// "this" refers to the textbox
			var val = this.value;

			// trim - remove spaces in the begining and the end
			val = val.replace(/^\s|\s+$/, "");

			// check if the value is not empty
			if (val !== "") {
				// search for data
				searchForData(val, 0);
			} else {
				// clear the result content
				clearResult(0);
			}
		}

        textBox1.onkeyup = function() {
			// "this" refers to the textbox
			var val = this.value;

			// trim - remove spaces in the begining and the end
			val = val.replace(/^\s|\s+$/, "");

			// check if the value is not empty
			if (val !== "") {
				// search for data
				searchForData(val, 1);
			} else {
				// clear the result content
				clearResult(1);
			}
		}


		function searchForData(value, vx, isLoadMoreMode) {
			// abort if ajax request is already there
			if (ajax && typeof ajax.abort === 'function') {
				ajax.abort();
			}

			// nocleaning result is set to true on load more mode
			if (isLoadMoreMode !== true) {
				clearResult();
			}

			// create the ajax object
			ajax = new XMLHttpRequest();
			// the function to execute on ready state is changed
			ajax.onreadystatechange = function() {
				if (this.readyState === 4 && this.status === 200) {
					try {
						var json = JSON.parse(this.responseText)
					} catch (e) {
						noUsers();
						return;
					}

					if (json.length === 0) {
						if (isLoadMoreMode) {
							//alert('No more to load');
						} else {
							noUsers(vx);
						}
					} else {
						showUsers(json, vx);
					}


				}
			}
			// open the connection
			ajax.open('GET', 'search.php?username=' + value + '&startFrom=' + loadedUsers , true);
			// send
			ajax.send();
		}

		function showUsers(data, vx) {
			// the function to create a row
			function createRow(rowData) {
				// creating the wrap
				var wrap = document.createElement("div");
				// add a class name
				wrap.className = 'row1'

				// name holder
				var name = document.createElement("span");
				name.innerHTML = rowData.name;

				// picture of the user
				var picture = document.createElement("img");
				picture.src = 'assets/img/photos/product/' + rowData.picture;
				picture.className = 'picture';

				// show descript on click
				wrap.onclick = function() {
					window.location.href = "./menu-grid-navigation.php#" + rowData.linkid;
				}

				wrap.appendChild(picture);
				wrap.appendChild(name);

				// append wrap into result container
                if(vx == 0)
				    resultContainer.appendChild(wrap);
                else
                    resultContainer1.appendChild(wrap);
			}

			// loop through the data
			for (var i = 0, len = data.length; i < len; i++) {
				// get each data
				var userData = data[i];
				// create the row (see above function)
				createRow(userData);
			}

			//  create load more button
			var loadMoreButton = document.createElement("span");
			loadMoreButton.innerHTML = "Load More";
			// add onclick event to it.
			loadMoreButton.onclick = function() {
				// searchForData() function is called in loadMoreMode
				searchForData(textBox.value, vx, true);
				// remove loadmorebutton
				this.parentElement.removeChild(this);
			}
			// append loadMoreButton to result container
			//resultContainer.appendChild(loadMoreButton);

			// increase the user count
			loadedUsers += len;
		}

		function clearResult(vx) {
			// clean the result <div>
            if(vx == 0)
                resultContainer.innerHTML = "";
            else
                resultContainer1.innerHTML = "";
			// make loaded users to 0
			loadedUsers = 0;
		}

		function noUsers(vx) {
            if(vx == 0)
			     resultContainer.innerHTML = "No product matches";
            else
                resultContainer1.innerHTML = "No product matches";
		}


	</script>

<script type="text/javascript">
var price_kg = 0;
function popJSProd(idx,name,price,ty){
    price_kg = price;
    var cat = ty==1?"Beef, Lamb, Goat":"Chicken, Duck, Turkey";
    var htmlDiv = "<div class='modal-product-details'><div class='row align-items-center'><div class='col-3 text-lg text-right'><img src='assets/img/photos/product/product"+idx+".jpg' /></div><div class='col-6'><h6 class='mb-0'>"+name+"</h6><span class='text-muted'>"+cat+"</span></div><div class='col-3 text-lg text-right'>$"+price+"/kg</div></div></div><input type='hidden' id='idxt' name='idx' value='"+idx+"'/><input type='hidden' id='prxt' name='idoprice' value='"+price+"'/>";
    document.getElementById('totalitem').innerHTML = "$ "+price;
    document.getElementById('jsproduct').innerHTML = htmlDiv;
    document.getElementById('kgid').value = 1;
}

function checkInp(value){
  if (isNaN(value)){
    alertify.error('Please enter numbers only');
    return false;
  }else if(value<1){
    alertify.error('Minimum order is 1 kg');
  }else{
      if((value % 0.5) == 0){
          var pop = value * parseFloat(price_kg);
          var hDiv = "$ "+pop.toFixed(2);
          document.getElementById('totalitem').innerHTML = hDiv;
      }else{
          alertify.error('KG should only be multiple of 0.5');
          document.getElementById('kgid').value = 1;
          var pop = parseFloat(price_kg);
          var hDiv = "$ "+pop.toFixed(2);
          document.getElementById('totalitem').innerHTML = hDiv;
      }
  }
}

function addToCart(){
    var idx = document.getElementById('idxt').value;
    //var prx = document.getElementById('prxt').value;
    var kgx = document.getElementById('kgid').value;
    var rdx = "";
    var radios = document.getElementsByName('radio_size');
    for (var i = 0, len = radios.length; i < len; i++) {
        if (radios[i].checked) {
            rdx = radios[i].value;
            break;
        }
    }
    //alert(idx+','+kgx+','+rdx);
    url = "./getprops.php?mtype=addcart&idx="+idx+"&kgx="+kgx+"&prx="+rdx;
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
    var myTable= "No Item in Cart";
    var response = xmlhttp.responseText;
    var all_total = 0;
    var jlen = 0;
    if(response != 0){
        try{
            myTable = "<table class='table-cart'>";

            var JSONObject = JSON.parse(response);
            var total=0.0;
            var discount = 0.0;
            var shipping = 0.0;
            jlen = JSONObject.length;
            for (var key in JSONObject) {
                if (JSONObject.hasOwnProperty(key)) {

                    var name = JSONObject[key]["name"];
                    var descr = JSONObject[key]["description"];
                    var price = JSONObject[key]["price"];
                    var amount = JSONObject[key]["amount"];
                    var ides = JSONObject[key]["id"];

	                myTable+="<tr><td class='title'><span class='name'>"+name+"</span><span class='caption text-muted'>"+descr+"</span> &nbsp;&nbsp;$"+price+"/kg</td><td class='price'>$"+to2dec(amount)+"</td><td class='actions'><a href='#' class='action-icon' title='Remove this item from your cart' onclick='removeCart("+ides+");'><i class='ti ti-close'></i></a></td></tr>";
	                total += parseFloat(amount);
                }
            }
            if(total>=100){
	           discount = total * 0.05;
	           myTable+="<tr><td class='title'><span class='name'>Discount 5% OFF</span></td><td class='price text-success'>-$"+to2dec(discount)+"</td><td class='actions'></td></tr>";
            }
            if(total<30){
	           shipping = 10.0;
	           myTable+="<tr><td class='title' colspan='2'><span class='name'>Delivery (< $30)</span></td><td class='price text-danger'>$10.00</td></tr>";
            }else{
	           myTable+="<tr><td class='title' colspan='2'><span class='name'>Delivery (> $30) OFF</span></td><td class='price text-success'>$0.00</td></tr>";
            }

            myTable+="</table>";

            all_total = total + shipping - discount;
            myTable+="<div class='cart-summary'><div class='row'><div class='col-7 text-right text-muted'>Order total:</div><div class='col-5'><strong>$"+to2dec(total)+"</strong></div></div><div class='row'><div class='col-7 text-right text-muted'>Devliery:</div><div class='col-5'><strong>$"+to2dec(shipping)+"</strong></div></div><hr class='hr-sm'><div class='row text-lg'><div class='col-7 text-right text-muted'>Total:</div><div class='col-5'><strong>$"+to2dec(all_total)+"</strong></div></div></div>";
        }catch(e){
            alert(e);
        }

    }
    document.getElementById('tablePrints').innerHTML = myTable;
    document.getElementById('tablePrintx').innerHTML = myTable;
    document.getElementById('cartnum1').innerHTML = jlen;
    document.getElementById('cartnum2').innerHTML = jlen;
    document.getElementById('carttot').innerHTML = "$"+to2dec(all_total);

}
function viewCart(){
    url = "./getprops.php?mtype=viewcart";
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
    var myTable= "No Item in Cart";
    var response = xmlhttp.responseText;
    //alert(response);
    var all_total = 0;
    var jlen = 0;
    if(response != 0){
        try{
            myTable = "<table class='table-cart'>";

            var JSONObject = JSON.parse(response);
            var total=0.0;
            var discount = 0.0;
            var shipping = 0.0;
            jlen = JSONObject.length;
            for (var key in JSONObject) {
                if (JSONObject.hasOwnProperty(key)) {

                    var name = JSONObject[key]["name"];
                    var descr = JSONObject[key]["description"];
                    var price = JSONObject[key]["price"];
                    var amount = JSONObject[key]["amount"];
                    var ides = JSONObject[key]["id"];

	                myTable+="<tr><td class='title'><span class='name'>"+name+"</span><span class='caption text-muted'>"+descr+"</span> &nbsp;&nbsp;$"+price+"/kg</td><td class='price'>$"+to2dec(amount)+"</td><td class='actions'><a href='#' class='action-icon' title='Remove this item from your cart' onclick='removeCart("+ides+");'><i class='ti ti-close'></i></a></td></tr>";
	                total += parseFloat(amount);
                }
            }
            if(total>=100){
	           discount = total * 0.05;
	           myTable+="<tr><td class='title'><span class='name'>Discount 5% OFF</span></td><td class='price text-success'>-$"+to2dec(discount)+"</td><td class='actions'></td></tr>";
            }
            if(total<30){
	           shipping = 10.0;
	           myTable+="<tr><td class='title' colspan='2'><span class='name'>Delivery (< $30)</span></td><td class='price text-danger'>$10.00</td></tr>";
            }else{
	           myTable+="<tr><td class='title' colspan='2'><span class='name'>Delivery (> $30) OFF</span></td><td class='price text-success'>$0.00</td></tr>";
            }

            myTable+="</table>";

            var all_total = total + shipping - discount;
            myTable+="<div class='cart-summary'><div class='row'><div class='col-7 text-right text-muted'>Order total:</div><div class='col-5'><strong>$"+to2dec(total)+"</strong></div></div><div class='row'><div class='col-7 text-right text-muted'>Devliery:</div><div class='col-5'><strong>$"+to2dec(shipping)+"</strong></div></div><hr class='hr-sm'><div class='row text-lg'><div class='col-7 text-right text-muted'>Total:</div><div class='col-5'><strong>$"+to2dec(all_total)+"</strong></div></div></div>";
        }catch(e){
            alert(e);
        }

    }
    document.getElementById('tablePrints').innerHTML = myTable;
    document.getElementById('tablePrintx').innerHTML = myTable;
    document.getElementById('cartnum1').innerHTML = jlen;
    document.getElementById('cartnum2').innerHTML = jlen;
    document.getElementById('carttot').innerHTML = "$"+to2dec(all_total);

}
function removeCart(idx){
    url = "./getprops.php?mtype=removecart&idx="+idx;
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
    viewCart();
    alertify.log('Item removed successfully');
}

function to2dec(numb){
	return parseFloat(Math.round(numb * 100) / 100).toFixed(2);
}

    function showCart(){
        //location.reload();
        $(document).ready(function(){
            viewCart();
            $("#panel-cart").modal();
        });
    }
</script>



<!-- JS Plugins -->
<!-- JQuery
<script src="assets/plugins/jquery/dist/jquery.min.js"></script>
-->
<script src="assets/plugins/tether/dist/js/tether.min.js"></script>
<script src="assets/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="assets/plugins/slick-carousel/slick/slick.min.js"></script>
<script src="assets/plugins/jquery.appear/jquery.appear.js"></script>
<script src="assets/plugins/jquery.scrollto/jquery.scrollTo.min.js"></script>
<script src="assets/plugins/jquery.localscroll/jquery.localScroll.min.js"></script>
<script src="assets/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="assets/plugins/jquery.mb.ytplayer/dist/jquery.mb.YTPlayer.min.js"></script>
<script src="assets/plugins/twitter-fetcher/js/twitterFetcher_min.js"></script>
<script src="assets/plugins/skrollr/dist/skrollr.min.js"></script>
<script src="assets/plugins/animsition/dist/js/animsition.min.js"></script>

<!-- PNotify -->
<script src="assets/plugins/pnotify/dist/pnotify.js"></script>
<script src="assets/plugins/pnotify/dist/pnotify.buttons.js"></script>
<script src="assets/plugins/pnotify/dist/pnotify.nonblock.js"></script>

<!-- JS Core -->
<script src="assets/js/core.js"></script>
<script src="assets/js/prettify.js"></script>


<!-- JS Stylewsitcher -->
<script src="styleswitcher/styleswitcher.js"></script>


<script type="text/javascript">
    function notifyUser(message,type){
        if(type=="success"){
            new PNotify({
                title: 'Success',
              type: 'success',
              text: message,
              nonblock: {
                  nonblock: true
              },
              styling: 'bootstrap3'
            });
        }else if(type=="failure"){
            new PNotify({
                title: 'Error Occured',
              type: 'error',
              text: message,
              nonblock: {
                  nonblock: true
              },
              styling: 'bootstrap3'
            });
        }else if(type=="wait"){
            new PNotify({
              title: 'Information',
              text: message,
              type: 'info',
              hide: false,
              styling: 'bootstrap3',
              addclass: 'dark'
            });
        }else{
            new PNotify({
                title: 'Information',
              type: 'info',
              text: message,
              nonblock: {
                  nonblock: true
              },
              styling: 'bootstrap3',
              addclass: 'dark'
            });
        }
    }
</script>

</body>

</html>
