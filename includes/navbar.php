<section class="bg-light m-0 p-0 d-flex justify-content-center container-fluid">
    <nav class="navbar bg-light navbar-expand-lg navbar-light">
        <a href="index.php">
            <img src="icons/logoSVG.svg" alt="Logo" class="logo" title="Logo">
        </a>
        <a class="navbar-brand brand-name" href="#">Artisan Alley</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <div class="input-group mb-3 ">
                        <input type="text" class="form-control d-flex" placeholder="Search for Items" aria-label="Search" aria-describedby="button-addon2">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2">Search</button>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="fav.php">
                        <img src="icons/heart.svg" alt="Favorites">
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#">
                        <img src="icons/bell.svg" alt="Notifications">
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="addShop.php">
                        <img src="icons/seller.svg" alt="Shop Management">
                    </a>
                    <div class="dropdown dropdown">
                        <div class="dropdown-content">
                            <a href="#">Add My Store</a>
                            <a href="#">Manage My Store</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#">
                        <img src="icons/profile-1336-svgrepo-com.svg" alt="Profile">
                    </a>
                    <div class="dropdown dropdown">
                        <div class="dropdown-content">
                            <a href="#">Messages</a>
                            <a href="#">Special Offers</a>
                            <?php
                            if (isset($_SESSION['name'])) {
                                echo ('<a href="login.php">Sign Out</a>');
                            } else {
                                echo ('<a href="register.php">Register</a>');
                            }
                            ?>
                        </div>
                    </div>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Messages</a>
                        <a class="dropdown-item" href="#">Special Offers</a>
                        <a class="dropdown-item" href="register.php">Register</a>
                        <a class="dropdown-item" href="login.php">Sign Out</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cart.php">
                        <img src="icons/cart.svg" alt="Cart">
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</section>