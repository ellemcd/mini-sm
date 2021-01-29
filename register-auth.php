<?php

session_start();




if (isset($_POST['sumbit-register'])){

    // include database
    include_once 'config.php';

    //if (isset($_POST['first_name'], $_POST['last_name'], $_POST['email'],$_POST['password'], $_POST['gender'],$_POST['country'])){

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


        $user_id = addToDatabase($connection, 'users', $user);
        
        $_SESSION['logged_in'] = true;
        $_SESSION['email'] = $user['email'];
        $_SESSION['user_id'] = $user_id;
       
        header('Location: home.php');
}