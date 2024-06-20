<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>

<section class="container-fluid bg-dark text-light p-5 m-0">
    <div class="row">
        <h1 class="mb-2">Admin Login</h1>
    </div>
</section>
<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="alert">
                    <?php
                    if (isset($_SESSION['status'])) {
                        echo "<h4>" . $_SESSION['status'] . "</h4>";
                        unset($_SESSION['status']);
                    }
                    ?>
                </div>
                <div class="card shadow">
                    <div class="card-header">
                        <h1 class="headings">Admin Login</h1>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control mb-3" placeholder="Username" id="email" >
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                </div>
                                <input type="password" class="form-control mb-3" placeholder="Password" id="password">
                            </div>
                        </div>
                        <button class="button" onclick="adminLogin();">Log In</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include('includes/advertisement.php'); ?>
<?php include('includes/footer.php'); ?>