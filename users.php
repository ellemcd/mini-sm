<?php
session_start();

if (!isset($_SESSION['logged_in'])) {
  include "templates/header-login.php";
} else {
  include "templates/header.php";
}
 ?>

<?php foreach ($users as $user) : ?>

    <div class="card text-center">
  <div class="card-header">
    Featured
  </div>
  <div class="card-body">
    <h5 class="card-title"><?= $user['first_name'] ?> <?= $user['last_name']?></h5>
    <p class="card-text"> <?php switch ($user['gender']) {
        case 'W':
        echo 'Woman';
        break;
        case 'M':
        echo 'Male';
        break;
        case 'O':
        echo 'Other';
        break;
    }; ?> </p>
     
    <a href="profile.php?user=<?php echo $user['id']; ?>" class="btn btn-primary">Go somewhere</a>
  </div>
  <div class="card-footer text-muted">
   Registered: <?= $user['created_at']?> 
  </div>
</div>

<?php endforeach; ?>

</div>


