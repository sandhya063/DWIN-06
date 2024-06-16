<?php
session_start();
 
require 'connection.php';
$conn    = Connect();
$patientid = $conn->real_escape_string($_POST['patientid']);
$firstname   = $conn->real_escape_string($_POST['firstname']);
$lastname   = $conn->real_escape_string($_POST['lastname']);
$phonenumber  = $conn->real_escape_string($_POST['phonenumber']);
$healthnumber   = $conn->real_escape_string($_POST['healthnumber']);
$postalcode   = $conn->real_escape_string($_POST['postalcode']);
$country   = $conn->real_escape_string($_POST['country']);
$address   = $conn->real_escape_string($_POST['address']);
$gender = $conn->real_escape_string($_POST['gender']);

$sql = "UPDATE patient SET first_name='".$firstname."', last_name='".$lastname."', phone_number='".$phonenumber."', health_number='".$healthnumber."', postal_code='".$postalcode."', country='".$country."', address='".$address."', gender='".$gender."' WHERE patient_id='".$patientid."'";

$success = $conn->query($sql);

header("Location: viewpatient.php");
 
if (!$success) {
	echo $firstname;
    die("Couldn't enter data: ".$conn->error);
 
}

else 

 
$conn->close();
 
?>
