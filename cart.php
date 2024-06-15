<?php
session_start();
$page_title = "Sign In"
?>
<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>


<<section class="container py-6 d-flex justify-content-center align-items-center empty-message">
    <div>
        <div class="text-center">
            <img src="res/empty-box.svg" class="empty-box" alt="Nothing to see here yet">
            <h2>Nothing to see here yet</h2>
            <p>Your cart is empty</p>
        </div>
    </div>
</section>


<?php include('includes/footer.php'); ?>