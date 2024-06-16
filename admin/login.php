<?php
session_start();
include "config/config.php";

if(isset($_POST['login'])) {
    $name = $_POST['name'];
    $password = md5($_POST['password']);

    $query = "SELECT * FROM admins WHERE adminname=:name AND mypassword=:password";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    if ($stmt->rowCount() == 1) {
        $_SESSION['admin_logged_in'] = true;
        header("Location: pages/dashboard.php");
        exit();
    } else {
        echo "Account or Password Wrong!";
    }
}

$conn = null;
?>