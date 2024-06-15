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
  $name = $d['name'];
  $_SESSION["name"] = $name;


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
