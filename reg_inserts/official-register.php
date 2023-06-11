<?php

include 'connection.php';

$regID = $_POST['regID'];
$StudentID = $_POST['studID'];
$firstName = $_POST['firstName'];
$middleName = $_POST['middleName'];
$lastName = $_POST['lastName'];
$patronType = $_POST['patronType'];
$contactNumber = $_POST['contactNumber'];
$department = $_POST['department'];
$section = $_POST['section'];
$street = $_POST['street'];
$barangay = $_POST['barangay'];
$municipality = $_POST['municipality'];
$province = $_POST['province'];
$penalty = 0.00;


$sql = "SELECT * FROM tbl_pendingpatrons WHERE pendingRegID = '$regID'";
$regIDFind = $conn->query($sql);


while($rowDet = mysqli_fetch_assoc($regIDFind)):   

$uname = $rowDet['patron_username'];
$pass = $rowDet['patron_password'];
$qrcode = $rowDet['qrCode'];
$penalty = $rowDet['Penalty'];
$borrowCount = $rowDet['Borrow_Count'];

endwhile; 


$sqlIns = "INSERT INTO tbl_patrons (Student_ID, FirstName, MiddleName, LastName, Patron_Type, Contact_Number, patron_username, patron_password, qrCode, Penalty, Borrow_Count, Department, Section, Street, Barangay, Municipality, Province) 
VALUES ('$StudentID', '$firstName', '$middleName', '$lastName', 'PATRON', '$contactNumber', '$uname', '$pass', '$qrcode', '$penalty', '$borrowCount', '$department', '$section', '$street', '$barangay', '$municipality', '$province')";
$result=mysqli_query($conn, $sqlIns);

$sqlDelete = "DELETE FROM tbl_pendingpatrons WHERE pendingRegID = '$regID'";
$resultDel = mysqli_query($conn, $sqlDelete);


if($result){
    echo "Data Inserted Succesfully!";
    header("Location:membership.php");
}else{
    die(mysqli_error($conn));
}


?>