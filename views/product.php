<?php
require "../Classes/Database.php";
$id = $_GET['id'];
// var_dump($_GET);
$sql = "SELECT * FROM `products` where product_id = $id";

if ($result = mysqli_query($conn, $sql)) {

    $product = mysqli_fetch_assoc($result);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php ?>product</title>
    <?php include 'head.php'; ?>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    // include 'medewerker_manager/medewerker_header.php'
    ?>
    <!-- <a href="" class="btn btn-primary">Hello</a> -->

    <div class="canvas container">
        <div class="column1">
            <div class="product-beschrijving">
                <span>Product: <?php echo $product["name"] ?></span><br>
                <span>Price: <?php echo $product["selling_price"] ?></span><br>
                <span>Category: <?php echo ucfirst($product["category"]) ?></span>
            </div>
        </div>
        <div class="column2">
            <div class="img">
                <img src="../assets/<?php echo $product["image"] ?>.jpg" alt="product image" width="200px" height="200px">
                <!-- <img src="../assets/mayo.jpg" alt="product image" width="100px" height="100px"> -->
            </div>
        </div>
    </div>

    <div class="container text-center">

    </div>

</body>

</html>