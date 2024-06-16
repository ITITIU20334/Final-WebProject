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
            ?>
        <!-- end sidebar -->
                <!-- start content page -->
                <div class="container-fluid px">
        <?php 
            include "include/header.php";
            $cate = $conn -> query("SELECT * FROM bills ");
            $cate->execute();
            $countbills= $cate->fetchAll(PDO::FETCH_ASSOC);

        ?>
        <?php
            include 'category/categoryadd.php'
        ?>
             <table class="table">
            <thead>
                <tr>
                <th scope="col">Bills_ID</th>
                <th scope="col">User_ID</th>
                <th scope="col">Name</th>
                <th scope="col">Total_Price</th>
                <th scope="col">Address</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($countbills as $r){
                     ?>
                <tr>
                <td><?php echo $r['bills_id'] ?></td>
                <td><?php echo $r['user_id'] ?></td>
                <td><?php echo $r['name'] ?></td>
                <td><?php echo $r['total_price'] ?></td>
                <td><?php echo $r['address'] ?></td>
                <td><?php echo $r['phone'] ?></td>
                <td><?php echo $r['email'] ?></td>
                <td><button onclick="confirmDelete()">Delete</button></td>
                <?php } ?>
            </tbody>
            </table>
       

    </main>
    <script>
        function confirmDelete() {
            var confirmDelete = confirm('Do you want to delete?');
            if (confirmDelete) {
                window.location.href = 'bill/deletebill.php?id=<?php echo $r['bills_id'] ?>';
            }
        }
    </script>
    <script src="../js/script.js"></script>
    <script src="../js/bootstrap.bundle.js"></script>
    <script src="https://kit.fontawesome.com/fcb77e7e44.js" crossorigin="anonymous"></script>
</body>
</html>