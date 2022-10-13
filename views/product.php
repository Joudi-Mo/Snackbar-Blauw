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
    <main class="container m-5">
        <div class="col-6">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static" style="background-color: #3498DB;">
                    <strong class="d-inline-block mb-2 text-light"><?php echo ucfirst($product["category"]) ?></strong>
                    <h3 class="fw-bold mb-0"> <?php echo $product["name"] ?></h3>
                    <div class="mb-1 text-light">Price: € <?php echo $product["selling_price"] ?></div>
                    <div class="mb-1 text-light">Quanitity: <?php echo ucfirst($product["quantity"]) ?></div>
                    <p class="card-text mb-auto">Dit is heel erg lekker.</p>
                </div>
                <div class="col-auto d-none d-lg-block">
                    <img src="../assets/<?php echo $product["image"] ?>.jpg" alt="product image" width="400px" height="400px">
                </div>
            </div>
        </div>
    </main>

</body>

</html>