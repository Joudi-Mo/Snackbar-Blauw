<?php
// Initialize the session
session_start();
$_SESSION = [];
SESSION_destroy();
session_start();
$_SESSION["is_logged_in"] = false;
$_SESSION["id"] = null;
$_SESSION["username"] = null;
$_SESSION["rol"] = null;
// Include database file
$username = $password = $login_err = "";
require_once "../Classes/Database.php";

if (isset($_POST['submit']) && !empty($_POST["gnaam"]) && !empty($_POST["ww"])) {
    $username = trim($_POST["gnaam"]);
    $password = trim($_POST["ww"]);

    $sql = "SELECT id, voornaam, wachtwoord, rol FROM `gebruikers` where voornaam = '$username'";
    if ($result = mysqli_query($conn, $sql)) {

        $data = mysqli_fetch_assoc($result);
    }

    if ($username == $data['voornaam'] && $password == $data['wachtwoord']) {

        // Store data in session variables
        $_SESSION["is_logged_in"] = true;
        $_SESSION["id"] = $data['id'];
        $_SESSION["username"] = $username;
        $_SESSION["rol"] = $data['rol'];
        if ($data['rol'] == 'gebruiker') {
            header("location: meldingen/melding_maak.php");
        } else {
            header("location: home_personeel.php");
        }
    }

    mysqli_close($conn); // Sluit de database verbinding
} elseif (isset($_POST['submit'])) {
    $login_err = "Vul het formulier correct in!";
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Inloggen</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body class="text-center">
    <div class="container px-5 py-5">
        <div class="col px-5 py-5">

            <main class="form-signin row justify-content-center">
                <form action="login.php" method="POST" class="col-4">
                    <img class="mb-4" src="../assets/burger.png" width="150" height="150">
                    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
                    <p class="text-danger">
                        <?php
                        if (!empty($login_err)) {
                            echo $login_err;
                        }
                        ?>
                    </p>

                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInput" placeholder="user" name="gnaam">
                        <label for="floatingInput">Gebruikersnaam</label>
                    </div>
                    <div class="form-floating mt-4">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="ww">
                        <label for="floatingPassword">Wachtwoord</label>
                    </div>

                    <button class="w-100 btn btn-lg btn-primary mt-4" type="submit" name="submit">Log in</button>
                    <p class="m-3">New? <a href="register.php">Sign in!</a></p>

                    <p class="mt-5 mb-3 text-muted">&copy; <?php echo date("Y") ?></p>
                </form>
            </main>
        </div>
    </div>
</body>

</html>