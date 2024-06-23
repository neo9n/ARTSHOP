<?php
$page_title = "Add New Product";
?>
<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h2>Add New Product</h2>
        </div>
    </div>
    <form action="process_add_product.php" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="productName">Product Name</label>
                            <input type="text" class="form-control" id="productName" name="product_name" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="productDescription">Product Description</label>
                            <textarea class="form-control" id="productDescription" name="product_description" rows="4" required></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="productCategory">Category</label>
                            <select class="form-control" id="productCategory" name="product_category" required>
                                <option value="Health & Medicine">Health & Medicine</option>
                                <option value="Beauty">Beauty</option>
                                <option value="Electronics">Electronics</option>
                                <!-- Add more categories as needed -->
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="productPrice">Price</label>
                            <input type="number" class="form-control" id="productPrice" name="product_price" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="productSKU">SKU</label>
                            <input type="text" class="form-control" id="productSKU" name="product_sku" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="productQuantity">Stock Quantity</label>
                            <input type="number" class="form-control" id="productQuantity" name="product_quantity" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="productImages">Product Images</label>
                            <input type="file" class="form-control" id="productImages" name="product_images[]" multiple required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="shippingWeight">Shipping Weight</label>
                            <input type="number" class="form-control" id="shippingWeight" name="shipping_weight" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="shippingDimensions">Shipping Dimensions (L x W x H)</label>
                            <input type="text" class="form-control" id="shippingDimensions" name="shipping_dimensions" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="shippingOptions">Shipping Options</label>
                            <input type="text" class="form-control" id="shippingOptions" name="shipping_options" required>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100">Add Product</button>
            </div>
        </div>
    </form>
</div>

<?php include('includes/advertisement.php'); ?>
<?php include('includes/footer.php'); ?>
