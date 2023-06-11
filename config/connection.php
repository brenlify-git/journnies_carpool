<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "journnies";
$home = "http://localhost/journnies";
// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// // echo "Connected";
?>
<?php
// $servername = "localhost";
// $username = "u235219407_bren2023";
// $password = "Brenlify2023";
// $database = "u235219407_carpool_db";

// // Create connection
// $conn = new mysqli($servername, $username, $password, $database);

// // Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }

// echo "Connected";
?>










