<?php   
session_start();
include  "admin/config/config.php"; ?>
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
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="css/slick.css"/>
		<link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="css/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="css/style.css"/>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		

    </head>
	<body>
		<!--Header-->
			<?php  include  './header.php' ?>

		<!--endHeader-->

		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<?php include  './navigation.php'; ?>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->
		
		<!-- SECTION -->
		<?php
			if (isset($_SESSION['status'])) { ?>
				<div class="alert alert-success" role="alert"> Order success! </div>
				<?php unset($_SESSION['status']);
			}
        ?>
		<!-- SECTION -->

		<!-- SECTION -->
        <div class="pro_list">
            <?php
            if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
                // Hiển thị khi giỏ hàng trống
                echo "<p>Your cart is empty.</p>";
            } else {
                // Hiển thị từng sản phẩm trong giỏ hàng từ session
                foreach ($_SESSION['cart'] as $key => $product) {
            ?>
                <div class="product-widget">
                    <div class="product-img">
                        <img src="./admin/assets/img/<?php echo $product['hinh']; ?>" alt="Product Image">
                    </div>
                    <div class="product-body">
                        <h3 class="product-name"><a href="#"><?php echo $product['model']; ?></a></h3>
                        <h4 class="product-price"><span class="qty">SL: <?php echo $product['quantity']; ?></span>Price: $<?php echo $product['price']; ?></h4>
                        <a href='deleteviewcart.php?key=<?php echo $key ?>'>Delete</a>
                    </div>
                </div>
            <?php
                }
            }
            ?>

			<div class="cart-summary">
				<?php
				if (!empty($_SESSION['cart'])) {
					// Tính tổng số tiền cho tất cả các sản phẩm trong giỏ hàng từ session
					$total_price = 0;
					foreach ($_SESSION['cart'] as $product) {
						$total_price += $product['price'];
					}
				?>
					<small><?php echo $total_items; ?> Item(s) selected</small>
					<h5>SUBTOTAL: $<?php echo $total_price; ?></h5>
				<?php
				}
				?>
			</div>
		</div>

	
		<!-- /SECTION -->

		<!-- NEWSLETTER -->
		<div id="newsletter" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="newsletter">
							<p>Sign Up for the <strong>NEWSLETTER</strong></p>
							<form>
								<input class="input" type="email" placeholder="Enter Your Email">
								<button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
							</form>
							<ul class="newsletter-follow">
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-instagram"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-pinterest"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /NEWSLETTER -->

		<!-- FOOTER -->
			<?php include  "footer.php"; ?>
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
