<?php

session_start();

if (!isset($_SESSION['logged_in'])) {
    header('Location: index.php');
    exit;
}

include 'templates/header.php';

// user_id is based on the user that is logged in.
$user_id = $_SESSION['user_id'];

$user = getOneUser($connection, $user_id);
$posts = getUserPosts($connection, $user_id);
$profilePicture = getProfilePicture($connection, $user_id);

?>

<div class="row text-center">
    <div class="col-12 ">
        <h2 class="home-msg">Welcome <?php echo $user['first_name']; ?> </h2>
    </div>
</div>

<!-- First Row -->
<div class="row">
    <div class="col-6">
        <div class="profile-picture">
            <img src='<?php echo $profilePicture; ?>'>
        </div>
        
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <p>Upload a profile picture:</p>
            <input type="file" name="file">
            <input type="submit" class="btn btn-primary " name="upload" value="Upload">

        </form>
    </div>

    <div class="col-6">
        <p>Email: <?php echo $user['email'] ?></p>
        <p>First Name: <?php echo $user['first_name'] ?></p>
        <p>Last Name: <?php echo $user['last_name'] ?></p>
        <p>Country: <?php echo $user['country'] ?></p>
        <p>Gender: <?php switch ($user['gender']) {
                        case 'W':
                            echo 'Woman';
                            break;
                        case 'M':
                            echo 'Male';
                            break;
                        case 'O':
                            echo 'Other';
                            break;
                    }; ?></p>
    </div>

</div>
<!-- End Row --->
<br>
<!-- Second Row --->
<div class="row">

    <div class="col-6">
        <h4>Edit your settings:</h4>
        <form action="updateProfile.php" method="post" class="select-child">
            <label for="first_name" class="">First name </label>
            <input type="text" class="form-control" name="first_name" id="first_name" value="<?= $user['first_name']; ?>" />
            <label for="last_name" class="">Last name</label>
            <input type="text" class="form-control" name="last_name" id="last_name" value="<?= $user['last_name']; ?>" />

            <label for="country" class="">Country</label>
            <input type="text" class="form-control" name="country" id="country" value="<?= $user['country']; ?>" />

            <label for="gender" class="">Gender</label>
            <select class="form-control" name="gender">
                <?php
                $genders = [
                    'W' => 'Woman',
                    'M' => 'Male',
                    'O' => 'Other',
                ];
                ?>
                <?php foreach ($genders as $key => $value) : ?>
                    <option value="<?php echo $key ?>" <?php echo ($key == $user['gender'] ? 'selected' : '') ?>><?php echo $value; ?></option>
                <?php endforeach; ?>
            </select>
            <label for="email" class="">Change your Email: </label>
            <input type="email" class="form-control" name="email" id="email" class="" value="<?= $user['email']; ?>" /> 
            
            <label for="password" class="">Change Password</label>
            <input type="password" class="form-control" name="password" id="password" value="" />
            
            <br>
            <button type="submit" class="btn btn-primary form-control" name="submit" class="btn btn-primary">Spara</button>
        </form>

    </div>

    <div class="col-6">
        <h4>Comments you've recieved:</h4>
        <?php foreach ($posts as $post) : ?>
            <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong class="mr-auto"><a href="profile.php?user=<?php echo $post['posted_by']; ?>"><?php echo $post['first_name']; ?></strong></a>
                     <small>&nbsp; <?php echo $post['created_at']; ?></small>
                    <a href="deletePost.php?post_id=<?php echo $post['id'] ?>" type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </a>
                </div>
                <div class="toast-body">
                    <?php echo $post['body']; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>
<!-- End Row --->
<?php include 'templates/footer.php'; ?>