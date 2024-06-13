<?php
session_start();
include "admin/config/config.php";

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE id = $product_id";
    $sanpham = $conn->query($sql);


   foreach($sanpham as $row){
        $_SESSION['cart'][] = array(
            'id' => $row['id'],
            'model' => $row['model'],
            'hinh' => $row['image'],
            'price' => $row['price']
        );
    }
    header('Location: index.php');
    exit;
}
?>
