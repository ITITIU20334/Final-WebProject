<?php
  $danhsach = "SELECT * FROM categories";
  $listdanhsach = $conn->query($danhsach);
  $danhsach = $listdanhsach->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="container">
    <!-- responsive-nav -->
    <div id="responsive-nav">
        <!-- NAV -->
        <ul class="main-nav nav navbar-nav">
            <li class=""><a href="index.php">Home</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categories <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <?php
                    foreach ($danhsach as $category) {
                        ?>
                    <li><a href="category.php?idcate=<?php echo $category['id'] ?>"><?php echo $category['name'] ?>  </a></li>
                    <?php
                    }
                    ?>
                </ul>
            </li>
            <li class=""><a href="index.php">News</a></li>
        </ul>
        <!-- /NAV -->
    </div>
    <!-- /responsive-nav -->
</div>