<?php
session_start();
 
require 'connection.php';
$conn    = Connect();
$username   = $conn->real_escape_string($_POST['username']);
$password   = $conn->real_escape_string($_POST['password']);
$admin  = $conn->real_escape_string($_POST['admin']);
$query   = "INSERT into user_acc (user_name,password,admin) VALUES('".$username."','".$password."','".$admin."')";
$success = $conn->query($query);

header("Location: index.php");
 
if (!$success) {
    die("Couldn't enter data: ".$conn->error);
 
}

else 

 
$conn->close();
 
?>
