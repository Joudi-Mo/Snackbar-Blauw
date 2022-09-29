<?php
// require_once "../Classes/Database.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producten</title>
    <link rel="stylesheet" href="style.css">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <!-- fontawesome.com -->
    <script src="https://kit.fontawesome.com/a333f4247d.js" crossorigin="anonymous"></script>
</head>
<body id="body">
<div class="container mt-3">
        <?php
        require "../Classes/Database.php";

        $sql = "SELECT * FROM `products`";

        if ($result = mysqli_query($conn, $sql)) {

            $producten = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        ?>
        <div class="container m-3">
            <table class="table table-responsive table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Cost Price</th>
                        <th>Selling Price</th>
                        <th>Category</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //var_dump($users); die;
                    foreach ($producten as $product) : ?>
                        <tr>
                            <td><?php echo $product["product_id"] ?></td>
                            <td><?php echo $product["name"] ?></td>
                            <td><?php echo $product["cost_price"] ?></td>
                            <td><?php echo $product["selling_price"] ?></td>
                            <td><?php echo $product["category"] ?></td>
                            <td><a href="melding_delete.php?id=<?php echo $product["product_id"] ?>"><i class="fa-solid fa-trash text-danger"></i></a> </td>
                            <td><a class="btn btn-warning" href="melding_update.php?id=<?php echo $product["product_id"] ?>">Update</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>