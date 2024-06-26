<?php
session_start();
require "connection.php";

$id = intval($_GET['item-id']); 
$sql = "SELECT * FROM item WHERE id = $id";

$result = Database::search($sql);
echo "<ul class='list-group'>";
if ($result->num_rows > 0) {
    if ($row = $result->fetch_assoc()) {
        $page_title = $row["Name"];
    }
} 
Database::close();;
?>

<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>

<div class="container my-5">
  <div class="row">
    <div class="col-md-6">
      <img src="product-image.jpg" class="img-fluid" alt="Custom Two Name Handwriting Necklace">
    </div>
    <div class="col-md-6">
      <h1><?php echo $page_title; ?></h1>
      <p class="lead">18k gold, Personalized Jewelry, Name Necklace, Personalized Gift, Baby Shower, Custom Gifts for Her</p>
      <p class="font-weight-bold">USD 24.00 <del>USD 40.00</del> <span class="text-success">40% off</span></p>
      <p>In demand. 26 people bought this in the last 24 hours.</p>
      <p>Sale ends in 21:16:20</p>
      <p class="text-success">New markdown! Biggest sale in 60+ days</p>
      <form>
        <div class="form-group">
          <label for="color-size">Color/Size</label>
          <select class="form-control" id="color-size">
            <option selected>Select an option</option>
          </select>
        </div>
        <div class="form-group">
          <label for="pendant-counts">Pendant/Counts</label>
          <select class="form-control" id="pendant-counts">
            <option selected>Select an option</option>
          </select>
        </div>
        <div class="form-group">
          <label for="personalization">Add your personalization</label>
          <textarea class="form-control" id="personalization" rows="3" placeholder="Handmade with love and care ✨ Please write the name you want. Like: kate-olivia"></textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Buy it now</button>
        <button type="button" class="btn btn-outline-secondary btn-block">Add to cart</button>
      </form>
    </div>
  </div>
  <div class="row mt-5">
    <div class="col">
      <h2>Reviews</h2>
      <p>6,214 reviews ★★★★★</p>
      <p>I love these necklaces. So unique and beautiful! - Celly Jones</p>
    </div>
  </div>
</div>

<?php include('includes/advertisement.php'); ?>
<?php include('includes/footer.php'); ?>