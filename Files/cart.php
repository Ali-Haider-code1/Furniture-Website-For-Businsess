<!-- /*
* Bootstrap 5
* Template Name: Furni
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<?php include_once("header.php")    ?>

<!-- End Header/Navigation -->

<!-- Start Hero Section -->
<div class="hero">
  <div class="container">
    <div class="row justify-content-between">
      <div class="col-lg-5">
        <div class="intro-excerpt">
          <h1>Cart</h1>
        </div>
      </div>
      <div class="col-lg-7">

      </div>
    </div>
  </div>
</div>
<!-- End Hero Section -->



<div class="untree_co-section before-footer-section">
  <div class="container">
    <div class="row mb-5">
      <form class="col-md-12" method="post">
        <div class="site-blocks-table">
          <table class="table">
            <thead>
              <tr>
                <th class="product-thumbnail">Image</th>
                <th class="product-name">Product</th>
                <th class="product-price">Price</th>
                <th class="product-quantity">Quantity</th>
                <th class="product-total">Total</th>
                <th class="product-remove">Remove</th>
              </tr>
            </thead>
            <tbody>
              <?php
              session_start();
              require_once("db.php");

              if (isset($_SESSION['email'])) {
                $email = $_SESSION['email'];
                $selectUserIdQuery = "SELECT id FROM user WHERE email = '$email'";
                $result = mysqli_query($con, $selectUserIdQuery);

                if ($result) {
                  $row = mysqli_fetch_assoc($result);

                  if ($row) {
                    $userId = $row['id'];

                    // Retrieve aggregated cart items for the logged-in user
                    $selectCartItemsQuery = "SELECT name, SUM(quantity) as totalQuantity, price, SUM(price * quantity) as totalPrice FROM cart WHERE user_id = '$userId' GROUP BY name";
                    $cartItemsResult = mysqli_query($con, $selectCartItemsQuery);

                    if ($cartItemsResult) {
                      while ($cartItem = mysqli_fetch_assoc($cartItemsResult)) {
                        echo '<tr>';
                        echo '<td class="product-thumbnail"><img src="../images/product-1.png" alt="Image" class="img-fluid"></td>';
                        echo '<td class="product-name"><h2 class="h5 text-black">' . $cartItem['name'] . '</h2></td>';
                        echo '<td>$' . $cartItem['price'] . '</td>';
                        echo '<td>';
                        echo '<div class="input-group mb-3 d-flex align-items-center quantity-container" style="max-width: 120px;">';
                        echo '<div class="input-group-prepend"><button class="btn btn-outline-black decrease" type="button" onclick="decreaseQuantity(\'' . $cartItem['name'] . '\')"></button></div>';
                        echo '<input type="text" class="form-control text-center quantity-amount" value="' . $cartItem['totalQuantity'] . '" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" disabled>';
                        echo '<div class="input-group-append"><button class="btn btn-outline-black increase" type="button" onclick="increaseQuantity(\'' . $cartItem['name'] . '\')"></button></div>';
                        echo '</div>';
                        echo '</td>';
                        echo '<td>$' . $cartItem['totalPrice'] . '</td>';
                        echo '<td><a href="#" class="btn btn-black btn-sm" onclick="removeItem(\'' . $cartItem['name'] . '\')">X</a></td>';
                        echo '</tr>';
                      }
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
        </div>
      </form>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="row mb-5">
          <div class="col-md-6">
            <a href="shop.php"><button class="btn btn-outline-black btn-sm btn-block">Continue Shopping</button></a>
          </div>
        </div>
      </div>
      <div class="col-md-6 pl-5">
        <div class="row justify-content-end">
          <div class="col-md-7">
            <div class="row">
              <div class="col-md-12 text-right border-bottom mb-5">
                <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
              </div>
            </div>
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
                  $selectCartItemsQuery = "SELECT name, price, quantity FROM cart WHERE user_id = '$userId'";
                  $cartItemsResult = mysqli_query($con, $selectCartItemsQuery);

                  if ($cartItemsResult) {
                    $subtotal = 0;

                    while ($cartItem = mysqli_fetch_assoc($cartItemsResult)) {
                      $subtotal += ($cartItem['price'] * $cartItem['quantity']);
                    }

                    $total = $subtotal; // In this example, total is the same as subtotal. You can modify this based on your requirements.

                    echo '<div class="row mb-3">';
                    echo '<div class="col-md-6">';
                    echo '<span class="text-black">Subtotal</span>';
                    echo '</div>';
                    echo '<div class="col-md-6 text-right">';
                    echo '<strong class="text-black">$' . number_format($subtotal, 2) . '</strong>';
                    echo '</div>';
                    echo '</div>';

                    echo '<div class="row mb-5">';
                    echo '<div class="col-md-6">';
                    echo '<span class="text-black">Total</span>';
                    echo '</div>';
                    echo '<div class="col-md-6 text-right">';
                    echo '<strong class="text-black">$' . number_format($total, 2) . '</strong>';
                    echo '</div>';
                    echo '</div>';
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


            <div class="row">
              <div class="col-md-12">
                <button class="btn btn-black btn-lg py-3 btn-block" onclick="window.location='checkout.php'">Proceed To Checkout</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
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

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
  function removeItem(itemName) {
    $.ajax({
      type: 'POST',
      url: 'remove_item.php',
      data: {
        itemName: itemName
      },
      dataType: 'json',
      success: function(response) {
        if (response.success) {
          alert(response.message);
          location.reload();
        } else {
          alert('Error: ' + response.message);
        }
      },
      error: function(xhr, status, error) {
        alert('Error: ' + error);
      }
    });
  }
</script>


</html>