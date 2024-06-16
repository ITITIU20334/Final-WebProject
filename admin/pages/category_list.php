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
            $cate = $conn -> query("SELECT * FROM categories ");
            $cate->execute();
            $countCate = $cate->fetchAll(PDO::FETCH_ASSOC);


            $demsanpham = $conn -> query("SELECT categories.id , COUNT(products.id)as soluong FROM categories  LEFT JOIN products ON categories.id = products.category_id GROUP BY categories.name");
            $demsanpham->execute();
            $count = $demsanpham->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <?php
            include 'category/categoryadd.php'
        ?>
             <table class="table">
            <thead>
                <tr>
                <th scope="col">id</th>
                <th scope="col">name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($countCate as $r){
                     ?>
                <tr>
                <td><?php echo $r['id'] ?></td>
                <td><?php echo $r['name'] ?></td>
                <td>
                <?php
                $flag = false;
                    foreach($count as $dem)
                    {
                    if(in_array($dem['id'], $r))
                    {
                        echo $dem['soluong'];
                        $flag = true;
                    }
                }
            
                if($flag == false)
                {
                    echo '0';
                }
                ?>
                </td>
                <td><a href="category/formcate.php?id= <?php echo $r['id'] ?>"><button>Edit</button></a> <button onclick="confirmDelete()">Delete</button></td>
                <?php } ?>
            </tbody>
            </table>
       

    </main>
    <script>
        function confirmDelete() {
            var confirmDelete = confirm('Do you want to delete?');
            if (confirmDelete) {
                window.location.href = 'category/deleteCate.php?id=<?php echo $r['id'] ?>';
            }
        }
    </script>
    <script src="../js/script.js"></script>
    <script src="../js/bootstrap.bundle.js"></script>
    <script src="https://kit.fontawesome.com/fcb77e7e44.js" crossorigin="anonymous"></script>
</body>
</html>