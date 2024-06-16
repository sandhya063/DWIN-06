<?php
session_start();
unset($_SESSION['username']);
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="3;url=index.php">
    <title>Logging Out...</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            text-align: center;
            padding-top: 50px;
        }
        .message {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            max-width: 400px;
            margin: 0 auto;
        }
        .message a {
            color: #247700;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="message">
        <p>You have been logged out.</p>
        <p>Redirecting you to <a href="index.php">home page</a>...</p>
    </div>
</body>
</html>
