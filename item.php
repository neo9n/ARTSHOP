<?php
session_start();
?>
<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>

<br>

<div class="container">
  <div class="row">
    <div class="col-md-6">
      <img src="res/necklase.jpg" class="img-fluid product-view-main d-flex">
    </div>
    <div class="col-md-6">
      <h2 class="price-tag">USD 20.93</h2>
      <p class="offers">30% off sale ends April 5</p>
      <p>Local taxes included (where applicable)</p>
      <p>Mama necklace, mother of pearl necklace, mama bear necklace, name necklace, initial necklace, initial d, necklace for your best friend gifts</p>
      <p>GinzaFashionsLLC <span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></p>
      <form>
        <div class="form-group">
          <label for="length">Length</label>
          <select class="form-control" id="length">
            <option>Select an option</option>
            <!-- Add options here -->
          </select>
        </div>
        <div class="form-group">
          <label for="letter-quantity">Letter Quantity</label>
          <select class="form-control" id="letter-quantity">
            <option>Select an option</option>
            <!-- Add options here -->
          </select>
        </div>
        <div class="form-group">
          <label for="personalization">Add your personalization</label>
          <input type="text" class="form-control" id="personalization" placeholder="Enter the letter or name you want on your necklace">   <span id="shopNameError" class="error-message"></span>
          <small id="personalizationHelp" class="form-text text-muted">Example: Mama</small>
        </div>
        <br>
        <button class="button">Add to cart</button>
      </form>
    </div>
  </div>
</div>



<?php include('includes/footer.php'); ?>