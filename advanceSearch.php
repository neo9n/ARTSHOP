<?php
$page_title = "Advanced search";
?>

<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>

<div class="container mt-5">
  <h2>Advanced Search</h2>
  <form id="search-form">
    <div class="row mb-3">
      <div class="col-md-6">
        <label for="keyword" class="form-label">Search Keywords</label>
        <input type="text" class="form-control" id="keyword" name="keyword" placeholder="Enter keywords">
      </div>
    </div>
    <div class="row">
      <div class="col-md-4 mb-3">
        <label for="category" class="form-label">Category</label>
        <select class="form-select" id="category" name="category">
          <option value="">All Categories</option>
          <option value="clothing">Clothing</option>
          <option value="electronics">Electronics</option>
          </select>
      </div>
      <div class="col-md-4 mb-3">
        <label for="brand" class="form-label">Brand</label>
        <select class="form-select" id="brand" name="brand">
          <option value="">All Brands</option>
          <option value="brand1">Brand 1</option>
          <option value="brand2">Brand 2</option>
          </select>
      </div>
      <div class="col-md-4 mb-3">
        <label for="price-range" class="form-label">Price Range</label>
        <select class="form-select" id="price-range" name="price-range">
          <option value="">All Prices</option>
          <option value="0-50">Under $50</option>
          <option value="50-100">$50 - $100</option>
          </select>
      </div>
    </div>
    <div class="row mb-3">
      <div class="col-md-12">
        <label for="filter-options" class="form-label">Additional Filters</label>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="color-red" name="color[]" value="red">
          <label class="form-check-label" for="color-red">Red</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="color-blue" name="color[]" value="blue">
          <label class="form-check-label" for="color-blue">Blue</label>
        </div>
        </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <button type="submit" class="btn btn-primary">Search</button>
        <button type="button" class="btn btn-light" onclick="clearFilters()">Clear All</button>
      </div>
    </div>
  </form>
</div>


<?php include('includes/advertisement.php'); ?>
<?php include('includes/footer.php'); ?>
