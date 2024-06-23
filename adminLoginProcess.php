<?php

session_start();

require "connection.php";

$email = $_POST["e"];
$password = $_POST["pw"];

$resultset = Database::search("SELECT * FROM `users` WHERE `email`= '" . $email . "' AND `password`= '" . $password . "'");

$n = $resultset->num_rows;

if ($n == 1) {
  echo "Success";
  $d = $resultset->fetch_assoc(); 
  $name = $d['uname'];
  $_SESSION["name"] = $name;

  
} else {
  echo "Error";
}
