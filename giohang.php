<!-- Cart -->
<div class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
        <i class="fa fa-shopping-cart"></i>
        <span>Your Cart</span>
        <div class="qty">
            <?php
            // Tính số lượng sản phẩm trong giỏ hàng từ session
            $total_items = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
            echo $total_items;
            ?>
        </div>
    </a>
    <div class="cart-dropdown">
        <div class="cart-list">
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
                            <h4 class="product-price"><span class="qty"><?php echo $product['quantity']; ?></span>$<?php echo $product['price']; ?></h4>
                            <a href='XoaGioHang.php?key=<?php echo $key ?>'>Delete</a>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
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
        <div class="cart-btns">
            <?php 
            if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
                echo '<a href="userlogin.php">View Cart</a>';
                echo '<a href="userlogin.php">Checkout <i class="fa fa-arrow-circle-right"></i></a>';
            } else {
                echo '<a href="viewcart.php">View Cart</a>';
                if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
                    echo '<a href="#">Checkout <i class="fa fa-arrow-circle-right"></i></a>';
                } else {
                    echo '<a href="checkout.php">Checkout <i class="fa fa-arrow-circle-right"></i></a>';
                }
            }
            ?>
        </div>
    </div>
</div>