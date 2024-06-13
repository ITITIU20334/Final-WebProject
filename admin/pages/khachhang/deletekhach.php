<?php
    include '../../config/config.php';
    

    $id = $_GET['id']??'';
    

    if($id != '')
{
    $sql = ("DELETE FROM users WHERE id = ? ");
    $stm = $conn->prepare($sql);
    $stm->execute([$id]);
}
header('location: ../khachhang_list.php');


?>