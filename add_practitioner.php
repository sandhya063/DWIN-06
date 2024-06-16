<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input data
    $name = htmlspecialchars($_POST["name"]);
    $gender = $_POST["gender"]; // No need to sanitize since it's a select option
    $age = $_POST["age"];

    // Validate input (basic validation, you can add more as needed)
    if (empty($name) || empty($gender) || empty($age)) {
        echo "All fields are required.";
        exit;
    }

    // Database connection parameters
    $servername = "127.0.0.1"; // Server name or IP address
    $username = "your_username"; // Replace with your MySQL username
    $password = "your_password"; // Replace with your MySQL password
    $dbname = "miketorres"; // Replace with your database name

    try {
        // Create a new PDO instance
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        
        // Set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Prepare SQL statement
        $stmt = $pdo->prepare("INSERT INTO general_practicioner (name, gender, age) VALUES (:name, :gender, :age)");
        
        // Bind parameters
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':age', $age);
        
        // Execute the prepared statement
        $stmt->execute();
        
        // Redirect to doctor.php after successful insertion
        header("Location: doctor.php");
        exit;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    } finally {
        // Close connection
        $pdo = null;
    }
}
?>
