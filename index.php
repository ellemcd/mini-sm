<?php

# Start session because this will be on every page.
require ('functions.php');

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

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

</head>

<div class="container">

  <h1>

  <div class="login-form">
      <form action="auth.php" method="POST">
        <h4>Log in</h4>
        <div class="form-group">
          <input type="email" name="email" placeholder="E-mail Address">
          <span class="input-icon"><i class="fa fa-envelope"></i></span>
        </div>
        <div class="form-group">
          <input type="password" name="password" placeholder="Password">
          <span class="input-icon"><i class="fa fa-lock"></i></span>
        </div>      
        <button type="submit" name="submit-login" class="btn btn-primary">Login</button>      
        <a class="create-acc" href="register.php">Create an account</a>
      </form>
  </div>

</div>





