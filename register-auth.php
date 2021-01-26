<?php

session_start();

require 'functions.php';

if (isset($_POST['email'], $_POST['first_name'], $_POST['last_name'],$_POST['gender'], $_POST['password'])){
   
        $firstName = $_POST['first_name'];
        $lastName = $_POST['last_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $gender = $_POST['gender'];
        $country = $_POST['country'];


        $passwordHash = password_hash($password, PASSWORD_BCRYPT);
    
        $user = [ 
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $email,
            'password' => $passwordHash,
            'gender' => $gender,
            'country' => $country,

        ];

        addToDatabase($connection, 'users', $user);
        
        $_SESSION['logged_in'] = true;
        $_SESSION['email'] = $user['email'];
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['last_name'] = $user['last_name'];
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['posted_by'] = $user['posted_by'];
        $_SESSION['gender'] = $user['gender'];
        $_SESSION['country'] = $user['country'];
        header('Location: index.php');
} else {
    echo 'Please fill out the form.';
}