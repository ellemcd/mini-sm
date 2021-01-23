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
        <a class="nav-link" href="http://localhost/github/mini-sm/home.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://localhost/github/mini-sm/Users.php">Users</a>
      </li>
      
    </ul>

    <a href="http://localhost/github/mini-sm/index.php">
        <button type="button" class="btn btn-secondary my-2 my-sm-0">Log In</button>
    </a>
  
  </div>
</nav>

<!-- Start container, basic on every page -->

<div class="container">