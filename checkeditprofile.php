<?php
session_start();
if(isset($_POST['submit']))
{
	   $username = $_POST['username'];
	   $email = $_POST['email'];
	   
	   if(empty($username)||empty($email)||!isset($_POST['number']))
	   {
		   echo "null submission";
	   }
		setcookie('username', $username, time()+36000, '/');
		setcookie('email', $email, time()+36000, '/');
		
		header('location: home.php');
	  }
  
	
	else{
	  header("location: home.php");
	}
?>