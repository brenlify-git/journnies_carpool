<?php
include '../config/connection.php';
$seatID = $_POST['seatID'];
$routeID = $_POST['routeID'];
$uID = $_POST['passengerID'];
$conveFee = $_POST['convFee'];
$passengerIdentification = 'I am wearing '. $_POST['passengerIdentification'] . ' my pronouns is/are '. $_POST['pronouns'];


$sqlIns2 = "INSERT INTO booking(seatID, routeID, uID, bookTotalConvenienceGems, passengerIdentification)
VALUES ('$seatID', '$routeID', '$uID', '$conveFee', '$passengerIdentification')";
$result2=mysqli_query($conn, $sqlIns2);


$sqlIns1 = "UPDATE car_seat SET seatStatus = 'pending' WHERE seatID = '$seatID'";
$result1=mysqli_query($conn, $sqlIns1);

header("Location: ../dashboards/dashboard-passenger.php");


?>