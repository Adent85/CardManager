<!--

Copyright Jan 28, 2022 Kyle Fisk

-->
<?php require_once '../view/header.php';?><br>
<main>
    
    <div class="container">
    <form action="user_manager/index.php" method="post">
      <div>
        <h1>Login</h1>
      </div>
      <div class="form-group row">
        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" id="kk" name="email" placeholder="Email">
          <?php echo $errEmail; ?>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" id="kk" name="password" placeholder="Password">
          <?php echo $errPass; ?>
        </div>
      </div>
      <div class="form-group row">
        <div class="offset-sm-2 col-sm-10">
          <input type="submit" value="Sign in" class="btn btn-primary"/>
        </div>
      </div>
        <input type="hidden" name="controllerRequest" value="user_login">
    </form>
  </div>
</main>
<?php require_once '../view/footer.php';?>

