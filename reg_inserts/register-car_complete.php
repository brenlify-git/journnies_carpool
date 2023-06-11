<?php
session_start();
include '../config/connection.php';

$userID = $_SESSION['userID'];
$fieldOffice = $_POST['fieldOffice'];
$fieldOfficeCode = $_POST['fieldOfficeCode'];
$receiptNo = $_POST['receiptNo'];
$tinNo = $_POST['tin'];

$carColor = $_POST['carColor'];
$carModel = $_POST['carModel'];
$carType = $_POST['carType'];
$manufacturer = $_POST['manufacturer'];
$engineNo = $_POST['engineNo'];
$chasisNo = $_POST['chasisNo'];
$yearManufactured = $_POST['yearManufactured'];
$carCategory = $_POST['carCategory'];
$carFuelType = $_POST['carFuelType'];
// $seatCapacity = $_POST['seatCapacity'];
$plateNumber = $_POST['plateNumber'];
$renewalDate = $_POST['renewalDate'];


$sqlIns2 = "INSERT INTO car_details(uID, carFieldOffice, carFieldOfficeCode, carReceiptNo, carTin, carColor, carModel, carType, carManufacturer, carYearManufactured, carEngineNo, carChasis, carCategory, carFuelType, carRenewalDate, carPlateNumber)
VALUES ('$userID', '$fieldOffice', '$fieldOfficeCode', '$receiptNo', '$tinNo', '$carColor', '$carModel', '$carType', '$manufacturer', '$yearManufactured', '$engineNo', '$chasisNo', '$carCategory', '$carFuelType', '$renewalDate', '$plateNumber')";
$result2=mysqli_query($conn, $sqlIns2);

// $upd3 = "UPDATE `user` SET userType='Driver' WHERE userID = '$userID'";
// $result3=mysqli_query($conn, $upd3  );

if($result2){
    $_SESSION['messageResult'] = "Registration submitted!";
    header("Location:register-car.php");
}else{
    die(mysqli_error($conn));
}


?>