<?php
session_start();
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gebruikers registreren</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-3">
        <h1>Registreren</h1>
        <form action="register_verwerk.php" method="POST">
            <div class="mb-3">
                <label class="form-label" for="voornaam">Voornaam:</label>
                <input class="form-control" type="text" name="voornaam">
            </div>

            <div class="mb-3">
                <label class="form-label" for="achternaam">Achternaam:</label>
                <input class="form-control" type="text" name="achternaam">
            </div>

            <div class="mb-3">
                <label class="form-label" for="email">Email:</label>
                <input class="form-control" type="text" name="email">
            </div>

            <div class="mb-3">
                <label class="form-label" for="wachtwoord">Wachtwoord:</label>
                <input class="form-control" type="password" name="wachtwoord">
            </div>

            <div class="mb-3">
                <label class="form-label" for="gdatum">geboortedatum:</label>
                <input class="form-control" type="text" name="gdatum">
            </div>

            <div class="mb-3">
                <label class="form-label" for="tnummer">Telefoonnummer</label>
                <input class="form-control" type="text" name="tnummer">
            </div>

            <div class="mb-3">
                <input class="form-check-input" id="personeel" type="radio" name="rol" value="personeel">
                <label class="form-check-label" for="personeel">Personeel</label>
            </div>

            <div class="mb-3">
                <input class="form-check-input" id="gebruiker" type="radio" name="rol" value="gebruiker">
                <label class="form-check-label" for="gebruiker">Gebruiker</label>
            </div>
            <div class="mb-3">
                <button class="btn btn-primary mt-2" name="submit">Registreer gebruiker</button>
                <a class="btn btn-success mt-2" href="login.php">Home</a>
            </div>
        </form>
    </div>
</body>

</html>