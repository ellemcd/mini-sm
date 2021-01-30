<?php

include 'templates/header.php';

$user_id = $_SESSION['user_id'];
$user = getOneUser($connection, $user_id);
$posts = getUserPosts($connection, $user_id);
$profilePicture = getProfilePicture($connection, $user_id);
?>

<?php include 'templates/profile.temp.php' ?>

<?php include 'templates/footer.php' ?>