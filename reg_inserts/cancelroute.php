<?php
session_start();
include '../config/connection.php';
$route = $_GET['id'];

$sql = "UPDATE route SET routeStatus = 'cancelled' WHERE carID = '$route'";
$result = mysqli_query($conn, $sql);

$_SESSION['status'] = "Route Cancelled";
header("Location:../reg_inserts/registered-routes.php");
