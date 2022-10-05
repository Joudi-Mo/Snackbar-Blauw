<?php
if (isset($_POST["submit"])) {

    $id = $_POST["product_id"];
    // var_dump($_POST);die;

    $name = $_POST["name"];
    $cost_price = $_POST["cost_price"];
    $selling_price = $_POST["selling_price"];
    $category = $_POST["category"];
    $quantity = $_POST["quantity"];

    if (
        !empty($name)
        && !empty($cost_price)
        && !empty($selling_price)
        && !empty($category)
    ) {
        require "../../Classes/Database.php";

        $sql = "UPDATE `products` SET 
        `name`='$name',
        `cost_price`='$cost_price',
        `selling_price`='$selling_price',
        `category`='$category',
        `quantity`='$quantity' WHERE product_id ='$id' ";

        // Voer de INSERT INTO STATEMENT uit
        if (mysqli_query($conn, $sql)) {
            header("location: producten_overzicht.php");
        }


        echo "Inserted successfully";
        mysqli_close($conn); // Sluit de database verbinding

    } else {
        header("location: product_update_verwerk.php?id=$id");
    }
}
