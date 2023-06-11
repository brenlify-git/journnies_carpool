<?php
if(isset($_SESSION['userID'])){
    $id = $_SESSION['auth_id'];
} else {
    $_SESSION['message'] = "Please login first!";
    header('Location: ' . $home . '/login.php');
    exit;
}
?>