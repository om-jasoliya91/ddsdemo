<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register User</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">

            <div class="card shadow">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Register User</h4>
                </div>

                <div class="card-body">

                    <form id="addUserForm" method="POST">

                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter name">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter email">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter password">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Hobbies</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="hobby[]" value="Cricket">
                                <label class="form-check-label">Cricket</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="hobby[]" value="Music">
                                <label class="form-check-label">Music</label>
                            </div>
                            <div class="mb-3">
                            <label class="form-label">Current Profile Image</label><br>
                            <img id="oldProfileImg" src="" width="80" height="80" class="rounded mb-2"
                                style="display:none; object-fit: cover;">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Profile Image</label>
                                <input type="file" name="profile" class="form-control">
                            </div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success">
                                Register
                            </button>
                            <p class="mt-3 text-center">Do you have already account? <a href="views/login.php">Login here</a></p>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="/demo/public/js/register.js"></script>

</body>
</html>
