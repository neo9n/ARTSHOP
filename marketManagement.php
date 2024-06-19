<?php
$page_title = "Market Management";
?>

<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>

<section class="bg-black text-light p-5 text-sm-start">
    <div class="container-fluid">
        <div class="d-flex">
            <div class="header-text">
                <h1>Shop Management</h1>
            </div>
            <div class="text-end d-block side-text-header ms-auto">
                <h4>Shop Manager</h4><br>
                <h5 class="dashboard-list-sub-heading">Good afternoon, Hanna Lisa</h5><br>
                <h6 class="dashboard-list-sub-heading">Available for deposit: £0.00</h6>
            </div>
        </div>
    </div>
</section>

<section class="bg-black text-dark p-0 text-sm-start m-0">
    <div class="container-fluid  m-0 p-0">
        <div class="row d-flex m-0 p-0">
            <div class="roundBox rounded p-2 col-3 bg-black p-2">
                <nav class="rounded sidebar m-0">
                    <ul class="nav flex-column">
                        <li class="nav-item ">
                            <input type="text" class="form-control search-box dashboard-list dashboard-list-sub-heading" placeholder="Search" />
                        </li>
                        <li class="nav-item">
                            <a href="#" onclick="changeTab('dash', event);" class="nav-link dashboard-list">
                                <i class="fas fa-tachometer-alt"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" onclick="changeTab('listings', event);" class="nav-link dashboard-list">
                                <i class="fas"></i> Listings
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" onclick="changeTab('orders', event);" class="nav-link dashboard-list">
                                <i class="fas"></i> Orders & Shipping
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" onclick="changeTab('stats', event);" class="nav-link dashboard-list">
                                <i class="fas"></i> Stats
                            </a>
                        </li>
                        <li class="nav-item com">
                            <a href="guideline.php" class="nav-link dashboard-list">
                                <i class="fas"></i> Community & Help
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="roundBox rounded p-2 col-9 bg-black p-2">
                <div class="roundBox p-3 m-0 rounded m-0 bg-light">
                    <div id="tab" class="active-tab">


                        <section id="dash" class="bg-light text-black p-5 text-sm-start m-0 section" style="display: none;">
                            <div class="text-start mb-3">
                                <h2>Dashboard</h2>
                            </div>
                            <div class="row d-flex">
                                <div class="rounded col">
                                    <h3>Orders</h3>
                                    <p>New: 0</p>
                                    <p>In progress: 0</p>
                                    <p>Completed: 0</p>
                                    <p>Cancelled: 0</p>
                                </div>
                                <div class="col rounded">
                                    <div class="stat-card">
                                        <h3>Favorites</h3>
                                        <p>Total: 150</p>
                                        <p class="text-success">+20 Compared to previous seven days</p>
                                        <p class="text-success">+15 Compared to last year</p>
                                    </div>
                                    <div class="stat-card mt-4">
                                        <h3>Visitors</h3>
                                        <p>Total: 1200</p>
                                        <p class="text-success">+200 Compared to previous seven days</p>
                                        <p class="text-success">+300 Compared to last year</p>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section id="listings" class="bg-light text-black p-5 text-sm-start m-0 section" style="display: none;">
                            <div class="text-start mb-3">
                                <h2>Listings</h2>
                            </div>
                            <div class="row d-flex">
                                <div class="rounded col">
                                    <h3>Current Listings</h3>
                                    <p>Active listings: 0</p>
                                    <p>Expired: 0</p>
                                    <p>Sold out: 0</p>
                                    <p>Drafts: 0</p>
                                </div>
                                <div class="col rounded">
                                    <div class="stat-card">
                                        <h3>Listing Views</h3>
                                        <p>Total: 500</p>
                                        <p class="text-success">+50 Compared to previous seven days</p>
                                        <p class="text-success">+75 Compared to last year</p>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section id="orders" class="bg-light text-black p-5 text-sm-start m-0 section" style="display: none;">
                            <div class="text-start mb-3">
                                <h2>Orders</h2>
                            </div>
                            <div class="row d-flex">
                                <div class="rounded col">
                                    <h3>Order Status</h3>
                                    <p>New: 0</p>
                                    <p>In progress: 0</p>
                                    <p>Completed: 0</p>
                                    <p>Cancelled: 0</p>
                                </div>
                                <div class="col rounded">
                                    <div class="stat-card">
                                        <h3>Revenue</h3>
                                        <p>Total: $0.00</p>
                                        <p class="text-danger">-5% Compared to previous seven days</p>
                                        <p class="text-danger">-10% Compared to last year</p>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section id="stats" class="bg-light text-black p-5 text-sm-start m-0 section" style="display: none;">
                            <div class="text-start mb-3">
                                <h2>Statistics</h2>
                            </div>
                            <div class="row d-flex">
                                <div class="stat-card col">
                                    <h3>Orders</h3>
                                    <p>Total: 12</p>
                                    <p class="text-danger">-2 Compared to previous seven days</p>
                                    <p class="text-danger">-5 Compared to last year</p>
                                </div>
                                <div class="stat-card col">
                                    <h3>Revenue</h3>
                                    <p>Total: $1,200.00</p>
                                    <p class="text-danger">-2% Compared to previous seven days</p>
                                    <p class="text-danger">-5% Compared to last year</p>
                                </div>
                                <div class="stat-card col">
                                    <h3>Customer Satisfaction</h3>
                                    <p>Average Rating: 4.5</p>
                                    <p class="text-success">+0.1 Compared to previous seven days</p>
                                    <p class="text-success">+0.3 Compared to last year</p>
                                </div>
                            </div>
                        </section>


                        <section id="com" class="bg-light text-black p-5 text-sm-start m-0 section" style="display: none;">

                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php include('includes/advertisement.php'); ?>
<?php include('includes/footer.php'); ?>
