<?php
session_start();
require_once("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION['admin']) && $_SESSION['admin']) {
        $productId = $_POST['productId'];

        $deleteProductQuery = "DELETE FROM products WHERE p_id = $productId";
        $result = mysqli_query($con, $deleteProductQuery);

        if ($result) {
            echo ' <script>alert("Product deleted successfully")</script>';
            echo ' <script>location.reload();</script>';
        } else {
            // Error deleting product
            echo 'Error deleting product: ' . mysqli_error($con);
        }
    } else {
        // User is not authorized to delete products
        echo 'Unauthorized';
    }
} else {
    // Invalid request method
    echo 'Invalid request method';
}
