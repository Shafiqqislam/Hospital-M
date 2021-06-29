<?php
// session_start();
// if (isset($_SESSION['username']))
// {
//     unset($_SESSION['username']);
// }
// header("location: login-action.php");
session_start();
session_destroy();
header("location:login-action.php");
?>

