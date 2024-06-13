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
      
        $productExists = false;
        foreach ($_SESSION['cart'] as $key => $product) {
            if ($product['id'] == $row['id']) {
              
                $_SESSION['cart'][$key]['quantity']++;
                $_SESSION['cart'][$key]['price']+= $product['price'];
                $productExists = true;
                break;
            }
        }
        if (!$productExists) {
           
            $_SESSION['cart'][] = array(
                'id' => $row['id'],
                'model' => $row['model'],
                'hinh' => $row['image'],
                'price' => $row['price'],
                'quantity' => 1 
            );
        }
    }
    header('Location: index.php');
    exit;
}
?>
