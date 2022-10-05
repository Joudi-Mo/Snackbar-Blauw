<?php
    session_start();
    // var_dump($_SESSION["is_logged_in"]);die;

    require "../../Classes/Database.php";
    $id = $_GET['id'];
    $sql = "SELECT * FROM `products` where product_id = $id limit 1";

    if ($result = mysqli_query($conn, $sql)) {
        $product = mysqli_fetch_assoc($result);
        if (is_null($product)) {
            //header("location: ../home_personeel.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Product update</title>
    <?php include '../head.php'; ?>
</head>

<body id="body">
    <div style="width: 50%;" class="updateForm container mt-5">
        <form action="product_update_verwerk.php" method="POST">
            <input type="hidden" name="product_id" value="<?php echo $product['product_id'] ?>">
            <div class="mb-3">
                <label class="form-label" for="name">Product name:</label>
                <input value="<?php echo $product['name'] ?>" class="form-control" type="text" name="name">
            </div>

            <div class="mb-3">
                <label class="form-label" for="cost_price">Cost price:</label>
                <input value="<?php echo $product['cost_price'] ?>" class="form-control" type="text" name="cost_price">
            </div>
            
            <div class="mb-3">
                <label class="form-label" for="selling_price">Cost price:</label>
                <input value="<?php echo $product['selling_price'] ?>" class="form-control" type="text" name="selling_price">
            </div>
            
            <label class="form-label" for="category">Category:</label>
            <select name="category" class="form-select" aria-label="Default select example">
                <option value="saus">Saus</option>
                <option value="broodje">Broodje</option>
                <option value="drinks">Drinks</option>
            </select>

            <div class="mb-3">
                <label class="form-label" for="quantity">Quantity:</label>
                <input value="<?php echo $product['quantity'] ?>" class="form-control" type="number" name="quantity">
            </div>

            <button class="btn btn-warning mt-2" name="submit">Update</button>
            <a class="btn btn-primary mt-2" href="producten_overzicht.php">Cancel</a>
        </form>
    </div>

</body>

</html>