<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payments</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <main class="container">
        <h1 id="payment-header">Payment Methods</h1>
        <div class="payment-methods">
            <ul>
                <!-- List of payment methods goes here -->
                <li><span>PayPal</span></li>
                <li><span>Stripe</span></li>
                <li><span>Apple Pay</span></li>
                <li><span>Google Pay</span></li>
            </ul>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>

</html>




<?php include('includes/advertisement.php'); ?>
<?php include('includes/footer.php'); ?>