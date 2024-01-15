<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Untree.co">
	<link rel="shortcut icon" href="favicon.png">

	<meta name="description" content="" />
	<meta name="keywords" content="bootstrap, bootstrap4" />

	<!-- Bootstrap CSS -->
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" integrity="sha384-rbs5HvlKdE8Xem93mCpIUnTC1j9beAIs5rD/R8S/Eu8GP5U02S3tBcOJq5cAOT7o" crossorigin="anonymous">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-KyZXEAg3QhqLMpG8r+Knujsl5+z0FfM5sVoRfWkNfEXcy0c5z5P2U2nU6mzqL+YX6NvOxPfks1nQ7GKN6Uw65g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
	<link href="../css/tiny-slider.css" rel="stylesheet">
	<link href="../css/style.css" rel="stylesheet">
	<title>Furni Free Bootstrap 5 Template for Furniture and Interior Design Websites by Untree.co </title>
</head>

<body>

	<!-- Start Header/Navigation -->
	<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

		<div class="container">
			<a class="navbar-brand" href="index.php">Furni<span>.</span></a>

			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarsFurni">
				<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
					<li class="nav-item">
						<a class="nav-link" href="index.php">Home</a>
					</li>
					<li><a class="nav-link" href="shop.php">Shop</a></li>
					<li><a class="nav-link" href="about.php">About us</a></li>
					<li><a class="nav-link" href="services.php">Services</a></li>
					<li><a class="nav-link" href="blog.php">Blog</a></li>
					<li><a class="nav-link" href="contact.php">Contact us</a></li>
					<li><a class="nav-link" href="FAQ.php">FAQ</a></li>
					<?php
					if (isset($_SESSION['admin']) && $_SESSION['admin']) {
						echo '<li><a class="nav-link" href="addNewProduct.php">Add</a></li>';
						echo '<li><a class="nav-link" href="DeleteProduct.php">Delete </a></li>';
					}
					?>
				</ul>

				<ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
					<li>
						<a class="nav-link" href="login.php" data-toggle="tooltip" data-placement="bottom" title="Login">
							<img src="../images/user.svg" alt="User Icon">
						</a>
					</li>
					<li>
						<a class="nav-link" href="cart.php" data-toggle="tooltip" data-placement="bottom" title="Cart" data-tooltip="Cart (0)">
							<img src="../images/cart.svg" alt="Cart Icon">
						</a>
					</li>
					<li><a class="nav-link text-white py-2 px-2" href="logout.php" data-toggle="tooltip" data-placement="bottom" title="Logout">Logout</a></li>


				</ul>
			</div>
		</div>

	</nav>
	<script>
		$(document).ready(function() {
			$('[data-toggle="tooltip"]').tooltip();
		});
	</script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"></script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-yVlq5qBfBf0ZqF+A8dNCn6s5Tf1CTV6Sbxl1DE1V/Cs0Em/kRFHzR5CgM62AVDn" crossorigin="anonymous"></script>