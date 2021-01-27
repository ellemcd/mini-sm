<?php

require 'functions.php';

session_start();

if (!isset($_SESSION['logged_in'])) {
    header('Location: index.php');
    exit;
}

$user_id = $_SESSION['user_id'];
$post_id = $_GET['post_id'];

if (!$user_id) {
  header('Location: index.php');
  exit;
}

$statement = $connection->prepare('DELETE FROM `posts` WHERE `id` = :id');
$statement->execute([
    'id' => $post_id,
]);

header('Location: home.php');

?>


