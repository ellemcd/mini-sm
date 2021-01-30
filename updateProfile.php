<?php

session_start();

require 'functions.php';

if (isset($_POST['submit'])) {

    $user_id = $_SESSION['user_id'];
    $email = $_POST['email'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $country = $_POST['country'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];

    $passwordHash = password_hash($password, PASSWORD_BCRYPT);

    $statement = $connection -> prepare ('UPDATE users SET email=:email, first_name=:first_name, last_name=:last_name, country=:country, gender=:gender, password = :password WHERE id=:id');


    $statement->execute([
        'id' => $user_id,
        'email' => $email,
        'first_name' => $first_name,
        'last_name' => $last_name,
        'country' => $country,
        'gender' => $gender,
        'password' => $passwordHash,
    ]);

    header('Location: home.php');

} 