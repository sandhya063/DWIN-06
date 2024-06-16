<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: index.php");
    exit;
}

// Check if practitioner_id is provided in the URL
if (!isset($_GET['practitioner_id'])) {
    header("Location: view_practitioners.php");
    exit;
}

$practitioner_id = $_GET['practitioner_id'];

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "miketorres";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch practitioner's details
$sql = "SELECT name, gender, age FROM general_practicioner WHERE practitioner_id = $practitioner_id"; // Note: Ensure this table name matches your database
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $practitioner = $result->fetch_assoc();
} else {
    echo "No practitioner found with the given ID.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process form data after submission
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];

    $sql = "UPDATE general_practicioner SET name='$name', gender='$gender', age='$age' WHERE practitioner_id=$practitioner_id";

    if ($conn->query($sql) === TRUE) {
        header("Location: successfully_edit_practitioner.php");
        exit;
    } else {
        echo "Error updating practitioner: " . $conn->error;
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Practitioner</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .header, .footer {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            text-align: center;
            width: 100%;
            position: fixed;
        }
        .header {
            top: 0;
        }
        .footer {
            bottom: 0;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin-top: 60px;
            margin-bottom: 60px;
        }
        h2 {
            margin-top: 0;
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 8px;
            margin: 8px 0;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Edit Practitioner</h1>
    </div>
    <div class="container">
        <form method="post" action="">
            Name: <input type="text" name="name" value="<?php echo htmlspecialchars($practitioner['name']); ?>" required><br>
            Gender: <input type="text" name="gender" value="<?php echo htmlspecialchars($practitioner['gender']); ?>" required><br>
            Age: <input type="number" name="age" value="<?php echo htmlspecialchars($practitioner['age']); ?>" required><br>
            <input type="submit" value="Submit">
        </form>
    </div>
    <div class="footer">
        <p>&copy; 2024 Your Company. All rights reserved.</p>
    </div>
</body>
</html>
