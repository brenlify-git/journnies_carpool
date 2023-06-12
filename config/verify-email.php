<?php

session_start();
include '../config/connection.php';

function generateRandomString($length = 5)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$randomString = generateRandomString();

if (isset($_POST['accept'])) {
    $email = $_POST['user'];
    echo $email;

    // Checking of Verification Email
    $sql = "SELECT * FROM user WHERE uEmail='$email'";
    $result = $conn->query($sql);

    $row = $result->fetch_assoc();
    $promoCode = $row['uUsername'] . $randomString;
    $promo = $row['uReferred'];

    if ($row['uUserVerify_Reg'] == 1) {
        $_SESSION['messageLogin'] = "Email has already been verified!";
        header('Location: ' . $home . '/index.php');
        return;
    }

    if ($promo != NULL) {
        //UPDATE WHEN THERE IS REFERRAL CODE
        $update_query = "UPDATE user SET uUserVerify_Reg='1', uGems=10, uPromoCode='$promoCode' WHERE uEmail = '$email'";
        $result = $conn->query($update_query);

        $update_promo = "UPDATE user SET uGems=uGems+10 WHERE uPromoCode = '$promo'";
        $result = $conn->query($update_promo);

        $_SESSION['messageLogin'] = "Your email is now verified! You may now login to your account.";
        header('Location: ' . $home . '/index.php');
    } else {
        //UPDATE WHEN THERE IS REFERRAL CODE
        $update_query = "UPDATE user SET uUserVerify_Reg='1', uGems=10, uPromoCode='$promoCode' WHERE uEmail = '$email'";
        $result = $conn->query($update_query);

        $_SESSION['messageLogin'] = "Your email is now verified! You may now login to your account.";
        header('Location: ' . $home . '/index.php');
    }
} else if (isset($_POST['decline'])) {
    $_SESSION['messageLogin'] = "Your email is now verified! You may now login to your account.";
    header('Location: ' . $home . '/index.php');
}
