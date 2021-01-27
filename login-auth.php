<?php

session_start();

require 'index.php';

$statement = $connection -> prepare("SELECT * FROM users WHERE email = :email");

$statement -> bindParam('email', $_POST['email']);
$statement -> execute();

$user = $statement -> fetch(PDO::FETCH_ASSOC);

if (isset($_POST['submit-login'])) {

    // check email
		if(empty($_POST['email'])){
			$errors['email'] = 'An email is required';
		} else {
			
		}

    if (password_verify($_POST['password'], $user['password'])) {
        session_regenerate_id();
        $_SESSION['logged_in'] = true;
        $_SESSION['user_id'] = $user['id'];
       
        header('Location: home.php');
    } else {
        header('Location: index.php');
    }
}






