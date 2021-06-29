<?php
session_start();
if(isset($_POST['submit']))
{
	  $currentPass = $_POST['curPass'];
		$newPass = $_POST['newPass'];
		$confPass =$_POST['confPass'];
	   
	   
	   if(empty( $currentPass)||empty($newPass)||empty($confPass))
	   {
		   echo "null submission";
	   }
       else
       {
            if($newPass != $confPass)
            {
            echo "Warrning, Password and Confirm Password are not matched!";
            echo "Please, do registration again!";
            }
        
            setcookie('password', $newPass, time()+36000, '/');
            header('location: login-action.php');
	  }
  
	}
	else{
	  header("location: login-action.php");
	}
?>
