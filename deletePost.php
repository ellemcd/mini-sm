<?php

require 'functions.php';

session_start();

if (!isset($_SESSION['logged_in'])) {
    header('Location: index.php');
    exit;
}

// get user_id from the person who's commenting.
$user_id = $_SESSION['user_id'];

// get post_id of the comment posted.
$post_id = $_GET['post_id'];

// if user_id isn't set, return to index.php
if (!$user_id) {
  header('Location: index.php');
  exit;
}

// delete comment from database.
$statement = $connection->prepare('DELETE FROM `posts` WHERE `id` = :id');
$statement->execute([
    'id' => $post_id,
]);


header('Location: home.php');

?>


