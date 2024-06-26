<?php
session_start();
require "connection.php";

$id = intval($_GET['item-id']);

$page_title = "Place Order"
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title class=".website-title">
        <?php
        if (isset($page_title)) {
            echo "$page_title";
        }
        ?> - Artisan Alley
    </title>
    <link rel="icon" href="icons/logoSVG.svg" type="image/svg+xml">
    <link rel="stylesheet" href="styles/bootstrap.css">
    <link rel="stylesheet" href="styles/buttons.scss">
    <link rel="stylesheet" href="styles/footer.scss">
    <link rel="stylesheet" href="styles/home.scss">
    <link rel="stylesheet" href="style.css">
</head>

<body onload="load('buypage'); gloweffect('buypage');">
    <?php include('includes/navbar.php'); ?>
    <br>
    <br>

    <div class="container py-6">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div id="sp" class="col-sm">
                        <a id="l1" href="#" class="nav-link d-flex flex-column align-items-center custom-nav-link">
                            <div id="buypaged1" class="roundDot mr-2"></div>
                            <div class="col custom-nav-text">Shipping</div>
                        </a>
                    </div>
                    <div id="nys" class="col-sm">
                        <a id="l2" href="#" class="nav-link d-flex flex-column align-items-center custom-nav-link">
                            <div id="buypaged2" class="roundDot mr-2"></div>
                            <div class="col custom-nav-text">Payment</div>
                        </a>
                    </div>
                    <div id="sys" class="col-sm">
                        <a id="l3" href="#" class="nav-link d-flex flex-column align-items-center custom-nav-link">
                            <div id="buypaged3" class="roundDot mr-2"></div>
                            <div class="col custom-nav-text">Review</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section id="buypagesection1">
        <div class="container py-6">
            <h2>Enter your shipping address</h2>
            <div class="row">
                <div class="col-md-6">
                    <label for="country">Country *</label>
                    <?php
                    $query = "SELECT * FROM countries";
                    $resultSet = Database::search($query);

                    echo '<select class="form-control" id="address-country"  >';
                    echo '<option value="" selected disabled></option>';

                    while ($row = $resultSet->fetch_assoc()) {
                        $country_code = $row['id'];
                        $country_name = $row['name'];
                        echo "<option value=\"$country_code\">$country_name</option>";
                    }
                    echo '</select>';

                    $resultSet->close();
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="full-name">Full name *</label>
                    <input type="text" class="form-control" id="full-name" required> <span id="shopNameError" class="error-message"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="street-address">Street address *</label>
                    <input type="text" class="form-control" id="street-address" required> <span id="shopNameError" class="error-message"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="apt-suite">Apt / Suite / Other (optional)</label>
                    <input type="text" class="form-control" id="apt-suite"> <span id="shopNameError" class="error-message"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="city">City *</label>
                    <input type="text" class="form-control" id="city" required> <span id="shopNameError" class="error-message"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="postal-code">Postal code (optional)</label>
                    <input type="text" class="form-control" id="postal-code"> <span id="shopNameError" class="error-message"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="phone-number">Phone number (optional)</label>
                    <input type="tel" class="form-control" id="phone-number">
                </div>
            </div>
        </div>

    </section>

    <section id="buypagesection2">

        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="text-center">Choose a payment method</h2>
                    <p class="text-center">You will not be charged until you review this order on the next page.</p>
                    <div class="d-flex justify-content-center">
                        <div class="card p-3">
                            <img src="res/visa.png" alt="Visa logo" class="img-fluid mb-3 payment-icon" />
                            <div class="form-group">
                                <label for="nameOnCard">Name on card*</label>
                                <input type="text" class="form-control" id="nameOnCard" placeholder="Make sure to enter the full name that's on your card." required> <span id="shopNameError" class="error-message"></span>
                            </div>
                            <div class="form-group">
                                <label for="cardNumber">Card number*</label>
                                <input type="tel" inputmode="numeric" class="form-control" id="cardNumber" placeholder="**** **** **** ****" maxlength="19" required>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="expirationDate">Expiration date*</label>
                                        <input type="text" class="form-control" id="expirationDate" placeholder="MM/YYYY" maxlength="5" required> <span id="shopNameError" class="error-message"></span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="securityCode">Security code *</label>
                                        <input type="text" class="form-control" id="securityCode" placeholder="CVV" maxlength="3" required> <span id="shopNameError" class="error-message"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="sameBillingAddress">
                                <label class="form-check-label" for="sameBillingAddress">My billing address is the same as my shipping address:</label>
                            </div>
                            <div id="billingAddress" class="d-none">
                                <p>Tharindu Geeshan, sfagda, gadga, DGAGDA, 60232, Sri Lanka, 078-998-9158</p>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="setDefaultBillingAddress">
                                <label class="form-check-label" for="setDefaultBillingAddress">Set as default</label>
                            </div>
                            <a href="#" class="btn btn-primary mt-3">Review your order</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>

    <section id="buypagesection3">

        <div class="container">
            <div class="row py-5">
                <div class="col-12 text-center">
                    <h3>Please confirm and submit your order</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h4>Shipping and payment</h4>
                </div>
                <div class="col-md-6 text-end">
                    <h4>Order summary</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="border rounded p-3">
                        <h5>Shipping address</h5>
                        <p>Tharindu Geeshan, sfagda, gadga, DGAGDA, 60232, 078-998-9158</p>
                        <button type="button" class="btn btn-link p-0">Change</button>
                        <hr>
                        <h5>Payment method</h5>
                        <p>VISA ending in ...0341<br>Exp: 12/2026</p>
                        <button type="button" class="btn btn-link p-0">Change</button>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="border rounded p-3">
                        <h5>Item(s) total</h5>
                        <p>USD 32.90</p>
                        <hr>
                        <h5>Shipping</h5>
                        <p>USD 31.90</p>
                        <hr>
                        <h5>Tax</h5>
                        <p>USD 0.00</p>
                        <hr>
                        <h5>Order total (1 item)</h5>
                        <p>USD 64.80</p>
                        <p>* Local taxes included (where applicable)</p>
                        <p>*Additional duties and taxes may apply</p>
                    </div>
                    <div class="text-end mt-3">
                        <p>Billing address</p>
                        <p>Same as shipping address</p>
                        <button type="button" class="btn btn-link p-0">Change</button>
                    </div>
                </div>
            </div>
            <div class="row py-5">
                <div class="col-12 text-center">
                    <button type="button" class="btn btn-primary">Submit your order to dgagda</button>
                    <p class="mt-3 text-muted">By clicking Submit your order to dgagda, you agree to Etay's Terms of Use and Privacy Policy.</p>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row justify-content-between mt-4">
                <div class="col-6">
                    <div class="d-flex align-items-center">
                        <img src="images/bear-necklace.jpg" alt="Bear Necklace with Name" class="img-fluid me-3" style="width: 80px; height: 80px;">
                        <div class="flex-grow-1">
                            <h5 class="mb-1">Bear Necklace with Name, Silver Name Necklace, Ma...</h5>
                            <p class="text-muted">USD 32.90</p>
                        </div>
                    </div>
                </div>
                <div class="col-4 text-end">
                    <p class="text-muted mb-1">Estimated delivery: Apr 16-10</p>
                    <p class="text-muted">Ships from Turkey</p>
                </div>
            </div>
            <hr class="my-4">
            <div class="row">
                <div class="col-6">
                    <p class="text-muted">Gold Plating Color: Yellow Gold</p>
                    <p class="text-muted">Chain Length: 16 inch (40 cm)</p>
                    <p class="text-muted">Personalization: Tharindu</p>
                </div>
                <div class="col-6 d-flex flex-column align-items-end">
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" id="markGift">
                        <label class="form-check-label" for="markGift">Mark order as a gift</label>
                    </div>
                    <div class="text-end">
                        <p class="text-muted">Add an optional note to the seller</p>
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="hidePrice">
                        <label class="form-check-label" for="hidePrice">Write a gift note and hide the price. Send a gift teaser with tracking info and even a sneak peek</label>
                    </div>
                    <button type="button" class="btn btn-primary mt-3">Choose gift options</button>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="text-primary fs-2 me-3">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <div>
                            <h3>Artisan Alley Purchase Protection</h3>
                            <p class="text-muted">Shop confidently on Artisan Alley knowing if something goes wrong with an order, we've got your back. <a href="#">See program terms</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <div class="container py-5">
        <div class="row">
            <div class="col text-left">
                <button id="back" onclick="reverseSavencon('buypage');" class="button ">Back</button>
            </div>
            <div class="col-6 text-end">
                <button onclick="savencon('buypage'); CreateOrder(<?php echo $id; ?>);" id="buyPageConbtn" class="button fast">Continue to Payment</button>
            </div>

        </div>
    </div>



    <?php include('includes/footer.php'); ?>