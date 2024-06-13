<?php
include "../../config/config.php";

$name = $_POST['Name'];
if($name != '')
{
    $sql = ("INSERT INTO categories(name) values(?)");
    $stm = $conn->prepare($sql);
    $stm->execute([$name]);
}
header('location: ../category_list.php');
?>