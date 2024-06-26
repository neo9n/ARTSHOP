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

    $searchQuery = "
SELECT * FROM `order_details` 
WHERE `fullName` = '$fullName'
  AND `streetAddress` = '$streetAddress' 
  AND `apt` = '$aptSuite'
  AND `city` = '$city'
  AND `postalCode` = '$postalCode'
  AND `mobile` = '$phoneNumber'
  AND `nameOnCard` = '$nameOnCard'
  AND `cardNo` = '$cardNumber'
  AND `expDate` = '$expirationDate'
  AND `sCode` = '$securityCode';
";

    $insertQuery = "
INSERT INTO `order_details` 
(`fullName`, `streetAddress`, `apt`, `city`, `postalCode`, `mobile`, `nameOnCard`, `cardNo`, `expDate`, `sCode`) 
VALUES 
('$fullName', '$streetAddress', '$aptSuite', '$city', '$postalCode', '$phoneNumber', '$nameOnCard', '$cardNumber', '$expirationDate', '$securityCode');
";

    try {
        $searchResult = Database::search($searchQuery);
        $numRows = $searchResult->num_rows;

        if ($numRows > 0) {
            echo "Error";
            
        } else {
            Database::iud($insertQuery);
            $orderId= Database::getLastInsertedId();
            echo "Success";
        }
    } catch (Exception $e) {
        echo "Uncaught MySQL exception: " . $e->getMessage();
    }

    //place order
    $orderId = 
    $itemId= $_POST['itemId'] ?? '';
    $quantity = $_POST['qty'] ?? '';
}
