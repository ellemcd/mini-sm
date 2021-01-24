<?php

session_start();

if (!isset($_SESSION['logged_in'])) {
    header('Location: index.php');
    exit;
}

?>

<?php include 'templates/header.php'; ?>

<div class="row text-center">
    <div class="col-12 ">
        <h2 class="home-msg">Welcome, <?php echo $_SESSION['first_name']; ?>! </h2>
    </div>
</div>

<div class="row">

    <div class="col-4">

        <h6>Edit your profile</h6>

    </div>

</div>

<div class="row justify-content-center">
    <div class="col-6">
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <p> Select Image File to Upload:</p>
            <input type="file" name="file">
            <input type="submit" name="submit" value="Upload">
        </form>
    </div>
    <div class="col-6">

        <?php

        // Get images from the database
        $query = $connection->query("SELECT * FROM images ORDER BY uploaded_on DESC");

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $imageURL = 'uploads/' . $row["file_name"];
        ?>
                <img src="<?php echo $imageURL; ?>" alt="" />
            <?php }
        } else { ?>
            <p>No image(s) found...</p>
        <?php } ?>

    </div>

</div>

<div class="row">

    <div class="col-4">

    </div>
    <div class="col-4">
        <p>Column 2</p>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quas, sunt ad ipsa, esse vitae accusantium atque, nemo modi sapiente expedita minima reprehenderit! Temporibus reiciendis corrupti sunt, obcaecati maiores facilis, iure nulla veniam quos dolor fuga iste voluptatibus non similique repudiandae laudantium unde! Minima saepe a vitae architecto? Nulla aliquam commodi assumenda enim unde praesentium quibusdam nostrum repellat similique veritatis. Consequatur!</p>
    </div>

</div>