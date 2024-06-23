<?php
session_start();
$page_title = "Add Users"
?>
<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>



<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6    ">
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
                        <h1 class="headings">Add a new User</h1>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label>User Name</label>
                            <input type="text" name="name" id="uname" class="form-control">
                        </div>    
                        <div class="form-group mb-3">
                            <label>First Name</label>
                            <input type="text" name="name" id="fname" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label>Last Name</label>
                            <input type="text" name="name" id="lname" class="form-control">
                        </div>                    
                        <div class="form-group mb-3">
                            <label>Mobile Number</label>
                            <input type="text" name="mobile" id="mobile" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label>Email</label>
                            <input type="text" name="email" id="email" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label>Password</label>
                            <input type="password" name="pw" id="pw" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label>Confirm Password</label>
                            <input type="password" name="cpw" id="cpw" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label>Gender</label>
                            <select class="form-select" id="gender">

                                <?php

                                require "connection.php";

                                $resultset = Database::search("SELECT * FROM `gender`");
                                $n = $resultset->num_rows;

                                for ($x = 0; $x < $n; $x++) {
                                    $f = $resultset->fetch_assoc();
                                ?>

                                    <option value="<?php echo $f["id"]; ?>"><?php echo $f["type"]; ?></option>

                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <button onclick="addUser();" class="button alternative">Sign In</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>