<?php
$page_title = "Market Management";
?>
<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>

<style>
    /* Add any required styles here */
</style>

<header class="header py-4">
    <div class="container text-center">
        <h1 class="display-4">Shop Manager</h1>
        <div class="greeting my-3">
            <h2 class="h4">Good afternoon, Hanna Lisa</h2>
        </div>
        <div class="balance">
            <h3 class="h5">Available for deposit: £0.00</h3>
        </div>
    </div>
</header>

<main class="container">
    <div class="row">
        <div class="col-md-4">
            <nav class="sidebar p-3 rounded">
                <ul class="nav flex-column">
                    <li class="nav-item mb-3">
                        <input type="text" class="form-control search-box" placeholder="Search" />
                    </li>
                    <li class="nav-item">
                        <a href="#" onclick="changeTab('dash', event);" class="nav-link">
                            <i class="fas fa-home"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-list"></i> Listings
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-envelope"></i> Conversations
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-truck"></i> Orders & Shipping
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-chart-line"></i> Stats
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-users"></i> Community & Help
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="col-md-8" id="tab">

        </div>
    </div>
</main>

<section class="dash" id="dash">
    <div class="stats-section">
        <div class="stats-category">
            <h3>Orders</h3>
            <p>New: 0</p>
            <p>In progress: 0</p>
        </div>
        <div class="stats-category">
            <h3>Listings</h3>
            <p>Active listings: 0</p>
            <p>Expired: 0</p>
            <p>Sold out: 0</p>
        </div>
    </div>
    <div class="stats-section row">
        <div class="col-md-6 mb-4">
            <div class="stat-card">
                <h3>Views</h3>
                <p>410</p>
                <p class="text-success">+30 Compared to previous seven days</p>
                <p class="text-danger">-25 Compared to last year</p>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="stat-card">
                <h3>Favorites</h3>
                <p>150</p>
                <p class="text-success">+20 Compared to previous seven days</p>
                <p class="text-success">+15 Compared to last year</p>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="stat-card">
                <h3>Orders</h3>
                <p>12</p>
                <p class="text-danger">-2 Compared to previous seven days</p>
                <p class="text-danger">-5 Compared to last year</p>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="stat-card">
                <h3>Revenue</h3>
                <p>$550.00</p>
                <p class="text-success">+20 Compared to previous seven days</p>
                <p class="text-success">+50 Compared to last year</p>
            </div>
        </div>
    </div>
</section>

<?php include('includes/footer.php'); ?>