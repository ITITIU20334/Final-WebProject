<?php
session_start();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: ../index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <title>Document</title>
</head>
<body class="bg-content">
    <main class="dashboard d-flex">
        <!-- start sidebar -->

        <?php 
            include "include/sidebar.php";
            include '../config/config.php';
            $cate = $conn -> query("SELECT * FROM categories");
            $countCate = $cate->rowCount();
            $sanpham = $conn ->query("SELECT * FROM products");
            $countLaptop = $sanpham->rowCount();
            $khachahng = $conn ->query("SELECT * FROM users");
            $countUser = $khachahng->rowCount();
            $bill = $conn ->query("SELECT * FROM bills");
            $countbills = $bill->rowCount();
          


        ?>
        <!-- end sidebar -->
                <!-- start content page -->
                <div class="container-fluid px">
        <?php 
            include "include/header.php";
        ?>
            <div class="cards row gap-3 justify-content-center mt-5">
                <div class=" card__items card__items--blue col-md-3 position-relative">
                    <div class="card__students d-flex flex-column gap-2 mt-3">
                    <i class="fa-solid fa-list h3"></i>
                        <span>Type of Products</span>
                    </div>
                    <div class="card__nbr-students">
                        <span class="h5 fw-bold nbr"><?php echo $countCate; ?></span>
                    </div>
                </div>

                <div class=" card__items card__items--rose col-md-3 position-relative">
                    <div class="card__Course d-flex flex-column gap-2 mt-3">
                        <i class="fa-solid fa-laptop h3"></i>
                        <span>Products</span>
                    </div>
                    <div class="card__nbr-course">
                         <span class="h5 fw-bold nbr"><?php echo $countLaptop ?></span>
                    </div>
                </div>

                <div class=" card__items card__items--yellow col-md-3 position-relative">
                    <div class="card__payments d-flex flex-column gap-2 mt-3">
                        <i class="fal fa-usd-square h3"></i>
                        <span>Bills</span>
                    </div>
                    <div class="card__payments">
                        <span class="h5 fw-bold nbr"><?php echo $countbills ?></span>
                    </div>
                </div>

                <div class="card__items card__items--gradient col-md-3 position-relative">
                    <div class="card__users d-flex flex-column gap-2 mt-3">
                        <i class="fa-solid fa-user h3"></i>
                        <span>Customers</span>
                    </div>
                    <span class="h5 fw-bold nbr"><?php echo $countUser ?></span>
                </div>
            </div>

        </div>
        <!-- end contentpage -->
    </main>
    <script src="../js/script.js"></script>
    <script src="/js/bootstrap.bundle.js"></script>
    <script src="https://kit.fontawesome.com/fcb77e7e44.js" crossorigin="anonymous"></script>
</body>
</html>