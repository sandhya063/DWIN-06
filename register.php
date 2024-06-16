<?php
session_start();
if (!empty($_SESSION['logged_in'])) {
    header("Location: home.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dallas Family Clinic - Registration</title>
    <style>
        /* Custom Styles */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100vh;
        }

        header {
            background-color: #2ecc71;
            padding: 10px 0;
            text-align: center;
            width: 100%;
        }

        header img {
            width: 50px;
            vertical-align: middle;
        }

        header h1 {
            display: inline-block;
            color: #fff;
            margin-left: 10px;
            font-size: 1.5em;
            vertical-align: middle;
        }

        .main-content {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .registration-container {
            background-color: #fff;
            width: 90%;
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            border-radius: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .registration-container h2 {
            color: #2ecc71;
            margin-bottom: 20px;
            font-size: 1.5em;
            text-align: center;
        }

        .logo {
            margin-bottom: 10px;
            text-align: center;
        }

        .logo img {
            width: 80px;
        }

        .registration-form {
            width: 100%;
        }

        .registration-form fieldset {
            background-color: #e1e900;
            border: solid 5px #247700;
            padding: 20px;
            border-radius: 15px;
            opacity: 0.95;
            position: relative;
        }

        .registration-form fieldset::before {
            content: '';
            background: url('images/logo.png') no-repeat center;
            background-size: 80px 80px;
            width: 80px;
            height: 80px;
            position: absolute;
            top: -40px;
            left: calc(50% - 40px);
            border-radius: 50%;
            border: 5px solid #247700;
            background-color: #fff;
        }

        .registration-form table {
            width: 100%;
            text-align: left;
            margin-top: 50px;
        }

        .registration-form td {
            padding: 10px 0;
        }

        .registration-form input[type="text"],
        .registration-form input[type="password"],
        .registration-form input[type="radio"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 5px 0;
            border: none;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            font-size: 1em;
        }

        .registration-form input[type="submit"],
        .registration-form input[type="reset"] {
            width: calc(50% - 20px);
            padding: 10px;
            margin: 10px 5px;
            background-color: #2ecc71;
            color: #fff;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 1em;
        }

        .registration-form input[type="submit"]:hover,
        .registration-form input[type="reset"]:hover {
            background-color: #27ae60;
        }

        footer {
            background-color: #2ecc71;
            padding: 10px 0;
            text-align: center;
            width: 100%;
            color: #fff;
        }
    </style>
</head>

<body>
    <header>
        <a href="index.php">
            <img src="images/logo.png" alt="Dallas Family Clinic Logo">
        </a>
        <h1>Dallas Family Clinic</h1>
    </header>
    <div class="main-content">
        <div class="registration-container">
            <div class="logo">
            </div>
            <h2>Registration Form</h2>
            <br></br>
            <div class="registration-form">
                <form name="register" action="success.php" method="post">
                    <fieldset>
                        <table>
                            <tr>
                                <td><b>User Name</b></td>
                                <td><b>: </b><input type="text" name="username" required></td>
                            </tr>
                            <tr>
                                <td><b>Password</b></td>
                                <td><b>: </b><input type="password" name="password" required></td>
                            </tr>
                            <tr>
                                <td><b>Admin</b></td>
                                <td><b>: </b>
                                    <input type="radio" name="admin" value="yes" checked="checked"> YES
                                    <input type="radio" name="admin" value="no"> NO
                                </td>
                            </tr>
                        </table>
                        <div style="text-align: center;">
                            <input type="submit" value="Save" />
                            <input type="reset" value="Reset" />
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
    <footer>
        &copy; 2024 Dallas Family Clinic. All rights reserved.
    </footer>
</body>

</html>
