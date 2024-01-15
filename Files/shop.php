<?php
// session_start();
include_once("header.php");
?>
<!-- Start Hero Section -->
<div class="hero">
	<div class="container">
		<div class="row justify-content-between">
			<div class="col-lg-5">
				<div class="intro-excerpt">
					<h1>Shop</h1>
				</div>
			</div>
			<div class="col-lg-7">

			</div>
		</div>
	</div>
</div>
<!-- End Hero Section -->



<div class="untree_co-section product-section before-footer-section">
	<div class="container">
		<div class="row">

			<!-- Start Column 1 -->
			<?php
			include('db.php');

			$sql = "SELECT * FROM products";
			$result = mysqli_query($con, $sql);

			if ($result) {
				while ($row = mysqli_fetch_assoc($result)) {
					echo '<div class="col-12 col-md-4 col-lg-3 mb-5">';
					echo '<a class="product-item" href="javascript:void(0);" onclick="addToCart(\'' . $row['p_name'] . '\', ' . $row['p_price'] . ',\'' . $row['p_img'] . '\')">';
					echo '<img src="'.$row['p_img'].'" class="img-fluid product-thumbnail">';
					echo '<h3 class="product-title">' . $row['p_name'] . '</h3>';
					echo '<strong class="product-price">£' . $row['p_price'] . '</strong>';
					echo '<span class="icon-cross">';
					echo '<img src="../images/cross.svg" class="img-fluid">';
					echo '</span>';
					echo '</a>';
					echo '</div>';
				}
			} else {
				echo "Error: " . mysqli_error($con);
			}
			mysqli_close($con);
			?>

		</div>
	</div>
</div>


<!-- Start Footer Section -->
<footer class="footer-section">
	<div class="container relative">

		<div class="sofa-img">
			<img src="../images/sofa.png" alt="Image" class="img-fluid">
		</div>

		<div class="row">
			<div class="col-lg-8">
				<div class="subscription-form">
					<h3 class="d-flex align-items-center"><span class="me-1"><img src="../images/envelope-outline.svg" alt="Image" class="img-fluid"></span><span>Subscribe to Newsletter</span></h3>

					<form action="#" class="row g-3">
						<div class="col-auto">
							<input type="text" class="form-control" placeholder="Enter your name">
						</div>
						<div class="col-auto">
							<input type="email" class="form-control" placeholder="Enter your email">
						</div>
						<div class="col-auto">
							<button class="btn btn-primary">
								<span class="fa fa-paper-plane"></span>
							</button>
						</div>
					</form>

				</div>
			</div>
		</div>

		<div class="row g-5 mb-5">
			<div class="col-lg-4">
				<div class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo">Furni<span>.</span></a></div>
				<p class="mb-4">Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique. Pellentesque habitant</p>

				<ul class="list-unstyled custom-social">
					<li><a href="#"><span class="fa fa-brands fa-facebook-f"></span></a></li>
					<li><a href="#"><span class="fa fa-brands fa-twitter"></span></a></li>
					<li><a href="#"><span class="fa fa-brands fa-instagram"></span></a></li>
					<li><a href="#"><span class="fa fa-brands fa-linkedin"></span></a></li>
				</ul>
			</div>

			<div class="col-lg-8">
				<div class="row links-wrap">
					<div class="col-6 col-sm-6 col-md-3">
						<ul class="list-unstyled">
							<li><a href="#">About us</a></li>
							<li><a href="#">Services</a></li>
							<li><a href="#">Blog</a></li>
							<li><a href="#">Contact us</a></li>
						</ul>
					</div>

					<div class="col-6 col-sm-6 col-md-3">
						<ul class="list-unstyled">
							<li><a href="#">Support</a></li>
							<li><a href="#">Knowledge base</a></li>
							<li><a href="#">Live chat</a></li>
						</ul>
					</div>

					<div class="col-6 col-sm-6 col-md-3">
						<ul class="list-unstyled">
							<li><a href="#">Jobs</a></li>
							<li><a href="#">Our team</a></li>
							<li><a href="#">Leadership</a></li>
							<li><a href="#">Privacy Policy</a></li>
						</ul>
					</div>

					<div class="col-6 col-sm-6 col-md-3">
						<ul class="list-unstyled">
							<li><a href="#">Nordic Chair</a></li>
							<li><a href="#">Kruzo Aero</a></li>
							<li><a href="#">Ergonomic Chair</a></li>
						</ul>
					</div>
				</div>
			</div>

		</div>

		<div class="border-top copyright">
			<div class="row pt-4">
				<div class="col-lg-6">
					<p class="mb-2 text-center text-lg-start">Copyright &copy;<script>
							document.write(new Date().getFullYear());
						</script>. All Rights Reserved. &mdash; Designed with love by <a href="https://untree.co">Untree.co</a> Distributed By <a href="https://themewagon.com">ThemeWagon</a> <!-- License information: https://untree.co/license/ -->
					</p>
				</div>

				<div class="col-lg-6 text-center text-lg-end">
					<ul class="list-unstyled d-inline-flex ms-auto">
						<li class="me-4"><a href="#">Terms &amp; Conditions</a></li>
						<li><a href="#">Privacy Policy</a></li>
					</ul>
				</div>

			</div>
		</div>

	</div>
</footer>
<!-- End Footer Section -->



<script src="../js/bootstrap.bundle.min.js"></script>
<script src="../js/tiny-slider.js"></script>
<script src="../js/custom.js"></script>
</body>

<script>
	function addToCart(productName, productPrice,productImage) {
		var isLoggedIn = <?php echo json_encode(isset($_SESSION['email'])); ?>;

		if (isLoggedIn) {
			var addToCartConfirmed = window.confirm('Are you sure you want to add this item to the cart?');
			if (addToCartConfirmed) {
				var xhr = new XMLHttpRequest();
				xhr.open('POST', 'addToCart.php', true);

				xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

				xhr.onload = function() {
					if (xhr.status === 200) {
						alert('Item added to cart successfully.');
					}
				};

				xhr.onerror = function() {
					console.error('Error while adding item to cart.');
				};

				var data = 'productName=' + encodeURIComponent(productName) + '&productPrice=' + encodeURIComponent(productPrice)+'&productImage='+encodeURIComponent(productImage);
				xhr.send(data);
			}
		} else {
			alert('Please log in before adding items to the cart.');
			window.location.href = 'login.php';
		}
	}
</script>

</html>