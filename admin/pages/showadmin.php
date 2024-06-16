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


            $stm = $conn -> query("SELECT * FROM `admins`");
            $stm->execute();
            $data = $stm->fetchAll(PDO::FETCH_ASSOC);

      
   
        ?>
        <?php include 'admin/addadmin.php' ?>
        
             <table class="table">
            <thead>
                <tr>
                <th scope="col">id</th>
                <th scope="col">email</th>
                <th scope="col">username</th>
                <th scope="col">password</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data as $r){
                     ?>
                <tr>
                <td><?php echo $r['id'] ?></td>
                <td><?php echo $r['email'] ?></td>
                <td><?php echo $r['adminname'] ?></td>
                <td><?php echo $r['mypassword'] ?></td>
                <td><button onclick="confirmDelete()">Delete</button></td>
                <?php } ?>
            </tbody>
            </table>
       

    </main>
    <script>
        function confirmDelete() {
            var confirmDelete = confirm('Do you want to delete?');
            if (confirmDelete) {
                window.location.href = 'admin/deleteadmin.php?id=<?php echo $r['id'] ?>';
            }
        }
    </script>

    <script src="../js/script.js"></script>
    <script src="../js/bootstrap.bundle.js"></script>
    <script src="https://kit.fontawesome.com/fcb77e7e44.js" crossorigin="anonymous"></script>
</body>
</html>