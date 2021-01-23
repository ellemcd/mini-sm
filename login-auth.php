<?php

session_start();

require 'functions.php';

$statement = $connection -> prepare("SELECT * FROM users WHERE email = :email");

$statement -> bindParam('email', $_POST['email']);
$statement -> execute();

$user = $statement -> fetch(PDO::FETCH_ASSOC);

# password verify kollar lösenordet som kommer in mot det hashade.
# Ni kan läsa mer om metoden här: https://www.php.net/manual/en/function.password-verify.php

if (password_verify($_POST['password'], $user['password'])){
    session_regenerate_id();
    $_SESSION['logged_in'] = true;
    $_SESSION['email'] = $user['email'];
    header('Location: home.php');
} else {
    header('Location: index.php');
}



