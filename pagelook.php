
<?php
   include_once("./header.php");
/*
    $what = $_GET['what'];
    if($what == 'error'){
        echo "<script>alertify.alert('You have entered wrong password');
        setTimeout(function () {   window.location.href = './menu-grid-navigation.php'; }, 3000);</script>";
    }
    */
//echo "<script>$(document).ready(function(e){alertify.alert('Cannot login: Wrong username/password.')});</script>";
echo md5(date('D, d-m-Y h:i:s', time()));
?>

<a href="#" class="btn btn-primary" onclick="doClick();">Click Me!</a>
<script type="text/javascript">
    function doClick(){
        //alertify.alert("This is an alert dialog");

    //notifyUser("Welcome Error Message", "failure");
        notifyUser('Your other account information as been saved. Bitcoin wallet address is not found or correct and can not be saved.','success');

}
</script>


<?php
   include_once("./footer.php");
?>
