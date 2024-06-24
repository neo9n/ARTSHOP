<?php
session_start();

require "connection.php";

//shop
// if (isset($_SESSION['name']) && is_numeric($_SESSION['name'])) {
//     $sellerId = intval($_SESSION['id']);
// } else {
//     $sellerId = "1";
// }
// $shopName = $_POST["shopName"];
// $shopLanguage = $_POST["shopLanguage"];
// $shopCountry = $_POST["shopCountry"];
// $shopCurrency = $_POST["shopCurrency"];

// $shopSearchQuery = "SELECT * FROM `shop` WHERE `shop_name` = '$shopName' AND `seller_id` = '$sellerId'";

// $shopInsertQuery = "INSERT INTO `shop` (`shop_name`, `seller_id`, `verified_status_id`) 
//                     VALUES ('$shopName', '$sellerId', 1)";

// try {
//     $searchResult = Database::search($shopSearchQuery);
//     $numRows = $searchResult->num_rows;

//     if ($numRows > 0) {
//         echo "Error";
//     } else {
//         Database::iud($shopInsertQuery);
//         echo "Success";
//     }
// } catch (Exception $e) {
//     echo "Uncaught MySQL exception: " . $e->getMessage();
// }

//card
$cardNo = $_POST["cardNo"];
$monthsId = $_POST["months_id"];
$year = $_POST["year"];
$ccv = $_POST["ccv"];
$nameOnCard = $_POST["nameOnCard"];

$cardInfoSearchQuery = "SELECT * FROM `cardinfo` WHERE `cardNo` = '$cardNo'";
$cardInfoInsertQuery = "INSERT INTO `cardinfo` (`cardNo`, `months_id`, `year`, `ccv`, `nameOnCard`) 
                        VALUES ('$cardNo', '$monthsId', '$year', '$ccv', '$nameOnCard')";

try {
    $searchResult = Database::search($cardInfoSearchQuery);
    $numRows = $searchResult->num_rows;

    if ($numRows > 0) {
        echo "Error";
    } else {
        Database::iud($cardInfoInsertQuery);
        echo "Success";
    }
} catch (Exception $e) {
    echo "Uncaught MySQL exception: " . $e->getMessage();
}

//seller
$name = $_POST["name"];
$countriesId = $_POST["countries_id"];
$DOB = $_POST["DOB"];
$taxNumber = $_POST["taxNumber"];
$streetName = $_POST["streetName"];
$addressLine2 = $_POST["addressLine2"];
$citytown = $_POST["citytown"];
$stateProvinceRegion = $_POST["stateProvinceRegion"];
$postalCode = $_POST["postalCode"];
$mobile = $_POST["mobile"];
$cardInfo_cardNo = $_POST["cardInfo_cardNo"];

$sellerSearchQuery = "SELECT * FROM `seller` WHERE `name` = '$name' AND `countries_id` = '$countriesId'";
$sellerInsertQuery = "INSERT INTO `seller` (`name`, `countries_id`, `DOB`, `taxNumber`, `streetName`, `addressLine2`, `citytown`, `stateProvinceRegion`, `postalCode`, `mobile`, `cardInfo_cardNo`) 
                      VALUES ('$name', '$countriesId', '$DOB', '$taxNumber', '$streetName', '$addressLine2', '$citytown', '$stateProvinceRegion', '$postalCode', '$mobile', '$cardInfo_cardNo')";

try {
    $searchResult = Database::search($sellerSearchQuery);
    $numRows = $searchResult->num_rows;

    if ($numRows > 0) {
        echo "Error";
    } else {
        Database::iud($sellerInsertQuery);
        echo "Success";
    }
} catch (Exception $e) {
    echo "Uncaught MySQL exception: " . $e->getMessage();
}
