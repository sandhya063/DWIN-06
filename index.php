<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dallas Family Clinic</title>
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

        .login-container {
            background-color: #fff;
            width: 90%;
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            border-radius: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .login-container h2 {
            color: #2ecc71;
            margin-bottom: 20px;
            font-size: 1.5em;
        }

        .logo {
            margin-bottom: 20px;
        }

        .login-form {
            text-align: center;
            width: 100%;
        }

        .login-form input[type="text"],
        .login-form input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 25px;
            box-sizing: border-box;
            background-color: #f9f9f9;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            font-size: 1em;
        }

        .login-form input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #2ecc71;
            color: #fff;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 1em;
        }

        .login-form input[type="submit"]:hover {
            background-color: #27ae60;
        }

        .register-link {
            text-align: center;
            margin-top: 20px;
            font-size: 0.9em;
        }

        .register-link a {
            color: #2ecc71;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s;
        }

        .register-link a:hover {
            color: #27ae60;
        }

        .forgot-password-link {
            margin-top: 10px;
            font-size: 0.9em;
        }

        .forgot-password-link a {
            color: #2ecc71;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s;
        }

        .forgot-password-link a:hover {
            color: #27ae60;
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
        <div class="login-container">
            <div class="logo">
                <img src="images/logo.png" alt="Dallas Family Clinic Logo">
            </div>
            <h2>Login</h2>
            <div class="login-form">
                <form id="form1" name="login" method="post" action="logincheck.php">
                    <input type="text" name="user" placeholder="Username" required /><br>
                    <input type="password" name="password" placeholder="Password" required /><br>
                    <input type="submit" name="Submit" value="Login" />
                </form>
            </div>
            <div class="register-link">
                <a href="register.php">Register</a>
            </div>
            <div class="forgot-password-link">
                <a href="forgot_password.php">Forgot Password</a>
            </div>
        </div>
    </div>
    <footer>
        &copy; 2024 Dallas Family Clinic. All rights reserved.
    </footer>
</body>

</html>
