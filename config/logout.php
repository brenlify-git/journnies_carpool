<?php

session_start();
session_unset();
header("location:../logins/index.php"); 
session_start();
$_SESSION['messageLogin'] = 'Succesfully Logged Out!';  
exit();

?>