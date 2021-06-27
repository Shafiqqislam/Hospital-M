<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
      body {
        box-sizing: border-box;
        background-color: #f1d6cc;
      }
      input {
        margin-bottom: 2px;
        width: 255px;
      }
      input[type='radio'] {
        width: 12px;
      }
      input[type='date'] {
        width: 215px;
      }
      label {
        display: inline-block;
        width: 150px;
      }
      .required {
        color: orange;
      }
      .error {
      color: red;
      font-size: 20px;
      text-align: center;
     }
      .registration{
        width: 400px;
        margin-left: 486px;
      }
    </style>
    <title>Registration Form</title>
  </head>
  <body>

    <?php
      require "functions-action.php";
      $fname = "";
      $username = "";
      $password = "";
      $verify_password = "";
      $regErr = "";
      $flag = false;

      if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if(!empty($_POST['fname'])) {
          $fname = input($_POST['fname']);
        }
        else {
          $flag = true;
        }
       
        if(!empty($_POST['username'])) {
          $username = input($_POST['username']);
        }
        else {
          $flag = true;
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
            $objArr[] = array("firstname" => $fname, "username" => $username, "password" => $password);
            $result = write(json_encode($objArr));
          }
          else {
            $existing_data_decode = json_decode($existing_data);

            array_push($existing_data_decode, array("firstname" => $fname, "username" => $username, "password" => $password));
            write("");
            $result = write(json_encode($existing_data_decode));
          }

          setcookie("username", $username, time() + 86400);
      		setcookie("password", $password, time() + 86400);

      		header("Location: login-action.php");
        }
        else {
          $regErr = "<p class='error'>* marked fields are required</p>";
      	}
      }
    ?>

    <form class="registration" action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" autocomplete="off" method="POST">
      <fieldset>
        <legend>Registration Form</legend>
        <label for="fname">Full Name<span class="required">*</span>: </label>
        <input type="text" name="fname" value="<?php echo $fname; ?>" />
        <br>
        <label for="username">Username<span class="required">*</span>: </label>
        <input type="text" name="username" value="<?php echo $username; ?>" />
        <br>
        <label for="password">Password<span class="required">*</span>: </label>
        <input type="password" name="password" value="<?php echo $password; ?>" />
        <br>
        <label for="verify-Password">Re-enter Password<span class="required">*</span>: </label>
        <input type="password" name="verify_password" value="<?php echo $verify_password; ?>"><span class="error"><?php if($password != $verify_password) echo "password doesn't match"; ?></span>
        <br />
        <button type="submit">Register</button>
      </fieldset>
      <br />
      
     
    </form>

    <?php echo $regErr; ?>
  </body>
</html>