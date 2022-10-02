<?php
require "../Classes/Database.php";

$sql = "SELECT * FROM `products`";

if ($result = mysqli_query($conn, $sql)) {

    $producten = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>product</title>
    <?php include 'head.php' ?>
</head>

<body>
    <!-- <a href="" class="btn btn-primary">Hello</a> -->

    <div class="canvas container">
        <div class="column1">
            <div class="img">
                <img src="../assets/<?php ?>.jpg" alt="product image">
            </div>
        </div>
        <div class="column2">
            <div class="product-beschrijving">
                <span>Product: <?php ?></span><br>
                <span>Price: <?php ?></span><br>
                <span>Category: <?php ?></span>
            </div>
        </div>
    </div>

    <div class="container text-center">
        
    </div>

</body>

</html>