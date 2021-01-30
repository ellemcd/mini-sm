<?php

# Start session because this will be on every page.
session_start();

?>
<?php include 'templates/header-login.php'?>

    <div class="login-form">
      <form action="register-auth.php" method="POST">
        <h4>Create an account</h4>

        <div class="form-group">
          <input type="text" id="first_name" name="first_name" placeholder="First Name">
          <span class="input-icon"><i class="fa fa-user"></i></span>
        </div>
        <div class="form-group">
          <input type="text" name="last_name" placeholder="Last name">
          <span class="input-icon"><i class="fa fa-user"></i></span>
        </div>
        <div class="form-group">
          <input type="text" name="country" placeholder="Country">
          <span class="input-icon"><i class="fa fa-globe-europe"></i></span>
        </div>
        <div class="form-group">
          <input type="text" name="email" placeholder="E-mail Address" required>
          <span class="input-icon"><i class="fa fa-envelope"></i></span>
        </div>
        <div class="form-group">
          <input type="password" name="password" placeholder="Password">
          <span class="input-icon"><i class="fa fa-lock"></i></span>
       </div>

      <!-- Woman, male or other -->

        <div class="form-group">
          <div class="container text-center">
            <label class="radio-inline radio" for="woman" required>
              <input type="radio" name="gender" id="woman" value="W">
              <p>Woman</p>
            </label>

            <label class="radio-inline radio" for="male" required>
              <input type="radio" name="gender" id="male" value="M">
              <p>Male</p>
            </label>

            <label class="radio-inline radio" for="other" required>
              <input type="radio" name="gender" id="other" value="O">
              <p>Other</p>
            </label>
          </div>
        </div>

        <button type="submit" name="submit-register" class="btn btn-primary">Create your account</button>
        <a class="create-acc" href="index.php">I already have an account</a>
      </form>
    </div>