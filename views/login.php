<?php
require '../config/constant.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
          <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white text-center">
                        <h4>Login User</h4>
                    </div>
                    <div class="card-body">
                        <form id="loginForm" method="POST">

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Enter email">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Enter
                                    password">
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-success">
                                    Login
                                </button>
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