 <?php
session_start();
 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "miketorres";

$patientid = $_GET['patient_id'];
// $admin = $_SESSION['admin'];

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	// if ($user == "admin")
	// {

	
    // sql to delete a record
    $sql = "DELETE FROM patient WHERE patient_id='$patientid'";

    // use exec() because no results are returned
    $conn->exec($sql);
	
	// }
	header("location: viewpatient.php");
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?> 