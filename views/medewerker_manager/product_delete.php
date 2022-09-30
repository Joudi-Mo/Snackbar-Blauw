<?php
require "../../Classes/Database.php";

$id = $_GET['id'];

$sql = "DELETE FROM `products` WHERE product_id = $id";

if (mysqli_query($conn, $sql)) {
    header("location: producten_overzicht.php");
}