<?php

session_start();
$name = $_COOKIE['username'];
$email = $_COOKIE['email'];

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
      .welcome-page{
        display: flex;
        border: 1px solid black;
      }
      .right{
        margin-left: 973px;
        display: flex;
      }
      .user-info {
    /* align-items: center; */
    text-align: center;
    border: 1px solid black;
    width: 400px;
    margin-left: 0 auto;
    margin-left: 450px;
}
    </style>
  </head>
  <body>
<h1 style="background-color: burlywood;text-align:center;">Hospital Management System</h1>
   <div class="welcome-page">
     <div>
     <a  style="text-decoration: none;" href="index.php"><h2>Home</h2></a>
     </div>
   <div class="right">
  <div>
  <?php
    $username = "";
      if (isset($_COOKIE["username"])) {
        $username = $_COOKIE["username"];
      }
      $username = strtoupper($username);
      echo "<h2 >Welcome, $username</h2>";
    ?>
  </div>
  <div>
    
    <a  href="logout-action.php"><button style="margin-top: 23px;margin-left: 29px;background-color: burlywood;">Logout</button></a>
  </div>
   </div>
   </div>
   <br>
   <div>
     <a style="text-decoration: none;" href="home.php">Home</a>|<a style="text-decoration: none;" href="">View Profile</a>|<a style="text-decoration: none;" href="security_system.php">Change password</a>
   </div>
   <div>
   <form action="checkeditprofile.php" method="POST">
   <fieldset>
						<legend><b>EDIT PROFILE</b></legend>
						<table>
                            <tr>
								<td>Name</td>
								<td>:</td>
								<td><input name="username" type="text"></td>
							</tr>		
							<tr>
								<td>Email</td>
								<td>:</td>
								<td><input name="email" type="text">
						        <abbr title="hint: sample@example.com"><b>i</b></abbr></td>
							</tr>					
						</table>	
						<hr/>
						
					<input style="margin-top: 5px;margin-left: 0px;background-color: burlywood;" type="submit" name= "submit" value="Submit">
					
				</fieldset>
   </form>
   </div>
  </body>
</html>