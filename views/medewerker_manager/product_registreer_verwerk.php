<?php
require '../../Classes/Database.php';

$product_name = $_POST["product_name"];
$cost_price = trim($_POST["cost_price"]);
$selling_price = trim($_POST["selling_price"]);
$category = $_POST["category"];
$quantity = $_POST["quantity"];
$submit = $_POST["submit"];


if (
    isset($submit)
    && !empty($product_name)
    && !empty($cost_price)
    && !empty($selling_price)
    && !empty($category)
) {

    $sql = "INSERT INTO `products`(`name`, `cost_price`, `selling_price`, `category`, `quantity`)
            VALUES ('$product_name','$cost_price','$selling_price','$category', '$quantity')";

    // Voer de "INSERT INTO" STATEMENT uit
    mysqli_query($conn, $sql);

    mysqli_close($conn); // Sluit de database verbinding
    header("location: producten_overzicht.php");
}
