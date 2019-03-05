    <?php
    include_once("header.php"); //
    ?>

    <!-- Content -->
    <div id="content">

        <!-- Page Title -->
        <div class="page-title bg-light">
            <div class="bg-image"><img src="assets/img/photos/meat1.jpg" alt=""></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 push-lg-4" style="color:white; text-align:center;">
                        <h1 class="display-2 mb-2 black"><b>Products Lists</b></h1>
                        <h3 class="display-5 mb-2 black">Select from the range of our Products below</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Page Content -->
        <div class="page-content">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-md-3">
                        <!-- Menu Navigation -->
                        <nav id="menu-navigation" class="stick-to-content" data-local-scroll>
                            <ul class="nav nav-menu bg-dark dark">
                                <li><a href="#Meat"><h2>Meat</h2></a></li>
                                <li><a href="#Chicken"><h2>Chicken</h2></a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-md-9">
                        <!-- Menu Category / Burgers -->
                        <div id="Meat" class="menu-category">
                            <div class="menu-category-title">
                                <div class="bg-image"><img src="assets/img/photos/menu-meat.jpg" alt=""></div>
                                <h2 class="title">Meat</h2>
                            </div>
                            <div class="menu-category-content padded">
                                <div class="row gutters-sm">
                                    <?php
                                    $qnx = mysqli_query($connection,"select * from product where category_id=1");
                                    while($dn = mysqli_fetch_array($qnx)){ ?>
                                    <div id="<?php echo $dn['product_id']; ?>" class="col-lg-6 col-12">
                                        <!-- Menu Item -->
                                        <div class="menu-item menu-grid-item" style="border: 1px solid black;">
                                            <img class="mb-4" style="width:393px;height:277px" src="assets/img/photos/product/<?php echo $dn['img_url']; ?>" alt="">
                                            <h6 class="mb-0"><?php echo $dn['product_name']; ?></h6>
                                            <span class="text-muted text-sm">Beef, Lamb, Goat </span>
                                            <div class="row align-items-center mt-4">
                                                <div class="col-sm-6"><span class="text-md mr-4"><span class="text-muted">Price</span> $<?php echo $dn['price']; ?>/kg</span></div>
                                                <div class="col-sm-6 text-sm-right mt-2 mt-sm-0"><button class="btn btn-outline-secondary btn-sm" data-target="#productModal" data-toggle="modal"><span>Add to cart</span></button></div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <!-- Menu Category / Pasta -->
                        <div id="Chicken" class="menu-category">
                            <div class="menu-category-title">
                                <div class="bg-image"><img src="assets/img/photos/menu-chicken.jpg" alt=""></div>
                                <h2 class="title">Chicken</h2>
                            </div>
                            <div class="menu-category-content padded">
                                <div class="row gutters-sm">
                                    <?php
                                    $qnx = mysqli_query($connection,"select * from product where category_id=2");
                                    while($dn = mysqli_fetch_array($qnx)){ ?>
                                    <div id="<?php echo $dn['product_id']; ?>" class="col-lg-6 col-12">
                                        <!-- Menu Item -->
                                        <div class="menu-item menu-grid-item" style="border: 1px solid black;">
                                            <img class="mb-4" style="width:393px;height:277px" src="assets/img/photos/product/<?php echo $dn['img_url']; ?>" alt="">
                                            <h6 class="mb-0"><?php echo $dn['product_name']; ?></h6>
                                            <span class="text-muted text-sm">Chicken, Duck, Turkey </span>
                                            <div class="row align-items-center mt-4">
                                                <div class="col-sm-6"><span class="text-md mr-4"><span class="text-muted">Price</span> $<?php echo $dn['price']; ?>/kg</span></div>
                                                <div class="col-sm-6 text-sm-right mt-2 mt-sm-0"><button class="btn btn-outline-secondary btn-sm" data-target="#productModal" data-toggle="modal"><span>Add to cart</span></button></div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php
        include_once("footer.php");
    ?>
