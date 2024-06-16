<?php
session_start();

// Example user data (replace with actual user data retrieval)
$userName = "Admin"; // Replace with actual user name retrieval
$userEmail = "admin@example.com"; // Replace with actual user email retrieval
$userPhoto = "images/admin.jpg"; // Replace with actual path or URL

// Check if user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== TRUE) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            margin-top: 20px;
        }
        header {
            background-color: #247700;
            color: #fff;
            padding: 10px 0;
            text-align: center;
            border-radius: 10px 10px 0 0;
        }
        header h1 {
            margin: 0;
            font-size: 2em;
        }
        footer {
            text-align: center;
            padding: 10px 0;
            border-top: 2px solid #247700;
            margin-top: 20px;
            border-radius: 0 0 10px 10px;
        }
        footer p {
            margin: 0;
        }
        .modal-container {
            background-color: #fff;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            padding: 20px;
            text-align: center;
        }
        h1 {
            color: #247700;
            margin-bottom: 20px;
        }
        .user-info {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }
        .user-info img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-right: 20px;
        }
        .user-info h2 {
            color: #247700;
            margin: 0;
            font-size: 2em;
        }
        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group textarea {
            width: 100%;
            padding: 8px;
            font-size: 1em;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .form-group textarea {
            resize: vertical;
        }
        .btn-save,
        .btn-change-photo,
        .btn-close {
            background-color: #247700;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 10px;
        }
        .btn-save:hover,
        .btn-change-photo:hover,
        .btn-close:hover {
            background-color: #1a5800;
        }
        .photo-upload {
            margin-top: 20px;
            text-align: center;
        }
        .photo-upload input[type="file"] {
            display: none;
        }
        .photo-upload label {
            background-color: #ddd;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .photo-upload label:hover {
            background-color: #ccc;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Dallas Family Clinic Dashboard</h1>
        </header>
        <div class="modal-container">
            <div class="user-info">
                <img src="<?php echo $userPhoto; ?>" alt="User Photo">
                <h2><?php echo $userName; ?></h2>
            </div>
            <h1>Edit Profile</h1>
            <form action="update_profile.php" method="POST">
                <div class="form-group">
                    <label for="userName">Name:</label>
                    <input type="text" id="userName" name="userName" value="<?php echo $userName; ?>" required>
                </div>
                <div class="form-group">
                    <label for="userEmail">Email:</label>
                    <input type="email" id="userEmail" name="userEmail" value="<?php echo $userEmail; ?>" required>
                </div>
                <div class="form-group">
                    <label for="userAddress">Address:</label>
                    <textarea id="userAddress" name="userAddress" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="userPhone">Phone Number:</label>
                    <input type="text" id="userPhone" name="userPhone">
                </div>
                <div class="photo-upload">
                    <label for="uploadPhoto">Change Profile Photo:</label><br>
                    <input type="file" id="uploadPhoto" name="uploadPhoto">
                </div>
                <button type="submit" class="btn-save">Save Changes</button>
            </form>
            <button class="btn-close" onclick="closePopup()">Close</button>
        </div>
        <footer>
            <p>&copy; <?php echo date('Y'); ?> Dallas Family Clinic. All rights reserved.</p>
        </footer>
    </div>

    <script>
        function closePopup() {
            // Redirect to previous page assuming it's stored in session or passed as parameter
            window.opener.location.href = "home.php";
            window.close();
        }
    </script>
</body>
</html>
