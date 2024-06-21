<?php
$page_title = "AdminPanel";
?>

<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>

<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Add User</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="addUserForm" method="POST" action="add_user.php">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="user-details-tab" data-toggle="tab" href="#user-details" role="tab" aria-controls="user-details" aria-selected="true">User Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="permissions-tab" data-toggle="tab" href="#permissions" role="tab" aria-controls="permissions" aria-selected="false">Permissions</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="user-details" role="tabpanel" aria-labelledby="user-details-tab">
                        <div class="form-group mt-3">
                            <label for="firstName">First name</label>
                            <input type="text" class="form-control" id="firstName" name="firstName" required>
                        </div>
                        <div class="form-group">
                            <label for="lastName">Last name</label>
                            <input type="text" class="form-control" id="lastName" name="lastName" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email address (Username)</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone number</label>
                            <input type="tel" class="form-control" id="phone" name="phone" required>
                        </div>
                        <div class="form-group">
                            <label for="userGroup">User group</label>
                            <select class="form-control" id="userGroup" name="userGroup" required>
                                <option value="">Select a group</option>
                                <option value="Europe">Europe</option>
                                <option value="Asia">Asia</option>
                                <option value="America">America</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="accessLevel">Access</label>
                            <select class="form-control" id="accessLevel" name="accessLevel" required>
                                <option value="Administrator">Administrator</option>
                                <option value="User">User</option>
                                <option value="Focused User">Focused User</option>
                            </select>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="permissions" role="tabpanel" aria-labelledby="permissions-tab">
                        <!-- Permissions content goes here -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Next</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include('includes/advertisement.php'); ?>
<?php include('includes/footer.php'); ?>
