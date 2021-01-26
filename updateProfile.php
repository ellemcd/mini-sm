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

    $statement = $connection->prepare('UPDATE users 
        SET email=:email, first_name=:first_name, last_name=:last_name, country=:country, gender=:gender
        WHERE id=:id');

    $statement->execute([
        'id' => $user_id,
        'email' => $email,
        'first_name' => $first_name,
        'last_name' => $last_name,
        'country' => $country,
        'gender' => $gender,
    ]);

    header('Location: home.php');

    // $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );

    // $statement = $connection->prepare($sql);

    // $statement->bindParam('email', $email);
    // $statement->bindParam('id', $user_id);


    // if ($statement->execute()) {
    //     $_SESSION['email'] = $email;
    // }

    // print '<pre>';
    //  print_r($connection->errorInfo());
    //  die;

   
} 