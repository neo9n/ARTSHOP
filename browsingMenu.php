<?php
$page_title = "Browsing Menu";
?>

<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-3">
            <!-- Sidebar with categories and filters -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Categories</h5>
                    <ul class="list-group">
                        <?php
                        require "connection.php";
                        $sql = "SELECT * FROM itemcategories";
                        $result = Database::search($sql);
                        echo "<ul class='list-group'>";
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<li class='list-group-item'>" . $row["name"] . "</a></li>";
                            }
                        } else {
                            echo "<li class='list-group-item'>No data available</li>";
                        }
                        echo "</ul>";
                        Database::close();
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">
    <!-- Product listings -->
    <div class="row">
        <?php
        $sql = "SELECT * FROM itempics INNER JOIN `item` ON `itempics`.`item_id`=`item`.`id`";
        $result = Database::search($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='col-md-4 mb-4'>";
                echo "<div class='card border-0 shadow'>";
                echo "<img src='" . $row["location"] . "' class='card-img-top rounded' alt='Product Image'>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>" . $row["Name"] . "</h5>";
                echo "<p class='card-text'>" . $row["Description"] . "</p>";
                echo "<a href='#' class='btn btn-primary'>View Product</a>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "<div class='col-12'><p>No data available</p></div>";
        }
        Database::close();
        ?>
    </div>
    <!-- Repeat product card for each product -->
</div>
    </div>
</div>
</div>

<?php include('includes/footer.php'); ?>