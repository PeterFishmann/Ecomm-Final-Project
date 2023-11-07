<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register page</title>
    <?php 
    include 'View/includes/style.php';
    include 'View/includes/navbar.php';
    ?>
</head>
<body>
    <?php
    if(!is_array($data)){
        echo "<div class='alert alert-danger'>$data</div>";
    }
    ?>
    <section class="gradient-custom">
        <div class="container py-1">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <h2 class="fw-bold mb-2 text-uppercase">Register</h2>
                            <p class="text-white-50 mb-4">Please enter credentials!</p>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline form-white">
                                            <input type="text" id="username" class="form-control" name="username" required>
                                            <label class="form-label" for="username">Username</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline form-white">
                                            <input type="email" id="email" class="form-control" name="email" required>
                                            <label class="form-label" for="email">Email</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline form-white">
                                            <input type="text" id="phone" class="form-control" name="phone" required>
                                            <label class="form-label" for="phone">Phone</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline form-white">
                                            <input type="text" id="fname" class="form-control" name="fname" required>
                                            <label class="form-label" for="fname">First Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline form-white">
                                            <input type="text" id="lname" class="form-control" name="lname" required>
                                            <label class="form-label" for="lname">Last Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline form-white">
                                            <input type="password" id="password" class="form-control" name="password" required>
                                            <label class="form-label" for="password">Password</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline form-white">
                                            <input type="password" id="Confpassword" class="form-control" name="Confpassword" required>
                                            <label class="form-label" for="Confpassword">Confirm Password</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label">Rights:</label>
                                        <select name="right" class="form-select">
                                            <option value="EZ_SLR02">Seller</option>
                                            <option value="EZ_BYR05">Buyer</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline form-white">
                                            <label class="form-label">Profile Picture:</label>
                                            <input type="file" class="form-control" name="profPic">
                                        </div>
                                    </div>
                                </div>
                                <input class="btn btn-outline-light btn-lg px-3" type="submit" value="Register" name="register">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer>
    </footer>
</body>
</html>
<style>
  body {
    background-color: lightgrey;
  }
</style>
