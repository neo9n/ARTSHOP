<?php

$email = "artisonAlley@gmail.com";
$mobile = "+94789989157";

function getEmail() {
    global $email; // Access the global variable $email
    return $email;
}

function getPhoneNumber() {
    global $mobile; // Access the global variable $mobile
    return $mobile;
}

?>
