<?php
include '../config/connection.php';

if(isset($_POST) & !empty($_POST)){
    $promoNum = mysqli_real_escape_string($conn, $_POST['promo']);
    $sql = "SELECT * FROM user WHERE user.uPromoCode = '$promoNum'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    if($count > 0){
        echo '<div style="color:green;"><b>' .$promoNum. '</b> is valid</div>';
        echo '<script type="text/javascript">';
        echo 'document.getElementById("register").disabled = false;';
        echo '</script>';
    }
    else{
        echo '<div style="color:red;"><b>' .$promoNum. '</b> is invalid</div>';
        echo '<script type="text/javascript">';
        echo 'document.getElementById("register").disabled = true;';
        echo '</script>';
    }
}
?>