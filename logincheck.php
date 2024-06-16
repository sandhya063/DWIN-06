<?php
/*
This part is where the authentication of the user and his/her password.
This could be used for all general user authentication procedures.
*/

// conn.php is the main connection string for the database of the system	
$conn = mysqli_connect("localhost","root","","miketorres");
$user = ($_POST['user']);
$pass =  ($_POST['password']);


//use the variables $user and $pass for checking
	$result=mysqli_query($conn, "SELECT * FROM user_acc WHERE user_name='$user' AND password='$pass' AND admin ='no'");
	$result2=mysqli_query($conn, "SELECT * FROM user_acc WHERE user_name='$user' AND password='$pass' AND admin ='yes'");
	
	//Checks whether the query was successful or not
	if($result) 
	{
		if(mysqli_num_rows($result) > 0) 
		{
			//Login Successful redirect to main.php	

			session_start();
			$_SESSION['logged_in'] = true;
			$_SESSION['username'] = $user;
			$_SESSION['password'] = $password;
			header("location: home.php");
			exit();
		}
		
		//Checks whether the query was successful or not
		else if($result2) 
		{
			if(mysqli_num_rows($result2) > 0) 
			{
				//Login Successful redirect to main.php	

				session_start();
				$_SESSION['logged_in'] = true;
				$_SESSION['username'] = $user;
				$_SESSION['password'] = $pass;
				
				header("location: home.php");
				exit();
			}
			else
			{
				//Login failed redirect to oops.php
				header("location: loginerror.php");
				exit();
			}
		}
	}
	
	
	
mysqli_close($conn);	
?>