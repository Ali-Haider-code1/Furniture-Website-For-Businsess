<?php
session_start();
require_once("db.php");

$response = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
        $selectUserIdQuery = "SELECT id, fname FROM user WHERE email = '$email'";
        $result = mysqli_query($con, $selectUserIdQuery);

        if ($result) {
            $row = mysqli_fetch_assoc($result);

            if ($row) {
                $userId = $row['id'];
                $username = $row['fname'];

                $selectCartItemsQuery = "SELECT name, price, quantity FROM cart WHERE user_id = '$userId'";
                $cartItemsResult = mysqli_query($con, $selectCartItemsQuery);

                if ($cartItemsResult) {
                    $totalAmount = 0;

                    while ($cartItem = mysqli_fetch_assoc($cartItemsResult)) {
                        $totalAmount += $cartItem['quantity'] * $cartItem['price'];
                    }

                    $insertOrderQuery = "INSERT INTO orders (user_id, username, order_date, items, amount) 
                                         VALUES ('$userId', '$username', NOW(), (
                                             SELECT GROUP_CONCAT(name SEPARATOR ', ') FROM cart WHERE user_id = '$userId'
                                         ), '$totalAmount')";

                    if (mysqli_query($con, $insertOrderQuery)) {
                        $clearCartQuery = "DELETE FROM cart WHERE user_id = '$userId'";
                        mysqli_query($con, $clearCartQuery);

                        $response['success'] = true;
                        $response['message'] = 'Order placed successfully.';
                    } else {
                        $response['success'] = false;
                        $response['message'] = 'Error placing order: ' . mysqli_error($con);
                    }
                } else {
                    $response['success'] = false;
                    $response['message'] = 'Error fetching cart items: ' . mysqli_error($con);
                }
            } else {
                $response['success'] = false;
                $response['message'] = 'User not found.';
            }
        } else {
            $response['success'] = false;
            $response['message'] = 'Error selecting user: ' . mysqli_error($con);
        }
    } else {
        $response['success'] = false;
        $response['message'] = 'User is not logged in.';
    }

    echo json_encode($response);
}
