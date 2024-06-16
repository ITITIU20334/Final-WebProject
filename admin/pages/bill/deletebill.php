<?php
    include '../../config/config.php';
    

    $id = $_GET['id']??'';
    

    if($id != '')
{
    $sql1 = ("DELETE FROM detail_bill WHERE id_bills = ? ");
    $stm1 = $conn->prepare($sql1);
    $stm1->execute([$id]);

    $sql = ("DELETE FROM bills WHERE bills_id = ? ");
    $stm = $conn->prepare($sql);
    $stm->execute([$id]);
}
header('location: ../bill_list.php');


?>