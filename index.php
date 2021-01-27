<?php session_start() ;?>


<?php include 'templates/header-login.php' ?>

  <div class="login-form">
      <form action="login-auth.php" method="POST">
        <h4>Log in</h4>
        <div class="form-group">
          <input type="email" name="email" placeholder="e-mail" value=""><div class="red-text"><?php echo $errors['email']; ?></div>
          <span class="input-icon"><i class="fa fa-envelope"></i></span>
        </div>
        <div class="form-group">
          <input type="password" name="password" placeholder="Password">
          <span class="input-icon"><i class="fa fa-lock"></i></span>
        </div>      
        <button type="submit" name="submit-login" class="btn btn-primary">Login</button>      
        <a class="create-acc" href="register.php">Create an account</a>
      </form>
  </div>







