<?php
$page_title = "Payment Gateways";
?>

<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h4>Payment Details</h4>
                    <img src="path_to_image1.png" class="img-fluid" alt="Visa">
                    <img src="path_to_image2.png" class="img-fluid" alt="MasterCard">
                    <img src="path_to_image3.png" class="img-fluid" alt="American Express">
                    <img src="path_to_image4.png" class="img-fluid" alt="Discover">
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="cardType">Card Type*</label>
                            <select class="form-control" id="cardType" required>
                                <option value="">--- Select Card Type ---</option>
                                <option value="visa">Visa</option>
                                <option value="mastercard">MasterCard</option>
                                <option value="amex">American Express</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="cardNumber">Card Number*</label>
                            <input type="text" class="form-control" id="cardNumber" required>
                        </div>
                        <div class="form-group">
                            <label for="expiryDate">Expiry Date*</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <select class="form-control" id="expiryMonth" required>
                                        <option value="">--- Month ---</option>
                                        <option value="01">January</option>
                                        <option value="02">February</option>
                                        <option value="03">March</option>
                                        <option value="04">April</option>
                                        <option value="05">May</option>
                                        <option value="06">June</option>
                                        <option value="07">July</option>
                                        <option value="08">August</option>
                                        <option value="09">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-control" id="expiryYear" required>
                                        <option value="">--- Year ---</option>
                                        <?php
                                        $year = date('Y');
                                        for ($i = 0; $i < 10; $i++) {
                                            echo "<option value='" . ($year + $i) . "'>" . ($year + $i) . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cardHolder">Card Holder*</label>
                            <input type="text" class="form-control" id="cardHolder" required>
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail*</label>
                            <input type="email" class="form-control" id="email" required>
                        </div>
                        <div class="form-group">
                            <label for="amount">Amount to be charged to card*</label>
                            <input type="text" class="form-control" id="amount" required>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="terms" required>
                            <label class="form-check-label" for="terms">I have read and agree to the terms and conditions.</label>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Continue</button>
                            <button type="reset" class="btn btn-secondary">Clear</button>
                            <button type="button" class="btn btn-danger">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/advertisement.php'); ?>
<?php include('includes/footer.php'); ?>