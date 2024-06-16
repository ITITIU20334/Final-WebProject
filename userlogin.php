<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Các CSS tùy chỉnh có thể được thêm vào đây -->
     <style>
        .success{
  color: green;
  font-weight: bold;
}
     </style>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Login
                </div>
                <div class="card-body">
                     <?php
                    if (isset($_SESSION['thanhcong'])) {
                        echo '<div class = "success">' . $_SESSION['thanhcong'] . '</div>';
                        unset($_SESSION['thanhcong']); 
                    }
                    elseif (isset($_SESSION['login_er'])){ 
                        echo '<div class="alert alert-danger" role="alert"> Wrong Username or Password. Please check! </div>';
                        unset($_SESSION['login_er']);
                    }
                    ?>
                    <form action="dangnhap.php" method="post">
                        <div class="mb-3">
                            <label for="name" class="form-label">Username</label>
                            <input type="text" name="name" class="form-control" id="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password" required>
                        </div>
                        <button type="submit" name="login" class="btn btn-primary">Login</button>
                        <a href="dangky.php" class="btn btn-primary">Register</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>