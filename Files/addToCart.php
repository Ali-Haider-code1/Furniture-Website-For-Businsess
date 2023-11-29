<?php 
require_once("db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $sql = "INSERT INTO cart (name, price) VALUES ('$productName', '$productPrice')";

    if (mysqli_query($con, $sql)) {
        echo 'Item added to cart successfully.';
    } else {
        echo 'Error: ' . $sql . '<br>' . mysqli_error($con);
    }
}
?>
