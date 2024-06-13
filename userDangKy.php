<?php
session_start();
include "admin/config/config.php";
$email = $_POST['email'];
$username = $_POST['username'];
$mypassword =md5( $_POST['mypassword']);

if($email != '' && $username !='' && $mypassword != '')
{
    $sql = ("INSERT INTO users(email, username, mypassword) values(?,?,?)");
    $stm = $conn->prepare($sql);
    $stm->execute([$email, $username, $mypassword]);
    $_SESSION['thanhcong'] = true;
    header("location: userlogin.php");
    exit();
}
?>