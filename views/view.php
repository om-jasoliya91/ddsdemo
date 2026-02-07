    <?php
    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }
    require '../config/constant.php';
    require '../config/auth.php';
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>User List</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
        <!-- datatable css -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">
    </head>

    <body>
    <nav class="navbar navbar-dark bg-dark px-4">
        <span class="navbar-brand mb-0 h4">User Management</span>
        <button id="logoutBtn" class="btn btn-danger btn-sm">
            Logout
        </button>
    </nav>

    <div class="container mt-4">

        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">All Users</h5>
            </div>

            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle" id="userTable">  
                        <thead class="table-dark text-center">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Hobby</th>
                                <th>Profile</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                    </table>
                </div>

            </div>
        </div>

    </div>

    <div class="modal fade" id="editModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <form id="updateForm" enctype="multipart/form-data" class="modal-content">

                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Update User</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <input type="hidden" name="id" id="edit_id">

                    <div class="mb-2">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" id="edit_name" class="form-control">
                    </div>

                    <div class="mb-2">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" id="edit_email" class="form-control">
                    </div>

                    <div class="mb-2">
                        <label class="form-label">Hobbies</label><br>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="hobby[]" value="Cricket">
                            <label class="form-check-label">Cricket</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="hobby[]" value="Music">
                            <label class="form-check-label">Music</label>
                        </div>
                    </div>

                    <div class="mb-2">
                        <label class="form-label">Current Profile</label><br>
                        <img id="oldProfileImg"
                            width="80"
                            height="80"
                            class="rounded mb-2"
                            style="display:none; object-fit:cover;">
                    </div>

                    <div class="mb-2">
                        <label class="form-label">Profile Image</label>
                        <input type="file" name="profile" class="form-control">
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">
                        Update
                    </button>
                </div>

            </form>
        </div>
    </div>


        </div>


        <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- datatable js -->
        <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
        <script src="/demo/public/js/register.js"></script>
    </body>

    </html>