<?php

require 'connection.php';

if (isset($_POST["i"])) {

  $pid = $_POST["i"];
  $price = $_POST["p"];
  $quantity = $_POST["q"];

  Database::iud("UPDATE `item` SET `price`='" . $price . "',`quantity`='" . $quantity . "' WHERE `id`='" . $pid . "'");
  echo "ok";
}
