<?php

require "connection.php";

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

    $insertQuery = "
INSERT INTO `order_details` 
(`fullName`, `streetAddress`, `apt`, `city`, `postalCode`, `mobile`, `nameOnCard`, `cardNo`, `expDate`, `sCode`) 
VALUES 
('$fullName', '$streetAddress', '$aptSuite', '$city', '$postalCode', '$phoneNumber', '$nameOnCard', '$cardNumber', '$expirationDate', '$securityCode');
";

    try {
        Database::iud($insertQuery);
        $orderId = Database::getLastInsertedId();
        echo "Pass";
    } catch (Exception $e) {
        echo "Uncaught MySQL exception: " . $e->getMessage();
    }

    // Order Process
    $itemId = $_POST['itemId'] ?? '';
    $quantity = isset($_POST['qty']) ? floatval($_POST['qty']) : 0.0;
    $searchQuery = "SELECT * FROM `orders` WHERE `item_id` = '$itemId' AND `order_details_id`= '$orderId'";
    $insertQuery = "INSERT INTO `orders` (`item_id`, `qty`,`order_details_id`) VALUES ('$itemId', '$quantity',$orderId)";
    try {
        $searchResult = Database::search($searchQuery);
        $numRows = $searchResult->num_rows;
        if ($numRows > 0) {
            echo "Error";
        } else {
            Database::iud($insertQuery);
            echo "Success";
        }
    } catch (Exception $e) {
        echo "Uncaught MySQL exception: " . $e->getMessage();
    }
}
