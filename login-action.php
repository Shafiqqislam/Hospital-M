<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <style media="screen">
      label {
        display: inline-block;
        width: 80px;
        padding: 5px;
      }
      body{
        background-color: #f1d6cc;
      }
      button {
        margin: 5px;
      }
      .error {
        padding-left: 10px;
        color: red;
      }
      .login{
        width: 400px;
        margin-left: 486px;
      }
    </style>

    <title>Login Form</title>
  </head>
  <body>
    <?php
      require "functions-action.php";
      $username = "";
      $password = "";
      $error = "";

      if ($_SERVER["REQUEST_METHOD"] === "GET") {
        if (isset($_COOKIE["username"])) {
          $username = $_COOKIE["username"];
        }
        else {
          $username = "";
        }
        if (isset($_COOKIE["password"])) {
          $password = $_COOKIE["password"];
        }
        else {
          $password = "";
        }
      }

      if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (!empty($_POST['username'])) {
          $username = $_POST['username'];
        }
        if (!empty($_POST['password'])) {
          $password = $_POST['password'];
        }
        if ($username === "" or $password === "") {
          $error = "username or password cannot be empty";
        }
        else {
          $readData = read();
          $userArr = json_decode($readData);

          for($i = 0; $i < count($userArr); $i++) {
            $user = $userArr[$i];
            if ($user->username === $username and $user->password === $password) {
              setcookie("username", $username, time() + 86400);
              setcookie("user", json_encode($user), time() + 86400);
              header("Location: welcome.php");
            }
            else {
              $error = "username or password doesn't match";
            }
          }
        }
      }
    ?>

    <form class="login"action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
    <fieldset>
    <legend>Login</legend>
    <label for="username">Username: </label>
      <input type="text" name="username" value="<?php echo $username; ?>">
      <br>
      <label for="password">Password: </label>
      <input type="password" name="password" value="<?php echo $password; ?>">
      <br>
      <button style="background-color: #8bc34a;padding: 6px 11px;margin-left: 211px;" type="submit">Login</button>
      <br>
      <span class="error"><?php echo $error; ?></span>
    </fieldset>
   <p style="text-align:center;">Don't have an account?<a href="registration-action.php">Sign up</a></p> 
    </form>
    
  </body>
</html>
