<?php
session_start();
 
require 'connection.php';
$conn    = Connect();
$p_title  = $conn->real_escape_string($_POST['ptitle']);
$p_content  = $conn->real_escape_string($_POST['pcontent']);
$user  = $conn->real_escape_string($_SESSION['username']);

$query   = "INSERT into post (post_title,post_content,poster) VALUES('".$p_title."','".$p_content."','".$user."')";
$success = $conn->query($query);
 
 header("Location: home.php");
 
if (!$success) {
    die("Couldn't enter data: ".$conn->error);
 
}

else 

 
$conn->close();
 
?>

