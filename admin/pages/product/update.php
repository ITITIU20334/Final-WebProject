<?php
include '../../config/config.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id']; 
    $name = $_POST['name'];
    $gia = $_POST['gia'];
    $ghichu = $_POST['ghichu'];
    $loai = $_POST['loai'];


    if ($_FILES['img']['size'] > 0) {
        $img_name = $_FILES['img']['name'];
        $img_tmp = $_FILES['img']['tmp_name'];
        $img_destination = "../../assets/img" . $img_name;


        move_uploaded_file($img_tmp, $img_destination);

        $stmt = $conn->prepare("UPDATE products SET `model`=?, `image`=?, `price`=?, `description`=?, `category_id`=? WHERE `id`=?");
        $stmt->execute([$name, $img_destination, $gia, $ghichu, $loai, $id]);
    } else {

        $stmt = $conn->prepare("UPDATE products SET `model`=?, `price`=?, `description`=?, `category_id`=? WHERE `id`=?");
        $stmt->execute([$name, $gia, $ghichu, $loai, $id]);
    }


    if ($stmt) {
        echo "The product has been updated!";
    } else {
        echo "An error occurred while adding a product!";
    }
}

header('location: ../product_list.php');
?>