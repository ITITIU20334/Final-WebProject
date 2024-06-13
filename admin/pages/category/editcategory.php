<?php
    include '../../config/config.php';
    

    $id = $_POST['id'];
    $name = $_POST['name'];
    

    if($name != '')
{
    $sql = ("UPDATE categories SET name = ? where id = ? ");
    $stm = $conn->prepare($sql);
    $stm->execute([$name, $id]);
}
header('location:../category_list.php');


?>