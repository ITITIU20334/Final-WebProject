<?php
session_start();

// Hủy session và chuyển hướng về trang đăng nhập
session_destroy();
header('Location: ../index.php');
exit;
?>
