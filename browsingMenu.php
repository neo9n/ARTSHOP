<?php
$page_title = "Browsing Menu";
?>

<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-3">
            <!-- Sidebar with categories and filters -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Categories</h5>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="#">Electronics</a></li>
                        <li class="list-group-item"><a href="#">Clothing</a></li>
                        <li class="list-group-item"><a href="#">Accessories</a></li>
                        <!-- Add more categories as needed -->
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <!-- Product listings -->
            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img src="product-image.jpg" class="card-img-top" alt="Product Image">
                        <div class="card-body">
                            <h5 class="card-title">Product Name</h5>
                            <p class="card-text">Product description and details.</p>
                            <a href="#" class="btn btn-primary">View Product</a>
                        </div>
                    </div>
                </div>
                <!-- Repeat product card for each product -->
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
