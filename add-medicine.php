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
   <?php
      require "functions-action.php";
      $MedicineName = "";
      $quantity = "";
      $password = "";
      $permanent = "";
      $unitPrice = "";
      $verify_password = "";
      $regErr = "";
      $flag = false;

      if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if(!empty($_POST['MedicineName'])) {
          $MedicineName = input($_POST['MedicineName']);
        }
        else {
          $flag = true;
        }
       
        if(!empty($_POST['quantity'])) {
          $quantity = input($_POST['quantity']);
        }
        else {
          $flag = true;
        }
        if(!empty($_POST['permanent'])) {
          $permanent = input($_POST['permanent']);
        }
        if(!empty($_POST['unitPrice'])) {
          $unitPrice = input($_POST['unitPrice']);
        }
        if(!empty($_POST['password'])) {
          $password = input($_POST['password']);
        }
        if(!empty($_POST['verify_password'])) {
          $verify_password = input($_POST['verify_password']);
        }
        if ($password != $verify_password) {
          $flag = true;
        }

        if (!$flag) {
          $existing_data = read();

          if(empty($existing_data)) {
            $objArr[] = array("MedicineName" => $MedicineName, "quantity" => $quantity,"unitPriceephone"=>ucwords($unitPrice));
            $result = write(json_encode($objArr));
          }
          else {
            $existing_data_decode = json_decode($existing_data);

            array_push($existing_data_decode, array("MedicineName" => $MedicineName,"unitPriceephone"=>$unitPrice, "quantity" => $quantity,));
            write("");
            $result = write(json_encode($existing_data_decode));
          }

          setcookie("quantity", $quantity, time() + 86400);
      		setcookie("password", $password, time() + 86400);

      		header("Location: add-medicine.php");
        }
        else {
          $regErr = "<p class='error'>* marked fields are required</p>";
      	}
      }
    ?>

    <form class="registration" action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" autocomplete="off" method="POST">
      <fieldset>
        <legend>Add Medicine</legend>
        <label for="MedicineName">Medicine Name<span class="required">*</span>: </label>
        <input type="text" name="MedicineName" value="<?php echo $MedicineName; ?>" />
        <br>
        <label for="quantity">Quantity<span class="required">*</span>: </label>
        <input type="quantity" name="quantity" value="<?php echo $quantity; ?>" />
        <br/>
        <label for="unitPrice">Unit Price<span class="required">*</span>: </label>
        <input type="unitPrice" name="unitPrice" value="<?php echo $unitPrice; ?>" />
        <br />
        <button style="margin-top: 2px;
    margin-left: 246px;
    background-color: burlywood;
    padding: 4px 37px;" type="submit">Add</button>
      </fieldset>
      <br />
    </form>

    <?php echo $regErr; ?>
   </div>
   <?php
    include 'footer.php';
    ?>
  </body>
</html>