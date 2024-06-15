<?php
$page_title = "Market Management"
?>

<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>

<header class="header">
    <div class="marketmBOX">
        <h1 class="brand">Shop Manager</h1>
        <div class="greeting">
            <h2>Good afternoon, Hanna Lisa</h2>
        </div>
        <div class="balance">
            <h3>Available for deposit: £0.00</h3>
        </div>
    </div>
</header>

<main class="container py-6">
    <div class="row">

        <div class="col-md-4">
            <nav class="sidebar">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <input type="text" class="form-control search-box" placeholder="search" />
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
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
                            <i class="fas fa-money-bill-alt"></i> Finances
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-bullhorn"></i> Marketing
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-users"></i> Community & Help
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-cog"></i> Settings
                        </a>
                    </li>
                </ul>
            </nav>
        </div>


        <div class="col-md-8">
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
            <div class="stats-section">
                    <div class="stat-card">
                        <h3>Views</h3>
                        <p>410</p>
                        <p>+30 Compared to previous seven days</p>
                        <p>-25 Compared to last year</p>
                    </div>
                    <div class="stat-card">
                        <h3>Favorites</h3>
                        <p>150</p>
                        <p>+20 Compared to previous seven days</p>
                        <p>+15 Compared to last year</p>
                    </div>
                    <div class="stat-card">
                        <h3>Orders</h3>
                        <p>12</p>
                        <p>-2 Compared to previous seven days</p>
                        <p>-5 Compared to last year</p>
                    </div>
                    <div class="stat-card">
                        <h3>Revenue</h3>
                        <p>$550.00</p>
                        <p>+20 Compared to previous seven days</p>
                        <p>+50 Compared to last year</p>
                    </div>
                </div>
        </div>

    </div>
</main>




<?php include('includes/footer.php'); ?>