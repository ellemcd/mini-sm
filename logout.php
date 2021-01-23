<?php
    session_start();
# Här förstör vi sessionen och skickar användaren till login sidan
    session_destroy();
    // header('Location: index.php');
?>

<?php include 'templates/header-logout.php' ?>
    <div class="login-form">

        <h4>You've been logged out.</h4>
        <p>
            <a href="http://localhost/github/mini-sm/index.php">Return to homepage</a></p>
    
    </div>
