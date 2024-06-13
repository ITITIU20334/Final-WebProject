<?php 
 include "../../config/config.php";
 
 $name = $_POST['email'];
 $us = $_POST['username'];
 $pw = md5( $_POST['password']);
 if($name != '' && $us !='' && $pw != '')
 {
     $sql = ("INSERT INTO users(email, username, mypassword) values(?,?,?)");
     $stm = $conn->prepare($sql);
     $stm->execute([$name, $us, $pw]);
 }
 header('location: ../khachhang_list.php');
 ?>
