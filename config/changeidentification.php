<?php

session_start();
include '../config/connection.php';

$userID = $_SESSION['userID'];
$idType = $_POST['idType'];
$idNumber = $_POST['idNumber'];

$upd3 = "UPDATE user SET idType= '$idType', idNumber = '$idNumber', verifyLicenseNumber = 'pending' WHERE userID = '$userID'";
$result3=mysqli_query($conn, $upd3 );

if($result3){
    $_SESSION['changeID'] = "Succesfully Changed the Identification";
    header("Location:userprofile-passenger.php");
}else{
    die(mysqli_error($conn));
}

?>