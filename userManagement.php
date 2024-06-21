
<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>User Management</h1>
        <button class="btn btn-primary" data-toggle="modal" data-target="#addUserModal">+ Add User</button>
    </div>

    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search Name" id="searchUser">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button" id="button-addon2">Search</button>
        </div>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Profile</th>
                <th>Project Access</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Example User Row -->
            <tr>
                <td>Natalie Peter</td>
                <td>Superadmin</td>
                <td>All projects</td>
                <td><span class="badge badge-success">Active</span></td>
                <td>
                    <button class="btn btn-warning btn-sm">Edit</button>
                    <button class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
            <!-- More user rows here -->
        </tbody>
    </table>
</div>

<!-- Add User Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUserModalLabel">Add New User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="userName">Name</label>
                        <input type="text" class="form-control" id="userName" required>
                    </div>
                    <div class="form-group">
                        <label for="userEmail">Email</label>
                        <input type="email" class="form-control" id="userEmail" required>
                    </div>
                    <div class="form-group">
                        <label for="userRole">Role</label>
                        <select class="form-control" id="userRole" required>
                            <option>Superadmin</option>
                            <option>Admin</option>
                            <option>Tester</option>
                            <option>Viewer</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="userStatus">Status</label>
                        <select class="form-control" id="userStatus" required>
                            <option>Active</option>
                            <option>Pending</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Add User</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('includes/advertisement.php'); ?>
<?php include('includes/footer.php'); ?>
