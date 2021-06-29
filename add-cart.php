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
   input {
    margin-bottom: 2px;
    width: 217px;
      }
      input[type='quantity'] {
        width: 217px;
      }
      input[type='unitPrice'] {
        width: 217px;
      }
      label {
        display: inline-block;
        width: 120px;
      }
      .required {
        color: orange;
      }
      .medicine{
        display: flex;
        margin-left: 53px;
        margin-top: 22px;
      }
      .add-cart{
        margin-left: 163px;
        padding: 8px 12px;
        margin-bottom: 7px;
        background-color: #eab165;
        border: none;
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
   <div class="medicine">
   <div style="border: 1px solid black;margin-right: 13px;">
        <img style="width: 300px;height:200px"; src="./upload-images/ace.jpg" alt="">
        <h3>ACE Revelol 25/2.5mg Tablet 10'S</h3>
        <p>METOPROLOL 25MG+RAMIPRIL 2.5MG</p>
        <hr>
        <h2>Best Price* <span>TK. 129.28</span></h2>
        <button class="add-cart">ADD TO CART</button>
    </div>
    <div style="border: 1px solid black;margin-right: 13px;">
        <img style="width: 300px;height:200px"; src="./upload-images/napa.png" alt="">
        <h3>ACE Revelol 25/2.5mg Tablet 10'S</h3>
        <p>METOPROLOL 25MG+RAMIPRIL 2.5MG</p>
        <hr>
        <h2>Best Price* <span>TK. 129.28</span></h2>
        <button class="add-cart">ADD TO CART</button>
    </div>
    <div style="border: 1px solid black;margin-right: 13px;">
        <img style="width: 300px;height:200px"; src="./upload-images/Vitabion.jpg" alt="">
        <h3>ACE Revelol 25/2.5mg Tablet 10'S</h3>
        <p>METOPROLOL 25MG+RAMIPRIL 2.5MG</p>
        <hr>
        <h2>Best Price* <span>TK. 129.28</span></h2>
        <button class="add-cart">ADD TO CART</button>
    </div>
    <div style="border: 1px solid black;margin-right: 13px;">
        <img style="width: 300px;height:200px"; src="./upload-images/unnamed.jpg" alt="">
        <h3>ACE Revelol 25/2.5mg Tablet 10'S</h3>
        <p>METOPROLOL 25MG+RAMIPRIL 2.5MG</p>
        <hr>
        <h2>Best Price* <span>TK. 129.28</span></h2>
        <button class="add-cart">ADD TO CART</button>
   </div>
   </div>
   <?php
    include 'footer.php';
    ?>
  </body>
</html>