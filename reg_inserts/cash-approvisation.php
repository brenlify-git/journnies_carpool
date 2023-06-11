<?php

session_start();
include '../config/connection.php';

$transType = $_POST['transType'];

if ($transType == "Cash In"){
        
    if(isset($_POST['accept'])){

        $userIDLogged = $_POST['userID'];
        $transID = $_POST['transID'];
        $amount = $_POST['amount'];
        $conFee = $_POST['conFee'];

        $userBalance = $amount - $conFee;

        $sql = "SELECT * FROM user WHERE uID = '$userIDLogged'";
        $idx = $conn->query($sql);

        while($userGuide = mysqli_fetch_assoc($idx)): 
        $getUserBalance = $userGuide['uGems'];
        endwhile;

        $getUserBalance += $userBalance;

        $upd4 = "UPDATE user SET uGems='$getUserBalance' WHERE uID = '$userIDLogged'";
        $result4 =mysqli_query($conn, $upd4);

        $upd4 = "UPDATE cashin_cashout SET transConfirmStatus = 1 WHERE transID = '$transID'";
        $result4 =mysqli_query($conn, $upd4);

        $_SESSION['idApprovalStatus'] = "Cash In Request Approved!";
        header("Location:../process/approve-cashin.php");
        
        
    }
    else if(isset($_POST['decline'])){

        $userIDLogged = $_POST['userID'];
        $transID = $_POST['transID'];
        $amount = $_POST['amount'];
        $conFee = $_POST['conFee'];

        $upd4 = "UPDATE cashin_cashout SET transConfirmStatus=3 WHERE transID = '$transID'";
        $result4 =mysqli_query($conn, $upd4);


        $_SESSION['idApprovalStatus'] = "Cash In Request Declined!";
        header("Location:../process/approve-cashin.php");
    }
}









else if ($transType == "Cash Out"){

    if(isset($_POST['accept'])){

        $userIDLogged = $_POST['userID'];
        $transID = $_POST['transID'];
        $amount = $_POST['amount'];
        $refNum = $_POST['refNum'];
        $proFee = $_POST['proFee'];

        $withdrawAmount = $amount + $proFee;

        $sql = "SELECT * FROM user WHERE uID = '$userIDLogged'";
        $idx = $conn->query($sql);

        while($userGuide = mysqli_fetch_assoc($idx)): 
        $getUserBalance = $userGuide['uGems'];
        endwhile;

        $getUserBalance -= $withdrawAmount;

        $upd4 = "UPDATE user SET uGems='$getUserBalance' WHERE uID = '$userIDLogged'";
        $result4 =mysqli_query($conn, $upd4);

        $upd4 = "UPDATE cashin_cashout SET transConfirmStatus=1, transReferenceNo = '$refNum' WHERE transID = '$transID'";
        $result4 =mysqli_query($conn, $upd4);

        $_SESSION['idApprovalStatus'] = "Cash Out Request Approved!";
        header("Location:../process/approve-cashin.php");
        
        
    }
    else if(isset($_POST['decline'])){

        $userIDLogged = $_POST['userID'];
        $transID = $_POST['transID'];

        $upd7 = "UPDATE cashin_cashout SET transConfirmStatus=3 WHERE transID = '$transID'";
        $result7 =mysqli_query($conn, $upd7);

        $_SESSION['idApprovalStatus'] = "Cash Out Request Declined!";
        header("Location:../process/approve-cashin.php");
    }

}

?>