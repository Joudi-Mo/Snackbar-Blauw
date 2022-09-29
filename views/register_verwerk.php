<?php
require '../database.php';

$voornaam = $_POST["voornaam"];
$achternaam = $_POST["achternaam"];
$email = $_POST["email"];
$wachtwoord = $_POST["wachtwoord"];
$telefoonnummer = $_POST["tnummer"];
$geboortedatum = htmlentities($_POST['gdatum']);
$date = date('Y-m-d', strtotime($geboortedatum));
$rol = $_POST["rol"];
$submit = $_POST["submit"];


if (
    isset($submit)
    && !empty($voornaam)
    && !empty($achternaam)
    && !empty($email)
    && !empty($wachtwoord)
    && !empty($telefoonnummer)
    && !empty($geboortedatum)
    && !empty($rol)
) {

    $sql = "INSERT INTO gebruikers (voornaam, achternaam, email, wachtwoord, geboortedatum, telefoonnummer, rol)
 VALUES ('$voornaam', '$achternaam', '$email', '$wachtwoord', '$date', '$telefoonnummer', '$rol')";

    // Voer de "INSERT INTO" STATEMENT uit
    mysqli_query($conn, $sql);

    mysqli_close($conn); // Sluit de database verbinding
    header("location: ../home_personeel.php");
}
