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

if (isset($_POST['submit']) && !empty($_POST["email"]) && !empty($_POST["pass"])) {
    $email = trim($_POST["email"]);
    $password = trim($_POST["pass"]);

    $sql = "SELECT id, firstname, password, email, role FROM `user` where email = '$email'";
    if ($result = mysqli_query($conn, $sql)) {

        $data = mysqli_fetch_assoc($result);
    }

    if ($email == $data['email'] && $password == $data['password']) {

        // Store data in session variables
        $_SESSION["is_logged_in"] = true;
        $_SESSION["id"] = $data['id'];
        $_SESSION["username"] = $data['firstname'];
        $_SESSION["role"] = $data['rol'];
        if ($data['role'] == 'gebruiker') {
            // header("location: meldingen/melding_maak.php");
        } elseif($data['role'] == 'medewerker') {
            // header("location: home_medewerker.php");
        } else {
            // header("location: home_manager.php");
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
    <title>Inloggen</title>
    <?php include 'head.php'; ?>
    <link rel="stylesheet" href="style.css">


</head>

<body class="text-center">
    <div class="container px-5 py-5">
        <div class="px-5">
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
                        <input type="text" class="form-control" id="floatingInput" placeholder="user" name="email">
                        <label for="floatingInput">Email</label>
                    </div>
                    <div class="form-floating mt-4">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="pass">
                        <label for="floatingPassword">Password</label>
                    </div>

                    <button class="w-100 btn btn-lg btn-primary mt-4" type="submit" name="submit">Log in</button>
                    <p class="mt-3">New? <a href="register.php">Sign up!</a></p>

                    <p class="text-muted">&copy; <?php echo date("Y") ?></p>
                </form>
            </main>
        </div>
    </div>
</body>

</html>