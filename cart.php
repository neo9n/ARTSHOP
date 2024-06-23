<?php
session_start();
$page_title = "Sign In"
?>
<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>



<main class="container mt-5">
  <h1 class="h2 mb-4">Shopping Cart</h1>

  <div>
        <div class="text-center">
            <img src="res/empty-box.svg" class="empty-box" alt="Nothing to see here yet">
            <h2>Nothing to see here yet</h2>
            <p>Your cart is empty</p>
        </div>
    </div>

  <div id="cart-items" class="row">
    </div>

  <div id="cart-summary" class="card mt-5">
    <div class="card-body">
      <h5 class="card-title">Cart Summary</h5>
      <ul class="list-group">
        <li class="list-group-item d-flex justify-content-between">
          Subtotal
          <span id="subtotal">$0.00</span>
        </li>
        <li class="list-group-item d-flex justify-content-between">
          Shipping
          <span id="shipping-cost">$0.00</span>
        </li>
        <li class="list-group-item d-flex justify-content-between">
          Estimated Total
          <span id="estimated-total">$0.00</span>
        </li>
        <li class="list-group-item">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Promo code">
            <button class="btn btn-outline-secondary" type="button" id="apply-promo">Apply</button>
          </div>
        </li>
      </ul>
      <a href="#" class="btn btn-primary" id="checkout-btn">Checkout</a>
      <a href="#" class="btn btn-link" id="continue-shopping-btn">Continue Shopping</a>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>


<?php include('includes/footer.php'); ?>