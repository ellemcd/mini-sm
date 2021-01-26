<?php

include 'templates/header.php';

$user_id = $_GET['user'];
$user = getOneUser($connection, $user_id);
$posts = getUserPosts($connection, $user_id);
?>

<div class="row text-center">
    <div class="col-12 ">
        <h2 class="home-msg"><?php echo $user['first_name']; ?>! </h2>
    </div>
</div>

<div class="row">
    <div class="col-6">
        <div class="profile-picture">
            <b>A picture here</b>
        </div>
    </div>

    <div class="col-6">

        <?php foreach ($posts as $post) : ?>
            <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <a href="profile.php?user=<?php echo $post['posted_by']; ?>"><strong class="mr-auto"><?php echo $post['first_name']; ?></strong></a>
                    <small>&nbsp; <?php echo $post['created_at']; ?></small>
                </div>
                <div class="toast-body">
                    <?php echo $post['body']; ?>
                </div>
            </div>
        <?php endforeach; ?>

    </div>

    <h4>Lämna en kommentar </h4>

    <div class="mb-3">
        <form action="message.php?user_id=<?php echo $user_id ?>" method="POST">
            <textarea class="form-control" name="message" id="message" rows="3"></textarea><br>
            <button type="submit" name="submit-message" class="btn btn-primary">Skicka</button>
        </form>

    </div>
</div>
</div>