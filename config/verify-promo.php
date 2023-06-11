<?php
session_start();
include '../config/connection.php';

    $email = $_GET['user'];

    // Checking of Verification Email
    $sql = "SELECT * FROM user WHERE uEmail='$email'";
    $result = $conn->query($sql);

    $row = $result->fetch_assoc();
    if ($row['user_verify'] === 1) {
        $_SESSION['status'] = "Email has already been verified!";
        header('Location: ' . $home . '/index.php');
        return;
    }

    if ($row['uReferred'] == NULL) {
        //UPDATE WHEN THERE IS NO REFERRAL CODE
        $update_query = "UPDATE user SET user_verify='1', uGems=10, uPromoCode='$randomString' WHERE uEmail = '$email'";
        $result = $conn->query($update_query);

        $_SESSION['status'] = "Your email is now verified! You may now login to your account.";
        header('Location: ' . $home . '/index.php');
    }else{
        //UPDATE WHEN THERE IS REFERRAL CODE
        $update_query = "UPDATE user SET user_verify='1', uGems=10, uPromoCode='$randomString' WHERE uEmail = '$email'";
        $result = $conn->query($update_query);

        header('Location: ' . $home . '/verify-promo');
    }

