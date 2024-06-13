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


            $stm = $conn -> query("SELECT * FROM `products`");
            $stm->execute();
            $data = $stm->fetchAll(PDO::FETCH_ASSOC);

      
   
        ?>
        <a href="./product/productadd.php"><button>Them San Pham</button></a>
        
             <table class="table">
            <thead>
                <tr>
                <th scope="col">id</th>
                <th scope="col">name</th>
                <th scope="col">hinh</th>
                <th scope="col">gia</th>
                <th scope="col">ghi chu</th>
                <th scope="col">loai</th>
                <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data as $r){
                     ?>
                <tr>
                <td><?php echo $r['id'] ?></td>
                <td><?php echo $r['model'] ?></td>
                <td><img src="../asets/img/<?php echo $r['image'] ?>" alt="img" height="50" with="50"></td>
                <td><?php echo $r['price'] ?></td>
                <td><?php echo $r['description'] ?></td>
                    
                <td><?php echo $r['category_id'] ?></td>
                <td><a href="product/formproduct.php?id= <?php echo $r['id'] ?>"><button>Edit</button></a> <button onclick="confirmDelete()">Xóa</button></td>
                <?php } ?>
            </tbody>
            </table>
       

    </main>
    <script>
        function confirmDelete() {
            var confirmDelete = confirm('Bạn muốn xóa không?');
            if (confirmDelete) {
                window.location.href = 'product/deleteProduct.php?id=<?php echo $r['id'] ?>';
            }
        }
    </script>
    <script src="../js/script.js"></script>
    <script src="../js/bootstrap.bundle.js"></script>
    <script src="https://kit.fontawesome.com/fcb77e7e44.js" crossorigin="anonymous"></script>
</body>
</html>