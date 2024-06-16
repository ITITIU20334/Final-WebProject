<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa sản phẩm</title>
    <!-- Link đến các tệp CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Các tệp CSS tùy chỉnh của bạn -->
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
<?php
session_start();
include '../../config/config.php';
$stmcate = $conn->prepare("SELECT * FROM categories");
$stmcate->execute();
$dataCate = $stmcate->fetchAll(PDO::FETCH_ASSOC);
$id = $_GET['id'] ?? '';

$stm = $conn->prepare("SELECT * FROM products WHERE id = :id");
$stm->bindParam(':id', $id);
$stm->execute();
$data = $stm->fetchAll(PDO::FETCH_ASSOC);

foreach ($data as $r) {
    if ($r['id'] == $id) {
?>
    <form method="POST" action="update.php" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $r['id'] ?>">
        <div class="">
            <label for="img" class="col-form-label">Image:</label>
            <input type="file" class="form-control" id="img" accept=".jpg,.png,.jpeg" name="img">
        </div>
        <div class="">
            <label for="Name" class="col-form-label">Name product:</label>
            <input type="text" class="form-control" id="Name" name="name" value="<?php echo $r['model'] ?>">
        </div>
        <div class="">
            <label for="Gia" class="col-form-label">Price:</label>
            <input type="text" class="form-control" id="Gia" name="gia" value="<?php echo $r['price'] ?>">
        </div>
        <div class="">
            <label for="GhiChu" class="col-form-label">Description:</label>
            <input type="text" class="form-control" id="GhiChu" name="ghichu" value="<?php echo $r['description'] ?>">
        </div>
        <select name="loai" id="loai">
            <?php foreach ($dataCate as $row) { ?>
                <option value="<?php echo $row['id'] ?>" <?php if ($r['category_id'] == $row['id']) echo 'selected'; ?>>
                    <?php echo $row['name'] ?>
                </option>
            <?php } ?>
        </select>
        <div class="modal-footer">
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
<?php
    }
}
?>
    <!-- Phần nội dung của bạn -->

    <!-- Link đến các tệp JavaScript Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Các tệp JavaScript tùy chỉnh của bạn -->
    <script src="../js/script.js"></script>
</body>
</html>