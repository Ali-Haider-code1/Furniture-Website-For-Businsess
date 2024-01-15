<?php
include_once("header.php");
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productName = $_POST["productName"];
    $productPrice = $_POST["productPrice"];
    $productImage = $_POST["productImage"];

    $productName = mysqli_real_escape_string($con, $productName);
    $productPrice = floatval($productPrice);
    $productImage = mysqli_real_escape_string($con, $productImage); // Escape the image path

    $sql = "INSERT INTO products (p_name, p_price, p_img) VALUES ('$productName', $productPrice, '$productImage')";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $currentTime = date('Y-m-d H:i:s');
        $insertLogSql = "INSERT INTO products_log (p_name, p_price, time) VALUES ('$productName', $productPrice, '$currentTime')";
        $resultLog = mysqli_query($con, $insertLogSql);

        if ($resultLog) {
            echo '<script>alert("Product Added Successfully.")</script>';
        } else {
            echo "Error in product log insertion: " . mysqli_error($con);
        }
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>


<style>
    .addproducts {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
    }

    button {
        border: none;
        border-radius: 5px;
        color: white;
        background-color: cadetblue;
        font-weight: bold;
        padding: 6px 10px;
    }

    input {
        border-radius: 5px;
        outline: none;
        margin: 10px;
        border: 1px solid grey;
        padding: 7px;
    }

    table {
        width: 700px;
        margin: auto;
        padding: 10px 10px;
    }

    table th,
    table td {
        padding: 5px 5px;
        border: 1px solid grey;
    }

    @media (max-width:430px) {
        table {
            width: 350px;
            overflow: auto;
        }
    }
</style>

<div class="addproducts">

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <h2 class="mt-4">Add Product</h2>
        <input type="text" id="productName" name="productName" required placeholder="Product Name">

        <input type="number" id="productPrice" name="productPrice" step="5$" required placeholder="Product Price">
        <input type="text" id="productImage" name="productImage" required placeholder="Product Image Path">

        <button type="submit" class="mt-3">Add Product</button>
    </form>
</div>
<hr class="mt-5">
<?php
include('db.php');

$sql = "SELECT * FROM products_log";
$result = mysqli_query($con, $sql);

if ($result) {
    echo '<div class="mt-4">';
    echo '<h2 class="text-center">Product Log</h2>';
    echo '<table border="1">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Product Id</th>';
    echo '<th>Product Name</th>';
    echo '<th>Product Price</th>';
    echo '<th>Time</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row['p_id'] . '</td>';
        echo '<td>' . $row['p_name'] . '</td>';
        echo '<td>$' . $row['p_price'] . '</td>';
        echo '<td>' . $row['time'] . '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
    echo '</div>';
} else {
    echo "Error fetching product log: " . mysqli_error($connection);
}
mysqli_close($con);
?>


<script src="../js/bootstrap.bundle.min.js"></script>
<script src="../js/tiny-slider.js"></script>
<script src="../js/custom.js"></script>

</body>

</html>