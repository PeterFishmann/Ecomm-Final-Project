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
        <div class="row">
                <div class="col-md-4">
                    <label>Make:</label>
                    <input type="text" name="make" value="<?= $data->make?>">
                </div>
                <div class="col-md-4">
                    <label>Model:</label>
                    <input type="text" name="model" value="<?= $data->model?>">
                </div>
                <div class="col-md-4">
                    <label>Year:</label>
                    <input type="text" name="year" value="<?= $data->year?>">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label>Distance (KM):</label>
                    <input type="text" name="dist" value="<?= $data->distance?>">
                </div>
                <div class="col-md-4">
                    <label>Price (CAD):</label>
                    <input type="text" name="price" value="<?= $data->price?>">
                </div>
                <div class="col-md-4">
                    <label>Exterior color:</label>
                    <input type="text" name="ext" value="<?= $data->ext_col?>">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label>Interior color:</label>
                    <input type="text" name="int" value="<?= $data->int_col?>">
                </div>
                <div class="col-md-4">
                    <label>Features:</label>
                    <input type="text" name="vin" value="<?= $data->features?>">
                </div>
                <div class="col-md-4">
                    <label>Condition:</label>
                    <div class="radio">
                        <label for="new">New</label>
                        <input type="radio" id="new" name="rd" id="new" value="New">&nbsp;
                        <label for="used">Used</label>
                        <input type="radio" id="used" name="rd" id="used" value="Used" checked>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <label>Picture:</label>
                    <input type="file" name="pic" multiple>
                </div>
            </div>
            <input type="submit" name="submit" value="Update"><br>
        </form>
    </div>
    <?php 
    ?>
</body>
</html>
<style>
body {
    background-color: #f2f2f2;
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

h1 {
    text-align: center;
}

.form {
    background-color: #fff;
    max-width: fit-content;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
}

a {
    display: block;
    text-align: right;
    text-decoration: none;
    color: #007bff;
    margin-bottom: 20px;
}

label {
    display: block;
    font-weight: bold;
    margin-top: 10px;
}

input[type="text"],
input[type="file"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.radio {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
}

.radio label {
    margin-right: 10px;
}

.pic {
    border: none;
    margin: 0;
}

input[type="submit"] {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}

</style>
