<?php
session_start();
if ($_SESSION['logged_in'] != TRUE) {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>New Patient Form - Dallas Family Clinic</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        body {
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #4CAF50;
            color: white;
            padding: 20px 0;
            text-align: center;
        }

        .container {
            width: 80%;
            margin: 20px auto;
        }

        form {
            width: 60%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        fieldset {
            border: none;
            margin: 0;
            padding: 0;
        }

        legend {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
        }

        table td {
            padding: 10px;
        }

        input[type="text"],
        input[type="radio"] {
            width: 80%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        input[type="submit"],
        input[type="reset"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            text-decoration: none;
            cursor: pointer;
            border-radius: 4px;
            margin-right: 10px;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<header>
    <h1>New Patient Form - Dallas Family Clinic</h1>
</header>
<div class="container">
    <form name="addpatient" action="addpatientsuccess.php" method="post">
        <fieldset>
            <legend>Patient Details</legend>
            <table>
                <tr>
                    <td><b>First Name:</b></td>
                    <td><input type="text" name="firstname" required></td>
                </tr>
                <tr>
                    <td><b>Last Name:</b></td>
                    <td><input type="text" name="lastname" required></td>
                </tr>
                <tr>
                    <td><b>Phone Number:</b></td>
                    <td><input type="text" name="phonenumber" required></td>
                </tr>
                <tr>
                    <td><b>Health Number:</b></td>
                    <td><input type="text" name="healthnumber" required></td>
                </tr>
                <tr>
                    <td><b>Postal Code:</b></td>
                    <td><input type="text" name="postalcode" required></td>
                </tr>
                <tr>
                    <td><b>Country:</b></td>
                    <td><input type="text" name="country" required></td>
                </tr>
                <tr>
                    <td><b>Address:</b></td>
                    <td><input type="text" name="address" required></td>
                </tr>
                <tr>
                    <td><b>Gender:</b></td>
                    <td>
                        <input type="radio" name="gender" value="male" checked="checked">Male
                        <input type="radio" name="gender" value="female">Female
                    </td>
                </tr>
            </table>
            <br>
            <input class="small button" type="submit" value="Save" />
            <input type="reset">
        </fieldset>
    </form>
</div>
</body>
</html>
