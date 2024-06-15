<?php
require "connection.php";

$n = $_POST["categories"];

$r = Database::search("SELECT * FROM `itemcategories` WHERE `name`= '" . $n . "' ");
$num_rows = $r->num_rows;

if ($num_rows > 0) {
    echo "Error";
} else {
    Database::iud("INSERT INTO `itemcategories` (`name`) VALUES ('" . $n . "')");
    echo "Success";
}