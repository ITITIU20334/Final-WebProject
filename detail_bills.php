<?php
session_start();
include "admin/config/config.php";
$id_bills = $_GET['id'];
$detail_bill = $conn->query("SELECT * FROM `detail_bill` JOIN products ON detail_bill.id_product = products.id WHERE id_bills =  $id_bills");
$detail_bill->execute();
$detail_bills = $detail_bill->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Electro - HTML Ecommerce Template</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="css/slick.css" />
    <link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="css/style.css" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
    <!-- HEADER -->
    <?php include './header.php' ?>
    <!-- /HEADER -->

    <!-- NAVIGATION -->
    <nav id="navigation">
        <?php include './navigation.php'; ?>
    </nav>
    <!-- /NAVIGATION -->

    <!-- BREADCRUMB -->
    <div id="breadcrumb" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <h3 class="breadcrumb-header">Detail Bills</h3>
                    <ul class="breadcrumb-tree">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Detail Bills</li>
                    </ul>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /BREADCRUMB -->
    <div class="cart-list">
        <?php
        foreach ($detail_bills as $row) {
        ?>
            <div class="container">
                <table class="table">
                    <tr>
                        <td>
                            <div class="product-img ">
                                <img src="./admin/assets/img/<?php echo $row['image']; ?>" height="100px" width="100px" alt="Product Image">
                            </div>
                        </td>
                        <td class="ps-0">
                            <h3 class="product-name"><?php echo $row['model']; ?></h3>
                            <h4 class="product-price"><span class="qty">Quantity: <?php echo $row['quantity']; ?></span></h4>
                            <h3 class="product-name"><?php echo $row['price']; ?></h3>
                        </td>
                    </tr>
                </table>


                <!-- Nút Xóa sản phẩm có thể được thêm ở đây -->
                <!-- <button class="delete"><i class="fa fa-close"></i></button> -->
            </div>
        <?php
        }

        ?>
    </div>
    <!-- NEWSLETTER -->
    <!-- /NEWSLETTER -->

    <!-- FOOTER -->
    <?php include "footer.php"; ?>
    <!-- /FOOTER -->

    <!-- jQuery Plugins -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/nouislider.min.js"></script>
    <script src="js/jquery.zoom.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>