
<?php
session_start(); 
if(isset($_GET)){
    
    // echo "<pre>";
    // print_r($_GET);
    // echo "</p>";
    unset($_SESSION['cart']);
    echo "<pre>";
echo "Thank you for Shopping with us. <a href='../index.php'>Click here</a>";
echo "</pre>";

}
?>
