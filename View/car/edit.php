<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit a car</title>
    <?php
    include 'View/includes/style.php';
    ?>
</head>
<body>
    <center><h1>Editing a car</h1></center>
    <div class="form">
    <a href="/car/index">Cancel action</a>
    <form action="" method="post">
        <label>Seller:</label><br>
        <input type="text" name="seller" value="<?= $data->seller_id?>"><br>
        <label>make:</label><br>
        <input type="text" name="make" value="<?= $data->make?>"><br>
        <label>model:</label><br>
        <input type="text" name="model" value="<?= $data->model?>"><br>
        <label>year:</label><br>
        <input type="text" name="year" value="<?= $data->year?>"><br>
        <label>distance:</label><br>
        <input type="text" name="dist" value="<?= $data->dist_traveled?>"><br>
        <label>price:</label><br>
        <input type="text" name="price" value="<?= $data->price?>"><br>
        <label>exterior color:</label><br>
        <input type="text" name="ext" value="<?= $data->ext_color?>"><br>
        <label>interior color:</label><br>
        <input type="text" name="int" value="<?= $data->int_color?>"><br>
        <label>VIN:</label><br>
        <input type="text" name="vin" value="<?= $data->VIN?>"><br>
        <div class="radio">
            <label>New:</label>
            <label>Used:</label><br>
            <input type="radio" name="rd" value="New">
            <input type="radio" name="rd" value="Used"><br>
        </div>
        <label>Picture:</label><br>
        <input type="file" name="pic" class="pic"><br><br>
        <input type="submit" name="submit" value="Insert"><br>
    </form>
    </div>
</body>
</html>
<style>
    .form{
        border: solid black 10px;
        border-radius: 5px;
        background-color:lightgrey;
        width:fit-content;
        margin:auto;
        text-align: center;
    }
    .form a{
    color: white;
    font-size: 20px;
    border: solid black 2px;
    border-radius: 10px;
    background-color: red;
    padding: 5px;
    margin-top: 100px;
    text-decoration: none;
    }
    .radio label{
        padding:10px;
    }
    .radio input{
        margin:15px;
        padding-top:none;
    }
</style>