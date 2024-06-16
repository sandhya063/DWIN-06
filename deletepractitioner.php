<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: index.php");
    exit;
}

// Check if practitioner_id is provided in the URL
if (!isset($_GET['practitioner_id'])) {
    header("Location: doctor.php");
    exit;
}

$practitioner_id = $_GET['practitioner_id'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "miketorres";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare a delete statement
$sql = "DELETE FROM general_practicioner WHERE practitioner_id = ?";

if ($stmt = $conn->prepare($sql)) {
    // Bind variables to the prepared statement as parameters
    $stmt->bind_param("i", $practitioner_id);

    // Attempt to execute the prepared statement
    if ($stmt->execute()) {
        // Redirect to doctor.php after successful delete
        header("Location: doctor.php");
        exit();
    } else {
        echo "Error deleting practitioner: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
} else {
    echo "Error preparing statement: " . $conn->error;
}

// Close connection
$conn->close();
?>
