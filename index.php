<?php

const GENDER_REQUIRED = "Vul uw geslacht in";
const NAME_REQUIRED = "Vul uw naam in";
const AGE_REQUIRED = "Vul uw leeftijd in";
const EMAIL_REQUIRED = "Vul uw email in";
const INVALID_EMAIL = "Ongeldig emailadres";

$error = [];
$input = [];

if (isset($_POST['submit'])) {

    // Gender validation
    $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_SPECIAL_CHARS);
    if (empty($gender)) {
        $error['gender'] = GENDER_REQUIRED;
    } else {
        $input['gender'] = $gender;
    }

    // Name validation
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
    if (empty($name)) {
        $error['name'] = NAME_REQUIRED;
    } else {
        $input['name'] = $name;
    }

    // Age validation
    $age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_NUMBER_INT);
    if (empty($age)) {
        $error['age'] = AGE_REQUIRED;
    } else {
        $input['age'] = $age;
    }

    // Email validation
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    if (empty($email)) {
        $error['email'] = EMAIL_REQUIRED;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error['email'] = INVALID_EMAIL;
    } else {
        $input['email'] = $email;
    }


    if(count($error) ===0) {
        echo 'Beste ' . $gender . ', <br>';
        echo 'Uw naam is ' . $name . '<br>';
        echo 'Uw leeftijd is ' . $age . '<br>';
        echo 'Uw email is ' . $email . '<br>';
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulier</title>
</head>
<body>
<form method="post">
    <input type="radio" name="gender" id="man" value="Meneer">
    <label for="man">Man</label> <br>

    <input type="radio" name="gender" id="women" value="women">
    <label for="women">Vrouw</label> <br>

    <input type="radio" name="gender" id="different" value="anders">
    <label for="different">Anders</label> <br>

    <label for="name">Naam: </label>
    <input type="text" name="name" id="name" value=""> <br>

    <label for="age">Leeftijd: </label>
    <input type="number" name="age" id="age" value=""> <br>

    <label for="email">Email: </label>
    <input type="email" name="email" id="email" value=""> <br>

    <input type="submit" name="submit" value="Versturen">
</form>
</body>
</html>
