<?php
// require_once "../Classes/Database.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Producten</title>
    <?php include '../head.php'; ?>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <?php
    include 'medewerker_header.php';
    ?>
    <div class="container">
        <a class="btn btn-primary" href="product_maak.php">Add product</a>
    </div>
    <div class="">
        <?php
        require "../../Classes/Database.php";

        $sql = "SELECT * FROM `products`";

        if ($result = mysqli_query($conn, $sql)) {

            $producten = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        ?>
        <div class="">
            <table class="table table-responsive table-striped">
                <thead>
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Cost Price</th>
                        <th>Selling Price</th>
                        <th>Category</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php
                    //var_dump($users); die;
                    foreach ($producten as $product) : ?>
                        <tr>
                            <td></td>
                            <td><?php echo $product["product_id"] ?></td>
                            <td><a href="../product.php?id=<?php echo $product["product_id"] ?>"><?php echo $product["name"] ?></a></td>
                            <td><?php echo $product["cost_price"] ?></td>
                            <td><?php echo $product["selling_price"] ?></td>
                            <td><?php echo $product["category"] ?></td>
                            <td><?php echo $product["quantity"] ?></td>
                            <td><a href="product_delete.php?id=<?php echo $product["product_id"] ?>"><i class="fa-solid fa-trash text-danger"></i></a> </td>
                            <td><a class="btn btn-warning" href="product_update.php?id=<?php echo $product["product_id"] ?>">Update</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>