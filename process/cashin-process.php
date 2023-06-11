<?php
session_start();
include '../config/connection.php';

$userID = $_SESSION['userID'];
$transType = "Cash In";
$GCashNo = $_POST['senderNum'];
$amount = $_POST['amount'];
$refNum = $_POST['refNum'];

if ($amount == '50'){
    $ticketAmount = 40;
}
else if ($amount == '100'){
    $ticketAmount = 80;
}
else if ($amount == '250'){
    $ticketAmount = 200;
}
else if ($amount == '500'){
    $ticketAmount = 450;
}

$proFee = '0';

$conFee = $amount - $ticketAmount;

$confirmStatus = 0;


$sqlIns2 = "INSERT INTO cashin_cashout(uID, transType, transGCashNumber, transReferenceNo, transAmount, transProFee, transConFee, transConfirmStatus)
VALUES ('$userID', '$transType', '$GCashNo', '$refNum', '$amount', '$proFee', '$conFee',  '$confirmStatus')";
$result2=mysqli_query($conn, $sqlIns2);


if($result2){
    $_SESSION['messageResult'] = "Cashin Request Submitted!";
    header("Location:../trans_model/cashin.php");
}else{
    die(mysqli_error($conn));
}


?>