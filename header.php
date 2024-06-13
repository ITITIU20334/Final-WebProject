<!-- HEADER -->

<header>
	<!-- TOP HEADER -->
	<div id="top-header">
		<div class="container">
			<ul class="header-links pull-left">
				<li><a href="#"><i class="fa fa-phone"></i> +052-3795-603</a></li>
				<li><a href="#"><i class="fa fa-envelope-o"></i> mickey.team@gmail.com</a></li>
				<li><a href="#"><i class="fa fa-map-marker"></i> IU University</a></li>
			</ul>
			<ul class="header-links pull-right">
				<?php
				if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
					echo '<li><a href="#"><p> Hello ' . $_SESSION['username'] . '</p></a></li>';
					echo '<li><a href="dangxuat.php">Logout</a></li>';
				} else {
					echo '<li><a href="userlogin.php"><i class="fa fa-user-o"></i> Login</a></li>';
				}
				?>
			</ul>
		</div>
	</div>

	<!-- /TOP HEADER -->


	<!-- MAIN HEADER -->
	<div id="header">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- LOGO -->
				<div class="col-md-3">
					<div class="header-logo">
						<a href="index.php" class="logo">
							<img src="./img/logo.png" alt="">
						</a>
					</div>
				</div>
				<!-- /LOGO -->

				<!-- SEARCH BAR -->
				<div class="col-md-6">
					<div class="header-search">
						<form method="GET" action="timkiem.php">

							<input class="input" name="timkiem" id="timkiem" placeholder="Search here">
							<button class="search-btn">Search</button>
						</form>
					</div>
				</div>
				<!-- /SEARCH BAR -->

				<!-- ACCOUNT -->
				<div class="col-md-3 clearfix">
					<div class="header-ctn">
						<?php include "giohang.php"; ?>
						<?php
						if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
							include "bills.php";
						}

						?>

						<div class="menu-toggle">
							<a href="#">
								<i class="fa fa-bars"></i>
								<span>Menu</span>
							</a>
						</div>
						<!-- /Menu Toogle -->
					</div>
				</div>
				<!-- /ACCOUNT -->
			</div>
			<!-- row -->
		</div>
		<!-- container -->
	</div>
	<!-- /MAIN HEADER -->
</header>
<!-- /HEADER -->