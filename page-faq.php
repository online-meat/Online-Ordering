
<?php
    include_once("header.php");
?>

    <!-- Content -->
    <div id="content">

        <!-- Page Title -->
        <div class="page-title bg-light">
            <div class="bg-image bg-parallax"><img src="assets/img/photos/bg-desk.jpg" alt=""></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 push-lg-4">
                        <h1 class="mb-0">FAQ</h1>
                        <h4 class="text-muted mb-0">Frequently asked questions</h4>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section -->
        <section class="section">

            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <!-- Side Navigation -->
                        <nav id="side-navigation" class="stick-to-content pt-4" data-local-scroll>
                            <h5 class="mb-3"><i class="ti ti-align-justify mr-3 text-muted"></i>Pick a content:</h5>
                            <ul class="nav nav-vertical">
                                <li class="nav-item">
                                    <a href="#faq1" class="nav-link">General</a>
                                    <ul>
                                        <li class="nav-item"><a href="#faq1_1" class="nav-link">How does it work?</a></li>
                                        <li class="nav-item"><a href="#faq1_2" class="nav-link">How long does it take?</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#faq3" class="nav-link">Payments</a>
                                    <ul>
                                        <li class="nav-item"><a href="#faq3_1" class="nav-link">How does it work?</a></li>
                                        <li class="nav-item"><a href="#faq3_2" class="nav-link">How long does it take?</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-md-8 push-md-1">
                        <div id="faq1">
                            <h3><i class="ti ti-truck mr-4 text-primary"></i>General info</h3>
                            <hr>
                            <div id="faq1_1" class="pb-5">
                                <h4>How does it work?</h4>
                                <p class="lead">Customers order their favourite meat online and get delivery same business day or after 0ne (1) business day with a pay on delivery option.</p>
                                <p>We deliver product to Customer address at their preferred time of the day.</p>
                            </div>
                            <div id="faq1_2" class="pb-5">
                                <h4>How long does it take?</h4>
                                <p class="lead">We strive to delivery products to our customers door step within the same business day but generally all orders are delivered a day after the order date.</p>

                            </div>
                        </div>

                        <div id="faq3">
                            <h3><i class="ti ti-wallet mr-4 text-primary"></i>Payments</h3>
                            <hr>
                            <div id="faq3_1" class="pb-5">
                                <h4>How does it work?</h4>
                                <p class="lead">A pay on delivery option is available as a means of flexibility.</p>
                                <p>The pay on delivery option applies to all our products.</p>
                            </div>
                            <div id="faq3_2" class="pb-5">
                                <h4>How long does it take?</h4>
                                <p class="lead">Payment are made on the spot when products are delivered.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

<?php
    include_once("footer.php");
?>
