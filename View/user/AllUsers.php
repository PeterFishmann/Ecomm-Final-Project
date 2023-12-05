<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users list</title>
    <?php
    include 'View/includes/style.php';
    ?>
</head>
<body>
<?php
    include 'View/includes/header.php';?>
<h1><center>EzCarBuyer Users</center></h1>
<form method="post">
  <input type="search" name="uname" placeholder="Username search">
  <input type="submit" value="Search" name="USN">
</form>
<table class="table align-middle mb-0 bg-white">
  <thead class="bg-light">
    <tr>
      <th>Username</th>
      <th>Title</th>
      <th>Status</th>
      <th>Permission</th>
    </tr>
  </thead>
  <tbody>
  <?php
    foreach($data as $user){
?>
    <tr>
      <td>
        <div class="d-flex align-items-center">
          <img
              src="../../Images/users/<?=$user->picture?>"
              alt=""
              style="width: 45px; height: 45px"
              class="rounded-circle"
              />
          <div class="ms-3">
            <p class="fw-bold mb-1"><?=$user->username?></p>
            <p class="text-muted mb-0"><?=$user->email?></p>
          </div>
        </div>
      </td>
      <td>
        <p class="fw-normal mb-1"><?= $user->rights?></p>
      </td>
      <td>
        <?php
        if($user->access == "Yes"){
        ?>
        <span class="badge badge-success rounded-pill d-inline">Active</span>
        <?php
        }else{
          ?>
        <span class="badge badge-danger rounded-pill d-inline">Inactive</span>
          <?php
        }
        ?>
      </td>
      <td>
        <form action="" method="post">
        <input type="hidden" name="id" value="<?= $user->id?>">
        <?php
        if($user->rights != "Admin"){
        if($user->access == "Yes"){
        ?>
        <input type="submit" class="btn btn-danger" name="Block" value="Block">
        <?php
        }else{
          ?>
          <input type="submit" class="btn btn-success" name="Access" value="Give">
          <?php
        }
        ?>
        </form>
        <a href="/user/update/<?= $user->id?>" class="btn btn-warning" style="margin-top:5px;">Edit</a>
        <?php
        }
        ?>
        </td>

    </tr>
    <?php
    }
    ?>
  </tbody>
</table>

</body>
</html>
<style>
    .container{
        width:fit-content;
    }
</style>