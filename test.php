<?php
session_start();
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
                            <h4 class="product-price"><span class="qty"><?php echo $product['quantity']; ?></span>$<?php echo $product['price']; ?></h4>
                            <a href='XoaGioHang.php?key=<?php echo $key ?>'>Xóa</a>
                        </div>
                        <!-- Nút Xóa sản phẩm có thể được thêm ở đây -->
                        <!-- <button class="delete"><i class="fa fa-close"></i></button> -->
                    </div>
            <?php
                }
            }
            ?>