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
// $shopCountry = $_POST["shopCountry"];

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
// $cardNumber = $_POST["card-number"];
// $expirationMonth = $_POST["expiration-month"];
// $expirationYear = $_POST["expiration-year"];
// $ccv = $_POST["ccv"];
// $nameOnCard = $_POST["name-on-card"];

// $cardSearchQuery = "SELECT * FROM `cardinfo` 
//                    WHERE `cardNo` = '$cardNumber'
//                    AND `months_id` = '$expirationMonth'
//                    AND `year` = '$expirationYear'
//                    AND `ccv` = '$ccv'
//                    AND `nameOnCard` = '$nameOnCard'";

// $cardInsertQuery = "INSERT INTO `cardinfo` (`cardNo`, `months_id`, `year`, `ccv`, `nameOnCard`)
//                    VALUES ('$cardNumber', '$expirationMonth', '$expirationYear', '$ccv', '$nameOnCard')";

// $inserted_key = "";
// try {
//     $searchResult = Database::search($cardSearchQuery);
//     $numRows = $searchResult->num_rows;

//     if ($numRows > 0) {
//         echo "Error";
//     } else {
//         Database::iud($cardInsertQuery);
//         $inserted_key = Database::insert_id();
//         echo "Success";
//     }
//         echo "Success";
//     }
// } catch (Exception $e) {
//     echo "Uncaught MySQL exception: " . $e->getMessage();
// }

//bank
// $bankLocation = $_POST["bank-location"];
// $bankCountry = $_POST["country-residence"];
// $bankName = $_POST["bank-name"];
// $iban = $_POST["iban"];
// $swiftBic = $_POST["swift-bic"];

// $bankInfoSearchQuery = "SELECT * FROM `bankinfo` 
//                        WHERE `name` = '$bankName'
//                        AND `bankCountry` = '$bankCountry'
//                        AND `IBAN` = '$iban'
//                        AND `SWIFT/BIC` = '$swiftBic'";

// $bankInfoInsertQuery = "INSERT INTO `bankinfo` (`name`, `bankCountry`, `IBAN`, `SWIFT/BIC`)
//                        VALUES ('$bankName', '$bankCountry', '$iban', '$swiftBic')";

// try {
//     $searchResult = Database::search($bankInfoSearchQuery);
//     $numRows = $searchResult->num_rows;

//     if ($numRows > 0) {
//         echo "Error";
//     } else {
//         Database::iud($bankInfoInsertQuery);
//         echo "Success";
//     }
// } catch (Exception $e) {
//     echo "Uncaught MySQL exception: " . $e->getMessage();
// }

//seller
// $bankLocation = $_POST["bank-location"];
// $countryResidence = $_POST["country-residence"];
// $firstName = $_POST["first-name"];
// $lastName = $_POST["last-name"];
// $streetName = $_POST["street-name"];
// $addressLine2 = $_POST["address-line2"];
// $cityTown = $_POST["city-town"];
// $stateProvince = $_POST["state"];
// $postalCode = $_POST["postal-code"];
// $phoneNumber = $_POST["phone-number"];
// $fullName = $_POST["full-name"];
// $bankName = $_POST["bank-name"];
// $DOB = $_POST["dob"];
// $taxNumber = $_POST["number"];
// $swiftBic = $_POST["swift-bic"];

// //Temp
// $iban = "1";
// $bankInfoID = "1";

// $sellerSearchQuery = "SELECT * FROM `seller`
// WHERE `fname` = '$firstName'
// AND `lname` = '$lastName'
// AND `countries_id` = '$countryResidence'
// AND `DOB` = '$DOB'  
// AND `taxNumber` = '$taxNumber'
// AND `streetName` = '$streetName'
// AND `addressLine2` = '$addressLine2'
// AND `citytown` = '$cityTown'
// AND `stateProvinceRegion` = '$stateProvince'
// AND `postalCode` = '$postalCode'
// AND `mobile` = '$phoneNumber'
// AND `cardinfo_cardNo` = '$iban'";


// $sellerInsertQuery = "INSERT INTO `seller` (`fname`,`bankinfo_id`, `lname`, `countries_id`, `DOB`, `taxNumber`, `streetName`, `addressLine2`, `citytown`, `stateProvinceRegion`, `postalCode`, `mobile`, `cardinfo_cardNo`)
// VALUES ( '$firstName', '$bankInfoID','$lastName', '$countryResidence', '$DOB', '$taxNumber', '$streetName', '$addressLine2', '$cityTown', '$stateProvince', '$postalCode', '$phoneNumber', '$iban')";

