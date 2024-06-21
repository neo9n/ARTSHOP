<?php

require "connection.php";

$fn = $_POST["fn"];
$ln = $_POST["ln"];
$e = $_POST["e"];
$pw = $_POST["pw"];
$m = $_POST["m"];
$g = $_POST["g"];

$r = Database::search("SELECT * FROM `customer` WHERE `email`= '" . $e . "' OR `mobile`= '" . $m . "'");
$num_rows = $r->num_rows;

if ($num_rows > 0) {
    echo "Error";
} else {    

    Database::iud("INSERT INTO `customer`(`fname`,`lname`,`email`,`pw`,`mobile`,`gender_id`)
    VALUES('" . $fn . "','" . $ln . "','" . $e . "','" . $pw . "','" . $m . "','" . $g . "')");

    echo "Success";
}