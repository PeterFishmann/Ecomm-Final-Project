<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login with email</title>
    <?php 
    include 'View/includes/style.php';
    ?>
</head>
<body>
<?php
    if(!is_array($data)){
        echo "<div class='alert alert-danger' role='alert'>$data</div>";
    }
    ?>
<section class="vh-100" style="background-color: #508bfc;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <h3 class="mb-5">Sign in</h3>
            <form action="" method="post">
            <div class="form-outline mb-4">
              <input type="text" id="typeEmailX-2" class="form-control form-control-lg" name="email"/>
              <label class="form-label" for="typeEmailX-2">email</label>
            </div>

            <div class="form-outline mb-4">
              <input type="password" id="typePasswordX-2" class="form-control form-control-lg" name="password"/>
              <label class="form-label" for="typePasswordX-2">Password</label>
            </div>
            <input class="btn btn-primary btn-lg btn-block" type="submit" value="Login" name="loginEmail">
            </form>
            <hr class="my-4">

            <a href="/user/login" style="text-decoration: none;"><button class="btn btn-lg btn-block btn-primary" style="background-color: #dd4b39;"
              type="submit">login with username</button></a><br>
              <a href="/user/register" style="text-decoration: none;"><button class="btn btn-lg btn-block btn-primary" style="background-color: green;"
              type="submit">Register</button></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
  </body>