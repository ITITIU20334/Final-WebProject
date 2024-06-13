<?php
// Câu truy vấn SQL để lấy ra 10 sản phẩm ngẫu nhiên
$topSell = "SELECT * FROM products ORDER BY RAND() LIMIT 4";
$topSell = $conn->query($topSell);
$randomTopSell = $topSell->fetchAll(PDO::FETCH_ASSOC);

// Hiển thị thông tin của 10 sản phẩm ngẫu nhiên
foreach ($randomTopSell as $product) {
    ?>
    	<div class="col-md-3 col-xs-6">
						<div class="product">
							<div class="product-img">
                            <img src="./admin/assets/img/<?php echo $product['image'] ?>" alt="" height="200px" with="50px">
							</div>
							<div class="product-body">
								<h3 class="product-name"><a href="product.php?id=<?php echo $product['id'] ?>"><?php echo $product['model'] ?></a></h3>
								<h4 class="product-price"><?php echo $product['price'] ?></h4>
								<div class="product-rating">
								</div>
							</div>
							<div class="add-to-cart">
							<a href="cart.php?id=<?php echo $product['id'] ?>"><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button></a>
							</div>
						</div>
					</div>
<?php
}
?>