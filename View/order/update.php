<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update order</title>
    <?php
    include 'View/includes/style.php';
    include 'View/includes/header.php';
    ?>
</head>
<body>
    <h1>Update order</h1>
    <form method='post'>
    Customer Name: <input type='text' name='name' value="<?= $data->car_id?>"><br>
    Description: <input type='text' name='description' value="<?= $data->price?>"><br>
    Status: <input type='text' name='status' value="<?= $data->status?>"><br>
    <input type='submit' name="edit" value='Update Order'>
    </form>  
</body>
</html>
