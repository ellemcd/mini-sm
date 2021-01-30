<?php

session_start();

if (!isset($_SESSION['logged_in'])) {
    include "templates/header-login.php";
} else {
    include "templates/header.php";
}

$user_id = $_GET['user'];
$user = getOneUser($connection, $user_id);
$posts = getUserPosts($connection, $user_id);
$profilePicture = getProfilePicture($connection, $user_id);
?>

<?php include 'templates/profile.temp.php' ?>

<?php include 'templates/footer.php' ?>