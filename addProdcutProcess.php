<?php
// process_add_product.php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $productName = $_POST['product_name'];
    $productDescription = $_POST['product_description'];
    $productCategory = $_POST['product_category'];
    $productPrice = $_POST['product_price'];
    $productSKU = $_POST['product_sku'];
    $productQuantity = $_POST['product_quantity'];
    $shippingWeight = $_POST['shipping_weight'];
    $shippingDimensions = $_POST['shipping_dimensions'];
    $shippingOptions = $_POST['shipping_options'];

    // Handle file uploads
    $targetDir = "uploads/";
    $fileNames = [];
    foreach ($_FILES['product_images']['name'] as $key => $val) {
        $targetFilePath = $targetDir . basename($_FILES['product_images']['name'][$key]);
        move_uploaded_file($_FILES['product_images']['tmp_name'][$key], $targetFilePath);
        $fileNames[] = $targetFilePath;
    }

    // Connect to the database
    include('includes/db_connect.php');

    // Insert product data into the database
    $sql = "INSERT INTO products (name, description, category, price, sku, quantity, weight, dimensions, shipping_options, images)
            VALUES ('$productName', '$productDescription', '$productCategory', '$productPrice', '$productSKU', '$productQuantity', '$shippingWeight', '$shippingDimensions', '$shippingOptions', '" . implode(',', $fileNames) . "')";

    if (mysqli_query($conn, $sql)) {
        echo "New product added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