// try {
//     $searchResult = Database::search($sellerSearchQuery);
//     $numRows = $searchResult->num_rows;

//     if ($numRows > 0) {
//         echo "Error";
//     } else {
//         Database::iud($sellerInsertQuery);
//         echo "Success";
//     }
// } catch (Exception $e) {
//     echo "Uncaught MySQL exception: " . $e->getMessage();
// }

//item
$shopLanguage = $_POST["shopLanguage"];
$shopCurrency = $_POST["shopCurrency"];
$name = $_POST["name"] ?? '';
$sellerId = $_POST["sellerId"] ?? '';
$brief_overview = $_POST["brief-overview"] ?? '';
$SelCategory = $_POST["SelCategory"] ?? '';
$whomade = $_POST["whomade"] ?? '';
$RenewalOption_id = $_POST["RenewalOption_id"] ?? '';
$tags = $_POST["tags"] ?? '';
$materials = $_POST["materials"] ?? '';
$price = $_POST["price"] ?? '';
$quantity = $_POST["quantity"] ?? '';
$status_id = '1';
$instruction = $_POST["instruction"] ?? '';
$whatBuyerSees = $_POST["whatBuyerSees"] ?? '';
$item_weight = $_POST["item-weight"] ?? '';
$package_length = $_POST["package-length"] ?? '';
$package_width = $_POST["package-width"] ?? '';
$package_height = $_POST["package-height"] ?? '';
$returnpolicy = $_POST["returnpolicy"] ?? '';
$customs_id = $_POST["customs_id"] ?? '';
$shippingServices_id = $_POST["shippingServices_id"] ?? '';
$handlingFee = $_POST["handlingFee"] ?? '';
$itemType_id = $_POST["itemType_id"] ?? '';
$shippingop = $_POST["shippingop"] ?? '';
$language_id = $_POST["language_id"] ?? '';
$currency_id = $_POST["currency_id"] ?? '';
$section = $_POST["section"] ?? '';
$Ship_to_where_id = $_POST["Ship_to_where_id"] ?? '';
$itemType_id1 = $_POST["itemType_id1"] ?? '';
$processing_time = $_POST["processing_time"] ?? '';
$originZIPCode = $_POST["originZIPCode"] ?? '';
$shop_id = $_POST["shop_id"] ?? '';
$video = $_POST["videoInput"];

//section
$sql = "SELECT * FROM `section` WHERE `name` = '$name' ";

try {
    $result = Database::search($sql);
    $numRows = $result->num_rows;

    if ($numRows > 0) {
        echo "Error";
    } else {
        $insertSQL = "INSERT INTO `section` (`name`) VALUES ('$name')";
        Database::iud($insertSQL);
        echo "Success";
    }
} catch (Exception $e) {
    echo "Uncaught MySQL exception: " . $e->getMessage();
}

$sectionid = Database::getLastInsertedId();


// $shopSearchQuery = "SELECT * FROM `item` 
//                     WHERE `name` = '$name' 
//                     AND `seller_id` = '$sellerId'";

// $shopInsertQuery = "INSERT INTO `item` 
//                     (`name`, `seller_id`, `Description`, `itemCategories_id`, `whomade_id`, `RenewalOption_id`, `tags`, `materials`, `price`, `quantity`, `status_id`, `personalizationInstructions`, `defaultInstructions`, `weight`, `length`, `width`, `height`, `returnPolicy_id`, `customs_id`, `shippingServices_id`, `handlingFee`, `itemType_id`, `shippingOpType_id`, `language_id`, `currency_id`, `Section_id`, `Ship_to_where_id`, `itemType_id1`, `Processing_time_id`, `origin_ZIP`, `shop_id`) 
//                     VALUES ('$name', '$sellerId', '$brief_overview', '$SelCategory', '$whomade', '$RenewalOption_id', '$tags', '$materials', '$price', '$quantity', '$status_id', '$instruction', '$whatBuyerSees', '$item_weight', '$package_length', '$package_width', '$package_height', '$returnpolicy', '$customs_id', '$shippingServices_id', '$handlingFee', '$itemType_id', '$shippingop', '$language_id', '$currency_id', '$section', '$Ship_to_where_id', '$itemType_id1', '$processing_time', '$originZIPCode', '$shop_id')";

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


