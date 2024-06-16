<?php
session_start();
 
require 'connection.php';
$conn    = Connect();
$firstname   = $conn->real_escape_string($_POST['firstname']);
$lastname   = $conn->real_escape_string($_POST['lastname']);
$phonenumber  = $conn->real_escape_string($_POST['phonenumber']);
$healthnumber   = $conn->real_escape_string($_POST['healthnumber']);
$postalcode   = $conn->real_escape_string($_POST['postalcode']);
$country   = $conn->real_escape_string($_POST['country']);
$address   = $conn->real_escape_string($_POST['address']);
$gender = $conn->real_escape_string($_POST['gender']);
$query   = "INSERT into patient (first_name,last_name,phone_number,health_number,postal_code,country,address,gender) VALUES('".$firstname."','".$lastname."','".$phonenumber."','".$healthnumber."','".$postalcode."','".$country."','".$address."','".$gender."')";
$success = $conn->query($query);

header("Location: addpatient.php");
 
if (!$success) {
	echo $firstname;
    die("Couldn't enter data: ".$conn->error);
 
}

else 

 
$conn->close();
 
?>
