<?php
session_start();
include "admin/config/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['name'];
    $password = md5($_POST['password']);
    
    $sql = "SELECT * FROM users  WHERE username = :username AND mypassword = :password";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    // Sử dụng phương thức rowCount để đếm số hàng trả về
    $row_count = $stmt->rowCount();

    if ($row_count == 1) {
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username;
        header("location: index.php");
        exit();
    } else {
        echo "Đăng nhập không thành công. Vui lòng kiểm tra lại thông tin đăng nhập.";
    }
}
?>
