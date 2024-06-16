<?php
    include '../../config/config.php';

    if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        $gia = $_POST['gia'];
        $ghichu = $_POST['ghichu'];
        $loai = $_POST['loai'];

        // Xử lý file ảnh
        $img_name = $_FILES['img']['name'];
        $img_tmp = $_FILES['img']['tmp_name'];
        $img_destination = "../../assets/img" . $img_name;

        // Di chuyển ảnh vào thư mục img
        move_uploaded_file($img_tmp, $img_destination);

        // Tiến hành thêm dữ liệu vào cơ sở dữ liệu
        $stmt = $conn->prepare("INSERT INTO products ( `model`, `image`, `price`, `description`, `category_id`) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$name, $img_destination, $gia, $ghichu, $loai]);

        // Kiểm tra và thông báo kết quả
        if ($stmt) {
            echo "The product has been added to the database!";
        } else {
            echo "An error occurred while adding a product!";
        }
    }

header('location: ../product_list.php')
?>