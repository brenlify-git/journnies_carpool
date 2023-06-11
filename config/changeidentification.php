<?php

session_start();
include '../config/connection.php';

$userID = $_SESSION['userID'];
$idType = $_POST['idType'];
$idNumber = $_POST['idNumber'];

$upd3 = "UPDATE user SET uIDType= '$idType', uIDNumber = '$idNumber', uUserVerify_License = 0 WHERE uID = '$userID'";
$result3=mysqli_query($conn, $upd3);

if($result3){
    $_SESSION['changeID'] = "Succesfully Changed the Identification";
    header("Location:userprofile-passenger.php");
}else{
    die(mysqli_error($conn));
}

?>