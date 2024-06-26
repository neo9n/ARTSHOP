<?php

require 'connection.php';

if (isset($_GET['id'])) {

  $pid = $_GET['id'];

  Database::iud("UPDATE `item` SET `status_id`='2' WHERE `id`='" . $pid . "'");
  echo "ok";
}
