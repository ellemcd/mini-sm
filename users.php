<?php
session_start();

if (!isset($_SESSION['logged_in'])) {
  include "templates/header-login.php";
} else {
  include "templates/header.php";
}

$users = combinedPicUser($connection);

?>

<?php foreach ($users as $user) : ?>

    <div class="card text-center">
  <div class="card-body">
    <h5 class="card-title"><?= $user['first_name'] ?> <?= $user['last_name']?></h5>
    <p class="card-text"> <?= $user['country']?> </p>
    <div class="profile-picture">
            <img width="450" src='uploads/<?php echo $user['file_name'] ?>' >
        </div>
    <a href="profile.php?user=<?php echo $user['id']; ?>" class="btn btn-primary">Visit their profile</a>
  </div>
  <div class="card-footer text-muted">
   Registered: <?= $user['created_at']?> 
  </div>
</div>

<?php endforeach; ?>

</div>


