<?php

# Start session because this will be on every page.
session_start();

require 'functions.php';

$errors = array('email' => '');

if (isset($_POST['first_name'], $_POST['last_name'], $_POST['email'],$_POST['password'], $_POST['gender'],$_POST['country'])){


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

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $title ?> </title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/minty/bootstrap.min.css">
  <!-- My CSS -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/login.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand mr-auto" href="#">Mini-SM</a>

    <!-- If you're on a small screen the menu will collapse -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav mr-auto">

        <li class="nav-item">
          <a class="nav-link" href="home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="users.php">Users</a>
        </li>

      </ul>

      <a href="index.php">
        <button type="button" class="btn btn-secondary my-2 my-sm-0">Log In</button>
      </a>

    </div>
  </nav>

  <!-- Start container, basic on every page -->

  <div class="container">

    <div class="login-form">
      <form action="register.php" method="POST">
        <h4>Create an account</h4>


        <div class="form-group">
          <input type="text" id="first_name" name="first_name" placeholder="First Name">
          <span class="input-icon"><i class="fa fa-user"></i></span>
        </div>
        <div class="form-group">
          <input type="text" name="last_name" placeholder="Last name">
          <span class="input-icon"><i class="fa fa-user"></i></span>
        </div>
        <div class="form-group">
          <input type="text" name="country" placeholder="Country">
          <span class="input-icon"><i class="fa fa-globe-europe"></i></span>
        </div>
        <div class="form-group">
          <input type="text" name="email" placeholder="E-mail Address" required>
          <span class="input-icon"><i class="fa fa-envelope"></i></span>
			    <div class="red-text"><?php echo $errors["email"];?> </div>
          <?php print_r($errors); ?>
        </div>
        <div class="form-group">
          <input type="password" name="password" placeholder="Password">
          <span class="input-icon"><i class="fa fa-lock"></i></span>
       </div>

      <!-- Woman, male or other -->

        <div class="form-group">
          <div class="container text-center">
            <label class="radio-inline radio" for="woman" required>
              <input type="radio" name="gender" id="woman" value="W">
              <p>Woman</p>
            </label>

            <label class="radio-inline radio" for="male" required>
              <input type="radio" name="gender" id="male" value="M">
              <p>Male</p>
            </label>

            <label class="radio-inline radio" for="other" required>
              <input type="radio" name="gender" id="other" value="O">
              <p>Other</p>
            </label>
          </div>
        </div>

    



        <button type="submit" name="submit-register" class="btn btn-primary">Create your account</button>
        <a class="create-acc" href="index.php">I already have an account</a>
      </form>
    </div>