<?php
session_start();
$page_title = "Welcome to Seller Side"
?>
<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>

<div class="container">
    <div class="dropdown">
        <button class="dropbtn">Tharindu Geeshan</button>
        <div class="dropdown-content">
            <a href="#">View your profile</a>
            <a href="#">Purchases and reviews</a>
            <a href="#">Messages</a>
            <a href="#">Special offers</a>
            <a href="#">Etay Registry</a>
            <a href="#">Account settings</a>
            <a href="#">Sign out</a>
        </div>
    </div>

</div>


<?php include('includes/footer.php'); ?>