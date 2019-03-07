<?php
    include_once("header.php");
    @$title1 = $_GET['title1'];
    @$title2 = $_GET['title2'];
    @$title3 = $_GET['title3'];

    if(!isset($title1)){
        $title1 = "Thank you!";
    }
    if(!isset($title2)){
        $title2 = "";
    }
    if(!isset($title3)){
        $title3 = "<a href='index.php' class='btn btn-outline-secondary'>Go back to Home</a>";
    }

    if($title1=='1'){
        $title1 = "Account Activated!";
        $title2 = "Your email address has been successfully confirmed. You can start ordering your meat by sign in to your account.";
    }elseif($title1=='2'){
        $title1 = "Activation Failed!";
        $title2 = "Your email address cannot be confirmed.  Please try to register again.";
    }
?>



<!-- Content -->
    <div id="content">

        <!-- Section -->
        <section class="section bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 push-lg-4">
                        <span class="icon icon-xl icon-<?php echo $title1==1?'success':'warning'"><i class="ti ti-check-box"></i></span>
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
