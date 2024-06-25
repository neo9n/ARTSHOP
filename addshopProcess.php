<?php
session_start();

require "connection.php";

//dataSet
$shopLanguage = $_POST["shopLanguage"];
$shopCurrency = $_POST["shopCurrency"];
$brief_overview = $_POST["brief-overview"] ?? '';
$SelCategory = $_POST["SelCategory"] ?? '';
$whomade = $_POST["whomade"] ?? '';
$RenewalOption_id = $_POST["renewal_option"] ?? '';
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
$handlingFee = $_POST["handlingFee"] ?? '';
$itemType_id = $_POST["itemtype"] ?? '';
$shippingop = $_POST["shippingop"] ?? '';
$section = $_POST["section"] ?? '';
$shippingCountries = $_POST["shippingCountryId"];
$itemType_id1 = $_POST["itemType_id1"] ?? '';
$processing_time = $_POST["processing_time"] ?? '';
$originZIPCode = $_POST["originZIPCode"] ?? '';
$video = $_POST["videoInput"];
$shippingModel = $_POST["ShippingModel"];
$productName = $_POST["product-name"];
$shippingOption = $_POST["shopingOption"];
$shopName = $_POST["shopName"];
$shopCountry = $_POST["shopCountry"];$cardNumber = $_POST["card-number"];
$expirationMonth = $_POST["expiration-month"];
$expirationYear = $_POST["expiration-year"];
$ccv = $_POST["ccv"];
$nameOnCard = $_POST["name-on-card"];
$bankLocation = $_POST["bank-location"];
$bankCountry = $_POST["country-residence"];
$bankName = $_POST["bank-name"];
$iban = $_POST["iban"];
$swiftBic = $_POST["swift-bic"];
$bankLocation = $_POST["bank-location"];
$countryResidence = $_POST["country-residence"];
$firstName = $_POST["first-name"];
$lastName = $_POST["last-name"];
$streetName = $_POST["street-name"];
$addressLine2 = $_POST["address-line2"];
$cityTown = $_POST["city-town"];
$stateProvince = $_POST["state"];
$postalCode = $_POST["postal-code"];
$phoneNumber = $_POST["phone-number"];
$fullName = $_POST["full-name"];
$bankName = $_POST["bank-name"];
$DOB = $_POST["dob"];
$taxNumber = $_POST["number"];
$swiftBic = $_POST["swift-bic"];
$KeyWords = isset($_POST["KeyWords"]) ? $_POST["KeyWords"] : [];
$cardId = $cardNumber;

//card
$cardSearchQuery = "SELECT * FROM `cardinfo` 
                   WHERE `cardNo` = '$cardNumber'
                   AND `months_id` = '$expirationMonth'
                   AND `year` = '$expirationYear'
                   AND `ccv` = '$ccv'
                   AND `nameOnCard` = '$nameOnCard'";
$cardInsertQuery = "INSERT INTO `cardinfo` (`cardNo`, `months_id`, `year`, `ccv`, `nameOnCard`)
                   VALUES ('$cardNumber', '$expirationMonth', '$expirationYear', '$ccv', '$nameOnCard')";
try {
    $searchResult = Database::search($cardSearchQuery);
    $numRows = $searchResult->num_rows;
    if ($numRows > 0) {
        echo "Error";
    } else {
        Database::iud($cardInsertQuery);
        echo "Pass";
    }
} catch (Exception $e) {
    echo "Uncaught MySQL exception: " . $e->getMessage();
}
echo $cardId.PHP_EOL;

//bank
$bankInfoSearchQuery = "SELECT * FROM `bankinfo` 
                       WHERE `name` = '$bankName'
                       AND `bankCountry` = '$bankCountry'
                       AND `IBAN` = '$iban'
                       AND `SWIFT/BIC` = '$swiftBic'";
$bankInfoInsertQuery = "INSERT INTO `bankinfo` (`name`, `bankCountry`, `IBAN`, `SWIFT/BIC`)
                       VALUES ('$bankName', '$bankCountry', '$iban', '$swiftBic')";

try {
    $searchResult = Database::search($bankInfoSearchQuery);
    $numRows = $searchResult->num_rows;
    if ($numRows > 0) {
        echo "Error";
        $row = $result->fetch_assoc();
        $bankInfoID = $row["id"];
    } else {
        Database::iud($bankInfoInsertQuery);
        echo "Pass";
    }
} catch (Exception $e) {
    echo "Uncaught MySQL exception: " . $e->getMessage();
}
$bankInfoID = Database::getLastInsertedId();

