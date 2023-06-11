<?php

session_start();
include '../config/connection.php';

if(isset($_POST['accept'])){

$userID = $_SESSION['userID'];
$idType = $_POST['idType'];
$userID = $_POST['userID'];
$carID = $_POST['carID'];
$date = date("Y-m-d H:i:s");


  

    if($idType != "Drivers License"){
        $_SESSION['CarRegistrationStatus'] = "Kindly request for changing of ID, they need to have a License Number";
        header("Location:../create_membership/membership.php");

    }
    else{

        $countStudents = mysqli_query($conn, "SELECT COUNT(*) AS countRegistered FROM car_details WHERE car_verify=1 AND uID = '$userID'");
        $row_countStud = mysqli_fetch_assoc($countStudents);
        $countRegisteredCars = $row_countStud["countRegistered"];

        
        // $upd3 = "UPDATE `user` SET userType='Driver' WHERE userID = '$userID'";
        // $result3=mysqli_query($conn, $upd3);

        if ($countRegisteredCars == 0){
            $upd11 = "UPDATE `user` SET uGems = uGems + 40 WHERE uID = '$userID'";
            $result11=mysqli_query($conn, $upd11);
        }

        $upd4 = "UPDATE `car_details` SET carRegistrationDate= CURRENT_TIMESTAMP, car_verify=1 WHERE carID = '$carID'";
        $result4 =mysqli_query($conn, $upd4);

      


        $_SESSION['CarRegistrationStatus'] = "Registration Succesful!";
        header("Location:../create_membership/membership.php");

        
    
    }
}
else if(isset($_POST['decline'])){

    $userID = $_SESSION['userID'];
    $idType = $_POST['idType'];
    $carID = $_POST['carID'];
    $date = date("Y-m-d H:i:s");

        $upd5 = "UPDATE `car_details` SET carRegistrationDate= CURRENT_TIMESTAMP, car_verify=3 WHERE carID = '$carID'";
        $result5 =mysqli_query($conn, $upd5);

        $_SESSION['CarRegistrationStatus'] = "Registration Declined!";
        header("Location:../create_membership/membership.php");
}
?>