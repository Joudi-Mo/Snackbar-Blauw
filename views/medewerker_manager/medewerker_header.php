<?php
require 'database.php';
session_start();
if (!$_SESSION['is_logged_in']) {
    header("location: login.php");
}
?>

<div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="http://localhost/project-mms/home_personeel.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
            <img src="http://localhost/project-mms/assets/telephone.png" alt="LOGO" width="30px" height="30px">
            <h1 class="fs-4 fw-bold mx-3">MMS</h1>
        </a>

        <ul class="nav nav-pills">
            <li class="nav-item"><a href="http://localhost/project-mms/home_personeel.php" class="nav-link text-dark">Gebruikers/Personeels</a></li>
            <li class="nav-item"><a href="http://localhost/project-mms/meldingen/melding_overzicht.php" class="nav-link text-dark">Meldinging</a></li>
            <li class="nav-item"><a href="http://localhost/project-mms/categorieen/categorie_overzicht.php" class="nav-link text-dark">Categorieen</a></li>
            <li class="nav-item"><a href="http://localhost/project-mms/login.php" class="btn btn-danger">Log out</a></li>
        </ul>
    </header>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>