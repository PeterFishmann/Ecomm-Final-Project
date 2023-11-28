<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sellers list</title>
</head>
<body>
<?php
    include 'View/includes/style.php';
    include 'View/includes/header.php';?>
<h1><center>Seller Profiles</center></h1>
    <?php
    foreach($data as $user){
?>

<div class="container mt-4 mb-4 p-3 d-inline-block">
     <div class="card p-4">
         <div class=" image d-flex flex-column justify-content-center align-items-center">
                <h1><?= $user->username?></h1>
                <div class=" image d-flex flex-column justify-content-center align-items-center"> 
                    <img src="../../Images/users/<?= $user->picture?>" style="border-radius:50%" height="200" width="200" />
                    <span class="name mt-3"><?=$user->username?></span>
                    <span class="idd"><?=$user->email?></span>
                    <span class="idd"><?=$user->fname?></span>
                    <span class="idd"><?=$user->lname?></span>
                    <span class="idd"><?=$user->phone?></span>
                 <div class=" d-flex mt-2"> 
                    <a href="/user/update/<?php echo $user->id ?>"><button class="btn1 btn-dark">Edit Profile</button></a>
                 </div> 
         </div>
    </div>
</div>
    </div>
    <?php
    }
    ?>
</body>
</html>
<style>
    .container{
        width:fit-content;
    }
</style>