<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
	$connection = mysqli_connect("localhost", "root", "",'cim');
	session_start();// Starting Session
	// Storing Session
	$user_check=$_SESSION['login_user'];
	// SQL Query To Fetch Complete Information Of User
	$ses_sql=mysql_query("select * from users where name='$user_check'", $connection);
	$row = mysql_fetch_assoc($ses_sql);
	$login_session =$row['name'];
	if(!isset($login_session)){
		mysql_close($connection); // Closing Connection
		header('Location: login.php'); // Redirecting To Home Page
	}
?>