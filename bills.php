<?php
  $iduser = $_SESSION['id-user'];
  $bill = $conn -> query("SELECT * FROM bills where user_id = $iduser ");
  $bill->execute();
  $bills = $bill->fetchAll(PDO::FETCH_ASSOC);
  $billCount = $bill->rowCount();
?>
<div class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
        <i class="fa fa-history"></i>
        <span>Your Order</span>
        <div class="qty">
            <?php echo $billCount ?>
        </div>
    </a>
    <div class="cart-dropdown">
        <div class="cart-list">
          <?php
          if($billCount == 0){
            echo'Your bills is empty ';
          }else
            {
                foreach($bills as $row){
                    ?>
                        <div class="product-body">
                            <p class="product-name">Date: <?php echo $row['date']; ?></p>
                            <p class="product-name">Name: <?php echo $row['name']; ?></p>
                            <p class="product-price"><span class="qty"></span>Total price: $<?php echo $row['total_price']; ?></p>
                            <button><a href='detail_bills?id=<?php echo $row['bills_id'] ?>'>Detail Bills</a></button>
                            <hr>

                        </div>
                    <?php
                }
            }
          ?>
        </div>
    </div>
</div>
<!-- /Cart -->