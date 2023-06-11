<?php
include '../config/connection.php';

if(isset($_POST) & !empty($_POST)){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $sql = "SELECT * FROM user WHERE user.uUsername = '$username'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    if($count > 0){
        echo '<div style="color:red;"><b>' .$username. '</b> is not available</div>';
        echo '<script type="text/javascript">';
        echo 'document.getElementById("register").disabled = true;';
        echo '</script>';
    }
    else{
        echo '<div style="color:green;"><b>' .$username. '</b> is available</div>';
        echo '<script type="text/javascript">';
        echo 'document.getElementById("register").disabled = false;';
        echo '</script>';
    }
}
?>