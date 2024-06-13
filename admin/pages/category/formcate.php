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
    $stm = $conn->prepare("SELECT * FROM categories");
    $stm->execute();
    $data = $stm->fetchAll(PDO::FETCH_ASSOC);
    $id = $_GET['id']??'';


    foreach($data as $r){
        if($r['id'] == $id)
        {
?>
<div class="container w-50">


<form method="POST" action="editcategory.php">
                                 <div class="">
                                    <label for="recipient-name" class="col-form-label">ID:</label>
                                    <input type="text" class="form-control" id="recipient-name" name="id" value="<?php echo $r['id']?>">
                                  </div>
                                  <div class="">
                                    <label for="recipient-name" class="col-form-label">Name:</label>
                                    <input type="text" class="form-control" id="recipient-name" name="name" value="<?php echo $r['name']?>">
                                  </div>
                                  <div class="modal-footer">
                                <button type="submit" name="submit" class="btn btn-primary">Update</button>
                              </div>
                                </form>
</div>
    <script src="../js/script.js"></script>
    <script src="../js/bootstrap.bundle.js"></script>
<?php
    }
}
?>

</body>
</html>

