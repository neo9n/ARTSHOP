<?php

session_start();

require "connection.php";

$email = $_POST["e"];
$password = $_POST["pw"];
$rememberMe = $_POST["rememberMe"];

$resultset = Database::search("SELECT * FROM `users` WHERE `email`= '" . $email . "' AND `password`= '" . $password . "'");

$n = $resultset->num_rows;

if ($n == 1) {
  echo "Success";
  $d = $resultset->fetch_assoc(); 
  $name = $d['uname'];
  $_SESSION["name"] = $name;
  $_SESSION["email"] = $d['email'];
} else if ($n == 0) {
  echo "Wrong email or password";
} else {
  echo "Error";
}

if ($n == 1) {


  if ($rememberMe == "1") {
    setcookie("email", $email, time() + 60 * 60 * 24 * 365);
    setcookie("password", $password, time() + 60 * 60 * 24 * 365);
  } else {
    setcookie("email", "", time() - 3600);
    setcookie("password", "", time() - 3600);
  }
} else {
  echo "Error";
}
