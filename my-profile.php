<?php 

include 'templates/header.php';

$user_id = $_SESSION['user_id'];
$user = getOneUser($connection, $user_id);
$posts = getUserPosts($connection, $user_id);
$image_src = getProfilePicture($connection, $user_id);
?>


<div class="row text-center">
    <div class="col-12 ">
        <h2 class="home-msg"><?php echo $user['first_name']; ?>! </h2>
    </div>
</div>

<div class="row">
    <div class="col-4">
        <div class="profile-picture">
          
        </div>
    </div>
</div>
<div class="row">

    
    <div class="col-4">
        <p>Column 2</p>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quas, sunt ad ipsa, esse vitae accusantium atque, nemo modi sapiente expedita minima reprehenderit! Temporibus reiciendis corrupti sunt, obcaecati maiores facilis, iure nulla veniam quos dolor fuga iste voluptatibus non similique repudiandae laudantium unde! Minima saepe a vitae architecto? Nulla aliquam commodi assumenda enim unde praesentium quibusdam nostrum repellat similique veritatis. Consequatur!</p>
    </div>

</div>

<ul class="posts">
  <?php foreach ($posts as $post): ?>
    <li>
      <a href="profile.php?user=<?php echo $post['posted_by']; ?>" class="posted-by"
        ><?php echo $post['first_name']; ?>
      </a>
      <span class="post-body"><?php echo $post['body']; ?></span>
    </li>
  <?php endforeach; ?>
</ul>


