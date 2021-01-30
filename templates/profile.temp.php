<div class="row text-center">
    <div class="col-12 ">
        <h2 class="home-msg"><?php echo $user['first_name']; ?> <?php echo $user['last_name']; ?> </h2>
    </div>
</div>

<!-- Start 1st Row -->
<div class="row">
    <div class="col-6">
        <div class="profile-picture">
            <img src="<?php echo $profilePicture; ?>">
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
</div>

<!-- End 1st Row -->
<!-- Start 2nd Row -->
<div class="row">
    <div class="col-6">
        <div class="profile-information  text-center">
            <span class="profile-text">
                <p class="intro">Hello my name is <?php echo $user['first_name']; ?> <?php echo $user['last_name']; ?>.</p> I live in <?php echo $user['country']; ?> and I identify myself as a <?php switch ($user['gender']) {
                        case 'W':
                            echo 'Woman';
                            break;
                        case 'M':
                            echo 'Male';
                            break;
                        case 'O':
                            echo 'Other';
                            break;
                    }; ?>
            </span>
        </div>
    </div>

    <div class="col-6">
        <div class="comment-section">
            <h4>Leave a comment: </h4>
            <form action="message.php?user_id=<?php echo $user_id ?>" method="POST">
                <textarea class="form-control" name="message" id="message" rows="3"></textarea><br>
                <button type="submit" name="submit-message" class="btn btn-primary">Skicka</button>
            </form>
        </div>
    </div>
</div>
<!-- End 2nd Row -->

