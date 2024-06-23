<?php
require "connection.php";

$n = $_POST["countries"];

$r = Database::search("SELECT * FROM `countries` WHERE `name`= '" . $n . "' ");
$num_rows = $r->num_rows;

if ($num_rows > 0) {
    echo "Error";
} else {
    Database::iud("INSERT INTO `countries` (`name`) VALUES ('" . $n . "')");
    echo "Success";
}