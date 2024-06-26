<?php
session_start();
require "connection.php";
$page_title = "Add New Product";
?>
<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>

<?php include('subPhPFiles/addProduct-content.php')?>

<section class="container">
    <div class="row">
        <div class="col-12 d-flex justify-content-end p-3 align-items-end ">
            <button class="button fw-bolder" >Add</button>
        </div>
    </div>
</section>

<?php include('includes/advertisement.php'); ?>
<?php include('includes/footer.php'); ?>
