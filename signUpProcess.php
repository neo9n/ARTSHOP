<?php

require "connection.php";

$n = $_POST["n"];
$e = $_POST["e"];
$pw = $_POST["pw"];
$m = $_POST["m"];
$g = $_POST["g"];

$r = Database::search("SELECT * FROM `users` WHERE `email`= '" . $e . "' OR `mobile`= '" . $m . "'");
$num_rows = $r->num_rows;

if ($num_rows > 0) {
    echo "Error";
} else {
    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    Database::iud("INSERT INTO `users`(`name`,`email`,`password`,`mobile`,`dateReg`,`gender_id`) 
    VALUES('" . $n . "','" . $e . "','" . $pw . "','" . $m . "','" . $date . "','" . $g . "')");
        echo "Success";
}

