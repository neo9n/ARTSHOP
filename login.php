<?php
session_start();
$page_title = "Sign In"
?>
<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header">
                        <h1 class="headings">Log In &</h1>
                        <h5>Before you Set the stage for your shopping adventure</h5>
                    </div>
                    <div class="card-body">

                        <div class="form-group mb-3">
                            <label>Email</label>
                            <input type="text" name="email" id="email" class="form-control"> <span id="shopNameError" class="error-message"></span>
                        </div>
                        <div class="form-group mb-3">
                            <label>Password</label>
                            <input type="password" name="pw" id="pw" class="form-control">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="rememberMe">
                            <label class="form-check-lable">Remember Me</label>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group col-6">
                                <button onclick="signIn();" class="button alternative">Log In</button>
                            </div>
                            <div class="form-group col-6 justify-content-end align-items-center d-flex">
                                <a href="register.php" class="text-decoration-none align-content-center">Don't have an Account yet?</a>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>