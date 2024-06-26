<?php
session_start();
require "connection.php";

//set Vars
$page_title = "";
$description = "";

$id = intval($_GET['item-id']);
$sql = "SELECT * FROM itempics INNER JOIN `item` ON `itempics`.`item_id`=`item`.`id`  WHERE item_id = $id";

$result = Database::search($sql);
echo "<ul class='list-group'>";
if ($result->num_rows > 0) {
    if ($row = $result->fetch_assoc()) {
        $page_title = $row["Name"];
        $description = $row["Description"];
        $price = $row["price"];
        $location = $row["location"];
        $weight = $row["weight"];
        $width = $row["width"];
        $height = $row["height"];
    }
}
Database::close();;

//set page Name

?>

<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>

<div class="container my-5">
    <div class="row">
        <div class="col-md-6">
            <img src="<?php echo $location; ?>" class="img-fluid img-preview" alt="Custom Two Name Handwriting Necklace">
        </div>
        <div class="col-md-6">
            <h1><?php echo $page_title; ?></h1>
            <br>
            <p class="text-success font-weight-bold"><?php echo $price; ?>$</p>
            <p class="text-black">New markdown! Biggest sale in 60+ days</p>
            <div class="d-flex align-items-center m-3">
                <button class="button" onclick="setQty('-');">-</button>
                <label class="form-control mx-2 text-center" style="max-width: 50px;" id="qty">1</label>
                <button class="button" onclick="setQty('+');" >+</button>
            </div>
            <button class="btn btn-primary btn-block" onclick="moveBillingPage('<?php echo $id ?>','buyPage.php');">Buy it now</button>
            <button class="btn btn-outline-secondary btn-block">Add to cart</button>
        </div>
    </div>
    <br>
    <div class="row mt-5 pt-5">
        <div class="col">
            <h2>Product Description</h2>
            <p class="lead"><?php echo $description; ?></p>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col">
            <h2>Product Details</h2>
            <table class="table">
                <tbody>
                    <tr>
                        <th>Height</th>
                        <td><?php echo $height; ?></td>
                    </tr>
                    <tr>
                        <th>Width</th>
                        <td><?php echo $width; ?></td>
                    </tr>
                    <tr>
                        <th>Weight</th>
                        <td><?php echo $weight; ?></td>
                    </tr>
                </tbody>

            </table>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col">
            <h2>Reviews</h2>
            <p>6,214 reviews ★★★★★</p>
            <p>I love these necklaces. So unique and beautiful! - Celly Jones</p>
        </div>
    </div>
</div>

<div id="order-details-modal" class="modal">
    <div class="modal-content">
        <span class="close-button">&times;</span>
        <h2>Order Details</h2>
        <p>Shipping: USD 19.00 (Jul 6-15, Standard Shipping)</p>
        <p>Shipping address: Tharindu Geeshan, sfagda, gadga, DGAGDA, 60232, 078-998-9158</p>
        <p>Payment: VISA ..0341</p>
        <p>Discount: -USD 22.00</p>
        <p>Shipping: USD 19.00</p>
        <p>Order total: USD 52.00</p>
        <button>Submit your order to dgagda</button>
    </div>
</div>

<?php include('includes/advertisement.php'); ?>
<?php include('includes/footer.php'); ?>