<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User index</title>
    <?php
    include 'View/includes/style.php';
    ?>
</head>
<body>
<?php
    include 'View/includes/header.php';
?>

<div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
     <div class="card p-4">
         <div class=" image d-flex flex-column justify-content-center align-items-center">
                <h1>My profile</h1>
                <div class=" image d-flex flex-column justify-content-center align-items-center"> 
                    <img src="../../Images/users/<?= $data['users']->picture?>" style="border-radius:50%" height="200" width="200" />
                <span class="name mt-3"><?=$data['users']->username?></span>
                 <span class="idd"><?=$data['users']->email?></span>
                 <div class=" d-flex mt-2"> 
                    <a href="/user/update/<?php echo $data['users']->id ?>"><button class="btn1 btn-dark">Edit Profile</button></a>
                 </div> 
         </div>
    </div>
</div>
</body>
</html>