<?php
session_start();
include '../config/connection.php';

$carID = $_POST['carID'];
$startPoint = $_POST['startPoint'];
$endPoint = $_POST['endPoint'];
$dateSet = $_POST['dateSet'];

$deptTime = $_POST['deptTime'];
$arriveTime = $_POST['arriveTime'];
$kilometer = $_POST['kilometer'];


$newStartDate = $dateSet.' '.$deptTime;
$newEndDate = $dateSet.' '.$arriveTime;



$sqlIns2 = "INSERT INTO route(carID, routeStartingPoint, routeEndPoint, routeDepartureTime, routeArrivalTime, routeKilometers)
VALUES ('$carID', '$startPoint', '$endPoint', '$newStartDate', '$newEndDate', '$kilometer')";
$result2=mysqli_query($conn, $sqlIns2);

$_SESSION['messageResult'] = "Routes created succesfully!";
header("Location:../reg_inserts/registered-routes.php");



?>