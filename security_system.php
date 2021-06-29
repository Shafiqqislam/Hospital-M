<?php
session_start();
	
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
   <a style="text-decoration: none;" href="home.php">Home</a>|<a style="text-decoration: none;" href="profile.php">View Profile</a>|<a style="text-decoration: none;" href="security_system.php">Change password</a>|<a style="text-decoration: none;" href="add-medicine.php">Add Medicine</a>|<a style="text-decoration: none;" href="add-cart.php">Add To Cart</a>
   </div>
   <div>
   
   <fieldset>
						<legend><b>Security System</b></legend>
						<table>
              <tr>
								<td>Current Password</td>
								<td>:</td>
								<td><input name="curPass" type="password"></td>
							</tr>
							<tr>
								<td>New Password</td>
								<td>:</td>
								<td><input name="newPass" type="password"></td>
							</tr>
							<tr>
								<td>Confirm Password</td>
								<td>:</td>
								<td><input name="confPass" type="password"></td>
							</tr>
							</table>
							<hr>
			        <input style="margin-top: 2px;margin-left: 0px;background-color: burlywood;padding: 2px 25px;" type="submit" name="submit" value="Submit">
						   </fieldset>
   </div>
   <?php
    include 'footer.php';
    ?>
  </body>
</html>