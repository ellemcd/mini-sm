<?php
session_start();

if (!isset($_SESSION['logged_in'])) {
  include "templates/header-login.php";
} else {
  include "templates/header.php";
}

$users = combinedPicUser($connection);
?>

<div class="row">
  <?php foreach ($users as $user) : ?>
    <div class="col-4">
      <a href="profile.php?user=<?php echo $user['id']; ?>">
        <div class="card text-center">
          <div class="card-body">
            <h5 class="card-title"><?= $user['first_name'] ?> <?= $user['last_name'] ?></h5>
            <p class="card-text"> <?= $user['country'] ?> </p>
            <div class="profile-picture-users">
              <img src='uploads/<?php echo $user['file_name'] ?>'>
            </div>
          </div>
          <div class="card-footer text-muted">
            Registered: <?= $user['created_at'] ?>
          </div>
        </div>
      </a>
    </div>

  <?php endforeach; ?>

</div>

<?php include 'templates/footer.php'?>