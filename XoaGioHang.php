<?php
session_start();

if (isset($_GET['key'])) {
    $key = $_GET['key'];
    // Xóa sản phẩm khỏi giỏ hàng dựa trên key
    unset($_SESSION['cart'][$key]);
}

header('Location: index.php');
exit;
?>
