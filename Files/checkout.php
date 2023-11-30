<<<<<<< HEAD
<?php include_once("header.php")    ?>
		<!-- Start Hero Section -->
			<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Checkout</h1>
							</div>
						</div>
						<div class="col-lg-7">
							
						</div>
					</div>
=======
<!-- /*
* Bootstrap 5
* Template Name: Furni
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->


<?php include_once("header.php");
?>
<?php
session_start();
require_once("db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (isset($_SESSION['email'])) {
		// Get the logged-in user's email
		$email = $_SESSION['email'];

		// Get the user ID based on the email
		$selectUserIdQuery = "SELECT id FROM user WHERE email = ?";

		$stmt = mysqli_prepare($con, $selectUserIdQuery);
		mysqli_stmt_bind_param($stmt, "s", $email);
		mysqli_stmt_execute($stmt);

		$result = mysqli_stmt_get_result($stmt);

		if ($result) {
			$row = mysqli_fetch_assoc($result);

			if ($row) {
				$userId = $row['id'];

				// Capture and validate billing details from the form
				$country = validateInput($_POST['c_country']);
				$fname = validateInput($_POST['c_fname']);
				$lname = validateInput($_POST['c_lname']);
				$companyname = validateInput($_POST['c_companyname']);
				$address = validateInput($_POST['c_address']);
				$state_country = validateInput($_POST['c_state_country']);
				$postal_zip = validateInput($_POST['c_postal_zip']);
				$email_address = validateInput($_POST['c_email_address']);
				$phone = validateInput($_POST['c_phone']);
				$order_notes = validateInput($_POST['c_order_notes']);

				// Insert billing details into the shippingdetails table
				$insertBillingQuery = "INSERT INTO shippingdetails (user_id, country, fname, lname, companyname, address, state, zip, email, phone, ordernotes)
                                       VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

				$stmt = mysqli_prepare($con, $insertBillingQuery);
				mysqli_stmt_bind_param($stmt, "issssssssss", $userId, $country, $fname, $lname, $companyname, $address, $state_country, $postal_zip, $email_address, $phone, $order_notes);

				if (mysqli_stmt_execute($stmt)) {
					echo '<script>alert("Billing details saved successfully.")</script>';
				} else {
					echo 'Error: ' . $insertBillingQuery . '<br>' . mysqli_error($con);
				}
			} else {
				echo 'User not found.';
			}
		} else {
			echo 'Error: ' . $selectUserIdQuery . '<br>' . mysqli_error($con);
		}
	} else {
		echo 'User is not logged in.';
	}
}

function validateInput($input)
{
	// Perform additional validation if needed
	$validatedInput = trim($input);
	$validatedInput = stripslashes($validatedInput);
	$validatedInput = htmlspecialchars($validatedInput);

	return $validatedInput;
}
?>

<!-- Start Hero Section -->
<div class="hero">
	<div class="container">
		<div class="row justify-content-between">
			<div class="col-lg-5">
				<div class="intro-excerpt">
					<h1>Checkout</h1>
>>>>>>> f9bbc5ba194014894baf7896a6b2b5fc176f6e2c
				</div>
			</div>
			<div class="col-lg-7">

			</div>
		</div>
	</div>
</div>
<!-- End Hero Section -->

<div class="untree_co-section">
	<div class="container">
		<div class="row mb-5">
			<div class="col-md-12">
				<div class="border p-4 rounded" role="alert">
					Returning customer? <a href="#">Click here</a> to login
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 mb-5 mb-md-0">
				<h2 class="h3 mb-3 text-black">Billing Details</h2>
				<div class="p-3 p-lg-5 border bg-white">
					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
						<div class="form-group">
							<label for="c_country" class="text-black">Country <span class="text-danger">*</span></label>
							<select id="c_country" class="form-control" name="c_country">
								<option value="1">Select a country</option>
								<option value="2">bangladesh</option>
								<option value="3">Algeria</option>
								<option value="4">Afghanistan</option>
								<option value="5">Ghana</option>
								<option value="6">Albania</option>
								<option value="7">Bahrain</option>
								<option value="8">Colombia</option>
								<option value="9">Dominican Republic</option>
							</select>
						</div>
						<div class="form-group row">
							<div class="col-md-6">
								<label for="c_fname" class="form-label text-black">First Name <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="c_fname" name="c_fname" required>
							</div>
							<div class="col-md-6">
								<label for="c_lname" class="form-label text-black">Last Name <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="c_lname" name="c_lname" required>
							</div>
						</div>

						<div class="form-group row">
							<div class="col-md-12">
								<label for="c_companyname" class="form-label text-black">Company Name </label>
								<input type="text" class="form-control" id="c_companyname" name="c_companyname" required>
							</div>
						</div>

						<div class="form-group row">
							<div class="col-md-12">
								<label for="c_address" class="form-label text-black">Address <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="c_address" name="c_address" placeholder="Street address" required>
							</div>
						</div>

						<div class="form-group row">
							<div class="col-md-6">
								<label for="c_state_country" class="form-label text-black">State / Country <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="c_state_country" name="c_state_country" required>
							</div>
							<div class="col-md-6">
								<label for="c_postal_zip" class="form-label text-black">Posta / Zip <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="c_postal_zip" name="c_postal_zip" required>
							</div>
						</div>

						<div class="form-group row mb-5">
							<div class="col-md-6">
								<label for="c_email_address" class="form-label text-black">Email Address <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="c_email_address" name="c_email_address" required>
							</div>
							<div class="col-md-6">
								<label for="c_phone" class="form-label text-black">Phone <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="c_phone" name="c_phone" placeholder="Phone Number" required>
							</div>
						</div>

						<div class="form-group">
							<div class="collapse" id="ship_different_address">
								<div class="py-2">

									<div class="form-group">
										<label for="c_diff_country" class="text-black">Country <span class="text-danger">*</span></label>
										<select id="c_diff_country" class="form-control">
											<option value="1">Select a country</option>
											<option value="2">bangladesh</option>
											<option value="3">Algeria</option>
											<option value="4">Afghanistan</option>
											<option value="5">Ghana</option>
											<option value="6">Albania</option>
											<option value="7">Bahrain</option>
											<option value="8">Colombia</option>
											<option value="9">Dominican Republic</option>
										</select>
									</div>


									<div class="form-group row">
										<div class="col-md-6">
											<label for="c_diff_fname" class="text-black">First Name <span class="text-danger">*</span></label>
											<input type="text" class="form-control" id="c_diff_fname" name="c_diff_fname">
										</div>
										<div class="col-md-6">
											<label for="c_diff_lname" class="text-black">Last Name <span class="text-danger">*</span></label>
											<input type="text" class="form-control" id="c_diff_lname" name="c_diff_lname">
										</div>
									</div>

									<div class="form-group row">
										<div class="col-md-12">
											<label for="c_diff_companyname" class="text-black">Company Name </label>
											<input type="text" class="form-control" id="c_diff_companyname" name="c_diff_companyname">
										</div>
									</div>

									<div class="form-group row  mb-3">
										<div class="col-md-12">
											<label for="c_diff_address" class="text-black">Address <span class="text-danger">*</span></label>
											<input type="text" class="form-control" id="c_diff_address" name="c_diff_address" placeholder="Street address">
										</div>
									</div>

									<div class="form-group">
										<input type="text" class="form-control" placeholder="Apartment, suite, unit etc. (optional)">
									</div>

									<div class="form-group row">
										<div class="col-md-6">
											<label for="c_diff_state_country" class="text-black">State / Country <span class="text-danger">*</span></label>
											<input type="text" class="form-control" id="c_diff_state_country" name="c_diff_state_country">
										</div>
										<div class="col-md-6">
											<label for="c_diff_postal_zip" class="text-black">Posta / Zip <span class="text-danger">*</span></label>
											<input type="text" class="form-control" id="c_diff_postal_zip" name="c_diff_postal_zip">
										</div>
									</div>

									<div class="form-group row mb-5">
										<div class="col-md-6">
											<label for="c_diff_email_address" class="text-black">Email Address <span class="text-danger">*</span></label>
											<input type="text" class="form-control" id="c_diff_email_address" name="c_diff_email_address">
										</div>
										<div class="col-md-6">
											<label for="c_diff_phone" class="text-black">Phone <span class="text-danger">*</span></label>
											<input type="text" class="form-control" id="c_diff_phone" name="c_diff_phone" placeholder="Phone Number">
										</div>
									</div>

								</div>

							</div>
						</div>

						<div class="form-group">
							<label for="c_order_notes" class="text-black">Order Notes</label>
							<textarea name="c_order_notes" id="c_order_notes" cols="30" rows="5" class="form-control" placeholder="Write your notes here..."></textarea>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-black btn-lg btn-block d-block m-auto mt-3" id="saveBillingBtn">Save Billing
								Details</button>
						</div>
					</form>

				</div>
			</div>
			<div class="col-md-6">

				<div class="row mb-5">
					<div class="col-md-12">
						<h2 class="h3 mb-3 text-black">Coupon Code</h2>
						<div class="p-3 p-lg-5 border bg-white">

							<label for="c_code" class="text-black mb-3">Enter your coupon code if you have one</label>
							<div class="input-group w-75 couponcode-wrap">
								<input type="text" class="form-control me-2" id="c_code" placeholder="Coupon Code" aria-label="Coupon Code" aria-describedby="button-addon2">
								<div class="input-group-append">
									<button class="btn btn-black btn-sm" type="button" id="button-addon2">Apply</button>
								</div>
							</div>

						</div>
					</div>
				</div>

				<div class="row mb-5">
					<div class="col-md-12">
						<h2 class="h3 mb-3 text-black">Your Order</h2>
						<form id="orderForm">

							<div class="p-3 p-lg-5 border bg-white">
								<table class="table site-block-order-table mb-5">
									<thead>
										<?php
										require_once("db.php");

										if (isset($_SESSION['email'])) {
											$email = $_SESSION['email'];
											$selectUserIdQuery = "SELECT id FROM user WHERE email = '$email'";
											$result = mysqli_query($con, $selectUserIdQuery);

											if ($result) {
												$row = mysqli_fetch_assoc($result);

												if ($row) {
													$userId = $row['id'];

													// Retrieve cart items for the logged-in user
													$selectCartItemsQuery = "SELECT name, price, SUM(quantity) as totalQuantity FROM cart WHERE user_id = '$userId' GROUP BY name";
													$cartItemsResult = mysqli_query($con, $selectCartItemsQuery);

													if ($cartItemsResult) {
														$subtotal = 0;

														echo '<tbody>';

														while ($cartItem = mysqli_fetch_assoc($cartItemsResult)) {
															$productName = $cartItem['name'];
															$quantity = $cartItem['totalQuantity'];
															$price = $cartItem['price'] * $quantity;
															$subtotal += $price;

															echo '<tr>';
															echo '<td>' . $productName . ' <strong class="mx-2">x</strong> ' . $quantity . '</td>';
															echo '<td>$' . number_format($price, 2) . '</td>';
															echo '</tr>';
														}

														echo '<tr>';
														echo '<td class="text-black font-weight-bold"><strong>Cart Subtotal</strong></td>';
														echo '<td class="text-black">$' . number_format($subtotal, 2) . '</td>';
														echo '</tr>';

														echo '<tr>';
														echo '<td class="text-black font-weight-bold"><strong>Order Total</strong></td>';
														echo '<td class="text-black font-weight-bold"><strong>$' . number_format($subtotal, 2) . '</strong></td>';
														echo '</tr>';

														echo '</tbody>';
													} else {
														echo 'Error fetching cart items: ' . mysqli_error($con);
													}
												} else {
													echo 'User not found.';
												}
											} else {
												echo 'Error: ' . $selectUserIdQuery . '<br>' . mysqli_error($con);
											}
										} else {
											echo 'User is not logged in.';
										}
										?>

										</tbody>
								</table>
								<div class="form-group">
									<button id="placeOrderBtn" class="btn btn-primary" onclick="placeOrder()">Place Order</button>
								</div>

							</div>
						</form>
					</div>
				</div>

			</div>
		</div>
		<!-- </form> -->
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
						</script>. All Rights Reserved. &mdash; Designed with love by <a href="https://untree.co">Untree.co</a> Distributed By <a hreff="https://themewagon.com">ThemeWagon</a> <!-- License information: https://untree.co/license/ -->
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


<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/tiny-slider.js"></script>
<script src="js/custom.js"></script>
</body>
<script>
	function placeOrder() {
		var formData = $('#orderForm').serialize();
		$.ajax({
			type: 'POST',
			url: 'place_order.php',
			data: formData,
			dataType: 'json',
			success: function(response) {
				if (response.success) {
					alert(response.message);
					window.location.href = 'thankyou.php';
				} else {
					alert('Error: ' + response.message);
				}
			},
			error: function(xhr, status, error) {
				alert('Error: ' + error);
			}
		});
	}

	$(document).ready(function() {
		$('#placeOrderBtn').on('click', function() {
			placeOrder();
		});
	});
</script>

</html>