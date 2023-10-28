<!DOCTYPE html>
<html>
<head>
    <title>Update User</title>
    <?php
    include 'View/includes/style.php';
    include 'View/includes/navbar.php';
    ?>
</head>
<body>
    <h1>Edit User</h1>
    <form method="post">
        <label>Username:</label>
        <input type="text" name="username" value="<?= $data->username?>"><br>
        <label>Email:</label>
        <input type="text" name="email" value="<?= $data->email?>"><br>
        <a href="/user/index">Back to index</a>
        <input type="submit" name="edit" value="Save">
    </form>
</body>
</html>
