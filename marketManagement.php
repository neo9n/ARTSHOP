<?php
$page_title = "Store Management";
require 'connection.php';
?>

<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>


<div class="container-fluid">
  <div class="row">
    <!-- Sidebar -->
    <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="#">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file"></span>
              Products
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="shopping-cart"></span>
              Orders
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="users"></span>
              Customers
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="bar-chart-2"></span>
              Reports
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="layers"></span>
              Integrations
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <!-- Main Content -->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button>
        </div>
      </div>

      <!-- Table -->
      <h2>Products</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Category</th>
              <th>Price</th>
              <th>Stock</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>

            <?php
            $items_rs = Database::search("SELECT `item`.`Name`,`itemcategories`.`name`, `item`.`price`,`item`.`id`, `item`.`quantity` FROM `item` INNER JOIN `itemcategories` ON `item`.`itemCategories_id`=`itemcategories`.`id` WHERE `item`.`status_id`='1'");
            $items_num = $items_rs->num_rows;

            for ($i = 0; $i < $items_num; $i++) {
              $items_data = $items_rs->fetch_assoc();
            ?>
              <tr>
                <td><?php echo $items_data["id"] ?></td>
                <td><?php echo $items_data["Name"]; ?></td>
                <td><?php echo $items_data["name"]; ?></td>
                <td>$ <input id="p" type="number" value="<?php echo $items_data["price"]; ?>"></td>
                <td><input id="q" type="number" value="<?php echo $items_data["quantity"]; ?>"></td>
                <td>
                  <button type="button" class="btn btn-primary btn-sm" onclick="itemsDetails(<?php echo $items_data['id']; ?>);">Save</button>
                  <button type="button" class="btn btn-danger btn-sm" onclick="itemDelete(<?php echo $items_data['id']; ?>)">Delete</button>
                </td>
              </tr>
            <?php
            }
            ?>
            <!-- More rows as needed -->
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>

<script src="scripts/script.js"></script>