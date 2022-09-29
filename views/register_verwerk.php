<?php
require '../Classes/Database.php';

$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$pnumber = $_POST["pnumber"];
$email = $_POST["email"];
$pass = $_POST["pass"];
$role = $_POST["role"];
$submit = $_POST["submit"];


if (
    isset($submit)
    && !empty($firstname)
    && !empty($lastname)
    && !empty($pnumber)
    && !empty($email)
    && !empty($pass)
    && !empty($role)
) {
    // K-422-HZ

    $sql = "INSERT INTO `user`(`firstname`, `lastname`, `phonenumber`, `email`, `password`, `role`)
     VALUES ('$firstname','$lastname','$pnumber','$email','$pass','$role')";

    // Voer de "INSERT INTO" STATEMENT uit
    mysqli_query($conn, $sql);
    mysqli_close($conn); // Sluit de database verbinding
    header("location: login.php");
}
else{
    echo 'Er is iets fout gegaan';
}
