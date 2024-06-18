<?php
session_start();
$page_title = "Welcome to Seller Side"
?>
<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>

<?php
include('connection.php');

// Check if the user is logged in as an administrator
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

// Display the admin dashboard
?>

<!-- HTML code for the admin panel layout -->

<div class="container">
  <div class="row justify-content-center">
    <!-- Admin panel content -->
    <!-- You can add sections for user management, product management, order tracking, etc. -->
    <div class="col-md-12 mt-1">
      <h2>Admin Panel</h2>
      <p>Welcome to the admin panel!</p>
    </div>
  </div>
</div>


<?php include('includes/footer.php'); ?>