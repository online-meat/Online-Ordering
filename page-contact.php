<?php
        include_once("header.php");
    ?>

    <!-- Content -->
    <div id="content">

        <!-- Page Title -->
        <div class="page-title bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 push-lg-4">
                        <h1 class="mb-0">Contact Us</h1>
                        <h4 class="text-muted mb-0"></h4>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section -->
        <section class="section">

            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 push-lg-1 col-md-6">
                       <!--  <img src="assets/img/photos/The Crown_menu.png" alt="" class="mb-5" width="130">
 -->                        <h4 class="mb-0">eMeat Australia</h4>
                        <span class="text-muted">Liverpool, New South Wales, Australia </span>
                        <hr class="hr-md">
                        <div class="row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <h6 class="mb-1 text-muted">Mobile:</h6>
                                0406602256, 0467099697
                            </div>
                           <div class="col-sm-6">
                                <h6 class="mb-1 text-muted">E-mail:</h6>
                                <a href="#">info@emeat.com.au</a>
                            </div>
                        </div>
                        <hr class="hr-md">
                       <h6 class="mb-3 text-muted">Follow Us!</h6>
                        <a href="#" class="icon icon-social icon-circle icon-sm icon-facebook"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="icon icon-social icon-circle icon-sm icon-google"><i class="fa fa-google"></i></a>
                        <a href="#" class="icon icon-social icon-circle icon-sm icon-twitter"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="icon icon-social icon-circle icon-sm icon-youtube"><i class="fa fa-youtube"></i></a>
                        <a href="#" class="icon icon-social icon-circle icon-sm icon-instagram"><i class="fa fa-instagram"></i></a>
                    </div>
                    <div class="col-lg-5 push-lg-2 col-md-6">
                        <div id="google-map" class="h-500 shadow">
                            <form>
                                <div style="text-align:center;color: black">
                                    <h4>Please fill out this form</h4>
                                </div>
                                <div class="form-group">
                                    <input name="name" id="message-name" type="text" class="form-control" placeholder="Full Name" required>
                                </div>
                                <div class="form-group">
                                    <input name="email" id="message-email" type="email" class="form-control" placeholder="E-mail Address" required>
                                </div>
                                <div class="form-group">
                                    <input name="phone" id="message-phone" type="number" class="form-control" placeholder="Phone Number" required>
                                </div>
                                <div class="form-group">
                                    <textarea name="comment" rows="10" class="form-control" placeholder="Drop your message here!" required></textarea>
                                </div>
                                <div style="float:right;">
                                    <input type="reset" value="Reset" class="btn btn-info"> &nbsp;&nbsp;
                                    <input type="submit" value="Submit" class="btn  btn-success">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </section>

    <?php
        include_once("footer.php");
    ?>
