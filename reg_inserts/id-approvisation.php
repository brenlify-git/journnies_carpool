<?php

session_start();
include '../config/connection.php';

$userIDLogged = $_POST['userID'];
$idType = $_POST['idType'];

if(isset($_POST['accept'])){
    $userIDLogged = $_POST['userID'];

    if($idType == "Drivers License"){
        $upd4 = "UPDATE user SET uUserVerify_License='Driver ID', uUserType='Driver' WHERE uID = '$userIDLogged'";
        $result4 =mysqli_query($conn, $upd4);
    }else{
        $upd4 = "UPDATE user SET uUserVerify_License='Passenger ID', uUserType='Passenger' WHERE uID = '$userIDLogged'";
        $result4 =mysqli_query($conn, $upd4);
    }


    $_SESSION['idApprovalStatus'] = "ID Changed Request Succesful!";
    header("Location:../create_membership/id-approval.php");

        
    
    
}
else if(isset($_POST['decline'])){
    $userIDLogged = $_POST['userID'];
    $upd4 = "UPDATE user SET uUserVerify_License='3' WHERE uID = '$userIDLogged'";
    $result4 =mysqli_query($conn, $upd4);


    $_SESSION['idApprovalStatus'] = "ID Changed Request Declined!";
    header("Location:../create_membership/id-approval.php");
}
