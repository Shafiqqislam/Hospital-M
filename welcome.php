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
    </style>
  </head>
  <body>
<h1 style="background-color: burlywood;text-align:center;">Hospital Management System</h1>
   <div class="welcome-page">
     <div>
     <h2>Home</h2>
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
     <a href="">Home</a>|<a href="">Profile</a>|<a href="">Change password</a>
   </div>
  </body>
</html>
