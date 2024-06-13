<?php
    include '../../config/config.php';
    

    $id = $_GET['id']??'';
    

    if($id != '')
{
    $sql = ("DELETE FROM categories WHERE id = ? ");
    $stm = $conn->prepare($sql);
    $stm->execute([$id]);
}
header('location: ../category_list.php');


?>