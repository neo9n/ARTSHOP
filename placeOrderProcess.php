<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $addressCountry = $_POST['address-country'] ?? '';
    $fullName = $_POST['full-name'] ?? '';
    $streetAddress = $_POST['street-address'] ?? '';
    $aptSuite = $_POST['apt-suite'] ?? '';
    $city = $_POST['city'] ?? '';
    $postalCode = $_POST['postal-code'] ?? '';
    $phoneNumber = $_POST['phone-number'] ?? '';
    $nameOnCard = $_POST['nameOnCard'] ?? '';
    $cardNumber = $_POST['cardNumber'] ?? '';
    $expirationDate = $_POST['expirationDate'] ?? '';
    $securityCode = $_POST['securityCode'] ?? '';    
}