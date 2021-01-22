<?php

# Start session because this will be on every page.
require ('functions.php');

?>

<?php include ('templates/header-login.php'); ?>

  <div class="login-form">
      <form action="register-auth.php" method="POST">
        <h4>Create an account</h4>
        <div class="form-group">
          <input type="text" name="fname" placeholder="First Name">
          <span class="input-icon"><i class="fa fa-envelope"></i></span>
        </div>
        <div class="form-group">
          <input type="text" name="lname" placeholder="Last name">
          <span class="input-icon"><i class="fa fa-envelope"></i></span>
        </div>
        <div class="form-group">
          <input type="email" name="email" placeholder="E-mail Address">
          <span class="input-icon"><i class="fa fa-envelope"></i></span>
        </div>
        <div class="form-group">
          <input type="password" name="password" placeholder="Password">
          <span class="input-icon"><i class="fa fa-lock"></i></span>
        </div>      


      <!-- Check woman, male or other -->

      <div class="form-group">
            <div class="container text-center">
                <label class="radio-inline radio" for="woman">
                    <input type="radio" name="gender" id="woman" value="W"> <p>Woman</p>
                </label> 

                <label class="radio-inline radio" for="male">
                    <input type="radio" name="gender" id="male" value="M"><p>Male</p>
                </label> 

                <label class="radio-inline radio" for="other">
                    <input type="radio" name="gender" id="other" value="O"> <p>Other</p>
                </label>  
            </div>
        </div>

        <button type="submit" name="submit-register" class="btn btn-primary">Create your account</button>      
        <a class="create-acc" href="index.php">I already have an account</a>
      </form>
  </div>



