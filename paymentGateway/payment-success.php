
<?php
session_start();
require_once('../admin/query.php'); 
if(isset($_GET)){
    
if(isset($_GET['ref_id']) && isset($_GET['rp_payment_id']) ){
    $QueryFire->upDateTable("orders",' id='.$_GET['ref_id'], array('payment_id'=>$_GET['oid'], 'is_paid'=>1));

}else{
    $QueryFire->upDateTable("orders",' id='.$_GET['ref_id'], array('payment_id'=>$_GET['oid'], 'is_paid'=>0));
}





    
    unset($_SESSION['cart']);
    echo "<h3>";
echo "Thank you for Shopping with us. <a href='../index.php'>Click here</a>";
echo "</h3>";

}
?>
