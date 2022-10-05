<?php
// session_start();
// if (!$_SESSION['is_logged_in']) {
//     header("location: ../login.php");
// }

// require '../database.php';
// $sql = "SELECT * FROM gebruikers";
// $result = mysqli_query($conn, $sql);
// $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add product</title>
    <?php include '../head.php'; ?>
</head>

<body>

    <div class="container mt-3">
        <h1>Add a product</h1>
        <form action="product_registreer_verwerk.php" method="POST">
            <div class="mb-3">
                <label class="form-label" for="product_name">Product name:</label>
                <input class="form-control" type="text" name="product_name">
            </div>

            <div class="mb-3">
                <label class="form-label" for="cost_price">Cost price:</label>
                <input class="form-control" type="text" name="cost_price">
            </div>

            <div class="mb-3">
                <label class="form-label" for="selling_price">Selling price:</label>
                <input class="form-control" type="text" name="selling_price">
            </div>

            <label class="form-label" for="category">Category:</label>
            <select name="category" class="form-select mb-2" aria-label="Default select example">
                <option value="saus">Saus</option>
                <option value="broodje">Broodje</option>
                <option value="drinks">Drinks</option>
            </select>

            <div class="mb-3">
                <label class="form-label" for="quantity">Quantity:</label>
                <input class="form-control" type="number" name="quantity">
            </div>

            <div class="mb-3">
                <button class="btn btn-primary mt-2" name="submit">Add product</button>
                <a class="btn btn-success mt-2" href="producten_overzicht.php">Products</a>
            </div>
        </form>
    </div>
</body>

</html>