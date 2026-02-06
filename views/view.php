<?php
require '../config/constant.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>User List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>

<body>

    <h2 class="text-primary text-center mt-5">All Users</h2>
    <div class="container my-5">

        <table class="table table-borderd table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Hobby</th>
                    <th>Profile</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="userTable"></tbody>
        </table>

        <div class="modal fade" id="editModal" tabindex="-1">
            <div class="modal-dialog">
                <form id="updateForm" enctype="multipart/form-data">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title">Update User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">
                            <input type="hidden" name="id" id="edit_id">

                            <div class="mb-2">
                                <label>Name</label>
                                <input type="text" name="name" id="edit_name" class="form-control">
                            </div>

                            <div class="mb-2">
                                <label>Email</label>
                                <input type="email" name="email" id="edit_email" class="form-control">
                            </div>
                            <div class="mb-2">
                                <label>Hobbies</label><br>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="hobby[]" value="Cricket" id="hobby_cricket">
                                    <label class="form-check-label" for="hobby_cricket">Cricket</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="hobby[]" value="Music" id="hobby_music">
                                    <label class="form-check-label" for="hobby_music">Music</label>
                                </div>

                            </div>
                            <div class="mb-2">
                                <label>Current Profile Image</label><br>
                                <img id="oldProfileImg"
                                    src=""
                                    width="80"
                                    height="80"
                                    class="rounded mb-2"
                                    style="display:none; object-fit:cover;">
                            </div>

                            <div class="mb-2">
                                <label>Profile Image</label>
                                <input type="file" name="profile" class="form-control">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>


    </div>


    <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/demo/public/js/register.js"></script>
</body>

</html>