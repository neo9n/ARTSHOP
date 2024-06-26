<?php
session_start();
require "connection.php";
// $item_id = $_SESSION['item_id'];

//temp
$item_id = 3;

$allowed_image_extensions = array("image/jpg", "image/jpeg", "image/png", "image/svg+xml");

if (isset($_FILES["image"])) {
    $imagefile = $_FILES["image"];

    $file_extension = $imagefile["type"];
    echo $file_extension;

    if (in_array($file_extension, $allowed_image_extensions)) {
        $new_img_extension = '';

        if ($file_extension == "image/jpg") {
            $new_img_extension = ".jpg";
        } else if ($file_extension == "image/jpeg") {
            $new_img_extension = ".jpeg";
        } else if ($file_extension == "image/png") {
            $new_img_extension = ".png";
        } else if ($file_extension == "image/svg+xml") {
            $new_img_extension = ".svg";
        }

        $directory = "assets/collections/";
        if (!file_exists($directory)) {
            mkdir($directory, 0777, true);         }

        $file_name = "assets/collections/" . uniqid() . $new_img_extension;
        move_uploaded_file($imagefile["tmp_name"], $file_name);


        echo $file_name;

        Database::iud("INSERT INTO itempics (location, item_id, pic_status_id) VALUES ('" . $file_name . "', '" . $item_id . "', '1')");
    } else {
        echo "Invalid image type";
    }
} else {
    echo "No image file uploaded";
}
