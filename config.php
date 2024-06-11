
<?php 
const HOST='localhost';
const USERNAME='root';
const PASSWORD= '';
const DBNAME= 'laptop_store';
$conn = new PDO('mysql:host='.HOST.';dbname='.DBNAME,USERNAME,PASSWORD);
$conn->query('set names utf8');


//if(isset ($conn))
//{
 //   echo "thanh cong";
//}