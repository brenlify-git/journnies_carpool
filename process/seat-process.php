<?php
session_start();
include '../config/connection.php';

if (isset($_POST['save'])){
    $txtSeatType = $_POST['seatType'];
    $txtConFee = $_POST['conFee'];
    $carID = $_POST['carID'];

    foreach ($txtSeatType as $key => $value){
        $save = "INSERT INTO car_seat (carID, seatTypeAvailable, convenienceFee) VALUES ('$carID','$txtSeatType[$key]', '$txtConFee[$key]')";
        $query = mysqli_query($conn, $save);
    }
    $_SESSION['carIDUsed'] = $carID;
    header("Location: ../reg_inserts/add-seats.php");

}
?>