//seller
$sellerSearchQuery = "SELECT * FROM `seller`
WHERE `fname` = '$firstName'
AND `lname` = '$lastName'
AND `countries_id` = '$countryResidence'
AND `DOB` = '$DOB'  
AND `taxNumber` = '$taxNumber'
AND `streetName` = '$streetName'
AND `addressLine2` = '$addressLine2'
AND `citytown` = '$cityTown'
AND `stateProvinceRegion` = '$stateProvince'
AND `postalCode` = '$postalCode'
AND `mobile` = '$phoneNumber'
AND `cardinfo_cardNo` = '$cardId'";
$sellerInsertQuery = "INSERT INTO `seller` (`fname`,`bankinfo_id`, `lname`, `countries_id`, `DOB`, `taxNumber`, `streetName`, `addressLine2`, `citytown`, `stateProvinceRegion`, `postalCode`, `mobile`, `cardinfo_cardNo`)
VALUES ( '$firstName', '$bankInfoID','$lastName', '$countryResidence', '$DOB', '$taxNumber', '$streetName', '$addressLine2', '$cityTown', '$stateProvince', '$postalCode', '$phoneNumber', '$cardId')";
try {
    $searchResult = Database::search($sellerSearchQuery);
    $numRows = $searchResult->num_rows;
    if ($numRows > 0) {
        echo "Error";
        $row = $result->fetch_assoc();
        $sellerId = $row["id"];
    } else {
        Database::iud($sellerInsertQuery);
        echo "Pass";
    }
} catch (Exception $e) {
    echo "Uncaught MySQL exception: " . $e->getMessage();
}
$sellerId = Database::getLastInsertedId();

//keywords
if (!is_array($KeyWords)) {
    $KeyWords = explode(',', $KeyWords);
}
for ($i = 0; $i < count($KeyWords); $i++) {
    $keyword = trim($KeyWords[$i]);
    $keySql = "SELECT * FROM `keywords` WHERE `word` = '$keyword' ";
    try {
        $result = Database::search($keySql);
        $numRows = $result->num_rows;

        if ($numRows > 0) {
        } else {
            $insertSQL = "INSERT INTO `keywords` (`word`) VALUES ('$keyword')";
            Database::iud($insertSQL);
        }
    } catch (Exception $e) {
        echo "Uncaught MySQL exception: " . $e->getMessage();
    }
}

//shop
$shopSearchQuery = "SELECT * FROM `shop` WHERE `shop_name` = '$shopName' AND `seller_id` = '$sellerId'";
$shopInsertQuery = "INSERT INTO `shop` (`shop_name`, `seller_id`, `verified_status_id`) 
                    VALUES ('$shopName', '$sellerId', 1)";
try {
    $searchResult = Database::search($shopSearchQuery);
    $numRows = $searchResult->num_rows;
    if ($numRows > 0) {
        echo "Error";
        $row = $result->fetch_assoc();
        $shop_id = $row["id"];
    } else {
        Database::iud($shopInsertQuery);
        echo "Pass";
    }
} catch (Exception $e) {
    echo "Uncaught MySQL exception: " . $e->getMessage();
}
$shop_id = Database::getLastInsertedId();

//section
$sectionid = "";
$sql = "SELECT * FROM `section` WHERE `name` = '$section' ";
try {
    $result = Database::search($sql);
    $numRows = $result->num_rows;

    if ($numRows > 0) {
        echo "Error";
        $row = $result->fetch_assoc();
        $sectionid = $row["id"];
    } else {
        $insertSQL = "INSERT INTO `section` (`name`) VALUES ('$section')";
        Database::iud($insertSQL);
        echo "Pass";
        $sectionid = Database::getLastInsertedId();
    }
} catch (Exception $e) {
    echo "Uncaught MySQL exception: " . $e->getMessage();
}

//item
$shopSearchQuery = "SELECT * FROM `item` 
                    WHERE `name` = '$productName' 
                    AND `seller_id` = '$sellerId'";

$shopInsertQuery = "
    INSERT INTO `item` (
        `name`,
        `video`,
        `seller_id`,
        `Description`,
        `itemCategories_id`,
        `whomade_id`,
        `RenewalOption_id`,
        `price`,
        `quantity`,
        `status_id`,
        `personalizationInstructions`,
        `defaultInstructions`,
        `weight`,
        `length`,
        `width`,
        `height`,
        `returnPolicy_id`,
        `shippingServices_id`,
        `handlingFee`,
        `itemType_id`,
        `shippingOpType_id`,
        `language_id`,
        `currency_id`,
        `Section_id`,
        `Ship_to_where_id`,
        `Processing_time_id`,
        `origin_ZIP`,
        `shop_id`
    ) VALUES (
        '$productName',
        '$video',
        '$sellerId',
        '$brief_overview',
        '$SelCategory',
        '$whomade',
        '$RenewalOption_id',
        '$price',
        '$quantity',
        '$status_id',
        '$instruction',
        '$whatBuyerSees',
        '$item_weight',
        '$package_length',
        '$package_width',
        '$package_height',
        '$returnpolicy',
        '$shippingModel',
        '$handlingFee',
        '$itemType_id',
        '$shippingOption',
        '$shopLanguage',
        '$shopCurrency',
        '$sectionid',
        '$shippingCountries',
        '$processing_time',
        '$originZIPCode',
        '$shop_id'
    )
";
try {
    $searchResult = Database::search($shopSearchQuery);
    $numRows = $searchResult->num_rows;
    if ($numRows > 0) {
        echo "Error";
    } else {
        Database::iud($shopInsertQuery);
        echo "Success";
    }
} catch (Exception $e) {
    echo "Uncaught MySQL exception: " . $e->getMessage();
}


