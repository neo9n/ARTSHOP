<?php
$page_title = "Home";
session_start();

include('includes/header.php');
include('includes/navbar.php');

?>
<div class="d-flex align-items-center justify-content-center welcome-msg-bg">
    <div class="welcome-msg">
        <span class="name">
            <h3><?php
                if (isset($_SESSION['name'])) {
                    $name = $_SESSION['name'];
                    echo "Welcome back, $name!";
                } else {
                    echo "Welcome!";
                }
                ?></h3>
        </span>
    </div>
</div>

<?php include('htmlFiles/home.html'); ?>

<br>

<?php include('includes/footer.php'); ?>