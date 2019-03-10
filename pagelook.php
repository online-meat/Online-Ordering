
<?php
   include_once("./header.php");
    /*
$fxt = mysqli_query($connection,"select * from product");
$marray = array();
while($dx = mysqli_fetch_array($fxt, MYSQLI_ASSOC)){
    array_push($marray, $dx);
}
$json_values = json_encode($marray);
*/


?>

<a href="#" class="btn btn-primary" onclick="doClick();">Click Me!</a>
<script type="text/javascript">
function doClick(){

    try{

    var jdt = '[{"name":"Lamb Cutlets","description":"(1.5kg) - Do not cut into pieces","price":"35.00","amount":"52.5","id":"3"}]';
    var jsony = JSON.parse(jdt);
    alert(jsony.length);
    }catch(e){
        alert(e.message);
    }
    var cartnum = <?php echo $_SESSION['cart']; ?>;
    alert(cartnum);

}
</script>


<?php
   include_once("./footer.php");
?>
