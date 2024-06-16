<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<?php
    include '../../config/config.php';
    $stmcate = $conn->prepare("SELECT * FROM categories");
    $stmcate->execute();
    $dataCate = $stmcate->fetchAll(PDO::FETCH_ASSOC);


?>
<form method="POST" action="addproduct.php" enctype="multipart/form-data">
                                  <div class="">
                                    <label for="recipient-name" class="col-form-label">Name:</label>
                                    <input type="text" class="form-control" id="recipient-name" name="name">
                                  </div>
                                  <div class="">
                                    <label for="recipient-name" class="col-form-label">Image:</label>
                                    <input type="file" class="form-control" id="recipient-name" accept=".jpg,.png,.jpeg" name="img">
                                  </div>
                                  <label for="recipient-name" class="col-form-label">Price:</label>
                                    <input type="text" class="form-control" id="recipient-name" name="gia">
                                  </div>
                                  <label for="recipient-name" class="col-form-label">Description:</label>
                                    <input type="text" class="form-control" id="recipient-name" name="ghichu">
                                  </div>
                                  <label for="recipient-name" class="col-form-label">Category:</label>
                                  <select name="loai" id="loai">
                                    <?php
                                              foreach($dataCate as $row)
                                              { ?>
                                                  <option value="<?php echo $row['id'] ?>"> <?php echo $row['name'] ?> </option>
                                              <?php }
                                    ?>
                                </select>
                                  <div class="modal-footer">
                                <button type="submit" name="submit" class="btn btn-primary">Add</button>
                              </div>
                                </form>

<div class="container w-50">

</div>
    <script src="../js/script.js"></script>
    <script src="../js/bootstrap.bundle.js"></script>

</body>
</html>

