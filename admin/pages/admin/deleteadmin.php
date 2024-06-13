<?php
    include '../../config/config.php';
    

    $id = $_GET['id']??'';
    

    if($id != '')
{
    $sql = ("DELETE FROM admins WHERE id = ? ");
    $stm = $conn->prepare($sql);
    $stm->execute([$id]);
}
header('location: ../showadmin.php');


?>